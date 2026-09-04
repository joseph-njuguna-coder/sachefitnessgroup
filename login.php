<?php
session_start();
include('dbcon.php');

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($con, $_POST['user']);
    $password = md5(mysqli_real_escape_string($con, $_POST['pass']));

    // 1. FIRST CHECK: Is this user an Admin?
    $query_admin = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query_admin) > 0) {
        $row = mysqli_fetch_array($query_admin);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role'] = 'Admin';
        
        header("Location: admin/index.php");
        exit();
    }

    // 2. SECOND CHECK: Is this user a Staff member?
    $query_staff = mysqli_query($con, "SELECT * FROM staffs WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query_staff) > 0) {
        $row = mysqli_fetch_array($query_staff);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role'] = 'Staff';
        
        header("Location: staff/index.php");
        exit();
    }

    // 3. THIRD CHECK: Is this user a registered Customer (Member)?
    $query_member = mysqli_query($con, "SELECT * FROM members WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($query_member) > 0) {
        $row = mysqli_fetch_array($query_member);
        
        // Enforce approval status for standard members
        if ($row['status'] == 'Active') {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['role'] = 'Customer';
            
            header("Location: customer/index.php");
            exit();
        } else {
            echo "<script>alert('Your account registration is still pending admin approval.'); window.location='login.php';</script>";
            exit();
        }
    }

    // 4. FALLBACK: No match found in any of the three tables
    echo "<script>alert('Invalid login credentials');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sache System Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Google Fonts (Montserrat & Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Core Sache Brand Scheme variables */
            --sache-primary: #801D21;       /* Brand Maroon */
            --sache-secondary: #D65E23;     /* Sports Orange */
            --sache-dark: #1A1A1A;          /* Charcoal Black */
            --sache-white: #ffffff;
            --sache-light: #F9F9F9;         /* Frame backdrop */
            --panel-border: rgba(128, 29, 33, 0.12); /* Maroon-tinted panel border */
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--sache-light);
            /* Subtle Maroon dot grid backdrop matching the aesthetic design kit */
            background-image: radial-gradient(rgba(128, 29, 33, 0.08) 1.5px, transparent 1.5px);
            background-size: 24px 24px;
            color: var(--sache-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
        }

        .login-box {
            background: var(--sache-white);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            border-radius: 16px;
            border: 1px solid var(--panel-border);
            box-shadow: 0 15px 35px rgba(128, 29, 33, 0.04);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: var(--sache-primary);
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            text-transform: uppercase;
            font-size: 24px;
            letter-spacing: 0.5px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: 1px solid rgba(128, 29, 33, 0.15);
            border-radius: 10px;
            outline: none;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: var(--sache-dark);
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: var(--sache-primary);
            box-shadow: 0 0 0 3px rgba(128, 29, 33, 0.15);
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            background: var(--sache-primary);
            color: #fff;
            border: none;
            border-radius: 50px; /* Pill shaped buttons */
            font-size: 15px;
            font-weight: 800;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(128, 29, 33, 0.2);
            transition: all 0.3s ease;
        }

        button:hover {
            background: var(--sache-secondary); /* Flashes energetic sports orange on interaction */
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(214, 94, 35, 0.3);
        }

        .link {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            font-weight: 600;
        }

        .link a {
            color: var(--sache-primary);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .link a:hover {
            color: var(--sache-secondary);
        }
    </style>
</head>
<body>

<div class="login-box">

    <h2>Login</h2>

    <form method="POST" action="">

        <input type="text" name="user" placeholder="Username" required>

        <input type="password" name="pass" placeholder="Password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <div class="link">
        <a href="registration.php">Create Account</a>
        <br>
        <a href="index.php">Back to Landing Page</a>
    </div>

</div>

</body>
</html>
