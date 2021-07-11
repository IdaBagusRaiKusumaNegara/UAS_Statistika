<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('/AdminLTE/dist/img/siwo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Statistika</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/AdminLTE/dist/img/rai.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Ida Bagus Rai Kusuma N.</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="{{ route('beranda') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('data') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Statistika
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('frekuensi') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Frekuensi
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('data-berkelompok')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Berkelompok
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('chikuadrat')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Chikuadrat
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('lilliefors')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Lilliefors
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('produkmoment')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Produk Moment
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('uji-t') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Uji T
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('uji-anava') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Uji Anava
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>