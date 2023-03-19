<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\RepController;
use App\Http\Controllers\CliController;
use App\Models\User_;
use App\Models\Ticket;
use App\Models\Status;
Route::get('/', function () {
  /*$test = 0;
  $arr=array('test'=> $test);*/
  return redirect('pages/index');
});
Auth::routes();
Route::post('user',[UserAuth::class,'UserLogin']);
Route::get('pages/index', [HomeController::class,'index']); 
Route::get('pages/RepPages/homepage');
Route::get('firstPage',[HomeController::class,'homePage']);
Route::get('homepageCli',[HomeController::class,'getHomePage']);
Route::get('pages/ClientPages/HomeCli');
Route::get('/getData',[UserAuth::class,'protect']);
Route::get('/destroy',[UserAuth::class,'UserLogout']);
//Route::get('/getMessage', [HomeController::class,'Alert']);
Route::get('getAccount/{id}',[RepController::class,'account']);
Route::get('getAccountCli/{id}',[CliController::class,'account']);
Route::get('pages/RepPages/profile');
Route::get('pages/ClientPages/profile');
Route::post('/editProfile',[RepController::class,'updateProfile']);
Route::post('/editProfileCli',[CliController::class,'updateProfile']);
Route::get('/addTicket',[CliController::class,'ticketForm']);
Route::get('pages/ClientPages/ticketForm');
Route::post('/createTicket',[CliController::class,'createTickets']);
Route::get('/display',[CliController::class,'TicketsList']);
Route::get('pages/ClientPages/showTickets');
Route::get('/deleteTicket/{idT}',[cliController::class,'removeTicket']);
Route::get('/modifyTicket/{idT}',[cliController::class,'displayData']);
Route::post('UpdateTicket/{idT}',[cliController::class,'updateTicket']);
Route::get('getTickets',[RepController::class,'GetAllTickets']);
Route::get('pages/RepPages/ClientsTickets'); 
Route::get('solveTicket/{idT}/{idCreator}',[RepController::class,'getSolvingForm']);
Route::get('pages/RepPages/giveSolution');
Route::post('answerClient',[RepController::class,'saveMessageRep']);
Route::get('cliReplies',[RepController::class,'showReplies']);
Route::get('pages/RepPages/Conversations');
Route::get('closeTicket/{idT}',[RepController::class,'closeticket']);
Route::get('openedT',[RepController::class,'openedTickets']);
Route::get('ClosedTickets',[CliController::class,'getClosedTickets']);
Route::get('pages/ClientPages/dataNotFound');
Route::get('pages/ClientPages/ClosedTickets');
Route::get('OpenedTickets',[CliController::class,'getOpenedTickets']);
Route::get('pages/ClientPages/openedTickets');
Route::get('openTicket/{idT}',[CliController::class,'openMe']);
Route::get('closeThisTicket/{idT}',[CliController::class,'closeMe']);
Route::get('repReplies',[CliController::class,'getRepReplies']);
Route::get('conversation/{idT}/{idRep}',[CliController::class,'getConvForm']);
Route::get('pages/ClientPages/messages');
Route::post('answerRep',[CliController::class,'saveMessage']);

Route::get('changeStatus/{state}/{idT}',[RepController::class,'changeStatus']);
Route::get('pages/RepPages/dataNotFound');
Route::get('pages/RepPages/OpenedTickets');
Route::get('closedT',[RepController::class,'closedTickets']);
Route::get('pages/RepPages/ClosedTickets');
Route::get('download/{id}',[CliController::class,'downloadPdf']);
Route::get('pages/ClientPages/pdf');


