<h1 class="h3 mb-3">Kas Masuk</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label class="form-label">TanggaL Awal</label>
                        <input type="date" name="tanggal_awal" class="form-control">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control">
                    </div>
                </div>
                <div class="col-sm-2" style="margin-top: 3.2%">
                    <button class="btn btn-light"><i class="fas fa-search"></i></button>
                    <button type="reset" onclick="location.href='?page=laporan-kas-masuk'" class="btn btn-light"><i class="fa fa-retweet"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4"> 
    <div class="card-body">
        <?php
        if (isset($_POST['tanggal_awal'])) {
           ?>
           <a href="cetak-kas-masuk.php?tanggal_awal=<?php echo $_POST['tanggal_awal'] ?>&tanggal_akhir=<?php echo $_POST['tanggal_akhir'] ?>" target="_blank" class="btn btn-success btn-sm mb-3">Print</a>
           <?php
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="laporan-kas-masuk">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['tanggal_awal'])) {
                        $tanggal_awal = $_POST['tanggal_awal'];
                        $tanggal_akhir = $_POST['tanggal_akhir'];
                        $i =  1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kas_masuk WHERE (DATE(tanggal) BETWEEN '$tanggal_awal' AND '$tanggal_akhir')");
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $data['keterangan'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                <td><?php echo $data['total'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#laporan-kas-masuk').DataTable();
    });
</script>