   <div class="x_panel">
      <div class="container">

  
   <h2 style="color: green " align="center"> DAFTAR KELAS 12</h2>
        <hr>


    <table class="table table-striped table-bordered table-hover table-condensed"  >
      <tr> 
        <td>NO</td>
        <td>NAMA KELAS </td>
        <td>AKSI</td>

        
      </tr>
            <?php
            $no = 1; 
           foreach($rombel as $r) { ?>
        <tr>
          
          <td><?php echo $no++ ?></td>
          <TD><?php echo $r->nama_kelas  ?> </TD>
          <td>
              <a href="<?php echo site_url('guru/input_presensi12/'.$r->id_kelas.'/'.$r->nama_kelas); ?>" class="btn btn-sm btn-info">Edit</a>
         
              
            </td>
       
         
        

          
        </tr>
   
      <?php } 
    // $no++;
       ?>
    

      </table>
</form>                    
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