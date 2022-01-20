<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <title>Staff Portal</title>
        
        <link href="../css/Staf_Notes.css" rel="stylesheet" type="text/css" />
        
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
                <li><a href="Staf_Por.php">PROFILE</a></li>
                <li><a href="Dis_Sub.php">SUBJECTS</a></li>
                <li><a href="Staf_Result.php">RESULT</a></li>
                <li><a href="Staf_Note.php">NOTES</a></li>
                <li><a href="Staf_Fees.php">FEES</a></li>
                <li><a href="../Login.html">LOG OUT</a></li>
            </ul>
        </nav>

        <div class="head">
            <h1>Notes Upload</h1>
        </div>

        <div class="upload">
            <form action="Staf_Note.php" method="post" enctype="multipart/form-data">
               <label>Subject</label>
               <input type="text" name="subject" required>

               <label>Class</label>
               <select name="class" required>
                            <option selected hidden value="">Choose...</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                            <option value="9th">9th</option>
                            <option value="10th">10th</option>
                            <option value="11th">11th</option>
                            <option value="12th">12th</option>
                        </select>
               
               <label>Chapter</label>
               <input type="text" name="chapter" required>
               
               <label>File upload</label>
               <input type="File" name="file" required>
               
               <input type="submit" name="submit">
               <?php
                $localhost = "localhost";
                $dbusername = "root"; 
                $dbpassword = ""; 
                $dbname = "sms";

                $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
                if (isset($_POST["submit"]))
                {
                    $subject = $_POST["subject"];
                    $chapter = $_POST["chapter"];
                    $class = $_POST['class'];
                    $data = $_FILES['file']['name'];
                    
                    $data_type = $_FILES['file']['type'];
                    
                    $data_size = $_FILES['file']['size'];
                    
                    $temp_loc = $_FILES['file']['tmp_name'];

                    $data_store = "../Share/".$subject.'_'.$class.'_chapter'.$chapter.'_'.$data;
                    
                    move_uploaded_file($temp_loc, $data_store);
                    
                    $insert = "INSERT into notes(subject, chapter, file, class) VALUES('$subject', '$chapter','$data','$class')";
                    
                    if(mysqli_query($conn,$insert)){
                        echo "File successfully uploded";
                    }
                    else{
                        echo "Error";
                    } 
                }
                ?>
            </form>
        </div>
        
        <div class="head">
            <h1>Notes List</h1>
        </div>

        <div class="view">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Chapter</th>
                    <th>File</th>
                    <th>Delete</th>
                </tr>

                <?php
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
                        <td><a href = 'Del.php?rn=$row[ID]'>Delete</a></td>
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
