<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class NewsletterController extends Controller
{
    //
    public function index(){
        $message = DB::select('select * from newsletters');
        return view('message',['message'=>$message]);
        }
}
