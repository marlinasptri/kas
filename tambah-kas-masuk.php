<?php
if (isset($_POST['keterangan'])) {
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];

    $query = mysqli_query($koneksi, "INSERT INTO kas_masuk (keterangan,tanggal,total) VALUES('$keterangan','$tanggal','$total')");
    
    if ($query) {
        echo '<script>alert("Data Berhasil Di Tambah");location.href="?page=kas-masuk"</script>';
    }
}
?>
<h1 class="h3 mb-2 text-gray-800">Tambah Kas Masuk</h1>
<div class="row">
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Total</label>
                        <input type="text" name="total" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>