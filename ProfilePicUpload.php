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
    <title>Profile Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap');
        body{
            background: var(--dark);
            overflow: hidden;
            height: 100vh;
            font-family: 'Poppins';
        }
        :root {
            --light:  #161414;
            --dark: #e7e5e5;
        }

        * {
            color: var(--light);
            transition: 0.5s;
        }
        nav {
            display: flex;
            width: 100vw;
            height: 150px;
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
            gap: 35px;
        }

        li {
            cursor: pointer;
            position: relative;
            z-index: 3;
            font-size: 15px;
        }

        li span {
            padding: 13px;
            background-color: transparent;
            z-index: -1;
            display: block;
            width: 0;
            height: 100%;
            position: absolute;
            top: 0px;
            left: 0px;
            transition: 0.3s;
            border-radius: 10px;
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
        .outer{
            position: relative;
            display: flex;
            flex-direction: column;
            background-color: aliceblue;
            height: 65vh;
            width: 40vw;
            border-radius: 20px;
            animation: slideInDown 1s ease forwards;
            background-color: transparent;
            scale: 1.1;
        }
        .outer *{
            color: var(--light);
        }
        .profile-pic{
            height: 40%;
            display: flex;
            justify-content: center;
            margin-top: 5px;
            scale: 1.2;
        }
        .about{
            bottom: 0;
            height: 37%;
            width: 100%;
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #username1{
            font-size: 25px;
        }
        .profile-outer{
            position: relative;
            height: fit-content;
            width: fit-content;
            min-height: 150px;
            max-height: 150px;
            display: flex;
            background-color: #111;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            border: 5px solid grey;
            overflow: hidden;
        }
        .camera{
            position: absolute;
            display: none
        }
        .camera img{
            width: 100px;
            height: 100%;
            filter: invert(1);
        }
        .actual-pic{
            height: 100%;
        }
        input[type="email"],
        input[type="date"]{
            color: #111;
            display: none;
        }
        .profile-outer:hover .camera{
            display: flex;
        }
        .profile-outer:hover #pfp{
            opacity: 0.6;
        }
        #uploadForm{
            border: 3px solid;
            position: absolute;
        }
        .center-align{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        #pfp{
            scale: 1.08;
        }
        a{
            text-decoration: none;
        }
        #upload-button{
            display: none;
        }
        #remove-button,
        #upload-button{
            width: 160px;
        }
        .buttons{
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .buttons button{
            background: cadetblue;
            padding: 10px;
            border-radius: 20px;
            cursor: pointer;
            z-index: 10;
            color: #111;
            border: 1px solid var(--light);
        }
        .booking{
            background-color: #c0362e;
            color: #e7e5e5;
            border-radius: 10px;
            padding: 10px;
            cursor: default;
        }
        #logout{
            background:transparent;
            margin-right: 5px;
            filter: invert(1);
        }
        .hamburger-menu {
            position: relative;
            display: none;
        }
        .hamburger-buttons{
            display: none;
            background-color: var(--dark);
            padding: 5px;
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
        }
    </style>
    <link rel="stylesheet" href="c.css">
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
                    <a href="My_Bookings.php"><li><span></span>My Bookings</li></a>
                    <li class="except booking">Profile</li>
                    <li id="logout_show" onclick="logout1();"><span></span><img src="logout1.png" width="15px" height="19px" id="logout">Log Out</li>

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
                <a href="Website.php"><li>Home</li></a>
                <li id="login" class="logintext except" onclick="display();">Login</li>
                <a href="All_Movies.php" onclick="booking();"><li>All Movies</li></a>
                <a href="My_Bookings.php" onclick="booking();"><li>My Bookings</li></a>
                <a href="ProfilePicUpload.php" onclick="booking();"><li>Profile</li></a>
                <li id="logout_show" onclick="logout1();"><img src="https://static-00.iconduck.com/assets.00/log-out-icon-2048x2048-cru8zabe.png" width="15px" id="logout">Log Out</li>
                <li><img src="light-mode.png" alt="" width="20" height="20" id="themelogo1" onclick="changeTheme();" title="Dark Theme"></li>
            </ul>
        </div>
    </div>
    <div class="center-align">
        <div class="outer">
            <div class="profile-pic">
                <div class="profile-outer">
                    <div class="camera">
                        <img src="cameraIcon.png">
                    </div>
                    <div class="actual-pic">
                        <img src="" alt="" id="pfp" width="140px">
                    </div>
                    <form id="uploadForm" enctype="multipart/form-data">
                        <input type="file" id="fileInput" name="image">
                    </form>
                </div>
            </div>
            <div class="buttons">
                <button type="button" id="upload-button" onclick="uploadImage()">Upload Image</button>
                <button type="button" id="remove-button" onclick="removeImage()">Remove Profile Image</button>
            </div>
            <div class="about">
                <b><span id="username1">Alex</span></b>
                <b><span style="font-size: 20px;">Contact Infomation</span></b>
                <div style="display: flex;gap:10px;">
                    <b><span>Email: </span></b>
                    <span id="email">email</span>
                    <input type="email" placeholder="Enter new Email" id="emailForm">
                    <button onclick="editField('email',this);" style="color: #111;">Edit</button>
                </div>
                <div style="display: flex;gap:10px;">
                    <b><span>DOB: </span></b>
                    <span id="dob">email</span>
                    <input type="date" placeholder="Please Update DOB" id="dobForm">
                    <button onclick="editField('dob',this);" style="color: #111;">Edit</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        let pfp = document.getElementById("pfp");
        let username = document.getElementById("username1");
        let remove = document.getElementById("remove-button");
        let email = document.getElementById("email");
        let dob = document.getElementById("dob");
    </script>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie_ticket";
    $conn = new mysqli($servername, $username, $password, $dbname, 4306);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql1 = "SELECT User_Image FROM details WHERE Username = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bind_param("s", $_SESSION['user-website']);

    if ($stmt1->execute()) {
        $result = $stmt1->get_result();
        $row = $result->fetch_assoc();
        if (!empty($row["User_Image"])) {
            $blobData = $row["User_Image"];
            $blobUrl = 'data:image/jpeg;base64,' . base64_encode($blobData);
            ?>
            <script>
                pfp.src = '<?php echo $blobUrl; ?>';
                username.innerHTML = '<?php echo $_SESSION['user-website']?>';
            </script>
            <?php
        } 
        else {
            ?>
            <script>
                pfp.src = "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png";
                remove.style.display = 'none';
                username.innerHTML = '<?php echo $_SESSION['user-website']?>';
            </script>
            <?php
        }
    } 
    else {
        echo "Error executing query: " . $stmt1->error;
        ?>
        <script>
            username.innerHTML = '<?php echo $_SESSION['user-website']?>';
        </script>
        <?php
    }
    $stmt1->close();
    $select = $conn->prepare("SELECT * FROM details where Username = ?");
    $select->bind_param("s",$_SESSION['user-website']);
    $select->execute();
    $select_result = $select->get_result();
    $data = $select_result->fetch_all(MYSQLI_ASSOC);
    if(!empty($data)){
        echo "<script>";
        echo "email.innerHTML = '".$data[0]['E_mail']."';";
        echo "dob.innerHTML = '".$data[0]['DOB']."';";
        echo "</script>";
    }


    if(isset($_FILES['image'])) {
        
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_data = file_get_contents($file_tmp);

        $sql = "UPDATE details SET User_Image = ? WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $file_data,$_SESSION['user-website']);
        
        if ($stmt->execute() === TRUE) {
            echo "<script>";
            echo "window.location.reload();";
            echo "</scrip>";
        } 
        else {
            echo "Error uploading file: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
    if(isset($_POST['remove_image'])) {
        $sql = "UPDATE details SET User_Image = NULL WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_SESSION['user-website']);
        
        if ($stmt->execute() === TRUE) {
            echo "Image removed successfully!";
        } else {
            echo "Error removing image: " . $conn->error;
        }
    
        $stmt->close();
    }
    if(isset($_POST['update_email'])){
        $update = $conn->prepare("UPDATE details SET E_mail = ? WHERE Username = ?");
        $update->bind_param("ss",$_COOKIE['Email'],$_SESSION['user-website']);
        $update->execute();
        $conn->commit();
    }
    if(isset($_POST['update_dob'])){
        $update = $conn->prepare("UPDATE details SET DOB = ? WHERE Username = ?");
        $update->bind_param("ss",$_COOKIE['DOB'],$_SESSION['user-website']);
        $update->execute();
        $conn->commit();
    }
    
    ?>
    
    <script>
        const fileInput = document.getElementById('fileInput');
        const statusElement = document.getElementById('upload-button');

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                statusElement.style.display = 'grid';
            } 
            else {
                statusElement.style.display = 'none';
            }
        });
        function uploadImage() {
            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];

            const formData = new FormData();
            formData.append('image', file);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        window.location.reload();
                    } else {
                        document.getElementById('status').textContent = 'Error uploading image.';
                    }
                }
            };

            xhr.send(formData);
        }
        function removeImage() {
            const formData = new FormData();
            formData.append('remove_image', 'true');

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        window.location.reload();
                    } else {
                        alert('Error removing image. Please try again later.');
                    }
                }
            };

            xhr.send(formData);
        }
        function editField(field,ele) {
            if(ele.innerHTML == "Save"){
                if(field == "email"){
                    let email = document.getElementById("emailForm").value;
                    if(email.length != 0){
                        document.cookie = "Email="+email+";";
                        const formData = new FormData();
                        formData.append('update_email', 'true');

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>');

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    window.location.reload();
                                } else {
                                    alert('Error updating email. Please try again later.');
                                }
                            }
                        };

                        xhr.send(formData);
                    }
                }
                else if(field == "dob"){
                    let dob = document.getElementById("dobForm").value;
                    if(dob.length != 0){
                        document.cookie = "DOB="+dob+";";
                        const formData = new FormData();
                        formData.append('update_dob', 'true');

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?php echo $_SERVER["PHP_SELF"]; ?>');

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    window.location.reload();
                                } else {
                                    alert('Error updating DOB. Please try again later.');
                                }
                            }
                        };

                        xhr.send(formData);
                    }
                }
            }
            else{
                document.getElementById(field).style.display = 'none';
                document.getElementById(field + 'Form').style.display = 'block';
                ele.innerHTML = "Save";
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
            let theme = document.getElementById("themelogo");
            let logout = document.getElementById("logout");
            let root = document.documentElement;
            if (theme.src.endsWith("night-mode.png")) {
                theme.src = "light-mode.png";
                theme.title = "Light Theme";
                logout.style.filter = "invert(1)";
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
                logout.style.filter = "none";

                let darkColor = getComputedStyle(root).getPropertyValue('--dark').trim();
                let lightColor = getComputedStyle(root).getPropertyValue('--light').trim();

                root.style.setProperty('--dark', lightColor);
                root.style.setProperty('--light', darkColor);
            }
        }
        function logout1(){
            if(confirm("Do you want to log out?")){
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'clear_session.php', true);
                xhr.send();
                window.location.href = "Website.php";
                document.cookie = "theme = dark;";
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
