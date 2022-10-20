
<?php
// conn
require_once("conn.php");

// getting ip before redirecting in index page
define("IP", "202.47.50.73");
if(IP == "202.47.50.73") {

}
else{
	
}

if(isset($_GET['id'])){
	$flag = 1;
	// date('d-m-y h:i:s');
	$id = $_GET['id'];
	date_default_timezone_set('Asia/karachi');
	$date = date('d-m-y');
    $time = date('h:i:s');
	$sql = "insert into tbl_attendance(emp_id,date,time,status) values ('$id','$date','$time','$flag')";
	mysqli_query($conn, $sql);
	$sql = "select status from tbl_attendance where emp_id='$id'";
	$res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($res);
	echo $row['status'];

}
else{
    $flag = 0;
	$date = date('d-m-y');
    $time = date('h:i:s');
	$sql = "insert into tbl_attendance(date,time,status) values ('$date','$time','$flag')";
}




$sql = "select * from tbl_employe";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res)>0){
while($row=mysqli_fetch_array($res)){
	echo "<br>";
	$id = $row['id'];
	echo $row['id']; 
	echo $row['name'];
	$sql1 = "select status from tbl_attendance where emp_id='$id'";
	$res1 = mysqli_query($conn,$sql1);
	// $row1 = mysqli_fetch_array($res1);
	echo $row1['status'];
	if(mysqli_num_rows($res1)>0){
	if($row1['status']==1){
		
	}
}
else{
	?>
	<form method="post" action="index.php"> 
	<a href="index.php?id=<?php echo $row['id'];?>">Present</a>
	</form>	
	<?php
}
	?>
<?php	
}
}
else{
	echo "Sorry No Record Found";
}

?>