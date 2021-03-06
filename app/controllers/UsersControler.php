<?php
 
class UsersController extends BaseController {
  
   protected $layout = "layouts.main";
  
   public function getRegister() {
    return View::make('users.register', compact('tips'));
  }
  
   public function getTips() {
     $this->layout->content = View::make('tips.index');
  }
  
  public function getLogin() {
    $this->layout->content = View::make('users.login');
  }
  
  public function getDashboard() {
    $tips = DB::table('tips')->paginate(20);
    $user = Auth::user();
         return View::make('users.dashboard', compact('tips', 'user'));
  }
  
  public function getLogout() {
    Auth::logout();
    return Redirect::to('users/login')->with('message', 'Your are now logged out!');

  }
  
  public function __construct() {
    $this->beforeFilter('csrf', array('on'=>'post'));
    $this->beforeFilter('auth', array('only'=>array('getDashboard')));
  }
  
  public function postCreate() {
        
    
   
    

    
    $validator = Validator::make(Input::all(), User::$rules);
 
    if ($validator->passes()) {
        $user = new User;
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
       
        $user->save();
     
        return Redirect::to('users/login')->with('message', 'Thanks for registering!');

    } else {
        return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
    }
    
   }

  public function postSignin() {
             if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
             return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
             } else {
              return Redirect::to('users/login')
                  ->with('message', 'Your username/password combination was incorrect')
                  ->withInput();
            }
    }
  
}


?>