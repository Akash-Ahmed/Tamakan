@extends('backend.layout.master')


@section('main_content')
    <!-- Inline Form -->
    <div class="col-md-6">
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Category</h3>
                <div class="block-options">
                    <a href="{{ route('admin.category_all') }}">
                        <div class="col-sm-6 col-xl-4">
                            <button type="button" class="btn btn-outline-primary min-width-125" data-toggle="click-ripple">All Category</button>
                        </div>
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <form method="post" action="{{ route('admin.category_store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group row">
                            <label class="col-12" for="example-text-input">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="example-text-input" name="title" placeholder="Category Name..">
                                @error('title')
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
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
    <!-- END Inline Form -->
@endsection
