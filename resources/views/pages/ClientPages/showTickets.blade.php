@extends('layouts.master2')
@section('title','List of tickets')

@section('content')
<div class="col-lg-12">
            @if(Session::has('notif'))
                       <div class="alert alert-success">
                            {{ Session::get('notif') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <br><br>
              @elseif(Session::has('messageUp'))
              <div class="alert alert-success">
                            {{ Session::get('messageUp') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <br><br>
              @endif
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Created tickets</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Details</th>
                        <th>Created date</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $t)
                      <tr>
                        <td>{{$t->id}}</td>
                        <td>{{$t->title}}</td>
                        <td>{{$t->topic_ticket}}</td>
                        <td><a href="{{asset('images/'.$t->file_description)}}" download>{{$t->file_description}}</a></td>
                        <td>{{$t->create_date}}</td>
                        <td>
                        @foreach($state as $st)
                        @if($t->status == $st->id)
                        
                           @if($st->status == 'Solved')
                        <span class="badge badge-success">Solved</span>
                            @break
                           @elseif($st->status == 'Processing')
                        <span class="badge badge-warning">Processing</span>
                           @break
                          @elseif($st->status == 'Unsolved')
                        <span class="badge badge-danger">Unsolved</span>
                          @break
                          @endif
                          
                        @endif
                        @endforeach
                        </td>

                        <td>
                             <div class="table-data-feature">
                                
                                   <a href="{{ url('/modifyTicket/'.$t->id) }}" id="edit">
                                   <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                      <i class="zmdi zmdi-edit"></i>
                                   </button>
                                   </a>
                                   <a href="{{ url('/deleteTicket/'.$t->id) }}">                    
                                   <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                      <i class="zmdi zmdi-delete"></i>
                                   </button>
                                  </a>
                                  @if($t->status == 2)
                                  <a href="{{ url('download/'.$t->id) }}">
                                   <button class="item" data-toggle="tooltip" data-placement="top" title="History of the ticket">
                                     <i class="zmdi zmdi-download"></i>
                                   </button>
                                  </a>
                                  @endif
                             </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
           
@endsection