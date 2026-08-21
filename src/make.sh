#! /bin/bash
# Make Bookface Stylesheets
# This script will concatenate the stylesheet pieces into
# the actual scheme stylesheets used by Friendica
# =================================================

this_dir="$PWD"

if [ ! -w $this_dir ]
	then
		echo $this_dir is not writable
		return
	else
		echo $this_dir is writable
fi

if [ ! -d "dist" ]
	then
		mkdir "dist"
		echo $this_dir/dist directory created
	else
		echo $this_dir/dist directory already exists
fi

if [ ! -w "$this_dir/dist" ]
	then
		echo $this_dir/dist is not writable
		return
	else
		echo $this_dir/dist is writable
fi

echo concatenating stylesheets...

cat light_head.css css_variables.css core.css end.css postbox_support.css > dist/bookface_light.css
cat dark_head.css css_variables.css core.css end.css postbox_support.css > dist/bookface_dark.css
cat auto_head.css css_variables.css core.css end.css postbox_support.css > dist/bookface_auto.css
cat legacy_head.css core.css legacy_middle.css core.css legacy_end.css end.css postbox_support.css > dist/bookface_legacy.css

if [ -e "$this_dir/dist/bookface_light.css" ]
	then
		echo bookface_light.css successfully created
	else
		echo bookface_light.css was NOT created!
		return
fi 
if [ -e "$this_dir/dist/bookface_dark.css" ]
	then
		echo bookface_dark.css successfully created
	else
		echo bookface_dark.css was NOT created!
		return
fi 
if [ -e "$this_dir/dist/bookface_auto.css" ]
	then
		echo bookface_auto.css successfully created
	else
		echo bookface_auto.css was NOT created!
		return
fi 	
if [ -e "$this_dir/dist/bookface_legacy.css" ]
	then
		echo bookface_legacy.css successfully created
	else
		echo bookface_legacy.css was NOT created!
		return
fi 	

echo DONE! The Bookface stylesheets are in folder at: $this_dir/dist.
