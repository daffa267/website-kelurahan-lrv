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

      .modern-header .floating {
        animation: float 6s ease-in-out infinite;
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
          #f8fafc 0%,
          rgba(248, 250, 252, 0.98) 15%,
          rgba(248, 250, 252, 0.9) 30%,
          rgba(248, 250, 252, 0.7) 45%,
          rgba(248, 250, 252, 0.4) 60%,
          rgba(248, 250, 252, 0.15) 75%,
          rgba(248, 250, 252, 0.05) 85%,
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

      .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
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
      
      /* THIS IS THE FIX: This rule now ONLY applies to the recommendation cards at the bottom */
      section.border-t .related-news-card .p-6 {
        flex: 1;
        display: flex;
        flex-direction: column;
        padding-bottom: 3.5rem;
        position: relative;
      }

      .related-news-card .p-6 {
        flex: 1;
        display: flex;
        flex-direction: column;
      }

      .related-news-card .read-more-btn {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 0.5rem 1.5rem 1.5rem;
        background: white;
        border-top: none;
        border-radius: 0 0 0.75rem 0.75rem;
      }

      .related-news-card .read-more-btn a {
        color: #e11d48;
        font-weight: 600;
        transition: color 0.2s;
        display: inline-flex;
        align-items: center;
      }

      .related-news-card .read-more-btn a:hover {
        color: #9f1239;
      }

      .related-news-card .read-more-btn i {
        transition: transform 0.2s;
        margin-left: 0.25rem;
      }

      .related-news-card .read-more-btn a:hover i {
        transform: translateX(3px);
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

      /* Banner Share Button Animation */
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
        background-color: var(--primary-600);
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
        background-color: var(--primary-700);
        transform: translateY(-0.25rem);
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
      }

      @media (max-width: 640px) {
        .news-detail-hero {
          height: 45vh;
          min-height: 350px;
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
              src="https://images.unsplash.com/photo-1573167507387-6b4b98cb7c13?q=80&w=1280&h=720&auto=format&fit=crop"
              alt="Sosialisasi Pemerintahan"
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
                  class="flex items-center space-x-2 px-4 py-2 bg-red-600/90 hover:bg-red-700 rounded-full text-white shadow-lg transition-all duration-300 transform hover:scale-105"
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
                      class="share-option relative w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center"
                      title="Share on Facebook"
                    >
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a
                      href="#"
                      class="share-option relative w-10 h-10 rounded-full bg-blue-400 text-white flex items-center justify-center"
                      title="Share on Twitter"
                    >
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a
                      href="#"
                      class="share-option relative w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center"
                      title="Share on WhatsApp"
                    >
                      <i class="fab fa-whatsapp"></i>
                    </a>
                    <a
                      href="mailto:?subject=Bagikan%20Artikel"
                      class="share-option relative w-10 h-10 rounded-full bg-gray-500 text-white flex items-center justify-center"
                      title="Share via Email"
                    >
                      <i class="fas fa-envelope"></i>
                    </a>
                  </div>
                </div>
              </button>
            </div>

            <div class="mb-2">
              <span
                class="inline-flex items-center bg-red-600/90 text-white px-3 py-1 rounded-full text-xs font-semibold border border-white/20"
                style="
                  backdrop-filter: blur(8px);
                  -webkit-backdrop-filter: blur(8px);
                "
              >
                <i class="fas fa-landmark mr-1"></i>
                PEMERINTAHAN
              </span>
            </div>

            <h1
              class="text-2xl md:text-3xl lg:text-4xl font-bold mb-6 text-white"
              style="
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6),
                  0 4px 8px rgba(0, 0, 0, 0.4), 0 8px 16px rgba(0, 0, 0, 0.2);
              "
            >
              <span class="block">Sosialisasi E-KTP Digital</span>
              <span class="block text-red-300"
                >untuk Seluruh Ketua RT dan RW</span
              >
            </h1>

            <div class="flex flex-wrap gap-3 text-sm text-gray-300 mt-6">
              <div class="flex items-center bg-black/30 px-3 py-1 rounded-full">
                <i class="far fa-calendar-alt mr-1"></i>
                <span>10 Juli 2024</span>
              </div>
              <div class="flex items-center bg-black/30 px-3 py-1 rounded-full">
                <i class="far fa-user mr-1"></i>
                <span>Admin Kelurahan</span>
              </div>
              <div class="flex items-center bg-black/30 px-3 py-1 rounded-full">
                <i class="far fa-eye mr-1"></i>
                <span>1.2K Views</span>
              </div>
              <div
                class="flex items-center px-4 py-2 rounded-xl border border-white/20 hover:bg-white/20 transition-all"
                style="
                  background: rgba(255, 255, 255, 0.1);
                  backdrop-filter: blur(10px);
                "
              >
                <i class="far fa-clock mr-2"></i>
                <span>5 min read</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="article-content" class="py-16 relative bg-gray-50">
        <div class="container mx-auto px-6">
          <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
              <div class="lg:col-span-2 space-y-12">
                <div
                  class="rounded-2xl overflow-hidden shadow-2xl relative h-96"
                  data-aos="fade-up"
                >
                  <img
                    src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/02/18/syarat-dan-cara-pembuatan-KTP-digital-2208102468.png"
                    alt="Demo Aplikasi E-KTP Digital"
                    class="w-full h-full object-cover object-center"
                  />
                  <div
                    class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6"
                  >
                    <p class="text-sm text-white italic">
                      Momen demonstrasi penggunaan aplikasi E-KTP Digital kepada
                      peserta sosialisasi.
                    </p>
                  </div>
                </div>

                <article
                  class="article-content prose prose-lg max-w-none"
                  data-aos="fade-up"
                >
                  <div
                    class="bg-gradient-to-r from-red-50 to-pink-50 p-6 rounded-xl border-l-4 border-red-500 mb-8"
                  >
                    <p
                      class="text-xl text-gray-800 leading-relaxed font-medium"
                    >
                      <span class="text-red-600 font-bold">Tanjungpinang</span>
                      - Kelurahan Tanjungpinang Kota mengadakan sosialisasi
                      E-KTP Digital untuk seluruh Ketua RT dan RW se-Kelurahan.
                      Acara ini bertujuan memberikan pemahaman tentang
                      penggunaan dan manfaat E-KTP Digital dalam pelayanan
                      administrasi kependudukan.
                    </p>
                  </div>
                  <section class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                      Implementasi E-KTP Digital
                    </h2>
                    <p>
                      Sosialisasi ini menjelaskan cara mengakses dan menggunakan
                      E-KTP Digital melalui aplikasi resmi dari Dukcapil. Dengan
                      E-KTP Digital, warga tidak perlu membawa kartu fisik saat
                      mengurus berbagai keperluan administrasi.
                    </p>

                    <figure
                      class="bg-white p-6 rounded-xl shadow-lg border border-red-100 my-8"
                    >
                      <blockquote
                        class="text-lg italic text-gray-800 mb-4 relative pl-8"
                      >
                        <i
                          class="fas fa-quote-left text-red-200 text-4xl absolute -top-2 -left-2 opacity-50"
                        ></i
                        >"Ini adalah langkah modernisasi pelayanan kependudukan.
                        Kami ingin seluruh ketua RT/RW memahami betul cara
                        menggunakannya agar bisa membantu warga di wilayah
                        masing-masing."
                      </blockquote>
                      <figcaption class="flex items-center mt-4">
                        <img
                          src="https://randomuser.me/api/portraits/men/42.jpg"
                          alt="Lurah Tanjungpinang Kota"
                          class="w-12 h-12 rounded-full mr-4 border-2 border-red-500"
                        />
                        <div>
                          <div class="text-red-700 font-semibold">
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
                    Poin-Poin Utama Sosialisasi
                  </h2>
                  <div class="grid md:grid-cols-2 gap-6 my-8">
                    <div
                      class="bg-white border border-gray-200 p-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1"
                    >
                      <div class="flex items-center mb-4">
                        <div
                          class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Partisipasi Penuh RT/RW
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Kehadiran 100% dari seluruh Ketua RT dan RW menunjukkan
                        antusiasme tinggi terhadap program digitalisasi ini.
                      </p>
                    </div>
                    <div
                      class="bg-white border border-gray-200 p-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1"
                    >
                      <div class="flex items-center mb-4">
                        <div
                          class="w-12 h-12 bg-rose-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Aktivasi Warga
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Ditargetkan lebih dari 1,250 warga akan mengaktifkan
                        E-KTP Digital setelah sosialisasi ini disebarluaskan.
                      </p>
                    </div>
                    <div
                      class="bg-white border border-gray-200 p-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1"
                    >
                      <div class="flex items-center mb-4">
                        <div
                          class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Peningkatan Efisiensi
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Diperkirakan terjadi peningkatan efisiensi pelayanan
                        administrasi kependudukan hingga 85% dengan E-KTP
                        Digital.
                      </p>
                    </div>
                    <div
                      class="bg-white border border-gray-200 p-6 rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-1"
                    >
                      <div class="flex items-center mb-4">
                        <div
                          class="w-12 h-12 bg-rose-500 rounded-full flex items-center justify-center mr-4 text-white text-xl"
                        >
                          <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">
                          Edukasi Berkelanjutan
                        </h3>
                      </div>
                      <p class="text-gray-600">
                        Kelurahan akan terus memberikan edukasi dan pendampingan
                        kepada warga dalam proses aktivasi dan penggunaan.
                      </p>
                    </div>
                  </div>
                </section>

                <section>
                  <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    Dokumentasi Kegiatan
                  </h3>
                  <div class="grid md:grid-cols-3 gap-4">
                    <div
                      class="related-news-card rounded-xl shadow-lg overflow-hidden"
                    >
                      <img
                        src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=400&h=300&auto=format&fit=crop"
                        alt="Peserta sosialisasi"
                        class="w-full h-48 object-cover"
                      />
                      <div class="p-4 bg-white">
                        <p class="text-sm text-gray-600">
                          Peserta sosialisasi E-KTP Digital
                        </p>
                      </div>
                    </div>
                    <div
                      class="related-news-card rounded-xl shadow-lg overflow-hidden"
                    >
                      <img
                        src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/02/18/syarat-dan-cara-pembuatan-KTP-digital-2208102468.png"
                        alt="Demo Aplikasi"
                        class="w-full h-48 object-cover"
                      />
                      <div class="p-4 bg-white">
                        <p class="text-sm text-gray-600">
                          Demo penggunaan aplikasi E-KTP
                        </p>
                      </div>
                    </div>
                    <div
                      class="related-news-card rounded-xl shadow-lg overflow-hidden"
                    >
                      <img
                        src="https://th.bing.com/th/id/R.0927df7bcf3f8fee8c74fa132a449fae?rik=1AeNGMfq%2b5sM2w&riu=http%3a%2f%2fjasapresentasi.com%2fwp-content%2fuploads%2f2019%2f05%2fSlide1-2.png&ehk=xzh%2f0BrGg5ZfZyyDbDcIyrJC9Oy%2bNqt26QK2i6eKqyU%3d&risl=&pid=ImgRaw&r=0"
                        alt="Sesi Tanya Jawab"
                        class="w-full h-48 object-cover"
                      />
                      <div class="p-4 bg-white">
                        <p class="text-sm text-gray-600">
                          Sesi tanya jawab bersama peserta
                        </p>
                      </div>
                    </div>
                  </div>
                </section>

                <section class="mt-16">
                  <div class="modern-card rounded-3xl p-8">
                    <div class="flex items-center justify-between mb-8">
                      <h3 class="text-3xl font-bold gradient-text">
                        💬 Komentar (8)
                      </h3>
                    </div>

                    <div class="glass-effect rounded-2xl p-6 mb-8">
                      <div class="flex space-x-4">
                        <div
                          class="w-12 h-12 bg-gradient-to-br from-rose-600 to-red-700 rounded-2xl flex items-center justify-center text-white font-bold"
                        >
                          A
                        </div>
                        <div class="flex-1">
                          <textarea
                            placeholder="Bagikan pendapat Anda tentang pencapaian ini..."
                            class="w-full p-4 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-rose-600 resize-none"
                            rows="3"
                          ></textarea>
                          <div class="flex justify-between items-center mt-4">
                            <div class="flex space-x-2">
                              <button
                                class="text-slate-400 hover:text-rose-600 transition-colors"
                              >
                                <i class="fas fa-image"></i>
                              </button>
                              <button
                                class="text-slate-400 hover:text-rose-600 transition-colors"
                              >
                                <i class="fas fa-smile"></i>
                              </button>
                            </div>
                            <button
                              class="bg-gradient-to-r from-rose-600 to-red-700 text-white px-6 py-2 rounded-xl font-semibold hover:from-rose-700 hover:to-red-800 transition-all"
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
                          class="w-12 h-12 rounded-2xl object-cover border-2 border-rose-200"
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
                              Mantap! Semoga dengan adanya E-KTP digital, urusan
                              administrasi jadi lebih cepat dan mudah.
                            </p>
                          </div>
                          <div
                            class="flex items-center space-x-4 mt-3 text-sm text-slate-500"
                          >
                            <button
                              class="hover:text-rose-700 transition-colors"
                            >
                              <i class="fas fa-thumbs-up mr-1"></i> 8
                            </button>
                            <button
                              class="hover:text-rose-700 transition-colors"
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
                          class="w-12 h-12 rounded-2xl object-cover border-2 border-rose-200"
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
                              Perlu sosialisasi lebih lanjut ke warga langsung,
                              tidak hanya RT/RW.
                            </p>
                          </div>
                          <div
                            class="flex items-center space-x-4 mt-3 text-sm text-slate-500"
                          >
                            <button
                              class="hover:text-rose-700 transition-colors"
                            >
                              <i class="fas fa-thumbs-up mr-1"></i> 12
                            </button>
                            <button
                              class="hover:text-rose-700 transition-colors"
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
                          class="w-12 h-12 rounded-2xl object-cover border-2 border-rose-200"
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
                              Terobosan yang bagus dari Kelurahan Tanjungpinang
                              Kota! 👍
                            </p>
                          </div>
                          <div
                            class="flex items-center space-x-4 mt-3 text-sm text-slate-500"
                          >
                            <button
                              class="hover:text-rose-700 transition-colors"
                            >
                              <i class="fas fa-thumbs-up mr-1"></i> 15
                            </button>
                            <button
                              class="hover:text-rose-700 transition-colors"
                            >
                              Balas
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="text-center mt-8">
                      <button
                        class="text-rose-600 font-semibold hover:text-rose-700 transition-colors"
                      >
                        Muat Komentar Lainnya (5)
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
                            src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=500&auto=format&fit=crop"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                          />
                          <span
                            class="absolute top-3 right-3 bg-red-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full"
                            >Pemerintahan</span
                          >
                        </div>
                        <div class="p-6">
                          <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Transformasi Digital Pelayanan Administrasi
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
                            src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=500&auto=format&fit=crop"
                            class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                          />
                          <span
                            class="absolute top-3 right-3 bg-red-600 text-white text-xs font-semibold px-2.5 py-1 rounded-full"
                            >Pemerintahan</span
                          >
                        </div>
                        <div class="p-6">
                          <h3 class="text-xl font-bold text-gray-900 mb-3">
                            Inovasi Pelayanan Publik Digital
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
                    src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=500&auto=format&fit=crop"
                    class="h-48 w-full object-cover"
                  />
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                      Transformasi Digital Pelayanan Administrasi
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2 flex-grow">
                      Kelurahan memperkenalkan sistem pelayanan digital terbaru
                      untuk mempermudah proses administrasi warga.
                    </p>
                    <div class="read-more-btn">
                      <a href="#">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div
                  class="related-news-card"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                  <img
                    src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=500&auto=format&fit=crop"
                    class="h-48 w-full object-cover"
                  />
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                      Inovasi Pelayanan Publik Digital
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2 flex-grow">
                      Kelurahan meluncurkan inovasi terbaru dalam pelayanan
                      publik berbasis digital untuk warga.
                    </p>
                    <div class="read-more-btn">
                      <a href="#">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div
                  class="related-news-card"
                  data-aos="fade-up"
                  data-aos-delay="300"
                >
                  <img
                    src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=500&auto=format&fit=crop"
                    class="h-48 w-full object-cover"
                  />
                  <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">
                      Sosialisasi Program Digital Kelurahan
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-2 flex-grow">
                      Kelurahan menyelenggarakan sosialisasi program digital
                      terbaru untuk meningkatkan pelayanan masyarakat.
                    </p>
                    <div class="read-more-btn">
                      <a href="#">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                      </a>
                    </div>
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

    <button id="back-to-top">
      <i class="fas fa-arrow-up"></i>
    </button>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
      AOS.init({
        duration: 800,
        easing: "ease-in-out",
        once: true,
      });

      function formatRelativeTime(dateTime) {
        const now = new Date();
        const diffMs = now - new Date(dateTime);
        const diffMins = Math.round(diffMs / 60000);
        const diffHours = Math.round(diffMins / 60);
        const diffDays = Math.round(diffHours / 24);

        if (diffMins < 1) return "Baru saja";
        if (diffMins < 60) return `${diffMins} menit yang lalu`;
        if (diffHours < 24) return `${diffHours} jam yang lalu`;

        return new Date(dateTime).toLocaleDateString("id-ID", {
          year: "numeric",
          month: "short",
          day: "numeric",
        });
      }

      document.addEventListener("DOMContentLoaded", function () {
        const timeElements = document.querySelectorAll("[data-time]");
        timeElements.forEach((el) => {
          const dateTime = el.getAttribute("data-time");
          if (dateTime) {
            el.textContent = formatRelativeTime(dateTime);
          }
        });

        const modernHeader = document.querySelector(".modern-header");
        if (modernHeader) {
          window.addEventListener("scroll", () => {
            if (window.scrollY > 100) {
              modernHeader.classList.add("scrolled");
            } else {
              modernHeader.classList.remove("scrolled");
            }
          });
          if (window.scrollY > 100) {
            modernHeader.classList.add("scrolled");
          }
        }

        const mobileMenuBtn = document.getElementById("mobile-menu-btn");
        const mobileMenu = document.getElementById("mobile-menu");
        if (mobileMenuBtn) {
          mobileMenuBtn.addEventListener("click", () => {
            if (mobileMenu) mobileMenu.classList.toggle("hidden");
          });
        }

        const backToTopBtn = document.getElementById("back-to-top");
        if (backToTopBtn) {
          window.addEventListener("scroll", () => {
            if (window.pageYOffset > 300) {
              backToTopBtn.classList.add("visible");
            } else {
              backToTopBtn.classList.remove("visible");
            }
          });
          backToTopBtn.addEventListener("click", () => {
            window.scrollTo({
              top: 0,
              behavior: "smooth",
            });
          });
        }
      });
    </script>
  </body>
</html>