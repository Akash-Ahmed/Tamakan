@extends('backend.layout.master')

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

    <script>

    var loop_email_count =1;
    function add_email_more(){
    loop_email_count++;

    var html ='<div class="col-md-4 product_email_'+loop_email_count+'"><label for="email" class="control-label mb-1">What You Will Learn?</label><input id="email" type="text" name="what_learn[]" class="form-control" aria-required="true" aria-invalid="false"> @error('what_learn')<div class="alert alert-danger">{{ $message }}</div>@enderror</div>';

    html+='<div class="col-md-2 product_email_'+loop_email_count+'"><label for="discount" class="control-label mb-1">&nbsp;</label><br><button type="button" class="btn btn-danger btn-lg" onclick=remove_emails_more("'+loop_email_count+'")><i class="fa fa-minus"></i> &nbsp;</button></div>';

    jQuery('#Product_email_box').append(html);
    }
    function remove_emails_more(loop_email_count){
    jQuery('.product_email_'+loop_email_count).remove();
    }

    </script>

@endsection

@section('main_content')
    <!-- Inline Form -->
    <div class="col-md-12">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Courses</h3>
                <div class="block-options row">
                    <a href="{{ route('admin.course.live') }}">
                        <div class="col-sm-6 col-xl-4">
                            <i class="si si-camcorder fa-2x"></i>
                        </div>
                    </a>
                    <a href="{{ route('admin.course.recorded') }}">
                        <div class="col-sm-6 col-xl-4">
                            <i class="si si-control-play fa-2x"></i>
                        </div>
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <form method="post" action="{{ route('admin.course.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="form-group row col-6">
                            <label class="col-12" for="example-text-input">Course Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="example-text-input" name="title" placeholder="Course Title" required>
                                @error('title')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
{{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-select2-category">Category</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2-category" name="category_id" style="width: 100%;" data-placeholder="Choose one.." required>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    @foreach($category as $key=>$categorys)
                                    <option value={{ $categorys->id }}>{{ $categorys->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row col-6">
                            <label class="col-12" for="example-text-input">Thumbnail Image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="image" required>
                                @error('image')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-text-input">Short Description</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="example-text-input" name="short_description" placeholder="Short Description">
                                @error('short_description')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-text-input">Price</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="example-text-input" name="price" placeholder="Price" required>
                                @error('price')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="row"  id="Product_email_box">
                                <div class="col-md-4 product_attr_1">
                                    <label for="email" class="control-label mb-1">What You Will Learn?</label>
                                    <input id="email" type="text" name="what_learn[]" class="form-control" aria-required="true" aria-invalid="false">
                                    @error('what_learn')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="email" class="control-label mb-1">
                                        &nbsp;</label><br>
                                    <button type="button" class="btn btn-success btn-lg" onclick="add_email_more()">
                                        <i class="fa fa-plus"></i>
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-text-input">language</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2" name="language" style="width: 100%;" data-placeholder="Choose one.." required>
                                    <option value=1>Bangla</option>
                                    <option value=2>English</option>
                                    <option value=3>Hindi</option>
                                </select>
                                @error('language')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-text-input">Certificate</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2" name="certificate" style="width: 100%;" data-placeholder="Choose one.." required>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value=1>Yes</option>
                                    <option value=0>No</option>
                                </select>
                                @error('certificate')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-text-input">Duration</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="example-text-input" name="duration" placeholder="Duration" required>
                                @error('duration')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                                {{--                                <div class="form-text text-muted">Further info about this input</div>--}}
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-select2-tag">Tag</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2-tag" name="tag[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="1">HTML</option>
                                    <option value="2">CSS</option>
                                    <option value="3">JavaScript</option>
                                    <option value="4">PHP</option>
                                    <option value="5">MySQL</option>
                                    <option value="6">Ruby</option>
                                    <option value="7">Angular</option>
                                    <option value="8">React</option>
                                    <option value="9">Vue.js</option>
                                </select>
                                @error('tag')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-select2-multi">Related Course</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2-multi" name="related_course_id[]" style="width: 100%;" data-placeholder="Choose many.." multiple>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="1">HTML</option>
                                    <option value="2">CSS</option>
                                    <option value="3">JavaScript</option>
                                    <option value="4">PHP</option>
                                    <option value="5">MySQL</option>
                                    <option value="6">Ruby</option>
                                    <option value="7">Angular</option>
                                    <option value="8">React</option>
                                    <option value="9">Vue.js</option>
                                </select>
                                @error('related_course_id')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-select2-Instructor">Instructor</label>
                            <div class="col-lg-9">
                                <select class="js-select2 form-control" id="example-select2-Instructor" name="instructor_id" style="width: 100%;" data-placeholder="Choose..." required>
                                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                    <option value="1">HTML</option>
                                    <option value="2">CSS</option>
                                    <option value="3">JavaScript</option>
                                    <option value="4">PHP</option>
                                    <option value="5">MySQL</option>
                                </select>
                                @error('instructor_id')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-select">Course Type</label>
                            <div class="col-md-9">
                                <select class="form-control" id="example-select" name="course_type" required>
                                    <option value="1">Live Course</option>
                                    <option value="2">Recorded Course</option>
                                </select>
                                @error('course_type')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-6">
                            <label class="col-12" for="example-select">Skill Level</label>
                            <div class="col-md-9">
                                <select class="form-control" id="example-select" name="skill_level" required>
                                    <option value="1">Beginner</option>
                                    <option value="2">Advanced</option>
                                    <option value="3">Expert</option>
                                </select>
                                @error('skill_level')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-12" for="example-select">Status</label>
                            <div class="col-md-9">
                                <select class="form-control" id="example-select" name="status" required>
                                    <option value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                                @error('status')
                                <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row col-12">
                            <label class="col-12" for="example-text-input">Description</label>
                            <div class="block-content block-content-full">
                                <!-- Summernote Container -->
                                <textarea name="long_description" id="summernote" required></textarea>
                            </div>
                            @error('long_description')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!-- END Inline Form -->
@endsection
