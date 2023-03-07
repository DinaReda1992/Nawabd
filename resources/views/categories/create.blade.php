@extends('layouts.admin-master')

@section('content')
    <title>إضافة تصنيف</title>
    <div class="container">
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class='row'>
                <div class="col-12 text-end">
                    <label for="category_name" class="control-label">عنوان التصنيف</label>
                    <input type="text" class="form-control" id="category_name" name="category_name"
                        value="{{ old('category_name') }}" required autocomplete="category_name" autofocus
                        title="يرجي ادخال عنوان التصنيف" required>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-secondary">حفظ البيانات</button>
                </div>
            </div>
        </form>
    </div>
@endsection
