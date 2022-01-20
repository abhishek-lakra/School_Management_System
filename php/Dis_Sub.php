<?php
session_start();
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sms';
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

$cla = $_SESSION['CLASS'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Staff Portal</title>
        
        <link href="../css/Staf_Sub.css" rel="stylesheet" type="text/css">
        
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
            <h1>SUBJECTS</h1>
        </div>
        
        <div class="content">
            <form action="Staf_Sub.php" method="post">
                
                <div class="Sub_Code">
                    <label for="code">Subject Code:</label>
                    <input type="text" class="Code" id="code" name="Sub_Code" required>
                </div>
                
                <div class="Sub_Name">
                    <label for="name">Subject:</label>
                    <input type="text" class="Name" id="name" name="Subject" required>
                </div>
                
                <div class="class">
                    <label for="class" hidden>Subject:</label>
                    <input type="text" class="class" id="class" name="Class" value="<?php echo $cla; ?>" hidden>
                </div>
                
                <div class="sub_btn">
                    <button class="submit">Submit</button>
                </div>
            </form>
            <br />
            <label><b>Note:</b> Database should have 6 subjects.</label>
        </div>
        
        <div class="display_subject">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Subject Code</th>
                    <th>Subject</th>
                    <th>Delete</th>
                </tr>
                
                <?php
                
                if ($conn->connect_error){
                    die('Connection Failed:'.$conn->connect_error);
                }           

                $count = 1;
                $sql = "SELECT * From subjects";
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while ($row = $result->fetch_assoc()){
                        if ($row['Class'] == $cla){
                        echo "<tr>
                        <td>".$count."</td>
                        <td>".$row['Sub_Code']."</td><td>".$row['Subject']."</td>
                        <td><a href = 'Delete.php?rn=$row[ID]'>Delete</a></td>
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




