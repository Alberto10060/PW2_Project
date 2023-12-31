<!DOCTYPE html>
<html>
<?php
session_start();
include '../BackEnd/Connection.php';
$getmessages = "CALL sp_mensaje(1,''," . $_SESSION['id_usuario'] . ",2, 'SELECT_ALL_USER');";
$all_messages = $mysqli->query($getmessages);
$Allmessages = array();

if ($all_messages && $all_messages->num_rows > 0) {

	while ($row = $all_messages->fetch_assoc()) {
		$idMnj = $row['mensaje_id'];
		$mensaje_Mnj = $row['mensaje_texto'];
		$recibir_Mnj = $row['mensaje_recibirid'];
		$mandar_Mnj = $row['mensaje_mandadoid'];



		$mensajes = array(
			'Mensaje_ID' => $idMnj,
			'mensaje_texto' => $mensaje_Mnj,
			'mensaje_recibirid' => $recibir_Mnj,
			'mensaje_mandadoid' => $mandar_Mnj
		);

		array_push($Allmessages, $mensajes);


	}

} else {
	echo "No se encontraron registros.";
}
?>

<head>
	<title>Chat</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- Font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../FrontEnd/styles/StyleChat.css">

</head>

<body>
	<div class="container-fluid h-100">
		<div class="row justify-content-center h-100">
			<div class="col-md-4 col-xl-3 chat">
				<div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
						<div class="input-group">
							<input type="text" placeholder="Search..." name="" class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
							</div>
						</div>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
							<li class="active">
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
											class="rounded-circle user_img">
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Juan Perez</span>
										<p>Online</p>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="https://2.bp.blogspot.com/-8ytYF7cfPkQ/WkPe1-rtrcI/AAAAAAAAGqU/FGfTDVgkcIwmOTtjLka51vineFBExJuSACLcBGAs/s320/31.jpg"
											class="rounded-circle user_img">
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Elena Garcia</span>
										<p>Left 7 mins ago</p>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="https://i.pinimg.com/originals/ac/b9/90/acb990190ca1ddbb9b20db303375bb58.jpg"
											class="rounded-circle user_img">
										<span class="online_icon"></span>
									</div>
									<div class="user_info">
										<span>Sami Rdz</span>
										<p>Online</p>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="https://avatars.hsoubcdn.com/ed57f9e6329993084a436b89498b6088?s=256"
											class="rounded-circle user_img">
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Ariel Aguilar</span>
										<p>Left 30 mins ago</p>
									</div>
								</div>
							</li>
							<li>
								<div class="d-flex bd-highlight">
									<div class="img_cont">
										<img src="https://static.turbosquid.com/Preview/001214/650/2V/boy-cartoon-3D-model_D.jpg"
											class="rounded-circle user_img">
										<span class="online_icon offline"></span>
									</div>
									<div class="user_info">
										<span>Abby Chavez</span>
										<p>Left 50 mins ago</p>
									</div>
								</div>
							</li>
						</ui>
					</div>
					<div class="card-footer"></div>
				</div>
			</div>
			<div class="col-md-8 col-xl-6 chat">
				<div class="card">
					<div class="card-header msg_head">
						<div class="d-flex bd-highlight">
							<div class="img_cont">
								<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
									class="rounded-circle user_img">
								<span class="online_icon"></span>
							</div>
							<div class="user_info">
								<span>Juan Perez</span>
								<p>1767 Messages</p>
							</div>
							<div class="video_cam">
								<span><i class="fas fa-video"></i></span>
								<span><i class="fas fa-phone"></i></span>
							</div>
						</div>
						<span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
						<div class="action_menu">
							<ul>
								<li><i class="fas fa-user-circle"></i> View profile</li>
								<li><i class="fas fa-users"></i> Add to close friends</li>
								<li><i class="fas fa-plus"></i> Add to group</li>
								<li><i class="fas fa-ban"></i> Block</li>
							</ul>
						</div>
					</div>
					<div class="card-body msg_card_body">
						<?php foreach ($Allmessages as $allmnj) {
							if ($allmnj['mensaje_recibirid'] == $_SESSION['id_usuario']) { ?>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg"
											class="rounded-circle user_img_msg">
									</div>
									<div class="msg_cotainer">
										<?php echo $allmnj['mensaje_texto']; ?>
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
							<?php } elseif ($allmnj['mensaje_mandadoid'] == $_SESSION['id_usuario']) { ?>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
									<?php echo $allmnj['mensaje_texto']; ?>
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="https://avatars.hsoubcdn.com/ed57f9e6329993084a436b89498b6088?s=256"
											class="rounded-circle user_img_msg">
									</div>

								</div>
							<?php }
						} ?>
					</div>
					<div class="card-footer">
						<div class="input-group">
							<div class="input-group-append">
								<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
							</div>
							<textarea name="" class="form-control type_msg"
								placeholder="Type your message..."></textarea>
							<div class="input-group-append">
								<span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<a href="Index.php"><img src="Img/Logo Athenea blanco.png"></a>
	<script src="Login.js"></script>
	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="scriptsChat.js"></script>
</body>

</html>