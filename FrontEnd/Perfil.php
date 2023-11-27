<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/PagPrinc.css">
    <link rel="stylesheet" href="styles/ProfileStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoSphere - Profile</title>
    <link rel="stylesheet" href="styles/font-awesome_6.4.0_css_all.min.css">
    <script src="../Libs/jquery/jquery-3.6.3.min.js"></script>
    <script src="scripts/sweetalert.js"></script>
</head>

<body>
    <!---INICIO NAVBAR-->
    <section class="feeds-page">
        <nav class="feeds-nav">
            <div class="icons">
                <a href="#"> <ion-icon name="notifications-outline"></ion-icon></a>
                <a href="#"><ion-icon name="flame-outline"></ion-icon></a>
                <a href="#"><ion-icon name="chatbox-outline"></ion-icon> </a>
                <a href="Pag_Principal.php" class="active"><ion-icon name="home-outline"></ion-icon></a>
            </div>
            <div class="search-bar">
                <i><ion-icon name="search-outline"></ion-icon></i>
                <input type="text" placeholder="Buscar" class="search-bar-input">
            </div>
            <div class="user"> 
                <div class="user-img-wrapper">
                    <img src="user-default.jpg" width="40">
                </div>
                <a href="Perfil.php" class="user-link">Juan Perez</a>
                <a href="#" class="user-link" onclick="CerrarSesion();">| Cerrar sesión</a>
            </div>
        </nav>
        <!---FIN NAVBAR-->

        <!---INICIO PROFILE-->
        <div class="profile-container">
            <img src="socialbook_img/images/cover.png" class="cover-img">
            <div class="profile-details">
                <div class="pd-left">
                    <div class="pd-row">
                        <img src="socialbook_img/images/profile.png" class="pd-img">
                        <div>
                            <h3>Juan Perez</h3>
                            <div class="head-follows">
                                <a href="#"><p>120 Seguidores</p></a>
                                <img src="socialbook_img/images/member-1.png">
                                <img src="socialbook_img/images/member-2.png">
                                <img src="socialbook_img/images/member-3.png">
                                
                                <a href="#"><p>120 Seguidores</p></a>
                                <img src="socialbook_img/images/member-1.png">
                                <img src="socialbook_img/images/member-2.png">
                                <img src="socialbook_img/images/member-3.png">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="pd-right">
                    <button type="button">Following</button>
                    <button type="button">Send Message</button>
                    <br>
                    <a href=""><img src="socialbook_img/images/more.png"></a>
                </div>
            </div>

            <div class="profile-info">
                <div class="info-col">

                    <div class="profile-intro">
                        <h3>Intro</h3>
                        <p class="intro-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <hr>
                        <ul>
                            <li><ion-icon name="briefcase-outline"></ion-icon>Director at 99media Ltd</li>
                            <li><ion-icon name="book-outline"></ion-icon>Director at 99media Ltd</li>
                            <li><ion-icon name="home-outline"></ion-icon>Director at 99media Ltd</li>
                            <li><ion-icon name="location-outline"></ion-icon> Director at 99media Ltd</li>
                        </ul>
                    </div>
                    <div class="profile-intro" style="margin-top: 15px;">
                        <div class="title-box">
                            <h3>Media</h3>
                            <a href="#">Todas las fotos</a>
                        </div>

                        <div class="photo-box">
                            <div><img src="socialbook_img/images/photo1.png"></div>
                            <div><img src="socialbook_img/images/photo2.png"></div>
                            <div><img src="socialbook_img/images/photo3.png"></div>
                            <div><img src="socialbook_img/images/photo4.png"></div>
                            <div><img src="socialbook_img/images/photo5.png"></div>
                            <div><img src="socialbook_img/images/photo6.png"></div>
                        </div>
                    </div>

                </div>
                <div class="post-col">
                    <div class="write-post-container">
                        <div class="feeds-content">
                            <div class="feeds-header">
                                <div class="header-top">
                                    <h4>Post Here</h4>
                                    <i><ion-icon name="star-outline"></ion-icon></i>
                                </div>
                                <div class="div header-post">
                                    <div class="header-img-wrapper">
                                        <img src="socialbook_img/images/profile.png">
                                    </div>
                                    <input type="text" placeholder="¿Que esta sucediendo?">
                                    <i><ion-icon name="image-outline"></ion-icon></i>
                                    <i><ion-icon name="camera-outline"></ion-icon></i>
                                    <i><ion-icon name="pie-chart-outline"></ion-icon></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="all-posts">

                        <div class="post">
                            <div class="post-cover">
                                <div class="user-avatar">
                                    <img src="user-default.jpg">
                                </div>
                                <div class="post-content">
                                    <div class="post-user-info">
                                        <h4>Juan Perez</h4>
                                        <i><ion-icon name="checkmark-circle-outline"></ion-icon></i>
                                        <span>@juanperez10 15m</span>
                                    </div>
                                    <p class="post-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Veritatis ipsam similique quam nemo ex maiores quibusdam dolor autem aliquam
                                        temporibus.
                                    </p>
                                    <div class="post-img">
                                        <img src="IMG_Post1.jpg">
                                    </div>
                                    <div class="post-icons">
                                        <i><ion-icon name="chatbubble-outline"></ion-icon></i>
                                        <i><ion-icon name="navigate-outline"></ion-icon></i>
                                        <i><ion-icon name="heart-outline"></ion-icon></i>
                                        <i><ion-icon name="share-social-outline"></ion-icon></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post">
                            <div class="post-cover">
                                <div class="user-avatar">
                                    <img src="user-default.jpg">
                                </div>
                                <div class="post-content">
                                    <div class="post-user-info">
                                        <h4>Juan Perez</h4>
                                        <i><ion-icon name="checkmark-circle-outline"></ion-icon></i>
                                        <span>@juanperez10 15m</span>
                                    </div>
                                    <p class="post-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Veritatis ipsam similique quam nemo ex maiores quibusdam dolor autem aliquam
                                        temporibus.
                                    </p>
                                    <div class="post-img">
                                        <img src="IMG_Post1.jpg">
                                    </div>
                                    <div class="post-icons">
                                        <i><ion-icon name="chatbubble-outline"></ion-icon></i>
                                        <i><ion-icon name="navigate-outline"></ion-icon></i>
                                        <i><ion-icon name="heart-outline"></ion-icon></i>
                                        <i><ion-icon name="share-social-outline"></ion-icon></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post">
                            <div class="post-cover">
                                <div class="user-avatar">
                                    <img src="user-default.jpg">
                                </div>
                                <div class="post-content">
                                    <div class="post-user-info">
                                        <h4>Juan Perez</h4>
                                        <i><ion-icon name="checkmark-circle-outline"></ion-icon></i>
                                        <span>@juanperez10 15m</span>
                                    </div>
                                    <p class="post-text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Veritatis ipsam similique quam nemo ex maiores quibusdam dolor autem aliquam
                                        temporibus.
                                    </p>
                                    <div class="post-img">
                                        <img src="IMG_Post1.jpg">
                                    </div>
                                    <div class="post-icons">
                                        <i><ion-icon name="chatbubble-outline"></ion-icon></i>
                                        <i><ion-icon name="navigate-outline"></ion-icon></i>
                                        <i><ion-icon name="heart-outline"></ion-icon></i>
                                        <i><ion-icon name="share-social-outline"></ion-icon></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!---FIN PROFILE-->

        <!---FIN FOLLOW-->
        <!---INICIO FOOTER-->
        <footer class="pie-pagina">
            <div class="grupo1">
                <div class="box">
                    <figure>
                        <a href="#"><img src="Logo InfoSphere Blanco_Mesa de trabajo 1.png">
                        </a>
                    </figure>
                </div>
                <div class="box">
                    <h2>SOBRE NOSOTROS</h2>
                    <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, itaque!</P>
                    <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, itaque!</P>
                </div>
                <div class="box">
                    <h2>SIGUENOS</h2>
                    <div class="red-social">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-youtube"></ion-icon></a>
                    </div>
                </div>
            </div>
            <div class="grupo2">
                <small>&copy; 2023 <b>InfoSphere</b> - Todos los derechos reservados</small>
            </div>
        </footer>
        <!---FIN FOOTER-->
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="scripts/perfil.js"></script>
</body>

</html>