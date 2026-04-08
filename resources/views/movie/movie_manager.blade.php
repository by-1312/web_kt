<x-movie-layout title="Quản lý phim">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <style>
        .page-title { 
            text-align: center; font-size: 32px; font-weight: bold; 
            margin: 25px 0; color: #333; text-transform: uppercase; 
        }
        #id-table thead th { 
            background-color: #fff !important; color: #000 !important; 
            border-bottom: 2px solid #dee2e6 !important; text-align: center;
            vertical-align: middle;
        }
        .btn-view { background-color: #007bff; color: white !important; border: none; padding: 5px 12px; border-radius: 4px; text-decoration: none; font-size: 13px; margin-right: 5px;}
        .btn-delete { background-color: #dc3545; color: white !important; border: none; padding: 5px 12px; border-radius: 4px; font-size: 13px; }
        .btn-group-custom { display: flex; justify-content: center; align-items: center; }
        .container-main { padding: 20px; }
        
        /* Tinh chỉnh để khớp với ảnh bạn gửi */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #007bff !important;
            color: white !important;
            border: 1px solid #007bff !important;
        }
    </style>

    <div class="container-main">
        <h2 class="page-title">Danh Sách Phim</h2>
        
        <div class="card shadow-sm border-0">
            <div class="card-body bg-white">
                <div class="mb-3">
                    <button class="btn btn-success btn-sm px-3">Thêm</button>
                </div>

                <table id="id-table" class="table table-bordered table-hover w-100">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Ảnh đại diện</th>
                            <th>Tiêu đề</th>
                            <th>Giới thiệu</th>
                            <th style="width: 120px;">Ngày phát hành</th>
                            <th style="width: 100px;">Điểm đánh giá</th>
                            <th style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $item)
                        <tr>
                            <td class="text-center">
                                <img src="{{ $item->image_link ?? asset('images/'.$item->image) }}" width="75" class="shadow-sm">
                            </td>
                            <td class="align-middle font-weight-bold">{{ $item->movie_name_vn }}</td>
                            <td class="small text-muted align-middle">
                                {{ \Illuminate\Support\Str::limit($item->overview_vn, 100) }}
                            </td>
                            <td class="text-center align-middle">{{ $item->release_date }}</td>
                            <td class="text-center align-middle font-weight-bold">{{ $item->vote_average }}</td>
                            <td class="align-middle">
                                <div class="btn-group-custom">
                                    <a href="{{ url('/movies/'.$item->id) }}" class="btn-view">Xem</a>
                                    <form action="{{ url('/movies/'.$item->id) }}" method="POST" onsubmit="return confirm('Xóa?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-delete">Xóa</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Kiểm tra xem table có tồn tại không trước khi gọi
            if ( ! $.fn.DataTable.isDataTable( '#id-table' ) ) {
                $('#id-table').DataTable({
                    "responsive": true,
                    "pageLength": 5,
                    "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Tất cả"]],
                    "bStateSave": true,
                    "order": [], 
                    "language": {
                        "search": "Search:",
                        "lengthMenu": "_MENU_ entries per page",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "paginate": {
                            "first": "«",
                            "last": "»",
                            "next": "›",
                            "previous": "‹"
                        }
                    }
                });
            }
        });
    </script>
</x-movie-layout>