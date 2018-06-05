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
        $query = "SELECT event_id, evkat_nama, event_nama,des_event, price_ev, slot_member, ev_place, ev_date FROM event JOIN ev_kategori ON event.evkat_id = ev_kategori.evkat_id WHERE event.event_nama LIKE '$key%'";// LIMIT $batas_bawah, $batas_atas
        $result = $conn->query($query);
        $total = mysqli_num_rows($result);
        $res = $conn->query($query);
            if ($total > 0) {
            // output data of each row
                           
                while($row = $res->fetch_assoc()) {
                    echo "<tr border='1'>";
                    echo "<td>" . $row["evkat_nama"]. "</td><td>" . $row["event_nama"]. "</td><td>" . $row["des_event"]. "</td><td>" . $row["price_ev"]. "</td><td>" . $row["slot_member"]. "</td><td>" .$row["ev_place"]. "</td><td>" .$row["ev_date"]."</td>";
                    echo "<td><a href='#?data_id=".$row['event_id']."' class='btn btn-info' id='custId' data-toggle='modal'>Detail</a></td>";
                    echo "<td><a href='../upacara/editevent.php?data_id=".$row['event_id']."' class='btn btn-warning' id='custId' data-toggle='modal'>Edit</a></td>";
                    echo "<td><a href='../upacara/evdelete.php?data_id=".$row['event_id']."' class='btn btn-danger' id='custId' data-toggle='modal'>Delete</a></td>";
                    echo "</tr>";
                }
                                
            }else {
                echo "<b>Belum ada event terdaftar.</b>";
            }
            $conn->close();
    ?>
</table>