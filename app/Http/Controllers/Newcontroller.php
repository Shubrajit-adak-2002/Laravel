<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class Newcontroller extends Controller
{
    public function hello(){
        echo "Jai bajrangbali";
    }

    public function form():View{
        return view('form');
    }

    public function submit(Request $request){
        // $request->all();
        // dd($request->all());

        $request->validate([
            'name'=>"required|regex:/^[a-zA-Z ]{3,30}$/",
            'email'=>"required|regex:/^[a-z0-9.-]+@[a-z0-9.-]+\.[a-z]{2,3}$/",
            'phone'=>"required|regex:/^[6789][0-9]{9}$/",
            'img'=>"required"
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        if ($request->file('img')) 
        $img = $request->file('img');
        $fileName = time()."_".$img->getClientOriginalName();
        $upload = "./upload";
        $img->move($upload,$fileName);
        $submitData = [
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'img'=>$upload."/".$fileName
        ];
        DB::table('suvo_laravel')->insert($submitData);
        // return view('form')->with(['user'=>$submitData]);
        return redirect('/display');
    }

    public function show()
    {
        $data = DB::table('suvo_laravel')->get();
        return view('display')->with(['userInfo'=>$data]);
    }

    public function update_form($ed_id):View{
        $edit_id = $ed_id;
        $edit = DB::table('suvo_laravel')->where('user_id','=',$edit_id)->get();
        return view('edit')->with(['editInfo'=>$edit[0]]);
    }

    public function update(Request $request){
        $request->validate([
            'name'=>"required|regex:/^[a-zA-Z ]{3,30}$/",
            'email'=>"required|regex:/^[a-z0-9.-]+@[a-z0-9.-]+\.[a-z]{2,3}$/",
            'phone'=>"required|regex:/^[6789][0-9]{9}$/",
            'img'=>"required"
        ]);

        $user_id = $request->input('user_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        if ($request->file('img')) 
        $img = $request->file('img');
        $fileName = time()."_".$img->getClientOriginalName();
        $upload = "./upload";
        $img->move($upload,$fileName);
        $updateData = [
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'img'=>$upload."/".$fileName
        ];
        DB::table('suvo_laravel')->where('user_id','=',$user_id)->update($updateData);
        return redirect('/display');
    }

    public function signin():View
    {
        return view('signin');
    }

    public function login(Request $request)
    {
        $userName = $request->input('uname');
        $phone = $request->input('phone');

        $loginData = DB::table('suvo_laravel')->where('email','=',$userName)->orWhere('phone','=',$userName);

        if (empty($loginData[0])) {
            return redirect('/sigin')->with('message','user not found');
        }
        else{
            $dbno = $loginData[0]->phone;

            if ($dbno != $phone) {
                return redirect('/sigin')->with('message','Phone number are not matching');
            } else {
                $uid = $loginData[0]->user_id;
                $request->session()->put('ses_id',$uid);
                return redirect('/display');
            }
            
        }
    }
    
}
