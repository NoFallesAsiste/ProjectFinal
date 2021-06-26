<?php include_once ("Helpers/Helpers.php")//<?=media()?>

<!DOCTYPE HTML>

<html lang="es">
	<head>
		<title>the Clock</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="<?=media()?>/css/main2.css" />
		<link rel="stylesheet" href="<?=media()?>/css/style1.css" />
		<noscript><link rel="stylesheet" href="<?=media()?>/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- barra lateral -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">Nosotros</a></li>
							<li><a href="#two">Inicio</a></li>
							<li><a href="#three">Contacto</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Envoltura -->
			<div id="wrapper">

			<!-- Intro -->

				<section id="intro" class="wrapper style1 fullscreen ">
						<div class="inner">
							<a href="#" class="image.left"></a>
							<img src="<?=media()?>/Images/clock2.jpeg" id="logoredondo"/>
							<h1>La puntualidad es la clave del éxito</h1>
							<p>A continuación podras encontrar todo sobre el estado de tus asistencias e inasistencias
						y en caso de que falles, puedes subir la justicación
						
							<ul class="actions">
								 
								 	<a href="<?=base_url()?>/Dashboard" class="button scrolly">Iniciar sesión.</a>
								 
						 	</ul>
						</div>
					</section>


				<!-- One -->
					<section id="two" class="wrapper style2 spotlights">
						<section>
							<a href="#" class="image"><img src="<?=media()?>/Images/1.jpg" alt="" data-position="center center" /></a>
							<div class="content">
								<div class="inner">
									<h2>Marcar asistencia.</h2>
									<p>En hora buena ahora puedes delegar la tarea de tomar asistencia a clase,
										 nuestro aplicativo lo hará de manera automatica, ahora puedes estar al pendiente
										 de otras actividades.</p>
									<ul class="actions">
										<li><a href="generic.html" class="button">Saber más.</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="<?=media()?>/Images/4.jpg" alt="" data-position="top center" /></a>
							<div class="content">
								<div class="inner">
									<h2>Registro de inasistencia.</h2>
									<p>En cualquier momento y en cualquier lugar mediante un dispositivio con acceso a
										internet, puedes acceder al registro de inasistencia y estar al tanto de tu proceso
										de aprendizaje.</p>
									<ul class="actions">
										<li><a href="generic.html" class="button">Saber más.</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="<?=media()?>/Images/3.jpg" alt="" data-position="25% 25%" /></a>
							<div class="content">
								<div class="inner">
									<h2>Subir justificación.</h2>
									<p>Ahora sabes que tenías pendiente una actividad que te impide llegar a tiempo o faltar a
										 clase, no te preocupes con clock puedes presentar la justificación al instructor de manera
										 rapida y facil.</p>
									<ul class="actions">
										<li><a href="generic.html" class="button">saber más.</a></li>
									</ul>
								</div>
							</div>
						</section>
						<section>
							<a href="#" class="image"><img src="<?=media()?>/Images/5.jpg" alt="" data-position="25% 25%" /></a>
							<div class="content">
								<div class="inner">
									<h2>Atención premium.</h2>
									<p>¿y como no? sabemos lo que mereces, que mejor que un servicio que al tanto de tus
										 solucitudes e inquietudes en el aplicativo web.</p>
									<ul class="actions">
										<li><a href="generic.html" class="button">saber más.</a></li>
									</ul>
								</div>
							</div>
						</section>
					</section>



				<!-- Three -->
					<section id="three" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Clock</h2>
							<p>Para nosotros tu opinión es mu importante, haznos saber tu inquietud.:</p>
							<div class="split style1">
								<section>
									<form method="post" action="#">
										<div class="fields">
											<div class="field half">
												<label for="name">Nombre</label>
												<input type="text" name="name" id="name" />
											</div>
											<div class="field half">
												<label for="email">Email</label>
												<input type="text" name="email" id="email" />
											</div>
											<div class="field">
												<label for="message">Mensaje</label>
												<textarea name="message" id="message" rows="5"></textarea>
											</div>
										</div>
										<ul class="actions">
											<li><a href="" class="button submit">Enviar mensaje.</a></li>
										</ul>
									</form>
								</section>
								<section>
									<ul class="contact">
										<li>

											<h3>Dirección</h3>
											<span>Av. 1 de Mayo #33-98 &bull; Bogotá D.C., &bull; Colombia<br />

											</span>
										</li>
										<li>
											<h3>Email</h3>
											<a href="#">sena@misena.edu.co</a>
										</li>
										<li>
											<h3>Phone</h3>
											<span>(+57 1) 596-0050 Ext: 14915</span>
										</li>
										<li>
											<h3>Social</h3>
											<ul class="icons">
												<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
												<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
												<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
												<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
												<li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
											</ul>
										</li>
									</ul>
								</section>
							</div>
						</div>
					</section>

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy;="No falles, asiste. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="<?=media()?>/js/jquery.min.js"></script>
			<script src="<?=media()?>/js/jquery.scrollex.min.js"></script>
			<script src="<?=media()?>/js/jquery.scrolly.min.js"></script>
			<script src="<?=media()?>/js/browser.min.js"></script>
			<script src="<?=media()?>/js/breakpoints.min.js"></script>
			<script src="<?=media()?>/js/util.js"></script>
			<script src="<?=media()?>/js/main2.js"></script>

	</body>
</html>

