<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>
    Galeri | Kelurahan Tanjungpinang Kota | Kecamatan Tanjungpinang Kota
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
    .news-hero-content {
      padding-top: 4rem;
    }

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
      font-family: "Poppins", system-ui, -apple-system, sans-serif;
      /* Menggunakan Poppins seperti pada desain baru */
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
    
    @font-face {
      font-family: 'Poppins';
      src: url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;800&display=swap');
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
      /* transform: translateY(-3px); */
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
    @media (max-width: 1024px) {}

    @media (max-width: 768px) {
      .news-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 640px) {
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

    /* Modern Professional Timeline Styles */
    .timeline-modern {
      position: relative;
      max-width: 1000px;
      margin: 0 auto;
    }

    .timeline-modern::before {
      content: '';
      position: absolute;
      left: 50%;
      top: 0;
      bottom: 0;
      width: 3px;
      background: linear-gradient(180deg, #ef4444 0%, #dc2626 50%, #b91c1c 100%);
      transform: translateX(-50%);
      border-radius: 2px;
      box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
    }

    .timeline-modern-item {
      position: relative;
      margin-bottom: 60px;
      opacity: 0;
      animation: fadeInUp 0.8s ease forwards;
    }

    .timeline-modern-item:nth-child(1) {
      animation-delay: 0.1s;
    }

    .timeline-modern-item:nth-child(2) {
      animation-delay: 0.2s;
    }

    .timeline-modern-item:nth-child(3) {
      animation-delay: 0.3s;
    }

    .timeline-modern-item:nth-child(4) {
      animation-delay: 0.4s;
    }

    .timeline-modern-item:nth-child(5) {
      animation-delay: 0.5s;
    }

    .timeline-modern-item:nth-child(6) {
      animation-delay: 0.6s;
    }

    .timeline-modern-item:last-child {
      margin-bottom: 0;
    }

    .timeline-modern-content {
      position: relative;
      width: 45%;
      background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
      padding: 32px;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
      border: 1px solid rgba(239, 68, 68, 0.1);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      backdrop-filter: blur(10px);
    }

    .timeline-modern-content::before {
      content: '';
      position: absolute;
      top: 50%;
      width: 0;
      height: 0;
      border: 15px solid transparent;
      transform: translateY(-50%);
    }

    .timeline-modern-item:nth-child(odd) .timeline-modern-content {
      margin-left: 0;
      margin-right: auto;
    }

    .timeline-modern-item:nth-child(odd) .timeline-modern-content::before {
      right: -30px;
      border-left-color: #ffffff;
    }

    .timeline-modern-item:nth-child(even) .timeline-modern-content {
      margin-left: auto;
      margin-right: 0;
    }

    .timeline-modern-item:nth-child(even) .timeline-modern-content::before {
      left: -30px;
      border-right-color: #ffffff;
    }

    .timeline-modern-content:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 60px rgba(239, 68, 68, 0.15);
      border-color: rgba(239, 68, 68, 0.3);
    }

    .timeline-modern-dot {
      position: absolute;
      left: 50%;
      top: 50%;
      width: 20px;
      height: 20px;
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
      border: 4px solid #ffffff;
      border-radius: 50%;
      transform: translate(-50%, -50%);
      z-index: 10;
      box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2), 0 0 20px rgba(239, 68, 68, 0.4);
      transition: all 0.3s ease;
    }

    .timeline-modern-item:hover .timeline-modern-dot {
      transform: translate(-50%, -50%) scale(1.3);
      box-shadow: 0 0 0 8px rgba(239, 68, 68, 0.3), 0 0 30px rgba(239, 68, 68, 0.6);
    }

    .timeline-modern-icon {
      position: absolute;
      left: 50%;
      top: 50%;
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
      border: 4px solid #ffffff;
      border-radius: 50%;
      transform: translate(-50%, -50%);
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 16px;
      box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2), 0 8px 32px rgba(239, 68, 68, 0.3);
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .timeline-modern-item:hover .timeline-modern-icon {
      transform: translate(-50%, -50%) scale(1.2) rotate(360deg);
      box-shadow: 0 0 0 8px rgba(239, 68, 68, 0.3), 0 12px 48px rgba(239, 68, 68, 0.4);
    }

    .timeline-modern-date {
      display: inline-block;
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
      color: white;
      padding: 8px 16px;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 16px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    .timeline-modern-title {
      font-size: 1.4rem;
      font-weight: 700;
      color: #1f2937;
      margin-bottom: 12px;
      background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .timeline-modern-description {
      font-size: 1rem;
      color: #6b7280;
      line-height: 1.7;
      margin-bottom: 20px;
    }

    .timeline-modern-link {
      display: inline-flex;
      align-items: center;
      color: #ef4444;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
      padding: 8px 0;
      cursor: pointer;
    }

    .timeline-modern-link:hover {
      color: #dc2626;
      transform: translateX(5px);
    }

    .timeline-modern-link i {
      margin-left: 8px;
      transition: transform 0.3s ease;
    }

    .timeline-modern-link:hover i {
      transform: translateX(3px);
    }

    @keyframes pulse {

      0%,
      100% {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.2);
      }

      50% {
        box-shadow: 0 0 0 8px rgba(239, 68, 68, 0.1);
      }
    }

    .timeline-modern-dot {
      animation: pulse 2s infinite;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .timeline-modern::before {
        left: 30px;
      }

      .timeline-modern-content {
        width: calc(100% - 80px);
        margin-left: 80px !important;
        margin-right: 0 !important;
      }

      .timeline-modern-content::before {
        left: -30px !important;
        right: auto !important;
        border-right-color: #ffffff !important;
        border-left-color: transparent !important;
      }

      .timeline-modern-icon {
        left: 30px;
      }
    }
    
    /* ========== NEW BANNER STYLES START ========== */
     * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .carousel-container {
      perspective: 1000px;
      transform-style: preserve-3d;
    }

    .slide-wrapper {
      position: absolute;
      width: 100%;
      height: 100%;
      transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      transform-style: preserve-3d;
    }

    .slide-active {
      transform: translateX(0) rotateY(0deg) scale(1);
      opacity: 1;
      z-index: 10;
    }

    .slide-next {
      transform: translateX(100%) rotateY(-45deg) scale(0.8);
      opacity: 0.7;
      z-index: 5;
    }

    .slide-prev {
      transform: translateX(-100%) rotateY(45deg) scale(0.8);
      opacity: 0.7;
      z-index: 5;
    }

    .slide-hidden {
      transform: translateX(200%) rotateY(-90deg) scale(0.6);
      opacity: 0;
      z-index: 1;
    }

    .slide-content {
      position: relative;
      width: 100%;
      height: 100%;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
    }

    .slide-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      filter: brightness(0.7);
      transition: all 0.5s ease;
    }

    .slide-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg,
          rgba(0, 0, 0, 0.4) 0%,
          rgba(0, 0, 0, 0.1) 100%);
      backdrop-filter: blur(1px);
    }

    .slide-1 .slide-bg {
      /* background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); */
      background-image: url(https://images.unsplash.com/photo-1622428051717-d574287041a3?q=80&w=1932&auto=format&fit=crop) !important;
    }

    .slide-2 .slide-bg {
      /* background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); */
      background-image: url(https://images.unsplash.com/photo-1559827260-dc66d52bef19?q=80&w=1887&auto=format&fit=crop);
    }

    .slide-3 .slide-bg {
      /* background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); */
      background-image: url(https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=1769&auto=format&fit=crop);
    }

    .slide-4 .slide-bg {
      /* background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); */
      background-image: url(https://images.unsplash.com/photo-1583344654579-24b89569ce4e?q=80&w=1887&auto=format&fit=crop);
    }

    .slide-5 .slide-bg {
      /* background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); */
      background-image: url(https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1770&auto=format&fit=crop);
    }

    .slide-text {
      position: relative;
      z-index: 10;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 2rem;
      color: white;
    }

    .slide-title {
      font-size: clamp(2.5rem, 6vw, 6rem);
      font-weight: 800;
      margin-bottom: 1rem;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
      transform: translateY(50px);
      opacity: 0;
      transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
      background: linear-gradient(45deg, #ffffff, #f0f0f0);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .slide-subtitle {
      font-size: clamp(1.5rem, 4vw, 3rem);
      font-weight: 500;
      margin-bottom: 2rem;
      transform: translateY(50px);
      opacity: 0;
      transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.2s;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .slide-description {
      font-size: clamp(1rem, 2vw, 1.5rem);
      font-weight: 300;
      max-width: 600px;
      line-height: 1.6;
      transform: translateY(50px);
      opacity: 0;
      transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.4s;
      text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
    }
    
    .album-link-btn {
      transform: translateY(50px);
      opacity: 0;
      transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.6s;
    }

    .slide-active .slide-title,
    .slide-active .slide-subtitle,
    .slide-active .slide-description,
    .slide-active .album-link-btn {
      transform: translateY(0);
      opacity: 1;
    }

    .nav-button {
      position: absolute;
      top: auto;
      bottom: 2.5rem;
      transform: none;
      z-index: 20;
      width: 52px;  /* Ukuran diperkecil */
      height: 52px; /* Ukuran diperkecil */
      border-radius: 12px; /* Mengubah dari lingkaran menjadi kotak membulat */
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px); /* Blur lebih halus */
      border: 1px solid rgba(255, 255, 255, 0.15); /* Border lebih tipis */
      color: white;
      font-size: 20px; /* Ukuran ikon disesuaikan */
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .nav-button:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.3);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2); /* Efek bayangan lebih modern */
    }

    /* Efek transisi untuk ikon di dalam tombol */
    .nav-button i {
        transition: transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .nav-button.nav-prev:hover i {
        transform: translateX(-3px); /* Ikon bergerak saat hover */
    }

    .nav-button.nav-next:hover i {
        transform: translateX(3px); /* Ikon bergerak saat hover */
    }

    .nav-prev {
      left: calc(50% - 268px); 
    }

    .nav-next {
      right: calc(50% - 268px); 
    }

    .indicators {
      position: absolute;
      bottom: 3rem;
      left: 50%;
      transform: translateX(-50%);
      z-index: 20;
      display: flex;
      gap: 1rem;
    }

    .indicator {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
    }

    .indicator.active {
      background: white;
      transform: scale(1.3);
      box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    }

    .indicator::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg,
          transparent, rgba(255, 255, 255, 0.8), transparent);
      transition: left 0.5s ease;
    }

    .indicator:hover::before {
      left: 100%;
    }

    .progress-container {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: rgba(255, 255, 255, 0.2);
      z-index: 20;
      display: none; 
    }

    .progress-bar {
      height: 100%;
      background: linear-gradient(90deg,
          #667eea, #764ba2);
      width: 0%;
      transition: width 0.05s linear; 
      box-shadow: 0 0 10px rgba(102, 126, 234, 0.5);
    }

    .slide-counter {
      position: absolute;
      top: 2rem;
      right: 2rem;
      z-index: 20;
      background: rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      padding: 0.5rem 1rem;
      border-radius: 25px;
      color: white;
      font-weight: 500;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .slide-category {
      position: absolute;
      top: 2rem;
      left: 2rem;
      z-index: 20;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      padding: 0.5rem 1.5rem;
      border-radius: 25px;
      color: white;
      font-weight: 500;
      font-size: 0.9rem;
      border: 1px solid rgba(255, 255, 255, 0.3);
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .thumbnail-nav {
      position: absolute;
      bottom: 3rem; 
      left: 50%;
      transform: translateX(-50%);
      z-index: 20;
      display: flex;
      gap: 1rem;
    }

    .thumbnail {
      width: 60px;
      height: 40px;
      border-radius: 8px;
      overflow: hidden;
      cursor: pointer;
      transition: all 0.3s ease;
      border: 2px solid transparent;
    }

    .thumbnail.active {
      border-color: white;
      transform: scale(1.1);
    }

    .thumbnail-bg {
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      transition: all 0.3s ease;
    }

    .thumbnail:hover .thumbnail-bg {
      transform: scale(1.1);
    }

    .auto-play-toggle {
      position: absolute;
      bottom: 2rem;
      right: 2rem;
      z-index: 20;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .auto-play-toggle:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: scale(1.1);
    }

    @media (max-width: 768px) {
      .nav-button {
        width: 50px;
        height: 50px;
        font-size: 18px;
        bottom: 2.75rem; 
      }

      .nav-prev {
        left: calc(50% - 248px); 
      }

      .nav-next {
        right: calc(50% - 248px); 
      }

      .slide-category,
      .slide-counter {
        top: 1rem;
      }

      .slide-category {
        left: 1rem;
      }

      .slide-counter {
        right: 1rem;
      }
    }
    
    /* --- PERBAIKAN: Album Modal Styles --- */
    #album-modal {
        top: 0;
        padding-top: 90px; 
        height: 100vh;
        background: rgba(30, 0, 10, 0.8);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-radius: 0;
    }

    #album-modal > div {
        background: rgba(128, 0, 32, 0.3); 
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        border-radius: 1.5rem; 
        overflow: hidden; 
        margin: 2rem auto; 
        max-width: 95%; 
        max-height: calc(100vh - 120px); 
        width: 100%;
        padding: 1.5rem; 
    }
    
    #album-modal .modal-header {
        border-top-left-radius: 1.5rem;
        border-top-right-radius: 1.5rem;
        overflow: hidden;
    }
    
    /* Konten grid di dalam modal */
    #album-modal-grid {
        border-bottom-left-radius: 1rem;
        border-bottom-right-radius: 1rem;
        padding: 1rem 0.5rem; 
        max-height: calc(100vh - 200px); 
        overflow-y: auto; 
    }
    
    @media (min-width: 640px) {
        #album-modal > div {
            max-width: 90%;
            margin: 2rem auto;
        }
    }
    
    @media (min-width: 1024px) {
        #album-modal > div {
            max-width: 85%;
            padding: 2rem;
        }
    }

    #album-modal-grid::-webkit-scrollbar {
        width: 10px;
    }
    #album-modal-grid::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 5px;
    }
    #album-modal-grid::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
        border: 2px solid transparent;
        background-clip: content-box;
    }
    #album-modal-grid::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.4);
    }
    
    #album-modal .gallery-card {
        display: block; 
        opacity: 0;
        animation: fadeIn 0.5s ease-out forwards;
        transform: none; 
    }

    /* Perbaikan hover effect untuk kartu di dalam modal */
    #album-modal .gallery-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
    }

    /* Perbaikan untuk elemen di dalam kartu agar tetap terlihat */
    #album-modal .gallery-card .group-hover\:-translate-y-2 {
        transform: none;
    }
    #album-modal .gallery-card .group-hover\:translate-y-0 {
        transform: translateY(0);
    }
    #album-modal .gallery-card .group-hover\:opacity-100 {
        opacity: 1;
    }
    #album-modal .gallery-card .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    /* ========== NEW ADVANCED GALLERY VIEWER MODAL STYLES ========== */
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

    /* ========== START: KODE CSS BARU UNTUK TOMBOL "MUAT LEBIH BANYAK" ========== */
    
    /* Skeleton Card */
    .gallery-card-skeleton {
      background-color: #e5e7eb; /* gray-200 */
      border-radius: 1rem; /* rounded-2xl */
      aspect-ratio: 1 / 1;
    }

    /* Button Loading State */
    #load-more-button.loading #load-more-progress {
        transform: translateX(0%);
        transition: transform 1.5s ease-in-out;
    }

    #load-more-button.loading #load-more-content-wrapper {
        color: white;
    }

    #load-more-button.loading:hover #load-more-content-wrapper {
        color: white; /* Pastikan teks tetap putih saat loading di-hover */
    }

    /* New Card Animation */
    @keyframes grow-in {
      from {
        opacity: 0;
        transform: scale(0.95) translateY(10px);
      }
      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    .gallery-card.newly-added {
      animation: grow-in 0.5s ease-out forwards;
      opacity: 0; /* Mulai dari transparan sebelum animasi */
    }

    /* Card removal animation */
    @keyframes shrink-out {
      from {
        opacity: 1;
        transform: scale(1);
      }
      to {
        opacity: 0;
        transform: scale(0.95);
      }
    }

    .gallery-card.is-removing {
        animation: shrink-out 0.4s ease-out forwards;
    }

    /* ========== END: KODE CSS BARU ========== */

  </style>
</head>

<body class="bg-gray-900">
  <div id="lightbox-modal" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/90 opacity-0 pointer-events-none transition-opacity duration-300">
    <button id="close-lightbox" class="absolute top-6 right-6 text-white text-3xl z-50 hover:text-gray-300 transition-colors">
      <i class="fas fa-times"></i>
    </button>
    <div class="relative w-full max-w-6xl max-h-[90vh] p-4">
      <img id="lightbox-image" src="" alt="" class="w-full h-full object-contain max-h-[80vh] mx-auto">
      <div id="lightbox-caption" class="text-white text-center mt-4 text-lg"></div>
    </div>
  </div>

  <header class="modern-header relative custom-header-blur">
    <div class="container mx-auto px-4 py-2 md:py-3 relative z-10">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3 md:space-x-4">
          <div>
            <img src="https://tpikotakel.tanjungpinangkota.go.id/img/logo-tpi.182f9638.png"
              alt="Logo Kelurahan"
              class="h-11 w-11 md:h-12 md:w-12 object-contain">
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
            class="glass-card px-6 py-2 rounded-full text-sm hover:bg-white/20 transition-all duration-300 hover:scale-105 flex items-center">
            <i class="fas fa-sign-in-alt mr-2 text-white"></i>
            <span class="text-white font-medium">Login</span>
          </a>
        </div>

        <button
          id="mobile-menu-btn"
          class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition-colors">
          <i class="fas fa-bars text-xl"></i>
        </button>

        <div id="mobile-menu" class="md:hidden bg-white shadow-xl hidden">
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

  <main>
    <div class="carousel-container relative w-full h-screen overflow-hidden">
        <div class="slide-counter" style="top: 100px;">
            <span id="currentSlideNum">01</span> / <span id="totalSlides">05</span>
        </div>
        
        <div class="slide-wrapper slide-active" data-slide="0">
            <div class="slide-content">
                <img src="https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954074_bcd67607ce3600415d76.jpg" 
                     class="slide-bg slide-1 w-full h-full object-cover"
                     style="object-position: center 30%;"
                     alt="Galeri Banner">
                <div class="slide-overlay"></div>
                <div class="slide-text">
                    <h1 class="slide-title">Penyaluran Bantuan Sembako</h1>
                    <h2 class="slide-subtitle">Kelurahan Tanjungpinang Kota</h2>
                    <p class="slide-description">Jelajahi keindahan dan dinamika kehidupan masyarakat melalui dokumentasi visual yang menginspirasi.</p>
                    <a href="#" class="album-link-btn mt-8 inline-block px-8 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-white font-semibold transition-all duration-300 hover:bg-white/30 hover:scale-105" data-album-id="all">
                        Jelajahi Album <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="slide-wrapper slide-next" data-slide="1">
            <div class="slide-content">
              <img src="https://blog.pengajartekno.co.id/wp-content/uploads/2023/08/Gambar-Posyandu-1-1024x683.jpg" 
              class="slide-bg slide-2 w-full h-full object-cover"
              alt="Galeri Banner">
                <div class="slide-overlay"></div>
                <div class="slide-text">
                    <h1 class="slide-title">Posyandu Bulanan</h1>
                    <h2 class="slide-subtitle">Kelurahan Tanjungpinang Kota</h2>
                    <p class="slide-description">Koleksi foto dan video yang mengabadikan perjalanan pembangunan dan pencapaian masyarakat.</p>
                    <a href="#" class="album-link-btn mt-8 inline-block px-8 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-white font-semibold transition-all duration-300 hover:bg-white/30 hover:scale-105" data-album-id="sosial">
                        Jelajahi Album <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="slide-wrapper slide-hidden" data-slide="2">
            <div class="slide-content">
              <img src="https://pbs.twimg.com/media/CfbyyRmUMAAwksS.jpg" 
              class="slide-bg slide-3 w-full h-full object-cover"
              alt="Galeri Banner">
                <div class="slide-overlay"></div>
                <div class="slide-text">
                    <h1 class="slide-title">Rapat Warga</h1>
                    <h2 class="slide-subtitle">Kelurahan Tanjungpinang Kota</h2>
                    <p class="slide-description">Program pemberdayaan, acara budaya, dan kegiatan sosial yang memperkuat ikatan masyarakat.</p>
                    <a href="#" class="album-link-btn mt-8 inline-block px-8 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-white font-semibold transition-all duration-300 hover:bg-white/30 hover:scale-105" data-album-id="kesehatan">
                        Jelajahi Album <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="slide-wrapper slide-hidden" data-slide="3">
            <div class="slide-content">
              <img src="https://pekalongankota.go.id/upload/berita/berita_20220704033246.jpeg" 
              class="slide-bg slide-4 w-full h-full object-cover"
              alt="Galeri Banner">
                <div class="slide-overlay"></div>
                <div class="slide-text">
                    <h1 class="slide-title">Perbaikan Drainase</h1>
                    <h2 class="slide-subtitle">Kelurahan Tanjungpinang Kota</h2>
                    <p class="slide-description">Fasilitas publik dan infrastruktur yang mendukung kenyamanan dan kemajuan masyarakat.</p>
                    <a href="#" class="album-link-btn mt-8 inline-block px-8 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-white font-semibold transition-all duration-300 hover:bg-white/30 hover:scale-105" data-album-id="infrastruktur">
                        Jelajahi Album <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="slide-wrapper slide-hidden" data-slide="4">
            <div class="slide-content">
              <img src="https://www.kemenkopmk.go.id/sites/default/files/articles/2022-07/IMG-20220703-WA0052.jpg" 
              class="slide-bg slide-5 w-full h-full object-cover"
              alt="Galeri Banner">
                <div class="slide-overlay"></div>
                <div class="slide-text">
                    <h1 class="slide-title">Penanaman Pohon</h1>
                    <h2 class="slide-subtitle">Kelurahan Tanjungpinang Kota</h2>
                    <p class="slide-description">Penghargaan dan prestasi yang membanggakan sebagai bukti dedikasi dalam pelayanan masyarakat.</p>
                    <a href="#" class="album-link-btn mt-8 inline-block px-8 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-white font-semibold transition-all duration-300 hover:bg-white/30 hover:scale-105" data-album-id="pendidikan">
                        Jelajahi Album <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <button class="nav-button nav-prev" id="prevBtn" aria-label="Slide Sebelumnya">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="nav-button nav-next" id="nextBtn" aria-label="Slide Berikutnya">
            <i class="fas fa-chevron-right"></i>
        </button>
        
        <div class="thumbnail-nav">
            <div class="thumbnail active" data-slide="0">
                <img src="https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954074_bcd67607ce3600415d76.jpg"
                     class="thumbnail-bg slide-1 w-full h-full object-cover"
                     alt="Thumbnail">
            </div>
            <div class="thumbnail" data-slide="1">
                <img src="https://blog.pengajartekno.co.id/wp-content/uploads/2023/08/Gambar-Posyandu-1-1024x683.jpg"
                     class="thumbnail-bg slide-2 w-full h-full object-cover"
                     alt="Thumbnail">
            </div>
            <div class="thumbnail" data-slide="2">
                <img src="https://pbs.twimg.com/media/CfbyyRmUMAAwksS.jpg"
                     class="thumbnail-bg slide-3 w-full h-full object-cover"
                     alt="Thumbnail">
            </div>
            <div class="thumbnail" data-slide="3">
                <img src="https://pekalongankota.go.id/upload/berita/berita_20220704033246.jpeg"
                     class="thumbnail-bg slide-4 w-full h-full object-cover"
                     alt="Thumbnail">
            </div>
            <div class="thumbnail" data-slide="4">
                <img src="https://www.kemenkopmk.go.id/sites/default/files/articles/2022-07/IMG-20220703-WA0052.jpg"
                     class="thumbnail-bg slide-5 w-full h-full object-cover"
                     alt="Thumbnail">
            </div>
        </div>
        
        <div class="progress-container">
            <div class="progress-bar" id="progressBar"></div>
        </div>
    </div>
    
    <section id="gallery-grid" class="py-16 relative overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100">
      <div class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-r from-primary-600/10 to-red-600/10 rounded-full blur-3xl animate-float"></div>
      <div class="absolute -bottom-40 -right-40 w-80 h-80 bg-gradient-to-r from-blue-600/10 to-purple-600/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>

      <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            <span class="relative inline-block">
              <span class="relative z-10">Galeri <span class="text-primary-600">Interaktif</span></span>
              <span class="absolute bottom-0 left-0 w-full h-3 bg-primary-100/70 -rotate-1 -z-0"></span>
            </span>
          </h2>
          <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Jelajahi koleksi dokumentasi kami dengan pengalaman yang lebih imersif
          </p>
        </div>

        <div class="mb-12 max-w-3xl ml-auto">
          <div class="flex flex-col sm:flex-row gap-4 items-center justify-end">
            <div class="relative w-full md:w-64">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                <i class="fas fa-search"></i>
              </div>
              <input type="text" id="gallery-search-input" class="block w-full pl-10 pr-3 py-3 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent" placeholder="Cari galeri...">
            </div>
            <div class="relative w-full md:w-48">
              <select id="gallery-year-select" class="appearance-none w-full px-3 py-3 pr-8 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent text-sm">
                <option value="">Semua Tahun</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
              </select>
              <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <i class="fas fa-chevron-down text-gray-400"></i>
              </div>
            </div>
            <button id="gallery-filter-button" class="w-full md:w-auto px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white font-medium rounded-lg hover:from-red-700 hover:to-red-800 flex items-center justify-center">
              <i class="fas fa-filter mr-2"></i> Terapkan
            </button>
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 gallery-grid" id="gallery-container">
          <div class="gallery-card group" data-category="infrastruktur" data-year="2024" data-title="Pembangunan Jalan RW 08" data-album-id="pembangunan-jalan" data-description="Progres pembangunan jalan lingkungan sepanjang 500m di wilayah RW 08" data-date="2024-07-15">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://podosari.kendalkab.go.id//upload/berita/206_1727147938.jpeg" alt="Pembangunan Jalan RW 08" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Pembangunan Jalan RW 08</h3>
                <p class="text-gray-300 text-sm">15 Jul 2024 • 5 Foto</p>
              </div>
            </div>
          </div>

          <div class="gallery-card group" data-category="sosial" data-year="2024" data-title="Penyaluran Bantuan Sembako" data-album-id="bantuan-sosial" data-description="Distribusi bantuan untuk 150 keluarga kurang mampu di wilayah RW 05" data-date="2024-06-20">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954074_bcd67607ce3600415d76.jpg" alt="Penyaluran Bantuan Sembako" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Penyaluran Bantuan Sembako</h3>
                <p class="text-gray-300 text-sm">12 Jul 2024 • 4 Foto</p>
              </div>
            </div>
          </div>

          <div class="gallery-card group" data-category="kesehatan" data-year="2024" data-title="Fasilitas Umum" data-album-id="fasilitas-umum" data-description="Pelaksanaan Fasilitas Umum untuk warga lansia" data-date="2024-07-10">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1698521090_0054522ba27f383276fa.jpg" alt="Fasilitas Umum" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Fasilitas Umum</h3>
                <p class="text-gray-300 text-sm">10 Jul 2024 • 6 Foto</p>
              </div>
            </div>
          </div>

          <div class="gallery-card group" data-category="pendidikan" data-year="2024" data-title="Pelatihan Kader Posyandu" data-album-id="pelatihan-kader" data-description="Pelatihan untuk meningkatkan kualitas pelayanan kesehatan di posyandu" data-date="2024-07-08">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://dulohupa.id/wp-content/uploads/2021/11/dulohupa-21.jpeg" alt="Pelatihan Kader Posyandu" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Pelatihan Kader Posyandu</h3>
                <p class="text-gray-300 text-sm">8 Jul 2024 • 5 Foto</p>
              </div>
            </div>
          </div>

          <div class="gallery-card group" data-category="lingkungan" data-year="2024" data-title="Penanaman Pohon" data-album-id="penanaman-pohon" data-description="Program penghijauan lingkungan kelurahan" data-date="2024-07-05">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://www.kemenkopmk.go.id/sites/default/files/articles/2022-07/IMG-20220703-WA0052.jpg" alt="Penanaman Pohon" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Penanaman Pohon</h3>
                <p class="text-gray-300 text-sm">5 Jul 2024 • 4 Foto</p>
              </div>
            </div>
          </div>

          <div class="gallery-card group" data-category="infrastruktur" data-year="2024" data-title="Perbaikan Drainase" data-album-id="perbaikan-drainase" data-description="Perbaikan sistem drainase untuk mencegah banjir" data-date="2024-06-25">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://pekalongankota.go.id/upload/berita/berita_20220704033246.jpeg" alt="Perbaikan Drainase" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Perbaikan Drainase</h3>
                <p class="text-gray-300 text-sm">3 Jul 2024 • 5 Foto</p>
              </div>
            </div>
          </div>

          <div class="gallery-card group" data-category="sosial" data-year="2024" data-title="Rapat Warga" data-album-id="rapat-warga" data-description="Rapat koordinasi warga membahas program kelurahan" data-date="2024-07-01">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://pbs.twimg.com/media/CfbyyRmUMAAwksS.jpg" alt="Rapat Warga" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Rapat Warga</h3>
                <p class="text-gray-300 text-sm">1 Jul 2024 • 3 Foto</p>
              </div>
            </div>
          </div>

          <div class="gallery-card group" data-category="kesehatan" data-year="2024" data-title="Posyandu Bulanan" data-album-id="posyandu" data-description="Pelayanan kesehatan ibu dan anak di Posyandu Melati" data-date="2024-06-28">
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
              <img src="https://blog.pengajartekno.co.id/wp-content/uploads/2023/08/Gambar-Posyandu-1-1024x683.jpg" alt="Posyandu Bulanan" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
              <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                <h3 class="font-bold text-white text-lg mb-1">Posyandu Bulanan</h3>
                <p class="text-gray-300 text-sm">28 Jun 2024 • 6 Foto</p>
              </div>
            </div>
          </div>

        </div>

        <div class="text-center mt-12" id="load-more-container">
            <button id="load-more-button" class="inline-flex items-center justify-center px-8 py-3 bg-white border-2 border-red-600 text-red-600 font-bold rounded-xl hover:bg-red-600 hover:text-white transition-all duration-300 shadow-md hover:shadow-lg w-auto min-w-[256px] h-14 relative overflow-hidden">
                <div id="load-more-progress" class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-700 transform -translate-x-full" style="transition: transform 1.5s ease-in-out;"></div>
                <div id="load-more-content-wrapper" class="relative z-10 transition-colors duration-300">
                    <span id="load-more-content" class="flex items-center transition-opacity duration-300">
                        <i class="fas fa-plus-circle mr-2"></i> Muat Lebih Banyak
                    </span>
                </div>
            </button>
        </div>

      </div>
    </section>

    <div id="videoModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/80 p-4">
      <div class="relative w-full max-w-4xl mx-auto">
        <button id="closeModal" class="absolute -right-3 -top-12 text-white hover:text-gray-300 hover:scale-110 transition-all z-50 text-3xl">
          <i class="fas fa-times"></i>
          <span class="sr-only">Tutup Video</span>
        </button>
        <div class="bg-black rounded-xl overflow-hidden shadow-2xl">
        <div class="aspect-video w-full">
          <iframe id="youtubePlayer" class="w-full h-full" 
                  frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen>
          </iframe>
        </div>
      </div>
      </div>
    </div>

    <script>
    let currentVideoId = '';
    const videoModal = document.getElementById('videoModal');
    const youtubePlayer = document.getElementById('youtubePlayer');
    const closeModalBtn = document.getElementById('closeModal');

    function playVideo(element, videoId, title) {
      currentVideoId = videoId;
      youtubePlayer.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0&controls=1&showinfo=0`;
      videoModal.classList.remove('hidden');
      videoModal.classList.add('flex');
      document.body.style.overflow = 'hidden';
    }
    
    function closeVideoModal() {
      youtubePlayer.src = ''; 
      videoModal.classList.add('hidden');
      videoModal.classList.remove('flex');
      document.body.style.overflow = 'auto';
    }
    
    closeModalBtn.addEventListener('click', closeVideoModal);
    
    videoModal.addEventListener('click', function(e) {
      if (e.target === videoModal) {
        closeVideoModal();
      }
    });
    
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeVideoModal();
      }
    });
    </script>

    <section id="video-wall" class="py-16 bg-gradient-to-b from-gray-50 to-white">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            <span class="relative inline-block">
              <span class="relative z-10">Video <span class="text-primary-600">Dokumentasi</span></span>
              <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Jelajahi kegiatan kelurahan melalui pengalaman video imersif
              </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="video-container">
          <div class="video-item group relative overflow-hidden rounded-2xl shadow-xl aspect-video cursor-pointer"
               data-video-id="Zd2t_y2ektE"
               onclick="playVideo(this, 'Zd2t_y2ektE', 'Keliling Kota Tanjungpinang')">
            <div class="absolute inset-0 bg-gradient-to-b from-black/20 to-black/50 z-10"></div>
            <img src="https://i.ytimg.com/vi/Zd2t_y2ektE/hqdefault.jpg" 
                 alt="Keliling Kota Tanjungpinang"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center z-20">
              <div class="w-16 h-16 bg-primary-600/80 hover:bg-primary-600 rounded-full flex items-center justify-center text-white transform group-hover:scale-110 transition-all">
                <i class="fas fa-play text-xl"></i>
              </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6 z-20">
              <h3 class="text-xl font-bold text-white">Keliling Kota Tanjungpinang</h3>
              <div class="text-sm text-gray-300 mt-2">
                <i class="far fa-clock mr-1"></i>
                <span class="video-duration">3:08 Menit</span>
              </div>
            </div>
          </div>
        
          <div class="video-item group relative overflow-hidden rounded-2xl shadow-xl aspect-video cursor-pointer"
               data-video-id="E0vop5wjE-k"
               onclick="playVideo(this, 'E0vop5wjE-k', 'Explore ke Pulau Penyengat')">
            <div class="absolute inset-0 bg-gradient-to-b from-black/20 to-black/50 z-10"></div>
            <img src="https://picture.triptrus.com/image/2019/02/lr-dsc9207-06293.jpg" 
                 alt="Budaya Melayu Tanjungpinang"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center z-20">
              <div class="w-16 h-16 bg-primary-600/80 hover:bg-primary-600 rounded-full flex items-center justify-center text-white transform group-hover:scale-110 transition-all">
                <i class="fas fa-play text-xl"></i>
              </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6 z-20">
              <h3 class="text-xl font-bold text-white">Explore ke Pulau Penyengat</h3>
              <div class="text-sm text-gray-300 mt-2">
                <i class="far fa-clock mr-1"></i>
                <span class="video-duration">4:35 Menit</span>
              </div>
            </div>
          </div>
        
          <div class="video-item group relative overflow-hidden rounded-2xl shadow-xl aspect-video cursor-pointer"
               data-video-id="8Ib-tL1hI0Q"
               onclick="playVideo(this, '8Ib-tL1hI0Q', 'Kuliner Khas Tanjungpinang')">
            <div class="absolute inset-0 bg-gradient-to-b from-black/20 to-black/50 z-10"></div>
            <img src="https://i.ytimg.com/vi/8Ib-tL1hI0Q/hqdefault.jpg" 
                 alt="Kuliner Khas Tanjungpinang"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 flex items-center justify-center z-20">
              <div class="w-16 h-16 bg-primary-600/80 hover:bg-primary-600 rounded-full flex items-center justify-center text-white transform group-hover:scale-110 transition-all">
                <i class="fas fa-play text-xl"></i>
              </div>
            </div>
            <div class="absolute bottom-0 left-0 right-0 p-6 z-20">
              <h3 class="text-xl font-bold text-white">15 Makanan Khas Tanjungpinang</h3>
              <div class="text-sm text-gray-300 mt-2">
                <i class="far fa-clock mr-1"></i>
                <span class="video-duration">5:42 Menit</span>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-12">
          <a href="#" class="inline-flex items-center px-8 py-3 bg-white border-2 border-red-600 text-red-600 font-bold rounded-xl hover:bg-red-600 hover:text-white transition-all duration-300 shadow-md hover:shadow-lg group">
            <i class="fas fa-play-circle mr-2"></i>
            Kunjungi Channel Video Kami
            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
          </a>
        </div>
      </div>
    </section>

    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            <span class="relative inline-block">
              <span class="relative z-10">Linimasa <span class="text-primary-600">Kegiatan</span></span>
              <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Jejak dokumentasi kegiatan Kelurahan Tanjungpinang Kota sepanjanm 2024
              </p>
        </div>

        <div class="timeline-modern">
          <div class="timeline-modern-item">
            <div class="timeline-modern-icon">
              <i class="fas fa-road"></i>
            </div>
            <div class="timeline-modern-content">
              <div class="timeline-modern-date">15 Juli 2024</div>
              <h3 class="timeline-modern-title">Pembangunan Jalan RW 08</h3>
              <p class="timeline-modern-description">Progres pembangunan jalan lingkungan sepanjanm 500m di wilayah RW 08 untuk meningkatkan aksesibilitas warga dan mendukung mobilitas sehari-hari.</p>
              <a class="timeline-modern-link" data-album-id="pembangunan-jalan">
                Lihat Dokumentasi
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="timeline-modern-item">
            <div class="timeline-modern-icon">
              <i class="fas fa-leaf"></i>
            </div>
            <div class="timeline-modern-content">
              <div class="timeline-modern-date">12 Juli 2024</div>
              <h3 class="timeline-modern-title">Kerja Bakti Lingkungan</h3>
              <p class="timeline-modern-description">Kegiatan gotong royong membersihkan lingkungan sekitar dan saluran air untuk mencegah banjir serta menjaga kebersihan lingkungan.</p>
              <a class="timeline-modern-link" data-album-id="kerja-bakti-lingkungan">
                Lihat Dokumentasi
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="timeline-modern-item">
            <div class="timeline-modern-icon">
              <i class="fas fa-hands-helping"></i>
            </div>
            <div class="timeline-modern-content">
              <div class="timeline-modern-date">10 Juli 2024</div>
              <h3 class="timeline-modern-title">Penyaluran Bantuan Sosial</h3>
              <p class="timeline-modern-description">Distribusi bantuan sosial kepada keluarga kurang mampu di wilayah kelurahan sebagai bentuk kepedulian sosial dan solidaritas masyarakat.</p>
              <a class="timeline-modern-link" data-album-id="bantuan-sosial">
                Lihat Dokumentasi
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="timeline-modern-item">
            <div class="timeline-modern-icon">
              <i class="fas fa-laptop-code"></i>
            </div>
            <div class="timeline-modern-content">
              <div class="timeline-modern-date">05 Juli 2024</div>
              <h3 class="timeline-modern-title">Pelatihan UMKM Digital</h3>
              <p class="timeline-modern-description">Memberikan pelatihan pemasaran digital kepada para pelaku UMKM untuk meningkatkan daya saing produk lokal di era digital.</p>
              <a class="timeline-modern-link" data-album-id="pelatihan-umkm">
                Lihat Dokumentasi
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="timeline-modern-item">
            <div class="timeline-modern-icon">
              <i class="fas fa-user-md"></i>
            </div>
            <div class="timeline-modern-content">
              <div class="timeline-modern-date">01 Juli 2024</div>
              <h3 class="timeline-modern-title">Fasilitas Umum</h3>
              <p class="timeline-modern-description">Tanjungpinang, sebagai ibu kota Provinsi Kepulauan Riau, memiliki berbagai fasilitas umum yang mendukung aktivitas masyarakat, mulai dari transportasi, pendidikan, kesehatan, hingga tempat rekreasi.</p>
              <a class="timeline-modern-link" data-album-id="fasilitas-umum">
                Lihat Dokumentasi
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <div class="timeline-modern-item">
            <div class="timeline-modern-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="timeline-modern-content">
              <div class="timeline-modern-date">28 Juni 2024</div>
              <h3 class="timeline-modern-title">Rapat Koordinasi Warga</h3>
              <p class="timeline-modern-description">Rapat koordinasi dengan seluruh RT/RW untuk membahas program pembangunan dan kegiatan kemasyarakatan periode mendatang.</p>
              <a class="timeline-modern-link" data-album-id="rapat-warga">
                Lihat Dokumentasi
                <i class="fas fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="text-center mt-12">
          <button class="inline-flex items-center px-8 py-3 bg-white border-2 border-red-600 text-red-600 font-bold rounded-xl hover:bg-red-600 hover:text-white transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
            <i class="fas fa-history mr-2"></i>
            Lihat Linimasa Lengkap
          </button>
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
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white transition-colors">
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
                        <li><a href="index.html" class="text-gray-300">Beranda</a></li>
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
                            <span class="text-gray-300">Jl. Kuantan No.1, Tanjungpinang Kota, Kec. Tanjungpinang Kota, Kota Tanjungpinang, Kepulauan Riau 29111</span>
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
                    2025 Design by Kerja Praktik UMRAH.
                </p>
            </div>
        </div>
    </footer>

  <button
    id="back-to-top"
    class="fixed bottom-8 right-8 bg-gradient-to-r from-red-700 to-red-800 text-white p-4 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:from-red-700 hover:to-red-800 flex items-center justify-center">
    <i class="fas fa-arrow-up"></i>
  </button>

  <div id="video-modal" class="fixed inset-0 bg-black/90 z-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <button id="close-video" class="absolute top-8 right-8 text-white text-4xl z-50">×</button>
    <div class="relative w-full max-w-4xl aspect-video bg-black">
      <iframe id="video-iframe" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>
  
  <div id="album-modal" class="fixed inset-0 z-[60] flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-500 overflow-hidden p-4">
    <div class="w-full max-w-7xl h-full max-h-[calc(100vh-120px)] relative flex flex-col transform scale-95 transition-transform duration-500">
        <div class="flex-shrink-0 flex items-center justify-between mb-4 border-b border-white/20 pb-4 px-2">
            <h2 id="album-modal-title" class="text-2xl md:text-3xl font-bold text-white"></h2>
            <button id="close-album-modal" class="text-white/70 hover:text-white text-4xl">
                ×
            </button>
        </div>
        <div id="album-modal-grid" class="flex-grow overflow-y-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 pr-2">
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
    // Initialize AOS animation
    AOS.init({
      duration: 800,
      easing: "ease-in-out",
      once: true,
    });

    // --- NEW: Album Data Store ---
    const albumsData = {
        'pembangunan-jalan': {
            title: 'Pembangunan Jalan RW 08',
            images: [
                { src: 'https://podosari.kendalkab.go.id//upload/berita/206_1727147938.jpeg', caption: 'Pengecoran Awal Jalan' },
                { src: 'https://asset.kompas.com/crops/OivQwLd5W9r3j6Np_Ov6aWf3BTY=/0x0:1000x667/750x500/data/photo/2021/04/08/606e9c398ed50.jpeg', caption: 'Perataan Material' },
                { src: 'https://www.kalurahan-bleberan.info/assets/files/artikel/sedang_1568257008pembangunan-jalan-dusun-bleberan.jpg', caption: 'Pekerja sedang beristirahat' },
                { src: 'https://properti.kompas.com/image/2022/01/24/113000621/sempat-viral-ini-fakta-jalan-dicor-pukul-1-dini-hari-di-bekasi-?w=670&q=75', caption: 'Proses Pengeringan Jalan' },
                { src: 'https://www.abadikini.com/media/files/2021/01/IMG-20210129-WA0019-500x375.jpg', caption: 'Hasil Akhir Pembangunan Jalan' }
            ]
        },
        'bantuan-sosial': {
            title: 'Penyaluran Bantuan Sembako',
            images: [
                { src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1718954074_bcd67607ce3600415d76.jpg', caption: 'Penyerahan Bantuan Secara Simbolis' },
                { src: 'https://www.cimahikota.go.id/assets/images/berita/arsip/24Oktober-dinsos.jpg', caption: 'Warga Mengantri Tertib' },
                { src: 'https://babelprov.go.id/uploads/fajri/DSC_5056.jpg', caption: 'Pemeriksaan Data Penerima' },
                { src: 'https://www.cendananews.com/wp-content/uploads/2020/07/Penyaluran-Bantuan-Sosial-di-Kantor-Pos-Bandar- Lampung.jpg', caption: 'Paket Sembako Siap Dibagikan' }
            ]
        },
        'fasilitas-umum': {
            title: 'Fasilitas Umum',
            images: [
                { src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1698521090_0054522ba27f383276fa.jpg', caption: 'Penyuntikan Vaksin oleh Petugas' },
                { src: 'https://www.pom.go.id/new/uploads/images/2022/BERITA/Februari/Vaksinasi_Booster_di_BPOM/Meja_Pendaftaran.jpg', caption: 'Pendaftaran dan Verifikasi Data' },
                { src: 'https://dinkes.bulelengkab.go.id/public/uploads/post/post_9921_1642125796.jpg', caption: 'Antusiasme Warga Lansia' },
                { src: 'https://asset.kompas.com/crops/6q_k7-t8d9Lz7Y2E3W4xR1zX0vY=/0x0:1000x667/750x500/data/photo/2022/01/25/61f0081e74af6.jpg', caption: 'Observasi Setelah Vaksinasi' },
                { src: 'https://disk.mediaindonesia.com/thumbs/1200x-/news/2022/02/b77f8841443ac6d55d285a85b9b73792.jpg', caption: 'Petugas Menyiapkan Dosis Vaksin' },
                { src: 'https://static.republika.co.id/uploads/images/inpicture_slide/warga-lansia-menjalani-vaksinasi-covid-19-dosis-penguat-atau_220126131433-839.jpg', caption: 'Warga Menunggu Giliran' }
            ]
        },
        'pelatihan-kader': {
            title: 'Pelatihan Kader Posyandu',
            images: [
              { src: 'https://dulohupa.id/wp-content/uploads/2021/11/dulohupa-21.jpeg', caption: 'Pemaparan Materi oleh Narasumber' },
              { src: 'https://kesmas.kemkes.go.id/assets/uploads/contents/939885-2021-08-04-102559.jpg', caption: 'Peserta Aktif Bertanya' },
              { src: 'https://dinkes.wonosobokab.go.id/media/upload/2022/03/WhatsApp-Image-2022-03-22-at-13.43.08.jpeg', caption: 'Sesi Diskusi Kelompok' },
              { src: 'https://puskesmas.bantulkab.go.id/pajangan/wp-content/uploads/sites/29/2023/06/fddf.jpg', caption: 'Praktik Penggunaan Alat' },
              { src: 'https://www.paramadina.ac.id/images/psikologi/berita/pelatihan_kader_posyandu.jpeg', caption: 'Foto Bersama di Akhir Acara' }
            ]
        },
        'penanaman-pohon': {
            title: 'Penanaman Pohon',
            images: [
              { src: 'https://www.kemenkopmk.go.id/sites/default/files/articles/2022-07/IMG-20220703-WA0052.jpg', caption: 'Penanaman Simbolis oleh Pejabat' },
              { src: 'https://www.mongabay.co.id/wp-content/uploads/2019/12/Penanaman-pohon-di-bekas-tambang-timah-di-Bangka-Belitung-Foto-Nopri-Ismi-Mongabay-Indonesia.jpg', caption: 'Warga Berpartisipasi Menanam Bibit' },
              { src: 'https://dlh.probolinggokab.go.id/wp-content/uploads/2023/01/hari-gerakan-satu-juta-pohon.jpg', caption: 'Bibit Pohon Siap Ditanam' },
              { src: 'https://kotaku.pu.go.id/assets/news/image/1671518146_IMG_20221127_082338.jpg', caption: 'Menanam di Tepi Sungai' }
            ]
        },
        'perbaikan-drainase': {
            title: 'Perbaikan Drainase',
            images: [
              { src: 'https://pekalongankota.go.id/upload/berita/berita_20220704033246.jpeg', caption: 'Pembersihan Saluran Drainase' },
              { src: 'https://dpu.kulonprogokab.go.id/files/news/normal/dcb76e2731d5b356e82a938833979603.jpg', caption: 'Pekerja Memperbaiki Dinding Saluran' },
              { src: 'https://palapanews.com/wp-content/uploads/2021/11/drainase-palapanews.jpg', caption: 'Pengangkatan Sedimen dari Saluran' },
              { src: 'https://tribunterkini.com/wp-content/uploads/2022/07/IMG-20220721-WA0104.jpg', caption: 'Saluran Sebelum Diperbaiki' },
              { src: 'https://semarang.solopos.com/wp-content/uploads/2022/10/drainase-1.jpeg', caption: 'Saluran Setelah Diperbaiki' }
            ]
        },
        'rapat-warga': {
            title: 'Rapat Warga',
            images: [
              { src: 'https://pbs.twimg.com/media/CfbyyRmUMAAwksS.jpg', caption: 'Suasana Rapat Warga' },
              { src: 'https://malangkota.go.id/wp-content/uploads/2019/07/Sosialisasi-Bahaya-Narkoba-di-Kantor-Kelurahan-Kasirahan-4-Copy.jpg', caption: 'Lurah Memberikan Sambutan' },
              { src: 'https://kel-kuripan.tegalkota.go.id/wp-content/uploads/2023/06/rapat-pleno.jpeg', caption: 'Diskusi Antar Warga dan Ketua RW' }
            ]
        },
        'posyandu': {
            title: 'Posyandu Bulanan',
            images: [
              { src: 'https://blog.pengajartekno.co.id/wp-content/uploads/2023/08/Gambar-Posyandu-1-1024x683.jpg', caption: 'Penimbangan Balita' },
              { src: 'https://puskesmas-pancoran.jakarta.go.id/wp-content/uploads/2021/04/WhatsApp-Image-2021-04-13-at-13.43.34-1024x768.jpeg', caption: 'Pemberian Imunisasi' },
              { src: 'https://promkes.kemkes.go.id/imagex/content/7375a0048e9c3546a94b591d29668470.jpg', caption: 'Pengukuran Tinggi Badan Anak' },
              { src: 'https://dinkes.kalbarprov.go.id/wp-content/uploads/2023/06/POSYANDU-1.jpeg', caption: 'Penyuluhan Gizi oleh Kader' },
              { src: 'https://bandungkita.id/wp-content/uploads/2023/02/Posyandu-Photo-by-Dinkes-Jabar-scaled.jpg', caption: 'Pencatatan Data Kesehatan Ibu dan Anak' },
              { src: 'https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/01/16/3655118742.jpg', caption: 'Pemberian Makanan Tambahan (PMT)' }
            ]
        },
        // --- DATA BARU UNTUK LINIMASA ---
        'kerja-bakti-lingkungan': {
            title: 'Kerja Bakti Lingkungan',
            images: [
                { src: 'https://www.banjarnegarakab.go.id/wp-content/uploads/2022/02/Kerja-Bakti-Massal-di-Area-Pasar-Ikan-dan-Terminal-Wanadadi-5.jpg', caption: 'Gotong Royong Membersihkan Selokan' },
                { src: 'https://kel-bandarharjo.semarangkota.go.id/assets/images/data/images/Pembersihan%20lingkungan%20(1).jpg', caption: 'Warga Mengumpulkan Sampah' },
                { src: 'https://tniad.mil.id/wp-content/uploads/2022/10/2-2.jpg', caption: 'Membersihkan Rumput Liar' }
            ]
        },
        'pelatihan-umkm': {
            title: 'Pelatihan UMKM Digital',
            images: [
                { src: 'https://diskopukm.jogjaprov.go.id/wp-content/uploads/2018/10/IMG_6214-1024x683.jpg', caption: 'Pemaparan Materi Pemasaran Digital' },
                { src: 'https://sumbawakab.go.id/storage/1688006456_f64a13e4f0120155b9e4.jpg', caption: 'Peserta Pelatihan' },
                { src: 'https://www.djkn.kemenkeu.go.id/files/images/2021/11/20211126_UMKM_5.jpg', caption: 'Sesi Tanya Jawab' }
            ]
        },
        // --- DATA BARU UNTUK "LOAD MORE" ---
        'hut-ri': {
            title: 'Kegiatan HUT RI',
            images: [
                { src: 'https://asset-2.tstatic.net/batam/foto/bank/images/Warga-Tanjungpinang-meriahkan-HUT-ke-77-RI-2022.jpg', caption: 'Lomba Panjat Pinang' },
                { src: 'https://cdn.antaranews.com/cache/1200x800/2023/08/17/IMG_20230817_122955.jpg', caption: 'Upacara Bendera HUT RI' },
                { src: 'https://asset.kompas.com/crops/x-f_qeyjJtW4t2Iu0Q541B_U0vM=/0x0:780x520/750x500/data/photo/2019/08/17/5d576a8393e8a.jpg', caption: 'Lomba Balap Karung' },
                { src: 'https://images.bisnis.com/posts/2023/08/17/1684814/lomba-makan-kerupuk-hut-ri-ke-78-di-solo-3.jpg', caption: 'Lomba Makan Kerupuk' }
            ]
        },
        'bazar-umkm': {
            title: 'Bazar UMKM Kelurahan',
            images: [
                { src: 'https://mejaredaksi.co.id/wp-content/uploads/2023/09/WhatsApp-Image-2023-09-01-at-14.26.45.jpeg', caption: 'Stand Bazar UMKM' },
                { src: 'https://www.cendananews.com/wp-content/uploads/2022/10/Bazar-UMKM-Dekranasda-Lampung-Selatan-scaled.jpg', caption: 'Berbagai Produk Lokal' },
                { src: 'https://disbud.purwakartakab.go.id/asset/foto_berita/Bazar_UMKM_Ekonomi_Kreatif.jpeg', caption: 'Pengunjung Memilih Produk' }
            ]
        },
        'kegiatan-pkk': {
            title: 'Kegiatan PKK',
            images: [
                { src: 'https://www.infopublik.id/assets/upload/headline//pkk_stunting.jpeg', caption: 'Penyuluhan Stunting oleh PKK' },
                { src: 'https://pkk.wonogirikab.go.id/wp-content/uploads/2023/03/IMG-20230307-WA0010-1024x768.jpg', caption: 'Pelatihan Keterampilan Ibu-Ibu PKK' },
                { src: 'https://pemberdayaanmasyarakat.bulelengkab.go.id/public/uploads/post/post_15231_1669094776.jpeg', caption: 'Rapat Rutin Anggota PKK' }
            ]
        },
        'lomba-kelurahan': {
            title: 'Lomba Kelurahan Terbaik',
            images: [
                { src: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1717576579_07be559986e0b41b9d53.jpg', caption: 'Penilaian oleh Tim Juri' },
                { src: 'https://kec-tampan.pekanbaru.go.id/web/image/news.news/353/image?unique=f6d1936', caption: 'Presentasi Profil Kelurahan' },
                { src: 'https://bogorplus.com/wp-content/uploads/2023/06/IMG_20230606_145601.jpg', caption: 'Pemeriksaan Administrasi' },
                { src: 'https://dispmd.babelprov.go.id/sites/default/files/images-berita/IMG_1578.JPG', caption: 'Penyerahan Hadiah Pemenang' }
            ]
        }
    };


    // --- MODIFIED & REFACTORED: Advanced Gallery Viewer Functionality ---
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
            activeThumbnail.scrollIntoView({ behavior: 'smooth', block: 'center' });
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
        // Event listener for main gallery cards and timeline links
        document.body.addEventListener('click', (e) => {
            const galleryCard = e.target.closest('.gallery-card');
            const timelineLink = e.target.closest('.timeline-modern-link');

            if (galleryCard && galleryCard.dataset.albumId) {
                e.preventDefault();
                openGalleryViewer(galleryCard.dataset.albumId);
            } else if (timelineLink && timelineLink.dataset.albumId) {
                e.preventDefault();
                openGalleryViewer(timelineLink.dataset.albumId);
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
            if (viewerModal.classList.contains('hidden')) return;
            if (e.key === 'ArrowRight') showNextGalleryImage();
            if (e.key === 'ArrowLeft') showPrevGalleryImage();
            if (e.key === 'Escape') closeGalleryViewer();
        });
    }

    // Gallery Filter and Search Functionality
    function initGalleryFilters() {
      const filterButtons = document.querySelectorAll('.gallery-filter-btn');
      const galleryCards = document.querySelectorAll('.gallery-card');
      const searchInput = document.getElementById('gallery-search');
      const sortSelect = document.getElementById('gallery-sort');
      const viewButtons = document.querySelectorAll('.view-toggle-btn');
      const galleryContainer = document.querySelector('.gallery-grid');

      filterButtons.forEach(button => {
        button.addEventListener('click', () => {
          filterButtons.forEach(btn => {
            btn.classList.remove('active', 'bg-gradient-to-r', 'from-primary-600', 'to-red-700', 'text-white');
            btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
          });

          button.classList.add('active', 'bg-gradient-to-r', 'from-primary-600', 'to-red-700', 'text-white');
          button.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');

          const filterValue = button.getAttribute('data-filter');
          filterGallery(filterValue);
        });
      });

      if (searchInput) {
        searchInput.addEventListener('input', (e) => {
          const searchTerm = e.target.value.toLowerCase();
          filterGalleryBySearch(searchTerm);
        });
      }

      if (sortSelect) {
        sortSelect.addEventListener('change', (e) => {
          sortGallery(e.target.value);
        });
      }

      viewButtons.forEach(button => {
        button.addEventListener('click', () => {
          viewButtons.forEach(btn => btn.classList.remove('active', 'bg-primary-600', 'text-white'));
          button.classList.add('active', 'bg-primary-600', 'text-white');

          const viewType = button.getAttribute('data-view');
          changeGalleryView(viewType);
        });
      });

      function filterGallery(category) {
        galleryCards.forEach(card => {
          if (category === 'all' || card.getAttribute('data-category') === category) {
            card.style.display = 'block';
            card.classList.add('animate-fadeIn');
          } else {
            card.style.display = 'none';
          }
        });
      }

      function filterGalleryBySearch(searchTerm) {
        galleryCards.forEach(card => {
          const title = card.getAttribute('data-title') || '';
          const description = card.getAttribute('data-description') || '';
          const category = card.getAttribute('data-category') || '';

          if (title.toLowerCase().includes(searchTerm) ||
            description.toLowerCase().includes(searchTerm) ||
            category.toLowerCase().includes(searchTerm)) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      }

      function sortGallery(sortType) {
        const cardsArray = Array.from(galleryCards);

        cardsArray.sort((a, b) => {
          switch (sortType) {
            case 'newest':
              return new Date(b.getAttribute('data-date') || '2024-01-01') - new Date(a.getAttribute('data-date') || '2024-01-01');
            case 'oldest':
              return new Date(a.getAttribute('data-date') || '2024-01-01') - new Date(b.getAttribute('data-date') || '2024-01-01');
            case 'alphabetical':
              return (a.getAttribute('data-title') || '').localeCompare(b.getAttribute('data-title') || '');
            case 'popular':
              return 0;
            default:
              return 0;
          }
        });

        cardsArray.forEach(card => galleryContainer.appendChild(card));
      }
    }
    
    // Smooth scroll and back to top
    function initSmoothScroll() {
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
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

      const backToTopBtn = document.getElementById('back-to-top');
      if (backToTopBtn) {
        window.addEventListener('scroll', () => {
          if (window.pageYOffset > 300) {
            backToTopBtn.classList.remove('opacity-0', 'invisible');
            backToTopBtn.classList.add('opacity-100', 'visible');
          } else {
            backToTopBtn.classList.remove('opacity-100', 'visible');
            backToTopBtn.classList.add('opacity-0', 'invisible');
          }
        });

        backToTopBtn.addEventListener('click', () => {
          window.scrollTo({
            top: 0,
            behavior: 'smooth'
          });
        });
      }
    }

    // Header scroll effect
    function initHeaderScrollEffect() {
      const header = document.querySelector('header');
      if (!header) return;

      window.addEventListener('scroll', () => {
        if (window.pageYOffset > 50) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      });
    }

    // --- PERBAIKAN: Album Modal Functionality ---
    function initAlbumModal() {
        const albumModal = document.getElementById('album-modal');
        const modalContent = albumModal.querySelector('.transform');
        const albumModalTitle = document.getElementById('album-modal-title');
        const albumModalGrid = document.getElementById('album-modal-grid');
        const closeAlbumModalBtn = document.getElementById('close-album-modal');
        const allGalleryCards = document.querySelectorAll('#gallery-container .gallery-card');

        function openAlbumModal(albumId, albumTitle) {
            albumModalTitle.textContent = `Album: ${albumTitle}`;
            albumModalGrid.innerHTML = '';

            const filteredCards = Array.from(allGalleryCards).filter(card => {
                if (albumTitle === 'Penyaluran Bantuan Sembako') {
                    return card.dataset.title === 'Penyaluran Bantuan Sembako';
                }
                return albumId === 'all' || card.dataset.category === albumId;
            });

            if (filteredCards.length === 0) {
                albumModalGrid.innerHTML = `<p class="text-white/70 col-span-full text-center py-10">Tidak ada foto dalam album ini.</p>`;
            } else {
                filteredCards.forEach((card, index) => {
                    const clone = card.cloneNode(true);
                    clone.classList.remove('group'); 
                    clone.style.animationDelay = `${index * 50}ms`;
                    albumModalGrid.appendChild(clone);
                });
            }

            albumModal.classList.remove('opacity-0', 'pointer-events-none');
            modalContent.classList.remove('scale-95');
            document.body.style.overflow = 'hidden';
        }

        function closeAlbumModal() {
            albumModal.classList.add('opacity-0', 'pointer-events-none');
            modalContent.classList.add('scale-95');
            document.body.style.overflow = 'auto';
        }

        document.body.addEventListener('click', e => {
            const albumBtn = e.target.closest('.album-link-btn');
            
            if (albumBtn) {
                e.preventDefault();
                const albumId = albumBtn.dataset.albumId;
                const slideText = albumBtn.closest('.slide-text');
                let albumTitle = "Galeri"; 
                if(slideText) {
                   albumTitle = slideText.querySelector('.slide-title').textContent.trim();
                }
                openAlbumModal(albumId, albumTitle);
            }
        });

        closeAlbumModalBtn.addEventListener('click', closeAlbumModal);
        albumModal.addEventListener('click', e => {
            if (e.target === albumModal) {
                closeAlbumModal();
            }
        });
        document.addEventListener('keydown', e => {
            if(e.key === 'Escape') {
                closeAlbumModal();
            }
        });
    }

    // Initialize all functionality on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize existing functionalities
      initGalleryFilters();
      initAdvancedGalleryViewer(); 
      initSmoothScroll();
      initHeaderScrollEffect();
      initAlbumModal();

      // --- BEGIN: LOGIKA BARU UNTUK TOMBOL "MUAT LEBIH BANYAK/SEDIKIT" ---
      const loadMoreButton = document.getElementById('load-more-button');
      const loadMoreContent = document.getElementById('load-more-content');
      const galleryContainer = document.getElementById('gallery-container');
      let currentPage = 1;

      if (loadMoreButton) {
        loadMoreButton.addEventListener('click', async () => {
          if (loadMoreButton.classList.contains('loading')) {
            return;
          }

          if (loadMoreButton.classList.contains('show-less')) {
            const loadedItems = document.querySelectorAll('.dynamically-loaded');
            
            loadedItems.forEach((item, index) => {
              item.classList.add('is-removing');
            });

            setTimeout(() => {
              loadedItems.forEach(item => item.remove());
              
              loadMoreButton.classList.remove('show-less');
              loadMoreContent.innerHTML = '<i class="fas fa-plus-circle mr-2"></i> Muat Lebih Banyak';
              currentPage = 1;
            }, 500); 

            return;
          }
          
          loadMoreButton.classList.add('loading');
          loadMoreButton.disabled = true;
          loadMoreContent.innerHTML = 'Memuat...';

          const skeletonHTML = `<div class="gallery-card-skeleton animate-pulse"></div>`;
          let skeletons = [];
          for (let i = 0; i < 4; i++) {
            const skeletonWrapper = document.createElement('div');
            skeletonWrapper.innerHTML = skeletonHTML;
            const skeleton = skeletonWrapper.firstElementChild;
            galleryContainer.appendChild(skeleton);
            skeletons.push(skeleton);
          }

          try {
            const newItems = await fetchMoreItems(currentPage + 1);

            skeletons.forEach(s => s.remove());

            if (newItems.length > 0) {
              newItems.forEach((item, index) => {
                const card = createGalleryCard(item);
                card.style.animationDelay = `${index * 100}ms`;
                galleryContainer.appendChild(card);
              });
              currentPage++;
              
              loadMoreButton.classList.remove('loading');
              loadMoreButton.disabled = false;
              loadMoreContent.innerHTML = '<i class="fas fa-plus-circle mr-2"></i> Muat Lebih Banyak';

            } else {
              loadMoreButton.classList.remove('loading');
              loadMoreButton.classList.add('show-less');
              loadMoreButton.disabled = false;
              loadMoreContent.innerHTML = '<i class="fas fa-minus-circle mr-2"></i> Muat Lebih Sedikit';
            }
          } catch (error) {
            console.error("Gagal memuat item:", error);
            skeletons.forEach(s => s.remove());
            loadMoreButton.classList.remove('loading');
            loadMoreButton.disabled = false;
            loadMoreContent.innerHTML = 'Gagal Memuat';
          }
        });
      }
      
      async function fetchMoreItems(page) {
        await new Promise(resolve => setTimeout(resolve, 1500));
        if (page > 2) {
          return [];
        }
        return [
            { albumId: 'hut-ri', title: 'Kegiatan HUT RI', date: '17 Agu 2023', photos: 4, img: 'https://asset-2.tstatic.net/batam/foto/bank/images/Warga-Tanjungpinang-meriahkan-HUT-ke-77-RI-2022.jpg', category: 'sosial' },
            { albumId: 'bazar-umkm', title: 'Bazar UMKM Kelurahan', date: '12 Agu 2023', photos: 3, img: 'https://mejaredaksi.co.id/wp-content/uploads/2023/09/WhatsApp-Image-2023-09-01-at-14.26.45.jpeg', category: 'ekonomi' },
            { albumId: 'kegiatan-pkk', title: 'Kegiatan PKK', date: '05 Agu 2023', photos: 3, img: 'https://www.infopublik.id/assets/upload/headline//pkk_stunting.jpeg', category: 'kesehatan' },
            { albumId: 'lomba-kelurahan', title: 'Lomba Kelurahan Terbaik', date: '01 Agu 2023', photos: 4, img: 'https://icms.tanjungpinangkota.go.id/image/posting/galeri/7243000000/original/1717576579_07be559986e0b41b9d53.jpg', category: 'pemerintahan' }
        ];
      }

      function createGalleryCard(item) {
        const cardDiv = document.createElement('div');
        cardDiv.className = 'gallery-card group dynamically-loaded'; 
        cardDiv.dataset.albumId = item.albumId;
        cardDiv.dataset.title = item.title;
        cardDiv.dataset.date = item.date;
        cardDiv.dataset.category = item.category;
        
        cardDiv.innerHTML = `
            <div class="relative overflow-hidden rounded-2xl aspect-square shadow-xl transform transition-all duration-500 group-hover:shadow-2xl group-hover:-translate-y-2 cursor-pointer">
                <img src="${item.img}" alt="${item.title}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/80 to-transparent transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="font-bold text-white text-lg mb-1">${item.title}</h3>
                    <p class="text-gray-300 text-sm">${item.date} • ${item.photos} Foto</p>
                </div>
            </div>
        `;
        return cardDiv;
      }
      // --- END: LOGIKA BARU ---

      document.body.classList.add('loaded');

      const style = document.createElement('style');
      style.textContent = `
        body.loaded { opacity: 1; }
        body { opacity: 0; transition: opacity 0.3s ease; }
      `;
      document.head.appendChild(style);
    });

    // Carousel class remains the same
    class ModernCarousel {
      constructor() {
        this.currentSlide = 0;
        this.totalSlides = 5;
        this.slides = document.querySelectorAll('.slide-wrapper');
        this.thumbnails = document.querySelectorAll('.thumbnail');
        this.currentSlideNum = document.getElementById('currentSlideNum');
        this.isAutoPlaying = true;
        this.autoPlayInterval = null;
        this.autoPlayDuration = 6000;
        this.init();
      }
      init() {
        document.getElementById('prevBtn').addEventListener('click', () => this.prevSlide());
        document.getElementById('nextBtn').addEventListener('click', () => this.nextSlide());
        this.thumbnails.forEach((thumbnail, index) => {
          thumbnail.addEventListener('click', () => this.goToSlide(index));
        });
        const carouselContainer = document.querySelector('.carousel-container');
        carouselContainer.addEventListener('mouseenter', () => this.pauseAutoPlay());
        carouselContainer.addEventListener('mouseleave', () => this.startAutoPlay());
        this.goToSlide(0);
      }
      goToSlide(slideIndex) {
        if (slideIndex === this.currentSlide && this.autoPlayInterval) return;
        this.slides.forEach((slide, index) => {
          slide.classList.remove('slide-active', 'slide-next', 'slide-prev', 'slide-hidden');
          if (index === slideIndex) slide.classList.add('slide-active');
          else if (index === (slideIndex + 1) % this.totalSlides) slide.classList.add('slide-next');
          else if (index === (slideIndex - 1 + this.totalSlides) % this.totalSlides) slide.classList.add('slide-prev');
          else slide.classList.add('slide-hidden');
        });
        this.currentSlide = slideIndex;
        this.updateUI();
        this.resetAndStartTimers();
      }
      nextSlide() { this.goToSlide((this.currentSlide + 1) % this.totalSlides); }
      prevSlide() { this.goToSlide((this.currentSlide - 1 + this.totalSlides) % this.totalSlides); }
      updateUI() {
        this.thumbnails.forEach((thumbnail, index) => thumbnail.classList.toggle('active', index === this.currentSlide));
        this.currentSlideNum.textContent = String(this.currentSlide + 1).padStart(2, '0');
      }
      resetAndStartTimers() {
        clearInterval(this.autoPlayInterval);
        if (this.isAutoPlaying) {
          this.autoPlayInterval = setInterval(() => this.nextSlide(), this.autoPlayDuration);
        }
      }
      pauseAutoPlay() { if (this.isAutoPlaying) clearInterval(this.autoPlayInterval); }
      startAutoPlay() { if (this.isAutoPlaying) this.resetAndStartTimers(); }
    }
    document.addEventListener('DOMContentLoaded', () => new ModernCarousel());

    // Popup visitor script remains the same
    const toggleButton = document.getElementById('togglePopup');
    const closeButton = document.getElementById('closePopup');
    const popup = document.getElementById('visitorPopup');
    toggleButton.addEventListener('click', () => {
      popup.classList.remove('hidden');
      setTimeout(() => popup.classList.remove('translate-x-full'), 10);
    });
    closeButton.addEventListener('click', () => {
      popup.classList.add('translate-x-full');
      setTimeout(() => popup.classList.add('hidden'), 300);
    });
  </script>
</body>

</html>