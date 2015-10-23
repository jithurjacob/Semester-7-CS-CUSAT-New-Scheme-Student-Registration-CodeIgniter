<?php $this->load->helper('url'); ?>
<nav id="jithu_nav" class="navbar navbar-default navbar-static-top navbar-inverse jithu_nav" role="navigation">
    <div class="container">
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
            <ul class="nav navbar-nav">
                <li class="active">
                    <?php echo anchor( '/home/home', 'Home' ); ?>
                </li>

                <li class="dropdown">
                    <?php echo anchor( '/home/home', 'About <b class="caret"></b>',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'true') ); ?>

                    <ul class="dropdown-menu">

                        <li class="dropdown-submenu">
                            <?php echo anchor( '/home/home', 'College',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo anchor( '/home/home', 'Profile' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/vision_and_mission', 'Vision and Mission' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Management' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Career @ CEP' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'CEP Highlights' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Accreditations' ); ?>
                                </li>

                                <li>
                                    <?php echo anchor( '/home/home', 'Mandatory Disclosure' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Tution Fee Waiver Scheme' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Anti Ragging Information' ); ?>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <?php echo anchor( '/home/home', 'Campus',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo anchor( '/home/home', 'Campus and Location' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Campus Plan' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Campus Aerial View' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Route Map' ); ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Contact Us' ); ?>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php echo anchor( '/home/home', 'Admission <b class="caret"></b>',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'true') ); ?>

                    <ul class="dropdown-menu">

                        <li class="dropdown-submenu">
                            <?php echo anchor( '/home/home', 'Courses',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <?php echo anchor( '/home/home', 'BTech',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <?php echo anchor( '/home/home', 'Computer Science' ); ?>
                                        </li>
                                        <li>
                                            <?php echo anchor( '/home/home', 'Electronics &amp; Communication' ); ?>
                                        </li>
                                        <li>
                                            <?php echo anchor( '/home/home', 'Electrical &amp; Electronics' ); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <?php echo anchor( '/home/home', 'MTech',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <?php echo anchor( '/home/home', 'Computer Science' ); ?>
                                        </li>
                                        <li>
                                            <?php echo anchor( '/home/home', 'Electronics &amp; Communication' ); ?>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <?php echo anchor( '/home/home', 'Syllabus',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo anchor( '/home/home', 'CUSAT BTech Syllabus 2012 Scheme' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'CUSAT BTech Syllabus 2006 Scheme' ); ?>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Eligibilty' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Fee Structure' ); ?>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <?php echo anchor( '/home/home', 'Departments <b class="caret"></b>',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'true') ); ?>

                    <ul class="dropdown-menu">
                        <li>
                            <?php echo anchor( '/home/home', 'Computer Science' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Electronics &amp; Communication' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Electrical &amp; Electronics' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Information Technology' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'General Department' ); ?>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php echo anchor( '/home/home', 'Facilities <b class="caret"></b>',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'true') ); ?>

                    <ul class="dropdown-menu">
                        <li>
                            <?php echo anchor( '/home/home', 'Infrastructure' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Transportation' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Canteen' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Hostel' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Library' ); ?>
                        </li>

                        <li>
                            <?php echo anchor( '/home/home', 'Internet' ); ?>
                        </li>
                        <li class="dropdown-submenu">
                            <?php echo anchor( '/home/home', 'Labs',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo anchor( '/home/home', 'Computer Centre' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Electronics &amp; Communication Lab' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Mechanical Lab' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Electrical Lab' ); ?>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <?php echo anchor( '/home/home', 'Co-Curricular',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'false') ); ?>

                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo anchor( '/home/home', 'Arts' ); ?>
                                </li>
                                <li>
                                    <?php echo anchor( '/home/home', 'Sports' ); ?>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php echo anchor( '/home/home', 'exam <b class="caret"></b>',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'true') ); ?>

                    <ul class="dropdown-menu">
                        <li>
                            <?php echo anchor( '/home/home', 'exam Portal' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Career Oppurtunities Centre' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Students Placed' ); ?>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php echo anchor( '/home/home', 'Downloads <b class="caret"></b>',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'true') ); ?>

                    <ul class="dropdown-menu">
                        <li>
                            <?php echo anchor( '/home/home', 'Syllabus' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Textbooks' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Exam Time Table' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Fee Structure' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Forms' ); ?>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php echo anchor( '/home/home', 'Faculty <b class="caret"></b>',array( 'class'=>'dropdown-toggle','data-toggle'=>'dropdown','data-hover'=>'dropdown','data-delay'=>'000','data-close-others'=>'true') ); ?>

                    <ul class="dropdown-menu">
                        <li>
                            <?php echo anchor( '/home/home', 'Computer Science' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Electronics &amp; Communication' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Electrical &amp; Electronics' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'Information Technology' ); ?>
                        </li>
                        <li>
                            <?php echo anchor( '/home/home', 'General Department' ); ?>
                        </li>
                    </ul>
                </li>
                <li>
                    <?php echo anchor( '/home/home', 'Gallery' ); ?>
                </li>
                <li>
                    <?php echo anchor( '/home/home', 'Contact Us' ); ?>
                </li>
            </ul>


        </div>
        <!-- /.navbar-collapse -->

    </div>
</nav>
