
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lets Vent Out</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <style> 
input[type=search] {
  color: #88bdbc;
  width: 30%;
  box-sizing: border-box;
  border: 2px solid #112d32;
  /* border-radius: 4px; */
  /* font-size: 16px; */
  background-color: white;
  background-image: url("searchicon.png");
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 40px 12px 40px; 
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;

  outline: none;
  border: none;
  border-radius: 5px;
  /* padding: 0 60px 0 20px; */
  font-size: 18px;
  box-shadow: 0px 1px 5px rgba(0,0,0,0.1);

}

input[type=search]:focus {
  color: #88bdbc;
  width: 80%;
}
.button {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  display: inline-block;
  border-radius: 5px;
  background-color: #112d32;
  border: 2px solid #112d32; 
  color: #88bdbc;;
  text-align: center;
  font-size: 16px;
  padding: 12px 20px 12px 20px;
  width: 15%;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
  color: #fa7b62;
}

.button:hover span {
  color: #fa7b62;
  padding-right: 25px;
}

.button:hover span:after {
  
  color: #fa7b62;
  opacity: 1;
  right: 0;
}

</style>

</head>
<body>
<?php require 'header.php'; ?>
<div class="container main-container">

    <div>
      <form action="asort.php" method="post">
  <button class="button"  type="submit"  
    style= "vertical-align:middle;
    margin-right: 30%;
    float: left;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    padding: 10px;"><span>Ascending </span></button>

    <!-- <form action="dsort.php" method="post"> -->
  <button class="button" formaction="dsort.php" type="submit"  
    style="vertical-align:middle;  
    margin-left: 30%; 
    float: right;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    padding: 10px;"><span>Desending </span></button>

</div>
  
</form>

<div>
<?php
session_start();
require_once('connection.php');


    ?>
<?php
    echo "<table border='2'
    style='border-collapse:collapse;

    margin-top: 50px;
    margin-bottom: 50px;
    

    border-color: #88bdbc;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    padding-top: 30px;
    padding-bottom: 30px;
    text-align: left;
    background-color: #112d32;
    color: #88bdbc;
    '>";  

    echo "<tr style='font-weight: initial;'>";  

    echo "<td width='5%' align='center'>Name</td>";  
    echo "<td width='5%' align='center'>City</td>";  
    echo "<td width='5%' align='center'>Description</td>";  
    echo "<td width='5%' align='center'>Experience</td>";  
    echo "</tr>";


    $sql = "SELECT * FROM carecorner";
    //echo $sql;
    $query = mysqli_query($conn, $sql);
    //echo $query;
    $count = mysqli_num_rows($query);
    
    
    if($count>0)
    {
      while($row = mysqli_fetch_array($query))
      {
       echo '<td width="5%" align=center>' . $row['name'] . '</td>';
       echo '<td width="5%" align=center>' . $row['city'] . '</td>';
       echo '<td width="5%" align=center>' . $row['type'] . '</td>';
       echo '<td width="5%" align=center>' . $row['ex'] . '</td>';
       echo "</tr>";

 

  }
}

?>



</div>
</body>
</html>