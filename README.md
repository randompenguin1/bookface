BOOKFACE FOR FRIENDICA
======================
Version 1.5.7

**Description:** A Friendica Theme Template/Scheme for the "Frio" theme that gives it a modern makeover.

**Disclaimer:** _This is a Work-In-Progress, use in production at your own risk!_

## INSTALLATION

1. Drop these six files: 
	* bookface_auto.css
	* bookface_auto.php
	* bookface_dark.css
	* bookface_dark.php
	* bookface_light.css
	* bookface_light.php

into _/friendica/view/theme/frio/scheme/_

2. Go to _Settings > Display > Theme Customization > Appearance_
    1. Select either "Bookface Light", "Bookface Dark", or "Bookface Auto"
	2. (optional) Select Accent Color
	3. click "Submit" button.

## CUSTOMIZATION/LOCALIZATION

Starting with Version 1.3 it is much easier for server admins to customize and localize Bookface. Everything you can safely change is now defined in the CSS variables at the top of the stylsheets.  You could also override these with another stylesheet loaded after Bookface the redefines the variables.

### LOCALIZATION

Bookface uses a number of pseudo-elements to label buttons in the Frio theme. You can easily change these to say something else or to display them in another language:

    /* LOCALIZE pseudo-element text below */
    --sign-in-text: 'Sign-In';
    --compose-text: 'Compose';
    --save-search-text: 'Save Search';
    --follow-tag-text: 'Follow Tag';
    --comment-button-text: 'Comment';
    --share-button-text: 'Share';
    --quote-button-text: 'Quote';
    --like-button-text: 'Like';
    --dislike-button-text: 'Dislike';
    --more-button-text: 'More';
    --attendyes-button-text: 'Going';
    --attendno-button-text: 'Can\'t Go';
    --attendmaybe-button-text: 'Maybe';
    --add-photo-button-text: 'Add Photos';
    --follow-button-text: 'Follow';
    --save-button-text: 'Save';

### CUSTOMIZATION

Some people have found the accent color engagement counts on action buttons distracting or busy. You can easily change it be redefining the variables. You could either set it to another already defined variable or set it to a specific color:

	--count-color: black; /* make number black */
    --count-bg: var(--nav-icon-color); /* makes it same color as button */

    --count-bg: black; /* makes the background of counts black, font is white */

	--count-color: purple; /* number is purple */
    --count-color: rgba(0,0,0,.5); /* semi-transparent gray */

You get the idea.

You should _avoid_ redefining the default Frio color variables because if a user on your server changes the "Theme Customization" settings you'd be overriding the user's color scheme.  The default variables you should *NOT* override globally are:

    --nav-bg
    --link-color
    --nav-icon-color
    --background-color
    --font-color
    --font-color-darker
    --menu-background-hover-color

You _can_ safely globally override:

    --border-color

Depending on the font(s) you define, you _might_ be able to safely override:

    --global-font-family

But make sure the font is available to users of your site.  Don't assume they have it installed on their system! Either load them remotely using the `<link>` tag or locally using `@font-face`.

You should *NOT* use the `@import` method to remote load fonts if you can help it because it loads them sequentially and will hurt server performance. So if you're going to load a remote font use the `<link>` method. However you'll need to edit the "Frio" theme _/friendica/view/theme/frio/templates/head.tpl_ file to add something like this:

     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

If the font you want to use is local you'd just need to add something like this to the top of the Bookface stylesheets:

     @font-face{
          font-family: Roboto;
          src: url('../font/Roboto-Regular.ttf'); /* or where ever you put it */
     }

Then set the CSS variable to use it:

     -global-font-family: 'Roboto', sans-serif;

Some fonts may cause misalignment problems in various places, make sure you test the font before deploying it for everyone.

### COVER PHOTOS

From Bookface 1.3 it supports adding a "Cover Photo" to profiles. There are two places you can add the Cover Photo, depending on whether you want it used on all of your profile section pages or if you want it to appear on ONLY your actual profile page.

Note that this feature ONLY works is recent, modern browsers!  Every *current* and *supported* desktop and mobile version should be able to show it, but nothing *unsupoorted* nor released before 2022 will (see caniuse.com entry for "has()" for specific verssions).

#### ON ALL PROFILE PAGES

1. Go to _Settings > Profile > Personal_

2. In the "Description" box add something like:

`[class=coverphoto][img=https://friendica.server/photo/1649cc674810612350.png]Cover photo description alt-text here[/img][/class]`

3. Submit your changes.

For people who are not using the Bookface scheme they will simply see a thumbnail of your Cover Photo in the sidebar with your Profile Description. For people who ARE using the Bookface scheme they will see your Cover Photo on your Profile, Conversations, etc. pages that have a sidebar.

#### ON JUST YOUR PROFILE PAGE

1. Go to _Settings > Profile > Custom Profile Fields_

2. Enter nothing in the "Label" field.

3. Enter something like this in the "Value" field:

`[class=coverphoto][img=https://friendica.server/photo/1649cc674810612350.png]Cover photo description alt-text here[/img][/class]`

4. Check the Permissions for the field. If for some reason you only want people in certain Circles to see your Cover Photo you can set that here.

5. Submit your changes.

People who are not using the Bookface scheme will see a thumbnail of your Cover Photo in your Profile details. The Cover Photo will only appear on your Profile page.

#### Multiple Cover Photos

Technically you can have one Cover Photo for our actual Profile page by putting it in a Custom Field and another one in the Profile Description that will be shown on the other profile pages.  But if you want to get really creative you can also have multiple images per Cover Photo.

While not really recommended you can place up to four images in the Cover Photo container and Bookface will show them as a collage of stripes.  For example:

`[class=coverphoto][img=https://friendica.server/photo/1649cc674810612350.png]Cover photo 1 description alt-text here[/img][img=https://friendica.server/photo/1649cc677034958382350.png]Cover photo 2 description alt-text here[/img][img=https://friendica.server/photo/1649c038920505603674810612350.png]Cover photo 3 description alt-text here[/img][img=https://friendica.server/photo/3464771649cc674810612350.png]Cover photo 4 description alt-text here[/img][/class]`

Extras spaces are okay, but just make sure there are no carriage returns or other elements inside `[class]..[/class]` or it will mis-count the images and size them wrong. Also keep in mind people not using Bookface will see three thumbnail images on your profile, only Bookface users will see the striped collage.


## GENERAL NOTES:

* This theme HIDES the attachment upload button in the file browser since there is no way to manage/delete uploaded files, and this is confusing to users. If you want to show this button anyway change the CSS variable `--attach-file-button` from "none" to "block" at the top of the stylesheets.
* Overrides nav_bg, nav_icon_color, background_color, background_image, and contentbg_transp
* Overrides "Frio" blue accent color with one that looks nicer with these schemes.
* This scheme is still being revised as new things to style are discovered.
* This scheme was adapted from a user stylesheet for use in browsers on the client-side.

## KNOWN ISSUES

1. Safari and SVG Masks

SVG masks appear to be terribly broken in Safari (well WebKit in general). maskContentUnits won't work properly on Mobile Safari and that causes the mask to be in the wrong position to...mask. If there is a <base> element in the HTML it can mess up references to SVG images that exist within the DOM. You have to make sure your server is actually serving up .svg files with the mimetype `"image/svg+xml"` or it won't work. Your clipPath element has to be inside a <def> element. Safari apparently wants `"xlink:href"` instead of just "href" which means you also need to namespace for `"xmlns:xlink="http://www.w3.org/1999/xlink"`

If the logo was just an inline SVG set to use the fill color that would be fine. But all the logo SVGs are for masking. There are two PNG images for masks, which DO work in Safari, but they look too blurry. So I switched it to the icon font logo. Which at least is crisp, though it is a bit heavier/thicker/bolder than the SVG version.

2. Old iOS Devices

There are numerous places in the stylesheets that use `":has()"` and older versions of Safari bundled with outdated versions of iOS do not understand it and will not display things correctly. If you have, for example, and old iPad Mini stuck on an earlier version of iOS, say 9.2.x, you may encounter random un-clickable and un-scrollable elements with any "frio" scheme. Older devices cannot display the new Cover Photo feature correctly.

4. Phones with Narrow Screens

You may notice on many (if not most) phones in portrait mode the Action Buttons do not have text labels on them. If you turn your phone to landscape mode the labels will become visible. This is on purpose!  There simply is not enough room to display the labels in a viewport narrower than 400 pixels wide, especially if ALL possible buttons are enabled and being shown. Initially I tried styling that only removed the labels if there were too many buttons. But the inconsistency made it look like the CSS was broken or something. Also some mobile browsers couldn't understand `":has()"` or `":nth-of-type/:last-of-type"` etc. The best solution across devices was to simply *not* show the labels for any of them.

## CONTRIBUTING

To make updates and maintenance easier the line numbers between the "Light" and "Dark" stylesheets have been synchronized, and the first half of the "Auto" version matches the "Light" stylesheet. This way if you change one you can more easily find the same line in the corresponding files to make the same change there, or if it is not needed for that one, add comment lines to keep the line numbers in sync.

In some places fallbacks are included to accommodate older browsers or mobile devices that do not understand more modern code. In general the target for this scheme are browsers released within the last couple of years.

Just because it looks right or works in your preferred browser or device doesn't mean it will work for everyone. Try to thoroughly *test* your edits in desktop and mobile Chromium-based, Mozilla-based, and Webkit-based browsers before submitting a pull-request.

## HOW SCHEMES WORK IN FRIO

Each "Frio" theme "scheme" consists of two files with the same name but a different extension, one is `.php` and the other is `.css` but the latter is not loaded directly as a stylesheet. These two files must be inside the `/frio/shemes/` folder, but will not be discovered by the theme unless they have a properly formatted header:

**Example .php file header:**

	/*
	 * Copyright (C) 2010-2025, the Friendica project
	 * SPDX-FileCopyrightText: 2010-2025 the Friendica project
	 *
	 * SPDX-License-Identifier: AGPL-3.0-or-later
	 *
	 * Name: Theme Name
	 * Licence: AGPL
	 * Author: Names and @handles of main contributors
	 * Overwrites: nav_bg, nav_icon_color, background_color, background_image, contentbg_transp
	 * Accented: yes
	 * Version: X.x
	 */

**Example .css file header:**

    /*
	    Name       : Theme Name
	    Version    : 1.3
        Licence    : AGPL
        Created on : 09.02.2025
        Author     : Names and @handles of main contributors
    */

TThe PHP file get read into the _/frio/style.php_ file, to get any color variables that have been set. **You cannot add new variables to your PHP file!**  The `style.php` defines these variables in an array (to which your scheme cannot add new entries). These are the ones you can set in your PHP file:

	$nav_bg
	$nav_icon_color
	$nav_icon_hover_color
	$link_color
	$link_hover_color
	$menu_background_hover_color
	$nav_icon_color
	$menu_background_hover_color
	$background_color
	$contentbg_transp
	$background_image
	$background_size_img
	$background_repeat
	$login_bg_image
	$login_bg_color
	$font_color_darker
	$font_color_lighter
	$font_color
	
Next, the `style.php` reads in the *contents* of your CSS file and concatenates it to the end of the Frio theme _/frio/css/style.css_. Then it does a simple string replace operation on the merged stylesheet contents to replace the variable names with the values set in your PHP scheme file. This is essentially variable validation and why you can't add new variables, they will neither get read in nor replaced. Finally the `style.php` generates the merged stylesheet.

If you want users to be able to pick one of the predefined "Accent Color" options your PHP file needs to include:

	require_once 'view/theme/frio/php/PHPColors/Color.php';
	$accentColor = new Color($scheme_accent);
	
If you want users to be able to aslo select a completely custom "Link Color" your PHP file needs to include:

	use Friendica\DI;
	$customColor = DI::pConfig()->get($uid, 'frio', 'link_color') ?: '';
	if ($customColor){ $customColor = new Color(''.$customColor.''); }
	
I could *only* get "Link Color" to work by explicitly casting the type to string when creating a new Color object. Then you need to conditionally check for a "Link Color" and if one is found use it, but if it is not found then fallback to using some other color (ideally the "Accent Color"):

	$link_color = ($customColor) ? '#'.$customColor->getHex() : '#'.$accentColor->getHex();
	
### Custom CSS Variables

While you cannot simply define new PHP variables for setting colors, etc., you *can* do that in your scheme stylesheet.  At the beginning simply define them in a `:root{..}` entry like so:

	--my-custom-variable-name: #hexcolor;
	
And then use it in your stylesheet like so:

	.classname {
		color: var(--my-custom-variable-name);
	}

I figured out how the "Frio" theme worked by looking at the code. I may not be 100% correct about it since I did not create the theme. If someone knows more and I'm wrong about any of this please correct this document at https://gitlab.com/randompenguin/bookface

## CHANGELOG:
* Fixed HR rule on posts [Issue #13]
* Fixed notifcation profile pics so they are round [Issue #14]
* Fixed Post and Comment background colors [Issue #15]
* Made Post and Comment background colors configurable with CSS variables.
* Fixed Post-in-Groups/Mention button alignment [Issue #16]
* Fixed double underline on Compose active tab [Issue #17]
* Fixed Accept Contact button [Issue #19]
* Fixed misaligned close button [Issue #20]

1.5 (27 Feb 2025)
* fixed browser "Share to.." button display and sizing [Issue #3]
* fixed wrong sized menu items in action button drop-downs on mobile [related to Issue #3]
* Styled content filter buttons coming from other platforms.
* Attach file button visibilty moved to CSS variable
* Profile contacts size adjust for Frio breakpoints
* Fixed Category & Folder tag-buttons [Issue #4]
* Removed text shadow from tags [Issue #5]
* Removed unused CSS variables [Issue #6]
* Comment button not styled on other people's profiles [Issue #7] 
* Hide horizontal rules for a cleaner look 
* Minor style fixes for .panel-body and .help-block
* Removed box-shadow from .wall-item-comment-wrapper
* Added `$contentbg_transp` back as "Frio" default stylesheet slipstream needs it.
* Fixed Settings > Channels panel padding and Submit button alignment
* Redesigned Calculator Add-On [Issue #8]
* Fixed Compose text formatting rollover effect [Issue #9]
* Fixed photo album thumbnail size on mobile [Issue #10]
* Fixed context of .panel-body, was only intended only for Settings page
* New Mobile Profiles [Issue #11]
* Added camera icon to user's Recent Photos because no profile photo is shown on it.
* Adjusted mobile drop-down button appearance and position
* Made ul.nav-tabs appearance consistent with secondary toolbar tabs 
* Made ul.nav-tabs turn into buttons on narrow mobile screens
* Box shadow on Compose formatting buttons removed from dark version 

1.4 (12 Feb 2025)
* Limited textarea resize fix to settings pages
* Edited authors/contributors
* Edited README for clarity
* Switched README from plaintext to markdown
* fixed file browser scroll height issue
* fixed too much padding at top of login page
* Added changelog to user styles README

1.3 (11 Feb 2025)
* Added "Auto" version that automatically detects OS light/dark color mode and applies it.
* Color and position of Admin "Save" buttons normalized to rest of settings.
* Normalized Admin "Save/Submit" buttons style and position (including all Add-Ons settings).
* Brand Text positioned and styled to match color scheme
* Advanced Content Filter add-on help table overflow fixed.
* Added "Sign-In" text to button when not signed in because a friend specifically said he couldn't figure out WHERE to sign-in/register.
* User Menu overflow-x is now hidden (who likes horizontal scrollbars?)
* Selected nav on :focus styling fixed.
* Edit Photo image no longer spills out of container on mobile.
* "Submit" photo edits button moved right.
* Fixed photo album thumbnails spilling out of page container.
* Made spacing of photo album thumbnails even.
* Profile photo in second toolbar mini-vcard rounded 
* Landscape on small screen phones hides toolbars and displays limited buttons
* Mobile mode completely revamped for modern app-like behavior
* Support for profile "Cover Photo"
* Added CSS variables to easily localize pseudo-element text labels
* Added CSS variable to separately set engagement count background color (default is still link color)
* CSS line numbers synchronized between light and dark stylesheets for easier maintenance
* Profile photos in Messages are now circular
* Event Card now has roundy buttons
* popover/hovercards borders and arrows restyled
* Tags, Mentions, and Categories buttons restyled larger but less distracting.
* Shared post now has background color of a top-level post.
* New Message button styled for Mobile
* Brand Icon switched from SVG to icon font because SVG masks are broken in Webkit browsers.
* Light and Dark versions now support custom Link Color, with error catching to prevent setting it to the same color as nav or page background.
* Event Response button positions fixed for old Safari Mobile.
* Login screen layout fixed [GitLab issue #2]
* Info screen fixed.
* Fixed overflow dropdown menu hover effect
* Fixed overflow dropdown menu active styling
* "Compose" button on Personal Notes page changed to "New Note"
* Added lock icon to "Personal Notes" header to make it clear they are not public.


1.2 (25 Jan 2025)
* "Save" buttons for "Remote Servers" settings normalized to right.
* "Close" button and open "Compose" button restyled, "Close" enlarged for better touch target.
* Open Compose Page button styled to match roundy buttons.
* "Save Search" buttons styles to match "Compose" and "Mention" buttons.
* Dark version Settings container background color fixed.
* Comment Box background fixed.
* Compose/Comment text style buttons enlarged for better touch targets, styled to match on Compose Modal, Compose Page, and Comment below post.
* Aside Selected Menu item now adopts color scheme.
* All Modal File browsers now styled the same.
* IFRAME container positioned and styled (usually used for embedded video)
* Fixed "Like/Dislike" on photos showing label twice.
* TopBar Second vcard short photo made round.

1.1 (21 Jan 2025)
* Fixes long lists of tags/mentions spilling out of post or profile container, forces them to wrap to multiple rows as necessary.
* Adds spacing to left of multiple settings buttons floated to right.

1.0 (20 Jan 2025)
* Initial release of server-side version
* Accent colors now work (server-side version only)
* Compose Title border radius normalized to rest of inputs.
* Top Bar buttons fixed for small mobile screens.
* Delegate "Save" settings button normalized to right side.
* Form input background colors normalized.

0.4 (18 Jan 2025)
* Adds "superscript" engagement numbers to mobile Action Buttons.
* Settings "Submit" buttons normalized to right-hand placement.
* "Mention" button and "Compose" buttons sizing normalized.
* Compose Modal/Page and Reply now styled.
* File Attachment Button hidden in Compose File Browser.
* Adjustment to Event RSVP buttons for both desktop and mobile.
* Styling and adjustment to Profile Extra links.
* Changed Network Links from "Link:" text to buttons style with chevron.

0.3 (16 Jan 2025)
* Light and Dark mode user stylesheets.
* Light version first adapted to theme template/scheme for server-side.
* Added "superscript" engagement numbers to desktop Action Buttons

0.2 (13 Jan 2025)
* Added labels to Action Buttons.

0.1 (12 Jan 2025)
* Based on original bookface.css user stylesheet (light mode only)

---

Contributors:
Pygoscelis Papua @randompenguin@friendica.world
feb @feb@loma.ml
Phil @phil@loma.ml

License: AGPL 3.0 or Later


