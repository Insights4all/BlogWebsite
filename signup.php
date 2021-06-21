<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    echo "Connection Failes";
}
else{
    echo "Connection successfull";
}

$name = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password=$_REQUEST['password'];
 
$sql = "INSERT INTO user values ('','$name','$email','$password')" ;
$data = False;
if ($name!='' || $email != '' || $password !='')
{
    $data = True;
    if ($connection->query($sql) === TRUE) 
    {
    header('Location: login.html');
    } 
    else {
        header('Location: signup.html');
    }
  
}
else{
        echo"<script type='text/javascript'>alert('Please Fill complete details')</script>";
        echo"<script type='text/javascript'>window.location = 'signup.html'</script>";
        


}
  $connection->close();
?>

</body>
</html>