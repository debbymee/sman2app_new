        <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> DAFTAR ROMBEL
			
		</h2>
		<hr>

		<?= $this->session->flashdata('message'); ?>
	
		<a href="<?php echo base_url(); ?>admin/form_rombel"> <button type="button" class="btn btn-success btn-lg"  > + TAMBAH ROMBONGAN BELAJAR</button> </a>
		 <br><br>



	


	<form>
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
			<tr align="center">
			
				<td>Kelas</td>
				<td>Wali Kelas</td>

				<td>Aksi</td>
			</tr>
		</thead>

	
		<tbody align="center">
			<?php 
				$no = 1;
				foreach ($tahun_rombel as $row_tahun){

			 ?>
			  <a href="">Tahun Ajaran : <?php echo $row_tahun->tahun_ajaran; ?></a> <br><br><br>

			  <?php }?>
			<?php 
				$no = 1;
				foreach ($rombel as $row){

			 ?>
			 <tr>
			 
	
			 	<td><?php echo $row->nama_kelas ?></td>
			 	<td><?php echo $row->nama_guru ?></td>
			 	<td>
			 	<a href="<?php echo site_url('admin/edit_rombel/'.$row->id_detail); ?>" class="btn btn-sm btn-info">Edit</a>
				 
				</td>
			 </tr>

		<?php } ?>
		</tbody>

		</table>


</form>

</div>
</div>