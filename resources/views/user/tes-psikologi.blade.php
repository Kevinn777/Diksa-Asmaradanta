<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/tes-psikologi.css') }}">
    <link rel="stylesheet" href="{{ url('css/navbar.css') }}">
    <title>Diksa</title>
</head>
<body>
    @include('user.partial.navbar')

    <section class="tahap-tes">
        <h1 class="tahap-title">
            Tahap Tes
        </h1>
        
        <div class="tahap-tes-content">
            @foreach($tahap as $step)
                @if(Route::has('login'))
                    @auth
                        @if(Auth::user()->current_exam + 1 == $step->tahap)
                        <div class="tahap-card">
                            <h5>{{ $step->title }}</h5>

                            <div class="card-content">
                                <img src="{{ url("assets/images/$step->gambar") }}" alt="">

                                <div class="card-desk">
                                    <p>{{ $step->deskripsi }}</p>
                                </div>

                                <div class="card-action">
                                    <a href="/tes-psikologi/{{ $step->id }}">Mulai Test</a>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="tahap-card" style="filter: grayscale(100%)">
                            <h5>{{ $step->title }}</h5>

                            <div class="card-content">
                                <img src="{{ url('images/tahap1.png') }}" alt="">

                                <div class="card-desk">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint ducimus in officiis repellat doloremque itaque placeat? Autem commodi animi magni?</p>
                                </div>

                                <div class="card-action" style="cursor: unset;">
                                    <a href="" style="cursor: unset;">Mulai Test</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @else
                        <div class="tahap-card">
                            <h5>{{ $step->title }}</h5>

                            <div class="card-content">
                                <img src="{{ url('images/tahap1.png') }}" alt="">

                                <div class="card-desk">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint ducimus in officiis repellat doloremque itaque placeat? Autem commodi animi magni?</p>
                                </div>

                                <div class="card-action">
                                    <a href="/tes-psikologi/{{ $step->id }}">Mulai Test</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </div>
    </section>

    @include('user.partial.footer')



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
</body>
</html>