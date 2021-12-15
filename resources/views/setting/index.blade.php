@extends('layouts.dashboad')
@section('content')
    @include('layouts.nav')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Inventory</a></li>
                            <li><a href="#">Settings</a></li>
                            <li class="active">Settings Form</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-default m-auto">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Settings Update</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form">
                                        <form method="POST" action="{{ url('/setting/update') }}"
                                            class="cmxform form-horizontal tasi-form" id="signupForm"
                                            novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="setting_id" value="{{ $setting_info->id }}">
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Name *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" name="company_name" type="text"
                                                        value={{ $setting_info->company_name }}>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Address *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_address" type="text"
                                                        value={{ $setting_info->company_address }}>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Email *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_email" type="text"
                                                        value={{ $setting_info->company_email }}>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Phone *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_phone" type="text"
                                                        value={{ $setting_info->company_phone }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Logo *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_logo" type="file">
                                                    <img src="{{ asset('uploads/setting') }}/{{ $setting_info->company_logo }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Mobile *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_mobile" type="text"
                                                        value={{ $setting_info->company_mobile }}>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company City *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_city" type="text"
                                                        value={{ $setting_info->company_city }}>
                                                </div>
                                            </div>


                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Country *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_country" type="text"
                                                        value={{ $setting_info->company_country }}>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="control-label col-lg-2">Company Zipcode *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="company_zipcode" type="text"
                                                        value={{ $setting_info->company_zipcode }}>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="submit">Update</button>
                                                    <a href="{{ route('employee.view') }}"
                                                        class="btn btn-default waves-effect">Back</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('footer_script')
        <script>
            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}"
                switch(type){
                case 'info':
                toastr.info("{{ Session::get('message') }}");
                break

                case 'success':
                toastr.success("{{ Session::get('message') }}");
                break

                case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break

                case 'error':
                toastr.error("{{ Session::get('message') }}");
                break
                }
            @endif
        </script>
    @endsection
