

    <!-- Connect Google fonts -->
    

    <!-- Connect styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/js/under_construction/index_files/style.css">

    <!-- Skin Styles -->
    <style type="text/css">
    #menu {
        position: absolute;
        left: 20px;
        top: 20px;
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
    }
    ul#menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    #menu li {
        float: left;
    }
    #menu li a {
        float: left;
        height: 50px;
        line-height: 50px;
        padding: 0 20px;
        background: #788a9b;
        color: #fff;
        text-transform: uppercase;
        text-decoration: none;
        margin-left: 2px;
    }
    #menu li a:hover {
        background: #577189;
    }
    </style>

    <!-- Connect jquery libraries-->
    <style type="text/css"></style>
    <!-- <script src="./index_files/jquery.countdown.min.js"></script>-->
    <script src="<?php echo base_url(); ?>/js/under_construction/index_files/easeljs-0.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/under_construction/index_files/tweenjs-0.4.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/under_construction/index_files/movieclip-0.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/under_construction/index_files/preloadjs-0.3.0.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/under_construction/index_files/ColorFilter.js"></script>
    <script src="<?php echo base_url(); ?>/js/under_construction/index_files/index.js"></script>
   
    <script src="<?php echo base_url(); ?>/js/under_construction//index_files/script.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/under_construction/index_files/yepnope.1.5.4-min.js"></script>

    <!-- Check for IE8 and older versions to show static dummy page -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/js/under_construction/index_files/detect.js"></script>
    <script type="text/javascript">
    /* <![CDATA[ */
    var browser = cBrowser();
    if (browser.agent != 'ie' || (browser.agent == 'ie' && browser.version > 8)) {
        yepnope({
            load: [//'js/jquery.countdown.min.js',
                 '<?php echo base_url(); ?>/js/under_construction/index_files/easeljs-0.6.0.min.js',
                '<?php echo base_url(); ?>/js/under_construction/index_files/tweenjs-0.4.0.min.js',
                '<?php echo base_url(); ?>/js/under_construction/index_files/movieclip-0.6.0.min.js',
                '<?php echo base_url(); ?>/js/under_construction/index_files/preloadjs-0.3.0.min.js',
                '<?php echo base_url(); ?>/js/under_construction/index_files/ColorFilter.js',
                '<?php echo base_url(); ?>/js/under_construction/index_files/index.js',
                '<?php echo base_url(); ?>/js/under_construction/index_files/script.js'
            ],
            complete: function() {
                jQuery(document).ready(function() {
                    init();
                });
            }
        });
    } else {
        yepnope({
            load: ['css/error.css'],
            complete: function() {
                jQuery(document).ready(function() {
                    jQuery('body').html('<div id="alert"><img src="<?php echo base_url(); ?>/js/under_construction/index_files/images/ie_dummy.png" alt=""><div id="alert_message">Please update your browser in order<br>to show animated version of this page.<br></div></div>');
                });
            }
        });
    }
    /* ]]> */
    </script>



    <div id="animation">
        <canvas id="canvas" width="1600" height="257"></canvas>

        <div id="description_txt" style="position: absolute; -webkit-transform-origin: 0% 0%; transform-origin: 0% 0% 0px; visibility: visible; opacity: 1; -webkit-transform: matrix(1, 0, 0, 1, 330, 12); transform: matrix(1, 0, 0, 1, 330, 12);">
            <div id="txt1"></div>
            <div id="txt2">
                <span id="txt2a"></span>
                <br>
                <span id="txt2b"></span>
                <br>
                <span id="txt2c">
                    <br>
                </span>
            </div>
            <div id="txt3"></div>
        </div>

        <div id="counter" style="position: absolute; -webkit-transform-origin: 0% 0%; transform-origin: 0% 0% 0px; visibility: visible; opacity: 0.6; -webkit-transform: matrix(1, 0, 0, 1, 930, 15); transform: matrix(1, 0, 0, 1, 930, 15);">
            <!-- <div id="defaultCountdown" class="hasCountdown">
                <span class="countdown_row countdown_show4">
                    <span class="countdown_section">
                        <span class="countdown_amount"></span>
                        <br>
                    </span>
                    <span class="countdown_section">
                        <span class="countdown_amount"></span>
                        <br>
                    </span>
                    <span class="countdown_section">
                        <span class="countdown_amount"></span>
                        <br>
                    </span>
                    <span class="countdown_section">
                        <span class="countdown_amount"></span>
                        <br>
                    </span>
                </span>
            </div> -->
        </div>

    </div>

    <!-- Skins menu -->
    <ul id="menu">
        <li>
        </li>
        <li>
        </li>
    </ul>
<script>
// Initial setup
var preloader_width = 150; // Preloader width
var preloader_height = 4; // Preloader height
var preloader_color_fill = "#aabbcc"; // Preloader fill color 
var preloader_color_outline = "#aabbcc"; // Preloader outline color
var preloader_color_text = "#aabbcc"; // Preloader text color
var liquid_color = "#40d4ff"; // Color of animated liquid
var background_path = "<?php echo base_url(); ?>js/under_construction/images/background.png"; // Specify here path to your main background
var background_type = "stretched"; // Specify background type (can be "stretched", "fixed")
var background_pattern_usage = true; // Use pattern above main background (true, false)
var background_pattern_path = "<?php echo base_url(); ?>js/under_construction/images/pattern.png"; // Specify here path to your pattern
var background_pattern_alpha = 0.25; // Specify here alpha of your pattern (from 0 to 1)
var background_pattern_scale = 100; // Scale factor of your pattern (in percents)
var background_pattern_rotation = 0; // Rotation factor of your pattern
var logo_path = "<?php echo base_url(); ?>js/under_construction/images/logo.png"; // Specify here path to your logo
var logo_scale = 100; // Logo sale factor (in percents)
var logo_x = 0; // Logo correction factor for X-position (in pixels);
var logo_y = 0; // Logo correction factor for Y-position (in pixels);
var logo_url_enable = true; // Make logo clickable (true, false)  
var logo_url = "https://www.facebook.com/jithurjacob007"; // Specify URL when clicking on logo
var logo_url_target = "_blank"; // Targeting (_blank, _self, _parent, _top)
var flickering = true; // Flickering (true, false)
var animated_scratches = false; // Animated scratches dust (true, false)

// Other variables
var canvas, stage, exportRoot;
var background, pattern, background_pattern, pattern_matrix, main, logo_uc, loader, progress, textfield, logo_container, counter, description_txt, a_rnd, mask_mc;

// Resize event listener
window.addEventListener('resize', resize, false);

// Init handler
function init() {
    // Creating and resize stage
    canvas = document.getElementById("canvas");
    stage = new createjs.Stage(canvas);
    stage.canvas.width = $('#container_id').width();//window.innerWidth;
    stage.canvas.height = 500;//$('#uc_div').height;//window.innerHeight;
    //exportRoot = new lib.index(); // Uncomment to display initial stage in Flash
    //stage.addChild(exportRoot); // Uncomment to display initial stage in Flash
        //alert(stage.canvas.width+"::::"+ stage.canvas.height);
    // Ticker
    createjs.Ticker.setFPS(12);
    createjs.Ticker.addListener(stage);
        
    // Files list to load 
    images = images||{};
    var manifest = [
        {src:background_path, id:"background"},
        {src:background_pattern_path, id:"background_pattern"},
        {src:logo_path, id:"logo_uc"}
    ];  
    
    // Creating progress bar and textfield
    progress = new createjs.Shape();
    progress.graphics.beginStroke(preloader_color_outline).drawRect(stage.canvas.width / 2 - preloader_width / 2, stage.canvas.height / 2, preloader_width, preloader_height);
    stage.addChild(progress);
        
    textfield = new createjs.Text("Loading 0%", "normal 22px Trebuchet MS", preloader_color_text);
    textfield.x = stage.canvas.width / 2;
    textfield.y = stage.canvas.height / 2 - 30;
    textfield.textAlign ="center";
    stage.addChild(textfield);
        
    // Add preloader, handlers and start loading
    loader = new createjs.LoadQueue(true); // false - tag loading, true - XHR loading, none - XHR+(tag)
    loader.onProgress = handleFileProgress;
    loader.onFileLoad = handleFileLoad;
    loader.onComplete = handleComplete;
    loader.loadManifest(manifest);  
}

// Progress bar
function handleFileProgress(event) {
    var percents = 100*event.loaded;
    //console.log(percents.toFixed() + "%");
    textfield.text = percents.toFixed() + "%";
    progress.graphics.clear();
    progress.graphics.beginStroke(preloader_color_outline).drawRect(stage.canvas.width / 2 - preloader_width / 2, stage.canvas.height / 2, preloader_width, preloader_height);
    progress.graphics.beginFill(preloader_color_fill).drawRect(stage.canvas.width / 2 - preloader_width / 2, stage.canvas.height / 2, preloader_width * event.loaded, preloader_height);
}

// On file load handler
function handleFileLoad(event) {
images[event.id] = event.result; 
}

// On load complete handler
function handleComplete(event) {
    // Remove preloader
    progress.graphics.clear();
    stage.removeChild(progress);
    stage.removeChild(textfield);
        
    // Add background
    background = new createjs.Bitmap(loader.getResult("background"));
    stage.addChild(background);
        
    // Add pattern above background
    if (background_pattern_usage) {
        background_pattern = new Image();
        background_pattern = loader.getResult("background_pattern");
        pattern = new createjs.Shape();
            
        // Scale and rotate pattern
        pattern_matrix = new createjs.Matrix2D;
        pattern_matrix.scale(background_pattern_scale / 100, background_pattern_scale / 100);
        pattern_matrix.rotate(background_pattern_rotation);
        stage.addChild(pattern);
    }

    // Add logo and "no-signal" picture to container with mask
    logo_uc = new createjs.Bitmap(loader.getResult("logo_uc"));
    logo_uc.regX = logo_uc.image.width / 2;
    logo_uc.regY = logo_uc.image.height / 2;    
    logo_uc.scaleX = logo_uc.scaleY = logo_scale/100;
    logo_uc.x = logo_uc.x + logo_x;
    logo_uc.y = logo_uc.y + logo_y;
    
    //Add "no signal" animation
    no_signal = new lib.no_signal();

    mask_mc = new lib.mask_mc();
    logo_uc.mask = mask_mc.shape; // Add mask to logo...
    no_signal.mask = mask_mc.shape; // ... and no-signal pic

    logo_container = new createjs.Container();
    logo_container.addChild(mask_mc, logo_uc, no_signal); // Add all to container
    stage.addChild(logo_container);
    logo_container.rotation = 15;
    
    if (logo_url_enable) {
        stage.enableMouseOver(); 
        mask_mc.cursor = "pointer"; // Hand cursor on mouse over
        mask_mc.onClick = handleLogoClick; // Clickable logo
    }
    
    // Add main animation from Flash
    main = new lib.main();
    stage.addChild(main);
    
    // Add scratches from Flash
    if (animated_scratches) {
        scratches = new lib.scratches();
        stage.addChild(scratches);
    }
    
    // Add jQuery countdown timer
    //counter = new createjs.DOMElement(document.getElementById("counter"));
    //description_txt = new createjs.DOMElement(document.getElementById("description_txt"));
    //stage.addChild(counter, description_txt);

    // Start functions
    //counter_start();
    resize();
    recolor_liquid();
    if (flickering) {
        createjs.Ticker.addEventListener("tick", tick);
    flickering_nosignal();
    } else { no_signal.alpha = 0; }
    
    loader.close();
    stage.update();
}

// Recolor liquid
function recolor_liquid() {
    var path = main.liquid_color; // Path to object in flash
    var w = path.nominalBounds.width;
    var h = path.nominalBounds.height;
    var r = hexToR(liquid_color);
    var g = hexToG(liquid_color);
    var b = hexToB(liquid_color);
    var recolor = new createjs.ColorFilter(0,0,0,1, r,g,b,0); // (red, green, blue, alpha)
    path.filters = [recolor];
    path.cache(0 - w / 2, 0 - h / 2, w, h);
    path.updateCache();
}

// Convert HEX to RGB
function hexToR(h) {return parseInt((cutHex(h)).substring(0,2),16)}
function hexToG(h) {return parseInt((cutHex(h)).substring(2,4),16)}
function hexToB(h) {return parseInt((cutHex(h)).substring(4,6),16)}
function cutHex(h) {return (h.charAt(0)=="#") ? h.substring(1,7):h}

// Random elements flickering 
function tick(event) {
 //logo.alpha = counter.alpha = description_txt.alpha = 1; // Reset
 //a_rnd = Math.random() * 100;
 //if (a_rnd.toFixed() <= 5) { logo.alpha = 0.6; }
 //if (a_rnd.toFixed() == 31 | a_rnd.toFixed() == 32 | a_rnd.toFixed() == 95 | a_rnd.toFixed() == 96) { counter.alpha = 0.6;}
 //if (a_rnd.toFixed() == 95 | a_rnd.toFixed() == 42 | a_rnd.toFixed() == 43) { description_txt.alpha = 0.6;}
}

// Flickering "no signal" picture
function flickering_nosignal() {
    var long_delay = Math.round(Math.random() * (3000 - 800)) + 800; // from 800 ms to 3000 ms
    
    setTimeout(function () {
        var short_delay = Math.round(Math.random() * (795 - 50)) + 50; // from 50 ms to 795 ms
        
        setTimeout(function () {
            //no_signal.alpha = 0;
        }, short_delay);
        
        no_signal.alpha = 1;
        flickering_nosignal();
    }, long_delay);
}

// Open URL when click on logo
function handleLogoClick() {
    window.open(logo_url, logo_url_target, true);
}

// Resize browser event handler
function resize() {
    stage.canvas.width = $('#container_id').width();//;400;//window.innerWidth;
    stage.canvas.height =500;// window.innerHeight;
    
    // Preloader text positioning
    if (textfield != null) {
        textfield.x = stage.canvas.width / 2;
        textfield.y = stage.canvas.height / 2 - 30;
    }
    
    // Main animation positioning
    main.x = stage.canvas.width / 2 - 40;
    main.y = stage.canvas.height / 2 + 50;
        
    // Logo positioning
    logo_container.x = main.x + 228;
    logo_container.y = main.y - 105;

    // Countdown timer positioning
    //counter.x = main.x + 170;
    //counter.y = - main.y + 133;
    
    // Text positioning
    //description_txt.x = main.x - 430;
    //description_txt.y = - main.y + 130;
    
    // Scratches positioning
    if (animated_scratches) {
        scratches.x = stage.canvas.width / 2;
        scratches.y = stage.canvas.height / 2;
    }
        
    // Background types
    if (background_type == "stretched") {
        background.scaleX = stage.canvas.width / background.image.width;
        background.scaleY = stage.canvas.height / background.image.height;
    }
    if (background_type == "fixed") {
        background.x = stage.canvas.width / 2 - background.image.width / 2 ;
        background.y = stage.canvas.height / 2 - background.image.height / 2 ;
    }
    
    // Resize background pattern
    if (background_pattern_usage) {
        draw_pattern();
    }
}

// Draw background pattern
function draw_pattern() {
    pattern.graphics.clear();
    pattern.graphics.beginBitmapFill(background_pattern, "repeat", pattern_matrix).drawRect(0, 0, stage.canvas.width, stage.canvas.height);
    pattern.alpha = background_pattern_alpha;
    stage.update();
}

// jQuery Countdown styles 1.6.1. - plugin by Keith Wood
function counter_start() {
    //var austDay = new Date();
    //austDay = new Date(austDay.getFullYear() + 1, 3 - 1, 6); // Examples: (austDay.getFullYear() + 1, 3 - 1, 6) or (2013, 3 - 1, 6)
    //$("#defaultCountdown").countdown({until: austDay, format: 'DHMS'});
}
</script>