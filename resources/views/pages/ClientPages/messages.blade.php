@extends('layouts.master2')
@section('title','Conversation')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contact with representative</h1>
          </div>
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="d-flex flex-column comment-section">
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info"><img class="rounded-circle" src="{{ asset('images/'.$client->image) }}" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$client->fullname}}</span><span class="date text-black-50">Created at - {{$ticket->create_date}}</span></div>
                    </div>
                    <div class="mt-2">
					 <h5 class="card-title">{{$ticket->title}} </h5>
                        <p class="comment-text">{{$ticket->topic_ticket}}</p>
                       <br/>
					  <iframe src="{{asset('images/'.$ticket->file_description)}}" style="width:500px; height:200px;" frameborder="0"></iframe>

					</div>
				
				<div class="mt-2">
                @foreach ($messages as $message)
                 <hr>
                 <div class="d-flex flex-row align-items-start">
                    @if ($message->messageCli == null)
                    <img class="rounded-circle" src="{{ asset('images/'.$rep->image )}}" width="40">&nbsp;&nbsp;	 
                    <p class="comment-text">{{ $message->messageRep }}</p>
                    @else 
                    <img class="rounded-circle" src="{{ asset('images/'.request()->session()->get('image') )}}" width="40">&nbsp;&nbsp;	                     
                    <p class="comment-text">{{ $message->messageCli }}</p>
                    @endif
                 </div>
                @endforeach
					<br>
				</div>
               <form  action="{{url('answerRep')}}" method="POST">
               {{ csrf_field() }}
                 <div class="bg-light p-2">
                    <input type="hidden" value="{{ $ticket->id }}" name="idT">
                    <input type="hidden" value="{{ $rep->id }}" name="idR">
                   @if($ticket->closeby == null or $ticket->closed_date == null)
                    <div class="d-flex flex-row align-items-start"><textarea class="form-control ml-1 shadow-none textarea" name="message"></textarea></div>
                    <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="submit">Reply</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="reset">Cancel</button></div>
                   @else
                    <center><div><small>Ticket has closed.</small></div></center>
                   @endif
                </div>
               </from>
            </div>
        </div>
    </div>
</div>
@endsection