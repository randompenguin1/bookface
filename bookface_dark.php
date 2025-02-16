 <?php
/*
 * Copyright (C) 2010-2025, the Friendica project
 * SPDX-FileCopyrightText: 2010-2025 the Friendica project
 *
 * SPDX-License-Identifier: AGPL-3.0-or-later
 *
 * Name: Bookface Dark
 * Licence: AGPL
 * Author: Pygoscelis Papua @randompenguin@friendica.world feb @feb@loma.ml Phil @phil@loma.ml
 * Overwrites: nav_bg, nav_icon_color, background_color, background_image, contentbg_transp
 * Accented: yes
 * Version: 1.4
 */
use Friendica\DI;
require_once 'view/theme/frio/php/PHPColors/Color.php';

$accentColor = new Color($scheme_accent);
$customColor = DI::pConfig()->get($uid, 'frio', 'link_color') ?: '';
if ($customColor){
	$customColor = new Color(''.$customColor.'');
}
//$customColor = ($customColor) ?: new Color(''.$customColor.'');

$menu_background_hover_color = ($customColor) ? '#'.$customColor->darken(20) : '#'.$accentColor->darken(20);
$nav_bg = '#252728';
$background_color = '#1C1C1D';
$link_color = ($customColor) ? '#'.$customColor->getHex() : '#'.$accentColor->lighten(10);
	// override ugly blue accent color and prevent setting accent to nav or bg color
	if ( $link_color == "#33a2e0" || $link_color == $nav_bg || $link_color == $background_color ){
		 $link_color = "#0066ff";
	}
$nav_icon_color = '#B0B3B8';
$font_color = '#cccccc';
$font_color_darker = '#acacac';
$font_color_lighter = '#444444';
