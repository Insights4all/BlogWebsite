<!DOCTYPE html>
<html>
  <head></head>
    <title>All Blogs</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/blog.css">
  </head>
  <body>
  <?php session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "blog";
  $count = 5;
  
  
  $connection = mysqli_connect($servername, $username, $password, $dbname);
  
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }
  else{
  $sql = "SELECT * FROM addblog";
  $res =  $connection->query($sql) or die($connection->error);
  $data=mysqli_num_rows($res);
  
  
}

  
  
?>
    <div class="header">
    
    <ul>
          <li id="logo"><a href="#" id="myblog"><b>MyBlog</b></a></li>
          <li><a href="https://www.google.com">Home</a></li>
          <li><a href="#">Blogs</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
          
          { ?>


      
            <li><a href="logout.php">Logout</a></li>
          
            <?php } else{ ?>

            <li><a href="login.php">Login</a></li>
           
            <?php } ?>
          
          <li><a href="signup2.php">Sign up</a></li>
      </ul>
     <br>
     <br>
      </div>
    
      <div>
        <h3 class="trendblog">All Blogs</h3>
        <hr class="hr">

        <?php


        for ($x = 1; $x <= ceil($data/5); $x++) {  #3 rows

        ?>
         <div class="trendingblogscontainer">

        <?php 
        

        for ($m = 1; $m <= $count; $m++) {   #5
        

        $row=$res->fetch_assoc() 
        
        ?>

          

          <div class="eachblog">
          <?php
              echo '<img class="blogimage" src="'.$row['image'].'"/>';



           ?>
            <h4 class="blogtitle2">
            <a href="#" class="blogtitle">
            <?php echo $row['blogtitle']?>
            </a></h4>
            <p >
              <span class="authorname">Safiya naaz </span>

              <small class="authorname">May 30</small>
            </p>
            <a class="readmore" href="#">Read More</a>
        
          </div>
          <?php }
          $count = $data -$count;   
          if ($count > 5) {
              $count = 5;
          }
          ?>

          
          
          
        </div>
        <?php } ?>

          

      </div>
    
    
    
    
    
    
      <div class="footer">
        <p>Footer</p>
      </div>


  </body>
</html>
