
<!DOCTYPE html>
<html>
<head>
	<title>Bionic Bruins</title>
	<link rel="shortcut icon" href="http://www.clipartkid.com/images/597/go-back-pix-for-blue-gear-clipart-6NFytx-clipart.png">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=PT+Serif+Caption" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/header.css">

	<style type="text/css">

		*{
			font-family: "PT Serif Caption";
		}

		html{
			background: #273658;
		}
		body{
			width: 100vw;
			margin: 0px;
			padding: 0px;
			overflow: hidden;
		}
		
		#myCarousel{
			width: 100vw;
			height: calc(100vh - 80px);
			position: relative;
		}

		.carousel-inner > .item > img {
			margin: 0 auto;
		}

		#content{
			z-index: 1;
		}

		.carousel-inner{
			margin-top: -5px;
		}



		
		
	</style>
</head>
<body>
	<div id="header">

		<img src="http://www.clipartkid.com/images/597/go-back-pix-for-blue-gear-clipart-6NFytx-clipart.png" id="header-logo">
		<span id="heading">Bionic Bruins</span>
		<span id="heading-info">Home of the Bruins</span>

		<div id="navigation-options">
			<!-- Column 1-->
			<div class="header-column-1 header-column">
				About
			</div>
			<!-- Column 2-->
			<div class="header-column-2 header-column">
				Staff
			</div>
			<!-- Column 3-->
			<div class="header-column-3 header-column">
				Donate
			</div>
			<!-- Column 4-->
			<div class="header-column-4 header-column">
				Login
			</div>
		</div>

	</div>
	<div id="content">
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	      <div class="item active">
	        <img src="http://curriculum.vexrobotics.com/sites/default/files/6.4.1%20Scoop_0.png" alt="Los Angeles" style="max-height: calc(100vh - 80px);">
	      </div>

	      <div class="item">
	        <img src="https://www.vexrobotics.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/c/l/clawbot-front.jpg" alt="Chicago" style="max-height: calc(100vh - 80px);">
	      </div>
	    
	      <div class="item">
	        <img src="https://i.ytimg.com/vi/HbxEerw6vk4/maxresdefault.jpg" alt="New york" style="max-height: calc(100vh - 80px);">
	      </div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>
	<script src="js/headerclicks.js"></script>
</body>
</html>