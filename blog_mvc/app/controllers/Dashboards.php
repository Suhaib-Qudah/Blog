<?php

class   Dashboards extends Controller{
   public function __construct()
   {
    $this-> dashModel =  $this->model('Dashboard');
         if($_SESSION['user_state']!='admin'){
           redirect('posts/index');
        }
} 


   public function dashboard(){

    $users = $this->dashModel->getAllUsers();

    if($users){
//Users found 
$data= $users;

$this->view('/dashboards/dashboard',$data);

    }
    
}

public function post(){

    $posts = $this->dashModel->getAllPosts();

    if($posts){
//Users found 
$data= ['posts'=>$posts];

$this->view('/dashboards/post',$data);

    }
    
}

    

   public function Admin($id){

if($this->dashModel->makeAdmin($id)){


    $users = $this->dashModel->getAllUsers();

    $data=$users;


    $this->view('/dashboards/dashboard',$data);


}}



   
}