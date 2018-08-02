<?php
namespace app\admin\controller;
use think\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome/welcome');
    }
}