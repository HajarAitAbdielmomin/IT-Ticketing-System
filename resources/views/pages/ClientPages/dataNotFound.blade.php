@extends('layouts.master2')


@section('content')
 
               <div class="imgCont">
                  <img src="images/search.png" >
                  @if(request()->session()->has('closeT'))
                  @section('title','No closed tickets')
                  <h2> <i class="	fa fa-search"></i>{{ request()->session()->get('closeT')}} </h2>
                  @elseif(request()->session()->has('openT'))
                  @section('title','No opened tickets')
                  <h2> <i class="	fa fa-search"></i> {{request()->session()->get('openT')}} </h2>
                  @elseif(request()->session()->has('createT'))
                  @section('title','No created tickets')
                  <h2> <i class="	fa fa-search"></i>{{ request()->session()->get('createT')}}  </h2>
                  @elseif(request()->session()->has('cnvT'))
                  @section('title','No replies')
                  <h2> <i class="	fa fa-search"></i>{{ request()->session()->get('cnvT')}}  </h2>
                  @endif
                </div>
@endsection