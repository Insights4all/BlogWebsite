<!DOCTYPE html>
<head>
    <title>Write</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="write.css">
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
    echo "Connection Failed";
}
else{
    echo "";
}

$title = $_POST['title'];
$pic = $_POST['pic'];
$content=$_POST['content'];


$validtitle ='';
$validpic='';
$validcontent='';

if(empty($title)){
  echo $title;
  $message="Please Enter your Title";
}
else{
  $validtitle=$title;
}

if(empty($pic)){
  $message2="Please add an image";
}

  else{
    $validpic=$pic;
  }


if(empty($content)){
  $message3="Please fill in content in the text area provided";
}
  else{
    $validcontent=$content;
  }

if($validtitle!='' && $validpic!='' && $validcontent!='')
{
  $sql = "INSERT INTO addblog values ('','$validtitle','$validpic','$validcontent')" ;
if ($connection->query($sql) === TRUE) 
{
header('Location: login.php');
} 
else {
    header('Location: signup.php');
}



}
  }
  
?>
   <ul class="navbar">
       
       <li><a href="signup.php">Sign Up</a></li>
       <li><a href="login.html">Login</a></li>
       <li><a href="#">About</a></li>
       <li><a href="write.php">Write</a></li>
       <li><a href="">Membership</a></li>
       <li><a href="#">Our story</a></li>
     </ul>

     

    <center>
    <h1>Add Blog</h1>
    <form action="write.php" method="POST" enctype="multipart/form-data">
        
        <table>
                    <tr>
                    <td><label>Title</label></td>
                    <td><input type= "text" name="title"> </td>
                    <td><?php echo $message ?></td>
                    
                    
                    
                    

                </tr>
                
                <tr>
                    <td><label>Add Image link</label></td>
                    <td><input type= "text"  name="pic"></td>
                    <td><?php echo $message2 ?></td>
                </tr>
                <tr>
                    <td><label>Content</label></td>
                    <td><textarea  name="content" rows="10" cols="50"></textarea></td>
                    <td><?php echo $message3 ?></td>
                 </tr>
                <tr>
                    <td><input type="submit" value="Add Blog" class="blogsubmit" /></td>
                  </tr>
        </table>
        </form>
       
    </center>
</body>

</html>