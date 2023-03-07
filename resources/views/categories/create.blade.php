@extends('layouts.admin-master')

@section('content')
<title>إضافة تصنيف</title>
<div class="container">
    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card-body">
            <div class='row'>
                <label for="category_name" class="control-label">عنوان التصنيف</label>
                <input type="text" class="form-control" id="category_name" name="category_name"
                value="{{ old('category_name') }}" required autocomplete="category_name" autofocus
                    title="يرجي ادخال عنوان التصنيف" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">حفظ البيانات</button>
    </form>
</div>
@endsection