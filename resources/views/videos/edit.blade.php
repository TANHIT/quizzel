@extends('layouts.admin')

@section('main')
<div class="container">
    <h1>Sửa Video</h1>

    <form method="POST" action="{{ route('videos.update', $video->video_id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="youtube_url">Đường dẫn YouTube:</label>
            <input type="text" name="youtube_url" class="form-control" value="{{ $video->youtube_url }}">
        </div>
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" class="form-control" value="{{ $video->title }}">
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" class="form-control">{{ $video->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="content">Nội Dung:</label>
            <textarea name="content" class="form-control">{{ $video->content }}</textarea>
        </div>
        <input type="submit" value="Lưu" class="btn btn-primary">
    </form>
</div>
@endsection
