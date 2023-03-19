@extends('layouts.master')
@section('title','List of conversations')


@section('content')
<div class="row">
                            <div class="col-md-12">
                               
                                <h3 class="title-5 m-b-35">Clients conversations</h3>
                               
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                               
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Issue</th>
                                                <th>Last reply</th>
                                              
                                     
                                               
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                            <tr class="tr-shadow">
                                               
                                                <td>{{ $d->creator['fullname'] }}</td>
                                                <td><span class="block-email">{{$d->creator['email']}}</span></td>
                                                
                                                <td class="desc">{{$d->ticket['title']}}</td>
                                                @if($d->messageCli == null)
                                                <td class="desc">{{$d->messageRep}}
                                                <p><small style="color:black"> From you.</small></p>
                                                </td>
                                                
                                                @else
                                                <td class="desc">{{$d->messageCli}}
                                                <p ><small style="color:black">From client.</small></p>
                                                </td>
                                                
                                                @endif
                                                <td><span class="status--process"></span></td>
                                                
                                               
                                                <td>
                                                    <div class="table-data-feature">
                                                      <a href=" {{url('solveTicket/'.$d->id_ticket.'/'.$d->id_Creator)}} ">  
                                                      <button class="item" data-toggle="tooltip" data-placement="top" title="Reply">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </button>
                                                      </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="spacer"></tr>
                                          @endforeach
                                         
                                         
                                      
                                        </tbody>
                                    </table>
                                </div>
                     
                            </div>
                        </div>
@endsection