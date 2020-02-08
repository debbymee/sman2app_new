                <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> DAFTAR PRESENSI SISWA KELAS <?php echo $this->session->userdata('tahun_ajaran');?> <?php echo $this->session->userdata('semester');?></h2> 
		<hr>
		 <br><br>
		 <?= $this->session->flashdata('message'); ?>
      
		<a href="<?php echo base_url(); ?>Guru/input_presensi12"> <button type="button" class="btn btn-success btn-lg"  > + INPUTKAN PRESENSI</button> </a>
		 <br><br>


			<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
		
			<tr> 
				<td>NO</td>
				<td>TANGGAL</td>
				<td>NAMA SISWA</td>
				<td>KELAS</td>
         		<td>JADWAL PELAJARAN</td>
         		<td>JAM PELAJARAN</td>
         		<td>KETERANGAN</td>
         		<td>LAMPIRAN</td>
         		<td>AKSI</td>
			</tr>
			</thead>
			<tbody>
            <?php
            $no = 1; 
            foreach($presensi as $p) { ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $p->tgl  ?></td>
					<td><?php echo $p->nama_siswa  ?></td>
					<td><?php echo $p->nama_kelas ?></td>
                   	<td><?php echo $p->nama_pelajaran ?></td>
                    <td><?php echo $p->jam_pelajaran  ?></td>
					<td><?php echo $p->nama_keterangan  ?></td>
					<td>
						<?php if ($p->foto == '' || $p->foto==null) { ?>  
						<?php echo "<p style='text-align:center;''>-</p>";?>

						 <?php } else { ?>
						 	<a href="<?php echo base_url('foto/presensi/'.$p->foto);?>" target="_blank">Lihat disini</a>

						<?php } ?>

						
					</td>
						
						

	
					<td>
		
			    <a href="<?php echo site_url('guru/edit_presensi12/'.$p->id_presensi); ?>" class="btn btn-sm btn-info">Edit</a>
				
				</td>
					
					
				</tr>
			<?php } 
			
			 ?>
		

			</table>
</form>

</div>
</div>
</div>
</div>
</div>