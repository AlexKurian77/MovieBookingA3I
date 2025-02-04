<?php
    session_start();
    if (!isset($_SESSION['user-website'])) {
        echo "Looks like you're not logged in yet. Please log in first!";
        echo "<script>";
        echo "setTimeout(function() {
            if(confirm('Redirect to our main page to login?')) {
                window.location.href = 'Website.php';   
            }
        }, 2000);";
        echo "</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="ticketStyle.css">
</head>
<body>
    <div class="ticket">
        <div class="left">
            <div class="image" id="image">
                <p class="admit-one">
                    <span>ADMIT ONE</span>
                    <span>ADMIT ONE</span>
                    <span>ADMIT ONE</span>
                </p>
                <div>
                    <p class="ticket-number">
                        #20030220
                    </p>
                </div>
            </div>
            <div class="ticket-info">
                <p class="date">
                    <span id="mday">TUESDAY</span>
                    <span class="june-29" id="date"></span>
                    <span>2024</span>
                </p>
                <div class="show-name">
                    <h1 id="movie_name">SOUR Prom</h1>
                </div>
                <div class="time">
                    <p>8:00 PM <span>TO</span> 11:00 PM</p>
                    <p>DOORS <span>@</span> 7:00 PM</p>
                </div>
                <p class="location"><span>Gaur City Mall</span>
                    <span class="separator"><i class="far fa-smile"></i></span><span>Delhi NCR</span>
                </p>
            </div>
        </div>
        <div class="right">
            <p class="admit-one">
                <span>ADMIT ONE</span>
                <span>ADMIT ONE</span>
                <span>ADMIT ONE</span>
            </p>
            <div class="right-info-container">
                <div class="show-name">
                    <h1>Gaur City Mall</h1>
                </div>
                <div class="time">
                    <p>8:00 PM <span>TO</span> 11:00 PM</p>
                    <p>DOORS <span>@</span> 7:00 PM</p>
                </div>
                <div class="barcode">
                    <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb"
                        alt="QR code">
                </div>
                <p class="ticket-number">
                    #20030220
                </p>
            </div>
        </div>
    </div>
    <script>
        let tomDate;
    </script>
    <?php
        $current_date = date("Y-m-d");
        $tomorrow_date = date("Y-m-d", strtotime("+1 day"));
        $_COOKIE['Movie_date'] = $tomorrow_date;
        echo "<script>";
        echo "tomDate = '".$_COOKIE['Movie_date']."';";
        echo "</script>";
        $conn = mysqli_connect("localhost", "root", "", "movie_ticket", 4306);
        if (!$conn) {
            echo "<script>";
            echo "alert('Couldn't Connect to database')";
            echo "</>";
            die("Failed to connect: " . mysqli_connect_error());
        }
        $insert = $conn->prepare("INSERT INTO bookings VALUES (?,?,?,?)");
        $insert->bind_param("ssss",$_SESSION['user-website'], $_COOKIE['Movie_name'],$current_date,$tomorrow_date);
        if ($insert->execute()) {
            $conn->commit();
        }
        else {
            echo "<script>";
            echo "alert('Error, Try again');";
            echo "</script>";
        }
    ?>
    <script>
        function splitOnCaps(word) {
            return word.split(/(?=[A-Z])/).join(' ');
        }
        let date = document.getElementById('date');
        let dates = new Date();
        let dat = dates.getDate()+1;
        let month = dates.getMonth();
        date.innerHTML = dat +"."+ month+"."+ dates.getFullYear();
        let image = document.getElementById('image');
        let mday = document.getElementById('mday');
        let moviename = document.getElementById('movie_name');
        let day;
        let cookies  = document.cookie.split(";");
        let cookie = [];
        cookies.forEach(ele => {
            cookie.push(ele.split("="));
        });
        cookie.forEach(i => {
            if(i[0].trim() == "Movie_name"){
                image.style.backgroundImage = "url("+i[1]+".jpg)";
                moviename.innerHTML = splitOnCaps(i[1]);
            }
        });
        date.innerHTML = tomDate;
        let dateToFind = new Date(tomDate.trim());
        day = dateToFind.getDay();
        console.log(day);
        switch(day){
            case 0:
                day = "Sunday";
                break;
            case 1:
                day = "Monday";
                break;
            case 2:
                day = "Tuesday";
                break;
            case 3:
                day = "Wednesday";
                break;
            case 4:
                day = "Thursday";
                break;
            case 5:
                day = "Friday";
                break;
            case 6:
                day = "Saturday";
                break;
        }
        mday.innerHTML = day;
    </script>
</body>
</html>