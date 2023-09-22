<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\restaurants;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;


class RestroController extends Controller
{
    public function index(){
        return view('home');
    }

    public function list(){

       $data= restaurants::all();
        return view('List',["data"=>$data]);
    }
 

    public function add(Request $req)
{
    $validatedData = $req->validate([
        'name' => 'required|string',
        'address' => 'required|string',
        'email' => 'required|email|unique:restaurants,R_Email',
        'Oname' => 'required|string',
        'Phone' => 'required|string',
    ]);
    
    $resto = new restaurants;
       $resto->R_Name = $validatedData['name'];
       $resto->R_Address = $validatedData['address'];
       $resto->R_Email = $validatedData['email'];
       $resto->R_OwnerName = $validatedData['Oname'];
       $resto->R_Phone = $validatedData['Phone'];
       $resto->save();
       $req->session()->flush('status','Restaurant added Successfully');
       return redirect('list');


}
 public function delete($id){

       restaurants::find($id)->delete();
      Session::flush('status','Restaurant deleted Successfully');
      return redirect('list');
 }

 public function edit($id){

     $data=restaurants::find($id);
     return view('edit',['data'=>$data]);
 }
 
 
 public function update(Request $req)
 {
     $validatedData = $req->validate([
         'name' => 'required|string',
         'address' => 'required|string',
         'email' => 'required|email|unique:restaurants,R_Email',
         'Oname' => 'required|string',
         'Phone' => 'required|string',
     ]);

    $resto =  restaurants::find($validatedData['id']);
    $resto->R_Name = $validatedData['name'];
    $resto->R_Address = $validatedData['address'];
    $resto->R_Email = $validatedData['email'];
    $resto->R_OwnerName = $validatedData['Oname'];
    $resto->R_Phone = $validatedData['Phone'];
    $resto->save();
    $req->session()->flush('status','Restaurant updated Successfully');
    return redirect('list');


 }

 public function Register(Request $r)
    {
        $validatedData = $r->validate([
            'U_Name' => 'required|string',
            'U_Email' => 'required|email|unique:users,email',
            'U_Password' => 'required|string',
        ]);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Optionally, log the user in here if you have an authentication system.
        $r->session()->flush('status','Restaurant updated Successfully');
        return redirect('list');
        // Redirect to a success page or dashboard
       // return redirect('dashboard')->with('status', 'Registration successful');
    }
}









