@extends('admin.layout.layout')



@section('content')
    <div class="pt-5">
        <div class="mb-2 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Settings</h5>
        </div>
        <x-sweet-alerts />
        <div x-data="{ tab: 'home' }">
            <template x-if="tab === 'home'">
                <div>
                    <form method="POST" action="{{ route('admin.update-password.request') }}"
                        class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                        @csrf
                        <h6 class="mb-5 text-lg font-bold">Actualización de Perfil</h6>

                        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                            <!-- Sección Izquierda - Información del Usuario -->
                            <div class="space-y-4">
                                <h6 class="text-md font-semibold text-[#3b3f5c] dark:text-[#e0e6ed]">
                                    <i class="fas fa-user-circle mr-2"></i>Datos de Cuenta
                                </h6>

                                <div>
                                    <label for="username" class="block text-[#3b3f5c] dark:text-[#e0e6ed]">Nombre de
                                        Usuario</label>
                                    <input id="username" type="text" value="{{ Auth::guard('admin')->user()->name }}"
                                        class="form-input mt-1 w-full rounded-lg bg-[#f6f7f8] dark:bg-[#1a1c2d]" readonly>
                                </div>

                                <div>
                                    <label for="email" class="block text-[#3b3f5c] dark:text-[#e0e6ed]">Correo
                                        Electrónico</label>
                                    <input id="email" type="email" value="{{ Auth::guard('admin')->user()->email }}"
                                        class="form-input mt-1 w-full rounded-lg bg-[#f6f7f8] dark:bg-[#1a1c2d]" readonly>
                                </div>
                            </div>

                            <!-- Sección Derecha - Cambio de Contraseña -->
                            <div class="space-y-4">
                                <h6 class="text-md font-semibold text-[#3b3f5c] dark:text-[#e0e6ed]">
                                    <i class="fas fa-shield-alt mr-2"></i>Seguridad
                                </h6>

                                <div class="space-y-6">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-2 flex items-center pl-3.5 pointer-events-none">
                                            <i class="fas fa-lock text-gray-400 dark:text-gray-500"></i>
                                        </div>
                                        <input id="current-password" type="password"
                                            class="form-input pl-10 w-full rounded-lg border-[#e0e6ed]"
                                            placeholder="Contraseña actual">
                                    </div>

                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-2 flex items-center pl-1.5 pointer-events-none">
                                            <i class="fas fa-key text-gray-400 dark:text-gray-500"></i>
                                        </div>
                                        <input id="new-password" type="password"
                                            class="form-input pl-10 w-full rounded-lg border-[#e0e6ed]"
                                            placeholder="Nueva contraseña">
                                        <p class="mt-2 text-xs text-[#888ea8] dark:text-gray-400">
                                            <i class="fas fa-info-circle mr-1"></i>Mínimo 8 caracteres con números y
                                            mayúsculas
                                        </p>
                                    </div>

                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-2 flex items-center pl-3.5 pointer-events-none">
                                            <i class="fas fa-redo text-gray-400 dark:text-gray-500"></i>
                                        </div>
                                        <input id="confirm-password" type="password"
                                            class="form-input pl-10 w-full rounded-lg border-[#e0e6ed]"
                                            placeholder="Confirmar contraseña">
                                    </div>
                                </div>
                            </div>

                            <!-- Botón de Guardado -->
                            <div class="mt-6 border-t border-[#ebedf2] pt-4 dark:border-[#191e3a]">
                                <button type="submit" class="btn btn-primary float-right flex items-center">
                                    <i class="fas fa-save mr-2"></i>
                                    Guardar Cambios
                                </button>
                            </div>
                    </form>
                </div>
            </template>
        </div>
    </div>
@endsection
