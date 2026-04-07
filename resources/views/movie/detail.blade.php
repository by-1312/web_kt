<x-movie-layout>
    <x-slot name="title">
        {{ $movie->movie_name_vn }}
    </x-slot>

    <div class="row">
        <div class="col-12">
            <h2 style="margin-bottom: 10px; color: #000;">
                {{ $movie->movie_name_vn }}
            </h2>
            </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="movie" style="margin: 0; cursor: default;">
                <img src="{{ asset('storage/' . $movie->image) }}" 
                     alt="{{ $movie->movie_name_vn }}" 
                     style="width: 100%; display: block; height: auto;">
            </div>
        </div>

        <div class="col-8">
            <div style="padding-left: 10px;">
                
                <div style="display: flex; margin-bottom: 5px;">
                    <div style="font-weight: bold; width: 150px;">Ngày phát hành:</div>
                    <div>{{ date('Y-m-d', strtotime($movie->release_date)) }}</div>
                </div>

                <div style="display: flex; margin-bottom: 5px;">
                    <div style="font-weight: bold; width: 150px;">Quốc gia:</div>
                    <div>{{ $movie->country_name ?? 'Đang cập nhật' }}</div>
                </div>

                <div style="display: flex; margin-bottom: 5px;">
                    <div style="font-weight: bold; width: 150px;">Thời gian:</div>
                    <div>{{ $movie->runtime ?? '0' }} phút</div>
                </div>

                <div style="display: flex; margin-bottom: 5px;">
                    <div style="font-weight: bold; width: 150px;">Doanh thu:</div>
                    <div>{{ isset($movie->revenue) ? number_format($movie->revenue, 0, ',', '.') : '0' }}</div>
                </div>

                <div style="margin-top: 15px;">
                    <p style="margin-bottom: 5px;"><strong>Mô tả:</strong></p>
                    <p style="text-align: justify; line-height: 1.5; color: #444; margin: 0;">
                        {{ $movie->overview ?? 'Nội dung đang được cập nhật...' }}
                    </p>
                </div>

                <div style="margin-top: 25px;">
                    <button class="btn" style="background-color: #28a745; color: white; border-radius: 5px; padding: 8px 25px; font-weight: bold; border: none; cursor: pointer;">
                        <i class="fa fa-play-circle"></i> Xem Trailer
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-movie-layout>