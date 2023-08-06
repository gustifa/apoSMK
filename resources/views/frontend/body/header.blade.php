 <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="{{url('/')}}"><span>SIPO</span>SMK</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('/')}}">Home</a></li>

          <!-- <li class="drop-down"><a href="">About</a>
            <ul>
              <li><a href="about.html">About Us</a></li>
              <li><a href="team.html">Team</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="pricing.html">Pricing</a></li> -->
          @auth
                            @php
                                $id = Auth::user()->id;
                                $profileData = App\Models\User::find($id);
                                

                  @endphp
                  @if($profileData->role === 'admin')
                              <li> <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i>Dashboard</a></li>

                            <li>
                                <a href="{{route('admin.logout')}}"><i class="fas fa-user"></i>Logout</a>
                            
                            </li>
                  @elseif($profileData->role === 'guru')
                   <li> <a href="{{route('guru.dashboard')}}"><i class="fas fa-home"></i>Dashboard</a></li>

                            <li>
                                <a href="{{route('guru.logout')}}"><i class="fas fa-user"></i>Logout</a>
                            
                            </li>

                            @endif

                  @else
                  <li>
                   
                            <a href="{{route('login')}}"><i class="fas fa-user"></i>Login</a>
                     
                 
          
          </li>
@endauth
        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>

    </div>
  </header>