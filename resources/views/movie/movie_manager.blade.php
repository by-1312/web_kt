<x-movie-layout title="Quản lý phim">
    <div class="container-fluid mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0 text-center text-uppercase">Danh Sách Phim</h3>
            </div>
            <div class="card-body bg-light">    
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button class="btn btn-success">
                        <i class="fa fa-plus"></i> Thêm phim mới
                    </button>
                </div>

                <table id="id-table" class="table table-bordered table-striped bg-white w-100">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>Ảnh đại diện</th>
                            <th>Tiêu đề</th>
                            <th>Giới thiệu</th>
                            <th>Ngày phát hành</th>
                            <th>Điểm đánh giá</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $item)
                        <tr>
                            <td class="text-center">
                                {{-- Kiểm tra và hiển thị ảnh từ cột 'image' --}}
                                @if($item->image)
                                    <img src="{{ $item->image_link }}" width="60" class="rounded shadow-sm" alt="poster">
@elseif($item->image)
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                {{-- Hiển thị tên phim Việt hóa hoặc tên gốc --}}
                                <strong>{{ $item->movie_name_vn ?? $item->movie_name }}</strong>
                                <br>
                                <small class="text-secondary italic">{{ $item->original_name }}</small>
                            </td>
                            <td>
                                {{-- Hiển thị tóm tắt nội dung từ cột 'overview_vn' --}}
                                {{ \Illuminate\Support\Str::limit($item->overview_vn, 60) }}
                            </td>
                            <td class="text-center">
                                {{-- Cột 'release_date' --}}
                                {{ $item->release_date }}
                            </td>
                            <td class="text-center">
                                {{-- Cột 'vote_average' đại diện cho điểm đánh giá --}}
                                <span class="badge badge-info py-2 px-2">{{ number_format($item->vote_average, 1) }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    {{-- Nút Xem chi tiết --}}
                                    <a href="{{ url('/admin/movies/'.$item->id) }}" class="btn btn-primary btn-sm mx-1">
                                        <i class="fa fa-eye"></i> Xem
                                    </a>
                                    
                                    {{-- Nút Xóa (Sử dụng phương thức DELETE cho xóa mềm) --}}
                                    <form action="{{ url('/admin/movies/'.$item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bộ phim này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm mx-1">
                                            <i class="fa fa-trash"></i> Xóa
                                        </button>
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

    {{-- Script kích hoạt DataTable theo yêu cầu --}}
    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
                bStateSave: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
                }
            });
        });
    </script>
</x-movie-layout>