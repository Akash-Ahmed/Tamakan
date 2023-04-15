@extends('layouts.master')

@section('header_script')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_template/assets/custom_css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/custom_css/buttons.dataTables.min.css') }}">
@endsection


@section('footer_script')

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            // columns: [ 0, ':visible' ]
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            // columns: ':visible'
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                            // columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            } );
        } );
    </script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin_template/assets/js/plugins/chartjs/Chart.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin_template/assets/js/pages/be_pages_ecom_dashboard.min.js') }}"></script>


    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

@endsection

@section('main_content')
    <!-- Dynamic Table Full Pagination -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">All <small>Admin</small></h3>
            <a href="{{ route('admin.add') }}">
                <button type="button" class="btn btn-outline-success mr-5 mb-5">
                    <i class="fa fa-plus mr-5"></i>Add Admin
                </button>
            </a>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

            <table id="example" class="display table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> Name </th>
                    <th class="d-none d-sm-table-cell"> Email </th>
                    <th class="text-center"> Phone </th>
                    <th class="d-none d-sm-table-cell"> Type </th>
                    <th class="d-none d-sm-table-cell"> Status </th>
                    <th class="text-center"> Action </th>
                </tr>
                </thead>
                <tbody>

                @foreach($admin as $key=>$admins)
                    <tr class="odd gradeX">
                        <td class="text-center">{{ $key+1}}</td>
                        <td class="font-w600"> {{ $admins->name }} </td>
                        <td class="d-none d-sm-table-cell"> {{ $admins->email }} </td>
                        <td class="text-center"> {{ $admins->phone }} </td>
                        @if($admins->is_admin == 0)
                            <td class="d-none d-sm-table-cell">
                                <a href="{{ url('/admin/role_update/'.$admins->id) }}">
                                    <div class="col-sm-6 col-xl-4">
                                        <button type="button" class="btn btn-outline-warning min-width-125">Super Admin</button>
                                    </div>
                                </a>
                            </td>
                        @else
                            <td class="d-none d-sm-table-cell">
                                <a href="{{ url('/admin/role_update/'.$admins->id) }}">
                                    <div class="col-sm-6 col-xl-4">
                                        <button type="button" class="btn btn-outline-secondary min-width-125">Admin</button>
                                    </div>
                                </a>
                            </td>
                        @endif
                        @if($admins->status == 0)
                            <td class="d-none d-sm-table-cell">
                                <a href="{{ url('/admin/status_update/'.$admins->id) }}">
                                    <div class="col-sm-6 col-xl-4">
                                        <button type="button" class="btn btn-success min-width-125">Activate</button>
                                    </div>
                                </a>
                            </td>
                        @else
                            <td class="d-none d-sm-table-cell">
                                <a href="{{ url('/admin/status_update/'.$admins->id) }}">
                                    <div class="col-sm-6 col-xl-4">
                                        <button type="button" class="btn btn-danger min-width-125">Deactivate</button>
                                    </div>
                                </a>
                            </td>
                        @endif
                        <td class="text-center">
                            <a href="{{ url('/admin/delete/'.$admins->id) }}" onclick="return confirm('Are you sure to delete')"
                               class="btn btn-primary btn-xs">
                                <i class="fa fa-trash-o "></i>
                            </a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> Name </th>
                    <th class="d-none d-sm-table-cell"> Email </th>
                    <th class="text-center"> Phone </th>
                    <th class="d-none d-sm-table-cell"> Type </th>
                    <th class="d-none d-sm-table-cell"> Status </th>
                    <th class="text-center"> Action </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full Pagination -->
@endsection

