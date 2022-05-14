@include('layouts.header')

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">CURD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ url('admin-update-page') }}"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg> admin page
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ url('index') }}"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg> back
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-sm rounded" style="width: 35rem">
        <div class="card-header bg-primary text-white">
            {{ session('admin-info')->username }} : EDIT USER 
        </div>
        <div class="card-body">
            <form action="{{ url('admin-update-page/' . $editUser->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" value="{{ $editUser->username }}" placeholder="username">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="password" value="{{ $editUser->password }}" placeholder="password">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="phone" value="{{ $editUser->phone }}" placeholder="phone">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="email" value="{{ $editUser->email }}" placeholder="email">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="user_img" value="{{ $editUser->user_img }}"> 
                        </div>
                        <div class="mb-3">
                            <img src="{{ asset('uploads/user_upload/' . $editUser->user_img) }}" class="rounded" width="70px" height="70px" alt="user-image">
                        </div>
                        <div class="mb-2">
                            position : &nbsp;
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_role" value="{{ $editUser->user_role }}" {{ ($editUser->user_role == 'admin') ? 'checked' : '' }}>
                                <label class="form-check-label" for="admin">admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_role" value="{{ $editUser->user_role }}" {{ ($editUser->user_role == 'user') ? 'checked' : '' }}>
                                <label class="form-check-label" for="user">user</label>
                            </div>    
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary" style="width: 100%">edit</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')