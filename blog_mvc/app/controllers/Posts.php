<?php

class Posts extends Controller{
   public function __construct()
   {
  
       $this->postModel= $this->model('Post');
   } 

   public function index(){
       //Get Posts 
       $posts = $this->postModel->getPosts();

       $data=[
           'posts'=>$posts ,

       ];
      $this-> view('/posts/index',$data);
   }

   public function add(){

       $tags = $this->postModel->getAllTags();

    //Get Posts 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize the data
    $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data=[
            'tags'=>$tags,
            'title'=> trim($_POST['title']),
            'body'=>trim($_POST['body']),
            'tags_chosen'=>$_POST['tags'],
            'user_id'=>$_SESSION['user_id'],
            'title_err'=>'',
            'body_err'=>''
        ];
//            echo $data['tags'][0];
        //Validate title
        if(empty($data['title'])){
            $data['title_err']= 'Sorry, the title can\'t be empty';
        }elseif(strlen($_POST['title'])<=10){
            $data['title_err']= 'You title have to be more than 10 charachters'; 

        }

        // Validate the body
        if(empty($data['body'])){
            $data['body_err']= 'Sorry, the body can\'t be empty'; 
        }elseif(strlen($_POST['body'])<=150){
            $data['body_err']= 'Your post have to be more than 150 letters'; 

        }
       
       if(empty($data['body_err']) && empty($data['title_err'])){
        if($this->postModel->addPost($data)){

            flash('Posted_successfully','Your post is live now');
            redirect('pages');
        }else{
            $this-> view('/posts/add',$data);}
       }else{
        $this-> view('/posts/add',$data);
    }

    }else{
    $data=[
        'tags'=>$tags,
        'title'=> '',
        'body'=>'',
        'title_err'=>'',
        'body_err'=>''
    ];
   $this-> view('/posts/add',$data);
}
}



//Tag
      public function tag(){


    //Get Posts 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Sanitize the data
    $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data=[
        'title'=> trim($_POST['title']),
        'description'=>trim($_POST['description']),
        'title_err'=>'',
        'description_err'=>''
        ];


    //Validate the title 
    if(empty($data['title'])){
        $data['title_err']='Tag title can\'t be empty';
    }elseif ($this->postModel->getTag($data['title'])){
        $data['title_err']='This tag is already created';
    }
    //Validate the description 
    if(empty($data['description'])){
        $data['description_err']='Description can\'t be empty';
    }

    if(empty($data['title_err'])&&empty($data['description_err'])){
        if($this->postModel->addTag($data['title'],$data['description'])){
            flash("tag_accepted",'You tag has been added successfully to our database');

            $this-> view('/posts/tag',$data);

        }else{
            $this-> view('/posts/tag',$data);

        }

    }else{
        $this-> view('/posts/tag',$data);

    }

    }else{
    $data=[
        'title'=> '',
        'description'=>'',
        'title_err'=>'',
        'description_err'=>''
    ];
   $this-> view('/posts/tag',$data);
}
}
   
}