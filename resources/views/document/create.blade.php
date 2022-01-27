@extends('layouts.app')
@section('content')
<div class="container">
<form method="post" action="{{route('documents.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Document name</label>
        <input type="text" class="form-control" name="document_name" />
        @error('document_name')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>    
    <div class="form-group">
        <label>Document file</label>
        <input type="file" class="form-control" name="document_file" />
        @error('document_file')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>    
    <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>    
</form>    
</div>
@endsection