@extends('layouts.site')
<!-- Mã HTML cho view show -->

@section('test')
<div class="container">
    <div style="display: flex;">
        <div style="flex: 2;">
            <h1>{{ $video->title }}</h1>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="980" height="700" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->youtube_url }}" allowfullscreen></iframe>
            </div>
            <p>{{ $video->description }}</p>
            <p>{{ $video->content }}</p>
        </div>
        <div style="flex: 1;">
            <p>Danh sách Video</p>
            <div class="video-grid">
                @foreach($listVideos as $listVideo)
                <div class="video-card">
                    <a href="{{ $listVideo->isApprovedByAdmin() ? route('videos.show', $listVideo->video_id) : '#' }}">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYv-9dfaAmOyT9GObaOcTTZOe8-LRX7NjvGA&usqp=CAU">
                        <div class="video-details">
                            <h3>{{ $listVideo->title }}</h3>
                            @if($listVideo->is_pending)
                                <span class="btn btn-primary">Vui lòng chờ phê duyệt</span>
                            @elseif(auth()->check() && !$listVideo->isApprovedByAdmin())
                                <form action="{{ route('videos.register.post', $listVideo->video_id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Đăng ký xem video</button>
                                </form>
                            @endif
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


<!-- Mã CSS -->
<style>
 .container {
        display: flex;
        justify-content: space-between;
    }

    .video-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 0.5rem;
    }

    .video-card a {
        text-decoration: none;
    }

    .video-card {
        height: 380px;
        background-color: #fff;
        border-radius: 30px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        overflow: hidden;
        position: relative;
        margin-left: 40px;
        margin-bottom: 20px;
      
    }

    .video-card img {
        width: 100%;
        height: auto;
    }

    .video-details {
        padding: 1rem;
    }
    /* .video-details button {
        background-color: red;
    } */
    .video-details h3 {
      
        color: black;
        font-size:18px;
    }
</style>
@endsection
