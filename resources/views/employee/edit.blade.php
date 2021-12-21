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
                            <li><a href="#">Employee</a></li>
                            <li class="active">Employee Form</li>
                        </ol>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel panel-default m-auto">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Employee</h3>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="{{ url('/employee/update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form">
                                            <input type="hidden" name="employee_id" value="{{ $employee_edit->id }}">
                                            <div class=" col-md-4">
                                                <div class="form-group">
                                                    <label>Employee Name</label>
                                                    <input class="form-control" name="name" type="text"
                                                        value={{ $employee_edit->name }}>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Employee Email</label>
                                                    <input class="form-control" name="email" type="email"
                                                        value={{ $employee_edit->email }}>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-6" class="control-label">Employee Phone</label>
                                                    <input class="form-control" name="phone" type="number"
                                                        value={{ $employee_edit->phone }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Employee Address</label>
                                                    <textarea name="address" class="form-control " id="" cols="30"
                                                        rows="10">{{ $employee_edit->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-5" class="control-label">Employee Experience</label>
                                                    <input class="form-control " name="experience" type="number"
                                                        value={{ $employee_edit->experience }}>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-6" class="control-label">Employee Picture</label>
                                                    <input class="form-control" name="photo" type="file">
                                                </div>
                                                <img style="width: 50px"
                                                    src="{{ asset('uploads/employess') }}/{{ $employee_edit->photo }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Employee Salary</label>
                                                    <input class="form-control" name="slaray" type="number"
                                                        value={{ $employee_edit->slaray }}>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Empoyee City</label>
                                                    <input class="form-control" name="city" type="text"
                                                        value={{ $employee_edit->city }}>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-success waves-effect waves-light"
                                                    type="submit">Update</button>
                                                <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <form method="POST" action="{{ url('/employee/update') }}"
                                            class="cmxform form-horizontal tasi-form" id="signupForm"
                                            novalidate="novalidate" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="employee_id" value="{{ $employee_edit->id }}">
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Name *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="firstname" name="name" type="text"
                                                        value={{ $employee_edit->name }}>
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="lastname" class="control-label col-lg-2">Email *</label>
                                                <div class="col-lg-10">
                                                    <input class=" form-control" id="lastname" name="email" type="email"
                                                        value={{ $employee_edit->email }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Phone *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="username" name="phone" type="number"
                                                        value={{ $employee_edit->phone }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Address *</label>
                                                <div class="col-lg-10">
                                                    <textarea name="address" class="form-control " id="" cols="30"
                                                        rows="10">{{ $employee_edit->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Experience
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " name="experience" type="number"
                                                        value={{ $employee_edit->experience }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="email" class="control-label col-lg-2">Photo *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" name="photo" type="file">
                                                    <img class="w-25"
                                                        src="{{ asset('uploads/employess') }}/{{ $employee_edit->photo }}"
                                                        alt="">
                                                </div>

                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Salary
                                                    *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password" name="slaray"
                                                        type="number" value={{ $employee_edit->slaray }}>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">City *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control " id="confirm_password" name="city"
                                                        type="text" value={{ $employee_edit->city }}>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="submit">Save</button>
                                                    <a href="{{ route('employee.view') }}"
                                                        class="btn btn-default waves-effect">Back</a>
                                                </div>
                                            </div>
                                        </form> --}}

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
