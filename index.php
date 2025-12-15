<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yakimova - Signature tours to exotic places</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }

        /* Header/Hero Section */
        .hero-section {
            position: relative;
            height: 100vh;
            background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'); /* fallback image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
            z-index: 0;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* darker overlay over video */
            z-index: 1;
            pointer-events: none;
        }

        /* Navigation */
        .navbar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 30px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
        }

        .logo-icon {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 15px solid #ffffff;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #20b2aa;
        }

        /* Hero Content */
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1.02);
            z-index: 5;
            text-align: center;
            max-width: 1200px; /* narrower so title can wrap nicely */
            padding: 0 20px;
            transition: all 2s cubic-bezier(0.22, 0.61, 0.36, 1); /* slower, very smooth easing */
            will-change: transform, opacity;
        }

        .hero-content.left-align {
            top: 20%;
            left: 10%;
            transform: translate(0, 0) scale(0.98);
            text-align: left;
            max-width: 520px;
        }

        .hero-image {
            position: absolute;
            top: 48%;
            right: 15%;
            transform: translate(30%, -50%) scale(0.9);
            z-index: 5;
            max-width: 360px; /* bigger logo */
            opacity: 0;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.6));
            transition:
                opacity 3.2s 0.3s cubic-bezier(0.22, 0.61, 0.36, 1),
                transform 2.2s 0.5s cubic-bezier(0.22, 0.61, 0.36, 1),
                right 2.2s 0.5s cubic-bezier(0.22, 0.61, 0.36, 1),
                left 2.2s 0.5s cubic-bezier(0.22, 0.61, 0.36, 1),
                top 2.2s 0.5s cubic-bezier(0.22, 0.61, 0.36, 1);
            will-change: transform, opacity;
        }

        .hero-image.visible {
            opacity: 1;
            transform: translate(0, -50%) scale(1);
        }

        .hero-image.left-corner {
            /* final centered position after text disappears */
            top: 40%;
            left: 50%;
            right: auto;
            transform: translate(-50%, -50%) scale(1);
        }

        .hero-image.fade-out {
            opacity: 0;
            transform: translate(-50%, -50%) scale(0.9);
        }

        .hero-taglines {
            position: absolute;
            inset: 0;
            pointer-events: none;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #ffffff;
            opacity: 0;
            z-index: 5;
            transition: opacity 3.2s 0.4s cubic-bezier(0.22, 0.61, 0.36, 1);
            will-change: opacity;
        }

        .hero-taglines.visible {
            opacity: 1;
        }

        .hero-taglines.fade-out {
            opacity: 0;
        }

        .hero-taglines .tagline-line {
            position: absolute;
            font-weight: 700;
            opacity: 0;
            transition:
                opacity 2s cubic-bezier(0.22, 0.61, 0.36, 1),
                transform 2s cubic-bezier(0.22, 0.61, 0.36, 1);
            will-change: opacity, transform;
        }

        /* EMPOWER – centered below the logo (slides up & fades in) */
        .hero-taglines .tagline-empower {
            top: 60%;
            left: 50%;
            transform: translate(-50%, -30%);
            margin-top: 90px;
            font-size: 60px; /* bigger main word */
        }

        .hero-taglines.visible .tagline-empower {
            opacity: 1;
            transform: translate(-50%, -50%);
        }

        /* INNOVATE – to the right (slides in from right) */
        .hero-taglines .tagline-innovate {
            top: 40%;
            left: 80%;
            transform: translate(-30%, -50%);
            font-size: 60px;
        }

        .hero-taglines.visible .tagline-innovate {
            opacity: 1;
            transform: translate(-50%, -50%);
        }

        /* SUCCEED – to the left (slides in from left) */
        .hero-taglines .tagline-succeed {
            top: 40%;
            left: 20%;
            transform: translate(-70%, -50%);
            font-size: 60px;
        }

        .hero-taglines.visible .tagline-succeed {
            opacity: 1;
            transform: translate(-50%, -50%);
        }

        .hero-description {
            text-align: left;
            margin-bottom: 30px;
            font-size: 16px;
            color: #ffffff;
        }

        .hero-title {
            font-size: 60px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin-bottom: 10px;
            max-width: 22ch; /* limit width so it wraps to about two rows */
            margin-left: auto;
            margin-right: auto;
            /* animated gradient text – shades of white/gray */
            background: linear-gradient(120deg, #ffffff, #f0f0f0, #dcdcdc, #ffffff);
            background-size: 220% 220%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: heroTextGradient 8s ease-in-out infinite alternate;
        }

        .hero-subtitle {
            font-size: 30px;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 40px;
            background: linear-gradient(120deg, #e8e8e8, #cfcfcf, #f5f5f5);
            background-size: 220% 220%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            opacity: 0;
            transform: translateY(12px);
            transition:
                opacity 0.8s ease-out,
                transform 0.8s ease-out;
        }

        .hero-subtitle.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes heroTextGradient {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: flex-start;
            margin-top: 40px;
        }

        .btn {
            padding: 15px 40px;
            border: none;
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
        }

        .btn-teal {
            background-color: #20b2aa;
            color: #ffffff;
        }

        .btn-teal:hover {
            background-color: #1a9b94;
            transform: translateY(-2px);
        }

        .btn-white {
            background-color: #ffffff;
            color: #0a0a0a;
        }

        .btn-white:hover {
            background-color: #e0e0e0;
            transform: translateY(-2px);
        }

        /* Pagination */
        .pagination {
            position: absolute;
            right: 50px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 20px;
            z-index: 10;
        }

        .pagination-item {
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            opacity: 0.5;
            transition: all 0.3s;
        }

        .pagination-item.active {
            color: #20b2aa;
            opacity: 1;
        }

        /* Featured Tours Section */
        .tours-section {
            padding: 100px 50px;
            background-color: #0a0a0a;
        }

        .tours-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 50px;
        }

        .tour-card {
            position: relative;
            height: 400px;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .tour-card:hover {
            transform: translateY(-10px);
        }

        .tour-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tour-card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
        }

        .tour-number {
            font-size: 14px;
            text-transform: uppercase;
            color: #20b2aa;
            margin-bottom: 10px;
        }

        .tour-name {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
        }

        .custom-tour-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
            margin-top: 30px;
            transition: color 0.3s;
        }

        .custom-tour-link:hover {
            color: #20b2aa;
        }

        /* Discover Section */
        .discover-section {
            position: relative;
            padding: 100px 50px;
            background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .discover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
        }

        .discover-content {
            position: relative;
            z-index: 5;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .discover-title {
            font-size: 60px;
            font-weight: bold;
            line-height: 1.2;
            margin-bottom: 30px;
        }

        .discover-title .highlight {
            color: #20b2aa;
        }

        .video-prompt {
            display: flex;
            align-items: center;
            gap: 15px;
            color: #ffffff;
            font-size: 18px;
            margin-bottom: 30px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .video-prompt:hover {
            color: #20b2aa;
        }

        .play-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #20b2aa;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .play-icon::after {
            content: '';
            width: 0;
            height: 0;
            border-left: 15px solid #ffffff;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            margin-left: 5px;
        }

        .discover-text {
            font-size: 16px;
            line-height: 1.8;
            color: #e0e0e0;
            margin-bottom: 30px;
        }

        .discover-visual {
            position: relative;
        }

        .video-thumbnails {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }

        .video-thumbnail {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
            position: relative;
        }

        .video-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .video-thumbnail::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: rgba(32, 178, 170, 0.8);
        }

        /* Gallery Section */
        .gallery-section {
            padding: 100px 50px;
            background-color: #0a0a0a;
        }

        .gallery-title {
            font-size: 50px;
            text-transform: uppercase;
            color: #20b2aa;
            margin-bottom: 50px;
            text-align: center;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }

        .gallery-item {
            position: relative;
            height: 300px;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .load-more-btn {
            text-align: center;
        }

        .load-more-btn button {
            background: transparent;
            border: 2px solid #ffffff;
            color: #ffffff;
            padding: 15px 50px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .load-more-btn button:hover {
            background-color: #20b2aa;
            border-color: #20b2aa;
        }

        /* Booking Form Section */
        .booking-section {
            position: relative;
            padding: 100px 50px;
            background-image: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .booking-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
        }

        .booking-content {
            position: relative;
            z-index: 5;
            max-width: 600px;
            margin: 0 auto;
        }

        .booking-title {
            font-size: 50px;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 50px;
            color: #ffffff;
        }

        .booking-form {
            background-color: rgba(10, 10, 10, 0.9);
            padding: 50px;
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #ffffff;
            font-size: 16px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            color: #ffffff;
            font-size: 16px;
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #20b2aa;
        }

        .form-buttons {
            display: flex;
            gap: 20px;
            margin-top: 30px;
        }

        .form-buttons .btn {
            flex: 1;
        }

        /* Footer */
        .footer {
            background-color: #0a0a0a;
            padding: 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-nav {
            display: flex;
            gap: 40px;
        }

        .footer-nav a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-nav a:hover {
            color: #20b2aa;
        }

        .social-networks {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .social-networks span {
            margin-right: 15px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .social-icon:hover {
            background-color: #20b2aa;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .tours-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .discover-content {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 50px;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 20px;
            }

            .nav-links {
                gap: 20px;
                font-size: 14px;
            }

            .hero-title {
                font-size: 40px;
            }

            .hero-subtitle {
                font-size: 20px;
            }

            .tours-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .footer {
                flex-direction: column;
                gap: 30px;
                text-align: center;
            }

            .pagination {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Header/Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="video/technology.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-overlay"></div>
        
        <!-- Navigation -->
        <nav class="navbar">
            <div class="logo">
                <div class="logo-icon"></div>
                <span>yakimova</span>
            </div>
            <ul class="nav-links">
                <li><a href="#tours">All tours</a></li>
                <li><a href="#about">About us</a></li>
                <li><a href="#reviews">Reviews</a></li>
                <li><a href="#contacts">Contacts</a></li>
            </ul>
        </nav>

        <!-- Pagination
        <div class="pagination">
            <div class="pagination-item active">01</div>
            <div class="pagination-item">02</div>
            <div class="pagination-item">03</div>
            <div class="pagination-item">04</div>
        </div> -->

        <!-- Hero Content -->
        <div class="hero-content">
            <h1 class="hero-title" id="hero-title">BACHELOR OF SCIENCE IN INFORMATION SYSTEM</h1>
            <h2 class="hero-subtitle">BAGO CITY COLLEGE</h2>
        </div>

        <!-- Hero Image (shows after typing completes) -->
        <img src="images/bsis_logo.png" alt="BSIS Logo" class="hero-image" id="hero-image">

        <!-- Right-side taglines that appear after logo moves to left -->
        <div class="hero-taglines" id="hero-taglines">
            <div class="tagline-line tagline-empower">EMPOWER</div>
            <div class="tagline-line tagline-innovate">INNOVATE</div>
            <div class="tagline-line tagline-succeed">SUCCEED</div>
        </div>
    </section>

    <!-- Featured Tours Section -->
    <section class="tours-section" id="tours">
        <div class="tours-grid">
            <div class="tour-card">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Lake Braies">
                <div class="tour-card-overlay">
                    <div class="tour-number">TOUR 01</div>
                    <div class="tour-name">Lake Braies, Italy</div>
                </div>
            </div>
            <div class="tour-card">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Guangzhou">
                <div class="tour-card-overlay">
                    <div class="tour-number">TOUR 02</div>
                    <div class="tour-name">Guangzhou, Switzerland</div>
                </div>
            </div>
            <div class="tour-card">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Philippines">
                <div class="tour-card-overlay">
                    <div class="tour-number">TOUR 03</div>
                    <div class="tour-name">Island, Philippines</div>
                </div>
            </div>
            <div class="tour-card">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Mount Cook">
                <div class="tour-card-overlay">
                    <div class="tour-number">TOUR 04</div>
                    <div class="tour-name">Mount Cook, New Zealand</div>
                </div>
            </div>
        </div>
        <a href="#" class="custom-tour-link">
            Book an individual tour →
        </a>
    </section>

    <!-- Discover Section -->
    <section class="discover-section">
        <div class="discover-overlay"></div>
        <div class="discover-content">
            <div>
                <h2 class="discover-title">
                    DISCOVER A <span class="highlight">WHOLE NEW WORLD</span>
                </h2>
                <div class="video-prompt">
                    <div class="play-icon"></div>
                    <span>WATCH VIDEOS FROM OUR TOURS</span>
                </div>
                <p class="discover-text">
                    Watch sunsets in the most picturesque corners of the planet, brew coffee on mountain peaks, discover new locations, try local cuisine, and spend evenings around the campfire. Our tours are not just trips; they are an opportunity to immerse yourself in nature and feel true freedom.
                </p>
            </div>
            <div class="discover-visual">
                <div class="video-thumbnails">
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Video 1">
                    </div>
                    <div class="video-thumbnail">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80" alt="Video 2">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <h2 class="gallery-title">GALLERY</h2>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 1">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 2">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 3">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 4">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 5">
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 6">
            </div>
        </div>
        <div class="load-more-btn">
            <button>Load more</button>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="booking-section">
        <div class="booking-overlay"></div>
        <div class="booking-content">
            <h2 class="booking-title">BOOK A TOUR</h2>
            <form class="booking-form">
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="tour">Choose a tour</label>
                    <select id="tour" name="tour" required>
                        <option value="">Select a tour</option>
                        <option value="tour01">TOUR 01 - Lake Braies, Italy</option>
                        <option value="tour02">TOUR 02 - Guangzhou, Switzerland</option>
                        <option value="tour03">TOUR 03 - Island, Philippines</option>
                        <option value="tour04">TOUR 04 - Mount Cook, New Zealand</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" placeholder="+7 ___ ___ __ __" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn btn-teal">Send request</button>
                    <button type="button" class="btn btn-white">Ask a question</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="logo">
            <div class="logo-icon"></div>
            <span>yakimova</span>
        </div>
        <nav class="footer-nav">
            <a href="#tours">All tours</a>
            <a href="#about">About us</a>
            <a href="#reviews">Reviews</a>
            <a href="#contacts">Contacts</a>
        </nav>
        <div class="social-networks">
            <span>Social networks</span>
            <div class="social-icons">
                <div class="social-icon">📷</div>
                <div class="social-icon">f</div>
                <div class="social-icon">в</div>
                <div class="social-icon">▶</div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Typewriter effect for hero title, then move content to left corner and show hero image + subtitle
            const heroTitleEl = document.getElementById('hero-title');
            const heroContentEl = document.querySelector('.hero-content');
            const heroImageEl = document.getElementById('hero-image');
            const heroSubtitleEl = document.querySelector('.hero-subtitle');
            const heroTaglinesEl = document.getElementById('hero-taglines');
            if (heroTitleEl && heroContentEl) {
                const fullText = heroTitleEl.textContent.trim();
                const subtitleFullText = heroSubtitleEl ? heroSubtitleEl.textContent.trim() : '';

                const runHeroSequence = () => {
                    let index = 0;

                    // reset all visual state before starting the sequence
                    heroContentEl.style.transition = 'none';
                    heroContentEl.classList.remove('left-align');
                    heroContentEl.style.opacity = '';
                    heroContentEl.style.transform = '';

                    heroTitleEl.textContent = '';
                    if (heroSubtitleEl) {
                        heroSubtitleEl.textContent = subtitleFullText;
                        heroSubtitleEl.classList.remove('visible');
                    }
                    if (heroImageEl) {
                        heroImageEl.classList.remove('visible', 'left-corner', 'fade-out');
                    }
                    if (heroTaglinesEl) {
                        heroTaglinesEl.classList.remove('visible', 'fade-out');
                    }

                    const typeNextChar = () => {
                        if (index <= fullText.length) {
                            heroTitleEl.textContent = fullText.slice(0, index);
                            index++;
                            setTimeout(typeNextChar, 160); // slower typing speed (ms per character)
                        } else {
                            // typing is done – after 2s, move hero content to left corner and reveal logo/subtitle
                            setTimeout(() => {
                                heroContentEl.classList.add('left-align');
                                // reveal the hero image on the right
                                if (heroImageEl) {
                                    heroImageEl.classList.add('visible');
                                }
                                // and fade/slide in the subtitle
                                if (heroSubtitleEl) {
                                    heroSubtitleEl.classList.add('visible');
                                    heroSubtitleEl.textContent = subtitleFullText;
                                }
                            }, 2000);

                            // After 2s, run reverse type effect from last letter to first:
                            // first hero-subtitle, then hero-title (starts after same 2s delay)
                            setTimeout(() => {
                                const titleText = heroTitleEl.textContent;
                                const subtitleText = heroSubtitleEl ? heroSubtitleEl.textContent : '';
                                let subtitleIndex = subtitleText.length;

                                const eraseSubtitleThenTitle = () => {
                                    if (heroSubtitleEl && subtitleIndex >= 0) {
                                        heroSubtitleEl.textContent = subtitleText.slice(0, subtitleIndex);
                                        subtitleIndex--;
                                        setTimeout(eraseSubtitleThenTitle, 120); // slower erase for smoothness
                                    } else {
                                        // Subtitle done, now erase title
                                        let titleIndex = titleText.length;
                                        const eraseTitle = () => {
                                            if (titleIndex >= 0) {
                                                heroTitleEl.textContent = titleText.slice(0, titleIndex);
                                                titleIndex--;
                                                setTimeout(eraseTitle, 120); // slower erase for smoothness
                                            } else {
                                                // all letters disappeared – push logo to left corner
                                                if (heroImageEl) {
                                                    heroImageEl.classList.add('left-corner');
                                                }
                                                // and then reveal the right-side taglines
                                                if (heroTaglinesEl) {
                                                    heroTaglinesEl.classList.add('visible');
                                                }
                                                // final fade-out of logo and taglines together,
                                                // then restart sequence from the beginning (no hero-content fade-in)
                                                setTimeout(() => {
                                                    if (heroImageEl) {
                                                        heroImageEl.classList.add('fade-out');
                                                    }
                                                    if (heroTaglinesEl) {
                                                        heroTaglinesEl.classList.add('fade-out');
                                                    }

                                                    // wait for fade-out to finish, then immediately restart
                                                    setTimeout(runHeroSequence, 3200);
                                                }, 2500);
                                            }
                                        };
                                        eraseTitle();
                                    }
                                };

                                eraseSubtitleThenTitle();
                            }, 2000);
                        }
                    };

                    typeNextChar();
                };

                runHeroSequence();
            }

            // Slow down hero background video
            const heroVideo = document.querySelector('.hero-video');
            if (heroVideo) {
                const setSlowPlayback = () => {
                    try {
                        heroVideo.playbackRate = 0.5; // 0.5 = half-speed
                    } catch (e) {
                        // ignore if browser blocks changing playbackRate
                    }
                };

                heroVideo.addEventListener('loadedmetadata', setSlowPlayback);
                heroVideo.addEventListener('play', setSlowPlayback);

                // In case it's already playing by the time script runs
                setSlowPlayback();
            }

            // Form submission
            const bookingForm = document.querySelector('.booking-form');
            if (bookingForm) {
                bookingForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert('Thank you for your request! We will contact you shortly.');
                });
            }

            // Pagination click handler
            document.querySelectorAll('.pagination-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.pagination-item').forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>
