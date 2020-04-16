<header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s1">
	
    <!-- SidePanel -->
    <div id="slidepanel-1" class="slidepanel">
        <!-- Top Header -->
        <div class="container-fluid no-right-padding no-left-padding top-header">
            <!-- Container -->
            <div class="container">	
                <div class="row">
                    <div class="col-lg-4 col-6">
                     
                    </div>
                    <div class="col-lg-4 logo-block">
                        <a href="index.html" title="Logo">{{ $appName }}</a>
                    </div>
                    <div class="col-lg-4 col-6">
                        <ul class="top-right user-info">
                            <li><a href="#search-box" data-toggle="collapse" class="search collapsed" title="Search"><i class="pe-7s-search sr-ic-open"></i><i class="pe-7s-close sr-ic-close"></i></a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" href="#">
                                    @if(auth()->user())
                                   Hai,  {{auth()->user()->nama}}
                                    @endif
                                <i class="pe-7s-user"></i></a>
                                <ul class="dropdown-menu">
                                @if(auth()->user())
                                <li><a class="dropdown-item" href="{{ route('logout-v2') }}" title="Sign In">Keluar</a></li>

                                @else
                                <li><a class="dropdown-item" href="{{ route('login') }}" title="Sign In">Masuk Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('registrasi') }}" title="Log In">Registrasi</a></li>
                                @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- Container /- -->
        </div><!-- Top Header /- -->				
    </div><!-- SidePanel /- -->
    
    <!-- Menu Block -->
    <div class="container-fluid no-left-padding no-right-padding menu-block">
        <!-- Container -->
        <div class="container">				
            <nav class="navbar ownavigation navbar-expand-lg">
                <a class="navbar-brand" href="index.html">{{ $appName }}</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                    <ul class="navbar-nav">							
                        <li class="dropdown">
                            <a class="nav-link" title="Home" href="index.html">Beranda</a>
                        </li>
                        <li class="active dropdown">
                            <a class="nav-link" title="Posts" href="#">Kegiatan</a>
                        </li>
                        <li class="dropdown">
                            <i class="ddl-switch fa fa-angle-down"></i>
                            <a class="nav-link dropdown-toggle" title="Pages" href="#">Artikel</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="header-page.html" title="Header">Lihat Artikel</a></li>
                                <li class="dropdown">
										<i class="ddl-switch fa fa-angle-down"></i>
										<a class="dropdown-item dropdown-toggle" href="index-2.html" title="Home 2">Kategori</a>
										<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="index-2.html" title="Home 2">Home 2</a></li>
											<li><a class="dropdown-item" href="index-3.html" title="Home 3">Home 3</a></li>
											<li><a class="dropdown-item" href="index-4.html" title="Home 4">Home 4</a></li>
											<li><a class="dropdown-item" href="index-5.html" title="Home 5">Home 5</a></li>
											<li><a class="dropdown-item" href="index-6.html" title="Home 6">Home 6</a></li>
											<li><a class="dropdown-item" href="index-7.html" title="Home 7">Home 7</a></li>
											<li><a class="dropdown-item" href="index-8.html" title="Home 8">Home 8</a></li>
											<li><a class="dropdown-item" href="index-9.html" title="Home 9">Home 9</a></li>
											<li><a class="dropdown-item" href="index-10.html" title="Home 10">Home 10</a></li>
											<li><a class="dropdown-item" href="index-11.html" title="Home 11">Home 11</a></li>
										</ul>
									</li>                          
                            </ul>
                        </li>
                        <li><a class="nav-link" title="Features" href="#">Daftar Masjid</a></li>
                        <li><a class="nav-link" title="Contact" href="contact-us.html">Tentang Kami</a></li>

                        <li><a class="nav-link" title="Archives" href="#">Kontak</a></li>
                    
                    </ul>
                </div>
                <div id="loginpanel-1" class="desktop-hide">
                    <div class="right toggle" id="toggle-1">
                        <a id="slideit-1" class="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
                        <a id="closeit-1" class="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
                    </div>
                </div>
            </nav>
        </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
    <!-- Search Box -->
    <div class="search-box collapse" id="search-box">
        <div class="container">
        <form>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." required>
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit"><i class="pe-7s-search"></i></button>
                </span>
            </div>
        </form>
        </div>
    </div><!-- Search Box /- -->
</header>