<?php
// Global variables
$site=get_option('vmxf_site_value');
$img=get_option('vmxf_img_value');
$srv=get_option('vmxf_srv_value');
$onlyone=get_option('vmxf_onlyone_p_value');
$prefix=get_option('vmxf_prefix_p_value');
$horiz_align=get_option('vmxf_horiz_align');
$css_id=get_option('vmxf_css_id');
$css_class=get_option('vmxf_css_class');

$plugindir=get_bloginfo('wpurl').'/wp-content/plugins/';

function vmxf_printTag($page){
	global $site;
	global $img;
	global $srv;
	global $horiz_align;
	global $css_id;
	global $css_class;
	
	$proto = (is_ssl()?"https://":"http://");

	echo "<div";
	echo ($horiz_align)? " style=\"text-align:".$horiz_align."\" " : "" ;
	echo ($css_id)? " id=\"".$css_id."\" " : "" ;
	echo ($css_class)? " class=\"".$css_class."\" " : "" ;
	echo ">
		<a href=\"".$proto."www.xiti.com/xiti.asp?s=".$site."\" title=\"WebAnalytics\" target=\"_top\"";
	echo ">
	<script type=\"text/javascript\">
	<!--
	Xt_param = 's=".$site."&p=".$page."';
	try {Xt_r = top.document.referrer;}
	catch(e) {Xt_r = document.referrer; }
	Xt_h = new Date();
	Xt_i = '<img border=\"0\" alt=\"\" ';
	Xt_i += 'src=\"".$proto.$srv.".xiti.com/".$img.".xiti?'+Xt_param;
	Xt_i += '&hl='+Xt_h.getHours()+'x'+Xt_h.getMinutes()+'x'+Xt_h.getSeconds();
	if(parseFloat(navigator.appVersion)>=4)
	{Xt_s=screen;Xt_i+='&r='+Xt_s.width+'x'+Xt_s.height+'x'+Xt_s.pixelDepth+'x'+Xt_s.colorDepth;}
	document.write(Xt_i+'&ref='+Xt_r.replace(/[<>\"]/g, '').replace(/&/g, '$')+'\" title=\"Internet Audience\">');
	//-->
	</script>
	<noscript>
	Mesure d'audience ROI statistique webanalytics par <img src=\"".$proto.$srv.".xiti.com/".$img.".xiti?s=".$site."&p=".$page."\" alt=\"WebAnalytics\" />
	</noscript>
	</a>
	</div>
	";

}

// Main function.
function vmxf_print() {
	global $onlyone;
	global $prefix;

	$page='';
	if($onlyone)
	{
		$page=$onlyone;
	}else
	{
		if($prefix)
		{
			$page = $prefix;
		}
		if(is_home()){	
			$page.='homepage';	
		}	
		else{ 				
			$page.=sanitize_title(wp_title('',FALSE));
		}

	}
	vmxf_printTag($page);
}
?>
