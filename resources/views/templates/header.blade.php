<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JOBS-Portal</title>
    <link href="https://colorhunt.co/palette/863a6f975c8dd989b5ffadbc">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body style="background-color:beige">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">JOBS-Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Left-aligned links -->
      <ul class="navbar-nav me-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @endguest

        @auth
          @if(auth()->user()->role === 'employer')
            <li class="nav-item">
              <a class="nav-link" href="/employer/dashboard">Positions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/employer/create">Create New</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{ route('applicant.dashboard') }}">Jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('applications.index') }}">My Applications</a>
            </li>
          @endif
        @endauth
      </ul>

      <!-- Right-aligned logout button -->
      @auth
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST" class="d-flex">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
          </form>
        </li>
      </ul>
      @endauth
    </div>
  </div>
</nav>


@foreach (['success', 'update', 'warning', 'apply','account','logout','position','edit','delete'] as $type)
    @if(session($type))
        @php
            $colors = [
                'success' => '#d1fae5',
                'update'  => '#d1fae5',
                'apply'   => '#d1fae5',
                'warning' => '#fef3c7',
                'delete'  => '#fee2e2',
                'edit'    => '#e0f2fe',
                'account' => '#e0f2fe',
                'logout'  => '#e0f2fe',
                'position'=> '#e0f2fe',
            ];
        @endphp

        <div style="padding:10px;margin:10px 0;border-radius:6px;text-align:center;
            background: {{ $colors[$type] ?? '#e5e7eb' }};">
            {{ session($type) }}
        </div>
    @endif
@endforeach