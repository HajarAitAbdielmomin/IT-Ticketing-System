@extends('layouts.master2')



@section('content')

                         
              <div class="card">
                                   
                <!-- Alert message (start) -->
                 @if(Session::has('message'))
                       <div class="alert alert-success">
                            {{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                 @endif
                <!-- Alert message (end) -->
                                 
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Ticket</h3>
                                        </div>
                                        <hr>
                                        @if(Session::has('editSection'))
                                        @section('title','Update a ticket')
                                        <form action="{{ url('UpdateTicket/'.$ticket->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        {{ csrf_field() }}    
                                        <div class="form-group">
                                                <label  class="control-label mb-1">Ticket title</label>
                                                <input  name="title" type="text" class="form-control" value ="{{ $ticket->title }}" required >
                                                <div class="valid-feedback">Valid.</div>
                                               <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Describe your problem </label>
												<textarea name="topic" class="form-control ml-1 shadow-none textarea form-control" cols="8" rows="8" required>{{ $ticket->topic_ticket }}</textarea>     	
												
                                                <div class="valid-feedback">Valid.</div>
                                                  <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Upload file</label>
                                                <input id="#" name="fichier" type="file" class="form-control" value="{{ $ticket->file_description }}">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button id="payment-button" type="submit" class="btn btn-success btn-lg btn-block">
                                                    <span id="payment-button-amount">Update</span>
                                                    
                                                </button>
                                                </div>
                                                <div class="col-6">
                                                    <button id="payment-button" type="reset" class="btn btn-secondary btn-lg btn-block">
                                                   
                                                    <span id="payment-button-amount">Clear</span>
                                               
                                                </button>
                                                </div>
                                            </div>
                                           
                                        </form>
                                        @else
                                        @section('title','Add a ticket')
                                        <form action="{{ url('createTicket') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        {{ csrf_field() }}    
                                        <div class="form-group">
                                                <label  class="control-label mb-1">Ticket title</label>
                                                <input  name="title" type="text" class="form-control" required >
                                                <div class="valid-feedback">Valid.</div>
                                               <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Describe your problem </label>
												<textarea name="topic" class="form-control" cols="8" rows="8" required></textarea>     	
												
                                                <div class="valid-feedback">Valid.</div>
                                                  <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label mb-1">Upload file</label>
                                                <input id="#" name="fichier" type="file" class="form-control">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button id="payment-button" type="submit" class="btn btn-success btn-lg btn-block">
                                                    <span id="payment-button-amount">Create</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                                </div>
                                                <div class="col-6">
                                                    <button id="payment-button" type="reset" class="btn btn-secondary btn-lg btn-block">
                                                   
                                                    <span id="payment-button-amount">Clear</span>
                                               
                                                </button>
                                                </div>
                                            </div>
                                           
                                        </form>
                                        @endif
                                    </div>
                                </div>

@endsection