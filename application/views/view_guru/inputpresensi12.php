        <div class="x_panel">
			<div class="container">

		 	<h2 style="color: green " align="center"> DAFTAR PRESENSI SISWA KELAS 12 </h2>
		 


		    <hr>
		     <br><br>
		           <?php if (validation_errors() ) 
				    { ?>
				      <div  class="alert alert-danger" role="alert">
				        <?php echo validation_errors(); ?>
				        

				      </div>
				    <?php } ?>
                 
		   
		      

		
		 <form action="<?php echo base_url(); ?>guru/tambah_presensi12" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >


 <table>
 	<tr>
 		<td><h2 style="color: green " id="tgl"><b>Tanggal</b></h2></td>
 		<td><h2 style="color: green " id="tgl"><b> : <input type="date" value="<?php echo date('Y-m-d'); ?>" readonly></b></h2></td>
 	</tr>
 	<tr>
 		<td><h2 style="color: green " id="kelas"><b>KELAS</b></h2></td>
 		<td><h2 style="color: green " id="kelas"><b> : <?php echo $kelas?></b></h2></td>
 	</tr>
 	<tr>
 		<td><h2 style="color: green " id="jadwal_pelajaran"><b>JADWAL PELAJARAN</b></h2></td>
 		<td><h2 style="color: green " id="jadwal_pelajaran"><b>  : <select class="btn btn-default dropdown-toggle" required id="jadwal" name="id_jadwal" >

                          <option value="">Pilih</option>
                        <?php foreach ($jadwalll as $dj) : ?>
                        <?php $jumlah_waktu = substr_count( $dj->jam_pelajaran, ",") +1;  ?>
 						<?php if ($jumlah_waktu == "3") { ?>
                         	
		                        <?php if ($dj->batas_input >= "03:00:00") { ?>
		                        	<option value="<?php echo $dj->id_jadwal ?>" disabled><?php echo $dj->nama_pelajaran ?>  || <?php echo $jumlah_waktu; ?> jam 
                                   </option>
                                    <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;(...Jam Sudah Kelewat,Silahkan hub admin)</option> 
		                         
		                        <?php } else {?>
		                         	<option value="<?php echo $dj->id_jadwal ?>"><?php echo $dj->nama_pelajaran ?>  || <?php echo $jumlah_waktu; ?> jam
                                   </option>
		                         	 
		                        <?php  }?>

                        <?php } else if ($jumlah_waktu == "2") {?>

                         	   <?php if ($dj->batas_input >= "02:00:00") { ?>
		                        	<option value="<?php echo $dj->id_jadwal ?>" disabled><?php echo $dj->nama_pelajaran ?>  || <?php echo $jumlah_waktu; ?> jam 
                                   </option>
                                    <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;(...Jam Sudah Kelewat,Silahkan hub admin)</option> 
		                         
		                        <?php } else {?>
		                         	<option value="<?php echo $dj->id_jadwal ?>"><?php echo $dj->nama_pelajaran ?>  || <?php echo $jumlah_waktu; ?> jam
                                   </option>
		                         	 
		                        <?php  }?>
                         	 

                        <?php } else if ($jumlah_waktu == "1") {?>
                        		<?php if ($dj->batas_input >= "01:00:00") { ?>
		                        	<option value="<?php echo $dj->id_jadwal ?>" disabled><?php echo $dj->nama_pelajaran ?>  || <?php echo $jumlah_waktu; ?> jam
                                   </option>
                                    <option disabled style="font-style:italic">&nbsp;&nbsp;&nbsp;(...Jam Sudah Kelewat,Silahkan hub admin)</option> 
		                         
		                        <?php } else {?>
		                         	<option value="<?php echo $dj->id_jadwal ?>"><?php echo $dj->nama_pelajaran ?>  || <?php echo $jumlah_waktu; ?> jam
                                   </option>
		                         	 
		                        <?php  }?>

                        <?php  }?>


                         
                        <?php endforeach ?>
                  		</select></b></h2></td>
 	</tr>
 	<tr>
 		<td><h2 style="color: green" id="modul_pembahasan"><b>Modul Pembahasan</b></h2></td>
 		<TD> <B>:</B> <input type="text" name="modul_pembahasan" required></TD>
 		<span style="float: right;font-size: 20px"><input type="checkbox"  name="checkedAll" id="checkedAll" /> <b>Hadir Semua </b> </span>
 	</tr>

 </table>
 <br><br>

		 	


         <?= $this->session->flashdata('message'); ?>

		<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			<tr> 
				<td>NO</td>
				<td>NAMA SISWA</td>
         		<td>KETERANGAN</td>
         		
         		
			</tr>
			</thead>
			<tbody>
            <?php 
            $no=1;
            foreach($siswa as $data) { ?>
				<tr>
					<td><?php $a = $no++ ?>
					<?php echo $a ;?>
					</td>
					<td><?php echo $data->nama_siswa ?></td>


					<td>
						<div class="col-md-8 col-sm-6 col-xs-12">
                    
                        <?php foreach ($keterangan_presensi as $kj): ?>
                        	
                         <?php if ($kj->kd_keterangan == "H") { ?>
                         	 <input type="radio" class="checkSingle" required name="kd_keterangan-<?php echo $data->id_siswa?>" value="<?php echo $kj->kd_keterangan ?>"><?php echo $kj->kd_keterangan ?>&nbsp;&nbsp;&nbsp;
                     
                         <?php } else {?>
                         	
                         	 <input type="radio" name="kd_keterangan-<?php echo $data->id_siswa?>" required value="<?php echo $kj->kd_keterangan ?>"><?php echo $kj->kd_keterangan ?>&nbsp;&nbsp;&nbsp;
                       
                         <?php }?>
                       
              <?php endforeach ?>
                  	
                          
                  
                      </div>
            
					</td>
				
					<input type="hidden" name="id_siswa[]" value="<?php echo $data->id_siswa?>">
					<input type="hidden" name="tgl" value="<?php echo date('Y-m-d'); ?>" readonly>
					<input type="hidden" name="tglcek" value="<?php echo date('Y-m-d'); ?>" readonly>
					<input type="hidden" name="rombelcek" value="<?php echo $data->id_kelas?>">
					
					
					
				</tr>

						
		<?php } ?>
		</tbody>

		

			</table>
			   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-10">
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-primary">Cancel</button>
                          
                        </div>
                      </div>
</form>

</div>
</div>
</div>
</div>
</div>