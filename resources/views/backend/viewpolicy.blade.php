@extends('backend/layout/master')
@section('header_name')
    Quản lý danh mục
@endsection

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('backend/css/policy.css') }}"> --}}
    <!-- Modal add -->
    <div class="modal fade" id="add_modal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm chính sách</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="post" action="{{ route('AddPolicy') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Tiêu đề:</label>
                                <input name="title" required type="text" class="form-control" id="title"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="desc">Decsription:</label>
                                <textarea name="desc" class="form-control" id="desc_add"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date"><b>Date:</b></label>
                                <input name="date" type="datetime-local" id="date" class="form-control" />
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Sửa chính sách</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <form method="post" action="{{ route('UpdatePolicy') }}" enctype="multipart/form-data">
                            @csrf
                            <input name="id" id="id" type="hidden" class="form-control" value="">

                            <div class="form-group">
                                <label for="title">Tiêu đề:</label>
                                <input name="title" required type="text" class="form-control" id="title"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="desc">Decsription:</label>
                                <textarea name="desc" class="form-control" id="desc_edit"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date"><b>Date:</b></label>
                                <input name="date" type="datetime-local" id="date" class="form-control" />
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
                    <h5 class="modal-title" id="exampleModalLabel">Xóa tin tức</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Bạn có chắc chắn muốn xóa tin tức?</h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_policy" value="">
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
                            <th><strong>Tiêu đề</strong></th>
                            <th><strong>Nội dung</strong></th>
                            <th><strong>Ngày khởi tạo</strong></th>
                            <th><strong>Hành động</strong></th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <!-- Dữ liệu trong bảng -->
                        @foreach ($policy as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>


                                <td>{!! $item->desc !!}</td>
                                <td>{{ $item->date }}</td>
                                <td>
                                    <button class="btn btn-link p-0 btnEdit" data-id="{{ $item->id }}"><span
                                            class="text-500 fas fa-edit"></span>
                                    </button>
                                    <button class="btn btn-link p-0 ms-2 btnDelete" data-id="{{ $item->id }}"><span
                                            class="text-500 fas fa-trash-alt"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="md-12">
                    {{ $policys->links('pagination.custom') }}
                </div> --}}
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid">
        <table class="table align-middle table-bordered table-hover">
            <caption>Danh sách danh mục sản phẩm</caption>
            <thead class="table-secondary">
                <tr>
                    <td><strong>ID</strong></th>
                    <th><strong>Tên danh mục</strong></th>
                    <th><strong>Hình ảnh</strong></th>
                    <th><strong>Hành động</strong></th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu trong bảng -->
                @foreach ($policy as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td><img class="card-img-top rounded" style="height: 150px; object-fit: cover;"
                                src="{{ asset('/images/' . $item->image) }}" alt=""></td>
                        <td>

                            <button id="" class="btn btnEdit" data-id="{{ $item->id }}"><i
                                    class="fa-solid fa-pen-to-square fa-lg" style="color: #000000;"></i></button>
                            <button type="button" class="btn btnDelete" data-id="{{ $item->id }}"><i
                                    class="fa-solid fa-xmark fa-lg" style="color: #000000;"></i></button>
                            <button type="button" class="btn btnAdd"><i class="fa-solid fa-plus fa-lg"
                                    style="color: #000000;"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
    <!-- Table list-->

    <script>
        $(document).ready(function() {
            $(document).on("click", ".btnDelete", function() {
                let id = $(this).data("id");
                $("#id_policy").val(id);
                $("#delete_modal").modal("show");
            });
            $(document).on("click", ".btn_delete_confirm", function() {
                let id = $("#id_policy").val();

                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '{{ route('DeletePolicy') }}',
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
                    let policy_id = $(this).data('id');
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '{{ route('GetPolicyID') }}',
                        data: {
                            policy_id: policy_id,
                        },
                        success: function(response) {
                            $('#edit_modal #id').val(response.id);
                            $('#edit_modal #title').val(response.title);
                            $('#edit_modal #desc_edit').val(response.desc);
                            $('#edit_modal #date').val(response.date);
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
    <script src="{{ asset('backend/js/policy.js') }}"></script>
@endsection
