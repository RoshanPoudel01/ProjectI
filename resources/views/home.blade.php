<head>
     <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
 <!-- icheck bootstrap -->
 <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@if (session()->has('status'))
    <script>alert('{{ session()->get('status') }}')</script>
@endif
@include('frontend.includes.navbar')
{{-- Logout --}}
{{-- <a href="/dashboard" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    <i class="nav-icon fas fa-sign-out-alt"></i>
    <p>
        Logout
    </p>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form> --}}
