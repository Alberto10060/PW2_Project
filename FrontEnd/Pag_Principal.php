<!DOCTYPE html>
<html lang="en">
<?php
//Recordar las variables de sesion
session_start();
include '../BackEnd/Connection.php';

/*Traer Cursos*/
//$post_retrieve = "CALL obtener_posts_seguidos(3);";
$post_retrieve = "CALL sp_post(0, '', '', null, 0, 'SELECT_ALL');";
//$post_retrieve = "CALL obtener_posts_seguidos(".$_SESSION['id_usuario'].");";
$all_posts = $mysqli->query($post_retrieve);

$Allposts = array();

if ($all_posts && $all_posts->num_rows > 0) {



    while ($row = $all_posts->fetch_assoc()) {
        $idPost = $row['post_id'];
        $nombre_post = $row['post_nombre'];
        $desc_post = $row['post_descripcion'];
        $user_post = $row['post_usuarioid'];
        $img_post = $row['post_imagen'];
        $date_post = $row['post_fecrea'];



        $posts = array(
            'ID_Post' => $idPost,
            'nombre_Posts' => $nombre_post,
            'descripcion_Posts' => $desc_post,
            'User_Post' => $user_post,
            'imagen_Posts' => $img_post,
            'Fec_Posts' => $date_post,

        );

        array_push($Allposts, $posts);


    }

} else {
    //echo "No se encontraron registros.";
}
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/PagPrinc.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfoSphere - Home</title>
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
                    <img src="../photos/user-default.jpg" width="40">
                </div>
                <a href="Perfil.php" class="user-link">
                    <?php echo $_SESSION['nombre_usuario'] ?>
                </a>
                <a href="#" class="user-link" onclick="CerrarSesion();">| Cerrar sesión</a>
                <!-- <ion-icon name="chevron-down-outline"></ion-icon> -->
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
                    <div id="postformat">

                        <input type="text" id="posttext" placeholder="¿Que esta sucediendo?">
                    </div>
                    <a style="" id="addimage"><i><ion-icon name="image-outline"></ion-icon></i></a>
                    <a id="sendpost" onclick="RegistrarPost();"><i><ion-icon
                                name="paper-plane-outline"></ion-icon></i></a>
                    <div class="avatar-container">
                        <img src="" id="photo-img" class="photo-image">
                        <input type="file" name="photo" id="photo-input" accept="image/*" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
        <!---FIN HEADER-->

        <!---INICIO POST-->



        <div class="all-posts">

            <div class="post">
                <?php
                if ($Allposts == NULL) {
                    echo 'No hay posts';
                }
                foreach ($Allposts as $allposts) {
                    ?>
                    <div class="post-cover">
                        <div class="user-avatar">
                            <img src="../photos/user-default.jpg">
                        </div>
                        <div class="post-content">
                            <div class="post-user-info">
                                <h4>
                                    <?php echo $allposts["nombre_Posts"]; ?>
                                </h4>
                                <i><ion-icon name="checkmark-circle-outline"></ion-icon></i>
                                <span>
                                    <?php echo $allposts["User_Post"]; ?>
                                    <?php echo $allposts["Fec_Posts"]; ?>
                                </span>
                            </div>
                            <p class="post-text">
                            <h4>

                            </h4>
                            <?php echo $allposts["descripcion_Posts"]; ?>
                            </p>
                            <div class="post-img">
                                <?php
                                $img_post = base64_encode($allposts["imagen_Posts"]);
                                ?>
                                <?php
                                if ($img_post != "") {
                                    ?>
                                    <img src="data:image/jpeg;base64,<?php echo $img_post; ?>" width="40">
                                <?php
                                }
                                ?>


                            </div>
                            <div class="post-icons">
                                <i><ion-icon name="chatbubble-outline"></ion-icon></i>
                                <i><ion-icon name="navigate-outline"></ion-icon></i>
                                <i><ion-icon name="heart-outline"></ion-icon></i>
                                <i><ion-icon name="share-social-outline"></ion-icon></i>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

        <!---FIN POST-->

        <!---INICIO FOLLOW-->
        <div class="follow">
            <h3 class="follow-heading">A quien seguir</h3>
            <div class="follow-user">
                <div class="follow-user-img">
                    <img src="../photos/user-default.jpg">
                </div>
                <div class="follow-user-info">
                    <h4>Juanita Perez</h4>
                    <p>@juanperez10</p>
                </div>
                <button type="button" class="follow-btn">Seguir</button>
            </div>
            <div class="follow-user">
                <div class="follow-user-img">
                    <img src="../photos/user-default.jpg">
                </div>
                <div class="follow-user-info">
                    <h4>John Perez</h4>
                    <p>@juanperez10</p>
                </div>
                <button type="button" class="follow-btn">Seguir</button>
            </div>
            <div class="follow-user">
                <div class="follow-user-img">
                    <img src="../photos/user-default.jpg">
                </div>
                <div class="follow-user-info">
                    <h4>Jorgito Perez</h4>
                    <p>@juanperez10</p>
                </div>
                <button type="button" class="follow-btn">Seguir</button>
            </div>
        </div>
        <!---FIN FOLLOW-->
        <!---INICIO FOOTER-->
        <footer class="pie-pagina">



            <div class="grupo2">
                <small>&copy; 2023 <b>InfoSphere</b> - Todos los derechos reservados</small>
            </div>
        </footer>
        <!---FIN FOOTER-->
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="scripts/pag_principal.js"></script>
</body>

</html>