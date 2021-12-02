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
                            <li><a href="#">Customer</a></li>
                            <li class="active">Customer Form</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-default m-auto">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Customer</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form">
                                        <form method="POST" action="{{ url('/customer/update') }}"
                                            class="cmxform form-horizontal tasi-form" id="signupForm"
                                            novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="customer_id" value="{{ $customer_edit->id }}">
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Name *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="firstname" name="name" type="text"
                                                        value={{ $customer_edit->name }}>
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Phone *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="phone" type="number"
                                                        value={{ $customer_edit->phone }}>
                                                    @error('phone')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Address *</label>
                                                <div class="col-lg-10">
                                                    <textarea name="address" class="form-control " id="" cols="30"
                                                        rows="10">{{ $customer_edit->address }}</textarea>
                                                    @error('address')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">ShopName
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " name="shopname" type="text"
                                                        value={{ $customer_edit->shopname }}>
                                                    @error('shopname')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="email" class="control-label col-lg-2">Photo *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="photo" type="file">
                                                    <img class="w-25"
                                                        src="{{ asset('uploads/customers') }}/{{ $customer_edit->photo }}"
                                                        alt="">
                                                </div>

                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Account Holder
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password"
                                                        name="account_holder" type="text"
                                                        value={{ $customer_edit->account_holder }}>
                                                    @error('account_holder')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Account Number
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password"
                                                        name="account_number" type="number"
                                                        value={{ $customer_edit->account_number }}>
                                                    @error('account_number')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Branch Name
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password" name="branch_name"
                                                        type="text" value={{ $customer_edit->branch_name }}>
                                                    @error('branch_name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Bank Name
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password" name="bank_name"
                                                        type="text" value={{ $customer_edit->bank_name }}>
                                                    @error('bank_name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="submit">Save</button>
                                                    <a href="{{ route('customer.view') }}"
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
