<?php
$id = $_GET['id'];
if (isset($_POST['keterangan'])) {
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];

    $query = mysqli_query($koneksi, "UPDATE kas_masuk SET keterangan='$keterangan', tanggal='$tanggal', total='$total'  WHERE id_km='$id'");

    if ($query) {
        echo '<script>alert("Data Berhasil di Update");location.href="?page=kas-masuk"</script>';
    }
}
$query = mysqli_query($koneksi, "SELECT * FROM kas_masuk WHERE id_km='$id'");
$data = mysqli_fetch_array($query);
?>

<h1 class="h3 mb-3">Ubah Kas Masuk</h1>


<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="form-label">Keteranggan</label>
                        <input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="form-label">Total</label>
                        <input type="text" name="total" class="form-control" value="<?php echo $data['total'] ?>">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>