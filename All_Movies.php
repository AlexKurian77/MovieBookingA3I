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
    <title>All Movies</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap');

        body {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-size: 14px;
            font-family: 'Poppins';
            display: grid;
            grid-template-columns: 498px;
        }

        :root {
            --light: #161414;
            --dark: #e7e5e5;
        }

        * {
            color: var(--light);
            background-color: var(--dark);
            transition: 0.4s;
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

        a {
            text-decoration: none;
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

        .booking {
            background-color: #c0362e;
            color: #e7e5e5;
            border-radius: 10px;
            padding: 10px;
            cursor: default;
        }

        #movies {
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            flex-wrap: wrap;
            gap: 50px;
            margin-top: 20px;
        }

        #movies h1 {
            margin-top: 20px;
        }

        .cards {
            width: 250px;
            height: 320px;
            position: relative;
            box-shadow: 0 3px 5px #333;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 7px;
            transition: 0.4s;
        }

        .images {
            position: relative;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Orbitron';
        }

        .about {
            position: absolute;
            display: none;
            background: transparent;
            font-size: 20px;
            font-style: italic;
            color: #e7e5e5;
        }

        .images:hover .imgs {
            filter: blur(4px);
            opacity: 0.7;
        }

        .cards:hover{
            scale: 1.1;
            transition: 0.3s;
        }

        .imgs {
            border-radius: 20px;
            width: 250px;
            height: 320px;
            cursor: pointer;
        }

        .images:hover .about {
            display: flex;
        }
        .images:hover .book_tickets>span{
            display: inline;
        }
        #search {
            width: 100vw;
            text-align: center;
        }

        #search input {
            margin-top: 10px;
            padding: 15px;
            width: 250px;
            background: #333;
            color: white;
            border-radius: 15px;
            font-size: 20px;
        }
        input[type="text"]::placeholder{
            color:ghostwhite;
        }
        .book_tickets{
            position: absolute;
            bottom: 100px;
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
        .hidden {
            opacity: 0;
            transform: translateY(-20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }
        .visible {
            opacity: 1;
            transform: translateY(0);
        }
        .seats-selected {
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 1px 1px 100px black;
            left: 19%;
            top: 50px;
            height: 70vh;
            width: 60vw;
            background-image: url(https://c4.wallpaperflare.com/wallpaper/89/553/173/black-background-wood-darker-wallpaper-preview.jpg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
            z-index: 999;
        }

        .seats-selected button {
            position: absolute;
            right: 20px;
            top: 20px;
            color: #e7e5e5;
            background-color: #1c1b1b;
            padding: 5px 10px;
            border-radius: 50%;
        }
        .first-row {
            background-color: transparent;
            display: flex;
            gap: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .second-row {
            background-color: transparent;
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .seats-seats {
            height: 20px;
            width: 20px;
            background-color: white;
            border-radius: 50%;
            padding: 2px;
            padding-bottom: 4px;
            transition: 0.2s;
            cursor: pointer;
        }

        .seats-seats:hover {
            transform: scale(1.2);
            transition: 0.2s;
        }
        .book {
            background-color: #c0362e;
            padding: 10px;
            font-size: 20px;
            border-radius: 20px;
            cursor: pointer;
            color: white;
        }
        #please-select,
        #selected_seats{
            background-color: rgba(0,0,0,0.5);
            color: #e7e5e5;
            font-size: 22px;
        }
        .seat-number {
            background: transparent;
            display: flex;
            font-family: 'Orbitron';
            justify-content: space-around;
            gap: 5px;
            margin-bottom: 5px;
            margin-top: 10px;
        }
        .seat-alpha {
            background: transparent;
            position: absolute;
            top: 210px;
            left: 315px;
            margin-right: 5px;
        }
        .seat-number span,
        .seat-alpha p{
            background-color: rgba(0, 0, 0, 0.4);
            padding: 5px 8px;
            color: #FFF;
            border-radius: 5px;
        }
        .hamburger-menu {
            position: relative;
            display: none;
        }
        .hamburger-buttons{
            display: none;
        }
        @media screen and (max-width: 1040px) {
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
            }
            .oppen-content h2,
            .oppen-content h3,
            .avengers-content h2, 
            .avengers-content h3,
            .batman-content h2,
            .batman-content h3{
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
                <a href="Website.php"><img src="logo2.png" width="200" height="130" id="logo"></a>
            </div>
            <div class="list">
                <ul>
                    <a href="Website.php">
                        <li><span></span>Home</li>
                    </a>
                    <li class="except" style="cursor: default;">
                        <?php
                        echo "Welcome! " . $_SESSION['user-website'];
                        ?>
                    </li>
                    <li class="booking except">All Movies</li>
                    <a href="My_Bookings.php">
                        <li><span></span>My Bookings</li>
                    </a>
                    <a href="ProfilePicUpload.php"><li><span></span>Profile</li></a>
                    <li><img src="light-mode.png" alt="light mode" width="20" height="20" id="themelogo" onclick="changeTheme();" title="Dark Theme"></li>
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
                <a href="Website.php"><li>Home</li></a>
                <li id="login" class="logintext except" onclick="display();">Login</li>
                <a href="All_Movies.php" onclick="booking();"><li>All Movies</li></a>
                <a href="My_Bookings.php" onclick="booking();"><li>My Bookings</li></a>
                <a href="ProfilePicUpload.php" onclick="booking();"><li>Profile</li></a>
                <li id="logout_show" onclick="logout1();"><img src="logout1.png" width="15px" height="19px" id="logout">Log Out</li>
                <li><img src="light-mode.png" alt="" width="20" height="20" id="themelogo1" onclick="changeTheme();" title="Dark Theme"></li>
            </ul>
        </div>
    </div>
    <div id="search">
        <input type="text" placeholder="Search for a movie">
    </div>
    <div class="seats-selected" style="display: none;" id="seats_selected">
            <div id="please-select">Please Select The Seats</div>
            <div id="selected_seats"></div>
            <div class="seat-number">
                <span style="margin-left: 3px;">1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>5</span>
                <span>6</span>
            </div>
            <div class="seat-alpha">
                <p>A</p>
                <p>B</p>
            </div>
            <div class="first-row ">
                <div class="seats-seats" style="background-color: white;" id="A1" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="A2" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="A3" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="A4" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="A5" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="A6" onclick="seat_back(this);">💺</div>
            </div>
            <div class="second-row ">
                <div class="seats-seats" style="background-color: white;" id="B1" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="B2" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="B3" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="B4" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="B5" onclick="seat_back(this);">💺</div>
                <div class="seats-seats" style="background-color: white;" id="B6" onclick="seat_back(this);">💺</div>
            </div>
            <div class="book"  onclick="seat_green_count();">
                Book Tickets
            </div>
            
            <button type="button" onclick="seat_display();">X</button>
    </div>
    <div id="movies">
        <!-- <div class="cards" id="Oppenheimer">
            <div class="images">
                <img src="Oppenheimer.jpg" class="imgs">
                <div class="about">Oppenheimer</div>
                <div class="book_tickets">
                    <span>Book Tickets</span>
                </div>
            </div>
        </div> -->
    </div>
    <script>
        let mName;
        function payment_gateway(ele) {
            document.cookie = "Movie_name = "+ele.id;
            window.open('payment_gateway.php');
        }
        function showing_seat_screen(ele){
            let seats_selected = document.getElementById("seats_selected");
            mName = ele;
            seats_selected.style.display = "flex";
        }
        function splitOnCaps(word) {
            return word.split(/(?=[A-Z])/).join(' ');
        }
        let movies = document.getElementById("movies");
    </script>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "movie_ticket", 4306);
    if (!$conn) {
        echo "<script>";
        echo "alert('Couldn't Connect to database')";
        echo "</script>";
        die("Failed to connect: " . mysqli_connect_error());
    }
    $select = $conn->prepare("SELECT * FROM allmovies");
    $select->execute();
    $select_result = $select->get_result();
    $data = $select_result->fetch_all(MYSQLI_ASSOC);
    if (!empty($data)) {
        echo "<script>";
        echo "let card;";
        echo "let images;";
        echo "let img;";
        echo "let about;";
        echo "let book_ticket;";
        echo "let span;";
        foreach ($data as $row) {
            echo "card = document.createElement('div');";
            echo "card.classList.add('cards');";
            echo "card.classList.add('box');";
            echo "card.classList.add('hidden');";
            echo "card.style.transition = '0.3s';";
            echo "images = document.createElement('div');";
            echo "images.classList.add('images');";
            echo "img = document.createElement('img');";
            echo "about = document.createElement('div');";
            echo "about.classList.add('about');";
            echo "book_ticket = document.createElement('div');";
            echo "book_ticket.classList.add('book_tickets');";
            echo "span = document.createElement('span');";
            echo "span.innerHTML ='Book Tickets';";
            echo "span.id = '" . $row['Movie_Name'] . "';";
            echo "span.onclick = function() {
                showing_seat_screen(this);
            };";
            echo "book_ticket.appendChild(span);";
            echo "about.innerHTML = splitOnCaps('" . $row['Movie_Name'] . "');";
            echo "img.classList.add('imgs');";
            echo "img.src = '" . $row['Movie_Name'] . ".jpg';";
            echo "images.appendChild(img);";
            echo "images.appendChild(about);";
            echo "images.appendChild(book_ticket);";
            echo "card.appendChild(images);";
            echo "card.id = '" . $row['Movie_Name'] . "';";
            echo "movies.appendChild(card);";
        }
        echo "</script>";
    }
    ?>
    <script>
        const divs = document.querySelectorAll('.box');
        divs.forEach((div, index) => {
            setTimeout(() => {
                div.classList.add('visible');
            }, index*100);
        });
        function seat_back(element) {
            if (element.style.backgroundColor == "white") {
                element.style.backgroundColor = "lightgreen";
            } else if (element.style.backgroundColor == "lightgreen") {
                element.style.backgroundColor = "white";
            }
        }
        function seat() {
            // let seat = document.getElementById("seat");
            let seat_selected = document.getElementById("seats_selected");
            document.getElementById("seat").addEventListener("click", both);
            seat_selected1 = true;
            let seats_div = document.getElementById("seats_div");
            seats_div.style.display = "flex";
            const divs = document.querySelectorAll('.box1');
            divs.forEach((div, index) => {
                setTimeout(() => {
                    div.classList.add('visible');
                }, index * 500);
            });
        }
        function seat_green_count() {
            let selected = document.getElementById("selected_seats");
            let loop_seat = document.getElementsByClassName("seats-seats");
            let duplicate_seat = "";
            let Ticket_Count = 0;
            for (i = 0; i < loop_seat.length; i++) {
                if (loop_seat[i].style.backgroundColor == "lightgreen") {
                    duplicate_seat = duplicate_seat + "  " + loop_seat[i].id;
                    Ticket_Count++;
                }
            }
            Tickets = Ticket_Count;
            if (duplicate_seat == "") {
                selected.textContent = "No seats selected";
            } 
            else {
                if(confirm("Selected Seats are: " + duplicate_seat)){
                    payment_gateway(mName);
                }
            }
        }
        function seat_display() {
            
            let seat_selected = document.getElementById("seats_selected");
            seat_selected.style.display = "none";
            let loop_seat = document.getElementsByClassName("seats-seats");
            for (i = 0; i < loop_seat.length; i++) {
                loop_seat[i].style.backgroundColor = "white";
            }
        }
        function theme() {
            let theme1 = document.getElementById("themelogo");
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

                    root.style.setProperty("--dark", "#e7e5e5");
                    root.style.setProperty("--light", "#161414");
                    document.cookie = "theme=light;";
                }
                else{
                    theme1.src = "light-mode.png";
                    theme1.title = "Light Mode";

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
            let oppen_image = document.getElementById("oppen-image");
            let avengers_image = document.getElementById("avengers-image");
            let batman_image = document.getElementById("batman-image");
            let root = document.documentElement;
            if (theme.src.endsWith("night-mode.png")) {
                theme.src = "light-mode.png";
                theme.title = "Light Theme";
                // getComputedStyle(root).getPropertyValue('--main-color');
                // root.style.setProperty('--main-color', 'red')

                document.cookie = "theme=dark;"
                let darkColor = getComputedStyle(root).getPropertyValue('--dark').trim();
                let lightColor = getComputedStyle(root).getPropertyValue('--light').trim();
                
                root.style.setProperty('--dark', lightColor);
                root.style.setProperty('--light', darkColor);
            } 
            else if (theme.src.endsWith("light-mode.png")) {
                theme.src = "night-mode.png";
                theme.title = "Dark Theme";
                document.cookie = "theme=light;"

                let darkColor = getComputedStyle(root).getPropertyValue('--dark').trim();
                let lightColor = getComputedStyle(root).getPropertyValue('--light').trim();

                root.style.setProperty('--dark', lightColor);
                root.style.setProperty('--light', darkColor);
            }
        }
        function search() {
            let searchTerm = document.querySelector("#search input").value.trim();
            let cards = document.querySelectorAll('.cards');

            cards.forEach(card => {
                let neW = splitOnCaps(card.id);
                if (neW.toLowerCase().startsWith(searchTerm.toLowerCase())) {
                    card.style.display = 'flex';
                } 
                else {
                    card.style.display = 'none';
                }
            });
        }
        
        let searchInput = document.querySelector("#search input");
        searchInput.addEventListener('keypress', function(){
            setInterval(search,500)
        });
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