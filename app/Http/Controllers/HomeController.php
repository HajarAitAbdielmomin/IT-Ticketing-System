<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Ticket_Replies;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
/*
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  

        $Tickets = Ticket::all()->count();
        $clients= User_::where('role', 0)->count();
 
        $solved_status = Status::where('status','Solved')->get();
        $solvedTickets = Ticket::where('status',$solved_status[0]->id)->count();

        $unSolved_status = Status::where('status','Unsolved')->get();
        $unSolvedTickets = Ticket::where('status',$unSolved_status[0]->id)->count();

        return view('pages.index',compact('Tickets','clients','solvedTickets','unSolvedTickets'));
    }
 
    
    public function homePage(){
        if (request()->session()->get('id') == "" ){
            return redirect('/pages/index');
         }
        $clients= User_::where('role', 0)->count();
        $closedTickets = Ticket::whereNotNull('closeby')->count();
        $openedTickets = Ticket::whereNull('closeby')->count();
        $solved_status = Status::where('status','Solved')->get();
        $solvedTickets = Ticket::where('status',$solved_status[0]->id)->count();
        
        $allClients = User_::withCount('tickets')->where('role',0)->get();
 
        $ids = DB::table('ticket_replies')->select(DB::raw('max(id)'))->whereNull('messageRep')->groupBy('id_ticket');
        $latestMes = Ticket_Replies::with('creator','ticket')->whereIn('id',$ids)->groupBy('id_ticket')->get();

        $tickets = Ticket::with('creator','st')->get();

        return view('pages\RepPages\homepage',compact('tickets','clients','closedTickets','openedTickets','solvedTickets','allClients','latestMes'));
    }

    public function getHomePage(){
        if (request()->session()->get('id') == "" ){
            return redirect('/pages/index');
         }

        $createdTickets = Ticket::where('id_creator',request()->session()->get('id'))->count();
        $closedTickets = Ticket::whereNotNull('closeby')->where('id_creator',request()->session()->get('id'))->count();
        
        $solved_status = Status::where('status','Solved')->get();
        $unSolved_status = Status::where('status','Unsolved')->get();
        
        $solvedTickets = Ticket::where('status',$solved_status[0]->id)->where('id_creator',request()->session()->get('id'))->count();
        $unSolvedTickets = Ticket::where('status',$unSolved_status[0]->id)->where('id_creator',request()->session()->get('id'))->count();
        
        $tickets = Ticket::with('st')->where('id_creator',request()->session()->get('id'))->get();

        $ids = DB::table('ticket_replies')->select(DB::raw('max(id)'))->whereNull('messageCli')->where('id_Creator',request()->session()->get('id'))->groupBy('id_ticket');
        $latestMes = Ticket_Replies::with('creator','ticket')->whereIn('id',$ids)->where('id_Creator',request()->session()->get('id'))->groupBy('id_ticket')->get();

        return view('pages\ClientPages\HomeCli',compact('createdTickets','closedTickets','solvedTickets','unSolvedTickets','tickets','latestMes'));

    }
}
