@extends('backend/layout/master')
@section('header_name')
    Quản lý danh mục
@endsection

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('backend/css/category.css') }}"> --}}
    <!-- Modal add -->
    <div class="modal fade" id="add_modal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm hình ảnh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="post" action="{{ route('AddPicture') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="image">Hình ảnh:</label>
                                <input required type="file" class="form-control-file" id="image" name="image"
                                    accept=".jpg, .png, .jpeg|image/*">
                                <img class="card-img-top" style="height: 150px; width: 300px; object-fit: cover;"
                                    src="" alt="" id="preview-image">
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái:</label>
                                <input name="status" required type="number" class="form-control" id="status"
                                    value="">
                            </div>
                            <p>Lưu ý : 0 là slider , 1 là hình ảnh ở giữa</p>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal add -->

    <!-- Modal delete-->
    <div class="modal fade" id="delete_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa hình ảnh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Bạn có chắc chắn muốn xóa hình ảnh này không?</h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_picture" value="">
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
                            <th><strong>Hình ảnh</strong></th>

                            <th><strong>Trạng thái</strong></th>
                            <th><strong>Hành động</strong></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <!-- Dữ liệu trong bảng -->
                        @foreach ($pictures as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <div style=" height: 280px; overflow: hidden;">
                                        <img src="{{ asset('/images/' . $item->image) }}" alt="#"
                                            class="rounded mx-auto d-block img-fluid"
                                            style="width: 70%; height: 100%; object-fit: cover;">
                                    </div>
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    {{-- <button class="btn btn-link p-0 btnEdit" data-id="{{ $item->id }}"><span
                                            class="text-500 fas fa-edit"></span>
                                    </button> --}}
                                    <button class="btn btn-link p-0 ms-2 btnDelete" data-id="{{ $item->id }}"><span
                                            class="text-500 fas fa-trash-alt"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="md-12">
                    {{ $intros->links('pagination.custom') }}
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on("click", ".btnDelete", function() {
                let id = $(this).data("id");
                $("#id_picture").val(id);
                $("#delete_modal").modal("show");
            });

            $(document).on("click", ".btn_delete_confirm", function() {
                let id = $("#id_picture").val();

                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '{{ route('DeletePicture') }}',
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
        $(document).ready(function() {
            $(document).on("click", ".btnDelete", function() {
                let id = $(this).data("id");
                $("#id_category").val(id);
                $("#delete_modal").modal("show");
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
    <script src="{{ asset('backend/js/category.js') }}"></script>
@endsection
