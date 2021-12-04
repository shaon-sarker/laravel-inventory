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
                                        <form method="POST" action="{{ url('/supplier/update') }}"
                                            class="cmxform form-horizontal tasi-form" id="signupForm"
                                            novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="supplier_id" value="{{ $supplier_edit->id }}">
                                            <div class="form-group ">
                                                <label for="Name" class="control-label col-lg-2">Name *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="name" name="name" type="text"
                                                        value={{ $supplier_edit->name }}>

                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="Email" class="control-label col-lg-2">Email *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="firstname" name="email" type="email"
                                                        value={{ $supplier_edit->email }}>

                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Phone *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="phone" type="number"
                                                        value={{ $supplier_edit->phone }}>

                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Address *</label>
                                                <div class="col-lg-10">
                                                    <textarea name="address" class="form-control " id="" cols="30"
                                                        rows="10">{{ $supplier_edit->address }}</textarea>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Supplier Type</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="type">
                                                        <option>Select your Supplier</option>
                                                        <option value="{{ $supplier_edit->type }}">
                                                            {{ $supplier_edit->type }}</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="picture" class="control-label col-lg-2">Photo *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="photo" type="file">
                                                    <img class="w-25"
                                                        src="{{ asset('uploads/suppliers') }}/{{ $supplier_edit->photo }}"
                                                        alt="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="shop" class="control-label col-lg-2">ShopName
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " name="shop" type="text"
                                                        value={{ $supplier_edit->shop }}>
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="Accountholder" class="control-label col-lg-2">Account Holder
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="account_holder" type="text"
                                                        value={{ $supplier_edit->account_holder }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Account Number
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password"
                                                        name="account_number" type="number"
                                                        value={{ $supplier_edit->account_number }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Branch Name
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="branch_name" type="text"
                                                        value={{ $supplier_edit->branch_name }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Bank Name
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" id="confirm_password" name="bank_name"
                                                        type="text" value={{ $supplier_edit->bank_name }}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="submit">Update</button>
                                                    <a href="{{ route('supplier.view') }}"
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
