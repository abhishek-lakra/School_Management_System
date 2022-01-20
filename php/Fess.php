<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$name = 'sms';
$conn = mysqli_connect($host, $user, $pass, $name);

$mob = $_SESSION['Mobile'];
$SELECT = "SELECT * FROM register WHERE Mobile = '$mob' ";
$result = $conn->query($SELECT);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Portal</title>
        
        <link href="../css/Fees.css" rel="stylesheet" type="text/css">
        
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
            <h1>Fees</h1>
        </div>
        
        <div class="content">
            <form action="Fee_Con.php" method="post">
            <div class="col-1">
                <div class="name">
                    <label class="name">Name:</label>
                    <input class="name" name="Name" value="<?php echo $data['Full_Name']; ?>" readonly>
                </div>

                <div class="mobile">
                    <label class="mobile">Mobile:</label>
                    <input class="mobile" name="Mobile" value="<?php echo $data['Mobile']; ?>" readonly>
                </div>
            </div>
            
            <div class="col-2">
                <div class="email">
                    <label class="email">Email:</label>
                    <input class="email" name="Email" value="<?php echo $data['Email']; ?>" readonly>
                </div>
                
                <div class="gender">
                    <label class="gender">Gender:</label>
                    <input class="gender" name="Gender" value="<?php echo $data['Gender']; ?>" readonly>
                </div>
                
            </div>
            <div class="col-3">
                <div class="amount">
                    <label class="amount">Amount:</label>
                    <input type="text" class="amount" name="Amount" value="&#8377 8000" required>
                </div>
                   
                <div class="class" style="margin-top:30px;">
                    <label class="class">Class:</label>
                    <input type="text" class="class" name="Class" value="<?php echo $data['Class']; ?>" required>
                </div>
                    
                <div class="submit">
                    <input type="submit" name="Pay" class="submit" value="Pay">
                </div>
            </div>
            </form>
        </div>
    </body>
</html>