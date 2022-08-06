<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Diksa Asmaradanta</title>

    <!-- Icons font CSS-->
    <link href="{{ url('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ url('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ url('css/register.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Diksa Asmaradanta</h2>
                    @if ($errors->any())
                        <div class="text-danger" style="color: #cfe5f2; margin-bottom: 2rem;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/actionRegister" id="registform">
                        @csrf
                        <div class="row input-group">
                            <label class="label">Nama Lengkap</label>
                            <input class="input--style-4" type="text" name="name" :value="old('name')">
                        </div>
                        <div class="row input-group">
                            <label class="label">Email</label>
                            <input class="input--style-4" type="email" name="email" :value="old('email')">
                        </div>
                        <div class="row input-group">
                            <label class="label">Password</label>
                            <input class="input--style-4" type="password" name="password" :value="old('password')">
                        </div>
                        <div class="row input-group" style="display: flex; flex-direction: column;">
                            <label class="label">Status</label>
                            <div class="p-t-5" style="display: flex; gap: 2rem;">
                                <label class="radio-container">Assessment
                                    <input type="radio" name="status" value="assessment">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container mt-5">Recruitment
                                    <input type="radio" name="status" value="recruitment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="row input-group" id="jabatan">
                            <label class="label" id="jabatan_title"></label>
                            <input class="input--style-4" type="text" name="jabatan">
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2" type="submit" style="">Submit</button>
                        </div>
                        <p style="color: #000; text-align: center; margin-top: 25px">Sudah punya akun? <a style="color: #6b6ecb;" href="/login">login disini</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Vendor JS-->
    <script src="{{ url('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ url('vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ url('js/global.js') }}"></script>

    <script>
        $("input[name='status']").click(() => {
            $("#jabatan").show();
            if($("input[name='status']:checked").val() == 'assessment'){
                $("#jabatan_title").html('Jabatan anda sekarang')
            } else {
                $("#jabatan_title").html('Jabatan yang akan di daftar')
            }
        })
    </script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->