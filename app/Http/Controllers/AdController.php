<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\AdStore;
use App\Models\Ad;
use App\Models\User;

class AdController extends Controller
{
use AuthenticatesUsers;

public function index()
{
$ads = DB::table('ads')->orderBy('created_at', 'DESC')->paginate(1);
return view('ads',compact('ads'));
}

    public function create()
{
return view('create');
}
public function store(AdStore $request)
{
$validated = $request->validated();

if (!Auth::check()) {
            $request->validate([
                'name' => 'required|unique:users|max:100',
                'email' => 'required|unique:users|email|',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
$user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            $this->guard()->login($user);
}

$ad = new Ad();
$ad->title = $validated['title'];
$ad->description = $validated['description'];
$ad->localisation = $validated['localisation'];
$ad->price = $validated['price'];
$ad->user_id = auth()->user()->id;
$ad->save();
return redirect()->route('welcome')->with('success','Votre annonce a été postée');
}

}
