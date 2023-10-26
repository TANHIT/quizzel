@extends('layouts.site')
@section('test')

    <style>
        #content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        #cover {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        
        .search {
            margin-bottom: 20px;
        }
        
        .room {
            width: 100%;
        }
        
        .room-top {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }
        
        .room-bottom {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #1c1d26;
            border-radius: 5px;
        }
        
        .room-bottom .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .pagination .page-item {
            list-style-type: none;
            margin: 0 2px;
        }
        
        .pagination .page-link {
            text-decoration: none;
            padding: 5px 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            color: #fff; /* Màu chữ số được thay đổi thành màu trắng */
            background-color: transparent; /* Thêm nền trong suốt */
        }
        
        .pagination .page-link:hover {
            background-color: #f9f9f9;
        }
        
        .tab {
            width: 100%;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: center;
            text-decoration: none;
            color: #333;
        }
        
        .tab:hover {
            background-color: #747474;
        }
        
        .tab h1 {
            font-size: 24px;
            margin: 0;
        }
        
        .tab h3 {
            font-size: 16px;
            margin: 0;
        }
    </style>

    <div id="content">
        <div id="cover" class="search">
            <form method="get" action="">
                @csrf
                <div class="tb">
                    <div class="td"><input type="text" placeholder="Search" required name="search" value="{{$search}}"></div>
                </div>
            </form>
        </div>
        
        <div id="cover" class="room">
            <div class="room-top">
                @foreach($list as $lists)
                    <a class="tab" href="{{route('word.detail',['id'=>$lists->id])}}">
                        <div class="tb">
                            <h1>{{$lists->word}}</h1>
                        </div>
                        <div class="tb">
                            <h3>{{$lists->description}}</h3>
                        </div>
                    </a>
                @endforeach
            </div>
        
            <div class="room-bottom">
                <div class="pagination">
                    {{ $list->appends(request()->all())->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection