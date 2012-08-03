<!DOCTYPE html>
<html>
<head>
    <link href="<?php echo base_url("/assets/css/bootstrap.css");?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url("/assets/css/datepicker.css");?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('/assets/css/main.css');?>" rel="stylesheet" type="text/css"/>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-dropdown.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>" type="text/javascript"></script>
    <title>
        <?php echo $template['title'];?>
    </title>

</head>

<body class="container">
<!---->
<!--    Start Fb-->
<!--<div id='fb-root'></div>-->
<!--<script src='http://connect.facebook.net/en_US/all.js'></script>-->
<!--<script>-->
<!--    FB.init({-->
<!--        appId:'174961989300941',-->
<!--        status:true, // check login status-->
<!--        cookie:true, // enable cookies to allow the server to access the session-->
<!--        xfbml:true, // parse XFBML-->
<!--        oauth:true-->
<!--    });-->
<!---->
<!--</script>-->
<!--    End Fb-->
<div id="content">


    <div class="navbar navbar-fixed-top ">
        <div class="navbar-inner">
            <div class="container">
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
                    <ul class="nav pull-right">
                        <li id="fat-menu" class="dropdown">
                            <?php if (getUser()): ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">userName<b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                <li class="divider"></li>

                                <li><a
                                    href="<?php echo get_logOutUrl()?>">Logout</a>
                                </li>
                            </ul>
                            <?php else : ?>
                            <a href="<?php echo get_loginUrl();?>">Login
                                by Facebook <b class="caret"></b></a>
                            <?php endif?>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>

    </div>
    <div id="main_container" >
        <?php echo $template['body'];?>
    </div>
    <div id="footer">
        <hr>
        <p>Tincidunt dis, massa dis proin? Porta nisi mus, cras? Ridiculus vel est tortor placerat, a odio nunc
            dignissim
            adipiscing! Augue! Nisi natoque lacus vut augue turpis parturient vel risus non enim aenean, amet sed
            natoque!
            Integer in enim adipiscing. Porttitor, cum et, lundium duis et augue? Mattis parturient, et tincidunt.</p>
    </div>

</body>
</html>
