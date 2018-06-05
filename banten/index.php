<?php
    include '../connect.php';
    session_start();
    $myusername = $_SESSION['login_user'];
    $user_pass = $_SESSION['login_pass'];
    $get_user = "SELECT * FROM user WHERE username = '$myusername'";
    $result = $conn->query($get_user);
    $row = $result->fetch_assoc();
    $id = $row['user_id'];
    $alamat = $row['address'];
?>

<html>
<head>
    <title>Tambah Banten</title>
    <script type="text/javascript" src="jquery-3.2.1.min.js" onload="window.$ = window.jQuery = module.exports;"></script>
    <script type="text/javascript" src="jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../css/input.css">
    <script type="text/javascript" src="../jquery-ui.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="../jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../asets/css/bootstrap.min.css">
    <script src="../asets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../asets/jquery-3.2.1.min.js" ></script>
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
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 10px;
        }
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .gbr {
            width: 100px;
            height: 150px;
            margin-left: 20px;
            margin-top: 15px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="header">
                <div id="logo">
                    <img style="margin-top: -10px; margin-left : 10px; width: 140px"; height="90px;" src="../img/logo.png">
                </div>
                <div id="kop">
                    
                </div>
                <div id="login">
                    <a href="../index.php" id="tomreg">Home</a>
                </div>
        </div>
        <div id="body">
            <div id="isi">
                <br><h1 style="text-align: center; color: #487eb0;">Tambah Sarana</h1><br><br>
                <form method="POST" action="i_banten.php" onsubmit="return validasi_input(this)" enctype="multipart/form-data">
                    <input type="hidden" id="uid" class="form-control" name="uid" value="<?php echo $id ?>">
                    <div class="form-group">
                        <?php
                            $querykat = mysqli_query($conn, 'SELECT * FROM sar_kategori');
                        ?>
                        <select class="form-control" name="kategori" id="kategori" required autocomplete="off">
                            <option value="pilih" selected>--- Pilih Kategori ---</option>
                            <?php
                                while($rowkat= mysqli_fetch_array($querykat)){
                            ?>
                            <option value="<?php echo $rowkat['sarkat_id'] ?>"> <?php echo $rowkat['sarkat_nama'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" id="sarnama" class="form-control" name="sarnama" placeholder="Nama sarana" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea type="text" id="dessar" class="form-control" name="dessar" placeholder="Deskripsi sarana" required autocomplete="off"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat pembuat" required autocomplete="off"><?php echo $alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="stocksar" class="form-control" name="stocksar" placeholder="Stock sarana" required autocomplete="off">
                        <p style="color: #57606f; font-size: 12px;">*) Stock akan berkurang saat banten dipesan </p>
                    </div>
                    <div class="form-group">
                        <input type="text" id="price" class="form-control" name="price" placeholder="Biaya persarana" required autocomplete="off">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="pilih" id="pilih" required autocomplete="off">
                            <option value="pilih" selected>--- Pilih Jenis Order ---</option>
                            <option value="Ready">Banten Ready</option>
                            <option value="Preorder">Bnaten Made By Order</option>
                        </select>
                        <p style="color: #57606f; font-size: 12px;">*) Menentukan stock selalu tersedia atau preorder </p>
                    </div>
                    <p><b>Tambahkan Gambar</b></p>
                    <p style="font-size: 12px; color: #57606f; margin-top: -17px;">*) Wajib upload minimal 1 gambar</p>
                    
                    <div id="preview-image">
                        <!-- <img id="uploadPreview" style="width: 150px; height: 150px;"/><br> -->
                    </div>

                    <div class="fileUpload btn btn-secondary" style="margin-left: 0px;">
                        <span class="glyphicon glyphicon-print">Pilih Gambar</span>
                        <input class="upload" type="file" name="gambar[]" onchange="PreviewImage();" id="gambar" required autocomplete='off' multiple/>
                    </div>



                    <div id="pilihan" style="display: flex; margin-top: 40px;">
                        <div id="tombol" style="flex: 2;">
                            <button type="submit" style="width: 150px;" class="btn btn-info">Tambahkan</button>
                        </div>
                        <div id="aref" style="flex: 2;">
                            <p>Dengan menekan tombol <b>Tambahkan </b>maka data jual sarana upacara anda akan disimpan dan dipublikasikan </p>
                        </div>
                    </div>

                </form>
            </div>            
        </div>

        <div class="footer">
            <div id="bawah">
                <div id="imfot">
                    <img style="margin-left: 80%; margin-top: 30px; width: 160px; float: left;"; height="140px;" src="../img/logo.png">
                </div>
                <div id="fotnu">
                    <p style="text-align: left;"><a href="../information/privacy.php">Privacy Policy</a></p>
                    <p style="text-align: left;"><a href="../information/ketentuan.php">Terms and Conditions</a></p>
                    <p style="text-align: left;"><a href="">Cooperation</a></p>
                </div>
                <div id="fotnu2">
                    <p style="text-align: left;"><a href="">Balinesia Guide</a></p>
                    <p style="text-align: left;"><a href="">News</a></p>
                    <p style="text-align: left;"><a href="">Tips Join</a></p>
                </div>
                <div id="sosmed">
                    <p>Find us at</p>
                    <div id="sosmedc">

                    </div>
                </div>
            </div>
            <div id="foot">
                <p style="color: #57606f;">Copyright &copy; 2018 - All Rights Reserved</p>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
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

    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            alert("masuk");
        
            reader.onload = function (e) {
                $('#gambar_nodin1').attr('src', e.target.result);
            }
        
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#preview_gambar1").change(function(){
        bacaGambar(this);
    });

    function PreviewImage() {
        // alert('Nama');
        console.log('tesimage');
     //Get count of selected files
         var countFiles = $("#gambar")[0].files.length;
        console.log('tesimage');
         var imgPath = $("#gambar")[0].value;
         var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
         var image_holder = $("#preview-image");
         console.log('tesimage');
         image_holder.empty();
        //console.log('tesimage');
         if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
             if (typeof (FileReader) != "undefined") {
     
                 //loop for each file selected for uploaded.
                 for (var i = 0; i < countFiles; i++) {
     
                     var reader = new FileReader();
                     reader.onload = function (e) {
                         $("<img />", {
                             "src": e.target.result,
                                 "class": "gbr"
                         }).appendTo(image_holder);
                     }
     
                     image_holder.show();
                     reader.readAsDataURL($("#gambar")[0].files[i]);
                 }
     
             } else {
                 alert("This browser does not support FileReader.");
             }
         } else {
             alert("Pls select only images");
         }
     }

</script>