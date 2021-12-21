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
                                    <form method="POST" action="{{ route('employee.insert') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form">
                                            <div class=" col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Employee Name</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-5" class="control-label">Employee Email</label>
                                                    <input type="text" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-6" class="control-label">Employee Phone</label>
                                                    <input type="number" name="phone" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Employee Address</label>
                                                    <textarea name="address" class="form-control " id="" cols="30"
                                                        rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-5" class="control-label">Employee Experience</label>
                                                    <input class="form-control " name="experience" type="number">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-6" class="control-label">Employee Picture</label>
                                                    <input class="form-control" name="photo" type="file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Employee Salary</label>
                                                    <input type="number" name="slaray" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Empoyee City</label>
                                                    <input type="text" name="city" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
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
