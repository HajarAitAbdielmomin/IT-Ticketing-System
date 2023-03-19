@extends('layouts.master2')
@section('title','homepage')

@section('content')

                        <div class="row" style="margin-top:-50px;">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{ $createdTickets }}</h2>
                                    <span class="desc">Created Tickets</span>
                                    <div class="icon">
                                        <i style="display: inline-block;position: absolute;bottom: 0px;right: -7px;" class="fa fa-folder-open"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{ $closedTickets }}</h2>
                                    <span class="desc">Closed Tickets</span>
                                    <div class="icon">
                                        <i style="display: inline-block;position: absolute;bottom: 0px;right: -7px;" class="fa fa-folder"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{ $solvedTickets }}</h2>
                                    <span class="desc">Solved Tickets</span>
                                    <div class="icon">
                                        <i style="display: inline-block;position: absolute;bottom: 0px;right: -7px;" class="fa fa-calendar-check-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">{{ $unSolvedTickets }}</h2>
                                    <span class="desc">Unsolved Tickets</span>
                                    <div class="icon">
                                        <i style="display: inline-block;position: absolute;bottom: 0px;right: -7px;" class="fa fa-close"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                            <div class="top-campaign">
                                <h3 class="title-3 m-b-30">Tickets details</h3>
                                <div class="table-responsive">
                                    <table class="table table-top-campaign">
                                        <tbody>
                                        @foreach($tickets as $t)
                                            <tr>
                                                <td>{{ $t->id }}</td>
                                                <td>{{ $t->title}} </td>
                                                <td>Opened at {{ $t->create_date}} </td>
                                                @if($t->closed_date != NULL && $t->closeby != NULL)
                                                <td>Closed at {{ $t->closed_date}}</td>
                                                @endif
                                                <td><b>{{ $t->st['status']}}</b></td>
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
                                            <i class="zmdi zmdi-comment-text"></i>Recent Messages from representative</h3>
                                        
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                          
                                            <div class="au-message-list">
                                              
                                               @foreach($latestMes as $mes)
                                                <div class="messageBox">
                                                <a href="{{url('conversation/'.$mes->id_ticket.'/'.$mes->id_Rep)}}" > 
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img src="{{ asset('images/'.$mes->rep['image'] ) }}" >
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">{{ $mes->rep['fullname'] }}</h5>
                                                                <p>{{ $mes->messageRep}}</p>
                                                            </div>
                                                        </div>
                                                     
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
@endsection