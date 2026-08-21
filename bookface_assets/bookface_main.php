 <?php
// if there is no cookie create one
use Friendica\DI;
require_once 'view/theme/frio/php/PHPColors/Color.php';

$accentColor = new Color($scheme_accent);
$customColor = DI::pConfig()->get($uid, 'frio', 'link_color') ?: '';
if ($customColor){
	$customColor = new Color(''.$customColor.'');
}
$menu_background_hover_light = ($customColor) ? '#'.$customColor->lighten(45) : '#'.$accentColor->lighten(45);
$menu_background_hover_dark  = ($customColor) ? '#'.$customColor->darken(20) : '#'.$accentColor->darken(20);
$menu_background_hover_color = 'light-dark('.$menu_background_hover_light.', '.$menu_background_hover_dark.')';

$nav_bg = 'light-dark(#ffffff, #252728)';
$background_color = 'light-dark(#f2f4f7, #1C1C1D)';

$link_color_light = ($customColor) ? '#'.$customColor->getHex() : '#'.$accentColor->getHex();
	// override ugly blue accent color and prevent setting accent to nav, bg color, or white
	if ( $link_color_light == "#1e87c2" || $link_color_light == $nav_bg || $link_color_light == $background_color || $link_color_light == '#ffffff' ){
		 $link_color_light = "#0066ff";
	}
$link_color_dark  = ($customColor) ? '#'.$customColor->getHex() : '#'.$accentColor->getHex();
	// override ugly blue accent color and prevent setting accent to nav, bg color, or black
	if ( $link_color_dark == "#1e87c2" || $link_color_dark == $nav_bg || $link_color_dark == $background_color || $link_color_dark == '#000000' ){
		 $link_color_dark = "#0066ff";
	}
$link_color = 'light-dark('.$link_color_light.', '.$link_color_dark.')';
$link_hover_color = $link_color;

$nav_icon_color = 'light-dark(#65686C, #B0B3B8)';
$nav_icon_hover_color = $nav_icon_color;

$font_color = 'light-dark(#313131, #cccccc)';
$font_color_lighter = 'light-dark(#444, #999)'; 
$font_color_darker = 'light-dark(#333333, #acacac)';
$contentbg_transp = '0';

