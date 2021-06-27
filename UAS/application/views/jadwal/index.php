<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
<!-- Content Header (Page header) --> 
            <div class="col-sm-12">
               
            </div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
        <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="http://localhost/MY_CARGO/UAS/dashboard">Beranda</a></li>
                </ol>
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
                                    <th>Nama Pemesan</th>
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
                                    <td>Malik Kurniawan</td>
									<td>KM. Dharma Rucitra PK 001</td>
									<td>Semarang - Banjarmasin</td>
									<td>14:00 - 08:00 WIB</td>
                                    <td>Motor CBR250 (250cc)</td>
									<td>Rp. 550.000</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Kamis, 07 September 2021</td>
                                    <td>Sujumin Anjayani</td>
									<td>KM. Dharma Rucitra PK 003</td>
									<td>Semarang - Denpasar</td>
									<td>14:00 - 11:00 WIB</td>
                                    <td>Mobil Avanza (2500cc)</td>
									<td>Rp. 2.500.000</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Minggu, 10 September 2021</td>
                                    <td>Mujib Mantafia</td>
									<td>KM. Dharma Rucitra AS 221</td>
									<td>Semarang - Kumai</td>
									<td>14:00 - 05:00 WIB</td>
                                    <td>Beras Petani Hebat (100kg)</td>
									<td>Rp. 500.000</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Senin, 31 Agustus 2021</td>
                                    <td>Julia Pamungkas</td>
									<td>KM. Dharma Rucitra AN 213</td>
									<td>Semarang - Kumai</td>
									<td>14:00 - 05:00 WIB</td>
                                    <td>Motor Supra X 2019 (110cc)</td>
									<td>Rp. 350.000</td>
								</tr>
                            </tbody>
                            <tbody>
                                <tr>
									<td>Senin, 22 Agustus 2021</td>
                                    <td>Boby Sulaiman</td>
									<td>KM. Dharma Rucitra AN 253</td>
									<td>Semarang - Manokwari</td>
									<td>11:00 - 05:00 WIB</td>
                                    <td>Motor Supra X 2008 (110cc)</td>
									<td>Rp. 350.000</td>
								</tr>
                            </tbody>
                            </tbody>  
                                <tr>  
									<td>Senin, 29 Agustus 2021</td>
                                    <td>Beben Hendro</td>
									<td>KM. Dharma Rucitra AN 293</td>
									<td>Semarang - Palembang</td>
									<td>11:00 - 09:00 WIB</td>
                                    <td>Motor Revo 2019 (125cc)</td>
									<td>Rp. 350.000</td>
                                </tr>
                            </tbody> 
                            <body> 
                            <tr>  
									<td>Senin, 02 September 2021</td>
                                    <td>Arman</td>
									<td>KM. Dharma Rucitra AN 053</td>
									<td>Semarang - Bengkulu</td>
									<td>11:00 - 20:00 WIB</td>
                                    <td>Solar 500 liter</td>
									<td>Rp. 35.000</td>
                                </tr>
                            </tbody> 
                            <body> 
                            <tr>  
									<td>Minggu, 09 September 2021</td>
                                    <td>Saipul Jamil</td>
									<td>KM. Dharma Rucitra AN 093</td>
									<td>Semarang - Bangkalan</td>
									<td>13:00 - 20:00 WIB</td>
                                    <td>Pertamax 35.000 liter</td>
									<td>Rp. 262.500</td>
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