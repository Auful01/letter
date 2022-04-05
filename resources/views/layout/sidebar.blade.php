<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">SMART LETTERS SAVE </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrasi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Keanggotaan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                @if (Auth::user()->jabatan->jabatan == 'Sekretaris')
                    <a class="collapse-item" href="{{ route('registrasi-anggota') }}">Registrasi Anggota</a>
                @endif
                <a class="collapse-item" href="{{ route('data-anggota') }}">Data Anggota</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> --}}




    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        SURAT KELUAR
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::user()->jabatan->jabatan == 'Sekretaris')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Jenis Surat</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded kategori">
                    <h6 class="collapse-header jenis-surat" id="">Jenis Surat:</h6>

                    {{-- <a class="collapse-item kategori" href="{{ route('form-sktm') }}"></a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Pindah (Keluar/Datang)</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Persyaratan Ahli Waris</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Pensiunan</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Umum/ Serbaguna</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Domisili Penduduk</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat pengantar Ijin Keramaian</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Keterangan Janda/Duda</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Pengantar NA</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Keterangan Belum Kawin</a>
                        <a class="collapse-item" href="{{ route('arsip') }}">Surat Keterangan Usaha</a> --}}

                </div>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('input-surat') }}">
                <i class="far fa-calendar-alt"></i>
                <span>Input Surat</span></a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Rekapan Surat</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded kategori">
                <h6 class="collapse-header jenis-surat">Rekapan:</h6>
                <a class="collapse-item " href="{{ route('rekap-sktm') }}">SKTM</a>

            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        SURAT MASUK
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if (Auth::user()->jabatan->jabatan == 'Sekretaris')
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#arsip" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Arsip</span>
            </a>
            <div id="arsip" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Jenis Surat:</h6>
                    <a class="collapse-item" href="{{ route('arsip') }}">SKTM</a>


                </div>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('arsip-surat-keluar') }}">
                <i class="far fa-calendar-alt"></i>
                <span>Rekap Arsip</span></a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rekapArsip" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Rekapan Arsip</span>
        </a>
        <div id="rekapArsip" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Rekapan:</h6>
                <a class="collapse-item" href="{{ route('rekap-arsip') }}">Arsip</a>

            </div>
        </div>
    </li>

    @if (Auth::user()->jabatan->jabatan == 'Sekretaris')
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            MEMO
        </div>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('memo') }}">
                <i class="far fa-calendar-check"></i>
                <span>Memo</span></a>
        </li>
    @endif
    @if (Auth::user()->jabatan->jabatan == 'Kepala Desa')
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            MEMO
        </div>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('list-memo') }}">
                <i class="far fa-calendar-alt"></i>
                <span>Memo</span></a>
        </li>
    @endif




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    {{-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> --}}

</ul>
