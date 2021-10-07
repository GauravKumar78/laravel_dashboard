<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginuser(Request $request){
        $request->validate([        
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        $users = User::where('email','=',$request->email)->first();
        if ($users) {         
            if ($request->password == $users->password) {
                $request->session()->put('userid', $users->id);                
                return redirect(route('auth_index'));
            }else{
                return back()->with('fail','Password are not match.');
            }
        }else{
            return back()->with('fail','This email is not registered. Please register');
        }
    }

    public function register(){
        return view('auth.register');
    }

    public function userregister(Request $request){
        if (Session::has('userid')) {
            $request->validate([
                'name' => 'required',
                'fathername' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5|max:12',
                'phone' => 'required|min:11|numeric|unique:users',
                'dob' => 'required'
            ]);
            $user = User::create([
                'name' => $request->name,
                'fathername' => $request->fathername,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone,
                'dob' => $request->dob
            ]);
            if ($user) {
                return redirect(route('auth_index'))->with('msg','Successfully Added.');
            }else{
                return back()->with('fail','You have not Registered');
            }
        }
        $request->validate([
            'name' => 'required',
            'fathername' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'phone' => 'required|min:11|numeric|unique:users',
            'dob' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'fathername' => $request->fathername,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'dob' => $request->dob
        ]);
        if ($user) {
            return back()->with('success','You have Successfully Registered.');
        }else{
            return back()->with('fail','You have not Registered');
        }
    }

    public function index(){
        $userdata = '';
        if (Session::has('userid')) {            
            // $users = User::orderBy('id')->paginate(2);
            $users = User::orderBy('id')->simplePaginate(20);
        }
        return view('auth.dashboard',['user'=>$users]);
    }
    public function usertrash(){
        $userdata = '';
        if (Session::has('userid')) {            
            // $users = User::orderBy('id')->paginate(2);
            $users = User::onlyTrashed()->simplePaginate(20);
        }
        return view('auth.usertrash',['user'=>$users]);
    }

    public function edituser($id){
        $userdata = User::where('id','=',$id)->first();
        return view('auth.edituser',['userdata'=>$userdata]);
    }

    public function updateuser(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'fathername' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
            'phone' => 'required|min:11|numeric',
            'dob' => 'required'
        ]);
       
        $users = User::where('id','=',$id)->first();
        $users->name = $request->name;
        $users->fathername = $request->fathername;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->phone = $request->phone;
        $users->dob = $request->dob;
        $user = $users->save();

        if ($user) {
            return redirect(route('auth_index'))->with('msg','Successfully Updated.');
        }else{
            return back()->with('fail','Not Updated');
        }
    }

    public function delete($id){
        $idrow = User::find($id);
        $idrow->delete();
        return redirect(route('auth_index'))->with('msg','Successfully Trashed.');
    }

    public function parmanenetdelete($id){
        $idrow = User::withTrashed()->find($id);
        $idrow->forceDelete();
        return redirect(route('auth_usertrash'))->with('msg','Successfully Deleted.');
    }
    public function restoreuser($id){
        $idrow = User::withTrashed()->find($id);
        $idrow->restore();
        return redirect(route('auth_usertrash'))->with('msg','Successfully Restored.');
    }

    public function logout(){
        if (session()->has('userid')) {
            session()->pull('userid');
        }
        return redirect(route('auth_login'));
    }
}
