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
        <li><a href="">Alat 1</a></li>
        <li><a href="">Alat 2</a></li>
        <li><a href="">Alat 3</a></li>
      </ul>
    </li>
  </ul>

  <li><a href="/"><i class="material-icons">assignment</i>Resep</a></li>
  <li><a href="/"><i class="material-icons">live_help</i>Bantuan</a></li>
  <li><a href="/"><i class="material-icons">contacts</i>Contact</a></li>
  <li>
    <div class="divider"></div>
  </li>
  <li><a href="/"><i class="material-icons">perm_identity</i>Login</a></li>
  <li><a href="/"><i class="material-icons">assignment_ind</i>Register</a></li>

  {{-- <li><div class="divider"></div></li> --}}
  {{-- <li><a class="subheader">Subheader</a></li> --}}
  {{-- <li><a class="waves-effect" href="#!">Third Link With Waves</a></li> --}}
</ul>
<div class="menu-block">

  <span data-activates="slide-out" class="button-collapse" class="menu-header"><i
      class="material-icons">menu</i></a></span>
  {{-- <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a> --}}
  <span class="menu-header">home</span>
</div>