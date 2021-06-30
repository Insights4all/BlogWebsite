<!DOCTYPE html>
<html>
  <head></head>
    <title>MyBlog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/styles.css">
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
  $sql = "SELECT * FROM addblog LIMIT 4";
  $res =  $connection->query($sql) or die($connection->error);
  

  
  
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
     <h1>Read,Write and Share your Ideas</h1>

     <a type="button" href="#"  class="registerbutton">Register</a>
      </div>
    
      <div>
        <h3 class="trendblog">Trending Blogs</h3>
        <hr class="hr">

        <div class="trendingblogscontainer">

        <?php while($row=$res->fetch_assoc()){ ?>
          

          <div class="eachblog">
          <?php
              echo '<img class="blogimage" src="'.$row['image'].'"/>';



           ?>
            <h4 class="blogtitle2"><a href="#" class="blogtitle"><?php echo $row['blogtitle']?></a></h4>
            <p >
              <span class="authorname">Safiya naaz </span>

              <small class="authorname">May 30</small>
            </p>
            <a class="readmore" href="#">Read More</a>

          </div>
          <?php }?>
          

        </div>

      </div>
    
    
    
    
    
    
      <div class="footer">
        <p>Footer</p>
      </div>


  </body>
</html>
