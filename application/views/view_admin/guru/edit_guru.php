
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: green "> EDIT DATA GURU</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_guru" method ="post"  class="form-horizontal form-label-left" enctype="multipart/form-data">
  
   <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_guru">ID GURU<span class="required">*</span>
        </label>
        <div class="col-md-3 col-sm-6 col-xs-12">
        <input id="id_guru" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="id_guru" placeholder="" required="required" type="text" readonly value="<?php echo $guru->id_guru ?>" >

        </div> 
    </div>

    <input type="hidden" name="kode" value="<?php echo $guru->id_guru ?>">

    <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nama_guru">NAMA GURU <span class="required">*</span>
        </label>
        
        <div class="col-md-3 col-sm-6 col-xs-12">

          <input id="nama_guru" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_guru" placeholder="masukkan nama guru"  type="text" value="<?php echo $guru->nama_guru ?>">
        
          <?php echo form_error('nama_guru', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

        </div>

      </div>

  <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tgl_lahir"> TANGGAL LAHIR <span class="required">*</span>
        </label>
        <div class="col-md-3 col-sm-6 col-xs-12">
              <input type="date" id="tgl_lahir" name="tgl_lahir" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" value="<?php echo $guru->tgl_lahir ?>"  >
              <?php echo form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

       </div>
  </div>


   <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jk">Jenis Kelamin <span class="required">*</span>
        </label>

        <div class="col-md-3 col-sm-6 col-xs-12">

          <select class="btn btn-default dropdown-toggle" name="jk" value="<?php echo $guru->jk ?>">
          <?php if($guru->jk == 'laki-laki') {?>
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

          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nip">NIP <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="nip" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nip" placeholder="masukkan nip guru"  type="text" value="<?php echo $guru->nip ?>">
           
          <?php echo form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>

    <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="alamat">ALAMAT <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="alamat" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="alamat" placeholder="masukkan alamat"  type="text" value="<?php echo $guru->alamat ?>">
                        
            <?php echo form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>

    <div class="item form-group">
         <label class="control-label col-md-4 col-sm-3 col-xs-12" for="no_hp"> NO HANDPHONE <span class="required">*</span>
          </label>
        
        <div class="col-md-3 col-sm-6 col-xs-12">

          <input id="no_hp" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"name="no_hp" placeholder="masukkan nomer handphone"  type="text" value="<?php echo $guru->no_hp ?>">
                         
          <?php echo form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

        </div>

    </div>

             
    <div class="item form-group">
          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_user">NAMA AKUN<span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">
              <select name="id_user" class="form-control">
               <?php foreach ($users as $ru  ): ?>
             <option value="<?php echo $ru->id ?>" <?php echo ($ru->id == $guru->id_user_fk)?'selected="selected"':''?>><?php echo $ru->username?></option>

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
                     <img src="<?php echo base_url('foto/guru/'.$guru->foto);?>" id="gambar_nodin" width="40%" height="40%" alt="Preview Gambar" />
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
