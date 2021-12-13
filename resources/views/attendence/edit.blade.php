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
                            <li><a href="#">Attendence</a></li>
                            <li><a href="{{ route('employee') }}">Attendence Form</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Update Employee Attendence <a href="{{ route('attendence') }}"
                                        class="btn btn-sm btn-info pull-right">Take Attendence</a></h3>
                                </h3>
                                <button type="button" id="json" class="btn btn-primary">To json</button>
                                <button type="button" id="csv" class="btn btn-success">To CSV</button>
                                <button type="button" id="create_pdf" class="btn btn-primary">To Pdf</button>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <form action="{{ url('/attendence/update') }}" method="POST">
                                            @csrf
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Name</th>
                                                        <th>Picture</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($edit_attendence as $edit_attendence_info)
                                                        <tr>
                                                            <input type="hidden" name="id[]"
                                                                value="{{ $edit_attendence_info->id }}">
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $edit_attendence_info->name }}</td>
                                                            <td><img style="height: 60px; width:60px"
                                                                    src="{{ asset('uploads/employess') }}/{{ $edit_attendence_info->photo }}"
                                                                    alt=""></td>
                                                            <td class="actions pr-5">
                                                                {{-- <input type="hidden" name="employee_id[]"
                                                                    value="{{ $edit_attendence_info->id }}"> --}}
                                                                <input type="radio" class="form-control" value="Present"
                                                                    name="attendence[{{ $edit_attendence_info->id }}]"
                                                                    {{ $edit_attendence_info->attendence == 'Present' ? 'checked' : '' }}>Present
                                                                <input type="radio" class="form-control" value="Absence"
                                                                    name="attendence[{{ $edit_attendence_info->id }}]"
                                                                    {{ $edit_attendence_info->attendence == 'Absence' ? 'checked' : '' }}>Absence
                                                            </td>
                                                            <input type="hidden" name="attendence_date"
                                                                value="{{ date('d/m/y') }}">
                                                            <input type="hidden" name="attendence_year"
                                                                value="{{ date('Y') }}">
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <button type="submit" class="btn btn-primary">Update
                                                Attendence</button>
                                        </form>
                                    </div>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        });

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

        $('#json').on('click', function() {
            $("#datatable").tableHTMLExport({
                type: 'json',
                filename: 'sample.json'
            });
        })
        $('#csv').on('click', function() {
            $("#datatable").tableHTMLExport({
                type: 'csv',
                filename: 'sample.csv'
            });
        })
        // $('#pdf').on('click', function() {
        //     $("#datatable").tableHTMLExport({
        //         type: 'pdf',
        //         filename: 'sample.pdf'
        //     });
        // })
    </script>
@endsection
