<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Options;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator; 
use Session;

class SettingsController extends Controller
{
    public function show()
    {
        return view('admin.settings.show');
    }    
    
    public function updatePasswort(Request $request)
    {
        $user = Auth::user();
        
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|different:old_password|between:5,20',
            'password_confirmation' => 'required|same:password'
        ]);
        
            if (Hash::check($request->get('old_password'), $user->passwort())) {
                 if ($validator->fails()) return redirect()->back()->withErrors($validator); 
                 
                 if(empty($request->get('password'))){
                     $validator->errors()->add('smoething_wrong', 'Coś poszło źle!'); 
                    return redirect()->back()->withErrors($validator); 
                 } 
                 
                $user->password = Hash::make($request->get('password'));
                
                
                $user->save();            
                
                Session::flash('alert-success','Hasło zostało zmienione!');
                return redirect('/admin/settings') ;    
            }else{
                $validator->errors()->add('old_password', 'Stare hasło jest błędne!'); 
                return redirect()->back()->withErrors($validator); 
            }
 
    }   
    
    /**
     * Updates the settings.
     *
     * @param int                                 $id
     * @param \Illuminate\Contracts\Cache\Factory $cache
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, Factory $cache)
    {
        // ...

        // When the settings have been updated, clear the cache for the key 'settings':
        $cache->forget('settings');

        // E.g., redirect back to the settings index page with a success flash message
        return redirect()->route('admin.settings.index')
            ->with('updated', true);
    }    
}
