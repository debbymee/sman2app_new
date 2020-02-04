          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <a href="<?php echo base_url('wali_kelas') ?>">
              <span class="count_top"><i class="fa fa-user"></i> Total Pengguna</span>
            </a>
             <?php foreach($users as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i>Total Guru</span>
               <?php foreach($guru as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Wali Kelas</span>
             <?php foreach($wali_kelas as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
              <?php foreach($wali_kelas as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
      
          </div>

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Jaringan Aktivitas</h3>
                  </div>
                  
                </div>

                <div id="container" class="col-md-8 col-sm-9 col-xs-12" style="height: 10%">
                </div>
                <div class="col-md-4 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Fitur Yang Sering Dikunjungi :</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Presensi Kehadiran</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                        </div>
                      </div>
                    </div>
                    <div>
                      <p>Jadwal Pelajaran</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-6">
                    <div>
                      <p>Profil Siswa</p>
                      <div class="">
                        <div class="progress progress_sm" style="width: 76%;">
                          <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                        </div>
                      </div>
                    </div>
             
                  </div>


                </div>

                <div class="clearfix">
                <div class="col-md-6 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                  <center><h2>Siswa tidak hadir</h2></center>
                  <ul class="nav navbar-right panel_toolbox">
                  
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div id="data">
                    
                  </div>

                </div>
              </div>
            </div>
              </div>
            </div>

          </div>
         </div>