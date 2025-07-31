<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelurahan Tanjungpinang Kota | Kecamatan Tanjungpinang Kota</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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
            height: calc(100vh - 90px);
            /* 90px = tinggi header */
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
                /* 60px header mobile */
            }
        }

        .hero-banner .hero-slide {
            background-position: top center !important;
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
            background-position: top center;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
        }

        .hero-banner .hero-slide.active {
            opacity: 1;
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
        }

        @media (max-width: 640px) {
            .hero-banner {
                height: 45vh;
                min-height: 350px;
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
            <span class="text-xs md:text-sm font-semibold uppercase tracking-wider block leading-tight">Kelurahan</span>
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
            <a href="/" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-home mr-3"></i> Beranda
            </a>
            <a href="/news" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-newspaper mr-3"></i> Berita
            </a>
            <a href="/attent" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-bullhorn mr-3"></i> Pengumuman
            </a>
            <a href="/gallery" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-images mr-3"></i> Galeri
            </a>
            <a href="/download" class="block py-3 px-4 rounded-lg hover:bg-gray-100 transition-colors">
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

    <div class="hero-banner h-[550px] relative">
        <div id="prev-slide" class="absolute left-4 top-1/2 transform -translate-y-1/2 z-10 cursor-pointer opacity-70 hover:opacity-100 transition-opacity">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
            </svg>
        </div>

        <div class="hero-slide active" style="background-image: url('./images/goto.jpg');"></div>
        <div class="hero-slide" style="background-image: url('https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1718954728_47d9af74ec712bd51c9a.jpg');"></div>
        <div class="hero-slide" style="background-image: url('https://icms.tanjungpinangkota.go.id/image/posting/berita/7243000000/original/1717577239_ba55e5551c63f1be75f7.jpg');"></div>

        <div class="hero-content animate-fade-in mt-14 md:mt-24">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 text-white drop-shadow-lg leading-tight">Pusat Unduhan Dokumen</h1>
            <p class="text-xl md:text-2xl mb-8 text-white/90 drop-shadow-lg max-w-2xl mx-auto">Temukan semua formulir dan dokumen resmi Kelurahan Tanjung Pinang Kota</p>
        </div>

        <div id="next-slide" class="absolute right-4 top-1/2 transform -translate-y-1/2 z-10 cursor-pointer opacity-70 hover:opacity-100 transition-opacity">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
            </svg>
        </div>

        <div class="absolute bottom-10 left-0 right-0 z-10 flex justify-center">
            <div id="slide-indicators" class="flex items-center justify-center space-x-2">
            </div>
        </div>
    </div>

    <main id="content" class="fixed-container py-8 md:py-16">
        <section class="mb-8">
            <div class="mb-8">
                <div class="flex flex-col md:flex-row md:items-end gap-4">
                    <div class="flex items-center flex-1 min-w-0">
                        <h1 class="text-2xl md:text-3xl font-semibold text-red-700 whitespace-nowrap">
                            <i class="fas fa-cloud-download text-red-700 mr-4"></i>Download Area
                        </h1>
                        <div class="ml-4 w-full pt-0.5"></div>
                    </div>

                    <div class="flex flex-col md:flex-row md:items-center gap-4 flex-1 md:flex-none justify-end">
                        <div class="relative w-full md:w-64">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400 text-sm"></i>
                            </div>
                            <input type="text" id="searchInput"
                                class="block w-full pl-8 pr-3 py-3 border border-gray-200 rounded-lg transition-all duration-200 text-sm"
                                placeholder="Cari pengumuman...">
                        </div>

                        <div class="relative w-full md:w-48">
                            <select id="announcement-year-filter" class="appearance-none bg-white border border-gray-200 rounded-lg px-3 py-3 pr-8 w-full transition-all duration-200 text-sm">
                                <option value="Semua">Semua</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded-xl overflow-hidden shadow-[0_4px_6px_-1px_rgba(0,0,0,0.1)] border-separate border-spacing-0">
                    <thead>
                        <tr>
                            <th class="text-left w-12 py-[15px] px-5 bg-[#bf0000] text-white font-semibold">No.</th>
                            <th class="text-left w-2/5 py-[15px] px-5 bg-[#bf0000] text-white font-semibold">Nama File</th>
                            <th class="text-left w-2/5 py-[15px] px-5 bg-[#bf0000] text-white font-semibold">Deskripsi</th>
                            <th class="text-center py-[15px] px-5 bg-[#bf0000] text-white font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <tr class="page-1">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">1</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Infografis Kelurahan Tanjungpinang Kota Tahun 2022-2023</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center whitespace-nowrap">
                                <div class="inline-flex items-center justify-center gap-2">
                                    <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                        <i class="fas fa-paperclip"></i>
                                        <span class="sr-only">View</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="page-1">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">2</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Jumlah Aparatur Kelurahan Tanjungpinang Kota Menurut Pendidikan dan Jenis Kelamin, tahun 2023</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="page-1">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">3</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Jumlah PNS Kelurahan Tanjungpinang Kota menurut golongan</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="page-1">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">4</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Jumlah Penduduk Kelurahan Tanjungpinang Kota Menurut Jenis Pekerjaan dan Jenis Kelamin, 2021-2023</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="page-1">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">5</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Jumlah Penduduk Kelurahan Tanjungpinang Kota Menurut Tingkat Pendidikan dan Jenis Kelamin, 2021-2023</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="page-2">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">6</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Infografis Kelurahan Tanjungpinang Kota Tahun 2024 (Contoh Page 2)</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center whitespace-nowrap">
                                <div class="inline-flex items-center justify-center gap-2">
                                    <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                        <i class="fas fa-paperclip"></i>
                                        <span class="sr-only">View</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="page-2">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">7</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Data Statistik Penduduk Terbaru 2024 (Contoh Page 2)</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="page-2">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">8</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Laporan Keuangan Kelurahan 2023-2024 (Contoh Page 2)</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="page-2">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">9</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Laporan Keuangan Kelurahan 2023-2024 (Contoh Page 2)</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="page-2">
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top">10</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Laporan Keuangan Kelurahan 2023-2024 (Contoh Page 2)</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-justify break-words">Informasi Teresela Setiap Saat</td>
                            <td class="py-[15px] px-5 border-b-2 border-[#f3f4f6] align-top text-center">
                                <button class="view-btn px-4 py-2 rounded-md font-semibold text-sm cursor-pointer transition-colors bg-white text-[#de1010] border border-[#de1010] hover:bg-[#de1010] hover:text-white">
                                    <i class="fas fa-paperclip"></i>
                                    <span class="sr-only">View</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div id="notFoundMessage" class="hidden text-center py-8">
                    <h3 class="text-md font-md text-gray-600">Data tidak ada.</h3>
                </div>

                <div class="flex justify-center mt-8">
                    <nav class="flex items-center gap-1">
                        <button id="prevPageBtn" class="pagination-btn px-3 py-1 rounded-md border border-gray-300 text-gray-500 hover:bg-[#de1010] hover:text-white">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="pagination-btn page-number px-3 py-1 rounded-md border border-gray-300 text-gray-500 hover:bg-[#de1010] hover:text-white" data-page="1">1</button>
                        <button class="pagination-btn page-number px-3 py-1 rounded-md border border-gray-300 text-gray-500 hover:bg-[#de1010] hover:text-white" data-page="2">2</button>
                        <button class="pagination-btn page-number px-3 py-1 rounded-md border border-gray-300 text-gray-500 hover:bg-[#de1010] hover:text-white" data-page="3">3</button>
                        <button id="nextPageBtn" class="pagination-btn px-3 py-1 rounded-md border border-gray-300 text-gray-500 hover:bg-[#de1010] hover:text-white">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </nav>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('tableBody');
            const notFoundMessage = document.getElementById('notFoundMessage');
            const paginationButtons = document.querySelectorAll('.pagination-btn.page-number');
            const prevPageBtn = document.getElementById('prevPageBtn');
            const nextPageBtn = document.getElementById('nextPageBtn');
            let currentPage = 1; // Initialize current page

            const rowsPerPage = 5; // Number of rows to display per page
            const allTableRows = Array.from(tableBody.querySelectorAll('tr')); // Get all rows

            function showPage(page) {
                currentPage = page;
                let hasResults = false;

                allTableRows.forEach(row => {
                    // Hide all rows initially
                    row.style.display = 'none';
                });

                // Show rows for the current page
                const startIndex = (currentPage - 1) * rowsPerPage;
                const endIndex = startIndex + rowsPerPage;
                const rowsToShow = allTableRows.slice(startIndex, endIndex);

                if (rowsToShow.length > 0) {
                    rowsToShow.forEach(row => {
                        row.style.display = '';
                    });
                    hasResults = true;
                }

                // Update active pagination button
                paginationButtons.forEach(button => {
                    if (parseInt(button.dataset.page) === currentPage) {
                        button.classList.remove('border-gray-300', 'text-gray-500', 'hover:bg-[#de1010]', 'hover:text-white');
                        button.classList.add('bg-[#de1010]', 'text-white', 'border-[#de1010]');
                    } else {
                        button.classList.remove('bg-[#de1010]', 'text-white', 'border-[#de1010]');
                        button.classList.add('border-gray-300', 'text-gray-500', 'hover:bg-[#de1010]', 'hover:text-white');
                    }
                });

                // Handle visibility of "Not Found" message
                if (!hasResults && searchInput.value.length === 0) { // Only show if no search term and no results
                    notFoundMessage.classList.remove('hidden');
                    tableBody.classList.add('hidden');
                } else {
                    notFoundMessage.classList.add('hidden');
                    tableBody.classList.remove('hidden');
                }
            }

            // Initial page load
            showPage(currentPage);

            // Search functionality
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                let hasSearchResults = false;

                allTableRows.forEach(row => {
                    const fileName = row.cells[1].textContent.toLowerCase();
                    const fileDesc = row.cells[2].textContent.toLowerCase();

                    if (fileName.includes(searchTerm) || fileDesc.includes(searchTerm)) {
                        row.style.display = '';
                        hasSearchResults = true;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Show/hide not found message based on search results
                if (!hasSearchResults && searchTerm.length > 0) {
                    notFoundMessage.classList.remove('hidden');
                    tableBody.classList.add('hidden');
                } else {
                    notFoundMessage.classList.add('hidden');
                    tableBody.classList.remove('hidden');
                }

                // Hide pagination when searching
                document.querySelector('.flex.justify-center.mt-8').classList.toggle('hidden', searchTerm.length > 0);
            });

            // Filter by year (assuming 'announcement-year-filter' element exists)
            const yearFilter = document.getElementById('announcement-year-filter');
            if (yearFilter) {
                yearFilter.addEventListener('change', function() {
                    const selectedYear = this.value;
                    let hasFilteredResults = false;

                    // Reset search input if a year filter is applied
                    searchInput.value = '';
                    document.querySelector('.flex.justify-center.mt-8').classList.remove('hidden'); // Show pagination

                    if (selectedYear === 'Semua') {
                        showPage(1); // Go back to page 1 and show all
                        return;
                    }

                    allTableRows.forEach(row => {
                        const yearContent = row.cells[1].textContent;
                        const matchesYear = yearContent.includes(selectedYear);

                        if (matchesYear) {
                            row.style.display = '';
                            hasFilteredResults = true;
                        } else {
                            row.style.display = 'none';
                        }
                    });

                    // Show/hide not found message based on filter results
                    if (!hasFilteredResults) {
                        notFoundMessage.classList.remove('hidden');
                        tableBody.classList.add('hidden');
                    } else {
                        notFoundMessage.classList.add('hidden');
                        tableBody.classList.remove('hidden');
                    }
                });
            }

            // Button click handlers for View
            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const fileName = this.closest('tr').cells[1].textContent;
                    // Add your logic for viewing the file
                    console.log('View file:', fileName);
                });
            });

            // Pagination buttons click handlers
            paginationButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const page = parseInt(this.dataset.page);
                    showPage(page);
                });
            });

            prevPageBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    showPage(currentPage - 1);
                }
            });

            nextPageBtn.addEventListener('click', function() {
                // Assuming a fixed number of pages for this example (3 pages)
                // In a real application, you'd calculate total pages based on data
                if (currentPage < 3) { // Max page number
                    showPage(currentPage + 1);
                }
            });
        });
    </script>

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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS animation
            AOS.init({
                duration: 800,
                easing: 'ease-in-out-quart',
                once: true,
                offset: 120,
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

            // Header scroll effect
            const header = document.querySelector(".modern-header");

            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });

            // Banner slideshow
            const slides = document.querySelectorAll('.hero-slide');
            const prevButton = document.getElementById('prev-slide');
            const nextButton = document.getElementById('next-slide');
            const indicatorsContainer = document.getElementById('slide-indicators');
            let currentSlide = 0;
            let slideInterval;

            // Create indicators
            slides.forEach((slide, index) => {
                const indicator = document.createElement('span');
                indicator.classList.add('w-4', 'h-4', 'rounded-full', 'border', 'border-white', 'cursor-pointer');
                if (index === 0) {
                    indicator.classList.add('bg-white');
                }
                indicator.addEventListener('click', () => {
                    showSlide(index);
                    resetInterval();
                });
                indicatorsContainer.appendChild(indicator);
            });

            const indicators = indicatorsContainer.querySelectorAll('span');

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.remove('active');
                    indicators[i].classList.remove('bg-white');
                    indicators[i].classList.add('border', 'border-white');
                });

                slides[index].classList.add('active');
                indicators[index].classList.add('bg-white');
                indicators[index].classList.remove('border', 'border-white');
                currentSlide = index;
            }

            function nextSlide() {
                let newSlide = (currentSlide + 1) % slides.length;
                showSlide(newSlide);
            }

            function prevSlide() {
                let newSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(newSlide);
            }

            function resetInterval() {
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 5000); // Restart interval
            }

            // Event Listeners
            nextButton.addEventListener('click', () => {
                nextSlide();
                resetInterval();
            });
            prevButton.addEventListener('click', () => {
                prevSlide();
                resetInterval();
            });

            // Auto-play
            slideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds

            // Visitor popup toggle
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
                setTimeout(() => {
                    popup.classList.add('hidden');
                }, 300);
            });
        });
    </script>
    <!-- PDF Viewer Modal - Simplified Version -->
    <div id="pdfModal" class="hidden fixed inset-0 z-[1000] bg-black/80 overflow-auto">
        <div class="absolute inset-0">
            <!-- Perfect Circle Close Button -->
            <button id="closeModal"
                class="absolute z-50 grid place-items-center hover:bg-white/15 rounded-full text-white hover:text-gray-300 transition-all"
                style="
            top: 14px;
            right: 140px;
            width: 35px;
            height: 35px;
            ">
                <i class="fas fa-times text-lg"></i>
            </button>

            <!-- PDF Viewer Container (Full Screen) -->
            <iframe id="pdfViewer" class="w-full h-full" frameborder="0"></iframe>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('pdfModal');
            const pdfViewer = document.getElementById('pdfViewer');
            const closeBtn = document.getElementById('closeModal');

            // Handle view button clicks
            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const fileName = row.querySelector('td:nth-child(2)').textContent;

                    // Set PDF source (adjust path as needed)
                    pdfViewer.src = `./file/bilah.pdf`;

                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close modal
            closeBtn.addEventListener('click', closeModal);
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });

            function closeModal() {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
                pdfViewer.src = '';
            }
        });
    </script>
</body>

</html>