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
                            <li><a href="#">Supplier</a></li>
                            <li class="active">Supplier Form</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-default m-auto">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Supplier</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form">
                                        <form method="POST" action="{{ route('supplier.insert') }}"
                                            class="cmxform form-horizontal tasi-form" id="signupForm"
                                            novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Name *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="firstname" name="name" type="text">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Email *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="firstname" name="email" type="email">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Phone *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="phone" type="number">
                                                    @error('phone')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Address *</label>
                                                <div class="col-lg-10">
                                                    <textarea name="address" class="form-control " id="" cols="30"
                                                        rows="10"></textarea>
                                                    @error('address')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Supplier Type</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="type">
                                                        <option>Select your Supplier</option>
                                                        <option value="Distributor">Distributor</option>
                                                        <option value="Whole Seller">Whole Seller</option>
                                                        <option value="Brochure">Brochure</option>
                                                    </select>
                                                    @error('type')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="email" class="control-label col-lg-2">Photo *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="photo" type="file">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Shop Name *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="shop" type="text">
                                                    @error('shop')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Account Holder
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" id="username" name="account_holder"
                                                        type="text">
                                                    @error('account_holder')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Account number
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password"
                                                        name="account_number" type="number">
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
                                                        type="text">
                                                    @error('branch_name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Bank Name *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="bank_name" type="text">
                                                    @error('bank_name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="submit">Save</button>
                                                    <button class="btn btn-default waves-effect"
                                                        type="button">Cancel</button>
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
