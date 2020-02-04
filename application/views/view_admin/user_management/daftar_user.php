        <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> DAFTAR USER</h2>
		<hr>

		<?= $this->session->flashdata('message'); ?>
	
		<a href="<?php echo base_url(); ?>admin/tambah_user"> <button type="button" class="btn btn-success btn-lg"  > + TAMBAH USER</button> </a>
		 <br><br>


	


	<form>
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
			<tr align="center">
				<td>No</td>
				<td>Username</td>
				<td>Password</td>
				<td>Nama Level</td>
				<td>Aksi</td>
			</tr>
		</thead>

	
		<tbody>
			<?php 
				$no = 1;
				foreach ($user as $log){
			 ?>
			 <tr>
			 	<td><?php echo $no++ ?></td>
			 	<td><?php echo $log->username ?></td>
			 	<td><?php echo $log->password ?></td>
			 	<td><?php echo $log->role ?></td>
			 	<td>
			 	<a href="<?php echo site_url('admin/edit_user/'.$log->id); ?>" class="btn btn-sm btn-info">Edit</a>
				 <a href="#" data-id="<?php echo $log->id ?>" class="sa-remove-user btn btn-sm btn-danger">Hapus</a>
				</td>
			 </tr>

			<?php } ?>
		</tbody>

		</table>


</form>

</div>
</div>