<style>
    body {
        box-sizing: border-box;
    }

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .glass {
        background: rgba(255, 255, 255, 0.03);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(8.5px);
        -webkit-backdrop-filter: blur(8.5px);
        border: 1px solid rgba(255, 255, 255, 0.13);
    }


    .glass-dark {
        background: rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .hero-section {
        height: 100vh;
        background-image: url('photo_2025-10-03_21-06-23.jpg');
        background-size: cover;
        position: relative;
        overflow: hidden;
    }

    .hero-overlay {
        background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.8) 100%);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .floating-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
    }

    .floating-shape:nth-child(1) {
        top: 80px;
        left: 40px;
        width: 80px;
        height: 80px;
    }

    .floating-shape:nth-child(2) {
        top: 160px;
        right: 80px;
        width: 64px;
        height: 64px;
        background: rgba(96, 165, 250, 0.2);
        animation-delay: -2s;
        clip-path: polygon(0 0, 100% 0, 85% 100%, 0% 100%);
    }

    .floating-shape:nth-child(3) {
        bottom: 160px;
        left: 80px;
        width: 48px;
        height: 48px;
        background: rgba(168, 85, 247, 0.2);
        border-radius: 8px;
        animation-delay: -4s;
    }

    .news-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }

    .news-card:hover {
        transform: translateY(-5px);
    }

    .news-image {
        height: 200px;
        position: relative;
    }

    .news-image-1 {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    }

    .news-image-2 {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    }

    .news-image-3 {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .category-card {
        transition: all 0.3s ease;
    }

    .category-card:hover {
        transform: scale(1.05);
    }

    .gradient-text {
        background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .btn-gradient {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
        transform: scale(1.05);
    }

    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        color: white;
        animation: bounce 2s infinite;
    }

    @keyframes bounce {
        0%, 20%, 53%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40%, 43% {
            transform: translateX(-50%) translateY(-10px);
        }
        70% {
            transform: translateX(-50%) translateY(-5px);
        }
        90% {
            transform: translateX(-50%) translateY(-2px);
        }
    }

    .navbar-glass {
        background: rgba(255, 255, 255, 0.03);
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(8.5px);
        -webkit-backdrop-filter: blur(8.5px);
        border: 1px solid rgba(255, 255, 255, 0.13);
    }

    .footer-dark {
        background: #111827;
    }

    .glass-light {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }


    .hero-image {
        height: 60vh;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-overlay {
        background: linear-gradient(180deg, transparent 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.8) 100%);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .floating {
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #374151;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-content h3 {
        color: #1f2937;
        font-weight: 600;
        margin: 2rem 0 1rem 0;
    }

    .share-button {
        transition: all 0.3s ease;
    }

    .share-button:hover {
        transform: translateY(-2px);
    }

    .related-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }

    .related-card:hover {
        transform: translateY(-3px);
    }

    .related-image-1 {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    }

    .related-image-2 {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .related-image-3 {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
        transform: scale(1.05);
    }

    .breadcrumb-glass {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 0.5rem;
    }

    .author-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 1rem;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
</style>