<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
</head>

<body >
    <div class="page-wrapper">
       <div style="text-align: center;background-color:gray;">
	   <br>
      <h3 style="margin-top:-10px;">Your ticket's history, ticket n° : {{ $ticket->id }}</h3>
    </div><br/>
	<div style="margin-left:160px">
    <p>  <b>Creator :</b> {{ $ticket->creator['fullname'] }}</p>
    <p>  <b>Title :</b> {{ $ticket->title }}</p>
    <p>  <b>Topic description :</b> {{ $ticket->topic_ticket }}</p>
    <p>  <b>Status :</b> {{ $ticket->st['status'] }}</p>
    <p>  <b>Created date :</b> {{ $ticket->create_date }}</p>
    <p>  <b>Closed date :</b> {{ $ticket->closed_date }}</p>
    <br>
	<p>  <b>Conversation with support :</b></p>
    
  @foreach($replies as $r)
      @if($r->messageCli == NULL)
      <p><b> Representative :</b> {{ $r->messageRep }} </p>
      @else
      <p> <b>Client :</b> {{ $r->messageCli }} </p>
      @endif
     @endforeach
	  </div>
	  </div>
        

   

</body>

</html>