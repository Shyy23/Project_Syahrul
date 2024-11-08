<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galery</title>
  
        <!-- ================= FAVICON ===================== -->
        <link rel="shortcut icon" href="assets/icon/icon-2/Galery.ico" type="image/x-icon">

    <!-- ================= FONT AWESOME ===================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- ================= REMIXICON ===================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
        
    <!-- ================= Hamburgers ===================== -->
    <link rel="stylesheet" href="dist/css/hamburgers.css">
    
    <!-- ================= SWIPER CSS ===================== -->
    <link rel="stylesheet" href="dist/css/swiper-bundle.min.css">

    <!-- ================= CSS ===================== -->
    <link rel="stylesheet" href="setup/setup.css">
    <link rel="stylesheet" href="dist/css/galery.css">
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
                                <a href="#" class="sidebar__link active-link">
                                    <i class="fa-solid fa-image"></i>
                                    <span>Galery</span>
                                </a>
                                <a href="media.php" class="sidebar__link">
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

            <!-- ================= MAIN GALERY ===================== -->
             <main class="main container" id="main">
                <section class="galery">
                    <div class="content">
                        <h1 class="title">
                            Sehari-hari
                        </h1>
                        <div class="slider">
                            <span style="--i:1;"><img src="assets/img/8.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:2;"><img src="assets/img/9.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:3;"><img src="assets/img/3.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:4;"><img src="assets/img/4.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:5;"><img src="assets/img/10.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:6;"><img src="assets/img/6.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:7;"><img src="assets/img/7.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:8;"><img src="assets/img/11.jpeg" alt="image" class="img__slider"></span>
                            </div>
                    </div>
                    

                    <div class="content">
                        <h1 class="title2">Dokumentasi</h1>
                        <div class="slider2">
                            <span style="--i:1;"><img src="assets/img/1.1.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:2;"><img src="assets/img/1.2.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:3;"><img src="assets/img/1.3.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:4;"><img src="assets/img/1.4.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:5;"><img src="assets/img/1.5.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:6;"><img src="assets/img/1.6.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:7;"><img src="assets/img/1.7.jpeg" alt="image" class="img__slider"></span>
                            <span style="--i:8;"><img src="assets/img/1.8.jpeg" alt="image" class="img__slider"></span>
                        </div>
                    </div>
                    
                    
                    
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

    
    <script src="dist/js/galery.js"></script>
</body>
</html>