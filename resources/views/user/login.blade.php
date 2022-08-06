<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ url('Style/css/register.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Scheherazade+New:wght@400;700&display=swap" rel="stylesheet" />
  <title>Login</title>

  <style>
	@media screen and (max-width: 770px){
		.right img{
			display: none;
		}
	}
  </style>
</head>

<body class="">
  <div class="container-fluid">
    <div class="row vh-100">
      <div class="left col-lg-6 col-md-6 col-sm-12 d-flex align-items-center">
        <form method="POST" action="/actionLogin" class="form container col-md-12 col-lg-8">
            @csrf
			<div class="mb-3">
				<h1>Selamat Datang Kembali</h1>
				<p>Belum punya akun? <a href="/register" style="text-decoration: none">Daftar Yuk!</a></p>
				<hr style="margin-top: 1rem">
			</div>

			@if(session('not_login'))
				<p class="text-danger mb-3">
					{{ session()->get('not_login') }}
				</p>
			@endif
			@if(session('error'))
				<p class="text-danger mb-3">
					{{ session()->get('error') }}
				</p>
			@endif
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" :value="old('email')">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control p-md-2" id="password" :value="old('password')"/>
          </div>

          <button type="submit" name="submit" class="mb-3 btn w-100 btn-primary" value="Register">
			  Login
			</button>
		<div class="mb-3">
			<a href="#" style="text-decoration: none; color: #000;" onclick="lupaPass()">Lupa password</a>
		</div>
        </form>
      </div>
      <div class="right col-md-6 col-lg-6 d-flex" style="flex-direction: column; align-items: center; justify-content: center; position: relative">
		<a href="/" style="text-decoration: none; color: #000; align-self: end; justify-self: start; position: absolute; top: 3rem; right: 2rem">Kembali ke Homepage</a>
		<img width="100%" style="object-fit: contain;" src="{{ url('images/loginpict.jpg') }}" alt="loginpict">
	  </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
	function lupaPass(){
		alert('lupa password silahkan bertanya pada admin/pengawas ruang')
	}
  </script>
</body>

</html>
