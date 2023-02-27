@extends('layouts.admin-master')

@section('content')
    <title>إضافة مقال</title>
    <div class="card-header">
        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="card-body">
                <div class='row'>
                    <label for="title" class="control-label">عنوان المدونة</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        required autocomplete="title" autofocus title="يرجي ادخال عنوان المدونة" required>
                </div><br>
                <div class='row'>
                    <label for="content" class="control-label">محتوى المدونة</label>
                    <textarea type="text" class="ckeditor form-control" id="blogContentCreate" name="content"
                        title="يرجي ادخال محتوى المدونة" value="{{ old('content') }}" required autocomplete="content" autofocus required> 
                </textarea>
                </div><br>
                <div class='row'>
                    <label for="category" class="control-label">التصنيف</label>
                    <select name="category_id" class="form-control SlectBox" value="{{ old('category_id') }}" required
                        autocomplete="category_id" autofocus>
                        <!--placeholder-->
                        <option value="" selected disabled>حدد التصنيف</option>
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}> {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class='row'>
                    <label for="author" class="control-label">المؤلف</label>
                    <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}"
                        autocomplete="author" autofocus>
                </div><br>
                <div class='row'>
                    <label for="logo">المرفقات</label>
                    <input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                        data-height="70" />
                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                </div><br>
            </div>
            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#blogContentCreate'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
