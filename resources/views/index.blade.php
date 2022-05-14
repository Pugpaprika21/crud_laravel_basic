@include('layouts.header')

<style>
    .container {
        margin-top: 100px;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">ระบบตัดเกรด</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="#"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg> home
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>

@if ( session('status') )
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>    
@endif

<div class="container d-flex justify-content-center">
    <div class="card shadow-sm rounde" style="width: 30rem;">
        <div class="card-header bg-primary text-white">
            Login 
        </div>
        <div class="card-body">
            <form action="" method="post">
                @csrf
                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                    </span>
                    <input type="text" class="form-control" name="username" placeholder="username"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>

                @error('username')<div class="mb-4"> {{ $message }} </div>@enderror

                <div class="input-group mb-4">
                    <span class="input-group-text" id="basic-addon2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-lock" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                        </svg>
                    </span>
                    <input type="text" class="form-control" name="password" placeholder="password"
                        aria-label="password" aria-describedby="basic-addon2">
                </div>

                @error('password')<div class="mb-4"> {{ $message }} </div>@enderror

                <div class="mb-2 mt-2">
                    position : &nbsp;
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_role" value="admin" required>
                        <label class="form-check-label" for="admin">admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_role" value="user">
                        <label class="form-check-label" for="user">user</label>
                    </div>
                </div>

                <div class="mb-4 d-flex justify-content-end">
                    <a href="{{ url('/register') }}" class="link-primary text-decoration-none">register here!</a>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%">Login</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
