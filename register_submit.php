<?php

session_start();
include('dbcon.php');

/*
|--------------------------------------------------------------------------
| Only allow POST requests
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit();
}


/*
|--------------------------------------------------------------------------
| Collect form data
|--------------------------------------------------------------------------
*/

$fullname = trim($_POST['fullname'] ?? '');
$username = trim($_POST['username'] ?? '');
$password_raw = $_POST['password'] ?? '';

$gender  = trim($_POST['gender'] ?? '');
$contact = trim($_POST['contact'] ?? '');
$address = trim($_POST['address'] ?? '');

$division_id = isset($_POST['division_id'])
    ? (int) $_POST['division_id']
    : 0;

$program_id = isset($_POST['program_id'])
    ? (int) $_POST['program_id']
    : 0;

$package_id = isset($_POST['package_id'])
    ? (int) $_POST['package_id']
    : 0;

$preferred_date = !empty($_POST['preferred_date'])
    ? $_POST['preferred_date']
    : null;


/*
|--------------------------------------------------------------------------
| Basic validation
|--------------------------------------------------------------------------
*/

if (
    $fullname === '' ||
    $username === '' ||
    $password_raw === '' ||
    $gender === '' ||
    $contact === '' ||
    $address === '' ||
    $division_id <= 0 ||
    $program_id <= 0 ||
    $package_id <= 0
) {
    echo "<script>
        alert('Please complete all required fields.');
        window.location='registration.php';
    </script>";
    exit();
}


/*
|--------------------------------------------------------------------------
| Validate old members table field limits
|--------------------------------------------------------------------------
*/

if (strlen($fullname) > 20) {
    echo "<script>
        alert('Full name is too long. Please use 20 characters or fewer.');
        window.location='registration.php';
    </script>";
    exit();
}

if (strlen($username) > 20) {
    echo "<script>
        alert('Username is too long. Please use 20 characters or fewer.');
        window.location='registration.php';
    </script>";
    exit();
}

if (strlen($address) > 20) {
    echo "<script>
        alert('Address / location is too long. Please use 20 characters or fewer.');
        window.location='registration.php';
    </script>";
    exit();
}

if (strlen($contact) > 10) {
    echo "<script>
        alert('Phone number is too long. Please use 10 characters or fewer.');
        window.location='registration.php';
    </script>";
    exit();
}


/*
|--------------------------------------------------------------------------
| Validate preferred date
|--------------------------------------------------------------------------
*/

if ($preferred_date !== null) {

    $date_check = DateTime::createFromFormat(
        'Y-m-d',
        $preferred_date
    );

    if (
        !$date_check || 
        $date_check->format('Y-m-d') !== $preferred_date
    ) {
        echo "<script>
            alert('Invalid preferred date.');
            window.location='registration.php';
        </script>";
        exit();
    }
}


/*
|--------------------------------------------------------------------------
| Check username
|--------------------------------------------------------------------------
*/

$stmt = mysqli_prepare(
    $con,
    "SELECT user_id
     FROM members
     WHERE username = ?
     LIMIT 1"
);

if (!$stmt) {
    die("Database error: " . mysqli_error($con));
}

mysqli_stmt_bind_param(
    $stmt,
    "s",
    $username
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    mysqli_stmt_close($stmt);

    echo "<script>
        alert('Username already exists. Please choose another username.');
        window.location='registration.php';
    </script>";

    exit();
}

mysqli_stmt_close($stmt);


/*
|--------------------------------------------------------------------------
| Validate Division → Program → Package
|--------------------------------------------------------------------------
*/

$stmt = mysqli_prepare(
    $con,
    "SELECT
        d.id AS division_id,
        d.name AS division_name,
        p.id AS program_id,
        p.name AS program_name,
        pp.id AS package_id,
        pp.name AS package_name,
        pp.price AS package_price
     FROM divisions d
     INNER JOIN programs p
        ON p.division_id = d.id
     INNER JOIN program_packages pp
        ON pp.program_id = p.id
     WHERE d.id = ?
       AND p.id = ?
       AND pp.id = ?
       AND d.status = 'Active'
       AND p.status = 'Active'
       AND pp.status = 'Active'
     LIMIT 1"
);

if (!$stmt) {
    die("Database error: " . mysqli_error($con));
}

mysqli_stmt_bind_param(
    $stmt,
    "iii",
    $division_id,
    $program_id,
    $package_id
);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 0) {

    mysqli_stmt_close($stmt);

    echo "<script>
        alert('Invalid program or package selection.');
        window.location='registration.php';
    </script>";

    exit();
}

$selected = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);


/*
|--------------------------------------------------------------------------
| Selected Sache information
|--------------------------------------------------------------------------
*/

$division_name = $selected['division_name'];
$program_name  = $selected['program_name'];
$package_name  = $selected['package_name'];

$today = date('Y-m-d');
$current_year = date('Y');


/*
|--------------------------------------------------------------------------
| Legacy members table compatibility
|--------------------------------------------------------------------------
*/

$services = $division_name;

$plan = $package_name;

/*
| No payment has been made at registration stage.
*/
$amount = 0;

/*
| Legacy field cannot be NULL.
| Actual payment status is stored in registrations.
*/
$paid_date = $today;


/*
|--------------------------------------------------------------------------
| Default member information
|--------------------------------------------------------------------------
*/

$attendance_count = 0;

$ini_weight = 0;

$curr_weight = 0;

$ini_bodytype = 'N/A';

$curr_bodytype = 'N/A';

$progress_date = $today;

$reminder = 0;


/*
|--------------------------------------------------------------------------
| Customer status
|--------------------------------------------------------------------------
*/

$pending_status = 'Pending';


/*
|--------------------------------------------------------------------------
| Password
|--------------------------------------------------------------------------
|
| Existing login.php uses MD5.
| Keep MD5 for compatibility with current system.
|
*/

$password = md5($password_raw);


/*
|--------------------------------------------------------------------------
| Start transaction
|--------------------------------------------------------------------------
*/

mysqli_begin_transaction($con);

try {


    /*
    |--------------------------------------------------------------------------
    | Create member
    |--------------------------------------------------------------------------
    */

    $stmt = mysqli_prepare(
        $con,
        "INSERT INTO members (
            fullname,
            username,
            password,
            gender,
            dor,
            services,
            amount,
            paid_date,
            p_year,
            plan,
            address,
            contact,
            status,
            attendance_count,
            ini_weight,
            curr_weight,
            ini_bodytype,
            curr_bodytype,
            progress_date,
            reminder,
            current_division_id,
            current_program_id,
            current_package_id
        )
        VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?, ?, ?, ?, ?,
            ?, ?, ?
        )"
    );

    if (!$stmt) {
        throw new Exception(
            mysqli_error($con)
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Bind member data
    |--------------------------------------------------------------------------
    */

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssisissssiiisssiiii",
        $fullname,
        $username,
        $password,
        $gender,
        $today,
        $services,
        $amount,
        $paid_date,
        $current_year,
        $plan,
        $address,
        $contact,
        $pending_status,
        $attendance_count,
        $ini_weight,
        $curr_weight,
        $ini_bodytype,
        $curr_bodytype,
        $progress_date,
        $reminder,
        $division_id,
        $program_id,
        $package_id
    );


    /*
    |--------------------------------------------------------------------------
    | Execute member insert
    |--------------------------------------------------------------------------
    */

    if (!mysqli_stmt_execute($stmt)) {

        throw new Exception(
            mysqli_stmt_error($stmt)
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Get new member ID
    |--------------------------------------------------------------------------
    */

    $member_id = mysqli_insert_id($con);

    mysqli_stmt_close($stmt);


    /*
    |--------------------------------------------------------------------------
    | Create registration record
    |--------------------------------------------------------------------------
    */

    $registration_status = 'Pending';

    $payment_status = 'Pending';

    $notes =
        'Public website registration. Awaiting admin review.';


    $stmt = mysqli_prepare(
        $con,
        "INSERT INTO registrations (
            member_id,
            division_id,
            program_id,
            package_id,
            registration_date,
            preferred_date,
            start_date,
            end_date,
            status,
            payment_status,
            notes
        )
        VALUES (
            ?, ?, ?, ?, ?, ?, NULL, NULL, ?, ?, ?
        )"
    );

    if (!$stmt) {
        throw new Exception(
            mysqli_error($con)
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Bind registration data
    |--------------------------------------------------------------------------
    */

    mysqli_stmt_bind_param(
        $stmt,
        "iiiisssss",
        $member_id,
        $division_id,
        $program_id,
        $package_id,
        $today,
        $preferred_date,
        $registration_status,
        $payment_status,
        $notes
    );


    /*
    |--------------------------------------------------------------------------
    | Execute registration insert
    |--------------------------------------------------------------------------
    */

    if (!mysqli_stmt_execute($stmt)) {

        throw new Exception(
            mysqli_stmt_error($stmt)
        );
    }

    mysqli_stmt_close($stmt);


    /*
    |--------------------------------------------------------------------------
    | Commit transaction
    |--------------------------------------------------------------------------
    */

    mysqli_commit($con);


    /*
    |--------------------------------------------------------------------------
    | Success
    |--------------------------------------------------------------------------
    */

    echo "<script>

        alert(
            'Registration submitted successfully! Your registration is now pending Sache admin approval.'
        );

        window.location='index.php';

    </script>";

    exit();


} catch (Exception $e) {


    /*
    |--------------------------------------------------------------------------
    | Roll back if anything failed
    |--------------------------------------------------------------------------
    */

    mysqli_rollback($con);


    /*
    |--------------------------------------------------------------------------
    | Show error during development
    |--------------------------------------------------------------------------
    |
    | This helps us identify any database problem while testing.
    |
    */

    echo "<h3>Registration Error</h3>";

    echo "<p>";

    echo htmlspecialchars(
        $e->getMessage()
    );

    echo "</p>";

    echo "<p>";

    echo "<a href='registration.php'>Return to Registration</a>";

    echo "</p>";

    exit();
}
?>