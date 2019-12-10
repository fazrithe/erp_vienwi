 <?php
 session_start();
require("_db.php");
$error='';

if(isset($_GET['login_attempt']))
  
{
   
    $sql_check = "SELECT username, 
                         level, 
                         id_users 
                  FROM users 
                  WHERE 
                       username=? 
                       AND 
                       password=? 
                  LIMIT 1";
    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);
    $username = $_POST['username'];
    $password = md5( $_POST['password'] );
    $check_log->execute();
    $check_log->store_result();
    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($username, $level, $id_users);
        while ( $check_log->fetch() ) {
            $_SESSION['level'] = $level;
            $_SESSION['sess_id']    = $id_users;
            $_SESSION['username']   = $username;
            
        }
        $check_log->close();
        header('location:'.$level);
        exit();
    } else {
        header('location: index.php?error='.base64_encode('Username dan Password Invalid!!!'));
        exit();
    }
   
} else {
    header('location:login.php');
    exit();
}
      ?>