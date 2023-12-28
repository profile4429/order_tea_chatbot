@extends('backend/layout/master')
@section('header_name')
    Quản lý sản phẩm
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
    <!-- Modal add -->
    <div class="modal fade" id="add_modal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="post" action="{{ route('AddProduct') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="form-group">
                                <label for="category_id">Loại sản phẩm:</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label for="item_name">Tên sản phẩm:</label>
                                <input name="item_name" required type="text" class="form-control" id="item_name"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá:</label>
                                <input name="price" required type="text" class="form-control" id="price"
                                    value="">
                            </div>

                            <div class="form-group">
                                <label for="image">Hình ảnh:</label>
                                <input required type="file" class="form-control-file" id="image" name="image"
                                    accept=".jpg, .png, .jpeg|image/*">
                                <img class="card-img-top" style="height: 150px; width: 300px; object-fit: cover;"
                                    src="" alt="" id="preview-image">
                            </div>
                            <div class="form-group">
                                <label for="description">Decsription:</label>
                                <textarea name="description" class="form-control" id="desc_add"></textarea>

                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal add -->

    <!-- Modal edit -->
    <div class="modal fade" id="edit_modal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="post" action="{{ route('UpdateProduct') }}" enctype="multipart/form-data">
                            @csrf
                            <input name="id" id="id" type="hidden" class="form-control" value="">
                            <div class="form-group">
                                <label for="category_id">Loại sản phẩm:</label>
                                <select class="form-control" name="category_id" id="category_id" required>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Tên sản phẩm:</label>
                                <input name="title" required type="text" class="form-control" id="title"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá gốc:</label>
                                <input name="price" required type="text" class="form-control" id="price"
                                    value="">
                            </div>

                            <div class="form-group">
                                <label for="image">Hình ảnh:</label>
                                <input type="file" class="form-control-file" id="image" name="image"
                                    accept=".jpg, .png, .jpeg|image/*">
                                <img class="card-img-top" style="height: 150px; width: 300px; object-fit: cover;"
                                    src="" alt="" id="preview-image">
                            </div>
                            <div class="form-group">
                                <label for="desc">Decsription:</label>
                                <textarea name="desc" class="form-control" id="desc_edit"></textarea>
                            </div>
                            <div id="editor">
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal edit -->


    <!-- Modal delete-->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Bạn có chắc chắn muốn xóa sản phẩm này không?</h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_product" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn_delete_confirm">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!--End modal delete-->
    

    <!-- Table list-->
    <div class="card">
        <div class="container-fluid">

            <div class="row justify-content-between g-0 mt-2">
                <div class="col-auto col-sm-5 mb-3">
                    <div id="bulk-select-replace-element" class="d-flex">
                        <button class="btn btn-falcon-success btn-sm btnAdd" type="button">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="ms-1">New</span>
                        </button>
                    </div>
                </div>
                <div class="col-auto col-sm-5 mb-3">
                    <form class="float-sm-end">
                        <div class="input-group">
                            <input class="form-control form-control-sm shadow-none search" type="search"
                                placeholder="Search..." aria-label="search" />
                            <div class="input-group-text bg-transparent">
                                <span class="fa fa-search fs--1 text-600"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive scrollbar">
                <table class="table table-bordered table-striped align-middle fs--1 mb-0">
                    <thead class="bg-200 text-900">
                        <tr>
                            <td><strong>ID</strong></th>
                            <th><strong>Tên sản phẩm</strong></th>
                            <th><strong>Price</strong></th>
                            <th><strong>Image</strong></th>
                            <th><strong>Description</strong></th>
                            <th><strong>Hành động</strong></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($menu as $item_menu)
                            <tr>
                                <td>{{ $item_menu->id }}</td>
                                <td>{{ $item_menu->item_name }}</td>
                                <td>{{ $item_menu->price }}</td>
                                <td>
                                    <div style=" height: 220px; overflow: hidden;">
                                        <img src="{{ asset('/images/' . $item_menu['image']) }}" alt="#"
                                            class="rounded mx-auto d-block img-fluid"
                                            style="width: 70%; height: 100%; object-fit: cover;">
                                    </div>
                                </td>
                                <td>{!! $item_menu->description !!}</td>
                                <td>
                                    <button class="btn btn-link p-0 btnEdit" data-id="{{ $item_menu->id }}"><span
                                            class="text-500 fas fa-edit"></span>
                                    </button>
                                    <button class="btn btn-link p-0 ms-2 btnDelete" data-id="{{ $item_menu->id }}"><span
                                            class="text-500 fas fa-trash-alt"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
      
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on("click", ".btnDelete", function() {
                let id = $(this).data("id");
                $("#id_product").val(id);
                $("#delete_modal").modal("show");
            });

            $(document).on("click", ".btn_delete_confirm", function() {
                let id = $("#id_product").val();

                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '{{ route('DeleteProduct') }}',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(data) {
                        if (data.error == 0) {
                            window.location.reload();
                        } else {
                            alert("Xóa thất bại");
                        }
                    },
                });
            });
        });
    </script>
    <script>
        $("#image").change(function() {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#preview-image").attr("src", e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });

        $(document).ready(function() {
            $(document).on("click", ".btnAdd", function() {
                $("#add_modal").modal("show");
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            const options = {
                placeholder: 'Nhap noi dung',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            };
            $('#desc_add, #desc_edit').summernote(options);

            document.querySelectorAll(".btnEdit").forEach((element) => {
                element.addEventListener("click", function() {
                    let menu_id = $(this).data('id');
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '{{ route('GetProductID') }}',
                        data: {
                            menu_id: menu_id,
                        },
                        success: function(response) {
                            $('#edit_modal #id').val(response.id);
                            $('#edit_modal #category_id').val(response.category_id);
                            $('#edit_modal #title').val(response.title);
                            $('#edit_modal #price').val(response.price);
                            if (response.image) {
                                $('#edit_modal #preview-image').attr('src', '/images/' +
                                    response.image);
                            } else {
                                $('#edit_modal #preview-image').attr('src', '');
                            }
                            $('#edit_modal #desc_edit').val(response.desc);
                            $('#desc_edit').summernote('destroy');
                            $('#desc_edit').summernote(options);
                            $('#edit_modal').modal('show');
                        },
                        error: function() {
                            alert('lỗi');
                        }
                    });
                });
            });
        });
    </script>




    <script src="{{ asset('backend/js/product.js') }}"></script>
@endsection
