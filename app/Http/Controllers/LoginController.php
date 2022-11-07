<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\cliente;

class LoginController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function register_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        $error = Session::get('error');
        Session::forget('error');
        return view('register')->with('error',$error);
    }

    public function do_register_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        
        if(strlen(request('username'))==0 || strlen(request('password'))==0 || 
        strlen(request('confirm_password'))==0 || strlen(request('password'))==0 
        || strlen(request('allow'))==0 )
        {
            Session::put('error','empty_fields');
            return redirect('register')->withInput();
        }
        else if(request('password') != request('confirm_password'))
        {
            Session::put('error','bad_passwords');
            return redirect('register')->withInput();
        } 
        else if(cliente::where('username',request('username'))->first())
        {
            Session::put('error','existing');
            return redirect('register')->withInput();
        } 

        $cliente = new cliente;
        $cliente->username = request('username');
        $cliente->password=password_hash(request('password'),PASSWORD_BCRYPT);
        $cliente->email=request('email');
        $cliente->save();

    Session::put('user_id', $cliente->codice/*devo mettere cliente*/);

        return redirect('home');

    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }

    public function login_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error',$error);
    }

    public function do_login()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        
        if(strlen(request('username'))==0 || strlen(request('password'))==0 )
        {
            Session::put('error','empty_fields');
            return redirect('login')->withInput();
        }

        $cliente = cliente::where('username',request('username'))->first();
        if(!$cliente || !password_verify(request('password'),$cliente->password))
        {
            Session::put('error','wrong');
            return redirect('login')->withInput();
        } 



        Session::put('user_id', $cliente->codice);

        return redirect('home');

    }

}

?>
