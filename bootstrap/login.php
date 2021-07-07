<!DOCTYPE html>
<html>
  <head></head>
    <title>MyBlog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="bootstyles.css">
  </head>
  <body>
  <?php
    
    $message =" ";
    session_start();
    $_SESSION['logged_in'] = false;
  
    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";
    
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    
    if ($connection->connect_error) {
        echo "Connection Failed";
    }
    else
    {
      $email = $_POST['loginemail'];
      $password = $_POST['loginpassword'];
      #echo $email;
      #echo $password;
      $sql = "Select * FROM user WHERE useremail='$email' AND password='".$password."' ";
  
      $result =$connection->query($sql) or die($connection->error);
      $row=mysqli_num_rows($result);
      if ($row == 1){
        $_SESSION['logged_in'] = true;
        header('Location: Homeboot.php');
      }
      else{
        $message="Invalid Credentials or Signup ";
        
      }
       
    }
    
   
      
  }  
      
      
      ?>

      <ul class="nav bg-primary">
        <li class="nav-item"><a class="nav-link text-white" href="Homeboot.php">MyBlog</a></li>
        <li class="nav-item"><a class="nav-link text-white"  href="Homeboot.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#">Blogs</a></li>
        <li class="nav-item"><a class="nav-link text-white"  href="#">About</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="login.php">Login</a></li>
        <li class="nav-item"><a  class="nav-link text-white"href="signup.php">Sign up</a></li>
    </ul>

<div class="container border border-primary p-4 w-50" id="logincontainer">
    <form class="w-75" action="login.php" method="post">
        <h3>Login</h3>
        <table >
            <tr>
                <td><label class="mt-3">Email</label></td>
                <td><input class="form-control w-70 h-25 ml-5 mt-3" type="email" name="loginemail"/></td>
                </tr>
            <tr>
            <td><label class="mt-3">Password</label></td>
            <td><input class="form-control w-70 h-25 ml-5 mt-3" type="password" name="loginpassword"/></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-primary mt-3"  value="Login"/>

                </td>
            </tr>
            <tr>
                    <td style="color:red"><?php echo $message ?></td>
            </tr>
        </table>    

    </form>
</div>

</body>