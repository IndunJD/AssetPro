<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "assetpro";

  session_start();

  $data = mysqli_connect($host, $user, $password, "assetpro");

  if($data===false) {
    die("Connection Error");
  }

  if($_SERVER["REQUEST_METHOD"]=="POST") {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    $sql =
    "select * from user
    inner join login on login.UserID = user.UserID
    inner join role on role.RoleID=user.UserID
    where login.UserID in ( 
        select login.UserID
        from login
        where login.Username='".$Username."' and login.Password='".$Password."'
    )";

    $result = mysqli_query($data, $sql);
    $row = mysqli_fetch_array($result);
    

    if($row["RoleID"]=="1") {
      $_SESSION["Username"] = $Username;
      header("location:view/includes/Admin/index.html");
    }
    elseif ($row["RoleID"]=="2") {
      $_SESSION["Username"]=$Username;
      header("location:");
    }
    elseif($row["RoleID"]=="3") {
      $_SESSION["Username"]=$Username;
      header("location:");
    }
    elseif ($row["RoleID"]=="4") {
      $_SESSION["Username"]=$Username;
      header("location:");
    }
    else {
      echo "Username or Password Incorrect";
    }

  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>AssetPro</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      }
      body {
        margin: 0;
        padding: 0;
        background-image: url(./Images/loginBackground.png);
        background-position: -45vh;
        background-size: cover;
        height: 100vh;
        overflow: hidden;
      }
      .center {
        position: absolute;
        top: 50%;
        left: 79.7%;
        transform: translate(-50%, -50%);
        width: 83vh;
        height: 100vh;
        background: rgba(207, 207, 207, 0.1);
        backdrop-filter: blur(10px);
        color: whitesmoke;
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
      }
      .center img {
        margin-top: 8vh;
        margin-bottom: 2vh;
        width: 250px;
        height: 262px;
      }
      .logo {
        text-align: center;
      }
      .center form {
        padding: 0 40px;
        box-sizing: border-box;
      }
      form .txt_field {
        position: relative;
        border-bottom: 2px solid #bad2ff;
        margin: 30px 0;
      }
      .txt_field input {
        width: 100%;
        padding: 0 5px;
        height: 40px;
        font-size: 16px;
        border: none;
        background: none;
        outline: none;
      }
      .txt_field label {
        position: absolute;
        top: 50%;
        left: 5px;
        color: #bad2ff;
        transform: translateY(-50%);
        font-size: 20px;
        pointer-events: none;
        transition: 0.5s;
      }
      .txt_field span::before {
        content: "";
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #ffffff;
        transition: 0.5s;
      }
      .txt_field input:focus ~ label,
      .txt_field input:valid ~ label {
        top: -5px;
        color: #ffffff;
      }
      .txt_field input:focus ~ span::before,
      .txt_field input:valid ~ span::before {
        width: 100%;
      }
      .pass {
        margin: -5px 0 20px 5px;
        color: white;
        cursor: pointer;
      }
      .pass:hover {
        text-decoration: underline;
      }
      input[type="submit"] {
        width: 40%;
        height: 50px;
        border: none;
        background: white;
        border-radius: 25px;
        font-size: 18px;
        color: black;
        font-weight: 700;
        cursor: pointer;
        outline: none;
        margin-left: 23vh;
      }
      input[type="submit"]:hover {
        background: #687baa;
        color: white;
        transition: 0.5s;
      }
    </style>
  </head>
  <body>
    <div class="center">
      <div class="logo">
          <img src="./Images/AssetProLogo.png" alt="AssetPro Logo">
      </div>
      <form action = "#" method="POST">
        <div class="txt_field">
          <input type="text" name="Username" required />
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="Password" required />
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login" />
      </form>
    </div>
  </body>
</html>
