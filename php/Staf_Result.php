<!DOCTYPE html>
<html>
    <head>
        <title>Staff Portal</title>
        
        <link href="../css/Staf_Result.css" rel="stylesheet" type="text/css">
        
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
        
        <div class="head">
            <h1>Result</h1>
        </div>
        
        <div class="content">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Mobile No.</th>
                    <th>Email</th>
                </tr>
                
                <?php
                session_start();
                $host = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname = 'sms';
                $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
                
                $cl = $_SESSION['CLASS'];
                
                if ($conn->connect_error){
                    die('Connection Failed:'.$conn->connect_error);
                }
                
                $count = 1;
                $SELECT = "SELECT * FROM register Where SoT = 'S' ";
                $result = $conn->query($SELECT);
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        if($row['Class'] == $cl){
                        echo "<tr>
                        <td>".$count."</td>
                        <td><a href = 'Result.php?rn=$row[Full_Name]'>".$row['Full_Name']."</a></td>
                        <td>".$row['Gender']."</td>
                        <td>".$row['Mobile']."</td>
                        <td>".$row['Email']."</td>
                        </tr>";

                        $count = $count + 1;
                        }
                    }
                    echo "</table>";
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