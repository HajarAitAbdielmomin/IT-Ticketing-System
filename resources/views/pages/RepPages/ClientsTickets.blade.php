@extends('layouts.master')
@section('title','Tickets of clients')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Created tickets by clients</h1>
</div>
<div class="row">
    @foreach ($tickets as $ticket)
<div class="card" style="width: 18rem;">
  <img src="{{ asset('images/issues.jpg')  }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $ticket->title }} </h5>
    <p class="card-text">{{ $ticket->topic_ticket }}</p>
    <p>
    <a href="{{asset('images/'.$ticket->file_description)}}" target="_blank" data-toggle="tooltip" data-placement="top" title="File description">{{$ticket->file_description}}</a>
    </p>
    
    @if( $ticket->closeby == null )
    <a href="{{ url('solveTicket/'.$ticket->id.'/'.$ticket->creator['id']) }}" class="btn btn-primary">Solve it</a>
	 <a href="{{ url('closeTicket/'.$ticket->id) }}"><button type="button" class="btn btn-success" >Close it</button></a>
    @elseif( $ticket->closeby == request()->session()->get('id'))

      @if($ticket->status == $st[0]->id)
        <small class="text-muted"> Did you solve the problem ? </small>
        <a href="{{ url('changeStatus/Solved/'.$ticket->id) }}"><button type="button" class="btn btn-primary" ><b>Solved</b></button></a>
        <a href="{{ url('changeStatus/Unsolved/'.$ticket->id) }}"><button type="button" class="btn btn-danger" ><b>Unsolved</b></button></a>
        
      @else
        @if($ticket->st['status'] == 'Solved')
      <button  class="btn btn-primary"   disabled><b>Solved</b></button>
     
        @else
        <button  class="btn btn-danger"   disabled><b>Unsolved</b></button>
     
        @endif
     
       <button  class="btn btn-primary"  title="Closed at {{ $ticket->closed_date }}" disabled><b>Closed by you</b></button>
      @endif

     @else
    <button type="button" class="btn btn-primary" disabled><b>Solved</b></button>
    <button type="button" class="btn btn-primary" title="Closed at {{ $ticket->closed_date }}" disabled><b>Closed by client</b></button>
    @endif
  </div>
  <small class="text-muted">&nbsp;&nbsp;&nbsp;<b>Created by</b> {{ $ticket->creator['fullname'] }} <br> &nbsp;&nbsp;&nbsp;{{ $ticket->creator['email'] }}  </small>
</div>
@endforeach
</div>
@endsection