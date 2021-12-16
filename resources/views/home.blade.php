@extends('layouts.dashboad')
@section('content')
    @include('layouts.nav')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">{{ App\Models\Order::total_amount() }}</span>
                                Total Sales
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Today Sales</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">956</span>
                                New Orders
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Orders <span class="pull-right">90%</span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="sr-only">90% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-purple"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">20544</span>
                                Unique Visitors
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Visitors <span class="pull-right">60%</span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="60"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-pink"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">5210</span>
                                New Users
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Users <span class="pull-right">57%</span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-pink" role="progressbar" aria-valuenow="57"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                                            <span class="sr-only">57% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row-->
                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-success"><i class="ion-social-usd"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">15852</span>
                                Total Sales
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Sales <span class="pull-right">60%</span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-info"><i class="ion-ios7-cart"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">956</span>
                                New Orders
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Orders <span class="pull-right">90%</span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                            <span class="sr-only">90% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-purple"><i class="ion-eye"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">20544</span>
                                Unique Visitors
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Visitors <span class="pull-right">60%</span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="60"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="mini-stat clearfix bx-shadow">
                            <span class="mini-stat-icon bg-pink"><i class="ion-android-contacts"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter">5210</span>
                                New Users
                            </div>
                            <div class="tiles-progress">
                                <div class="m-t-20">
                                    <h5 class="text-uppercase">Users <span class="pull-right">57%</span></h5>
                                    <div class="progress progress-sm m-0">
                                        <div class="progress-bar progress-bar-pink" role="progressbar" aria-valuenow="57"
                                            aria-valuemin="0" aria-valuemax="100" style="width: 57%;">
                                            <span class="sr-only">57% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row-->
            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2015 © Moltran.
        </footer>

    </div>
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
