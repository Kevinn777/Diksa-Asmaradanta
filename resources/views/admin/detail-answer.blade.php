<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{ url('images/DA2.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Diksa Asmaradanta</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ url('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ url('assets/css/light-bootstrap-dashboard.css?v=1.4.0') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ url('assets/css/demo.css') }}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ url('assets/css/pe-icon-7-stroke.css') }}" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	@include('admin.partial.sidebar')
    </div>

    <div class="main-panel">
		@include('admin.partial.navbar')

        <div class="content">
            <div class="container-fluid">
                @foreach($exams as $exam)
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Hasil Exam {{ $exam->title }}</h4>
                                    <p class="category">{{ $exam->deskripsi }}</p>
                                </div>
                                <div class="content table-responsive table-full-width" style="max-height: 500px; overflow-y:scroll;">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th class="">No.</th>
                                            <th class="">Quiz</th>
                                            <th class="">Answer</th>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach($exam->quiz as $quiz)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td class="">{{ $quiz->title }}</td>
                                                    @if($quiz->quiz_model == 'pilihan_ganda')
                                                        @foreach($quiz->choice as $choice)
                                                            @if(!$choice->answer == null)
                                                                <td>{{ $choice->choice }}</td>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <td>{{ $quiz->answer->lisan_answer }}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="{{ url('assets/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="{{ url('assets/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ url('assets/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ url('assets/js/light-bootstrap-dashboard.js?v=1.4.0') }}"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{ url('assets/js/demo.js') }}"></script>


</html>
