
                <div class="x_panel">
			<div class="container">

		<h2 style="color: green " align="center"> DATA GURU SMAN 2 MOJOKERTO</h2>
		<hr>

		<?= $this->session->flashdata('message'); ?>
      
		<a href="<?php echo base_url(); ?>admin/form_guru"> <button type="button" class="btn btn-success btn-lg"  > + TAMBAH GURU</button> </a>
		 <br><br>
		  <span>*Untuk menambahkan data guru secara manual</span>
		 <br><br>  <hr>
		 <form method="post" action="<?php echo base_url("admin/form_data_guru"); ?>" enctype="multipart/form-data">

		 	<input type="file" name="file">
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->

    <br> Pilih file terlebih dahulu lalu Upload*: <br><input type="submit" value="Upload" name="preview" class="btn btn-primary">
  </form>

      <form method="post" action="<?php echo base_url("admin/import_data_guru"); ?>" enctype="multipart/form-data">
    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    <br>Import Ke Database*: <br>
<input type="submit" value="Import" class="btn btn-primary">
</form><br>
<p>
* file yang bisa di import adalah .xls (Excel 2003-2007).</p>


    <!-- 
    -- Buat sebuah input type file
    -- class pull-left berfungsi agar file input berada di sebelah kiri
    -->
    
    
    <!--
    -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
    -->
   
  </form>

      </div>
      <hr>

      <form>
		<table id="datatable" class="table table-striped table-bordered">
			<thead>
			<tr align="center">
				<td>NO</td>
				<td>NAMA GURU</td>
				<td>EMAIL</td>
				<td>NUPTK</td>
				<td>JK</td>
				<td>TEMPAT LAHIR</td>
				<td>TANGGAL LAHIR</td>
				<td>NIP</td>
				<td>JENIS PTK</td>
				<td>AGAMA </td>
				<td>ALAMAT</td>
				<td>RT</td>
				<td>RW</td>
				<td>DUSUN</td>
				<td>KELURAHAN</td>
				<td>KECAMATAN</td>
				<td>KODE POS</td>
				<td>NO HP</td>
				<td>AKSI</td>
			</tr>
			</thead>
			<tbody>

			<?php 
				$no = 1;
				foreach ($guru as $gr){
			 ?>
			 <tr>
			 	<td><?php echo $no++ ?></td>
			 	<td><?php echo $gr->nama_guru ?></td>
			 	<td><?php echo $gr->email ?></td>
			 	<td><?php echo $gr->NUPTK ?></td>
			 	<td><?php echo $gr->jk ?></td>
			 	<td><?php echo $gr->tempat_lahir ?></td>
			 	<td><?php echo $gr->tgl_lahir; ?></td>
			 	<td><?php echo $gr->nip; ?></td>
			 	<td><?php echo $gr->jenis_ptk ?></td>
			 	<td><?php echo $gr->agama ?></td>
			 	<td><?php echo $gr->alamat ?></td>
			 	<td><?php echo $gr->RT ?></td>
			 	<td><?php echo $gr->RW ?></td>
			 	<td><?php echo $gr->dusun ?></td>
			 	<td><?php echo $gr->kelurahan ?></td>
			 	<td><?php echo $gr->kecamatan ?></td>
			 	<td><?php echo $gr->kode_pos ?></td>
			 	<td><?php echo $gr->no_hp ?></td>
			 	<td>
			 	<a href="<?php echo site_url('admin/edit_guru/'.$gr->id_guru); ?>" class="btn btn-sm btn-info">Edit</a>
				 <a href="#" data-id="<?php echo $gr->id_guru ?>" class="sa-remove-guru btn btn-sm btn-danger">Hapus</a> 
				</td>
			 </tr>

			<?php } ?>
		</table>
		</tbody>
	</form>

    </div>


	


