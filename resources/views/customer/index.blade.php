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
                        <div class="col-sm-12">
                            <div class="panel panel-default m-auto">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Customer</h3>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="{{ route('customer.insert') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form">
                                            <div class=" col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Customer Name</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-5" class="control-label">Customer Phone</label>
                                                    <input type="number" name="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Customer Address</label>
                                                    <input type="text" name="address" class="form-control"></input>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-6" class="control-label">Customer Shopname</label>
                                                    <input type="text" name="shopname" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-5" class="control-label">Customer Picture</label>
                                                    <input class="form-control" name="photo" type="file">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-6" class="control-label">Account Holder</label>
                                                    <input class="form-control" name="account_holder" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Account Number</label>
                                                    <input type="number" name="account_number" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Branch Name</label>
                                                    <input type="text" name="branch_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Bank Name</label>
                                                    <input type="text" name="bank_name" class="form-control">
                                                </div>
                                                <button class="btn btn-success waves-effect waves-light"
                                                    type="submit">Save</button>
                                                <button class="btn btn-default waves-effect" type="button">Cancel</button>
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
