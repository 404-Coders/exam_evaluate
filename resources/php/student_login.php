<?php 
    include './connection.php';

    $stu_rollNo = $_POST['stu_rollNo']; 
    $stu_email = $_POST['stu_email']; 
    $stu_pass = $_POST['stu_pass']; 
    
    $query = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo`='$stu_rollNo'");
    if(mysqli_num_rows($query) > 0)
    {
        $query = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo`='$stu_rollNo' and `stu_email`='$stu_email'");

        if(mysqli_num_rows($query) > 0)
        {
            $query = mysqli_query($con, "SELECT * from `student_cred` where `stu_rollNo`='$stu_rollNo' and `stu_email`='$stu_email' and `stu_pass`='$stu_pass'");
            if(mysqli_num_rows($query) > 0)
            {
                session_start();
                $_SESSION['rollNo'] = $stu_rollNo;
                header("location: ../../login?sucess=login_succ");
                echo "All three matched";
            }
            else
            {                
                header("location: ../../login?error=wrong_pass");
                
                //return to main login page and show error popup(pass does not exist)
            }
        }
        else
        {
            header("location: ../../login?error=wrong_mail");
            echo "email to this roll num does not match";
            //return to main login page and show error popup(email to this roll num does not match)
        }
    
    }
    else
    {
        header("location: ../../login?error=wrong_roll");

        //return to main login page and show error popup(roll number not exist)
    }
?>