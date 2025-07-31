<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelurahan Tanjungpinang Kota | Kecamatan Tanjungpinang Kota</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        /* Header berubah merah solid saat scroll */
        html {
            scroll-behavior: smooth;
        }

        .modern-header.scrolled,
        .modern-header:hover {
            background: var(--primary-900) !important;
            backdrop-filter: none !important;
            transition: background 0.3s, backdrop-filter 0.3s;
        }

        :root {
            --primary-900: #800020;
            /* Deep maroon */
            --primary-800: #900030;
            --primary-700: #A00040;
            --primary-600: #B00050;
            --primary-500: #C00060;
            --primary-400: #D00070;
            --primary-gradient: linear-gradient(135deg, var(--primary-800) 0%, var(--primary-600) 100%);
            --primary-gradient-hover: linear-gradient(135deg, var(--primary-700) 0%, var(--primary-500) 100%);
            --accent-color: #FFD700;
            /* Gold accent */
            --dark-maroon: #500000;
            /* Dark maroon for footer */
        }

        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
            color: #333;
            line-height: 1.6;
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: optional;
            src: url(https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap);
        }

        .fixed-container {
            width: 90%;
            max-width: 1400px;
            margin: 0 auto;
            padding-top: 90px;
        }

        /* Header Styles */
        .modern-header {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(24, 24, 24, 0.45);
            backdrop-filter: blur(14px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .modern-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0);
            pointer-events: none;
        }

        /* Glass Morphism Effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.25);
        }

        /* Navigation Items */
        .nav-item {
            position: relative;
            padding: 16px 20px;
            margin: 0 4px;
            transition: color 0.3s ease, transform 0.3s ease;
            color: #fff !important;
            ;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            overflow: hidden;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 3px;
            background: #fff;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
        }

        .nav-item:hover::after {
            width: 100%;
        }

        .nav-item:hover {
            color: var(--primary-800);
            transform: translateY(-2px);
        }

        .nav-item.active {
            font-weight: 600;
            color: var(--primary-900);
        }

        .nav-item.active::after {
            width: 100%;
            background: #fff;
        }

        /* Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }

        /* Hero Banner */
        .hero-banner {
            position: relative;
            height: 100vh;
            min-height: 100vh;
            width: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero-banner {
                min-height: 250px;
                height: calc(85vh - 60px);
                /* 60px header mobile */
            }
        }

        .hero-banner .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: top;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.65) 100%);
            z-index: 1;
        }

        .hero-banner .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-banner .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: top;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .hero-banner .hero-slide.active {
            opacity: 1;
        }

        /* Content Cards */
        .content-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .content-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(128, 0, 32, 0.03) 0%, rgba(255, 215, 0, 0.03) 100%);
            z-index: 0;
        }

        .content-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .content-card .card-header {
            background: var(--primary-gradient);
            color: white;
            padding: 18px 24px;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .content-card .card-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            transform: translateX(-100%);
            transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .content-card:hover .card-header::after {
            transform: translateX(100%);
        }

        /* Section Header */
        .section-header {
            position: relative;
            padding-bottom: 8px;
            margin-bottom: 24px;
        }

        /* Stats Cards */
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        }

        .stat-card .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 10px;
        }

        /* Footer */
        .main-footer {
            background: var(--dark-maroon);
            position: relative;
            overflow: hidden;
            color: rgba(255, 255, 255, 0.8);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .main-footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 10% 20%, rgba(80, 0, 0, 0.8) 0%, transparent 50%),
                radial-gradient(circle at 90% 80%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .footer-links a {
            position: relative;
            padding-bottom: 5px;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent-color);
            transition: width 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .footer-links a:hover {
            color: white;
        }

        .footer-links a:hover::before {
            width: 100%;
        }

        /* Button styles */
        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 4px 15px rgba(128, 0, 32, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0) 100%);
            transform: translateX(-100%);
            transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .btn-primary:hover {
            background: var(--primary-gradient-hover);
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(128, 0, 32, 0.4);
        }

        .btn-primary:hover::after {
            transform: translateX(100%);
        }

        /* Enhanced Chart Styles */
        .chart-container {
            position: relative;
            background: white;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .chart-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(128, 0, 32, 0.03) 0%, rgba(255, 215, 0, 0.03) 100%);
            z-index: 0;
            border-radius: 16px;
        }

        /* News Carousel */
        .news-carousel-container {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            cursor: grab;
            width: 100%;
            max-width: 100%;
        }

        .news-carousel-track {
            display: flex;
            transition: transform 0.8s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .news-carousel-slide {
            min-width: 100%;
            flex-shrink: 0;
        }

        .news-carousel-prev,
        .news-carousel-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.8);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 10;
            cursor: pointer;
        }

        .news-carousel-prev:hover,
        .news-carousel-next:hover {
            background: white;
        }

        .news-carousel-prev {
            left: 16px;
        }

        .news-carousel-next {
            right: 16px;
        }

        .news-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #e5e7eb;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .news-indicator.active,
        .news-indicator:hover {
            background: var(--primary-600);
        }

        /* News Tabs */
        .news-tab-btn {
            padding: 8px 16px;
            font-weight: 600;
            color: #6b7280;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            background: none;
            border-radius: 6px;
            margin-right: 4px;
        }

        .news-tab-btn:hover {
            color: var(--primary-600);
            background-color: rgba(128, 0, 32, 0.05);
        }

        .news-tab-btn.active {
            color: var(--primary-800);
            background-color: rgba(128, 0, 32, 0.1);
            position: relative;
        }

        .news-tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 0;
            right: 0;
            height: 3px;
            background-color: var(--primary-600);
            border-radius: 2px;
        }

        .news-tab-content {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
            overflow: visible;
        }

        .news-tab-content.active {
            display: block;
        }

        /* News List Item Hover */
        .news-list-item {
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }

        .news-list-item:hover {
            background-color: rgba(128, 0, 32, 0.1);
            transform: translateX(4px);
        }

        .news-list-item:hover a {
            color: var(--primary-800);
        }

        .news-list-item h4 {
            font-weight: 600;
            color: #374151;
            transition: all 0.3s ease;
        }

        .news-item-time {
            font-size: 0.75rem;
            color: #6b7280;
            font-weight: 500;
        }

        /* Carousel Progress Bar */
        #carousel-progress-bar {
            transition: width 0.1s linear;
        }

        /* Read More Button */
        .read-more-btn {
            padding: 6px 12px;
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .read-more-btn:hover {
            background-color: rgba(255, 255, 255, 0.9);
            color: var(--primary-800);
        }

        /* View All Button */
        .view-all-btn {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            background-color: var(--primary-600);
            color: white;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .view-all-btn:hover {
            background-color: var(--primary-700);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Service Cards */
        .service-card {
            background: white;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
            /* Flex properties for alignment */
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }

        .service-card.cta-card {
            background: linear-gradient(135deg, var(--primary-700) 0%, var(--primary-900) 100%);
            color: white;
            cursor: default;
        }

        .card-icon {
            font-size: 36px;
            margin-bottom: 16px;
            color: var(--primary-600);
            transition: all 0.3s ease;
        }

        .service-card:hover .card-icon {
            color: var(--primary-800);
            transform: translateX(30px) scale(1.1);
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #1f2937;
        }

        .service-card.cta-card .card-title {
            color: white;
        }

        .card-description {
            color: #4b5563;
            margin-bottom: 24px;
            flex-grow: 1;
            /* Pushes the link to the bottom */
        }

        .service-card.cta-card .card-description {
            color: rgba(255, 255, 255, 0.9);
        }

        .card-link {
            color: var(--primary-600);
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .card-link:hover {
            color: var(--primary-800);
        }

        .service-card.cta-card .card-link {
            color: white;
        }

        .service-card.cta-card .card-link:hover {
            color: var(--accent-color);
        }

        .card-hover-effect {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(128, 0, 32, 0.05) 0%, rgba(255, 215, 0, 0.05) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 12px;
        }

        .service-card:hover .card-hover-effect {
            opacity: 1;
        }

        .cta-pattern {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .pattern-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: 20%;
            right: 15%;
        }

        .pattern-circle {
            position: absolute;
            width: 64px;
            height: 64px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: 10%;
            left: 10%;
        }

        /* Gallery Styles */
        .gallery-masonry {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-auto-rows: minmax(200px, auto);
            gap: 24px;
        }

        .gallery-item {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            position: relative;
            cursor: pointer;
        }

        .gallery-image-container {
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }

        .gallery-item:hover .gallery-image {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 50%, transparent 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 24px;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-content {
            transform: translateY(16px);
            transition: transform 0.3s ease;
        }

        .gallery-item:hover .gallery-content {
            transform: translateY(0);
        }

        .gallery-title {
            color: white;
            font-weight: 700;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .gallery-date {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-bottom: 12px;
        }

        .gallery-view-btn {
            display: inline-flex;
            align-items: center;
            color: white;
            font-size: 14px;
            background: var(--primary-600);
            padding: 4px 12px;
            border-radius: 9999px;
            transition: background-color 0.3s ease;
        }

        .gallery-view-btn:hover {
            background: var(--primary-700);
        }

        /* Stat Tabs */
        .stat-tabs {
            display: flex;
            border-bottom: 1px solid #e5e7eb;
        }

        .stat-tab {
            padding: 12px 24px;
            font-weight: 500;
            color: #6b7280;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .stat-tab::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        .stat-tab:hover {
            color: var(--primary-600);
        }

        .stat-tab.active {
            color: var(--primary-600);
        }

        .stat-tab.active::after {
            background-color: var(--primary-600);
        }

        .stat-tab-content {
            display: none;
        }

        .stat-tab-content.active {
            display: block;
        }

        /* Info Cards */
        .info-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .info-card-header {
            padding: 16px 24px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f3f4f6;
        }

        .info-card-header i {
            font-size: 24px;
            margin-right: 12px;
        }

        .info-card.announcement .info-card-header i {
            color: var(--primary-600);
        }

        .info-card.agenda .info-card-header i {
            color: #059669;
        }

        .info-card.quick-service .info-card-header i {
            color: #d97706;
        }

        .info-card-header h3 {
            font-size: 18px;
            font-weight: 700;
        }

        .info-card-body {
            padding: 16px 24px;
        }

        .info-item {
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f3f4f6;
        }

        .info-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: 0;
        }

        .info-date {
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .info-title {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 4px;
        }

        .info-excerpt {
            font-size: 14px;
            color: #4b5563;
        }

        .info-card-footer {
            padding: 12px 24px;
            background-color: #f9fafb;
        }

        .info-card-link {
            font-size: 14px;
            font-weight: 500;
            color: var(--primary-600);
            display: inline-flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .info-card-link:hover {
            color: var(--primary-800);
        }

        .quick-service-item {
            display: flex;
            align-items: center;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
            margin-bottom: 8px;
        }

        .quick-service-item:last-child {
            margin-bottom: 0;
        }

        .quick-service-item:hover {
            background-color: #f3f4f6;
        }

        .quick-service-item i {
            font-size: 18px;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f3f4f6;
            border-radius: 9999px;
            margin-right: 12px;
            transition: all 0.3s ease;
        }

        .quick-service-item:hover i {
            background-color: #e5e7eb;
            color: var(--primary-600);
        }

        .quick-service-item span {
            color: #1f2937;
        }

        /* Map Controls */
        .map-control-btn {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 9999px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .map-control-btn:hover {
            background: #f3f4f6;
        }

        .map-legend {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: white;
            padding: 12px 16px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .map-popup {
            font-family: 'Inter', sans-serif;
        }

        /* Animations */
        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 2s infinite;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .floating-element {
            position: absolute;
            border-radius: 9999px;
            background-color: rgba(255, 215, 0, 0.2);
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .hero-banner {
                height: 60vh;
            }
        }

        @media (max-width: 768px) {
            .hero-banner {
                height: 50vh;
                min-height: 400px;
            }

            .news-carousel-slide .flex {
                flex-direction: column;
            }

            .news-carousel-slide .lg\:w-1\/2 {
                width: 100%;
                height: 300px;
            }

            .gallery-masonry {
                grid-template-columns: 1fr;
            }

            .stat-tabs {
                overflow-x: auto;
                white-space: nowrap;
            }
        }

        @media (max-width: 640px) {
            .hero-banner {
                height: 45vh;
                min-height: 350px;
            }

            .section-header {
                margin-bottom: 24px;
            }

            .stat-card {
                padding: 20px;
            }
        }

        .service-card {
            padding: 24px;
        }

        /* Tambahan untuk sosial vertikal di banner */
        .hero-banner .social-vertical {
            left: 2rem;
            top: 50%;
            transform: translateY(-50%);
        }

        @media (max-width: 768px) {
            .hero-banner .social-vertical {
                left: 0.5rem;
                top: auto;
                bottom: 1rem;
                flex-direction: row;
                right: auto;
                transform: none;
            }
        }

        /* Custom Header Blur & Hover */
        .custom-header-blur {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            transition: background 0.3s;
        }

        .custom-header-blur:hover,
        .custom-header-blur:focus-within {
            background: rgba(220, 38, 38, 0.93);
            /* merah (red-600) */
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .custom-header-blur .text-white {
            transition: color 0.3s;
        }

        .custom-header-blur:hover .text-white {
            color: #fff;
        }

        @media (max-width: 640px) {
            .custom-header-blur .floating img {
                height: 2.25rem !important;
                /* h-9 */
                width: 2.25rem !important;
                /* w-9 */
            }

            .custom-header-blur span {
                font-size: 0.8rem !important;
            }
        }

        #carousel-banner {
            position: relative;
            overflow: hidden;
            width: 100%;
            height: 400px;
            /* Fixed height for consistency */
        }

        #carousel-banner .carousel-slides {
            display: flex;
            height: 100%;
            transition: transform 0.5s ease;
        }

        #carousel-banner .carousel-slide {
            min-width: 100%;
            position: relative;
        }

        #carousel-banner .carousel-img {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            margin: 0 auto;
            display: block;
        }

        #carousel-banner .carousel-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
        }

        /* === PERBAIKAN MODAL LAYANAN STYLES === */
        .service-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .service-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .service-modal-container {
            background: white;
            border-radius: 16px;
            width: 90%;
            max-width: 800px;
            /* Diperbesar dari 680px */
            max-height: 90vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transform: scale(0.95) translateY(20px);
            transition: transform 0.3s ease;
        }

        .service-modal-overlay.active .service-modal-container {
            transform: scale(1) translateY(0);
        }

        .service-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 24px;
            border-bottom: 1px solid #e5e7eb;
            background: #f9fafb;
        }

        .service-modal-header h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary-800);
            display: flex;
            align-items: center;
        }

        .service-modal-header h3 i {
            margin-right: 12px;
            color: var(--primary-600);
        }

        .service-modal-close-btn {
            background: #e5e7eb;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .service-modal-close-btn:hover {
            background: #d1d5db;
        }

        .service-modal-body {
            padding: 24px;
            overflow-y: auto;
            /* Tambahkan scrollbar jika konten panjang */
            height: 450px;
            /* Beri tinggi tetap agar modal tidak berubah ukuran */
            flex-grow: 1;
        }

        .service-modal-tabs {
            display: flex;
            border-bottom: 2px solid #e5e7eb;
            margin-bottom: 20px;
        }

        .service-modal-tab-btn {
            padding: 10px 20px;
            border: none;
            background: none;
            cursor: pointer;
            font-weight: 600;
            color: #6b7280;
            position: relative;
            transition: color 0.3s;
        }

        .service-modal-tab-btn.active {
            color: var(--primary-800);
        }

        .service-modal-tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--primary-800);
        }

        .service-modal-tab-content {
            display: none;
            animation: fadeIn 0.4s;
        }

        .service-modal-tab-content.active {
            display: block;
        }

        .service-modal-tab-content h4 {
            font-weight: 700;
            margin-bottom: 12px;
            color: #374151;
        }

        .service-modal-tab-content ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .service-modal-tab-content ul li {
            display: flex;
            align-items: flex-start;
            padding: 8px 0;
        }

        .service-modal-tab-content ul li i {
            color: #16a34a;
            /* green-600 */
            margin-right: 10px;
            margin-top: 5px;
        }

        .service-modal-tab-content .timeline {
            position: relative;
            padding-left: 25px;
            border-left: 2px solid #e5e7eb;
        }

        .service-modal-tab-content .timeline-item {
            position: relative;
            padding-bottom: 20px;
        }

        .service-modal-tab-content .timeline-item:last-child {
            padding-bottom: 0;
        }

        .service-modal-tab-content .timeline-dot {
            position: absolute;
            left: -34px;
            top: 5px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background-color: #d1d5db;
            border: 3px solid white;
        }

        .service-modal-tab-content .timeline-item:first-child .timeline-dot {
            background-color: var(--primary-800);
        }

        .service-modal-footer {
            padding: 16px 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            background: #f9fafb;
        }

        .btn-secondary {
            background-color: #e5e7eb;
            color: #374151;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .btn-secondary:hover {
            background-color: #d1d5db;
        }

        /* ========== NEW: GALLERY VIEWER MODAL STYLES ========== */
        #gallery-viewer-modal {
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #gallery-viewer-modal.hidden {
            opacity: 0;
            visibility: hidden;
        }

        #gallery-viewer-main-image-container img {
            transition: opacity 0.3s ease-in-out;
        }

        #gallery-viewer-thumbnails {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.4) rgba(255, 255, 255, 0.1);
        }

        #gallery-viewer-thumbnails::-webkit-scrollbar {
            width: 8px;
        }

        #gallery-viewer-thumbnails::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        /* Gallery item styles - hanya tombol lihat detail yang bisa diklik */
        .gallery-item {
            cursor: default;
        }
        .gallery-image-container {
            cursor: default;
        }
        .gallery-image {
            cursor: default;
            pointer-events: none;
        }
        .gallery-overlay {
            cursor: default;
        }
        .gallery-content {
            cursor: default;
        }
        .gallery-view-btn {
            cursor: pointer;
            display: inline-block;
            pointer-events: auto;
        }

        /* Atur fokus thumbnail galeri modal turun 30% */
        .viewer-thumbnail {
            object-position: center 30% !important;
        }

        #gallery-viewer-thumbnails::-webkit-scrollbar-thumb {
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 4px;
            border: 2px solid transparent;
            background-clip: content-box;
        }

        .viewer-thumbnail {
            border: 2px solid transparent;
            transition: border-color 0.3s, opacity 0.3s;
            opacity: 0.6;
        }

        .viewer-thumbnail.active,
        .viewer-thumbnail:hover {
            border-color: #fff;
            opacity: 1;
        }

        @media (max-width: 1023px) {
            #gallery-viewer-modal .flex-row {
                flex-direction: column;
            }

            #gallery-viewer-thumbnails {
                flex-direction: row;
                overflow-x: auto;
                overflow-y: hidden;
                height: auto;
                max-height: none;
                width: 100%;
                padding: 1rem 0 0 0;
                margin: 0;
            }

            .viewer-thumbnail {
                width: 80px;
                height: 80px;
                flex-shrink: 0;
            }

            #gallery-viewer-main {
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
  <header class="modern-header relative custom-header-blur">
    <div class="container mx-auto px-4 py-2 md:py-3 relative z-10">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3 md:space-x-4">
          <div>
            <img
              src="https://tpikotakel.tanjungpinangkota.go.id/img/logo-tpi.182f9638.png"
              alt="Logo Kelurahan"
              class="h-11 w-11 md:h-12 md:w-12 object-contain" />
          </div>
          <div class="text-white flex flex-col justify-center">
            <span
              class="text-xs md:text-sm font-semibold uppercase tracking-wider block leading-tight">Kelurahan</span>
            <span class="text-base md:text-xl font-bold block leading-tight">Tanjungpinang Kota</span>
          </div>
        </div>

        <div class="hidden md:flex items-center space-x-6">
          <div class="hidden md:flex items-center space-x-1 ml-8">
            <a href="/" class="nav-item {{ request()->is('/') ? 'active' : '' }}">
              <i class="fas fa-home mr-2"></i> Beranda
            </a>
            <a href="/news" class="nav-item {{ request()->is('news') ? 'active' : '' }}">
              <i class="fas fa-newspaper mr-2"></i> Berita
            </a>
            <a href="/attent" class="nav-item {{ request()->is('attent') ? 'active' : '' }}">
              <i class="fas fa-bullhorn mr-2"></i> Pengumuman
            </a>
            <a href="/gallery" class="nav-item {{ request()->is('gallery') ? 'active' : '' }}">
              <i class="fas fa-images mr-2"></i> Galeri
            </a>
            <a href="/download" class="nav-item {{ request()->is('download') ? 'active' : '' }}">
              <i class="fas fa-download mr-2"></i> Download
            </a>
          </div>

          <a
            href="https://icms.tanjungpinangkota.go.id"
            class="glass-card px-6 py-2 rounded-full text-sm hover:bg-white/20 transition-all duration-300 group border border-white/30 text-sm">
            <i class="fas fa-sign-in-alt mr-2 text-white"></i>
            <span class="text-white font-medium">Login</span>
          </a>
        </div>

        <button
          id="mobile-menu-btn"
          class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
          <i class="fas fa-bars text-xl"></i>
        </button>

        <div
          id="mobile-menu"
          class="md:hidden absolute top-full left-0 right-0 mt-2 bg-white shadow-xl hidden">
          <div class="container mx-auto px-4 py-3 space-y-2">
            <a
              href="index.html"
              class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
              <i class="fas fa-home mr-3"></i> Beranda
            </a>
            <a
              href="news.html"
              class="block py-3 px-4 rounded-lg bg-gray-100 text-primary-800 font-medium">
              <i class="fas fa-newspaper mr-3"></i> Berita
            </a>
            <a
              href="attent.html"
              class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
              <i class="fas fa-bullhorn mr-3"></i> Pengumuman
            </a>
            <a
              href="gallery.html"
              class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
              <i class="fas fa-images mr-3"></i> Galeri
            </a>
            <a
              href="download.html"
              class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
              <i class="fas fa-download mr-3"></i> Download
            </a>
            <div class="pt-2">
              <a
                href="https://icms.tanjungpinangkota.go.id"
                class="btn-primary block text-center py-3">
                <i class="fas fa-sign-in-alt mr-2"></i> Login Admin
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

    <div class="hero-banner">
        <div
            class="absolute left-6 top-1/3 z-30 flex flex-col space-y-4 social-vertical">
            <a
                href="https://www.facebook.com/kel.tpikota"
                class="group w-12 h-12 rounded-full bg-gradient-to-r from-blue-600/20 to-blue-700/20 backdrop-blur-md flex items-center justify-center text-white hover:from-blue-600/40 hover:to-blue-700/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20">
                <i
                    class="fab fa-facebook-f text-lg group-hover:scale-110 transition-transform duration-300"></i>
            </a>

            <a
                href="#"
                class="group w-12 h-12 rounded-full bg-gradient-to-r from-sky-500/20 to-sky-600/20 backdrop-blur-md flex items-center justify-center text-white hover:from-sky-500/40 hover:to-sky-600/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20">
                <i
                    class="fab fa-twitter text-lg group-hover:scale-110 transition-transform duration-300"></i>
            </a>

            <a
                href="https://www.instagram.com/kel.tpikota/"
                class="group w-12 h-12 rounded-full bg-gradient-to-r from-pink-500/20 to-rose-600/20 backdrop-blur-md flex items-center justify-center text-white hover:from-pink-500/40 hover:to-rose-600/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20">
                <i class="fab fa-instagram text-lg group-hover:scale-110 transition-transform duration-300"></i>
            </a>

            <a
                href="#"
                class="group w-12 h-12 rounded-full bg-gradient-to-r from-red-500/20 to-red-700/20 backdrop-blur-md flex items-center justify-center text-white hover:from-red-500/40 hover:to-red-700/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20">
                <i class="fab fa-youtube text-lg group-hover:scale-110 transition-transform duration-300"></i>
            </a>
        </div>
        <div class="hero-slide active" style="background-image: url('https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1661907840_7f5de7f0c78f57a90c30.jpg');"></div>

        <div class="hero-slide" style="background-image: url('https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1718954728_47d9af74ec712bd51c9a.jpg');"></div>

        <div class="hero-slide" style="background-image: url('https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1717577239_ba55e5551c63f1be75f7.jpg');"></div>

        <div class="hero-content animate-fade-in">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-white drop-shadow-lg leading-tight">Selamat Datang di <span class="text-white">Kelurahan Tanjungpinang Kota</span></h1>
            <p class="text-xl md:text-2xl mb-8 text-white/90 drop-shadow-lg max-w-2xl mx-auto">Melayani dengan hati untuk masyarakat yang sejahtera dan mandiri</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#berita-final" class="btn-primary px-6 py-3 rounded-full hover:scale-105">
                    <i class="fas fa-newspaper mr-2"></i> Berita Utama
                </a>

                <a href="#layanan" class="glass-card px-6 py-3 rounded-full text-white font-medium hover:bg-white/20 hover:scale-105 transition-all">
                    <i class="fas fa-handshake mr-2"></i> Layanan Kami
                </a>
            </div>
        </div>

        <div class="absolute bottom-8 left-0 right-0 z-10 flex justify-center animate-bounce">
            <a href="#content" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-all">
                <i class="fas fa-chevron-down text-white"></i>
            </a>
        </div>
    </div>


    <div id="mobile-menu" class="md:hidden bg-white shadow-xl hidden">
        <div class="container mx-auto px-4 py-3 space-y-2">
            <a href="index.html" class="block py-3 px-4 rounded-lg bg-gray-100 text-primary-800 font-medium">
                <i class="fas fa-home mr-3"></i> Beranda
            </a>
            <a href="news.html" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-newspaper mr-3"></i> Berita
            </a>
            <a href="attent.html" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-bullhorn mr-3"></i> Pengumuman
            </a>
            <a href="gallery.html" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-images mr-3"></i> Galeri
            </a>
            <a href="download.html" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-download mr-3"></i> Download
            </a>
            <a href="#layanan" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-handshake mr-3"></i> Layanan
            </a>
            <div class="pt-2">
                <a href="https://icms.tanjungpinangkota.go.id" class="btn-primary block text-center py-3">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login Admin
                </a>
            </div>
        </div>
    </div>
    </nav>

    <main id="content" class="fixed-container py-16">

        <section id="berita-final" class="mb-20" data-aos="fade-up">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="stat-card group" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number animate-bounce-slow">5,102</div>
                    <div class="text-gray-600 font-medium">Total Penduduk</div>
                    <div class="absolute bottom-4 right-4 text-gray-200 group-hover:text-[#900030] transition-colors">
                        <i class="fas fa-users text-4xl opacity-30 group-hover:opacity-100 transition-all"></i>
                    </div>
                    <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#900030] transition-all duration-300 rounded-xl"></div>
                </div>

                <div class="stat-card group" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number animate-bounce-slow" style="animation-delay: 0.2s">24</div>
                    <div class="text-gray-600 font-medium">RT</div>
                    <div class="absolute bottom-4 right-4 text-gray-200 group-hover:text-[#900030] transition-colors">
                        <i class="fas fa-home text-4xl opacity-30 group-hover:opacity-100 transition-all"></i>
                    </div>
                    <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#900030] transition-all duration-300 rounded-xl"></div>
                </div>

                <div class="stat-card group" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number animate-bounce-slow" style="animation-delay: 0.3s">8</div>
                    <div class="text-gray-600 font-medium">RW</div>
                    <div class="absolute bottom-4 right-4 text-gray-200 group-hover:text-[#900030] transition-colors">
                        <i class="fas fa-map-marked-alt text-4xl opacity-30 group-hover:opacity-100 transition-all"></i>
                    </div>
                    <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#900030] transition-all duration-300 rounded-xl"></div>
                </div>

                <div class="stat-card group" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-number animate-bounce-slow" style="animation-delay: 0.4s">12</div>
                    <div class="text-gray-600 font-medium">Program Unggulan</div>
                    <div class="absolute bottom-4 right-4 text-gray-200 group-hover:text-[#900030] transition-colors">
                        <i class="fas fa-trophy text-4xl opacity-30 group-hover:opacity-100 transition-all"></i>
                    </div>
                    <div class="absolute inset-0 border-2 border-transparent group-hover:border-[#900030] transition-all duration-300 rounded-xl"></div>
                </div>
            </div>
        </section>

        <section id="berita-final" class="mb-20" data-aos="fade-up">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-4 sm:p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-newspaper text-[#900030] mr-3"></i>
                            Berita Utama
                        </h2>
                        <a href="/news" class="inline-flex items-center text-[#900030] hover:text-white font-medium text-sm transition-all hover:scale-105 group border-2 border-[#900030] hover:bg-[#900030] px-4 py-2 rounded-lg">
                            <span class="mr-2">Lihat Semua</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        <div class="lg:col-span-2">
                            <div id="news-carousel-wrapper" class="relative rounded-xl overflow-hidden shadow-lg" style="height: 400px;">
                                <div class="news-carousel-track h-full">
                                    <div class="news-carousel-slide">
                                        <div class="relative h-full">
                                            <img src="https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1698139006_720de976749805e4c099.jpg"
                                                alt="Berita 1" class="w-full h-full object-cover object-top">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                                <div class="mb-3">
                                                    <span class="inline-block bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">LINGKUNGAN</span>
                                                    <span class="text-xs text-gray-300 ml-2">20 Juni 2024</span>
                                                </div>
                                                <h3 class="text-xl font-bold mb-3 leading-tight">
                                                    <a href="news-detail2.html" class="hover:text-accent-color transition-colors">Kelurahan Raih Penghargaan Adipura Tingkat Kota</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news-carousel-slide">
                                        <div class="relative h-full">
                                            <img src="https://images.unsplash.com/photo-1573167507387-6b4b98cb7c13?q=80&w=1280&h=720&auto=format&fit=crop"
                                                alt="Berita 2" class="w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                                <div class="mb-3">
                                                    <span class="inline-block bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">PEMERINTAHAN</span>
                                                    <span class="text-xs text-gray-300 ml-2">25 Juni 2024</span>
                                                </div>
                                                <h3 class="text-xl font-bold mb-3 leading-tight">
                                                    <a href="#" class="hover:text-accent-color transition-colors">Sosialisasi E-KTP Digital untuk Seluruh Ketua RT dan RW</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="news-carousel-slide">
                                        <div class="relative h-full">
                                            <img src="https://sinaumedia.com/wp-content/uploads/2023/03/Definition-of-Gotong-Royong-and-its-Benefits-and-Examples-scaled.jpg"
                                                alt="Berita 3" class="w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                                <div class="mb-3">
                                                    <span class="inline-block bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold mb-2">LINGKUNGAN</span>
                                                    <span class="text-xs text-gray-300 ml-2">8 Juli 2024</span>
                                                </div>
                                                <h3 class="text-xl font-bold mb-3 leading-tight">
                                                    <a href="#" class="hover:text-accent-color transition-colors">Gotong Royong Bersih-Bersih Lingkungan RT 05</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="news-carousel-prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 w-10 h-10 rounded-full shadow-lg flex items-center justify-center transition-all z-10">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="news-carousel-next absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 w-10 h-10 rounded-full shadow-lg flex items-center justify-center transition-all z-10">
                                    <i class="fas fa-chevron-right"></i>
                                </button>

                                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                                    <button class="news-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-all" data-slide="0"></button>
                                    <button class="news-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-all" data-slide="1"></button>
                                    <button class="news-indicator w-2 h-2 rounded-full bg-white/50 hover:bg-white transition-all" data-slide="2"></button>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1 flex flex-col">
                            <div class="bg-gray-50 rounded-xl shadow-md border border-gray-200 p-4">
                                <div class="flex justify-between items-center border-b border-gray-200 pb-3 mb-4">
                                    <div class="flex">
                                        <button class="news-tab-btn active" data-tab="terkini">Terkini</button>
                                        <button class="news-tab-btn" data-tab="populer">Populer</button>
                                    </div>
                                </div>

                                <div class="overflow-visible" style="width: 100%;">
                                    <div id="terkini" class="news-tab-content active">
                                        <ul class="space-y-3">
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Peringatan HUT RI ke-80 di Kelurahan</h4>
                                                    <span class="text-xs text-gray-500">1 jam lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Jadwal Baru Pelayanan Adminduk</h4>
                                                    <span class="text-xs text-gray-500">3 jam lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Vaksinasi COVID-19 Dosis Keempat</h4>
                                                    <span class="text-xs text-gray-500">1 hari lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Kerja Bakti Mingguan di RW 05</h4>
                                                    <span class="text-xs text-gray-500">2 hari lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Lomba Cerdas Cermat Tingkat Kelurahan</h4>
                                                    <span class="text-xs text-gray-500">3 hari lalu</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div id="populer" class="news-tab-content">
                                        <ul class="space-y-3">
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Bantuan Langsung Tunai (BLT) Cair</h4>
                                                    <span class="text-xs text-gray-500">1 minggu lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Cara Mengurus IMB Online</h4>
                                                    <span class="text-xs text-gray-500">2 minggu lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Kelurahan Raih Penghargaan Adipura</h4>
                                                    <span class="text-xs text-gray-500">1 bulan lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Profil Lurah Baru</h4>
                                                    <span class="text-xs text-gray-500">2 bulan lalu</span>
                                                </a>
                                            </li>
                                            <li class="news-list-item rounded-lg transition-all">
                                                <a href="#" class="flex justify-between items-center">
                                                    <h4 class="font-semibold text-sm text-gray-800 mb-1">Jalan Sehat Merayakan Hari Jadi Kota</h4>
                                                    <span class="text-xs text-gray-500">3 bulan lalu</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-t border-gray-200">
                                    <a href="/news" class="w-full inline-flex items-center justify-center bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-all">
                                        <i class="fas fa-newspaper mr-2"></i> Lihat Semua Berita
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="layanan" class="mb-20" data-aos="fade-up">
            <div class="section-header">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    <i class="fas fa-handshake text-[#900030] mr-3"></i>Layanan Kami
                </h2>
                <p class="text-gray-600 mt-2">Berbagai layanan administrasi yang dapat kami berikan untuk masyarakat</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="service-card group" data-aos="fade-up" data-aos-delay="100" data-service-key="ktp">
                    <div class="card-icon"><i class="fas fa-id-card"></i></div>
                    <h3 class="card-title">Pembuatan KTP</h3>
                    <p class="card-description">Pelayanan pembuatan Kartu Tanda Penduduk (KTP) elektronik untuk warga yang telah berusia 17 tahun atau sudah menikah.</p>
                    <span class="card-link mt-auto">Pelajari lebih lanjut <i class="fas fa-arrow-right ml-2"></i></span>
                    <div class="card-hover-effect"></div>
                </div>

                <div class="service-card group" data-aos="fade-up" data-aos-delay="200" data-service-key="domisili">
                    <div class="card-icon"><i class="fas fa-home"></i></div>
                    <h3 class="card-title">Surat Domisili</h3>
                    <p class="card-description">Pelayanan pembuatan surat keterangan domisili untuk keperluan administrasi seperti sekolah, pekerjaan, atau pembuatan dokumen lain.</p>
                    <span class="card-link mt-auto">Pelajari lebih lanjut <i class="fas fa-arrow-right ml-2"></i></span>
                    <div class="card-hover-effect"></div>
                </div>

                <div class="service-card group" data-aos="fade-up" data-aos-delay="300" data-service-key="kelahiran">
                    <div class="card-icon"><i class="fas fa-baby"></i></div>
                    <h3 class="card-title">Akta Kelahiran</h3>
                    <p class="card-description">Pelayanan pengurusan akta kelahiran untuk anak yang baru lahir dengan persyaratan yang mudah dan proses cepat.</p>
                    <span class="card-link mt-auto">Pelajari lebih lanjut <i class="fas fa-arrow-right ml-2"></i></span>
                    <div class="card-hover-effect"></div>
                </div>

                <div class="service-card group" data-aos="fade-up" data-aos-delay="400" data-service-key="sktm">
                    <div class="card-icon"><i class="fas fa-file-contract"></i></div>
                    <h3 class="card-title">Surat Keterangan Tidak Mampu</h3>
                    <p class="card-description">Pelayanan pembuatan surat keterangan tidak mampu (SKTM) untuk keperluan bantuan sosial, pendidikan, atau kesehatan.</p>
                    <span class="card-link mt-auto">Pelajari lebih lanjut <i class="fas fa-arrow-right ml-2"></i></span>
                    <div class="card-hover-effect"></div>
                </div>

                <div class="service-card group" data-aos="fade-up" data-aos-delay="500" data-service-key="nikah">
                    <div class="card-icon"><i class="fas fa-heart"></i></div>
                    <h3 class="card-title">Surat Nikah</h3>
                    <p class="card-description">Pelayanan pengurusan surat nikah dan dispensasi nikah bagi calon pengantin yang memenuhi persyaratan.</p>
                    <span class="card-link mt-auto">Pelajari lebih lanjut <i class="fas fa-arrow-right ml-2"></i></span>
                    <div class="card-hover-effect"></div>
                </div>
            </div>
        </section>

        <section id="peta" class="mb-20" data-aos="fade-up">
            <div class="section-header">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                    <i class="fas fa-map-marked-alt text-[#900030] mr-3"></i>
                    Peta Wilayah
                </h2>
                <p class="text-gray-600">Wilayah administrasi Kelurahan Tanjungpinang Kota</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden h-full">
                        <div class="relative h-full">
                            <div id="map" style="height:100%;width:100%; z-index: 1;">
                            </div>

                            <div class="absolute bottom-4 right-4 flex space-x-2 z-[20]">
                                <button id="zoom-in" class="bg-white/90 hover:bg-white border border-gray-200 rounded-lg px-3 py-2 text-gray-700 hover:text-[#900030] transition-colors shadow-sm">
                                    <i class="fas fa-plus text-sm"></i>
                                </button>
                                <button id="zoom-out" class="bg-white/90 hover:bg-white border border-gray-200 rounded-lg px-3 py-2 text-gray-700 hover:text-[#900030] transition-colors shadow-sm">
                                    <i class="fas fa-minus text-sm"></i>
                                </button>
                                <button id="fullscreen-map" class="bg-white/90 hover:bg-white border border-gray-200 rounded-lg px-3 py-2 text-gray-700 hover:text-[#900030] transition-colors shadow-sm">
                                    <i class="fas fa-expand text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-50 border-t">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center space-x-4">
                                    <div class="flex items-center">
                                        <div class="w-4 h-4 mr-2">
                                            <img src="https://tpikotakel.tanjungpinangkota.go.id/img/logo-tpi.182f9638.png" alt="icon kantor" class="w-full h-full">
                                        </div>
                                        <span class="text-gray-600">Kantor Kelurahan</span>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="w-3 h-3 border-2 border-yellow-500 bg-yellow-200 rounded-sm mr-2"></div>
                                        <span class="text-gray-600">Wilayah RW</span>
                                    </div>
                                </div>
                                <button id="reset-map" class="text-[#900030] hover:text-[#b91c47] font-medium">
                                    <i class="fas fa-sync-alt mr-1"></i> Reset
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 flex flex-col">
                    <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100 flex-1">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-building text-[#900030]"></i>
                            </div>
                            <h3 class="font-bold text-gray-800">Kantor Kelurahan</h3>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p><i class="fas fa-map-marker-alt text-[#900030] mr-2"></i>Jl. Mesjid No.7 Tanjungpinang Kota Kec. Tj. Pinang Kota Kota Tanjung Pinang, Kepulauan Riau, Indonesia.</p>
                            <p><i class="fas fa-phone text-[#900030] mr-2"></i>+62 771 123456</p>
                            <p><i class="fas fa-clock text-[#900030] mr-2"></i>Senin-Jumat: 08.00-16.00 WIB</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100 flex-1">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-info-circle text-blue-600"></i>
                            </div>
                            <h3 class="font-bold text-gray-800">Informasi Wilayah</h3>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p><strong>Luas Wilayah:</strong> 12.5 km²</p>
                            <p><strong>Jumlah RW:</strong> 8 RW</p>
                            <p><strong>Jumlah RT:</strong> 24 RT</p>
                            <p><strong>Batas Wilayah:</strong></p>
                            <ul class="ml-4 space-y-1 text-xs">
                                <li>• Utara: Kelurahan Kampung Bugis</li>
                                <li>• Selatan: Kelurahan Senggarang</li>
                                <li>• Timur: Selat Tebrau</li>
                                <li>• Barat: Kelurahan Bukit Cermin</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100 flex-1">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-green-50 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-landmark text-green-600"></i>
                            </div>
                            <h3 class="font-bold text-gray-800">Fasilitas Umum</h3>
                        </div>
                        <div class="space-y-2 text-sm text-gray-600">
                            <p><i class="fas fa-school text-green-600 mr-2"></i>3 Sekolah Dasar</p>
                            <p><i class="fas fa-hospital text-green-600 mr-2"></i>1 Puskesmas</p>
                            <p><i class="fas fa-mosque text-green-600 mr-2"></i>5 Masjid</p>
                            <p><i class="fas fa-store text-green-600 mr-2"></i>2 Pasar Tradisional</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-20" data-aos="fade-up">
            <div class="section-header">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    <i class="fas fa-images text-[#900030] mr-3"></i>Galeri Kegiatan
                </h2>
                <p class="text-gray-600 mt-2">Dokumentasi berbagai kegiatan di Kelurahan Tanjungpinang Kota</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="gallery-item" data-aos="fade-up" data-aos-delay="100" data-album-id="penyaluran-bantuan">
                    <div class="gallery-image-container">
                        <img src="https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1718954728_47d9af74ec712bd51c9a.jpg"
                            alt="Kegiatan Sosial"
                            class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h3 class="gallery-title">Penyaluran Bantuan Sembako</h3>
                                <p class="gallery-date">21 Juni 2024</p>
                                <div class="gallery-view-btn">
                                    <i class="fas fa-search-plus mr-2"></i> Lihat Detail
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-aos="fade-up" data-aos-delay="200" data-album-id="penghargaan-terbaik">
                    <div class="gallery-image-container">
                        <img src="https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1717577239_ba55e5551c63f1be75f7.jpg"
                            alt="Lomba Kelurahan"
                            class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h3 class="gallery-title">Penghargaan Kelurahan Terbaik</h3>
                                <p class="gallery-date">29 Mei 2024</p>
                                <div class="gallery-view-btn">
                                    <i class="fas fa-search-plus mr-2"></i> Lihat Detail
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-aos="fade-up" data-aos-delay="300" data-album-id="sadar-hukum">
                    <div class="gallery-image-container">
                        <img src="https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1698139006_720de976749805e4c099.jpg"
                            alt="Binaan Hukum"
                            class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h3 class="gallery-title">Pelatihan Sadar Hukum</h3>
                                <p class="gallery-date">15 April 2024</p>
                                <div class="gallery-view-btn">
                                    <i class="fas fa-search-plus mr-2"></i> Lihat Detail
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <a href="/gallery" class="btn-primary inline-flex items-center px-6 py-3 text-lg">
                    <i class="fas fa-images mr-2"></i> Lihat Galeri Lengkap
                </a>
            </div>
        </section>

        <section class="mb-20" data-aos="fade-up">
            <div class="section-header">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    <i class="fas fa-chart-bar text-[#900030] mr-3"></i>Statistik Penduduk
                </h2>
                <p class="text-gray-600 mt-2">Data kependudukan Kelurahan Tanjungpinang Kota tahun 2024</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="stat-tabs">
                    <button class="stat-tab active" data-tab="population">Jenis Kelamin</button>
                    <button class="stat-tab" data-tab="age">Distribusi Usia</button>
                    <button class="stat-tab" data-tab="education">Tingkat Pendidikan</button>
                    <button class="stat-tab" data-tab="job">Pekerjaan</button>
                </div>

                <div class="p-4 md:p-6">
                    <div class="stat-tab-content active" id="population-tab">
                        <div class="chart-container" style="height: 400px;">
                            <canvas id="populationChart"></canvas>
                        </div>
                    </div>

                    <div class="stat-tab-content" id="age-tab">
                        <div class="chart-container" style="height: 400px;">
                            <canvas id="ageDistributionChart"></canvas>
                        </div>
                    </div>

                    <div class="stat-tab-content" id="education-tab">
                        <div class="chart-container" style="height: 400px;">
                            <canvas id="educationChart"></canvas>
                        </div>
                    </div>

                    <div class="stat-tab-content" id="job-tab">
                        <div class="chart-container" style="height: 400px;">
                            <canvas id="jobChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-16" data-aos="fade-up">
            <div class="section-header">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                    <i class="fas fa-hands-helping text-[#900030] mr-3"></i>
                    Program Unggulan
                </h2>
                <p class="text-gray-600">Program-program terbaik untuk kemajuan masyarakat</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-graduation-cap text-xl"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Beasiswa Prestasi</h3>
                        <p class="text-blue-100 text-sm mb-4">Program beasiswa untuk siswa berprestasi dari keluarga kurang mampu</p>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-users mr-2"></i>
                            <span>127 Penerima</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-seedling text-xl"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">Kampung Hijau</h3>
                        <p class="text-green-100 text-sm mb-4">Gerakan penghijauan dan pengelolaan sampah untuk lingkungan bersih</p>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-leaf mr-2"></i>
                            <span>8 RW Terlibat</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white relative overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                    <div class="absolute top-0 right-0 w-20 h-20 bg-white/10 rounded-full -mr-10 -mt-10"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center mb-4">
                            <i class="fas fa-store text-xl"></i>
                        </div>
                        <h3 class="font-bold text-lg mb-2">UMKM Digital</h3>
                        <p class="text-purple-100 text-sm mb-4">Pemberdayaan usaha kecil melalui platform digital dan pelatihan</p>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-chart-line mr-2"></i>
                            <span>45 UMKM Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-20" data-aos="fade-up">
            <div class="section-header">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                    <i class="fas fa-exclamation-circle text-[#900030] mr-3"></i>Info Penting
                </h2>
                <p class="text-gray-600 mt-2">Informasi terkini yang perlu diperhatikan warga</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="info-card announcement">
                    <div class="info-card-header">
                        <i class="fas fa-bullhorn"></i>
                        <h3>Pengumuman</h3>
                    </div>
                    <div class="info-card-body">
                        <div class="info-item">
                            <span class="info-date">25 Juni 2025</span>
                            <h4 class="info-title">ANGIN LAUT</h4>
                            <p class="info-excerpt">Kelurahan Tanjung Pinang Kota merupakan pusat pemerintahan Kota Tanjung Pinang dengan luas wilayah 12,5 km² dan populasi sekitar 15.000 jiwa.</p>
                        </div>
                        <div class="info-item">
                            <span class="info-date">25 Juni 2025</span>
                            <h4 class="info-title">PROFIL LENGKAP KELURAHAN</h4>
                            <p class="info-excerpt">Kelurahan Tanjung Pinang Kota merupakan pusat pemerintahan Kota Tanjung Pinang dengan luas wilayah 12,5 km² dan populasi sekitar 15.000 jiwa.</p>
                        </div>
                        <div class="info-item">
                            <span class="info-date">25 Juni 2025</span>
                            <h4 class="info-title">PROFIL LENGKAP KELURAHAN</h4>
                            <p class="info-excerpt">Kelurahan Tanjung Pinang Kota merupakan pusat pemerintahan Kota Tanjung Pinang dengan luas wilayah 12,5 km² dan populasi sekitar 15.000 jiwa.</p>
                        </div>
                        <div class="info-item">
                            <span class="info-date">25 Juni 2025</span>
                            <h4 class="info-title">PROFIL LENGKAP KELURAHAN</h4>
                            <p class="info-excerpt">Kelurahan Tanjung Pinang Kota merupakan pusat pemerintahan Kota Tanjung Pinang dengan luas wilayah 12,5 km² dan populasi sekitar 15.000 jiwa.</p>
                        </div>
                    </div>
                    <div class="info-card-footer">
                        <a href="/attent" class="info-card-link">
                            Lihat Semua Pengumuman <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="info-card infographic">
                    <div class="info-card-header">
                        <i class="fas fa-image"></i>
                        <h3>Infografis</h3>
                    </div>
                    <div class="info-card-body p-0">
                        <img src="https://icms.tanjungpinangkota.go.id/api/getDownloadInfografis/7243000000/1729582929_24ae13f6024ae1b0768c.jpg"
                            alt="Infografis"
                            class="w-full h-auto object-cover">
                    </div>
                    <div class="info-card-footer">
                        <a href="#" class="info-card-link">
                            Lihat Infografis Lainnya <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer relative">
        <div class="fixed-container py-16 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                <div>
                    <h3 class="text-white text-xl font-bold mb-6">Tentang Kami</h3>
                    <img src="https://tpikotakel.tanjungpinangkota.go.id/img/logo-tpi.182f9638.png"
                        alt="Logo Kelurahan"
                        class="h-16 mb-4">
                    <p class="text-gray-300 mb-4">
                        Kelurahan Tanjungpinang Kota merupakan salah satu kelurahan di Kecamatan Tanjungpinang Kota, Kota Tanjungpinang, Provinsi Kepulauan Riau.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/kel.tpikota" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/kel.tpikota/" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white text-xl font-bold mb-6">Tautan Cepat</h3>
                    <ul class="space-y-3 footer-links">
                        <li><a href="#" class="text-gray-300">Beranda</a></li>
                        <li><a href="news.html" class="text-gray-300">Berita</a></li>
                        <li><a href="attent.html" class="text-gray-300">Pengumuman</a></li>
                        <li><a href="gallery.html" class="text-gray-300">Galeri</a></li>
                        <li><a href="download.html" class="text-gray-300">Download</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-xl font-bold mb-6">Layanan</h3>
                    <ul class="space-y-3 footer-links">
                        <li><a href="#" class="text-gray-300">Pembuatan KTP</a></li>
                        <li><a href="#" class="text-gray-300">Surat Domisili</a></li>
                        <li><a href="#" class="text-gray-300">Akta Kelahiran</a></li>
                        <li><a href="#" class="text-gray-300">Surat Nikah</a></li>
                        <li><a href="#" class="text-gray-300">Surat Kematian</a></li>
                        <li><a href="#" class="text-gray-300">SKTM</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white text-xl font-bold mb-6">Kontak Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-accent-color mt-1 mr-3"></i>
                            <span class="text-gray-300">Jl. Mesjid No.7 Tanjungpinang Kota Kec. Tj. Pinang Kota Kota Tanjung Pinang, Kepulauan Riau, Indonesia</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-accent-color mr-3"></i>
                            <span class="text-gray-300">+62 771 123456</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope text-accent-color mr-3"></i>
                            <span class="text-gray-300">tpikotakel@tanjungpinangkota.go.id</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-accent-color mr-3"></i>
                            <span class="text-gray-300">Senin-Jumat: 08.00-16.00 WIB</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    © 2025 Design by Kerja Praktik UMRAH.
                </p>
            </div>
        </div>
    </footer>

    <div id="service-modal" class="service-modal-overlay">
        <div class="service-modal-container">
            <div class="service-modal-header">
                <h3 id="modal-title"><i id="modal-icon" class="fas"></i></h3>
                <button class="service-modal-close-btn" onclick="closeServiceModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="service-modal-body">
                <p id="modal-description" class="mb-4 text-gray-600"></p>
                <div class="service-modal-tabs">
                    <button class="service-modal-tab-btn active" data-tab="syarat">Persyaratan</button>
                    <button class="service-modal-tab-btn" data-tab="alur">Alur Proses</button>
                    <button class="service-modal-tab-btn" data-tab="waktu">Waktu & Biaya</button>
                    <button class="service-modal-tab-btn" data-tab="unduh">Unduh Formulir</button>
                </div>
                <div id="modal-content-syarat" class="service-modal-tab-content active"></div>
                <div id="modal-content-alur" class="service-modal-tab-content"></div>
                <div id="modal-content-waktu" class="service-modal-tab-content"></div>
                <div id="modal-content-unduh" class="service-modal-tab-content"></div>
            </div>
            <div class="service-modal-footer">
                <button class="btn-primary" onclick="closeServiceModal()" style="padding: 10px 20px;">Tutup</button>
            </div>
        </div>
    </div>

    <div id="gallery-viewer-modal" class="hidden fixed inset-0 z-[9999] bg-black/90 backdrop-blur-sm">
        <div class="relative w-full h-full p-4 md:p-8 flex flex-row">
            <div class="absolute top-4 left-4 right-4 flex justify-between items-start z-50">
                <h2 id="gallery-viewer-album-title" class="text-red-500 text-2xl font-bold bg-black/50 px-4 py-2 rounded-lg backdrop-blur-sm"></h2>
                <button id="gallery-viewer-close" class="text-white text-4xl hover:text-gray-300 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div id="gallery-viewer-main" class="flex-grow h-full flex flex-col justify-center items-center relative lg:mr-4">
                <h3 id="gallery-viewer-title" class="text-white text-xl font-normal mb-4 text-center"></h3>

                <div id="gallery-viewer-main-image-container" class="relative w-full flex-grow flex items-center justify-center overflow-hidden">
                    <img id="gallery-viewer-main-image" src="" alt="" class="max-w-full max-h-full object-contain">
                </div>

                <button id="gallery-viewer-prev" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white w-12 h-12 rounded-full text-2xl flex items-center justify-center transition">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="gallery-viewer-next" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white w-12 h-12 rounded-full text-2xl flex items-center justify-center transition">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div id="gallery-viewer-thumbnails" class="lg:w-48 xl:w-56 flex-shrink-0 h-full overflow-y-auto flex flex-col gap-3 pr-2 pt-20 pb-4">
            </div>
        </div>
    </div>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // === SELURUH JAVASCRIPT UTAMA ADA DI SINI ===
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS animation
            AOS.init({
                duration: 800,
                easing: 'ease-in-out-quart',
                once: true,
                offset: 120,
            });

            const header = document.querySelector(".modern-header");
            window.addEventListener("scroll", () => {
                header.classList.toggle("scrolled", window.scrollY > 50);
            });

            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuBtn.addEventListener('click', function() {
                const isHidden = mobileMenu.classList.toggle('hidden');
                mobileMenuBtn.innerHTML = isHidden ?
                    '<i class="fas fa-bars text-xl"></i>' :
                    '<i class="fas fa-times text-xl"></i>';

                if (!isHidden) {
                    anime({
                        targets: mobileMenu,
                        opacity: [0, 1],
                        translateY: [-20, 0],
                        duration: 300,
                        easing: 'easeOutQuad'
                    });
                }
            });

            // Hero Carousel
            let currentSlide = 0;
            const slides = document.querySelectorAll('.hero-slide');
            const totalSlides = slides.length;
            let slideInterval;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === index);
                });
                currentSlide = index;
            }

            function nextSlide() {
                showSlide((currentSlide + 1) % totalSlides);
            }

            function startSlideShow() {
                stopSlideShow();
                slideInterval = setInterval(nextSlide, 5000);
            }

            function stopSlideShow() {
                clearInterval(slideInterval);
            }

            const heroBanner = document.querySelector('.hero-banner');
            heroBanner.addEventListener('mouseenter', stopSlideShow);
            heroBanner.addEventListener('mouseleave', startSlideShow);

            showSlide(0);
            startSlideShow();

            // News Carousel
            const newsWrapper = document.getElementById('news-carousel-wrapper');
            const newsTrack = document.querySelector('.news-carousel-track');
            let newsSlides = document.querySelectorAll('.news-carousel-slide');
            const newsPrevBtn = document.querySelector('.news-carousel-prev');
            const newsNextBtn = document.querySelector('.news-carousel-next');
            const newsIndicators = document.querySelectorAll('.news-indicator');

            let currentNewsIndex = 1; // Mulai dari slide pertama yang asli
            let isTransitioning = false;
            const slideDuration = 4000; // 4 detik
            let newsInterval;

            const firstClone = newsSlides[0].cloneNode(true);
            const lastClone = newsSlides[newsSlides.length - 1].cloneNode(true);

            newsTrack.appendChild(firstClone);
            newsTrack.insertBefore(lastClone, newsSlides[0]);
            newsSlides = document.querySelectorAll('.news-carousel-slide');

            newsTrack.style.transition = 'none';
            newsTrack.style.transform = `translateX(-${currentNewsIndex * 100}%)`;

            setTimeout(() => {
                newsTrack.style.transition = 'transform 0.8s cubic-bezier(0.25, 0.8, 0.25, 1)';
            }, 50);

            const moveToSlide = () => {
                newsTrack.style.transform = `translateX(-${currentNewsIndex * 100}%)`;
                updateIndicators();
            };

            const updateIndicators = () => {
                let indicatorIndex = currentNewsIndex - 1;
                if (currentNewsIndex === 0) {
                    indicatorIndex = newsIndicators.length - 1;
                } else if (currentNewsIndex === newsSlides.length - 1) {
                    indicatorIndex = 0;
                }
                newsIndicators.forEach((indicator, i) => {
                    indicator.classList.toggle('active', i === indicatorIndex);
                });
            };

            newsTrack.addEventListener('transitionend', () => {
                isTransitioning = false;
                if (currentNewsIndex === 0) {
                    newsTrack.style.transition = 'none';
                    currentNewsIndex = newsSlides.length - 2;
                    newsTrack.style.transform = `translateX(-${currentNewsIndex * 100}%)`;
                }
                if (currentNewsIndex === newsSlides.length - 1) {
                    newsTrack.style.transition = 'none';
                    currentNewsIndex = 1;
                    newsTrack.style.transform = `translateX(-${currentNewsIndex * 100}%)`;
                }
                setTimeout(() => {
                    newsTrack.style.transition = 'transform 0.8s cubic-bezier(0.25, 0.8, 0.25, 1)';
                });
            });

            const nextNewsSlide = () => {
                if (isTransitioning) return;
                isTransitioning = true;
                currentNewsIndex++;
                moveToSlide();
            };

            const prevNewsSlide = () => {
                if (isTransitioning) return;
                isTransitioning = true;
                currentNewsIndex--;
                moveToSlide();
            };

            function startNewsCarousel() {
                stopNewsCarousel();
                newsInterval = setInterval(nextNewsSlide, slideDuration);
            }

            function stopNewsCarousel() {
                clearInterval(newsInterval);
            }

            newsNextBtn.addEventListener('click', () => {
                nextNewsSlide();
                stopNewsCarousel();
                startNewsCarousel();
            });
            newsPrevBtn.addEventListener('click', () => {
                prevNewsSlide();
                stopNewsCarousel();
                startNewsCarousel();
            });
            newsIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    if (isTransitioning) return;
                    isTransitioning = true;
                    currentNewsIndex = index + 1;
                    moveToSlide();
                    stopNewsCarousel();
                    startNewsCarousel();
                });
            });

            newsWrapper.addEventListener('mouseenter', stopNewsCarousel);
            newsWrapper.addEventListener('mouseleave', startNewsCarousel);

            updateIndicators();
            startNewsCarousel();

            // === FUNGSIONALITAS NEWS TABS (TERKINI & POPULER) ===
            const newsTabBtns = document.querySelectorAll('.news-tab-btn');
            const newsTabContents = document.querySelectorAll('.news-tab-content');

            newsTabBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    // Nonaktifkan semua tombol dan konten
                    newsTabBtns.forEach(b => b.classList.remove('active'));
                    newsTabContents.forEach(c => c.classList.remove('active'));

                    // Aktifkan tombol yang diklik dan konten yang sesuai
                    btn.classList.add('active');
                    const tabId = btn.getAttribute('data-tab');
                    const targetContent = document.getElementById(tabId);
                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });

            // Leaflet Map Initialization
            const map = L.map('map', {
                zoomControl: false,
                scrollWheelZoom: true,
                attributionControl: false,
            }).setView([0.9276, 104.4435], 17);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            const kelurahanIcon = L.icon({
                iconUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon.png',
                iconRetinaUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-icon-2x.png',
                shadowUrl: 'https://unpkg.com/leaflet@1.7.1/dist/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            L.marker([0.9276, 104.4435], {
                    icon: kelurahanIcon
                }).addTo(map)
                .bindPopup(`...`) // Konten popup
                .openPopup();

            document.getElementById('zoom-in').addEventListener('click', () => map.zoomIn());
            document.getElementById('zoom-out').addEventListener('click', () => map.zoomOut());
            document.getElementById('reset-map').addEventListener('click', () => map.setView([0.9276, 104.4435], 17));
            document.getElementById('fullscreen-map').addEventListener('click', () => {
                const mapContainer = document.querySelector('#map').parentElement;
                if (!document.fullscreenElement) {
                    mapContainer.requestFullscreen().catch(err => alert(`Error: ${err.message}`));
                } else {
                    document.exitFullscreen();
                }
            });

            // Chart.js, Stat Tabs, Scroll to top, Header scroll, Anchor links, News Tabs, etc.
            const chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                weight: '500'
                            },
                            padding: 20,
                            usePointStyle: true,
                            pointStyle: 'rectRounded'
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        bodyFont: {
                            size: 12
                        },
                        padding: 12,
                        cornerRadius: 8,
                        callbacks: {
                            label: (context) => `${context.label}: ${context.raw.toLocaleString()}`
                        }
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutQuart'
                }
            };

            let populationChart, ageChart, educationChart, jobChart;

            function createPopulationChart() {
                const ctx = document.getElementById('populationChart').getContext('2d');
                return new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Laki-laki', 'Perempuan'],
                        datasets: [{
                            data: [2521, 2581],
                            backgroundColor: ['rgba(128, 0, 32, 0.8)', 'rgba(255, 215, 0, 0.8)'],
                            borderColor: ['#ffffff', '#ffffff'],
                            borderWidth: 3,
                        }]
                    },
                    options: {
                        ...chartOptions,
                        cutout: '60%'
                    }
                });
            }

            function createAgeChart() {
                const ctx = document.getElementById('ageDistributionChart').getContext('2d');
                return new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['0-17', '18-25', '26-45', '46-65', '>65'],
                        datasets: [{
                            label: 'Jumlah',
                            data: [1322, 621, 1595, 1018, 345],
                            backgroundColor: 'rgba(128, 0, 32, 0.7)',
                            borderColor: 'rgba(128, 0, 32, 1)',
                            borderWidth: 1,
                            borderRadius: 6
                        }]
                    },
                    options: {
                        ...chartOptions,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            function createEducationChart() {
                const ctx = document.getElementById('educationChart').getContext('2d');
                return new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['SD', 'SMP', 'SMA/SMK', 'Diploma', 'Sarjana', 'Lainnya'],
                        datasets: [{
                            data: [750, 980, 2100, 450, 722, 100],
                            backgroundColor: ['#800020', '#A00040', '#C00060', '#FFD700', '#F0E68C', '#D3D3D3'],
                            borderWidth: 2,
                        }]
                    },
                    options: chartOptions
                });
            }

            function createJobChart() {
                const ctx = document.getElementById('jobChart').getContext('2d');
                return new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['PNS/TNI/Polri', 'Swasta', 'Wiraswasta', 'Pelajar', 'Lainnya'],
                        datasets: [{
                            label: 'Jumlah',
                            data: [450, 1800, 1200, 1322, 330],
                            fill: true,
                            borderColor: 'rgba(128, 0, 32, 1)',
                            backgroundColor: 'rgba(128, 0, 32, 0.2)',
                            tension: 0.3
                        }]
                    },
                    options: {
                        ...chartOptions,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            const statTabs = document.querySelectorAll('.stat-tab');
            const statTabContents = document.querySelectorAll('.stat-tab-content');

            let activeChart = null;

            function activateTab(tab) {
                statTabs.forEach(t => t.classList.remove('active'));
                statTabContents.forEach(c => c.classList.remove('active'));

                tab.classList.add('active');
                const tabId = tab.getAttribute('data-tab');
                document.getElementById(`${tabId}-tab`).classList.add('active');

                if (activeChart) {
                    activeChart.destroy();
                }

                switch (tabId) {
                    case 'population':
                        activeChart = createPopulationChart();
                        break;
                    case 'age':
                        activeChart = createAgeChart();
                        break;
                    case 'education':
                        activeChart = createEducationChart();
                        break;
                    case 'job':
                        activeChart = createJobChart();
                        break;
                }
            }

            statTabs.forEach(tab => {
                tab.addEventListener('click', () => activateTab(tab));
            });

            // Muat chart pertama kali
            activateTab(document.querySelector('.stat-tab.active'));

            // ========== NEW: INITIALIZE GALLERY VIEWER ==========
            initAdvancedGalleryViewer();
        });

        // ========== NEW: GALLERY VIEWER SCRIPT ==========
        const albumsData = {
            'penyaluran-bantuan': {
                title: 'Penyaluran Bantuan Sembako',
                images: [{
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1718954728_47d9af74ec712bd51c9a.jpg',
                    caption: 'Penyerahan Bantuan oleh Petugas Kelurahan'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954056_d8ad3ecfe0494c04463f.jpg',
                    caption: 'Warga Menerima Paket Sembako'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954022_0bf4e65d09285d943a44.jpg',
                    caption: 'Warga Menerima Paket Sembako'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954005_f747783895551781b02e.jpg',
                    caption: 'Warga Menerima Paket Sembako'
                }]
            },
            'penghargaan-terbaik': {
                title: 'Penghargaan Kelurahan Terbaik',
                images: [{
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1717577239_ba55e5551c63f1be75f7.jpg',
                    caption: 'Pidato Lurah'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1717576506_8b22e49c8387de293aa6.jpg',
                    caption: 'Pidato Juri'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1717576460_8a385df58f640e76cace.jpg',
                    caption: 'Suasana Penilaian Lomba Kelurahan'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1717576271_48ceec080447a0b094f6.jpg',
                    caption: 'Suasana Penilaian Lomba Kelurahan'
                }]
            },
            'sadar-hukum': {
                title: 'Pelatihan Sadar Hukum',
                images: [{
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1698139006_720de976749805e4c099.jpg',
                    caption: 'Penyerahan Piagam Penyerahan'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1698138214_edccc3610efbc1e3bd72.jpg',
                    caption: 'Peserta Pelatihan Mengikuti Acara dengan Antusias'
                }, {
                    src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1698138004_801f3ccda114d781303a.jpg',
                    caption: 'Foto Bersama'
                }]
            }
        };

        const viewerModal = document.getElementById('gallery-viewer-modal');
        const viewerMainImage = document.getElementById('gallery-viewer-main-image');
        const viewerImageTitle = document.getElementById('gallery-viewer-title');
        const viewerThumbnailsContainer = document.getElementById('gallery-viewer-thumbnails');
        const viewerPrevBtn = document.getElementById('gallery-viewer-prev');
        const viewerNextBtn = document.getElementById('gallery-viewer-next');
        const viewerCloseBtn = document.getElementById('gallery-viewer-close');
        const viewerAlbumTitle = document.getElementById('gallery-viewer-album-title');

        let viewerCurrentAlbum = [];
        let viewerCurrentIndex = 0;

        function openGalleryViewer(albumId) {
            const album = albumsData[albumId];
            if (!album || !album.images || album.images.length === 0) {
                console.error("Album not found or is empty:", albumId);
                return;
            }

            viewerCurrentAlbum = album.images;
            viewerCurrentIndex = 0;

            viewerAlbumTitle.textContent = album.title;

            viewerThumbnailsContainer.innerHTML = '';
            album.images.forEach((img, index) => {
                const thumb = document.createElement('img');
                thumb.src = img.src;
                thumb.alt = img.caption;
                thumb.className = 'viewer-thumbnail w-full h-24 object-cover rounded-lg cursor-pointer';
                thumb.dataset.index = index;
                viewerThumbnailsContainer.appendChild(thumb);
            });

            updateGalleryView();
            viewerModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeGalleryViewer() {
            viewerModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function updateGalleryView() {
            if (viewerCurrentAlbum.length === 0) return;

            const image = viewerCurrentAlbum[viewerCurrentIndex];

            viewerMainImage.style.opacity = 0;
            setTimeout(() => {
                viewerMainImage.src = image.src;
                viewerMainImage.alt = image.caption;
                viewerImageTitle.textContent = image.caption;
                viewerMainImage.style.opacity = 1;
            }, 150);

            document.querySelectorAll('.viewer-thumbnail').forEach(thumb => {
                thumb.classList.toggle('active', parseInt(thumb.dataset.index) === viewerCurrentIndex);
            });

            const activeThumbnail = document.querySelector(`.viewer-thumbnail[data-index='${viewerCurrentIndex}']`);
            if (activeThumbnail) {
                activeThumbnail.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }

        function showNextGalleryImage() {
            viewerCurrentIndex = (viewerCurrentIndex + 1) % viewerCurrentAlbum.length;
            updateGalleryView();
        }

        function showPrevGalleryImage() {
            viewerCurrentIndex = (viewerCurrentIndex - 1 + viewerCurrentAlbum.length) % viewerCurrentAlbum.length;
            updateGalleryView();
        }

        function initAdvancedGalleryViewer() {
            document.body.addEventListener('click', (e) => {
                const galleryItem = e.target.closest('.gallery-item');
                if (galleryItem && galleryItem.dataset.albumId) {
                    e.preventDefault();
                    openGalleryViewer(galleryItem.dataset.albumId);
                }
            });

            viewerThumbnailsContainer.addEventListener('click', (e) => {
                if (e.target.matches('.viewer-thumbnail')) {
                    viewerCurrentIndex = parseInt(e.target.dataset.index);
                    updateGalleryView();
                }
            });

            viewerPrevBtn.addEventListener('click', showPrevGalleryImage);
            viewerNextBtn.addEventListener('click', showNextGalleryImage);
            viewerCloseBtn.addEventListener('click', closeGalleryViewer);
            viewerModal.addEventListener('click', (e) => {
                if (e.target === viewerModal) {
                    closeGalleryViewer();
                }
            });

            document.addEventListener('keydown', (e) => {
                if (!viewerModal || viewerModal.classList.contains('hidden')) return;
                if (e.key === 'ArrowRight') showNextGalleryImage();
                if (e.key === 'ArrowLeft') showPrevGalleryImage();
                if (e.key === 'Escape') closeGalleryViewer();
            });
        }
    </script>

    <div id="visitorPopup" class="fixed right-0 top-1/2 transform -translate-y-1/2 z-50 hidden transition-all duration-300 ease-out translate-x-full">
        <div class="bg-white rounded-l-lg shadow-xl border border-gray-200 w-64 relative">
            <button id="closePopup" class="absolute -left-14 top-1/2 transform -translate-y-1/2 bg-red-600 text-white rounded-l-lg shadow-lg hover:bg-red-700 transition border-t border-b border-l border-gray-200 h-28 w-14 flex flex-col items-center justify-center">
                <span class="text-[14px] font-medium transform -rotate-90 whitespace-nowrap flex items-center gap-1">
                    Kunjungan
                    <span class="bg-white rounded-full p-1 flex items-center justify-center h-5 w-5">
                        <i class="fas fa-chevron-down text-[10px] text-red-600"></i>
                    </span>
                </span>
            </button>

            <div class="p-3 text-center">
                <div class="bg-red-600 px-3 py-2 rounded-tl-lg">
                    <h3 class="text-white font-bold text-sm">Statistik Kunjungan</h3>
                    <p class="text-red-100 text-xs">Jumlah kunjungan website</p>
                </div>

                <div class="py-2">
                    <div class="mb-3">
                        <h4 class="font-semibold text-gray-700 text-xs">Total Visitor</h4>
                        <p class="text-xl font-bold">262.522</p>
                        <p class="text-green-500 text-xs">10 Online</p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-700 text-xs">Total View</h4>
                        <p class="text-xl font-bold">1.408.960</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button id="togglePopup" class="fixed right-0 top-1/2 transform -translate-y-1/2 bg-red-600 text-white rounded-l-lg shadow-lg z-40 hover:bg-red-700 transition h-28 w-14 flex flex-col items-center justify-center">
        <span class="text-[14px] font-medium transform -rotate-90 whitespace-nowrap flex items-center gap-1.5">
            Kunjungan
            <span class="bg-white rounded-full p-1.5 flex items-center justify-center h-5 w-5">
                <i class="fas fa-chevron-up text-xs text-red-600"></i>
            </span>
        </span>
    </button>
    </div>
    </div>

    <script>
        const toggleButton = document.getElementById('togglePopup');
        const closeButton = document.getElementById('closePopup');
        const popup = document.getElementById('visitorPopup');

        // Open popup with bounce effect
        toggleButton.addEventListener('click', function() {
            popup.classList.remove('hidden');
            setTimeout(() => {
                popup.classList.remove('translate-x-full');
            }, 10);
        });

        // Close popup with slide out
        closeButton.addEventListener('click', function() {
            popup.classList.add('translate-x-full');
            popup.classList.remove('animate-[bounceInRight_0.3s]');
            setTimeout(() => {
                popup.classList.add('hidden');
            }, 300);
        });
    </script>

    <script>
        // Data untuk semua layanan
        const serviceData = {
            'ktp': {
                icon: 'fa-id-card',
                title: 'Layanan Pembuatan KTP Elektronik',
                description: 'Pelayanan pembuatan Kartu Tanda Penduduk (KTP) elektronik untuk warga yang telah berusia 17 tahun atau sudah menikah. KTP merupakan identitas resmi yang wajib dimiliki setiap WNI.',
                syarat: `
                <h4>Dokumen yang Diperlukan:</h4>
                <ul>
                    <li><i class="fas fa-check-circle"></i>Fotokopi Kartu Keluarga (KK).</li>
                    <li><i class="fas fa-check-circle"></i>Surat Pengantar dari RT/RW setempat.</li>
                    <li><i class="fas fa-check-circle"></i>Untuk WNA yang memiliki izin tinggal tetap: Paspor dan kartu izin tinggal tetap (KITAP).</li>
                    <li><i class="fas fa-check-circle"></i>Warga yang pindah domisili: Surat Keterangan Pindah (SKP).</li>
                </ul>
            `,
                alur: `
                <div class="timeline">
                    <div class="timeline-item"><div class="timeline-dot"></div><h4 class="font-semibold">Langkah 1: Datang ke Kelurahan</h4><p class="text-sm text-gray-600">Pemohon datang ke kantor kelurahan dengan membawa berkas persyaratan yang lengkap.</p></div>
                    <div class="timeline-item"><div class="timeline-dot"></div><h4 class="font-semibold">Langkah 2: Verifikasi Berkas</h4><p class="text-sm text-gray-600">Petugas loket akan memverifikasi kelengkapan dan keabsahan berkas Anda.</p></div>
                    <div class="timeline-item"><div class="timeline-dot"></div><h4 class="font-semibold">Langkah 3: Pengajuan ke Disdukcapil</h4><p class="text-sm text-gray-600">Setelah berkas dinyatakan lengkap, kelurahan akan meneruskan pengajuan ke Dinas Kependudukan dan Pencatatan Sipil.</p></div>
                    <div class="timeline-item"><div class="timeline-dot"></div><h4 class="font-semibold">Langkah 4: Pengambilan KTP</h4><p class="text-sm text-gray-600">Pemohon akan dihubungi oleh pihak kelurahan jika KTP-el sudah selesai dicetak dan siap diambil.</p></div>
                </div>
            `,
                waktu: `<h4>Estimasi Waktu Pelayanan</h4><p>Proses penerbitan KTP-el diperkirakan memakan waktu <strong>14 hari kerja</strong> sejak berkas dinyatakan lengkap oleh petugas.</p><h4 class="mt-4">Biaya</h4><p><strong>Rp 0,- (GRATIS)</strong>. Tidak dipungut biaya apapun.</p>`,
                unduh: `<h4>Unduh Formulir F-1.21</h4><p>Silakan unduh formulir permohonan KTP di bawah ini. Isi dan bawa saat pengajuan.</p><a href="/path/to/form_ktp.pdf" download class="btn-primary inline-block mt-3" style="padding: 10px 20px;"><i class="fas fa-download mr-2"></i> Unduh Formulir</a>`,
                detailLink: '/layanan/ktp'
            },
            'domisili': {
                icon: 'fa-home',
                title: 'Layanan Surat Keterangan Domisili',
                description: 'Surat Keterangan Domisili adalah surat pernyataan yang menerangkan tempat tinggal atau keberadaan seseorang di wilayah kelurahan.',
                syarat: `<h4>Dokumen yang Diperlukan:</h4><ul><li><i class="fas fa-check-circle"></i>Fotokopi KTP dan Kartu Keluarga (KK) pemohon.</li><li><i class="fas fa-check-circle"></i>Surat Pengantar dari RT/RW setempat.</li><li><i class="fas fa-check-circle"></i>Pas foto berwarna ukuran 3x4 (2 lembar).</li></ul>`,
                alur: `<div class="timeline"><div class="timeline-item"><div class="timeline-dot"></div><h4 class="font-semibold">Langkah 1: Datang ke Kelurahan</h4><p class="text-sm text-gray-600">Pemohon datang ke kantor kelurahan dengan membawa berkas persyaratan yang lengkap.</p></div><div class="timeline-item"><div class="timeline-dot"></div><h4 class="font-semibold">Langkah 2: Verifikasi & Penerbitan</h4><p class="text-sm text-gray-600">Petugas akan memverifikasi berkas dan langsung memproses surat keterangan domisili.</p></div><div class="timeline-item"><div class="timeline-dot"></div><h4 class="font-semibold">Langkah 3: Selesai</h4><p class="text-sm text-gray-600">Surat dapat langsung diterima oleh pemohon setelah ditandatangani oleh Lurah.</p></div></div>`,
                waktu: `<h4>Estimasi Waktu Pelayanan</h4><p>Proses dapat diselesaikan dalam <strong>1 hari kerja</strong> jika semua persyaratan lengkap dan Lurah berada di tempat.</p><h4 class="mt-4">Biaya</h4><p><strong>Rp 0,- (GRATIS)</strong>.</p>`,
                unduh: `<p>Tidak ada formulir khusus yang perlu diunduh. Silakan datang langsung ke kantor kelurahan.</p>`,
                detailLink: '/layanan/domisili'
            },
            'kelahiran': {
                icon: 'fa-baby',
                title: 'Layanan Pengurusan Akta Kelahiran',
                description: 'Akta Kelahiran adalah bukti sah mengenai status dan peristiwa kelahiran seseorang yang diterbitkan oleh Dinas Kependudukan dan Catatan Sipil.',
                syarat: `<h4>Dokumen yang Diperlukan:</h4><ul><li><i class="fas fa-check-circle"></i>Surat Keterangan Lahir dari Bidan/Dokter/RS.</li><li><i class="fas fa-check-circle"></i>Fotokopi Kartu Keluarga (KK).</li><li><i class="fas fa-check-circle"></i>Fotokopi KTP kedua orang tua.</li><li><i class="fas fa-check-circle"></i>Fotokopi Buku Nikah/Akta Perkawinan.</li><li><i class="fas fa-check-circle"></i>Fotokopi KTP 2 orang saksi.</li></ul>`,
                alur: `<p>Proses pengajuan Akta Kelahiran kini dapat dilakukan secara online melalui situs Disdukcapil atau datang langsung ke kantor Disdukcapil. Kelurahan hanya memberikan surat pengantar jika diperlukan.</p>`,
                waktu: `<p>Waktu penyelesaian tergantung pada antrian di Disdukcapil.</p><h4 class="mt-4">Biaya</h4><p><strong>Rp 0,- (GRATIS)</strong>.</p>`,
                unduh: `<p>Formulir tersedia di kantor Disdukcapil atau dapat diunduh di website resmi Disdukcapil Kota Tanjungpinang.</p>`,
                detailLink: '/layanan/akta-kelahiran'
            },
            'sktm': {
                icon: 'fa-file-contract',
                title: 'Layanan Surat Keterangan Tidak Mampu (SKTM)',
                description: 'SKTM adalah surat yang dikeluarkan untuk keluarga yang tergolong tidak mampu secara ekonomi, digunakan untuk berbagai keperluan seperti keringanan biaya kesehatan atau pendidikan.',
                syarat: `<h4>Dokumen yang Diperlukan:</h4><ul><li><i class="fas fa-check-circle"></i>Surat Pengantar dari RT/RW.</li><li><i class="fas fa-check-circle"></i>Fotokopi KTP dan Kartu Keluarga (KK) pemohon.</li><li><i class="fas fa-check-circle"></i>Menandatangani Surat Pernyataan Tanggung Jawab Mutlak (SPTJM).</li><li><i class="fas fa-check-circle"></i>Dokumentasi foto rumah (tampak depan, ruang tamu, dapur).</li></ul>`,
                alur: `<p>Pemohon datang ke kelurahan dengan berkas lengkap. Petugas akan melakukan verifikasi dan jika memenuhi syarat, SKTM akan diproses.</p>`,
                waktu: `<p><strong>1-2 hari kerja</strong>, tergantung jadwal verifikasi lapangan jika diperlukan.</p><h4 class="mt-4">Biaya</h4><p><strong>Rp 0,- (GRATIS)</strong>.</p>`,
                unduh: `<p>Formulir SPTJM disediakan di kantor kelurahan.</p>`,
                detailLink: '/layanan/sktm'
            },
            'nikah': {
                icon: 'fa-heart',
                title: 'Layanan Pengantar Nikah (Model N1-N4)',
                description: 'Surat pengantar nikah adalah dokumen wajib yang dikeluarkan oleh kelurahan sebagai syarat untuk mendaftarkan pernikahan di Kantor Urusan Agama (KUA).',
                syarat: `<h4>Dokumen yang Diperlukan:</h4><ul><li><i class="fas fa-check-circle"></i>Surat Pengantar dari RT/RW.</li><li><i class="fas fa-check-circle"></i>Fotokopi KTP calon pengantin pria dan wanita.</li><li><i class="fas fa-check-circle"></i>Fotokopi Kartu Keluarga (KK) masing-masing.</li><li><i class="fas fa-check-circle"></i>Fotokopi Akta Kelahiran masing-masing.</li><li><i class="fas fa-check-circle"></i>Pas foto berwarna 2x3 (4 lembar) dan 4x6 (2 lembar) dengan latar biru.</li><li><i class="fas fa-check-circle"></i>Surat Pernyataan Belum Menikah (jika lajang) atau Akta Cerai/Surat Kematian (jika duda/janda).</li></ul>`,
                alur: `<p>Bawa semua berkas ke kantor kelurahan. Petugas akan memverifikasi dan membuatkan model surat N1, N2, dan N4 untuk dibawa ke KUA.</p>`,
                waktu: `<p><strong>1 hari kerja</strong> jika berkas lengkap.</p><h4 class="mt-4">Biaya</h4><p><strong>Rp 0,- (GRATIS)</strong> untuk pengurusan di kelurahan.</p>`,
                unduh: `<p>Formulir disediakan di kantor kelurahan.</p>`,
                detailLink: '/layanan/nikah'
            }
        };

        // Ambil semua elemen yang diperlukan
        const modalOverlay = document.getElementById('service-modal');
        const modalCloseBtn = modalOverlay.querySelector('.service-modal-close-btn');
        const modalTabBtns = modalOverlay.querySelectorAll('.service-modal-tab-btn');
        const serviceCards = document.querySelectorAll('.service-card[data-service-key]');

        // Fungsi untuk membuka modal
        function openServiceModal(serviceKey) {
            const data = serviceData[serviceKey];
            if (!data) return;

            // Populate modal content
            modalOverlay.querySelector('#modal-title').innerHTML = `<i class="fas ${data.icon} mr-3"></i> ${data.title}`;
            modalOverlay.querySelector('#modal-description').textContent = data.description;
            modalOverlay.querySelector('#modal-content-syarat').innerHTML = data.syarat;
            modalOverlay.querySelector('#modal-content-alur').innerHTML = data.alur;
            modalOverlay.querySelector('#modal-content-waktu').innerHTML = data.waktu;
            modalOverlay.querySelector('#modal-content-unduh').innerHTML = data.unduh;

            // Reset ke tab pertama setiap kali modal dibuka
            switchTab(modalOverlay.querySelector('.service-modal-tab-btn[data-tab="syarat"]'));

            // Tampilkan modal
            modalOverlay.classList.add('active');
        }

        // Fungsi untuk menutup modal
        function closeServiceModal() {
            modalOverlay.classList.remove('active');
        }

        // Fungsi untuk ganti tab di dalam modal
        function switchTab(clickedTab) {
            modalTabBtns.forEach(btn => btn.classList.remove('active'));
            modalOverlay.querySelectorAll('.service-modal-tab-content').forEach(content => content.classList.remove('active'));

            clickedTab.classList.add('active');
            const tabId = clickedTab.getAttribute('data-tab');
            modalOverlay.querySelector(`#modal-content-${tabId}`).classList.add('active');
        }

        // ===============================================
        // == PENAMBAHAN EVENT LISTENER YANG DIPERBAIKI ==
        // ===============================================
        serviceCards.forEach(card => {
            card.addEventListener('click', () => {
                const serviceKey = card.dataset.serviceKey;
                openServiceModal(serviceKey);
            });
        });

        // Event listener untuk tombol tutup
        modalCloseBtn.addEventListener('click', closeServiceModal);

        // Event listener untuk ganti tab
        modalTabBtns.forEach(btn => {
            btn.addEventListener('click', () => switchTab(btn));
        });

        // Event listener untuk tutup modal saat klik area luar atau tekan ESC
        modalOverlay.addEventListener('click', (event) => {
            if (event.target === modalOverlay) {
                closeServiceModal();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modalOverlay.classList.contains('active')) {
                closeServiceModal();
            }
        });

        // Membuat fungsi bisa diakses dari tombol `onclick` di HTML (jika masih diperlukan di masa depan)
        window.openServiceModal = openServiceModal;
        window.closeServiceModal = closeServiceModal;
    </script>

    <style>
        @keyframes bounceInRight {
            0% {
                transform: translateX(100%) translateY(-50%);
            }

            60% {
                transform: translateX(-10px) translateY(-50%);
            }

            80% {
                transform: translateX(5px) translateY(-50%);
            }

            100% {
                transform: translateX(0) translateY(-50%);
            }
        }

        /* Back to top button styles */
        #back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, #800020 0%, #900030 100%);
            color: white;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            cursor: pointer;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        #back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        #back-to-top:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>

    <button id="back-to-top" aria-label="Kembali ke atas">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        // Back to top button functionality
        const backToTopButton = document.getElementById('back-to-top');

        // Show/hide button on scroll
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('visible');
            } else {
                backToTopButton.classList.remove('visible');
            }
        });

        // Scroll to top when clicked
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>

</html>