<?php 
// create custom plugin settings menu
add_action('admin_menu', 'bfbj_create_menu');

function bfbj_create_menu()
{
	// create new top-level menu
	add_menu_page('Better Follow Button Settings', 'BFBJ Settings', 'manage_options', __FILE__, 'bfbj_settings_page', null);

	// call register settings function
	add_action('admin_init', 'register_mysettings');
}

function register_mysettings()
{
	// register our settings
	register_setting('bfb-settings-group', 'bfbj_buttontext');
	register_setting('bfb-settings-group', 'bfbj_headingtext');
	register_setting('bfb-settings-group', 'bfbj_emailplaceholder');
	register_setting('bfb-settings-group', 'bfbj_signupbuttontext');
	register_setting('bfb-settings-group', 'bfbj_buttoncolor');
	register_setting('bfb-settings-group', 'bfbj_buttoncoloropen');
	register_setting('bfb-settings-group', 'bfbj_modalbackgroundcolor');
	register_setting('bfb-settings-group', 'bfbj_submitbuttoncolor');
	register_setting('bfb-settings-group', 'bfbj_submit_button_text_color');
	register_setting('bfb-settings-group', 'bfbj_submit_button_hover_text_color');
	register_setting('bfb-settings-group', 'bfbj_modalopacity');
	register_setting('bfb-settings-group', 'bfbj_fontfamily');
	register_setting('bfb-settings-group', 'bfbj_fontfamily-custom');
	register_setting('bfb-settings-group', 'bfbj_buttonfontsize');
	register_setting('bfb-settings-group', 'bfbj_headingtextfontsize');
	register_setting('bfb-settings-group', 'bfbj_width');
	register_setting('bfb-settings-group', 'bfbj_buttonwidth');
	register_setting('bfb-settings-group', 'bfbj_buttonheight');
	register_setting('bfb-settings-group', 'bfbj_text-box-style');
	register_setting('bfb-settings-group', 'bfbj_radius');
}

function bfbj_settings_page()
{
	// settings page template ?>
	<link href="https://fonts.googleapis.com/css?family=Bellefair|Fresca|Lato|Lobster|Merriweather|Montserrat|Quicksand|Roboto|Bree+Serif|Lemonada|Pacifico" rel="stylesheet">

<style type="text/css" media="screen">
    @import url('https://fonts.googleapis.com/css?family=Bellefair|Fresca|Lato|Lobster|Merriweather|Montserrat|Quicksand|Roboto|Bree+Serif|Lemonada|Pacifico');

    .sample
    {
      position: fixed;
      bottom:55px;
      right:90px;
      z-index: 1;
      display: inline-block;
      padding: 0.5em;
      text-align: center;
      text-decoration: none;
      font: bold 14px/1.4 Cambria,Arial,sans-serif;
      color: white;
      font-size: 15px;
      background: #c33;
      transform:rotate(45deg);
    }

    .sample:after
    {
      position: absolute;
      z-index: -1;
      top: 0;
      width: 1em;
      height: 100%;
      background-size: 1em 100%;
      content: "";
      right: -10px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' preserveAspectRatio='none' width='100' height='100' viewBox='0 0 100 100'%3E%3Cpath d='M100 50L0 100L0 0z' fill='%23c33'/%3E%3C/svg%3E");
    }


    #bit, #bit * {} #bit {
        bottom: -300px;
        font: 13px "<?php
        echo get_option("bfbj_fontfamily-custom") ?: get_option("bfbj_fontfamily");?>", "Helvetica Neue", sans-serif;
        position: fixed;
        right: 10px;
        z-index: 999999;
        width: 230px;
        cursor: pointer;
    }

    .loggedout-follow-typekit {
        margin-right: 4.5em;
    }

    #bit a.bsub {
        background-color: <?php echo get_option("bfbj_buttoncolor") ?: '#333333';?>;
        opacity: <?php echo get_option("bfbj_modalopacity") ?: '0.95';?>;
        font: 13px "<?php
        echo get_option("bfbj_fontfamily-custom") ?: get_option("bfbj_fontfamily");?>", "Helvetica Neue", sans-serif;
        border: 0 none;
        color: <?php echo get_option("bfbj_button_text_color") ?: '#CCCCCC';?>;
        display: block;
        float: right;
        letter-spacing: normal;
        outline-style: none;
        outline-width: 0;
        overflow: hidden;
        padding: 5px 10px;
        text-decoration: none !important;
    }

    #bit a.bsub {
        border-radius: <?php echo get_option("bfbj_radius") ?: '0';?>px <?php echo get_option("bfbj_radius") ?: '0';?>px 0 0;
    }

    #bit a:hover span, #bit a.bsub.open span {
        color: #FFFFFF !important;
    }

    #bit a.bsub.open {
        background-color: <?php echo get_option("bfbj_buttoncoloropen") ?: '#333333';?>;
        opacity: <?php echo get_option("bfbj_modalopacity") ?: '0.95';?>;
    }
    
    #bitsubscribe {
        background: <?php echo get_option("bfbj_modalbackgroundcolor") ?: '#464646';?>;
        border-radius: <?php echo get_option("bfbj_radius") ?: '0';?>px 0 0 0;
        color: #FFFFFF;
        margin-top: 27px;
        padding: 15px;
        width: <?php echo get_option("bfbj_width") ?: '200';?>px;
        float: right;
        margin-top: 0;
        opacity: <?php echo get_option("bfbj_modalopacity") ?: '0.95';?>;
    }
    
    #bitsubscribe div {
        overflow: hidden;
    }

    #bit h3, #bit #bitsubscribe h3 {
        color: #FFFFFF;
        font: 13px "<?php
        echo get_option("bfbj_fontfamily-custom") ?: get_option("bfbj_fontfamily");?>", "Helvetica Neue", sans-serif;
        margin: 0 0 0.5em !important;
        text-align: left;
    }

    #bit #bitsubscribe p {
        color: #FFFFFF;
        font: 13px "<?php
        echo get_option("bfbj_fontfamily-custom") ?: get_option("bfbj_fontfamily");?>", "Helvetica Neue", sans-serif;
        margin: 0 0 1em;
    }

    #bitsubscribe p a {
        margin: 20px 0 0;
    }

    #bitsubscribe input[type="submit"] {
        font: 13px "<?php
        echo get_option("bfbj_fontfamily-custom") ?: get_option("bfbj_fontfamily");?>", "Helvetica Neue", sans-serif;
        background-color: <?php echo get_option("bfbj_submitbuttoncolor") ?: '#282828';?>;
        border: none;
        color: <?php echo get_option("bfbj_submit_button_text_color") ?: '#FFFFFF';?>;
        text-decoration: none;
        cursor: pointer;
        border-radius: <?php echo get_option("bfbj_radius") ?: '0';?>px;
        width: <?php echo get_option("bfbj_buttonwidth") ?: '100';?>%;
        height: <?php echo get_option("bfbj_buttonheight") ?: '30';?>px;
        margin: .2em .1em;
        font-weight: 700;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        padding: 0.5em 1.3em;

    }

    #bitsubscribe input[type="submit"]:hover {
        color: <?php echo get_option("bfbj_submit_button_hover_text_color") ?: '#FFFFFF';?>;
        text-decoration: none;
    }

    #bitsubscribe input[type="submit"]:active {
        color: #AAAAAA;
        text-decoration: none;
    }

    #bitsubscribe input[type="text"] {
        border: 0px;
        font: 13px "<?php
        echo get_option("bfbj_fontfamily-custom") ?: get_option("bfbj_fontfamily");?>", "Helvetica Neue", sans-serif;
        padding: 5px;
        border: none;
        border-bottom: solid 2px #c9c9c9;
        transition: border 0.3s;
        border-bottom: solid 2px #969696;
		width: 100%;
    }

    #bitsubscribe input[type="text"]::placeholder {
        color: #A6A6A6;
    }

    #bitsubscribe.open {
        display: block;
    }

    #bsub-subscribe-button {
        margin: 0 auto;
        text-align: center;
    }

    #bitsubscribe #bsub-credit {
        border-top: 1px solid #3C3C3C;
        font: 13px "<?php
        echo get_option("bfbj_fontfamily-custom") ?: get_option("bfbj_fontfamily");?>", "Helvetica Neue", sans-serif;
        margin: 0 0 -15px;
        padding: 7px 0;
        text-align: center;
    }

    #bitsubscribe #bsub-credit a {
        background: none repeat scroll 0 0 transparent;
        color: #AAAAAA;
        text-decoration: none;
    }

    #bitsubscribe #bsub-credit a:hover {
        background: none repeat scroll 0 0 transparent;
        opacity: <?php echo get_option("bfbj_modalopacity") ?: '0.95';?>;
        color: #FFFFFF;
    }
</style>

<script type="text/javascript" charset="utf-8">
    jQuery.extend(jQuery.easing, {
        easeOutCubic: function(x, t, b, c, d) {
            return c * ((t = t / d - 1) * t * t + 1) + b;
        }
    });
    jQuery(document).ready(function() {
        var isopen = false,
            bitHeight = jQuery('#bitsubscribe').height();
        setTimeout(function() {
            jQuery('#bit').animate({
                bottom: '-' + bitHeight - 30 + 'px'
            }, 200);
        }, 300);
        jQuery('#bit a.bsub').click(function() {
            if (!isopen) {
                isopen = true;
                jQuery('#bit a.bsub').addClass('open');
                jQuery('#bit #bitsubscribe').addClass('open');
                jQuery('#bit').stop();
                jQuery('#bit').animate({
                    bottom: '0px'
                }, {
                    duration: 400,
                    easing: "easeOutCubic"
                });
            } else {
                isopen = false;
                jQuery('#bit').stop();
                jQuery('#bit').animate({
                    bottom: '-' + bitHeight - 30 + 'px'
                }, 200, function() {
                    jQuery('#bit a.bsub').removeClass('open');
                    jQuery('#bit #bitsubscribe').removeClass('open');
                });
            }
        });
    });
</script>

<p><span class="sample">Example</span></p>
<div id="bit" class=""> <a class="bsub"><span id='bsub-text'><?php echo get_option("bfbj_buttontext") ?: 'Follow';?></span></a>
    <div id="bitsubscribe">
        <a name="subscribe-blog"></a>
        <form id="form" action="" method="post" accept-charset="utf-8" id="subscribe-blog">
        <p>
            <?php echo get_option( "bfbj_headingtext") ?: 'Get the latest posts delivered to your mailbox:'; ?>
        </p>
        <p>
            <input type="text" name="email" placeholder="<?php echo get_option(" bfbj_emailplaceholder ") ?: 'Email Address';?>" id="subscribe-field" onclick="if ( this.value == 'Email Address' ) { this.value = ''; }" onblur="if ( this.value == '' ) { this.value = '<?php echo get_option(" bfbj_emailplaceholder ") ?: 'Email Address';?>'; }" />
        </p>
        <p>
            <input type="hidden" name="action" value="subscribe" />
            <input type="hidden" name="source" value="<?php echo esc_url($referer);?>" />
            <input type="hidden" name="sub-type" value="<?php echo esc_attr($source);?>" />
            <input type="hidden" name="redirect_fragment" value="<?php echo esc_attr($widget_id);?>" />
            <?php wp_nonce_field( 'blogsub_subscribe_' . get_current_blog_id(), '_wpnonce', false); ?>
            <input type="submit" onClick="event.preventDefault();" value="<?php echo get_option(" bfbj_signupbuttontext ") ?: 'Sign up!';?>" name="jetpack_subscriptions_widget" />
        </p>
        </form>
    </div>
</div>

	<style>
		*,
		*:before,
		*:after {
			box-sizing: border-box;
		}

		.tasty-slider-range {
		-webkit-appearance: none;
			height: 10px;
			border-radius: 5px;
			background: #d7dcdf;
			outline: none;
			padding: 0;
			margin: 0;
		}

		.tasty-slider-range::-webkit-slider-thumb {
		-webkit-appearance: none;
		appearance: none;
			width: 20px;
			height: 20px;
			border-radius: 50%;
			background: #2c3e50;
			cursor: pointer;
			-webkit-transition: background .15s ease-in-out;
			transition: background .15s ease-in-out;
		}

		.tasty-slider-range::-webkit-slider-thumb:hover {
			background: #1abc9c;
		}

		.tasty-slider-range:active::-webkit-slider-thumb {
			background: #1abc9c;
		}

		.tasty-slider-range::-moz-range-thumb {
			width: 20px;
			height: 20px;
			border: 0;
			border-radius: 50%;
			background: #2c3e50;
			cursor: pointer;
			-webkit-transition: background .15s ease-in-out;
			transition: background .15s ease-in-out;
		}

		.tasty-slider-range::-moz-range-thumb:hover {
			background: #1abc9c;
		}

		.tasty-slider-range:active::-moz-range-thumb {
			background: #1abc9c;
		}

		.tasty-slider-value {
			display: inline-block;
			position: relative;
			width: 60px;
			color: #fff;
			line-height: 20px;
			text-align: center;
			border-radius: 3px;
			background: #2c3e50;
			padding: 5px 10px;
			margin-left: 8px;
		}

		.tasty-slider-value:after {
			position: absolute;
			top: 8px;
			left: -7px;
			width: 0;
			height: 0;
			border-top: 7px solid transparent;
			border-right: 7px solid #2c3e50;
			border-bottom: 7px solid transparent;
			content: '';
		}

		::-moz-range-track {
			background: #d7dcdf;
			border: 0;
		}

		input::-moz-focus-inner,
		input::-moz-focus-outer {
			border: 0;
		}

		.tasty-color {
			width: 200px;
			height: 30px;
		}

		.tasty-text-box,
		.tasty-select {
			width: 200px;
		}
	</style>

<div class="wrap">
<h2>Better Follow Button for JetPack</h2>
<?php echo get_option('plugin_error');
	if (isset($_GET['settings-updated'])) {
?>
<div id="message" class="updated">
	<p><strong><?php _e('Settings saved.');?></strong></p>
</div>
<?php } ?>

<form method="post" action="options.php">
   <?php settings_fields('bfb-settings-group');?>
   <?php do_settings_sections('bfb-settings-group');?>
   <h3>Before You Begin</h3>
   <p>Make sure your JetPack is connected to your WordPress.com account. You can manage this in your JetPack settings.</p>
   <p>To view current subscriptions to your site, check out the Subscriptions widget inside JetPack.</p>
   <table class="form-table">
      <tr>
         <th>
            <h1>Text</h1>
         </th>
      </tr>
      <tr valign="top">
         <th scope="row">Main Button</th>
         <td>
            <input type="text" class="tasty-text-box" name="bfbj_buttontext" value="<?php echo esc_attr(get_option('bfbj_buttontext'));?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Heading</th>
         <td>
            <input type="text" class="tasty-text-box" name="bfbj_headingtext" value="<?php echo esc_attr(get_option('bfbj_headingtext'));?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Email Placeholder</th>
         <td>
            <input type="text" class="tasty-text-box" name="bfbj_emailplaceholder" value="<?php echo esc_attr(get_option('bfbj_emailplaceholder'));?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Signup Button</th>
         <td>
            <input type="text" class="tasty-text-box" name="bfbj_signupbuttontext" value="<?php echo esc_attr(get_option('bfbj_signupbuttontext'));?>" />
         </td>
      </tr>
      <tr>
         <th>
            <h1>Colors</h1>
         </th>
      </tr>
      <tr valign="top">
         <th scope="row">Follow Button</br><em>when collapsed</em></th>
         <td>
            <input type="color" class="tasty-color" name="bfbj_buttoncolor" value="<?php echo esc_attr(get_option('bfbj_buttoncolor')) ?: '#252525';?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Follow Button</br><em>when expanded</em></th>
         <td>
            <input type="color" class="tasty-color" name="bfbj_buttoncoloropen" value="<?php echo esc_attr(get_option('bfbj_buttoncoloropen')) ?: '#252525';?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Modal background color</th>
         <td>
            <input type="color" class="tasty-color" name="bfbj_modalbackgroundcolor" value="<?php echo esc_attr(get_option('bfbj_modalbackgroundcolor')) ?: '#464646';?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Submit Button</th>
         <td>
            <input type="color" class="tasty-color" name="bfbj_submitbuttoncolor" value="<?php echo esc_attr(get_option('bfbj_submitbuttoncolor')) ?: '#282828';?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Submit Button Text</th>
         <td>
            <input type="color" class="tasty-color" name="bfbj_submit_button_text_color" value="<?php echo esc_attr(get_option('bfbj_submit_button_text_color')) ?: '#FFF';?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Submit Button Text</br><em>when hovering</em></th>
         <td>
            <input type="color" class="tasty-color" name="bfbj_submit_button_hover_text_color" value="<?php echo esc_attr(get_option('bfbj_submit_button_hover_text_color')) ?: '#464646';?>" />
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Transparency</br></th>
         <td>
            <div class="tasty-slider">
               <input class="tasty-slider-range" type="range" name="bfbj_modalopacity" value="<?php echo esc_attr(get_option('bfbj_modalopacity')) ?: '1';?>" min="0" max="1" step="0.01">
               <span class="tasty-slider-value">0</span>
            </div>
         </td>
      </tr>
      <tr>
         <th>
            <h1>Fonts</h1>
         </th>
      </tr>
      <tr valign="top">
         <th scope="row">Font Family</br></th>
         <td valign="top">
            <select id="font-selector" name="bfbj_fontfamily">
               <option disabled>Sans-Serif</option>
               <option value="Avenir" <?php selected(get_option( 'bfbj_fontfamily'), "Avenir"); ?>>Avenir</option>
               <option value="Helvetica" <?php selected(get_option( 'bfbj_fontfamily'), "Helvetica"); ?>>Helvetica</option>
               <option value="Lato" <?php selected(get_option( 'bfbj_fontfamily'), "Lato"); ?>>Lato</option>
               <option value="Montserrat" <?php selected(get_option( 'bfbj_fontfamily'), "Montserrat"); ?>>Montserrat</option>
               <option value="Roboto" <?php selected(get_option( 'bfbj_fontfamily'), "Roboto"); ?>>Roboto</option>
               <option value="Quicksand" <?php selected(get_option( 'bfbj_fontfamily'), "Quicksand"); ?>>Quicksand</option>
               <option disabled>Serif</option>
               <option value="Bellefair" <?php selected(get_option( 'bfbj_fontfamily'), "Bellefair"); ?>>Bellefair</option>
               <option value="Bree Serif" <?php selected(get_option( 'bfbj_fontfamily'), "Bree Serif"); ?>>Bree Serif</option>
               <option value="Fresco" <?php selected(get_option( 'bfbj_fontfamily'), "Fresco"); ?>>Fresco</option>
               <option value="Merriweather" <?php selected(get_option( 'bfbj_fontfamily'), "Merriweather"); ?>>Merriweather</option>
               <option disabled>Fancy</option>
               <option value="Lobster" <?php selected(get_option( 'bfbj_fontfamily'), "Lobster"); ?>>Lobster</option>
               <option value="Lemonada" <?php selected(get_option( 'bfbj_fontfamily'), "Lemonada"); ?>>Lemonada</option>
               <option value="Pacifico" <?php selected(get_option( 'bfbj_fontfamily'), "Pacifico"); ?>>Pacifico</option>
            </select>
            <span id="font-preview" style="font-family: <?php echo esc_attr(get_option('bfbj_fontfamily')) ?>">Hello World!</span>
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Custom Font
            <br><em>Enter the custom font name - overrides the selection above.</em></br>
         </th>
         <td valign="top">
            <input type="text" class="tasty-text-box" name="bfbj_fontfamily-custom" value="<?php echo esc_attr(get_option('bfbj_fontfamily-custom'));?>" />
         </td>
      </tr>
      <tr>
         <th>
            <h1>Size</h1>
         </th>
      </tr>
      <tr valign="top">
         <th scope="row">Width</br></th>
         <td valign="top">
            <div class="tasty-slider">
               <input class="tasty-slider-range" type="range" name="bfbj_width" value="<?php echo esc_attr(get_option('bfbj_width')) ?: '200';?>" min="200" max="300" step="1">
               <span class="tasty-slider-value">0</span>
            </div>
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Button Width</br></th>
         <td valign="top">
            <div class="tasty-slider">
               <input class="tasty-slider-range" type="range" name="bfbj_buttonwidth" value="<?php echo esc_attr(get_option('bfbj_buttonwidth')) ?: '100';?>" min="25" max="100" step="5">
               <span class="tasty-slider-value">0</span>
            </div>
         </td>
      </tr>
      <tr valign="top">
         <th scope="row">Button Height</br></th>
         <td valign="top">
            <div class="tasty-slider">
               <input class="tasty-slider-range" type="range" name="bfbj_buttonheight" value="<?php echo esc_attr(get_option('bfbj_buttonheight')) ?: '30';?>" min="30" max="50" step="1">
               <span class="tasty-slider-value">0</span>
            </div>
         </td>
      </tr>
      <tr>
         <th>
            <h1>Additional Settings</h1>
         </th>
      </tr>
      <tr valign="top">
         <th scope="row">Rounded Corners</br></th>
         <td valign="top">
            <div class="tasty-slider">
               <input class="tasty-slider-range" type="range" name="bfbj_radius" value="<?php echo esc_attr(get_option('bfbj_radius')) ?: '0';?>" min="0" max="10" step="1">
               <span class="tasty-slider-value">0</span>
            </div>
         </td>
      </tr>
   </table>
   <?php submit_button();?>
</form>
</div>

<script>
   var rangeSlider = function() {
   var slider = jQuery('.tasty-slider'),
   range = jQuery('.tasty-slider-range'),
   value = jQuery('.tasty-slider-value');
   
	   slider.each(function() {
	   
	   	value.each(function() {
	   		var value = jQuery(this).prev().attr('value');
	   		jQuery(this).html(value);
	   	});
	   
	   	range.on('input', function() {
	   		jQuery(this).next(value).html(this.value);
	   	});
	   });
   };
   
   var fontPreviewer = function() {
   var selector = jQuery('#font-selector'),
   preview = jQuery('#font-preview');
   selector.on('change', function() {
   	preview.css("font-family", selector.val());
   });
   };
   
   rangeSlider();
   fontPreviewer();
</script>
<?php } ?>