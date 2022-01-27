@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('documents.create')}}" class="btn btn-primary">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Document Name</td>
                <td>Document File</td>
                <td>User</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{$document->id}}</td>
                <td>{{$document->name}}</td>
                <td>{{$document->file}}</td>
                <td>{{$document->user_id}}</td>
                <td>
                  <form action="{{route('documents.destroy',$document->id)}}" method="post" >  
                    @csrf 
                    @method('DELETE') 
                    <a href="{{route('documents.show',$document->id)}}">View</a>
                    <button type="submit" class="btn btn-danger">DELETE</button>
                  </form>  
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>    
</div>
@endsection