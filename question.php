<?php
session_start();
require_once('connection.php');


// Retrieving Categories
  $sql = "select * from Categories";
  $result_categories = mysqli_query($conn, $sql);

// Retrieving questions
    $id = $_GET['q_id'];
    $sql = "select * from questions where id='$id'";
    $result_questions = mysqli_query($conn, $sql);

// post answer
    if(isset($_POST['answer']) && isset($_GET['q_id'])){
      $question_id = $_GET['q_id'];
      $username= $_SESSION['user_name'];
      $answer = $_POST['answer'];

      $sql = "INSERT INTO answers (question_id, username, answer) values ('$question_id','$username','$answer')";
      mysqli_query($conn, $sql);
    }
?>
<?php include 'header.php'; ?>
<div class="container main-container">
  <div id = "cat" class="row">
    <div class="col-md-3">
     <ul class="nav nav-pills nav-stacked">
        <li><h3 class="heading">Categories</h3></li>
        <?php
        while ($row = mysqli_fetch_array($result_categories)) {
          $id = $row['id'];
          $name = $row['name'];
          echo "<li><a href='questions.php?c_id=$id&c_name=$name'>".$row['name']."</a></li>";
        }
         ?>
     </ul>
    </div>
    <div class="col-md-9 main_content">

        <?php while ($row = mysqli_fetch_array($result_questions)) {
            $id = $row['id'];
            $user_id = $row['user_id'];
            $category_id = $row['category_id'];
            $title = $row['title'];
            $body = $row['body'];
            $meta = $row['created_at'];
            $sq = "select * from register where id = $user_id";
            $result_username = mysqli_query($conn, $sq);
            $row1 = mysqli_fetch_array($result_username);
            $username = $row1['full_name'];
       ?>
       <h2 class="question_title"> <?php echo $title; ?> </h2>
       <p class="question_meta"><strong><?php echo $username; ?></strong><strong> Posted On: </strong><?php echo $meta; ?></p>
       <p class="question_body"><?php echo $body; ?></p>
       <?php if(isset($_SESSION['user_loggedin'])){ ?>
       <?php if($_SESSION['user_id'] == $user_id ) { ?>
         <a href="edit.php?q_id=<?php echo $id; ?>" class="btn btn-default"> Edit </a>
         <a href="delete.php?q_id=<?php echo $id; ?>" class="btn btn-danger"> Delete </a>
      <?php }?> <hr>
      <?php }?>
       <?php } ?>

       <?php
       // check user login
       if(isset($_SESSION['user_loggedin'])){ ?>
         <form action="question.php?q_id=<?php echo $_GET['q_id']; ?>" method="post">
            <textarea name="answer" rows="5" class="form-control" placeholder="Write your Answer"></textarea> <br>
            <input type="submit" value="Post Your Answer" class="btn btn-primary">
         </form>
       <?php } ?>

        <h3>Answers</h3> <hr>
        <?php
         $question_id = $_GET['q_id'];
          $sql = "SELECT * from answers where question_id='$question_id' order by id DESC";
          $x = mysqli_query($conn, $sql);
          if( mysqli_num_rows($x)==0){
            echo "No Answers to display";
          }
          while ($row = mysqli_fetch_array($x)) {
            echo "<div class='alert alert-info'>";
            echo "<strong>". $row['username'] ."</strong> says <br>" .$row['answer'];
            echo "</div>";
          }
         ?>
    </div>
  </div>
</div>
<?php  require 'footer.php'; ?>
