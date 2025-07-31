<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-t" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>
    Berita | Kelurahan Tanjungpinang Kota | Kecamatan Tanjungpinang Kota
  </title>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <style>
    /* Menyesuaikan posisi konten banner */
    @media (min-width: 768px) {
      .news-hero-content {
        padding-top: 6rem;
      }
    }

    /* Header berubah merah solid saat scroll */
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
      --primary-700: #a00040;
      --primary-600: #b00050;
      --primary-500: #c00060;
      --primary-400: #d00070;
      --primary-gradient: linear-gradient(135deg,
          var(--primary-800) 0%,
          var(--primary-600) 100%);
      --primary-gradient-hover: linear-gradient(135deg,
          var(--primary-700) 0%,
          var(--primary-500) 100%);
      --accent-color: #ffd700;
      /* Gold accent */
      --dark-maroon: #500000;
      /* Dark maroon for footer */
    }

    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
      font-family: "Inter", system-ui, -apple-system, sans-serif;
      background-color: #f8fafc;
      color: #333;
      line-height: 1.6;
    }

    @font-face {
      font-family: "Inter";
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
      z-index: 1001;
      background: rgba(24, 24, 24, 0.45);
      backdrop-filter: blur(14px);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
    }

    .modern-header::before {
      content: "";
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
      font-weight: 500;
      text-decoration: none;
      display: inline-block;
      overflow: hidden;
    }

    .nav-item::after {
      content: "";
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
      height: calc(100vh - 90px);
      min-height: 410px;
      max-height: 100vh;
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      text-align: center;
      margin: 0 !important;
      padding: 0 !important;
      border: none;
    }

    @media (max-width: 768px) {
      .hero-banner {
        min-height: 250px;
        height: calc(85vh - 60px);
      }
    }

    .hero-banner .hero-slide {
      background-position: top center !important;
    }

    .hero-banner::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom,
          rgba(0, 0, 0, 0.45) 0%,
          rgba(0, 0, 0, 0.65) 100%);
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
      background-position: top center;
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
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg,
          rgba(128, 0, 32, 0.03) 0%,
          rgba(255, 215, 0, 0.03) 100%);
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
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg,
          rgba(255, 255, 255, 0.1) 0%,
          rgba(255, 255, 255, 0) 100%);
      transform: translateX(-100%);
      transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .content-card:hover .card-header::after {
      transform: translateX(100%);
    }

    /* Section Header */
    .section-header {
      position: relative;
      padding-bottom: 16px;
      margin-bottom: 40px;
    }

    .section-header::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 4px;
      background: var(--primary-gradient);
      border-radius: 2px;
      transition: width 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .section-header:hover::after {
      width: 120px;
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

    .stat-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: var(--accent-color);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.6s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .stat-card:hover::before {
      transform: scaleX(1);
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
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 10% 20%,
          rgba(80, 0, 0, 0.8) 0%,
          transparent 50%),
        radial-gradient(circle at 90% 80%,
          rgba(255, 215, 0, 0.1) 0%,
          transparent 50%);
      pointer-events: none;
    }

    .footer-links a {
      position: relative;
      padding-bottom: 5px;
      transition: all 0.3s ease;
      display: inline-block;
    }

    .footer-links a::before {
      content: "";
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
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg,
          rgba(255, 255, 255, 0.1) 0%,
          rgba(255, 255, 255, 0) 100%);
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

    /* News Carousel */
    .news-carousel-container {
      position: relative;
      overflow: hidden;
      border-radius: 16px;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
        0 10px 10px -5px rgba(0, 0, 0, 0.04);
      cursor: grab;
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

    /* News Grid */
    .news-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 24px;
    }

    .news-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .news-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .news-card-img-container {
      position: relative;
      height: 200px;
      overflow: hidden;
    }

    .news-card-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .news-card:hover .news-card-img {
      transform: scale(1.05);
    }

    .news-card-category {
      position: absolute;
      top: 16px;
      left: 16px;
      background: var(--primary-gradient);
      color: white;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .news-card-body {
      padding: 20px;
    }

    .news-card-date {
      font-size: 12px;
      color: #6b7280;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
    }

    .news-card-date i {
      margin-right: 6px;
    }

    .news-card-title {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 12px;
      line-height: 1.4;
    }

    .news-card-excerpt {
      color: #4b5563;
      margin-bottom: 16px;
      font-size: 14px;
      line-height: 1.6;
    }

    .news-card-link {
      display: inline-flex;
      align-items: center;
      color: var(--primary-600);
      font-weight: 600;
      font-size: 14px;
      transition: color 0.3s;
    }

    .news-card-link i {
      margin-left: 6px;
      transition: transform 0.3s;
    }

    .news-card-link:hover {
      color: var(--primary-800);
    }

    .news-card-link:hover i {
      transform: translateX(4px);
    }

    /* News Pagination */
    .news-pagination {
      display: flex;
      justify-content: center;
      margin-top: 40px;
    }

    .pagination-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 8px;
      margin: 0 4px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .pagination-link:hover {
      background-color: #f3f4f6;
      color: var(--primary-600);
    }

    .pagination-link.active {
      background-color: var(--primary-600);
      color: white;
    }

    .pagination-link.disabled {
      opacity: 0.5;
      pointer-events: none;
    }

    /* --- NEW: Pagination Transition Styles --- */
    @keyframes slide-in-from-right {
      from {
        transform: translateX(30px);
        opacity: 0;
      }

      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .slide-in-from-right {
      animation: slide-in-from-right 0.4s ease-out forwards;
    }

    @keyframes slide-out-to-left {
      from {
        transform: translateX(0);
        opacity: 1;
      }

      to {
        transform: translateX(-30px);
        opacity: 0;
      }
    }

    .slide-out-to-left {
      animation: slide-out-to-left 0.4s ease-out forwards;
    }

    @keyframes slide-in-from-left {
      from {
        transform: translateX(-30px);
        opacity: 0;
      }

      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .slide-in-from-left {
      animation: slide-in-from-left 0.4s ease-out forwards;
    }

    @keyframes slide-out-to-right {
      from {
        transform: translateX(0);
        opacity: 1;
      }

      to {
        transform: translateX(30px);
        opacity: 0;
      }
    }

    .slide-out-to-right {
      animation: slide-out-to-right 0.4s ease-out forwards;
    }

    /* --- END: Pagination Transition Styles --- */

    /* News Sidebar */
    .news-sidebar {
      position: sticky;
      top: 120px;
    }

    .sidebar-widget {
      background: white;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      padding: 24px;
      margin-bottom: 24px;
    }

    .sidebar-widget-title {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 16px;
      padding-bottom: 12px;
      border-bottom: 2px solid #f3f4f6;
      position: relative;
    }

    .sidebar-widget-title::after {
      content: "";
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 60px;
      height: 2px;
      background: var(--primary-gradient);
    }

    /* Category List */
    .category-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .category-item {
      margin-bottom: 8px;
    }

    .category-item a {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 12px;
      border-radius: 6px;
      transition: all 0.3s ease;
      color: #4b5563;
    }

    .category-item a:hover {
      background-color: rgba(128, 0, 32, 0.1);
      color: var(--primary-800);
    }

    .category-item-count {
      background-color: #f3f4f6;
      padding: 2px 8px;
      border-radius: 9999px;
      font-size: 12px;
    }

    /* Tag List */
    .tag-list {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .tag-item a {
      display: inline-block;
      padding: 6px 12px;
      background-color: #f3f4f6;
      border-radius: 9999px;
      font-size: 12px;
      transition: all 0.3s ease;
    }

    .tag-item a:hover {
      background-color: var(--primary-600);
      color: white;
    }

    /* Popular News */
    .popular-news-item {
      display: flex;
      margin-bottom: 16px;
      padding-bottom: 16px;
      border-bottom: 1px solid #f3f4f6;
    }

    .popular-news-item:last-child {
      margin-bottom: 0;
      padding-bottom: 0;
      border-bottom: none;
    }

    .popular-news-number {
      font-size: 18px;
      font-weight: 700;
      color: #d1d5db;
      margin-right: 16px;
      min-width: 24px;
    }

    .popular-news-content {
      flex: 1;
    }

    .popular-news-title {
      font-weight: 600;
      margin-bottom: 4px;
      line-height: 1.4;
      font-size: 14px;
    }

    .popular-news-meta {
      display: flex;
      align-items: center;
      font-size: 12px;
      color: #6b7280;
    }

    /* --- FIX: Only one .news-hero-slide visible at a time, no overlap --- */
    .news-hero-slide {
      opacity: 0 !important;
      z-index: 10 !important;
      pointer-events: none !important;
      transition: opacity 1s cubic-bezier(0.83, 0, 0.17, 1);
      position: absolute;
      inset: 0;
    }

    .news-hero-slide.active {
      opacity: 1 !important;
      z-index: 20 !important;
      pointer-events: auto !important;
    }

    /* --- END FIX --- */

    .popular-news-meta i {
      margin-right: 4px;
    }

    .popular-news-meta span {
      margin-right: 12px;
    }

    .popular-news-meta span:last-child {
      margin-right: 0;
    }

    /* Spotlight News Tabs Styling */
    .spotlight-tab-btn {
      color: #6b7280;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      border: none;
      background: none;
      outline: none;
    }

    .spotlight-tab-btn:hover {
      color: #dc2626;
      transform: translateY(-2px);
    }

    .spotlight-tab-btn.active {
      color: #dc2626;
      font-weight: 700;
    }

    .spotlight-tab-btn.active div {
      opacity: 1 !important;
    }

    .spotlight-tab-content {
      transition: opacity 0.3s ease-in-out;
    }

    .spotlight-tab-content.hidden {
      display: none;
    }

    .spotlight-tab-content.active {
      display: block;
      animation: fadeInUp 0.5s ease-out;
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

    /* Search Widget */
    .news-search-form {
      position: relative;
      margin-bottom: 16px;
    }

    .news-search-input {
      width: 100%;
      padding: 12px 16px 12px 48px;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .news-search-input:focus {
      border-color: var(--primary-600);
      box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.1);
      outline: none;
    }

    .news-search-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: #9ca3af;
    }

    /* Newsletter Widget */
    .newsletter-form {
      margin-top: 16px;
    }

    .newsletter-input {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      margin-bottom: 12px;
      transition: all 0.3s ease;
    }

    .newsletter-input:focus {
      border-color: var(--primary-600);
      box-shadow: 0 0 0 3px rgba(128, 0, 32, 0.1);
      outline: none;
    }

    .newsletter-btn {
      width: 100%;
      padding: 12px 16px;
      background-color: var(--primary-600);
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .newsletter-btn:hover {
      background-color: var(--primary-700);
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

      .news-grid {
        grid-template-columns: 1fr;
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

    /* Spotlight news image sizing */
    .popular-news-item img,
    .latest-news-item img {
      height: 200px;
      width: 100%;
      object-fit: cover;
    }

    /* Red title hover */
    .popular-news-item h4:hover,
    .latest-news-item h4:hover {
      color: #dc2626 !important;
    }

    /* News card styles for spotlight section */
    .popular-news-item,
    .latest-news-item {
      position: relative;
      padding-bottom: 50px;
      /* Space for fixed metadata */
      min-height: 320px;
      /* Minimum card height */
    }

    .popular-news-item .flex.items-center,
    .latest-news-item .flex.items-center {
      position: absolute;
      bottom: 16px;
      left: 16px;
      right: 16px;
    }

    /* Ellipsis for long titles */
    .popular-news-item h4,
    .latest-news-item h4 {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      min-height: 3em;
      /* Ensure consistent height for 2 lines */
    }

    /* Card hover effects */
    .popular-news-item:hover,
    .latest-news-item:hover {
      background-color: rgba(220,
          38,
          38,
          0.05) !important;
      /* Light red background */
    }

    .popular-news-item:hover h4,
    .latest-news-item:hover h4 {
      color: #dc2626 !important;
      /* Red title on card hover */
    }

    /* --- START: Trending News Overlay Styles --- */
    #trending-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: rgba(10, 10, 10, 0.9);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      z-index: 9999;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.5s ease, visibility 0s 0.5s;
    }

    #trending-overlay.visible {
      opacity: 1;
      visibility: visible;
      transition: opacity 0.5s ease, visibility 0s 0s;
    }

    .trending-overlay-content {
      transform: scale(0.95);
      transition: transform 0.5s ease;
      width: 90%;
      max-width: 1200px;
      height: 90%;
      max-height: 800px;
      display: flex;
      flex-direction: column;
    }

    #trending-overlay.visible .trending-overlay-content {
      transform: scale(1);
    }

    #close-trending-overlay {
      position: absolute;
      top: 30px;
      right: 40px;
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white;
      width: 44px;
      height: 44px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    #close-trending-overlay:hover {
      background: rgba(220, 38, 38, 1);
      transform: rotate(90deg) scale(1.1);
    }

    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .trending-overlay-card {
      animation: slideInUp 0.6s ease-out forwards;
      opacity: 0;
    }

    /* --- END: Trending News Overlay Styles --- */
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

  <main
    class="bg-gradient-to-br from-gray-50 via-white to-gray-100 min-h-screen">
    <section
      class="news-hero-banner relative overflow-hidden h-[65vh] min-h-[550px] bg-gradient-to-br from-slate-900 via-slate-900 to-slate-900">
      <style>
        /* Custom styles for the hero section - Similar to news-detail1.html */
        .hero-gradient-overlay {
          background: linear-gradient(to bottom right,
              rgba(0, 0, 0, 0.6) 0%,
              rgba(0, 0, 0, 0.6) 100%);
        }

        .fade-to-white-smooth {
          background: linear-gradient(to top,
              rgba(255, 255, 255, 0.1) 0%,
              transparent 100%);
        }

        .vignette-effect {
          background: radial-gradient(ellipse at center,
              transparent 0%,
              transparent 50%,
              rgba(0, 0, 0, 0.2) 100%);
        }

        /* Enhanced glassmorphism effects */
        .glass-effect {
          backdrop-filter: blur(10px);
          -webkit-backdrop-filter: blur(10px);
        }
      </style>

      <div class="absolute inset-0 overflow-hidden">
        <div
          class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-r from-primary-600/20 to-red-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div
          class="absolute -bottom-40 -right-40 w-80 h-80 bg-gradient-to-r from-blue-600/20 to-purple-600/20 rounded-full blur-3xl animate-pulse"
          style="animation-delay: 2s"></div>
        <div
          class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-indigo-600/10 to-pink-600/10 rounded-full blur-3xl animate-pulse"
          style="animation-delay: 4s"></div>
      </div>

      <div id="news-hero-slides" class="h-full relative z-20">
        <div
          class="news-hero-slide active h-full w-full absolute inset-0 transition-all duration-1000 ease-[cubic-bezier(0.83,0,0.17,1)]"
          data-title="Sosialisasi E-KTP Digital untuk Seluruh Ketua RT dan RW"
          data-link="news-detail1.html">
          <div class="absolute inset-0 overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1559526324-4b87b5e36e44?q=80&w=1920&h=1080&auto=format&fit=crop&ixlib=rb-4.0.3"
              alt="Bantuan Sosial Kelurahan"
              class="w-full h-full object-cover object-center scale-105 transition-transform duration-[8000ms] ease-linear"
              loading="eager" />

            <div class="absolute inset-0 z-10 hero-gradient-overlay"></div>
            <div class="absolute inset-0 z-15 vignette-effect"></div>
            <div
              class="absolute bottom-0 left-0 right-0 h-2/5 z-20 fade-to-white-smooth"></div>
          </div>

          <div
            class="news-hero-content w-full h-full flex items-end relative z-30"
            style="padding: 0 7%; padding-bottom: 8%">
            <div class="max-w-4xl w-full">
              <div class="mb-3">
                <span
                  class="inline-flex items-center bg-red-600/90 text-white px-3 py-1 rounded-full text-xs font-semibold border border-white/20 glass-effect">
                  <i class="fas fa-landmark mr-1"></i>
                  PEMERINTAHAN
                </span>
              </div>

              <h1
                class="text-2xl md:text-3xl lg:text-4xl font-bold mb-8 text-white"
                style="
                    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6),
                      0 4px 8px rgba(0, 0, 0, 0.4),
                      0 8px 16px rgba(0, 0, 0, 0.2);
                  ">
                <span class="block">Sosialisasi E-KTP Digital</span>
                <span class="block text-red-300">untuk Seluruh Ketua RT dan RW</span>
              </h1>

              <div class="flex flex-wrap gap-3 text-sm text-gray-300 mt-8">
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-calendar-alt mr-1"></i>
                  <span>25 Juni 2024</span>
                </div>
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-eye mr-1"></i>
                  <span>1.2K Views</span>
                </div>
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-user mr-1"></i>
                  <span>Admin Kelurahan</span>
                </div>
                <div
                  class="flex items-center px-4 py-2 rounded-xl border border-white/20 hover:bg-white/20 transition-all glass-effect"
                  style="background: rgba(255, 255, 255, 0.1)">
                  <i class="far fa-clock mr-2"></i>
                  <span>5 min read</span>
                </div>
              </div>

              <div class="mt-10">
                <a
                  href="news-detail1.html"
                  class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-rose-800 text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:-translate-y-0.5 transition-all duration-300 group border border-white/20 text-sm">
                  <span class="text-lg">Baca Selengkapnya</span>
                  <i
                    class="fas fa-arrow-right ml-3 text-lg group-hover:translate-x-1.5 transition-transform duration-300"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div
          class="news-hero-slide h-full w-full absolute inset-0 transition-all duration-1000 ease-[cubic-bezier(0.83,0,0.17,1)]"
          data-title="Rapat Koordinasi Infrastruktur Desa"
          data-link="#">
          <div class="absolute inset-0 overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=1920&h=1080&auto=format&fit=crop"
              alt="Pembangunan Infrastruktur"
              class="w-full h-full object-cover object-center scale-105 transition-transform duration-[8000ms] ease-linear"
              loading="lazy" />

            <div class="absolute inset-0 z-10 hero-gradient-overlay"></div>
            <div class="absolute inset-0 z-15 vignette-effect"></div>
            <div
              class="absolute bottom-0 left-0 right-0 h-2/5 z-20 fade-to-white-smooth"></div>
          </div>

          <div
            class="news-hero-content w-full h-full flex items-end relative z-30"
            style="padding: 0 7%; padding-bottom: 8%">
            <div class="max-w-4xl w-full">
              <div class="mb-3">
                <span
                  class="inline-flex items-center bg-green-600/90 text-white px-3 py-1 rounded-full text-xs font-semibold border border-white/20 glass-effect">
                  <i class="fas fa-hammer mr-1"></i>
                  PEMBANGUNAN
                </span>
              </div>

              <h1
                class="text-2xl md:text-3xl lg:text-4xl font-bold mb-8 text-white"
                style="
                    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6),
                      0 4px 8px rgba(0, 0, 0, 0.4),
                      0 8px 16px rgba(0, 0, 0, 0.2);
                  ">
                <span class="block">Rapat Koordinasi</span>
                <span class="block text-green-300">Infrastruktur Desa</span>
              </h1>

              <div class="flex flex-wrap gap-3 text-sm text-gray-300 mt-8">
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-calendar-alt mr-1"></i>
                  <span>23 Juni 2024</span>
                </div>
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-eye mr-1"></i>
                  <span>980 Views</span>
                </div>
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-user mr-1"></i>
                  <span>Admin Kelurahan</span>
                </div>
                <div
                  class="flex items-center px-4 py-2 rounded-xl border border-white/20 hover:bg-white/20 transition-all glass-effect"
                  style="background: rgba(255, 255, 255, 0.1)">
                  <i class="far fa-clock mr-2"></i>
                  <span>5 min read</span>
                </div>
              </div>

              <div class="mt-10">
                <a
                  href="#"
                  class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-700 text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:-translate-y-0.5 transition-all duration-300 group border border-white/20 text-sm">
                  <span class="text-lg">Baca Selengkapnya</span>
                  <i
                    class="fas fa-arrow-right ml-3 text-lg group-hover:translate-x-1.5 transition-transform duration-300"></i>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div
          class="news-hero-slide h-full w-full absolute inset-0 transition-all duration-1000 ease-[cubic-bezier(0.83,0,0.17,1)]"
          data-title="Kelurahan Raih Penghargaan Adipura Tingkat Kota"
          data-link="news-detail2.html">
          <div class="absolute inset-0 overflow-hidden">
            <img
              src="https://images.unsplash.com/photo-1581833971358-2c8b550f87b3?q=80&w=1920&h=1080&auto=format&fit=crop"
              alt="Program Lingkungan"
              class="w-full h-full object-cover object-center scale-105 transition-transform duration-[8000ms] ease-linear"
              loading="lazy" />

            <div class="absolute inset-0 z-10 hero-gradient-overlay"></div>
            <div class="absolute inset-0 z-15 vignette-effect"></div>
            <div
              class="absolute bottom-0 left-0 right-0 h-2/5 z-20 fade-to-white-smooth"></div>
          </div>

          <div
            class="news-hero-content w-full h-full flex items-end relative z-30"
            style="padding: 0 7%; padding-bottom: 8%">
            <div class="max-w-4xl w-full">
              <div class="mb-3">
                <span
                  class="inline-flex items-center bg-blue-600/90 text-white px-3 py-1 rounded-full text-xs font-semibold border border-white/20 glass-effect">
                  <i class="fas fa-leaf mr-1"></i>
                  LINGKUNGAN
                </span>
              </div>

              <h1
                class="text-2xl md:text-3xl lg:text-4xl font-bold mb-8 text-white"
                style="
                    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6),
                      0 4px 8px rgba(0, 0, 0, 0.4),
                      0 8px 16px rgba(0, 0, 0, 0.2);
                  ">
                <span class="block">Kelurahan Raih Penghargaan</span>
                <span class="block text-blue-300">Adipura Tingkat Kota</span>
              </h1>

              <div class="flex flex-wrap gap-3 text-sm text-gray-300 mt-8">
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-calendar-alt mr-1"></i>
                  <span>20 Juni 2024</span>
                </div>
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-eye mr-1"></i>
                  <span>1.5K Views</span>
                </div>
                <div
                  class="flex items-center bg-black/30 px-3 py-1 rounded-full glass-effect">
                  <i class="far fa-user mr-1"></i>
                  <span>Admin Kelurahan</span>
                </div>
                <div
                  class="flex items-center px-4 py-2 rounded-xl border border-white/20 hover:bg-white/20 transition-all glass-effect"
                  style="background: rgba(255, 255, 255, 0.1)">
                  <i class="far fa-clock mr-2"></i>
                  <span>5 min read</span>
                </div>
              </div>

              <div class="mt-10">
                <a
                  href="news-detail2.html"
                  class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-700 text-white font-bold rounded-xl shadow-xl hover:shadow-2xl transform hover:-translate-y-0.5 transition-all duration-300 group border border-white/20 text-sm">
                  <span class="text-lg">Baca Selengkapnya</span>
                  <i
                    class="fas fa-arrow-right ml-3 text-lg group-hover:translate-x-1.5 transition-transform duration-300"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="news-hero-controls container mx-auto relative z-30 px-6">
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
          <div class="news-hero-nav flex items-center gap-3">
            <button
              id="news-hero-prev"
              class="group w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md flex items-center justify-center text-white transition-all duration-300 shadow-lg border border-white/20">
              <i
                class="fas fa-chevron-left text-base group-hover:scale-110 transition-transform duration-300"></i>
              <span class="sr-only">Previous Slide</span>
            </button>

            <div class="flex items-center space-x-2 mx-2">
              <button
                class="w-2.5 h-2.5 rounded-full bg-white/60 hover:bg-white transition-all duration-300 dot-indicator active"
                aria-label="Slide 1"></button>
              <button
                class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300 dot-indicator"
                aria-label="Slide 2"></button>
              <button
                class="w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-white/60 transition-all duration-300 dot-indicator"
                aria-label="Slide 3"></button>
            </div>

            <button
              id="news-hero-next"
              class="group w-12 h-12 rounded-xl bg-white/10 hover:bg-white/20 backdrop-blur-md flex items-center justify-center text-white transition-all duration-300 shadow-lg border border-white/20">
              <i
                class="fas fa-chevron-right text-base group-hover:translate-x-0.5 transition-transform duration-300"></i>
              <span class="sr-only">Next Slide</span>
            </button>
          </div>
        </div>
      </div>

      <div
        class="absolute left-6 top-1/3 z-30 flex flex-col space-y-4 social-vertical"
      >
        <a
          href="#"
          id="share-facebook"
          class="group w-12 h-12 rounded-full bg-gradient-to-r from-blue-600/20 to-blue-700/20 backdrop-blur-md flex items-center justify-center text-white hover:from-blue-600/40 hover:to-blue-700/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20"
          title="Bagikan ke Facebook"
        >
          <i
            class="fab fa-facebook-f text-lg group-hover:scale-110 transition-transform duration-300"
          ></i>
        </a>
        <a
          href="#"
          id="share-twitter"
          class="group w-12 h-12 rounded-full bg-gradient-to-r from-sky-500/20 to-sky-600/20 backdrop-blur-md flex items-center justify-center text-white hover:from-sky-500/40 hover:to-sky-600/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20"
          title="Bagikan ke Twitter"
        >
          <i
            class="fab fa-twitter text-lg group-hover:scale-110 transition-transform duration-300"
          ></i>
        </a>
        <a
          href="#"
          id="share-whatsapp"
          class="group w-12 h-12 rounded-full bg-gradient-to-r from-green-500/20 to-green-600/20 backdrop-blur-md flex items-center justify-center text-white hover:from-green-500/40 hover:to-green-600/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20"
          title="Bagikan ke WhatsApp"
        >
          <i
            class="fab fa-whatsapp text-lg group-hover:scale-110 transition-transform duration-300"
          ></i>
        </a>
        <a
          href="#"
          id="share-email"
          class="group w-12 h-12 rounded-full bg-gradient-to-r from-red-500/20 to-orange-500/20 backdrop-blur-md flex items-center justify-center text-white hover:from-red-500/40 hover:to-orange-500/40 transition-all duration-300 hover:scale-110 shadow-xl border border-white/20"
          title="Bagikan via Email"
        >
          <i
            class="fas fa-envelope text-lg group-hover:scale-110 transition-transform duration-300"
          ></i>
        </a>
      </div>

      <div
        class="absolute right-24 top-[55%] transform -translate-y-1/2 z-30 w-80 hidden md:block">
        <div
          class="bg-white/10 backdrop-blur-lg rounded-2xl p-7 border border-white/20 shadow-2xl">
          <h3 class="text-white font-bold text-lg mb-4 flex items-center">
            <i class="fas fa-bolt text-yellow-400 mr-2"></i>
            TRENDING NOW
          </h3>

          <div class="space-y-4">
            <a href="#" class="group block">
              <div class="flex items-center gap-4">
                <img
                  src="https://sketsanews.id/wp-content/uploads/2024/04/WhatsApp-Image-2024-04-26-at-15.11.21.jpeg"
                  alt="festival"
                  class="w-14 h-14 rounded-lg object-cover flex-shrink-0" />
                <div class="flex-grow">
                  <h4
                    class="text-white font-medium group-hover:text-yellow-300 transition-colors text-sm leading-tight">
                    Festival Budaya Melayu Tanjungpinang 2024
                  </h4>
                  <p class="text-xs text-white/60 mt-1">2.1K views</p>
                </div>
              </div>
            </a>

            <a href="#" class="group block">
              <div class="flex items-center gap-4">
                <img
                  src="https://icms.tanjungpinangkota.go.id/ckeditor/posting/7243000000/berita/small/small_1671075377_e909afc8339b2952e2e3.jpg"
                  alt="Kartu"
                  class="w-14 h-14 rounded-lg object-cover flex-shrink-0" />
                <div class="flex-grow">
                  <h4
                    class="text-white font-medium group-hover:text-yellow-300 transition-colors text-sm leading-tight">
                    Penyerahan Simbolis Kartu Identitas Anak (KIA)
                  </h4>
                  <p class="text-xs text-white/60 mt-1">2k views</p>
                </div>
              </div>
            </a>

            <a href="#" class="group block">
              <div class="flex items-center gap-4">
                <img
                  src="https://argiaacademy.com/wp-content/uploads/2022/11/pelatihan-digital-marketing-untuk-umkm-1.jpeg"
                  alt="Pelatihan UMKM"
                  class="w-14 h-14 rounded-lg object-cover flex-shrink-0" />
                <div class="flex-grow">
                  <h4
                    class="text-white font-medium group-hover:text-yellow-300 transition-colors text-sm leading-tight">
                    Pelatihan UMKM Digital
                  </h4>
                  <p class="text-xs text-white/60 mt-1">2K views</p>
                </div>
              </div>
            </a>
          </div>

          <button
            id="show-trending-overlay-btn"
            class="mt-6 w-full text-center text-sm text-white/80 hover:text-white transition-colors bg-white/10 py-2 rounded-lg hover:bg-white/20">
            Lihat Semua <i class="fas fa-arrow-right ml-1 text-xs"></i>
          </button>
        </div>
      </div>
    </section>

    <div id="trending-overlay">
      <div class="trending-overlay-content">
        <div class="text-center mb-8 relative">
          <h2 class="text-4xl md:text-5xl font-bold text-white mb-2">
            Berita Trending
          </h2>
          <p class="text-lg text-gray-300">
            Informasi yang paling banyak dilihat saat ini.
          </p>
        </div>

        <div
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 overflow-y-auto pr-4 flex-grow">
          <a
            href="#"
            class="block bg-white/5 p-4 rounded-xl hover:bg-white/10 transition-all duration-300 trending-overlay-card"
            style="animation-delay: 0.1s">
            <div
              class="relative overflow-hidden rounded-lg w-full h-48 flex-shrink-0">
              <img
                src="https://sketsanews.id/wp-content/uploads/2024/04/WhatsApp-Image-2024-04-26-at-15.11.21.jpeg"
                alt="Banjir"
                class="w-full h-full object-cover" />
            </div>
            <h4 class="text-white font-semibold mt-4 text-lg">
              Festival Budaya Melayu Tanjungpinang 2024
            </h4>
            <p class="text-gray-400 text-sm mt-1">
              2.1K views - 24 Juni 2024
            </p>
          </a>
          <a
            href="#"
            class="block bg-white/5 p-4 rounded-xl hover:bg-white/10 transition-all duration-300 trending-overlay-card"
            style="animation-delay: 0.2s">
            <div
              class="relative overflow-hidden rounded-lg w-full h-48 flex-shrink-0">
              <img
                src="https://icms.tanjungpinangkota.go.id/ckeditor/posting/7243000000/berita/small/small_1671075377_e909afc8339b2952e2e3.jpg"
                alt="Taman"
                class="w-full h-full object-cover" />
            </div>
            <h4 class="text-white font-semibold mt-4 text-lg">
              Penyerahan Simbolis Kartu Identitas Anak (KIA)
            </h4>
            <p class="text-gray-400 text-sm mt-1">2k views - 23 Juni 2024</p>
          </a>
          <a
            href="#"
            class="block bg-white/5 p-4 rounded-xl hover:bg-white/10 transition-all duration-300 trending-overlay-card"
            style="animation-delay: 0.3s">
            <div
              class="relative overflow-hidden rounded-lg w-full h-48 flex-shrink-0">
              <img
                src="https://argiaacademy.com/wp-content/uploads/2022/11/pelatihan-digital-marketing-untuk-umkm-1.jpeg"
                alt="UMKM"
                class="w-full h-full object-cover" />
            </div>
            <h4 class="text-white font-semibold mt-4 text-lg">
              Pelatihan UMKM Digital
            </h4>
            <p class="text-gray-400 text-sm mt-1">2K views - 22 Juni 2024</p>
          </a>
          <a
            href="#"
            class="block bg-white/5 p-4 rounded-xl hover:bg-white/10 transition-all duration-300 trending-overlay-card"
            style="animation-delay: 0.4s">
            <div
              class="relative overflow-hidden rounded-lg w-full h-48 flex-shrink-0">
              <img
                src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?q=80&w=400&h=225&auto=format&fit=crop"
                alt="Vaksinasi"
                class="w-full h-full object-cover" />
            </div>
            <h4 class="text-white font-semibold mt-4 text-lg">
              Program Vaksinasi Booster
            </h4>
            <p class="text-gray-400 text-sm mt-1">
              1.8K views - 21 Juni 2021
            </p>
          </a>
          <a
            href="#"
            class="block bg-white/5 p-4 rounded-xl hover:bg-white/10 transition-all duration-300 trending-overlay-card"
            style="animation-delay: 0.5s">
            <div
              class="relative overflow-hidden rounded-lg w-full h-48 flex-shrink-0">
              <img
                src="https://sinaumedia.com/wp-content/uploads/2023/03/Definition-of-Gotong-Royong-and-its-Benefits-and-Examples-scaled.jpg"
                alt="Gotong Royong"
                class="w-full h-full object-cover" />
            </div>
            <h4 class="text-white font-semibold mt-4 text-lg">
              Gotong Royong Massal
            </h4>
            <p class="text-gray-400 text-sm mt-1">
              1.2K views - 20 Juni 2024
            </p>
          </a>
          <a
            href="#"
            class="block bg-white/5 p-4 rounded-xl hover:bg-white/10 transition-all duration-300 trending-overlay-card"
            style="animation-delay: 0.6s">
            <div
              class="relative overflow-hidden rounded-lg w-full h-48 flex-shrink-0">
              <img
                src="https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954074_bcd67607ce3600415d76.jpg"
                alt="Bantuan Sosial"
                class="w-full h-full object-cover" />
            </div>
            <h4 class="text-white font-semibold mt-4 text-lg">
              Penyaluran Bantuan Sembako
            </h4>
            <p class="text-gray-400 text-sm mt-1">
              2.1K views - 19 Juni 2024
            </p>
          </a>
        </div>
      </div>
      <button id="close-trending-overlay">
        <i class="fas fa-times text-xl"></i>
      </button>
    </div>
    <section id="all-news" class="py-12 md:py-16 relative -mt-10">
      <div class="fixed-container">
        <div class="text-center mb-16 relative z-10">
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Semua Berita
          </h2>
          <p class="text-xl text-gray-600">
            Ikuti informasi dan kegiatan terkini yang berlangsung di
            lingkungan Kelurahan Tanjungpinang Kota.
          </p>
        </div>

        <div
          class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 pb-4 mb-8">
          <div class="flex overflow-x-auto gap-2 w-full md:w-auto">
            <button
              class="category-filter px-4 py-2 bg-red-600 text-white rounded-full font-medium whitespace-nowrap border border-red-700 shadow-md"
              data-filter="all">
              SEMUA
            </button>
            <button
              class="category-filter px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200"
              data-filter="pemerintahan">
              PEMERINTAHAN
            </button>
            <button
              class="category-filter px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200"
              data-filter="sosial">
              SOSIAL
            </button>
            <button
              class="category-filter px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200"
              data-filter="kesehatan">
              KESEHATAN
            </button>
            <button
              class="category-filter px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200"
              data-filter="lingkungan">
              LINGKUNGAN
            </button>
            <button
              class="category-filter px-4 py-2 bg-white text-gray-700 rounded-full font-medium whitespace-nowrap border border-gray-200"
              data-filter="pendidikan">
              PENDIDIKAN
            </button>
          </div>
          <div class="w-full md:w-80">
            <div class="relative">
              <input
                type="text"
                id="news-title-search"
                placeholder="Cari judul atau kategori..."
                class="pl-10 pr-10 py-2 w-full rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-300" />
              <i
                class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
              <button
                id="clear-search"
                class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600 hidden"
                type="button"
                title="Hapus pencarian">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </div>

        <div
          id="news-grid"
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 relative z-10">
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="pemerintahan">
            <div
              class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://images.unsplash.com/photo-1573167507387-6b4b98cb7c13?q=80&w=1280&h=720&auto=format&fit=crop"
                  alt="Sosialisasi E-KTP Digital"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy"
                  width="1280"
                  height="720" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-red-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  PEMERINTAHAN
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 18 Juni 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 1.2K
                  </span>
                </div>
                <a href="/news-detail1" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Sosialisasi E-KTP Digital untuk Seluruh Ketua RT dan RW
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Peluncuran program e-KTP digital untuk memudahkan
                  administrasi kependudukan di tingkat kelurahan dan RT/RW.
                </p>
                <a
                  href="/news-detail1" 
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center"
                  aria-label="Baca selengkapnya tentang Sosialisasi E-KTP Digital">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="lingkungan">
            <div
              class="absolute inset-0 bg-gradient-to-br from-green-500/5 via-transparent to-primary-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1698139006_720de976749805e4c099.jpg"
                  alt="Kelurahan Raih Penghargaan Adipura Tingkat Kota"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-green-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  LINGKUNGAN
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 15 Juni 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 980
                  </span>
                </div>
                <a href="/news-detail2" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Kelurahan Raih Penghargaan Adipura Tingkat Kota
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Atas prestasi dalam menjaga kebersihan dan penghijauan
                  lingkungan, kelurahan kita meraih penghargaan Adipura.
                </p>
                <a
                  href="/news-detail2"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center"
                  aria-label="Baca selengkapnya tentang Kelurahan Raih Penghargaan Adipura Tingkat Kota">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="kesehatan">
            <div
              class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-transparent to-primary-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1280&h=720&auto=format&fit=crop"
                  alt="Pelatihan UMKM: Strategi Pemasaran Digital di Era Modern"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-purple-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  KESEHATAN
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 12 Juni 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 1.3K
                  </span>
                </div>
                <a href="#" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Pelatihan UMKM: Strategi Pemasaran Digital di Era Modern
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Program pelatihan untuk pengusaha kecil dan menengah dalam
                  memanfaatkan teknologi digital untuk pemasaran.
                </p>
                <a
                  href="#"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="kesehatan">
            <div
              class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=1280&h=720&auto=format&fit=crop"
                  alt="Vaksinasi COVID-19"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-purple-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  KESEHATAN
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 10 Juli 2021
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 890
                  </span>
                </div>
                <a href="#" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Program Vaksinasi COVID-19 Booster untuk Lansia
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Kelurahan mengadakan program vaksinasi booster khusus untuk
                  warga lansia dengan protokol kesehatan yang ketat.
                </p>
                <a
                  href="#"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="sosial">
            <div
              class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://sinaumedia.com/wp-content/uploads/2023/03/Definition-of-Gotong-Royong-and-its-Benefits-and-Examples-scaled.jpg"
                  alt="Gotong Royong"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-blue-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  SOSIAL
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 8 Juli 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 1.1K
                  </span>
                </div>
                <a href="#" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Gotong Royong Bersih-Bersih Lingkungan RT 05
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Kegiatan gotong royong membersihkan lingkungan yang diikuti
                  oleh seluruh warga RT 05 untuk menjaga kebersihan.
                </p>
                <a
                  href="#"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="pendidikan">
            <div
              class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1280&h=720&auto=format&fit=crop"
                  alt="Pelatihan Komputer"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-[#ffd700]/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  PENDIDIKAN
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 5 Juli 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 750
                  </span>
                </div>
                <a href="#" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Pelatihan Komputer Dasar untuk Remaja
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Program pelatihan komputer dasar yang ditujukan untuk remaja
                  agar dapat mengikuti perkembangan teknologi.
                </p>
                <a
                  href="#"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="infrastruktur">
            <div
              class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://podosari.kendalkab.go.id//upload/berita/206_1727147938.jpeg"
                  alt="Pembangunan Infrastruktur"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-red-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  INFRASTRUKTUR
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 3 Juli 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 1.5K
                  </span>
                </div>
                <a href="#" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Pembangunan Jalan Beton di Gang Mawar
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Proyek pembangunan jalan beton sepanjang 200 meter di Gang
                  Mawar untuk meningkatkan akses transportasi warga.
                </p>
                <a
                  href="#"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="budaya">
            <div
              class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://sketsanews.id/wp-content/uploads/2024/04/WhatsApp-Image-2024-04-26-at-15.11.21.jpeg"
                  alt="Festival Budaya"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-red-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  BUDAYA
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 1 Juli 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 2.1K
                  </span>
                </div>
                <a href="#" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Festival Budaya Melayu Tanjungpinang 2024
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Perayaan festival budaya Melayu yang menampilkan berbagai
                  pertunjukan seni dan kuliner tradisional Kepulauan Riau.
                </p>
                <a
                  href="#"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
          <article
            class="news-card group relative overflow-hidden rounded-2xl bg-white shadow-xl hover:shadow-2xl transition-all duration-500 border border-gray-100"
            data-category="sosial">
            <div
              class="absolute inset-0 bg-gradient-to-br from-primary-500/5 via-transparent to-blue-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            <div class="relative z-10 h-full flex flex-col">
              <div
                class="relative overflow-hidden rounded-t-2xl aspect-[4/3]">
                <img
                  src="https://images.unsplash.com/photo-1573167507387-6b4b98cb7c13?q=80&w=1280&h=720&auto=format&fit=crop"
                  alt="Bantuan Sosial"
                  class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                  loading="lazy" />
                <span
                  class="absolute top-4 left-4 font-medium text-white bg-blue-600/90 backdrop-blur-sm px-3 py-1 rounded-full border border-white/20">
                  SOSIAL
                </span>
              </div>
              <div class="p-6 flex-grow flex flex-col">
                <div class="flex items-center justify-between text-sm mb-4">
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-clock mr-2"></i> 28 Juni 2024
                  </span>
                  <span class="text-gray-500 flex items-center">
                    <i class="far fa-eye mr-2"></i> 980
                  </span>
                </div>
                <a href="#" class="block">
                  <h3
                    class="text-xl font-bold mb-4 leading-snug text-gray-900 hover:text-red-600 transition-colors duration-300 cursor-pointer">
                    Penyaluran Bantuan Sembako untuk Keluarga Kurang Mampu
                  </h3>
                </a>
                <p class="text-gray-600 mb-5 line-clamp-2 flex-grow">
                  Program bantuan sembako bulanan yang disalurkan kepada 150
                  keluarga kurang mampu di wilayah kelurahan.
                </p>
                <a
                  href="#"
                  class="inline-flex items-center justify-center font-semibold text-primary-700 hover:text-red-600 transition-colors duration-300 group mt-auto w-full text-center">
                  Baca Selengkapnya
                  <i
                    class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
              </div>
            </div>
          </article>
        </div>

        <div class="flex justify-center mt-20" id="pagination-container">
          <nav
            class="flex items-center space-x-3 bg-white/90 backdrop-blur-xl rounded-3xl p-3 shadow-2xl border border-gray-200/50 relative">
            <div
              class="absolute -inset-1 bg-gradient-to-r from-primary-600 to-red-700 rounded-3xl blur opacity-20"></div>

            <div class="relative flex items-center space-x-3">
              <button
                id="prev-btn"
                class="group p-4 rounded-2xl bg-white text-gray-700 hover:bg-gradient-to-r hover:from-red-600 hover:to-red-700 hover:text-white transition-all duration-300 shadow-lg border border-gray-200">
                <i
                  class="fas fa-chevron-left group-hover:scale-110 transition-transform duration-300"></i>
                <span class="sr-only">Previous Page</span>
              </button>

              <div
                class="flex items-center space-x-2"
                id="page-numbers"></div>

              <button
                id="next-btn"
                class="group p-4 rounded-2xl bg-white text-gray-700 hover:bg-gradient-to-r hover:from-red-600 hover:to-red-700 hover:text-white transition-all duration-300 shadow-lg border border-gray-200">
                <i
                  class="fas fa-chevron-right group-hover:scale-110 transition-transform duration-300"></i>
                <span class="sr-only">Next Page</span>
              </button>
            </div>
          </nav>
        </div>
      </div>
    </section>

    <section
      class="py-12 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
      <div class="fixed-container">
        <div class="text-center mb-16 relative z-10">
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Sorotan Berita
          </h2>
          <p class="text-xl text-gray-600">
            Jangan lewatkan berita yang sedang hangat dibicarakan dan yang
            paling baru.
          </p>
        </div>

        <div
          class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl p-6 md:p-8 mx-auto relative overflow-hidden border border-white/20 hover:shadow-2xl transition-shadow duration-300">
          <div
            class="absolute -top-20 -right-20 w-64 h-64 bg-primary-500/10 rounded-full blur-3xl -z-10"></div>
          <div
            class="absolute -bottom-20 -left-20 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -z-10"></div>

          <div class="flex justify-center border-b border-gray-200/50 mb-8">
            <button
              class="spotlight-tab-btn active px-6 py-3 relative hover:text-primary-700 transition-colors duration-300 text-lg"
              data-tab="populer">
              <span>Populer</span>
              <div
                class="absolute bottom-0 left-0 right-0 h-1 bg-primary-600 rounded-t-full transition-all duration-300 opacity-100"></div>
            </button>
            <button
              class="spotlight-tab-btn px-6 py-3 relative hover:text-primary-700 transition-colors duration-300 text-lg"
              data-tab="terkini">
              <span>Terkini</span>
              <div
                class="absolute bottom-0 left-0 right-0 h-1 bg-primary-600 rounded-t-full transition-all duration-300 opacity-0"></div>
            </button>
          </div>

          <div class="relative z-10">
            <div id="populer" class="spotlight-tab-content active">
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1280&h=720&auto=format&fit=crop"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Bantuan Langsung Tunai (BLT) Tahap II Mulai Dicairkan
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 10 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 2.5K</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://sketsanews.id/wp-content/uploads/2024/04/WhatsApp-Image-2024-04-26-at-15.11.21.jpeg"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Festival Budaya Melayu Tanjungpinang 2024
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 2 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 2.1k</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://podosari.kendalkab.go.id//upload/berita/206_1727147938.jpeg"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Pembangunan Jalan Lingkungan RW 08 Dimulai
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 8 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 1.75K</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1280&h=720&auto=format&fit=crop"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Sosialisasi Program Vaksinasi Booster untuk Lansia
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 5 Juli
                        2021</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 2k</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://www.kemenkopmk.go.id/sites/default/files/articles/2022-07/IMG-20220703-WA0052.jpg"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Peringatan Hari Lingkungan Hidup dengan Penanaman 500
                      Pohon
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 3 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 2.4K</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://sinaumedia.com/wp-content/uploads/2023/03/Definition-of-Gotong-Royong-and-its-Benefits-and-Examples-scaled.jpg"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Gotong Royong Bersih-Bersih Lingkungan RT 05
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 1 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 1.1K</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>

            <div id="terkini" class="spotlight-tab-content hidden">
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1280&h=720&auto=format&fit=crop"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Peluncuran Aplikasi Layanan Kelurahan "Tanjung Digital"
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 15 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 1.2K</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://images.unsplash.com/photo-1573167507387-6b4b98cb7c13?q=80&w=1280&h=720&auto=format&fit=crop"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Rapat Koordinasi Persiapan HUT RI Ke-80 Tingkat
                      Kelurahan
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 14 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 980</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?q=80&w=1280&h=720&auto=format&fit=crop"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Pelatihan UMKM: Strategi Pemasaran Digital
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 13 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 1.3K</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1280&h=720&auto=format&fit=crop"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Pemeriksaan Kesehatan Gratis untuk Warga Lansia
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 12 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 720</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1718954728_47d9af74ec712bd51c9a.jpg"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Bantuan Langsung Tunai (BLT) Tahap II Mulai Dicairkan
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 10 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 2.4K</span>
                    </div>
                  </div>
                </a>
                <a
                  href="#"
                  class="latest-news-item group flex items-start p-4 rounded-xl hover:bg-white/50 transition-all">
                  <div class="flex-1">
                    <div
                      class="aspect-w-16 aspect-h-9 mb-3 overflow-hidden rounded-lg shadow-sm">
                      <img
                        src="https://podosari.kendalkab.go.id//upload/berita/206_1727147938.jpeg"
                        alt="berita"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                    </div>
                    <h4
                      class="font-bold text-gray-800 group-hover:text-primary-700 transition-colors">
                      Pembangunan Jalan Lingkungan RW 08 Dimulai
                    </h4>
                    <div class="flex items-center text-sm text-gray-500 mt-2">
                      <span><i class="far fa-calendar-alt mr-1"></i> 8 Juli
                        2025</span>
                      <span class="ml-3"><i class="far fa-eye mr-1"></i> 1.8K</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>

          <div class="text-center mt-12">
            <button
              id="spotlight-view-all-btn"
              class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-red-600 to-red-700 text-white font-bold rounded-2xl hover:from-red-700 hover:to-red-800 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-2">
              <i
                class="fas fa-newspaper mr-3 group-hover:scale-110 transition-transform duration-300"></i>
              <span id="spotlight-btn-text">Lihat Semua Berita Populer</span>
              <i
                class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
            </button>
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
          <img
            src="https://tpikotakel.tanjungpinangkota.go.id/img/logo-tpi.182f9638.png"
            alt="Logo Kelurahan"
            class="h-16 mb-4" />
          <p class="text-gray-300 mb-4">
            Kelurahan Tanjungpinang Kota merupakan salah satu kelurahan di
            Kecamatan Tanjungpinang Kota, Kota Tanjungpinang, Provinsi
            Kepulauan Riau.
          </p>
          <div class="flex space-x-4">
            <a
              href="https://www.facebook.com/kel.tpikota"
              class="text-gray-300 hover:text-white transition-colors">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a
              href="https://www.instagram.com/kel.tpikota/"
              class="text-gray-300 hover:text-white transition-colors">
              <i class="fab fa-instagram"></i>
            </a>
            <a
              href="#"
              class="text-gray-300 hover:text-white transition-colors">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>

        <div>
          <h3 class="text-white text-xl font-bold mb-6">Tautan Cepat</h3>
          <ul class="space-y-3 footer-links">
            <li><a href="index.html" class="text-gray-300">Beranda</a></li>
            <li><a href="#" class="text-gray-300">Berita</a></li>
            <li>
              <a href="attent.html" class="text-gray-300">Pengumuman</a>
            </li>
            <li><a href="gallery.html" class="text-gray-300">Galeri</a></li>
            <li>
              <a href="download.html" class="text-gray-300">Download</a>
            </li>
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
              <i
                class="fas fa-map-marker-alt text-accent-color mt-1 mr-3"></i>
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
          @ 2025 Design by Kerja Praktik UMRAH.
        </p>
      </div>
    </div>
  </footer>

  <button
    id="back-to-top"
    class="fixed bottom-8 right-8 bg-primary-600 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-primary-700">
    <i class="fas fa-arrow-up"></i>
  </button>

  <div
    id="visitorPopup"
    class="fixed right-0 top-1/2 transform -translate-y-1/2 z-50 hidden transition-all duration-300 ease-out translate-x-full">
    <div
      class="bg-white rounded-l-lg shadow-xl border border-gray-200 w-64 relative">
      <button
        id="closePopup"
        class="absolute -left-14 top-1/2 transform -translate-y-1/2 bg-red-600 text-white rounded-l-lg shadow-lg hover:bg-red-700 transition border-t border-b border-l border-gray-200 h-28 w-14 flex flex-col items-center justify-center">
        <span
          class="text-[14px] font-medium transform -rotate-90 whitespace-nowrap flex items-center gap-1">
          Kunjungan
          <span
            class="bg-white rounded-full p-1 flex items-center justify-center h-5 w-5">
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

  <button
    id="togglePopup"
    class="fixed right-0 top-1/2 transform -translate-y-1/2 bg-red-600 text-white rounded-l-lg shadow-lg z-40 hover:bg-red-700 transition h-28 w-14 flex flex-col items-center justify-center">
    <span
      class="text-[14px] font-medium transform -rotate-90 whitespace-nowrap flex items-center gap-1.5">
      Kunjungan
      <span
        class="bg-white rounded-full p-1.5 flex items-center justify-center h-5 w-5">
        <i class="fas fa-chevron-up text-xs text-red-600"></i>
      </span>
    </span>
  </button>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    // --- SHARE FUNCTIONALITY FOR SOCIAL MEDIA VERTICAL ---
    function getCurrentSlideData() {
      const slides = document.querySelectorAll(".news-hero-slide");
      for (const slide of slides) {
        if (slide.classList.contains("active")) {
          return {
            title: slide.getAttribute("data-title") || document.title,
            link: slide.getAttribute("data-link") || window.location.href,
          };
        }
      }
      return { title: document.title, link: window.location.href };
    }

    function openShareWindow(url) {
      window.open(url, "_blank", "width=600,height=500");
    }

    document
      .getElementById("share-facebook")
      .addEventListener("click", function (e) {
        e.preventDefault();
        const data = getCurrentSlideData();
        const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(
          location.origin + "/" + data.link
        )}&t=${encodeURIComponent(data.title)}`;
        openShareWindow(shareUrl);
      });

    document
      .getElementById("share-twitter")
      .addEventListener("click", function (e) {
        e.preventDefault();
        const data = getCurrentSlideData();
        const shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(
          data.title
        )}&url=${encodeURIComponent(location.origin + "/" + data.link)}`;
        openShareWindow(shareUrl);
      });

    document
      .getElementById("share-whatsapp")
      .addEventListener("click", function (e) {
        e.preventDefault();
        const data = getCurrentSlideData();
        const shareText = `${data.title} ${
          location.origin + "/" + data.link
        }`;
        const shareUrl = `https://wa.me/?text=${encodeURIComponent(
          shareText
        )}`;
        openShareWindow(shareUrl);
      });

    document
      .getElementById("share-email")
      .addEventListener("click", function (e) {
        e.preventDefault();
        const data = getCurrentSlideData();
        const subject = encodeURIComponent(data.title);
        const body = encodeURIComponent(
          `${data.title}\n${location.origin + "/" + data.link}`
        );
        window.location.href = `mailto:?subject=${subject}&body=${body}`;
      });
  </script>
  <script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById("mobile-menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    if (mobileMenuBtn) {
      mobileMenuBtn.addEventListener("click", () => {
        if (mobileMenu) mobileMenu.classList.toggle("hidden");
      });
    }

    // --- HERO NEWS CAROUSEL SCRIPT ---
    document.addEventListener("DOMContentLoaded", function() {
      const heroSlides = document.querySelectorAll(".news-hero-slide");
      const heroIndicators = document.querySelectorAll(".dot-indicator");
      const heroPrev = document.getElementById("news-hero-prev");
      const heroNext = document.getElementById("news-hero-next");

      if (heroSlides.length === 0) return;

      let heroCurrent = 0;
      let heroInterval = null;

      function showHeroSlide(idx) {
        heroCurrent = idx;
        heroSlides.forEach((slide, i) => {
          slide.classList.toggle("active", i === idx);
        });
        heroIndicators.forEach((dot, i) => {
          dot.classList.toggle("active", i === idx);
          dot.classList.toggle("bg-white/60", i === idx);
          dot.classList.toggle("bg-white/30", i !== idx);
        });
      }

      function heroNextSlide() {
        const nextIndex = (heroCurrent + 1) % heroSlides.length;
        showHeroSlide(nextIndex);
      }

      function heroPrevSlide() {
        const prevIndex =
          (heroCurrent - 1 + heroSlides.length) % heroSlides.length;
        showHeroSlide(prevIndex);
      }

      function startAutoSlide() {
        clearInterval(heroInterval);
        heroInterval = setInterval(heroNextSlide, 5000);
      }

      if (heroNext) {
        heroNext.addEventListener("click", () => {
          heroNextSlide();
          startAutoSlide();
        });
      }

      if (heroPrev) {
        heroPrev.addEventListener("click", () => {
          heroPrevSlide();
          startAutoSlide();
        });
      }

      heroIndicators.forEach((dot, i) => {
        dot.addEventListener("click", () => {
          showHeroSlide(i);
          startAutoSlide();
        });
      });

      showHeroSlide(0);
      startAutoSlide();
    });

    // Back to top button
    const backToTopBtn = document.getElementById("back-to-top");
    if (backToTopBtn) {
      window.addEventListener("scroll", () => {
        if (window.pageYOffset > 300) {
          backToTopBtn.classList.remove("opacity-0", "invisible");
          backToTopBtn.classList.add("opacity-100", "visible");
        } else {
          backToTopBtn.classList.add("opacity-0", "invisible");
          backToTopBtn.classList.remove("opacity-100", "visible");
        }
      });

      backToTopBtn.addEventListener("click", () => {
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
      });
    }

    // Header scroll effect
    const header = document.querySelector(".modern-header");
    if (header) {
      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          header.classList.add("scrolled");
        } else {
          header.classList.remove("scrolled");
        }
      });
    }

    // Spotlight News Tabs Functionality
    const spotlightTabBtns = document.querySelectorAll(".spotlight-tab-btn");
    const spotlightTabContents = document.querySelectorAll(
      ".spotlight-tab-content"
    );
    if (spotlightTabBtns.length > 0) {
      spotlightTabBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
          const targetTab = btn.getAttribute("data-tab");
          spotlightTabBtns.forEach((b) => {
            b.classList.remove("active");
            b.querySelector("div").style.opacity = "0";
          });
          btn.classList.add("active");
          btn.querySelector("div").style.opacity = "1";
          spotlightTabContents.forEach((content) => {
            content.classList.add("hidden");
            content.classList.remove("active");
          });
          const targetContent = document.getElementById(targetTab);
          if (targetContent) {
            targetContent.classList.remove("hidden");
            targetContent.classList.add("active");
          }
        });
      });
    }

    // --- UNIFIED NEWS FILTERING AND PAGINATION SCRIPT (UPDATED) ---
    document.addEventListener("DOMContentLoaded", function() {
      // --- SELECTORS ---
      const filterButtons = document.querySelectorAll(".category-filter");
      const searchInput = document.getElementById("news-title-search");
      const clearSearchBtn = document.getElementById("clear-search");
      const allNewsCards = Array.from(
        document.querySelectorAll("#all-news .news-card")
      );
      const newsGrid = document.getElementById("news-grid");
      const paginationContainer = document.getElementById(
        "pagination-container"
      );
      const pageNumbersContainer = document.getElementById("page-numbers");
      const prevBtn = document.getElementById("prev-btn");
      const nextBtn = document.getElementById("next-btn");

      // --- STATE ---
      let currentPage = 1;
      const cardsPerPage = 6;
      let filteredCards = allNewsCards;
      let isAnimating = false;

      // --- CORE FUNCTIONS ---

      // This function just updates the DOM to show the correct cards
      function displayCardsForPage(page) {
        const start = (page - 1) * cardsPerPage;
        const end = start + cardsPerPage;

        // Determine which cards should be visible
        const visibleCards = filteredCards.slice(start, end);

        // Hide all cards, then show only the visible ones
        allNewsCards.forEach((card) => {
          if (visibleCards.includes(card)) {
            card.style.display = "";
          } else {
            card.style.display = "none";
          }
        });
      }

      // Handles the animated transition between pages
      function transitionToPage(newPage) {
        if (isAnimating || newPage === currentPage) return;

        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);
        if (newPage < 1 || newPage > totalPages) return;

        isAnimating = true;

        const direction = newPage > currentPage ? "next" : "prev";
        const outClass =
          direction === "next" ? "slide-out-to-left" : "slide-out-to-right";
        const inClass =
          direction === "next" ? "slide-in-from-right" : "slide-in-from-left";

        newsGrid.classList.add(outClass);

        const onAnimationOutEnd = () => {
          newsGrid.removeEventListener("animationend", onAnimationOutEnd);

          // Update content
          currentPage = newPage;
          displayCardsForPage(currentPage);
          updatePaginationUI();

          // Animate in
          newsGrid.classList.remove(outClass);
          newsGrid.classList.add(inClass);

          const onAnimationInEnd = () => {
            newsGrid.removeEventListener("animationend", onAnimationInEnd);
            newsGrid.classList.remove(inClass);
            isAnimating = false;
          };
          newsGrid.addEventListener("animationend", onAnimationInEnd, {
            once: true,
          });
        };

        newsGrid.addEventListener("animationend", onAnimationOutEnd, {
          once: true,
        });
      }

      // Applies filters and search, then resets the view
      function applyFiltersAndSearch() {
        const category =
          document.querySelector(".category-filter.bg-red-600")?.dataset
          .filter || "all";
        const searchTerm = searchInput.value.toLowerCase().trim();

        filteredCards = allNewsCards.filter((card) => {
          const cardCategory = (card.dataset.category || "").toLowerCase();
          const cardTitle = (
            card.querySelector("h3")?.textContent || ""
          ).toLowerCase();
          const categoryMatch =
            category === "all" || cardCategory === category;
          const searchMatch =
            searchTerm === "" ||
            cardTitle.includes(searchTerm) ||
            cardCategory.includes(searchTerm);
          return categoryMatch && searchMatch;
        });

        currentPage = 1;
        displayCardsForPage(currentPage);
        setupPagination();
      }

      // Sets up the pagination buttons based on filtered results
      function setupPagination() {
        if (!pageNumbersContainer) return;
        pageNumbersContainer.innerHTML = "";
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

        if (totalPages <= 1) {
          paginationContainer.style.display = "none";
          return;
        }
        paginationContainer.style.display = "flex";

        for (let i = 1; i <= totalPages; i++) {
          const pageButton = document.createElement("button");
          pageButton.textContent = i;
          pageButton.setAttribute("data-page", i);
          pageButton.className =
            "page-btn px-5 py-4 rounded-2xl bg-white text-gray-700 hover:bg-gradient-to-r hover:from-red-600 hover:to-red-700 hover:text-white transition-all duration-300 font-semibold hover:shadow-lg hover:transform hover:-translate-y-1 border border-gray-200";
          pageNumbersContainer.appendChild(pageButton);

          pageButton.addEventListener("click", () => {
            transitionToPage(i);
          });
        }
        updatePaginationUI();
      }

      // Updates the styles of pagination buttons (active, disabled states)
      function updatePaginationUI() {
        const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

        const pageButtons =
          pageNumbersContainer.querySelectorAll(".page-btn");
        pageButtons.forEach((btn) => {
          const btnPage = parseInt(btn.getAttribute("data-page"));
          if (btnPage === currentPage) {
            btn.classList.add(
              "bg-gradient-to-r",
              "from-red-600",
              "to-red-700",
              "text-white",
              "font-bold",
              "shadow-xl",
              "transform",
              "-translate-y-1"
            );
            btn.classList.remove("bg-white", "text-gray-700");
          } else {
            btn.classList.remove(
              "bg-gradient-to-r",
              "from-red-600",
              "to-red-700",
              "text-white",
              "font-bold",
              "shadow-xl",
              "transform",
              "-translate-y-1"
            );
            btn.classList.add("bg-white", "text-gray-700");
          }
        });

        if (prevBtn && nextBtn) {
          prevBtn.disabled = currentPage === 1;
          nextBtn.disabled = currentPage === totalPages;
          prevBtn.classList.toggle("opacity-50", currentPage === 1);
          nextBtn.classList.toggle("opacity-50", currentPage === totalPages);
          prevBtn.classList.toggle("cursor-not-allowed", currentPage === 1);
          nextBtn.classList.toggle(
            "cursor-not-allowed",
            currentPage === totalPages
          );
        }
      }

      // --- EVENT LISTENERS ---
      filterButtons.forEach((button) => {
        button.addEventListener("click", () => {
          if (isAnimating) return;
          filterButtons.forEach((btn) => {
            btn.classList.remove(
              "bg-red-600",
              "text-white",
              "border-red-700",
              "shadow-md"
            );
            btn.classList.add("bg-white", "text-gray-700", "border-gray-200");
          });
          button.classList.add(
            "bg-red-600",
            "text-white",
            "border-red-700",
            "shadow-md"
          );
          button.classList.remove(
            "bg-white",
            "text-gray-700",
            "border-gray-200"
          );
          applyFiltersAndSearch();
        });
      });

      if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener("input", () => {
          if (isAnimating) return;
          clearTimeout(searchTimeout);
          searchTimeout = setTimeout(() => {
            applyFiltersAndSearch();
          }, 300);
        });
      }

      if (clearSearchBtn) {
        clearSearchBtn.addEventListener("click", () => {
          if (isAnimating) return;
          searchInput.value = "";
          applyFiltersAndSearch();
        });
      }

      if (prevBtn) {
        prevBtn.addEventListener("click", () => {
          transitionToPage(currentPage - 1);
        });
      }

      if (nextBtn) {
        nextBtn.addEventListener("click", () => {
          transitionToPage(currentPage + 1);
        });
      }

      // --- INITIAL RENDER ---
      applyFiltersAndSearch();
    });

    // Visitor Popup script
    const toggleButton = document.getElementById("togglePopup");
    const closeButton = document.getElementById("closePopup");
    const popup = document.getElementById("visitorPopup");

    if (toggleButton && closeButton && popup) {
      toggleButton.addEventListener("click", function() {
        popup.classList.remove("hidden");
        setTimeout(() => {
          popup.classList.remove("translate-x-full");
        }, 10);
      });

      closeButton.addEventListener("click", function() {
        popup.classList.add("translate-x-full");
        setTimeout(() => {
          popup.classList.add("hidden");
        }, 300);
      });
    }

    // --- SCRIPT FOR TRENDING NEWS OVERLAY ---
    const showOverlayBtn = document.getElementById(
      "show-trending-overlay-btn"
    );
    const closeOverlayBtn = document.getElementById("close-trending-overlay");
    const trendingOverlay = document.getElementById("trending-overlay");

    if (showOverlayBtn) {
      showOverlayBtn.addEventListener("click", (e) => {
        e.preventDefault();
        document.body.style.overflow = "hidden";
        trendingOverlay.classList.add("visible");
      });
    }

    if (closeOverlayBtn) {
      closeOverlayBtn.addEventListener("click", () => {
        document.body.style.overflow = "";
        trendingOverlay.classList.remove("visible");
      });
    }

    // Tab switching functionality for spotlight section
    const tabButtons = document.querySelectorAll(".spotlight-tab-btn");
    const tabContents = document.querySelectorAll(".spotlight-tab-content");
    const spotlightBtnText = document.getElementById("spotlight-btn-text");

    if (tabButtons.length > 0) {
      tabButtons.forEach((button) => {
        button.addEventListener("click", () => {
          // Remove active class from all buttons and contents
          tabButtons.forEach((btn) => {
            btn.classList.remove("active");
            btn.querySelector("div").classList.remove("opacity-100");
            btn.querySelector("div").classList.add("opacity-0");
          });

          tabContents.forEach((content) => {
            content.classList.remove("active");
            content.classList.add("hidden");
          });

          // Add active class to clicked button and corresponding content
          button.classList.add("active");
          button.querySelector("div").classList.remove("opacity-0");
          button.querySelector("div").classList.add("opacity-100");

          const tabId = button.getAttribute("data-tab");
          document.getElementById(tabId).classList.add("active");
          document.getElementById(tabId).classList.remove("hidden");

          // Update button text based on active tab
          if (tabId === "terkini") {
            spotlightBtnText.textContent = "Lihat Semua Berita Terkini";
          } else {
            spotlightBtnText.textContent = "Lihat Semua Berita Populer";
          }
        });
      });
    }

    // Back to top button functionality
    const backToTopButton = document.createElement("button");
    backToTopButton.id = "back-to-top";
    backToTopButton.className =
      "fixed bottom-8 right-8 bg-gradient-to-r from-red-700 to-red-800 text-white p-4 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:from-red-700 hover:to-red-800 flex items-center justify-center z-[9999]";
    backToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
    document.body.appendChild(backToTopButton);

    window.addEventListener("scroll", function() {
      if (window.pageYOffset > 300) {
        backToTopButton.classList.remove("opacity-0", "invisible");
        backToTopButton.classList.add("opacity-100", "visible");
      } else {
        backToTopButton.classList.remove("opacity-100", "visible");
        backToTopButton.classList.add("opacity-0", "invisible");
      }
    });

    backToTopButton.addEventListener("click", function() {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  </script>
</body>

</html>