<div class="x_panel">
    <div class="container">
      <center><h2 style="color: green "> EDIT DATA JADWAL PELAJARAN KELAS 12</h2></center> 
      <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_jadwal12" method ="post"  class="form-horizontal form-label-left"  >

       <?= $this->session->flashdata('message'); ?>
        
           <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hari">Hari <span class="required">*</span>
                </label>

                <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                    <select class="btn btn-default dropdown-toggle" name="hari" value=" <?php echo $jadwal_pelajaran->hari ?> " >
                        <?php if($jadwal_pelajaran->hari == 'Senin') {?>
                            <option value="Senin" selected>Senin</option>
                            <option value="Selasa" >Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>

                        <?php  } else if ($jadwal_pelajaran->hari == 'Selasa') { ?>
                            <option value="Senin" > Senin</option>
                            <option value="Selasa" selected>Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>

                        <?php  } else if ($jadwal_pelajaran->hari == 'Rabu') { ?>
                            <option value="Senin" > Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu"selected>Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>

                        <?php  } else if ($jadwal_pelajaran->hari == 'Kamis') { ?>
                            <option value="Senin" > Senin</option>
                            <option value="Selasa" >Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis"selected>Kamis</option>
                            <option value="Jumat">Jumat</option>                                 
                        
                        <?php  } else if ($jadwal_pelajaran->hari == 'Jumat') { ?>
                            <option value="Senin" > Senin</option>
                            <option value="Selasa" >Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat" selected>Jumat</option>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <input type="hidden" name="id_jadwal" value=" <?php echo $jadwal_pelajaran->id_jadwal ?> ">

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jam_pelajaran"> JAM PELAJARAN <span class="required">*</span>
                </label>

                <div class="col-md-6 col-sm-6 col-xs-12">

                    <select class="btn btn-default dropdown-toggle" name="jam_pelajaran" >
                        <?php if($jadwal_pelajaran->jam_pelajaran == 'jam ke-1') {?>
                        <option value="jam ke-1" selected>jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option>

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-2') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2" selected>jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option>

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-3') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3" selected>jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option>

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-4') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4" selected>jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option>                              
                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-5') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5" selected>jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option> 

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-6') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6" selected>jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option> 

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-7') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7" selected>jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option> 

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-8') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8" selected>jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option> 

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-9') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9" selected>jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option> 

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-10') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10" selected>jam ke-10</option>
                        <option value="jam ke-11">jam ke-11</option> 

                        <?php  } else if ($jadwal_pelajaran->jam_pelajaran == 'jam ke-11') { ?>
                        <option value="jam ke-1">jam ke-1</option>
                        <option value="jam ke-2">jam ke-2</option>
                        <option value="jam ke-3">jam ke-3</option>
                        <option value="jam ke-4">jam ke-4</option>
                        <option value="jam ke-5">jam ke-5</option>
                        <option value="jam ke-6">jam ke-6</option>
                        <option value="jam ke-7">jam ke-7</option>
                        <option value="jam ke-8">jam ke-8</option>
                        <option value="jam ke-9">jam ke-9</option>
                        <option value="jam ke-10">jam ke-10</option>
                        <option value="jam ke-11" selected="">jam ke-11</option> 

                        <?php } ?>
                        
           
                    </select>
                 </div>
            </div>


            <div class="item form-group">
                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_mapel">MATA PELAJARAN <span class="required">*</span>
                 </label>

                <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                    <select class="btn btn-default dropdown-toggle" name="kd_mapel" >

                    <?php foreach ($mata_pelajaran as $dj  ): ?>
                        <option value="<?php echo $dj->kd_mapel ?>" <?php echo ($dj->kd_mapel == $jadwal_pelajaran->kd_mapel_fk)?'selected="selected"':''?>><?php echo $dj->nama_pelajaran?></option>

                    <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('kd_mapel', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kelas">NAMA KELAS <span class="required">*</span>
                </label>

                <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                    <select class="btn btn-default dropdown-toggle" name="id_kelas" >
                  
                    <?php foreach ($kelas as $rl  ): ?>
                        <option value="<?php echo $rl->id_kelas ?>" <?php echo ($rl->id_kelas == $jadwal_pelajaran->id_kelas_fk)?'selected="selected"':''?>><?php echo $rl->nama_kelas?></option>

                    <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                </div>
            </div>


            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_guru">Nama Guru <span class="required">*</span>
                </label>

               <div class="btn-group col-md-6 col-sm-6 col-xs-12" >
             
                    <select class="btn btn-default dropdown-toggle" name="id_guru"  >

                    <?php foreach ($guru as $gru  ): ?>
                    <option value="<?php echo $gru->id_guru ?>" <?php echo ($gru->id_guru == $jadwal_pelajaran->id_guru_fk)?'selected="selected"':''?>><?php echo $gru->nama_guru?></option>

                    <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('id_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                </div>
            </div>

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_tahun_ajaran">Tahun Ajaran <span class="required">*</span>
                </label>

                <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                    <select class="btn btn-default dropdown-toggle" name="id_tahun_ajaran" >

                    <?php foreach ($tahun as $gru  ): ?>
                    <option value="<?php echo $gru->id_tahun_ajaran ?>" <?php echo ($gru->id_tahun_ajaran == $jadwal_pelajaran->id_tahun_ajaran_fk)?'selected="selected"':''?>><?php echo $gru->tahun_ajaran?></option>

                    <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('id_tahun_ajaran', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                </div>
            </div>
                

              <div class="ln_solid"></div>
               <div class="form-group">
                <div class="col-md-3 col-md-offset-4">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-primary">Cancel</button>

                </div>
              </div>
 
</form>
          <?php //echo form_close(); ?>
     

  </div>
</div>
</div>
</div>
</div>