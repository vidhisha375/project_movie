<?php
class USER
{
    private $db;

    function __construct($DB_con)
    {
      $this->db = $DB_con;
    }
 
    public function register($fname,$lname,$uname,$umail,$upass)
    {
       try
       {
           $new_password = password_hash($upass, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO users(user_name,user_email,user_pass) 
                                                       VALUES(:uname, :umail, :upass)");
              
           $stmt->bindparam(":uname", $uname);
           $stmt->bindparam(":umail", $umail);
           $stmt->bindparam(":upass", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
         }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['user_pass']))
             {
                $role_id = $userRow['r_id'];        
                $_SESSION['user_session'] = $userRow['user_id'];
                  echo $role_id . "\n";
                  echo $_SESSION['user_session'] . "\n";
                
                /*echo $role_id;*/
                $_SESSION['role']=$role_id;
                return true;
             
          }
           
           
          // $sql=$this->db->prepare("SELECT * FROM roles WHERE r_id=:r_id");
          // $sql->execute(array(':r_id'=> $role_id));
          // $row=$sql->fetch(PDO::FETCH_ASSOC);
          // echo $row['role'] . "\n";
          
          // echo $_SESSION['role'] . "\n";

         /* if($sql->rowCount() == 1)
          {
                if ($row['role']=="admin")
                { header ("location: actor_table.php"); }
                
                else if ($row['role']=="user")
                { $_SESSION['role']=$row['role'];
                        header ("location: home.php"); }
          }
          else 
          {$error="Your Login Name or Password is invalid";}*/
       }}
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>


