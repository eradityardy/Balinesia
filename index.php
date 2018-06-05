<?php 
    include("connect.php");
    session_start();
    if(isset($_SESSION['login_user'])){
        $user_check = $_SESSION['login_user'];
        $user_pass = $_SESSION['login_pass'];
        $id_user = $_SESSION['user_id'];
        $ses_sql = mysqli_query($conn,"SELECT * FROM user WHERE username = '$user_check' and password = '$user_pass'");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        $login_session = $row['username'];
        $login_id = $row['user_id'];
        header("location: user/");
    }
?>

<html>
<head>
    <title>Balinesia</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="asets/css/bootstrap.min.css">
    <script src="asets/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        html,body{
            margin: 0;
            padding: 0; 
            height: 100%;
        }
        #wrapper{
            min-height: 100%;
            position: relative;
        }
        #body{
            padding-bottom: 300px;
        }
        .footer{
            position: absolute; 
            bottom: 0;
            width: 100%;
            text-align: center;
            z-index: 0;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
                <div id="logo">
                    <img style="margin-top: -10px; margin-left : 10px; width: 140px"; height="90px;" src="img/logo.png">
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <a href="login/" id="tomlog">Login</a>
                    <a href="register/" id="tomreg">Register</a>
                </div>
        </div>
        <div id="body">
            <div class="gambar">
                <img style="width: 100%; height: 670px;" src="img/balinesia.jpg">
                <!-- <p id="teks" style="color: black; text-align: center; position: relative">Kalau bisa lebih mudah kenapa tidak</p> -->
            </div>

            <div class="search">
                <form method="post" action="searchresult/">
                    <p style="text-align: right; margin-top: -30px"><i>Solusi upacara anda</i></p>
                    <input id="keywords" style="height: 38px; width: 300px; border-width: 0px; border-radius: 4px; margin-top: 20px" type="text" name="keywords" placeholder="      Banten, upacara" required autocomplete="off">
                    <button style="height: 36px;" type="submit" class="btn btn-info">Click to search</button>
                </form>
            </div>

            <div class="isi">
                <div id="view" style="width: 100%;">
                    <div id="v_upacara">
                        <div class="pembatas" style="width: 100%; height: 50px; background-color: #dcdde1; border-radius: 7px">
                            <h1 style="text-align: center; color: #222f3e;">UPACARA</h1>
                        </div><br>

                        <?php 
                        $a = 0;
                            while ( $a <= 10) { ?>
                                <div id="data" class="row">
                        <a href="" style="text-decoration: none; color: black">
                            <div class="card" style="width: 25rem; background-color: #f5f6fa; border-radius: 10px;">
                              <img class="card-img-top" src="img/balinesia.jpg" alt="Card image cap" style="width: 100%">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text" style="color: black">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                
                              </div>
                            </div>
                        </a>
                    </div>

                    <?php $a++; } ?>

                    </div><br><br>

                    <div id="v_banten">
                        <div class="pembatas" style="width: 100%; height: 50px; background-color: #dcdde1; border-radius: 7px">
                            <h1 style="text-align: center; color: #222f3e;">BANTEN</h1>
                        </div><br>

                        <a href="" style="text-decoration: none; color: black">
                            <div class="card" style="width: 25rem; background-color: #f5f6fa; border-radius: 10px;">
                              <img class="card-img-top" src="img/balinesia.jpg" alt="Card image cap" style="width: 100%">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              </div>
                            </div>
                        </a>

                    </div><br><br>

                    <div id="v_kategori">

                    <div id="v_banten">
                        <div class="pembatas" style="width: 100%; height: 50px; background-color: #dcdde1; border-radius: 7px">
                            <h1 style="text-align: center; color: #222f3e;">SERVICES</h1>
                        </div><br>
                        <a href="" style="text-decoration: none; color: black">
                            <div class="card" style="width: 25rem; background-color: #f5f6fa; border-radius: 10px;">
                              <img class="card-img-top" src="img/balinesia.jpg" alt="Card image cap" style="width: 100%">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                
                              </div>
                            </div>
                        </a>

                    </div>

                    </div>

                    

                </div>
            </div>
        </div>
        <div class="footer">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 60%; margin-top: 40px; width: 160px; float: left;"; height="140px;" src="img/logo.png">
                </div>
                <div id="fotnu">
                    <p style="text-align: left;"><a href="">Privacy Policy</a></p>
                    <p style="text-align: left;"><a href="">Terms and Conditions</a></p>
                    <p style="text-align: left;"><a href="">Cooperation</a></p>
                </div>
                <div id="fotnu2">
                    <p style="text-align: left;"><a href="">Balinesia Guide</a></p>
                    <p style="text-align: left;"><a href="">News</a></p>
                    <p style="text-align: left;"><a href="">Tips Join</a></p>
                </div>
                <div id="sosmed">
                    <p>Find us at</p>
                </div>
            </div>
            <div id="foot">
                <p style="padding-top: 8px; color: #57606f;">Copyright &copy; 2018 - All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
</html>