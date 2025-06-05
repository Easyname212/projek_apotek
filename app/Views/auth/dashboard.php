<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    :root {
        --bg-primary: #f8f9ff;
        --bg-secondary: #eef2ff;
        --text-primary: #2d3748;
        --text-secondary: #4a5568;
        --text-muted: #718096;
        --card-bg: #ffffff;
        --card-shadow: rgba(17, 12, 46, 0.08);
        --card-shadow-hover: rgba(17, 12, 46, 0.15);
        --image-shadow: rgba(17, 12, 46, 0.1);
        --accent-1: #6366f1;
        --accent-2: #8b5cf6;
        --accent-3: #ec4899;
        --accent-4: #0ea5e9;
        --gradient-1: linear-gradient(135deg, var(--accent-1), var(--accent-2));
        --gradient-2: linear-gradient(135deg, var(--accent-3), var(--accent-4));
        --border-radius-sm: 0.5rem;
        --border-radius-md: 1rem;
        --border-radius-lg: 1.5rem;
    }
    
    [data-theme="dark"] {
        --bg-primary: #0f172a;
        --bg-secondary: #1e293b;
        --text-primary: #f1f5f9;
        --text-secondary: #cbd5e1;
        --text-muted: #94a3b8;
        --card-bg: #1e293b;
        --card-shadow: rgba(255,255,255,0.03);
        --card-shadow-hover: rgba(255,255,255,0.07);
        --image-shadow: rgba(255,255,255,0.05);
    }
    
    body {
        background: var(--bg-primary);
        background-image: 
            radial-gradient(circle at 25% 25%, rgba(99, 102, 241, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(139, 92, 246, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 50% 50%, rgba(236, 72, 153, 0.03) 0%, transparent 50%);
        color: var(--text-primary);
        transition: all 0.3s ease;
        min-height: 100vh;
        position: relative;
    }
    
    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="0.5" fill="%23000" opacity="0.02"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        pointer-events: none;
        z-index: -1;
    }
    
    .dark-mode-toggle {
        position: fixed;
        bottom: 30px;
        left: 30px;
        z-index: 1000;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 12px 20px;
        color: var(--text-primary);
        font-weight: 600;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 
            0 8px 32px rgba(17, 12, 46, 0.15),
            inset 0 1px 0 rgba(255, 255, 255, 0.2);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .dark-mode-toggle:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-3px) scale(1.05);
        box-shadow: 
            0 12px 40px rgba(17, 12, 46, 0.2),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }
    
    [data-theme="dark"] .dark-mode-toggle {
        background: rgba(30, 41, 59, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: var(--text-primary);
    }
    
    [data-theme="dark"] .dark-mode-toggle:hover {
        background: rgba(30, 41, 59, 0.9);
    }
    .hero-section {
        background: var(--gradient-1);
        border-radius: var(--border-radius-lg);
        color: white;
        padding: 70px 50px;
        margin-bottom: 70px;
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(17, 12, 46, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
        animation: float 15s ease-in-out infinite;
    }
    
    .hero-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect fill="none" width="100" height="100"/><rect fill="rgba(255,255,255,0.05)" width="3" height="3"/></svg>');
        opacity: 0.3;
        z-index: 1;
        pointer-events: none;
    }
    
    .hero-section > .row {
        position: relative;
        z-index: 2;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        25% { transform: translateY(-15px) rotate(2deg); }
        50% { transform: translateY(0px) rotate(5deg); }
        75% { transform: translateY(15px) rotate(3deg); }
    }
    
    .welcome-title {
        font-size: 3.8rem;
        font-weight: 800;
        margin-bottom: 25px;
        text-shadow: 2px 2px 20px rgba(0,0,0,0.2);
        background: linear-gradient(to right, #ffffff, rgba(255,255,255,0.8));
        -webkit-background-clip: text;
        background-clip: text;
        letter-spacing: -0.02em;
        line-height: 1.1;
        position: relative;
    }
    
    .welcome-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 80px;
        height: 4px;
        background: rgba(255,255,255,0.5);
        border-radius: 2px;
    }
    
    .welcome-subtitle {
        font-size: 1.4rem;
        margin-bottom: 35px;
        opacity: 0.95;
        font-weight: 400;
        line-height: 1.6;
        max-width: 600px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .hero-btn {
        background: rgba(255,255,255,0.15);
        border: 1px solid rgba(255,255,255,0.3);
        color: white;
        padding: 16px 42px;
        border-radius: 50px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(15px);
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        z-index: 1;
    }
    
    .hero-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(120deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%);
        transform: translateX(-100%);
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: -1;
    }
    
    .hero-btn:hover {
        background: rgba(255,255,255,0.25);
        color: white;
        transform: translateY(-5px) scale(1.03);
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        border-color: rgba(255,255,255,0.5);
    }
    
    .hero-btn:hover::before {
        transform: translateX(100%);
    }
    
    .feature-card {
        border: none;
        border-radius: var(--border-radius-lg);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: var(--card-bg);
        backdrop-filter: blur(20px);
        box-shadow: 
            0 8px 32px var(--card-shadow),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .feature-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 
            0 25px 50px var(--card-shadow-hover),
            0 0 0 1px rgba(255, 255, 255, 0.2) inset;
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-1);
        border-radius: var(--border-radius-lg) var(--border-radius-lg) 0 0;
    }
    
    .feature-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 50% 0%, rgba(99, 102, 241, 0.03) 0%, transparent 50%);
        pointer-events: none;
    }
    
    .card-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 2.2rem;
        color: white;
        background: var(--gradient-1);
        box-shadow: 
            0 15px 35px rgba(99, 102, 241, 0.25),
            0 0 0 8px rgba(99, 102, 241, 0.05),
            0 0 0 16px rgba(99, 102, 241, 0.01);
        position: relative;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-style: preserve-3d;
    }
    
    .card-icon::before {
        content: '';
        position: absolute;
        inset: 8px;
        border-radius: 50%;
        border: 2px dashed rgba(255, 255, 255, 0.3);
        animation: spin 30s linear infinite;
    }
    
    .feature-card:hover .card-icon {
        transform: translateY(-5px) rotateY(10deg);
        box-shadow: 
            0 20px 40px rgba(99, 102, 241, 0.3),
            0 0 0 10px rgba(99, 102, 241, 0.07),
            0 0 0 20px rgba(99, 102, 241, 0.02);
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .card-title {
        color: var(--text-primary);
        font-weight: 700;
        margin-bottom: 18px;
        font-size: 1.5rem;
        position: relative;
        display: inline-block;
        transition: all 0.3s ease;
    }
    
    .card-title::after {
        content: '';
        position: absolute;
        bottom: -6px;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--gradient-1);
        transform: translateX(-50%);
        transition: width 0.4s ease;
        border-radius: 2px;
    }
    
    .feature-card:hover .card-title::after {
        width: 50px;
    }
    
    .card-text {
        color: var(--text-secondary);
        line-height: 1.7;
        font-size: 1.05rem;
        margin-bottom: 25px;
        transition: all 0.3s ease;
    }
    
    .feature-btn {
        background: var(--gradient-1);
        border: none;
        color: white;
        padding: 14px 32px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        position: relative;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0 6px 15px rgba(99, 102, 241, 0.2);
    }
    
    .feature-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(255,255,255,0.1), rgba(255,255,255,0.2), rgba(255,255,255,0.1));
        transform: translateX(-100%) skewX(-15deg);
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        z-index: -1;
    }
    
    .feature-btn:hover {
        background: var(--gradient-1);
        transform: translateY(-3px) scale(1.03);
        box-shadow: 0 12px 25px rgba(99, 102, 241, 0.35);
        color: white;
    }
    
    .feature-btn:hover::before {
        transform: translateX(100%) skewX(-15deg);
    }
    
    .feature-btn:active {
        transform: translateY(0) scale(0.98);
        box-shadow: 0 5px 15px rgba(99, 102, 241, 0.2);
    }
    
    .stats-section {
        background: var(--gradient-2);
        border-radius: var(--border-radius-lg);
        padding: 50px 40px;
        margin: 70px 0;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 
            0 20px 60px rgba(236, 72, 153, 0.15),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
    }
    
    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect fill="none" width="100" height="100"/><rect fill="rgba(255,255,255,0.05)" width="3" height="3"/></svg>');
        opacity: 0.3;
        z-index: 1;
        pointer-events: none;
    }
    
    .stats-section .row {
        position: relative;
        z-index: 2;
    }
    
    .stat-item {
        text-align: center;
        padding: 20px;
        position: relative;
        transition: all 0.4s ease;
    }
    
    .stat-item:hover {
        transform: translateY(-5px);
    }
    
    .stat-number {
        font-size: 3.5rem;
        font-weight: 800;
        display: block;
        margin-bottom: 15px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        background: linear-gradient(to right, #ffffff, rgba(255,255,255,0.8));
        -webkit-background-clip: text;
        background-clip: text;
        position: relative;
    }
    
    .stat-number::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        width: 40px;
        height: 3px;
        background: rgba(255,255,255,0.3);
        border-radius: 2px;
        transform: translateX(-50%);
    }
    
    .stat-label {
        font-size: 1.2rem;
        opacity: 0.95;
        font-weight: 500;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    
    .image-container {
        position: relative;
        overflow: hidden;
        border-radius: var(--border-radius-lg);
        box-shadow: 
            0 20px 40px var(--image-shadow),
            0 0 0 1px rgba(255, 255, 255, 0.1) inset;
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-style: preserve-3d;
        perspective: 1000px;
    }
    
    .image-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(120deg, rgba(255,255,255,0.3) 0%, transparent 100%);
        z-index: 2;
        opacity: 0.5;
        transition: opacity 0.5s ease;
    }
    
    .image-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border: 2px solid rgba(255,255,255,0.2);
        border-radius: var(--border-radius-lg);
        z-index: 1;
        pointer-events: none;
    }
    
    .image-container img {
        transition: transform 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-origin: center center;
    }
    
    .image-container:hover {
        box-shadow: 
            0 30px 60px var(--image-shadow),
            0 0 0 2px rgba(255, 255, 255, 0.2) inset;
        transform: translateY(-10px) rotateY(-5deg);
    }
    
    .image-container:hover img {
        transform: scale(1.08) translateZ(10px);
    }
    
    .image-container:hover::before {
        opacity: 0.7;
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
        color: var(--text-primary);
        position: relative;
    }
    
    .section-title::before {
        content: '';
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 5px;
        background: var(--gradient-1);
        border-radius: 5px;
        opacity: 0.5;
    }
    
    .section-title h2 {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 20px;
        color: var(--text-primary);
        letter-spacing: -0.02em;
        line-height: 1.2;
        position: relative;
        display: inline-block;
    }
    
    .section-title h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: var(--gradient-1);
        border-radius: 3px;
    }
    
    .section-title p {
        font-size: 1.3rem;
        color: var(--text-secondary);
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.7;
        font-weight: 400;
    }
    
    .text-muted {
        color: var(--text-muted) !important;
    }
    
    [data-theme="dark"] .stats-section {
        background: linear-gradient(135deg, #4c1d95 0%, #7e22ce 100%);
    }
    
    [data-theme="dark"] .hero-section {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }
    
    [data-theme="dark"] .feature-btn,
    [data-theme="dark"] .hero-btn {
        box-shadow: 0 8px 25px rgba(30, 64, 175, 0.25);
    }
    
    [data-theme="dark"] .card-icon {
        box-shadow: 
            0 15px 35px rgba(30, 64, 175, 0.25),
            0 0 0 8px rgba(30, 64, 175, 0.05),
            0 0 0 16px rgba(30, 64, 175, 0.01);
    }
    
    [data-theme="dark"] .feature-card:hover .card-icon {
        box-shadow: 
            0 20px 40px rgba(30, 64, 175, 0.3),
            0 0 0 10px rgba(30, 64, 175, 0.07),
            0 0 0 20px rgba(30, 64, 175, 0.02);
    }
    
    /* Scroll Bar Styling */
    ::-webkit-scrollbar {
        width: 12px;
    }
    
    ::-webkit-scrollbar-track {
        background: var(--bg-secondary);
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, var(--accent-1), var(--accent-2));
        border-radius: 6px;
        border: 3px solid var(--bg-secondary);
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, var(--accent-2), var(--accent-1));
    }
    
    /* Responsive Styles */
    @media (max-width: 992px) {
        .welcome-title {
            font-size: 3rem;
        }
        
        .hero-section {
            padding: 60px 30px;
        }
        
        .section-title h2 {
            font-size: 2.4rem;
        }
    }
    
    @media (max-width: 768px) {
        .welcome-title {
            font-size: 2.5rem;
        }
        
        .hero-section {
            padding: 50px 25px;
            margin-bottom: 50px;
        }
        
        .stats-section {
            padding: 40px 20px;
            margin: 50px 0;
        }
        
        .stat-number {
            font-size: 2.8rem;
        }
        
        .card-icon {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
        }
        
        .section-title p {
            font-size: 1.1rem;
        }
    }
    
    @media (max-width: 576px) {
        .welcome-title {
            font-size: 2rem;
        }
        
        .welcome-subtitle {
            font-size: 1.1rem;
        }
        
        .hero-btn {
            padding: 12px 30px;
            font-size: 0.9rem;
        }
        
        .hero-section {
            padding: 40px 20px;
        }
        
        .stat-number {
            font-size: 2.5rem;
        }
        
        .stat-label {
            font-size: 1rem;
        }
        
        .card-title {
            font-size: 1.3rem;
        }
        
        .feature-btn {
            padding: 12px 25px;
            font-size: 0.9rem;
        }
        
        .dark-mode-toggle {
            padding: 8px 16px;
            font-size: 0.8rem;
        }
    }
</style>

<!-- Dark Mode Toggle -->
<button class="dark-mode-toggle" onclick="toggleDarkMode()">
    <i class="bi bi-moon-fill" id="theme-icon"></i>
    <span id="theme-text">Dark Mode</span>
</button>

<div class="container-fluid px-4">
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <?php if (session()->get('level') === 'Developer') : ?>
                    <h1 class="welcome-title">Developer Dashboard</h1>
                    <p class="welcome-subtitle">Selamat datang di panel khusus developer. Kelola sistem dengan akses penuh.</p>
                <?php else : ?>
                    <h1 class="welcome-title">Selamat Datang, <?= $user['nama_lengkap']; ?>!</h1>
                    <p class="welcome-subtitle">Solusi kesehatan terpercaya Anda. Temukan berbagai obat, produk kesehatan, dan informasi penting untuk kebutuhan medis Anda.</p>
                <?php endif; ?>
                <a class="btn hero-btn" href="<?= base_url('obat'); ?>">Jelajahi Produk</a>
            </div>
            <div class="col-lg-4 text-center">
                <div class="image-container">
                    <img class="img-fluid" src="<?= base_url('uploads/gambar obat.png'); ?>" alt="Gambar Apotek" style="max-height: 300px; object-fit: cover;" />
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="row">
            <div class="col-md-4">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Produk Obat</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Pelanggan Puas</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Layanan Online</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="section-title">
        <h2>Layanan Unggulan</h2>
        <p>Nikmati berbagai layanan terbaik yang kami sediakan untuk memenuhi kebutuhan kesehatan Anda</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-lg-4 col-md-6">
            <div class="card feature-card h-100">
                <div class="card-body text-center p-4">
                    <div class="card-icon">
                        <i class="bi bi-capsule"></i>
                    </div>
                    <h3 class="card-title">Obat Terbaru</h3>
                    <p class="card-text">Dapatkan akses ke koleksi obat-obatan terbaru dan terlengkap. Kami selalu memperbarui stok untuk memenuhi kebutuhan kesehatan Anda dengan produk berkualitas tinggi.</p>
                    <a class="btn feature-btn" href="<?= base_url('obat'); ?>">Lihat Produk</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6">
            <div class="card feature-card h-100">
                <div class="card-body text-center p-4">
                    <div class="card-icon">
                        <i class="bi bi-list-stars"></i>
                    </div>
                    <h3 class="card-title">Kategori Lengkap</h3>
                    <p class="card-text">Temukan obat berdasarkan kategori seperti antibiotik, pereda nyeri, vitamin, suplemen, dan banyak lagi. Pencarian yang mudah dan terorganisir dengan baik.</p>
                    <a class="btn feature-btn" href="<?= base_url('kategori'); ?>">Jelajahi Kategori</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6">
            <div class="card feature-card h-100">
                <div class="card-body text-center p-4">
                    <div class="card-icon">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <h3 class="card-title">Transaksi Mudah</h3>
                    <p class="card-text">Proses pembelian yang cepat dan aman dengan berbagai metode pembayaran. Sistem transaksi yang user-friendly dan terpercaya untuk kenyamanan Anda.</p>
                    <a class="btn feature-btn" href="<?= base_url('transaksi'); ?>">Mulai Belanja</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Features for Non-Guest Users -->
    <?php if (session()->get('level') !== 'Guest') : ?>
    <div class="row g-4 mb-5">
        <div class="col-lg-6 col-md-6">
            <div class="card feature-card h-100">
                <div class="card-body text-center p-4">
                    <div class="card-icon">
                        <i class="bi bi-file-earmark-bar-graph-fill"></i>
                    </div>
                    <h3 class="card-title">Laporan Penjualan</h3>
                    <p class="card-text">Pantau dan analisis laporan pendapatan apotek secara real-time. Dapatkan insights mendalam untuk pengambilan keputusan bisnis yang lebih baik dan strategis.</p>
                    <a class="btn feature-btn" href="<?= base_url('laporan/pendapatan'); ?>">Lihat Laporan</a>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6">
            <div class="card feature-card h-100">
                <div class="card-body text-center p-4">
                    <div class="card-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h3 class="card-title">Analisis Bisnis</h3>
                    <p class="card-text">Akses dashboard analitik komprehensif untuk memahami tren penjualan, performa produk, dan perilaku pelanggan. Data yang akurat untuk strategi bisnis optimal.</p>
                    <a class="btn feature-btn" href="<?= base_url('laporan'); ?>">Dashboard Analitik</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Footer Message -->
    <div class="footer-message">
        <div class="wave-divider">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" fill="var(--bg-secondary)"></path>
            </svg>
        </div>
        <div class="footer-content text-center py-5">
            <div class="footer-logo mb-4">
                <i class="bi bi-capsule-pill" style="font-size: 2.5rem; background: var(--gradient-1); -webkit-background-clip: text; background-clip: text; color: transparent;"></i>
            </div>
            <h3 class="footer-title mb-3">ApotekKu - Mitra Kesehatan Terpercaya</h3>
            <p class="footer-text mb-4">Komitmen kami adalah menyediakan akses mudah ke obat-obatan berkualitas dengan layanan pelanggan yang prima</p>
            <div class="footer-social">
                <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
    </div>
    
    <style>
        .footer-message {
            position: relative;
            margin-top: 80px;
            padding-top: 20px;
        }
        
        .wave-divider {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
            height: 100px;
            overflow: hidden;
            line-height: 0;
        }
        
        .wave-divider svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 100px;
        }
        
        .footer-content {
            background-color: var(--bg-secondary);
            padding: 60px 20px;
        }
        
        .footer-title {
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1.8rem;
        }
        
        .footer-text {
            color: var(--text-secondary);
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.1rem;
            line-height: 1.7;
        }
        
        .footer-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gradient-1);
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.2);
        }
        
        .social-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }
    </style>
</div>

<script>
    // Dark Mode Functionality
    function toggleDarkMode() {
        const body = document.body;
        const themeIcon = document.getElementById('theme-icon');
        const themeText = document.getElementById('theme-text');
        
        if (body.getAttribute('data-theme') === 'dark') {
            // Switch to light mode with animation
            body.classList.add('theme-transition');
            body.removeAttribute('data-theme');
            themeIcon.className = 'bi bi-moon-fill';
            themeText.textContent = 'Dark Mode';
            localStorage.setItem('theme', 'light');
            
            setTimeout(() => {
                body.classList.remove('theme-transition');
            }, 1000);
        } else {
            // Switch to dark mode with animation
            body.classList.add('theme-transition');
            body.setAttribute('data-theme', 'dark');
            themeIcon.className = 'bi bi-sun-fill';
            themeText.textContent = 'Light Mode';
            localStorage.setItem('theme', 'dark');
            
            setTimeout(() => {
                body.classList.remove('theme-transition');
            }, 1000);
        }
    }
    
    // Initialize theme on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme');
        const body = document.body;
        const themeIcon = document.getElementById('theme-icon');
        const themeText = document.getElementById('theme-text');
        
        if (savedTheme === 'dark') {
            body.setAttribute('data-theme', 'dark');
            themeIcon.className = 'bi bi-sun-fill';
            themeText.textContent = 'Light Mode';
        } else {
            body.removeAttribute('data-theme');
            themeIcon.className = 'bi bi-moon-fill';
            themeText.textContent = 'Dark Mode';
        }
        
        // Add animation to elements on scroll
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('.feature-card, .stat-item, .section-title, .image-container');
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('animate');
                }
            });
        };
        
        // Add animation classes
        const addAnimationClasses = () => {
            const featureCards = document.querySelectorAll('.feature-card');
            const statItems = document.querySelectorAll('.stat-item');
            
            featureCards.forEach((card, index) => {
                card.classList.add('fade-in');
                card.style.animationDelay = `${0.2 * index}s`;
            });
            
            statItems.forEach((item, index) => {
                item.classList.add('fade-in');
                item.style.animationDelay = `${0.1 * index}s`;
            });
            
            // Add counter animation to stat numbers
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(statNumber => {
                const targetValue = statNumber.textContent;
                if (targetValue.includes('+')) {
                    const numericValue = parseInt(targetValue);
                    animateCounter(statNumber, 0, numericValue, 2000);
                } else if (targetValue.includes('/')) {
                    statNumber.setAttribute('data-value', targetValue);
                }
            });
        };
        
        // Counter animation function
        function animateCounter(element, start, end, duration) {
            let current = start;
            const range = end - start;
            const increment = end > start ? 1 : -1;
            const stepTime = Math.abs(Math.floor(duration / range));
            const originalText = element.textContent;
            const hasPlus = originalText.includes('+');
            
            const timer = setInterval(() => {
                current += increment;
                element.textContent = hasPlus ? `${current}+` : current;
                
                if (current === end) {
                    clearInterval(timer);
                    element.textContent = originalText;
                }
            }, stepTime);
        }
        
        // Add parallax effect to hero section
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            window.addEventListener('mousemove', (e) => {
                const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
                const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
                heroSection.style.backgroundPosition = `calc(50% + ${moveX}px) calc(50% + ${moveY}px)`;
            });
        }
        
        // Add hover effect to feature cards
        const cards = document.querySelectorAll('.feature-card');
        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
            });
        });
        
        // Initialize animations
        window.addEventListener('scroll', animateOnScroll);
        addAnimationClasses();
        animateOnScroll();
    });
</script>

<style>
    /* Animation Styles */
    .theme-transition {
        transition: background-color 0.5s ease, color 0.5s ease;
    }
    
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeIn 0.8s ease forwards;
    }
    
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .feature-card, .stat-item, .section-title, .image-container {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }
    
    .feature-card.animate, .stat-item.animate, .section-title.animate, .image-container.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    .feature-card {
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.5s ease;
    }
</style>

<?= $this->endSection(); ?>