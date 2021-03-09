<?php  
	include "../../resources/php/connection.php";
	// Fetching Number of Columns Affected
	session_start();
	$classId = $_SESSION['class_id'];
	$query_num_columns = mysqli_query($con, "SELECT count(*) FROM information_schema.columns WHERE table_name ='exam_result';");
	$fetch_num_columns = mysqli_fetch_array($query_num_columns);
	$col_count = $fetch_num_columns[0] - 5; 

	$sql = "SELECT * FROM `exam_result` WHERE `class_id` = '$classId' ORDER BY `stu_rollNo`"; 
	$setRec_query = mysqli_query($con, $sql);  
	$setRec = mysqli_fetch_all($setRec_query);
	// print_r($setRec);
	$l_rollno = $setRec[0][1];
	$u_rollno = mysqli_num_rows($setRec_query);
	$studentRec = mysqli_query($con,"SELECT `stu_rollNo`, `stu_name` FROM `student_cred` WHERE `stu_rollNo` IN('$l_rollno','$u_rollno')  ORDER BY `stu_rollNo`");
	$stuRec =  mysqli_fetch_all($studentRec);
	for($i = 0; $i < mysqli_num_rows($setRec_query); $i++){
		$sum = 0;
		for($j = 5; $j < $fetch_num_columns[0]; $j++){
			$sum += $setRec[$i][$j];
		}
		$total[$i] = $sum;
	}		
	for($i = 0; $i < mysqli_num_rows($studentRec); $i++){
		$stu_roll[$i] = $stuRec[$i][0];
		$stu_name[$i] = $stuRec[$i][1];
	}

	$columnHeader = '';  
	$columnHeader = "Enroll No" . "\t" . "Name" . "\t" . "Marks" . "\t";  
	$setData = '';  
	for($k =0; $k < count($stu_roll); $k++){  
		$rowData = $stu_roll[$k]."\t".$stu_name[$k]."\t".$total[$k];
		$setData .= trim($rowData) . "\n";  
	}  
	header("Content-type: application/octet-stream");  
	header("Content-Disposition: attachment; filename=".explode("-",$classId)[0]." Result.xls");  
	header("Pragma: no-cache");  
	header("Expires: 0");  

	echo ucwords($columnHeader) . "\n" . $setData . "\n";  
?> 
 