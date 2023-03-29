<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Monitoring</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/simple-datatables/simple-datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>
    <div id="app">
        <div class="wrapper">
            @include('layouts.partials.sidebar')

            <div class="main">
                @include('layouts.partials.navbar')

                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#department_id').on('change', function() {
                let id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '/parentmachine/' + id,
                        type: "GET",
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#parent_id').append('<option value="' +
                                    value.id + '">' + value.parent_name +
                                    '</option>'
                                );
                            });
                        }
                    });
                } else {
                    $('#parent_id').empty();
                }
            });

            $(".select-item").select2({
                allowClear: true,
            });
        });
    </script>

    <script>
        const table = document.querySelector('#simple-datatables');
        const dataTable = new simpleDatatables.DataTable(table);
    </script>

    <script>
        @include('sweetalert::alert')

        function handleDelete(e) {
            e.preventDefault();
            const form = document.querySelector('.form-delete');
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data Anda Tidak Dapat di Kembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#adb5bd',
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        "Deleted!", "Data Anda Berhasil Dihapus.", "success"
                    )
                    form.submit();
                }
            })
        }
    </script>

    <script>
        console.log(window.location.pathname);

        if (window.location.pathname == '/') {
            toastr.options.timeOut = 4000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif (Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        }
    </script>
</body>

</html>
