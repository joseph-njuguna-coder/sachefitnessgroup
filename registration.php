<?php
include('dbcon.php');

/*
|--------------------------------------------------------------------------
| Load Sache Divisions
|--------------------------------------------------------------------------
*/
$divisions = [];

$division_query = mysqli_query(
    $con,
    "SELECT id, name
     FROM divisions
     WHERE status = 'Active'
     ORDER BY sort_order ASC, name ASC"
);

if ($division_query) {
    while ($row = mysqli_fetch_assoc($division_query)) {
        $divisions[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Join Sache | Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

<style>
    :root {
        --sache-primary: #801D21;
        --sache-secondary: #D65E23;
        --sache-dark: #1A1A1A;
        --sache-white: #ffffff;
        --sache-light: #F9F9F9;
        --panel-border: rgba(128, 29, 33, 0.12);
        --text-muted: #64748b;
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background-color: var(--sache-light);
        background-image:
            radial-gradient(
                rgba(128, 29, 33, 0.08) 1.5px,
                transparent 1.5px
            );
        background-size: 24px 24px;
        color: var(--sache-dark);
        min-height: 100vh;
        padding: 40px 20px;
    }

    .form-box {
        position: relative;
        z-index: 1;
        background: var(--sache-white);
        width: 100%;
        max-width: 760px;
        margin: auto;
        padding: 42px;
        border-radius: 18px;
        border: 1px solid var(--panel-border);
        box-shadow: 0 15px 40px rgba(128, 29, 33, 0.07);
    }

    .brand {
        text-align: center;
        font-size: 13px;
        letter-spacing: 2px;
        color: var(--sache-primary);
        margin-bottom: 8px;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
    }

    .brand-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: var(--sache-primary);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
    }

    h2 {
        text-align: center;
        margin-bottom: 8px;
        color: var(--sache-primary);
        font-weight: 900;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        font-size: 26px;
        letter-spacing: 0.5px;
    }

    .intro {
        text-align: center;
        color: var(--text-muted);
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 28px;
    }

    .section-title {
        margin-top: 28px;
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 1px solid rgba(128, 29, 33, 0.10);
        color: var(--sache-primary);
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    label {
        font-weight: 800;
        margin-top: 15px;
        margin-bottom: 0;
        color: var(--sache-dark);
        font-size: 12px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: 'Montserrat', sans-serif;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 12px 13px;
        margin-top: 7px;
        border-radius: 10px;
        border: 1px solid rgba(128, 29, 33, 0.15);
        font-size: 14px;
        outline: none;
        font-family: 'Inter', sans-serif;
        background-color: #fff;
        color: var(--sache-dark);
        transition: all 0.3s ease;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: var(--sache-primary);
        box-shadow: 0 0 0 3px rgba(128, 29, 33, 0.12);
    }

    textarea {
        resize: vertical;
        min-height: 90px;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .grid-3 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 16px;
    }

    .help-text {
        display: block;
        margin-top: 6px;
        font-size: 11px;
        color: var(--text-muted);
    }

    .required {
        color: var(--sache-secondary);
    }

    .notice {
        margin-top: 25px;
        padding: 15px 17px;
        border-radius: 12px;
        background: rgba(128, 29, 33, 0.05);
        border-left: 4px solid var(--sache-primary);
        font-size: 13px;
        line-height: 1.7;
        color: #444;
    }

    .notice strong {
        color: var(--sache-primary);
    }

    .btn-submit {
        width: 100%;
        margin-top: 28px;
        padding: 15px;
        background: var(--sache-primary);
        color: #fff;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 800;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(128, 29, 33, 0.20);
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: var(--sache-secondary);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(214, 94, 35, 0.25);
    }

    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 18px;
        font-size: 13px;
        font-weight: 600;
    }

    .back-link a {
        color: var(--sache-primary);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .back-link a:hover {
        color: var(--sache-secondary);
    }

    .footer {
        text-align: center;
        margin-top: 25px;
        font-size: 12px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .loading-text {
        display: none;
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 7px;
    }

    @media (max-width: 768px) {
        body {
            padding: 20px 12px;
        }

        .form-box {
            padding: 28px 20px;
        }

        .grid-2,
        .grid-3 {
            grid-template-columns: 1fr;
            gap: 0;
        }

        h2 {
            font-size: 22px;
        }
    }
</style>
</head>

<body>

<div class="form-box">

    <div class="brand-icon">
        <i class="fa-solid fa-heart-pulse"></i>
    </div>

    <div class="brand">
        Sache Fitness Group
    </div>

    <h2>Join Sache</h2>

    <p class="intro">
        Start your journey toward stronger health, wellness,
        swimming, community and personal growth.
    </p>

    <form action="./register_submit.php" method="POST" id="registrationForm">

        <!-- =========================================================
             PERSONAL INFORMATION
        ========================================================== -->

        <div class="section-title">
            <i class="fa-solid fa-user"></i>
            Personal Information
        </div>

        <label for="fullname">
            Full Name <span class="required">*</span>
        </label>

        <input
            type="text"
            id="fullname"
            name="fullname"
            maxlength="100"
            autocomplete="name"
            required
        >

        <div class="grid-2">

            <div>
                <label for="username">
                    Username <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    maxlength="20"
                    autocomplete="username"
                    required
                >

                <span class="help-text">
                    Used when signing in to your Sache account.
                </span>
            </div>

            <div>
                <label for="password">
                    Password <span class="required">*</span>
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    minlength="6"
                    autocomplete="new-password"
                    required
                >
            </div>

        </div>

        <div class="grid-2">

            <div>
                <label for="gender">
                    Gender <span class="required">*</span>
                </label>

                <select name="gender" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div>
                <label for="contact">
                    Phone Number <span class="required">*</span>
                </label>

                <input
                    type="tel"
                    id="contact"
                    name="contact"
                    maxlength="15"
                    placeholder="0712 345 678"
                    autocomplete="tel"
                    required
                >
            </div>

        </div>

        <label for="address">
            Address / Location <span class="required">*</span>
        </label>

        <textarea
            name="address"
            id="address"
            rows="3"
            maxlength="255"
            placeholder="Enter your location or address"
            required
        ></textarea>


        <!-- =========================================================
             SACHE PROGRAM SELECTION
        ========================================================== -->

        <div class="section-title">
            <i class="fa-solid fa-layer-group"></i>
            Choose Your Sache Program
        </div>

        <label for="division_id">
            Sache Division <span class="required">*</span>
        </label>

        <select
            name="division_id"
            id="division_id"
            required
        >
            <option value="">Select Division</option>

            <?php foreach ($divisions as $division): ?>

                <option value="<?php echo (int)$division['id']; ?>">
                    <?php echo htmlspecialchars($division['name']); ?>
                </option>

            <?php endforeach; ?>

        </select>

        <span class="help-text">
            Select the area of Sache you would like to join.
        </span>


        <label for="program_id">
            Program <span class="required">*</span>
        </label>

        <select
            name="program_id"
            id="program_id"
            required
            disabled
        >
            <option value="">
                Select a division first
            </option>
        </select>

        <div
            id="programLoading"
            class="loading-text"
        >
            <i class="fa-solid fa-spinner fa-spin"></i>
            Loading programs...
        </div>


        <label for="package_id">
            Package <span class="required">*</span>
        </label>

        <select
            name="package_id"
            id="package_id"
            required
            disabled
        >
            <option value="">
                Select a program first
            </option>
        </select>

        <div
            id="packageLoading"
            class="loading-text"
        >
            <i class="fa-solid fa-spinner fa-spin"></i>
            Loading packages...
        </div>


        <!-- =========================================================
             DATE / SCHEDULE
        ========================================================== -->

        <div class="section-title">
            <i class="fa-solid fa-calendar-days"></i>
            Preferred Schedule
        </div>

        <label for="preferred_date">
            Preferred Start / Visit Date
        </label>

        <input
            type="date"
            name="preferred_date"
            id="preferred_date"
        >

        <span class="help-text">
            This is a preference and will be confirmed by the Sache team.
        </span>


        <!-- =========================================================
             INFORMATION NOTICE
        ========================================================== -->

        <div class="notice">

            <strong>
                <i class="fa-solid fa-circle-info"></i>
                Registration & Payment
            </strong>

            <br>

            Your registration will first be reviewed by the Sache team.
            Payment is handled after your registration has been reviewed
            and approved. You will receive the appropriate payment
            information from Sache.

        </div>


        <!-- =========================================================
             SUBMIT
        ========================================================== -->

        <button
            type="submit"
            class="btn-submit"
            id="submitBtn"
        >
            <i class="fa-solid fa-paper-plane"></i>
            Submit Registration
        </button>

    </form>


    <div class="back-link">
        <a href="index.php">
            <i class="fa-solid fa-arrow-left"></i>
            Back to Sache
        </a>
    </div>

    <div class="footer">
        © <?php echo date('Y'); ?> Sache Fitness Group
    </div>

</div>


<script>

/*
|--------------------------------------------------------------------------
| DOM Elements
|--------------------------------------------------------------------------
*/

const divisionSelect = document.getElementById('division_id');
const programSelect = document.getElementById('program_id');
const packageSelect = document.getElementById('package_id');

const programLoading = document.getElementById('programLoading');
const packageLoading = document.getElementById('packageLoading');

const registrationForm = document.getElementById('registrationForm');
const submitBtn = document.getElementById('submitBtn');


/*
|--------------------------------------------------------------------------
| Division → Programs
|--------------------------------------------------------------------------
*/

divisionSelect.addEventListener('change', function () {

    const divisionId = this.value;

    programSelect.innerHTML =
        '<option value="">Select Program</option>';

    packageSelect.innerHTML =
        '<option value="">Select a program first</option>';

    programSelect.disabled = true;
    packageSelect.disabled = true;

    if (!divisionId) {
        return;
    }

    programLoading.style.display = 'block';

    fetch(
        'get_programs.php?division_id=' +
        encodeURIComponent(divisionId)
    )
    .then(response => {

        if (!response.ok) {
            throw new Error('Unable to load programs.');
        }

        return response.json();

    })
    .then(data => {

        programLoading.style.display = 'none';

        if (data.success && data.programs.length > 0) {

            data.programs.forEach(program => {

                const option =
                    document.createElement('option');

                option.value = program.id;
                option.textContent = program.name;

                programSelect.appendChild(option);

            });

            programSelect.disabled = false;

        } else {

            programSelect.innerHTML =
                '<option value="">No programs available</option>';

        }

    })
    .catch(error => {

        programLoading.style.display = 'none';

        programSelect.innerHTML =
            '<option value="">Unable to load programs</option>';

        console.error(error);

    });

});


/*
|--------------------------------------------------------------------------
| Program → Packages
|--------------------------------------------------------------------------
*/

programSelect.addEventListener('change', function () {

    const programId = this.value;

    packageSelect.innerHTML =
        '<option value="">Select Package</option>';

    packageSelect.disabled = true;

    if (!programId) {
        packageSelect.innerHTML =
            '<option value="">Select a program first</option>';

        return;
    }

    packageLoading.style.display = 'block';

    fetch(
        'get_packages.php?program_id=' +
        encodeURIComponent(programId)
    )
    .then(response => {

        if (!response.ok) {
            throw new Error('Unable to load packages.');

        }

        return response.json();

    })
    .then(data => {

        packageLoading.style.display = 'none';

        if (data.success && data.packages.length > 0) {

            data.packages.forEach(pkg => {

                const option =
                    document.createElement('option');

                option.value = pkg.id;

                let packageText = pkg.name;

                /*
                 * Only show a price when the admin has
                 * actually configured one.
                 */
                if (
                    pkg.price !== null &&
                    parseFloat(pkg.price) > 0
                ) {
                    packageText +=
                        ' — KES ' +
                        Number(pkg.price).toLocaleString(
                            'en-KE',
                            {
                                minimumFractionDigits: 2
                            }
                        );
                }

                packageText +=
                    '';

                option.textContent = packageText;

                packageSelect.appendChild(option);

            });

            packageSelect.disabled = false;

        } else {

            packageSelect.innerHTML =
                '<option value="">No packages available</option>';

        }

    })
    .catch(error => {

        packageLoading.style.display = 'none';

        packageSelect.innerHTML =
            '<option value="">Unable to load packages</option>';

        console.error(error);

    });

});


/*
|--------------------------------------------------------------------------
| Prevent accidental double submission
|--------------------------------------------------------------------------
*/

registrationForm.addEventListener('submit', function () {

    submitBtn.disabled = true;

    submitBtn.innerHTML =
        '<i class="fa-solid fa-spinner fa-spin"></i> ' +
        'Submitting...';

});

</script>

</body>
</html>