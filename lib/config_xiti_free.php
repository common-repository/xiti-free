<?php
// ---------------------------------------------
// Add all the sections, fields and settings 
// ---------------------------------------------	

add_action('admin_init', 'xitiFree_options_init');
add_action('admin_menu', 'xitiFree_menu');

function xitiFree_options_init(){	
	if(function_exists('register_setting')){
		register_setting('xitiFree_sampleoptions', 'vmxf_site_value', 'wp_filter_nohtml_kses');
		register_setting('xitiFree_sampleoptions', 'vmxf_img_value', 'wp_filter_nohtml_kses');	
		register_setting('xitiFree_sampleoptions', 'vmxf_srv_value', 'wp_filter_nohtml_kses');	
		register_setting('xitiFree_sampleoptions', 'vmxf_onlyone_p_value', 'wp_filter_nohtml_kses');	
		register_setting('xitiFree_sampleoptions', 'vmxf_prefix_p_value', 'wp_filter_nohtml_kses');	
		register_setting('xitiFree_sampleoptions', 'vmxf_horiz_align', 'wp_filter_nohtml_kses');	
		register_setting('xitiFree_sampleoptions', 'vmxf_css_id', 'wp_filter_nohtml_kses');	
		register_setting('xitiFree_sampleoptions', 'vmxf_css_class', 'wp_filter_nohtml_kses');	
	}
}

function xitiFree_menu(){	
	if(function_exists('register_setting')&&function_exists('settings_fields')){ 
		add_options_page('Xiti free', 'Xiti free', 10, __FILE__, 'xitiFree_options');			
	}
	else{
		add_options_page('Xiti free', 'Xiti free', 10, __FILE__, 'xitiFree_error');	
	}  			
}

function xitiFree_options(){  		
	echo "<div class='wrap'>\n";
	echo "<div id='icon-options-general' class='icon32'><br /></div>\n";
	echo "<h2>Xiti free Configuration</h2>\n";
	echo "<form method='post' action='options.php'>\n";	
    echo settings_fields('xitiFree_sampleoptions'); 	
	echo "<h3 class='hndle'><span class='wp-menu-toggle'>Please set the values for your Tag</span></h3>\n";
	echo "Example url : http://<i>logv2</i>.xiti.com/<i>bcg</i>.xiti?s=<i>123456</i>&p=\n";		
	echo "<table class='form-table'>\n";
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Site number (\"s=\" parameter)</th>\n";	
	echo "<td><input name='vmxf_site_value' type='text' value='".get_option('vmxf_site_value')."' class='regular-text code' /> <i>1234567</i> in the example.</td>\n";	
	echo "</tr>\n";	
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Image value</th>\n";	
	echo "<td><input name='vmxf_img_value' type='text' value='".get_option('vmxf_img_value')."' class='regular-text code' /> <i>bcg</i> in the example.</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Logging server</th>\n";	
	echo "<td><input name='vmxf_srv_value' type='text' value='".get_option('vmxf_srv_value')."' class='regular-text code' /> <i>logv2</i> in the example.</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Use only one p value</th>\n";	
	echo "<td><input name='vmxf_onlyone_p_value' type='text' value='".get_option('vmxf_onlyone_p_value')."' class='regular-text code' /> <i>Optionnal.</i> This will generate this value for the p parameter on all pages.</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Prefix p value</th>\n";	
	echo "<td><input name='vmxf_prefix_p_value' type='text' value='".get_option('vmxf_prefix_p_value')."' class='regular-text code' /> <i>Optionnal.</i> This will add a prefix on each generated value of the p parameter.</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>Horiz. Alignment</th>\n";	
	echo "<td><input name='vmxf_horiz_align' type='text' value='".get_option('vmxf_horiz_align')."' class='regular-text code' /> <i>Optionnal.</i> left, center or right. Left by default</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>CSS Id</th>\n";	
	echo "<td><input name='vmxf_css_id' type='text' value='".get_option('vmxf_css_id')."' class='regular-text code' /> <i>Optionnal.</i> Css Id of the generated DIV tag.</td>\n";
	echo "</tr>\n";		
	echo "<tr valign='top'>\n";
	echo "<th scope='row'>CSS Class</th>\n";	
	echo "<td><input name='vmxf_css_class' type='text' value='".get_option('vmxf_css_class')."' class='regular-text code' /> <i>Optionnal.</i> Css class of the DIV tag.</td>\n";
	echo "</tr>\n";		
	echo "</table>\n";			
	echo "<p class='submit'><input type='submit' name='Update' class='button-primary' value='Save settings'/></p>\n";
	echo "</form>\n";
	echo "</div>\n";
}

function xitiFree_error(){  	
	echo "<div class='wrap'>\n";
	echo "<div id='icon-options-general' class='icon32'><br /></div>\n";
	echo "<h2>Xiti free Configuration</h2>\n";
	echo "<form method='post' action=''>\n";
	echo "<div class='error'><p><strong>The Xiti free plug-in is not compatible with your WordPress version. Please deactivate it.</strong></p></div>\n";
	echo "</form>\n";
	echo "</div>\n";
}

?>
