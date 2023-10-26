@extends('layouts.site')
@section('test')
<div class="content">
    <div id="cover" class="search">
        <form method="get" action="">
            @csrf
            <div class="tb">
                <div class="td"><input type="text" placeholder="Search" required name="search" value=""></div>
            </div>
        </form>
    </div>
    <div class="room">
        {!! $word->html !!}
    </div>
</div>
@endsection

@section('css')
    <style>
        .room{
            padding-left: 50px;
        }
    </style>
@endsection