               <div class="x_panel">
                <div class="container">
                  <center><h2 style="color: green "> FORM TAHUN AJARAN BARU</h2></center> <hr>
                  <br> 
                <?php if (validation_errors() ) 
        { ?>
          <div  class="alert alert-danger" role="alert">
            <?php echo validation_errors(); ?>
            

          </div>
        <?php } ?>
                  
          <form action="<?php echo base_url(); ?>admin/tambah_tahun" method ="post"  class="form-horizontal form-label-left"  >
      
         
   					<div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tahun_ajaran">Tahun Ajaran <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                          <input id="tahun_ajaran" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" 
                          name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran Baru"  type="text"> 
                          <input type="hidden" name="id_tahun_ajaran">
                        </div><?php echo "Contoh : 2019/2020 "; ?>
            </div>

            <div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="semester">Semester <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">

                        <select name="semester" class="form-control">
                          <?php foreach ($semester as $r): ?>
                            <option value="<?php echo $r->kd_semester ?>"> <?php echo $r->semester; ?>
                            </option>
                          <?php endforeach ?>
                        </select>
                        </div>
            </div>

   					<div class="item form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                        </label>
                        <div class="btn-group col-md-6 col-sm-6 col-xs-12">
	           
                  	    <select class="btn btn-default dropdown-toggle" name="status" >
                        <option>On</option>
                        <option>Off</option>
           
                    </select>
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