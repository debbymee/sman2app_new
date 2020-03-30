
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
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="email">Email  <span class="required">*</span>
        </label>
        
        <div class="col-md-3 col-sm-6 col-xs-12">

          <input id="email" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="email" placeholder="masukkan email guru"  type="email" value="<?php echo $guru->email ?>">
        
          <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

        </div>

      </div>
      <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="NUPTK">NUPTK <span class="required">*</span>
        </label>
        
        <div class="col-md-3 col-sm-6 col-xs-12">

          <input id="NUPTK" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="NUPTK" placeholder="masukkan NUPTK guru"  type="text" value="<?php echo $guru->NUPTK ?>">
        
          <?php echo form_error('NUPTK', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

        </div>

      </div>

   <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jk">Jenis Kelamin <span class="required">*</span>
        </label>

        <div class="col-md-3 col-sm-6 col-xs-12">

          <select class="btn btn-default dropdown-toggle" name="jk" value="<?php echo $guru->jk ?>">
          <?php if($guru->jk == 'L') {?>
            <option value="L" selected> L</option>
            <option value="P">P</option>
          <?php } else { ?>
              <option value="L"> L</option>
            <option value="P" selected>P</option>
            <?php } ?>
          </select>
                        
        <?php echo form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                          
        </div>

    </div>
    <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tempat_lahir"> TEMPAT LAHIR <span class="required">*</span>
        </label>
        <div class="col-md-3 col-sm-6 col-xs-12">
              <input type="text" id="tempat_lahir" name="tempat_lahir" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" value="<?php echo $guru->tempat_lahir ?>"  >
              <?php echo form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

       </div>
  </div>


  <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tgl_lahir"> TANGGAL LAHIR <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class='input-group date' id='guru'>
                            <input type='text' class="form-control" name="tgl_lahir" value="<?php echo $guru->tgl_lahir ?>" readonly="readonly" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
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

          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jenis_ptk">JENIS PTK <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="jenis_ptk" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="jenis_ptk" placeholder="masukkan jenis_ptk guru"  type="text" value="<?php echo $guru->jenis_ptk ?>">
           
          <?php echo form_error('jenis_ptk', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>

    <div class="item form-group">

          <label class="control-label col-md-4 col-sm-3 col-xs-12" for="agama">Agama <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="agama" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="agama" placeholder="masukkan agama guru"  type="text" value="<?php echo $guru->agama ?>">
           
          <?php echo form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

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
          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="RT">RT <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="RT" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="RT" placeholder="masukkan RT"  type="text" value="<?php echo $guru->RT ?>">
                        
            <?php echo form_error('RT', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>
    <div class="item form-group">
          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="RW">RW <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="RW" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="RW" placeholder="masukkan RW"  type="text" value="<?php echo $guru->RW ?>">
                        
            <?php echo form_error('RW', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>
    <div class="item form-group">
          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="dusun">dusun <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="dusun" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="dusun" placeholder="masukkan dusun"  type="text" value="<?php echo $guru->dusun ?>">
                        
            <?php echo form_error('dusun', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>
    <div class="item form-group">
          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="kelurahan">kelurahan <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="kelurahan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="kelurahan" placeholder="masukkan kelurahan"  type="text" value="<?php echo $guru->kelurahan ?>">
                        
            <?php echo form_error('kelurahan', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>
    <div class="item form-group">
          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="kecamatan">kecamatan <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="kecamatan" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="kecamatan" placeholder="masukkan kecamatan"  type="text" value="<?php echo $guru->kecamatan ?>">
                        
            <?php echo form_error('kecamatan', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

          </div>

    </div>
    <div class="item form-group">
          <label class="control-label col-md-5 col-sm-3 col-xs-12" for="kode_pos">kode_pos <span class="required">*</span>
          </label>

          <div class="col-md-3 col-sm-6 col-xs-12">

            <input id="kode_pos" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="kode_pos" placeholder="masukkan kode_pos"  type="text" value="<?php echo $guru->kode_pos ?>">
                        
            <?php echo form_error('kode_pos', '<small class="text-danger pl-3">', '</small>'); ?> <br> 

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
