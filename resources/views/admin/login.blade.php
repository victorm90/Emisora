<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login | CMKS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link href="{{ asset('Admin/fontawesome/css/all.min.css') }}" rel="stylesheet">
</head>

<body style="background: #f0f2f5; min-height: 100vh;" class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <!-- Alertas Globales -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Error:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow-lg overflow-hidden hover-effect">
                    <div class="row g-0">
                        <!-- Sección Izquierda (Branding) -->
                        <div class="col-md-6 d-flex align-items-center gradient-custom position-relative">
                            <div class="text-white px-4 py-5 w-100 position-relative z-1">
                                <div class="brand-container text-center mb-4">
                                    <img src="{{ asset('Admin/imagen/logologin.jpg') }}" alt="CMKS Logo"
                                        class="brand-login img-fluid rounded-3 shadow-lg animate-fade-in" />
                                </div>
                                <div class="text-center">
                                    <h2 class="mb-3 fw-bold display-6">Bienvenido</h2>
                                    <p class="lead small opacity-90 mb-4">Gestión Integral de Recursos</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <div class="icon-box">
                                            <i class="fas fa-chart-line fa-2x"></i>
                                            <span class="small d-block mt-2">Analíticas</span>
                                        </div>
                                        <div class="icon-box">
                                            <i class="fas fa-shield-alt fa-2x"></i>
                                            <span class="small d-block mt-2">Seguridad</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 start-0 w-100 overflow-hidden opacity-25">
                                <svg viewBox="0 0 500 150" preserveAspectRatio="none">
                                    <path
                                        d="M0.00,92.27 C216.83,192.92 304.30,8.39 500.00,109.03 L500.00,0.00 L0.00,0.00 Z"
                                        style="stroke: none; fill: #fff;"></path>
                                </svg>
                            </div>
                        </div>

                        <!-- Sección Derecha (Formulario) -->
                        <div class="col-md-6">
                            <div class="card-body p-4 p-xl-5 position-relative">
                                <div class="text-center mb-5">
                                    <h3 class="fw-bold mb-3">Iniciar Sesión</h3>
                                    <p class="text-muted small">Control de Acceso al Sistema</p>
                                </div>

                                <form action="{{ route('login.request') }}" method="POST">
                                    @csrf
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label small text-muted mb-1">Correo electrónico</label>
                                        <div class="input-group hover-input">
                                            <span class="input-group-text bg-transparent border-end-0">
                                                <i class="fas fa-envelope text-muted"></i>
                                            </span>
                                            <input type="email" name="email" id="email"
                                                class="form-control border-start-0" placeholder="nombre@ejemplo.com"
                                                autocomplete="username" value="{{ old('email') }}" required
                                                @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif>
                                        </div>
                                        <div class="form-text small text-end">Ej: usuario@cmks.com</div>
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="mb-4">
                                        <label class="form-label small text-muted mb-1">Contraseña</label>
                                        <div class="input-group hover-input">
                                            <span class="input-group-text bg-transparent border-end-0">
                                                <i class="fas fa-lock text-muted"></i>
                                            </span>
                                            <input type="password" name="password" id="password"
                                                class="form-control border-start-0" placeholder="••••••••"
                                                autocomplete="current-password" required
                                                @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif>
                                            <button type="button" class="input-group-text toggle-password">
                                                <i class="fas fa-eye-slash"></i>
                                            </button>
                                        </div>
                                        <div class="form-text small text-end">Mínimo 8 caracteres</div>
                                    </div>

                                    <!-- Recordar y Olvidé -->
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" @if (isset($_COOKIE['email'])) checked="" @endif>
                                            <label class="form-check-label small text-muted" for="remember">Recordar
                                                sesión</label>
                                        </div>
                                    </div>

                                    <!-- Botón -->
                                    <button type="submit" class="btn btn-primary w-100 mb-3 py-2 fw-bold submit-btn">
                                        <span class="button-text">Acceder al sistema</span>
                                        <div class="spinner-border spinner-border-sm d-none" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="text-center mt-4 text-muted small">
                    © <span id="footer-year">2024</span> CMKS. Todos los derechos reservados
                    <a href="#" class="text-decoration-none text-primary ms-2">Políticas de privacidad</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .gradient-custom {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        }

        .hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .hover-input:hover .input-group-text {
            background-color: rgba(79, 70, 229, 0.05);
            border-color: #4f46e5;
        }

        .toggle-password {
            cursor: pointer;
            background-color: transparent;
            border-left: 0;
        }

        .submit-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .submit-btn .spinner-border {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-btn.google {
            background: #db4437;
            color: white;
        }

        .social-btn.microsoft {
            background: #0078d4;
            color: white;
        }

        .social-btn:hover {
            transform: translateY(-2px);
        }

        .icon-box {
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 0.5rem;
            width: 100px;
            transition: all 0.3s ease;
        }

        .icon-box:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .brand-login {
                max-width: 180px;
            }

            .icon-box {
                width: 80px;
                padding: 0.75rem;
            }
        }
    </style>

    <!-- Scripts -->

    <script>
        // Toggle Password Visibility
        document.querySelector('.toggle-password').addEventListener('click', function(e) {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            }
        });

        // Form Submission Handler
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('.submit-btn');
            const buttonText = submitBtn.querySelector('.button-text');
            const spinner = submitBtn.querySelector('.spinner-border');

            buttonText.textContent = 'Autenticando...';
            spinner.classList.remove('d-none');
            submitBtn.disabled = true;
        });

        // Current Year for Footer
        document.getElementById('footer-year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
