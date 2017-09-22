<?php
session_start();
include 'seguranca.php';
?>
<html lang="pt-br">
  <head>

    <!-- Meta Tags Requeridas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php if(isset($_SESSION['title'])) echo($_SESSION['title']);?></title>
   	<!-- Favicon -->
    <link rel="icon" href="../favicon.png">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
      <script src="js/jquery-3.2.1.min.js"></script>
            <script src='js/validacao.js' type="text/javascript"> </script>
  </head>
  <body>
  	<?php include_once('header.php');?>
    <div class="container">
      <div class="row" style="margin-top:40px; margin-bottom:60px;">
    <?php include 'sidebar.php'; ?>
    <div class="row col-lg-9 col-sm-12">
  	<?php include('func.php'); ?>
      </div>
        </div>  </div>
	<?php include_once('footer.php');?>


    <!-- jQuery first, then Tether, then Bootstrap JS. -->


     <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
