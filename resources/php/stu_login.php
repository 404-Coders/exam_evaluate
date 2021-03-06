<?php 
    include './connection.php';

    $stu_rollNo = $_POST['stu_rollNo']; 
    $stu_email = $_POST['stu_email']; 
    $stu_pass = $_POST['stu_pass']; 
    
    $query = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo`='$stu_rollNo'");
    if($query > 0)
    {
        $query = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo`='$stu_rollNo' and `stu_email`='$stu_email'");

        if($query > 0)
        {
            $query = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo`='$stu_rollNo' and `stu_email`='$stu_email' and `stu_pass`='$stu_pass'");
            if($query > 0)
            {
                header("location: ../../dashboard/student-dashboard/");
                echo "All three matched";
            }
            else
            {
                echo "pass does not matched";
                //return to main login page and show error popup(pass does not exist)
            }
        }
        else
        {
            echo "email to this roll num does not match";
            //return to main login page and show error popup(email to this roll num does not match)
        }
    
    }
    else
    {
        echo "roll number not exist";
        //return to main login page and show error popup(roll number not exist)
    }
?>