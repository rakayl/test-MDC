<div class="sidebar">
    <div class="sidebar-inner">
        <div class="sidebar-user-area">
        
            <div class="sidebar-user-content">
                 <a href="{{ setRoute('home') }}" class="sidebar-main-logo">
                    <h6 class="title">{{ Auth::user()->name }}</h6>
                 </a>
            </div>
        </div>
        @php
            $current_route = Route::currentRouteName();
        @endphp
        <div class="sidebar-menu-wrapper">
            <ul class="sidebar-menu">
           
                
                @include('admin.components.side-nav.link',[
                    'route'     => 'user.index',
                    'title'     => "User",
                    'icon'      => "menu-icon las la-user",
                    "permission" => "users"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'roles.index',
                    'title'     => "Role",
                    'icon'      => "menu-icon las la-tag",
                    "permission" => "roles"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'pendaftaran.index',
                    'title'     => "Pendaftaran",
                    'icon'      => "menu-icon las la-user-plus",
                    "permission" => "pendaftaran"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'umum.index',
                    'title'     => "Poli Umum",
                    'icon'      => "menu-icon las la-user-plus",
                    "permission" => "umum"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'anak.index',
                    'title'     => "Poli Anak",
                    'icon'      => "menu-icon las la-baby",
                    "permission" => "anak"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'gigi_mulut.index',
                    'title'     => "Poli Gigi Mulut",
                    'icon'      => "menu-icon fas fa-tooth",
                    "permission" => "gigi_mulut"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'obgyn.index',
                    'title'     => "Poli Kandungan (Obgyn)",
                    'icon'      => "menu-icon las la-air-freshener",
                    "permission" => "obgyn"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'penyakit_dalam.index',
                    'title'     => "Poli Penyakit Dalam",
                    'icon'      => "menu-icon lab la-bity",
                    "permission" => "penyakit_dalam"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'saraf.index',
                    'title'     => "Poli Saraf",
                    'icon'      => "menu-icon las la-chart-line",
                    "permission" => "saraf"
                ])
                @include('admin.components.side-nav.link',[
                    'route'     => 'tht.index',
                    'title'     => "Poli THT",
                    'icon'      => "menu-icon las la-deaf",
                    "permission" => "tht"
                ])
                 @include('admin.components.side-nav.link',[
                    'route'     => 'jantung.index',
                    'title'     => "Poli Jantung",
                    'icon'      => "menu-icon las la-hand-holding-heart",
                    "permission" => "jantung"
                ])
                 @include('admin.components.side-nav.link',[
                    'route'     => 'mata.index',
                    'title'     => "Poli Mata",
                    'icon'      => "menu-icon las la-eye",
                    "permission" => "mata"
                ])
            </ul>
        </div>
    </div>
</div>
