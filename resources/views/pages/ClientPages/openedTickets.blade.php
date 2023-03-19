@extends('layouts.master2')
@section('title','Opened tickets')

@section('content')
<div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="fa fa-folder-open"></i>Opened Tickets</h3>
                                    <div class="filters m-b-45">
                                           <!-- Alert message (start) -->
                                         @if(request()->session()->has('opening'))
                                            <div class="alert alert-success">
                                               {{ request()->session()->get('opening') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                           </button>
                                          </div>
                                          {{ request()->session()->forget('opening') }}
                                         @endif
                                        <!-- Alert message (end) -->
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr> 
                                                    <td>ID</td>
                                                    <td>Title</td>
                                                    <td>Last time closed</td>
                                                    <td>Close it</td>
													
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($openedTickets as $ot)
                                                <tr>
                                                    <td>{{ $ot->id }}</td> 
													<td>
                                                        <div class="table-data__info">
                                                            <h6>{{ $ot->title }}</h6>
                                                        </div>
                                                    </td>
                                                    
													<td> 
                                                    <div class="table-data__info">
                                                        @if($ot->closed_date != Null)
                                                        <h6>{{ $ot->closed_date }}</h6>   
                                                        @else 
                                                        <h6>Ticket hasn't closed before</h6>
                                                        @endif
                                                        </div>
                                                    <td>
                                                        <a href="{{ url('closeThisTicket/'.$ot->id) }}" ><span class="role admin">Close</span></a>
													</td>
													
                                                  
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                               </div> 
@endsection