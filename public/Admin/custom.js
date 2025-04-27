$(document).ready(function () {
    $("#current_pwd").keyup(function () {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/verify-password',
            data: { current_pwd: current_pwd },
            success: function (resp) {
                if (resp == "false") {
                    $("#verifyPwd").html("<font color = 'red'>La contraseña no coincide</font>");
                } else if (resp == "true") {
                    $("#verifyPwd").html("<font color = 'green'>La contraseña es correcta</font>");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });
});

$(document).on("click", ".update-subadmin-status", function () {
    var status = $(this).data("status");
    var subadmin_id = $(this).data("subadmin_id");
    var button = $(this); // Guardar referencia al botón
    
    // Mostrar loader mientras se procesa
    Swal.fire({
        title: 'Procesando...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/admin/update-subadmin-status',
        data: { status: status, subadmin_id: subadmin_id },
        success: function (resp) {
            Swal.close(); // Cerrar loader
            
            if (resp.status == 1) {
                // Actualizar a estado activo
                button.data("status", "1")
                    .removeClass('btn-outline-secondary')
                    .addClass('btn-outline-success')
                    .attr('title', 'Estado activo - Click para cambiar')
                    .html('<i class="fas fa-toggle-on me-1"></i> Activo');
                
                // Mostrar alerta de éxito
                showStatusAlert('success', 'Estado activado correctamente');
            } else {
                // Actualizar a estado inactivo
                button.data("status", "0")
                    .removeClass('btn-outline-success')
                    .addClass('btn-outline-secondary')
                    .attr('title', 'Estado inactivo - Click para cambiar')
                    .html('<i class="fas fa-toggle-off me-1"></i> Inactivo');
                
                // Mostrar alerta de éxito
                showStatusAlert('info', 'Estado desactivado correctamente');
            }
        },
        error: function (xhr) {
            Swal.close(); // Cerrar loader
            
            // Mostrar alerta de error
            showStatusAlert('error', 'Error al cambiar el estado');
            
            console.error("Error detallado:", xhr.responseText);
        }
    });
});

// Función para mostrar alertas
function showStatusAlert(type, message) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    const styles = {
        error: {
            icon: 'error',
            title: 'Error!',
            background: '#f8d7da',
            iconColor: '#721c24',
            color: '#721c24'
        },
        success: {
            icon: 'success',
            title: 'Éxito!',
            background: '#d4edda',
            iconColor: '#155724',
            color: '#155724'
        },
        info: {
            icon: 'info',
            title: 'Información',
            background: '#e7f4ff',
            iconColor: '#0c63e4',
            color: '#084298'
        }
    };

    Toast.fire({
        ...styles[type],
        text: message
    });
}








