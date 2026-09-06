 <?php
/*
 * Copyright (C) 2010-2026, the Friendica project
 * SPDX-FileCopyrightText: 2010-2026 the Friendica project
 *
 * SPDX-License-Identifier: AGPL-3.0-or-later
 *
 * Name: Bookface Auto Color Compact (Experimental)
 * Licence: AGPL
 * Author: Pygoscelis Papua @randompenguin@friendica.world feb @feb@loma.ml Phil @phil@loma.ml
 * Overwrites: nav_bg, nav_icon_color, background_color, background_image, contentbg_transp
 * Accented: Yes
 * Version: 2.2.1
 */
include 'bookface_assets/bookface_main.php';


/* EXPERIMENTAL!
   ==============
   Description: This version of Bookface implements a different way of displaying
   contant that is more similar to how Mastodon and Bluesky work, where you do not
   see any comments in feeds and the post is a clickable link to a page where only
   that post and its comments are displayed.

	* ALL comments in ALL feeds are hidden
	* The body text of the post becomes a link to the single post display page.
	* To comment on a post you must go to the single post display page.
	* Images, Link Previews, Videos, Audio, and Quote Shares remain clickable in feeds.
	
	Known Issues:
	* Comment Action button is still navigable by keyboard and can be pressed.
	* Add-ons that add content to posts can cause the clickable area to shift.
	* Single-post display is always in a new tab.
*/



