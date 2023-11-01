@extends('layouts.admin')

@section('main')
<!-- Quản lý người xem -->
<div class="row">
        <div class="col">
            <h1 class="my-4">Quản lý yêu cầu </h1>
        </div>
        
    </div>
        <form action="{{ route('videos.searchuser') }}" method="GET" class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm" value="{{ $search ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search">tim kiếm
                    
                </i>
            </button>
        </form>
<div class="table-container">
    @if ($registeredUsers->count() > 0)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên người xem</th>
                    <th>Tiêu đề video</th>
                    <th>Trạng thái</th>
                    <th>Truy Cập</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registeredUsers as $index => $registration)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $registration->user->name }}</td>
                        <td>
                            @if ($registration->video)
                                {{ $registration->video->title }}
                            @else
                                Video không tồn tại
                            @endif
                        </td>
                        <td>{{ $registration->status }}</td>
                        <td>
                        <form action="{{ route('videos.approve', $registration->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Phê duyệt</button>
                        </form>
                        <form action="{{ route('videos.reject', $registration->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger btn-sm">Từ chối</button>
                        </form>
                      
                        </td>
                        <td>
                        <form action="{{ route('videos.delete', $registration->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination-container">
            {{ $registeredUsers->links() }}
        </div>
    @else
        <p>Không có người xem chờ phê duyệt.</p>
    @endif
</div>

@endsection