@extends('layouts.admin-master')
@section('content')
<title>تعديل المقال</title>
    <div class="card-header">
        <form action={{ route('blogs.update', $blog->id) }} method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('post')
            <div class="card-body">
                <div class='row'>
                    <label for="title" class="control-label">عنوان المدونة</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $blog->title) }}" required autocomplete="title" autofocus
                        title="يرجي ادخال عنوان المدونة" required>
                </div><br>
                <div class='row'>
                    <label for="content" class="control-label">محتوى المدونة</label>
                    <textarea type="text" class="form-control" id="content" name="content" title="يرجي ادخال محتوى المدونة"
                        value="{{ old('content', $blog->content) }}" required autocomplete="content" autofocus required>{{ $blog->content }} </textarea>
                </div><br>
                <div class='row'>
                    <label for="category" class="control-label">التصنيف</label>
                    <select name="category_id" class="custom-select my-1 mr-sm-2" required>
                        <!--placeholder-->
                        <option value="" selected disabled>حدد الفئة</option>
                        @foreach ($categories as $category)
                            <option value={{ $category->id }} @selected($category->id == $blog->category_id)> {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <div class='row'>
                    <label for="author" class="control-label">المؤلف</label>
                    <input type="text" id="author" name="author" class="form-control"
                        value="{{ old('author', $blog->author) }}" required autocomplete="author" autofocus>
                </div><br>
                <div class='row'>
                    <label for="logo">المرفقات</label>
                    <input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                        data-height="70" value="{{ old('logo', $blog->logo) }}" autocomplete="logo" autofocus />
                    <img src="{{ asset('images/' . $blog->logo) }}" width="150" height="150">{{ $blog->logo }}
                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                </div><br>
            </div>
            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
        </form>
    </div>
@endsection
