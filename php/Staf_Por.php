<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <title>Staff Portal</title>
        
        <link href="../css/Staf_Por.css" rel="stylesheet" type="text/css" />
        
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
        <div class="info">
            <h1>STAFF DETAILS</h1>
            <form>
                <div class="details">
                  <?php
                    $connection = mysqli_connect('localhost', 'root', '', 'sms');
                    session_start();  
                    $mob = $_SESSION['Mobile'];
    
                    $query = "SELECT * FROM register WHERE Mobile = '$mob' ";
                    $query_run = mysqli_query($connection, $query);

                    if(mysqli_num_rows($query_run)>0){
                        while($row = mysqli_fetch_array($query_run)){
                        
                    ?>        
                       <div class="name">
                        <label class="name">Name:</label>
                        <input type="text" class="name" name="Full_Name" value="<?php echo $row['Full_Name']; ?>" readonly>
                    </div>

                   <div class="gender">
                        <label class="gender">Gender:</label>
                        <input type="text" class="gender" name="Gender" value="<?php echo $row['Gender']; ?>" readonly>
                    </div>
                    
                    <div class="class">
                        <label class="class">Class:</label>
                        <input type="text" class="class" name="Class" value="<?php echo $row['Class']; ?>" readonly>
                    </div>
                    
                    <div class="email">
                        <label class="email">Email:</label>
                        <input type="text" class="email" name="Email" value="<?php echo $row['Email']; ?>" readonly>
                    </div>

                    <div class="mobile">
                        <label class="mobile">Mobile:</label>
                        <input type="text" class="mobile" name="Mobile" value="<?php echo $row['Mobile']; ?>" readonly>
                    </div>
                       
                       <?php
                            $_SESSION['CLASS'] = $row['Class'];
                        }
                    }

?>
                </div>
            </form>
        </div>
        
        <div class="need-help">
            <button class="contact"><a href="Contact.php" style="text-decoration: none; color: white;">Contact Us</a></button>
        </div>
    </body>
</html>