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
                    <a class="nav-link text-white" aria-current="page" href="{{ url('/admin-page') }}"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                        </svg> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>

<div class="container mt-4">
    <caption>Administrator : {{ session('admin-info')->username }}</caption>
    <table class="table mt-2 align-middle text-center">
        <thead class="table-dark">
            <tr>
                <td>ID</td>
                <td>username</td>
                <td>password</td>
                <td>phone</td>
                <td>email</td>
                <td>created_at</td>
                <td>updated_at</td>
                <td>image</td>
                <td>action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($userData as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->password }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td><img src="{{ asset('uploads/user_upload/' . $item->user_img) }}" class="rounded" width="50px" height="50px" alt="user-image"></td>
                    <td> 
                        <a class="btn btn-primary btn-sm" href="{{ url('admin-edit-page/' . $item->id) }}" role="button">edit</a>
                        <a class="btn btn-danger btn-sm" href="{{ url('admin-delete-page/' . $item->id) }}" role="button">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('layouts.footer')
