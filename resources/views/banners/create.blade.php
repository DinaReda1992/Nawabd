@extends('layouts.admin-master')

@section('content')
    <title>إضافة مقال</title>
    <div class="container">
        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
                <div class='row'>
                    <label for="logo">البانر</label>
                    <input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                        data-height="70" />
                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                </div><br>
            </div>
            <button type="submit" class="btn btn-primary">حفظ البيانات</button>
        </form>
    </div>
@endsection
