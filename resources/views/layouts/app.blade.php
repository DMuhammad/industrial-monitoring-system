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
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datepicker/css/datepicker.material.css') }}">
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

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#department_id').on('change', function() {
                var id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '/parentdropdown/' + id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#parent_id').append('<option value="' +
                                    key + '">' + value.parent_name + '</option>');
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
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        })
    </script>

    <script>
        function handleDelete(e) {
            e.preventDefault();
            const form = e.target.form;

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

        function handleCreate() {
            Swal.fire(
                'Created!',
                'Berhasil Dibuat!',
                'success'
            )
        }
    </script>
</body>

</html>
