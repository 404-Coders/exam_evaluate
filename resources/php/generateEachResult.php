<?php  
	include "../../resources/php/connection.php";
	// Fetching Number of Columns Affected
	session_start();
	// $classId = $_SESSION['class_id'];
    $stu_rollNo = $_SESSION["rollNo"];
	$query_num_columns = mysqli_query($con, "SELECT count(*) FROM information_schema.columns WHERE table_name ='exam_result';");
	$fetch_num_columns = mysqli_fetch_array($query_num_columns);
	$col_count = $fetch_num_columns[0] - 5; 

	$sql = "SELECT * FROM `exam_result` WHERE `stu_rollNo` = '$stu_rollNo'"; 
	$setRec_query = mysqli_query($con, $sql);  
	$setRec = mysqli_fetch_all($setRec_query);

    $subMarks;
    for($i = 0; $i< count($setRec);$i++)
    {
        $sum =0;
        for($j = 5;$j<$fetch_num_columns[0];$j++)
        {
            $sum +=  $setRec[$i][$j];
        }
        $subMarks[$i] = $sum;
        
    }
    for($i = 0; $i < count($setRec); $i++){
        $sub_name[$i] = $setRec[$i][4];
    }
    //Xls Generator
	$columnHeader = '';  
	$columnHeader = "<b>Subject Name" . "\t" . "Marks" . "\t";  
	$setData = '';  
	for($k =0; $k < count($setRec); $k++){  
		$rowData = $sub_name[$k]."\t".$subMarks[$k] . "\t";
		$setData .= trim($rowData) . "\n";  
	}  
	header("Content-type: application/octet-stream");  
	header("Content-Disposition: attachment; filename=".$stu_rollNo."_"." Result.xls");  
	header("Pragma: no-cache");  
	header("Expires: 0");  

	echo ucwords($columnHeader) . "\n" . $setData . "\n";  
?> 
 