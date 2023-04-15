@extends('admin.layout.master')

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
                            columns: [ 0, ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 0, 1, 2, 5 ]
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
            <h3 class="block-title">All <small>Category</small></h3>
            <a href="{{ route('admin.category_add') }}">
            <button type="button" class="btn btn-outline-success mr-5 mb-5">
                <i class="fa fa-plus mr-5"></i>Add User
            </button>
            </a>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

            <table id="example" class="display" style="width:100%">
                <thead>
                <tr>
                    <th> Id </th>
                    <th> Image </th>
                    <th> Name </th>
                    <th> Unique ID </th>
                    <th> Category </th>
                    <th> Quantity </th>
                    <th> price </th>
                    <th> Discount price </th>
{{--                    <th> Description </th>--}}
                    <th> status </th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>

                @foreach($product as $key=>$products)
                <tr class="odd gradeX">
                    <td class="left">{{ $key+1}}</td>
                    <td class="left"><img src="{{ asset($products->image) }}" style="height:40px; width:80px;" ></td>
                    <td> {{ $products->name }} </td>
                    <td> {{ $products->unique_id }} </td>
                    <td> {{ $products->category->title }} </td>
                    <td> {{ $products->quantity }} </td>
                    <td> {{ $products->price }} </td>
                    <td> {{ $products->d_price }} </td>
{{--                    <td> {!! $products->description !!}</td>--}}
                    @if($products->status == 1)
                        <td>Activate</td>
                    @else
                        <td>Deactivate</td>
                    @endif
                    <td>
                        <a href="{{ url('/admin/product/edit/'.$products->unique_id) }}"
                           class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ url('/admin/product/delete/'.$products->unique_id) }}" onclick="return confirm('Are you sure to delete')"
                           class="btn btn-primary btn-xs">
                            <i class="fa fa-trash-o "></i>
                        </a>
                    </td>
                </tr>

                @endforeach


                </tbody>
                <tfoot>
                <tr>
                    <th> Id </th>
                    <th> Image </th>
                    <th> Name </th>
                    <th> Unique ID </th>
                    <th> Category </th>
                    <th> Quantity </th>
                    <th> price </th>
                    <th> Discount price </th>
{{--                    <th> Description </th>--}}
                    <th> status </th>
                    <th> Action </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full Pagination -->
@endsection
