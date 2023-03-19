<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User_;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Ticket_Replies;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PDF;
class CliController extends Controller
{
    public function downloadPdf($idT){
        $ticket = Ticket::find($idT);
        $replies = Ticket_Replies::with('creator')->where('id_Creator',request()->session()->get('id'))->where('id_ticket',$idT)->get();

        $pdf = PDF::loadView('pages\ClientPages\pdf', compact('ticket','replies'));
        
        return $pdf->download('History.pdf');
    }

     public function getHomePage(){
      
        return view('pages/ClientPages/HomeCli');
     }
    
     public function ticketForm(){
        return view('pages\ClientPages\ticketForm');
     }

     public function removeTicket($idT){
        if(Ticket::destroy($idT)){
            Session::flash('notif','Ticket deleted !!');
            return redirect('display');
        }

     }
     
    public function displayData($idT){
       
        $ticket = Ticket::find($idT);
        Session::flash('editSection');
        
        return view('pages\ClientPages\ticketForm')->with('ticket',$ticket); 
    } 
    public function updateTicket($idT,Request $r){
        if($r->session()->get('id') == ""){
            return redirect('/pages/index');
        }
        $title = $r->title;
        $topic = $r->topic;
        $ticket = Ticket::find($idT);
    if ($r->file('fichier')){
        $fileName = $r->fichier->getClientOriginalName();
        $file = $r->file('fichier');
        $file->move(public_path('/images'),$fileName);
        $ticket->file_description = $fileName;  
    }
    
    $ticket->title = $title;
    $ticket->topic_ticket = $topic;
   
    if($ticket->update()){
        Session::flash('messageUp','Ticket Updated !!');  
    }
    return redirect('display');
    }

    public function account($id,Request $r){
        if($r->session()->get('id') == ""){
            return redirect('/pages/index');
        } else{
         $cli = User_::find($id);
         Session::flash('help',0);
         $capsule = array('fullname' => $cli->fullname, 'password' =>$cli->password,'phone' => $cli->phone, 'id' => $cli->id, 'adresse' => $cli->adresse, 'email' => $cli->email, 'image'=>$cli->image );

        return view('pages\ClientPages\profile')->with($capsule);
        
        }
   }
   public function TicketsList(Request $r){
    if($r->session()->get('id') == ""){
        return redirect('/pages/index');
    }
    $tickets = Ticket::all()->where('id_creator',$r->session()->get('id'));
    $state = Status::all();
    if ($tickets->count() == 0 ){
        request()->session()->forget('closeT');
        request()->session()->forget('openT');
        request()->session()->forget('cnvT');
        $r->session()->put('createT','No tickets created yet !!!');
        return view('pages\ClientPages\dataNotFound');
    }
    return view('pages\ClientPages\showTickets',compact('tickets','state'));
   }

   public function getClosedTickets(){
    if(request()->session()->get('id') == ""){
        return redirect('/pages/index');
    }
    $closedTickets = Ticket::with('st')->where('id_creator',request()->session()->get('id'))
    ->whereNotNull('closeby')
    ->whereNotNull('closed_date')->get();
   if ($closedTickets->count() == 0 ){
    request()->session()->forget('openT');
    request()->session()->forget('createT');
    request()->session()->forget('cnvT');
        request()->session()->put('closeT','You have no closed tickets !!!');
        return view('pages\ClientPages\dataNotFound');
        }
    else   
    return view('pages\ClientPages\ClosedTickets')->with('closedTickets',$closedTickets);
}

public function getOpenedTickets(){
    if(request()->session()->get('id') == ""){
        return redirect('/pages/index');
    }
    $openedTickets = Ticket::with('st')->where('id_Creator',request()->session()->get('id'))->whereNull('closeby')->get();
    if ($openedTickets->count() == 0 ){
        request()->session()->forget('closeT');
        request()->session()->forget('createT');
        request()->session()->forget('cnvT');
        request()->session()->put('openT','No opened tickets !!!');
        return view('pages\ClientPages\dataNotFound');
    }
    else    
        return view('pages\ClientPages\openedTickets')->with('openedTickets',$openedTickets);
}

public function openMe($idT){
  $ticket = Ticket::find($idT);
  $st = Status::where('status','Processing')->get();
  $ticket->closeby = NULL;
  $ticket->reopened_date = Carbon::now()->toDateTimeString();
  $ticket->status = $st[0]->id;
  $ticket->update();
  request()->session()->put('opening','A ticket has opened !!!');
  return redirect('OpenedTickets');

}
public function closeMe($idT){
      
    $ticket = Ticket::find($idT);
    $st = Status::where('status','Solved')->get();
    $ticket->closed_date = Carbon::now()->toDateTimeString();
    $ticket->closeBy = request()->session()->get('id');
    $ticket->status = $st[0]->id;
    $ticket->update();
    request()->session()->put('closing','A ticket has closed !!!');
    return redirect('ClosedTickets');
}


public function getRepReplies(){
    if (request()->session()->get('id') == "" ){
        return redirect('/pages/index');
     }
    $ids = DB::table('ticket_replies')->select(DB::raw('max(id)'))->where('id_Creator',request()->session()->get('id'))->groupBy('id_ticket');
    $data = Ticket_Replies::with('creator','ticket')->whereIn('id',$ids)->groupBy('id_ticket')->get();

    if ($data->count() == 0 ){
        request()->session()->forget('closeT');
        request()->session()->forget('createT');
        request()->session()->forget('openT');
        request()->session()->put('cnvT','You have no messages !!!');
        return view('pages\ClientPages\dataNotFound');
    }
    return view('pages\ClientPages\conversations',compact('data'));
}

public function getConvForm($idT,$idRep){
    if (request()->session()->get('id') == "" ){
        return redirect('/pages/index');
     } 
    $ticket = Ticket::find($idT);
    $client = User_::find(request()->session()->get('id'));
    $rep = User_::find($idRep);
    $messages = Ticket_Replies::where('id_Creator',request()->session()->get('id'))->where('id_ticket',$idT)->get();
    return view('pages/ClientPages/messages',compact('ticket','client','rep','messages'));
}
public function saveMessage(Request $r){
    if ($r->session()->get('id') == "" ){
        return redirect('/pages/index');
     }  
      $messages = new Ticket_Replies();
      $messages->id_ticket = $r->idT;
      $messages->id_creator = $r->session()->get('id');
      $messages->id_Rep = $r->idR;
      $messages->messageCli = $r->message;

      $messages->save();
        return redirect('conversation/'.$r->idT.'/'.$r->idR);  
}

   public function createTickets(Request $r){
    if($r->session()->get('id') == ""){
        return redirect('/pages/index');
    }
    $title = $r->title;
    $topic = $r->topic;
    $ticket = new Ticket();
    if ($r->file('fichier')){
        $fileName = $r->fichier->getClientOriginalName();
        $file = $r->file('fichier');
        $file->move(public_path('/images'),$fileName);
        $ticket->file_description = $fileName;  
    }
    $status = Status::where('status','Processing')->get();
    $ticket->status = $status[0]->id;
    
    $ticket->title = $title;
    $ticket->topic_ticket = $topic;
    $ticket->id_creator = $r->session()->get('id');
    
    //Ticket::create($ticket);
    if($ticket->save()){
        Session::flash('message','Ticket Added !!');  
    }
    return redirect('addTicket');
   }

   public function updateProfile(Request $r){
    if($r->session()->get('id') == ""){
        return redirect('/pages/index');
    }
    $id = $r->userId;
    $fullname = $r->fullname;
    $adresse = $r->adresse;
    $email = $r->email;
    $phone = $r->phone;
    
    $image = $r->file('image');
    $currentPic = $r->currentPic;

    $newpass = $r->newpass;
    $confirm = $r->confirm;

    if($image == ''){
     $image = $currentPic;
    } else {
        $image = $r->image->getClientOriginalName();
        $image_ = $r->file('image');
        $image_->move(public_path('/images'),$image);
    }
  
    if ($newpass == null && $confirm == null){
        $rep = User_::find($id);
        $rep->fullname=$fullname;
        $rep->adresse=$adresse;
        $rep->email=$email;
        $rep->phone=$phone;
        $rep->image=$image;
        $rep->update();
     
        return redirect('getAccountCli/'.$id);

    } else{
        if ($newpass != $confirm){
          
            Session::flash('helpp',1);
            
            return redirect('getAccountCli/'.$id);
          } else {
              $rep = User_::find($id);
              $rep->fullname=$fullname;
              $rep->adresse=$adresse;
              $rep->email=$email;
              $rep->phone=$phone;
              $rep->image=$image;
              $rep->password=$newpass;
              $rep->update();
          
              return redirect('getAccountCli/'.$id);
      
          }
    }
   }
}
