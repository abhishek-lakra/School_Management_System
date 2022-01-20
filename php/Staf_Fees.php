<?php

$conn = mysqli_connect('localhost','root','','sms');
session_start();

$class = $_SESSION['CLASS'];
?>
<html>
    <head>
        <title>Staff Portal</title>
        
        <link href="../css/Staf_Fees.css" rel="stylesheet" type="text/css">
        
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <nav>
          <img src="../image/logo.png" height = "80"/>
           <input type="checkbox" id="check">
           <label for="check" class="checkbtn">
               <i class="fa fa-bars" aria-hidden="true"></i>
           </label>
            <ul>
                <li><a href="Staf_Por.php">PROFILE</a></li>
                <li><a href="Dis_Sub.php">SUBJECTS</a></li>
                <li><a href="Staf_Result.php">RESULT</a></li>
                <li><a href="Staf_Note.php">NOTES</a></li>
                <li><a href="Staf_Fees.php">FEES</a></li>
                <li><a href="../Login.html">LOG OUT</a></li>
            </ul>
        </nav>
        
        <div class="info">
            <h1>Fees</h1>
        </div>
        
        <div class="content">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Student Name</th>
                    <th>Mobile No.</th>
                    <th>Email</th>
                    <th>Fees</th>
                </tr>
                
                <?php
                if ($conn->connect_error){
                    die('Connection Failed:'.$conn->connect_error);
                }

                $count = 1;
                $SELECT = "SELECT register.SoT, register.Full_Name, register.Email, register.Mobile, register.Class, IF(fees.Mobile IS NULL, 'NOT PAID', 'PAID') as Payment FROM register LEFT JOIN fees ON (register.Mobile = fees.Mobile)";
                $RESULT = mysqli_query($conn, $SELECT);
                if($RESULT->num_rows > 0){
                    while($row = $RESULT->fetch_assoc()){
                        if($row['Class'] == $class and $row['SoT'] == 'S'){
                            echo "<tr>
                            <td>".$count."</td>
                            <td>".$row['Full_Name']."</td>
                            <td>".$row['Mobile']."</td>
                            <td>".$row['Email']."</td>
                            <td>".$row['Payment']."</td>
                            </tr>";

                            $count += 1;
                        }
                    }
                }
                ?>
            </table>
        </div>
    </body>
</html>