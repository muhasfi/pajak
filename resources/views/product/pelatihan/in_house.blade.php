@extends('layouts.master')

@section('title', 'In-House Training Perpajakan')

@section('content')
<section class="inhouse-training-page">
    <!-- Hero Section -->
    <div class="training-hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <span class="title-line">In-House</span>
                        <span class="title-line highlight">Training</span>
                    </h1>
                    <p class="hero-subtitle">
                        Program pelatihan <span class="text-highlight">kustom</span> yang dirancang khusus untuk 
                        <span class="text-highlight">perusahaan</span> Anda dengan materi yang <span class="text-highlight">relevan</span>
                    </p>
                    <p class="hero-description">
                        Tingkatkan kompetensi tim perpajakan Anda dengan training yang disesuaikan dengan kebutuhan spesifik, 
                        budaya perusahaan, dan tantangan bisnis yang dihadapi.
                    </p>
                    <div class="hero-actions">
                        <a href="#consultation" class="btn btn-primary">
                            <span>Konsultasi Gratis</span>
                            <i class="fas fa-calendar-check"></i>
                        </a>
                        <a href="#programs" class="btn btn-outline-light">
                            <span>Lihat Program</span>
                            <i class="fas fa-arrow-down"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-stats">
                        <div class="stat-item">
                            <span class="stat-number">200+</span>
                            <span class="stat-label">Perusahaan Klien</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">500+</span>
                            <span class="stat-label">Training Terselenggara</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">98%</span>
                            <span class="stat-label">Kepuasan Klien</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Trainer Berpengalaman</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Benefits Section -->
    <div class="benefits-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Mengapa Memilih In-House Training?</h2>
                <p class="section-subtitle">Keunggulan program training yang disesuaikan khusus untuk perusahaan Anda</p>
            </div>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h4>Materi Customized</h4>
                    <p>Konten training disesuaikan dengan kebutuhan spesifik, industri, dan tantangan bisnis perusahaan Anda</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h4>Fleksibel Jadwal</h4>
                    <p>Jadwal training dapat disesuaikan dengan kesibukan operasional perusahaan tanpa mengganggu produktivitas</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Private Session</h4>
                    <p>Training eksklusif hanya untuk tim internal perusahaan dengan diskusi yang lebih mendalam dan personal</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Cost Effective</h4>
                    <p>Lebih hemat biaya untuk jumlah peserta banyak dibandingkan public training dengan kualitas yang sama</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Team Building</h4>
                    <p>Meningkatkan kohesi tim dan membangun pemahaman bersama tentang sistem dan prosedur perusahaan</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h4>Case Study Relevan</h4>
                    <p>Studi kasus berdasarkan situasi aktual perusahaan untuk solusi yang langsung dapat diimplementasikan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <div id="programs" class="programs-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Program In-House Training</h2>
                <p class="section-subtitle">Pilih program training yang sesuai dengan kebutuhan pengembangan tim Anda</p>
            </div>

            <div class="programs-tabs">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="tax-programs">Program Perpajakan</button>
                    <button class="tab-button" data-tab="accounting-programs">Akuntansi & Audit</button>
                    <button class="tab-button" data-tab="soft-skills">Soft Skills</button>
                    <button class="tab-button" data-tab="custom-program">Program Kustom</button>
                </div>

                <div class="tab-content">
                    <!-- Tax Programs -->
                    <div class="tab-pane active" id="tax-programs">
                        <div class="programs-grid">
                            <div class="program-card">
                                <div class="program-header">
                                    <h3>Tax Compliance Excellence</h3>
                                    <div class="program-level">Intermediate</div>
                                </div>
                                <div class="program-body">
                                    <div class="program-features">
                                        <div class="feature">
                                            <i class="fas fa-clock"></i>
                                            <span>2 Hari</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-users"></i>
                                            <span>Max 25 Peserta</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-file-alt"></i>
                                            <span>Sertifikat</span>
                                        </div>
                                    </div>
                                    <ul class="program-topics">
                                        <li>Update Regulasi Perpajakan Terkini</li>
                                        <li>Teknik Penyusunan SPT yang Akurat</li>
                                        <li>Manajemen Dokumen Perpajakan</li>
                                        <li>Strategi Compliance yang Efektif</li>
                                        <li>Handling Tax Audit Preparation</li>
                                    </ul>
                                    <div class="program-target">
                                        <strong>Target Peserta:</strong> Tax Staff, Accounting Staff, Finance Officer
                                    </div>
                                </div>
                                <div class="program-footer">
                                    <button class="btn btn-outline">
                                        <i class="fas fa-info-circle"></i>
                                        Detail
                                    </button>
                                    <button class="btn btn-primary">
                                        Request Proposal
                                    </button>
                                </div>
                            </div>

                            <div class="program-card featured">
                                <div class="program-badge">Most Popular</div>
                                <div class="program-header">
                                    <h3>Advanced Tax Planning Strategy</h3>
                                    <div class="program-level">Advanced</div>
                                </div>
                                <div class="program-body">
                                    <div class="program-features">
                                        <div class="feature">
                                            <i class="fas fa-clock"></i>
                                            <span>3 Hari</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-users"></i>
                                            <span>Max 20 Peserta</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-file-alt"></i>
                                            <span>Sertifikat & Toolkit</span>
                                        </div>
                                    </div>
                                    <ul class="program-topics">
                                        <li>Corporate Tax Optimization Strategy</li>
                                        <li>Transfer Pricing Documentation</li>
                                        <li>Tax Incentive Utilization</li>
                                        <li>M&A Tax Planning</li>
                                        <li>International Tax Considerations</li>
                                    </ul>
                                    <div class="program-target">
                                        <strong>Target Peserta:</strong> Tax Manager, Finance Manager, Corporate Planner
                                    </div>
                                </div>
                                <div class="program-footer">
                                    <button class="btn btn-outline">
                                        <i class="fas fa-info-circle"></i>
                                        Detail
                                    </button>
                                    <button class="btn btn-primary">
                                        Request Proposal
                                    </button>
                                </div>
                            </div>

                            <div class="program-card">
                                <div class="program-header">
                                    <h3>PPN & PPnBM Mastery</h3>
                                    <div class="program-level">All Levels</div>
                                </div>
                                <div class="program-body">
                                    <div class="program-features">
                                        <div class="feature">
                                            <i class="fas fa-clock"></i>
                                            <span>2 Hari</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-users"></i>
                                            <span>Max 30 Peserta</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-file-alt"></i>
                                            <span>Sertifikat</span>
                                        </div>
                                    </div>
                                    <ul class="program-topics">
                                        <li>Fundamental PPN & Mekanisme</li>
                                        <li>Faktur Pajak & Administrasi</li>
                                        <li>PPN atas Impor & Ekspor</li>
                                        <li>PPnBM & Barang Mewah</li>
                                        <li>Restitusi & Kompensasi PPN</li>
                                    </ul>
                                    <div class="program-target">
                                        <strong>Target Peserta:</strong> AP Staff, Tax Staff, Procurement Team
                                    </div>
                                </div>
                                <div class="program-footer">
                                    <button class="btn btn-outline">
                                        <i class="fas fa-info-circle"></i>
                                        Detail
                                    </button>
                                    <button class="btn btn-primary">
                                        Request Proposal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accounting Programs -->
                    <div class="tab-pane" id="accounting-programs">
                        <div class="programs-grid">
                            <div class="program-card">
                                <div class="program-header">
                                    <h3>Financial Reporting Excellence</h3>
                                    <div class="program-level">Intermediate</div>
                                </div>
                                <div class="program-body">
                                    <div class="program-features">
                                        <div class="feature">
                                            <i class="fas fa-clock"></i>
                                            <span>2 Hari</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-users"></i>
                                            <span>Max 25 Peserta</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-file-alt"></i>
                                            <span>Sertifikat</span>
                                        </div>
                                    </div>
                                    <ul class="program-topics">
                                        <li>PSAK Update & Implementation</li>
                                        <li>Financial Statement Preparation</li>
                                        <li>Notes to Financial Statements</li>
                                        <li>Consolidation Techniques</li>
                                        <li>Reporting Deadline Management</li>
                                    </ul>
                                    <div class="program-target">
                                        <strong>Target Peserta:</strong> Accounting Staff, Financial Analyst
                                    </div>
                                </div>
                                <div class="program-footer">
                                    <button class="btn btn-outline">
                                        <i class="fas fa-info-circle"></i>
                                        Detail
                                    </button>
                                    <button class="btn btn-primary">
                                        Request Proposal
                                    </button>
                                </div>
                            </div>

                            <div class="program-card">
                                <div class="program-header">
                                    <h3>Internal Audit Workshop</h3>
                                    <div class="program-level">Advanced</div>
                                </div>
                                <div class="program-body">
                                    <div class="program-features">
                                        <div class="feature">
                                            <i class="fas fa-clock"></i>
                                            <span>3 Hari</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-users"></i>
                                            <span>Max 20 Peserta</span>
                                        </div>
                                        <div class="feature">
                                            <i class="fas fa-file-alt"></i>
                                            <span>Sertifikat & Toolkit</span>
                                        </div>
                                    </div>
                                    <ul class="program-topics">
                                        <li>Risk-Based Audit Planning</li>
                                        <li>Audit Methodology & Techniques</li>
                                        <li>Fraud Detection & Prevention</li>
                                        <li>Audit Reporting & Communication</li>
                                        <li>Follow-up & Monitoring</li>
                                    </ul>
                                    <div class="program-target">
                                        <strong>Target Peserta:</strong> Internal Auditor, Compliance Officer
                                    </div>
                                </div>
                                <div class="program-footer">
                                    <button class="btn btn-outline">
                                        <i class="fas fa-info-circle"></i>
                                        Detail
                                    </button>
                                    <button class="btn btn-primary">
                                        Request Proposal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Custom Program -->
                    <div class="tab-pane" id="custom-program">
                        <div class="custom-program-content">
                            <div class="custom-program-text">
                                <h3>Program Training Kustom</h3>
                                <p>Kami memahami bahwa setiap perusahaan memiliki kebutuhan yang unik. Program kustom dirancang khusus berdasarkan:</p>
                                <ul>
                                    <li>Analisis kebutuhan training (Training Needs Analysis)</li>
                                    <li>Budaya dan nilai-nilai perusahaan</li>
                                    <li>Tantangan bisnis spesifik yang dihadapi</li>
                                    <li>Tingkat kompetensi tim saat ini</li>
                                    <li>Objective dan KPI yang ingin dicapai</li>
                                </ul>
                                <div class="custom-process">
                                    <h4>Proses Pengembangan Program Kustom:</h4>
                                    <div class="process-steps">
                                        <div class="process-step">
                                            <div class="step-number">1</div>
                                            <div class="step-content">
                                                <h5>Konsultasi Awal</h5>
                                                <p>Diskusi kebutuhan dan tujuan training</p>
                                            </div>
                                        </div>
                                        <div class="process-step">
                                            <div class="step-number">2</div>
                                            <div class="step-content">
                                                <h5>Training Needs Analysis</h5>
                                                <p>Analisis mendalam kebutuhan perusahaan</p>
                                            </div>
                                        </div>
                                        <div class="process-step">
                                            <div class="step-number">3</div>
                                            <div class="step-content">
                                                <h5>Program Development</h5>
                                                <p>Penyusunan materi dan kurikulum kustom</p>
                                            </div>
                                        </div>
                                        <div class="process-step">
                                            <div class="step-number">4</div>
                                            <div class="step-content">
                                                <h5>Implementation</h5>
                                                <p>Pelaksanaan training dengan monitoring</p>
                                            </div>
                                        </div>
                                        <div class="process-step">
                                            <div class="step-number">5</div>
                                            <div class="step-content">
                                                <h5>Evaluation & Follow-up</h5>
                                                <p>Evaluasi hasil dan rencana tindak lanjut</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-program-form">
                                <div class="form-container">
                                    <h4>Konsultasi Program Kustom</h4>
                                    <form class="consultation-form">
                                        <div class="form-group">
                                            <input type="text" placeholder="Nama Perusahaan" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Nama PIC" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" placeholder="Email Perusahaan" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" placeholder="Nomor Telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <select required>
                                                <option value="">Jumlah Peserta</option>
                                                <option value="1-10">1-10 Peserta</option>
                                                <option value="11-25">11-25 Peserta</option>
                                                <option value="26-50">26-50 Peserta</option>
                                                <option value="50+">50+ Peserta</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Deskripsi Kebutuhan Training" rows="4" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Request Konsultasi
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Process Section -->
    <div class="process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Proses In-House Training</h2>
                <p class="section-subtitle">Alur kerja yang terstruktur untuk memastikan keberhasilan program training</p>
            </div>
            <div class="process-timeline">
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <div class="process-content">
                        <h4>1. Needs Assessment</h4>
                        <p>Analisis kebutuhan training melalui diskusi dengan manajemen dan assessment kompetensi tim</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                    <div class="process-content">
                        <h4>2. Program Design</h4>
                        <p>Penyusunan kurikulum, materi, dan metode training yang disesuaikan dengan kebutuhan perusahaan</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="process-content">
                        <h4>3. Training Execution</h4>
                        <p>Pelaksanaan training oleh trainer berpengalaman dengan pendekatan interaktif dan praktis</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div class="process-content">
                        <h4>4. Evaluation & Report</h4>
                        <p>Evaluasi hasil training dan penyusunan laporan perkembangan kompetensi peserta</p>
                    </div>
                </div>
                <div class="process-item">
                    <div class="process-icon">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="process-content">
                        <h4>5. Follow-up Support</h4>
                        <p>Dukungan pasca training untuk memastikan implementasi materi dalam pekerjaan sehari-hari</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Clients Section -->
    <div class="clients-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Perusahaan yang Telah Mempercayai Kami</h2>
                <p class="section-subtitle">Bergabung dengan ratusan perusahaan terkemuka yang telah meningkatkan kompetensi tim mereka</p>
            </div>
            <div class="clients-grid">
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-building"></i>
                    </div>
                    <h4>Manufacturing</h4>
                    <p>Perusahaan manufaktur dengan 5000+ karyawan</p>
                </div>
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-university"></i>
                    </div>
                    <h4>Banking & Finance</h4>
                    <p>Lembaga keuangan terkemuka di Indonesia</p>
                </div>
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h4>Retail & Commerce</h4>
                    <p>Perusahaan retail dengan jaringan nasional</p>
                </div>
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-oil-well"></i>
                    </div>
                    <h4>Oil & Gas</h4>
                    <p>Perusahaan energi dan migas multinasional</p>
                </div>
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h4>Logistics</h4>
                    <p>Perusahaan logistik dan supply chain</p>
                </div>
                <div class="client-card">
                    <div class="client-logo">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h4>Technology</h4>
                    <p>Startup dan perusahaan teknologi terdepan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div id="consultation" class="cta-section">
        <div class="container">
            <div class="cta-content">
                <div class="cta-text">
                    <h3>Siap Mengembangkan Tim Perpajakan Anda?</h3>
                    <p>Konsultasikan kebutuhan training perusahaan Anda secara gratis dengan expert kami</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --primary-blue: #2563eb;
    --secondary-blue: #1d4ed8;
    --dark-blue: #1e40af;
    --light-blue: #dbeafe;
    --primary-green: #059669;
    --primary-purple: #7c3aed;
    --white: #ffffff;
    --gray-50: #f8fafc;
    --gray-100: #f1f5f9;
    --gray-200: #e2e8f0;
    --gray-300: #cbd5e1;
    --gray-400: #94a3b8;
    --gray-500: #64748b;
    --gray-600: #475569;
    --gray-700: #334155;
    --gray-800: #1e293b;
    --gray-900: #0f172a;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
    --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
    --border-radius: 12px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.inhouse-training-page {
    min-height: 100vh;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* =========================
   HERO SECTION
   ========================= */
.training-hero {
    background: linear-gradient(135deg, #1e40af 0%, #2563eb 50%, #3b82f6 100%);
    color: var(--white);
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.hero-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.hero-text {
    max-width: 600px;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
}

.title-line {
    display: block;
}

.title-line.highlight {
    background: linear-gradient(135deg, #fde68a, #fcd34d);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.3rem;
    line-height: 1.6;
    margin-bottom: 1.5rem;
    opacity: 0.9;
}

.text-highlight {
    font-weight: 600;
    color: #fde68a;
}

.hero-description {
    font-size: 1.1rem;
    line-height: 1.7;
    margin-bottom: 2.5rem;
    opacity: 0.8;
}

.hero-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.hero-stats {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.stat-item {
    text-align: center;
    padding: 2rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-number {
    display: block;
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    color: var(--white);
}

.stat-label {
    font-size: 0.9rem;
    font-weight: 500;
    opacity: 0.9;
}

/* =========================
   BUTTONS
   ========================= */
.btn {
    padding: 1rem 2rem;
    border-radius: var(--border-radius);
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.025em;
    transition: var(--transition);
    cursor: pointer;
    border: 2px solid;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-primary {
    background: var(--primary-blue);
    border-color: var(--primary-blue);
    color: var(--white);
}

.btn-primary:hover {
    background: var(--secondary-blue);
    border-color: var(--secondary-blue);
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.btn-outline-light {
    background: transparent;
    border-color: var(--white);
    color: var(--white);
}

.btn-outline-light:hover {
    background: var(--white);
    color: var(--primary-blue);
    transform: translateY(-2px);
}

.btn-outline {
    background: transparent;
    border-color: var(--gray-300);
    color: var(--gray-600);
}

.btn-outline:hover {
    background: var(--gray-50);
    border-color: var(--gray-400);
    color: var(--gray-700);
}

.btn-light {
    background: var(--white);
    border-color: var(--white);
    color: var(--gray-800);
}

.btn-light:hover {
    background: var(--gray-100);
    border-color: var(--gray-100);
    transform: translateY(-2px);
}

.btn-block {
    width: 100%;
}

/* =========================
   BENEFITS SECTION
   ========================= */
.benefits-section {
    padding: 100px 0;
    background: var(--gray-50);
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-title {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.section-subtitle {
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
    color: var(--gray-600);
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.benefit-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    border: 1px solid var(--gray-200);
}

.benefit-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.benefit-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
    color: var(--white);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
}

.benefit-card h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.benefit-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
}

/* =========================
   PROGRAMS SECTION
   ========================= */
.programs-section {
    padding: 100px 0;
    background: var(--white);
}

.programs-tabs {
    max-width: 1200px;
    margin: 0 auto;
}

.tab-buttons {
    display: flex;
    gap: 1rem;
    margin-bottom: 3rem;
    flex-wrap: wrap;
    justify-content: center;
}

.tab-button {
    padding: 1rem 2rem;
    background: var(--white);
    border: 2px solid var(--gray-300);
    border-radius: 25px;
    font-weight: 600;
    color: var(--gray-600);
    cursor: pointer;
    transition: var(--transition);
}

.tab-button:hover {
    border-color: var(--primary-blue);
    color: var(--primary-blue);
}

.tab-button.active {
    background: var(--primary-blue);
    border-color: var(--primary-blue);
    color: var(--white);
}

.tab-content {
    background: var(--gray-50);
    border-radius: 20px;
    padding: 3rem;
}

.tab-pane {
    display: none;
}

.tab-pane.active {
    display: block;
}

.programs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
}

.program-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    position: relative;
    border: 1px solid var(--gray-200);
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.program-card.featured {
    border: 2px solid var(--primary-blue);
    transform: scale(1.05);
}

.program-card.featured:hover {
    transform: scale(1.05) translateY(-5px);
}

.program-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--primary-green);
    color: var(--white);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.program-header {
    padding: 2rem 2rem 1rem;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
    color: var(--white);
}

.program-header h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--white);
}

.program-level {
    background: rgba(255, 255, 255, 0.2);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
    display: inline-block;
}

.program-body {
    padding: 1.5rem 2rem;
}

.program-features {
    display: flex;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--gray-200);
}

.feature {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: var(--gray-600);
}

.feature i {
    color: var(--primary-blue);
    width: 16px;
}

.program-topics {
    list-style: none;
    padding: 0;
    margin: 0 0 1.5rem 0;
}

.program-topics li {
    padding: 0.5rem 0;
    color: var(--gray-600);
    position: relative;
    padding-left: 1.5rem;
    font-size: 0.9rem;
}

.program-topics li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--primary-green);
    font-weight: 600;
}

.program-target {
    font-size: 0.875rem;
    color: var(--gray-600);
    padding: 1rem;
    background: var(--gray-50);
    border-radius: 8px;
    margin-bottom: 1rem;
}

.program-footer {
    padding: 0 2rem 2rem;
    display: flex;
    gap: 0.75rem;
}

.program-footer .btn {
    flex: 1;
}

/* Custom Program */
.custom-program-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
    align-items: start;
}

.custom-program-text h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--gray-800);
}

.custom-program-text p {
    line-height: 1.6;
    color: var(--gray-600);
    margin-bottom: 1.5rem;
}

.custom-program-text ul {
    list-style: none;
    padding: 0;
    margin-bottom: 2rem;
}

.custom-program-text li {
    padding: 0.5rem 0;
    color: var(--gray-600);
    position: relative;
    padding-left: 1.5rem;
}

.custom-program-text li::before {
    content: '▸';
    position: absolute;
    left: 0;
    color: var(--primary-blue);
    font-weight: 600;
}

.custom-process h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: var(--gray-800);
}

.process-steps {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.process-step {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
}

.step-number {
    width: 40px;
    height: 40px;
    background: var(--primary-blue);
    color: var(--white);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    flex-shrink: 0;
}

.step-content h5 {
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 0.25rem;
    color: var(--gray-800);
}

.step-content p {
    font-size: 0.875rem;
    color: var(--gray-600);
    margin: 0;
}

/* Forms */
.form-container {
    background: var(--white);
    padding: 2rem;
    border-radius: 16px;
    box-shadow: var(--shadow-lg);
}

.form-container h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: var(--gray-800);
    text-align: center;
}

.consultation-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 0.75rem 1rem;
    border: 2px solid var(--gray-300);
    border-radius: 8px;
    font-size: 0.875rem;
    transition: var(--transition);
    background: var(--white);
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.form-group textarea {
    resize: vertical;
    min-height: 80px;
}

/* =========================
   PROCESS SECTION
   ========================= */
.process-section {
    padding: 100px 0;
    background: var(--gray-50);
}

.process-timeline {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    max-width: 800px;
    margin: 0 auto;
}

.process-item {
    display: flex;
    align-items: flex-start;
    gap: 2rem;
    padding: 2rem;
    background: var(--white);
    border-radius: 16px;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
}

.process-item:hover {
    transform: translateX(10px);
    box-shadow: var(--shadow-lg);
}

.process-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
    color: var(--white);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    flex-shrink: 0;
}

.process-content h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--gray-800);
}

.process-content p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
}

/* =========================
   CLIENTS SECTION
   ========================= */
.clients-section {
    padding: 100px 0;
    background: var(--white);
}

.clients-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
}

.client-card {
    background: var(--white);
    padding: 2rem;
    border-radius: 16px;
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    border: 1px solid var(--gray-200);
}

.client-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.client-logo {
    width: 80px;
    height: 80px;
    background: var(--light-blue);
    color: var(--primary-blue);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 1.5rem;
}

.client-card h4 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--gray-800);
}

.client-card p {
    line-height: 1.6;
    color: var(--gray-600);
    margin: 0;
    font-size: 0.875rem;
}

/* =========================
   CTA SECTION
   ========================= */
.cta-section {
    padding: 100px 0;
    background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
    color: var(--white);
    text-align: center;
}

.cta-text h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: var(--white);
}

.cta-text p {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.cta-features {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.feature {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 1rem;
}

.feature i {
    color: #fde68a;
}

/* =========================
   RESPONSIVE DESIGN
   ========================= */
@media (max-width: 1024px) {
    .hero-content {
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
    }

    .hero-title {
        font-size: 3rem;
    }

    .programs-grid {
        grid-template-columns: 1fr;
    }

    .program-card.featured {
        transform: none;
    }

    .program-card.featured:hover {
        transform: translateY(-5px);
    }

    .custom-program-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .cta-content {
        grid-template-columns: 1fr;
        gap: 3rem;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .training-hero {
        padding: 100px 0 60px;
    }

    .hero-title {
        font-size: 2.5rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
    }

    .hero-stats {
        grid-template-columns: 1fr;
    }

    .section-title {
        font-size: 2.2rem;
    }

    .benefits-grid {
        grid-template-columns: 1fr;
    }

    .tab-buttons {
        flex-direction: column;
        align-items: center;
    }

    .tab-button {
        width: 100%;
        max-width: 300px;
    }

    .tab-content {
        padding: 2rem 1.5rem;
    }

    .process-item {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .clients-grid {
        grid-template-columns: 1fr;
    }

    .cta-text h3 {
        font-size: 2rem;
    }

    .hero-actions {
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .hero-title {
        font-size: 2rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .section-title {
        font-size: 1.8rem;
    }

    .program-footer {
        flex-direction: column;
    }

    .cta-section {
        padding: 80px 0;
    }

    .cta-text h3 {
        font-size: 1.75rem;
    }

    .btn {
        width: 100%;
        max-width: 300px;
    }
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetTab = button.getAttribute('data-tab');
            
            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            // Add active class to current button and pane
            button.classList.add('active');
            document.getElementById(targetTab).classList.add('active');
        });
    });

    // Form submission
    const forms = document.querySelectorAll('.consultation-form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate form submission
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Terkirim!';
                submitBtn.style.background = 'var(--primary-green)';
                submitBtn.style.borderColor = 'var(--primary-green)';
                
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    submitBtn.style.background = '';
                    submitBtn.style.borderColor = '';
                    form.reset();
                }, 2000);
            }, 2000);
        });
    });
});
</script>
@endsection