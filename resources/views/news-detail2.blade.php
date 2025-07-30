<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
      Berita | Kelurahan Tanjungpinang Kota | Kecamatan Tanjungpinang Kota
    </title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <style>
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
        --primary-gradient: linear-gradient(
          135deg,
          var(--primary-800) 0%,
          var(--primary-600) 100%
        );
        --primary-gradient-hover: linear-gradient(
          135deg,
          var(--primary-700) 0%,
          var(--primary-500) 100%
        );
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

      /* News Detail Hero Section */
      .news-detail-hero {
        position: relative;
        overflow: hidden;
        height: 70vh;
        min-height: 500px;
        display: flex;
        align-items: center;
      }

      .hero-gradient-overlay {
        background: linear-gradient(
          to bottom,
          rgba(0, 0, 0, 0.75) 0%,
          rgba(0, 0, 0, 0.5) 25%,
          rgba(0, 0, 0, 0.3) 45%,
          rgba(0, 0, 0, 0.15) 65%,
          rgba(0, 0, 0, 0.05) 80%,
          transparent 95%
        );
      }

      .fade-to-white-smooth {
        background: linear-gradient(
          to top,
          rgba(255, 255, 255, 1) 0%,
          rgba(255, 255, 255, 0.98) 15%,
          rgba(255, 255, 255, 0.9) 30%,
          rgba(255, 255, 255, 0.7) 45%,
          rgba(255, 255, 255, 0.4) 60%,
          rgba(255, 255, 255, 0.15) 75%,
          rgba(255, 255, 255, 0.05) 85%,
          transparent 100%
        );
      }

      .vignette-effect {
        background: radial-gradient(
          ellipse at center bottom,
          transparent 0%,
          transparent 50%,
          rgba(0, 0, 0, 0.1) 75%,
          rgba(0, 0, 0, 0.25) 100%
        );
      }

      .parallax-bg {
        position: absolute;
        inset: 0;
        overflow: hidden;
      }

      .parallax-bg::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
          to bottom,
          from-green-900/80 via-green-800/70 to-green-900/90
        );
        z-index: 10;
      }

      .parallax-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transform: scale(1.1);
      }

      /* Article Content Styles */
      .modern-card {
        background: linear-gradient(145deg, #ffffff, #f8fafc);
        border: 1px solid rgba(148, 163, 184, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      }

      .modern-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      }

      .article-content {
        color: #4b5563;
      }

      .article-content h2,
      .article-content h3 {
        color: #1f2937;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 700;
      }

      .article-content p {
        margin-bottom: 1.5rem;
        line-height: 1.7;
      }

      .lead-paragraph {
        background: linear-gradient(to right, #f0fdf4, #dcfce7);
      }

      .program-card {
        background-color: white;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
      }

      .program-card:hover {
        transform: translateY(-0.25rem);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      }

      .stats-section {
        background: linear-gradient(to right, #f0fdf4, #dcfce7);
        border: 1px solid #d1fae5;
      }

      .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .quote-box {
        background-color: white;
        padding: 1.5rem;
        border-radius: 0.75rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        border: 1px solid #d1fae5;
        margin: 2rem 0;
      }

      .quote-box blockquote {
        font-size: 1.125rem;
        font-style: italic;
        color: #1f2937;
        position: relative;
        padding-left: 2rem;
      }

      .quote-box blockquote::before {
        content: '"';
        position: absolute;
        left: 0;
        top: 0;
        font-size: 3rem;
        color: #d1fae5;
        line-height: 1;
      }

      .icon-container {
        width: 3rem;
        height: 3rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
      }

      .stat-item {
        background-color: white;
        padding: 1rem;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
      }

      .stat-item:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
      }

      .gallery-grid {
        display: grid;
        gap: 1rem;
      }

      .gallery-item {
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
      }

      .gallery-item:hover {
        transform: translateY(-0.5rem);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
      }

      .gallery-item img {
        transition: transform 0.5s ease;
      }

      .gallery-item:hover img {
        transform: scale(1.05);
      }

      .cta-section {
        background: linear-gradient(to right, var(--green-600), #059669);
        color: white;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        margin: 2rem 0;
      }

      .cta-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
      }

      .cta-btn:hover {
        transform: translateY(-0.25rem);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
      }

      /* Related News Section */
      .related-news-card {
        background-color: white;
        border-radius: 0.75rem;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
      }

      .related-news-card .p-6 {
        flex: 1;
        display: flex;
        flex-direction: column;
      }

      /* THIS IS THE FIX: Removing flex-grow from the description */
      .related-news-card .line-clamp-2 {
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 1rem;
        line-height: 1.5;
        max-height: 3em; /* Approximate 2 lines of text */
      }
      
      /* THIS IS THE FIX: Ensuring the button is pushed to the bottom */
      .read-more-btn {
        margin-top: auto;
      }

      .related-news-card:hover {
        transform: translateY(-0.5rem);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
      }

      .related-news-card img {
        transition: transform 0.5s ease;
      }

      .related-news-card:hover img {
        transform: scale(1.05);
      }

      .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      /* Custom styles for the hero section */
      .hero-gradient-overlay {
        background: linear-gradient(
          to bottom,
          rgba(0, 0, 0, 0.75) 0%,
          rgba(0, 0, 0, 0.5) 25%,
          rgba(0, 0, 0, 0.3) 45%,
          rgba(0, 0, 0, 0.15) 65%,
          rgba(0, 0, 0, 0.05) 80%,
          transparent 95%
        );
      }

      /* Banner Share Button Animation - Uniform for all icons */
      .banner-share-container {
        perspective: 1000px;
      }
      .share-option {
        opacity: 0;
        transform: translateY(10px) rotateY(90deg);
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
      }
      #banner-share-btn:hover .share-option:nth-child(1) {
        opacity: 1;
        transform: translateY(0) rotateY(0);
        transition-delay: 0.1s;
      }
      #banner-share-btn:hover .share-option:nth-child(2) {
        opacity: 1;
        transform: translateY(0) rotateY(0);
        transition-delay: 0.2s;
      }
      #banner-share-btn:hover .share-option:nth-child(3) {
        opacity: 1;
        transform: translateY(0) rotateY(0);
        transition-delay: 0.3s;
      }
      #banner-share-btn:hover .share-option:nth-child(4) {
        opacity: 1;
        transform: translateY(0) rotateY(0);
        transition-delay: 0.4s;
      }

      /* Footer Styles */
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
        background: radial-gradient(
            circle at 10% 20%,
            rgba(80, 0, 0, 0.8) 0%,
            transparent 50%
          ),
          radial-gradient(
            circle at 90% 80%,
            rgba(255, 215, 0, 0.1) 0%,
            transparent 50%
          );
        pointer-events: none;
      }

      .footer-links a {
        position: relative;
        padding-bottom: 0.25rem;
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

      /* Back to Top Button */
      #back-to-top {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        background-color: var(--green-600);
        color: white;
        width: 3.5rem;
        height: 3.5rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
      }

      #back-to-top.visible {
        opacity: 1;
        visibility: visible;
      }

      #back-to-top:hover {
        background-color: var(--green-700);
        transform: translateY(-0.25rem);
      }

      /* Animations */
      @keyframes float {
        0%,
        100% {
          transform: translateY(0) rotate(0deg);
        }
        50% {
          transform: translateY(-20px) rotate(5deg);
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

      /* Responsive Adjustments */
      @media (max-width: 1024px) {
        .news-detail-hero {
          height: 60vh;
        }
      }

      @media (max-width: 768px) {
        .news-detail-hero {
          height: 50vh;
          min-height: 400px;
        }

        .custom-header-blur span {
          font-size: 0.8rem !important;
        }
      }

      @media (max-width: 640px) {
        .news-detail-hero {
          height: 45vh;
          min-height: 350px;
        }

        .article-content h2 {
          font-size: 1.5rem;
        }

        .lead-paragraph p {
          font-size: 1rem;
        }

        .stats-section {
          padding: 1rem;
        }

        .gallery-grid {
          grid-template-columns: 1fr;
        }

        .cta-section .flex {
          flex-direction: column;
        }

        .cta-btn {
          width: 100%;
          justify-content: center;
          margin-bottom: 0.5rem;
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
                class="h-11 w-11 md:h-12 md:w-12 object-contain"
              />
            </div>
            <div class="text-white flex flex-col justify-center">
              <span
                class="text-xs md:text-sm font-semibold uppercase tracking-wider block leading-tight"
                >Kelurahan</span
              >
              <span class="text-base md:text-xl font-bold block leading-tight"
                >Tanjungpinang Kota</span
              >
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
              class="glass-card px-6 py-2 rounded-full text-sm hover:bg-white/20 transition-all duration-300 hover:scale-105 flex items-center"
            >
              <i class="fas fa-sign-in-alt mr-2 text-white"></i>
              <span class="text-white font-medium">Login</span>
            </a>
          </div>

          <button
            id="mobile-menu-btn"
            class="md:hidden text-white p-2 rounded-lg hover:bg-white/10 transition-colors"
          >
            <i class="fas fa-bars text-xl"></i>
          </button>

          <div id="mobile-menu" class="md:hidden bg-white shadow-xl hidden">
            <div class="container mx-auto px-4 py-3 space-y-2">
              <a
                href="index.html"
                class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors"
              >
                <i class="fas fa-home mr-3"></i> Beranda
              </a>
              <a
                href="news.html"
                class="block py-3 px-4 rounded-lg bg-gray-100 text-primary-800 font-medium"
              >
                <i class="fas fa-newspaper mr-3"></i> Berita
              </a>
              <a
                href="attent.html"
                class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors"
              >
                <i class="fas fa-bullhorn mr-3"></i> Pengumuman
              </a>
              <a
                href="gallery.html"
                class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors"
              >
                <i class="fas fa-images mr-3"></i> Galeri
              </a>
              <a
                href="download.html"
                class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors"
              >
                <i class="fas fa-download mr-3"></i> Download
              </a>
              <div class="pt-2">
                <a
                  href="https://icms.tanjungpinangkota.go.id"
                  class="btn-primary block text-center py-3"
                >
                  <i class="fas fa-sign-in-alt mr-2"></i> Login Admin
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <main
      class="bg-gradient-to-br from-gray-50 via-white to-gray-100 min-h-screen"
    >
      <section class="relative h-[500px] overflow-hidden">
        <div class="absolute inset-0">
          <div class="relative w-full h-full overflow-hidden">
            <div class="absolute inset-0 z-10 hero-gradient-overlay"></div>

            <div class="absolute inset-0 z-15 vignette-effect"></div>

            <img
              src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1920&h=600&auto=format&fit=crop&crop=center"
              alt="Lingkungan Kelurahan"
              class="w-full h-full object-cover object-center"
              loading="lazy"
            />

            <div
              class="absolute bottom-0 left-0 right-0 h-2/5 z-20 fade-to-white-smooth"
            ></div>
          </div>
        </div>

        <div
          class="container mx-auto px-6 h-full flex items-end pb-24 relative z-30"
          style="transform: translateY(-40px)"
        >
          <div class="max-w-4xl w-full">
            <nav class="mb-8">
              <div class="flex items-center space-x-2 text-gray-300 text-sm">
                <a href="index.html" class="hover:text-white transition-colors">
                  Beranda
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="news.html" class="hover:text-white transition-colors"
                  >Berita</a
                >
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-white font-medium">Detail Berita</span>
              </div>
            </nav>

            <div class="absolute right-6 bottom-24 z-40 banner-share-container">
              <button id="banner-share-btn" class="relative group">
                <div
                  class="flex items-center space-x-2 px-4 py-2 bg-green-600/90 hover:bg-green-700 rounded-full text-white shadow-lg transition-all duration-300 transform hover:scale-105"
                >
                  <span class="font-medium text-sm">Bagikan Berita</span>
                  <i class="fas fa-share-alt"></i>
                </div>

                <div
                  class="absolute right-0 bottom-full mb-3 opacity-0 invisible transition-all duration-300 transform translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0"
                >
                  <div class="flex flex-col items-end space-y-4">
                    <a
                      href="#"
                      class="share-option relative w-10 h-10 rounded-full bg-blue-600 text-white overflow-hidden group/facebook"
                      title="Share on Facebook"
                    >
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/facebook:opacity-0 group-hover/facebook:-translate-y-2"
                      >
                        <i class="fab fa-facebook-f"></i>
                      </div>
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/facebook:opacity-100 group-hover/facebook:translate-y-0"
                      >
                        <i class="fab fa-facebook-f text-blue-100"></i>
                      </div>
                    </a>

                    <a
                      href="#"
                      class="share-option relative w-10 h-10 rounded-full bg-blue-400 text-white overflow-hidden group/twitter"
                      title="Share on Twitter"
                    >
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/twitter:opacity-0 group-hover/twitter:-translate-y-2"
                      >
                        <i class="fab fa-twitter"></i>
                      </div>
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/twitter:opacity-100 group-hover/twitter:translate-y-0"
                      >
                        <i class="fab fa-twitter text-blue-100"></i>
                      </div>
                    </a>

                    <a
                      href="#"
                      class="share-option relative w-10 h-10 rounded-full bg-green-500 text-white overflow-hidden group/whatsapp"
                      title="Share on WhatsApp"
                    >
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/whatsapp:opacity-0 group-hover/whatsapp:-translate-y-2"
                      >
                        <i class="fab fa-whatsapp"></i>
                      </div>
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/whatsapp:opacity-100 group-hover/whatsapp:translate-y-0"
                      >
                        <i class="fab fa-whatsapp text-green-100"></i>
                      </div>
                    </a>

                    <a
                      href="mailto:?subject=Bagikan%20Artikel&body=Saya%20ingin%20berbagi%20artikel%20ini%20dengan%20Anda%3A%0A%0A[Isi%20Pesan%20Anda%20di%20sini]%0A%0A"
                      class="share-option relative w-10 h-10 rounded-full bg-red-500 text-white overflow-hidden group/email"
                      title="Share via Email"
                    >
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 group-hover/email:opacity-0 group-hover/email:-translate-y-2"
                      >
                        <i class="fas fa-envelope"></i>
                      </div>
                      <div
                        class="absolute inset-0 flex items-center justify-center transition-all duration-300 opacity-0 translate-y-2 group-hover/email:opacity-100 group-hover/email:translate-y-0"
                      >
                        <i class="fas fa-envelope-open-text text-red-100"></i>
                      </div>
                    </a>
                  </div>
                </div>
              </button>
            </div>

            <div class="mb-2">
              <span
                class="inline-flex items-center bg-green-600/90 text-white px-3 py-1 rounded-full text-xs font-semibold border border-white/20"
                style="
                  backdrop-filter: blur(8px);
                  -webkit-backdrop-filter: blur(8px);
                "
              >
                <i class="fas fa-leaf mr-1"></i>
                LINGKUNGAN
              </span>
            </div>

            <h1
              class="text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-white"
              style="
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6),
                  0 4px 8px rgba(0, 0, 0, 0.4), 0 8px 16px rgba(0, 0, 0, 0.2);
              "
            >
              <span class="block">Kelurahan Raih Penghargaan</span>
              <span class="block text-green-300">Adipura Tingkat Kota</span>
            </h1>

            <div class="flex flex-wrap gap-3 text-sm text-gray-300 mt-6">
              <div
                class="flex items-center bg-black/30 px-3 py-1 rounded-full"
                style="
                  backdrop-filter: blur(6px);
                  -webkit-backdrop-filter: blur(6px);
                "
              >
                <i class="far fa-calendar-alt mr-1"></i>
                <span>15 Juni 2024</span>
              </div>
              <div
                class="flex items-center bg-black/30 px-3 py-1 rounded-full"
                style="
                  backdrop-filter: blur(6px);
                  -webkit-backdrop-filter: blur(6px);
                "
              >
                <i class="far fa-user mr-1"></i>
                <span>Admin Kelurahan</span>
              </div>
              <div
                class="flex items-center bg-black/30 px-3 py-1 rounded-full"
                style="
                  backdrop-filter: blur(6px);
                  -webkit-backdrop-filter: blur(6px);
                "
              >
                <i class="far fa-eye mr-1"></i>
                <span>980 Views</span>
              </div>
              <div
                class="flex items-center px-4 py-2 rounded-xl border border-white/20 hover:bg-white/20 transition-all"
                style="
                  background: rgba(255, 255, 255, 0.1);
                  backdrop-filter: blur(10px);
                  -webkit-backdrop-filter: blur(10px);
                "
              >
                <i class="far fa-clock mr-2"></i>
                <span>5 min read</span>
              </div>
            </div>
            <div class="mt-8" data-aos="fade-up" data-aos-delay="500"></div>
          </div>
        </div>
      </section>

      <section id="article-content" class="py-16 relative">
        <div class="container mx-auto px-6">
          <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
              <div class="lg:col-span-2 space-y-12">
                <div
                  class="rounded-2xl overflow-hidden shadow-2xl relative h-96"
                  data-aos="fade-up"
                >
                  <img
                    src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=1200&h=600&auto=format&fit=crop"
                    alt="Penyerahan Penghargaan Adipura"
                    class="w-full h-full object-cover object-center"
                  />
                  <div
                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6"
                  >
                    <p class="text-sm text-white italic">
                      Momen penyerahan penghargaan Adipura kepada Kelurahan
                      Tanjungpinang Kota oleh Walikota Tanjungpinang
                    </p>
                  </div>
                </div>

                <article
                  class="article-content prose prose-lg max-w-none"
                  data-aos="fade-up"
                >
                  <div
                    class="lead-paragraph p-6 rounded-xl border-l-4 border-green-500 mb-8"
                  >
                    <p
                      class="text-xl text-gray-800 leading-relaxed font-medium"
                    >
                      <span class="text-green-600 font-bold"
                        >Tanjungpinang</span
                      >
                      - Kelurahan Tanjungpinang Kota meraih prestasi
                      membanggakan dengan menerima penghargaan Adipura tingkat
                      kota untuk kategori kelurahan terbersih dan terhijau tahun
                      2024. Penghargaan ini diberikan sebagai apresiasi atas
                      komitmen dan kerja keras seluruh warga dalam menjaga
                      kebersihan dan kelestarian lingkungan.
                    </p>
                  </div>
                  <section class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                      Pencapaian yang Membanggakan
                    </h2>
                    <p>
                      Penghargaan Adipura yang diterima oleh Kelurahan
                      Tanjungpinang Kota merupakan hasil dari upaya konsisten
                      dalam menerapkan program-program lingkungan yang
                      berkelanjutan. Penilaian dilakukan berdasarkan beberapa
                      kriteria utama, termasuk pengelolaan sampah, penghijauan,
                      kebersihan fasilitas umum, dan partisipasi masyarakat
                      dalam menjaga lingkungan.
                    </p>
                    <p>
                      "Ini adalah pencapaian yang luar biasa bagi kita semua.
                      Penghargaan ini tidak hanya milik pemerintah kelurahan,
                      tetapi milik seluruh warga yang telah berpartisipasi aktif
                      dalam menjaga kebersihan dan kelestarian lingkungan," ujar
                      Lurah Tanjungpinang Kota, Bapak Drs. Ahmad Syahrial,
                      M.Si., saat menerima penghargaan di Balai Kota
                      Tanjungpinang.
                    </p>
                    <figure
                      class="quote-box bg-white p-6 rounded-xl shadow-lg border border-green-100 my-8"
                    >
                      <blockquote
                        class="text-lg italic text-gray-800 mb-4 relative pl-8"
                      >
                        <i
                          class="fas fa-quote-left text-green-200 text-4xl absolute -top-2 -left-2 opacity-50"
                        ></i
                        >"Penghargaan ini adalah bukti nyata bahwa dengan kerja
                        sama yang baik antara pemerintah dan masyarakat, kita
                        dapat menciptakan lingkungan yang bersih, sehat, dan
                        berkelanjutan untuk generasi mendatang."
                      </blockquote>
                      <figcaption class="flex items-center mt-4">
                        <img
                          src="https://randomuser.me/api/portraits/men/42.jpg"
                          alt="Lurah Tanjungpinang Kota"
                          class="w-12 h-12 rounded-full mr-4 border-2 border-green-500"
                        />
                        <div>
                          <div class="text-green-700 font-semibold">
                            Drs. Ahmad Syahrial, M.Si.
                          </div>
                          <div class="text-sm text-gray-600">
                            Lurah Tanjungpinang Kota
                          </div>
                        </div>
                      </figcaption>
                    </figure>
                  </section>
                </article>

                <section>
                  <h2 class="text-3xl font-bold text-gray-900 mb-6">
                    Program-Program Unggulan
                  </h2>
                  <div class="grid md:grid-cols-2 gap-6 my-8">
                    <div class="program-card p-6 rounded-xl">
                      <div class="flex items-center mb-4">
                        <div
                          class="icon-container w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-recycle"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Bank Sampah Kelurahan
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Program pengelolaan sampah terpadu dengan sistem bank
                        sampah yang melibatkan seluruh RT/RW, berhasil
                        mengurangi volume sampah hingga 40%.
                      </p>
                    </div>
                    <div class="program-card p-6 rounded-xl">
                      <div class="flex items-center mb-4">
                        <div
                          class="icon-container w-12 h-12 bg-emerald-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-seedling"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Gerakan Satu Rumah Satu Pohon
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Kampanye penghijauan yang berhasil menanam lebih dari
                        2.000 pohon di area kelurahan dan meningkatkan ruang
                        terbuka hijau.
                      </p>
                    </div>
                    <div class="program-card p-6 rounded-xl">
                      <div class="flex items-center mb-4">
                        <div
                          class="icon-container w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-broom"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Jumat Bersih Bersama
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Kegiatan gotong royong rutin setiap hari Jumat yang
                        melibatkan seluruh warga untuk membersihkan lingkungan
                        sekitar.
                      </p>
                    </div>
                    <div class="program-card p-6 rounded-xl">
                      <div class="flex items-center mb-4">
                        <div
                          class="icon-container w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Edukasi Lingkungan
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Program sosialisasi dan edukasi kepada masyarakat
                        tentang pentingnya menjaga lingkungan dan pengelolaan
                        sampah yang baik.
                      </p>
                    </div>
                  </div>
                </section>

                <section>
                  <div class="stats-section p-8 rounded-2xl">
                    <h2
                      class="text-2xl font-bold text-gray-900 mb-6 text-center"
                    >
                      Dampak Positif Program Lingkungan
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                      <div
                        class="stat-item text-center p-4 rounded-lg shadow-sm"
                      >
                        <div class="text-4xl font-bold text-green-600 mb-2">
                          40%
                        </div>
                        <div class="text-gray-600 font-medium">
                          Pengurangan Sampah
                        </div>
                      </div>
                      <div
                        class="stat-item text-center p-4 rounded-lg shadow-sm"
                      >
                        <div class="text-4xl font-bold text-emerald-600 mb-2">
                          2,000+
                        </div>
                        <div class="text-gray-600 font-medium">
                          Pohon Ditanam
                        </div>
                      </div>
                      <div
                        class="stat-item text-center p-4 rounded-lg shadow-sm"
                      >
                        <div class="text-4xl font-bold text-blue-600 mb-2">
                          85%
                        </div>
                        <div class="text-gray-600 font-medium">
                          Partisipasi Warga
                        </div>
                      </div>
                      <div
                        class="stat-item text-center p-4 rounded-lg shadow-sm"
                      >
                        <div class="text-4xl font-bold text-purple-600 mb-2">
                          15
                        </div>
                        <div class="text-gray-600 font-medium">
                          RT/RW Terlibat
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                <section>
                  <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    Dokumentasi Kegiatan
                  </h3>
                  <div class="grid md:grid-cols-3 gap-4">
                    <div class="gallery-item rounded-xl shadow-lg">
                      <img
                        src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=400&h=300&auto=format&fit=crop"
                        alt="Bank Sampah"
                        class="w-full h-48 object-cover"
                      />
                      <div class="p-4 bg-white">
                        <p class="text-sm text-gray-600">
                          Kegiatan Bank Sampah Kelurahan
                        </p>
                      </div>
                    </div>
                    <div class="gallery-item rounded-xl shadow-lg">
                      <img
                        src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?q=80&w=400&h=300&auto=format&fit=crop"
                        alt="Penanaman Pohon"
                        class="w-full h-48 object-cover"
                      />
                      <div class="p-4 bg-white">
                        <p class="text-sm text-gray-600">
                          Program Penanaman Pohon
                        </p>
                      </div>
                    </div>
                    <div class="gallery-item rounded-xl shadow-lg">
                      <img
                        src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=400&h=300&auto=format&fit=crop"
                        alt="Gotong Royong"
                        class="w-full h-48 object-cover"
                      />
                      <div class="p-4 bg-white">
                        <p class="text-sm text-gray-600">
                          Gotong Royong Jumat Bersih
                        </p>
                      </div>
                    </div>
                  </div>
                </section>

                <section class="mt-16">
                  <div class="modern-card rounded-3xl p-8">
                    <div class="flex items-center justify-between mb-8">
                      <h3 class="text-3xl font-bold gradient-text">
                        💬 Komentar (12)
                      </h3>
                      <button
                        class="bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-emerald-600 hover:to-green-700 transition-all"
                      >
                        Tulis Komentar
                      </button>
                    </div>

                    <div class="glass-effect rounded-2xl p-6 mb-8">
                      <div class="flex space-x-4">
                        <div
                          class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl flex items-center justify-center text-white font-bold"
                        >
                          A
                        </div>
                        <div class="flex-1">
                          <textarea
                            placeholder="Bagikan pendapat Anda tentang pencapaian ini..."
                            class="w-full p-4 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 resize-none"
                            rows="3"
                          ></textarea>
                          <div class="flex justify-between items-center mt-4">
                            <div class="flex space-x-2">
                              <button
                                class="text-slate-400 hover:text-emerald-500 transition-colors"
                              >
                                <i class="fas fa-image"></i>
                              </button>
                              <button
                                class="text-slate-400 hover:text-emerald-500 transition-colors"
                              >
                                <i class="fas fa-smile"></i>
                              </button>
                            </div>
                            <button
                              class="bg-gradient-to-r from-emerald-500 to-green-600 text-white px-6 py-2 rounded-xl font-semibold hover:from-emerald-600 hover:to-green-700 transition-all"
                            >
                              Kirim
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="space-y-6">
                      <div class="flex space-x-4">
                        <img
                          src="https://randomuser.me/api/portraits/women/32.jpg"
                          alt="User"
                          class="w-12 h-12 rounded-2xl object-cover border-2 border-emerald-200"
                        />
                        <div class="flex-1">
                          <div class="bg-slate-50 rounded-2xl p-4">
                            <div class="flex items-center justify-between mb-2">
                              <h4 class="font-bold text-slate-800">
                                Sari Dewi
                              </h4>
                              <span class="text-sm text-slate-500"
                                >2 jam lalu</span
                              >
                            </div>
                            <p class="text-slate-700">
                              Selamat untuk Kelurahan Tanjungpinang Kota! Semoga
                              pencapaian ini bisa menginspirasi kelurahan lain
                              untuk lebih peduli lingkungan. 🌱
                            </p>
                          </div>
                          <div
                            class="flex items-center space-x-4 mt-3 text-sm text-slate-500"
                          >
                            <button
                              class="hover:text-emerald-600 transition-colors"
                            >
                              <i class="fas fa-thumbs-up mr-1"></i> 8
                            </button>
                            <button
                              class="hover:text-emerald-600 transition-colors"
                            >
                              Balas
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="flex space-x-4">
                        <img
                          src="https://randomuser.me/api/portraits/men/45.jpg"
                          alt="User"
                          class="w-12 h-12 rounded-2xl object-cover border-2 border-emerald-200"
                        />
                        <div class="flex-1">
                          <div class="bg-slate-50 rounded-2xl p-4">
                            <div class="flex items-center justify-between mb-2">
                              <h4 class="font-bold text-slate-800">
                                Budi Santoso
                              </h4>
                              <span class="text-sm text-slate-500"
                                >4 jam lalu</span
                              >
                            </div>
                            <p class="text-slate-700">
                              Program bank sampahnya sangat inovatif! Saya
                              berharap program serupa bisa diterapkan di
                              kelurahan saya juga.
                            </p>
                          </div>
                          <div
                            class="flex items-center space-x-4 mt-3 text-sm text-slate-500"
                          >
                            <button
                              class="hover:text-emerald-600 transition-colors"
                            >
                              <i class="fas fa-thumbs-up mr-1"></i> 12
                            </button>
                            <button
                              class="hover:text-emerald-600 transition-colors"
                            >
                              Balas
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="flex space-x-4">
                        <img
                          src="https://randomuser.me/api/portraits/women/28.jpg"
                          alt="User"
                          class="w-12 h-12 rounded-2xl object-cover border-2 border-emerald-200"
                        />
                        <div class="flex-1">
                          <div class="bg-slate-50 rounded-2xl p-4">
                            <div class="flex items-center justify-between mb-2">
                              <h4 class="font-bold text-slate-800">
                                Maya Putri
                              </h4>
                              <span class="text-sm text-slate-500"
                                >6 jam lalu</span
                              >
                            </div>
                            <p class="text-slate-700">
                              Bangga sekali dengan pencapaian ini! Sebagai warga
                              Tanjungpinang, saya merasakan langsung dampak
                              positif dari program-program lingkungan yang
                              dilakukan. 👏
                            </p>
                          </div>
                          <div
                            class="flex items-center space-x-4 mt-3 text-sm text-slate-500"
                          >
                            <button
                              class="hover:text-emerald-600 transition-colors"
                            >
                              <i class="fas fa-thumbs-up mr-1"></i> 15
                            </button>
                            <button
                              class="hover:text-emerald-600 transition-colors"
                            >
                              Balas
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="text-center mt-8">
                      <button
                        class="text-emerald-600 font-semibold hover:text-emerald-700 transition-colors"
                      >
                        Muat Komentar Lainnya (9)
                      </button>
                    </div>
                  </div>
                </section>
              </div>

              <div class="lg:col-span-1">
                <div class="lg:sticky top-24 space-y-8">
                  <div
                    class="bg-white rounded-xl shadow-lg p-6 border"
                    data-aos="fade-left"
                  >
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">
                      Berita Terkait
                    </h2>
                    <div class="grid grid-cols-1 gap-6">
                      <a href="#" class="related-news-card block group">
                        <div class="h-40 overflow-hidden rounded-lg relative">
                          <img
                            src="https://images.unsplash.com/photo-1466611653911-95081537e5b7?q=80&w=500&auto=format&fit=crop"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                          />
                          <span
                            class="absolute top-3 right-3 bg-green-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full"
                            >Lingkungan</span
                          >
                        </div>
                        <div class="p-6">
                          <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Kelurahan Terbaik dalam Pengelolaan Sampah 2024
                          </h3>
                          <p
                            class="text-sm text-gray-500"
                            data-time="2024-07-20T10:30:00"
                          ></p>
                        </div>
                      </a>
                      <a href="#" class="related-news-card block group">
                        <div class="h-40 overflow-hidden rounded-lg relative">
                          <img
                            src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=500&auto=format&fit=crop"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                          />
                          <span
                            class="absolute top-3 right-3 bg-green-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full"
                            >Lingkungan</span
                          >
                        </div>
                        <div class="p-6">
                          <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Program Penghijauan Perkotaan Tahun 2024
                          </h3>
                          <p
                            class="text-sm text-gray-500"
                            data-time="2024-07-18T15:45:00"
                          ></p>
                        </div>
                      </a>
                      <a href="#" class="related-news-card block group">
                        <div class="h-40 overflow-hidden rounded-lg relative">
                          <img
                            src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?q=80&w=500&auto=format&fit=crop"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                          />
                          <span
                            class="absolute top-3 right-3 bg-green-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full"
                            >Lingkungan</span
                          >
                        </div>
                        <div class="p-6">
                          <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Pelatihan Pengomposan untuk Masyarakat
                          </h3>
                          <p
                            class="text-sm text-gray-500"
                            data-time="2024-07-18T15:45:00"
                          ></p>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <section class="mt-16 pt-12 border-t">
              <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                  Rekomendasi Untuk Anda
                </h2>
              </div>
              <div class="grid md:grid-cols-3 gap-8">
                <div
                  class="related-news-card"
                  data-aos="fade-up"
                  data-aos-delay="100"
                >
                  <img
                    src="https://images.unsplash.com/photo-1569163139394-de4e4f43e4e3?q=80&w=500&auto=format&fit=crop"
                    class="h-48 w-full object-cover"
                  />
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                      Inovasi Hijau di Tingkat Kelurahan
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">
                      Melihat berbagai terobosan kelurahan-kelurahan di
                      Indonesia dalam menjaga lingkungan.
                    </p>
                    <a
                      href="#"
                      class="read-more-btn text-green-600 font-semibold hover:text-green-800"
                      >Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i
                    ></a>
                  </div>
                </div>
                <div
                  class="related-news-card"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                  <img
                    src="https://images.unsplash.com/photo-1509099395498-a26c959ba59b?q=80&w=500&auto=format&fit=crop"
                    class="h-48 w-full object-cover"
                  />
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                      Partisipasi Warga: Kunci Sukses Adipura
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">
                      Bagaimana peran aktif masyarakat menjadi faktor penentu
                      dalam meraih penghargaan kebersihan kota.
                    </p>
                    <a
                      href="#"
                      class="read-more-btn text-green-600 font-semibold hover:text-green-800"
                      >Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i
                    ></a>
                  </div>
                </div>
                <div
                  class="related-news-card"
                  data-aos="fade-up"
                  data-aos-delay="300"
                >
                  <img
                    src="https://images.unsplash.com/photo-1611847111326-62c16a195535?q=80&w=500&auto=format&fit=crop"
                    class="h-48 w-full object-cover"
                  />
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                      Menjaga Adipura: Tantangan Setelah Juara
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">
                      Langkah-langkah strategis yang perlu diambil untuk
                      mempertahankan prestasi kebersihan lingkungan.
                    </p>
                    <a
                      href="#"
                      class="read-more-btn text-green-600 font-semibold hover:text-green-800"
                      >Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i
                    ></a>
                  </div>
                </div>
              </div>
            </section>
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
                  © 2025 Design by Kerja Praktik UMRAH.
              </p>
          </div>
      </div>
  </footer>

    <button
      id="back-to-top"
      class="fixed bottom-8 right-8 bg-green-600 text-white p-4 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-green-700 transform hover:-translate-y-1"
    >
      <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
      // Initialize AOS animation
      AOS.init({
        duration: 800,
        easing: "ease-in-out",
        once: true,
      });

      // Format relative time
      function formatRelativeTime(dateTime) {
        const now = new Date();
        const diffMs = now - new Date(dateTime);
        const diffMins = Math.round(diffMs / 60000);
        const diffHours = Math.round(diffMins / 60);
        const diffDays = Math.round(diffHours / 24);

        if (diffMins < 1) return "Baru saja";
        if (diffMins < 60) return `${diffMins} menit yang lalu`;
        if (diffHours < 24) return `${diffHours} jam yang lalu`;

        // If more than 24 hours, show the date
        return new Date(dateTime).toLocaleDateString("id-ID", {
          year: "numeric",
          month: "short",
          day: "numeric",
        });
      }

      // Initialize time formatting for all time elements
      document.addEventListener("DOMContentLoaded", function () {
        const timeElements = document.querySelectorAll("[data-time]");
        timeElements.forEach((el) => {
          const dateTime = el.getAttribute("data-time");
          if (dateTime) {
            el.textContent = formatRelativeTime(dateTime);
          }
        });
      });

      // Header scroll effect
      const modernHeader = document.querySelector(".modern-header");
      if (modernHeader) {
        window.addEventListener("scroll", () => {
          if (window.scrollY > 100) {
            modernHeader.classList.add("scrolled");
          } else {
            modernHeader.classList.remove("scrolled");
          }
        });

        // Initialize header state on page load
        if (window.scrollY > 100) {
          modernHeader.classList.add("scrolled");
        }
      }

      // Mobile menu toggle
      const mobileMenuBtn = document.getElementById("mobile-menu-btn");
      const mobileMenu = document.getElementById("mobile-menu");

      mobileMenuBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");
      });

      // Mobile share toggle
      const mobileShareToggle = document.getElementById("mobile-share-toggle");
      const mobileShareModal = document.getElementById("mobile-share-modal");
      const closeShareModal = document.getElementById("close-share-modal");

      if (mobileShareToggle && mobileShareModal) {
        mobileShareToggle.addEventListener("click", () => {
          mobileShareModal.classList.remove("hidden");
          setTimeout(() => {
            mobileShareModal
              .querySelector("div")
              .classList.remove("translate-y-full");
          }, 10);
        });

        closeShareModal.addEventListener("click", () => {
          mobileShareModal
            .querySelector("div")
            .classList.add("translate-y-full");
          setTimeout(() => {
            mobileShareModal.classList.add("hidden");
          }, 300);
        });
      }

      // --- HERO NEWS CAROUSEL SIMPLE & WORKING SCRIPT ---
      document.addEventListener("DOMContentLoaded", function () {
        console.log("DOM loaded, initializing carousel...");

        const heroSlides = document.querySelectorAll(".news-hero-slide");
        const heroIndicators = document.querySelectorAll(".indicator-dot");
        const heroPrev = document.getElementById("news-hero-prev");
        const heroNext = document.getElementById("news-hero-next");
        const progressBar = document.querySelector(
          ".news-hero-nav .bg-gradient-to-r"
        );
        const progressText = document.querySelector(".news-hero-nav span");

        console.log("Found slides:", heroSlides.length);
        console.log("Found indicators:", heroIndicators.length);

        let heroCurrent = 0;
        let heroInterval = null;

        function showHeroSlide(idx) {
          console.log("Showing slide:", idx);
          heroSlides.forEach((slide, i) => {
            if (i === idx) {
              slide.classList.add("active");
              slide.style.opacity = "1";
              slide.style.zIndex = "20";
              slide.style.pointerEvents = "auto";
            } else {
              slide.classList.remove("active");
              slide.style.opacity = "0";
              slide.style.zIndex = "10";
              slide.style.pointerEvents = "none";
            }
          });
          heroIndicators.forEach((dot, i) => {
            if (i === idx) {
              dot.classList.add("active");
            } else {
              dot.classList.remove("active");
            }
          });
          if (progressBar)
            progressBar.style.width = `${
              ((idx + 1) / heroSlides.length) * 100
            }%`;
          if (progressText)
            progressText.textContent = `${idx + 1}/${heroSlides.length}`;
        }

        function heroNextSlide() {
          heroCurrent = (heroCurrent + 1) % heroSlides.length;
          showHeroSlide(heroCurrent);
        }

        function heroPrevSlide() {
          heroCurrent =
            (heroCurrent - 1 + heroSlides.length) % heroSlides.length;
          showHeroSlide(heroCurrent);
        }

        function startAutoSlide() {
          if (heroInterval) clearInterval(heroInterval);
          heroInterval = setInterval(() => {
            console.log("Auto slide triggered");
            heroNextSlide();
          }, 5000);
        }

        // Initialize
        showHeroSlide(0);
        startAutoSlide();

        // Event listeners
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
            heroCurrent = i;
            showHeroSlide(heroCurrent);
            startAutoSlide();
          });
        });

        console.log("Carousel initialized successfully");
      });
      // --- END HERO NEWS CAROUSEL SCRIPT ---

      // Scroll to news section when arrow down is clicked
      document.addEventListener("DOMContentLoaded", function () {
        const scrollToNewsBtn = document.getElementById("scroll-to-news");
        const newsSection = document.querySelector(".py-16.lg\\:py-24"); // Target section "Semua Berita"

        if (scrollToNewsBtn && newsSection) {
          scrollToNewsBtn.addEventListener("click", function () {
            newsSection.scrollIntoView({
              behavior: "smooth",
              block: "start",
            });
          });
        }
      });

      // Back to top button
      const backToTopBtn = document.getElementById("back-to-top");

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

      // Spotlight News Tabs Functionality
      const spotlightTabBtns = document.querySelectorAll(".spotlight-tab-btn");
      const spotlightTabContents = document.querySelectorAll(
        ".spotlight-tab-content"
      );
      const spotlightBtnText = document.getElementById("spotlight-btn-text");
      const spotlightViewAllBtn = document.getElementById(
        "spotlight-view-all-btn"
      );

      // Function to update button text based on active tab
      function updateSpotlightButton(activeTab) {
        if (activeTab === "populer") {
          spotlightBtnText.textContent = "Lihat Semua Berita Populer";
        } else if (activeTab === "terkini") {
          spotlightBtnText.textContent = "Lihat Semua Berita Terkini";
        }
      }

      spotlightTabBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
          const targetTab = btn.getAttribute("data-tab");

          // Remove active class from all buttons and add to clicked button
          spotlightTabBtns.forEach((b) => {
            b.classList.remove("active");
            const indicator = b.querySelector("div");
            if (indicator) {
              indicator.style.opacity = "0";
            }
          });

          btn.classList.add("active");
          const activeIndicator = btn.querySelector("div");
          if (activeIndicator) {
            activeIndicator.style.opacity = "1";
          }

          // Hide all tab contents and show target content
          spotlightTabContents.forEach((content) => {
            content.classList.add("hidden");
            content.classList.remove("active");
          });

          const targetContent = document.getElementById(targetTab);
          if (targetContent) {
            targetContent.classList.remove("hidden");
            targetContent.classList.add("active");

            // Add smooth fade-in animation
            targetContent.style.opacity = "0";
            setTimeout(() => {
              targetContent.style.opacity = "1";
              targetContent.style.transition = "opacity 0.3s ease-in-out";
            }, 50);
          }

          // Update button text
          updateSpotlightButton(targetTab);
        });
      });

      // Handle View All button click
      if (spotlightViewAllBtn) {
        spotlightViewAllBtn.addEventListener("click", () => {
          // Get current active tab
          const activeTab =
            document
              .querySelector(".spotlight-tab-btn.active")
              ?.getAttribute("data-tab") || "populer";

          // Navigate to all news section with filter parameter
          if (activeTab === "populer") {
            // Scroll to all news section and potentially filter by popular
            document
              .getElementById("all-news")
              .scrollIntoView({ behavior: "smooth" });
            // You can add additional logic here to filter by popular news
          } else if (activeTab === "terkini") {
            // Scroll to all news section and potentially filter by latest
            document
              .getElementById("all-news")
              .scrollIntoView({ behavior: "smooth" });
            // You can add additional logic here to filter by latest news
          }
        });
      }

      // Initialize button text on page load
      updateSpotlightButton("populer");

      // News Pagination Functionality
      const pageButtons = document.querySelectorAll(".page-btn");
      const prevBtn = document.getElementById("prev-btn");
      const nextBtn = document.getElementById("next-btn");
      const newsPages = {
        1: document.querySelector(
          ".grid.grid-cols-1.md\\:grid-cols-2.lg\\:grid-cols-3.gap-8.relative.z-10:not([id])"
        ),
        2: document.getElementById("news-page-2"),
        3: document.getElementById("news-page-3"),
      };

      let currentPage = 1;
      const totalPages = 3;

      // Function to show specific page
      function showPage(pageNumber) {
        // Update current page
        currentPage = pageNumber;

        // Hide all pages
        Object.values(newsPages).forEach((page) => {
          if (page) {
            page.classList.add("hidden");
          }
        });

        // Show selected page
        if (newsPages[pageNumber]) {
          newsPages[pageNumber].classList.remove("hidden");

          // Add fade-in animation
          newsPages[pageNumber].style.opacity = "0";
          setTimeout(() => {
            newsPages[pageNumber].style.opacity = "1";
            newsPages[pageNumber].style.transition = "opacity 0.3s ease-in-out";
          }, 50);
        }

        // Update button states
        pageButtons.forEach((btn) => {
          const btnPage = btn.getAttribute("data-page");
          if (btnPage == pageNumber) {
            // Active button styling
            btn.classList.remove(
              "bg-white",
              "text-gray-700",
              "border-gray-200"
            );
            btn.classList.add(
              "bg-gradient-to-r",
              "from-red-600",
              "to-red-700",
              "text-white",
              "font-bold",
              "shadow-xl",
              "transform",
              "-translate-y-1",
              "border-2",
              "border-white",
              "active"
            );
          } else {
            // Inactive button styling
            btn.classList.remove(
              "bg-gradient-to-r",
              "from-red-600",
              "to-red-700",
              "text-white",
              "font-bold",
              "shadow-xl",
              "transform",
              "-translate-y-1",
              "border-2",
              "border-white",
              "active"
            );
            btn.classList.add("bg-white", "text-gray-700", "border-gray-200");
          }
        });

        // Update arrow button states
        updateArrowButtons();
      }

      // Function to update arrow button states
      function updateArrowButtons() {
        // Update previous button
        if (currentPage <= 1) {
          prevBtn.classList.add("opacity-50", "cursor-not-allowed");
          prevBtn.disabled = true;
        } else {
          prevBtn.classList.remove("opacity-50", "cursor-not-allowed");
          prevBtn.disabled = false;
        }

        // Update next button
        if (currentPage >= totalPages) {
          nextBtn.classList.add("opacity-50", "cursor-not-allowed");
          nextBtn.disabled = true;
        } else {
          nextBtn.classList.remove("opacity-50", "cursor-not-allowed");
          nextBtn.disabled = false;
        }
      }

      // Add click event listeners to pagination buttons
      pageButtons.forEach((btn) => {
        btn.addEventListener("click", () => {
          const pageNumber = parseInt(btn.getAttribute("data-page"));
          showPage(pageNumber);
        });
      });

      // Add click event listeners to arrow buttons
      prevBtn.addEventListener("click", () => {
        if (currentPage > 1) {
          showPage(currentPage - 1);
        }
      });

      nextBtn.addEventListener("click", () => {
        if (currentPage < totalPages) {
          showPage(currentPage + 1);
        }
      });

      // Initialize with page 1 visible
      showPage(1);

      // Header scroll effect
      const header = document.querySelector(".modern-header");

      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          header.classList.add("scrolled");
        } else {
          header.classList.remove("scrolled");
        }
      });
    </script>
  </body>
</html>