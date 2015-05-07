<?php 
	session_start();
	if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'destroy') {
	#	rmdir($_SESSION['dir']);
		session_destroy();
		session_unset();
		header("Location: ./");
	}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
  <meta charset="utf-8" />

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="expires" content="86400000" />
  <meta name="viewport" content="width=device-width" />

  <meta name="description" content="Camunda is an open source platform for workflow and business process automation." />
  <meta name="keywords" content="camunda, open source, free, Apache License, Apache 2.0, workflow, BPMN, BPMN 2.0, camunda.org, bpm, BPMS, engine, platform, process, automation, community" />
  <meta name="author" content="camunda community" />

  <title>Camunda - Diagram Sharing</title>


<!-- Bootstrap core CSS -->
<link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/basic.css" rel="stylesheet">
<link href="assets/css/dropzone.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Documentation extras -->
<link href="assets/css/camunda.css" rel="stylesheet">
</head>
	<body class="bs-docs-home">
    <!-- Docs master nav -->
	<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
		<div class="container">
			<div class="navbar-header">
				<a href="/" class="navbar-brand">Camunda</a>
				<?php if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true) { ?>
				<a class="navbar-brand" style="float: right;" href="./?destroy">Logout</a>
				<?php } ?>
			</div>
			
			
		</div>
	</header>
	<section id="content">
		<div class="bs-docs-featurette">
			<?php if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true) { ?>
			<div class="container">
				<h2 class="bs-docs-featurette-title">Welcome <?=$_SESSION['name'];?></h2><br /><br />
				<div id="dropzone">
					<form action="upload.php" class="dropzone dz-clickable" id="my-dropzone">
						<div class="dz-message">Drop files here or click to upload.<br>
							<span class="note"><!--(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)--></span>
						</div>
					</form>
				</div>
			</div>
			<?php } else { ?>
			<div class="container">
				<h2>Please sign in</h2><br /><br />
				<form class="form-signin" name="signinForm">
					<input name="username" autofocus="" tabindex="1" type="text" class="input-block-level" placeholder="Username" ><br /><br />
					<input name="password" tabindex="2" type="password" class="input-block-level" placeholder="Password" ><br /><br />
					<button tabindex="3" class="btn btn-large btn-primary" onclick="Login(this.form);" type="button">Sign in</button><br /><br />
				</form>
			</div>
			<?php } ?>	
		</div>
	</section>
	<footer class="bs-docs-footer" role="contentinfo">
		<div class="container">
			<p>
				Designed and built with passion by <a href="http://www.camunda.com" target="_blank">Camunda</a>
			</p>
			<ul class="bs-docs-footer-links muted">
				<li>
					<a href="/download">Download</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					<a href="http://docs.camunda.org">Features</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					<a href="http://docs.camunda.org">Docs</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					<a href="/forum">Forum</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					<a href="/team">Team</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					<a href="http://blog.camunda.org">Blog</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					<a href="http://camunda.com/bpm/enterprise/">Enterprise</a>
				</li>
			</ul>

			<ul class="bs-docs-footer-links" id="socialLinks">
				<li>
					<a class="google-follow" title="Follow camunda BPM on Google+" target="_blank" href="https://plus.google.com/117216832875506558598?prsrc=3" rel="publisher"><i class="fa fa-3x fa-fw fa-google-plus-square"></i></a>
				</li>
				<li>
					<a class="twitter-follow" title="Follow camunda BPM on Twitter" target="_blank" href="https://twitter.com/camundaBPM"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
				</li>
				<li>
					<a class="github" title="Fork me on GitHub" target="_blank" href="https://github.com/camunda/"><i class="fa fa-github fa-fw fa-3x"></i></a>
				</li>
				<li>
					<a class="stackoverflow" title="Follow camunda BPM on Stackoverflow" target="_blank" href="http://stackoverflow.com/questions/tagged/camunda"><i class="fa fa-stack-overflow fa-fw fa-3x"></i></a>
				</li>
				<li>
					<a class="youtube" title="Subscribe to our Vimeo channel" target="_blank" href="https://vimeo.com/user22820658"><i class="fa fa-vimeo-square fa-3x"></i></a>
				</li>
			</ul>
			<ul class="bs-docs-footer-links" id="socialLinks">
				<li>Many thanks to<br/>
					<a href="https://www.jetbrains.com/idea/" target="_blank"><img src="assets/img/logo_intellij_idea.png"/></a>
				</li>
			</ul>
			<ul class="bs-docs-footer-links muted">
				<li>
					<a href="http://camunda.org/privacy.html">Privacy Statement</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					<a href="http://camunda.org/imprint.html">Imprint</a>
				</li>
				<li>
					&middot;
				</li>
				<li>
					camunda Services GmbH © 2014
				</li>
			</ul>

		</div>
	</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Placed at the end of the document so the pages load faster -->
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<?php if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true) { ?>
	<script src="assets/js/dropzone.js"></script>
	<script>
	Dropzone.options.myDropzone = {
		previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-image\"><img data-dz-thumbnail /></div>\n  <div class=\"dz-details\">\n    <div class=\"dz-size\"><span data-dz-size></span></div>\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n  </div>\n  <div class=\"dz-progress\"><span class=\"dz-upload\" data-dz-uploadprogress></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n  <div class=\"dz-success-mark\">\n    <svg width=\"54px\" height=\"54px\" viewBox=\"0 0 54 54\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:sketch=\"http://www.bohemiancoding.com/sketch/ns\">\n      <title>Check</title>\n      <defs></defs>\n      <g id=\"Page-1\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\" sketch:type=\"MSPage\">\n        <path d=\"M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z\" id=\"Oval-2\" stroke-opacity=\"0.198794158\" stroke=\"#747474\" fill-opacity=\"0.816519475\" fill=\"#FFFFFF\" sketch:type=\"MSShapeGroup\"></path>\n      </g>\n    </svg>\n  </div>\n  <div class=\"dz-error-mark\">\n    <svg width=\"54px\" height=\"54px\" viewBox=\"0 0 54 54\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:sketch=\"http://www.bohemiancoding.com/sketch/ns\">\n      <title>Error</title>\n      <defs></defs>\n      <g id=\"Page-1\" stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\" sketch:type=\"MSPage\">\n        <g id=\"Check-+-Oval-2\" sketch:type=\"MSLayerGroup\" stroke=\"#747474\" stroke-opacity=\"0.198794158\" fill=\"#FFFFFF\" fill-opacity=\"0.816519475\">\n          <path d=\"M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z\" id=\"Oval-2\" sketch:type=\"MSShapeGroup\"></path>\n        </g>\n      </g>\n    </svg>\n  </div>\n</div>",
		init: function() {
			thisDropzone = this;
			$.get('upload.php', function(data) {
				$.each(data, function(key,value){
					var mockFile = { name: value.name, size: value.size };
					thisDropzone.emit("addedfile", mockFile);
					thisDropzone.emit("complete", mockFile);
					//   thisDropzone.emit("thumbnail", mockFile, "uploads/"+value.name);

				});
			});
			this.on("addedfile", function (file) {
				var downloadButton = Dropzone.createElement("<button class=\"btn btn-success\">Download</button>");
				var deleteButton = Dropzone.createElement("<button>Delete</button>");
				var _this = this;
				downloadButton.addEventListener("click", function (e) {
					e.preventDefault();
					e.stopPropagation();
					window.open('<?=$_SESSION['dir'];?>uploads/'+file.name,'_blank');
				});
		/*
				deleteButton.addEventListener("click", function (e) {
					e.preventDefault();
					e.stopPropagation();
					if(confirm("Are you sure you want to delete this file.")){
						$.ajax({
							type: "POST",
							url: "/Planner/NewProject/DeleteFile",
							data: { filename: file.name },
							success: function(data) {
								if (data == "success") {
									_this.removeFile(file);
								} else {
									alert("Error deleting file.");
								}
							}
						});
					}
				});
		*/
				file.previewElement.appendChild(downloadButton);
		//      file.previewElement.appendChild(deleteButton);
			});
		}
	};
	</script>
	<?php } ?>
	<script src="assets/js/login.js"></script>
</body>
</html>
