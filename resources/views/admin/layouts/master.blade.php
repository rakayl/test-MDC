<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($page_title) ? __($page_title) : __("Admin")) }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('icon.png') }}" type="image/x-icon">
    <link href="//fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/rte_theme_default.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/library/popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/lightcase.css') }}">
    <link rel="stylesheet" href="https://cdn.appdevs.net/fileholder/v1.0/css/fileholder-style.css" type="text/css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- main style css link -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <style>
        .fileholder-single-file-view{
            min-width: 130px;
        }
        .dashboard-title-part .left .icon {
            background-color:rgb(0 0 0 / 45%);
        }
        .sidebar {
            width:280px;
        }
        .body-wrapper {
            padding-left:330px;
        }
        .navbar-wrapper {
            margin-left:315px;
        }
        .dataTables_length {
            margin-bottom: 15px;
        }
        .dataTables_length select {
            width: auto;
            display: inline-block;
        }
        /* Untuk memastikan alignment yang tepat */
        .dataTables_length.d-flex {
            gap: 5px;
        }
        /* Styling untuk select box */
        .dataTables_length .form-select-sm {
            min-width: 80px;
            height: 30px;
            padding: 0.25rem 1.5rem 0.25rem 0.5rem;
        }
        
        /* Livewire loading indicator */
        .livewire-loading {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>

    @stack('css')
</head>
<body>

<div class="page-wrapper">
    <div id="body-overlay" class="body-overlay"></div>
    
    <!-- Livewire Loading Indicator -->
    <div class="livewire-loading" wire:loading>
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <span class="ms-2">Loading...</span>
    </div>
    
    @include('admin.partials.right-settings')
    @include('admin.partials.side-nav-mini')
    @include('admin.partials.side-nav')
    
    <div class="main-wrapper">
        <div class="main-body-wrapper">
            <nav class="navbar-wrapper" style="background-color:#BA181B;">
                <div class="dashboard-title-part">
                    @yield('page-title')
                    @yield('breadcrumb')
                </div>
            </nav>
            <div class="body-wrapper">
                <!-- Main Content Area for Livewire -->
                {{ $slot ?? '' }}
                @yield('content')
            </div>
        </div>
        @include('admin.partials.footer')
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="{{ asset('public/backend/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('public/backend/js/chart.js') }}"></script>
<script src="{{ asset('public/backend/js/jquery.nice-select.js') }}"></script>
<script src="{{ asset('public/backend/js/select2.js') }}"></script>
<script src="{{ asset('public/backend/js/rte.js') }}"></script>
<script src='{{ asset('public/backend/js/all_plugins.js') }}'></script>
<script src="{{ asset('public/backend/library/popup/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('public/backend/js/lightcase.js') }}"></script>
<script src="{{ asset('public/backend/js/ckeditor.js') }}"></script>
<script src="{{ asset('public/backend/js/main.js') }}"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>

<!-- Livewire Scripts -->
@livewireScripts

@include('admin.partials.notify')
@include('admin.partials.auth-control')

<script>
    var fileHolderAfterLoad = {};
</script>

<script src="https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-script.js" type="module"></script>
<script type="module">
    import { fileHolderSettings } from "https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-settings.js";
    import { previewFunctions } from "https://appdevs.cloud/cdn/fileholder/v1.0/js/fileholder-script.js";

    var inputFields = document.querySelector(".file-holder");
    fileHolderAfterLoad.previewReInit = function(inputFields){
        previewFunctions.previewReInit(inputFields)
    };

    fileHolderSettings.urls.uploadUrl = "";
    fileHolderSettings.urls.removeUrl = "";
</script>

<script>
    function fileHolderPreviewReInit(selector) {
        var inputField = document.querySelector(selector);
        fileHolderAfterLoad.previewReInit(inputField);
    }
    
    // lightcase
    $(window).on('load', function () {
      $("a[data-rel^=lightcase]").lightcase();
    });
    
    // fullscreen-bar
    let elem = document.documentElement;
    function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
      } else if (elem.webkitRequestFullscreen) {
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) {
        elem.msRequestFullscreen();
      }
    }

    function closeFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
      }
    }

    $('.header-fullscreen-bar').on('click', function(){
      $(this).toggleClass('active');
      $('.body-overlay').removeClass('active');
    });
    
    // Livewire event listeners
    document.addEventListener('livewire:load', function () {
        // Inisialisasi komponen setelah Livewire dimuat
        console.log('Livewire loaded successfully');
    });
    
    document.addEventListener('livewire:update', function () {
        // Re-inisialisasi script setelah Livewire update
        setTimeout(function() {
            if (typeof $.fn.select2 === 'function') {
                $('.select2').select2();
            }
            if (typeof $.fn.DataTable === 'function') {
                $('.datatable').DataTable();
            }
        }, 100);
    });
</script>

@stack('script')

</body>
</html>