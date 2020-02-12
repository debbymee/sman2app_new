     <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    <div class="container">
      <center><h2 style="color: green "> EDIT DATA KELAS</h2></center> <hr>
      <br> 

   <form action="<?php echo base_url(); ?>admin/update_kelas" method ="post"  class="form-horizontal form-label-left"  >



              <?= $this->session->flashdata('message'); ?>
      
  
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_kelas">NAMA KELAS <span class="required">*</span>
                   </label>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="nama_kelas" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama_kelas" placeholder="masukkan nama kelas" type="text" value="<?php echo $kelas->nama_kelas ?>" readonly>


                    <?php echo form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?> <br>  
                  </div>
              </div>


                    <input type="hidden" name="id_kelas" value=" <?php echo $kelas->id_kelas ?> ">

             
          
           
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tingkat_kelas">TINGKAT KELAS <span class="required">*</span>
                   </label>
             <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="btn btn-default dropdown-toggle" name="tingkat_kelas">
                        
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                           
                          </select> 
                  </div>
              </div>
              <div class="item form-group">
                   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ruangan">RUANGAN<span class="required">*</span>
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                           <select class="btn btn-default dropdown-toggle" name="ruangan">
                        
                            <option value="X-IPS1">X-IPS1</option>
                            <option value="X-IPS2">X-IPS2</option>
                            <option value="X-IPS3">X-IPS3</option>
                            <option value="X-IPS4">X-IPS4</option>
                            <option value="X-IPA1">X-IPA1</option>
                            <option value="X-IPA2">X-IPA2</option>
                            <option value="X-IPA3">X-IPA3</option>
                            <option value="X-IPA4">X-IPA4</option>
                            <option value="X-IPA5">X-IPA5</option>
                            <option value="X-IPA6">X-IPA6</option>
                            <option value="XI-IPS1">XI-IPS1</option>
                            <option value="XI-IPS2">XI-IPS2</option> 
                            <option value="XI-IPS3">XI-IPS3</option>
                            <option value="XI-IPS4">XI-IPS4</option>
                            <option value="XI-IPA1">XI-IPA1</option>
                            <option value="XI-IPA2">XI-IPA2</option>
                            <option value="XI-IPA3">XI-IPA3</option>
                            <option value="XI-IPA4">XI-IPA4</option>
                            <option value="XI-IPA5">XI-IPA5</option>
                            <option value="XI-IPA6">XI-IPA6</option>
                            <option value="XII-IPS2">XII-IPS1</option>
                            <option value="XII-IPS2">XII-IPS2</option>
                            <option value="XII-IPS3">XII-IPS3</option>
                            <option value="XII-IPS4">XII-IPS4</option>
                            <option value="XII-IPA1">XII-IPA1</option>
                            <option value="XII-IPA2">XII-IPA2</option>
                            <option value="XII-IPA3">XII-IPA3</option>
                            <option value="XII-IPA4">XII-IPA4</option>
                            <option value="XII-IPA5">XII-IPA5</option>
                            <option value="XII-IPA6">XII-IPA6</option>

                           
                          </select>
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