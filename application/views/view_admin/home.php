<div class="x_panel">
      <div class="container">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <a href="<?php echo base_url('admin/daftar_User') ?>">
              <span class="count_top"><i class="fa fa-user"></i> Total Pengguna</span>
            </a>
             <?php foreach($users as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <a href="<?php echo base_url('admin/daftar_guru') ?>">
              <span class="count_top"><i class="fa fa-clock-o"></i>Total Guru</span>
            </a>
               <?php foreach($guru as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
           <a href="<?php echo base_url('admin/daftar_wali') ?>">
              <span class="count_top"><i class="fa fa-user"></i> Total Wali Kelas</span>
            </a>
             <?php foreach($wali_kelas as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
           <a href="<?php echo base_url('admin/daftar_siswa') ?>">
              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
            </a>
              <?php foreach($wali_kelas as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
            </div>
      
          </div>
          <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Jaringan Aktivitas</h3>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="chart_plot_01" class="demo-placeholder"></div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Fitur Yang Sering Dikunjungi : </h2>
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

                <div class="clearfix"></div>
              </div>