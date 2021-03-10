<?php
    require("../../Library - FPDF/pdf-sector.php");
    session_start();
    $stu_roll = $_SESSION['rollNo'];

    include ("./connection.php");

    $query_class_name = mysqli_query($con,"SELECT * FROM `student_cred` WHERE `stu_rollNo` = '$stu_roll'");
    $fetch_class_name = mysqli_fetch_array($query_class_name);
    $stu_name = $fetch_class_name[1];
    $stu_email = $fetch_class_name[2];
	$class_name = $fetch_class_name[4]; 

    $filename = $stu_name." ".$class_name.".pdf";

	$query_class_details = mysqli_query($con,"SELECT `class_id`,`full_sub_name` FROM `exam_classes` WHERE `class_name` = '$class_name'");
    $fetch_class_details = mysqli_fetch_all($query_class_details);
    for($i = 0; $i < count($fetch_class_details); $i++){
        $class_id[$i] = $fetch_class_details[$i][0];
        $full_sub_name[$i] = $fetch_class_details[$i][1];
    }

    for($i = 0; $i < count($class_id); $i++){
        $result_query = mysqli_query($con,"SELECT * FROM `exam_result` WHERE `class_id` = '$class_id[$i]' AND `stu_rollNo` = '$stu_roll'");
        if(mysqli_num_rows($result_query) > 0)
            $fetch_result[$i] = mysqli_fetch_array($result_query);
    }

    $query_num_columns = mysqli_query($con, "SELECT count(*) FROM information_schema.columns WHERE table_name ='exam_result';");
    $fetch_num_columns = mysqli_fetch_array($query_num_columns);

	for($i = 0; $i < count($fetch_result); $i++){
		$sum = 0;
		for($j = 5; $j < $fetch_num_columns[0]; $j++){
			$sum += $fetch_result[$i][$j];
		}
		$total[$i] = $sum;
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
    $pdf->Cell(70,10,"Student Name : ".$stu_name,"0","1","L");
    $pdf->Cell(70,10,"Enroll Num : ".$stu_roll,"0","1","L");
    $pdf->Cell(70,10,"Class : ".$class_name,"0","1","L");
    $pdf->Cell(70,10,"Student Email : ".$stu_email,"0","1","L");
    
    $pdf->Ln(4);
    $pdf->SetFont("Arial","","14");
    $pdf->setTextColor(0,0,0);
    $pdf->Cell(15,10,"","0","0","C");
    $pdf->Cell(30,10,"S. No.","1","0","C");
    $pdf->Cell(100,10,"Subject Name","1","0","C");
    $pdf->Cell(40,10,"Marks Gained","1","1","C");
    
    for($k =0; $k < count($total); $k++){  
        $pdf->Cell(15,10,"","0","0","C");
		$pdf->Cell(30,10,$k+1,"1","0","C");
        $pdf->Cell(100,10,$full_sub_name[$k],"1","0","C");
        $pdf->Cell(40,10,$total[$k],"1","1","C");  
	}

    // $pdf->output();
    $pdf->output($filename,"D");
?>