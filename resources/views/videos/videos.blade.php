
@extends('layouts.admin')

@section('main')
<div class="container">
    <h1>Thêm Video</h1>

    <form action="{{ route('videos.store') }}" method="POST">
        <div class="form-group">
            <label for="youtube_url">Đường dẫn YouTube:</label>
            <input type="text" name="youtube_url" class="form-control">
        </div>
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="content">Nội Dung :</label>
            <textarea name="content" class="form-control"></textarea>
        </div>
        <input type="submit" value="Thêm Video" class="btn btn-primary">
        @csrf
    </form>




</div>
@endsection