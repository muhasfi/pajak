{{-- Footer Styles --}}
<style>
    /* Footer */
    footer {
        background: var(--gradient-primary);
        color: #fff;
        padding: 3rem 0 1rem;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .footer-section h3 {
        margin-bottom: 1.5rem;
        color: #fff;
        position: relative;
        display: inline-block;
    }

    .footer-section h3::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 40px;
        height: 3px;
        background: var(--gradient-accent);
        border-radius: 2px;
    }

    .footer-section p,
    .footer-section a {
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        margin-bottom: 0.8rem;
        display: block;
        transition: var(--transition);
    }

    .footer-section a:hover {
        color: #fff;
        padding-left: 5px;
    }

    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .social-links a {
        width: 40px;
        height: 40px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        margin-bottom: 0;
    }

    .social-links a:hover {
        background: #fff;
        color: var(--primary);
        transform: translateY(-3px);
    }

    .footer-bottom {
        border-top: 1px solid rgba(255,255,255,0.1);
        padding-top: 1.5rem;
        margin-top: 2rem;
        text-align: center;
    }
</style>

{{-- Footer HTML --}}
<footer id="kontak">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Paham Pajak</h3>
                <p>Solusi perpajakan terpercaya untuk semua kebutuhan Anda. Konsultasi profesional dengan tim ahli berpengalaman.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Layanan</h3>
                <a href="#produk">Buku & Artikel</a>
                <a href="#kelas">Kelas Bimbingan</a>
                <a href="#pelatihan">Pelatihan & Workshop</a>
                <a href="#konsultasi">Konsultasi Pajak</a>
            </div>
            
            <div class="footer-section">
                <h3>Kontak</h3>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Pajak Raya No. 123, Jakarta</p>
                <p><i class="fas fa-phone"></i> +62 21 1234 5678</p>
                <p><i class="fas fa-envelope"></i> info@pahampajak.com</p>
                <p><i class="fas fa-clock"></i> Senin - Jumat: 08:00 - 17:00</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 Paham Pajak. All rights reserved. | Made with ❤️ for better tax understanding</p>
        </div>
    </div>
</footer>