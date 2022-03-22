<?php
session_start();
require_once('connection.php');

// Retrieving Categories
  $sql = "SELECT * from Categories";
  $result_categories = mysqli_query($conn, $sql);

// Retrieving questions
    $sql = "SELECT * from videos";
    $result_vid = mysqli_query($conn, $sql);
    

    if(isset($_GET['c_id']) && isset($_GET['c_name'])){
      $id = $_GET['c_id'];
      $sql = "SELECT * from videogallery where id='$id'";
      $result_vid = mysqli_query($conn, $sql);
      
    }
?>
<?php include 'header.php'; ?>
<div class="container main-container">
  <div id = "cat" class="row">
    <div class="col-md-3">
     <ul class="nav nav-pills nav-stacked">
        <li><h3 class = "heading">Categories</h3></li>
        <?php
        while ($row = mysqli_fetch_array($result_categories)) {
          $id = $row['id'];
          $name = $row['name'];
          echo "<li><a href='videos.php?c_id=$id&c_name=$name'>".$row['name']."</a></li>";
          

        }
        // set the pointer back to the beginning
        mysqli_data_seek($result_categories, 0);
         ?>
     </ul>
    </div>
    <div class="col-md-9 main_content">
    <li><h3 class = "heading"><?php echo $_GET['c_name']; ?></h3></li>
      
        <?php while ($row = mysqli_fetch_assoc($result_vid)) 
        {
            $id = $row['id'];
            $vid1 = $row["vid1"];
            $vid2 = $row["vid2"];
            $vid3 = $row["vid3"];
          }
       ?>


    <iframe style="border:5px solid #112d32; margin: 10%; margin-top: 5%;" width="640" height="360" src="<?php echo $vid1;?>"  title="<?php echo $name;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br>
    <iframe style="border:5px solid #112d32; margin: 10%; margin-top: 5%;" width="640" height="360" src="<?php echo $vid2;?>" title="<?php echo $name;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br>
    <iframe style="border:5px solid #112d32; margin: 10%; margin-top: 5%;" width="640" height="360" src="<?php echo $vid3;?>" title="<?php echo $name;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br>

    </div>
  </div>
</div>
<?php  require 'footer.php'; ?>
