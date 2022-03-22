
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

</style>

</head>
<body>
<?php require 'header.php'; ?>
<div class="container main-container">
    <form action="asort.php" method="post">
    <div style=' text-align: center;     color: #112d32;
    
    font-size: 25px;
    font-weight: bold;'>

    <p>Ascending Sort</p>
</div>

</div>
  
</form>

<div>
<?php
session_start();
require_once('connection.php');
$data = array();

$query = mysqli_query($conn,"SELECT ex FROM carecorner") or die ("somethinng went wrong");
    $count = mysqli_num_rows($query);

    if(mysqli_num_rows($query)>0)
    {
        while($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
        }
    }

    ?>
    <?php
function merge_sort($my_array){
	if(count($my_array) == 1 ) return $my_array;
	$mid = count($my_array) / 2;
    $left = array_slice($my_array, 0, $mid);
    $right = array_slice($my_array, $mid);
	$left = merge_sort($left);
	$right = merge_sort($right);
	return merge($left, $right);
}
function merge($left, $right){
	$res = array();
	while (count($left) > 0 && count($right) > 0){
		if($left[0] > $right[0]){
			$res[] = $right[0];
			$right = array_slice($right , 1);
		}else{
			$res[] = $left[0];
			$left = array_slice($left, 1);
		}
	}
	while (count($left) > 0){
		$res[] = $left[0];
		$left = array_slice($left, 1);
	}
	while (count($right) > 0){
		$res[] = $right[0];
		$right = array_slice($right, 1);
	}
	return $res;
}

// echo "<pre>";
// print_r($data);
// echo "</pre>";

// echo "<pre>";
// print_r(merge_sort($data));
// echo "</pre>";

?>

<?php
    echo "<table border='2'
    style='border-collapse:collapse;

    margin-top: 50px;
    margin-bottom: 50px;
    margin-right: 5%;
    margin-left: 5%;

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

    
//echo "<pre>";
$arr = array();
$arr = merge_sort($data);

//print_r($arr);
//echo "</pre>";

//echo gettype($arr);
//echo gettype($arr[0]);

foreach($arr as $product){
  foreach($product as $key => $val){
      //echo "$val";

    $sql = "SELECT * FROM carecorner WHERE ex = $val";
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

  }
}

?>



</div>
</body>
</html>