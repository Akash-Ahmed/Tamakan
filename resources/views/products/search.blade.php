@extends('layouts.master')

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
                placeholder: 'Iskool71.com',
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
                <h3 class="block-title">Search Category wise</h3>
            </div>
            <div class="block-content block-content-full">
                <form method="post" action="{{ route('admin.Products.search.category') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">

                        <div class="form-group row col-8">
                            <label class="col-12" for="example-text-input">Category</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2" name="name" style="width: 100%;" data-placeholder="Choose one.." required>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($category as $categorys)
                                        <option value={{ $categorys->name }} >{{ $categorys->name}}</option>
                                    @endforeach

                                </select>
                                @error('department')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-8">
                            <label class="col-12" for="example-text-input">Sub Category</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select3" name="subcategories" style="width: 100%;" data-placeholder="Choose one.." required>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($category as $categorys)
                                        <option value={{ $categorys->subcategories }} >{{ $categorys->subcategories}}</option>
                                    @endforeach

                                </select>
                                @error('department')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
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
