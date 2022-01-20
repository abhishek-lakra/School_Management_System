<!DOCTYPE html>
<html>
    <head>
        <title>Student Portal</title>
        
        <link href="../css/Dis_Sub.css" rel="stylesheet" type="text/css">
        
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
            <h1>SUBJECTS</h1>
        </div>
        
        <div class="display_subject">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Subject Code</th>
                    <th>Subject</th>
                </tr>
                
                <?php
                session_start();
                $host = 'localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname = 'sms';
                $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
                
                $class = $_SESSION['Class'];
                
                if ($conn->connect_error){
                    die('Connection Failed:'.$conn->connect_error);
                }           

                $count = 1;
                $sql = "SELECT * From subjects";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        if($row['Class']==$class){
                        echo "<tr>
                        <td>".$count."</td>
                        <td>".$row['Sub_Code']."</td>
                        <td>".$row['Subject']."</td>
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