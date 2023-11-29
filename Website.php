<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A³I Website</title>
    <link rel="icon" href="logo-dark.png">
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
            --light: #e7e5e5;
            --dark: #161414;
        }

        * {
            color: var(--dark);
            background-color: var(--light);
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
            gap: 60px;
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
            background-image: url(https://img.freepik.com/free-vector/realistic-black-shimmer-background_23-2150083455.jpg?size=626&ext=jpg&ga=GA1.1.386372595.1698192000&semt=ais);
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

            /* border-end-end-radius: 10px; */
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
            /* background: rgba(255, 255, 255, 0.06); */
            background-color: transparent;
            backdrop-filter: blur(3px);
            width: 43%;
            height: auto;
            margin: 90px;
            padding-bottom: 15px;
            /* backdrop-filter: blur(3px); */
            border: 1px white solid;
            border-radius: 7%;
            /* display: none; */
        }

        form * {
            background: inherit;
            /* z-index: 999; */
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
            /* 15px */
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
            height: auto;
            height: 600px;
            /* border-bottom: 1px solid; */
            width: 98vw;
            margin: auto
                /* min-height: 500px; */
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
            /* border: 1px solid; */
            box-shadow: 1px 1px 10px #6b5071;
            border-radius: 20px;
            margin: 10px 15px;
            transition: 0.4s;
            cursor: pointer;
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
            transition: 0.4s;
        }

        .hidden {
            opacity: 0;
            transform: translateY(-20px);
            /* font-size: 100px; */
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .visible {
            opacity: 1;
            transform: translateY(0);
        }

        .content-1 {
            background: transparent;
            font-family: 'Orbitron';
            font-size: 30px;
            position: absolute;
            color: #e7e5e5;
            top: 42%;
            left: 18%;
            margin: auto;
            z-index: -1;
            /* transition: 0.2s; */
        }

        .card1:hover .content-1 {
            z-index: 10;
            transition: 0.2s;
        }

        .content-1 span {
            color: #e7e5e5;
            position: relative;
            left: 45px;
            font-size: 15px;
            margin-top: 15px;
            padding: 10px;
            border-radius: 20px;
            background-color: #c0362e;
            cursor: pointer;
        }

        /* .card1:hover .content-1::before{
            backdrop-filter: blur(4px);
            position: absolute;
            left: 45%;
            top: 50%;
            content: 'Oppenheimer';
            z-index: 998;
        } */
        .content-2 {
            font-size: 23px;
            left: 29px;
            margin-bottom: 110px;
        }

        .content-2 span {
            /* margin-top: 90px; */
            top: 15px;
            left: 60px;
        }

        .content-3 {
            font-size: 25px;
            left: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content-3 span {
            /* margin-top: 20px; */
            top: 10px;
            left: 8px;
            /* left: auto; */
        }

        i {
            position: relative;
            background: transparent;
            left: auto;
            color: #e7e5e5;
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

        .oppen-content h2 {
            margin-bottom: 25px;
            color: #e7e5e5;
            /* color: var(--dark); */

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
            gap: 27px;
            margin-bottom: 5px;
        }

        .seat-alpha {
            position: absolute;
            top: 85px;
            left: -20px;
            margin-right: 5px;
        }

        .selected {
            position: absolute;
            top: 40px;
        }

        .seats-selected {
            position: absolute;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 1px 1px 100px black;
            left: 19%;
            top: 50px;
            height: 70vh;
            width: 60vw;
            background-image: url(https://img.freepik.com/free-vector/realistic-black-shimmer-background_23-2150083455.jpg?size=626&ext=jpg&ga=GA1.1.386372595.1698192000&semt=ais);
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
            position: absolute;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 1px 1px 100px black;
            left: 19%;
            top: 50px;
            height: 70vh;
            width: 60vw;
            background-image: url(https://img.freepik.com/free-vector/realistic-black-shimmer-background_23-2150083455.jpg?size=626&ext=jpg&ga=GA1.1.386372595.1698192000&semt=ais);
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
            /* border: 1px solid; */
            height: 500px;
            /* align-items: center;
            justify-content: center; */
            flex: 1;
        }

        .avengers-content h2 {
            margin-bottom: 25px;
            color: #e7e5e5;
            /* color: var(--dark); */

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
            gap: 27px;
            margin-bottom: 5px;
        }

        .seat-alpha1 {
            position: absolute;
            top: 85px;
            left: -20px;
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
            position: absolute;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 1px 1px 100px black;
            left: 19%;
            top: 50px;
            height: 70vh;
            width: 60vw;
            background-image: url(https://img.freepik.com/free-vector/realistic-black-shimmer-background_23-2150083455.jpg?size=626&ext=jpg&ga=GA1.1.386372595.1698192000&semt=ais);
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

        .batman-content h2 {
            margin-bottom: 25px;
            color: #e7e5e5;
            /* color: var(--dark); */

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
            gap: 27px;
            margin-bottom: 5px;
        }

        .seat-alpha2 {
            position: absolute;
            top: 85px;
            left: -20px;
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
    </style>
</head>

<body>
    <nav class="box hidden">
        <div class="img">
            <img src="logo.png" width="200" height="130" id="logo">
        </div>
        <div class="list">
            <ul>
                <li id="login" class="logintext except" onclick="display();"><span></span>Login</li>
                <li><span></span>Book</li>
                <a href="My_Bookings.php" onclick="booking();"><li><span></span>My Bookings</li></a>
                <li><span></span>Profile</li>
                <li><img src="night-mode.png" alt="" width="20" height="20" id="themelogo" onclick="theme();" title="Dark Theme"></li>
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
                        <label for="user">Set Username </label>
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
                <img src="https://m.media-amazon.com/images/M/MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_.jpg" width="300px" height="400px" class="img-img1">
                <div class="content-1">
                    Oppenheimer
                    <a href="#oppen"><span>Book Tickets</span></a>
                </div>
            </div>
        </div>
        <div class="card card1">
            <div class="img1">
                <img src="https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg" width="300px" height="400px" class="img-img1">
                <div class="content-1 content-2">
                    Avengers: End Game<br>
                    <a href="#avengers"><span>Book Tickets</span></a>
                </div>
            </div>
        </div>
        <div class="card card1">
            <div class="img1">
                <img src="https://images.moviesanywhere.com/bd47f9b7d090170d79b3085804075d41/c6140695-a35f-46e2-adb7-45ed829fc0c0.jpg" width="300px" height="400px" class="img-img1">
                <div class="content-1 content-3">
                    The Dark Knight <br><i>(Literally me)</i>
                    <a href="#batman"><span>Book Tickets</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="oppenheimer box hidden" id="oppen">
        <div class="seats-selected" style="display: none;" id="seats_selected">
            <!-- <div class="opacity-kam opac-book-oppen"> -->
            <div id="selected_seats"></div>
            <div class="book" onclick="booked2();">Book Tickets</div>
            <button type="button" onclick="seat_display();">X</button>
            <!-- </div> -->
        </div>
        <div class="oppen-image" id="oppen-image">
            <div class="oppen-image-image">
                <img src="https://m.media-amazon.com/images/M/MV5BMDBmYTZjNjUtN2M1MS00MTQ2LTk2ODgtNzc2M2QyZGE5NTVjXkEyXkFqcGdeQXVyNzAwMjU2MTY@._V1_.jpg" width="300px" height="430px">
            </div>
            <div class="oppen-content">
                <h2>OPPENHEIMER</h2>
                <h3>Timing: Today at 7pm</h3>
                <div class="seats box1 hidden" id="seats_div">
                    <span class="select-seats box1 hidden">Select Seats</span>
                    <br>
                    <!-- <div id="selected-seats" class="selected"></div> -->
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
            <!-- <div class="opacity-kam opac-book-oppen"> -->
            <div id="selected_seats1"></div>
            <div class="book1"  onclick="booked1();">
                Book Tickets
            </div>
            <button type="button" onclick="seat_display3();">X</button>
            <!-- </div> -->
        </div>
        <div class="avengers-image" id="avengers-image">
            <div class="avengers-image-image">
                <img src="https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_.jpg" width="300px" height="430px">
            </div>
            <div class="avengers-content">
                <h2>Avengers</h2>
                <h3>Timing: Today at 9pm</h3>
                <div class="seats box2 hidden" id="seats_div1">
                    <span class="select-seats1 box2 hidden">Select Seats</span>
                    <br>
                    <!-- <div id="selected-seats" class="selected"></div> -->
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
            <!-- <div class="opacity-kam opac-book-oppen"> -->
            <div id="selected_seats2"></div>
            <div class="book2"  onclick="booked();">
                Book Tickets
            </div>
            <button type="button" onclick="seat_display4();">X</button>
            <!-- </div> -->
        </div>
        <div class="batman-image" id="batman-image">
            <div class="batman-image-image">
                <img src="https://images.moviesanywhere.com/bd47f9b7d090170d79b3085804075d41/c6140695-a35f-46e2-adb7-45ed829fc0c0.jpg" width="300px" height="430px">
            </div>
            <div class="batman-content">
                <h2>Batman</h2>
                <h3>Timing: Today at 10pm</h3>
                <div class="seats box3 hidden" id="seats_div2">
                    <span class="select-seats2 box3 hidden">Select Seats</span>
                    <br>
                    <!-- <div id="selected-seats" class="selected"></div> -->
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
    </script>
    <?php
    $count = 0;
    $count1 = 0;
    if (isset($_GET['submit2'])) {
        $user = $_GET['username'];
        $email = $_GET['email'];
        $pass = $_GET['password'];
        $dob = $_GET['dob'];

        $conn = mysqli_connect("localhost", "root", "alex", "movie_ticket",4306);

        if (!$conn) {
            echo "<script>";
            echo "alert('Couldn't Connect to database')";
            echo "</script>";
            die("Failed to connect: " . mysqli_connect_error());
        } else {

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
                echo "</script>";
            } else {
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
    } else if (isset($_GET['submit1'])) {
        $email1 = $_GET['email2'];
        $password = $_GET['password1'];
        $conn = new mysqli("localhost", "root", "alex", "movie_ticket",4306);
        if (!$conn) {
            die("Failed to connect: " . mysqli_connect_error());
        } else {
            $select = $conn->prepare("SELECT * from details where E_mail = ?");
            $select->bind_param("s", $email1);
            $select->execute();
            $select_result = $select->get_result();
            $data = $select_result->fetch_all(MYSQLI_ASSOC);
            $javauser = $data[0]['Username'];
            if (!empty($data)) {
                $_SESSION['user-website'] = $data[0]['Username'];
                if ($data[0]['Password'] === $password) {
                    echo "<script>";
                    echo "login1 = true;";
                    echo "let change123 = document.getElementById('login');";
                    echo "let username1 = '" . $data[0]['Username'] . "';";
                    // echo "change.textContent = 'Welcome!';";
                    echo "change123.textContent = 'Welcome! ' + username1;";
                    echo "change123.onclick = '';";
                    echo "change123.style = '';";
                    echo "change123.className = 'except';";
                    echo "change123.style.cursor = 'text';";
                    echo "</script>";
                } elseif ($data[0]['Password'] != $password) {
                    echo "<script>";
                    echo "alert('Wrong Password')";
                    echo "</script>";
                } elseif ($data[0]['E_mail'] != $email1) {
                    echo "<script>";
                    echo "alert('Invalid E-mail')";
                    echo "</script>";
                } else {
                    $count1++;
                }
            } else {
                echo "<script>";
                echo "alert('This E-mail is not registered');";
                echo "</script>";
            }
        }
    }
    ?>


    <!-- Javascript below -->

    <script>
        // let login1 = false;
        // let javauser = '';
        // console.log(javauser);
        const divs = document.querySelectorAll('.box');
        divs.forEach((div, index) => {
            setTimeout(() => {
                div.classList.add('visible');
            }, index * 800); // Adjust the delay (in milliseconds) as needed
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
            let logo = document.getElementById("logo");
            let theme = document.getElementById("themelogo");
            let root = document.documentElement;
            let oppen_image = document.getElementById("oppen-image");
            if (theme.src.endsWith("night-mode.png")) {
                logo.src = "logo-dark.png";
                theme.src = "light-mode.png";
                theme.title = "Light Theme";
                oppen_image.style.backgroundColor = "rgba(0, 0, 0, 0.421)";
                // getComputedStyle(root).getPropertyValue('--main-color');
                // root.style.setProperty('--main-color', 'red')

                let darkColor = getComputedStyle(root).getPropertyValue('--dark').trim();
                let lightColor = getComputedStyle(root).getPropertyValue('--light').trim();

                root.style.setProperty('--dark', lightColor);
                root.style.setProperty('--light', darkColor);
            } else if (theme.src.endsWith("light-mode.png")) {
                logo.src = "logo.png";
                theme.src = "night-mode.png";
                theme.title = "Dark Theme";
                oppen_image.style.backgroundColor = "rgba(255, 255, 255, 0.121)";

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
            // Move the label to its transformed position
            const label = input.nextElementSibling; // Get the label element
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
            // display.style.transition = "0.3s";
        }

        function cross1() {
            let display1 = document.getElementById("sign-section");
            display1.style.display = "none";
            // display.style.transition = "0.3s";
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
                // sign.style.marginTop = "10px";
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
                wrong_pass.style.backgroundColor = 'red';
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
        function seat_green_count() {
            
         
            let selected = document.getElementById("selected_seats");
            let loop_seat = document.getElementsByClassName("seats-seats");
            let duplicate_seat = "";
            for (i = 0; i < loop_seat.length; i++) {
                if (loop_seat[i].style.backgroundColor == "lightgreen") {
                    duplicate_seat = duplicate_seat + "  " + loop_seat[i].id;
                }
            }
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
                }, index * 500); // Adjust the delay (in milliseconds) as needed
            });
        }
        let use_alert1 = false;
        function seat_green_count1() {
            let selected = document.getElementById("selected_seats1");
            let loop_seat = document.getElementsByClassName("seats-seats1");
            let duplicate_seat = "";
            for (i = 0; i < loop_seat.length; i++) {
                if (loop_seat[i].style.backgroundColor == "lightgreen") {
                    duplicate_seat = duplicate_seat + "  " + loop_seat[i].id;
                }
            }
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
                }, index * 500); // Adjust the delay (in milliseconds) as needed
            });
        }

        let use_alert2 = false;
        function seat_green_count2() {
            let selected = document.getElementById("selected_seats2");
            let loop_seat = document.getElementsByClassName("seats-seats2");
            let duplicate_seat = "";
            for (i = 0; i < loop_seat.length; i++) {
                if (loop_seat[i].style.backgroundColor == "lightgreen") {
                    duplicate_seat = duplicate_seat + "  " + loop_seat[i].id;
                }
            }
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
        function booked(){
            // let booked = document.getElementById("selected_seats");
            if(use_alert2){
                alert("Successfully Booked The Dark Knight");
                window.location.reload();
            }
            else{
                alert("No seats are selected");
            }
        }
        function booked1(){
            // let booked = document.getElementById("selected_seats");
            if(use_alert1){
                alert("Successfully Booked Avengers: End Game");
                window.location.reload();
            }
            else{
                alert("No seats are selected");
            }
        }
        function booked2(){
            // let booked = document.getElementById("selected_seats");
            if(use_alert){
                alert("Successfully Booked Oppenheimer");
                window.location.reload();
            }
            else{
                alert("No seats are selected");
            }
        }
        function booking(){
            if(login1 == false){
                alert("Login first");
                event.preventDefault();
            }
        }
        theme();
    </script>
</body>

</html>