<?php require_once('admin/lib/conectar.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Material Design Bootstrap</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!--Lightbox2-->
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        
        html,
        body,
        .view {
            height: 100%;
        }
        /* Navigation*/
        
        .navbar {
            background-color: rgba(0,0,0,0.5);
        }
        
        .scrolling-navbar {
            -webkit-transition: background .5s ease-in-out, padding .5s ease-in-out;
            -moz-transition: background .5s ease-in-out, padding .5s ease-in-out;
            transition: background .5s ease-in-out, padding .5s ease-in-out;
        }
        
        .top-nav-collapse {
            background-color: #1C2331;
        }
        
        footer.page-footer {
            background-color: #1C2331;
            margin-top: 45px;
        }
        
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #1C2331;
            }
        }
        /*Call to action*/
        
        .flex-center {
            color: #fff;
        }
        
        .view {
            background: url("media/75927754.jpg")no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        section{
            margin-top: 45px;
        }

        .card{
            margin-top: 45px;
        }

        .divider-new{
            margin-top: 80px;
        }

        .contactar{
            margin-top: 0px;
        }

        .social{
            margin-top: 20px;
        }
        .dades{
            margin-top: 10px;
        }
        .title{
            text-decoration: underline;
        }

        .carousel-inner > .carousel-item > img{
            width: 100%;
            height:700px;
        }

    </style>

</head>

<body>

    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark fixed-top scrolling-navbar">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">
            <?php
                    $stmt=$conn->prepare('SELECT logo FROM dades_web');
                    $stmt->execute(array());
                    $rows=$stmt->fetch();
                        if($rows['logo'] !=""){
                           echo "<img style=\"height: 35px;\"src=\"admin/images/".$rows['logo']."\" class=\"img-fluid\" alt=\"Responsive image\">";
                       }
                        else{
                            echo "<strong>".$rows['nom']."</strong>"; 
                        }
                    
                ?>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?seccio=actualitat">actualitat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?seccio=entorn">entorn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?seccio=galeria">galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?seccio=tarifes">tarifes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contacta">contacta</a>
                    </li>
                </ul>
                <form class="form-inline waves-effect waves-light" action="" method="GET">
                    <input type="hidden" name="seccio" value="cercar">

                    <input class="form-control" type="text" placeholder="Cerca a la web" name="paraules">

                    <button type="submit" name="enviar" class="btn-link" value="enviar"><i class="fa fa-search prefix" style="color:white;"></i></button>
                </form>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->
	    
    <?php
        if(isset($_GET['seccio'])){
            if(isset($_GET['sub'])){
                include_once("content/".$_GET['seccio']."_".$_GET['sub'].".php");
            }

            else{
                include_once("content/".$_GET['seccio'].".php");
            }
        }
        else{
            include_once("content/inicial.php");
        }

    ?>

    <!--Footer-->
    <footer class="page-footer center-on-small-only">
        <?php
                    $stmt=$conn->prepare('SELECT * FROM dades_web');
                    $stmt->execute(array());
                    while($rows=$stmt->fetch()){
                    
                ?>

        <!--Footer Links-->
        <div class="container-fluid">
            <div class="row">
            

                <!--First column-->
                
                <div class="col-md-3 offset-lg-1 hidden-lg-down">
                
                    <h6 class="title"><?php echo $rows['nom']; ?></h6>
                    <img src="admin/images/<?php echo $rows['logo']; ?>" class="img-fluid" alt="Responsive image">

                </div>
                
                <!--/.First column-->

                <hr class="hidden-md-up">

                <!--Second column-->
                <div class="col-lg-2 col-md-4 offset-lg-1">
                    
                    <ul>
                        <li class="social"><a href="https://www.facebook.com/helenasolerphoto/?ref=aymt_homepage_panel"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a></li>
                        <li class="social"><a href="https://www.instagram.com/helenasoler/"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                        <li class="social"><a href="https://es.linkedin.com/in/helena-soler-ruiz-304800132"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a></li>
                        <li class="social"><a href="https://plus.google.com/u/0/"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <!--/.Second column-->

                <hr class="hidden-md-up">

                <!--Third column-->
                <div class="col-lg-4">
                    <h6 class="title">Dades de l'empresa</h6>
                    <ul>
                        <li class="dades"><?php echo $rows['nom']; ?></li>
                        <li class="dades">Cif: <?php echo $rows['cif']; ?></li>
                        <li class="dades"><?php echo $rows['telefon']; ?></li>
                        <li class="dades"><?php echo $rows['adreca']; ?></li>
                        <li class="dades"><?php echo $rows['cp']." - ".$rows['poblacio']." - ".$rows['pais']; ?></li>
                        <li class="dades"><?php echo $rows['mail']; ?></li>
                        
                    </ul>
                </div>
                <!--/.Third column-->

                <hr class="hidden-md-up">

            </div>
        </div>
        
        <!--/.Footer Links-->


        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2015 Copyright: <a href="http://www.MDBootstrap.com"> Helena Soler </a>

            </div>
        </div>
        <!--/.Copyright-->

        <?php } ?>
    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <!--Lightbox2-->
    <script src="js/lightbox-plus-jquery.min.js"></script>

    <script type="text/javascript" src="js/gridify.js"></script>
    <script type="text/javascript">
    window.onload = function(){
        var options =
        {
            srcNode: 'img',             // grid items (class, node)
            margin: '20px',             // margin in pixel, default: 0px
            width: '250px',             // grid item width in pixel, default: 220px
            max_width: '',              // dynamic gird item width if specified, (pixel)
            resizable: true,            // re-layout if window resize
            transition: 'all 0.5s ease' // support transition for CSS3, default: all 0.5s ease
        }
        document.querySelector('.grid').gridify(options);
    }
</script>


</body>

</html>