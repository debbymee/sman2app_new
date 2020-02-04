                <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: green "> FORM INPUT DATA SISWA </h2></center> <hr>
                  <br> 
   
            <?php if (validation_errors() ) 
             { ?>
            <div  class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
            

            </div>
            <?php } ?>
                      
            <form action="<?php echo base_url(); ?>admin/tambah_siswa" method ="post"  class="form-horizontal form-label-left"  >

              <?= $this->session->flashdata('message'); ?>
          
                      
                  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_siswa">NAMA SISWA <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input id="nama_siswa" class="form-control col-md-7 col-xs-12"name="nama_siswa" placeholder="masukkan nama siswa"  type="text" 
                          value="<?php echo set_value('nama_siswa'); ?>" >
                          <input type="hidden" name="id_siswa">
                          <?php echo form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nipd">NIPD <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nipd" name="nipd" placeholder="masukkan nipd siswa 5 kar" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('nipd'); ?>">
                        </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jk">JENIS KELAMIN <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="btn btn-default dropdown-toggle" name="jk" value="<?php echo $siswa->jk ?>">

                          <?php if($validasi_jk == 'laki-laki') {?>
                          <option value="laki-laki" selected> laki-laki</option>
                          <option value="perempuan" >Perempuan</option>
                        <?php } else { ?>
                            <option value="laki-laki" > laki-laki</option>
                          <option value="perempuan" selected>Perempuan</option>
                          <?php } ?>
                        </select>
                          <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                          
                        </div>

                    </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nisn">NISN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nisn" name="nisn" placeholder="masukkan nisn siswa 10 kar"  required="required" minlength="10" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('nisn'); ?>">
                        </div>
                      </div>
                      
                
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tempat_lahir">TEMPAT LAHIR <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="tempat_lahir" name="tempat_lahir"placeholder="masukkan tempat lahir siswa"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('tempat_lahir'); ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgl_lahir"> TANGGAL LAHIR <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="tgl_lahir" name="tgl_lahir" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('tgl_lahir'); ?>">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nik" name="nik" placeholder="masukkan nik siswa 10 kar"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('nik'); ?>">
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="agama">AGAMA <span class="required">*</span>
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">

                         <select class="btn btn-default dropdown-toggle" name="agama" value="<?php echo $siswa->agama ?>">

                         <?php if($validasi_agama == 'Islam') {?>
                            <option value="Islam" selected>Islam</option>
                            <option value="Kristen" >Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>

                          <?php  } else if ($validasi_agama == 'Kristen') { ?>
                            <option value="Islam" > Islam</option>
                            <option value="Kristen" selected>Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>

                          <?php  } else if ($validasi_agama == 'Protestan') { ?>
                            <option value="Islam" > Islam</option>
                            <option value="Kristen" >Kristen</option>
                            <option value="Protestan" selected>Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>

                           <?php } else if ($validasi_agama == 'Hindu') { ?>
                            <option value="Islam" > Islam</option>
                            <option value="Kristen" >Kristen</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu" selected>Hindu</option>
                            <option value="Buddha">Buddha</option>       

                           <?php }  else if ($validasi_agama == 'Buddha') { ?>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">ALAMAT <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="alamat" name="alamat" placeholder="masukkan alamat siswa"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('alamat'); ?>">
                        </div>
                      </div>


                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kelas">KELAS <span class="required">*</span>
                      </label>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="id_kelas" class="form-control">
                         <?php foreach ($kelas as $r ): ?>
                       <option value="<?php echo $r->id_kelas ?>" <?php echo ($r->id_kelas == $validasi_kelas)?'selected="selected"':''?>><?php echo $r->nama_kelas?></option>

                         <?php endforeach ?>
                        </select>

                          <?php echo form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>

                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="no_hp_ortu">NO HP ORANG TUA <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="no_hp" name="no_hp_ortu" placeholder="masukkan no_hp siswa 10 kar"  required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12"  value="<?php echo set_value('no_hp_ortu'); ?>">
                        </div>
                     </div>

          
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
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