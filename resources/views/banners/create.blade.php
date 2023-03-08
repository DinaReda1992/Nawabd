@extends('layouts.admin-master')

@section('content')
    <title>إضافة بانر</title>
    <div class="container">
        <div class="row">
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}
                <div class='col-12 text-end'>
                    <label for="logo">البانر</label>
                    <input type="file" name="logo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                        data-height="70" />
                    <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                </div><br>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-secondary">حفظ البيانات</button>
        </div>
        </form>
    </div>
@endsection
