<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="ion-close"></i>
        </button>

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="index.html" class="logo"><img src="/assets_back/images/logo2.svg" width="50" height="50" > Ashiap Store</a><br>
                <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">

            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{route('admin.home')}}" class="waves-effect">
                            <i class="mdi mdi-airplay"></i>
                            <span> Dashboard <span class="badge badge-pill badge-primary float-right"></span></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('courier.index')}}" class="waves-effect"><i class="mdi mdi-truck"></i>
                            <span> Kurir </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('categories.index')}}" class="waves-effect"><i class="mdi mdi-database"></i>
                            <span> Kategori Produk </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('products.index')}}" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i>
                            <span> Data Produk </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('discount.index')}}" class="waves-effect"><i class="mdi mdi-coin"></i>
                            <span> Diskon Produk </span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/transaksi" class="waves-effect"><i class="mdi mdi-coin"></i>
                            <span> Transaksi </span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>
    <!-- Left Sidebar End -->