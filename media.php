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
    <link rel="stylesheet" href="dist/css/hamburgers.css?v=<?php echo time();?>">
    
    <!-- ================= SWIPER CSS ===================== -->
    <link rel="stylesheet" href="dist/css/swiper-bundle.min.css?v=<?php echo time();?>">

    <!-- ================= CSS ===================== -->
    <link rel="stylesheet" href="setup/setup.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="dist/css/media.css?v=<?php echo time(); ?>">
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
                                <a href="#" class="sidebar__link active-link">
                                    <i class="fa-solid fa-music"></i>    
                                    <span>Media</span>
                                </a>
                                <a href="table.php" class="sidebar__link">
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

            <!-- ================= MAIN MEDIA ===================== -->
             <main class="main container" id="main">
                <section class="video">
                    <h3 class="title">Video</h3>
                    <video class="video" width="320" height="240" controls>
                        <source src="assets/other/video.mp4" type="video/mp4">
                    </video>
                    <iframe class="video" width="320" height="240" src="https://www.youtube.com/embed/JmNcErI30Ec?si=XrlxlzWq69IJXQUF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>

                <!-- ================= MAIN AUDIO ===================== -->
                <section class="audio">
                    <h3 class="title">Audio</h3>

                    <audio class="audio" controls>
                        <source src="assets/other/audio.mp3" type="audio/mpeg">
                    </audio>
                    <iframe class="audio" style="border-radius:12px" src="https://open.spotify.com/embed/track/7t8R5hCOyOKOhEKnbziUgg?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>

                </section>
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

    
    <script src="dist/js/galery.js?v=<?php echo time();?>"></script>
</body>
</html>