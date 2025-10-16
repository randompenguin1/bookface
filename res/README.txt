CREATING BOOKFACE AUTO STYLESHEET
==================================

1. first edit bookface_light.css and bookface_dark.css.
2. open a terminal at the /view/theme/frio/scheme folder.
3. Use the following command:

cat bookface_light.css res/auto_middle.css bookface_dark.css res/auto_end.css > bookface_auto.css

4. Lightly edit the bookface_auto.css file:
4a. Change the name at the top from "Bookface Light" to "Bookface Auto"
4b. Delete the section from "/* LOGIN AND INFO SCREENS */ to the "USER PREFERS DARK MODE" opening comment line.
4c. In the USER PREFERS DARK MODE section delete the lines between the end of the first :root{...} and "body {"
4d. Scroll down and you will see two duplicated /* LOGIN AND INFO SCREENS */ sections. Delete the first one, being careful not to also delete the closing "}" for the end of the Dark Mode selector.
4d. Search for "fc-unthemed" and uncomment the "background-image" line.

5. Save the file.

Technically, even if you didn't delete the extra /* LOGIN AND INFO SCREENS */ to /* Post Background */ lines the file would still work. There's just no reason for it to be longer than it needs to be.