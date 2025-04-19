<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Login Page v2</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Login Page v2" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="{{ asset('admin/cdn/css/index.css') }}"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="{{ asset('admin/cdn/css/overlayscrollbars.min.css') }}"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->

</head>

<body style="background: #f0f2f5; min-height: 100vh;" class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card border-0 shadow-lg overflow-hidden">
                    <div class="row g-0">
                        <!-- Sección Izquierda (Branding/Imagen) -->
                        <div class="col-md-6 d-flex align-items-center gradient-custom">
                            <div class="text-white px-4 py-5">
                                <h2 class="mb-4 fw-bold">Bienvenido</h2>
                                <p class="small">Accede a tu cuenta para gestionar tu panel administrativo.</p>
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error!</strong> {{ $errors->first() }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                            </div>                            
                        </div>                        
                       
                        <!-- Sección Derecha (Formulario) -->
                        <div class="col-md-6">
                            <div class="card-body p-4 p-xl-5">
                                <div class="text-center mb-5">
                                    <h3 class="fw-bold mb-3">Iniciar Sesión</h3>
                                    <p class="text-muted small">Ingresa tus credenciales</p>
                                </div>                                

                                <form action="{{ route('login.request') }}" method="POST">
                                    @csrf
                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label small text-muted mb-1">Correo electrónico</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent border-end-0">
                                                <i class="bi bi-envelope text-muted"></i>
                                            </span>
                                            <input type="email" name="email" id="email"
                                                class="form-control border-start-0 @error('email') is-invalid @enderror"
                                                placeholder="nombre@ejemplo.com" value="{{ old('email') }}">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="mb-4">
                                        <label class="form-label small text-muted mb-1">Contraseña</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent border-end-0">
                                                <i class="bi bi-lock text-muted"></i>
                                            </span>
                                            <input type="password" name="password" id="password"
                                                class="form-control border-start-0 @error('password') is-invalid @enderror"
                                                placeholder="••••••••">
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Recordar y Olvidé -->
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember">
                                            <label class="form-check-label small text-muted" for="remember">Recordar
                                                sesión</label>
                                        </div>
                                    </div>

                                    <!-- Botón -->
                                    <button type="submit"
                                        class="btn btn-primary w-100 mb-3 py-2 fw-bold">Acceder</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .gradient-custom {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
        }

        .input-group-text {
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #4f46e5;
        }

        .btn-primary {
            background: #4f46e5;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #6366f1;
            transform: translateY(-1px);
        }
    </style>

    <!-- Scripts Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Scripts (mantener los mismos que proporcionaste) -->
    <script src="{{ asset('admin/cdn/js/overlayscrollbars.browser.es6.min.js') }}"
        integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/cdn/js/popper.min.js') }}"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/cdn/js/bootstrap.min.js') }}"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>
    <!-- Configuración de OverlayScrollbars (mantener igual) -->
</body>
<!--end::Body-->

</html>
