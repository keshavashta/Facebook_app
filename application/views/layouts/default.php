<html xmlns="http://www.w3.org/1999/html">
<head>
    <!--    start css-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.css');?>" rel="stylesheet" type="text/css"/>

    <!-- css-->
    <link href="<?php echo base_url("/assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("/assets/css/bootstrap-responsive.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css"/>

    <!--    end css-->

    <!--    start js-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <!--    end js-->
    <title>
        <?php echo $template['title'];?>
    </title>

</head>

<body class="container">

<!--    Start Fb-->
<div id='fb-root'></div>
<script src='http://connect.facebook.net/en_US/all.js'></script>
<script>
    FB.init({
        appId:'174961989300941',
        status:true, // check login status
        cookie:true, // enable cookies to allow the server to access the session
        xfbml:true, // parse XFBML
        oauth:true
    });

</script>
<!--    End Fb-->
<div id="content">


    <div  class="navbar navbar-fixed-top ">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Project name</a>

                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>

    </div>
    <div style="margin-top: 200px"; id="main_container" class="row">
        <?php echo $template['body'];?>
    </div>
    <div id="footer" class="row">
        <hr >
        <p>Tincidunt dis, massa dis proin? Porta nisi mus, cras? Ridiculus vel est tortor placerat, a odio nunc dignissim adipiscing! Augue! Nisi natoque lacus vut augue turpis parturient vel risus non enim aenean, amet sed natoque! Integer in enim adipiscing. Porttitor, cum et, lundium duis et augue? Mattis parturient, et tincidunt.</p>
</div>

</body>
</html>
