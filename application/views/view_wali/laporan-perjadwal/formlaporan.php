        <div class="x_panel">
      <div class="container">

      <h2 style="color: green " align="center"> LAPORAN PRESENSI SISWA KELAS 12</h2> <?php echo $this->session->userdata('nama_guru'); ?> || <?php echo $this->session->userdata('nip'); ?> 
        <hr>
         <br><br>
               
                 

    
     <form action="<?php echo base_url(); ?>wali_kelas/laporan_perjadwal" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >


  <table>
  <tr>
    <td>
      <label class="control-label col-md-6 col-sm-3 col-xs-12" for="tgl">Pilih Tanggal Cetak <span class="required">*</span>
                  </label>

                  <div class="col-md-3 col-sm-6 col-xs-12">

                    
                     <input type="text" name="datefilter" autocomplete="off" value="" placeholder="Choose Date Report"/> <br>  
                                    
                  </div>
        </td>

               <input type="hidden" id="dateawal" value="" name="tgl_awal" placeholder="Date awal"/>
               <input type="hidden" id="dateakhir" value="" name="tgl_akhir" placeholder="Date awal"/>

  </tr>
  

 </table>


      <div class="form-group">

                      <div class="col-md-8">
                      <label>Masukkan Jadwal Pelajaran</label>
                      <select class="btn btn-default dropdown-toggle form-control" id="jadwal" name="id_jadwal" >

                       <option>Pilih</option>
                        <?php foreach ($jadwalll as $dj) : ?>

                          <option value="<?php echo $dj->id_jadwal ?>"><?php echo $dj->nama_pelajaran ?> - <?php echo $dj->jam_pelajaran ?>
                          </option>
                        <?php endforeach ?>
           
                      </select>
                    </div>
                  </div>
          
        <h5><input type="checkbox" name="checkedAll" id="checkedAll"> CHEKLIST SEMUA </h5>
    <table cellspacing="0" cellpadding="2" border="1" style="width:50%;border-collapse:collapse;font-size:85%">
      <thead>
      <tr align="center">
        <td rowspan="2"  style="width:3%">NO</td>
        <td rowspan="2"  style="width:5%">NIPD</td>
        <td rowspan="2"  style="width:6%">NAMA SISWA</td>
        <td rowspan="2"  style="width:2%">JK</td>
      
        
        <td rowspan="2"  style="width:2%">CHEKLIST</td>
      </tr>
      </thead>

      <tbody>

      <?php 
        $no = 1;
        foreach ($siswa as $sw){
       ?>
       <tr align="center">
        
        <td ><?php echo $no++ ?></td>
        <td><?php echo $sw->nipd ?></td>
        <td><?php echo $sw->nama_siswa ?></td>
        <td><?php echo $sw->jk ?></td>
        <td><input type="checkbox" class="checkSingle" name="id[]" value="<?php echo $sw->id_siswa ?>"></td>
        
       </tr>

      <?php } ?>
      </tbody>
    </table>
<hr>

    
         <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-12">
                        <button id="send" type="submit" class="btn btn-success" target="_blank"><i class="fa fa-print"> </i> Cetak</button>
                          
                        </div>
                      </div>

</form>

</div>
</div>
</div>
</div>
</div>
