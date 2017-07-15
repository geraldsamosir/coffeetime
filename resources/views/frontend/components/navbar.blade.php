<div class="section-menu">
  <!-- Main Menu Starts -->
  <nav id="main-menu" class="navbar navbar-default" role="navigation">
    <!-- Nav Header Starts -->
    <div class="container-fluid container-menu">
      <div class="navbar-header">
        <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse"
                data-target=".navbar-cat-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <i class="fa fa-bars"></i>
        </button>
      </div>
      <!-- Nav Header Ends -->

      <!-- Navbar Cat collapse Starts -->
      <div class="collapse navbar-collapse navbar-cat-collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown dropdown-submenu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown-main1" data-hover="dropdown-main1">Kopi</a>
            <div class="dropdown-menu dropdown-main1">
              <div class="dropdown-inner">
                <div class="submenu">
                  <div class="row">
                    @foreach($categoriesKopi as $category)
                      <div class="col-sm-4 submenu-category">
                        <a href="{{ url('list-product/'.$category->id) }}">
                          <div class="media-fa">
                            <div class="media-fa-left">
                              <img src="{{ Voyager::image($category->image) }}" class="categories-thumb img-responsive"
                                   alt="Image">
                            </div>
                            <div class="submenu-label">{{ $category->name }}</div>
                          </div>
                        </a>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown-main2" data-hover="dropdown-main2">Alat Kopi</a>
            <div class="dropdown-menu dropdown-main2">
              <div class="dropdown-inner">
                <div class="submenu">
                  <div class="row">
                    @foreach($categoriesAlat as $category)
                      <div class="col-sm-4 submenu-category">
                        <a href="{{ url('list-product/'.$category->id) }}">
                          <div class="media-fa">
                            <div class="media-fa-left">
                              <img src="{{ Voyager::image($category->image) }}" class="categories-thumb img-responsive"
                                   alt="Image">
                            </div>
                            <div class="submenu-label">{{ $category->name }}</div>
                          </div>
                        </a>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown-main2" data-hover="dropdown-main2">Artikel</a>
            <div id="dropdown-no-image" class="dropdown-menu">
                  <div class="row">
                    @foreach($categoriesArticle as $category)
                      <div class="article-subitem">
                        <a href="{{ url('list-article/'.$category->id) }}">
                          <div class="media-fa">
                            <div class="submenu-label">{{ $category->name }}</div>
                          </div>
                        </a>
                      </div>
                    @endforeach
                  </div>
            </div>
          </li>
          <li><a href="/komparasi">Komparasi</a></li>
        </ul>
      </div>
      <!-- Navbar Cat collapse Ends -->
    </div>
  </nav>
  <!-- Main Menu Ends -->
</div>
