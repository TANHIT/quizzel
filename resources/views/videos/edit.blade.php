@extends('layouts.admin')

@section('main')
<form method="POST" action="{{ route('videos.update', $video->video_id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $video->title }}">
    <input type="text" name="youtube_url" value="{{ $video->youtube_url }}">
    <textarea name="description">{{ $video->description }}</textarea>
    <textarea name="content">{{ $video->content }}</textarea>
    <button type="submit">Lưu</button>
</form>
@endsection