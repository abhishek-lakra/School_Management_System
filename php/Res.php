<?php
$Full_Name = $_POST['Full_Name'];
$Mobile = $_POST['Mobile'];
$Class = $_POST['Class'];
$Sub_Code = $_POST['Sub_Code'];
$Subject = $_POST['Subject'];
$Marks = $_POST['Marks'];

if (!empty($Full_Name) || !empty($Mobile) || !empty($Sub_Code) || !empty($Subject) || !empty($Marks)){
    $host = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'sms';
    
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
    
    if (mysqli_connect_error()){
        die('Connect Error ('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = 'SELECT Sub_Code FROM result WHERE ID = ?';
        $INSERT = 'INSERT INTO result (Full_Name, Mobile, Class, Sub_Code, Subject, Marks) values(?,?,?,?,?,?)';
        
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('i', $_POST['ID']);
        $stmt->execute();
        $stmt->bind_result($_POST['ID']);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if ($rnum==0){
            $stmt->close();
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('sisssi', $Full_Name, $Mobile, $Class, $Sub_Code, $Subject, $Marks);
            $stmt->execute();
            echo "<script>alert('Marks Updated Successfully')</script>";
            echo "<script>location.replace('Staf_Result.php')</script>";
        }
        else{
            echo "Subject Code is Already Registered";
            echo "<script>location.replace('Staf_Result.php')</script>";
        }
        $stmt->close();
        $conn->close();
    }
}
else{
    echo "All Fields are required";
    die();
}
?>