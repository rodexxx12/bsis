<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yakimova - Signature tours to exotic places</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-main: #020617;
            --bg-elevated: #020617;
            --bg-card: #020617;
            --bg-soft: #020617;
            --accent: #22c55e;
            --accent-soft: rgba(34, 197, 94, 0.16);
            --accent-strong: #4ade80;
            --accent-alt: #0ea5e9;
            --text-main: #e5e7eb;
            --text-soft: #9ca3af;
            --border-subtle: rgba(148, 163, 184, 0.25);
            --glass: rgba(15, 23, 42, 0.82);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at top left, #0f172a 0, #020617 45%, #000 100%);
            color: var(--text-main);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Header/Hero Section */
        .hero-section {
            position: relative;
            height: 100vh;
            width: 100%;
            background: radial-gradient(circle at top left, rgba(56, 189, 248, 0.22), transparent 55%),
                        radial-gradient(circle at 80% 0%, rgba(34, 197, 94, 0.18), transparent 55%),
                        radial-gradient(circle at 0% 80%, rgba(129, 140, 248, 0.16), transparent 55%),
                        radial-gradient(circle at top left, #0f172a 0, #020617 45%, #000 100%);
            background-blend-mode: screen;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .hero-video {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
            /* Smooth video playback optimizations */
            transform: translate3d(-50%, -50%, 0);
            -webkit-transform: translate3d(-50%, -50%, 0);
            will-change: transform;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            /* GPU acceleration */
            transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            -webkit-perspective: 1000px;
            perspective: 1000px;
            /* Smooth rendering */
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-filter: blur(0);
            filter: blur(0);
            /* Optimize for smooth playback */
            pointer-events: none;
            /* Better video quality */
            image-rendering: auto;
            -webkit-image-rendering: auto;
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
            color: var(--text-main);
            font-size: 18px;
            font-weight: 600;
        }

        .logo-icon {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 15px solid var(--accent);
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-soft);
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent);
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
            color: var(--text-soft);
        }

        .hero-title {
            font-size: 45px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 5px;
            margin-bottom: 10px;
            max-width: 650px; /* adjusted to wrap to exactly 2 rows */
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            color: var(--text-main);
            line-height: 1.2;
            word-wrap: break-word;
            overflow-wrap: break-word;
            /* Ensure text wraps naturally to 2 rows */
            white-space: normal;
        }

        .hero-subtitle {
            font-size: 22px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 40px;
            color: var(--text-soft);
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

        .hero-buttons {
            display: flex;
            gap: 20px;
            justify-content: flex-start;
            margin-top: 40px;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out 0.3s, transform 0.8s ease-out 0.3s;
        }

        .hero-buttons.visible {
            opacity: 1;
            transform: translateY(0);
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
            background: linear-gradient(135deg, #22c55e, #0ea5e9);
            color: #020617;
            box-shadow: 0 0 40px rgba(34, 197, 94, 0.45);
        }

        .btn-teal:hover {
            background: linear-gradient(135deg, #4ade80, #38bdf8);
            transform: translateY(-2px);
            box-shadow: 0 0 50px rgba(34, 197, 94, 0.6);
        }

        .btn-white {
            background: radial-gradient(circle at top left, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.98));
            color: var(--text-main);
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        .btn-white:hover {
            background: radial-gradient(circle at top left, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.95));
            border-color: rgba(148, 163, 184, 0.6);
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
            color: var(--text-soft);
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            opacity: 0.5;
            transition: all 0.3s;
        }

        .pagination-item.active {
            color: var(--accent);
            opacity: 1;
        }

        /* Featured Project Section */
        .tours-section {
            padding: 100px 50px;
            background: radial-gradient(circle at top left, #0f172a 0, #020617 45%, #000 100%);
        }

        .featured-project-title {
            font-size: 50px;
            text-transform: uppercase;
            color: var(--text-main);
            margin-bottom: 50px;
            text-align: center;
            font-weight: 700;
            letter-spacing: 3px;
        }

        .tours-carousel-wrapper {
            position: relative;
            overflow: hidden;
            margin-bottom: 50px;
            padding: 0 60px;
        }

        .tours-carousel-track {
            display: flex;
            gap: 30px;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform;
        }

        .tour-card {
            position: relative;
            height: 400px;
            min-width: calc((100% - 90px) / 4);
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            transform-origin: center;
        }

        .tour-card:hover {
            transform: translateY(-10px) scale(1.02);
            z-index: 10;
        }

        .tour-card.push-animation {
            transform: translateX(0);
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
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
            color: var(--accent);
            margin-bottom: 10px;
        }

        .tour-name {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-main);
        }

        .custom-tour-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-soft);
            text-decoration: none;
            font-size: 18px;
            margin-top: 30px;
            transition: color 0.3s;
        }

        .custom-tour-link:hover {
            color: var(--accent);
        }

        .custom-tour-link {
            display: none;
        }

        /* Carousel Navigation */
        .carousel-nav {
            display: none;
        }

        .carousel-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: rgba(34, 197, 94, 0.16);
            border: 2px solid var(--accent);
            color: var(--accent);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .carousel-btn:hover {
            background: linear-gradient(135deg, #22c55e, #0ea5e9);
            color: #020617;
            transform: scale(1.1);
        }

        .carousel-btn:active {
            transform: scale(0.95);
        }

        .carousel-btn.prev::before {
            content: '‹';
            font-size: 40px;
            line-height: 1;
        }

        .carousel-btn.next::before {
            content: '›';
            font-size: 40px;
            line-height: 1;
        }

        .carousel-btn:disabled {
            opacity: 0.3;
            cursor: not-allowed;
            transform: scale(1);
        }

        .carousel-btn:disabled:hover {
            background-color: rgba(34, 197, 94, 0.16);
            color: var(--accent);
            transform: scale(1);
        }

        .carousel-dots {
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .carousel-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(148, 163, 184, 0.3);
            border: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            padding: 0;
        }

        .carousel-dot.active {
            background-color: var(--accent);
            transform: scale(1.3);
        }

        .carousel-dot:hover {
            background-color: rgba(34, 197, 94, 0.6);
            transform: scale(1.2);
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
            color: white;
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

        .mission-vision-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .mission-vision-item {
            background-color: rgba(10, 10, 10, 0.7);
            padding: 40px;
            border-radius: 10px;
            border-left: 4px solid #20b2aa;
        }

        .mission-vision-title {
            font-size: 32px;
            font-weight: bold;
            color: #20b2aa;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .mission-vision-text {
            font-size: 16px;
            line-height: 1.8;
            color: #e0e0e0;
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
            background-color: #ffffff;
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
            border: 2px solid #0a0a0a;
            color: #0a0a0a;
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
            background-color: #ffffff;
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
            color: #0a0a0a;
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
            color: #0a0a0a;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(10, 10, 10, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
            color: #0a0a0a;
        }

        .social-icon:hover {
            background-color: #20b2aa;
        }

        /* Scroll Transition Animations */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s cubic-bezier(0.22, 0.61, 0.36, 1),
                        transform 0.8s cubic-bezier(0.22, 0.61, 0.36, 1);
        }

        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: opacity 0.8s cubic-bezier(0.22, 0.61, 0.36, 1),
                        transform 0.8s cubic-bezier(0.22, 0.61, 0.36, 1);
        }

        .scroll-reveal-left.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: opacity 0.8s cubic-bezier(0.22, 0.61, 0.36, 1),
                        transform 0.8s cubic-bezier(0.22, 0.61, 0.36, 1);
        }

        .scroll-reveal-right.revealed {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-reveal-scale {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.8s cubic-bezier(0.22, 0.61, 0.36, 1),
                        transform 0.8s cubic-bezier(0.22, 0.61, 0.36, 1);
        }

        .scroll-reveal-scale.revealed {
            opacity: 1;
            transform: scale(1);
        }

        .scroll-reveal-fade {
            opacity: 0;
            transition: opacity 1s cubic-bezier(0.22, 0.61, 0.36, 1);
        }

        .scroll-reveal-fade.revealed {
            opacity: 1;
        }

        /* Stagger delay for grid items */
        .scroll-reveal-delay-1 {
            transition-delay: 0.1s;
        }

        .scroll-reveal-delay-2 {
            transition-delay: 0.2s;
        }

        .scroll-reveal-delay-3 {
            transition-delay: 0.3s;
        }

        .scroll-reveal-delay-4 {
            transition-delay: 0.4s;
        }

        .scroll-reveal-delay-5 {
            transition-delay: 0.5s;
        }

        .scroll-reveal-delay-6 {
            transition-delay: 0.6s;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .tour-card {
                min-width: calc((100% - 30px) / 2);
            }

            .tours-carousel-wrapper {
                padding: 0 50px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .discover-content {
                grid-template-columns: 1fr;
            }

            .mission-vision-container {
                grid-template-columns: 1fr;
            }

            .hero-title {
                font-size: 38px;
                max-width: 550px; /* maintain 2-row layout */
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
                font-size: 32px;
                max-width: 450px; /* maintain 2-row layout on mobile */
            }

            .hero-subtitle {
                font-size: 18px;
            }

            .tour-card {
                min-width: 100%;
            }

            .tours-carousel-wrapper {
                padding: 0 40px;
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

            .mission-vision-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .mission-vision-item {
                padding: 30px;
            }

            .mission-vision-title {
                font-size: 24px;
            }

            .discover-title {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <!-- Header/Hero Section -->
    <section class="hero-section">
        <video class="hero-video" autoplay muted loop playsinline preload="auto" webkit-playsinline>
            <source src="video/background.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        
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
            <div class="hero-buttons" id="hero-buttons">
                <button class="btn btn-teal" id="login-btn">Login</button>
                <button class="btn btn-white" id="explore-btn">Explore</button>
            </div>
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

    <!-- Featured Project Section -->
    <section class="tours-section" id="tours">
        <h2 class="featured-project-title scroll-reveal-fade">Featured Project</h2>
        <div class="tours-carousel-wrapper">
            <div class="tours-carousel-track" id="tours-carousel-track">
                <div class="tour-card scroll-reveal scroll-reveal-delay-1">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Lake Braies">
                    <div class="tour-card-overlay">
                        <div class="tour-number">TOUR 01</div>
                        <div class="tour-name">Lake Braies, Italy</div>
                    </div>
                </div>
                <div class="tour-card scroll-reveal scroll-reveal-delay-2">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Guangzhou">
                    <div class="tour-card-overlay">
                        <div class="tour-number">TOUR 02</div>
                        <div class="tour-name">Guangzhou, Switzerland</div>
                    </div>
                </div>
                <div class="tour-card scroll-reveal scroll-reveal-delay-3">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Philippines">
                    <div class="tour-card-overlay">
                        <div class="tour-number">TOUR 03</div>
                        <div class="tour-name">Island, Philippines</div>
                    </div>
                </div>
                <div class="tour-card scroll-reveal scroll-reveal-delay-4">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Mount Cook">
                    <div class="tour-card-overlay">
                        <div class="tour-number">TOUR 04</div>
                        <div class="tour-name">Mount Cook, New Zealand</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-nav">
            <button class="carousel-btn prev" id="carousel-prev" aria-label="Previous"></button>
            <div class="carousel-dots" id="carousel-dots"></div>
            <button class="carousel-btn next" id="carousel-next" aria-label="Next"></button>
        </div>
        <a href="#" class="custom-tour-link scroll-reveal-fade">
            Book an individual tour →
        </a>
    </section>

    <!-- Discover Section -->
    <section class="discover-section">
        <div class="discover-overlay"></div>
        <div class="discover-content">
            <div class="scroll-reveal-left" style="grid-column: 1 / -1;">
                <h2 class="discover-title" style="text-align: center; margin-bottom: 50px;">
                     <span class="highlight">OUR MISSION & VISION</span>
                </h2>
                <div class="mission-vision-container">
                    <div class="mission-vision-item scroll-reveal-left scroll-reveal-delay-1">
                        <h3 class="mission-vision-title">MISSION</h3>
                        <p class="mission-vision-text">
                            Bachelor of Science in Information System Department of Bago City COLLEGE aims to Provide Relevant, Accessible, High Quality and Efficient Computer Education to Graduates thus aligned with Industry need of the Local Community and to Upgrade Filipinos higher level manpower in line with the National Development Goals and Priorities
                        </p>
                    </div>
                    <div class="mission-vision-item scroll-reveal-right scroll-reveal-delay-2">
                        <h3 class="mission-vision-title">VISION</h3>
                        <p class="mission-vision-text">
                            Bachelor of Science in Information System Department of Bago City COLLEGE aims to Provide Relevant, Accessible, High Quality and Efficient Computer Education to Graduates thus aligned with Industry need of the Local Community and to Upgrade Filipinos higher level manpower in line with the National Development Goals and Priorities
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <h2 class="gallery-title scroll-reveal-fade">GALLERY</h2>
        <div class="gallery-grid">
            <div class="gallery-item scroll-reveal scroll-reveal-delay-1">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 1">
            </div>
            <div class="gallery-item scroll-reveal scroll-reveal-delay-2">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 2">
            </div>
            <div class="gallery-item scroll-reveal scroll-reveal-delay-3">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 3">
            </div>
            <div class="gallery-item scroll-reveal scroll-reveal-delay-4">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 4">
            </div>
            <div class="gallery-item scroll-reveal scroll-reveal-delay-5">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 5">
            </div>
            <div class="gallery-item scroll-reveal scroll-reveal-delay-6">
                <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Gallery 6">
            </div>
        </div>
        <div class="load-more-btn scroll-reveal-fade">
            <button>Load more</button>
        </div>
    </section>

    <!-- Booking Form Section -->
    <section class="booking-section">
        <div class="booking-overlay"></div>
        <div class="booking-content scroll-reveal-scale">
            <h2 class="booking-title scroll-reveal-fade">BOOK A TOUR</h2>
            <form class="booking-form scroll-reveal">
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
    <footer class="footer scroll-reveal-fade">
        <div class="logo scroll-reveal-left">
            <div class="logo-icon"></div>
            <span>yakimova</span>
        </div>
        <nav class="footer-nav scroll-reveal">
            <a href="#tours">All tours</a>
            <a href="#about">About us</a>
            <a href="#reviews">Reviews</a>
            <a href="#contacts">Contacts</a>
        </nav>
        <div class="social-networks scroll-reveal-right">
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
            const heroButtonsEl = document.getElementById('hero-buttons');
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
                    if (heroButtonsEl) {
                        heroButtonsEl.classList.remove('visible');
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
                                                // final fade-out of logo and taglines together
                                                setTimeout(() => {
                                                    if (heroImageEl) {
                                                        heroImageEl.classList.add('fade-out');
                                                    }
                                                    if (heroTaglinesEl) {
                                                        heroTaglinesEl.classList.add('fade-out');
                                                    }
                                                    
                                                    // After fade-out completes, display logo and hero-content again
                                                    setTimeout(() => {
                                                        // Remove fade-out and show logo on the right
                                                        if (heroImageEl) {
                                                            heroImageEl.classList.remove('fade-out', 'left-corner');
                                                            heroImageEl.classList.add('visible');
                                                            // Ensure it's positioned on the right
                                                            heroImageEl.style.right = '15%';
                                                            heroImageEl.style.left = 'auto';
                                                            heroImageEl.style.top = '48%';
                                                            heroImageEl.style.transform = 'translate(0, -50%) scale(1)';
                                                        }
                                                        
                                                        // Show hero-content with title and subtitle
                                                        if (heroContentEl) {
                                                            heroContentEl.style.transition = 'all 2s cubic-bezier(0.22, 0.61, 0.36, 1)';
                                                            heroContentEl.classList.add('left-align');
                                                            heroContentEl.style.opacity = '1';
                                                        }
                                                        
                                                        // Restore title and subtitle text
                                                        if (heroTitleEl) {
                                                            heroTitleEl.textContent = fullText;
                                                        }
                                                        if (heroSubtitleEl) {
                                                            heroSubtitleEl.textContent = subtitleFullText;
                                                            heroSubtitleEl.classList.add('visible');
                                                        }
                                                        
                                                        // Show buttons below hero-content
                                                        if (heroButtonsEl) {
                                                            heroButtonsEl.classList.add('visible');
                                                        }
                                                        
                                                        // Hide taglines
                                                        if (heroTaglinesEl) {
                                                            heroTaglinesEl.classList.remove('visible');
                                                        }
                                                    }, 3200); // Wait for fade-out transition to complete
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

            // Smooth hero background video playback
            const heroVideo = document.querySelector('.hero-video');
            if (heroVideo) {
                // Enable hardware acceleration and smooth playback
                heroVideo.style.transform = 'translate3d(-50%, -50%, 0)';
                heroVideo.style.willChange = 'transform';
                heroVideo.style.pointerEvents = 'none';
                
                // Set video quality and smoothness properties
                heroVideo.setAttribute('playsinline', '');
                heroVideo.setAttribute('webkit-playsinline', '');
                heroVideo.muted = true;
                heroVideo.preload = 'auto';
                
                // Optimize video for smooth playback
                const optimizeVideoPlayback = () => {
                    try {
                        // Use double requestAnimationFrame for ultra-smooth updates
                        requestAnimationFrame(() => {
                            requestAnimationFrame(() => {
                                if (heroVideo.readyState >= 2) {
                                    heroVideo.playbackRate = 0.25; // 0.25 = quarter-speed (very slow)
                                    // Ensure video is playing smoothly
                                    if (heroVideo.paused) {
                                        heroVideo.play().catch(() => {});
                                    }
                                }
                            });
                        });
                    } catch (e) {
                        // ignore if browser blocks changing playbackRate
                    }
                };

                // Smooth video initialization
                const initVideoSmoothly = () => {
                    optimizeVideoPlayback();
                    // Ensure continuous smooth playback
                    if (heroVideo.paused) {
                        heroVideo.play().catch(() => {});
                    }
                };

                // Ensure video loads smoothly with multiple event listeners
                heroVideo.addEventListener('loadedmetadata', initVideoSmoothly);
                heroVideo.addEventListener('loadeddata', initVideoSmoothly);
                heroVideo.addEventListener('canplay', initVideoSmoothly);
                heroVideo.addEventListener('canplaythrough', initVideoSmoothly);
                heroVideo.addEventListener('play', optimizeVideoPlayback);
                heroVideo.addEventListener('playing', optimizeVideoPlayback);
                
                // Handle video seeking smoothly
                heroVideo.addEventListener('seeked', optimizeVideoPlayback);
                
                // Prevent video stuttering
                heroVideo.addEventListener('waiting', () => {
                    heroVideo.play().catch(() => {});
                });

                // Initialize immediately if video is ready
                if (heroVideo.readyState >= 2) {
                    initVideoSmoothly();
                } else {
                    // Wait for video to be ready
                    heroVideo.addEventListener('loadedmetadata', initVideoSmoothly, { once: true });
                }
                
                // Smooth periodic check with requestAnimationFrame (better performance)
                let lastCheck = 0;
                const smoothCheck = (timestamp) => {
                    if (timestamp - lastCheck >= 2000) {
                        if (heroVideo.playbackRate !== 0.25 && heroVideo.readyState >= 2) {
                            optimizeVideoPlayback();
                        }
                        lastCheck = timestamp;
                    }
                    requestAnimationFrame(smoothCheck);
                };
                requestAnimationFrame(smoothCheck);
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

            // Scroll reveal animations using Intersection Observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const scrollRevealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                        // Unobserve after animation to improve performance
                        scrollRevealObserver.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all elements with scroll-reveal classes
            const scrollRevealElements = document.querySelectorAll(
                '.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale, .scroll-reveal-fade'
            );
            
            scrollRevealElements.forEach(el => {
                scrollRevealObserver.observe(el);
            });

            // Tours Carousel with Push Animations - Auto-play and Continuous
            const carouselTrack = document.getElementById('tours-carousel-track');
            const carouselPrevBtn = document.getElementById('carousel-prev');
            const carouselNextBtn = document.getElementById('carousel-next');
            const carouselDots = document.getElementById('carousel-dots');
            const carouselWrapper = document.querySelector('.tours-carousel-wrapper');
            
            if (carouselTrack && carouselPrevBtn && carouselNextBtn) {
                let cards = carouselTrack.querySelectorAll('.tour-card');
                const originalCards = Array.from(cards);
                const totalCards = originalCards.length;
                let currentIndex = 0;
                let cardsPerView = 4;
                let isAnimating = false;
                let autoPlayInterval = null;
                const autoPlayDelay = 4000; // 4 seconds between slides
                let isPaused = false;

                // Clone cards for infinite loop
                const cloneCards = () => {
                    // Clone first few cards and append to end
                    for (let i = 0; i < cardsPerView; i++) {
                        const clone = originalCards[i].cloneNode(true);
                        clone.classList.add('carousel-clone');
                        carouselTrack.appendChild(clone);
                    }
                    // Clone last few cards and prepend to beginning
                    for (let i = totalCards - cardsPerView; i < totalCards; i++) {
                        const clone = originalCards[i].cloneNode(true);
                        clone.classList.add('carousel-clone');
                        carouselTrack.insertBefore(clone, carouselTrack.firstChild);
                    }
                    cards = carouselTrack.querySelectorAll('.tour-card');
                    // Set initial position to account for prepended clones
                    currentIndex = cardsPerView;
                };

                // Calculate cards per view based on screen size
                const updateCardsPerView = () => {
                    const width = window.innerWidth;
                    if (width <= 768) {
                        cardsPerView = 1;
                    } else if (width <= 1024) {
                        cardsPerView = 2;
                    } else {
                        cardsPerView = 4;
                    }
                };

                updateCardsPerView();
                cloneCards();

                // Create dots
                const createDots = () => {
                    carouselDots.innerHTML = '';
                    const totalSlides = totalCards; // Use original card count for dots
                    for (let i = 0; i < totalSlides; i++) {
                        const dot = document.createElement('button');
                        dot.className = 'carousel-dot';
                        const displayIndex = ((currentIndex - cardsPerView) % totalCards + totalCards) % totalCards;
                        if (i === displayIndex) dot.classList.add('active');
                        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                        dot.addEventListener('click', () => {
                            const targetIndex = cardsPerView + i;
                            goToSlide(targetIndex, false);
                        });
                        carouselDots.appendChild(dot);
                    }
                };

                createDots();

                // Handle resize
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        const oldCardsPerView = cardsPerView;
                        updateCardsPerView();
                        
                        // Remove old clones
                        carouselTrack.querySelectorAll('.carousel-clone').forEach(clone => clone.remove());
                        // Re-clone with new cardsPerView
                        cloneCards();
                        
                        // Recreate dots
                        createDots();
                        
                        // Force recalculation
                        isAnimating = false;
                        updateCarousel();
                    }, 250);
                });

                // Update carousel position with push animation
                const updateCarousel = (resetTransition = false) => {
                    if (isAnimating && cards.length === 0) return;
                    
                    // Wait for cards to be rendered
                    if (cards.length === 0 || cards[0].offsetWidth === 0) {
                        setTimeout(() => updateCarousel(resetTransition), 50);
                        return;
                    }
                    
                    const cardWidth = cards[0].offsetWidth;
                    const gap = 30;
                    const translateX = -(currentIndex * (cardWidth + gap));
                    
                    if (resetTransition) {
                        carouselTrack.style.transition = 'none';
                    } else {
                        carouselTrack.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    }
                    
                    // Add push animation effect to cards
                    cards.forEach((card, index) => {
                        card.classList.add('push-animation');
                        // Stagger animation based on distance from current view
                        const distance = Math.abs(index - currentIndex);
                        const delay = Math.min(distance * 0.03, 0.15);
                        card.style.transitionDelay = `${delay}s`;
                    });

                    carouselTrack.style.transform = `translateX(${translateX}px)`;

                    // Update dots based on actual position (accounting for clones)
                    const displayIndex = ((currentIndex - cardsPerView) % totalCards + totalCards) % totalCards;
                    const dots = carouselDots.querySelectorAll('.carousel-dot');
                    dots.forEach((dot, index) => {
                        dot.classList.toggle('active', index === displayIndex);
                    });

                    // Update button states (always enabled for infinite loop)
                    carouselPrevBtn.disabled = false;
                    carouselNextBtn.disabled = false;

                    // Remove animation class after animation completes
                    setTimeout(() => {
                        cards.forEach(card => {
                            card.classList.remove('push-animation');
                            card.style.transitionDelay = '';
                        });
                    }, 600);

                    // Handle infinite loop reset
                    if (!resetTransition) {
                        setTimeout(() => {
                            // If we're at the end clones, jump to real cards
                            if (currentIndex >= cards.length - cardsPerView) {
                                currentIndex = cardsPerView;
                                updateCarousel(true);
                            }
                            // If we're at the beginning clones, jump to real cards
                            if (currentIndex < cardsPerView) {
                                currentIndex = totalCards;
                                updateCarousel(true);
                            }
                        }, 600);
                    }
                };

                // Navigate to specific slide
                const goToSlide = (index, smooth = true) => {
                    if (isAnimating && smooth) return;
                    currentIndex = index;
                    isAnimating = true;
                    updateCarousel(!smooth);
                    setTimeout(() => {
                        isAnimating = false;
                    }, 600);
                };

                // Next slide (continuous)
                const nextSlide = () => {
                    currentIndex++;
                    goToSlide(currentIndex);
                };

                // Previous slide (continuous)
                const prevSlide = () => {
                    currentIndex--;
                    goToSlide(currentIndex);
                };

                // Auto-play functionality
                const startAutoPlay = () => {
                    if (autoPlayInterval) return;
                    autoPlayInterval = setInterval(() => {
                        if (!isPaused && !isAnimating) {
                            nextSlide();
                        }
                    }, autoPlayDelay);
                };

                const stopAutoPlay = () => {
                    if (autoPlayInterval) {
                        clearInterval(autoPlayInterval);
                        autoPlayInterval = null;
                    }
                };

                // Pause on hover
                if (carouselWrapper) {
                    carouselWrapper.addEventListener('mouseenter', () => {
                        isPaused = true;
                    });
                    carouselWrapper.addEventListener('mouseleave', () => {
                        isPaused = false;
                    });
                }

                // Event listeners
                carouselNextBtn.addEventListener('click', () => {
                    nextSlide();
                    stopAutoPlay();
                    setTimeout(startAutoPlay, autoPlayDelay * 2);
                });
                carouselPrevBtn.addEventListener('click', () => {
                    prevSlide();
                    stopAutoPlay();
                    setTimeout(startAutoPlay, autoPlayDelay * 2);
                });

                // Keyboard navigation
                document.addEventListener('keydown', (e) => {
                    if (carouselTrack.closest('section').getBoundingClientRect().top < window.innerHeight &&
                        carouselTrack.closest('section').getBoundingClientRect().bottom > 0) {
                        if (e.key === 'ArrowLeft') {
                            e.preventDefault();
                            prevSlide();
                            stopAutoPlay();
                            setTimeout(startAutoPlay, autoPlayDelay * 2);
                        } else if (e.key === 'ArrowRight') {
                            e.preventDefault();
                            nextSlide();
                            stopAutoPlay();
                            setTimeout(startAutoPlay, autoPlayDelay * 2);
                        }
                    }
                });

                // Touch/swipe support
                let touchStartX = 0;
                let touchEndX = 0;

                carouselTrack.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    stopAutoPlay();
                }, { passive: true });

                carouselTrack.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                    setTimeout(startAutoPlay, autoPlayDelay * 2);
                }, { passive: true });

                const handleSwipe = () => {
                    const swipeThreshold = 50;
                    const diff = touchStartX - touchEndX;
                    
                    if (Math.abs(diff) > swipeThreshold) {
                        if (diff > 0) {
                            nextSlide();
                        } else {
                            prevSlide();
                        }
                    }
                };

                // Initialize carousel
                updateCarousel();
                // Start auto-play
                startAutoPlay();

                // Pause auto-play when page is not visible
                document.addEventListener('visibilitychange', () => {
                    if (document.hidden) {
                        stopAutoPlay();
                    } else {
                        startAutoPlay();
                    }
                });
            }
        });
    </script>
</body>
</html>
