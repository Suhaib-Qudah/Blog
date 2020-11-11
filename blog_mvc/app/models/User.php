 <?php 
 class User{
     private $db;

     public function __construct()
     {
             $this -> db = new Database;
     }
     public function register($data){

        //Registe User
$this -> db->query('INSERT INTO user ( name, email, password, phone, gender) VALUES 
(:name, :email, :password, :phone, :gender)');
        //Bind Data
            $this->db->bind(':name',         $data['name']);
            $this->db->bind(':email',     $data['e-mail']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':phone',       $data['phone']);
            $this->db->bind(':gender',     $data['gender']);
            //Execute Data
            if($this->db->execute()){
                return true ;
            }else{
                return false;
            }

             





     }

     public function login($email,$password){
         //Getting the user. 
         $this->db->query('SELECT * FROM user WHERE email = :email');
         $this->db->bind(':email',$email);
         $row = $this->db->single();

         //Compare between the the passwords 
         $encrypt_password = $row->password;
        $password = md5($password);
         if( $encrypt_password ==  $password){
             return $row;
             echo "true";
         }else{
             echo "else";
             return false;
         }


     }

     public function getUserbyemail($email){
            $this->db->query("SELECT * FROM `user` where `email` = :email");
            $this->db->bind(':email', $email);
            $row = $this->db->single();

            if ($this->db->rowcount()>0){
                return true;
            }else{
                return false;
            }
     }


 }