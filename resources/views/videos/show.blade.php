
<div class="container">
    
    <h1>{{ $video->title }}</h1>


    <div class="embed-responsive embed-responsive-16by9">
        <iframe width="700" height="500" class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->youtube_url }}" allowfullscreen></iframe>
    </div>
    <p>{{ $video->description }}</p>
    <p>{{ $video->content }}</p>
</div>

