<?php
    include '../php/connect.php';
    $data_id = $_GET['data_id'];
    $sql = mysqli_query($conn, "SELECT * FROM event WHERE event_id='$data_id'");
    $row = mysqli_fetch_array($sql);
    $evid = $row['evkat_id'];

    $getkat = "SELECT * FROM ev_kategori WHERE evkat_id = '$evid'";
    $resultkat = $conn->query($getkat);
    $row2 = $resultkat->fetch_assoc();
?>
<html>
<head>
    <title>Tambah Market</title>
    <link rel="stylesheet" type="text/css" href="../css/input.css">
    <script type="text/javascript" src="../jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="../jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../asets/css/bootstrap.min.css">
    <script src="../asets/js/bootstrap.min.js" type="text/javascript"></script>
    <style>
        html,body{
            margin:0;padding:0;height:100%;
        }
        #wrapper{
            min-height:100%;position:relative;
        }
        #body{
            padding-bottom:100px;
        }
        .footer{
            position: relative;
            margin-top: 200px; 
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
                    <img style="margin-top: -10px; margin-left : 10px; width: 90px"; height="90px;" src="../img/logo1.png">
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <a href="../" id="tomreg">Home</a>
                </div>
        </div>
        <div id="body">
            <div id="isi">
                <h1 style="text-align: center; color: #487eb0;">Tambah Event</h1><br>
                <form method="POST" action="updateevent.php">
                    <input type="hidden" value="<?php echo $row['event_id'];?>" name="event_id">
                    <div class="form-group">
                        <?php
                            $querykat = mysqli_query($conn, 'SELECT * FROM ev_kategori');
                        ?>
                        <select class="form-control" name="kategori" id="kategori" required autocomplete="off">
                            <option value="<?php echo $evid; ?>" selected><?php echo $row2['evkat_nama'];?></option>
                            <?php
                                while($rowkat= mysqli_fetch_array($querykat)){
                            ?>
                            <option value="<?php echo $rowkat['evkat_id'] ?>"> <?php echo $rowkat['evkat_nama'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
<!--                     <div class="form-group">
                        <input type="text" id="kategori" class="form-control" name="kategori" value="<?php echo $row['evkat_id'];?>" required autocomplete="off">
                    </div> -->
                    <div class="form-group">
                        <input type="text" id="navent" class="form-control" name="navent" value="<?php echo $row['event_nama'];?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="date" id="date" class="form-control" name="date" value="<?php echo $row['ev_date'];?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea type="text" id="desvent" class="form-control" name="desvent" required autocomplete="off"><?php echo $row['des_event'];?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="price" class="form-control" name="price" value="<?php echo $row['price_ev'];?>" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" id="slotmember" class="form-control" name="slotmember" value="<?php echo $row['slot_member'];?>" required autocomplete="off">
                        <p style="color: #57606f; font-size: 12px;">*) Jumlah akan berkurang setiap pendaftar tervalidasi</p>
                    </div>
                    <div class="form-group">
                        <input type="text" id="place" class="form-control" name="place" value="<?php echo $row['ev_place'];?>" required autocomplete="off">
                        <p style="color: #57606f; font-size: 12px;">*) Masukan alamat sedetail mungkin </p>
                    </div>
                    <p><b>Tambahkan Gambar</b></p>
                    <p style="font-size: 12px; color: #57606f; margin-top: -17px;">*) Wajib upload minimal 1 gambar</p>
                    <div class="gambar">
                        <div id="gam1">
                            <input type="file" name="gambar1" id="preview_gambar1" required autocomplete="off"/>
                            <img style="margin-top: 10px;" src="../img/add.jpg" id="gambar_nodin1" width="100" height="100;" alt="Preview Gambar1" />
                        </div>
                        <div id="gam2">
                            <input type="file" name="gambar2" id="preview_gambar2" />
                            <img style="margin-top: 10px;" src="../img/add.jpg" id="gambar_nodin2" width="100" height="100;" alt="Preview Gambar2" />
                        </div>
                        <div id="gam3">
                            <input type="file" name="gambar3" id="preview_gambar3" />
                            <img style="margin-top: 10px;" src="../img/add.jpg" id="gambar_nodin3" width="100" height="100;" alt="Preview Gambar3" />
                        </div>
                    </div>



                    <div id="pilihan" style="margin-top: 40px; display: flex;">
                        <div id="tombol" style="flex: 2;">
                            <button type="submit" style="width: 150px;" class="btn btn-info">Tambahkan</button>
                        </div>
                        <div id="aref" style="flex: 2;">
                            <p>Dengan menekan tombol <b>Tambahkan </b>maka event anda akan disimpan dan dipublikasikan </p>
                        </div>
                    </div>

                </form>
            </div>            
        </div>

        <div class="footer">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 80%; margin-top: 30px; width: 100px; float: left;"; height="100px;" src="../img/logo1.png">
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
                <p style="color: #57606f;">Copyright &copy; 2018 - All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
</html>

<!-- <script type="text/javascript">
    function validasi_input(form){

        pola_username=/^[a-zA-Z0-9\_\-]{6,100}$/;
        if(!pola_username.test(form.username.value)){
            alert ('Periksa username anda kembali !');
            form.username.focus();
            return false;
        }

        var max = 30;
        if (form.password.value.length > max){
            alert("Periksa password anda kembali");
            form.password.focus();
            return (false);
        }
    }
</script> -->