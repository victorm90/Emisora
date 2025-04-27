<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use App\Services\Admin\AdminServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    protected $adminService;

    public function __construct(AdminServices $adminService)
    {
        $this->adminService = $adminService;
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Dashboard';
        return view('admin.dashboard', compact('titulo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $data = $request->validated();
        $loginStatus = $this->adminService->login($data);

        if ($loginStatus == 1) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back()->withErrors(['credenciales' => 'Credenciales inválidas']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $titulo = 'Actualizar Contraseña';
        return view('admin.update_password',compact('titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }

    
}
