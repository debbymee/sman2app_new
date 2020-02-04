
                <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: green "> TAMBAH JADWAL PELAJARAN KELAS 12</h2></center> <hr>
                  <br> 
   
      
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form action="<?php echo base_url(); ?>admin/tambah_jadwal12" method="post" class="form-horizontal form-label-left" harivalidate>
                    <?= $this->session->flashdata('message'); ?>

  
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hari">Hari <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single" name="hari" >
                        <option value="">Pilih Hari</option>
                        <option>Senin</option>
                        <option>Selasa</option>
                        <option>Rabu</option>
                        <option>Kamis</option>
                        <option>Jumat</option>
           
                         </select>
                    </div>
                    </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jam_pelajaran"> JAM PELAJARAN <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
<!--         -->                     
                        <select class="js-example-basic-single col-md-3" name="jam_pelajaran" >
                        <option value="">Pilih Jam Pelajaran</option>
                        <option>jam ke-1</option>
                        <option>jam ke-2</option>
                        <option>jam ke-3</option>
                        <option>jam ke-4</option>
                        <option>jam ke-5</option>
                        <option>jam ke-6</option>
                        <option>jam ke-7</option>
                        <option>jam ke-8</option>
                        <option>jam ke-9</option>
                        <option>jam ke-10</option>
                        <option>jam ke-11</option>
           
                         </select>
                           </div>
                      </div>

            
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kd_mapel">MATA PELAJARAN <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single col-md-3" name="kd_mapel" >
                        <option value="">Pilih Mata Pelajaran</option>
                        <?php foreach ($mata_pelajaran as $dj): ?>
                         
                          <option value="<?php echo $dj->kd_mapel ?>"><?php echo $dj->nama_pelajaran; ?></option>
                        <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('kd_mapel', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
                      </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_kelas">NAMA KELAS <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single" name="id_kelas" >
                        <option value="">Pilih Kelas</option>
                        <?php foreach ($kelas as $rl): ?>
                       
                          <option value="<?php echo $rl->id_kelas ?>"><?php echo $rl->nama_kelas; ?></option>
                        <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_guru">Nama Guru <span class="required">*</span>
                        </label>
                       <div class="btn-group col-md-6 col-sm-6 col-xs-12">
             
                        <select class="js-example-basic-single" name="id_guru" >
                        <option value="">Pilih Nama Guru Pengajar</option>
                        <?php foreach ($guru as $gru): ?>
                         
                          <option value="<?php echo $gru->id_guru ?>"><?php echo $gru->nama_guru; ?></option>
                        <?php endforeach ?>
           
                    </select>
                    <?php echo form_error('id_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
                      </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran<span class="required">*</span>
              </label>
                   <div class="btn-group col-md-6 col-sm-6 col-xs-12">
                      <select  class="js-example-basic-single" name="id_tahun_ajaran">
                        <option value="">Pilih Tahun Ajaran</option>
                        <?php foreach ($tahun as $r): ?>
                          <option value="<?php echo $r->id_tahun_ajaran ?>"> 
                            <?php echo $r->tahun_ajaran; ?>                          
                        </option>
                        <?php endforeach ?>
                      </select>

                    <?php echo form_error('id_tahun_ajaran', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
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