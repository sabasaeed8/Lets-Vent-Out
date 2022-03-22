<?php
session_start();
require_once('connection.php');


 $user_id = $_SESSION['user_id'];
 $sql = "SELECT * from questions where user_id='$user_id'";
 $result = mysqli_query($conn, $sql);
?>

<?php require 'header.php'; ?>
<div class="container main-container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2">
      <h2>Your Questions</h2> <hr> 
      <ul class="list-group">
        <?php
           while ($row = mysqli_fetch_array($result) ) {
             $id = $row['id'];
             ?>
              <li class="list-group-item"><h4><a class ="title" href="question.php?q_id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?> </a></h4>
                <a href="edit.php?q_id=<?php echo $id; ?>" class="btn btn-default"> Edit </a>
                <a href="delete.php?q_id=<?php echo $id; ?>" class="btn btn-danger"> Delete </a>
              </li>
        <?php } ?>
  </ul>
  </div>
  </div>
</div>
<?php require 'footer.php'; ?>
