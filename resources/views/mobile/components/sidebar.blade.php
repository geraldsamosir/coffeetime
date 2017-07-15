<ul id="slide-out" class="side-nav">
  @if(Auth::check())
    <li>
      <div class="user-view">
        <div class="background">
          <img src="{{url('images/backnav.jpg')}}">
        </div>
        <a href="#!user"><img class="circle" src={{Voyager::image(Auth::user()->avatar)}}></a>
        <a href="#!name"><span class="white-text name">{{Auth::user()->name}}</span></a>
        <a href="#!email"><span class="white-text email">{{Auth::user()->email}}</span></a>
      </div>
    </li>
  @endif
  <li><a href="/"><i class="material-icons">store</i>Home</a></li>


  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header collapsible-sidebar"><i class="material-icons icon-sidebar">invert_colors</i>Kopi
      </div>
      <ul class="collapsible-body collapsible-body-sidebar">
        @foreach($categoriesKopi as $kopi)
          <li><a href="{{url('list-product/'.$kopi->id)}}">{{$kopi->name}}</a></li>
        @endforeach
      </ul>
    </li>
  </ul>

  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header collapsible-sidebar"><i class="material-icons icon-sidebar">work</i>Alat</div>
      <ul class="collapsible-body collapsible-body-sidebar">
        @foreach($categoriesAlat as $kopi)
          <li><a href="{{url('list-product/'.$kopi->id)}}">{{$kopi->name}}</a></li>
        @endforeach
      </ul>
    </li>
  </ul>

  <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header collapsible-sidebar"><i class="material-icons icon-sidebar">assignment</i>Artikel
      </div>
      <ul class="collapsible-body collapsible-body-sidebar">
        @foreach($categoriesArticle as $category)
          <li><a href="{{url('list-article/'.$category->id)}}">{{$category->name}}</a></li>
        @endforeach
      </ul>
    </li>
  </ul>
  <li><a href="{{url('/komparasi')}}"><i class="material-icons">search</i>Komparasi</a></li>
  <li><a href="/cart"><i class="material-icons">shopping_cart</i>Cart</a></li>
  <li>
    <div class="divider"></div>
  </li>
  @if(!Auth::check())
    <li><a href="/login"><i class="material-icons">perm_identity</i>Login</a></li>
    <li><a href="/register"><i class="material-icons">assignment_ind</i>Register</a></li>
  @else
    <li><a href="/customer/akun"><i class="material-icons">account_box</i>Detail Akun</a></li>
    <li><a href="/customer/portfolio"><i class="material-icons">assignment</i>Portofolio</a></li>
    <li><a href="/customer/transaksi"><i class="material-icons">history</i>Riwayat Transaksi</a></li>
    <li><a href="/customer/article"><i class="material-icons">description</i>Artikel</a></li>
    <li><a onclick="event.preventDefault(); document.getElementById('logout').submit()"><i class="material-icons">power_settings_new</i>Logout</a>
    </li>
    <form id="logout" action="{{ url('/logout')}}" method="POST" style="display:none;">
      {{ csrf_field() }}
    </form>
  @endif
  {{-- <li><div class="divider"></div></li> --}}
  {{-- <li><a class="subheader">Subheader</a></li> --}}
  {{-- <li><a class="waves-effect" href="#!">Third Link With Waves</a></li> --}}
</ul>
<div class="menu-block">

  <span data-activates="slide-out" class="button-collapse" class="menu-header"><i
      class="material-icons">menu</i></a></span>
  {{-- <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a> --}}
  <span class="menu-header">Coffee Time</span>
</div>

<div id="menu-padding-helper"></div>