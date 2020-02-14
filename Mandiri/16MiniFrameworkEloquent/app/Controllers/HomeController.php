<?php

class HomeController extends Controller
{
  protected $user;

  public function __construct()
  {
    $this->user = $this->model('User');
  }

  public function index()
  {
    return $this->view('home');
  }

  public function getusers(){
    //cara 1
    //$users =  User::all();

    //cara2
    $users = $this->user->where('username', 'hilman')->first();
    die(var_dump($users));

    return $this->view('users', ['users' => $users]);
  }
}
