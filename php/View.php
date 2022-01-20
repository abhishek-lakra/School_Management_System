<html>
    <head></head>
    <body>
        <?php
        $host = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'sms';
        $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

        if ($conn->connect_error){
            die('Connection Failed:'.$conn->connect_error);
        }

        $ID = $_GET['rn'];

        $SELECT = "SELECT * FROM notes WHERE ID = '$ID' ";

        $result = mysqli_query($conn, $SELECT);

        $row = $result->fetch_assoc();

        if($result){
           ?>

            <embed type='application/pdf' src="../Share/<?php echo $row['subject'].'_'.$row['class'].'_chapter'.$row['chapter'].'_'.$row['file'];?>" width='100%' height='1000'>

           <?php
        }
        else{
            echo "Error";
        }
        ?>
    </body>
</html>