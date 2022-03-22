<?php
session_start();
require_once('connection.php');

// Retrieving Categories
  $sql = "SELECT * from  Categories";
  $result_categories = mysqli_query($conn, $sql);
?>
<?php require 'header.php'; ?>
<div class="container main-container">
<div id = "cat" class="row">
<div class="col-md-3">
     <ul class="nav nav-pills nav-stacked">
        <li><h3 class = "heading">Categories</h3></li>
        <?php
        while ($row = mysqli_fetch_array($result_categories)) {
          $id = $row['id'];
          $name = $row['name'];
          echo "<li><a  href='videos.php?c_id=$id&c_name=$name'>".$row['name']."</a></li>";
        }
        // set the pointer back to the beginning
        mysqli_data_seek($result_categories, 0);
         ?>
     </ul>
</div>
<div class="col-md-9 main_content">
    <li><h3 class = "heading">Anxiety</h3></li>
    <iframe style="border:5px solid #112d32; margin: 10%; margin-top: 5%;" width="640" height="360" src="https://www.youtube.com/embed/Du2l-wkfaVw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe style="border:5px solid #112d32; margin: 10%; margin-top: 5%;" width="640" height="360" src="https://www.youtube.com/embed/IiSQQ5XV__w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <iframe style="border:5px solid #112d32; margin: 10%; margin-top: 5%;" width="640" height="360" src="https://www.youtube.com/embed/WWloIAQpMcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

</div>
</div>
</div>
<?php  require 'footer.php'; ?>
