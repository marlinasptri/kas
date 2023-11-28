<h1 class="h3 mb-3">Kas Masuk</h1>
<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <a href="?page=tambah-kas-masuk" class="btn btn-success btn-sm">+Tambah Kas Masuk</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover" id="kas-masuk">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i =  1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kas_masuk");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $data['keterangan'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                <td>Rp <?php echo $data['total'] ?></td>
                                <td>
                                    <a href="?page=edit-kas-masuk&id=<?php echo $data['id_km'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?page=hapus-kas-masuk&id=<?php echo $data['id_km'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                    <tr>
                        <th colspan="3" class="text-danger">Total Kas Masuk :</th>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM kas_masuk");
                        $sum = mysqli_fetch_assoc($query);
                        ?>
                        <th colspan="1" class="text-success">Rp <?php echo number_format($sum['total'], 2, ",", ".") ?></th>
                        <th></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#kas-masuk').DataTable();
    });
</script>