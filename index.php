<?php
/**
 * Sache Fitness Group
 * Main Public Landing Page
 */

include_once('dbcon.php');

/* =========================================================
   DATABASE HELPERS
========================================================= */

function sache_query($con, $sql)
{
    if (!isset($con) || !$con) {
        return false;
    }

    $result = @mysqli_query($con, $sql);

    return $result ?: false;
}

function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

/* =========================================================
   GET ACTIVE DIVISIONS
========================================================= */

$divisions = [];

$result = sache_query(
    $con,
    "SELECT id, name, description
     FROM divisions
     WHERE status = 'Active'
     ORDER BY sort_order ASC, name ASC"
);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $divisions[] = $row;
    }
}

/* =========================================================
   GET ACTIVE PROGRAMS
========================================================= */

$programs = [];

$result = sache_query(
    $con,
    "SELECT
        p.id,
        p.name,
        p.description,
        p.division_id,
        d.name AS division_name
     FROM programs p
     INNER JOIN divisions d ON d.id = p.division_id
     WHERE p.status = 'Active'
       AND d.status = 'Active'
     ORDER BY d.sort_order ASC,
              p.sort_order ASC,
              p.name ASC"
);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $programs[] = $row;
    }
}

/* =========================================================
   FALLBACK DIVISIONS
========================================================= */

if (empty($divisions)) {
    $divisions = [

        [
            'id' => 1,
            'name' => 'Sache Swim Club',
            'description' =>
                'Swimming lessons, stroke mastery, competitive development and water safety.'
        ],

        [
            'id' => 2,
            'name' => 'Sache Corporate Experiences',
            'description' =>
                'Team building, sports, wellness programmes and outdoor experiences for organisations.'
        ],

        [
            'id' => 3,
            'name' => 'Sache Wellness',
            'description' =>
                'Fitness coaching, nutrition, postpartum wellness and accountability support.'
        ],

        [
            'id' => 4,
            'name' => 'Sache Kids',
            'description' =>
                'Swimming, holiday activities, outdoor adventures and multiple sports for children.'
        ],

        [
            'id' => 5,
            'name' => 'Sache Community Initiative',
            'description' =>
                'Community programmes creating opportunity and inspiring healthier families.'
        ],

        [
            'id' => 6,
            'name' => 'Sache Sports',
            'description' =>
                'Performance, recreation, movement and fun through sport.'
        ]
    ];
}

/* =========================================================
   FALLBACK PROGRAMS
========================================================= */

if (empty($programs)) {

    $programs = [

        [
            'id' => 1,
            'name' => 'Starter Package - Beginners',
            'description' =>
                'A supportive introduction to swimming and water confidence.',
            'division_id' => 1,
            'division_name' => 'Sache Swim Club'
        ],

        [
            'id' => 2,
            'name' => 'Advanced Package - Stroke Mastery',
            'description' =>
                'Improve swimming technique, efficiency and confidence.',
            'division_id' => 1,
            'division_name' => 'Sache Swim Club'
        ],

        [
            'id' => 3,
            'name' => 'Competitive Programs and Events',
            'description' =>
                'Structured swimming development for performance and competition.',
            'division_id' => 1,
            'division_name' => 'Sache Swim Club'
        ],

        [
            'id' => 4,
            'name' => 'Water Safety and Confidence Programs',
            'description' =>
                'Practical water safety and confidence development.',
            'division_id' => 1,
            'division_name' => 'Sache Swim Club'
        ],

        [
            'id' => 5,
            'name' => 'Team-Building Facilitation',
            'description' =>
                'Purposeful experiences designed to strengthen teamwork.',
            'division_id' => 2,
            'division_name' => 'Sache Corporate Experiences'
        ],

        [
            'id' => 6,
            'name' => 'Sports and Recreational Activities',
            'description' =>
                'Fun and active sports experiences for groups and organisations.',
            'division_id' => 2,
            'division_name' => 'Sache Corporate Experiences'
        ],

        [
            'id' => 7,
            'name' => 'Virtual Fitness Coaching',
            'description' =>
                'Flexible fitness and wellness coaching wherever you are.',
            'division_id' => 3,
            'division_name' => 'Sache Wellness'
        ],

        [
            'id' => 8,
            'name' => 'Postpartum Fitness for Mothers',
            'description' =>
                'Supportive fitness and wellness programming for mothers.',
            'division_id' => 3,
            'division_name' => 'Sache Wellness'
        ],

        [
            'id' => 9,
            'name' => 'Nutrition Guidance and Counselling',
            'description' =>
                'Practical nutrition guidance for healthier lifestyles.',
            'division_id' => 3,
            'division_name' => 'Sache Wellness'
        ],

        [
            'id' => 10,
            'name' => 'Kids Swimming Programs',
            'description' =>
                'Fun and structured swimming development for children.',
            'division_id' => 4,
            'division_name' => 'Sache Kids'
        ],

        [
            'id' => 11,
            'name' => 'Holiday Activities and Weekend Programs',
            'description' =>
                'Active and engaging activities for children.',
            'division_id' => 4,
            'division_name' => 'Sache Kids'
        ],

        [
            'id' => 12,
            'name' => 'Outdoor Adventure Programs',
            'description' =>
                'Outdoor experiences encouraging confidence and discovery.',
            'division_id' => 4,
            'division_name' => 'Sache Kids'
        ],

        [
            'id' => 13,
            'name' => 'Multiple Sports Programs',
            'description' =>
                'Explore different sports while developing healthy habits.',
            'division_id' => 4,
            'division_name' => 'Sache Kids'
        ],

        [
            'id' => 14,
            'name' => 'Swim4Change',
            'description' =>
                'Community swimming sponsorship for children from underprivileged homes.',
            'division_id' => 5,
            'division_name' => 'Sache Community Initiative'
        ],

        [
            'id' => 15,
            'name' => 'Devoted Moms',
            'description' =>
                'A supportive community inspiring women to become healthier and nurture their children.',
            'division_id' => 5,
            'division_name' => 'Sache Community Initiative'
        ]
    ];
}

/* =========================================================
   IMAGE MAPPING
========================================================= */

$divisionImages = [

    'Sache Swim Club' =>
        'images/swim-coach.png',

    'Sache Corporate Experiences' =>
        'images/corporate-garden.jpg.jpg',

    'Sache Wellness' =>
        'images/wellness-garden.jpg.jpg',

    'Sache Kids' =>
        'images/outdoor-garden.jpg.jpg',

    'Sache Community Initiative' =>
        'images/community-activities.jpg.jpg',

    'Sache Sports' =>
        'images/outdoor-garden.jpg.jpg'
];

$programImages = [

    'Starter Package - Beginners' =>
        'images/flyer-single.jpg',

    'Advanced Package - Stroke Mastery' =>
        'images/swim-coach.png',

    'Competitive Programs and Events' =>
        'images/swim-exercise.jpg.png',

    'Water Safety and Confidence Programs' =>
        'images/swim-confidence.png',

    'Team-Building Facilitation' =>
        'images/corporate-garden.jpg.jpg',

    'Sports and Recreational Activities' =>
        'images/outdoor-garden.jpg.jpg',

    'Fitness and Wellness Programs' =>
        'images/wellness-garden.jpg.jpg',

    'Virtual Fitness Coaching' =>
        'images/wellness-garden.jpg.jpg',

    'Postpartum Fitness for Mothers' =>
        'images/wellness-garden.jpg.jpg',

    'Nutrition Guidance and Counselling' =>
        'images/wellness-garden.jpg.jpg',

    'Accountability Group and Support' =>
        'images/community-activities.jpg.jpg',

    'Fitness Events and Experiences' =>
        'images/community-activities.jpg.jpg',

    'Kids Swimming Programs' =>
        'images/swim-coach.png',

    'Holiday Activities and Weekend Programs' =>
        'images/outdoor-garden.jpg.jpg',

    'Outdoor Adventure Programs' =>
        'images/outdoor-garden.jpg.jpg',

    'Multiple Sports Programs' =>
        'images/outdoor-garden.jpg.jpg',

    'Swim4Change' =>
        'images/community-activities.jpg.jpg',

    'Devoted Moms' =>
        'images/community-activities.jpg.jpg'
];

$divisionIcons = [

    'Sache Swim Club' =>
        'fa-person-swimming',

    'Sache Corporate Experiences' =>
        'fa-people-group',

    'Sache Wellness' =>
        'fa-heart-pulse',

    'Sache Kids' =>
        'fa-child-reaching',

    'Sache Community Initiative' =>
        'fa-hands-holding-child',

    'Sache Sports' =>
        'fa-trophy'
];

$divisionColors = [

    'Sache Swim Club' =>
        '#1A4175',

    'Sache Corporate Experiences' =>
        '#B38E46',

    'Sache Wellness' =>
        '#286A3B',

    'Sache Kids' =>
        '#D65E23',

    'Sache Community Initiative' =>
        '#442E5E',

    'Sache Sports' =>
        '#D65E23'
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="icon"
      type="image/jpeg"
      href="images/logo.png">

<link rel="apple-touch-icon"
      href="images/logo.png">
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="description"
          content="Sache Fitness Group - Inspiring healthier lifestyles, empowering families and impacting communities through wellness, swimming, sport and community initiatives in Kenya.">

    <meta name="keywords"
          content="Sache Fitness Group, fitness Kenya, swimming Nairobi, wellness Kenya, kids swimming, corporate wellness, community fitness">

    <title>
        Sache Fitness Group | Wellness, Swimming & Community
    </title>

    <!-- Google Fonts -->
    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Montserrat:wght@500;600;700;800;900&display=swap"
          rel="stylesheet">

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>

        :root {

            --maroon: #801D21;
            --maroon-dark: #5c1115;
            --orange: #D65E23;
            --charcoal: #1A1A1A;
            --black: #090909;
            --white: #ffffff;
            --cream: #f8f6f2;
            --light: #f3f3f3;
            --muted: #707070;
            --border: rgba(0,0,0,.09);

        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {

            margin: 0;
            font-family: "Inter", sans-serif;
            color: var(--charcoal);
            background: #fff;
            line-height: 1.7;

        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {

            font-family: "Montserrat", sans-serif;
            font-weight: 800;

        }

        a {
            text-decoration: none;
        }

        .topbar {

            background: var(--charcoal);
            color: #fff;
            font-size: 13px;
            padding: 9px 0;

        }

        .topbar a {
            color: #fff;
        }

        .navbar {

            background: #fff;
            box-shadow: 0 2px 18px rgba(0,0,0,.08);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 1000;

        }

        .navbar-brand img {

            width: 165px;
            height: 55px;
            object-fit: contain;

        }

        .navbar-nav .nav-link {

            color: var(--charcoal);
            font-weight: 600;
            font-size: 14px;
            padding: 10px 13px !important;

        }

        .navbar-nav .nav-link:hover {
            color: var(--maroon);
        }

        .btn-sache {

            background: var(--maroon);
            color: #fff !important;
            border-radius: 5px;
            padding: 12px 22px !important;
            font-weight: 700 !important;
            display: inline-block;
            transition: .3s;

        }

        .btn-sache:hover {

            background: var(--orange);
            transform: translateY(-2px);

        }

        /* HERO */

        .hero {

            min-height: 680px;
            position: relative;
            display: flex;
            align-items: center;
            background:
                linear-gradient(
                    90deg,
                    rgba(0,0,0,.82),
                    rgba(0,0,0,.50),
                    rgba(0,0,0,.20)
                ),
                url("images/hero-lake.jpg.jpg") center/cover no-repeat;

        }

        .hero-content {

            max-width: 850px;
            color: #fff;
            padding: 100px 0;

        }

        .hero-label {

            display: inline-block;
            background: var(--orange);
            padding: 8px 16px;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;

        }

        .hero h1 {

            font-size: clamp(48px, 7vw, 86px);
            line-height: .98;
            margin-bottom: 25px;
            letter-spacing: -3px;

        }

        .hero h1 span {
            color: #f3b28b;
        }

        .hero p {

            font-size: 20px;
            max-width: 680px;
            color: rgba(255,255,255,.90);
            margin-bottom: 32px;

        }

        .hero-buttons {

            display: flex;
            gap: 14px;
            flex-wrap: wrap;

        }

        .btn-orange {

            background: var(--orange);
            color: #fff;
            padding: 14px 27px;
            font-weight: 700;
            display: inline-block;
            border-radius: 4px;

        }

        .btn-outline-light-custom {

            border: 1px solid rgba(255,255,255,.7);
            color: #fff;
            padding: 13px 27px;
            font-weight: 700;
            display: inline-block;
            border-radius: 4px;

        }

        .btn-orange:hover,
        .btn-outline-light-custom:hover {

            color: #fff;
            transform: translateY(-2px);

        }

        /* INTRO STRIP */

        .intro-strip {

            background: var(--maroon);
            color: #fff;

        }

        .intro-box {

            padding: 30px 20px;
            border-right: 1px solid rgba(255,255,255,.15);

        }

        .intro-box:last-child {
            border-right: 0;
        }

        .intro-box i {

            font-size: 25px;
            margin-bottom: 10px;
            color: #f3b28b;

        }

        .intro-box h5 {

            margin: 0;
            font-size: 16px;

        }

        .intro-box p {

            margin: 4px 0 0;
            font-size: 13px;
            opacity: .85;

        }

        /* GENERAL */

        .section {

            padding: 100px 0;

        }

        .section-light {
            background: var(--cream);
        }

        .eyebrow {

            color: var(--maroon);
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 12px;

        }

        .section-title {

            font-size: clamp(34px, 4vw, 52px);
            line-height: 1.1;
            margin-bottom: 20px;

        }

        .section-text {

            color: var(--muted);
            font-size: 16px;

        }

        /* ABOUT */

        .about-image {

            min-height: 520px;
            background:
                url("images/wellness-garden.jpg.jpg")
                center/cover no-repeat;

        }

        .about-card {

            background: #fff;
            padding: 45px;
            margin-left: -80px;
            position: relative;
            box-shadow: 0 20px 50px rgba(0,0,0,.10);

        }

        .about-card h2 {
            font-size: 44px;
        }

        /* VALUES */

        .value-card {

            border: 1px solid var(--border);
            padding: 30px;
            height: 100%;
            background: #fff;
            transition: .3s;

        }

        .value-card:hover {

            transform: translateY(-7px);
            box-shadow: 0 18px 40px rgba(0,0,0,.08);

        }

        .value-icon {

            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--maroon);
            color: #fff;
            font-size: 21px;
            margin-bottom: 18px;

        }

        .value-card h4 {
            font-size: 20px;
        }

        .value-card p {

            color: var(--muted);
            font-size: 14px;
            margin: 0;

        }

        /* DIVISIONS */

        .division-card {

            background: #fff;
            border: 1px solid var(--border);
            height: 100%;
            overflow: hidden;
            transition: .35s;
            position: relative;

        }

        .division-card:hover {

            transform: translateY(-8px);
            box-shadow: 0 22px 45px rgba(0,0,0,.12);

        }

        .division-image {

            height: 240px;
            background-position: center;
            background-size: cover;
            position: relative;

        }

        .division-overlay {

            position: absolute;
            inset: 0;
            background: linear-gradient(
                to top,
                rgba(0,0,0,.75),
                transparent 60%
            );

        }

        .division-icon {

            position: absolute;
            bottom: 18px;
            left: 20px;
            width: 50px;
            height: 50px;
            background: var(--maroon);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;

        }

        .division-body {

            padding: 27px;

        }

        .division-body h3 {

            font-size: 21px;
            margin-bottom: 10px;

        }

        .division-body p {

            color: var(--muted);
            font-size: 14px;
            margin-bottom: 20px;

        }

        .learn-more {

            color: var(--maroon);
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;

        }

        /* PROGRAMS */

        .program-card {

            background: #fff;
            border: 1px solid var(--border);
            height: 100%;
            overflow: hidden;
            transition: .3s;

        }

        .program-card:hover {

            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0,0,0,.10);

        }

        .program-image {

            height: 190px;
            background-size: cover;
            background-position: center;

        }

        .program-body {

            padding: 25px;

        }

        .program-category {

            color: var(--orange);
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;

        }

        .program-body h4 {

            font-size: 19px;
            margin: 8px 0 12px;

        }

        .program-body p {

            color: var(--muted);
            font-size: 14px;

        }

        /* SWIMMING */

        .swim-section {

            background:
                linear-gradient(
                    90deg,
                    rgba(10,25,45,.93),
                    rgba(10,25,45,.72)
                ),
                url("images/swim-confidence.png")
                center/cover no-repeat;

            color: #fff;

        }

        .swim-section .eyebrow {
            color: #8fc8ff;
        }

        .swim-section .section-text {
            color: rgba(255,255,255,.78);
        }

        .swim-feature {

            border: 1px solid rgba(255,255,255,.15);
            padding: 25px;
            height: 100%;
            background: rgba(255,255,255,.05);

        }

        .swim-feature i {

            font-size: 25px;
            color: #8fc8ff;
            margin-bottom: 15px;

        }

        .swim-feature h4 {

            font-size: 18px;

        }

        .swim-feature p {

            color: rgba(255,255,255,.70);
            font-size: 14px;
            margin: 0;

        }

        /* COMMUNITY */

        .community-image {

            min-height: 500px;
            background:
                url("images/community-activities.jpg.jpg")
                center/cover no-repeat;

        }

        .initiative-card {

            padding: 30px;
            background: #fff;
            border-left: 5px solid var(--maroon);
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.06);

        }

        .initiative-card h4 {

            margin-bottom: 8px;
            font-size: 21px;

        }

        .initiative-card p {

            margin: 0;
            color: var(--muted);
            font-size: 14px;

        }

        /* CTA */

        .cta {

            padding: 90px 0;
            background:
                linear-gradient(
                    90deg,
                    rgba(128,29,33,.97),
                    rgba(92,17,21,.95)
                );

            color: #fff;

        }

        .cta h2 {

            font-size: clamp(35px, 5vw, 60px);
            line-height: 1.05;

        }

        .cta p {

            color: rgba(255,255,255,.80);
            max-width: 700px;

        }

        /* CONTACT */

        .contact-card {

            border: 1px solid var(--border);
            padding: 30px;
            height: 100%;
            background: #fff;

        }

        .contact-icon {

            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--maroon);
            color: #fff;
            margin-bottom: 18px;

        }

        .contact-card h4 {
            font-size: 18px;
        }

        .contact-card p {

            color: var(--muted);
            margin: 0;

        }

        /* FOOTER */

        footer {

            background: var(--charcoal);
            color: #fff;
            padding-top: 70px;

        }

        .footer-logo {

            width: 180px;
            background: #fff;
            padding: 8px;

        }

        .footer-title {

            font-size: 15px;
            margin-bottom: 20px;

        }

        footer ul {

            list-style: none;
            padding: 0;
            margin: 0;

        }

        footer li {

            margin-bottom: 9px;

        }

        footer a {

            color: rgba(255,255,255,.70);
            font-size: 14px;

        }

        footer a:hover {
            color: #fff;
        }

        .footer-bottom {

            border-top: 1px solid rgba(255,255,255,.10);
            margin-top: 50px;
            padding: 20px 0;
            font-size: 13px;
            color: rgba(255,255,255,.60);

        }

        .footer-credit {

            text-align: right;
        }

        .footer-credit a {

            color: #fff;
            font-weight: 700;

        }

        /* WHATSAPP */

        .whatsapp {

            position: fixed;
            right: 22px;
            bottom: 22px;
            width: 58px;
            height: 58px;
            background: #25D366;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            z-index: 2000;
            box-shadow: 0 10px 25px rgba(0,0,0,.20);

        }

        .whatsapp:hover {
            color: #fff;
            transform: scale(1.07);
        }

        /* BACK TOP */

        #backTop {

            position: fixed;
            right: 25px;
            bottom: 95px;
            width: 42px;
            height: 42px;
            border: 0;
            background: var(--maroon);
            color: #fff;
            display: none;
            z-index: 1900;

        }

        /* RESPONSIVE */

        @media(max-width: 991px) {

            .navbar-brand img {
                width: 145px;
            }

            .hero {
                min-height: 600px;
            }

            .about-card {

                margin-left: 0;
                margin-top: 0;

            }

            .about-image {
                min-height: 350px;
            }

            .footer-credit {
                text-align: left;
                margin-top: 10px;
            }

        }

        @media(max-width: 767px) {

            .topbar {
                display: none;
            }

            .section {
                padding: 70px 0;
            }

            .hero h1 {
                font-size: 48px;
                letter-spacing: -2px;
            }

            .hero p {
                font-size: 17px;
            }

            .intro-box {
                border-right: 0;
                border-bottom: 1px solid rgba(255,255,255,.15);
            }

            .about-card {
                padding: 30px;
            }

            .about-card h2 {
                font-size: 34px;
            }

            .footer-bottom {
                text-align: center;
            }

            .footer-credit {
                text-align: center;
            }

        }

    </style>

</head>

<body>

<!-- =====================================================
     TOP BAR
===================================================== -->

<div class="topbar">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center">

            <div>
                Wellness • Swimming • Sports • Community
            </div>

            <div class="d-flex gap-4">

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

</div>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar navbar-expand-lg">

    <div class="container">

        <a class="navbar-brand" href="index.php">

            <img src="images/logo.jpg"
                 alt="Sache Fitness Group">

        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="mainNav">

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
                    <a class="nav-link" href="#community">
                        Community
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        Contact
                    </a>
                </li>

                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">

                    <a class="nav-link btn-sache"
                       href="login.php">

                        <i class="fa-solid fa-right-to-bracket"></i>
                        Member Login

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>


<!-- =====================================================
     HERO
===================================================== -->

<section class="hero" id="home">

    <div class="container">

        <div class="hero-content">

            <div class="hero-label">
                Sache Fitness Group
            </div>

            <h1>
                Stronger.<br>
                <span>Healthier.</span><br>
                Together.
            </h1>

            <p>
                Inspiring healthier lifestyles, empowering families
                and impacting communities through wellness, swimming,
                sports and meaningful experiences.
            </p>

            <div class="hero-buttons">

                <a href="registration.php"
                   class="btn-orange">

                    Join Sache
                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </a>

                <a href="#programs"
                   class="btn-outline-light-custom">

                    Explore Programs

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     INTRO STRIP
===================================================== -->

<section class="intro-strip">

    <div class="container">

        <div class="row g-0">

            <div class="col-md-4">

                <div class="intro-box">

                    <i class="fa-solid fa-heart-pulse"></i>

                    <h5>
                        Wellness
                    </h5>

                    <p>
                        Mind, Body & Spirit
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="intro-box">

                    <i class="fa-solid fa-person-swimming"></i>

                    <h5>
                        Swimming
                    </h5>

                    <p>
                        Confidence, Skills & Performance
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="intro-box">

                    <i class="fa-solid fa-people-group"></i>

                    <h5>
                        Community
                    </h5>

                    <p>
                        We grow together
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     ABOUT
===================================================== -->

<section class="section" id="about">

    <div class="container">

        <div class="row align-items-center g-0">

            <div class="col-lg-6">

                <div class="about-image"></div>

            </div>

            <div class="col-lg-6">

                <div class="about-card">

                    <div class="eyebrow">
                        About Sache
                    </div>

                    <h2 class="section-title">
                        More than fitness.
                        <br>
                        It's a lifestyle.
                    </h2>

                    <p class="section-text">

                        Sache Fitness Group exists to inspire healthier
                        lifestyles, empower families and create positive
                        impact within communities.

                    </p>

                    <p class="section-text">

                        Through fitness, swimming, wellness, sports,
                        corporate experiences and community initiatives,
                        we create opportunities for people to move,
                        connect, grow and live healthier lives.

                    </p>

                    <a href="#divisions"
                       class="btn-sache">

                        Discover Sache

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     VALUES
===================================================== -->

<section class="section section-light">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">
                What guides us
            </div>

            <h2 class="section-title">
                Our Core Values
            </h2>

            <p class="section-text mx-auto"
               style="max-width:700px">

                The principles behind how we serve our members,
                families, organisations and communities.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="fa-solid fa-handshake"></i>
                    </div>

                    <h4>
                        Honest Business
                    </h4>

                    <p>
                        We operate with honesty, integrity and
                        transparency.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="fa-solid fa-people-group"></i>
                    </div>

                    <h4>
                        Community & Fellowship
                    </h4>

                    <p>
                        We believe that healthier lives are built
                        together.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <h4>
                        Holistic Wellness
                    </h4>

                    <p>
                        We care about the mind, body and spirit.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="value-card">

                    <div class="value-icon">
                        <i class="fa-solid fa-shield-heart"></i>
                    </div>

                    <h4>
                        Stewardship & Accountability
                    </h4>

                    <p>
                        We take responsibility for the people
                        and communities we serve.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     DIVISIONS
===================================================== -->

<section class="section" id="divisions">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">
                Our divisions
            </div>

            <h2 class="section-title">
                One Group. Many Ways to Grow.
            </h2>

            <p class="section-text mx-auto"
               style="max-width:760px">

                Explore the different Sache experiences designed
                for individuals, children, families, organisations
                and communities.

            </p>

        </div>

        <div class="row g-4">

            <?php foreach ($divisions as $division): ?>

                <?php

                $divisionName = $division['name'];

                $image = isset($divisionImages[$divisionName])
                    ? $divisionImages[$divisionName]
                    : 'images/outdoor-garden.jpg.jpg';

                $icon = isset($divisionIcons[$divisionName])
                    ? $divisionIcons[$divisionName]
                    : 'fa-star';

                $color = isset($divisionColors[$divisionName])
                    ? $divisionColors[$divisionName]
                    : '#801D21';

                ?>

                <div class="col-md-6 col-lg-4">

                    <div class="division-card">

                        <div class="division-image"
                             style="background-image:url('<?php echo e($image); ?>')">

                            <div class="division-overlay"></div>

                            <div class="division-icon"
                                 style="background:<?php echo e($color); ?>">

                                <i class="fa-solid <?php echo e($icon); ?>"></i>

                            </div>

                        </div>

                        <div class="division-body">

                            <h3>
                                <?php echo e($divisionName); ?>
                            </h3>

                            <p>
                                <?php echo e($division['description']); ?>
                            </p>

                            <a href="#programs"
                               class="learn-more">

                                Explore Programs
                                <i class="fa-solid fa-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>


<!-- =====================================================
     PROGRAMS
===================================================== -->

<section class="section section-light"
         id="programs">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">
                Our programs
            </div>

            <h2 class="section-title">
                Find Your Sache Experience
            </h2>

            <p class="section-text mx-auto"
               style="max-width:750px">

                Our programme catalogue is connected to the
                Sache registration system. Choose an experience
                that fits your goals.

            </p>

        </div>

        <div class="row g-4">

            <?php

            $featuredPrograms = array_slice($programs, 0, 8);

            foreach ($featuredPrograms as $program):

                $programName = $program['name'];

                $programImage = isset($programImages[$programName])
                    ? $programImages[$programName]
                    : 'images/outdoor-garden.jpg.jpg';

            ?>

                <div class="col-md-6 col-lg-3">

                    <div class="program-card">

                        <div class="program-image"
                             style="background-image:url('<?php echo e($programImage); ?>')">
                        </div>

                        <div class="program-body">

                            <div class="program-category">

                                <?php echo e($program['division_name']); ?>

                            </div>

                            <h4>
                                <?php echo e($programName); ?>
                            </h4>

                            <p>

                                <?php

                                echo e(
                                    $program['description']
                                    ?: 'Discover a healthier and more active lifestyle with Sache Fitness Group.'
                                );

                                ?>

                            </p>

                            <a href="registration.php"
                               class="learn-more">

                                Register
                                <i class="fa-solid fa-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="text-center mt-5">

            <a href="registration.php"
               class="btn-sache">

                View Registration Options

            </a>

        </div>

    </div>

</section>


<!-- =====================================================
     SWIMMING
===================================================== -->

<section class="section swim-section"
         id="swimming">

    <div class="container">

        <div class="row align-items-center mb-5">

            <div class="col-lg-8">

                <div class="eyebrow">
                    Sache Swim Club
                </div>

                <h2 class="section-title">

                    Building confidence
                    <br>
                    one stroke at a time.

                </h2>

                <p class="section-text">

                    From beginners learning their first strokes to
                    advanced swimmers pursuing performance, Sache
                    Swim Club provides structured swimming development,
                    water safety and confidence.

                </p>

            </div>

            <div class="col-lg-4 text-lg-end">

                <a href="registration.php"
                   class="btn-orange">

                    Join Swim Club

                </a>

            </div>

        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="swim-feature">

                    <i class="fa-solid fa-person-swimming"></i>

                    <h4>
                        Beginners
                    </h4>

                    <p>
                        Build essential swimming skills
                        and water confidence.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="swim-feature">

                    <i class="fa-solid fa-water"></i>

                    <h4>
                        Stroke Mastery
                    </h4>

                    <p>
                        Improve technique, efficiency
                        and swimming ability.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="swim-feature">

                    <i class="fa-solid fa-medal"></i>

                    <h4>
                        Competition
                    </h4>

                    <p>
                        Structured training for swimmers
                        pursuing performance.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="swim-feature">

                    <i class="fa-solid fa-shield-heart"></i>

                    <h4>
                        Water Safety
                    </h4>

                    <p>
                        Develop practical water safety
                        and confidence.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     COMMUNITY
===================================================== -->

<section class="section"
         id="community">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <div class="community-image"></div>

            </div>

            <div class="col-lg-6">

                <div class="eyebrow">
                    Community Initiative
                </div>

                <h2 class="section-title">
                    Impact beyond fitness.
                </h2>

                <p class="section-text mb-4">

                    Sache believes that healthier communities are
                    created when people have access to opportunity,
                    support and positive environments.

                </p>

                <div class="initiative-card">

                    <h4>
                        <i class="fa-solid fa-water me-2"
                           style="color:var(--maroon)"></i>

                        Swim4Change
                    </h4>

                    <p>
                        Community swimming sponsorship helping
                        children from underprivileged homes access
                        swimming opportunities.
                    </p>

                </div>

                <div class="initiative-card">

                    <h4>
                        <i class="fa-solid fa-heart me-2"
                           style="color:var(--maroon)"></i>

                        Devoted Moms
                    </h4>

                    <p>
                        A safe and supportive community inspiring
                        women to become healthier and nurture
                        their children.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     BRAND MESSAGE
===================================================== -->

<section class="section section-light">

    <div class="container">

        <div class="row text-center g-4">

            <div class="col-md-3">

                <div class="eyebrow">
                    Community
                </div>

                <h3>
                    We grow together
                </h3>

            </div>

            <div class="col-md-3">

                <div class="eyebrow">
                    Wellness
                </div>

                <h3>
                    Mind, Body & Spirit
                </h3>

            </div>

            <div class="col-md-3">

                <div class="eyebrow">
                    Sports
                </div>

                <h3>
                    Performance & Fun
                </h3>

            </div>

            <div class="col-md-3">

                <div class="eyebrow">
                    Empowerment
                </div>

                <h3>
                    Purpose · Confidence · Impact
                </h3>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     CTA
===================================================== -->

<section class="cta">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2>
                    Your healthier lifestyle
                    starts here.
                </h2>

                <p>

                    Whether you want to improve your fitness,
                    learn to swim, support your family or create
                    meaningful experiences for your organisation,
                    there is a place for you at Sache.

                </p>

            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                <a href="registration.php"
                   class="btn-orange">

                    Start Your Sache Journey
                    <i class="fa-solid fa-arrow-right ms-2"></i>

                </a>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     CONTACT
===================================================== -->

<section class="section section-light"
         id="contact">

    <div class="container">

        <div class="text-center mb-5">

            <div class="eyebrow">
                Contact Sache
            </div>

            <h2 class="section-title">
                We'd love to hear from you.
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="contact-card">

                    <div class="contact-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <h4>
                        Main Location
                    </h4>

                    <p>
                        Kahawa House,
                        Kiambu Town,
                        Next to Shell Petrol Station.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="contact-card">

                    <div class="contact-icon">
                        <i class="fa-solid fa-person-swimming"></i>
                    </div>

                    <h4>
                        Swimming Location
                    </h4>

                    <p>
                        Ndumberi,
                        Kiambu Road,
                        Nairobi, Kenya.
                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="contact-card">

                    <div class="contact-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <h4>
                        Phone
                    </h4>

                    <p>

                        <a href="tel:0712770161"
                           style="color:var(--maroon);font-weight:700">

                            0712 770 161

                        </a>

                    </p>

                </div>

            </div>

            <div class="col-md-6 col-lg-3">

                <div class="contact-card">

                    <div class="contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <h4>
                        Email
                    </h4>

                    <p>

                        <a href="mailto:sachefitness25@gmail.com"
                           style="color:var(--maroon);font-weight:700">

                            sachefitness25@gmail.com

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- =====================================================
     FOOTER
===================================================== -->

<footer>

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-5">

                <img src="images/logo.png"
                     alt="Sache Fitness Group"
                     class="footer-logo mb-4">

                <p style="color:rgba(255,255,255,.65);max-width:450px">

                    Inspiring healthier lifestyles,
                    empowering families and impacting communities.

                </p>

                <div class="d-flex gap-3 mt-4">

                    <a href="https://www.facebook.com/ChegeSara"
                       target="_blank"
                       aria-label="Facebook">

                        <i class="fa-brands fa-facebook fa-lg"></i>

                    </a>

                    <a href="https://www.instagram.com/sachefitt/"
                       target="_blank"
                       aria-label="Instagram">

                        <i class="fa-brands fa-instagram fa-lg"></i>

                    </a>

                    <a href="https://ke.linkedin.com/in/coachsache-sachefitness"
                       target="_blank"
                       aria-label="LinkedIn">

                        <i class="fa-brands fa-linkedin fa-lg"></i>

                    </a>

                </div>

            </div>

            <div class="col-6 col-lg-2">

                <h5 class="footer-title">
                    Explore
                </h5>

                <ul>

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
                        <a href="#community">Community</a>
                    </li>

                </ul>

            </div>

            <div class="col-6 col-lg-2">

                <h5 class="footer-title">
                    Member
                </h5>

                <ul>

                    <li>
                        <a href="registration.php">
                            Register
                        </a>
                    </li>

                    <li>
                        <a href="login.php">
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="login.php">
                            Member Portal
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-3">

                <h5 class="footer-title">
                    Contact
                </h5>

                <p style="color:rgba(255,255,255,.65);font-size:14px">

                    <i class="fa-solid fa-phone me-2"></i>
                    0712 770 161

                </p>

                <p style="color:rgba(255,255,255,.65);font-size:14px">

                    <i class="fa-solid fa-envelope me-2"></i>
                    sachefitness25@gmail.com

                </p>

                <p style="color:rgba(255,255,255,.65);font-size:14px">

                    <i class="fa-solid fa-location-dot me-2"></i>
                    Kiambu, Kenya

                </p>

            </div>

        </div>


        <div class="footer-bottom">

            <div class="row align-items-center">

                <div class="col-md-6">

                    © <?php echo date('Y'); ?>
                    Sache Fitness Group.
                    All Rights Reserved.

                </div>

                <div class="col-md-6 footer-credit">

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

    </div>

</footer>


<!-- =====================================================
     WHATSAPP
===================================================== -->

<a class="whatsapp"
   href="https://wa.me/254712770161?text=Hi%20Sache%20Fitness%2C%20I%20need%20more%20information%20about%20your%20programs."
   target="_blank"
   aria-label="Chat on WhatsApp">

    <i class="fa-brands fa-whatsapp"></i>

</a>


<!-- =====================================================
     BACK TO TOP
===================================================== -->

<button id="backTop"
        aria-label="Back to top">

    <i class="fa-solid fa-arrow-up"></i>

</button>


<!-- =====================================================
     BOOTSTRAP
===================================================== -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

    /* Back to top */

    const backTop =
        document.getElementById("backTop");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 500) {

            backTop.style.display = "block";

        } else {

            backTop.style.display = "none";

        }

    });

    backTop.addEventListener("click", function () {

        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });

    });


    /* Close mobile navigation after clicking */

    document.querySelectorAll(
        ".navbar-nav .nav-link"
    ).forEach(function(link) {

        link.addEventListener("click", function() {

            const nav =
                document.getElementById("mainNav");

            if (
                nav.classList.contains("show")
            ) {

                const collapse =
                    bootstrap.Collapse.getInstance(nav);

                if (collapse) {
                    collapse.hide();
                }

            }

        });

    });


    /* Smooth scrolling */

    document.querySelectorAll(
        'a[href^="#"]'
    ).forEach(function(anchor) {

        anchor.addEventListener("click", function(e) {

            const target =
                document.querySelector(
                    this.getAttribute("href")
                );

            if (target) {

                e.preventDefault();

                const offset = 80;

                const position =
                    target.getBoundingClientRect().top
                    + window.scrollY
                    - offset;

                window.scrollTo({

                    top: position,
                    behavior: "smooth"

                });

            }

        });

    });

</script>

</body>
</html>