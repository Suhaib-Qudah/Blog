<?php

class Users extends Controller{
    public function __construct()
    {

        $this->userModel =  $this->model('User');
        
    }

   function login(){
        //  check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
               $data=[
                'name'=>trim($_POST['name']),
                'e-mail'=>trim($_POST['e-mail']),
                'password'=>trim($_POST['password']),
                'name_err'=>'',
                'e-mail_err'=>'',
                'password_err'=>'',
            ];


            // Intialtize the data..........

              //Validate Name
            if (empty($data['name'])){
                $data['name_err']='please enter your name';
            }

            // Validate Email
            if (empty($data['e-mail'])){
                $data['e-amil_err']='please enter your correct e-mail';
            }


            // Validate Password
            if (empty($data['password'])){
                $data['password_err']='please enter your password';
            }elseif(strlen($data['password'])<8){
                $data['password_err']='Password must be at least 8 Character';
            }


            //Find User 
            if ($this->userModel->getUserbyemail($data['e-mail'])){
            //User found
            }else{
            //User not found
                $data['e-mail_err']="No user found";
            }

            // Sure Validated 
            if(empty($data['name_err'])&&empty($data['e-mail_err'])&&empty($data['password_err'])){
                $userLoggedIn = $this->userModel->login($data['e-mail'],$data['password']);
                print_r($userLoggedIn);
                if($userLoggedIn){
                    //Create session
                    $this->createUserSession($userLoggedIn);

                    
                }else{
                    //Password Error
                    $data['password_err']='Inncoret password';
                    $this->view('users/login',$data);
                }
            }else{

                $this->view('users/login',$data);
            }
    
    
        }else{

            $data=[
                'name'=>'',
                'e-mail'=>'',
                'password'=>'',
                'name_err'=>'',
                'e-mail_err'=>'',
                'password_err'=>'',
              

            ];
                $this->view('users/login',$data);
            } 


      

    }
    public function register(){
        //  check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form


            $data=[
                'name'=>trim($_POST['name']),
                'e-mail'=>trim($_POST['e-mail']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'phone'=>trim($_POST['phone']),
                'gender'=>trim($_POST['gender']),
                'name_err'=>'',
                'e-mail_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>'',
                'phone_err'=>'',
                'gender_err'=>''

            ];


            // Intialtize the data..........

              //Validate Name
            if (empty($data['name'])){
                $data['name_err']='please enter your name';
            }

            // Validate Email
            if (empty($data['e-mail'])){
                $data['e-mail_err']='please enter your correct e-mail';
            }else{
                if ($this->userModel->getuserbyemail($data['e-mail'])){
                    $data['e-mail_err']='this user is already exixt.';

                }
            }


            // Validate Password
            if (empty($data['password'])){
                $data['password_err']='please enter your password';
            }elseif(strlen($data['password'])<8){
                $data['password_err']='Password must be at least 8 Character';
            }


              // Validate Confirm Password
              if (empty($data['confirm_password'])){
                $data['confirm_password_err']='please enter your confirm password';
            }else{
                if ($data['password']!=$data['confirm_password']){
                    $data['confirm_password_err']='your password not match';
                }
            }


               // Validate Confirm Phone
                  if (empty($data['phone'])){
                    $data['phone_err']='please enter your phone number';
                }elseif(strlen($data['phone'])!=10){
                    $data['phone_err']='Your phone number must be consist of 10 numbers';

                }


                   // Sure Validated 
            if(empty($data['name_err'])&&empty($data['e-mail_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['phone_err'])){
               
            //Password -> Encrypt (-> Hash using md5 function <-)
            $data['password'] = md5($data['password']);

            //Register  Function 
            if ($this -> userModel -> register($data)){

                flash('register_success','You are registered successfully and can log in know');
                redirect('users/login');

            }else {

                die("hello it\'s wrong");


            }}else{
                $this->view('users/register',$data);
            }
    





        }else{
            // Load form

            $data=[
                'name'=>'',
                'e-mail'=>'',
                'password'=>'',
                'confirm_password'=>'',
                'phone'=>'',
                'gender'=>'',
                'name_err'=>'',
                'e-mail_err'=>'',
                'password_err'=>'',
                'confirm_password_err'=>'',
                'phone_err'=>'',
                'gender_err'=>'',

            ];

            $this->view('users/register',$data);

        } 


 
    }


    public function createUserSession($user){
        $_SESSION['user_id']= $user->id;
        $_SESSION['user_email']= $user->email;
        $_SESSION['user_name']= $user->name;
        $_SESSION['user_state']=$user->state;
        $_SESSION['user_token']=bin2hex(random_bytes(64));
        
        redirect('pages/index');

    }

    public function logout(){
        unset( $_SESSION['user_id']);
        unset( $_SESSION['user_email']);
        unset( $_SESSION['user_name']);
        unset( $_SESSION['user_state']);
        unset( $_SESSION['user_token']);

        session_destroy();
        redirect('pages');



    }
}


