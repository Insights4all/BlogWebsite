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
  <?php session_start();
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "blog";
   
   $connection = mysqli_connect($servername, $username, $password, $dbname);
   
   if ($connection->connect_error) {
     die("Connection failed: " . $connection->connect_error);
   }
   else{
   $sql = "SELECT * FROM addblog LIMIT 5";
   $res =  $connection->query($sql) or die($connection->error);
   
 }
 
  
  ?>

      <ul class="nav bg-primary">
        <li class="nav-item"><a class="nav-link text-white" href="Homeboot.php">MyBlog</a></li>
        <li class="nav-item"><a class="nav-link text-white"  href="Homeboot.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#">Blogs</a></li>
        <li class="nav-item"><a class="nav-link text-white"  href="#">About</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="#">Contact</a></li>
        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
          
          { ?>


      
            <li class="nav-item"><a class="nav-link text-white" href="logout.php">Logout</a></li>    
          
            <?php } else{ ?>

              <li class="nav-item"><a class="nav-link text-white" href="login.php">Login</a></li>    
          
            <?php } ?>
      
        
        <li class="nav-item"><a  class="nav-link text-white"href="signup.php">Sign up</a></li>
    </ul>
    <div class="container-fluid border p-5 bg-primary">
      <h1 class="text-center text-white">Read,Write and Share your Ideas</h1>
      <center><button class="btn btn-light mt-3">Register</button></center>
    </div>
    <div>
      <h3 class="ml-4 mt-4 text-center">Trending Blogs</h3>
      <hr class="w-75">

      <div class="row ml-5 mr-5">

      <?php while($row=$res->fetch_assoc()){ ?>
        
        <div class="col border p-1 ml-3" id="eachblog">
        <?php
              echo '<img id="blogimage" src="'.$row['image'].'"/>';



           ?>
        
          <h4><a href="#" class="small text-dark"><?php echo $row['blogtitle']?></a></h4>
          <p >
            <small class="">Safiya naaz &nbsp;&nbsp;&nbsp; </small>

            <small class="">May 30</small>
          </p>
          <a class="" href="#">Read More</a>

        
        
        </div>
        <?php }?>
       
          </div>


     
    </div>
  


  </body>
</html>
