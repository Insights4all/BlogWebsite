<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
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
      header('Location: index.php');
    }
    else{
      $message="Invalid Credentials or Signup ";
      
    }
     
  }
  
 
    
}  
    
    
    ?>
    <div class="header">
      <ul>
        <li id="logo">
          <a href="#" id="myblog"><b>MyBlog</b></a>
        </li>
        <li><a href="https://www.google.com">Home</a></li>
        <li><a href="#">Blogs</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="signup2.php">Sign up</a></li>
      </ul>
    </div>
    <center>
      <div class="loginform">
        <h1>Login</h1>

        <form action="login.php" method="post">
          <table>
            <tr>
              <td><label>Email</label></td>
              <td>
                <input type="email" placeholder="Enter your email" value="" name="loginemail" />
              </td>
            </tr>
            <tr>
              <td><label>Password</label></td>

              <td>
                <input type="password" placeholder="Enter Password" name="loginpassword" />
              </td>
            </tr>
            <tr>
                    <td><input type="submit" value="Login" /></td>
                  </tr>
                  <tr>
                    <td style="color:red"><?php echo $message ?></td>
                  </tr>
          </table>
        </form>
      </div>
    </center>

    <div class="footer">
      <p>Footer</p>
    </div>
  </body>
</html>
