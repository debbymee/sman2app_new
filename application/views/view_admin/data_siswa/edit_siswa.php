
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: green "> EDIT DATA SISWA</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_siswa" method ="post"  class="form-horizontal form-label-left"  >
  
   <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_siswa">ID SISWA<span class="required">*</span>
        </label>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <input id="id_siswa" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id_siswa" placeholder="" required="required" type="text" readonly value="<?php echo $siswa->id_siswa ?>" >

        </div> 
    </div>

    <input type="hidden" name="kode" value="<?php echo $siswa->id_siswa ?>">

              <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nama_siswa">NAMA SISWA <span class="required">*</span>
                  </label>
                  
                  <div class="col-md-3 col-sm-6 col-xs-12">

                    <input id="nama_siswa" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_siswa" placeholder="masukkan nama siswa"  type="text" value="<?php echo $siswa->nama_siswa ?>">
                  
                    <?php echo form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                  </div>

                </div>

                <div class="item form-group">

                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nipd">NIPD<span class="required">*</span>
                    </label>

                    <div class="col-md-3 col-sm-6 col-xs-12">

                      <input id="nipd" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nipd" placeholder="masukkan nipd siswa"  type="text" value=" <?php echo $siswa->nipd ?>">
                     
                    <?php echo form_error('nipd', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                    </div>

              </div>


             <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jk">Jenis Kelamin <span class="required">*</span>
                  </label>

                  <div class="col-md-3 col-sm-6 col-xs-12">

                    <select class="btn btn-default dropdown-toggle" name="jk" value="<?php echo $siswa->jk ?>">
                    
                    <?php if($siswa->jk == 'laki-laki') {?>
                      <option value="laki-laki" selected> laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    <?php } else { ?>
                        <option value="laki-laki"> laki-laki</option>
                      <option value="perempuan" selected>Perempuan</option>
                      <?php } ?>
                    </select>
                                  
                  <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                                    
                  </div>

              </div>

              <div class="item form-group">

                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nisn">NISN<span class="required">*</span>
                    </label>

                    <div class="col-md-3 col-sm-6 col-xs-12">

                      <input id="nisn" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nisn" placeholder="masukkan nisn siswa"  type="text" value=" <?php echo $siswa->nisn ?>">
                     
                    <?php echo form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                    </div>

              </div>
              <div class="item form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tempat_lahir">TEMPAT LAHIR <span class="required">*</span>
                    </label>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="masukkan tempat lahir siswa"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" value="<?php echo $siswa->tempat_lahir ?>">

                      <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                    </div>
            </div>

            <div class="item form-group">
                  <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tgl_lahir"> TANGGAL LAHIR <span class="required">*</span>
                  </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                        <input type="date" id="tgl_lahir" name="tgl_lahir" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" value="<?php echo $siswa->tgl_lahir ?>"  >
                        <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                 </div>
            </div>

            <div class="item form-group">
                 <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nik">NIK <span class="required">*</span>
                 </label>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                  <input type="text" id="nik" name="nik" placeholder="masukkan nik siswa 10 kar"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" value="<?php echo $siswa->nik ?>">

                   <?php echo form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?> <br> 
                 </div>
          </div>

            <div class="item form-group">
                 <label class="control-label col-md-4 col-sm-3 col-xs-12" for="agama">AGAMA <?php echo $siswa->agama ?> <span class="required"></span>
                </label>

                <div class="col-md-3 col-sm-6 col-xs-12">

                  <select class="btn btn-default dropdown-toggle" name="agama" value="<?php echo $siswa->agama ?>">

                         <?php if($siswa->agama == 'Islam') {?>
                            <option value="Islam" selected>Islam</option>
                            <option value="Kristen" >Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>

                          <?php  } else if ($siswa->agama == 'Kristen') { ?>
                            <option value="Islam" > Islam</option>
                            <option value="Kristen" selected>Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>

                          <?php  } else if ($siswa->agama== 'Protestan') { ?>
                            <option value="Islam" > Islam</option>
                            <option value="Kristen" >Kristen</option>
                            <option value="Protestan" selected>Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>

                           <?php } else if ($siswa->agama == 'Hindu') { ?>
                            <option value="Islam" > Islam</option>
                            <option value="Kristen" >Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu" selected>Hindu</option>
                            <option value="Buddha">Buddha</option>       

                           <?php }  else if ($siswa->agama == 'Buddha') { ?>
                            <option value="Islam" > Islam</option>
                            <option value="Kristen" >Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu" >Hindu</option>
                            <option value="Buddha" selected>Buddha</option>   
                            <?php } ?>
                          

                          
                          </select>
                 <?php echo form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                                    
                </div>

            </div>



              <div class="item form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="alamat">ALAMAT <span class="required">*</span>
                    </label>

                    <div class="col-md-3 col-sm-6 col-xs-12">

                      <input id="alamat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"name="alamat" placeholder="masukkan alamat"  type="text" value="<?php echo $siswa->alamat ?>">
                                  
                      <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                    </div>

              </div>


              <div class="item form-group">
                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_kelas">KELAS <span class="required">*</span>
                    </label>

                  <div class="col-md-3 col-sm-6 col-xs-12">
                  <select name="id_kelas" class="form-control">
                        <?php foreach ($kelas as $r ): ?>
                         <option value="<?php echo $r->id_kelas ?>" <?php echo ($r->id_kelas)?'selected="selected"':''?>><?php echo $r->nama_kelas?></option>

                         <?php endforeach ?>
                        </select>

                    <?php echo form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                   </div>

              </div>
              
                 <div class="item form-group">
                    <label class="control-label col-md-4 col-sm-6 col-xs-12" for="no_hp">NO HP ORANG TUA <span class="required">*</span>
                    </label>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                       <input type="text" id="no_hp" name="no_hp" placeholder="masukkan no_hp siswa 10 kar"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" value="<?php echo $siswa->no_hp_ortu ?>">
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
