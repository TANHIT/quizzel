<!DOCTYPE html>
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
            background-color: #fff;
            padding: 15px 0;
            margin: 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 1rem;
        }

        .video-card {
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            overflow: hidden;
        }

        .video-card img {
            width: 100%;
            height: auto;
        }

        .video-details {
            padding: 1rem;
        }

        .video-details h3 {
            margin-top: 0;
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

    </style>
</head>
<body>
    <h2>Danh sách Video</h2>
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
                        <span class="btn btn-primary">Chờ</span>
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
</html>
