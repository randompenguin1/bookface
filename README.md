BOOKFACE FOR FRIENDICA
======================
Version 2.2.0-rc

**Requirements** Friendica "Blutwurz" **2026.08-rc ONLY**

**Keep in mind the Release Candidate is still in flux with frequent and  possibly breaking changes!**

**Description:** A Friendica Theme Template/Scheme for the "Frio" theme that gives it a modern makeover.

**Disclaimer:** _This is a Work-In-Progress, use in production at your own risk! This will NOT work with **ANY** previous version of Friendica!_

## INSTALLATION

1. Drop these files in _/friendica/view/theme/frio/scheme/_: 
	* bookface_auto.css
	* bookface_auto.php
	* bookface_dark.css
	* bookface_dark.php
	* bookface_light.css
	* bookface_light.php
	* bookface_legacy.css
	* bookface_legacy.php

And the **bookface_assets** folder. _This is new, no previous Bookface release had this folder._

You do _not_ need to copy the _/src_ folder unless you are working on changes to the stylesheets.

2. Go to _Settings > Display > Theme Customization > Appearance_
    1. Select either "Bookface Light", "Bookface Dark", "Bookface Auto", or "Bookface Auto Legacy"
    2. (optional) Select Accent Color
    3. click "Submit" button.

### COVER PHOTOS

> There is a "Coverphoto" Add-on for Friendica which is much better than the work-around built into Bookface! It allows you to set cover photos on your profile that _everyone_ can see no matter what theme they are using AND they can be seen on other platforms. You can get the add-on here: https://gitlab.com/randompenguin/coverphoto

From Bookface 1.3 it supports adding a "Cover Photo" to profiles. There are two places you can add the Cover Photo, depending on whether you want it used on all of your profile section pages or if you want it to appear on ONLY your actual profile page.

Note that this feature ONLY works is recent, modern browsers!  Every *current* and *supported* desktop and mobile version should be able to show it. **However it will ONLY be visible to other Friendica contacts also using the Bookface scheme**

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

### POSTBOXES

Starting with Bookface version 1.6 now Friendica will have Postboxes too! Styling similar to the Facebook solid color and gradient backgrounds have been added to the Bookface stylesheets.

When a Postbox post is shared to another platform like Mastodon, Sharkey, Disapora, Hubzilla, etc., the Postbox styling does not go with it. The same is true for anyone viewing the post in a third-party app, because none of them support Postbox styling, at least not yet.

> There are two Friendica add-ons server administrators can install to add global support for Postbox styling. The "[Postbox](https://gitlab.com/randompenguin/postbox)" add-on simply adds a stylesheet to the `<head>` element. It provides no interface for creating Postboxes, but users can still create them manually with BBcode. The other is the "[Zen Postbox](https://gitlab.com/randompenguin/zen_postbox)" add-on which not only adds the stylesheet to the `<head>` it also adds a Jot Plugin button to the message composer with a menu of all the available Postbox styles.

**Right now Postbox is exclusively available for people using the Bookface scheme in the Friendica webapp, either on desktop or mobile, or if the Friendica server has either the _Postbox_ or _Zen Postbox_ add-on installed and activated.**

#### How to Use Postboxes

To make use of a Friendica Postbox simply wrap the text inside a Postbox Class BBcode like this:

`[class=postbox-red]This is the wrapped text[/class]`

Bookface implements the Solid, Gradient, and Pattern backgrounds but **not the Animated backgrounds**.

For details and examples of what postbox styles are available and what elements can be placed inside them please refer to the [Bookface Wiki](https://gitlab.com/randompenguin/bookface/-/wikis/For-Friendica-Users#postboxes).

## GENERAL NOTES:

* This theme cand HIDE the attachment upload button in the file browser. There is no way to manage/delete uploaded files, and this is confusing to users. To hide the file button set `--attach-file-button` to "none" in the `:root{}` section of the stylesheets.
* Overrides nav_bg, nav_icon_color, background_color, background_image, and contentbg_transp
* Overrides "Frio" blue accent color with one that looks nicer with these schemes.
* This scheme is still being revised as new things to style are discovered.
* This scheme was adapted from a user stylesheet for use in browsers on the client-side.

## CUSTOMIZING BOOKFACE

Bookface makes extensive use of CSS variables. They are declared at the top of the stylesheets in the `:root{}` section. If you are a server administrator who wants to customize them for your server you can edit the variables there OR you can add your own `<style>:root{...}</style>` to the `view/theme/Frio/templates/footer.tpl` file with just the CSS variables you wish to override.

> There is also an optional **Bookface Custom** add-on for Friendica that allows users to easily make their own customizations. You can download the add-on at https://gitlab.com/randompenguin/bookface_custom

## KNOWN ISSUES

1. Safari and SVG Masks

SVG masks appear to be terribly broken in Safari (well WebKit in general). maskContentUnits won't work properly on Mobile Safari and that causes the mask to be in the wrong position to...mask. If there is a <base> element in the HTML it can mess up references to SVG images that exist within the DOM. You have to make sure your server is actually serving up .svg files with the mimetype `"image/svg+xml"` or it won't work. Your clipPath element has to be inside a <def> element. Safari apparently wants `"xlink:href"` instead of just "href" which means you also need to namespace for `"xmlns:xlink="http://www.w3.org/1999/xlink"`

If the logo was just an inline SVG set to use the fill color that would be fine. But all the logo SVGs are for masking. There are two PNG images for masks, which DO work in Safari, but they look too blurry. So I switched it to the icon font logo. Which at least is crisp, though it is a bit heavier/thicker/bolder than the SVG version.

2. Old iOS Devices

There are numerous places in the stylesheets that use `":has()"` and older versions of Safari bundled with outdated versions of iOS do not understand it and will not display things correctly. If you have, for example, and old iPad Mini stuck on an earlier version of iOS, say 9.2.x, you may encounter random un-clickable and un-scrollable elements with any "frio" scheme. Older devices cannot display the new Cover Photo feature correctly.

4. Phones with Narrow Screens

You may notice on many (if not most) phones in portrait mode the Action Buttons do not have text labels on them. If you turn your phone to landscape mode the labels will become visible. This is on purpose!  There simply is not enough room to display the labels in a viewport narrower than 400 pixels wide, especially if ALL possible buttons are enabled and being shown. Initially I tried styling that only removed the labels if there were too many buttons. But the inconsistency made it look like the CSS was broken or something. Also some mobile browsers couldn't understand `":has()"` or `":nth-of-type/:last-of-type"` etc. The best solution across devices was to simply *not* show the labels for any of them.

5. Bookface now makes use of the CSS `light-dark()` values. Older browsers do not understand it and will have to use the "Bookface Auto Legacy" option which still uses the older `prefer-light-color` and `prefers-dark-color` selectors.


## CONTRIBUTING

As of Bookface version 2.1.7 the stylesheets have been modularized and are compiled before use. Ideally this should be done by a CSS preprocessor like SASS or LESS that supports `@import` or `@use`. But Friendica does not actually use a CSS preprocessor. Despite the main `style.pcss` file it is not _actually_ generated by the PCSS/PostCSS preprocessor. Friendica simply gets the file contents of the _/css/style.php_ and whichever scheme stylesheet the user selected and it concatenates the two files together and does a simple string replace for the PHP color variables before generating a file with a `.pcss` extension (that's actually done by `getStylesheeetPath()` in _/src/Core/Theme.php_). However it never loads like a normal stylesheet so you can't use `@import` (and even if Friendica was actually using the PCSS/PostCSS preprocessor it doesn't support `@import` without a plugin anyway). SO we can only use precompiled scheme stylesheets as there is no way to import the individual stylesheet modules and have Friendica compile them with the main theme stylesheet.

1. Install the Bookface scheme stylesheets and assets folder into your Friendica development environment.

2. Copy the Bookface _/src_ folder to somewhere you can execute a Bash script. It should work in Linux, macOS, and Windows WSL.

3. Make changes in the compiled stylesheets to test them.

4. Once you are sure they work make those same changes in the _/src/core.css_ file (or whichever is the relevant stylesheet module). Don't forget to advance the version number in the "head" modules and in the `css_variables.css` module.

5. Open a terminal and run the `make.sh` Bash script. **The first time you use it you will have to change file permissions to make it executable.**

6. That will concatenate the stylesheet modules into the compiled stylesheets inside a _/dist_ subfolder.

7. Copy the compiled stylesheets into your _/schemes_ folder, overwriting the existing Bookface stylesheets.

8. TEST again that everything is working correctly.

9. Submit a Pull Request at the [GitLab Project Page](https://gitlab.com/randompenguin/bookface).  It is okay to submit your generated stylesheets as complete file replacements in your PR. They _should_ be correct if you used the `make.sh` script.

Note that now all the base bookface PHP scheme files import the same module at _/bookface_assets/bookface_main.php_ which contains all the PHP color variables and logic. _Except_ for the `bookface_legacy.php` which does not use that file include.


## CHANGELOG:
2.2.0-rc (25 August 2026)
* Fixed Moderation table hover colors
* Fixed Moderation table button link colors.
* Fixed Moderation blocked entry font color in dark mode.
* Updated screenshots to reflect contrast color change.

2.1.9-rc
* Fixed missing `--contrast-color` in about 20 places.

2.1.8-rc (23 August 2026)
* Added `contrast-color` code for buttons that have accent color background with multiple fallbacks
* Added better handling of accent color for dark mode to make sure colors are not _too_ dark.
* Fixed display errors on login screen when bookface is set to site default.

2.1.7-rc (21 August 2026)
* A nearly complete rewrite from the ground-up after all the Friendica refactoring.
* Added `bookface_assets` sub-folder.
* Added new screenshots.
* Removed `res` subfolder.
* Added 'src' subfolder.

2.1.6 (18 August 2026)
* Fixed Notifications being too narrow.
* Merged Link Preview styling [PR 28  @leanderl]

2.1.5 (31 July 2026)
* Fixed too short Notifications drop-down menu [Issue #49]
* Fixed Action Button spacing [Issue #50]
* Fit search text autocomplete suggestion list on screen.
* Fix for XMPP Add-on elements in mobile UI [Issue #51]
* Fix for [Issue #52] where in Admin Theme Settings for Frio, if Bookface scheme was selected the IFRAME would increase in height infinitely.
* Restyle "Register additional accounts" link (and other a.btn.btn-default) as button.
* Fix for nav pills drop menu rollover background color.
* Added styling for the future Pages widget.
* Fixed misaligned compose buttons in 2026.05 [Issue #53]
* Fixed misplaced collapsed arrow on Trending Tags Widget in 2026.05 [Issue #54]
* Fixed main nav selected double underscore in 2026.05 [Issue #55] 
* Fixed Comment Compose button styling changes in 2026 versions [Issue #56]
* Fixed Submit Button in Search Field styling change [Issue #57]
* Fixed Contact action link styling change in 2026 [Issue #58]
* Fixed misaligned mobile nav buttons with labels [Issue #59]

2.0.0 (08 February 2026)
* Fixed alignment and z-index of Sidebar and Search buttons for narrow screens
* Moved User Menu and Notifications Menu to the far right on Desktop Layout
* Changed Username so it is always shown when User Menu is open
* Fixed alignment and spacing of Page Navigation buttons
* Fixed Notifications label alignment [Issue #41]
* Fixed Widget Folding Indicator [Issue #42]
* Fixed long nav items cut off in submenus [Issue #43]
* Fixed Alignment of Event Action Buttons [Issue #44]
* Fixed Search Box so it expands on focus [Issue #45]
* Remove user nav icons from 2026.01 version and RC hack from 2024.12 [Issue #46]
* Fixed lines in auto version that are supposed to be uncommented.
* Updated Light and Dark screenshots
* Fix for [Issue #47]

1.9.0 (10 Dec 2025)
* Added sidebar widget icons (contributed by Matthias feb@loma.ml)
* Fix for [Issue #37] and [Issue #38] that does not conflict with the two ways images may be embedded.
* Border radius on "change profile photo" link to match border radius of profile photo.
* Fixed drop-down menus becoming partly inaccessible if post is near bottom of screen [Issue #39]

1.8.5 (16 Oct 2025)
* Fixed Navbar Labels not applying Notices variable [Issue #33]
* Fixed misaligned "View Group" button on Group profile page.
* Fixed text space on profile extra buttons [Issue #34]
* Added commented background-image line to light and dark, which needs to be uncommented after concatenating files to build auto version.
* Enabled the hidden Composer and "New Post" button on the Community pages and new text explaining posts there need to be public.
* Override styling for contact-wrapper
* Override styling for file browser category button text.
* Over 50 fixes specifically for Friendica 2025.07-rc Release Candidate 

1.8 (12 July 2025)
* Fixed transparent background on friends-in-common list on other people's profiles.
* All stylesheets now have lighter font color variable.
* Added customization for drop-shadows and outer glows.
* Button rollover effects now consistent for different types of buttons.
* Added customization of color for rollover effect.
* Added customization to show/hide bootstrap tooltips.
* Added customization to show/hide main navigation buttons labels and customize each label (Note: navbar labels do not work on tablets in portrait mode, there isn't room for all of them, they do work for phones in portrait because there are fewer buttons shown).
* Added customization to change Calendar "Today" icon to text label and customize the label.
* Body now has a default font color.
* Button-link and anchor-button now adopt link color
* Muted text now uses lighter font color.
* Nav Tabs no longer have a border color (but nav tabs list items do)
* Nav Tab link colors are now consistent.
* Drop-down menus now all adopt same drop-shadow/outer-glow
* Drop-down menus now have a max-width. Any overflow text is truncated. This prevents menu from growing so wide it spills off the screen of mobile devices.
* Forms now use color variables.
* User Menus now have icons for the first few items (this has been added to the 2025 Release Candidate, but Bookface brings it to Friendica 2024.12 as well).
* Jot/Compose modal tabs appearance now consistent with second topbar tabs.
* General containers now use box-shadow instead of border for outline.
* Common Contacts photos are now round.
* Light Mode admin page submit buttons styling typo fixed.
* Profile extra links buttons restyled (were limited to 50% width of aside, text sometimes didn't fit, made those consistent width and stacked).
* Popover Hovercard styling now consistent between Light and Dark modes
* Thread font color hover effect fixed.
* Position of "More" drop-down menu on Event posts with engagement fixed.
* Modal "Close" button rollover effect fixed.
* Fixed typo in styling for #profile-jot-wrapper
* Verified checkmark on Profile URL restyled.
* Responses restyled to only show counts and reveal popover list of who responded on mouseover/touch.
* Tag Cloud colors now set by CSS variables.
* Message Preview media list now styled.
* Action Button Labels now adopt global font family variable.
* Fixed Auto selected menu color in light mode

1.7 (06 May 2025)
* Fixed "New Message" button not being obvious [Issue #24]
* Fixed Profile Pics and Cover Photos not working in old iOS browsers [Issue #26]
* Moved Postbox styles to end of stylesheet 
* Minified Postbox CSS 
* Updated with Postbox v1.1 styles
* Styled Item Responses (part of Issue #25)
* Action buttons (except Comment and Quote) you've interacted with before now adopt accent color [Issue #25]
* Fix for disabled Action Buttons 
* Fixed breaking typo
* Fix(?) for slow-loading secondary toolbar in Safari 

1.6 (25 Mar 2025)
* Fixed HR rule on posts [Issue #13]
* Fixed notifcation profile pics so they are round [Issue #14]
* Fixed Post and Comment background colors [Issue #15]
* Made Post and Comment background colors configurable with CSS variables.
* Fixed Post-in-Groups/Mention button alignment [Issue #16]
* Fixed double underline on Compose active tab [Issue #17]
* Fixed Accept Contact button [Issue #19]
* Fixed misaligned close button [Issue #20]
* Cleanup of Compose mobile drop-down menu and button.
* Fixed misalignment of Cancel/Submit buttons on contact request [Issue #22]
* Additional fix for "Post in Group" button label spacing [Issue #16]
* Made Delegation/Account-Switch Profile Photos round.
* Styled profile account type box.
* Fixed mobile spacing issue on Contacts and Scheduled Posts pages 
* Fixed "More..." drop menu rollover text color for Dark Mode 
* Fixed little vcard text color 
* Fixed hovercard width wider than narrow screen.
* Added support for new Postbox feature.
* Jot Plugins tollbar alignment fixes.
* Fix for post status overlapping network link/icon [Issue #23]

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



