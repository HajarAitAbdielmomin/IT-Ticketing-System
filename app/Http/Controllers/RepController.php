<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User_;
use App\Models\Ticket;
use App\Models\Ticket_Replies; 
use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RepController extends Controller
{
    public function GetAllTickets(){
        if(request()->session()->get('id') == ""){
            return redirect('/pages/index');
        }
      $tickets = Ticket::with('creator','st')->get();
      $st = Status::where('status','Processing')->get();
      if ($tickets->count() == 0 ){
        request()->session()->forget('closeT');
        request()->session()->forget('openT');
        request()->session()->forget('repliesCli');
        $r->session()->put('ticketsNotFound','No tickets created yet !!!');
        return view('pages\RepPages\dataNotFound');
    }
      return view('pages/RepPages/ClientsTickets',compact('tickets','st'));
    }
    
    public function closeticket($idT){
      
        $ticket = Ticket::find($idT);
        $ticket->closed_date = Carbon::now()->toDateTimeString();
        $ticket->closeBy = request()->session()->get('id');
        $ticket->update();
            return redirect('getTickets');
    }
    public function closedTickets(){
        if(request()->session()->get('id') == ""){
            return redirect('/pages/index');
        }
     $closedT = Ticket::with('st','creator')->whereNotNull('closeby')->whereNotNull('closed_date')->get();
   if ($closedT->count() == 0 ){
    request()->session()->forget('ticketsNotFound');
        request()->session()->forget('openT');
        request()->session()->forget('repliesCli');
        request()->session()->put('closeT','No closed tickets !!!');
        return view('pages\RepPages\dataNotFound');
        }
    else   
    return view('pages\RepPages\ClosedTickets')->with('closedT',$closedT);
    }

    public function changeStatus($state,$idT){
    $ticket = Ticket::find($idT);
     $st = Status::where('status',$state)->get();
     $ticket->status = $st[0]->id;
     $ticket->update();
     return redirect('getTickets');

    }
    public function getSolvingForm($idT,$idCreator){
        if (request()->session()->get('id') == "" ){
            return redirect('/pages/index');
         } 
        $ticket = Ticket::find($idT);
        $client = User_::find($idCreator);
        $rep = User_::find(request()->session()->get('id'));
        $messages = Ticket_Replies::where('id_Creator',$idCreator)->where('id_ticket',$idT)->get();
        return view('pages/RepPages/giveSolution',compact('ticket','client','rep','messages'));
    }

    public function saveMessageRep(Request $r){
     if ($r->session()->get('id') == "" ){
        return redirect('/pages/index');
     }  
      $messages = new Ticket_Replies();
      $messages->id_ticket = $r->idT;
      $messages->id_Rep = $r->session()->get('id');
      $messages->id_creator = $r->idCreator;
      $messages->messageRep = $r->message;
     
      $messages->save();
        return redirect('solveTicket/'.$r->idT.'/'.$r->idCreator);  
    }
 
    public function showReplies(){
        if (request()->session()->get('id') == "" ){
            return redirect('/pages/index');
         }
        $ids = DB::table('ticket_replies')->select(DB::raw('max(id)'))->groupBy('id_ticket');
        $data = Ticket_Replies::with('creator','ticket')->whereIn('id',$ids)->groupBy('id_ticket')->get();
        if ($data->count() == 0 ){
            request()->session()->forget('ticketsNotFound');
            request()->session()->forget('openT');
            request()->session()->forget('closeT');
            request()->session()->put('repliesCli','You have no messages !!!');
            return view('pages\RepPages\dataNotFound');
        }
        return view('pages/RepPages/Conversations',compact('data')); 
    }
    
    public function openedTickets(){
        if(request()->session()->get('id') == ""){
            return redirect('/pages/index');
        }
        $opened = Ticket::with('creator')->whereNull('closeby')->get();
        if ($opened->count() == 0 ){
            request()->session()->forget('ticketsNotFound');
            request()->session()->forget('repliesCli');
            request()->session()->forget('closeT');
            request()->session()->put('openT','No opened tickets !!!');
            return view('pages\RepPages\dataNotFound');
        }
        return view('pages\RepPages\OpenedTickets')->with('opened',$opened);
    }
    public function account($id,Request $r){
        if($r->session()->get('id') == ""){
            return redirect('/pages/index');
        } else{
       
         $rep = User_::find($id);
         Session::flash('help',0);
         $capsule = array('fullname' => $rep->fullname, 'password' =>$rep->password,'phone' => $rep->phone, 'id' => $rep->id, 'adresse' => $rep->adresse, 'email' => $rep->email, 'image'=>$rep->image );

        return view('pages\RepPages\profile')->with($capsule);
        
        }
   } 
   
   public function updateProfile(Request $r){

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
        return redirect('getAccount/'.$id);

    } else{
        if ($newpass != $confirm){
            Session::flash('helpp',1);
            //$capsule = array('id'=>$id,'help'=>$help);
            return redirect('getAccount/'.$id);
          } else {
              $rep = User_::find($id);
              $rep->fullname=$fullname;
              $rep->adresse=$adresse;
              $rep->email=$email;
              $rep->phone=$phone;
              $rep->image=$image;
              $rep->password=$newpass;
              $rep->update();
              
              return redirect('getAccount/'.$id);
      
          }
    }
   }

}
