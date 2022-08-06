<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{ url('assets/img/favicon.ico') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Diksa Asmaradanta</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- CSS only -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 3rem; box-shadow: 1px 0px 25px -4px rgba(0,0,0,0.5); border-radius: 10px; margin-top: 1rem">
                        <div class="card">
                            <div class="header w-100" style="display: flex; align-items: center; justify-content: space-between;">
                                <div class="">
                                    <h4 class="title">User List</h4>
                                    <p class="category">Data user dengan role user</p>
                                </div>
                                <form action="{{ route('admin.answer.index') }}" method="GET" id="searchForm" class="input-group">
                                    @csrf
                                    @method('GET')
                                      <input name="searchUser" type="text" id="inputSearch" placeholder="Search Name"/>
                                      <button type="submit" id="searchSubmit">
                                        <i class="fas fa-search"></i>
                                      </button>
                                </form>
                            </div>
                            <div class="content table-responsive table-full-width" style="height: 500px; overflow-y:scroll;">
                                <table class="table table-hover table-striped" style="">
                                    <thead>
                                        <th class="text-center">No.</th>
                                    	<th class="text-center">Nama</th>
                                    	<th class="text-center">Email</th>
                                        <th class="text-center">Tahap Yang Diselesaikan</th>
                                    	<th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                         $i = 1;   
                                        @endphp
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td class="text-center">
                                                    <a href="/admin/answer/{{ $user->id }}">{{ $user->name }}</a>
                                                </td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">{{ $user->current_exam }}</td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#userModal" onclick="showEditModal({{ $user->id }})" class="btn btn-primary btn-sm mr-5" type="button" aria-expanded="false">
                                                        Edit
                                                    </button>

                                                    <button data-toggle="modal" data-target="#confirmation-delete-modal" onclick="showDeleteModal({{ $user->id }})" class="btn btn-danger btn-sm" type="button" aria-expanded="false">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" style="margin-bottom: 3rem;ss box-shadow: 1px 0px 25px -4px rgba(0,0,0,0.5); border-radius: 10px; margin-top: 1rem">
                        <div class="card">
                            <div class="header w-100" style="display: flex; align-items: center; justify-content: space-between;">
                                <div class="col">
                                    <h4 class="title">Admin List</h4>
                                    <p class="category">Data user dengan role admin</p>
                                </div>
                                <form action="{{ route('admin.answer.index') }}" method="GET" id="searchForm" class="input-group col ms-auto">
                                    @csrf
                                    @method('GET')
                                      <input name="searchUser" type="text" id="inputSearch" placeholder="Search Name"/>
                                      <button type="submit" id="searchSubmit">
                                        <i class="fas fa-search"></i>
                                      </button>
                                </form>
                            </div>
                            <div class="content table-responsive table-full-width" style="height: 500px; overflow-y:scroll;">
                                <table class="table table-hover table-striped" style="">
                                    <thead>
                                        <th class="text-center">No.</th>
                                    	<th class="text-center">Nama</th>
                                    	<th class="text-center">Email</th>
                                    	<th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                         $i = 1;   
                                        @endphp
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td class="text-center">
                                                    <a href="/admin/answer/{{ $admin->id }}">{{ $admin->name }}</a>
                                                </td>
                                                <td class="text-center">{{ $admin->email }}</td>
                                                <td class="text-center">
                                                    <button data-toggle="modal" data-target="#userModal" onclick="showEditModal({{ $admin->id }})" class="btn btn-primary btn-sm mr-5" type="button" aria-expanded="false">
                                                        Edit
                                                    </button>

                                                    <button data-toggle="modal" data-target="#confirmation-delete-modal" onclick="showDeleteModal({{ $user->id }})" class="btn btn-danger btn-sm" type="button" aria-expanded="false">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.partial.user-modal')
@include('admin.partial.delete-alert')

<script src="{{ url('assets/js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<!-- JavaScript Bundle with Popper -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        })
    });
    

    function showEditModal(id){
        $('#errors_name').text('');
        $.get('/admin/answer/' + id + '/edit', function (data){
            $('#userForm')[0].reset();
            $('#titleUserModal').html('User Edit Form');
            $('#name').val(data.name);
            $('#email').val(data.email);
        })
        $('#userModal').modal('show');

        $("#saveButton").click(function (){
            $.ajax({
                url: "/admin/answer/" + id,
                type: "PATCH",
                data: $('#userForm').serialize(),
                dataType: "JSON",
                success: function(data){
                    if(data.success){
                        alert('Data Saved');
                        window.location.href = '/admin/answer'
                    } else {
                        console.log(data.errors)
                        if(data.errors.name){
                            $('#errors_name').text(data.errors.name[0]);
                        } else if (data.errors.email){
                            $('#errors_email').text(data.errors.email[0]);
                        }
                    }
                },
                error: function(error){
                    console.log('error')
                }
            })
        })
    }

    function showDeleteModal(id){
        $('#confirmation-delete-modal').modal('show');

        $('#delete-button').click(function (){
            $.ajax({
                url: "/admin/answer/" + id,
                type: "DELETE",
                success: function (){
                    window.location.href = '/admin/answer'
                },
                error: function(){
                    alert('Delete Error')
                }
            })
        })
    }
</script>


</body>

    <!--   Core JS Files   -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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

    <script src=""></script>
</html>
