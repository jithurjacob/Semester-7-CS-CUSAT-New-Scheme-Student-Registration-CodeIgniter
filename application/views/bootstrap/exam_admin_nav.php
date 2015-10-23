<?php
$this->load->helper('url'); ?>
<nav id="jithu_nav" class="navbar navbar-default navbar-static-top navbar-inverse jithu_nav" role="navigation">
    <div class="container" id="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

 
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" id="nav_ul">
                <li class="<?php
echo $active == "home" ? "active" : ""; ?>">
                    <?php
echo anchor('/exam/admin/home', 'Admin Home'); ?>
                </li>
                <li class="<?php
echo $active == "news" ? "active" : ""; ?>">
                    <?php
echo anchor('/exam/admin/news', 'Exam News'); ?>
                </li>
                <li class="<?php
echo $active == "college_details" ? "active" : ""; ?>">
                    <?php
echo anchor('/exam/admin/college_details', 'College Details'); ?>
                </li>
                <li class="<?php
echo $active == "search" ? "active" : ""; ?>">
                    <?php
echo anchor('/exam/admin/search', 'Search'); ?>
                </li>
               
                <li class="<?php echo $active == "student_verification"?"active":"";?>">
<?php echo anchor('/exam/admin/student_verification', 'Student Verification');?>
                </li>
                <li class="<?php echo $active == "settings"?"active":"";?>">
<?php echo anchor('/exam/admin/settings', 'Settings');?>
                </li>
               <li class="<?php
echo $active == "logout" ? "active" : ""; ?>">
                    <?php
echo anchor('/exam/logout', 'Logout'); ?>
                </li>
               
            </ul>


        </div>
        <!-- /.navbar-collapse -->

    </div>
</nav>
