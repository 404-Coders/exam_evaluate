<?php 
    include './connection.php';

    $tea_id = $_POST['tea_id']; 
    $tea_email = $_POST['tea_email']; 
    $tea_pass = $_POST['tea_pass']; 
    
    $query = mysqli_query($con, "SELECT * from `teacher_cred` where `tea_id`='$tea_id'");
    if($query > 0)
    {
        $query = mysqli_query($con, "SELECT * from `teacher_cred` where `tea_id`='$tea_id' and `tea_email`='$tea_email'");

        if($query > 0)
        {
            $query = mysqli_query($con, "SELECT * from `teacher_cred` where `tea_id`='$tea_id' and `tea_email`='$tea_email' and `tea_pass`='$tea_pass'");
            if($query > 0)
            {
                // header("location: teacher_dashboard location");
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
            echo "email to this id does not match";
            //return to main login page and show error popup(email to this id does not match)
        }
    
    }
    else
    {
        echo "id not exist";
        //return to main login page and show error popup(id not exist)
    }
?>