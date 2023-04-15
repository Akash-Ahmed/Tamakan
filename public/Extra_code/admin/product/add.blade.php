@extends('admin.layout.master')

@section('header_script')

    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/dropzone/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/flatpickr/flatpickr.min.css') }}">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_template/assets/js/plugins/simplemde/simplemde.min.css') }}">


@endsection

@section('footer_script')

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin_template/assets/js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/jquery-auto-complete/jquery.auto-complete.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('admin_template/assets/js/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin_template/assets/js/plugins/simplemde/simplemde.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('admin_template/assets/js/pages/be_forms_plugins.min.js') }}"></script>

    <!-- Page JS Helpers (Summernote + CKEditor + SimpleMDE plugins) -->
    <script>jQuery(function(){Codebase.helpers(['summernote', 'ckeditor', 'simplemde']);});</script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400,
            placeholder: 'Topandtricky.com',
        });
    });
</script>
    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Input + Range Sliders + Tags Inputs plugins) -->
    <script>
        jQuery(function(){Codebase.helpers(
            ['flatpickr',
                'datepicker',
                'colorpicker',
                'maxlength',
                'select2',
                'masked-inputs',
                'rangeslider',
                'tags-inputs']);
        });
    </script>



@endsection

@section('main_content')
    <!-- Inline Form -->
    <div class="col-md-12">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Product</h3>
                <div class="block-options">
                    <a href="{{ route('admin.product.all') }}">
                        <div class="col-sm-6 col-xl-4">
                            <button type="button" class="btn btn-outline-primary min-width-125" data-toggle="click-ripple">All Product</button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Product Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="example-text-input" name="name" placeholder="Product Name..">
                                @error('name')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
{{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="example-select2">Normal</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2" name="category_id" style="width: 100%;" data-placeholder="Choose one..">
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($category as $key=>$categorys)
                                    <option value={{ $categorys->id }}>{{ $categorys->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="image">
                                @error('image')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Quantity</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="example-text-input" name="quantity" placeholder="Quantity" required>
                                @error('quantity')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Price</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="example-text-input" name="price" placeholder="Price" required>
                                @error('price')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Discount Price</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="example-text-input" name="d_price" placeholder="Discount Price">
                                @error('d_price')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="example-select">Status</label>
                            <div class="col-md-9">
                                <select class="form-control" id="example-select" name="status">
                                    <option value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                                @error('status')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Description</label>
                            <div class="block-content block-content-full">
                                <!-- Summernote Container -->
                                <textarea name="description" id="summernote"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!-- END Inline Form -->
@endsection
