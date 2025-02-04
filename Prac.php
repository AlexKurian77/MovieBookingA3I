<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        iframe{
            height: 500px;
            width: 500px;
        }
    </style>
</head>
<body>
    <form action="" method="get">
        <label for="email">E-mail</label>
        <input type="text" name="email">
        <label for="pass">Password</label>
        <input type="password" name="pass">
        <button name="submit">Submit</button>
    </form>
    <iframe src="My_Bookings.php"></iframe>
</body>
</html>

<?php
    if (isset($_GET['submit'])) {
        $email = $_GET['email'];
        $pass = $_GET['pass'];
        $conn = mysqli_connect("localhost","root","","movie_ticket",4306);
        if(!$conn){
            die("Failed to connect: ");
        }KO
        else{
            $select = $conn->prepare("SELECT * FROM details");
            $select->execute();
            $select_result = $select->get_result();
            $data = $select_result->fetch_all(MYSQLI_ASSOC);
            if(!empty($data)){
                echo $data[0]['Username']."<br>";
                echo $data[0]['E_mail']."<br>";
            }
            else{
                echo "Nice";
            }
        }
    }
?>