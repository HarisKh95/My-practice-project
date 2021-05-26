<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Hash;
use Auth;
use Validator;
class RegisterController extends Controller
{
    //

    public function newregister(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role'=>'required',
        ]);

        if($validator->fails()){
            return redirect('register')->withErrors($validator)->withInput();
            // return response()->json(['error' => $validator->errors()->all()]);
        }

        $user=new User;
        $role=new Role();
        $role->name=$req->role;
        // Hash::make($request->newPassword)
        $user->create([
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ])->roles()->save($role);

        return redirect()->back()->withSuccess('New User Added');
    }


    public function newlogin(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        if($validator->fails()){
            return redirect('login')->withErrors($validator)->withInput();
        }
        if(Auth::attempt(array('email' => $req->email, 'password' => $req->password)))
        {
            $user=auth()->user()->roles()->orderBy('name')->get();
            foreach($user as $role)
            {
                // dd($user1->name);
                if ($role->name=='Admin' and $req->role=='Admin') 
                {
                    return redirect()->route('AdminIndex');
                }
                elseif ($role->name=='Doctor' and $req->role=='Doctor') {
                    return redirect()->route('DoctorIndex');
                }
                elseif ($role->name=='Patient'and $req->role=='Patient') {
                    return redirect()->route('PatientIndex');
                }
                else
                {
                    return redirect()->route('mylogin')->withErrors($req->role.' is not exist with these credentials.');
                }
            }

        }
        else
        {
            return redirect()->route('mylogin')->withErrors('Email or Password are incorrect.');
        }       
        return response()->json("New User login");
    }

    public function mylogout()
    {
        Auth::logout();
        // Session::flush();
        return redirect()->route('mylogin');

    }
}
