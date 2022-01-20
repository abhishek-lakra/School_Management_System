<html>
    <head>
        <meta charset="utf-8">
       
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <title>Student Portal</title>
        
        <link href="../css/Stu_Note.css" rel="stylesheet" type="text/css" />
        
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
        <script src="https://kits.fontawesome.com/yourcode.js"></script>

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

        <h1>Notes</h1>

        <div class="view">
            <table class="notes">
                <tr>
                    <th>S.No</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Chapter</th>
                    <th>File</th>
                </tr>

                <?php
                $localhost = "localhost";
                $dbusername = "root"; 
                $dbpassword = ""; 
                $dbname = "sms";
                
                $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);

                $select = "SELECT * FROM notes ORDER BY class";
                $count = 1;
                $sql = mysqli_query($conn,$select);
                if($sql->num_rows > 0){
                    while($row = $sql->fetch_assoc()){
                        echo "<tr>
                        <td>".$count."</td>
                        <td>".$row['subject']."</td>
                        <td>".$row['class']."</td>
                        <td>".$row['chapter']."</td>
                        <td><a href = 'View.php?rn=$row[ID]'>".$row['file']."</a></td>
                        </tr>";
                        $count = $count + 1;
                    }
                }
                ?>
            </table>
        </div>

        <div class="need-help">
            <button class="contact"><a href="Contact.php" style="text-decoration: none; color: white;">Contact Us</a></button>
        </div>
    </body>
</html>