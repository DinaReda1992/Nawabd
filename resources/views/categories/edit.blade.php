@extends('layouts.admin-master')
@section('content')
<title>تعديل المقال</title>
    <div class="card-header">
        <form action={{ route('categories.update', $category->id) }} method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            @method('post')
            <div class="card-body">
                <div class='row'>
                    <label for="title" class="control-label">عنوان التصنيف</label>
                    <input type="text" class="form-control" id="category_name" name="category_name"
                        value="{{ old('category_name', $category->category_name) }}" required autocomplete="category_name" autofocus
                        title="يرجي ادخال عنوان التصنيف" required>
                </div>
                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
            </form>
    </div>
@endsection
