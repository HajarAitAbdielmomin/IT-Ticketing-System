@extends('layouts.master')
@section('title','Home page')
@section('content')
        
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-group"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $clients }}</h2>
                                                <span>Clients </span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-folder"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $closedTickets }}</h2>
                                                <span>Closed tickets</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3" >
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-folder-open"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $openedTickets }}</h2>
                                                <span>Opened tickets</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-check-square"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{ $solvedTickets }}</h2>
                                                <span>Solved tickets</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30">Number of tickets per client</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                            @foreach($allClients as $nbr)
                                            <tr>
                                                <td>{{ $nbr->fullname }}</td>
                                                <td>{{ $nbr->tickets_count}} <b>Tickets</b></td>
                                            </tr>
                                         @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>Recent Messages</h3>
                                        
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                          
                                            <div class="au-message-list">
                                                @foreach($latestMes as $mes)
                                               
                                                <div class="messageBox">
                                                <a href=" {{url('solveTicket/'.$mes->id_ticket.'/'.$mes->creator['id'])}} " > 
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="{{ asset('images/'.$mes->creator['image'] ) }}" >
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">{{ $mes->creator['fullname'] }}</h5>
                                                                <p>{{ $mes->messageCli }}</p>
                                                            </div>
                                                        </div>
                                                      <!--  <div class="au-message__item-time">
                                                            <span >{{ $mes->created_at }}</span>
                                                        </div> -->
                                                    </div>
                                                    </a>    
                                                </div>
                                                
                                                @endforeach
                                            
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
                         <div class="col-xl-12 col-lg-9 mb-4">
                      <div class="card">
                 <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                      <th>ticket ID</th> 
                      <th>Creator</th>
                        <th>problem</th>
                        <th>Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($tickets as $ticket)
                      <tr>
                        <td>{{$ticket->id}}</td>
                        <td>{{$ticket->creator['fullname']}}</td>
                        <td>{{$ticket->title}}</td>
                      @if($ticket->st['status'] == 'Solved')
                        <td><span class="badge badge-success">Solved</span></td>
                      @elseif($ticket->st['status'] == 'Unsolved')
                        <td><span class="badge badge-danger">Unsolved</span></td>
                      @else
                        <td><span class="badge badge-warning">Processing</span></td>
                      @endif
                      </tr>
                     @endforeach
                      
                    </tbody>
                  </table>
                   </div>
              
                  </div>
                   </div>

    @endsection
  







