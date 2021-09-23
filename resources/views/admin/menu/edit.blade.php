@extends('admin.main')

@section('head')
    <script src="\ckeditor\ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">

        <div class="card-body">

            <div class="form-group">
                <label >Tên Danh Mục</label>
                <input type="text" name="name"  value="{{$menu->name}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>

            <div class="form-group">
                <label >Danh Mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{$menu->parent_id == 0? 'selected':''}}>Danh mục cha</option>
                    @foreach($menus as $menuParent)
                        <option value="{{$menuParent->id}}"
                            {{$menu->parent_id == $menuParent->id? 'selected':''}}>
                            {{$menuParent->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label >Mô tả</label>
                <textarea name="description" class="form-control">{{$menu->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả Chi Tiết</label>
                <textarea name="content" id="content" class="form-control">{{$menu->description}}</textarea>
            </div>


            <!-- radio -->
            <div class="form-group">
                <label > Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="1" id="active" name="active" {{$menu->active==1?'check=""':""}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" value="0" id="no_active" name="active"  {{$menu->active==0?'check=""':""}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script> CKEDITOR.replace('content')</script>
@endsection
