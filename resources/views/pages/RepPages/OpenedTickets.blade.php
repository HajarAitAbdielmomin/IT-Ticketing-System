@extends('layouts.master')
@section('title','Opened Tickets')

@section('content')
<div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> <i class="fa fa-folder-open"></i> Opened tickets</h6>
                </div>    
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Ticket ID</th>
      <th>Creator</th>
      <th>Ticket topic</th>
      <th>Status</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($opened as $op)
    <tr>
	<td>{{$op->id}}</td>
      <td>
        <div class="d-flex align-items-center">
          <div class="ms-3">
            <p class="fw-bold mb-1">{{$op->creator['fullname']}}</p>
            <p class="text-muted mb-0">{{ $op->creator['email'] }}</p>
          </div>
        </div>
      </td>
      <td>
        <p class="fw-normal mb-1">{{$op->title}}</p>
       
      </td>
      <td>
       <!-- <span class="badge badge-success rounded-pill d-inline">Solved</span>
		 <span class="badge badge-danger rounded-pill d-inline">Unsolved</span>-->
		 <span class="badge badge-warning rounded-pill d-inline">Processing</span> 
      </td>
   
      <td>
     
       <a href="{{ url('closeTicket/'.$op->id) }}"> <button type="button" class="btn btn-primary btn-sm btn-rounded">
          Close
        </button> </a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
@endsection