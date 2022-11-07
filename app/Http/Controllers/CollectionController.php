<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Foundation\Bus\DispatchesJobs;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\cliente;

class CollectionController extends BaseController
{


    public function home()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $useri = cliente::find(Session::get('user_id'));
        return view('home')->with('userid',$useri->username);
    }



}

?>
