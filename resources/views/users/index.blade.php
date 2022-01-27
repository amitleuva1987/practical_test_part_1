@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>gender</td>
            </tr>
        </thead>
         <tbody>
             @foreach($users as $user)
             <tr>
                 <td>{{$user->id}}</td>
                 <td>{{$user->name}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->gender}}</td>
             </tr>
             @endforeach
         <tbody>    
    </table>
</div>
@endsection