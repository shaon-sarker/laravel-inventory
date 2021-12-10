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
                            <li><a href="#">Expense</a></li>
                            <li class="active">Expense Form</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="panel panel-default m-auto">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Expense
                                        <a href="{{ route('today.expense') }}"
                                            class="btn btn-sm btn-danger pull-right">Today</a>
                                        <a href="" class="btn btn-sm btn-info pull-right">This Month</a>
                                    </h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form">
                                        <form method="POST" action="{{ url('expense/update') }}"
                                            class="cmxform form-horizontal tasi-form" id="signupForm"
                                            novalidate="novalidate">
                                            @csrf
                                            <div class="form-group ">
                                                <input type="hidden" name="expense_id" value="{{ $expense_edit->id }}">
                                                <label for="firstname" class="control-label col-lg-2">Expense Details
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <textarea name="details" class="form-control" id="" cols="30"
                                                        rows="10">{{ $expense_edit->details }}</textarea>
                                                    {{-- @error('name')
                                                        {{ $message }}
                                                    @enderror --}}
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Amount *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" id="username" name="amount" type="text"
                                                        value="{{ $expense_edit->amount }}">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Month *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="month" type="hidden"
                                                        value="{{ date('F') }}">
                                                    <input class="form-control " id="username" name="year" type="hidden"
                                                        value="{{ date('Y') }}">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Date *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="date" type="text"
                                                        value="{{ date('d/m/y') }}">
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
