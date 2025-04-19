<nav class="app-header navbar navbar-expand bg-body">   
    <div class="container-fluid">        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li>
        </ul>       
        <ul class="navbar-nav ms-auto"> 
           
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>            
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle me-2 fs-5"></i>
                    <span class="d-none d-md-inline fw-medium">{{ Str::limit(Auth::guard('admin')->user()->name, 15) }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg" style="min-width: 240px;">
            
                    <!-- Header con información del usuario -->
                    <li class="dropdown-header bg-primary bg-gradient text-white py-3">
                        <div class="d-flex flex-column align-items-center">
                            <i class="bi bi-person-badge fs-2 mb-2"></i>
                            <h6 class="mb-0">{{ Auth::guard('admin')->user()->name }}</h6>
                            <small class="opacity-75">{{ Auth::guard('admin')->user()->role }}</small>
                        </div>
                    </li>
            
                    <!-- Detalles de la cuenta -->
                    <li class="px-3 py-2">
                        <div class="d-flex flex-column small">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Email:</span>
                                <span class="text-end">{{ Auth::guard('admin')->user()->email }}</span>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="text-muted">Miembro desde:</span>
                                <span class="text-end">{{ Auth::guard('admin')->user()->created_at->format('d/m/Y') }}</span>
                            </div>
                        </div>
                    </li>
            
                    <!-- Separador -->
                    <li><hr class="dropdown-divider my-2"></li>
            
                    <!-- Acciones -->
                    <li class="px-3">
                        <a href="#" class="dropdown-item d-flex align-items-center py-2">
                            <i class="bi bi-gear me-2"></i>
                            Configuración
                        </a>
                    </li>
            
                    <!-- Cerrar sesión -->
                    <li class="px-3 pb-2">
                        <a href="{{ url('admin/logout') }}" 
                           class="btn btn-danger btn-sm w-100 d-flex justify-content-center align-items-center"
                           onclick="return confirm('¿Estás seguro de cerrar sesión?')">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Cerrar Sesión
                        </a>
                    </li>
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
