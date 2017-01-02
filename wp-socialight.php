<?php
/*
Plugin Name: WP-SociaLight
Plugin URI: http://savvy.co.il
Description: WP-Socialight is a simple, lightweight social share plugin that will increase the interaction on your website.
Version: 2.3
Author: Roee Yossef - Savvy.co.il
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function wp_socialight_menu_item() {
  add_submenu_page("options-general.php", "WP-SociaLight", "WP-SociaLight", "manage_options", "wp-socialight", "wp_socialight_page");
}
add_action("admin_menu", "wp_socialight_menu_item");

function wp_socialight_page() {
   ?>
      <div class="wrap">
         <h1>WP-SociaLight - Options</h1>
         <h4>Choose the settings for WP-Socialight plugin...</h4>
         <form class="wp_socialight_options" style="background: #fff;padding:20px;" method="post" action="options.php">
            <div class="wp_socialight_text"><p>WP-Socialight is a simple, lightweight social share plugin that will increase the interaction on your website.</p></div>
            <?php
               settings_fields("wp_socialight_config_section");
               do_settings_sections("wp-socialight");
               submit_button();
            ?>
         </form>
         <p></p>
         <p>© All rights reserved to&nbsp;<a href="http://savvy.co.il/"><strong>Savvy - Wordpress Development and Design</a> - 2016</strong></p>
      </div>
   <?php
}


function wp_socialight_settings() {
    add_settings_section("wp_socialight_config_section", "", null, "wp-socialight");
    add_settings_field("wp-socialight-facebook", "Facebook", "wp_socialight_facebook_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-twitter", "Twitter", "wp_socialight_twitter_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-linkedin", "Linkedin", "wp_socialight_linkedin_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-google", "Google+", "wp_socialight_google_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-buffer", "Buffer", "wp_socialight_buffer_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-whatsapp", "Whatsapp", "wp_socialight_whatsapp_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-mail", "Mail", "wp_socialight_mail_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-home", "Show on Homepage?", "wp_socialight_home_checkbox", "wp-socialight", "wp_socialight_config_section");
    add_settings_field("wp-socialight-pages", "Show on all Pages?", "wp_socialight_pages_checkbox", "wp-socialight", "wp_socialight_config_section");

    register_setting("wp_socialight_config_section", "wp-socialight-facebook");
    register_setting("wp_socialight_config_section", "wp-socialight-twitter");
    register_setting("wp_socialight_config_section", "wp-socialight-linkedin");
    register_setting("wp_socialight_config_section", "wp-socialight-google");
    register_setting("wp_socialight_config_section", "wp-socialight-buffer");
    register_setting("wp_socialight_config_section", "wp-socialight-whatsapp");
    register_setting("wp_socialight_config_section", "wp-socialight-mail");
    register_setting("wp_socialight_config_section", "wp-socialight-home");
    register_setting("wp_socialight_config_section", "wp-socialight-pages");
}

function wp_socialight_facebook_checkbox() {
   ?>
        <li class="socialIcon fb"><span class="socicon socicon-facebook"></span></li><input type="checkbox" name="wp-socialight-facebook" value="1" <?php checked(1, get_option('wp-socialight-facebook'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_twitter_checkbox() {
   ?>
        <li class="socialIcon tw"><span class="socicon socicon-twitter"></span></li><input type="checkbox" name="wp-socialight-twitter" value="1" <?php checked(1, get_option('wp-socialight-twitter'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_linkedin_checkbox() {
   ?>
        <li class="socialIcon ld"><span class="socicon socicon-linkedin"></span></li><input type="checkbox" name="wp-socialight-linkedin" value="1" <?php checked(1, get_option('wp-socialight-linkedin'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_google_checkbox() {
   ?>
        <li class="socialIcon gg"><span class="socicon socicon-google"></span></li><input type="checkbox" name="wp-socialight-google" value="1" <?php checked(1, get_option('wp-socialight-google'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_buffer_checkbox() {
   ?>
        <li class="socialIcon bf"><span class="socicon socicon-buffer"></span></li><input type="checkbox" name="wp-socialight-buffer" value="1" <?php checked(1, get_option('wp-socialight-buffer'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_whatsapp_checkbox() {
   ?>
        <li class="socialIcon wa"><span class="socicon socicon-whatsapp"></span></li><input type="checkbox" name="wp-socialight-whatsapp" value="1" <?php checked(1, get_option('wp-socialight-whatsapp'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_mail_checkbox() {
   ?>
        <li class="socialIcon ml"><span class="socicon socicon-mail"></span></li><input type="checkbox" name="wp-socialight-mail" value="1" <?php checked(1, get_option('wp-socialight-mail'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_home_checkbox() {
   ?>
        <input type="checkbox" name="wp-socialight-home" value="1" <?php checked(1, get_option('wp-socialight-home'), true); ?> /> Check the box to activate
   <?php
}
function wp_socialight_pages_checkbox() {
   ?>
        <input type="checkbox" name="wp-socialight-pages" value="1" <?php checked(1, get_option('wp-socialight-pages'), true); ?> /> Check the box to activate
   <?php
}

add_action("admin_init", "wp_socialight_settings");

function add_wp_socialight_icons() {
    if(!is_rtl()) {
      $html = "<div class='wp-socialight-wrapper wp-socialight-ltr'><ul class='wp-socialight-wrapper-list'><li class='share-on'>Share</li>";
    }
    else {
      $html = "<div class='wp-socialight-wrapper'><ul class='wp-socialight-wrapper-list'><li class='share-on'>שיתוף</li>";
    }
            global $post;

            $url = get_permalink($post->ID);
            $url = esc_url($url);
            $title = get_the_title();

            if(get_option("wp-socialight-facebook") == 1)
            {
                $html = $html . "<li class='socialIcon fb'><a target='_blank' title='Facebook' href='http://www.facebook.com/sharer.php?u=" . $url . "'><span class='socicon socicon-facebook'></span></a></li>";
            }
            if(get_option("wp-socialight-twitter") == 1)
            {
                $html = $html . "<li class='socialIcon tw'><a target='_blank' title='Twitter' href='https://twitter.com/share?url=" . $url . "'><span class='socicon socicon-twitter'></span></a></li>";
            }
            if(get_option("wp-socialight-linkedin") == 1)
            {
                $html = $html . "<li class='socialIcon ld'><a target='_blank' title='Linkedin' href='http://www.linkedin.com/shareArticle?url=" . $url . "'><span class='socicon socicon-linkedin'></span></a></li>";
            }
            if(get_option("wp-socialight-google") == 1)
            {
                $html = $html . "<li class='socialIcon gg'><a target='_blank' title='Google+' href='https://plus.google.com/share?url=" . $url . "'><span class='socicon socicon-google'></span></a></li>";
            }
            if(get_option("wp-socialight-buffer") == 1)
            {
                $html = $html . "<li class='socialIcon bf'><a target='_blank' title='Buffer' href='https://buffer.com/add?url=" . $url . "'><span class='socicon socicon-buffer'></span></a></li>";
            }
            if(get_option("wp-socialight-mail") == 1)
            {
                $html = $html . "<li class='socialIcon ml'><a class='ban_popup' title='Email' href='mailto:?subject=Check this out...&body=Link -&nbsp;" . $url . "'><span class='socicon socicon-mail'></span></a></li>";
            }
            if(get_option("wp-socialight-whatsapp") == 1)
            {
              if (wp_is_mobile()) {
                $html = $html . "<li class='socialIcon wa'><a class='ban_popup' title='Whatsapp' href='whatsapp://send?text=" . $title . "&nbsp;-&nbsp;" . $url . "' data-action='share/whatsapp/share'><span class='socicon socicon-whatsapp'></span></a></li>";
              }
            }

            $html = $html . "</ul></div>";
            return $html;
}

function generate_shares_code() {
  if(get_option("wp-socialight-home") == 1) :
    $show_home = true;
  else:
    $show_home = false;
  endif;

  if(get_option("wp-socialight-pages") == 1) :
    $show_pages = true;
  else:
    $show_pages = false;
  endif;


  if ($show_home) {
    if ( is_home() || is_front_page() ) {
      echo add_wp_socialight_icons();
    }
  }

  if ( $show_pages ) {
    if ( is_page() && ( !is_home() && !is_front_page() ) ) {
      echo add_wp_socialight_icons();
    }
  }

  if ( is_single() ) {
    echo add_wp_socialight_icons();
  }

}
add_action('wp_footer', 'generate_shares_code');




function wp_socialight_load_admin_style() {
    wp_register_style( 'wp_socialight_admin_css', plugin_dir_url(__FILE__) . '/admin-style.css', false, '1.0.0' );
    wp_enqueue_style( 'wp_socialight_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wp_socialight_load_admin_style' );




function wp_socialight_style_script() {
    wp_register_style("wp-socialight-style-file", plugin_dir_url(__FILE__) . "style.min.css");
    wp_enqueue_style("wp-socialight-style-file");

    wp_register_script("wp-socialight-script-file", plugin_dir_url(__FILE__) . "wp-socialight-script.min.js" , array( 'jquery' ) );
    wp_enqueue_script("wp-socialight-script-file");
}
add_action("wp_enqueue_scripts", "wp_socialight_style_script");

?>
