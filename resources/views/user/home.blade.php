<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/home.css') }}">
    <link rel="stylesheet" href="{{ url('css/navbar.css') }}">
    <title>Diksa</title>
</head>
<body>
    @include('user.partial.navbar')

    <section class="layanan">
        <h1>Layanan Diksa Asmaradanta</h1>

        <div class="layanan-content">
            <div class="talent-hunter">
                <img src="{{ url('images/talent-hunter.png') }}" alt="talent-hunter">
                <p>Talent Hunter</p>
            </div>

            <div class="talent-hunter">
                <img src="{{ url('images/trainer.png') }}" alt="trainer">
                <p>Trainer</p>
            </div>

            <div class="talent-hunter">
                <img src="{{ url('images/tes-psikologi.png') }}" alt="talent-hunter">
                <p>Tes Psikologi</p>
            </div>

            <div class="talent-hunter">
                <img src="{{ url('images/bimbingan-pranikah.png') }}" alt="bimbingan-pranikah">
                <p>Bimbingan Pranikah</p>
            </div>

            <div class="talent-hunter">
                <img src="{{ url('images/konsultasi-individu.png') }}" alt="konsultasi-individu">
                <p>Konsultasi Individu</p>
            </div>

            <div class="talent-hunter">
                <img src="{{ url('images/konsultasi-pasangan.png') }}" alt="konsultasi-pasangan">
                <p>Konsultasi Pasangan</p>
            </div>
        </div>
    </section>
    
    @include('user.partial.footer')
    
    <script>
        document.addEventListener('scroll', () => {
            document.querySelector('.navbar').classList.toggle('sticky', window.scrollY > 0);
        });
    </script>

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