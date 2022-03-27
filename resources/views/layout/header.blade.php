<header>
      <div class="header-container">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-sm-4 hidden-xs">
                <!-- Default Welcome Message -->
                <div class="welcome-msg ">Welcome to MyStore! </div>
                <span class="phone hidden-sm">Call Us: 0988539062</span>
              </div>

              <!-- top links -->
              <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
                <div class="links">
                @if (Auth::check())
                  <div class="myaccount">
                    <a title="My Account" href="{{route('don-hang')}}">
                      <i class="fa fa-user"></i>
                      <span class="hidden-xs">Chào bạn {{Auth::user()->fullname}}</span>
                    </a>
                  </div>
                  <div class="myaccount">
                    <a title="My Account" href="{{route('post-dang-xuat')}}">
                      <i class="fa fa-user"></i>
                      <span class="hidden-xs">Đăng xuất</span>
                    </a>
                  </div>

                  @else
                    <div class="myaccount">
                      <a title="My Account" href="{{route('dang-ki')}}">
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs">Đăng kí</span>
                      </a>
                    </div>

                    <div class="login">
                      <a href="{{route('tai-khoan')}}">
                        <i class="fa fa-unlock-alt"></i>
                        <span class="hidden-xs">Đăng nhập</span>
                      </a>
                    </div>

                  @endif

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-md-3 col-xs-12">
              <!-- Header Logo -->
              <div class="logo">
                <a title="e-commerce" href="{{route('trang-chu')}}">
                  <img alt="responsive theme logo" src="main/images/logo.png">
                </a>
              </div>
              <!-- End Header Logo -->
            </div>
            <div class="col-xs-9 col-sm-6 col-md-6">
              <!-- Search -->

              <div class="top-search">
                <div id="search">
                  <form method="GET" action="{{route('getsearch')}}">
                    <div class="input-group">
                    <select class="cate-dropdown hidden-xs" >
                        <option>MyStore</option>
                      </select>
                      <input type="text" class="form-control" placeholder="Nhập tìm kiếm của bạn..." name="key">
                      <button class="btn-search" type="submit">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- End Search -->
            </div>
            <!-- top cart -->

            <div class="col-lg-3 col-xs-3 top-cart">
              <div class="top-cart-contain">
                <div class="mini-cart">
                  <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                    
                        <div class="cart-icon">
                          <a target="_blank" href="{{route('gio-hang')}}">
                            <i class="fa fa-shopping-cart"></i>
                            </a>
                          </div>
                        <div class="shoppingcart-inner hidden-xs">
                        <a  href="{{ route('gio-hang') }}">
                            <span class="cart-title">Giỏ Hàng</span>
                            @if(Session::has('cart'))
                            <span class="cart-total">{{Session('cart')->totalQty}} Items: {{number_format(Session('cart')->totalPrice)}}</span>
                            @else
                            <span class="cart-total">Trống</span>
                            @endif
                          </a>
                        </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    <!-- Navbar -->
    <nav>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-4">
            <div class="mm-toggle-wrap">
              <div class="mm-toggle">
                <i class="fa fa-align-justify"></i>
              </div>
              <span class="mm-label">Danh Mục</span>
            </div>
            <div class="mega-container visible-lg visible-md visible-sm">
              <div class="navleft-container">
                <div class="mega-menu-title">
                  <h3>Danh Mục</h3>
                </div>
                <div class="mega-menu-category" style="display: none;">
                  <ul class="nav">
                  @foreach($menu as $m)
                    @if(count($m->levelTwo)==0)
                    <a href="{{route('loai-sp',$m->id)}}">
                       <li><i class="icon fa {{$m->icon}}"></i>{{$m->name}}</a></li>
                    @else
                    <li>
                      <a href="{{route('loai-sp',$m->id)}}">
                        <i class="icon fa {{$m->icon}}"></i>{{$m->name}}</a>
                      <div class="wrap-popup column1">
                        <div class="popup">
                          <div class="row">
                            <div class="col-md-12">
                              <ul class="nav">
                              @foreach($m->levelTwo as $l2)
                                <li>
                                  <a href="{{route('loai-sp',$l2->id)}}">
                                    <span>{{$l2->name}}</span>
                                  </a>
                                </li>
                              @endforeach
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    @endif
                  @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-sm-8">
            <div class="mtmegamenu">
              <ul>
                <li class="mt-root demo_custom_link_cms">
                  <div class="mt-root-item">
                    <a href="{{route('trang-chu')}}">
                      <div class="title title_font">
                        <span class="title-text">Trang chủ </span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="{{route('lien-he')}}">
                      <div class="title title_font">
                        <span class="title-text">Liên hệ </span>
                      </div>
                    </a>
                  </div>
                </li>
                <li class="mt-root">
                  <div class="mt-root-item">
                    <a href="{{route('about-us')}}">
                      <div class="title title_font">
                        <span class="title-text">Về chúng tôi </span>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- end nav -->
