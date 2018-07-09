TinyMCE Editor for OXID eShop CE v6.x
======================================

by Marat Bedoev, bestlife AG <oxid@bestlife.ag>  
https://github.com/vanilla-thunder/bla-tinymce

### module version 2.2.0 ( 2018-07-09 )

TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control released as Open Source under LGPL.
More information here: http://www.tinymce.com/  
and here: https://github.com/tinymce


## Installation

Only for OXID eShop v6.x

    composer require vanilla-thunder/bla-tinymce

### changelog
- **2018-07-09 :: version 2.2.0**
   - Portiert to OXID eSale v6.x
- **2017-10-02 :: version 2.1.1**
   - rollback to TinyMCE 4.6.6, because of issues with filemanager
- **2017-09-25 :: version 2.1.0**
   - TinyMCE 4.6.7
   - increased maximum image size for upload via filemanager 
- **2017-06-20 :: version 2.0.3**
   - TinyMCE 4.6.4
- **2017-01-11 :: version 2.0.2**
   - TinyMCE 4.5.2
   - fullscreen editing plugin 
- **2016-09-07 :: version 2.0.1**
   - TinyMCE 4.4.3
   - link url conversion fixed. TinyMCE accepts smarty tags/variables as URL wirhout convertig them to absolute URL.
- **2016-09-07 :: version 2.0.0**
   - TinyMCE 4.4.1
   - eingebauter Filemanager "Roxy Fileman"
- **2015-07-29 :: version 1.5.0**
   - TinyMCE 4.2.2
- **2015-05-06 :: version 1.4.0**
   - TinyMCE 4.1.10
   - fix: data-mce attributes removed from html output
- **2014-09-04 :: version 1.3.1**
   - TinyMCE v4.1.4
   - fix: fullpage Plugin für Newsletter hinzugefügt
- **2014-08-20 :: version 1.3.0**
   - TinyMCE v4.1.3
   - feature: Support für eigene Text-Felder hinzugefügt
- **2014-04-23 :: version 1.2.2**
   - TinyMCE 4.0.10
   - fix: iframes werden nicht mehr ersetzt

### LICENSE AGREEMENT
   bla-tinymce  
   Copyright (C) 2017 bestlife AG  
   info:  oxid@bestlife.ag  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
