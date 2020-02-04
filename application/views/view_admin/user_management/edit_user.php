  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: green "> EDIT DATA USER</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_user" method ="post"  class="form-horizontal form-label-left"  >



	<div class="item form-group">

            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="username">Username <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

              <input id="username" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
              name="username" placeholder="" required="required" type="text" readonly value="<?php echo $users->username ?>">

          
              <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?> <br>  

            </div>
  </div>
  <input type="hidden" name="id" value="<?php echo $users->id ?>">


      
   <div class="item form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
            </label>
            <div class="col-md-3 col-sm-6 col-xs-12">

              <input id="password" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
              name="password" placeholder="Isi apabila ingin edit password" type="password" value="">
            
              <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
              
              </div>

    </div>


    <div class="item form-group">
        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="role_id">role_user <span class="required">*</span>
        </label>
            <div class="btn-group col-md-6 col-sm-6 col-xs-12">
  
                <select name="role" class="form-control">
                    <?php foreach ($role as $r): ?>
                      <option value="<?php echo $r->id_role ?>" <?php echo ($r->id_role== $users->role_id_fk)?'selected="selected"':''?>><?php echo $r->role?></option>
      <?php endforeach ?>
    </select>

                <?php echo form_error('role_id_fk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
 
           </div>
           <div class="item form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="role_id_fk">Siswa Admin<span class="required">*</span>
              </label>
                  <div class="btn-group col-md-3 col-sm-6 col-xs-12">
                      <select name="siswa_admin" class="form-control">
                          <option value="">--Pilih Siswa Admin--</option>
                        <?php foreach ($siswa_admin as $r): ?>
                          <option value="<?php echo $r->id_detail ?>"> <?php echo $r->nama_siswa; ?>
                          </option>
                        <?php endforeach ?>
                      </select>

                    <?php echo form_error('role_id_fk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                      </div>
             
                  </div>

                   <div class="item form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="id_guru_fk">GURU<span class="required">*</span>
              </label>
                  <div class="btn-group col-md-5 col-sm-6 col-xs-12">
                      <select name="guru" class="form-control">
                        <option value="">Pilih Guru</option>
                        <?php foreach ($guru as $r): ?>
                          <option value="<?php echo $r->id_guru ?>"> <?php echo $r->nama_guru; ?>
                          </option>
                        <?php endforeach ?>
                      </select>

                    <?php echo form_error('id_guru_fk', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
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