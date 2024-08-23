<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        img {
            width: 100%;
            height: auto;
            object-fit: cover;
            margin-bottom: 20px;
        }
        .content {
            flex: 1;
            padding: 50px;
            background-color: #ffffff; /* Ensure content area is also light to match the sidebar */
            border-color: grey;
            box-sizing: border-box;
            position: relative;
            z-index: 1;
            margin-top: 56px; /* Adjust based on the navbar height */
            margin-bottom: 56px;
            overflow-y: auto;
            
        }
        .sidebar .nav-link.active {
            background-color: #2e89e4;
            border-radius: 4px;
        }
        .sidebar .nav-link.sub-link {
            padding-left: 30px;
        }

    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
      
            <a> <img src="{{ asset('https://streamlinehealth.org/wp-content/uploads/2023/08/logo-02.webp') }}" alt="Stre@mline Hospital Logo"></a>
           
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link align-middle px-0">
                            <i class="fa fa-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fa fa-gauge"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <a class="nav-link sub-link" href="{{route('client.index')}}"> View Clients</a>
                            <a class="nav-link sub-link"  href="{{route('client.create')}}"> Register Client</a>
                            <a class="nav-link sub-link {{ request()->routeIs('') ? 'active' : '' }}" href=""> Innactive Client</a></li>
                    
                    <li>
                        <a href="{{route('users.index')}}" class="nav-link px-0 align-middle">
                            <i class="fa fa-users"></i> <span class="ms-1 d-none d-sm-inline">Users</span> </a>
                            <a class="nav-link sub-link" href="{{route('users.index')}}"> View Users</a>
                            <a class="nav-link sub-link"  href="{{route('users.create')}}"> Register Users</a>
                            <a class="nav-link sub-link" href="{{route('inactive.users')}}"> Innactive Users</a>
                            <a href="" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <li>
                            <i class="fa fa-key"></i> <span class="ms-1 d-none d-sm-inline">Role Management</span>
                                <a class="nav-link sub-link" href="{{route('roles.index')}}"> View Roles</a>
                                <a class="nav-link sub-link"  href="{{route('roles.create')}}"> Create New Role</a>
                                <a class="nav-link sub-link" href="{{route('inactive.users')}}"> Innactive Roles</a></a>
                            </a></li>

                    </li>
                </ul>
                <hr>
                
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user"></i>
                        <span class="d-none d-sm-inline mx-1">Account</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                @csrf
                    <button type="submit" style="background: none; border: none; color: white; cursor: pointer; border-radius: 10px;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                    </form>
                    </div>
            </div>
        </div>
        <div style=" width:80%;" class="container">
         @yield('content')
        </div>
    </div>
</div>

</body>
</html>


