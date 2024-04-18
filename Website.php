<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A³I Website</title>
    <link rel="icon" href="logo2.png">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&family=Poppins:wght@300&display=swap');

        /* html{
            color-scheme: dark;
        } */

        body {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-size: 14px;
            font-family: 'Poppins';
            /* transition: 0.2s; */
        }

        :root {
            --light: #161414 ;
            --dark: #e7e5e5;
        }

        * {
            color: var(--light);
            background-color: var(--dark);
            transition: 0.2s;
        }

        nav {
            display: flex;
            width: 98vw;
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
            border-radius: 10px;
        }

        li:hover span {
            background-color: #c0362e;
            width: 100%;
            transition: 0.4s;
            transform: scale(1.2);
        }

        #logout_show:hover #logout{
            filter: invert(1);
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

        .login {
            position: fixed;
            top: 40px;
            width: 60%;
            left: 300px;
            border-radius: 20px;
            /* margin: auto; */
            display: none;
            justify-content: center;
            align-items: center;
            height: auto;
            /* padding-top: 40px;
            padding-bottom: 40px; */
            background-image: url(https://c4.wallpaperflare.com/wallpaper/89/553/173/black-background-wood-darker-wallpaper-preview.jpg);
            /* background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40529/White_Background_generated.jpg); */
            /* background-color: white; */
            /* backdrop-filter: blur(4px); */
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            z-index: 100;
            animation: in-animation 0.3s;
        }

        @keyframes in-animation {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }   
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }
        .form-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: transparent;
        }

        .input-container {
            position: relative;
            user-select: none;
        }

        label:not(.exception) {
            color: white;
            transition: transform 0.3s;
            position: absolute;
            top: 20px;
            left: 7px;
        }

        input:not(.exc) {
            border-top: 0;
            border-left: 0;
            border-right: 0;

            background: transparent;
            color: wheat;
            text-align: start;
            outline: none;
            padding-bottom: 3px;
            width: 290px;
        }

        .input-container:hover label {
            transform: translateY(-20px);
        }

        form {
            background-color: transparent;
            backdrop-filter: blur(3px);
            width: 43%;
            height: auto;
            margin: 90px;
            padding-bottom: 15px;
            border: 1px white solid;
            border-radius: 7%;
        }

        form * {
            background: inherit;
        }

        .aa {
            text-decoration: none;
            color: floralwhite;
            background-color: rgba(0, 0, 0, 0.421);
            padding: 9px;
            border-radius: 20px;
        }

        .ok {
            background-color: white;
            color: #1c1b1b;
            border-radius: 50px;
            padding: 7px;
            padding-left: 26%;
            padding-right: 26%;
            font-size: 20px;
            cursor: pointer;
            text-decoration: none;
            color: rgba(10, 32, 59, 255);
        }

        .bb {
            text-decoration: none;
            color: black;
        }

        .show {
            background: transparent;
            border: 0;
            font-size: 33px;
            user-select: none;
            cursor: pointer;
            padding: 0;
            margin: 0;
        }

        .cross {
            position: absolute;
            right: -230px;
            background-color: white;
            color: black;
            border-radius: 50%;
            padding: 6px 9px;
            cursor: pointer;
        }

        .sign-up {
            margin-top: 20px;
        }

        .sign-up span {
            color: white;
        }

        .sign {
            text-decoration: underline;
            cursor: pointer;
        }

        .confirm-check {
            color: #FFF;
        }

        .dob {
            transform: translate(-25px, 20px);
        }

        .confirm-check1 {
            color: #c0362e;
            position: absolute;
        }
        .log-sign {
            height: 600px;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .BackArrow {
            position: absolute;
            color: black;
            left: -220px;
            background: #e7e5e5;
            padding: 3px;
            padding-top: 1px;
            padding-bottom: 3px;
            font-size: 20px;
            border-radius: 50%;
            cursor: pointer;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 600px;
            width: 100vw;
            margin: auto;
            gap: 30px;
        }
        
        .content img {
            border-radius: 20px;
        }

        .card {
            position: relative;
            height: auto;
            padding: 5px;
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            box-shadow: 1px 1px 10px #6b5071;
            border-radius: 20px;
            transition: 0.4s;
            cursor: pointer;
        }
        @media (max-width: 1040px) {
            .content{
                flex-direction: column;
                gap: 0;
            }
            .card{
                scale: 0.85;
            }
        }
        .card:hover {
            transform: scale(1.1);
        }

        .card1 {
            display: flex;
            justify-content: center;
        }

        .card1:hover .img-img1 {
            filter: blur(5px);
            opacity: 0.6;
            transition: 0.4s;
        }
        
        #card1_name,
        #card2_name,
        #card3_name{
            color: #e7e5e5 !important;
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
        .img1{
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 3px;
        }
        .img1 *{
            margin: 0;
        }
        .content-1 {
            background: transparent;
            font-family: 'Orbitron';
            font-size: 25px;
            position: absolute;
            color: white;
            z-index: -1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            text-align: center;
        }
        
        i{
            align-self: center;
            justify-content: center;
            background: transparent;
        }
        .card1:hover .content-1 {
            z-index: 10;
            transition: 0.2s;
        }

        .content-1 span {
            color: #e7e5e5;
            font-size: 15px;
            padding: 10px;
            border-radius: 20px;
            background-color: #c0362e;
            cursor: pointer;
            text-align: center;
            
        }
        .content-1 a,
        .content-2 a,
        .content-3 a{
            margin-top: 15px;
        }
        .content-2 {
            background: transparent;
            font-family: 'Orbitron';
            font-size: 25px;
            position: absolute;
            color: #e7e5e5;
            z-index: -1;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
        
        .content-2 span {
            color: #e7e5e5;
            font-size: 15px;
            padding: 10px;
            border-radius: 20px;
            background-color: #c0362e;
            cursor: pointer;
            text-align: center;
        }

        .content-3 {
            background: transparent;
            font-family: 'Orbitron';
            font-size: 25px;
            position: absolute;
            color: #e7e5e5;
            z-index: -1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
            text-align: center;
        }

        .content-3 span {
            color: #e7e5e5;
            font-size: 15px;
            padding: 10px;
            border-radius: 20px;
            background-color: #c0362e;
            cursor: pointer;
            text-align: center;
        }

        .oppenheimer {
            background-image: url(https://www.koimoi.com/wp-content/new-galleries/2023/07/oppenheimer-full-movie-in-hd-leaked-online-christopher-nolans-biographical-thriller-faces-wrath-of-piracy-is-available-to-download-illegally.jpg);
            /* opacity: 0.3; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 90%;
            width: 98vw;
            margin: auto;
            display: flex;
            /* justify-content: center; */
            animation: in-animation-oppen 0.5s;
        }

        @keyframes in-animation-oppen {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .oppenheimer * {
            background-color: transparent;
            opacity: 1;
            font-family: 'Poppins';
            color: #e7e5e5;
        }

        .oppen-image {
            margin-top: 5px;
            backdrop-filter: blur(7px);
            /* border-radius: 20px; */
            background-color: rgba(0, 0, 0, 0.5);
            /* margin-top: 20px; */
            min-height: 700px;
            /* border: 2px solid ; */
            width: 100%;
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
        }

        .oppen-image img {
            box-shadow: 1px 1px 10px var(--dark);
            border-radius: 20px;
            margin-left: 100px;
        }

        .oppen-image-image {
            z-index: 3;
            display: flex;
            justify-content: center;
            flex: 1;

        }

        .oppen-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #e7e5e5;
            height: 500px;
            flex: 1;
        }

        .oppen-content h2,
        .oppen-content h3 {
            margin-bottom: 25px;
            color: #e7e5e5;
            background-color: rgba(0, 0, 0, 0.221);
            padding: 7px;
            border-radius: 10px;
        }

        .oppen-content .book {
            color: #e7e5e5;
            background-color: #c0362e;
            padding: 10px;
            border-radius: 20px;
            cursor: pointer;
        }

        a {
            background: transparent;
            margin: 0;
            padding: 0;
            text-decoration: none;
            transition: 0.3s;
        }

        .seats {
            display: none;
            flex-direction: column;
            margin-top: 20px;
        }

        .first-row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .second-row {
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

        .select-seats {
            display: flex;
            background-color: #a246b7;
            justify-content: center;
            padding: 5px;
            border-radius: 20px;
            margin-bottom: 20px;
        }

        .seat-number {
            display: flex;
            font-family: 'Orbitron';
            justify-content: space-around;
            gap: 5px;
            margin-bottom: 5px;
        }
        .seat-number span,
        .seat-number1 span,
        .seat-number2 span,
        .seat-alpha p,
        .seat-alpha1 p,
        .seat-alpha2 p{
            background-color: rgba(0, 0, 0, 0.221);
            padding: 5px 8px;
            color: #FFF;
            border-radius: 5px;
        }
        .seat-alpha {
            position: absolute;
            top: 88px;
            left: -30px;
            margin-right: 5px;
        }

        .selected {
            position: absolute;
            top: 40px;
        }

        .seats-selected {
            position: fixed;
            display: none;
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

        .book {
            background-color: #c0362e;
            padding: 10px;
            font-size: 20px;
            border-radius: 20px;
            cursor: pointer;
        }

        .opacity-kam {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            background-color: rgba(0, 0, 0, 0.221);
        }

    
        #selected_seats {
            font-size: 30px;
            margin-bottom: 20px;
        }
        .avengers {
            background-image: url(https://c4.wallpaperflare.com/wallpaper/212/657/279/the-avengers-avengers-endgame-ant-man-avengers-endgame-black-widow-hd-wallpaper-preview.jpg);
            /* opacity: 0.3; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 90%;
            width: 98vw;
            margin: auto;
            display: flex;
            /* justify-content: center; */
            animation: in-animation-oppen 0.5s;
        }
        .avengers * {
            background-color: transparent;
            opacity: 1;
            font-family: 'Poppins';
            color: #e7e5e5;
        }
        .seats-selected1 {
            position: fixed;
            display: none;
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
        .avengers-image {
            margin-top: 5px;
            backdrop-filter: blur(4px);
            /* border-radius: 20px; */
            background-color: rgba(0, 0, 0, 0.5);
            /* margin-top: 20px; */
            min-height: 700px;
            /* border: 2px solid ; */
            width: 100%;
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
        }

        .avengers-image img {
            box-shadow: 1px 1px 10px var(--dark);
            border-radius: 20px;
            margin-left: 100px;
        }

        .avengers-image-image {
            z-index: 3;
            display: flex;
            justify-content: center;
            flex: 1;

        }

        .avengers-content {
            /* width: 50%; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 500px;
            flex: 1;
        }

        .avengers-content h2,
        .avengers-content h3{
            margin-bottom: 25px;
            color: #e7e5e5;
            background-color: rgba(0, 0, 0, 0.221);
            border-radius: 10px;
            padding: 7px;
        }

        .avengers-content .book {
            color: #e7e5e5;
            background-color: #c0362e;
            padding: 10px;
            border-radius: 20px;
            cursor: pointer;
        }
        .select-seats1 {
            display: flex;
            background-color: #a246b7;
            justify-content: center;
            padding: 5px;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .seat-number1 {
            display: flex;
            font-family: 'Orbitron';
            justify-content: space-around;
            gap: 5px;
            margin-bottom: 5px;
        }

        .seat-alpha1 {
            position: absolute;
            top: 88px;
            left: -30px;
            margin-right: 5px;
        }
        .first-row1 {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .second-row1 {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .book1 {
            background-color: #c0362e;
            padding: 10px;
            font-size: 20px;
            border-radius: 20px;
            cursor: pointer;
        }
        .seats-seats1 {
            height: 20px;
            width: 20px;
            background-color: white;
            border-radius: 50%;
            padding: 2px;
            padding-bottom: 4px;
            transition: 0.2s;
            cursor: pointer;
        }

        .seats-seats1:hover {
            transform: scale(1.2);
            transition: 0.2s;
        }
        #selected_seats1 {
            font-size: 30px;
            margin-bottom: 20px;
        }
        .batman {
            background-image: url(batman.jpg);
            /* opacity: 0.3; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100% 90%;
            width: 98vw;
            margin: auto;
            display: flex;
            /* justify-content: center; */
            animation: in-animation-oppen 0.5s;
        }
        .batman * {
            background-color: transparent;
            opacity: 1;
            font-family: 'Poppins';
            color: #e7e5e5;
        }
        .seats-selected2 {
            position: fixed;
            display: none;
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
        .batman-image {
            margin-top: 5px;
            backdrop-filter: blur(4px);
            /* border-radius: 20px; */
            background-color: rgba(0, 0, 0, 0.5);
            /* margin-top: 20px; */
            min-height: 700px;
            /* border: 2px solid ; */
            width: 100%;
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center;
        }

        .batman-image img {
            box-shadow: 1px 1px 10px var(--dark);
            border-radius: 20px;
            margin-left: 100px;
        }

        .batman-image-image {
            z-index: 3;
            display: flex;
            justify-content: center;
            flex: 1;

        }

        .batman-content {
            /* width: 50%; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            /* border: 1px solid; */
            height: 500px;
            /* align-items: center;
            justify-content: center; */
            flex: 1;
        }

        .batman-content h2,
        .batman-content h3 {
            margin-bottom: 25px;
            color: #e7e5e5;
            background-color: rgba(0, 0, 0, 0.221);
            border-radius: 10px;
            padding: 7px;
        }

        .batman-content .book {
            color: #e7e5e5;
            background-color: #c0362e;
            padding: 10px;
            border-radius: 20px;
            cursor: pointer;
        }
        .select-seats2 {
            display: flex;
            background-color: #a246b7;
            justify-content: center;
            padding: 5px;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .seat-number2 {
            display: flex;
            font-family: 'Orbitron';
            justify-content: space-around;
            gap: 5px;
            margin-bottom: 5px;
        }

        .seat-alpha2 {
            position: absolute;
            top: 88px;
            left: -30px;
            margin-right: 5px;
        }
        .first-row2 {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .second-row2 {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .book2 {
            background-color: #c0362e;
            padding: 10px;
            font-size: 20px;
            border-radius: 20px;
            cursor: pointer;
        }
        .seats-seats2 {
            height: 20px;
            width: 20px;
            background-color: white;
            border-radius: 50%;
            padding: 2px;
            padding-bottom: 4px;
            transition: 0.2s;
            cursor: pointer;
        }

        .seats-seats2:hover {
            transform: scale(1.2);
            transition: 0.2s;
        }
        #selected_seats2 {
            font-size: 30px;
            margin-bottom: 20px;
        }
        #logout{
            background:transparent;
            margin-right: 5px;
        }
        #logout_show{
            display: none;
        }
    </style>
</head>

<body>
    <nav class="box hidden">
        <div class="img">
            <a href="Website.php"><img src="logo2.png" width="190px" id="logo"></a>
        </div>
        <div class="list">
            <ul>
                <a href="Website.php"><li><span></span>Home</li></a>
                <li id="login" class="logintext except" onclick="display();"><span></span>Login</li>
                <a href="All_Movies.php" onclick="booking();"><li><span></span>All Movies</li></a>
                <a href="My_Bookings.php" onclick="booking();"><li><span></span>My Bookings</li></a>
                <a href="ProfilePicUpload.php" onclick="booking();"><li><span></span>Profile</li></a>
                <li id="logout_show" onclick="logout1();"><span></span><img src="https://static-00.iconduck.com/assets.00/log-out-icon-2048x2048-cru8zabe.png" width="15px" id="logout">Log Out</li>
                <li><img src="light-mode.png" alt="" width="20" height="20" id="themelogo" onclick="changeTheme();" title="Dark Theme"></li>
            </ul>
        </div>
    </nav>
    <section class="login box hidden" id="login-section">
        <div class="opacity-kam log-sign">
            <form action="" method="GET">
                <button type="button" class="cross" onclick="cross();">X</button>
                <div class="form-group">
                    <h2 style="color: #e7e5e5;"> Login </h2>
                    <br><br>
                    <div class="input-container">
                        <input type="email" id="email" name="email2" required onfocus="transformLabel(this)">
                        <label for="email">E-mail </label>
                        <img src="white-email-icon-28-removebg-preview.png" width="40" height="40">

                    </div><br><br>
                    <div class="input-container">
                        <input type="password" id="pass" name="password1" required onfocus="transformLabel(this)">
                        <label for="password">Password</label>
                        <span id="show" class="show" title="Show/Hide Password" onclick="show();">🔒</span>

                        <!-- <img src="lock-removebg-preview.png" width="39" height="39"> -->

                    </div><br>
                    <div id="wrong_pass"></div>
                    <br>


                    <div id="confirm-check"></div><br><br>
                    <div style="margin-left: 40%;">
                        <input class="exc" type="checkbox" id="checkbox">
                        <label class="exception" for="checkbox" style="color: white;">Remember Me</label>
                    </div><br><br>
                    <div>
                        <a href="#" class="aa">Forgot Password</a>
                    </div><br><br>
                    <button class="ok" style="color: #1c1b1b;" id="log-button" name="submit1" onsubmit="check2();">Log In</button>
                    <div class="sign-up">
                        <span>Don't have an account? <span class="sign" onclick="display1();">Sign Up</span></span>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="login box hidden" id="sign-section">
        <div class="opacity-kam log-sign">
            <form action="" method="GET">
                <button type="button" class="cross" onclick="cross1();">X</button>
                <div class="form-group">
                    <h2 style="color: floralwhite;"> Sign Up </h2>
                    <br>
                    <button type="button" class="BackArrow" onclick="BackArrow();">←</button>
                    <div class="input-container">
                        <input type="text" id="user" required onfocus="transformLabel(this)" name="username">
                        <label for="user">Set Username</label>
                        <img src="user.png" width="35" height="35" style="filter: invert();">

                    </div><br>
                    <div id="used_username"></div>
                    <br>

                    <div class="input-container">
                        <input type="email" id="email1" required onfocus="transformLabel(this)" name="email">
                        <label for="email1">Set E-mail </label>
                        <img src="white-email-icon-28-removebg-preview.png" width="40" height="40">

                    </div><br><br>
                    <div class="input-container">
                        <input type="password" id="pass1" required onfocus="transformLabel(this)" name="password">
                        <label for="pass1">Set Password</label>
                        <span id="show1" class="show" title="Show/Hide Password" onclick="show1();">🔒</span>

                    </div><br><br>

                    <div class="input-container" id="confirm1">
                        <input type="password" id="pass-o1" required onfocus="transformLabel(this)" name="confirm">
                        <label for="pass-o1">Confirm Password</label>
                        <span id="show3" class="show" title="Show/Hide Password" onclick="show3();">🔒</span>
                    </div><br>
                    <div id="confirm-check1"></div><br>
                    <div class="input-container dob">
                        <div style="color: white;margin-bottom: 2px;margin-left: 7px;">DOB:</div>
                        <input type="date" id="dob" required onfocus="transformLabel(this)" name="dob">
                    </div>
                    <br><br>
                    <button class="ok" style="color: #1c1b1b;" id="log-button1" name="submit2" onsubmit="check1();">Sign In</button>
                </div>
            </form>
        </div>
    </section>

    <section class="content box hidden">
        <div class="card card1">
            <div class="img1">
                <img src="https://m.media-amazon.com/images/M/MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_.jpg" width="300px" height="400px" class="img-img1" id="first">
                <div class="content-1" >
                    <i id="card1_name">Oppenheimer</i>
                    <a href="#oppen"><span>Book Tickets</span></a>
                </div>
            </div>
        </div>
        <div class="card card1">
            <div class="img1">
                <img src="https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg" width="300px" height="400px" class="img-img1" id="second">
                <div class="content-1 content-2">
                <i id="card2_name"> Avengers: End Game</i>
                    <a href="#avengers"><span>Book Tickets</span></a>
                </div>
            </div>
        </div>
        <div class="card card1">
            <div class="img1">
                <img src="https://images.moviesanywhere.com/bd47f9b7d090170d79b3085804075d41/c6140695-a35f-46e2-adb7-45ed829fc0c0.jpg" width="300px" height="400px" class="img-img1" id="third">
                <div class="content-1 content-3">
                <i id="card3_name"> The Dark Knight</i>
                    <a href="#batman"><span>Book Tickets</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="oppenheimer box hidden" id="oppen">
        <div class="seats-selected" style="display: none;" id="seats_selected">
            <div id="selected_seats"></div>
            <div class="book" onclick="booked2();">Book Tickets</div>
            <button type="button" onclick="seat_display();">X</button>
        </div>
        <div class="oppen-image" id="oppen-image">
            <div class="oppen-image-image">
                <img src="https://m.media-amazon.com/images/M/MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_.jpg" width="300px" height="430px" id="first_Details">
            </div>
            <div class="oppen-content">
                <h2 id="detail1_name">OPPENHEIMER</h2>
                <h3>Timing: Today at 7pm</h3>
                <h3>Ticket Price: 200Rs</h3>
                <div class="seats box1 hidden" id="seats_div">
                    <span class="select-seats box1 hidden">Select Seats</span>
                    <br>
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
                </div>
                <span class="book" onclick="seat();" id="seat">Book Tickets</span>
            </div>
        </div>
    </section>
    <section class="avengers box hidden" id="avengers">
        <div class="seats-selected" style="display: none;" id="seats_selected1">
            <div id="selected_seats1"></div>
            <div class="book1"  onclick="booked1();">
                Book Tickets
            </div>
            <button type="button" onclick="seat_display3();">X</button>
        </div>
        <div class="avengers-image" id="avengers-image">
            <div class="avengers-image-image">
                <img src="https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg" width="300px" height="430px" id="second_Details">
            </div>
            <div class="avengers-content">
                <h2 id="detail2_name">Avengers</h2>
                <h3>Timing: Today at 9pm</h3>
                <h3>Ticket Price: 250Rs</h3>
                <div class="seats box2 hidden" id="seats_div1">
                    <span class="select-seats1 box2 hidden">Select Seats</span>
                    <br>
                    <div class="seat-number1">
                        <span style="margin-left: 3px;">1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                        <span>6</span>
                    </div>
                    <div class="seat-alpha1">
                        <p>A</p>
                        <p>B</p>
                    </div>
                    <div class="first-row1 ">
                        <div class="seats-seats1" style="background-color: white;" id="A1" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="A2" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="A3" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="A4" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="A5" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="A6" onclick="seat_back1(this);">💺</div>
                    </div>
                    <div class="second-row1 ">
                        <div class="seats-seats1" style="background-color: white;" id="B1" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="B2" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="B3" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="B4" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="B5" onclick="seat_back1(this);">💺</div>
                        <div class="seats-seats1" style="background-color: white;" id="B6" onclick="seat_back1(this);">💺</div>
                    </div>
                </div>
                <span class="book1" onclick="seat1();" id="seat1">Book Tickets</span>
            </div>
        </div>
    </section>
    <section class="batman box hidden" id="batman">
        <div class="seats-selected" style="display: none;" id="seats_selected2">
            <div id="selected_seats2"></div>
            <div class="book2"  onclick="booked();">
                Book Tickets
            </div>
            <button type="button" onclick="seat_display4();">X</button>
        </div>
        <div class="batman-image" id="batman-image">
            <div class="batman-image-image">
                <img src="https://images.moviesanywhere.com/bd47f9b7d090170d79b3085804075d41/c6140695-a35f-46e2-adb7-45ed829fc0c0.jpg" width="300px" height="430px" id="third_Details">
            </div>
            <div class="batman-content">
                <h2 id="detail3_name">Batman</h2>
                <h3>Timing: Today at 10pm</h3>
                <h3>Ticket Price: 200Rs</h3>
                <div class="seats box3 hidden" id="seats_div2">
                    <span class="select-seats2 box3 hidden">Select Seats</span>
                    <br>
                    <div class="seat-number2">
                        <span style="margin-left: 3px;">1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                        <span>6</span>
                    </div>
                    <div class="seat-alpha2">
                        <p>A</p>
                        <p>B</p>
                    </div>
                    <div class="first-row2 ">
                        <div class="seats-seats2" style="background-color: white;" id="A1" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="A2" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="A3" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="A4" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="A5" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="A6" onclick="seat_back2(this);">💺</div>
                    </div>
                    <div class="second-row2 ">
                        <div class="seats-seats2" style="background-color: white;" id="B1" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="B2" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="B3" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="B4" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="B5" onclick="seat_back2(this);">💺</div>
                        <div class="seats-seats2" style="background-color: white;" id="B6" onclick="seat_back2(this);">💺</div>
                    </div>
                </div>
                <span class="book2" onclick="seat2();" id="seat2">Book Tickets</span>
            </div>
        </div>
    </section>
    <script>
        let login1 = false;
        let change123 = document.getElementById('login');
        let username1;
        let logout = document.getElementById('logout_show');
    </script>
    <?php
    if(isset($_SESSION['user-website'])) {
        $username = $_SESSION['user-website'];
    } 
    else {
        $username = ''; 
    }
    $count = 0;
    $count1 = 0;
    if (isset($_GET['submit2'])) {
        $user = $_GET['username'];
        $email = $_GET['email'];
        $pass = $_GET['password'];
        $dob = $_GET['dob'];

        $conn = mysqli_connect("localhost", "root", "", "movie_ticket",4306);

        if (!$conn) {
            echo "<script>";
            echo "alert('Couldn't Connect to database')";
            echo "</>";
            die("Failed to connect: " . mysqli_connect_error());
        } 
        else {
            $select_e = $conn->prepare("SELECT * FROM details WHERE E_mail = ?");
            $select_e->bind_param("s", $email);
            $select_e->execute();
            $select_e_result = $select_e->get_result();
            $data_e = $select_e_result->fetch_all(MYSQLI_ASSOC);
            $select_u = $conn->prepare("SELECT * FROM details WHERE Username = ?");
            $select_u->bind_param("s", $user);
            $select_u->execute();
            $select_u_result = $select_u->get_result();
            $data_u = $select_u_result->fetch_all(MYSQLI_ASSOC);
            if (!empty($data_e) || !empty($data_u)) {
                echo "<script>";
                echo "alert('This E-mail or Username is already registered');";
                echo "</scrip>";
            } 
            else {
                $insert = $conn->prepare("INSERT INTO details (Username, Password, E_mail, DOB) VALUES (?, ?, ?, ?)");
                $insert->bind_param("ssss", $user, $pass, $email, $dob);
                if ($insert->execute()) {
                    $conn->commit();
                    echo "<script>";
                    echo "alert('Successfully Logged In');";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert('Error, Try again');";
                    echo "</script>";
                }
            }
        }
    } 
    else if (isset($_GET['submit1'])) {
        $email1 = $_GET['email2'];
        $password = $_GET['password1'];
        $conn = new mysqli("localhost", "root", "", "movie_ticket",4306);
        if (!$conn) {
            die("Failed to connect: " . mysqli_connect_error());
        } 
        else {
            $select = $conn->prepare("SELECT * from details where E_mail = ?");
            $select->bind_param("s", $email1);
            $select->execute();
            $select_result = $select->get_result();
            $data = $select_result->fetch_all(MYSQLI_ASSOC);
            if (!empty($data)) {
                $_SESSION['user-website'] = $data[0]['Username'];
                if ($data[0]['Password'] === $password) {
                    echo "<script>";
                    echo "login1 = true;";
                    echo "username1 = '" . $data[0]['Username'] . "';";
                    echo "change123.textContent = 'Welcome! ' + username1;";
                    echo "change123.onclick = '';";
                    echo "change123.style = '';";
                    echo "change123.className = 'except';";
                    echo "change123.style.cursor = 'text';";
                    echo "logout.style.display = 'flex';";
                    echo "</script>";
                } 
                elseif ($data[0]['Password'] != $password) {
                    echo "<script>";
                    echo "alert('Wrong Password')";
                    echo "</script>";
                } 
                elseif ($data[0]['E_mail'] != $email1) {
                    echo "<script>";
                    echo "alert('Invalid E-mail')";
                    echo "</script>";
                } else {
                    $count1++;
                }
            } 
            else {
                echo "<script>";
                echo "alert('This E-mail is not registered');";
                echo "</script>";
            }
        }
    }
    ?>


    <!-- Javascript below -->

    <script>
        <?php if($username != ''): ?>
            change123 = document.getElementById('login');
            username1 = "<?php echo $username; ?>";
            change123.textContent = 'Welcome! ' + username1;
            change123.onclick = '';
            change123.style = '';
            change123.className = 'except';
            change123.style.cursor = 'text';
            logout.style.display = 'flex';
            login1 = true;
        <?php endif; ?>
        document.cookie = "username="+username1+";";
        const divs = document.querySelectorAll('.box');
        divs.forEach((div, index) => {
            setTimeout(() => {
                div.classList.add('visible');
            }, index * 200);
        });
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        function theme() {
            let theme1 = document.getElementById("themelogo");
            let root = document.documentElement;
            let oppen_image = document.getElementById("oppen-image");
            let avengers_image = document.getElementById("avengers-image");
            let batman_image = document.getElementById("batman-image");
            let logout_image = document.getElementById("logout");
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
                    oppen_image.style.background = "rgb(255,255,255,0.121)";
                    avengers_image.style.background = "rgb(255,255,255,0.121)";
                    batman_image.style.background = "rgb(255,255,255,0.121)";
                    logout_image.style.filter = "none";
                    let light = getComputedStyle(root).getPropertyValue("--light").trim();
                    let dark = getComputedStyle(root).getPropertyValue("--dark").trim();
                    root.style.setProperty("--dark", dark);
                    root.style.setProperty("--light", light);
                    document.cookie = "theme=light;";
                }
                else{
                    theme1.src = "light-mode.png";
                    theme1.title = "Light Mode";
    
                    oppen_image.style.background = "rgb(0,0,0,0.421)";
                    avengers_image.style.background = "rgb(0,0,0,0.421)";
                    batman_image.style.background = "rgb(0,0,0,0.421)";
                    logout_image.style.filter = "invert(1)";

                    let light = getComputedStyle(root).getPropertyValue("--light").trim();
                    let dark = getComputedStyle(root).getPropertyValue("--dark").trim();
                    root.style.setProperty("--dark", light);
                    root.style.setProperty("--light", dark);
                    document.cookie = "theme=dark;";
                }
            }
            else{
                logout_image.style.filter = "invert(1)";
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
            let logout_image = document.getElementById("logout");
            let root = document.documentElement;
            if (theme.src.endsWith("night-mode.png")) {
                theme.src = "light-mode.png";
                theme.title = "Light Theme";
                // getComputedStyle(root).getPropertyValue('--main-color');
                // root.style.setProperty('--main-color', 'red')

                oppen_image.style.background = "rgb(0,0,0,0.421)";
                avengers_image.style.background = "rgb(0,0,0,0.421)";
                batman_image.style.background = "rgb(0,0,0,0.421)";
                logout_image.style.filter = "invert(1)";

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

                oppen_image.style.background = "rgb(255,255,255,0.121)";
                avengers_image.style.background = "rgb(255,255,255,0.121)";
                batman_image.style.background = "rgb(255,255,255,0.121)";
                logout_image.style.filter = "none";

                let darkColor = getComputedStyle(root).getPropertyValue('--dark').trim();
                let lightColor = getComputedStyle(root).getPropertyValue('--light').trim();

                root.style.setProperty('--dark', lightColor);
                root.style.setProperty('--light', darkColor);
            }
        }
        function login() {
            let login_var = document.getElementById("login");
        }

        function transformLabel(input) {
            const label = input.nextElementSibling;
            label.style.transform = "translateY(-15px)";
        }

        function show() {
            let change = document.getElementById("pass");
            if (change.type === "password") {
                change.type = "text";
            } else if (change.type === "text") {
                change.type = "password";
            }
            let element = document.getElementById("show");
            if (element.textContent === "🔒") {
                element.textContent = "🔓";
            } else if (element.textContent == "🔓") {
                element.textContent = "🔒";
            }
        }

        function show1() {
            let change = document.getElementById("pass1");
            if (change.type === "password") {
                change.type = "text";
            } else if (change.type === "text") {
                change.type = "password";
            }
            let element = document.getElementById("show1");
            if (element.textContent === "🔒") {
                element.textContent = "🔓";
            } else if (element.textContent == "🔓") {
                element.textContent = "🔒";
            }

        }

        function show3() {
            let change = document.getElementById("pass-o1");
            if (change.type === "password") {
                change.type = "text";
            } else if (change.type === "text") {
                change.type = "password";
            }
            let element = document.getElementById("show3");
            if (element.textContent === "🔒") {
                element.textContent = "🔓";
            } else if (element.textContent == "🔓") {
                element.textContent = "🔒";
            }

        }

        function show2() {
            let change = document.getElementById("pass-o");
            if (change.type === "password") {
                change.type = "text";
            } else if (change.type === "text") {
                change.type = "password";
            }
            let element = document.getElementById("show2");
            if (element.textContent === "🔒") {
                element.textContent = "🔓";
            } else if (element.textContent == "🔓") {
                element.textContent = "🔒";
            }
        }

        function display() {
            let display = document.getElementById("login-section");
            display.style.display = "flex";
            display.style.transition = "0.3s";
        }

        function display1() {
            let display = document.getElementById("login-section");
            display.style.display = "none";
            let display1 = document.getElementById("sign-section");
            display1.style.display = "flex";
            display.style.transition = "0.3s";
        }

        function cross() {
            let display1 = document.getElementById("login-section");
            display1.style.display = "none";
        }

        function cross1() {
            let display1 = document.getElementById("sign-section");
            display1.style.display = "none";
        }

        function sign() {
            let confirm2 = document.getElementById("confirm");
            confirm2.style.display = "flex";
        }

        function check1() {
            let sign = document.getElementById("confirm-check1");
            let password = document.getElementById("pass1");
            let confirm = document.getElementById("pass-o1");
            if (password.value != confirm.value) {
                sign.textContent = "The Passwords do not match";
                sign.style.color = "#c0362e";
                sign.style.position = "absolute";
                sign.style.top = "400px";
                alert("The passwords do not match");
                event.preventDefault();
            } else {
                sign.textContent = "";
            }

        }

        function check2() {
            let count = "<?php echo $count1; ?>";
            if (count != 0) {
                let wrong_pass = document.getElementById('wrong_pass');
                wrong_pass.textContent = 'Wrong password';
                wrong_pass.style.color = 'red';
                event.preventDefault();
            }
        }

        function BackArrow() {
            let display = document.getElementById("login-section");
            display.style.display = "flex";
            let display1 = document.getElementById("sign-section");
            display1.style.display = "none";
        }
        let seat_selected1 = false;

        function both(){
            seat_display2();
            seat_green_count();
        }

        function both2(){
            seat_display3();
            seat_green_count1();
        }

        function both3(){
            seat_display4();
            seat_green_count2();
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
        let a = [];

        function seat_back(element) {
            if (element.style.backgroundColor == "white") {
                element.style.backgroundColor = "lightgreen";
            } else if (element.style.backgroundColor == "lightgreen") {
                element.style.backgroundColor = "white";
            }
        }

        let use_alert = false;
        let Tickets = 0;
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
                use_alert = false;
            } else {
                selected.textContent = "Selected Seats are: " + duplicate_seat;
                use_alert = true;
            }
            
        }

        function seat_display() {
            
            let seat_selected = document.getElementById("seats_selected");
            seat_selected.style.display = "none";
            
        }

        function seat_display2() {
            let seat_selected = document.getElementById("seats_selected");
            if (seat_selected.style.display == "flex") {
                seat_selected.style.display = "none";
            } else if (seat_selected.style.display == "none") {
                seat_selected.style.display = "flex";
            }
            
        }
        function seat_back1(element) {
            if (element.style.backgroundColor == "white") {
                element.style.backgroundColor = "lightgreen";
            } else if (element.style.backgroundColor == "lightgreen") {
                element.style.backgroundColor = "white";
            }
        }
        let seat_selected2 = false;

        function seat1() {
            document.getElementById("seat1").addEventListener("click", both2);
            seat_selected2 = true;
            let seats_div = document.getElementById("seats_div1");
            seats_div.style.display = "flex";
            const divs = document.querySelectorAll('.box2');
            divs.forEach((div, index) => {
                setTimeout(() => {
                    div.classList.add('visible');
                }, index * 500);
            });
        }
        let use_alert1 = false;
        function seat_green_count1() {
            let selected = document.getElementById("selected_seats1");
            let loop_seat = document.getElementsByClassName("seats-seats1");
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
                use_alert1 = false;
            } else {
                selected.textContent = "Selected Seats are: " + duplicate_seat;
                use_alert1 = true;
            }
        }
        function seat_display3() {
            let seat_selected = document.getElementById("seats_selected1");
            if (seat_selected.style.display == "flex") {
                seat_selected.style.display = "none";
            } else if (seat_selected.style.display == "none") {
                seat_selected.style.display = "flex";
            }
        }
        function seat_back2(element) {
            if (element.style.backgroundColor == "white") {
                element.style.backgroundColor = "lightgreen";
            } else if (element.style.backgroundColor == "lightgreen") {
                element.style.backgroundColor = "white";
            }
        }
        let seat_selected3 = false;

        function seat2() {
            document.getElementById("seat2").addEventListener("click", both3);
            seat_selected3 = true;
            let seats_div = document.getElementById("seats_div2");
            seats_div.style.display = "flex";
            const divs = document.querySelectorAll('.box3');
            divs.forEach((div, index) => {
                setTimeout(() => {
                    div.classList.add('visible');
                }, index * 500);
            });
        }
        let use_alert2 = false;
        function seat_green_count2() {
            let selected = document.getElementById("selected_seats2");
            let loop_seat = document.getElementsByClassName("seats-seats2");
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
                use_alert2 = false;
            } else {
                selected.textContent = "Selected Seats are: " + duplicate_seat;
                use_alert2 = true;
            }
        }
        function seat_display4() {
            let seat_selected = document.getElementById("seats_selected2");
            if (seat_selected.style.display == "flex") {
                seat_selected.style.display = "none";
            } else if (seat_selected.style.display == "none") {
                seat_selected.style.display = "flex";
            }
        }
        function splitOnCaps(word) {
            return word.split(/(?=[A-Z])/).join(' ');
        }
        let arr = [];
        function booked(){
            if(!login1){
                alert("Login first");
                event.preventDefault();
            }
            else{
                if(use_alert2){
                    document.cookie = "Movie_name = "+splitOnCaps(arr[2])+";";
                    document.cookie = "price = "+200+";";
                    document.cookie = "tickets = "+Tickets+";";
                    open('payment_gateway.php');
                }
                else{
                    alert("No seats are selected");
                }
            }
            
        }
        function booked1(){
            if(!login1){
                alert("Login first");
                event.preventDefault();
            }
            else{
                if(use_alert1){
                    document.cookie = "Movie_name = "+splitOnCaps(arr[1])+";";
                    document.cookie = "price = "+250+";";
                    document.cookie = "tickets = "+Tickets+";";
                    open('payment_gateway.php');
                }
                else{
                    alert("No seats are selected");
                }
            }
        }
        function booked2(){
            if(!login1){
                alert("Login first");
                event.preventDefault();
            }
            else{
                if(use_alert){
                    document.cookie = "Movie_name = "+splitOnCaps(arr[0])+";";
                    document.cookie = "price = "+200+";";
                    document.cookie = "tickets = "+Tickets+";";
                    open('payment_gateway.php');
                }
                else{
                    alert("No seats are selected");
                }
            }
            
        }
        function booking(){
            if(login1 == false){
                alert("Login first");
                event.preventDefault();
            }
        }
        function randomize(){
            let movies = ["Oppenheimer","TheDarkKnight","AvengersEndGame","KungFuPanda","GodzillaXKong1","Shaitaan","Yodha","DunePartTwo","DemonSlayerMovie","ManjummelBoys","TheOmen","12thFail","Maidaan","MadgaonExpress"];
            let first = document.getElementById("oppen");
            let second = document.getElementById("avengers");
            let third = document.getElementById("batman");
            let first_card = document.getElementById("first");
            let second_card = document.getElementById("second");
            let third_card = document.getElementById("third");
            let first_Details = document.getElementById("first_Details");
            let second_Details = document.getElementById("second_Details");
            let third_Details = document.getElementById("third_Details");
            let card1_name = document.getElementById("card1_name");
            let card2_name = document.getElementById("card2_name");
            let card3_name = document.getElementById("card3_name");
            let detail1_name = document.getElementById("detail1_name");
            let detail2_name = document.getElementById("detail2_name");
            let detail3_name = document.getElementById("detail3_name");
            let obj = {};
            let i = 0;
            while (i !== 3) {
                let r = Math.floor(Math.random() * movies.length);
                if (!obj[r]) {
                    obj[r] = true;
                    arr.push(movies[r]);
                    i++;
                }
            }
            first.style.backgroundImage = "url(" +arr[0]+"Back.jpg)";
            first_card.src = arr[0]+".jpg";
            first_Details.src = arr[0]+".jpg";
            if(arr[0] == "TheDarkKnight"){
                card1_name.innerHTML = "The Dark Knight";
                detail1_name.innerHTML = "The Dark Knight";
            }
            else if(arr[0] == "AvengersEndGame"){
                card1_name.innerHTML = "Avengers: End Game";
                detail1_name.innerHTML = "Avengers: End Game";
            }
            else if(arr[0] == "KungFuPanda"){
                card1_name.innerHTML = "Kung Fu Panda 4";
                detail1_name.innerHTML = "Kung Fu Panda 4";
            }
            else if(arr[0] == "GodzillaXKong1"){
                card1_name.innerHTML = "Godzilla X Kong";
                detail1_name.innerHTML = "Godzilla X Kong";
            }
            else if(arr[0] == "DunePartTwo"){
                card1_name.innerHTML = "Dune: Part Two";
                detail1_name.innerHTML = "Dune: Part Two";
            }
            else if(arr[0] == "DemonSlayerMovie"){
                card1_name.innerHTML = "Demon Slayer: Movie";
                detail1_name.innerHTML = "Demon Slayer: Movie - To the Hashira Training";
            }
            else{
                card1_name.innerHTML = splitOnCaps(arr[0]);
                detail1_name.innerHTML = splitOnCaps(arr[0]);
            }
            
            second.style.backgroundImage = "url(" +arr[1]+"Back.jpg)";
            second_card.src = arr[1]+".jpg";
            second_Details.src = arr[1]+".jpg";
            if(arr[1] == "TheDarkKnight"){
                card2_name.innerHTML = "The Dark Knight";
                detail2_name.innerHTML = "The Dark Knight";
            }
            else if(arr[1] == "AvengersEndGame"){
                card2_name.innerHTML = "Avengers: End Game";
                detail2_name.innerHTML = "Avengers: End Game";
            }
            else if(arr[1] == "KungFuPanda"){
                card2_name.innerHTML = "Kung Fu Panda 4";
                detail2_name.innerHTML = "Kung Fu Panda 4";
            }
            else if(arr[1] == "GodzillaXKong1"){
                card2_name.innerHTML = "Godzilla X Kong";
                detail2_name.innerHTML = "Godzilla X Kong";
            }
            else if(arr[1] == "DunePartTwo"){
                card2_name.innerHTML = "Dune: Part Two";
                detail2_name.innerHTML = "Dune: Part Two";
            }
            else if(arr[1] == "DemonSlayerMovie"){
                card2_name.innerHTML = "Demon Slayer: Movie";
                detail2_name.innerHTML = "Demon Slayer: Movie - To the Hashira Training";
            }
            else{
                card2_name.innerHTML = splitOnCaps(arr[1]);
                detail2_name.innerHTML = splitOnCaps(arr[1]);
            }
            third.style.backgroundImage = "url(" +arr[2]+"Back.jpg)";
            third_card.src = arr[2]+".jpg";
            third_Details.src = arr[2]+".jpg";
            if(arr[2] == "TheDarkKnight"){
                card3_name.innerHTML = "The Dark Knight";
                detail3_name.innerHTML = "The Dark Knight";
            }
            else if(arr[2] == "AvengersEndGame"){
                card3_name.innerHTML = "Avengers: End Game";
                detail3_name.innerHTML = "Avengers: End Game";
            }
            else if(arr[2] == "KungFuPanda"){
                card3_name.innerHTML = "Kung Fu Panda 4";
                detail3_name.innerHTML = "Kung Fu Panda 4";
            }
            else if(arr[2] == "GodzillaXKong1"){
                card3_name.innerHTML = "Godzilla X Kong";
                detail3_name.innerHTML = "Godzilla X Kong";
            }
            else if(arr[2] == "DunePartTwo"){
                card3_name.innerHTML = "Dune: Part Two";
                detail3_name.innerHTML = "Dune: Part Two";
            }
            else if(arr[2] == "DemonSlayerMovie"){
                card3_name.innerHTML = "Demon Slayer: Movie";
                detail3_name.innerHTML = "Demon Slayer: Movie - To the Hashira Training";
            }
            else{
                card3_name.innerHTML = splitOnCaps(arr[2]);
                detail3_name.innerHTML = splitOnCaps(arr[2]);
            }
        }
        function logout1(){
            if(confirm("Do you want to log out?")){
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'clear_session.php', true);
                xhr.send();
                window.location.href = "Website.php";
            }
        }
        randomize();
        window.addEventListener('unload', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'clear_session.php', true);
            xhr.send();
        });
    </script>
</body>
</html>