<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Member Registration - Sache</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Google Fonts (Montserrat & Inter) -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --bg-light: #ffffff;
        --bg-canvas: #f9f6fc; /* Warm light purple-tinted gray frame */
        --panel-border: rgba(82, 43, 122, 0.12); /* Purple tinted border */
        --text-dark: #230842; /* Deep purple-black */
        --text-muted: #64748b;
        --pf-purple: #522b7a; /* Planet Fitness Purple */
        --pf-yellow: #ffcc00; /* Planet Fitness Yellow */
    }

    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-canvas);
        /* Subtle purple-tinted dot grid backdrop matching the landing page */
        background-image: radial-gradient(rgba(82, 43, 122, 0.1) 1.5px, transparent 1.5px);
        background-size: 24px 24px;
        color: var(--text-dark);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
    }

    .form-box {
        position: relative;
        z-index: 1;
        background: #fff;
        width: 100%;
        max-width: 680px;
        padding: 40px;
        border-radius: 16px;
        border: 1px solid var(--panel-border);
        box-shadow: 0 15px 35px rgba(82, 43, 122, 0.05);
    }

    .brand {
        text-align: center;
        font-size: 13px;
        letter-spacing: 2px;
        color: var(--pf-purple);
        margin-bottom: 8px;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-weight: 800;
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: var(--pf-purple);
        font-weight: 900;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        font-size: 24px;
    }

    label {
        font-weight: 800;
        margin-top: 15px;
        color: var(--text-dark);
        font-size: 13px;
        display: block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: 'Montserrat', sans-serif;
    }

    input, select, textarea {
        width: 100%;
        padding: 12px;
        margin-top: 6px;
        border-radius: 10px;
        border: 1px solid rgba(82, 43, 122, 0.15);
        font-size: 14px;
        outline: none;
        font-family: 'Inter', sans-serif;
        background-color: #fff;
        color: var(--text-dark);
        transition: all 0.3s ease;
    }

    input:focus, select:focus, textarea:focus {
        border-color: var(--pf-purple);
        box-shadow: 0 0 0 3px rgba(82, 43, 122, 0.15);
    }

    textarea { 
        resize: none; 
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    @media (max-width: 768px) {
        .grid-2 { 
            grid-template-columns: 1fr; 
        }
    }

    .btn-submit {
        width: 100%;
        margin-top: 25px;
        padding: 14px;
        background: var(--pf-purple);
        color: #fff;
        border: none;
        border-radius: 50px; /* Pill shaped buttons */
        font-size: 15px;
        font-weight: 800;
        font-family: 'Montserrat', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(82, 43, 122, 0.2);
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        background: #3c1a53;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(82, 43, 122, 0.3);
    }

    .footer {
        text-align: center;
        margin-top: 25px;
        font-size: 12px;
        color: var(--text-muted);
        font-weight: 500;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        font-size: 13px;
        font-family: 'Inter', sans-serif;
        font-weight: 600;
    }

    .back-link a {
        color: var(--pf-purple);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .back-link a:hover {
        color: var(--text-dark);
    }
</style>
</head>

<body>

<div class="form-box">

    <div class="brand">Sache Membership System</div>
    <h2>Member Registration</h2>

    <!-- ROUTING TO INSERT.PHP -->
    <form action="./insert.php" method="POST">

        <label>Full Name</label>
        <input type="text" name="fullname" required>

        <div class="grid-2">
            <div>
                <label>Username</label>
                <input type="text" name="username" maxlength="20" required>
            </div>

            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
        </div>

        <label>Gender</label>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>

        <!-- Dynamic Division selection mapped to database services -->
        <label>Services (Division)</label>
        <select name="services" id="services" onchange="updatePrograms()" required>
            <option value="">Select Division</option>
            <option value="Sache Wellness">Sache Wellness</option>
            <option value="Sache Swim Club">Sache Swim Club</option>
            <option value="Sache Corporate">Sache Corporate</option>
            <option value="Sache Kids">Sache Kids</option>
            <option value="Social Impact">Social Impact</option>
        </select>

        <!-- Dynamic Program selection mapped to database plan -->
        <label>Program</label>
        <select name="plan" id="plan" required>
            <option value="">Select a Division first</option>
        </select>

        <div class="grid-2">
            <div>
                <label>Amount</label>
                <input type="number" name="amount" required>
            </div>

            <div>
                <label>Payment Year</label>
                <input type="number" name="p_year" required>
            </div>
        </div>

        <label>Paid Date</label>
        <input type="date" name="paid_date" required>

        <label>Contact</label>
        <input type="text" name="contact" maxlength="10" required>

        <label>Address</label>
        <textarea name="address" rows="3" required></textarea>

        <button type="submit" class="btn-submit">
            Register Member
        </button>

    </form>

    <div class="back-link">
        <a href="index.php"><i class="fa fa-arrow-left"></i> Back to Landing Page</a>
    </div>

    <div class="footer">
        © Sache Membership System
    </div>

</div>

<!-- JavaScript to dynamically map divisions and programs -->
<script>
function updatePrograms() {
    const divisionSelect = document.getElementById('services');
    const programSelect = document.getElementById('plan');
    const selectedDivision = divisionSelect.value;

    // Clear previous options
    programSelect.innerHTML = '<option value="">Select Program</option>';

    // Defined programs matching your system architecture
    const programs = {
        "Sache Wellness": [
            "Virtual Coaching", 
            "Fitness Plans", 
            "Nutrition Programs"
        ],
        "Sache Swim Club": [
            "Swim Lessons", 
            "Squad Training", 
            "Galas & Competitions"
        ],
        "Sache Corporate": [
            "Team Building", 
            "Wellness Workshops", 
            "Corporate Challenges"
        ],
        "Sache Kids": [
            "Kids Programs", 
            "Youth Camps", 
            "Parent Information"
        ],
        "Social Impact": [
            "Swim4Change", 
            "Sponsorship Tracking", 
            "Community Outreach"
        ]
    };

    if (selectedDivision && programs[selectedDivision]) {
        programs[selectedDivision].forEach(function(program) {
            const option = document.createElement('option');
            option.value = program;
            option.textContent = program;
            programSelect.appendChild(option);
        });
    } else {
        programSelect.innerHTML = '<option value="">Select a Division first</option>';
    }
}
</script>

</body>
</html>