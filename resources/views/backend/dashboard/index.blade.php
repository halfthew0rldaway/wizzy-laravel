<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yeald('title', 'Dashboard')</title>

    <!-- Bootstra[ css -->
     <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- Bootstra[ css -->
      <link href= "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstsrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- header --}}
<nav class="navbar navbar-light bg-white shadow-sm px-3">
    <a class="navbar-brand fw-bold text-primary" href="/dashboard">
        <i class="bi bi-speedometer2 me-2"></i>My Dashboard Guwej
    </a>
    <div class="d-flex align-items-center">
    <span class="me-3 text-muted"><i class="bi bi-person-circle me-1"></i>halo, wizzy!</span>
        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-danger">
            <i class="bi bi-box-arrow-right me-1"></i>logout
        </a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

    {{-- sidebar --}}
    <aside class="col-12 col-md-3 col-lg-2 bg-white border-end shadow-sm p-3 min-vh-100">
        <h6 class="fw-bold text-secondary mb-3">Menu</h6>
        <ul class ="nav flex-column">
            <li class="nav-item mb-2">
                <h ref="/dashboard" class="nav-link active fw-semibold text-primary">
                    <i class="bi bi-house-door me-2"></i>Dashboard
                </a>
            </li>
        <li class="nav-item mb-2">
            <a href="/pegawai" class="nav-link text-dark">
                <i class="bi bi-people me-2"></i>pegawai
                 </a>
            </li>
        <li class="nav-item mb-2">
            <a href="/pegawai" class="nav-link text-dark">
                <i class="bi bi-cash-stack me-2"></i>payroll
                 </a>
            </li>
        <li class="nav-item mb-2">
            <a href="/pegawai" class="nav-link text-dark">
                <i class="bi bi-person-badge me-2"></i>User
                </a>
            </li>
</ul>
</aside>
{{-- Konten --}}
<main class="col-12 col-md-9 col-lg-10 p-4">
    <h2 class="fw-bold text-dark mb-4"><i class="bi bi-grid me-2"></i>Dashboard</h2>
    
    {{-- Card statistik --}}
    <div class="row g-3">
        <div class="col md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-people-fill me-2"></i> Total Pegawai</h6>
                    <h3 class="fw-bold text-primary">120</h3>
                </div>
            </div>
        </div>

        <div class="col md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-wallet2 me-2"></i> Total Payroll</h6>
                    <h3 class="fw-bold text-success">Rp 250jt</h3>
                </div>  
            </div>
        </div>
        
    <div class="col md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body">
                    <h6 class="text-muted"><i class="bi bi-person-check-fill me-2"></i> User aktif</h6>
                    <h3 class="fw-bold text-success">50</h3>
                </div>
            </div>
        </div>
    </main>

</div>
</div>
</bdoy>
</html>
    