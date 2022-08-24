<!--Start Dashboard Content-->
<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav  justify-content-end">


                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset('images/supports/astudio-icon.jpg')}}" alt="My Profile" title="My Profile" class="management-astudio-icon">
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        <li class="mb-2">
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); closest('form').submit();" class="text-reset text-decoration-none mb-3 d-block">
                                    <div class="row align-items-center m-0 w-100">
                                        <div class="col-2 p-0">
                                            <img src="{{asset('frontend/images/icons/cabinet/exit.svg')}}" class="img-fluid" alt="">
                                        </div>

                                    </div>
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('admin.orders')}}">

            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">New Orders</p>
                                <h5 class="font-weight-bolder mb-0 text-success ">
                                           {{$ordersCount ?? ''}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>

        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('admin.fast.orders')}}">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Fast Orders</p>
                                    <h5 class="font-weight-bolder mb-0 text-success">
                                        {{$fastOrdersCount ?? ''}}
                                    </h5>
                                </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <a href="{{route('admin.users')}}">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Monthly Users</p>
                                <h5 class="font-weight-bolder mb-0 text-success">
                                    {{$month_users_count ?? ''}}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>
</div>
{{--<div class="row py-1 px-3">--}}
{{--    <div class="col-12 col-lg-8 col-xl-8 w-100">--}}
{{--        <div class="card">--}}
{{--            <h6 class="text-center">{{ $chart->options['chart_title'] }}</h6>--}}
{{--            {!! $chart->renderHtml() !!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--</div>--}}




    {!! $chart->renderChartJsLibrary() !!}
    {!! $chart->renderJs() !!}
<!--End Dashboard Content-->
