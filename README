Summary

The fjmtheme theme is a D6 Zen sub-theme that relies on the core components of Zen 2.x - http://drupal.org/project/zen

 * *Zen 2.x* is required to be in the themes directory along with your cairntheme sub theme

The cairntheme directory  in your theme folder is a sub-theme of Zen. This folder is actually the main template for all of the current cairntheme websites. The main template is basically all of the core style similarities of all of the sites, such as fixed width, margins, padding, sizes, etc. 

 * stylesheet breakdowns for the core template are here:  - http://drupal.org/node/1069786

Each of the websites then has it's own sub-sub-theme of the cairntheme, stored in the cairntheme folder by site name. The sub-sub-themes contain basic overrides such as color changes, header changes, etc. These sub-sub-themes are the only themes that should be modified for per site styling, if you modify the core template, all sites will be affected. 
 
 * Theme bugs, or overall feature additions should be addressed in the core theme. 

h3. Basic theme directory structure: 

 * sites/all/themes/
 ** zen (this is zen 2.x - required, should never be modified)
 ** FJM (sub-theme core template)

Most of the changes you would need to make can be handled via css, the css files you would use for specific site overrides are simply in the css folder.

example:  

 * FJM/css/*.css

More involved changes would be handled in the core template's templates/page.tpl.php (region locations & page structure) and preprocessor functions and hooks, etc would go in template.php


h2. Detailed Notes

Here are the breakdown of the theme files in detail: 

 * *FJM/* - core template folder, considered a sub-theme to drupal
 ** *fjmtheme.info* - This defines regions, defines the core theme (zen), specifies js files and sets theme settings
 ** *template.php* - preprocessor functions and hooks would go here, if a sub-sub-theme does not have a template.php, it falls back to this one
 ** *theme-settings.php* - not used, as this is part of the core template but must be present
 ** *logo.png* - default logo - not used, as this is part of the core template but must be present
 ** *favicon.ico* - default favicon - not used, as this is part of the core template but must be present
 ** *screenshot.png* - screenshot on themes page for template (not important, but must be present)
 ** *README* - readme file for the theme
 ** *js/* - this folder houses any javascript the theme may be calling
 ** *images/* - this houses core template images, if a sub-sub-theme does not call an image, the theme falls back to these in the core template
 ** *images-source* - this houses the source psd's that are used to create the header, search bar & nav bar
 ** *css/* - all of the core css files are here
 ** *templates/* - content-type, view, block, page, node, etc template override location, if a sub-sub-theme does not have template files in it's own templates dir, it falls back to this folder
 ** *starterkit/* - this is the kit used to create new sub-sub-themes
 ** *cairnroblib/* - sub-sub-theme

h3. breakdown of files in a sub-sub-theme

 * *themename/* - this is the theme name, it should correspond with the name of your sub-sub-theme's .info file
 ** *logo.png* - this is the logo for the sub-sub-theme
 ** *screenshot.jpg* - this is the screenshot that appears when picking your theme in theme-settings
 ** *template.php* - custom functions can be added here that will work only for the sub-sub-theme, the sub-sub-theme will read this file first, then fall back to the core theme's template.php
 ** *theme-settings* - you can further add features for your theme-settings page here
 ** *css/* - contains 1 css file themename.css, this is for overrides of the core template to customize your sub-sub-theme
 ** *images/* - put images here that you reference from your themename.css
 ** *js/* - if you wish to add javascript to a specific sub-sub-theme, drop it here and initialize it in your themename.info
 ** *templates/* - template overrides get added here, if you are overriding a core drupal feature, then first copy the .tpl.php from the zen templates folder (example node.tpl.php) then add it to your sub-theme (core) or sub-sub-theme templates folder.. You can then directly modify it, or copy it and make a new one to further isolate the thing you want to modify (example node-content_type_name.tpl.php)


h2. Reference docs

Zen Documentation
http://drupal.org/node/193318
