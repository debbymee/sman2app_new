 <!-- <body onLoad="javascript:window:print()"> -->
<html>
    <head>
            <link href="public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
    <div> 
        <p align="center">
            <span>REKAP ABSENSI<br>SEMESTER GENAP TAHUN AJARAN 2019/2020</span>
        </p>
             <table class="table table-striped table-bordered table-hover table-condensed" >
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Siswa</th>
                <?php
                $querybulan=$this->db->query("select * from parameter_laporan_persemester where semester='$semester' order by bulan asc")->result();
                foreach ($querybulan as $tbbulan) {
                    # code...
                    ?>
                    <th colspan="5" class="text-center"><?php echo $tbbulan->bulan_lengkap; ?></th>
                    <?php
                }
                ?>

                <th colspan="5" class="text-center">Jumlah</th>
            </tr>
            <tr>
                <?php
                $itung=$this->db->query("select * from parameter_laporan_persemester where semester='$semester' order by bulan asc")->result();
                foreach ($itung as $tbbulan) {
                    # code...
                    ?>
                    
                    <th class="text-center">S</th>
                    <th class="text-center">I</th>
                    <th class="text-center">A</th>
                    <th class="text-center">D</th>
                    <th class="text-center">H</th>
                    <?php
                }
                ?>

                    <th class="text-center">S</th>
                    <th class="text-center">I</th>
                    <th class="text-center">A</th>
                    <th class="text-center">D</th>
                    <th class="text-center">H</th>
            </tr>
            <?php
            $nok=1;
            $queryh=$this->db->query("select * from presensi join detail_kelas_siswa on presensi.id_siswa_fk = detail_kelas_siswa.id_siswa join siswa on detail_kelas_siswa.id_siswa = siswa.id_siswa where siswa.id_siswa IN ($id_siswa) group by id_siswa_fk")->result();
            foreach ($queryh as $tb) {
                 # code...
             
            $jumlahsakit=0;
            $jumlahizin=0;
            $jumlahabsen=0;
            $jumlahdistan=0;
            $jumlahhadir=0;
                ?>
                <tr>
                <td><?php echo $nok++ ?></td>
                <td><?php echo $tb->nama_siswa ?></td>
                <?php
                $id_siswa_fk=$tb->id_siswa_fk;
                $queryitunghadir=$this->db->query("select * from parameter_laporan_persemester where semester='$semester' order by bulan asc")->result();
                foreach ($queryitunghadir as $tbitunghadir) {
                    # code...
                    $bulan=$tbitunghadir->bulan;
                    $itungsakit=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='S' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itungizin=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='I' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itungabsen=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='A' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itungdistan=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='D' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    $itunghadir=$this->db->query("select count(id_siswa_fk) as itung from view_presensi where id_siswa_fk='$id_siswa_fk' and kd_keterangan_fk='H' and date_format(tgl,'%m')='$bulan' and date_format(tgl,'%Y')='2020'")->first_row();
                    
                    $jumlahsakit=$jumlahsakit+$itungsakit->itung;
                    $jumlahizin=$jumlahizin+$itungizin->itung;
                    $jumlahabsen=$jumlahabsen+$itungabsen->itung;
                    $jumlahdistan=$jumlahdistan+$itungdistan->itung;
                    $jumlahhadir=$jumlahhadir+$itunghadir->itung;
                    ?>
                    <td class="text-center">
                    <?php if($itungsakit->itung == 0 || $itungsakit->itung == '0')
                    {echo '-';}
                    else {echo $itungsakit->itung;}?>   
                    </td>

                    <td class="text-center">
                    <?php if($itungizin->itung == 0 || $itungizin->itung == '0')
                    {echo '-';}
                    else {echo $itungizin->itung;}?>   
                    </td>

                    <td class="text-center">
                    <?php if($itungabsen->itung == 0 || $itungabsen->itung == '0')
                    {echo '-';}
                    else {echo $itungabsen->itung;}?>   
                    </td>

                    <td class="text-center">
                    <?php if($itungdistan->itung == 0 || $itungdistan->itung == '0')
                    {echo '-';}
                    else {echo $itungdistan->itung;}?>   
                    </td>

                      <td class="text-center">
                    <?php if($itunghadir->itung == 0 || $itunghadir->itung == '0')
                    {echo '-';}
                    else {echo $itunghadir->itung;}?>   
                    </td>
         
                    <?php
                }
                ?>

                    <td class="text-center"><?php echo $jumlahsakit ?></td>
                    <td class="text-center"><?php echo $jumlahizin ?></td>
                    <td class="text-center"><?php echo $jumlahabsen ?></td>
                    <td class="text-center"><?php echo $jumlahdistan ?></td>
                    <td class="text-center"><?php echo $jumlahhadir ?></td>
                </tr>
                <?php
            }
            ?>
            </table>
            



    </div>
</html>