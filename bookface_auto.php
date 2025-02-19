 <?php
/*
 * Copyright (C) 2010-2025, the Friendica project
 * SPDX-FileCopyrightText: 2010-2025 the Friendica project
 *
 * SPDX-License-Identifier: AGPL-3.0-or-later
 *
 * Name: Bookface Auto Color Mode
 * Licence: AGPL
 * Author: Pygoscelis Papua @randompenguin@friendica.world feb @feb@loma.ml Phil @phil@loma.ml
 * Overwrites: nav_bg, nav_icon_color, background_color, background_image, contentbg_transp
 * Accented: Yes
 * Version: 1.4
 */
// if there is no cookie create one
use Friendica\DI;
require_once 'view/theme/frio/php/PHPColors/Color.php';

$accentColor = new Color($scheme_accent);
$customColor = DI::pConfig()->get($uid, 'frio', 'link_color') ?: '';
if ($customColor){
	$customColor = new Color(''.$customColor.'');
}
$menu_background_hover_color = 'rgba(128,128,128,.1)';
$nav_bg = '#ffffff';
$background_color = '#f2f4f7';
$link_color = ($customColor) ? '#'.$customColor->getHex() : '#'.$accentColor->getHex();
	// override ugly blue accent color and prevent setting accent to nav or bg color
	if ( $link_color == "#1e87c2" || $link_color == $nav_bg || $link_color == $background_color ){
		 $link_color = "#0066ff";
	}
$nav_icon_color = '#65686C';
$font_color = '#313131';
$font_color_darker = '#333';
$contentbg_transp = '0';
