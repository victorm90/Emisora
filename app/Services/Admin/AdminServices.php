<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\DetailRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminServices
{
    public function login($data)
    {
        if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {

            
            if (!empty($data["remember"])) {
                setcookie("email", $data["email"], time() + 3600);
                setcookie("password", $data["password"], time() + 3600);
            } else {
                setcookie("email", "");
                setcookie("password", "");
            }

            $loginStatus = 1;
        } else {
            $loginStatus = 0;
        }
        return $loginStatus;
    }

    public function verifyPassword($data)
    {
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    /* public function updatePassword($data){
        if(Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)){
            if($data['new_pwd']==$data['confirm_pwd']){
                Admin::where('email',  Auth::guard('admin')->user()->email)->update(['password'=>bcrypt($data['new_pwd'])]);
                $status = "success";
                $message = "New Password and Confirma Passwoed must match!";
            };
        }else {
            $status = "error";
                $message = "Your current password is incorrent";
        }
        return ["status" => $status, "message" => $message];
    } */

    public function updatePassword($data)
    {
        $admin = Auth::guard('admin')->user();
        $status = 'error';
        $message = 'Error desconocido';

        if (!Hash::check($data['current_pwd'], $admin->password)) {
            $message = 'La contraseña actual es incorrecta';
            return compact('status', 'message');
        }

        if ($data['new_pwd'] !== $data['confirm_pwd']) {
            $message = 'La nueva contraseña y la confirmación no coinciden';
            return compact('status', 'message');
        }

        Admin::where('email', $admin->email)->update([
            'password' => bcrypt($data['new_pwd'])
        ]);

        $status = 'success';
        $message = 'Contraseña actualizada exitosamente';

        return compact('status', 'message');
    }

    public function updateDetails(array $data, $avatarFile = null)
    {
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->firstOrFail();

        // Actualizar campos básicos
        $admin->update([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
        ]);

        // Actualizar avatar si existe
        if ($avatarFile) {
            $this->updateAvatar($admin, $avatarFile);
        }

        return true;
    }

    private function updateAvatar($admin, $file)
    {
        // Eliminar imagen anterior si existe
        if ($admin->image) {
            Storage::disk('public')->delete($admin->image);
        }

        // Almacenar nueva imagen
        $path = $file->store('admin/avatars', 'public');

        // Actualizar campo en la base de datos
        $admin->update(['image' => $path]);
    }

    public function subadmins()
    {
        $subadmins = Admin::where('role', 'subadmin')->get();
        return $subadmins;
    }


    public function updateSubadminStatus($data)
    {
        DB::beginTransaction();

        try {
            $admin = Admin::findOrFail($data['subadmin_id']);
            $newStatus = $data['status'] == 1 ? 0 : 1; // Invertir el estado

            $admin->update(['status' => $newStatus]);

            DB::commit();

            return $newStatus;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteSubadmin($id){
        
    }
}
