<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Upload Form</title>
</head>
<body>    
    <?php
        session_start();
        if(isset($_SESSION['rollNo']) && $_SERVER["REQUEST_METHOD"] == "POST")
        {
            include '../../../resources/php/connection.php';
            $stu_rollNo = $_SESSION['rollNo'];
            $stu_name = $_SESSION['stu_name'];
            $subject = $_POST["subject"];
            $sheet_link = $_POST["sheet_link"]; 
            $class_name = $_SESSION["class_name"];
            $class_id = implode("-", array($class_name, $subject));
            echo $stu_rollNo.$stu_name, $subject, $sheet_link, $class_id;


            $query = mysqli_query($con, "SELECT * from `exam_sheet` where `stu_rollNO`='$stu_rollNo' and `sub_name` = '$subject'");
            if($query)
                $fetch_query = mysqli_fetch_all($query);
            else
            {
                echo "Error: 2 " . $query . "<br>" . mysqli_error($con);
            }

            if(count($fetch_query) == 0)
            {
                $query = mysqli_query($con, "INSERT INTO `exam_sheet`(`class_id`, `stu_rollNo`, `sub_name`, `answersheet`) VALUES ('$class_id','$stu_rollNo','$subject','$sheet_link')");
                if($query)
                    header('location: ../?success=upload-success');
                else
                {
                    echo "Error: " . $query . "<br>" . mysqli_error($con);
                }

            }
            else
            {
                header('location: ../?error=already-uploaded');
            }

        }
        else
        {
            header('location: ../?error=login-first');            
        }

    ?>
</body>
</html>