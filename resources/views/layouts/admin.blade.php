<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/softui/img/apple-icon.png')}}">
    <link rel="icon" type="image/png')}}" href="{{asset('admin/softui/img/favicon.png')}}">
    <meta name="description" content="{{$seo_desc ?? null}}">
    <title>
        {{$seo_name ?? null }}  Astudio Management Dashboard
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Nucleo Icons -->
    <link href="{{asset('admin/softui/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/softui/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('admin/softui/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->

    <link id="pagestyle" href="{{asset('admin/softui/css/soft-ui-dashboard.css?v=1.0.3')}}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet" >
    {{--    <script src="{{ mix('js/app.js') }}" defer></script>--}}
    <link rel="stylesheet" href="{{asset('admin/softui/css/main.css')}}">
    @livewireStyles

</head>


<body class="g-sidenav-show  bg-gray-100 " >
<livewire:admin.supports.left-menu>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">


        <div class="main p-4">
            @yield('content')
        </div>


        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            <a href="https://www.astudio.am" target="_blank">
                                Web Development </a><i class="fa fa-heart"></i> by
                            Astudio LLC
                            for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>


    @livewireScripts



    {{--<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"   data-turbolinks-eval="false" data-turbo-eval="false"></script>--}}
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

    <script src="{{asset('admin/softui/js/plugins/jquery-3.6.0.min.js')}}"></script>
    <!--   Core JS Files   -->
    <script src="{{asset('admin/softui/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admin/softui/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/softui/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/softui/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/softui/js/plugins/chartjs.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="{{asset('admin/softui/js/plugins/github-buttons.js')}}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('admin/softui/js/soft-ui-dashboard.min.js?v=1.0.3')}}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{asset('admin/softui/js/main.js')}}"></script>
    {{--<script src="https://cdn.tiny.cloud/1/91acmhzmw1pbssmnf8maxkkvnjf5vusda86eoitujvznb57j/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
    <script src="{{asset('admin/softui/js/tinymce/js/tinymce/tinymce.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--<script src="//cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>--}}
    <script src="{{asset('admin/softui/ckeditor/ckeditor.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    @stack('js')

    <x-livewire-alert::scripts />

</body>

</html>

