<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/PagPrinc.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoSphere - Home</title>
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
                    <img src="photos/user-default.jpg" width="40">
                </div>
                <a href="Perfil.php" class="user-link">Juan Perez</a>
                <ion-icon name="chevron-down-outline"></ion-icon>
            </div>
        </nav>
        <!---FIN NAVBAR-->

        <!---INICIO HEADER-->
        <div class="feeds-content">
            <div class="feeds-header">
                <div class="header-top">
                    <h4>InfoSphere</h4>
                    <i><ion-icon name="star-outline"></ion-icon></i>
                </div>
                <div class="div header-post">
                    <div class="header-img-wrapper">
                        <img src="photos/user-default.jpg">
                    </div>
                    <input type="text" placeholder="¿Que esta sucediendo?">
                    <i><ion-icon name="image-outline"></ion-icon></i>
                    <i><ion-icon name="camera-outline"></ion-icon></i>
                    <i><ion-icon name="pie-chart-outline"></ion-icon></i>
                </div>
            </div>
        </div>
        <!---FIN HEADER-->

        <!---INICIO POST-->
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
                            Veritatis ipsam similique quam nemo ex maiores quibusdam dolor autem aliquam temporibus.
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
                            Veritatis ipsam similique quam nemo ex maiores quibusdam dolor autem aliquam temporibus.
                        </p>
                        <div class="post-img">
                            <img src="../photos/IMG_Post1.jpg">
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
                            Veritatis ipsam similique quam nemo ex maiores quibusdam dolor autem aliquam temporibus.
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

        <!---FIN POST-->

        <!---INICIO FOLLOW-->
        <div class="follow">
            <h3 class="follow-heading">A quien seguir</h3>
            <div class="follow-user">
                <div class="follow-user-img">
                    <img src="user-default.jpg">
                </div>
                <div class="follow-user-info">
                  <h4>Juanita Perez</h4>
                  <p>@juanperez10</p>
                </div>
                <button type="button" class="follow-btn">Seguir</button>
            </div>
            <div class="follow-user">
                <div class="follow-user-img">
                    <img src="user-default.jpg">
                </div>
                <div class="follow-user-info">
                  <h4>John Perez</h4>
                  <p>@juanperez10</p>
                </div>
                <button type="button" class="follow-btn">Seguir</button>
            </div>
            <div class="follow-user">
                <div class="follow-user-img">
                    <img src="user-default.jpg">
                </div>
                <div class="follow-user-info">
                  <h4>Jorgito Perez</h4>
                  <p>@juanperez10</p>
                </div>
                <button type="button" class="follow-btn">Seguir</button>
            </div>
            <div class="follow-link"><a href="#">Mostrar mas</a></div>
            <footer class="follow-footers">
                <ul>
                    <li><a href="#">Condiciones</a></li>
                    <li><a href="#">Politicas de Priv</a></li>
                    <li><a href="#">Cookies</a></li>
                </ul>
            </footer>
        </div>
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
</body>

</html>