@extends('layouts.master')


@section('content')
 
               <div class="imgCont">
                  <img src="images/search.png" >
                  @if(request()->session()->has('closeT'))
                  @section('title','No closed tickets')
                  <h2> <i class="	fa fa-search"></i>{{ request()->session()->get('closeT')}} </h2>
                  @elseif(request()->session()->has('openT'))
                  @section('title','No opened tickets')
                  <h2> <i class="	fa fa-search"></i> {{ request()->session()->get('openT')}} </h2>
                  @elseif(request()->session()->has('ticketsNotFound'))
                  @section('title','No created tickets')
                  <h2> <i class="	fa fa-search"></i>{{ request()->session()->get('createT')}}  </h2>
                  @elseif(request()->session()->has('repliesCli'))
                  @section('title','No replies')
                  <h2> <i class="	fa fa-search"></i>{{ request()->session()->get('cnvT')}}  </h2>
                  @endif
                </div>
@endsection