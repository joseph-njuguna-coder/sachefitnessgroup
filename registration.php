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
    <style>
:root{
    --sache-primary:#801D21;
    --sache-secondary:#D65E23;
    --sache-dark:#1A1A1A;
    --sache-white:#ffffff;
    --sache-light:#F8F8F8;
    --panel-border:rgba(128,29,33,.10);
    --text-muted:#64748b;
    --shadow-soft:0 20px 50px rgba(0,0,0,.08);
    --shadow-hover:0 25px 60px rgba(128,29,33,.12);
}

*{
    box-sizing:border-box;
}

html{
    scroll-behavior:smooth;
}

body{
    margin:0;
    font-family:'Inter',sans-serif;
    color:var(--sache-dark);
    min-height:100vh;
    padding:50px 20px;
    background:
        radial-gradient(circle at top right,
        rgba(214,94,35,.08),
        transparent 30%),
        radial-gradient(circle at bottom left,
        rgba(128,29,33,.08),
        transparent 35%),
        #fafafa;
}

/* ====================================
   MAIN CARD
==================================== */

.form-box{
    position:relative;
    overflow:hidden;
    width:100%;
    max-width:820px;
    margin:auto;
    background:#fff;
    border-radius:24px;
    box-shadow:var(--shadow-soft);
    border:1px solid var(--panel-border);
    padding:50px;
}

.form-box::before{
    content:'';
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:6px;
    background:linear-gradient(
        90deg,
        var(--sache-primary),
        var(--sache-secondary)
    );
}

/* ====================================
   BRANDING
==================================== */

.logo-wrapper{
    text-align:center;
    margin-bottom:18px;
}

.registration-logo{
    width:120px;
    height:auto;
    display:block;
    margin:auto;
}

.brand{
    text-align:center;
    color:var(--sache-primary);
    text-transform:uppercase;
    font-family:'Montserrat',sans-serif;
    font-weight:900;
    letter-spacing:3px;
    font-size:12px;
    margin-bottom:12px;
}

.register-badge{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    width:max-content;
    margin:0 auto 20px;
    padding:10px 18px;
    border-radius:999px;
    background:rgba(128,29,33,.08);
    color:var(--sache-primary);
    font-size:12px;
    font-weight:700;
}

h2{
    text-align:center;
    margin-bottom:12px;
    font-size:34px;
    line-height:1.2;
    color:var(--sache-primary);
    font-family:'Montserrat',sans-serif;
    font-weight:900;
}

.intro{
    max-width:650px;
    margin:0 auto 30px;
    text-align:center;
    color:var(--text-muted);
    line-height:1.8;
    font-size:15px;
}

/* ====================================
   FEATURE PILLS
==================================== */

.registration-highlight{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:12px;
    margin-bottom:35px;
}

.highlight-item{
    padding:10px 16px;
    border-radius:999px;
    border:1px solid rgba(128,29,33,.10);
    background:#fff;
    color:var(--sache-primary);
    font-size:13px;
    font-weight:700;
}

.highlight-item i{
    margin-right:6px;
}

/* ====================================
   SECTION TITLES
==================================== */

.section-title{
    margin-top:35px;
    margin-bottom:18px;
    padding:14px 18px;
    border-radius:12px;
    background:
        linear-gradient(
        135deg,
        rgba(128,29,33,.08),
        rgba(214,94,35,.05)
    );
    border-left:4px solid var(--sache-primary);

    color:var(--sache-primary);
    font-family:'Montserrat',sans-serif;
    font-size:14px;
    font-weight:800;
    letter-spacing:.8px;
    text-transform:uppercase;
}

.section-title i{
    margin-right:8px;
}

/* ====================================
   FORM ELEMENTS
==================================== */

label{
    display:block;
    margin-top:18px;
    margin-bottom:6px;
    color:var(--sache-dark);
    font-size:12px;
    font-family:'Montserrat',sans-serif;
    font-weight:800;
    letter-spacing:.5px;
    text-transform:uppercase;
}

input,
select,
textarea{
    width:100%;
    padding:14px 16px;
    border-radius:12px;
    border:1px solid rgba(128,29,33,.15);
    background:#fff;
    color:var(--sache-dark);
    font-size:14px;
    font-family:'Inter',sans-serif;
    transition:.3s ease;
}

input:hover,
select:hover,
textarea:hover{
    border-color:rgba(128,29,33,.30);
}

input:focus,
select:focus,
textarea:focus{
    outline:none;
    border-color:var(--sache-primary);
    box-shadow:0 0 0 4px rgba(128,29,33,.12);
}

textarea{
    resize:vertical;
    min-height:100px;
}

.grid-2{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}

.grid-3{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}

.help-text{
    display:block;
    margin-top:6px;
    font-size:12px;
    color:var(--text-muted);
}

.required{
    color:var(--sache-secondary);
}

/* ====================================
   LOADING TEXT
==================================== */

.loading-text{
    display:none;
    margin-top:8px;
    color:var(--text-muted);
    font-size:12px;
}

/* ====================================
   NOTICE
==================================== */

.notice{
    margin-top:35px;
    padding:20px;
    border-radius:16px;
    background:
        linear-gradient(
            135deg,
            rgba(128,29,33,.05),
            rgba(214,94,35,.05)
        );
    border-left:5px solid var(--sache-primary);
    font-size:14px;
    line-height:1.8;
}

.notice strong{
    color:var(--sache-primary);
}

/* ====================================
   BUTTON
==================================== */

.btn-submit{
    width:100%;
    margin-top:35px;
    border:none;
    border-radius:999px;
    padding:16px 24px;
    cursor:pointer;

    color:#fff;
    font-size:15px;
    font-weight:800;
    letter-spacing:1px;
    text-transform:uppercase;
    font-family:'Montserrat',sans-serif;

    background:
        linear-gradient(
            135deg,
            var(--sache-primary),
            var(--sache-secondary)
        );

    box-shadow:
        0 10px 25px rgba(128,29,33,.25);

    transition:.3s ease;
}

.btn-submit{
    width:100%;
    margin-top:30px;
    padding:16px 24px;
    border:none;
    border-radius:14px;
    background:linear-gradient(
        135deg,
        var(--sache-primary),
        var(--sache-secondary)
    );
    color:#fff;
    font-family:'Montserrat',sans-serif;
    font-size:15px;
    font-weight:800;
    letter-spacing:.5px;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:10px;
    transition:all .3s ease;
    box-shadow:0 15px 35px rgba(128,29,33,.20);
}

.btn-submit:hover{
    transform:translateY(-3px);
    box-shadow:0 20px 40px rgba(128,29,33,.30);
}

.btn-submit:disabled{
    opacity:.7;
    cursor:not-allowed;
}

/* ====================================
   FOOTER LINKS
==================================== */

.back-link{
    text-align:center;
    margin-top:25px;
}

.back-link a{
    color:var(--sache-primary);
    text-decoration:none;
    font-weight:700;
}

.back-link a:hover{
    color:var(--sache-secondary);
}

.footer{
    margin-top:25px;
    text-align:center;
    font-size:12px;
    color:var(--text-muted);
}

/* ====================================
   MOBILE
==================================== */

@media (max-width:768px){

    body{
        padding:20px 12px;
    }

    .form-box{
        padding:30px 22px;
        border-radius:18px;
    }

    h2{
        font-size:28px;
    }

    .grid-2,
    .grid-3{
        grid-template-columns:1fr;
        gap:0;
    }

    .registration-highlight{
        flex-direction:column;
        align-items:center;
    }

    .highlight-item{
        width:100%;
        text-align:center;
    }
}
</style>
</style>
</head>

<body>

<div class="form-box">

    <div class="register-badge">
        <i class="fa-solid fa-users"></i>
        New Member Registration
    </div>

    <div class="logo-wrapper">
        <img
            src="images/logo.png"
            alt="Sache Fitness Group"
            class="registration-logo"
        >
    </div>

    <div class="brand">
        Sache Fitness Group
    </div>

    <h2>Begin Your Wellness Journey</h2>

    <p class="intro">
        Join one of Kenya's fastest growing fitness and wellness communities.
        Register below and select the Sache program that best supports your goals.
    </p>

    <div class="registration-highlight">

        <div class="highlight-item">
            <i class="fa-solid fa-dumbbell"></i>
            Fitness
        </div>

        <div class="highlight-item">
            <i class="fa-solid fa-person-swimming"></i>
            Swimming
        </div>

        <div class="highlight-item">
            <i class="fa-solid fa-heart-pulse"></i>
            Wellness
        </div>

        <div class="highlight-item">
            <i class="fa-solid fa-users"></i>
            Community
        </div>

    </div>

    <form action="./register_submit.php" method="POST" id="registrationForm">

        <!-- ==========================================
             PERSONAL INFORMATION
        =========================================== -->

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
            placeholder="Enter your full name"
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
                    placeholder="Choose a username"
                    required
                >

                <span class="help-text">
                    This will be used when signing into your Sache account.
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
                    placeholder="Create a secure password"
                    required
                >

            </div>

        </div>

        <div class="grid-2">

            <div>

                <label for="gender">
                    Gender <span class="required">*</span>
                </label>

                <select
                    name="gender"
                    id="gender"
                    required
                >
                    <option value="">
                        Select Gender
                    </option>
                    <option value="Male">
                        Male
                    </option>
                    <option value="Female">
                        Female
                    </option>
                    <option value="Other">
                        Other
                    </option>
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

        <!-- ==========================================
             PROGRAM SELECTION
        =========================================== -->

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
            <option value="">
                Select Division
            </option>

            <?php foreach ($divisions as $division): ?>

                <option value="<?php echo (int)$division['id']; ?>">
                    <?php echo htmlspecialchars($division['name']); ?>
                </option>

            <?php endforeach; ?>

        </select>

        <span class="help-text">
            Choose the division you would like to join.
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
            Loading available programs...
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
            Loading available packages...
        </div>

        <!-- ==========================================
             PREFERRED SCHEDULE
        =========================================== -->

        <div class="section-title">
            <i class="fa-solid fa-calendar-days"></i>
            Preferred Schedule
        </div>

        <label for="preferred_date">
            Preferred Start Date
        </label>

        <input
            type="date"
            name="preferred_date"
            id="preferred_date"
        >

        <span class="help-text">
            Your preferred start date will be confirmed by the Sache team.
        </span>

        <!-- ==========================================
             REGISTRATION NOTICE
        =========================================== -->

        <div class="notice">

            <strong>
                <i class="fa-solid fa-circle-info"></i>
                Registration & Payment Information
            </strong>

            <br><br>

            After submitting your registration, the Sache team will review
            your application and selected package.

            Payment instructions and onboarding details will be shared once
            your registration has been approved.

        </div>

        <!-- ==========================================
             SUBMIT
        =========================================== -->

        <button
            type="submit"
            class="btn-submit"
            id="submitBtn"
        >
            <i class="fa-solid fa-paper-plane"></i>
            Complete Registration
        </button>

    </form>

    <div class="back-link">
        <a href="index.php">
            <i class="fa-solid fa-arrow-left"></i>
            Return to Homepage
        </a>
    </div>

    <div class="footer">
        © <?php echo date('Y'); ?> Sache Fitness Group.
        All Rights Reserved.
    </div>

</div>

<script>

/*
|--------------------------------------------------------------------------
| DOM Elements
|--------------------------------------------------------------------------
*/

<script>

const divisionSelect = document.getElementById('division_id');
const programSelect  = document.getElementById('program_id');
const packageSelect  = document.getElementById('package_id');

const programLoading = document.getElementById('programLoading');
const packageLoading = document.getElementById('packageLoading');

const registrationForm = document.getElementById('registrationForm');
const submitBtn = document.getElementById('submitBtn');

/*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
*/

function showLoading(element) {
    element.style.display = 'block';
}

function hideLoading(element) {
    element.style.display = 'none';
}

function resetPrograms() {
    programSelect.innerHTML =
        '<option value="">Select Program</option>';

    packageSelect.innerHTML =
        '<option value="">Select Program First</option>';

    programSelect.disabled = true;
    packageSelect.disabled = true;
}

function resetPackages() {
    packageSelect.innerHTML =
        '<option value="">Select Package</option>';

    packageSelect.disabled = true;
}

/*
|--------------------------------------------------------------------------
| Division → Programs
|--------------------------------------------------------------------------
*/

divisionSelect.addEventListener('change', async function () {

    const divisionId = this.value;

    resetPrograms();

    if (!divisionId) return;

    showLoading(programLoading);

    try {

        const response = await fetch(
            'get_programs.php?division_id=' +
            encodeURIComponent(divisionId)
        );

        if (!response.ok) {
            throw new Error('Unable to load programs');
        }

        const data = await response.json();

        hideLoading(programLoading);

        if (
            data.success &&
            Array.isArray(data.programs) &&
            data.programs.length > 0
        ) {

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
                '<option value="">No Programs Available</option>';

        }

    } catch (error) {

        hideLoading(programLoading);

        console.error(error);

        programSelect.innerHTML =
            '<option value="">Unable To Load Programs</option>';

    }

});

/*
|--------------------------------------------------------------------------
| Program → Packages
|--------------------------------------------------------------------------
*/

programSelect.addEventListener('change', async function () {

    const programId = this.value;

    resetPackages();

    if (!programId) {
        packageSelect.innerHTML =
            '<option value="">Select Program First</option>';
        return;
    }

    showLoading(packageLoading);

    try {

        const response = await fetch(
            'get_packages.php?program_id=' +
            encodeURIComponent(programId)
        );

        if (!response.ok) {
            throw new Error('Unable to load packages');
        }

        const data = await response.json();

        hideLoading(packageLoading);

        if (
            data.success &&
            Array.isArray(data.packages) &&
            data.packages.length > 0
        ) {

            data.packages.forEach(pkg => {

                const option =
                    document.createElement('option');

                option.value = pkg.id;

                let label = pkg.name;

                if (
                    pkg.price !== null &&
                    parseFloat(pkg.price) > 0
                ) {

                    label +=
                        ' • KES ' +
                        Number(pkg.price).toLocaleString(
                            'en-KE',
                            {
                                minimumFractionDigits: 0,
                                maximumFractionDigits: 0
                            }
                        );
                }

                option.textContent = label;

                packageSelect.appendChild(option);

            });

            packageSelect.disabled = false;

        } else {

            packageSelect.innerHTML =
                '<option value="">No Packages Available</option>';

        }

    } catch (error) {

        hideLoading(packageLoading);

        console.error(error);

        packageSelect.innerHTML =
            '<option value="">Unable To Load Packages</option>';

    }

});

/*
|--------------------------------------------------------------------------
| Submission Experience
|--------------------------------------------------------------------------
*/

registrationForm.addEventListener('submit', function () {

    submitBtn.disabled = true;

    submitBtn.innerHTML =
        '<i class="fa-solid fa-spinner fa-spin"></i> Processing Registration...';

});

/*
|--------------------------------------------------------------------------
| Set Minimum Date To Today
|--------------------------------------------------------------------------
*/

const preferredDate =
    document.getElementById('preferred_date');

if (preferredDate) {

    const today =
        new Date().toISOString().split('T')[0];

    preferredDate.min = today;
}

</script>

</body>
</html>