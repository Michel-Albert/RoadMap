<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thumbnail Gallery - Start Bootstrap Template</title>
    
        <link href="<?php echo base_url();?>assets/contents/css/web/kendo.common.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/contents/css/web/kendo.rtl.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/contents/css/web/kendo.default.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/contents/css/web/kendo.default.mobile.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/contents/css/dataviz/kendo.dataviz.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/contents/css/dataviz/kendo.dataviz.default.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/contents/shared/styles/examples-offline.css" rel="stylesheet">

        <script src="<?php echo base_url();?>assets/contents/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/contents/js/kendo.all.min.js"></script>
        <script src="<?php echo base_url();?>assets/contents/js/kendo.timezones.min.js"></script>
        <script src="<?php echo base_url();?>assets/contents/shared/js/console.js"></script>
        <script src="<?php echo base_url();?>assets/contents/shared/js/prettify.js"></script>
        
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/thumbnail-gallery.css" rel="stylesheet">
    <!--<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>-->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <?php
    $admin_authority=$this->session->userdata("admin_authority");
    $logined_user=$this->session->userdata("logined_user");    
    $selected_menu=$this->session->userdata("selected_menu");
    echo "<script>var selected_menu='".$selected_menu."'</script>";
    $this->load->view("ajax.php");
    ?>
    <body style="background-color:blue;">
        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url("home");?>" style='color: yellow;'>AnoImg.com ImageShop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" style="float: right;">
                    <li>
                        <a href="<?php echo site_url("Image/get_images");?>">All Images</a>
                    </li>
                    <?php
                    if($admin_authority==1 || $admin_authority==2)
                    {
                        ?>                    
                    <li>
                        <a href="<?php echo site_url("Image/mine");?>">My Images</a>                        
                    </li>
                    <?php
                    if($admin_authority==2)
                    {
                        ?>
                    <li>
                        <a  href="<?php echo site_url("Image/get_deletes");?>">Deleted Images</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("User/get_users");?>">Users</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="<?php echo site_url("Upload");?>">Upload</a>
                    </li>
                    <!--li>
                        <a href="<?php echo site_url("Upload/Kupload_0");?>">K_0</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url("Upload/Kupload_1");?>">K_1</a>
                    </li-->
                    <li>
                        <a href="<?php echo site_url("User/logout");?>">Logout</a>
                    </li>
                    <?php
                    }
                    else
                    {
                    ?>
                    <li>
                        <a href="<?php echo site_url("User/login");?>">Login</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div id='main_body' style='margin:0px auto;width:95%;'>