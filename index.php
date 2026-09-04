<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sache Fitness Group | Wellness, Swimming & Community</title>

    <meta name="description"
          content="Sache Fitness Group - Wellness, swimming, youth development, corporate wellness and community impact in Kenya.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Montserrat:wght@500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

        :root {
            --sache-dark: #111111;
            --sache-black: #080808;
            --sache-white: #ffffff;
            --sache-primary: #6d8f3d;
            --sache-secondary: #a9c45a;
            --sache-light: #f5f7f1;

            --text-dark: #151515;
            --text-muted: #666666;
            --border: rgba(0,0,0,0.09);

            --shadow-sm: 0 8px 25px rgba(0,0,0,0.06);
            --shadow-lg: 0 20px 55px rgba(0,0,0,0.12);

            --radius: 4px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            background: var(--sache-white);
            line-height: 1.7;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            display: block;
        }

        .container {
            max-width: 1200px;
        }


        /* =========================
           TOP BAR
        ========================= */

        .top-bar {
            background: var(--sache-black);
            color: #fff;
            font-size: 13px;
            padding: 8px 0;
        }

        .top-bar a {
            color: #fff;
            margin-left: 18px;
        }


        /* =========================
           NAVBAR
        ========================= */

        .main-navbar {
            background: #fff;
            box-shadow: 0 3px 18px rgba(0,0,0,.06);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand img {
            width: 125px;
        }

        .navbar-nav .nav-link {
            color: #222;
            font-weight: 600;
            font-size: 14px;
            margin: 0 7px;
        }

        .navbar-nav .nav-link:hover {
            color: var(--sache-primary);
        }

        .nav-login {
            background: var(--sache-dark) !important;
            color: #fff !important;
            padding: 9px 18px !important;
            border-radius: 3px;
        }

        .nav-login:hover {
            background: var(--sache-primary) !important;
        }


        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 680px;
            display: flex;
            align-items: center;
            color: #fff;

            background:
                linear-gradient(
                    90deg,
                    rgba(8,8,8,.88),
                    rgba(8,8,8,.30)
                ),
                url('images/community-group.jpg')
                center/cover no-repeat;
        }

        .hero-content {
            max-width: 720px;
        }

        .hero-small {
            text-transform: uppercase;
            letter-spacing: 4px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: clamp(48px, 7vw, 82px);
            line-height: 1.02;
            margin-bottom: 25px;
        }

        .hero p {
            font-size: 18px;
            max-width: 650px;
            color: rgba(255,255,255,.85);
            margin-bottom: 35px;
        }

        .btn-sache {
            background: var(--sache-primary);
            color: #fff;
            padding: 14px 28px;
            border-radius: 3px;
            font-weight: 700;
            margin-right: 10px;
            display: inline-block;
        }

        .btn-sache:hover {
            background: var(--sache-secondary);
            color: #111;
        }

        .btn-outline-sache {
            border: 1px solid #fff;
            color: #fff;
            padding: 13px 27px;
            border-radius: 3px;
            font-weight: 700;
            display: inline-block;
        }

        .btn-outline-sache:hover {
            background: #fff;
            color: #111;
        }


        /* =========================
           INTRO STRIP
        ========================= */

        .intro-strip {
            background: var(--sache-dark);
            color: #fff;
            padding: 28px 0;
        }

        .intro-item {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .intro-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--sache-primary);
            border-radius: 50%;
        }

        .intro-item h6 {
            margin-bottom: 2px;
        }

        .intro-item small {
            color: rgba(255,255,255,.65);
        }


        /* =========================
           SECTIONS
        ========================= */

        .section {
            padding: 90px 0;
        }

        .section-light {
            background: var(--sache-light);
        }

        .section-title {
            margin-bottom: 45px;
        }

        .section-title span {
            color: var(--sache-primary);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .section-title h2 {
            font-size: 42px;
            margin-top: 10px;
        }

        .section-title p {
            color: var(--text-muted);
            max-width: 650px;
        }


        /* =========================
           ABOUT
        ========================= */

        .about-image {
            position: relative;
        }

        .about-image img {
            width: 100%;
            min-height: 480px;
            object-fit: cover;
        }

        .about-badge {
            position: absolute;
            bottom: 25px;
            left: 25px;
            background: var(--sache-primary);
            color: #fff;
            padding: 15px 22px;
            font-weight: 700;
        }

        .about-content {
            padding-left: 35px;
        }

        .about-content .lead {
            font-size: 20px;
            font-weight: 600;
        }

        .vm-box {
            background: #f7f7f7;
            padding: 22px;
            margin-top: 20px;
            border-left: 4px solid var(--sache-primary);
        }

        .vm-box h5 {
            margin-bottom: 8px;
        }


        /* =========================
           CARDS
        ========================= */

        .division-card,
        .program-card,
        .rate-card,
        .blog-card {
            background: #fff;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            height: 100%;
            transition: .3s ease;
        }

        .division-card:hover,
        .program-card:hover,
        .rate-card:hover,
        .blog-card:hover {
            transform: translateY(-7px);
            box-shadow: var(--shadow-lg);
        }

        .division-card img,
        .program-card img,
        .blog-card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .card-body-custom {
            padding: 25px;
        }

        .division-number {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--sache-primary);
            color: #fff;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .card-body-custom p {
            color: var(--text-muted);
        }


        /* =========================
           RATES
        ========================= */

        .rate-card {
            overflow: hidden;
        }

        .rate-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            background: #f5f5f5;
        }

        .rate-content {
            padding: 25px;
        }

        .rate-badge {
            display: inline-block;
            background: var(--sache-primary);
            color: #fff;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }


        /* =========================
           CTA
        ========================= */

        .cta-section {
            padding: 110px 0;
            color: #fff;
            text-align: center;

            background:
                linear-gradient(
                    rgba(8,8,8,.82),
                    rgba(8,8,8,.82)
                ),
                url('images/swim-lessons.jpg')
                center/cover no-repeat;
        }

        .cta-section h2 {
            font-size: 50px;
        }


        /* =========================
           CONTACT
        ========================= */

        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--sache-primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .social-icons a {
            width: 42px;
            height: 42px;
            background: #fff;
            color: #111;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .3s;
        }

        .social-icons a:hover {
            background: var(--sache-primary);
            color: #fff;
        }

        .portal-box {
            background: var(--sache-dark);
            padding: 30px;
            color: #fff;
        }

        .portal-link {
            background: rgba(255,255,255,.07);
            color: #fff;
            padding: 14px;
            margin-top: 10px;
            display: block;
            transition: .3s;
        }

        .portal-link:hover {
            background: var(--sache-primary);
            color: #fff;
        }


        /* =========================
           FOOTER
        ========================= */

        footer {
            background: #080808;
            color: rgba(255,255,255,.7);
            padding: 60px 0 25px;
        }

        .footer-logo img {
            width: 130px;
            margin-bottom: 20px;
        }

        footer h6 {
            color: #fff;
            margin-bottom: 20px;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 8px;
        }

        footer ul li a {
            color: rgba(255,255,255,.65);
        }

        footer ul li a:hover {
            color: #fff;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.1);
            margin-top: 40px;
            padding-top: 20px;
            font-size: 13px;
        }

        /* MANYUMBA DEVELOPER CREDIT */

        .footer-credit {
            margin-top: 25px;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,.12);
            font-size: 12px;
            color: rgba(255,255,255,.55);
            text-align: center;
        }

        .footer-credit a {
            color: #007bff;
            font-weight: 700;
            text-decoration: none;
            transition: .3s ease;
        }

        .footer-credit a:hover {
            color: #66b3ff;
        }


        /* =========================
           WHATSAPP
        ========================= */

        .whatsapp-float {
            position: fixed;
            right: 22px;
            bottom: 22px;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #25d366;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            z-index: 2000;
            box-shadow: 0 8px 25px rgba(0,0,0,.25);
        }

        .whatsapp-float:hover {
            color: #fff;
            transform: scale(1.05);
        }


        /* =========================
           CHATBOT
        ========================= */

        .chatbot-button {
            position: fixed;
            left: 22px;
            bottom: 22px;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: var(--sache-dark);
            color: #fff;
            border: none;
            z-index: 2000;
            font-size: 22px;
        }

        .chatbot-window {
            position: fixed;
            left: 22px;
            bottom: 90px;
            width: 330px;
            background: #fff;
            box-shadow: var(--shadow-lg);
            z-index: 2000;
            display: none;
            overflow: hidden;
            border-radius: 8px;
        }

        .chat-header {
            background: var(--sache-dark);
            color: #fff;
            padding: 16px;
            font-weight: 700;
        }

        .chat-body {
            background: #f5f5f5;
            padding: 15px;
            max-height: 350px;
            overflow-y: auto;
        }

        .bot-message {
            background: #fff;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .user-message {
            background: var(--sache-primary);
            color: #fff;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .chat-replies {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .chat-reply {
            background: #fff;
            border: 1px solid var(--border);
            padding: 10px;
            text-align: left;
            cursor: pointer;
            border-radius: 4px;
        }

        .chat-reply:hover {
            background: var(--sache-primary);
            color: #fff;
        }


        /* =========================
           ANIMATION
        ========================= */

        .scroll-animate {
            opacity: 0;
            transform: translateY(25px);
            transition: .7s ease;
        }

        .scroll-animate.show {
            opacity: 1;
            transform: translateY(0);
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 991px) {

            .navbar-nav {
                background: #fff;
                padding: 15px;
            }

            .navbar-nav .nav-link {
                padding: 10px 0;
            }

            .about-content {
                padding-left: 0;
                margin-top: 35px;
            }

            .hero {
                min-height: 600px;
            }

        }


        @media (max-width: 576px) {

            .hero h1 {
                font-size: 46px;
            }

            .hero p {
                font-size: 16px;
            }

            .section {
                padding: 65px 0;
            }

            .section-title h2 {
                font-size: 34px;
            }

            .cta-section h2 {
                font-size: 38px;
            }

            .chatbot-window {
                left: 12px;
                right: 12px;
                width: auto;
            }

            .whatsapp-float {
                right: 15px;
                bottom: 15px;
            }

            .chatbot-button {
                left: 15px;
                bottom: 15px;
            }

        }

    </style>
</head>


<body>


<!-- =========================
     TOP BAR
========================= -->

<div class="top-bar">

    <div class="container d-flex justify-content-between flex-wrap">

        <div>
            Wellness • Swimming • Community
        </div>

        <div>

            <a href="tel:0712770161">
                <i class="fa-solid fa-phone"></i>
                0712 770 161
            </a>

            <a href="mailto:sachefitness25@gmail.com">
                <i class="fa-solid fa-envelope"></i>
                sachefitness25@gmail.com
            </a>

        </div>

    </div>

</div>


<!-- =========================
     NAVBAR
========================= -->

<nav class="navbar navbar-expand-lg main-navbar">

    <div class="container">

        <a class="navbar-brand" href="index.html">

            <img src="images/logo.jpg"
                 alt="Sache Fitness Group">

        </a>


        <button class="navbar-toggler"
                type="button"
                onclick="toggleMenu()">

            <i class="fa-solid fa-bars"></i>

        </button>


        <div class="collapse navbar-collapse"
             id="mainMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#home">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#divisions">
                        Divisions
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#programs">
                        Programs
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#swimming">
                        Swimming
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#stories">
                        Stories
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        Contact
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-login"
                       href="login.php">
                        Login
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- =========================
     HERO
========================= -->

<section class="hero" id="home">

    <div class="container">

        <div class="hero-content">

            <div class="hero-small">
                Sache Fitness Group
            </div>

            <h1>
                Stronger<br>
                Healthier.<br>
                Together.
            </h1>

            <p>
                Transforming lives through wellness,
                swimming, youth development, fitness
                and community impact.
            </p>

            <a href="registration.php"
               class="btn-sache">
                Join Sache
            </a>

            <a href="#programs"
               class="btn-outline-sache">
                Explore Programs
            </a>

        </div>

    </div>

</section>


<!-- =========================
     INTRO STRIP
========================= -->

<section class="intro-strip">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-4">

                <div class="intro-item">

                    <div class="intro-icon">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>

                    <div>

                        <h6>
                            Wellness
                        </h6>

                        <small>
                            Holistic health for everyday life
                        </small>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="intro-item">

                    <div class="intro-icon">
                        <i class="fa-solid fa-person-swimming"></i>
                    </div>

                    <div>

                        <h6>
                            Swimming
                        </h6>

                        <small>
                            Confidence, safety and skill
                        </small>

                    </div>

                </div>

            </div>


            <div class="col-md-4">

                <div class="intro-item">

                    <div class="intro-icon">
                        <i class="fa-solid fa-people-group"></i>
                    </div>

                    <div>

                        <h6>
                            Community
                        </h6>

                        <small>
                            Creating meaningful impact together
                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     ABOUT
========================= -->

<section class="section"
         id="about">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="about-image">

                    <img src="images/community-group.jpg"
                         alt="Sache Fitness community">

                    <div class="about-badge">
                        Where You Belong
                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="about-content">

                    <div class="section-title mb-3">

                        <span>
                            About Sache
                        </span>

                        <h2>
                            More Than Fitness.
                        </h2>

                    </div>


                    <p class="lead">
                        Sache Fitness Group is a wellness
                        and community-focused organisation
                        committed to helping people live
                        stronger, healthier and more
                        meaningful lives.
                    </p>


                    <p>
                        Through swimming, fitness, wellness
                        coaching, youth programs, corporate
                        experiences and community initiatives,
                        we create opportunities for people
                        of all ages to grow.
                    </p>


                    <p>
                        Our approach goes beyond physical
                        exercise. We believe in holistic
                        wellness, fellowship, accountability
                        and responsible stewardship.
                    </p>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="vm-box">

                                <h5>
                                    Our Vision
                                </h5>

                                <p>
                                    A healthier and stronger
                                    community where everyone
                                    has the opportunity to thrive.
                                </p>

                            </div>

                        </div>


                        <div class="col-md-6">

                            <div class="vm-box">

                                <h5>
                                    Our Mission
                                </h5>

                                <p>
                                    To transform lives through
                                    wellness, fitness, swimming
                                    and meaningful community
                                    experiences.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     DIVISIONS
========================= -->

<section class="section section-light"
         id="divisions">

    <div class="container">

        <div class="section-title">

            <span>
                What We Do
            </span>

            <h2>
                Our Divisions
            </h2>

            <p>
                Different pathways designed to support
                wellness, growth, recreation and
                community impact.
            </p>

        </div>


        <div class="row g-4">


            <div class="col-lg-4 col-md-6">

                <div class="division-card">

                    <img src="images/wellness-plank.jpg"
                         alt="Sache Wellness">

                    <div class="card-body-custom">

                        <div class="division-number">
                            01
                        </div>

                        <h4>
                            Sache Wellness
                        </h4>

                        <p>
                            Virtual fitness coaching,
                            postpartum fitness, nutrition
                            guidance, accountability groups
                            and wellness experiences.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="division-card">

                    <img src="images/swim-lessons.jpg"
                         alt="Sache Swim Club">

                    <div class="card-body-custom">

                        <div class="division-number">
                            02
                        </div>

                        <h4>
                            Sache Swim Club
                        </h4>

                        <p>
                            Swimming lessons, stroke mastery,
                            competitive programs and water
                            safety.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="division-card">

                    <img src="images/corp-teambuilding.jpg"
                         alt="Sache Corporate Experiences">

                    <div class="card-body-custom">

                        <div class="division-number">
                            03
                        </div>

                        <h4>
                            Sache Corporate
                        </h4>

                        <p>
                            Team building, organised sports,
                            recreational activities, wellness
                            programs and outdoor experiences.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="division-card">

                    <img src="images/community-group.jpg"
                         alt="Sache Kids">

                    <div class="card-body-custom">

                        <div class="division-number">
                            04
                        </div>

                        <h4>
                            Sache Kids
                        </h4>

                        <p>
                            Swimming, holiday activities,
                            weekend programs, outdoor
                            adventures and sports.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="division-card">

                    <img src="images/adult-swim.jpg"
                         alt="Sache Community Initiative">

                    <div class="card-body-custom">

                        <div class="division-number">
                            05
                        </div>

                        <h4>
                            Sache Community
                        </h4>

                        <p>
                            Community-focused initiatives
                            designed to create opportunity,
                            support families and inspire
                            healthier communities.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4 col-md-6">

                <div class="division-card">

                    <img src="images/swim-confidence.jpg"
                         alt="Sache Social Impact">

                    <div class="card-body-custom">

                        <div class="division-number">
                            06
                        </div>

                        <h4>
                            Social Impact
                        </h4>

                        <p>
                            Creating positive change through
                            swimming, wellness and community
                            development.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     PROGRAMS
========================= -->

<section class="section"
         id="programs">

    <div class="container">

        <div class="section-title">

            <span>
                Our Programs
            </span>

            <h2>
                Find Your Path
            </h2>

        </div>


        <div class="row g-4">


            <div class="col-lg-3 col-md-6">

                <div class="program-card">

                    <img src="images/wellness-fasting.jpg"
                         alt="Virtual Coaching">

                    <div class="card-body-custom">

                        <h4>
                            Virtual Coaching
                        </h4>

                        <p>
                            Flexible wellness and fitness
                            support wherever you are.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-3 col-md-6">

                <div class="program-card">

                    <img src="images/swim-coach.jpg"
                         alt="Certified Coaching">

                    <div class="card-body-custom">

                        <h4>
                            Certified Coaching
                        </h4>

                        <p>
                            Professional guidance to help
                            you reach your fitness goals.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-3 col-md-6">

                <div class="program-card">

                    <img src="images/swim-exercise.jpg"
                         alt="Group Sessions">

                    <div class="card-body-custom">

                        <h4>
                            Group Sessions
                        </h4>

                        <p>
                            Build consistency, motivation
                            and fellowship through group
                            training.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-3 col-md-6">

                <div class="program-card">

                    <img src="images/swim-confidence.jpg"
                         alt="Swim Success">

                    <div class="card-body-custom">

                        <h4>
                            Swim Success
                        </h4>

                        <p>
                            Learn essential swimming skills,
                            improve confidence and stay safe.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     SWIMMING
========================= -->

<section class="section section-light"
         id="swimming">

    <div class="container">

        <div class="section-title">

            <span>
                Swimming
            </span>

            <h2>
                Start Your Swimming Journey
            </h2>

            <p>
                Whether you are starting from zero or
                looking to improve your technique, we
                have a program for you.
            </p>

        </div>


        <div class="row g-4">


            <div class="col-lg-6">

                <div class="rate-card">

                    <img src="images/flyer-single.jpg"
                         alt="Single Swimming Lesson">

                    <div class="rate-content">

                        <span class="rate-badge">
                            FLEXIBLE
                        </span>

                        <h3>
                            Single Lesson
                        </h3>

                        <p>
                            A focused swimming lesson designed
                            around your current ability and goals.
                        </p>

                        <a href="registration.php"
                           class="btn-sache">
                            Register
                        </a>

                    </div>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="rate-card">

                    <img src="images/flyer-package.jpg"
                         alt="Beginner Swimming Package">

                    <div class="rate-content">

                        <span class="rate-badge">
                            POPULAR
                        </span>

                        <h3>
                            Beginner's Package
                        </h3>

                        <p>
                            A structured package designed to
                            help beginners develop confidence
                            and essential swimming skills.
                        </p>

                        <a href="registration.php"
                           class="btn-sache">
                            Start Training
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     STORIES
========================= -->

<section class="section"
         id="stories">

    <div class="container">

        <div class="section-title">

            <span>
                Stories & Insights
            </span>

            <h2>
                From The Sache Community
            </h2>

        </div>


        <div class="row g-4">


            <div class="col-lg-4">

                <div class="blog-card">

                    <img src="images/adult-swim.jpg"
                         alt="Adult Swimming">

                    <div class="card-body-custom">

                        <h4>
                            Why Adults Should Learn To Swim
                        </h4>

                        <p>
                            Swimming is more than exercise.
                            It builds confidence, safety and
                            lifelong wellness.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="blog-card">

                    <img src="images/wellness-fasting.jpg"
                         alt="Holistic Wellness">

                    <div class="card-body-custom">

                        <h4>
                            A Holistic Approach To Wellness
                        </h4>

                        <p>
                            Discover the importance of balancing
                            physical, mental and spiritual wellbeing.
                        </p>

                    </div>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="blog-card">

                    <img src="images/swim-confidence.jpg"
                         alt="Swim4Change">

                    <div class="card-body-custom">

                        <h4>
                            Swim4Change
                        </h4>

                        <p>
                            Creating swimming opportunities
                            and changing lives through
                            community support.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     CTA
========================= -->

<section class="cta-section">

    <div class="container">

        <h2>
            Your Journey Starts Here.
        </h2>

        <p class="lead mt-3 mb-4">
            Take the first step towards a stronger,
            healthier and more confident you.
        </p>

        <a href="registration.php"
           class="btn-sache">
            Register With Sache
        </a>

    </div>

</section>


<!-- =========================
     CONTACT
========================= -->

<section class="section section-light"
         id="contact">

    <div class="container">

        <div class="section-title">

            <span>
                Get In Touch
            </span>

            <h2>
                Contact Sache
            </h2>

        </div>


        <div class="row g-5">


            <div class="col-lg-7">

                <div class="row g-4">


                    <div class="col-md-6">

                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <h5>
                            Main Location
                        </h5>

                        <p>
                            Kahawa House, Kiambu Town<br>
                            Next to Shell Petrol Station
                        </p>

                    </div>


                    <div class="col-md-6">

                        <div class="contact-icon">
                            <i class="fa-solid fa-person-swimming"></i>
                        </div>

                        <h5>
                            Swimming Location
                        </h5>

                        <p>
                            Ndumberi, Kiambu Road<br>
                            Nairobi, Kenya
                        </p>

                    </div>


                    <div class="col-md-6">

                        <div class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <h5>
                            Phone
                        </h5>

                        <p>
                            <a href="tel:0712770161">
                                0712 770 161
                            </a>
                        </p>

                    </div>


                    <div class="col-md-6">

                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <h5>
                            Email
                        </h5>

                        <p>
                            <a href="mailto:sachefitness25@gmail.com">
                                sachefitness25@gmail.com
                            </a>
                        </p>

                    </div>

                </div>


                <div class="social-icons">

                    <a href="https://www.facebook.com/ChegeSara"
                       target="_blank"
                       rel="noopener noreferrer">

                        <i class="fa-brands fa-facebook-f"></i>

                    </a>


                    <a href="https://www.instagram.com/sachefitt/"
                       target="_blank"
                       rel="noopener noreferrer">

                        <i class="fa-brands fa-instagram"></i>

                    </a>


                    <a href="https://ke.linkedin.com/in/coachsache-sachefitness"
                       target="_blank"
                       rel="noopener noreferrer">

                        <i class="fa-brands fa-linkedin-in"></i>

                    </a>


                    <a href="https://wa.me/254712770161"
                       target="_blank"
                       rel="noopener noreferrer">

                        <i class="fa-brands fa-whatsapp"></i>

                    </a>

                </div>

            </div>


            <div class="col-lg-5">

                <div class="portal-box">

                    <h3>
                        Sache Portal
                    </h3>

                    <p>
                        Access your account or management
                        dashboard.
                    </p>


                    <a href="login.php"
                       class="portal-link">

                        <i class="fa-solid fa-user me-2"></i>
                        Member Login

                    </a>


                    <a href="login.php"
                       class="portal-link">

                        <i class="fa-solid fa-users me-2"></i>
                        Staff Login

                    </a>


                    <a href="login.php"
                       class="portal-link">

                        <i class="fa-solid fa-lock me-2"></i>
                        Admin Login

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <div class="container">

        <div class="row g-5">


            <div class="col-lg-5">

                <div class="footer-logo">

                    <img src="images/logo.jpg"
                         alt="Sache Fitness Group">

                </div>

                <p>
                    Building stronger, healthier communities
                    through wellness, swimming, fitness,
                    youth development and meaningful impact.
                </p>

            </div>


            <div class="col-lg-3">

                <h6>
                    Quick Links
                </h6>

                <ul>

                    <li>
                        <a href="#home">Home</a>
                    </li>

                    <li>
                        <a href="#about">About</a>
                    </li>

                    <li>
                        <a href="#divisions">Divisions</a>
                    </li>

                    <li>
                        <a href="#programs">Programs</a>
                    </li>

                    <li>
                        <a href="#swimming">Swimming</a>
                    </li>

                    <li>
                        <a href="#contact">Contact</a>
                    </li>

                </ul>

            </div>


            <div class="col-lg-4">

                <h6>
                    Contact
                </h6>

                <p>
                    <i class="fa-solid fa-phone me-2"></i>
                    0712 770 161
                </p>

                <p>
                    <i class="fa-solid fa-envelope me-2"></i>
                    sachefitness25@gmail.com
                </p>

                <p>
                    <i class="fa-solid fa-location-dot me-2"></i>
                    Nairobi, Kenya
                </p>

            </div>

        </div>


        <div class="footer-bottom text-center">

            <div>
                © 2026 Sache Fitness Group.
                All Rights Reserved.
            </div>


            <div class="footer-credit">

                Developed by

                <a href="https://manyumba.co.ke"
                   target="_blank"
                   rel="noopener noreferrer">

                    Manyumba.co.ke

                </a>

                <span>
                    | Joseph Njuguna
                </span>

            </div>

        </div>

    </div>

</footer>


<!-- =========================
     WHATSAPP
========================= -->

<a class="whatsapp-float"
   href="https://wa.me/254712770161?text=Hi%20Sache%20Fitness%2C%20I%20need%20more%20information%20about%20your%20programs."
   target="_blank"
   rel="noopener noreferrer">

    <i class="fa-brands fa-whatsapp"></i>

</a>


<!-- =========================
     CHATBOT BUTTON
========================= -->

<button class="chatbot-button"
        onclick="toggleChat()">

    <i class="fa-solid fa-comments"></i>

</button>


<!-- =========================
     CHATBOT
========================= -->

<div class="chatbot-window"
     id="chatbotWindow">

    <div class="chat-header">

        <i class="fa-solid fa-robot me-2"></i>

        Sache Assistant

    </div>


    <div class="chat-body"
         id="chatBody">

        <div class="bot-message">

            Hi 👋 Welcome to Sache Fitness Group.
            How can we help you today?

        </div>


        <div class="chat-replies">

            <button class="chat-reply"
                    onclick="sendReply('Swimming Programs')">

                Swimming Programs

            </button>


            <button class="chat-reply"
                    onclick="sendReply('Where are you located?')">

                Where are you located?

            </button>


            <button class="chat-reply"
                    onclick="sendReply('How do I register?')">

                How do I register?

            </button>


            <button class="chat-reply"
                    onclick="sendReply('Talk to a Coach')">

                Talk to a Coach

            </button>

        </div>

    </div>

</div>


<script>

    /* =========================
       MOBILE MENU
    ========================= */

    function toggleMenu() {

        const menu =
            document.getElementById('mainMenu');

        menu.classList.toggle('show');

    }


    document.querySelectorAll('.nav-link')
        .forEach(link => {

            link.addEventListener('click', () => {

                const menu =
                    document.getElementById('mainMenu');

                menu.classList.remove('show');

            });

        });


    /* =========================
       SCROLL ANIMATION
    ========================= */

    const observer =
        new IntersectionObserver(

            entries => {

                entries.forEach(entry => {

                    if (entry.isIntersecting) {

                        entry.target.classList.add('show');

                    }

                });

            },

            {
                threshold: 0.15
            }

        );


    document.querySelectorAll('.scroll-animate')
        .forEach(el => observer.observe(el));


    /* =========================
       CHATBOT
    ========================= */

    function toggleChat() {

        const chat =
            document.getElementById('chatbotWindow');

        if (chat.style.display === 'block') {

            chat.style.display = 'none';

        } else {

            chat.style.display = 'block';

        }

    }


    function sendReply(choice) {

        const body =
            document.getElementById('chatBody');


        const userMessage =
            document.createElement('div');

        userMessage.className =
            'user-message';

        userMessage.textContent =
            choice;

        body.appendChild(userMessage);


        const botMessage =
            document.createElement('div');

        botMessage.className =
            'bot-message';


        let response = '';


        if (choice === 'Swimming Programs') {

            response =
                'We offer beginner swimming lessons, stroke mastery, competitive programs and water safety training. You can register through our registration page.';

        }


        else if (choice === 'Where are you located?') {

            response =
                'Our main location is Kahawa House in Kiambu Town, next to Shell Petrol Station. Swimming sessions are available in Ndumberi along Kiambu Road.';

        }


        else if (choice === 'How do I register?') {

            response =
                'You can register online by clicking the Join Sache or Register button on our website.';

        }


        else if (choice === 'Talk to a Coach') {

            response =
                'You can contact our team on 0712 770 161 or WhatsApp us directly for assistance.';

        }


        botMessage.textContent =
            response;

        body.appendChild(botMessage);


        body.scrollTop =
            body.scrollHeight;

    }

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>