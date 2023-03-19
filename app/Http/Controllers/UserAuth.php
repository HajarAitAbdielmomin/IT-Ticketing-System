<?php

namespace App\Http\Controllers;
use App\Models\User_;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class UserAuth extends Controller
{
    public function UserLogin(Request $req){
        $email = $req->email;
        $psw = $req->password;
        $data = User_::where('email',$email)->where('password',$psw)->get();
        if (count($data)>0) {
            //$req->session()->all();
            $req->session()->put('id',$data[0]->id);
            $req->session()->put('fullname',$data[0]->fullname);
            $req->session()->put('password',$data[0]->password);
            $req->session()->put('adresse',$data[0]->adresse);
            $req->session()->put('phone',$data[0]->phone);
            $req->session()->put('role',$data[0]->role);
            $req->session()->put('email',$data[0]->email);
            $req->session()->put('image',$data[0]->image);
            return redirect('/getData');
            
        } else {
            $req->session()->put('userNotExiste','Password or Email does not match !!!');
            return redirect('/pages/index');
        }
    }

    public function protect(Request $r){
       if($r->session()->get('id') == ""){
        return redirect('/pages/index');
       }else {
        $fullname = $r->session()->get('fullname');
        $phone = $r->session()->get('phone');
        $id = $r->session()->get('id');
        $add = $r->session()->get('adresse');
        $img = $r->session()->get('image');
        $email = Session::get('email');
        
        $capsule = array('help'=>0,'fullname' => $fullname, 'phone' => $phone, 'id' => $id, 'adresse' => $add, 'email' => $email, 'image'=>$img );
        if ($r->session()->get('role') == 1) {
            return redirect('firstPage');
            //return view('pages\RepPages\homepage')->with($capsule);
        } 
        if ($r->session()->get('role') == 0) {
            return redirect('homepageCli');
            //return view('pages\ClientPages\HomeCli')->with($capsule);
        } 
      
       }
    }

    public function UserLogout(Request $req){
       // $req->session()->forget()->all();
        $req->session()->forget(['fullname', 'phone','id','adresse','email','image']);
        return redirect('/pages/index');
    }


}
