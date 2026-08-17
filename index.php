<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sache | Wellness, Swimming & Community Impact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
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
            background-image: radial-gradient(rgba(82, 43, 122, 0.1) 1.5px, transparent 1.5px);
            background-size: 24px 24px;
            color: var(--text-dark);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            letter-spacing: -0.2px;
            color: var(--text-dark);
        }

        /* Nav Section - PF Purple Background */
        .navbar-custom {
            background-color: var(--pf-purple);
            border-bottom: 4px solid var(--pf-yellow);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar-custom a {
            color: #ffffff;
            margin: 0 12px;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .navbar-custom a:hover {
            color: var(--pf-yellow);
        }

        .navbar-brand-img {
            height: 42px;
            margin-right: 15px;
            vertical-align: middle;
            border-radius: 4px;
        }

        /* Hero Section with Purple-Tinted Video Background */
        .hero {
            position: relative;
            height: 80vh; 
            min-height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden; 
            text-align: center;
            padding: 0 20px;
            border-bottom: 1px solid var(--panel-border);
        }

        .video-background-container {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100vw;
            height: 56.25vw; 
            min-height: 100vh;
            min-width: 177.77vh; 
            transform: translate(-50%, -50%) scale(1.8); 
            z-index: 1;
            pointer-events: none; 
        }

        .video-background-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            overflow: hidden;
        }

        /* Rich Purple Gradient Overlay */
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, rgba(82, 43, 122, 0.55) 0%, rgba(35, 8, 66, 0.92) 100%);
            z-index: 2;
        }

        .hero .container {
            position: relative;
            z-index: 3;
        }

        .hero h1 {
            font-size: 76px;
            margin-bottom: 20px;
            font-weight: 900;
            letter-spacing: -1px;
            color: #ffffff;
            text-shadow: 0 4px 15px rgba(0,0,0,0.4);
        }

        .hero p {
            font-size: 21px;
            font-weight: 500;
            max-width: 750px;
            margin: 0 auto 40px auto;
            color: #f1f5f9;
            line-height: 1.6;
            text-shadow: 0 2px 10px rgba(0,0,0,0.4);
        }

        /* High-Impact Yellow/Gold Action Button */
        .btn-action {
            background-color: var(--pf-yellow);
            color: var(--text-dark) !important;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 16px 45px;
            border-radius: 50px; /* Rounded pill style */
            border: none;
            box-shadow: 0 4px 15px rgba(255, 204, 0, 0.4);
            transition: all 0.3s ease;
        }

        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 22px rgba(255, 204, 0, 0.6);
            background-color: #ffd633;
        }

        /* Section Container - Floating Card Styling */
        .section {
            padding: 40px 0; 
        }

        .section .container {
            background-color: var(--bg-light);
            border: 1px solid var(--panel-border);
            border-radius: 16px; /* Soft curved corners */
            padding: 60px 50px;
            box-shadow: 0 15px 35px rgba(82, 43, 122, 0.05);
        }

        @media (max-width: 768px) {
            .section .container {
                padding: 40px 20px;
            }
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            font-size: 40px;
            position: relative;
            color: var(--pf-purple);
            font-weight: 900;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 5px;
            background-color: var(--pf-yellow); 
            margin: 15px auto 0 auto;
            border-radius: 50px;
        }

        /* Division Cards */
        .division-card {
            background-color: var(--bg-light);
            border: 1px solid var(--panel-border);
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden; 
            box-shadow: 0 4px 12px rgba(82, 43, 122, 0.03);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            text-align: center;
        }

        .division-card:hover {
            transform: translateY(-5px);
            border-color: var(--pf-purple);
            box-shadow: 0 10px 25px rgba(82, 43, 122, 0.1);
        }

        .division-card img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .division-card:hover img {
            transform: scale(1.04); 
        }

        .division-card-body {
            padding: 25px 20px;
        }

        .division-card h4 {
            color: var(--pf-purple);
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .division-card p {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
            margin: 0;
        }

        /* Clean Program Cards */
        .program-card {
            background-color: var(--bg-light);
            border: 1px solid var(--panel-border);
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(82, 43, 122, 0.03);
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .program-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(82, 43, 122, 0.08);
            border-color: var(--pf-purple);
        }

        .program-card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .program-card:hover img {
            transform: scale(1.04); 
        }

        .program-card-body {
            padding: 20px;
            border-top: 4px solid var(--panel-border);
        }

        .program-card:hover .program-card-body {
            border-top-color: var(--pf-purple);
        }

        .program-card-body h4 {
            font-size: 18px;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .program-card-body p {
            color: var(--text-muted);
            font-size: 13px;
            line-height: 1.7;
            margin: 0;
        }

        /* Planet Fitness Membership Tile Layouts */
        .pricing-card {
            background-color: var(--bg-light);
            padding: 40px 30px;
            border-radius: 16px;
            border: 2px solid var(--panel-border);
            margin-bottom: 30px;
            position: relative;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        /* Distinct highlighted look for the Premium Package */
        .pricing-card.premium-tier {
            border-color: var(--pf-purple);
            box-shadow: 0 10px 30px rgba(82, 43, 122, 0.1);
        }

        .pricing-card.premium-tier::before {
            content: 'BEST VALUE';
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--pf-yellow);
            color: var(--text-dark);
            padding: 5px 20px;
            font-weight: 800;
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            border-radius: 50px;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(82, 43, 122, 0.12);
            border-color: var(--pf-purple);
        }

        .pricing-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(82, 43, 122, 0.15);
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .pricing-card:hover img {
            transform: scale(1.02); 
        }

        .pricing-card h4 {
            color: var(--pf-purple);
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .pricing-card p {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
        }

        /* Call To Action Container Card */
        .cta .container {
            background: linear-gradient(135deg, var(--pf-purple) 0%, #20083a 100%);
            border-top: 4px solid var(--pf-yellow);
            border-bottom: 4px solid var(--pf-yellow);
            text-align: center;
            padding: 80px 20px;
            color: white;
            box-shadow: 0 15px 35px rgba(82, 43, 122, 0.2);
        }

        .cta h2 {
            font-size: 38px;
            margin-bottom: 30px;
            color: white;
            font-weight: 900;
        }

        /* Footer Section */
        .footer {
            background-color: var(--pf-purple);
            color: #d8bdf2;
            text-align: center;
            padding: 35px;
            font-size: 14px;
            border-top: 4px solid var(--pf-yellow);
        }

        .about-logo-box {
            background: #000;
            padding: 40px;
            border-radius: 12px;
            border: 2px solid var(--panel-border);
            box-shadow: 0 10px 30px rgba(82, 43, 122, 0.15);
            margin-top: 20px;
        }

        .btn-portal {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 25px;
            margin: 10px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-portal:hover {
            transform: translateY(-2px);
        }

        .badge-crossfit {
            background-color: var(--pf-yellow); 
            color: var(--text-dark);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            display: inline-block;
            margin-bottom: 15px;
            text-transform: uppercase;
            box-shadow: 0 2px 8px rgba(255, 204, 0, 0.2);
        }

        /* Scroll Animation classes (Observer targets) */
        .scroll-animate {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                        transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .scroll-animate.reveal {
            opacity: 1;
            transform: translateY(0);
        }

        /* Unified Social Icons Styling */
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 25px 0;
        }

        .social-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--text-dark) !important;
            background-color: var(--bg-canvas);
            border: 1px solid var(--panel-border);
            text-decoration: none !important;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            color: white !important;
            transform: translateY(-3px);
        }

        .social-icon.fb:hover { background-color: #1877f2; border-color: #1877f2; }
        .social-icon.ig:hover { background-color: #e1306c; border-color: #e1306c; }
        .social-icon.li:hover { background-color: #0077b5; border-color: #0077b5; }
        .social-icon.wa:hover { background-color: #25d366; border-color: #25d366; }

        /* Floating WhatsApp Button widget styles */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.08);
        }

        .whatsapp-float a {
            background-color: #25d366;
            color: #fff !important;
            width: 60px;
            height: 60px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
            font-size: 32px;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            position: relative;
        }

        .online-indicator {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            background-color: #00e676;
            border: 2px solid #fff;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 230, 118, 0.8);
        }

        .whatsapp-tooltip {
            position: absolute;
            right: 75px;
            top: 50%;
            transform: translateY(-50%);
            background-color: var(--pf-purple);
            color: #fff;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .whatsapp-float:hover .whatsapp-tooltip {
            opacity: 1;
            visibility: visible;
        }

        /* CUSTOM PLANET FITNESS STYLE CHATBOT WIDGET */
        .chatbot-widget {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 1000;
            font-family: 'Inter', sans-serif;
        }

        .chatbot-btn {
            background-color: var(--pf-purple);
            color: #fff !important;
            width: 60px;
            height: 60px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(82, 43, 122, 0.3);
            border: 2px solid #fff;
            position: relative;
            transition: transform 0.3s ease;
        }

        .chatbot-btn:hover {
            transform: scale(1.08);
        }

        .chatbot-btn .online-dot {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 12px;
            height: 12px;
            background-color: #00e676;
            border: 2px solid #fff;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 230, 118, 0.8);
        }

        .chatbot-window {
            position: absolute;
            bottom: 75px;
            left: 0;
            width: 320px;
            max-height: 450px;
            background: #fff;
            border-radius: 12px;
            border: 1px solid var(--panel-border);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .chatbot-window.active {
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        .chatbot-header {
            background: var(--pf-purple);
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid var(--pf-yellow);
        }

        .chatbot-header h4 {
            margin: 0;
            font-size: 14px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            color: #fff;
            text-transform: uppercase;
        }

        .chatbot-close {
            background: none;
            border: none;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            opacity: 0.8;
            outline: none !important;
        }

        .chatbot-close:hover {
            opacity: 1;
        }

        .chatbot-body {
            padding: 15px;
            overflow-y: auto;
            flex-grow: 1;
            max-height: 250px;
            background-color: var(--bg-canvas);
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chat-msg {
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 13px;
            line-height: 1.5;
            max-width: 85%;
        }

        .chat-msg.bot {
            background-color: #fff;
            color: var(--text-dark);
            align-self: flex-start;
            border: 1px solid var(--panel-border);
            border-bottom-left-radius: 2px;
        }

        .chat-msg.user {
            background-color: var(--pf-purple);
            color: #fff;
            align-self: flex-end;
            border-bottom-right-radius: 2px;
        }

        .chatbot-footer {
            padding: 10px;
            background: #fff;
            border-top: 1px solid var(--panel-border);
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .chat-reply-btn {
            background: #f1f5f9;
            border: 1px solid #cbd5e1;
            color: var(--text-dark);
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            text-align: left;
            outline: none !important;
            transition: all 0.2s ease;
        }

        .chat-reply-btn:hover {
            background: var(--pf-purple);
            color: #fff;
            border-color: var(--pf-purple);
        }
    </style>
</head>

<body>

<!-- CHATBOT WIDGET -->
<div class="chatbot-widget">
    <!-- Chat Button -->
    <div class="chatbot-btn" onclick="toggleChat()">
        <i class="fas fa-robot"></i>
        <span class="online-dot"></span>
    </div>
    
    <!-- Chat Window popup -->
    <div class="chatbot-window" id="chatbot-window">
        <div class="chatbot-header">
            <h4>Sache Assistant</h4>
            <button class="chatbot-close" onclick="toggleChat()">&times;</button>
        </div>
        
        <div class="chatbot-body" id="chat-history">
            <div class="chat-msg bot">
                Hi there! I am your Sache Assistant. How can I help you today?
            </div>
        </div>
        
        <div class="chatbot-footer">
            <button class="chat-reply-btn" onclick="sendReply('🏊 Swimming Programs')">🏊 Swimming Programs</button>
            <button class="chat-reply-btn" onclick="sendReply('📍 Where are you located?')">📍 Where are you located?</button>
            <button class="chat-reply-btn" onclick="sendReply('📝 How to register?')">📝 How to register?</button>
            <button class="chat-reply-btn" onclick="sendReply('💬 Talk to a Coach')">💬 Talk to a Coach</button>
        </div>
    </div>
</div>

<!-- FLOATING WHATSAPP CHAT BUTTON -->
<div class="whatsapp-float">
    <a href="https://wa.me/254712770161?text=Hi%20Sache%20Fitness%2C%20I%20need%20more%20help%20with%20your%20programs%21" target="_blank">
        <span class="whatsapp-tooltip">Need help? We're online!</span>
        <i class="fab fa-whatsapp"></i>
        <span class="online-indicator"></span>
    </a>
</div>

<!-- Navigation Bar -->
<nav class="navbar navbar-custom">
    <div class="container-fluid text-center" style="max-width: 1200px; padding: 0 15px;">
        <img src="images/logo.jpg" alt="Sache Logo" class="navbar-brand-img">
        <a href="#">HOME</a>
        <a href="#about">ABOUT</a>
        <a href="#divisions">DIVISIONS</a>
        <a href="#programs">PROGRAMS</a>
        <a href="#pricing">RATES</a>
        <a href="#blog">BLOG</a> <!-- Integrated Blog menu link -->
        <a href="#contact">CONTACT</a>
        <a href="login.php">LOGIN</a>
    </div>
</nav>

<!-- Hero Section with Background Video -->
<section class="hero">
    <div class="video-background-container">
        <!-- converted Facebook Reel to standard Watch Plugin format with permissions policy resolve -->
        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fwatch%2F%3Fv%3D1515182083646883&show_text=false&autoplay=true&mute=true" scrolling="no" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share; unload" allowFullScreen="true"></iframe>
    </div>
    
    <!-- Video Dark Mask Overlay -->
    <div class="hero-overlay"></div>

    <div class="container">
        <h1>SACHE</h1>
        <p>
            Transforming Lives Through Wellness, Swimming, Youth Development and Community Impact
        </p>
        <a href="registration.php" class="btn btn-lg btn-action">
            Register Now
        </a>
    </div>
</section>

<!-- About Section (Floating Card) -->
<section id="about" class="section">
    <div class="container scroll-animate">
        <h2 class="section-title">About Sache</h2>
        <div class="row">
            <div class="col-md-7">
                <span class="badge-crossfit">Where You Belong</span>
                <p class="lead" style="color: var(--pf-purple); font-weight: 700;">
                    Inspiring healthier lifestyles, empowering families, impacting communities.
                </p>
                <p style="color: var(--text-muted); line-height: 1.8; font-size: 15px;">
                    Sache is a multi-division organization dedicated to improving lives through wellness programs, aquatic development, youth empowerment, corporate engagement and social impact initiatives.
                </p>

                <h3 style="margin-top: 35px; font-size: 20px; color: var(--pf-purple);">Our Vision</h3>
                <p style="color: var(--text-muted); line-height: 1.8;">
                    To build healthier, stronger and empowered communities through wellness, sport and social impact.
                </p>

                <h3 style="margin-top: 25px; font-size: 20px; color: var(--pf-purple);">Our Mission</h3>
                <p style="color: var(--text-muted); line-height: 1.8;">
                    To provide innovative wellness, aquatic, youth and community development programs that transform lives.
                </p>
            </div>
            
            <div class="col-md-5 text-center">
                <div class="about-logo-box">
                    <img src="images/logo.jpg" alt="Sache Fitness Logo" class="img-responsive center-block" style="max-height: 220px;">
                </div>
                <p style="margin-top: 15px; font-size: 13px; color: var(--text-muted);">
                    Located at <strong>Kahawa House, Kiambu Town</strong> (Next to Shell Petrol Station)
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Divisions Section (Floating Card with updated Images) -->
<section id="divisions" class="section">
    <div class="container scroll-animate">
        <h2 class="section-title">Our Divisions</h2>
        <div class="row">
            
            <!-- 1. Sache Wellness -->
            <div class="col-md-4">
                <div class="division-card">
                    <img src="images/wellness-plank.jpg" alt="Sache Wellness Plank">
                    <div class="division-card-body">
                        <h4>Sache Wellness</h4>
                        <p>Virtual coaching, fitness plans, wellness support and nutrition guidance.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Sache Swim Club -->
            <div class="col-md-4">
                <div class="division-card">
                    <img src="images/swim-lessons.jpg" alt="Sache Swim Club Lessons">
                    <div class="division-card-body">
                        <h4>Sache Swim Club</h4>
                        <p>Learn-to-swim programs, squad training and competitions.</p>
                    </div>
                </div>
            </div>

            <!-- 3. Sache Corporate -->
            <div class="col-md-4">
                <div class="division-card">
                    <img src="images/corp-teambuilding.jpg" alt="Sache Corporate Teambuilding">
                    <div class="division-card-body">
                        <h4>Sache Corporate</h4>
                        <p>Corporate wellness, team building and employee engagement.</p>
                    </div>
                </div>
            </div>

            <!-- 4. Sache Kids -->
            <div class="col-md-6">
                <div class="division-card">
                    <img src="images/community-group.jpg" alt="Sache Kids Family Group">
                    <div class="division-card-body">
                        <h4>Sache Kids</h4>
                        <p>Youth development, swimming programs and holiday camps.</p>
                    </div>
                </div>
            </div>

            <!-- 5. Social Impact -->
            <div class="col-md-6">
                <div class="division-card">
                    <img src="images/adult-swim.jpg" alt="Sache Social Impact Swim">
                    <div class="division-card-body">
                        <h4>Social Impact</h4>
                        <p>Community outreach, sponsorships and Swim4Change initiatives.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Featured Programs Section (Floating Card) -->
<section id="programs" class="section">
    <div class="container scroll-animate">
        <h2 class="section-title">Featured Programs</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="program-card">
                    <img src="images/wellness-fasting.jpg" alt="Virtual Coaching">
                    <div class="program-card-body">
                        <h4>Virtual Coaching</h4>
                        <p>Guidance on reflection, fasting, fitness routines, and overall wellness.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="program-card">
                    <img src="images/swim-coach.jpg" alt="Certified Coaching">
                    <div class="program-card-body">
                        <h4>Certified Coaching</h4>
                        <p>Beginner to advanced lessons led by friendly, certified instructors.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="program-card">
                    <img src="images/swim-exercise.jpg" alt="Group Sessions">
                    <div class="program-card-body">
                        <h4>Group Sessions</h4>
                        <p>Friendly and safe environments built to improve your water confidence.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="program-card">
                    <img src="images/swim-confidence.jpg" alt="Swim Success">
                    <div class="program-card-body">
                        <h4>Swim Success</h4>
                        <p>You already have what it takes. We help you bring it out.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rates and Packages Section (Floating Cards Styled like Planet Fitness Tiers) -->
<section id="pricing" class="section">
    <div class="container scroll-animate">
        <h2 class="section-title">Swimming Rates & Packages</h2>
        <p class="text-center" style="font-size: 16px; margin-bottom: 50px; color: var(--text-muted); font-weight: 500;">
            Weekday and weekend swimming sessions available at <strong>Ndumberi, Kiambu road</strong>.
        </p>
        
        <div class="row">
            <!-- Classic-Style Tier -->
            <div class="col-md-6">
                <div class="pricing-card text-center">
                    <img src="images/flyer-single.jpg" alt="Sache Swimming Rates Per Lesson">
                    <h4>Single Lesson Plan</h4>
                    <p>Ideal for beginners and advanced swimmers looking for flexible training options.</p>
                </div>
            </div>

            <!-- Black-Card-Style Tier (Premium highlight) -->
            <div class="col-md-6">
                <div class="pricing-card premium-tier text-center">
                    <img src="images/flyer-package.jpg" alt="Sache Adult Swimming Package">
                    <h4>Beginner's Package</h4>
                    <p>Complete adult beginner's swimming training packages with personalized guidance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEW SECTION: BLOG / RECENT ARTICLES (SEO & SEM OPTIMIZED) -->
<section id="blog" class="section">
    <div class="container scroll-animate">
        <h2 class="section-title">Latest From Our Blog</h2>
        <p class="text-center" style="font-size: 16px; margin-bottom: 50px; color: var(--text-muted); font-weight: 500;">
            Tips, stories, and expert guidance to fuel your wellness and aquatic journey.
        </p>
        <div class="row">
            <!-- Blog Post 1 -->
            <div class="col-md-4">
                <div class="program-card">
                    <img src="images/adult-swim.jpg" alt="Adult Swimming Lessons Kiambu">
                    <div class="program-card-body">
                        <span class="badge-crossfit" style="font-size: 10px; padding: 4px 10px; margin-bottom: 10px;">Swim Club</span>
                        <h4>Overcoming Fear: Learning to Swim as an Adult</h4>
                        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px;">
                            Discover why it is never too late to conquer your fear of water and build life-saving skills under certified coaches in Kiambu.
                        </p>
                        <a href="#" style="color: var(--pf-purple); font-weight: 700; text-transform: uppercase; font-size: 12px; font-family: 'Montserrat', sans-serif; text-decoration: none;">Read Full Article &rarr;</a>
                    </div>
                </div>
            </div>
            <!-- Blog Post 2 -->
            <div class="col-md-4">
                <div class="program-card">
                    <img src="images/wellness-fasting.jpg" alt="Wellness and Fasting Coach Kenya">
                    <div class="program-card-body">
                        <span class="badge-crossfit" style="font-size: 10px; padding: 4px 10px; margin-bottom: 10px;">Wellness & Nutrition</span>
                        <h4>The Power of Fasting and Holistic Reflection</h4>
                        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px;">
                            Explore how combining daily reflection, hydration, and structured fasting can reset your body, mind, and spiritual focus.
                        </p>
                        <a href="#" style="color: var(--pf-purple); font-weight: 700; text-transform: uppercase; font-size: 12px; font-family: 'Montserrat', sans-serif; text-decoration: none;">Read Full Article &rarr;</a>
                    </div>
                </div>
            </div>
            <!-- Blog Post 3 -->
            <div class="col-md-4">
                <div class="program-card">
                    <img src="images/community-group.jpg" alt="Swim4Change Social Impact Kenya">
                    <div class="program-card-body">
                        <span class="badge-crossfit" style="font-size: 10px; padding: 4px 10px; margin-bottom: 10px;">Social Impact</span>
                        <h4>Swim4Change: Empowering Local Families</h4>
                        <p style="font-size: 13px; color: var(--text-muted); margin-bottom: 15px;">
                            How our community outreach and water safety sponsorships are transforming lives and creating safe environments for youth in Kiambu.
                        </p>
                        <a href="#" style="color: var(--pf-purple); font-weight: 700; text-transform: uppercase; font-size: 12px; font-family: 'Montserrat', sans-serif; text-decoration: none;">Read Full Article &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call To Action Section (Floating Card) -->
<section class="cta section">
    <div class="container scroll-animate">
        <h2>Ready To Join A Sache Program?</h2>
        <a href="registration.php" class="btn btn-lg btn-action">
            Register Now
        </a>
    </div>
</section>

<!-- Contact Us / Portal Area (Floating Card) -->
<section id="contact" class="section">
    <div class="container scroll-animate">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="section-title">Contact Us</h2>
                <p style="font-size: 16px; color: var(--text-dark); margin-bottom: 5px; font-weight: 500;">Email: sachefitness25@gmail.com</p>
                <p style="font-size: 16px; color: var(--text-dark); margin-bottom: 5px; font-weight: 500;">Phone: 0712770161</p>
                <p style="font-size: 16px; color: var(--text-muted); margin-bottom: 5px;"><strong>Kahawa House, Kiambu Town</strong> (Next to Shell Petrol Station)</p>
                <p style="font-size: 16px; color: var(--text-muted); margin-bottom: 25px;"><strong>Ndumberi, Kiambu Road</strong>. Nairobi, Kenya</p>

                <!-- Dedicated Social Media Icon handles -->
                <div class="social-icons">
                    <a href="https://www.facebook.com/ChegeSara" target="_blank" class="social-icon fb" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/sachefitt/" target="_blank" class="social-icon ig" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://ke.linkedin.com/in/coachsache-sachefitness" target="_blank" class="social-icon li" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://wa.me/254712770161" target="_blank" class="social-icon wa" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                </div>

                <hr style="border-color: var(--panel-border); margin-bottom: 40px;">

                <h3 style="font-size: 20px; margin-bottom: 25px; color: var(--pf-purple);">Portal Access</h3>
                <div class="row">
                    <div class="col-xs-12">
                        <a href="login.php" class="btn btn-primary btn-portal" style="background-color: var(--pf-purple); border-color: var(--pf-purple); color: #fff;">Member Login</a>
                        <a href="login.php" class="btn btn-info btn-portal" style="background-color: #3b82f6; border-color: #3b82f6; color: #fff;">Staff Login</a>
                        <a href="login.php" class="btn btn-danger btn-portal" style="background-color: #ef4444; border-color: #ef4444; color: #fff;">Admin Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container-fluid text-center" style="max-width: 1200px;">
        <!-- Footer Social Media Icon handles -->
        <div class="social-icons" style="margin: 0 0 15px 0;">
            <a href="https://www.facebook.com/ChegeSara" target="_blank" class="social-icon fb" style="width: 35px; height: 35px; font-size: 15px; background-color: #fff;"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/sachefitt/" target="_blank" class="social-icon ig" style="width: 35px; height: 35px; font-size: 15px; background-color: #fff;"><i class="fab fa-instagram"></i></a>
            <a href="https://ke.linkedin.com/in/coachsache-sachefitness" target="_blank" class="social-icon li" style="width: 35px; height: 35px; font-size: 15px; background-color: #fff;"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://wa.me/254712770161" target="_blank" class="social-icon wa" style="width: 35px; height: 35px; font-size: 15px; background-color: #fff;"><i class="fab fa-whatsapp"></i></a>
        </div>
        <p style="margin: 0; font-size: 13px;">
            &copy; 2026 Sache. All Rights Reserved.
        </p>
    </div>
</footer>

<!-- JS dependencies -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Lightweight Native Scroll Reveal Animation Script -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const animElements = document.querySelectorAll(".scroll-animate");
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("reveal");
            }
        });
    }, { 
        threshold: 0.1 // Triggers when 10% of the element is visible
    });
    
    animElements.forEach(el => observer.observe(el));
});
</script>

<!-- Chatbot popup & responsive replies handler -->
<script>
function toggleChat() {
    const chatWindow = document.getElementById('chatbot-window');
    chatWindow.classList.toggle('active');
}

function sendReply(choice) {
    const history = document.getElementById('chat-history');
    
    // Add user message
    const userMsg = document.createElement('div');
    userMsg.className = 'chat-msg user';
    userMsg.textContent = choice;
    history.appendChild(userMsg);
    
    // Auto scroll to bottom
    history.scrollTop = history.scrollHeight;

    // Generate bot response with timeout
    setTimeout(() => {
        const botMsg = document.createElement('div');
        botMsg.className = 'chat-msg bot';
        
        let replyText = "";
        if (choice === "🏊 Swimming Programs") {
            replyText = "We offer Learn-to-Swim lessons, squad training, and competitions for kids & adults! Our rates are 1,500 KES per session or 10,000 KES for the beginner package.";
        } else if (choice === "📍 Where are you located?") {
            replyText = "We are located at Kahawa House next to Shell Petrol Station in Kiambu Town, and our swimming sessions are held at Ndumberi, Kiambu Road.";
        } else if (choice === "📝 How to register?") {
            replyText = "Simply click the 'Register Now' button at the top of our page, fill in your details, and select your program!";
        } else if (choice === "💬 Talk to a Coach") {
            replyText = "You can chat directly with Coach Sache on WhatsApp! Click the green WhatsApp button on the bottom right of your screen.";
        } else {
            replyText = "I'm here to help! Select one of the quick options below.";
        }
        
        botMsg.textContent = replyText;
        history.appendChild(botMsg);
        history.scrollTop = history.scrollHeight;
    }, 600);
}
</script>

</body>
</html>