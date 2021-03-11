<?php
    require("../../fpdf/pdf-sector.php");
    define('FPDF_FONTPATH','../../fpdf/font/');

    session_start();
    $tea_id = $_SESSION['teaID'];
    $class_id = $_SESSION['class_id'];
    $tea_name = $_SESSION['tea_name'];

    include ("./connection.php");
    $class_name = explode("-",$class_id)[0];
    $sub_name = explode("-",$class_id)[1];
    
    $filename = "Report - ".$class_name." ".$sub_name.".pdf";

    $query_num_columns = mysqli_query($con, "SELECT count(*) FROM information_schema.columns WHERE table_name ='exam_result';");
	$fetch_num_columns = mysqli_fetch_array($query_num_columns);
	$col_count = $fetch_num_columns[0] - 5; 

	$sql = "SELECT * FROM `exam_result` WHERE `class_id` = '$class_id' ORDER BY `stu_rollNo`"; 
	$setRec_query = mysqli_query($con, $sql);  
	$setRec = mysqli_fetch_all($setRec_query);
	$l_rollno = $setRec[0][1];
	$u_rollno = mysqli_num_rows($setRec_query) - 1;
	$u_rollno = $setRec[$u_rollno][1];

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

    $pdf=new PDF_SECTOR();
    $pdf->AddPage();
    $pdf->SetLeftMargin(6);
    $pdf->SetRightMargin(5);
    $pdf->Cell(12);
    getimagesize("../images/logo.jpeg");
    $pdf->Image('../images/logo.jpeg',10,10,20,20);
    $pdf->SetFont("Arial","B","26");
    $pdf->setTextColor(1,114,150);
    $pdf->Cell(95,21,"Exam Evaluator","0","1","C");
    $pdf->Ln(3);
    
    $pdf->SetFont("Arial","","18");
    $pdf->setTextColor(0,0,0);
    $pdf->Cell(70,20,"Class : ".$class_name,"0","1","L");
    $pdf->Cell(70,0,"Teacher Name : ".$tea_name,"0","1","L");
    $pdf->Cell(70,20,"Subject Name : ".$sub_name,"0","1","L");
    
    $pdf->Ln(3);
    $pdf->SetFont("Arial","","14");
    $pdf->setTextColor(0,0,0);
    $pdf->Cell(30,10,"","0","0","C");
    $pdf->Cell(50,10,"Enrollment No.","1","0","C");
    $pdf->Cell(50,10,"Student Name","1","0","C");
    $pdf->Cell(40,10,"Marks Gained","1","1","C");
    
    for($k =0; $k < count($stu_roll); $k++){  
        $pdf->Cell(30,10,"","0","0","C");
		$pdf->Cell(50,10,$stu_roll[$k],"1","0","C");
        $pdf->Cell(50,10,$stu_name[$k],"1","0","C");
        $pdf->Cell(40,10,$total[$k],"1","1","C");  
	}

    $pdf->output($filename,"D");
?>