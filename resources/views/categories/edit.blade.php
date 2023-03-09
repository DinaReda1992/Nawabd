@extends('layouts.admin-master')
@section('content')
    <title>تعديل المقال</title>
    <div class="container">
        <form action={{ route('categories.update', $category->id) }} method="post" enctype="multipart/form-data"
            autocomplete="off">
            @csrf
            @method('post')
            <div class='row'>
                <div class="col-12 text-end">
                    <label for="title" class="control-label">عنوان التصنيف</label>
                    <input type="text" class="form-control" id="category_name" name="category_name"
                        value="{{ old('category_name', $category->category_name) }}" required autocomplete="category_name"
                        autofocus title="يرجي ادخال عنوان التصنيف" required>
                </div>
                <div class="col-12 text-end mt-10">
                    <button type="submit" class="btn btn-secondary">حفظ البيانات</button>
                    <a href="{{ url('/categories') }}" class="btn btn-secondary">تراجع</a>
                </div>
            </div>
        </form>
    </div>
@endsection
