<!DOCTYPE html>
<html>
  <head>
    <title>Sign up</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
  <?php
  $message="";
  $message2="";
  $message3="";
if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    echo "Connection Failes";
}
else{
    echo "";
}

$name = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password=$_REQUEST['password'];
$validname ='';
$validemail='';
$validpassword='';
if(empty($name)){
  $message="Please Enter your name";
}
else{
  if(!preg_match("/^[a-zA-Z]*$/",$name))
  {
    $message ="Invalid Username";
    
  }
  else{
    $validname=$name;
  }
}
if(empty($email)){
  $message2="Please Enter your email";
}
else{
  if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})*$/",$email))
  {
    $message2 ="Invalid Email Address";
    
  }
  else{
    $validemail=$email;
  }
}

if(empty($password)){
  $message3="Please Enter your password";
}
else{
  if(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$password))
  {
    $message3 ="Invalid Password";
    
  }
  else{
    $validpassword=$password;
  }
}
if($validname!=''&& $validemail!='' && $validpassword!=''){
  $sql = "INSERT INTO user values ('','$validname','$validemail','$validpassword')" ;
if ($connection->query($sql) === TRUE) 
{
header('Location: login.html');
} 
else {
    header('Location: signup.html');
}



}

}
?>
    <div class="header">
    
      <ul>
            <li id="logo" ><a href="#" id="myblog"><b>MyBlog</b></a></li>
            <li ><a href="https://www.google.com">Home</a></li>
            <li ><a href="#">Blogs</a></li>
            <li ><a href="#">About</a></li>
            <li ><a href="#">Contact</a></li>
            <li ><a href="login.html">Login</a></li>
            <li ><a href="signup.html">Sign up</a></li>
        </ul>
       <br>
       <br>

       
     
    <center>
      <table>
        <form action="signup2.php" method="POST">
          <tr>
            <td>
              <label><b>Name</b></label>
            </td>
            <td>
              <input type="text" placeholder="Contains only letters" name="username" />
              <small style="color:red;"><?php echo $message?></small>
            </td>
          </tr>
          <tr>
            <td>
              <label><b>Email</b></label>
              
            </td>
            <td>
              <input
                type="email"
                placeholder="xyz@gmail.com"
                name="email"
              />
              <small style="color:red;"><?php echo $message2?></small>
              
            </td>
          </tr>
          <tr>
            <td>
              <label><b>Password</b></label>
            </td>
            <td>
              <input
                type="password"
                placeholder="Enter your password"
                name="password"
              />
              <small style="color:red;"><?php echo $message3?></small>
              
            </td>
          </tr>
          <tr class="row">
            <td></td>
            <td class="ins">
              <ul >
                <li>Password should be minimum of 8 characters</li><br>
                <li>Contains one uppercase letter,one lowercase letter and one digit</li>
              </ul>
            </td>
          <tr>
            <td><input type="submit" value="Signup" /></td>
          </tr>
        </form>
      </table>
    </center>
    
    <div class="footer">
      <p>Footer</p>
    </div>
  </body>
</html>
