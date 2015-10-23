<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * reCaptcha File Config
 *
 * File     : recaptcha.php
 * Created  : May 14, 2013 | 4:22:40 PM
 * 
 * Author   : Andi Irwandi Langgara <irwandi@ourbluecode.com>
 */

$config['public_key']   = '6LfsvfoSAAAAAPYpINWMkXF4JO_Yl43kf2WyErfH';
$config['private_key']  = '6LfsvfoSAAAAAOvoSifR8K2ORGgW_TGHl-9dz9zC';

// Set Recaptcha options
// Reference at https://developers.google.com/recaptcha/docs/customization
$config['recaptcha_options']  = array(
    'theme'=>'red', // red/white/blackglass/clean
    'lang' => 'en' // en/nl/fl/de/pt/ru/es/tr
    //  'custom_translations' - Use this to specify custom translations of reCAPTCHA strings.
    //  'custom_theme_widget' - When using custom theming, this is a div element which contains the widget. See the custom theming section for how to use this.
    //  'tabindex' - Sets a tabindex for the reCAPTCHA text box. If other elements in the form use a tabindex, this should be set so that navigation is easier for the user
);

?>
