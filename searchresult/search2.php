<table class="table table-striped">
    <tr>
        <th>Kategori</th>
        <th>Nama Event</th>
        <th>Deskripsi</th>
        <th>Biaya</th>
        <th>Jumlah Peserta</th>
        <th>Lokasi</th>
        <th>Tanggal</th>
        <th>Detail</th>
        <th>Edit</th>
        <th>Delete</th>
                          
    </tr>
    <?php
        include '../connect.php';
        $key = $_GET['key'];
        $perpage = 100;
        //echo $key;
        //$pages = ceil(mysql_result($page_query, 0) / $per_page);
        // $page = isset($_GET['halaman'])? (int)$_GET["halaman"]:1;
        // $page_query = "SELECT * FROM event";
        // $result = $conn->query($page_query);
        // $total = mysqli_num_rows($result);
        // $pages = ceil($total/$perpage);
        // $mulai = ($pages-1)*$halaman;
        // $no = $mulai+1;                
        // $batas_bawah = ($page>1) ? ($page * $perpage) - $perpage : 0;
        // $batas_atas = $page*$jml_cont;
        //echo $page;
        $query = "SELECT sarana_id, sarkat_nama, sar_nama, des_sar, dibuat, stock_sar, sar_price, pilihan FROM sarana JOIN sar_kategori ON sarana.sarkat_id = sar_kategori.sarkat_id WHERE sarana.sar_nama LIKE '$key%'";// LIMIT $batas_bawah, $batas_atas
        $result = $conn->query($query);
        $total = mysqli_num_rows($result);
        $res = $conn->query($query);
            if ($total > 0) {
            // output data of each row
                           
                while($row = $res->fetch_assoc()) {
                    echo "<tr border='1'>";
                    echo "<td>" . $row["sarkat_nama"]. "</td><td>" . $row["sar_nama"]. "</td><td>" . $row["des_sar"]. "</td><td>" . $row["dibuat"]. "</td><td>" . $row["stock_sar"]. "</td><td>" .$row["sar_price"]. "</td><td>" .$row["pilihan"]."</td>";
                    echo "<td><a href='#?data_id=".$row['sarana_id']."' class='btn btn-info' id='custId' data-toggle='modal'>Detail</a></td>";
                    echo "<td><a href='../upacara/editevent.php?data_id=".$row['sarana_id']."' class='btn btn-warning' id='custId' data-toggle='modal'>Edit</a></td>";
                    echo "<td><a href='../upacara/evdelete.php?data_id=".$row['sarana_id']."' class='btn btn-danger' id='custId' data-toggle='modal'>Delete</a></td>";
                    echo "</tr>";
                }
                                
            }else {
                echo "<b>Belum ada event terdaftar.</b>";
            }
            $conn->close();
    ?>
</table>