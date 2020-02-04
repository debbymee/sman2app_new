 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
  <thead>
      <tr align="center" style="color: black" >
        <td>NIPDN</td>
        <td>NAMA SISWA</td>
        <td>KETERANGAN</td>
        <td>SEND WHATSAPP ORTU</td>
        <td>TERKIRIM</td>  

      </tr>
</thead>
<tbody>
 <?php foreach($siswa as $row) { ?>
     <tr align="center" >
       <td><?php echo $row->nipd?></td>
       <td><?php echo $row->nama_siswa?></td>
       <td><?php echo $row->nama_keterangan?></td> 
       <td>
          <form action="<?php echo base_url(); ?>wali_kelas/wa_message" method="post"  class="form-horizontal form-label-left" >
            <input type="hidden" name="message" value="Putra / putri anda atas nama '<?php echo $row->nama_siswa?>' Hari ini tidak masuk dengan keterangan '<?php echo $row->nama_keterangan?>'. Demikian pemberitahuan kami, Terima kasih">
            <input type="hidden" name="id_presensi" value="<?php echo $row->id_presensi?>">
             <input type="hidden" name="no_hp_ortu" value="<?php echo $row->no_hp_ortu?>">
            <button type="submit" class="btn btn-success" onclick="return confirm('Klik Ok untuk Kirim Pesan')">Send</button>
          </form>
       </td>
        <?php if ($row->jam_terkirim == "" || $row->jam_terkirim == null) { ?>  
          <td>-</td>
        <?php } else { ?> 
        <td><i class="fa fa-clock"></i> <?php echo $row->jam_terkirim?><b> WIB</b></td>
        <?php } ?> 
     </tr>
 <?php } ?>
 </tbody>
    </table>