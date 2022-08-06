<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/quiz2.css') }}">
    <link rel="stylesheet" href="{{ url('css/navbar.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    {{-- <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" /> --}}

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
    <title>Diksa Asmaradanta</title>
</head>
<body>

    @include('user.partial.navbar')

    <section class="title">
        <h1>{{ $tahap->title }}</h1>
        <p class="deskripsi">
            {{ $tahap->deskripsi }}
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo expedita error cumque est! Officia, libero.
        </p>
    </section>

    @if($tahap->tahap == 1)
    <section class="quiz">
        {{ $quizzes->links('progress-paginator') }}
        @foreach($quizzes as $quiz)
            <div class="quiz-container">
                <form id="quiz-form" class="quiz-choice">
                    <input type="hidden" name="quiz_id" id="quiz_id" value="{{ $quiz->id }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    @if($quiz->gambar != null)
                        <img src="{{ url("assets/images/$quiz->gambar") }}" alt="gambar-quiz">
                    @endif
                    <p class="quiz-title">
                        {{ $quiz->title }}
                    </p>
                    @if($quiz->quiz_model == 'pilihan_ganda')
                        @foreach($quiz->choice as $choice)
                            @if($choice->answer != null)
                                <div class="choice-wrapper">
                                    <input checked id="choice" type="radio" name="choice_id" value="{{ $choice->id }}">
                                    <label for="choice">{{ $choice->choice }}</label>
                                </div>
                            @else
                                <div class="choice-wrapper">
                                    <input id="choice" type="radio" name="choice_id" value="{{ $choice->id }}">
                                    <label for="choice">{{ $choice->choice }}</label>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <input placeholder="Ketik jawaban" type="text" name="lisan_answer" id="lisan_answer">
                        <button id="simpan_jawaban">simpan</button>
                    @endif

                </form>
                @if($quizzes->currentPage() == $quizzes->lastPage())
                    <div class="submit-button">
                        <button id="submit" type="submit" onclick="submitForm({{ $exam_id }})">Submit</button>
                    </div>
                @endif
            </div>
        @endforeach

        {{ $quizzes->links('custom_pagination') }}

        <div class="choice-alert">
            <p>*Klik simpan untuk menyimpan jawaban jika pertanyaan lisan</p>
            <p>*Ketika memilih opsi jawaban mu akan disimpan</p>
        </div>
    </section>
    @else
        <section class="quiz">
            {{ $quizzes->links('progress-paginator') }}
            @foreach($quizzes as $quiz)
                <div class="quiz-container">
                    <form id="quiz-form" class="quiz-choice">
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @if($quiz->gambar != null)
                            <img src="{{ url("assets/images/$quiz->gambar") }}" alt="gambar-quiz">
                        @endif
                        <p class="quiz-title">
                            {{ $quiz->title }}
                        </p>
                        @if($quiz->quiz_model == 'pilihan_ganda')
                            @foreach($quiz->choice as $choice)
                                @if($choice->answer != null)
                                    <div class="choice-wrapper">
                                        <input checked id="choice" type="radio" name="choice_id" value="{{ $choice->id }}">
                                        <label for="choice">{{ $choice->choice }}</label>
                                    </div>
                                @else
                                    <div class="choice-wrapper">
                                        <input id="choice" type="radio" name="choice_id" value="{{ $choice->id }}">
                                        <label for="choice">{{ $choice->choice }}</label>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <input type="text" name="lisan_answer" id="lisan_answer">
                        @endif

                    </form>
                    @if($quizzes->currentPage() == $quizzes->lastPage())
                        <div class="submit-button">
                            <button id="submit" type="submit" onclick="submitForm({{ $exam_id }})">Submit</button>
                        </div>
                    @endif
                </div>
            @endforeach

            {{ $quizzes->links('custom_pagination') }}

            <div class="choice-alert">
                <p>*Klik simpan untuk menyimpan jawaban jika pertanyaan lisan</p>
                <p>*Ketika memilih opsi jawaban mu akan disimpan</p>
            </div>
        </section>
    @endif
    

    @include('user.partial.footer')




    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    

    <script>
        const hamburger = document.querySelector(".hamburger");
        const navList = document.querySelector(".nav-content");
    
        hamburger.addEventListener("click", () => {
            hamburger.classList.toggle("active");
            navList.classList.toggle("active");
        });
    
        document.querySelectorAll(".nav-link").forEach((n) =>
            n.addEventListener("click", () => {
                hamburger.classList.remove("active");
                navList.classList.remove("active");
            })
        );
    </script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            let quiz_id = $("#quiz_id").val();
            let user_id = $("#user_id").val();


            $.get("/get-answered/" + quiz_id + "/" + user_id, function(data){
                if(data){
                    console.log(data)
                    $("#lisan_answer").val(data.lisan_answer);
                }
            });
        });

        $(":radio").change(function() {
            var value = $(this).val();

            $.ajax({
                url: "{{ route('tes-psikologi.store') }}",
                method: "POST",
                data: $("#quiz-form").serialize(),
                success: function (data){
                    console.log(data)
                },
                error: function (error){
                    console.log(error)
                }
            })
        });

        $("#simpan_jawaban").click((e) => {
            e.preventDefault();
            console.log($("#quiz-form").serialize());

            $.ajax({
                url: "{{ route('tes-psikologi.store') }}",
                method: "POST",
                data: $("#quiz-form").serialize(),
                success: function (){
                    alert('Jawaban Disimpan')
                },
                error: function (error){
                    alert('Simpan Data Error')
                }
            })
        })

        function submitForm(exam_id){
            $.ajax({
                url: "/exam-checkpoint/" + exam_id,
                method: "GET",
                data: exam_id   ,
                success: function (){
                    window.location.href = '/tes-psikologi';
                },
                error: function (error){
                    alert('Simpan Data Error')
                }
            })
        }
    </script>
</body>
</html>