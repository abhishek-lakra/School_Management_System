<?php
session_start();
$host = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sms';
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

$class = $_SESSION['CLASS'];

if ($conn->connect_error){
    die('Connection Failed:'.$conn->connect_error);
}
$name = $_GET['rn'];

$REG = "SELECT * From register WHERE Full_Name = '$name' ";
$REG_RES = mysqli_query($conn, $REG);
$data = $REG_RES->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Staff Portal</title>

    <link href="../css/Results.css" rel="stylesheet" type="text/css">

    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
    <nav>
        <img src="../image/logo.png" height="80" />
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

    

    <div class="content">

        <div class="Name">
            <label class="Name">Name:</label>
            <input type="text" name="Full_Name" class="Name" value="<?php echo $data['Full_Name']; ?>" readonly>
        </div>

        <div class="mobile">
            <label class="mobile">Mobile No:</label>
            <input type="text" name="Mobile" class="mobile" value="<?php echo $data['Mobile']; ?>" readonly>
        </div>
        
        <div class="class">
            <label class="class">Class:</label>
            <input type="text" name="Class" class="class" value="<?php echo $data['Class']; ?>" readonly>
        </div>

    </div>
<br /><br />
    <div class="table">
        <div class="head">
        <h1>Subjects</h1>
    </div>
        <table>
                <tr>
                    <th>S.No</th>
                    <th>Subject Code</th>
                    <th>Subject</th>
                </tr>

                <?php
                
                $count = 1;
                $SUB = "SELECT * FROM subjects";
                $SUB_RES = mysqli_query($conn, $SUB);
                if ($SUB_RES->num_rows > 0){
                    while ($row = $SUB_RES->fetch_assoc()){
                        if($row['Class']==$data['Class']){
                        echo "<tr>
                        <td>".$count."</td>
                        <td name = 'Sub_Code'>".$row['Sub_Code']."</td>
                        <td name = 'Subject'>".$row['Subject']."</td>
                        </tr>";

                        $count += 1;
                        }
                    }
                }
                ?>
            </form>
        </table>
    </div>
    
    <br /><br /><br />
    <div class="head">
        <h1>Result</h1>
    </div>
    <div class="input">
        <form action="Res.php" method="post">
          
          <div class="Name">
            <label class="Name" hidden>Name:</label>
            <input type="text" name="Full_Name" class="Name" value="<?php echo $data['Full_Name']; ?>" readonly hidden>
        </div>

        <div class="mobile">
            <label class="mobile" hidden>Mobile No:</label>
            <input type="text" name="Mobile" class="mobile" value="<?php echo $data['Mobile']; ?>" readonly hidden>
        </div>
         
         <div class="class">
            <label class="class" hidden>Mobile No:</label>
            <input type="text" name="Class" class="class" value="<?php echo $data['Class']; ?>" readonly hidden>
        </div>
          
           <div class="text">
                <div class="sub_code">
                    <label class="sub_code">Subject Code:</label>
                    <input type="text" name="Sub_Code" class="sub_code">
                </div>

                <div class="subject">
                    <label class="subject">Subject:</label>
                    <input type="text" name="Subject" class="subject">
                </div>

                <div class="marks">
                    <label class="marks">Marks:</label>
                    <input type="text" name="Marks" class="marks">
                </div>
            </div>
            <br /><br />
            <div class="col-12">
                <p id="button">
                    <input type="submit" class="btn btn-primary">
                </p>
            </div>
        </form>
    </div>

    <div class="table">
        <table>
            <form>
               <tr>
                    <th>Subject Code</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Delete</th>
                </tr>
                
                <?php
                $RES = "SELECT * FROM result";
                $RES_RES = mysqli_query($conn, $RES);          if ($RES_RES->num_rows > 0){
                    while ($n_row = $RES_RES->fetch_assoc()){
                        if ($n_row['Full_Name'] == $data['Full_Name']){
                        echo "<tr>
                        <td>".$n_row['Sub_Code']."</td>
                        <td>".$n_row['Subject']."</td>
                        <td>".$n_row['Marks']."</td>
                        <td><a href = 'Res_Del.php?rn=$n_row[ID]'>Delete</a></td>
                        </tr>";
                        }
                    }
                }
                $conn->close();
                ?>
            </form>
        </table>
    </div>
</body>

</html>
