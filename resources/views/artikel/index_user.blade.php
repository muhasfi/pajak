@extends('layouts.master')

@section('title', 'Artikel - Paham Pajak')

@section('style')
<style>
:root {
    --primary-color: #2c5aa0;
    --secondary-color: #1e3a8a;
    --accent-color: #dc2626;
    --light-bg: #f8fafc;
    --white: #ffffff;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-300: #d1d5db;
    --gray-400: #9ca3af;
    --gray-500: #6b7280;
    --gray-600: #4b5563;
    --gray-700: #374151;
    --gray-800: #1f2937;
    --gray-900: #111827;
    --border-radius: 12px;
    --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.artikel-page {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    line-height: 1.6;
    color: var(--gray-800);
    background: var(--white);
    margin: 0;
    padding: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.artikel-container {
    max-width: 1280px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header Section - Clean White Design */
.artikel-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: var(--white);
    padding: 100px 0 60px;
    margin-bottom: 0;
    position: relative;
    overflow: hidden;
}

.artikel-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,0.05) 0%, transparent 50%);
}

.artikel-header-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
    position: relative;
    z-index: 2;
}

.artikel-header h1 {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 800;
    margin-bottom: 24px;
    color: var(--white);
    line-height: 1.1;
    letter-spacing: -0.02em;
}

.artikel-header p {
    font-size: clamp(1.1rem, 2vw, 1.3rem);
    opacity: 0.95;
    margin-bottom: 40px;
    font-weight: 400;
    line-height: 1.5;
}

/* Search Section - Clean White */
.search-section {
    background: var(--white);
    padding: 40px 0;
    margin-bottom: 0;
    border-bottom: 1px solid var(--gray-200);
}

.search-container {
    display: flex;
    gap: 16px;
    max-width: 700px;
    margin: 0 auto;
    align-items: center;
}

.search-input-wrapper {
    flex: 1;
    position: relative;
}

.search-input {
    width: 100%;
    padding: 18px 24px 18px 56px;
    border: 2px solid var(--gray-300);
    border-radius: var(--border-radius);
    font-size: 1.1rem;
    transition: all 0.3s ease;
    background: var(--white);
    font-weight: 500;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
}

.search-input-wrapper i {
    position: absolute;
    left: 24px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--gray-500);
    font-size: 1.2rem;
    z-index: 2;
}

.search-button {
    padding: 18px 32px;
    background: var(--primary-color);
    color: var(--white);
    border: none;
    border-radius: var(--border-radius);
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    display: flex;
    align-items: center;
    gap: 8px;
}

.search-button:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

/* Main Content Layout */
.artikel-main {
    display: grid;
    grid-template-columns: 2.5fr 1fr;
    gap: 50px;
    margin: 50px 0;
    align-items: start;
}

/* Featured Articles */
.featured-section {
    margin-bottom: 0;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 32px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--gray-200);
}

.section-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: var(--gray-900);
    margin: 0;
    position: relative;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -17px;
    left: 0;
    width: 60px;
    height: 3px;
    background: var(--primary-color);
    border-radius: 2px;
}

.view-all {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 700;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    padding: 8px 16px;
    border-radius: var(--border-radius);
    background: var(--gray-100);
}

.view-all:hover {
    color: var(--secondary-color);
    gap: 12px;
    background: var(--gray-200);
}

/* Artikel List - Horizontal Layout (Sama untuk semua device) */
.artikel-list {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.artikel-item {
    display: flex;
    align-items: center;
    gap: 20px;
    background: var(--white);
    border-radius: var(--border-radius);
    padding: 24px;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-200);
    position: relative;
    overflow: hidden;
}

.artikel-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: linear-gradient(to bottom, var(--primary-color) 0%, var(--secondary-color) 100%);
    transform: scaleY(0);
    transition: transform 0.3s ease;
}

.artikel-item:hover::before {
    transform: scaleY(1);
}

.artikel-item:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    border-color: var(--gray-300);
}

.artikel-image {
    width: 120px;
    height: 90px;
    min-width: 120px;
    border-radius: 8px;
    overflow: hidden;
    position: relative;
    flex-shrink: 0;
}

.artikel-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.artikel-item:hover .artikel-image img {
    transform: scale(1.05);
}

.artikel-content {
    flex: 1;
    min-width: 0;
}

.artikel-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 8px;
    font-size: 0.8rem;
}

.artikel-category {
    background: var(--primary-color);
    color: var(--white);
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.artikel-date {
    color: var(--gray-500);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 4px;
}

.artikel-title {
    font-size: 1.1rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 8px;
    color: var(--gray-900);
}

.artikel-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.artikel-title a:hover {
    color: var(--primary-color);
}

.artikel-excerpt {
    color: var(--gray-600);
    line-height: 1.5;
    margin-bottom: 12px;
    font-size: 0.9rem;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.artikel-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8rem;
    color: var(--gray-500);
}

.read-time {
    font-weight: 600;
    color: var(--gray-600);
    display: flex;
    align-items: center;
    gap: 4px;
}

.read-more {
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: all 0.3s ease;
    font-size: 0.85rem;
}

.read-more:hover {
    color: var(--secondary-color);
    gap: 8px;
}

/* Sidebar */
.sidebar {
    display: flex;
    flex-direction: column;
    gap: 30px;
    position: sticky;
    top: 100px;
}

.sidebar-widget {
    background: var(--white);
    border-radius: var(--border-radius);
    padding: 24px;
    box-shadow: var(--shadow);
    border: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.sidebar-widget:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.widget-title {
    font-size: 1.25rem;
    font-weight: 800;
    margin-bottom: 20px;
    color: var(--gray-900);
    padding-bottom: 12px;
    border-bottom: 2px solid var(--primary-color);
    position: relative;
}

/* Popular Articles */
.popular-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.popular-item {
    display: flex;
    gap: 12px;
    padding: 16px 0;
    border-bottom: 1px solid var(--gray-200);
    transition: all 0.3s ease;
}

.popular-item:hover {
    transform: translateX(4px);
}

.popular-item:last-child {
    border-bottom: none;
}

.popular-rank {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--primary-color);
    min-width: 30px;
    text-align: center;
}

.popular-content h4 {
    font-size: 0.95rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 4px;
}

.popular-content h4 a {
    color: var(--gray-800);
    text-decoration: none;
    transition: color 0.3s ease;
}

.popular-content h4 a:hover {
    color: var(--primary-color);
}

.popular-meta {
    font-size: 0.75rem;
    color: var(--gray-500);
    display: flex;
    gap: 12px;
}

.popular-meta span {
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Categories */
.category-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.category-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    background: var(--gray-100);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--gray-700);
    transition: all 0.3s ease;
    font-weight: 600;
}

.category-item:hover {
    background: var(--primary-color);
    color: var(--white);
    transform: translateX(4px);
}

.category-count {
    background: var(--white);
    color: var(--gray-600);
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 700;
    transition: all 0.3s ease;
}

.category-item:hover .category-count {
    background: var(--secondary-color);
    color: var(--white);
}

/* Tags */
.tags-container {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.tag {
    padding: 6px 12px;
    background: var(--gray-100);
    color: var(--gray-700);
    border-radius: 20px;
    font-size: 0.8rem;
    text-decoration: none;
    transition: all 0.3s ease;
    font-weight: 600;
}

.tag:hover {
    background: var(--primary-color);
    color: var(--white);
    transform: translateY(-1px);
}

/* Newsletter */
.newsletter-widget {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
    color: var(--white);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.newsletter-widget::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 20px 20px;
    animation: float 20s linear infinite;
}

@keyframes float {
    0% { transform: translate(0, 0) rotate(0deg); }
    100% { transform: translate(-20px, -20px) rotate(360deg); }
}

.newsletter-widget .widget-title {
    color: var(--white);
    border-bottom-color: rgba(255, 255, 255, 0.3);
}

.newsletter-widget p {
    margin-bottom: 20px;
    opacity: 0.95;
    font-size: 0.95rem;
    position: relative;
    z-index: 2;
    line-height: 1.5;
}

.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 12px;
    position: relative;
    z-index: 2;
}

.newsletter-input {
    padding: 14px 16px;
    border: none;
    border-radius: var(--border-radius);
    font-size: 1rem;
    font-weight: 500;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.95);
}

.newsletter-input:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
    background: var(--white);
}

.newsletter-button {
    padding: 14px 20px;
    background: var(--accent-color);
    color: var(--white);
    border: none;
    border-radius: var(--border-radius);
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.newsletter-button:hover {
    background: #b91c1c;
    transform: translateY(-2px);
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin: 40px 0 30px;
    flex-wrap: wrap;
}

.pagination-item {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
    height: 44px;
    padding: 0 12px;
    border: 2px solid var(--gray-300);
    border-radius: var(--border-radius);
    text-decoration: none;
    color: var(--gray-700);
    font-weight: 700;
    transition: all 0.3s ease;
    font-size: 0.9rem;
    background: var(--white);
}

.pagination-item:hover {
    background: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
    transform: translateY(-1px);
}

.pagination-item.active {
    background: var(--primary-color);
    color: var(--white);
    border-color: var(--primary-color);
}

.pagination-item.disabled {
    color: var(--gray-400);
    cursor: not-allowed;
    background: var(--gray-100);
    border-color: var(--gray-300);
}

.pagination-item.disabled:hover {
    background: var(--gray-100);
    color: var(--gray-400);
    border-color: var(--gray-300);
    transform: none;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 60px 30px;
    background: var(--gray-100);
    border-radius: var(--border-radius);
    border: 1px solid var(--gray-200);
}

.empty-state i {
    font-size: 3.5rem;
    color: var(--gray-400);
    margin-bottom: 20px;
    opacity: 0.7;
}

.empty-state h3 {
    font-size: 1.5rem;
    color: var(--gray-700);
    margin-bottom: 12px;
    font-weight: 700;
}

.empty-state p {
    color: var(--gray-600);
    max-width: 400px;
    margin: 0 auto;
    font-size: 1rem;
    line-height: 1.6;
}

/* ================================
   RESPONSIVE DESIGN
   ================================ */

/* Tablet Landscape */
@media (max-width: 1199px) and (min-width: 768px) {
    .artikel-main {
        grid-template-columns: 2fr 1fr;
        gap: 40px;
    }
    
    .sidebar {
        position: sticky;
        top: 90px;
    }
    
    /* Tetap pertahankan layout horizontal untuk tablet */
    .artikel-item {
        padding: 20px;
    }
    
    .artikel-image {
        width: 100px;
        height: 80px;
        min-width: 100px;
    }
}

/* Tablet Portrait */
@media (max-width: 767px) {
    .artikel-container {
        padding: 0 16px;
    }
    
    .artikel-header {
        padding: 80px 0 40px;
    }
    
    .artikel-header h1 {
        font-size: 2.2rem;
        margin-bottom: 20px;
    }
    
    .artikel-header p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }
    
    .search-section {
        padding: 30px 0;
    }
    
    .search-container {
        flex-direction: column;
        gap: 12px;
    }
    
    .search-input,
    .search-button {
        width: 100%;
        padding: 16px 20px;
    }
    
    .search-input-wrapper i {
        left: 20px;
    }
    
    /* Layout utama menjadi single column di mobile */
    .artikel-main {
        grid-template-columns: 1fr;
        gap: 40px;
        margin: 40px 0;
    }
    
    .sidebar {
        order: -1;
        position: static;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 24px;
    }
    
    .view-all {
        align-self: stretch;
        text-align: center;
        justify-content: center;
    }
    
    /* Tetap pertahankan layout horizontal untuk artikel di mobile */
    .artikel-item {
        padding: 20px;
        gap: 16px;
    }
    
    .artikel-image {
        width: 100px;
        height: 80px;
        min-width: 100px;
    }
    
    .artikel-title {
        font-size: 1rem;
    }
    
    .artikel-excerpt {
        font-size: 0.85rem;
    }
    
    .artikel-footer {
        flex-direction: row;
    }
    
    /* Sidebar Mobile Optimization */
    .sidebar-widget {
        padding: 20px;
    }
    
    .widget-title {
        font-size: 1.1rem;
        margin-bottom: 16px;
    }
    
    .popular-item {
        padding: 12px 0;
        gap: 10px;
    }
    
    .popular-rank {
        min-width: 25px;
        font-size: 1.1rem;
    }
    
    .category-item {
        padding: 10px 14px;
    }
    
    .tags-container {
        gap: 6px;
    }
    
    .tag {
        padding: 5px 10px;
        font-size: 0.75rem;
    }
    
    .newsletter-form {
        gap: 10px;
    }
    
    .pagination {
        gap: 6px;
        margin: 30px 0 20px;
    }
    
    .pagination-item {
        min-width: 40px;
        height: 40px;
        font-size: 0.85rem;
    }
}

/* Small Mobile */
@media (max-width: 480px) {
    .artikel-header {
        padding: 70px 0 30px;
    }
    
    .artikel-header h1 {
        font-size: 1.8rem;
    }
    
    .artikel-header p {
        font-size: 1.1rem;
    }
    
    .search-section {
        padding: 20px 0;
    }
    
    /* Tetap horizontal layout untuk artikel di small mobile */
    .artikel-item {
        padding: 16px;
        gap: 12px;
    }
    
    .artikel-image {
        width: 80px;
        height: 60px;
        min-width: 80px;
    }
    
    .artikel-title {
        font-size: 0.95rem;
        margin-bottom: 6px;
    }
    
    .artikel-excerpt {
        font-size: 0.8rem;
        margin-bottom: 8px;
        -webkit-line-clamp: 2;
    }
    
    .artikel-meta {
        gap: 8px;
        margin-bottom: 6px;
    }
    
    .artikel-category {
        font-size: 0.65rem;
        padding: 3px 8px;
    }
    
    .artikel-date {
        font-size: 0.75rem;
    }
    
    .artikel-footer {
        font-size: 0.75rem;
    }
    
    .sidebar-widget {
        padding: 16px;
    }
    
    .popular-item {
        flex-direction: row;
        text-align: left;
    }
    
    .popular-meta {
        flex-direction: column;
        gap: 4px;
    }
    
    .empty-state {
        padding: 40px 20px;
    }
    
    .empty-state h3 {
        font-size: 1.3rem;
    }
    
    .empty-state p {
        font-size: 0.9rem;
    }
}

/* Extra Small Mobile */
@media (max-width: 360px) {
    .artikel-container {
        padding: 0 12px;
    }
    
    .artikel-header h1 {
        font-size: 1.6rem;
    }
    
    .artikel-item {
        padding: 12px;
        gap: 10px;
    }
    
    .artikel-image {
        width: 70px;
        height: 55px;
        min-width: 70px;
    }
    
    .artikel-title {
        font-size: 0.9rem;
    }
    
    .sidebar-widget {
        padding: 14px;
    }
    
    .tags-container {
        justify-content: center;
    }
}

/* Animations */
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

.artikel-item {
    animation: fadeInUp 0.5s ease forwards;
}

.artikel-item:nth-child(1) { animation-delay: 0.1s; }
.artikel-item:nth-child(2) { animation-delay: 0.2s; }
.artikel-item:nth-child(3) { animation-delay: 0.3s; }
.artikel-item:nth-child(4) { animation-delay: 0.4s; }
.artikel-item:nth-child(5) { animation-delay: 0.5s; }

/* Loading States */
.loading {
    opacity: 0.7;
    pointer-events: none;
    position: relative;
}

.loading::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    border: 2px solid var(--gray-300);
    border-top: 2px solid var(--primary-color);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}

/* Utility Classes */
.text-gradient {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.badge {
    display: inline-block;
    padding: 4px 8px;
    background: var(--accent-color);
    color: var(--white);
    border-radius: 12px;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

/* Fix untuk memastikan navbar tetap tampil */
body {
    overflow-x: hidden;
    background: var(--white);
}

/* Pastikan konten tidak tertutup navbar */
main {
    position: relative;
    z-index: 1;
    background: var(--white);
}

/* Tambahan utility untuk spacing */
.mb-0 { margin-bottom: 0 !important; }
.mt-0 { margin-top: 0 !important; }
.pb-0 { padding-bottom: 0 !important; }
.pt-0 { padding-top: 0 !important; }

/* Pastikan semua background putih */
.artikel-page,
.artikel-main,
.artikel-content,
.featured-section,
.search-section {
    background: var(--white);
}
</style>
@endsection

@section('content')
<div class="artikel-page">
    <!-- Header Section -->
    <header class="artikel-header">
        <div class="artikel-container">
            <div class="artikel-header-content">
                <h1>Artikel Pajak & Keuangan</h1>
                <p>Update terbaru seputar perpajakan, kebijakan fiskal, dan tips keuangan dari para ahli</p>
            </div>
        </div>
    </header>

    <!-- Search Section -->
    <section class="search-section">
        <div class="artikel-container">
            <form action="{{ url()->current() }}" method="GET" class="search-container">
                <div class="search-input-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" class="search-input" placeholder="Cari artikel tentang pajak, keuangan, investasi..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="search-button">
                    <i class="fas fa-search"></i> Cari Artikel
                </button>
            </form>
        </div>
    </section>

    <!-- Main Content -->
    <main class="artikel-container">
        <div class="artikel-main">
            <!-- Artikel List -->
            <div class="artikel-content">
                @if($artikels->count())
                    <!-- Featured Articles -->
                    <section class="featured-section">
                        <div class="section-header">
                            <h2 class="section-title">Artikel Terbaru</h2>
                            <a href="#" class="view-all">
                                Lihat Semua
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        
                        <div class="artikel-list">
                            @foreach ($artikels as $artikel)
                                <article class="artikel-item">
                                    <div class="artikel-image">
                                        @if($artikel->thumbnail)
                                            <img src="{{ asset('storage/'.$artikel->thumbnail) }}" alt="{{ $artikel->title }}" loading="lazy">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" alt="{{ $artikel->title }}" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="artikel-content">
                                        <div class="artikel-meta">
                                            @if($artikel->category)
                                                <span class="artikel-category">{{ $artikel->category->name }}</span>
                                            @endif
                                            <span class="artikel-date">
                                                <i class="far fa-calendar"></i>
                                                {{ \Carbon\Carbon::parse($artikel->publish_date)->format('d M Y') }}
                                            </span>
                                        </div>
                                        <h3 class="artikel-title">
                                            <a href="{{ route('artikel.user.show', $artikel->slug) }}">
                                                {{ $artikel->title }}
                                            </a>
                                        </h3>
                                        <p class="artikel-excerpt">{{ Str::limit($artikel->excerpt, 120) }}</p>
                                        <div class="artikel-footer">
                                            <span class="read-time">
                                                <i class="far fa-clock"></i>
                                                {{ rand(3, 8) }} min read
                                            </span>
                                            <a href="{{ route('artikel.user.show', $artikel->slug) }}" class="read-more">
                                                Baca Selengkapnya
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>

                    <!-- Pagination -->
                    @if($artikels->hasPages())
                        <div class="pagination">
                            {{-- Previous Page --}}
                            @if ($artikels->onFirstPage())
                                <span class="pagination-item disabled">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $artikels->previousPageUrl() }}" class="pagination-item">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            {{-- Pagination Numbers --}}
                            @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                                @if ($page == $artikels->currentPage())
                                    <span class="pagination-item active">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="pagination-item">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page --}}
                            @if ($artikels->hasMorePages())
                                <a href="{{ $artikels->nextPageUrl() }}" class="pagination-item">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span class="pagination-item disabled">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </div>
                    @endif
                @else
                    <!-- Empty State -->
                    <div class="empty-state">
                        <i class="fas fa-newspaper"></i>
                        <h3>Tidak ada artikel tersedia</h3>
                        <p>
                            @if(request('search'))
                                Hasil pencarian untuk "{{ request('search') }}" tidak ditemukan. Coba gunakan kata kunci lain atau lihat artikel terbaru kami.
                            @else
                                Maaf, saat ini belum ada artikel yang tersedia. Silakan kembali lagi nanti untuk membaca artikel terbaru seputar perpajakan dan keuangan.
                            @endif
                        </p>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <aside class="sidebar">
                <!-- Popular Articles -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-fire"></i>
                        Artikel Populer
                    </h3>
                    <div class="popular-list">
                        @php
                            $popularArticles = [
                                ['title' => 'Cara Mudah Lapor SPT Tahunan 2024', 'views' => '1.2K', 'days' => '2'],
                                ['title' => 'Tips Mengoptimalkan Pajak untuk UMKM', 'views' => '980', 'days' => '3'],
                                ['title' => 'Panduan Lengkap PPN 11% 2024', 'views' => '1.5K', 'days' => '1'],
                                ['title' => 'Investasi yang Efisien Secara Pajak', 'views' => '850', 'days' => '5'],
                                ['title' => 'Update Terbaru Tax Amnesty Jilid II', 'views' => '2.1K', 'days' => '1']
                            ];
                        @endphp
                        @foreach($popularArticles as $index => $article)
                            <div class="popular-item">
                                <div class="popular-rank">{{ $index + 1 }}</div>
                                <div class="popular-content">
                                    <h4>
                                        <a href="#">{{ $article['title'] }}</a>
                                    </h4>
                                    <div class="popular-meta">
                                        <span><i class="far fa-eye"></i> {{ $article['views'] }} views</span>
                                        <span><i class="far fa-clock"></i> {{ $article['days'] }} days ago</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Categories -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-folder"></i>
                        Kategori
                    </h3>
                    <div class="category-list">
                        @php
                            $categories = [
                                ['name' => 'Berita Pajak', 'count' => 24],
                                ['name' => 'Tips Keuangan', 'count' => 18],
                                ['name' => 'Kebijakan Fiskal', 'count' => 12],
                                ['name' => 'PPN & PPh', 'count' => 32],
                                ['name' => 'UMKM', 'count' => 15],
                                ['name' => 'Investasi', 'count' => 9]
                            ];
                        @endphp
                        @foreach($categories as $category)
                            <a href="#" class="category-item">
                                <span>{{ $category['name'] }}</span>
                                <span class="category-count">{{ $category['count'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Tags -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-tags"></i>
                        Tags Populer
                    </h3>
                    <div class="tags-container">
                        @php
                            $tags = ['SPT', 'PPN', 'PPh', 'UMKM', 'E-Filing', 'Tax Amnesty', 'Keuangan', 'Investasi', 'Pajak', 'Fiskal', 'DJP', 'E-Billing'];
                        @endphp
                        @foreach($tags as $tag)
                            <a href="#" class="tag">#{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="sidebar-widget newsletter-widget">
                    <h3 class="widget-title">
                        <i class="fas fa-paper-plane"></i>
                        Newsletter
                    </h3>
                    <p>Dapatkan update terbaru seputar perpajakan langsung di email Anda</p>
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Masukkan email Anda" required>
                        <button type="submit" class="newsletter-button">
                            <i class="fas fa-paper-plane"></i> Berlangganan
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </main>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search form enhancement
    const searchForm = document.querySelector('.search-container');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            const button = this.querySelector('.search-button');
            const originalHTML = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mencari...';
            button.disabled = true;
            
            setTimeout(() => {
                button.innerHTML = originalHTML;
                button.disabled = false;
            }, 2000);
        });
    }

    // Newsletter subscription
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('.newsletter-button');
            const originalHTML = button.innerHTML;
            
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
            button.disabled = true;
            
            // Simulasi proses berlangganan
            setTimeout(() => {
                button.innerHTML = '<i class="fas fa-check"></i> Berhasil!';
                setTimeout(() => {
                    button.innerHTML = originalHTML;
                    button.disabled = false;
                    this.reset();
                    
                    // Tampilkan notifikasi sukses
                    showNotification('Berhasil berlangganan newsletter!', 'success');
                }, 2000);
            }, 1500);
        });
    }

    // Intersection Observer untuk animasi
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe artikel items
    document.querySelectorAll('.artikel-item').forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(item);
    });

    // Fungsi untuk menampilkan notifikasi
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <i class="fas fa-${type === 'success' ? 'check' : 'info'}-circle"></i>
                <span>${message}</span>
            </div>
        `;
        
        // Style untuk notifikasi
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: ${type === 'success' ? '#10b981' : '#3b82f6'};
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            box-shadow: var(--shadow-lg);
            z-index: 1000;
            transform: translateX(400px);
            transition: transform 0.3s ease;
            max-width: 300px;
        `;
        
        document.body.appendChild(notification);
        
        // Animasi masuk
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Hapus setelah 3 detik
        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

    // Touch device optimization
    if ('ontouchstart' in window) {
        document.body.classList.add('touch-device');
    }

    // Lazy loading images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>
@endpush