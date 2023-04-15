@extends('layouts.master')

@section('header_script')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('admin_template/assets/custom_css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/custom_css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

@endsection


@section('footer_script')

    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                scrollX: true,
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>



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
            <h3 class="block-title">All <small>Product</small></h3>
            <a href="{{ route('admin.Products.add') }}">
                <button type="button" class="btn btn-outline-success mr-5 mb-5">
                    <i class="fa fa-plus mr-5"></i>Add Product
                </button>
            </a>
        </div>

        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->

            <table id="example" class="display table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> title </th>
                    <th class="d-none d-sm-table-cell"> description </th>
                    <th class="text-center"> price </th>
                    <th class="d-none d-sm-table-cell"> discount Percentage </th>
                    <th class="d-none d-sm-table-cell"> rating </th>
                    <th class="text-center"> stock </th>
                    <th class="d-none d-sm-table-cell"> brand </th>
                    <th class="d-none d-sm-table-cell"> category </th>
                    <th class="text-center"> thumbnail </th>
                    <th class="d-none d-sm-table-cell"> images </th>
                    <th class="text-center"> Action </th>
                </tr>
                </thead>
                <tbody>

                @foreach($product as $key=>$products)
                    <tr class="odd gradeX">
                        <td class="text-center">{{ $key+1}}</td>
                        <td class="font-w600"> {{ $products->title }} </td>
                        <td class="d-none d-sm-table-cell"> {{ $products->description }} </td>
                        <td class="text-center"> {{ $products->price }} </td>
                        <td class="font-w600"> {{ $products->discountPercentage }} </td>
                        <td class="d-none d-sm-table-cell"> {{ $products->rating }} </td>
                        <td class="text-center"> {{ $products->stock }} </td>
                        <td class="font-w600"> {{ $products->brand }} </td>
                        <td class="d-none d-sm-table-cell"> {{ $products->category }} </td>
                        <td class="left"><img src="{{ $products->thumbnail }}" style="height:40px; width:80px;" ></td>
                        @php
                            $p_image =json_decode($products->images);
                        @endphp
                        <td class="left">
                            @foreach( $p_image as $key)
                                <img src="{{ $key }}" style="height:40px; width:80px;" >
                            @endforeach</a>

                        </td>
                        <td class="text-center">
                            <a href="{{ url('/admin/Products/delete/'.$products->id) }}" onclick="return confirm('Are you sure to delete')"
                               class="btn btn-primary btn-xs">
                                <i class="fa fa-trash-o "></i>
                            </a>
                            <a href="{{ url('/admin/Products/edit/'.$products->id) }}"
                               class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil-square-o" ></i>
                            </a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> title </th>
                    <th class="d-none d-sm-table-cell"> description </th>
                    <th class="text-center"> price </th>
                    <th class="d-none d-sm-table-cell"> discountPercentage </th>
                    <th class="d-none d-sm-table-cell"> rating </th>
                    <th class="text-center"> stock </th>
                    <th class="d-none d-sm-table-cell"> brand </th>
                    <th class="d-none d-sm-table-cell"> category </th>
                    <th class="text-center"> thumbnail </th>
                    <th class="d-none d-sm-table-cell"> images </th>
                    <th class="text-center"> Action </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full Pagination -->
@endsection
