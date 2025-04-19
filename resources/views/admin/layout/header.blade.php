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
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person user-image rounded-circle shadow"></i>
                    <span class="d-none d-md-inline">{{ Auth::guard('admin')->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">

                    <!--begin::User Image-->
                    <li class="user-header text-bg-primary">
                        <i class="bi bi-person fs-3 text-white p-3 bg-primary rounded-circle shadow"></i>
                        <p>
                            {{ Auth::guard('admin')->user()->email}} - {{ Auth::guard('admin')->user()->role }}
                            <small>Miembro desde {{ Auth::guard('admin')->user()->created_at}}</small>
                        </p>
                    </li>
                    <!--end::User Image-->
                    
                    <!--begin::Menu Footer-->
                    <li class="user-footer">                        
                        <a href="{{ url('admin/logout') }}" class="btn btn-default btn-flat float-end">Sign out</a>
                    </li>
                    <!--end::Menu Footer-->
                </ul>
            </li>
            <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
</nav>
