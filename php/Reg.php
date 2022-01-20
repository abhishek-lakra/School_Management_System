<?php
$SoT = $_POST['SoT'];
$Full_Name = $_POST['Full_Name'];
$Password = $_POST['Password'];
$Gender = $_POST['Gender'];
$Class = $_POST['Class'];
$Email = $_POST['Email'];
$Mobile = $_POST['Mobile'];
$Add1 = $_POST['Add1'];
$Add2 = $_POST['Add2'];
$City = $_POST['City'];
$State = $_POST['State'];
$Zipcode = $_POST['Zipcode'];

if (!empty($SoT) || !empty($Full_Name) || !empty($Password) || !empty($Gender) || !empty($Class) || !empty($Email) || !empty($Mobile) || !empty($Add1) || !empty($Add2) || !empty($City) || !empty($State) || !empty($Zipcode)){
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbname = 'sms';
    
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    
    if (mysqli_connect_error()){
        die ('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else{
        $SELECT = 'SELECT Email From register Where Email = ? Limit 1';
        $INSERT = 'INSERT Into register (SoT, Full_Name, Password, Gender, Class, Email, Mobile, Add1, Add2, City, State, Zipcode) values(?,?,?,?,?,?,?,?,?,?,?,?)';
        
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('s',$Email);
        $stmt->execute();
        $stmt->bind_result($Email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if ($rnum==0){
            $stmt->close();
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param('ssssssissssi', $SoT, $Full_Name, $Password, $Gender, $Class, $Email, $Mobile, $Add1, $Add2, $City, $State, $Zipcode);
            $stmt->execute();
            echo "<script>alert('Registeration Successfull')</script>";
            echo "<script>location.replace('../Home.html')</script>";
            
        }
        else{
            echo "<script>alert('Email is Already Registered')</script>";
        }
        $stmt->close();
        $conn->Close();
    }
}
else{
    echo 'All fields are required';
    die();
}
?>