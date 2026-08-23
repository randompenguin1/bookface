 <?php
/*
 * Copyright (C) 2010-2026, the Friendica project
 * SPDX-FileCopyrightText: 2010-2026 the Friendica project
 *
 * SPDX-License-Identifier: AGPL-3.0-or-later
 *
 * Name: Bookface Auto Legacy
 * Licence: AGPL
 * Author: Pygoscelis Papua @randompenguin@friendica.world feb @feb@loma.ml Phil @phil@loma.ml
 * Overwrites: nav_bg, nav_icon_color, background_color, background_image, contentbg_transp
 * Accented: Yes
 * Version: 2.1.8
 */
// if there is no cookie create one

use Friendica\DI;
require_once 'view/theme/frio/php/PHPColors/Color.php';

$accentColor = new Color($scheme_accent);
$customColor = DI::pConfig()->get($uid, 'frio', 'link_color') ?: '';
if ($customColor){
	$customColor = new Color(''.$customColor.'');
}
$menu_background_hover_color = ($customColor) ? '#'.$customColor->lighten(45) : '#'.$accentColor->lighten(45);
$nav_bg = '#ffffff';
$background_color = '#f2f4f7';
$link_color = ($customColor) ? '#'.$customColor->getHex() : '#'.$accentColor->getHex();
	// override ugly blue accent color and prevent setting accent to nav, bg color, or white
	if ( $link_color == "#1e87c2" || $link_color == $nav_bg || $link_color == $background_color){
		 $link_color = "#0066ff";
	}
	/* pure gray can mess up contrast color for text */
	if ( $link_color == "#808080" ){
		 $link_color = "#737373";
	}
	/* select green is too close to gray to allow invert or contrast on text */
	if ( $link_color == "#218f39" ){
		 $link_color = "#008000";
	}
$link_hover_color = $link_color;
$nav_icon_color = '#65686C';
$font_color = '#313131';
$font_color_lighter = '#444'; 
$font_color_darker = '#333';
$contentbg_transp = '0';