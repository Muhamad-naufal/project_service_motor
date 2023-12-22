<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Antrian Online</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="text-center">Informasi Booking Antrian</h5>
                <div class="row">
                    <div class="col-md-6">
                        <p>No Antrian</p>
                        <p>Nama Lengkap</p>
                        <p>Plat Nomor</p>
                        <p>Nama Motor</p>
                        <p>Tahun Kendaraan</p>
                        <p>Service</p>
                        <p>Turun Mesin</p>
                        <p>Tanggal Booking</p>
                        <p>Jam</p>
                        <P>Status</P>
                    </div>
                    <div class="col-md-6">
                        <p><?php echo $row1['kode_book'] ?></p>
                        <p><?php echo $row1['nama_lengkap'] ?></p>
                        <p><?php echo $row1['plat_no'] ?></p>
                        <p><?php echo $row1['nama_motor'] ?></p>
                        <p><?php echo $row1['tahun_kendaraan'] ?></p>
                        <p><?php echo $row1['nama_paket'] ?></p>
                        <p><?php echo $row1['nama_turun_mesin'] ?></p>
                        <p><?php echo $row1['tanggal_book'] ?></p>
                        <p><?php echo $row1['jam'] ?></p>
                        <p><?php echo $row1['status'] ?></p>
                    </div>
                </div>
                <p class="text-center">Mohon Hadir 15 Menit Sebelum Jam Yang sudah dipilih sebelumnya</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>