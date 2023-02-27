@extends('layouts.admin-master')
@section('content')
    <title>المقالات</title>
    <section class="container">
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: space-between">
                <a href={{ route('categories.create') }} class="btn btn-primary my-3 px-5 rounded-pill text-white"><i
                        class="fas fa-plus" style="padding: 20px"></i> إضافة تصنيف </a>
                <form action="{{ route('categories.index') }}" method="GET">
                    <label for="search" class="sr-only">
                        Search
                    </label>
                    <input type="text" name="s"
                        class="block w-full p-3 pl-10 text-sm border-gray-200 rounded-lg focus:border-blue-200 focus:ring-blue-500 dark:bg-gray-400 dark:border-gray-600 dark:text-gray-200"
                        placeholder="بحث..." style="margin-top: 18px" />
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <button type="submit" style="margin:-39px 169px 0px 0px">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-12">
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
                    {{--  Accordion  --}}
                    {{--  @foreach ($categories as $category)
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <a href={{ route('categories.showCategory', $category->id) }} class="btn btn-sm btn-info"
                                    title="إظهار المحتوى">
                                    <i class="far fa-eye"></i></a>
                                <a class="modal-effect btn btn-sm btn-danger open-delete-modal" data-effect="effect-scale"
                                    data-id="{{ $category->id }}" data-category_name="{{ $category->category_name }}"
                                    data-url={{ route('categories.destroy', $category->id) }} data-toggle="modal"
                                    data-target="#deleteCategory" title="حذف">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                <a href={{ route('categories.edit', $category->id) }} class="btn btn-sm btn-primary"
                                    title="تعديل">
                                    <i class="fas fa-edit"></i></a>
                                <h2 class="accordion-header" id="headingOne">

                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#acoordion{{ $category->id }}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        {{ $category->category_name }}

                                    </button>

                                </h2>
                                <div id="acoordion{{ $category->id }}" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    @if ($category->blogs)
                                        <table>
                                            @foreach ($category->blogs as $blog)
                                                <tr>
                                                    <td>
                                                        <a href={{ route('categories.showCategory', $category->id) }}
                                                        <option value="{{ $blog->id }}"
                                                            {{ $blog->id === old('category_id') ? 'selected' : '' }}>
                                                            &nbsp;&nbsp;{{ $blog->title }}</option></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                    @endforeach  --}}
                    {{--  end accordion  --}}
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
            </div>
        @endsection
