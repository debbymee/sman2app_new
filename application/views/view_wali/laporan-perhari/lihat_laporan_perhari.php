<!DOCTYPE html>
<html>
<head>
	<title>Laporan Presensi</title>
	<link href="public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    div.page_break + div.page_break{
    page-break-before: always;
}
</style>
</head>
<body>
<?php
                    foreach ($detailsiswa as $row) {
                 ?>

                 <div class="page_break">

    <div class="container">
    	<div class="col-lg-12">
    		<div class="col-md-1">
				<img src="public/images/sman2.png" alt="..." width="60px">
	    	</div>
	    	<div class="col-md-10" style="margin-top:-90px;">
	    	    <h4 class="text-center"><b> DAFTAR PRESENSI SISWA KELAS 12 </b></h4>
	    	    <h5 class="text-center">Jl.Puri cempaka putih, Kota Mojokerto</h5>
	    	    <h6 style="margin-left:60px">No Telp: 08323728xxx</h6>
	    	    <h6 style="margin-left:430px;margin-top:-90px">Email: abcds@gmail.com</h6>
	    	</div>
	    	<div class="col-md-1" align="right" style="margin-top:-90px">
				<img src="public/images/sman2.png" alt="..." width="60px">
	    	</div>
    	</div>

        <hr>


	        <table cellspacing="0" cellpadding="2" style="width:100%;border-collapse:collapse;font-size:75%" >
           
            <tr>
                <td style="width: 15%"> NAMA SISWA </td>
                 <td style="width: 50%">
                    <h4> : <?php echo $row->nama_siswa ?></h4>
                </td>

            </tr>		
            <tr>
                <td>
                NIPD 
                </td>
                <td >
                    <h4> : <?php echo $row->nipd ?></h4>
                </td>

                  <td> <p style="float: right">KELAS : <?php echo $row->nama_kelas ?></p></td>
            </tr>
           
        </table>
        <br>		
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr align="center">
                    
                    <td>HARI </td>
                    <td>TANGGAL</td>
                    <td>JAM PELAJARAN</td>
                    <td>MATA PELAJARAN</td>
                    <td>KETERANGAN</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($detailsiswa2 as $key) {
                 ?>

                 <?php if($key->id_siswa == $row->id_siswa) { ?>
              
                <tr>
                    
                    <td class="text-center"><?php echo $key->hari; ?></td>
                    <td class="text-center"><?php  
                    $date=date_create($key->tgl);
echo date_format($date,"d/m/Y");
                    ?></td>
                    <td class="text-center"><?php echo $key->jam_pelajaran; ?></td>
                    <td class="text-center"><?php echo $key->nama_pelajaran; ?></td>
                    <td class="text-center"><?php echo $key->kd_keterangan_fk; ?></td>
                </tr>
   <?php  } ?>
                <?php  } ?>

        </table><br><br>

        <div style="margin-right:2%" class="text-right">
        	<h5>Mojokerto, <?php echo tanggal_indo(date("d-m-Y")); ?></h5>
	        <h5><b>Wali Kelas</b></h5><br><br><br>
            <h5><b><?php echo $row->nama_guru ?></b></h5>
	        <hr style="border:1px solid #000;width: 20%;margin-left:550px">	
        </div>
        
        </tbody>
    </div>
    </div>
       <?php  } ?>

</body>
</html>
