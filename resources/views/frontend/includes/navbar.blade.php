<nav class="navbar navbar-expand-lg navbar-dark " aria-label="Fifth navbar example">
    <div class="container-fluid">
   <a href="{{url('/')}}" class="navbar-brand"><i class="fas fa-car">Cars Easy</i></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span ><i class="fa-solid fa-bars"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
          <a href="{{url('/cars')}}" class="nav-link">Cars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/contact')}}">Contact</a>
          </li>
          <li class="nav-item">
          @if (Route::has('login'))
          <div class="hidden fixed ">
              @auth
                  {{-- <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a> --}}
                  <a href="/dashboard" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
              @else
                  <a href="{{ route('login') }}" class="nav-link">Log in</a>

                  @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="nav-link">Register</a>
                  @endif
              @endauth
          </div>
      @endif
        </li>




</div>
        </ul>

      </div>
    </div>
  </nav>
