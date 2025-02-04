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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap');
        body {
            /* overflow-x: hidden; */
            margin: 0;
            padding: 0;
            font-size: 14px;
            font-family: 'Poppins';
            /* transition: 0.2s; */
            display: grid;
            grid-template-columns: 498px;
        }

        :root {
            --light:  #161414;
            --dark: #e7e5e5;
        }

        * {
            color: var(--light);
            background-color: var(--dark);
            transition: 0.5s;
        }
        nav {
            display: flex;
            width: 100vw;
            min-height: 150px;
            margin: auto;
            border-bottom: 1px solid;
        }

        .img {
            flex: 1;
        }

        .list {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .list ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
        }

        li {
            cursor: pointer;
            position: relative;
            z-index: 3;
            font-size: 15px;
        }

        li span {
            padding: 3px;
            background-color: transparent;
            z-index: -1;
            display: block;
            width: 0;
            height: 100%;
            position: absolute;
            top: -3px;
            left: -3px;
            transition: 0.3s;
            border-radius: 15px;
        }

        li:hover span {
            background-color: #c0362e;
            width: 100%;
            transition: 0.4s;
            transform: scale(1.2);
        }

        li:hover:not(.except) {
            transform: scale(1.2);
            transition: 0.3s;
            color: #e7e5e5;
        }

        .logintext:hover {
            transform: scale(1.2);
            transition: 0.3s;
            color: #e7e5e5;
        }
        .booking{
            background-color: #c0362e;
            color: #e7e5e5;
            border-radius: 10px;
            padding: 10px;
            cursor: default;
        }
        #movies{
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            gap: 25px;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        #movies h1{
            margin-top: 20px;
        }
        .cards{
            width: 250px;
            height: 320px;
            position: relative;
            border-radius: 20px;
            box-shadow: 0 3px 5px #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 7px;
            transition: 0.3s;
        }
        .cards:hover{
            scale: 1.1;
            transition: 0.3s;
        }
        .images{
            position: relative;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Orbitron';
            transition: 0.3s;
        }
        .about{
            position: absolute;
            display: none;
            background: transparent;
            font-size: 20px;
            font-style: italic;
            color: #e7e5e5 !important;
        }
        .images:hover .imgs{
            filter: blur(4px);
            opacity: 0.7;
            transition: 0.3s;
        }
        .imgs{
            border-radius: 20px;
            width: 250px;
            height: 320px;
            cursor: pointer;
        }
        .images:hover .about{
            display: flex;
        }
        a{
            text-decoration: none;
        }
        .date{
            position: absolute;
            bottom: 90px;
            padding: 10px;
            font-size: 20px;
            background: transparent;
            display: none;
            color: #e7e5e5 !important;
        }
        .images:hover .date{
            display: flex;
        }
        .hidden {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .visible {
            opacity: 1;
            transform: translateY(0);
        }
        .book_tickets{
            position: absolute;
            bottom: 50px;
            background: transparent;
        }
        .book_tickets span{
            background-color: #c0362e;
            padding: 7px;
            font-size: 17px;
            border-radius: 20px;
            display: none;
            color: #e7e5e5;
        }
        .images:hover .book_tickets>span{
            display: inline;
        }
        .show{
            top:80px;
            height: max-content;
            z-index: 10;
        }
        .hamburger-menu {
            position: relative;
            display: none;
        }
        .hamburger-buttons{
            display: none;
        }
        @media screen and (max-width: 1300px) {
            .list {
                display: none;
            }
            
            .hamburger-menu {
                position: absolute;
                display: flex;
                width: fit-content;
                justify-content: flex-end;
                align-items: center;
                z-index: 9999;
                top: 50px;
                right: 10px;
                height: max-content;
            }

            .hamburger-icon {
                cursor: pointer;
                padding: 10px;
            }

            .hamburger-icon span {
                display: block;
                width: 25px;
                height: 3px;
                background-color: grey;
                margin-bottom: 5px;
            }

            .hamburger-icon span:last-child {
                margin-bottom: 0;
            }
            .hamburger-buttons{
                position: absolute;
                display: none;
                flex-direction: column;
                width: 140px;
                top: 60px;
                right: 5px;
                z-index: 1000 !important;
                border: 1px solid;
                scale: 1.2;
            }
            .hamburger-buttons ul{
                display: flex;
                flex-direction: column;
                gap:20px;
                list-style: none;
                z-index: 100;
            }
            li:hover:active{
                transform: scale(1);
            }
            .oppen-image,
            .avengers-image,
            .batman-image{
                flex-direction: column;
            }
            .oppen-image .oppen-image-image,
            .avengers-image .avengers-image-image,
            .batman-image .batman-image-image{
                scale: 0.7;
            }
            .login{
                scale: 0.8;
                left:150px;
            }
            .oppen-content,
            .avengers-content,
            .batman-content{
                justify-content: start;
                height: 100px;
            }
            .oppen-content h2,
            .oppen-content h3,
            .avengers-content h2, 
            .avengers-content h3,
            .batman-content h2,
            .batman-content h3
            {
                margin-bottom: 0px;
            }
            #movies{
                flex-wrap: nowrap;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="nav-wrapper">
        <nav class="box hidden">
            <div class="img">
                <a href="Website.php"><img src="logo2.png" width="160" id="logo"></a>
            </div>
            <div class="list">
                <ul>
                    <a href="Website.php">
                        <li><span></span>Home</li>
                    </a>
                    <li class="except" style="cursor: default;">
                        <?php
                           echo "Welcome! ".$_SESSION['user-website']; 
                        ?>
                    </li>
                    <a href="All_Movies.php"><li><span></span>All Movies</li></a>
                    <li class="booking except">My Bookings</li>
                    <a href="ProfilePicUpload.php"><li><span></span>Profile</li></a>
                    <li><img src="night-mode.png" alt="light mode" width="20" height="20" id="themelogo" onclick="changeTheme();" title="Dark Theme"></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="hamburger-menu" id="hamburger">
        <div class="hamburger-icon" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="hamburger-buttons" style="display: none; z-index:9999;" id="hamburger-buttons">
                <ul>
                    <a href="Website.php">
                        <li>Home</li>
                    </a>
                    
                    <a href="All_Movies.php"><li>All Movies</li></a>
                    <li class=" except">My Bookings</li>
                    <a href="ProfilePicUpload.php"><li>Profile</li></a>
                    <li><img src="night-mode.png" alt="light mode" width="20" height="20" id="themelogo1" onclick="changeTheme();" title="Dark Theme"></li>
                </ul>
        </div>
    </div>
    <div id="movies">
        <h1>No Bookings Yet.</h1>
        <!-- <div class="cards" id="Oppenheimer" onclick="return false;">
            <div class="images">
                <div class="book_tickets show" id="Oppenheimer" onclick="ticket_show(this);">
                    <span>Show Ticket</span>
                </div>
                <img src="Oppenheimer.jpg" class="imgs">
                <div class="about">Oppenheimer</div>
                <div class="date">2024-04-06</div>
                <div class="book_tickets" onclick="cancel_t();">
                    <span>Cancel Ticket</span>
                </div>
            </div>
        </div> -->
    </div>
    <script>
        let movies = document.getElementById("movies");
        function cancel_t(){
            event.preventDefault();
        }
        function splitOnCaps(word) {
            return word.split(/(?=[A-Z])/).join(' ');
        }
    </script>
    <?php
        
        $conn = mysqli_connect("localhost","root","","movie_ticket",4306);
        if (!$conn) {
            echo "<script>";
            echo "alert('Couldn't Connect to database')";
            echo "</scrip>";
            die("Failed to connect: ".mysqli_connect_error());
        }
        $select = $conn->prepare("SELECT * FROM bookings where Username = ?");
        $select->bind_param("s",$_SESSION["user-website"]);
        $select->execute();
        $select_result = $select->get_result();
        $data = $select_result->fetch_all(MYSQLI_ASSOC);
        if(!empty($data)){
            echo "<script>";
            echo "let card;";
            echo "let images;";
            echo "let img;";
            echo "let about;";
            echo "let date;";
            echo "let cancel;";
            echo "let span;";
            echo "let show;";
            echo "let show_span;";
            echo "movies.innerHTML = '';";
            foreach($data as $row){
                echo "card = document.createElement('div');";
                echo "card.classList.add('cards');";
                echo "card.classList.add('box');";
                echo "card.classList.add('hidden');";
                echo "card.style.transition = '0.3s';";
                echo "show = document.createElement('div');";
                echo "show.setAttribute('data-mdate','".$row['Movie_date']."');";
                echo "show.id = '".$row['Movie_Name']."';";
                echo "show.classList.add('show');";
                echo "show.classList.add('book_tickets');";
                echo "show_span = document.createElement('span');";
                echo "show_span.innerHTML = 'Show Ticket';";
                echo "show.onclick = function(){
                    ticket_show(this);
                };";
                echo "images = document.createElement('div');";
                echo "images.classList.add('images');";
                echo "img = document.createElement('img');";
                echo "about = document.createElement('div');";
                echo "date = document.createElement('div');";
                echo "cancel = document.createElement('div');";
                echo "cancel.setAttribute('data-mname','".$row['Movie_Name']."');";
                echo "cancel.onclick = function(){
                        cancel_func(this);
                    };";
                echo "span = document.createElement('span');";
                echo "about.classList.add('about');";
                echo "date.classList.add('date');";
                echo "cancel.classList.add('book_tickets');";
                echo "about.innerHTML = splitOnCaps('".$row['Movie_Name']."');";
                echo "date.innerHTML = '".$row['Movie_date']."';";
                echo "span.innerHTML = 'Cancel Ticket';";
                echo "img.classList.add('imgs');";
                echo "img.src = '".$row['Movie_Name'].".jpg';";
                echo "images.appendChild(img);";
                echo "images.appendChild(about);";
                echo "images.appendChild(date);";
                echo "cancel.appendChild(span);";
                echo "show.appendChild(show_span);";
                echo "images.appendChild(cancel);";
                echo "images.appendChild(show);";
                echo "card.appendChild(images);";
                echo "movies.appendChild(card);";
            }
            echo "</script>";
        }
        if(isset($_POST['cancel'])){
            $delete = $conn->prepare("DELETE FROM bookings where Username = ? and Movie_name = ?");
            $delete->bind_param("ss",$_SESSION['user-website'],$_COOKIE['MovieCancel']);
            $delete->execute();
        }
    ?>
    <script>
        const divs = document.querySelectorAll('.box');
        divs.forEach((div, index) => {
            setTimeout(() => {
                div.classList.add('visible');
            }, index*200);
        });
        
        function ticket_show(ele){
            document.cookie = "Movie_name="+ele.id;
            document.cookie = "Movie_date="+ele.dataset.mdate;
            window.open('Ticket_shower.php');
        }
        function theme() {
            let theme1 = document.getElementById("themelogo");
            let theme2 = document.getElementById("themelogo1");
            let root = document.documentElement;
            let cookies = document.cookie.split(";");
            let cookArr = [];
            let the;
            let found = false;
            cookies.forEach(ele => {
                cookArr.push(ele.split("="));
            });
            
            cookArr.forEach(ele => {
                if(ele[0].trim() == "theme"){
                    the = ele[1].trim();
                    found = true;
                }
            });
            if (found){
                if(the == "light"){
                    theme1.src = "night-mode.png";
                    theme1.title = "Dark Mode";
                    theme2.src = "night-mode.png";
                    theme2.title = "Dark Mode";
                    root.style.setProperty("--dark", "#e7e5e5");
                    root.style.setProperty("--light", "#161414");
                    document.cookie = "theme=light;";
                }
                else{
                    theme1.src = "light-mode.png";
                    theme1.title = "Light Mode";
                    theme2.src = "light-mode.png";
                    theme2.title = "Light Mode";
                    let light = getComputedStyle(root).getPropertyValue("--light").trim();
                    let dark = getComputedStyle(root).getPropertyValue("--dark").trim();
                    root.style.setProperty("--light", "#e7e5e5");
                    root.style.setProperty("--dark", "#161414");
                    document.cookie = "theme=dark;";
                }
            }
            else{
                document.cookie = "theme=dark;";
                theme();
            }
        }
        theme();
        function changeTheme(){
            let logo = document.getElementById("logo");
            let theme = document.getElementById("themelogo");
            let theme1 = document.getElementById("themelogo1");
            let root = document.documentElement;
            if (theme.src.endsWith("night-mode.png") || theme1.src.endsWith("night-mode.png")) {
                theme.src = "light-mode.png";
                theme.title = "Light Theme";
                theme1.src = "light-mode.png";
                theme1.title = "Light Theme";
                // getComputedStyle(root).getPropertyValue('--main-color');
                // root.style.setProperty('--main-color', 'red')

                document.cookie = "theme=dark;"
                let darkColor = getComputedStyle(root).getPropertyValue('--dark').trim();
                let lightColor = getComputedStyle(root).getPropertyValue('--light').trim();
                
                root.style.setProperty('--dark', lightColor);
                root.style.setProperty('--light', darkColor);
            } 
            else if (theme.src.endsWith("light-mode.png") || theme1.src.endsWith("light-mode.png")) {
                theme.src = "night-mode.png";
                theme.title = "Dark Theme";
                theme1.src = "night-mode.png";
                theme1.title = "Dark Theme";
                document.cookie = "theme=light;"

                let darkColor = getComputedStyle(root).getPropertyValue('--dark').trim();
                let lightColor = getComputedStyle(root).getPropertyValue('--light').trim();

                root.style.setProperty('--dark', lightColor);
                root.style.setProperty('--light', darkColor);
            }
        }
        function cancel_func(ele){
            if(confirm("Do you really want to cancel the movie: '"+ele.dataset.mname+"'?")){

                document.cookie = "MovieCancel = "+ele.dataset.mname+";";
                const formData = new FormData();
                formData.append('cancel', 'true');

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            window.location.reload();
                        } else {
                            alert('Error. Please try again later.');
                        }
                    }
                };

                xhr.send(formData);
            }
        }
        function toggleMenu() {
            var menu = document.getElementById('hamburger-buttons');
            if(menu.style.display == "none"){
                menu.style.display ="flex";
            }
            else{
                menu.style.display ="none";
            }
        }
    </script>
</body>
</html>