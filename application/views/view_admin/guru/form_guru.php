                <div class="x_panel">
                <div class="container">

                  <center><h2 style="color: green "> FORM TAMBAH GURU</h2></center> <hr>
                  <br> 
      <?php if (validation_errors() ) 
    { ?>
      <div  class="alert alert-danger" role="alert">
        <?php echo validation_errors(); ?>
        

      </div>
    <?php } ?>
                  
          <form action="<?php echo base_url(); ?>admin/tambah_guru" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data" >

					<?= $this->session->flashdata('message'); ?>
      
    
   					        <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nama_guru">NAMA GURU <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="nama_guru" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="nama_guru" placeholder="masukkan nama guru"  type="text" value=" <?php echo set_value('nama_guru'); ?>">
                          <input type="hidden" name="id_guru">
                          <?php echo form_error('nama_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br>	

                        </div>

                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tgl_lahir"> TANGGAL LAHIR <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class='input-group date' id='myDatepicker4' name="tgl_lahir">
                            <input type='text' class="form-control" name="tgl_lahir" readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        </div>
                      </div>


                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jk">Jenis Kelamin <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <select class="btn btn-default dropdown-toggle" name="jk">
                            <option value="laki-laki"> laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                          </select>
                        
                          <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?> <br>	
                          
                        </div>

                    </div>

                    <div class="item form-group">

                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
                        </label>

                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="nip" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="nip" placeholder="masukkan nip guru"  type="text" value="<?php echo set_value('nip'); ?>">
                         
                          <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="alamat">ALAMAT <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="alamat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="alamat" placeholder="masukkan alamat"  type="text" value="<?php echo set_value('alamat'); ?>">
                        
                          <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="no_hp"> NO HANDPHONE <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="no_hp" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="no_hp" placeholder="masukkan nomer handphone"  type="text" value="<?php echo set_value('no_hp'); ?>">
                         
                          <?php echo form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

                        </div>

                    </div>

             
                  <div class="item form-group">
                   <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_user"> NAMA AKUN <span class="required">*</span>
                    </label>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <select name="id_user" class="form-control">
                        <?php foreach ($users as $l  ): ?>
                          <option value="<?php echo $l->id ?>"> <?php echo $l->username; ?></option>
                        <?php endforeach ?>
                      </select>

                        <?php echo form_error('id_user', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>

                </div>
                <div class="item form-group">
                   <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_user"> MASUKKAN FOTO <span class="required">*</span>
                    </label>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                       
                     <input type="file" name="gambar" id="preview_gambar" />
                     <br>
                     <img src="<?php echo base_url(); ?>public/images/sman2.png" id="gambar_nodin" width="40%" height="40%" alt="Preview Gambar" />
                     <?php  echo "file max 3mb"; ?>
                      </div>
                  </div>

   
                  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-md-offset-4">
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


