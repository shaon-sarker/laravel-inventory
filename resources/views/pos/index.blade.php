@extends('layouts.dashboad')
@section('content')
    @include('layouts.nav')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12 bg-info">
                        <h4 class="pull-left page-title text-white">POS(Point of Sale) !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#" class="text-white">Moltran</a></li>
                            <li class="text-white">{{ date('d/m/y') }}</li>
                        </ol>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="portfolioFilter">
                            @foreach ($categorys as $category_info)
                                <a href="#" data-filter="*" class="current">{{ $category_info->category_name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        @php
                            $cart_product = Cart::content();
                        @endphp

                        <div class="price_card text-center">
                            <ul class="price-features">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Quantity</th>
                                            <th>Selling price</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart_product as $cart_product_info)
                                            <tr>
                                                <td>{{ $cart_product_info->name }}</td>
                                                <td>
                                                    <form action="{{ url('/updatecart/' . $cart_product_info->rowId) }}"
                                                        method="POST">
                                                        @csrf
                                                        <input class="form-control" type="number" name="qty"
                                                            value="{{ $cart_product_info->qty }}">
                                                        <button type="submit"><i class="fa fa-check"></i></button>
                                                    </form>
                                                </td>
                                                <td>{{ $cart_product_info->price }}</td>
                                                <td>{{ $cart_product_info->price * $cart_product_info->qty }}</td>
                                                <td><a href="{{ url('/deletecart/' . $cart_product_info->rowId) }}"
                                                        class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </ul>
                            <div class="pricing-header bg-primary">
                                <p>Quantity : {{ Cart::count() }}</p>
                                <p>Sub Total : {{ Cart::subtotal() }}</p>
                                <p>Vat : {{ Cart::tax() }}</p>
                                <hr>
                                <p>
                                <h3 class="text-white">Total :</h3>
                                <h4 class="text-white">{{ Cart::total() }}</h4>
                                </p>

                                <form action="{{ route('invoice') }}" method="POST">
                                    @csrf
                                    <div class="panel">
                                        <h3>Customer <a href="" class="btn btn-success waves-effect waves-light pull-right"
                                                data-toggle="modal" data-target="#con-close-modal">Add New</a></h3>

                                        <select name="customer_id" class="form-control" id="">
                                            <option disabled="" selected="">Select Customer</option>
                                            @foreach ($customers as $customer_info)
                                                <option value="{{ $customer_info->id }}">{{ $customer_info->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                            <h5 class="text-danger"> {{ $message }}</h5>
                                        @enderror
                                    </div>

                                    {{-- <input type="hidden" name="customer_id" value="{{ $customer_info->name }}"> --}}
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Create
                                Invoice</button>
                            </form>
                        </div>

                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Category</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product_info)
                                    <tr>
                                        <form action="{{ url('/add-cart') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product_info->id }}">
                                            <input type="hidden" name="name" value="{{ $product_info->prodruct_name }}">
                                            <input type="hidden" name="qty"
                                                value="{{ $product_info->product_quantity }}">
                                            <input type="hidden" name="price" value="{{ $product_info->selling_price }}">
                                            <input type="hidden" name="weight" value="1">
                                            <td>{{ $product_info->product_serialno }}</td>
                                            <td>
                                                <img style="width:100px"
                                                    src="{{ asset('uploads/products') }}/{{ $product_info->product_image }}"
                                                    alt="">
                                            </td>
                                            <td>{{ $product_info->prodruct_name }}</td>
                                            <td>{{ $product_info->product_price }}</td>
                                            <td>{{ App\Models\Category::find($product_info->id)->category_name }}
                                            </td>
                                            <td class="actions pr-5">
                                                <button type="submit" class="btn btn-success btn-sm"><i
                                                        class="fa fa-plus-square"></i>Add</a></button>
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>




    <!-----Modal Start----->
    <form action="{{ route('customer.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content bg-success text-white">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title text-white">New Customer</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
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
                                    <label for="field-6" class="control-label">Customer Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Customer Shopname</label>
                                    <input type="text" name="shopname" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Customer Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Customer AccountHolder</label>
                                    <input type="text" name="account_holder" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-4" class="control-label">Account Number</label>
                                    <input type="number" name="account_number" class="form-control" id="field-4">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-5" class="control-label">Branch Name</label>
                                    <input type="text" name="branch_name" class="form-control" id="field-5">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-6" class="control-label">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control" id="field-6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Add Customer</button>
                    </div>
                </div>
            </div>
        </div>
    </form><!-- /.modal -->
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
