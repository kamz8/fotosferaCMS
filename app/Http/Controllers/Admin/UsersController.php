<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use App\Providers\AuthServiceProvider;

class UsersController extends Controller
{
    public function show()
    {
        return view('admin.users.show');
    }  

     public function index(Request $request)
     {
         if ($request->ajax()){
                $users = User::all();
                $filtered = $users->diff($users->whereIn('email', ['admin@admin.com', Auth::user()->email ]));

                $filtered->all();
                if(count($filtered)==0) return "no_result";
                                  return view('admin.users.table')->with('users',$filtered);
                                  
              }else return '';   

     } 
     
      public function serch(Request $request)
      {
          if ($request->ajax()){
          
              $keyword = $request->keyword;
              if ($keyword!=''){
                  $users = new User();
                  $serch_result = $users->serch($keyword);
                  
                  if(count($serch_result)==0) return "no_result";
                  return view('admin.users.table')->with('users',$serch_result);
                  
              }
          }else    
           return false;
         
      }   
     
     public function store(Request $request){
          if ($request->ajax()){   

            $validator = Validator::make($request->all(), [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|between:5,20',
                'password_confirmation' => 'required|same:password',
                'role' => 'required'
            ]); 
            
            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray()

                ), 400); // 400 being the HTTP code for an invalid request.
            }else{
                $request->only(['name','email','password','role']);
                $user = User::create($request->all());
//                $user->setPasswordAttribute($request->passwort);
//                $user->save();
                return Response::json($user, 200);                
            }
          }         
     }

     public function edit($id)
     {
        $user = User::findOrFail($id); 
  
        return Response::json($user);
     }   
     
     public function destroy($id, Request $request)
     {
        if ($request->ajax()){ 
            
            $user = User::destroy($id);
        }  
        return Response::json($user);
     } 
     //update user 
     public function update(Request $request, $id){
          $user = User::findOrFail($id); 
          if ($request->ajax()){  
              
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:5',
                'email'=>'required|email|unique:users,email,'.$id,
                'password' => 'between:5,20',
                'password_confirmation' => 'same:password',
                'role' => 'required'
            ]);         
            if ($validator->fails())
            {
                return Response::json(array(
                    'success' => false,
                    'errors' => $validator->getMessageBag()->toArray(),
                  ), 400); // 400 being the HTTP code for an invalid request.
            }else{
                if(!isEmptyString($request->password)){
                    $user->setPasswordAttribute($request->passwort);
                    $user->update($request->except('password'));
                }
                else{
                    $user->update($request->all());
                }
                return Response::json($user, 200);                
            }
            
          } 
     }  
     
     
}
