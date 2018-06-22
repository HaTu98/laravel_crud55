@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
              <td>ID</td>
              <td>Title</td>
              <td>Description</td>
              <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->description}}</td>
                <td><a href="{{action('TicketController@edit',$ticket->id)}}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection