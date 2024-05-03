<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('template.dashboard');

        // $menu = Menu::get();
        // $data[count_menu] =$menu->count();
    }
    public function index1(){
        return view('template.sejarah');
    }
    public function index2(){
        return view('template.contact');
    }

}
