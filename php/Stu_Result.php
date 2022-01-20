<?php
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sms';
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
session_start();

$mob = $_SESSION['Mobile'];

if ($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}

$count = 1;
$total = 0;
$SEL = "SELECT * FROM register WHERE Mobile = '$mob' ";
$DAT = $conn->query($SEL);
$rnum = $DAT->fetch_assoc();

$SELECT = "SELECT * FROM result WHERE Mobile = '$mob' ";
$data = $conn->query($SELECT);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Portal</title>
        
        <link href="../css/Res.css" rel="stylesheet" type="text/css">
        
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
                <li><a href="Stu_Por.php">PROFILE</a></li>
                <li><a href="Stu_Sub.php">SUBJECTS</a></li>
                <li><a href="Stu_Result.php">RESULT</a></li>
                <li><a href="Stu_Note.php">NOTES</a></li>
                <li><a href="Fess.php">FEES</a></li>
                <li><a href="../Login.html">LOG OUT</a></li>
            </ul>
        </nav>
        
        <div class="head">
            <h1>Result</h1>
        </div>
        
        <div class="display_result">
          
           <div class="Name">
               <label class="Name">Name:</label>
               <input class="Name" name="Full_Name" value="<?php echo $rnum['Full_Name']; ?>" readonly>
           </div>
           
           <div class="Class">
               <label class="Class">Class:</label>
               <input class="Class" name="Class" value="<?php echo $rnum['Class']; ?>" readonly>
           </div>
           
           <div class="Mobile">
               <label class="Mobile">Mobile:</label>
               <input class="Mobile" name="Mobile" value="<?php echo $rnum['Mobile']; ?>" readonly>
           </div>
           <br /><br />
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Subject Code</th>
                    <th>Subject</th>
                    <th>Marks</th>
                </tr>
                
                <?php
                if ($data->num_rows > 0){
                    while ($row = $data->fetch_assoc()){
                        echo "<tr>
                        <td>".$count."</td>
                        <td>".$row['Sub_Code']."</td>
                        <td>".$row['Subject']."</td>
                        <td>".$row['Marks']."</td>
                        </tr>";

                        $count += 1;
                        $total += $row['Marks'];
                    }
                    $per = ($total * 100) / (($count - 1) * 100);

                    echo "
                    <tr>
                    <th></th>
                    <th></th>
                    <th>Total</th>
                    <th>".$total."</th>
                    </tr>

                    <tr>
                    <th></th>
                    <th></th>
                    <th>Percentage</th>
                    <th>".$per."%</th>
                    </tr>
                    </table>";
                }
                else{
                    echo "0 result";
                }
                $conn->close();
                ?>
            </table>
        </div>
    </body>
</html>