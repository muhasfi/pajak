
<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow-sm ms-auto">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
            <i class="fas fa-calculator me-2"></i>Paham Pajak
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 px-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('/') }}">
                        <i class="fas fa-home me-1"></i> Home
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-box me-1"></i> Produk
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/book"><i class="fas fa-book me-2"></i>Buku</a></li>
                        <li><a class="dropdown-item" href="/artikel"><i class="fas fa-newspaper me-2"></i>Artikel</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-graduation-cap me-1"></i> Kelas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/bimbel"><i class="fas fa-users me-2"></i>Bimble A</a></li>
                        <li><a class="dropdown-item" href="#bimble-b"><i class="fas fa-user-graduate me-2"></i>Bimble B</a></li>
                    </ul>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-chalkboard-teacher me-1"></i> Pelatihan
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/seminar"><i class="fas fa-microphone me-2"></i>Seminar/Webinar</a></li>
                        <li><a class="dropdown-item" href="#workshop"><i class="fas fa-tools me-2"></i>Workshop</a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#kontak">
                        <i class="fas fa-envelope me-1"></i> Kontak
                    </a>
                </li>
            </ul>
            
            <div class="d-flex px-8 ">
                <a href="#login" class="btn btn-primary px-4 rounded-3">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </a>
            </div>
            
        </div>
    </div>
</nav>