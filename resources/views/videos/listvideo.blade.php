@extends('layouts.site')

<html>

<head>
    
    <title>Giao diện video</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h2 {
            background-color:#1c1d26; /* Đổi nền thành đen */
            color: #fff; /* Đổi màu chữ thành trắng */
            padding: 15px 0;
            margin: 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 0.5rem;
            
        }
        .video-card a {
            text-decoration: none;
            color: b;
             /* Loại bỏ dấu gạch dưới của thẻ a */
        }
        .video-card {
            height: 390px;
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            overflow: hidden;
            position: relative
        }

        .video-card img {
            width: 100%;
            height: auto;
        }

        /* .video-details {
            padding: 1rem;
        } */

        .video-details h3 {
            margin-top: 0;
            color: #1c1d26;
        }
        
        .btn {

            display: block;
            width: 60%; /* Tăng kích thước của nút "Đăng ký xem video" */
            margin: 0 auto; /* Căn giữa nút theo chiều ngang */
            position: absolute; /* Để căn chỉnh nút theo chiều dọc */
            bottom: 20px; /* Đặt khoảng cách từ dưới lên là 20px */
            left: 50%; /* Đặt giữa theo chiều ngang */
            transform: translateX(-50%); /* Đưa nút về giữa hoàn toàn */
            font-size: medium; /* Tăng kích thước chữ của nút */
        }
        .pagination-container {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
        }

        .pagination-container ul {
            list-style: none;
            display: flex;
            padding-left: 0;
        }

        .pagination-container li {
            margin: 0 0.5rem;
        }

        .pagination-container li a {
            padding: 0.5rem 1rem;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            text-decoration: none;
            color: #333;
        }

        .pagination-container li.active a,
        .pagination-container li a:hover {
            background-color: #333;
            color: #fff;
        }
        .btn:active {
        background-color: #333;
        color: #fff;
        }
        .video-card img:hover {
            transform: scale(1.1);
            transition: transform .2s;
        }
        span{
            color: black;
        }
        .vdeo{
            color: black;
        }
      


    </style>
</head>


@section('test')
<body>
    <h2>Danh sách Video khóa học </h2>
    <div class="video-grid">
        @foreach($videos as $video)
        <div class="video-card">
            <a href="{{ route('videos.listvideo') }}">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYv-9dfaAmOyT9GObaOcTTZOe8-LRX7NjvGA&usqp=CAU">
                <div class="video-details">
                    <h3>{{ $video->title }}</h3>
                </div>
            </a>
            
                @if (auth()->check())
                    @if ($video->isApprovedByAdmin())
                        
                        <a href="{{ route('videos.show', $video->video_id) }}" class="btn btn-primary">Xem video</a>
                    @elseif (!$video->isApprovedByAdmin())  
                    @if ($video->isPendingForUser(auth()->user()))
                            <span class="btn btn-primary">Vui Lòng chờ phê duyệt </span>
                        @else
                            <form action="{{ route('videos.register.post', $video->video_id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Đăng ký xem video</button>
                            </form>
                        @endif
                    @endif
                @endif
            
            
        </div>
        
        @endforeach
    </div>

    <div class="pagination-container">
        {{ $videos->links() }}
    </div>
</body>
<script>
    $(".btn").click(function(e) {
    e.preventDefault();

    // Lấy URL từ thuộc tính action của form
    var url = $(this).parent("form").attr("action");

    $.ajax({
        type: "POST",
        url: url,
        data: {_token: "{{ csrf_token() }}"},
        success: function(data) {
            // Xử lý khi đăng ký thành công
            alert("Đăng ký xem video thành công!");
        },
        error: function(data) {
            // Xử lý khi có lỗi xảy ra
            alert("Có lỗi xảy ra. Vui lòng thử lại.");
        }
    });
});

</script>
</html>
@endsection