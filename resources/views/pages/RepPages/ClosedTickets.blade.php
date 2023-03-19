@extends('layouts.master')
@section('title','closed Tickets')

@section('content')
<div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-folder"></i> Closed tickets</h6>
                </div>    
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Ticket ID</th>
      <th>Creator</th>
      <th>Ticket topic</th>
      <th>Status</th>
      <th>Closed by</th>
      
    </tr>

  </thead>
  <tbody>
  @foreach($closedT as $close)
    <tr>
	<td>{{$close->id}}</td>
      <td>
        <div class="d-flex align-items-center">
          <div class="ms-3">
            <p class="fw-bold mb-1">{{$close->creator['fullname']}}</p>
            <p class="text-muted mb-0">{{ $close->creator['email'] }}</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$close->title}}</p>
       
      </td>
      <td>
        @if($close->st['status'] == 'Solved')
          <span class="badge badge-success rounded-pill d-inline">Solved</span>
        @elseif($close->st['status'] == 'Unsolved')
		 <span class="badge badge-danger rounded-pill d-inline">Unsolved</span>
		@endif
      </td>
   
      <td>
        @if($close->closeby == request()->session()->get('id'))
      <p class="fw-normal mb-1"><b>You at </b>{{ $close->closed_date }}</p>
       @else
       <p class="fw-normal mb-1"><b>Client at </b>{{ $close->closed_date }}</p>
       @endif
      </td>
   
    </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection