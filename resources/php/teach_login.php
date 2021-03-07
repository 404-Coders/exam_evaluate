<?php 
    include './connection.php';

    $tea_email = $_POST['tea_email']; 
    $tea_pass = $_POST['tea_pass']; 
    
    $query = mysqli_query($con, "SELECT * from `teacher_cred` where  `tea_email`='$tea_email'");

    if(mysqli_num_rows($query) > 0)
    {
        $query = mysqli_query($con, "SELECT * from `teacher_cred` where  `tea_email`='$tea_email' and `tea_pass`='$tea_pass'");
        if(mysqli_num_rows($query) > 0)
        {
            session_start();
            $fetch_tea_ID = mysqli_fetch_array($query);
            $_SESSION['teaID'] = $fetch_tea_ID[0];
            header("location: ../../dashboard/teacher-dashboard/");
        }
        else
        {
            header("location: ../../login?error=teacher_wrong_pass");
            //return to main login page and show error popup(pass does not exist)
        }
    }
    else
    {
        header("location: ../../login?error=teacher_wrong_mail");
        //return to main login page and show error popup(email to this id does not match)
    }

?>