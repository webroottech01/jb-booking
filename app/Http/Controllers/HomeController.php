<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
       
       
    //     return view('homepage');
    // }

    public function login(Request $request)
    {
      
        return view('login');
    }

    public function registerGuest()
    {
        

        return view('signup');
    }


    public function loginGuestApi(Request $request)
    {
        // guzzle::('https://hostdev2.justboardrooms.com/api/loginGuest')->json();

        $response = Http::post('https://hostdev2.justboardrooms.com/api/loginGuest',[
            'email' => $request->email,
            'password' => $request->password,

        ])->json();
      
        // dd($response);
        // session(['userId' => $response['sessionID']]);
        session()->put('userId', $response['sessionID']);
        session()->put('UserName', $response['UserName']);
        
        return response()->json($response, 200);
        
            
    }

     public function registerGuestApi(Request $request)
    {
        $request->headers->set("Accept", "application/json");
        // guzzle::('https://hostdev2.justboardrooms.com/api/loginGuest')->json();
// 
        $response = Http::post('https://hostdev2.justboardrooms.com/api/register',[
            'email' => $request->email,
            'password' => $request->password,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,


        ])->json();
      
        // dd($response);
        // session(['userId' => $response['sessionID']]);
        session()->put('userId', $response['sessionID']);
        session()->put('UserName', $response['UserName']);
        
        return response()->json($response, 200);
        
            
    }
}
