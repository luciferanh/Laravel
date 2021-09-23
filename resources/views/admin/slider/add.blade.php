@extends('admin.main')

{{--@section('head')
    <script src="\ckeditor\ckeditor.js"></script>
@endsection--}}

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="menu">Tiêu đề</label>
                        <input type="text" name="name"  value="{{old('name')}}" class="form-control" >
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="menu">Đường dẫn</label>
                        <input type="text" name="url"  value="{{old('url')}}" class="form-control" >
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label for="menu">Ảnh Slider</label>
                <input type="file" class="form-control" id="upload">
                <div id ="image_show">

                </div>
                <input type="hidden" name="thumb" id="file_img" value="">
            </div>

            <div class="form-group">
                <label>Sắp xếp</label>
                <input type="number" name="sort_by" value="1"  class="form-control">
            </div>

            <!-- radio -->
            <div class="form-group">
                <label > Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Slider</button>
        </div>
        @csrf
    </form>
@endsection

{{--
@section('footer')
    <script> CKEDITOR.replace('content')</script>
@endsection
--}}
