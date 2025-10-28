@extends('layouts.master')

@section('title', 'Forum Konsultasi Pajak - Tanya Jawab Profesional')

@section('style')
<style>
    :root {
        --primary: #3b82f6;
        --primary-dark: #2563eb;
        --primary-light: #eff6ff;
        --primary-50: #f0f9ff;
        --text-dark: #1f2937;
        --text-medium: #4b5563;
        --text-light: #6b7280;
        --border: #e5e7eb;
        --border-light: #f3f4f6;
        --background: #f8fafc;
        --white: #ffffff;
        --success: #10b981;
        --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    body {
        background-color: var(--background);
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        line-height: 1.6;
        -webkit-font-smoothing: antialiased;
    }

    /* ===== Enhanced Hero Section ===== */
    .forum-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #667eea 100%);
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
        min-height: 60vh;
        display: flex;
        align-items: center;
    }

    .forum-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: 
            radial-gradient(circle at 15% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 85% 30%, rgba(255, 119, 198, 0.2) 0%, transparent 50%),
            radial-gradient(circle at 50% 80%, rgba(120, 219, 255, 0.15) 0%, transparent 50%);
        z-index: 1;
        animation: float 6s ease-in-out infinite;
    }

    .forum-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(transparent, var(--background));
        z-index: 2;
    }

    .hero-content {
        position: relative;
        z-index: 3;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
        color: var(--white);
        width: 100%;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(20px);
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 24px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: slideInDown 0.8s ease-out;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
        color: var(--white);
        animation: fadeInUp 0.8s ease-out 0.2s both;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .hero-title span {
        background: linear-gradient(135deg, #fff, #e0f2fe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-description {
        font-size: 1.1rem;
        opacity: 0.95;
        margin-bottom: 40px;
        line-height: 1.6;
        font-weight: 400;
        animation: fadeInUp 0.8s ease-out 0.4s both;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .hero-stats {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 0.6s both;
        margin-bottom: 30px;
    }

    .stat-item {
        text-align: center;
        padding: 16px 20px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        transition: all 0.3s ease;
        min-width: 120px;
    }

    .stat-item:hover {
        transform: translateY(-3px);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    }

    .stat-number {
        display: block;
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 6px;
        color: var(--white);
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
        font-weight: 500;
        color: var(--white);
    }

    .hero-cta {
        margin-top: 30px;
        animation: fadeInUp 0.8s ease-out 0.8s both;
    }

    .btn-hero {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 28px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 12px;
        color: var(--white);
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    }

    .btn-hero:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
    }

    /* ===== Main Container ===== */
    .forum-container {
        max-width: 1200px;
        margin: 60px auto;
        padding: 0 20px;
        width: 100%;
    }

    /* ===== Section Headers ===== */
    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 16px;
        background: linear-gradient(135deg, var(--text-dark), var(--primary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-subtitle {
        font-size: 1.1rem;
        color: var(--text-light);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ===== Ask Question Section ===== */
    .ask-section {
        background: var(--white);
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 50px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-light);
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .ask-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 10px;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-label i {
        color: var(--primary);
        width: 16px;
    }

    .form-input {
        width: 100%;
        padding: 14px 16px;
        border: 1.5px solid var(--border);
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: var(--white);
        font-family: 'Inter', sans-serif;
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        transform: translateY(-1px);
    }

    .form-textarea {
        min-height: 140px;
        resize: vertical;
        line-height: 1.6;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 28px;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.5s;
    }

    .btn:hover::before {
        left: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        box-shadow: var(--shadow);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, var(--primary-dark), #1e40af);
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }

    /* ===== Button Sizes ===== */
    .btn-sm {
        padding: 8px 16px;
        font-size: 0.85rem;
        border-radius: 8px;
        gap: 6px;
        /* Tetap kecil di semua device */
    }

    .btn-outline {
        background: transparent;
        border: 1.5px solid var(--border);
        color: var(--text-medium);
        font-weight: 500;
    }

    .btn-outline:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: var(--primary-light);
        transform: translateY(-1px);
    }

    /* ===== Discussion Section Container ===== */
    .discussion-section {
        background: var(--white);
        border-radius: 20px;
        padding: 40px;
        margin-bottom: 50px;
        box-shadow: var(--shadow-lg);
        border: 1px solid var(--border-light);
        position: relative;
        width: 100%;
    }

    .discussion-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #10b981, #3b82f6);
    }

    .discussion-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border-light);
    }

    .discussion-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .discussion-subtitle {
        color: var(--text-light);
        font-size: 1rem;
    }

    /* ===== Comments Section ===== */
    .comments-section {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .comment {
        background: var(--white);
        border-radius: 16px;
        padding: 25px;
        transition: all 0.3s ease;
        position: relative;
        border: 1px solid var(--border-light);
        box-shadow: var(--shadow-sm);
    }

    .comment:hover {
        border-color: var(--primary-light);
        box-shadow: var(--shadow-lg);
        transform: translateY(-2px);
    }

    .comment-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .comment-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-weight: 600;
        font-size: 1rem;
        flex-shrink: 0;
        box-shadow: var(--shadow);
    }

    .comment-meta {
        flex: 1;
    }

    .comment-author {
        font-weight: 600;
        color: var(--text-dark);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .comment-time {
        font-size: 0.85rem;
        color: var(--text-light);
        display: flex;
        align-items: center;
        gap: 6px;
        margin-top: 2px;
    }

    .comment-content {
        color: var(--text-medium);
        line-height: 1.6;
        font-size: 1rem;
        margin-bottom: 20px;
        padding-left: 56px;
    }

    .comment-actions {
        display: flex;
        gap: 10px;
        padding-left: 56px;
    }

    /* ===== Replies ===== */
    .replies {
        margin-top: 20px;
        padding-left: 25px;
        border-left: 2px solid var(--primary-light);
        margin-left: 25px;
    }

    .reply-form {
        margin-top: 20px;
        padding: 20px;
        background: var(--primary-50);
        border-radius: 12px;
        border: 1px solid var(--primary-light);
        animation: slideDown 0.3s ease-out;
    }

    .admin-reply {
        background: linear-gradient(135deg, var(--primary-50), var(--primary-light));
        border-left: 4px solid var(--primary);
    }

    .admin-badge {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: var(--white);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        box-shadow: var(--shadow-sm);
    }

    /* ===== Empty State ===== */
    .empty-state {
        text-align: center;
        padding: 60px 30px;
        background: var(--primary-50);
        border-radius: 16px;
        border: 2px dashed var(--primary-light);
    }

    .empty-icon {
        font-size: 3.5rem;
        color: var(--primary);
        margin-bottom: 20px;
        opacity: 0.7;
    }

    .empty-title {
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 12px;
        font-size: 1.3rem;
    }

    .empty-description {
        color: var(--text-light);
        font-size: 1rem;
        max-width: 400px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ===== Success Alert ===== */
    .alert-success {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #166534;
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 0.95rem;
        font-weight: 500;
        border-left: 4px solid #10b981;
        animation: slideInRight 0.5s ease-out;
    }

    /* ===== Animations ===== */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-8px);
        }
    }

    .comment {
        animation: fadeInUp 0.5s ease-out;
    }

    /* ===== Responsive Design ===== */
    
    /* Large Desktop (1200px+) */
    @media (min-width: 1200px) {
        .forum-container {
            max-width: 1140px;
        }
    }

    /* Desktop (1024px - 1199px) */
    @media (max-width: 1199px) {
        .forum-container {
            max-width: 960px;
            padding: 0 30px;
        }
        
        .ask-section,
        .discussion-section {
            padding: 35px 30px;
        }
    }

    /* Tablet Landscape (768px - 1023px) */
    @media (max-width: 1023px) {
        .forum-hero {
            min-height: 50vh;
            padding: 70px 0 50px;
        }
        
        .hero-title {
            font-size: 2.2rem;
        }
        
        .hero-description {
            font-size: 1.05rem;
            margin-bottom: 35px;
        }
        
        .hero-stats {
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .stat-item {
            padding: 14px 18px;
            min-width: 110px;
        }
        
        .stat-number {
            font-size: 1.8rem;
        }
        
        .forum-container {
            margin: 50px auto;
            padding: 0 25px;
        }
        
        .section-title {
            font-size: 1.8rem;
        }
        
        .section-subtitle {
            font-size: 1.05rem;
        }
        
        .ask-section,
        .discussion-section {
            padding: 30px 25px;
        }
        
        .comment {
            padding: 22px;
        }
        
        .comment-content,
        .comment-actions {
            padding-left: 0;
        }
        
        .replies {
            padding-left: 20px;
            margin-left: 20px;
        }
    }

    /* Tablet Portrait (600px - 767px) */
    @media (max-width: 767px) {
        .forum-hero {
            padding: 60px 0 40px;
            min-height: auto;
        }
        
        .hero-content {
            padding: 0 15px;
        }
        
        .hero-badge {
            font-size: 0.85rem;
            padding: 8px 16px;
            margin-bottom: 20px;
        }
        
        .hero-title {
            font-size: 2rem;
            margin-bottom: 16px;
        }
        
        .hero-description {
            font-size: 1rem;
            margin-bottom: 30px;
        }
        
        .hero-stats {
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .stat-item {
            padding: 12px 16px;
            min-width: 100px;
        }
        
        .stat-number {
            font-size: 1.6rem;
        }
        
        .stat-label {
            font-size: 0.85rem;
        }
        
        .btn-hero {
            padding: 12px 24px;
            font-size: 0.95rem;
        }
        
        .forum-container {
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .section-header {
            margin-bottom: 40px;
        }
        
        .section-title {
            font-size: 1.6rem;
            margin-bottom: 12px;
        }
        
        .section-subtitle {
            font-size: 1rem;
        }
        
        .ask-section,
        .discussion-section {
            padding: 25px 20px;
            margin-bottom: 40px;
            border-radius: 16px;
        }
        
        .discussion-header {
            margin-bottom: 25px;
            padding-bottom: 15px;
        }
        
        .discussion-title {
            font-size: 1.3rem;
        }
        
        .discussion-subtitle {
            font-size: 0.95rem;
        }
        
        .comments-section {
            gap: 20px;
        }
        
        .comment {
            padding: 20px;
            border-radius: 14px;
        }
        
        .comment-header {
            gap: 10px;
            margin-bottom: 14px;
        }
        
        .comment-avatar {
            width: 40px;
            height: 40px;
            font-size: 0.95rem;
        }
        
        .comment-author {
            font-size: 0.95rem;
        }
        
        .comment-time {
            font-size: 0.8rem;
        }
        
        .comment-content {
            font-size: 0.95rem;
            margin-bottom: 16px;
        }
        
        /* Button balas tetap kecil di mobile */
        .comment-actions {
            gap: 8px;
        }
        
        .replies {
            margin-top: 16px;
            padding-left: 15px;
            margin-left: 15px;
        }
        
        .reply-form {
            padding: 18px;
            margin-top: 16px;
        }
        
        .empty-state {
            padding: 50px 25px;
        }
        
        .empty-icon {
            font-size: 3rem;
        }
        
        .empty-title {
            font-size: 1.2rem;
        }
        
        .empty-description {
            font-size: 0.95rem;
        }
        
        .alert-success {
            padding: 14px 18px;
            font-size: 0.9rem;
        }
    }

    /* Mobile (480px - 599px) */
    @media (max-width: 599px) {
        .forum-hero {
            padding: 50px 0 30px;
        }
        
        .hero-title {
            font-size: 1.8rem;
        }
        
        .hero-description {
            font-size: 0.95rem;
        }
        
        .hero-stats {
            gap: 12px;
        }
        
        .stat-item {
            padding: 10px 14px;
            min-width: 90px;
            border-radius: 10px;
        }
        
        .stat-number {
            font-size: 1.4rem;
        }
        
        .stat-label {
            font-size: 0.8rem;
        }
        
        .forum-container {
            margin: 30px auto;
            padding: 0 15px;
        }
        
        .section-header {
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 1.4rem;
        }
        
        .section-subtitle {
            font-size: 0.95rem;
        }
        
        .ask-section,
        .discussion-section {
            padding: 20px 15px;
            margin-bottom: 30px;
            border-radius: 14px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-input {
            padding: 12px 14px;
            font-size: 0.95rem;
        }
        
        .form-textarea {
            min-height: 120px;
        }
        
        /* Button utama tetap full-width di mobile kecil */
        .btn {
            padding: 12px 24px;
            font-size: 0.95rem;
            width: 100%;
            justify-content: center;
        }
        
        /* TAPI button balas tetap kecil */
        .btn-sm {
            padding: 8px 14px;
            font-size: 0.8rem;
            width: auto; /* Override width: 100% dari .btn */
        }
        
        .comment {
            padding: 18px;
        }
        
        .comment-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
        
        .comment-avatar {
            width: 36px;
            height: 36px;
            font-size: 0.9rem;
        }
        
        .comment-content,
        .comment-actions {
            padding-left: 0;
        }
        
        .comment-actions {
            flex-wrap: wrap;
        }
        
        .replies {
            padding-left: 12px;
            margin-left: 12px;
        }
    }

    /* Small Mobile (320px - 479px) */
    @media (max-width: 479px) {
        .forum-hero {
            padding: 40px 0 20px;
        }
        
        .hero-badge {
            font-size: 0.8rem;
            padding: 6px 12px;
        }
        
        .hero-title {
            font-size: 1.6rem;
        }
        
        .hero-description {
            font-size: 0.9rem;
            margin-bottom: 25px;
        }
        
        .hero-stats {
            gap: 8px;
        }
        
        .stat-item {
            padding: 8px 12px;
            min-width: 80px;
        }
        
        .stat-number {
            font-size: 1.2rem;
        }
        
        .stat-label {
            font-size: 0.75rem;
        }
        
        .btn-hero {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
        
        .forum-container {
            padding: 0 12px;
        }
        
        .section-title {
            font-size: 1.3rem;
        }
        
        .section-subtitle {
            font-size: 0.9rem;
        }
        
        .ask-section,
        .discussion-section {
            padding: 18px 12px;
        }
        
        .discussion-title {
            font-size: 1.2rem;
            gap: 8px;
        }
        
        .discussion-subtitle {
            font-size: 0.9rem;
        }
        
        .comment {
            padding: 16px;
        }
        
        .comment-content {
            font-size: 0.9rem;
        }
        
        /* Button balas tetap kecil bahkan di mobile sangat kecil */
        .btn-sm {
            padding: 7px 12px;
            font-size: 0.75rem;
        }
        
        .empty-state {
            padding: 40px 20px;
        }
        
        .empty-icon {
            font-size: 2.5rem;
        }
        
        .empty-title {
            font-size: 1.1rem;
        }
        
        .empty-description {
            font-size: 0.9rem;
        }
    }

    /* Touch Device Optimizations */
    @media (hover: none) and (pointer: coarse) {
        .comment:hover {
            transform: none;
            box-shadow: var(--shadow-sm);
        }
        
        .btn:hover::before {
            left: -100%;
        }
        
        .btn-primary:hover {
            transform: none;
        }
        
        .btn-outline:hover {
            transform: none;
        }
        
        .stat-item:hover {
            transform: none;
        }
        
        .btn-hero:hover {
            transform: none;
        }
        
        /* Pastikan button balas tetap mudah di-tap di mobile */
        .btn-sm {
            min-height: 36px;
            min-width: 70px;
        }
    }

    /* High DPI Screens */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .forum-hero::before {
            background: 
                radial-gradient(circle at 15% 50%, rgba(120, 119, 198, 0.25) 0%, transparent 50%),
                radial-gradient(circle at 85% 30%, rgba(255, 119, 198, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 50% 80%, rgba(120, 219, 255, 0.1) 0%, transparent 50%);
        }
    }

    /* Print Styles */
    @media print {
        .forum-hero {
            background: #fff !important;
            color: #000 !important;
            min-height: auto;
            padding: 20px 0;
        }
        
        .hero-badge,
        .btn-hero,
        .comment-actions {
            display: none;
        }
        
        .ask-section,
        .discussion-section {
            box-shadow: none;
            border: 1px solid #ccc;
        }
    }
</style>
@endsection

@section('content')
<!-- Enhanced Hero Section -->
<section class="forum-hero">
    <div class="hero-content">
        <div class="hero-badge">
            <i class="fa-solid fa-crown"></i>
            Forum Diskusi Pajak
        </div>
        <h1 class="hero-title">
            Tanya <span>Jawab</span> Perpajakan<br>
            Berikan Pertanyaan dan Dapatkan Jawaban
        </h1>

        <div class="hero-cta">
            <a href="#ask-section" class="btn-hero">
                <i class="fa-solid fa-rocket"></i>
                Ajukan Pertanyaan
            </a>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="forum-container">
    <!-- Ask Question Section -->
    <div class="section-header">
        <h2 class="section-title">Ajukan Pertanyaan Anda</h2>
        <p class="section-subtitle">Jelaskan pertanyaan dengan detail untuk mendapatkan solusi terbaik dari ahli pajak kami</p>
    </div>

    <div class="ask-section" id="ask-section">
        @if(session('success'))
            <div class="alert-success">
                <i class="fa-solid fa-circle-check"></i>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            
            @guest
            <div class="form-group">
                <label class="form-label">
                    <i class="fa-solid fa-user"></i>
                    Nama Lengkap
                </label>
                <input type="text" name="name" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="fa-solid fa-envelope"></i>
                    Alamat Email
                </label>
                <input type="email" name="email" class="form-input" placeholder="contoh@email.com" required>
            </div>
            @endguest

            <div class="form-group">
                <label class="form-label">
                    <i class="fa-solid fa-message"></i>
                    Pertanyaan Anda
                </label>
                <textarea name="content" class="form-input form-textarea" 
                          placeholder="Jelaskan pertanyaan Anda secara detail..." 
                          required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-paper-plane"></i>
                Kirim Pertanyaan
            </button>
        </form>
    </div>

    <!-- Discussion List Section -->
    <div class="section-header">
        <h2 class="section-title">Forum Diskusi</h2>
        <p class="section-subtitle">Temukan jawaban dari pertanyaan serupa atau mulai diskusi baru</p>
    </div>

    <!-- Discussion Container -->
    <div class="discussion-section">
        <div class="discussion-header">
            <h3 class="discussion-title">
                <i class="fa-solid fa-comments"></i>
                Diskusi Terbaru
            </h3>
            <p class="discussion-subtitle">Pertanyaan dan jawaban dari komunitas perpajakan Indonesia</p>
        </div>

        <div class="comments-section">
            @forelse ($comments as $comment)
                @include('product.konsultasi.partials.comment', ['comment' => $comment])
            @empty
                <div class="empty-state">
                    <div class="empty-icon">💭</div>
                    <h3 class="empty-title">Belum Ada Diskusi</h3>
                    <p class="empty-description">
                        Jadilah yang pertama membuka diskusi dan dapatkan solusi dari ahli pajak kami.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
function toggleReplyForm(id) {
    const form = document.getElementById(`reply-form-${id}`);
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
}

// Touch device optimizations
if ('ontouchstart' in window) {
    document.addEventListener('touchstart', function() {}, {passive: true});
}
</script>
@endsection