<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diksa Asmaradanta</title>
    <link rel="stylesheet" href="{{ url('css/kerjasama.css') }}">
    <link rel="stylesheet" href="{{ url('css/navbar.css') }}">
</head>
<body>
    @include('user.partial.navbar')

    <section class="main">
        <div class="heading">
            <p><span>Diksa Asmaradanta</span> merupakan penyedia jasa tes psikologi, training, dan konsultasi</p>
        </div>

        <div class="contact-person">
            <p>Hubungi Kami di</p>

            <div class="contact-person-content">
                <div class="phone">
                    <img src="{{ url('images/phone.png') }}" alt="phone">
                    <p>082299248185</p>
                </div>
                
                <div class="wa_logo">
                    <img src="{{ url('images/wa_logo.png') }}" alt="wa_logo">
                    <p>082299248185</p>
                </div>

                <div class="ig">
                    <img src="{{ url('images/ig.png') }}" alt="ig">
                    <p>diksaasmaradanta</p> 
                </div>

                <div class="linkedin">
                    <img src="{{ url('images/linkedin.png') }}" alt="linkedin">
                    <p>Didik Sapti</p>
                </div>

                <div class="email">
                    <img src="{{ url('images/email.png') }}" alt="email">
                    <p>diksaasmara@gmail.com</p>
                </div>

                <div class="location">
                    <img src="{{ url('images/location.png') }}" alt="location">
                    <p>Surakarta, Jawa Tengah, Indonesia</p>
                </div>
            </div>
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