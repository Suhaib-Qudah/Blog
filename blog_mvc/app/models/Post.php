<?php 

 class Post{
     private $db;

    public function __construct()
     {
             $this->db = new Database;
     } 

     public function getPosts(){
         $this->db->query("SELECT * FROM articles");
         $results = $this->db->resultSet();
         return $results;
     }

     public function getTag($title){
        $this->db->query("SELECT * FROM `tags` where `title` = :title ");
        $this->db->bind(':title',$title);
        $row = $this->db->single();
        if ($this->db->rowCount()>=1){
            return true;
        }else{
            return false;
        }
    }


     public function addPost($data){
         $this->db->query('INSERT INTO `articles`( `title`, `body`,  `author` ) VALUES (:title, :body, :author )');
         $this->db->bind(':title',$data['title']);
         $this->db->bind(':body',$data['body']);
         $this->db->bind(':author',$data['user_id']);



         if($this->db->execute()){
            if(!empty($data['tags'])){
                $this->db->query('SELECT `id`, `title`, `body`, `image`, `author`, `date`, `is_deleted` From `articles` where title = :title ');
                $this->db->bind(':title',$data['title']);
                $post = $this->db->single();
                for($i=0;$i<count($data['tags_chosen']);$i++){
                   $sts= $this->db->query('INSERT INTO `tags_to_article`(`article_id`, `tag_id`) VALUES (:article_id,:tag_id)');
                    $this->db->bind(':article_id',$post->id);
                    $this->db->bind(':tag_id',$data['tags_chosen'][$i]);

                    $this->db->execute();
                }

                return true;
            }else{
                return true;
            }
         }else{
             return false;
         }

     }


     public function addTag($tagName, $tagDescription){
        $this->db->query('INSERT INTO `tags`( `title`, `description`) VALUES (:title,:description)');
        $this->db->bind(':title',$tagName);
         $this->db->bind(':description',$tagDescription);

         if ($this->db->execute()){
             return true;
         }else{
             return false;
         }

     }

     public function getAllTags(){
        $this->db->query('SELECT * From `tags`');
        $tags = $this->db->resultSet();
        return $tags;
     }

     public function getPost($id){

         $this->db->query('SELECT `id`, `title`, `body`, `image`, `author`, `date`, `is_deleted` From `articles` where id = :id ');
         $this->db->bind(':id',$id);

         $post = $this->db->single();
         return $post;
     }


     public function getAuhtor($id){
         $this->db->query('SELECT `name` From `user` where id = :id ');
         $this->db->bind(':id',$id);

         $user = $this->db->single();
         return $user; }

     public function getTags($id){

         $this->db->query('SELECT tags.title, tags.id FROM `tags_to_article` INNER JOIN `tags` WHERE article_id = 19');
         $this->db->bind(':id',$id);
         return $tags=$this->db->resultSet();
     }

}