<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
<!-- Content Header (Page header) --> 

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Jadwal</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
                            <thead>
                                <tr>
									<th>Jadwal</th>
									<th>Nama Kapal</th>
									<th>Rute</th>
									<th>Waktu</th>
                                    <th>Jenis Barang</th>
									<th>Biaya Perjalanan</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<td>02 September 2021</td>
									<td>KM. Dharma Rucitra PK 001</td>
									<td>Semarang - jakarta</td>
									<td>14:00 - 08:00 WIB</td>
                                    <td>Motor CBR250 (250cc)</td>
									<td>Rp. 600.000.00</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Kamis, 07 September 2021</td>
									<td>KM. Dharma Rucitra PK 003</td>
									<td>Semarang - Denpasar</td>
									<td>14:00 - 11:00 WIB</td>
                                    <td>Mobil Avanza (2500cc)</td>
									<td>Rp. 3.500.000.00</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Minggu, 10 September 2021</td>
									<td>KM. Dharma Rucitra AS 221</td>
									<td>Semarang - Banyuwangi</td>
									<td>14:00 - 05:00 WIB</td>
                                    <td>Beras Petani Hebat (100kg)</td>
									<td>Rp. 100.000.00</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Senin, 30 Agustus 2021</td>
									<td>KM. Dharma Rucitra AN 213</td>
									<td>Semarang - Pangkalan Bun</td>
									<td>04:00 - 13:00 WIB</td>
                                    <td>Truck Canter (5000+cc)</td>
									<td>Rp. 6.500.000.00</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Senin, 30 Agustus 2021</td>
									<td>KM. Dharma Rucitra AN 220</td>
									<td>Jakarta - Bandar Lampung</td>
									<td>05:00 - 08:00 WIB</td>
                                    <td>Motor Supra X 2015 (110cc)</td>
									<td>Rp. 350.000.00</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Senin, 30 Agustus 2021</td>
									<td>KM. Dharma Rucitra AN 224</td>
									<td>Jakarta - Banyuwangi</td>
									<td>14:00 - 05:00 WIB</td>
                                    <td>Truck Tronton (5000+cc)</td>
									<td>Rp. 350.000.00</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Senin, 30 Agustus 2021</td>
									<td>KM. Dharma Rucitra AN 245</td>
									<td>Jakarta - Banjarmasin</td>
									<td>14:00 - 03:00 WIB</td>
                                    <td>BIS ELF (2000+cc)</td>
									<td>Rp. 3000.000.00</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Senin, 30 Agustus 2021</td>
									<td>KM. Dharma Rucitra AN 243</td>
									<td>Jakarta - Karimun Jawa</td>
									<td>14:00 - 05:00 WIB</td>
                                    <td>BIS Pariwisata (5000+cc)</td>
									<td>Rp. 6.500.000.00</td>
								</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- DataTables -->
<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
$(document).ready(function() {
    var table = $('#table-data').DataTable();

    $('.dataTables_filter input').unbind().bind('keyup', function() {
        var colIndex = document.querySelector('#table-data-filter-column').selectedIndex;
        table.column(colIndex).search(this.value).draw();
    });
} );
</script>