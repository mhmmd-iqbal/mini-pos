<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a href="#">
                    <div class="d-flex justify-content-between">
                        <img src="{{{URL::asset('template/images/icon/majoo_icon_white.png')}}}" width="60" height="auto" alt="Cool Admin" />
                        <img src="{{{URL::asset('template/images/icon/majoo_text_white.png')}}}" width="150" height="auto" alt="Cool Admin" />
                    </div>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box ">
                        <span class="hamburger-inner fa fa-align-justify text-success"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                    <a href="{{route('dashboard')}} ">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub {{ (request()->is('master*')) ? 'active' : '' }}">
                    <a class="js-arrow" href="#">
                        <i class="fas  fa-th-large"></i>Master Data</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        {{-- <li>
                            <a href="">Data Hak Akses</a>
                        </li> --}}
                        <li>
                            <a href="">Data User</a>
                        </li>
                        <li>
                            <a href="">Data Kategori Produk</a>
                        </li>
                        <li>
                            <a href="">Data Produk</a>
                        </li>
                        <li>
                            <a href="">Data Suplier</a>
                        </li>
                        <li>
                            <a href="">Data Pelanggan</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="has-sub {{ (request()->is('report*')) ? 'active' : '' }}">
                    <a class="js-arrow" href="#">
                        <i class="fas  fa-list"></i>Master Data</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        {{-- <li>
                            <a href="">Data Hak Akses</a>
                        </li> --}}
                        <li>
                            <a href="">Laporan Pembelian</a>
                        </li>
                        <li>
                            <a href="">Laporan Penjualan</a>
                        </li>                        
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <div class="d-flex justify-content-between">
                <img src="{{{URL::asset('template/images/icon/majoo_text_white.png')}}}" width="150" height="auto" alt="Cool Admin" />
            </div>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                    <a href="{{route('dashboard')}} ">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                @can('isAdmin')
                <li class="has-sub {{ (request()->is('master*')) ? 'active' : '' }}">
                    <a class="js-arrow" href="#">
                        <i class="fas  fa-th-large"></i>Master Data</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="display:{{ (request()->is('master*')) ? 'block' : 'none' }}">
                        <li class="{{ (request()->is('master/user*')) ? 'active' : '' }}">
                            <a href="{{route('user.index')}}">Data User</a>
                        </li>
                        <li class="{{ (request()->is('master/category*')) ? 'active' : '' }}">
                            <a href="{{route('category.index')}}">Data Kategori Produk</a>
                        </li>
                        <li class="{{ (request()->is('master/product*')) ? 'active' : '' }}">
                            <a href="{{route('product.index')}} ">Data Produk</a>
                        </li>
                        <li class="{{ (request()->is('master/suplier*')) ? 'active' : '' }}">
                            <a href="{{route('suplier.index')}} ">Data Suplier</a>
                        </li>
                        <li class="{{ (request()->is('master/customer*')) ? 'active' : '' }}">
                            <a href="{{route('customer.index')}} ">Data Pelanggan</a>
                        </li>
                        
                    </ul>
                </li>
                @endcan
                @canany(['isAdmin', 'isCasheer'])
                <li class="{{ (request()->is('about')) ? 'active' : '' }}">
                    <a href="">
                        <i class="fas fa-toggle-up"></i>Transaksi Penjualan</a>
                </li>
                <li class="{{ (request()->is('purchase/transaction*')) ? 'active' : '' }}">
                    <a href="{{route('purchase.transaction')}}">
                        <i class="fas fa-toggle-down"></i>Transaksi Pembelian</a>
                </li>
                @endcanany
                @can('isAdmin')
                <li class="has-sub {{ (request()->is('report*')) ? 'active' : '' }}">
                    <a class="js-arrow" href="#">
                        <i class="fas  fa-list"></i>Laporan Transaksi</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        {{-- <li>
                            <a href="">Data Hak Akses</a>
                        </li> --}}
                        <li>
                            <a href="">Laporan Pembelian</a>
                        </li>
                        <li>
                            <a href="">Laporan Penjualan</a>
                        </li>                        
                    </ul>
                </li>
                @endcan
                <li class="{{ (request()->is('about')) ? 'active' : '' }}">
                    <a href="#" onclick="logout()">
                        <i class="fas fa-power-off"></i>Log Out</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->