<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function verifyUsers(Request $request){
        try{
            if($request->login == "login"){
                $email = $request->email;
                $password = $request->password;
                $rows = DB::table('users')
                    ->where('email', $email)
                    ->get()->count();
                if ($rows > 0) {
                    $rows = DB::table('users')
                        ->where('email', $email)
                        ->first();
                    if($password == $rows->password) {
                        $role = $rows->role;
                        Cookie::queue('role', $role, time()+31556926 ,'/');
                        Cookie::queue('name', $rows->name, time()+31556926 ,'/');
                        Session::put('user_info', $rows);
                        if($role==1){
                            Cookie::queue('analyst', $rows->role, time()+31556926 ,'/');
                            return redirect()->to('analysisReport');
                        }
                        elseif($role==2){
                            Cookie::queue('receiver', $rows->role, time()+31556926 ,'/');
                            return redirect()->to('receiveReport');
                        }
                        elseif($role==3){
                            Cookie::queue('admin', $rows->role, time()+31556926 ,'/');
                            return redirect()->to('finalReport');
                        }
                        return redirect()->to('');
                    }
                    else{
                        return back()->with('errorMessage', 'পাসওয়ার্ড ভুল দিয়েছেন।');
                    }
                } else {
                    return back()->with('errorMessage', 'আপNoকে পাওয়া যাচ্ছে No।');
                }
            }
            else{
                return back()->with('errorMessage', 'Fill up the form!!');
            }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return back()->with('errorMessage', $ex->getMessage());
        }
    }
    public function logout(){
        Cookie::queue(Cookie::forget('analyst','/'));
        Cookie::queue(Cookie::forget('receiver','/'));
        Cookie::queue(Cookie::forget('admin','/'));
        Cookie::queue(Cookie::forget('role','/'));
        session()->forget('user_info');
        session()->flush();
        return redirect()->to('/');
    }
}
