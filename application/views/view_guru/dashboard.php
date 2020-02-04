
<div class="x_panel">

      <div class="container">
<div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Guru</span>
              <?php foreach($guru as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
              <span class="count_bottom"><i class="green">4% </i>Dari Minggu Lalu</span>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Wali Kelas</span>
              <?php foreach($wali as $w) { ?>
              <div class="count"><?php echo $w->totalcount?></div>
              <?php } ?>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> Dari Minggu Lalu</span>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Siswa</span>
              <?php foreach($siswa as $s) { ?>
              <div class="count"><?php echo $s->totalcount?></div>
              <?php } ?>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Dari Minggu Lalu</span>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Guru Mengajar</span>
               <?php foreach($guru as $r) { ?>
              <div class="count"><?php echo $r->totalcount?></div>
              <?php } ?>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Dari Minggu Lalu</span>
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
                 <div id="container" class="col-md-8 col-sm-9 col-xs-12" style="height: 10%">
                </div>
                
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                  <div class="x_title">
                    <h2>Laporan Presensi  : </h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-6">
                   <div>
                       <?php foreach($presensikehadiran as $kehadiran) { ?>
                      <p>Siswa <?php echo $kehadiran->nama_keterangan ?> (<?php echo $kehadiran->jumlah ?> anak / <?php echo $total ?> total siswa)</p>
                      <div class="">
                        <?php 
                        $jumlah = $kehadiran->jumlah;
                        $total = $total;
                        $hasil = $jumlah / $total * 100;
                        ?>
                        <div class="progress progress_sm" style="width: <?php echo floor($hasil)?>%;">
                          <div class="progress-bar progress-bar-striped active progress-bar-success" role="progressbar" data-transitiongoal="100"></div>
                        </div>
                      </div>
                      <?php } ?>
                    </div>
                    
                  </div>
                 

                </div>

                <div class="clearfix"></div>
              </div>