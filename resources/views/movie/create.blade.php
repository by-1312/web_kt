<x-movie-layout>
    <x-slot name="title">
        Thêm phim mới
    </x-slot>

    <div class="row">
        <div class="col-12 text-center">
            <h5 style="color: #004085; font-weight: bold; margin-bottom: 20px;">THÊM PHIM</h5>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger" style="border-radius: 5px; margin-bottom: 20px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-12">
            <form action="{{ url('/movie/store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group mb-3">
                    <label>Tên tiếng Anh</label>
                    <input type="text" name="movie_name" class="form-control" value="{{ old('movie_name') }}">
                </div>

                <div class="form-group mb-3">
                    <label>Tên tiếng Việt</label>
                    <input type="text" name="movie_name_vn" class="form-control" value="{{ old('movie_name_vn') }}">
                </div>

                <div class="form-group mb-3">
                    <label>Ngày phát hành</label>
                    <input type="text" name="release_date" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('release_date') }}">
                </div>

                <div class="form-group mb-3">
                    <label>Mô tả</label>
                    <textarea name="overview" class="form-control" rows="4">{{ old('overview') }}</textarea>
                </div>

                <div class="form-group mb-4">
                    <label>Ảnh đại diện</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #007bff; border: none; padding: 8px 25px; border-radius: 4px;">
                        Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-movie-layout>