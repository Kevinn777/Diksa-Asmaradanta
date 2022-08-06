<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diksa Asmaradanta</title>
    <link rel="stylesheet" href="{{ url('css/tentang-kami.css') }}">
    <link rel="stylesheet" href="{{ url('css/navbar.css') }}">
</head>
<body>
    @include('user.partial.navbar')

    <section class="main">
        <h1>Profil Pendiri</h1>
        
        <div class="profil">
            <img src="{{ url('images/didik.png') }}" alt="profildidik">
            <p>Didik Sapti</p>
            <ul>
                <li>Psikolog</li>
                <li>Trainer</li>
                <li>Assessor</li>
                <li>Recruiter</li>
                <li>Pengembangan SDM</li>
                <li>Talent Acquisition</li>
            </ul>
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