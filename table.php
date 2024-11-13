<?php
include "koneksi.php";
include "query/query.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery</title>
  
        <!-- ================= FAVICON ===================== -->
        <link rel="shortcut icon" href="assets/icon/icon-2/Galery.ico" type="image/x-icon">

    <!-- ================= FONT AWESOME ===================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css?v=<?php echo time();?>">
    <!-- ================= REMIXICON ===================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css?v=<?php echo time();?>">
        
    <!-- ================= Hamburgers ===================== -->
    <link rel="stylesheet" href="dist/css/hamburgers.css">
    
    <!-- ================= SWIPER CSS ===================== -->
    <link rel="stylesheet" href="dist/css/swiper-bundle.min.css">

    <!-- ================= CSS ===================== -->
    <link rel="stylesheet" href="setup/setup.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="dist/css/table.css?v=<?php echo time();?>">
</head>
<body>
            <!-- ================= HEADER ===================== -->

            <header class="header" id="header">
                <div class="header__container">
                    <a href="" class="header__logo">
                        <i class="fa-solid fa-cloud"></i>
                        <span>cloud</span>
                    </a>
        
                    <div class="header__actions">
                        <i class="fa-regular fa-bell"></i>
                        <i class="ri-account-circle-line"></i>
        
                        <button class="hamburger hamburger--elastic header__toggle" type="button" id="header-toggle">
                            <span class="hamburger-box">
                              <span class="hamburger-inner"></span>
                            </span>
                          </button>
                    </div>
        
                </div>
        
                <form action="" class="header__search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" placeholder="search" class="header__input">
                </form>
            </header>
            <!-- ================= SIDEBAR ===================== -->
            <nav class="sidebar" id="sidebar">
                <div class="sidebar__container">
                    <div class="sidebar__user b-bot">
                        <div class="sidebar__image">
                            <img src="assets/img/pp.jpg" alt="image" class="sidebar__img">
                        </div>
        
                        <div class="sidebar__info">
                            <h3 class="sidebar__name">Shyy</h3>
                            <span class="sidebar__email">Shyy23@gmail.com</span>
                        </div>
                    </div>
        
                    <div class="sidebar__content">
                        <div>
                            <h3 class="sidebar__title">MANAGE</h3>
                            <div class="sidebar__list b-bot">
                                
                                <a href="home.php" class="sidebar__link ">
                                    <i class="fa-solid fa-chart-pie"></i>
                                    <span>Dashboard</span>
                                </a>
                                <a href="biodata.php" class="sidebar__link">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Biodata</span>
                                </a>
                                <a href="galery.php" class="sidebar__link ">
                                    <i class="fa-solid fa-image"></i>
                                    <span>Galery</span>
                                </a>
                                <a href="media.php" class="sidebar__link">
                                    <i class="fa-solid fa-music"></i>    
                                    <span>Media</span>
                                </a>
                                <a href="#" class="sidebar__link active-link">
                                    <i class="fa-solid fa-table-list"></i>
                                    <span>Tabel</span>
                                </a>
                                <a href="form.php" class="sidebar__link">
                                    <i class="fa-regular fa-file"></i>
                                    <span>Form</span>
                                </a>
                            </div>
                        </div>
        
                        <div>
                            <h3 class="sidebar__title">SETTINGS</h3>
                            <div class="sidebar__list">
                                
                                <a href="#" class="sidebar__link">
                                    <i class="fa-solid fa-gear"></i>
                                    <span>Setting</span>
                                </a>
                                <a href="#" class="sidebar__link">
                                    <i class="fa-solid fa-envelope-circle-check"></i>
                                    <span>My Messages</span>
                                </a>
                                <a href="#" class="sidebar__link">
                                    <i class="fa-solid fa-bell"></i>
                                    <span>Notification</span>
                                </a>
                            </div>
                        </div>
                    </div>
        
                    <div class="sidebar__actions">
                        <button>
                            <i class="ri-moon-clear-fill sidebar__link sidebar__theme" id="theme-button">
                                
                                <span>Theme</span>
                            </i>
                        </button>
        
                        <button class="sidebar__link">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Log Out</span>
                        </button>
                    </div>
                </div>
            </nav>

            <!-- ================= MAIN  ===================== -->
             <main class="main container" id="main">

                <div class="table">
                    <section class="tab__head">
                    <div class="tab__box">
                        <button class="tab__btn  active">Siswa</button>
                        <button class="tab__btn ">Guru</button>
                        <button class="tab__btn ">Jadwal</button>
                        <button class="tab__btn ">Presensi</button>
                        <div class="line"></div>
                        <div class="line__2"></div>
                    </div>
                   
                    </section>
                    <section class="table__body content__box">
                        <div class="content active content__1">
                            
                            <table class="table__container">
                                <thead class="table__head">
                                    <tr class="table__row">
                                        <th class="table__col">No</th>
                                        <th class="table__col">Nama</th>
                                        <th class="table__col">Jenis Kelamin</th>
                                        <th class="table__col">Kelas</th>
                                        <th class="table__col">Alamat</th>
                                        <th class="table__col">Edit</th>
                                        <th class="table__col">Delete</th>
                                    </tr>
                                </thead>
                                    <tbody class="table__body_1">
                                        <?php
                                        if($result_siswa->num_rows > 0){
                                            $no = 1;
        
                                            while($row = $result_siswa->fetch_assoc()){
                                                echo "<tr class='table__row'>";
                                                echo "<td class='table__data'>" . $no++ . "</td>";
                                                echo "<td class='table__data'>" . $row['nama'] . "</td>";
                                                echo "<td class='table__data'>" . $row['jenis_kelamin'] . "</td>";
                                                echo "<td class='table__data'>" . $row['nama_kelas_s'] . "</td>";
                                                echo "<td class='table__data'>" . $row['alamat'] . "</td>";
                                                echo "<td class='table__data'>";
                                                echo "<a class='edit__btn btn' href='query/query_edit.php?tabel=siswa&siswa_id=". $row['id_siswa'] ."'>EDIT</a>";
                                                echo "</td>";
                                                echo "<td class='table__data'>";
                                                echo "<a class='delete__btn btn' href='crud/delete.php?tabel=siswa&siswa_id=". $row['id_siswa'] ."'>DELETE</a>";                                       
                                                echo "</td>";
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo "<tr><td class='colspan-5'>Belum ada Catatan</td></tr>";
                                        }
                                        
                                        ?>
                                    </tbody>
                               
                            </table>


                        </div>            
                        <div class="content content__2">

                        <table class="table__container">
                            <thead class="table__head">
                                <tr class="table__row">
                                    <th class="table__col">No</th>
                                    <th class="table__col">Nama</th>
                                    <th class="table__col">Jenis Kelamin</th>
                                    <th class="table__col">Mapel</th>
                                    <th class="table__col">Alamat</th>
                                    <th class="table__col">Edit</th>
                                    <th class="table__col">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="table__body_2">
                                <?php
                                if($result_guru->num_rows > 0){
                                    $no = 1;

                                    while($row = $result_guru->fetch_assoc()){
                                        echo "<tr class='table__row'>";
                                        echo "<td class='table__data'>" . $no++ . "</td>";
                                        echo "<td class='table__data'>" . $row['nama'] . "</td>";
                                        echo "<td class='table__data'>" . $row['jenis_kelamin'] . "</td>";
                                        echo "<td class='table__data'>" . $row['nama_mapel_g'] . "</td>";
                                        echo "<td class='table__data'>" . $row['alamat'] . "</td>";
                                        echo "<td class='table__data'>";
                                        echo "<a class='edit__btn btn' href='query/query_edit.php?tabel=guru&guru_id=". $row['id_guru'] ."'>EDIT</a>";
                                        echo "</td>";
                                        echo "<td class='table__data'>";
                                        echo "<a class='delete__btn btn' href='crud/delete.php?tabel=guru&guru_id=". $row['id_guru'] ."'>DELETE</a>";                                       
                                        echo "</td>";
                                        echo '</tr>';
                                    }
                                } else {
                                    echo "<tr><td class='colspan-5'>Belum ada Catatan</td></tr>";
                                }
                                
                                ?>
                            </tbody>
                        </table>
                        </div>        
                        <div class="content content__3">
                        <table class="table__container">
                            <thead class="table__head">
                                <tr class="table__row">
                                    <th class="table__col">No</th>
                                    <th class="table__col">Hari</th>
                                    <th class="table__col">Nama Guru</th>
                                    <th class="table__col">Kelas</th>
                                    <th class="table__col">Mapel</th>
                                    <th class="table__col">Jam Mulai</th>
                                    <th class="table__col">Jam Selesai</th>
                                    <th class="table__col">Edit</th>
                                    <th class="table__col">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="table__body__3">
                                <?php
                                if($result_jadwal->num_rows > 0){
                                    $no = 1;
                                    
                                    while($row = $result_jadwal->fetch_assoc()){


                                        echo "<tr class='table__row'>";
                                        echo "<td class='table__data'>" . $no++ . "</td>";
                                        echo "<td class='table__data'>" . $row['nama_hari_j'] . "</td>";
                                        echo "<td class='table__data'>" . $row['nama_guru_j'] . "</td>";
                                        echo "<td class='table__data'>" . $row['nama_kelas_j'] . "</td>";
                                        echo "<td class='table__data'>" . $row['nama_mapel_j'] . "</td>";
                                        echo "<td class='table__data'>" . date('H:i', strtotime($row['jam_mulai'])) . "</td>";
                                        echo "<td class='table__data'>" . date('H:i', strtotime($row['jam_selesai'])) . "</td>";
                                        echo "<td class='table__data'>";
                                        echo "<a class='edit__btn btn' href='query/query_edit.php?tabel=jadwal&jadwal_id=". $row['id_jadwal'] ."'>EDIT</a>";
                                        echo "</td>";
                                        echo "<td class='table__data'>";
                                        echo "<a class='delete__btn btn' href='crud/delete.php?tabel=jadwal&jadwal_id=". $row['id_jadwal'] ."'>DELETE</a>";                                       
                                        echo "</td>";
                                        echo '</tr>';
                                        }
                                        } else {
                                            echo "<tr><td class='colspan-5'>Belum ada Catatan</td></tr>";
                                }
                                
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <div class="content content__4">
                                <table class="table__container">
                                    <thead class="table__head">
                                        <tr class="table__row">
                                            <th class="table__col">No</th>
                                            <th class="table__col">Nama Siswa</th>
                                            <th class="table__col">Nama Mapel</th>
                                            <th class="table__col">Waktu</th>
                                            <th class="table__col">Tanggal</th>
                                            <th class="table__col">Keterangan</th>
                                            <th class="table__col">Edit</th>
                                            <th class="table__col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table__body__4">
                                        <?php
                                        if($result_absen->num_rows > 0){
                                            $no = 1;
        
                                            while($row = $result_absen->fetch_assoc()){
                                                echo "<tr class='table__row'>";
                                                echo "<td class='table__data'>" . $no++ . "</td>";
                                                echo "<td class='table__data'>" . $row['nama_siswa_a'] . "</td>";
                                                echo "<td class='table__data'>" . $row['nama_mapel_a'] . "</td>";
                                                echo "<td class='table__data'>" . date('H:i', strtotime($row['waktu'])) . "</td>";
                                                echo "<td class='table__data'>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>";
                                                echo "<td class='table__data'>" . $row['new_keterangan'] . "</td>";
                                                echo "<td class='table__data'>";
                                                echo "<a class='edit__btn btn' href='query/query_edit.php?tabel=absen&absen_id=". $row['id_absen'] ."'>EDIT</a>";
                                               
                                                echo "</td>";
                                                echo "<td class='table__data'>";
                                                echo "<a class='delete__btn btn' href='crud/delete.php?tabel=absen&absen_id=". $row['id_absen'] ."'>DELETE</a>";
                                               
                                                echo "</td>";
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo "<tr><td class='colspan-5'>Belum ada Catatan</td></tr>";
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                        </div>
                    </section>
                    
                </div>
                <!-- <section class="add__data">
                    <div class="aksi">
                        <a href="" class="add__btn btn btn btn">Tambahkan Siswa <i class="fa-regular fa-address-book"></i></a>              
                    </div>
                </section> -->
                                        
             </main>
               <!-- ================= FOOTER ===================== -->
            <footer class="footer footer__bottom" id="footer">
                <div class="legal">
                    <span class="footer__CR">© 2024 All Right Shyy Reserved</span>
                </div>

                <div class="footer__social">
                    <a href="https://www.instagram.com/it.s_meshy_y?igsh=M2tvZmxnN3Bycml5" class="footer__social-links">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://wa.me/+6283820103522" class="footer__social-links">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </footer>

    
    <script src="dist/js/table.js?v=<?php echo time();?>"></script>
    <script src="dist/js/galery.js?v=<?php echo time();?>"></script>
    
</body>
</html>