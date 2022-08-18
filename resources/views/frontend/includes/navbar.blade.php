@include('frontend.includes.header')
                <nav id="primary-nav" >.
                <div class=" d-flex justify-content-between align-items-center py-3">
                    <div class="d-flex justify-content-start align-items-center">
                  <li>
                    <a class="nav-link" href="{{url('/')}}">
                        <i class="fas fa-car fa-2x ">Cars Easy</i>
                        </a>

                  </li>
                  <li ><a class="nav-link" href="{{route('home')}}">Home</a></li>
                  <li ><a class="nav-link" href="{{url('cars')}}">Cars</a></li>

                  <li >
                      <a class="nav-link" href="{{url('about')}}">About</a>

                  </li>

                  <li><a class="nav-link" href="{{url('contactus')}}">Contact Us</a></li>
                </div>
                  <div class="d-flex align-items-center py-3">

                <li>
                                @if (Route::has('login'))
                                <div class="nav-link ">
                                    @auth
                                    <a class="nav-item" href="{{ route('myprofile') }}">Profile</a>
                                    <a  class="nav-item" href="{{ route('car.booking') }}"">
                                        My Bookings
                               </a>

                                         <a href="/dashboard" class="nav-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                               Logout
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                          @csrf
                                      </form>
                                    @else
                     </li>
                                <li class="nav-item">

                                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                                </li>

                                     @endauth
                                </div>
                            @endif
                              </li>
                        </div>
                        </div>
                    </nav>




