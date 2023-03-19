@extends('layouts.master2')
@section('title','Closed tickets')

@section('content')
<div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="fa fa-folder"></i>Closed Tickets</h3>
                                    <div class="filters m-b-45">
                                         <!-- Alert message (start) -->
                                         @if(request()->session()->has('closing'))
                                            <div class="alert alert-success">
                                               {{ request()->session()->get('closing') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                           </button>
                                          </div>
                                          {{request()->session()->forget('closing')}}
                                         @endif
                                        <!-- Alert message (end) -->
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr> 
                                                    <td>ID</td>
                                                    <td>Title</td>
                                                    <td>Status</td>
                                                    <td>Closed by</td>
                                                    <td>Re-open</td>
													<td>Ticket history</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($closedTickets as $ct)
                                                <tr>
                                                    <td>{{ $ct->id }}</td> 
													<td>
                                                        <div class="table-data__info">
                                                            <h6>{{ $ct->title }}</h6>
                                                        </div>
                                                    </td>
                                                    
													<td> 
                                                    @if($ct->st['status'] == 'Solved')
                                                      <span class="status--process">Solved</span>
                                                    @else
													 <span class="status--denied">Unsolved</span> 
                                                    @endif
                                                    </td>
                                                    <td>
                                                        
                                                        <div class="table-data__info">
                                                        @if($ct->closeby == request()->session()->get('id'))
                                                            <h6><b>You</b>, at {{ $ct->closed_date }}</h6>
                                                        @else
                                                        <h6><b>The representative</b>, at {{ $ct->closed_date }}</h6>
                                                        @endif
                                                        </div>
                                                       
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('openTicket/'.$ct->id) }}" ><span class="role user">Open</span></a>
													</td>
													
                                                    <td>
                                                      <a href=" {{url('download/'.$ct->id)}} " > <button class="item" data-toggle="tooltip" data-placement="top" title="Ticket history">
                                                            <i class="fa fa-download"></i>
                                                        </button>
                                                      </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                               </div>   
@endsection