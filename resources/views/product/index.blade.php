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
                            <li><a href="#">Advance Salary</a></li>
                            <li class="active">Advance Salary Form</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="panel panel-default m-auto">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Advance Salary</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form">
                                        <form method="POST" action="{{ route('product.insert') }}"
                                            class="cmxform form-horizontal tasi-form" id="signupForm"
                                            novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Category Name</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="category_id">
                                                        <option>----Select Category----</option>
                                                        @foreach ($categorys as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Product Serial
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" name="product_serialno" type="text">
                                                    @error('product_serialno')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Product Name *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" name="prodruct_name" type="text">
                                                    @error('prodruct_name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Product Price
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" name="product_price" type="number">
                                                    @error('product_price')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Product Quantity
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" name="product_quantity" type="number">
                                                    @error('product_quantity')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Product Image
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" name="product_image" type="file">
                                                    @error('product_image')
                                                        <p class="text-danger">{{ $message }}</p>
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
