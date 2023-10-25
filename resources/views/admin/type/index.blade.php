@extends('layouts.admin')
@section('title','Type list')
@section('main')
<form action="" class= "form-inline" >
    <div class="form-group">
        <input type="text" class="form-control" name ="search" placeholder="Tìm kiếm">
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
<table class="table table-hover">
    <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $table)
            <tr>
                <td>{{$table->id}}</td>
                <td>{{$table->name}}</td>
                <td>{{$table->words ? $table->words->count() : 0}}</td>
                <td>{{$table->created_at->format('d-m-Y')}}</td>
                <td>{{$table->updated_at->format('d-m-Y')}}</td>
                <td class="text-right"> 
                    <a href="{{route('type.edit',$table->id)}}"class="btn btn-sm btn-succes">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{route('type.destroy',$table->id)}}" class="btn btn-sm btn-succes btndelete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
<form action="" method = "POST" id = "form-delete">
    @csrf @method('DELETE')

</form>
<hr>
<div>
    {{$list->appends(request()->all())->links()}}
</div>
@stop();

@section('js')
    <script>
        $("a.btndelete").click(function(e){
            e.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('Are you sủe?')){
                $('form#form-delete').submit();
            }
        })
    </script>
@stop();