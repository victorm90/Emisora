@if (Session::has('error_message') || Session::has('success_message'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @foreach (['error', 'success'] as $type)
                @if (Session::has("{$type}_message"))
                    showAlert('{{ $type }}', '{{ Session::get("{$type}_message") }}');
                @endif
            @endforeach

            function showAlert(type, message) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
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
                    }
                };

                Toast.fire({
                    ...styles[type],
                    text: message
                });
            }
        });
    </script>
@endif
