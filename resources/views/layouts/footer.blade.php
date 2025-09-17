{{-- Footer Styles --}}
<style>
:root {
    --primary: #007bff; /* sama seperti navbar */
    --gradient-primary: linear-gradient(135deg, #1e3c72, #2a5298); /* gradient navbar */
    --gradient-accent: linear-gradient(135deg, #ffd700, #ffb400);
    --transition: all 0.3s ease;
}

/* Footer */
footer {
    background: var(--gradient-primary); /* sama dengan navbar */
    color: #ddd;
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2.5rem;
    margin-bottom: 2.5rem;
}

.footer-section h3 {
    font-size: 1.3rem;
    margin-bottom: 1.5rem;
    color: #fff;
    position: relative;
    display: inline-block;
    font-weight: 600;
    letter-spacing: 0.5px;
}

.footer-section h3::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 45px;
    height: 3px;
    background: var(--gradient-accent); /* aksen sama navbar */
    border-radius: 2px;
}

.footer-section p,
.footer-section a {
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    margin-bottom: 0.7rem;
    display: block;
    line-height: 1.6;
    font-size: 0.95rem;
    transition: var(--transition);
}

.footer-section a:hover {
    color: #fff;
    transform: translateX(4px);
}

/* Social Links */
.social-links {
    display: flex;
    gap: 0.8rem;
    margin-top: 1.5rem;
}

.social-links a {
    width: 42px;
    height: 42px;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1rem;
    transition: var(--transition);
}

.social-links a:hover {
    background: #fff;
    color: var(--primary);
    transform: translateY(-3px);
}

/* Icons in contact */
.footer-section p i {
    margin-right: 8px;
    color: var(--gradient-accent);
    width: 18px;
    text-align: center;
}

/* Footer Bottom */
.footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.15);
    padding-top: 1rem;
    text-align: center;
    font-size: 0.9rem;
    color: rgba(255,255,255,0.7);
}

/* Responsive tweak */
@media (max-width: 600px) {
    .footer-section h3 {
        font-size: 1.2rem;
    }
    .social-links a {
        width: 38px;
        height: 38px;
        font-size: 0.9rem;
    }
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
