<?php

class Pages extends Controller{
    public function __construct()
    {
        $this-> userModel = $this->model('User');
        $this-> postModel = $this->model('Post');
    }

    public function index(){

        $posts= $this->postModel->getPosts();

        $data =[
            'posts'=>$posts
        ];
        $this->view('pages/index',$data);
    }

    public function about(){
        $this->view('pages/about');
    }

    public function show($id){
        $post=$this->postModel->getPost($id);
        $user= $this->postModel-> getAuhtor($post->author);
        $tags =$this->postModel-> getTags($post->id);
        echo $user->name;
        $data=['post'=>$post,
            'author'=>$user->name,
        'tags'=>$tags];
        $this->view('pages/show',$data);
    }
}