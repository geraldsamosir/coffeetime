<div class="section-header">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="nav-logo">
          <a href="/">
            <img src="/images/logo.png" alt="CoffeeTime">
          </a>
        </div>
      </div>
      <div class="col-md-5">
        <div class="nav-search">
          {!! Form::open(['url'=>'/search-product', 'method'=>'GET']) !!}
          {{-- <form action="" method="post"> --}}
            <div id="search">
              <div class="input-group">
                {!! Form::text('query',null,['class'=>'form-control input-lg', 'placeholder'=>'Cari Product']) !!}
                <span class="input-group-btn">
                  <button class="btn btn-lg btn-danger" type="submit">
                  <i class="fa fa-search"></i>
                  </button>
                </span>

              </div>
            </div>
          {{-- </form> --}}
          {!! Form::close() !!}
        </div>
      </div>
      <div class="col-md-2">
        <div class="nav-login">
          <span class="nav-login-dropdown">
            <li class="dropdown dropdown-profile">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10">
                @if(Auth::check()) <a href="{{ url('/user/'.Auth::user()->id) }}">Hello, {{ Auth::user()->name }}</a> @else <a href="">Login</a></span> @endif
                <i class="fa fa-caret-down"></i>
              </a>
              <div class="dropdown-menu">
                <div class="dropdown-inner dropdown-inner-profile">
                  <ul class="list-unstyled">
                    @if(Auth::check())
                     <li>
                      <a tabindex="-1" href="{{ url('/customer/akun') }}">
                        <span class="fa fa-user-o"></span>
                        Detail Akun
                      </a>
                    </li>
                    <li>
                      <a tabindex="-1" href="{{ url('customer/portfolio') }}">
                        <span class="fa fa-address-book"></span>
                        portfolio
                      </a>
                    </li>
                    <li>
                      <a tabindex="-1" href="{{ url('/customer/transaksi') }}">
                        <span class="fa fa-shopping-cart"></span>
                        Riwayat Transaksi
                      </a>
                    </li>
                    <li>
                      <a tabindex="-1" href="{{ url('/customer/article') }}">
                        <span class="fa fa-book"></span>
                        Artikel Saya
                      </a>
                    </li>
                    <li>
                      <a tabindex="-1" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit()">
                        <span class="fa fa-sign-out"></span>
                        Logout
                      </a>
                      <form id="logout" action="{{ url('/logout')}}" method="POST" style="display:none;">
                        {{ csrf_field() }}
                      </form>
                    </li>
                    @else
                    <li>
                      <a tabindex="-1" href="/login">
                        <span class="fa fa-sign-in"></span>
                        Login
                      </a>
                    </li>
                    <li>
                      <a tabindex="-1" href="/register">
                         <span class="fa fa-user-o"></span>
                         Register
                      </a>
                    </li>
                    @endif
                  </ul>
                </div>
              </div>
            </li>
          </span>
        </div>
      </div>
      <div class="col-md-2">
        <div class="nav-cart">
          <a href="{{ url('/cart') }}" class="cart-detail">
            <i class="fa fa-shopping-cart"></i>
            <span class="cart-count">({{ count(Cart::content())  }} items)</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
