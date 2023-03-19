@extends('layouts.master2')
@section('title','Inbox')

@section('content')
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                       <h3 class="m-0 font-weight-bold text-primary">Conversations</h3>
                    </div>
                           
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless  table-earning  table-hover table-striped" id="dataTableHover">
                                        <thead>
                                            <tr>
                                                <th>Sent at</th>
                                                <th>Ticket</th>
                                                <th>Last message</th>
                                                <th class="text-right"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $t)
                                            <tr>
                                                <td>{{ $t->created_at }}</td>
                                                <td>{{ $t->ticket['title'] }}</td>
                                                
                                                @if($t->messageCli == null)
                                                <td class="desc">{{$t->messageRep}}
                                                <p><small style="color:black"> From representative.</small></p>
                                                </td>
                                                @else
                                                <td class="desc">{{$t->messageCli}}
                                                <p ><small style="color:black">From you.</small></p>
                                                </td> 
                                                @endif
                                                <td class="text-right"><a href="{{ url('conversation/'.$t->id_ticket.'/'.$t->id_Rep) }}"><button class="au-btn au-btn-icon au-btn--green au-btn--small">Reply</button></a></td>
                                               
                                            </tr>       
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
@endsection