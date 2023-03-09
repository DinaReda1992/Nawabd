@extends('layouts.admin-master')
@section('content')
    <title>التصنيفات</title>
    <div class="container">
        <div class="row align-items-start">
            <div class="col p-lg-4">
                <a href={{ route('categories.create') }} class="btn btn-secondary mt-15 p-lg-3"><i class="fas fa-plus"></i>
                    إضافة تصنيف </a>
            </div>
            <div class="col p-lg-3">
                <form action="{{ route('categories.index') }}" method="GET">
                    <label for="search" class="sr-only">
                        Search
                    </label>
                    <input type="text" name="s"
                        class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-lg focus:border-blue-200 focus:ring-blue-500 dark:bg-gray-400 dark:border-gray-600 dark:text-gray-200"
                        placeholder="بحث..." style="margin-top: 18px" />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <button type="submit" style="margin:-39px 155px 0px 0px">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-4">
                <div class='errors'>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session()->has('edit'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('edit') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('Add'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('Add') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('delete') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session()->has('Error'))
                        <div class='alert alert-danger alert-dismissable fade show' role="alert">
                            <strong>{{ session()->get('Error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <div class="table-responsive">
                        <table id="example" class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>العنوان</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td><a href={{ route('categories.showCategory', $category->id) }}
                                                title="إظهار المحتوى">{{ $category->category_name }}</a>
                                        </td>
                                        <td>
                                            <a href={{ route('categories.edit', $category->id) }}
                                                class="btn btn-sm btn-primary" title="تعديل">
                                                <i class="fas fa-edit"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger open-delete-modal"
                                                data-effect="effect-scale" data-id="{{ $category->id }}"
                                                data-category_name="{{ $category->category_name }}"
                                                data-url={{ route('categories.destroy', $category->id) }}
                                                data-toggle="modal" data-target="#deleteCategory" title="حذف">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a href={{ route('categories.showCategory', $category->id) }}
                                                class="btn btn-sm btn-info" title="إظهار المحتوى">
                                                <i class="far fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class='page-pagination-one pt-15'>
                            <div class="d-flex align-items-center">
                                {{ $categories->appends($_GET)->links() }}
                            </div>
                        </div>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="deleteCategory" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <form id="deleteForm" class="modal-dialog" action="" method="post">
                                @method('DELETE')
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="h4 modal-title text-center text-primary" id="exampleModalLabel">حذف
                                            التصنيف
                                        </h5>
                                        <div class="alert alert-danger fs-5 my-3 text-center">
                                            سوف يتم حذف العنصر <span class="font-bold" id="catName"></span>
                                        </div>
                                        <input type="hidden" name="id" id="catId" value="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">إلغاء</button>
                                        <button type="submit" class="btn btn-danger">حذف</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="footer" style="margin: 20px auto; display: flex">
                    <div class="col-12 text-end">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary">
                                {{ __('تسجيل خروج') }}
                            </button>
                        </form>
                    </div>
                    <a href="{{ url('/blogs') }}" class="btn btn-secondary">تراجع</a>
                </div>
            </div>
        </div>
    </div>
@endsection
