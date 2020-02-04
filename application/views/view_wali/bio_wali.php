
                <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> BIO DATA WALI KELAS SMAN 2 MOJOKERTO</h2>
		<hr>

		<?= $this->session->flashdata('message'); ?>

	<form>
		<?php
				foreach ($wali as $foto){
			 ?>
	<center><img src="<?php echo base_url(); ?>foto/guru/<?php echo $foto->foto; ?>" style="width: 15%;height: 15%"></center>
	<br>
	<?php } ?>
		<table class="table table-striped table-bordered table-hover table-condensed" >
			<tr align="center" style="color: black" >
				<td >NO</td>
				<td>NAMA GURU</td>
				<td>JK</td>
				<td>NIP</td>
				<td>ALAMAT</td>
				<td>NO HP</td>
				<td>AKUN USER</td>
				

			</tr>

			<?php 
				$no = 1;
				foreach ($wali as $gr){
			 ?>
				<tr align="center" style="color: black">
			 	<td><?php echo $no++ ?></td>
			 	<td><?php echo $gr->nama_guru ?></td>
			 	<td><?php echo $gr->jk ?></td>
			 	<td><?php echo $gr->nip ?></td>
			 	<td><?php echo $gr->alamat ?></td>
			 	<td><?php echo $gr->no_hp; ?></td>
			 	<td><?php echo $gr->username; ?></td>

		
			 </tr>

			<?php } ?>
		</table>


</form>

</div>
</div>
</div>
</div>
</div>