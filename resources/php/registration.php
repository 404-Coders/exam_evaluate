<?php 
    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        include './connection.php';

        // $tea_id = $_POST['tea_id'];
        $tea_name = $_POST['tea_name'];
        $tea_email = $_POST['tea_email']; 
        $tea_pass = $_POST['tea_pass']; 
        $tea_picture = $_POST['tea_picture'];
        $tea_con_pass = $_POST['tea_con_pass'];
    
    
        $query = mysqli_query($con, "SELECT * from `teacher_cred` where `tea_email`='$tea_email'");
        if(mysqli_num_rows($query) <= 0)
        {
            if($tea_picture == "")
            {
                $tea_picture = "https://drive.google.com/file/d/1pIn_EOigZXo1uD2pm97lOERKQXjv6W03/view?usp=sharing";
            }
            else
            {
                $tea_picture = extractor($tea_picture);
            }
            $query = "INSERT INTO `teacher_cred`(`tea_name`, `tea_email`, `tea_pass`, `tea_picture`)
            VALUES ('$tea_name', '$tea_email', '$tea_pass', '$tea_picture')";            
            if(mysqli_query($con, $query))
            {
                header("location: ../../?success=data-added");;
            }
            else
            {
                echo "Error: " . $query . "<br>" . mysqli_error($con);
            }
        }
        else
        {
            header("location: ../../?email=exist");
        }
        mysqli_close($con);    
    }

    else
    {
        header("location: ../../");
    }
    
    

?>