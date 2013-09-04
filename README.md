# TinyMCE 4.0.5 for OXID eShop CE  4.7+
## module version 1.1.3 from 2013-09-04
TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control released as Open Source under LGPL.  
More information here: http://www.tinymce.com/  
and here: https://github.com/tinymce

### module version 1.1.2 changelog:
* new editor languages: cs, fr, da, nl, ru, it
* feature: exclude TinyMCE from plain cms pages
### module version 1.1.2 changelog:
* updated to TinyMCE version 4.0.5
* edit lang fixed
* smaller button style
### module version 1.1.1 changelog:
* updated to TinyMCE version 4.0.2
* fixed size of the code popup
### module version 1.1.0 changelog:
* updated to TinyMCE version 4.0.1


## INSTALLATION
### upload over ftp / sft / ssh:
copy the content of the "copy_this" folder into the shop root directory  
**if you are uploading files via ftp, set transfer mode to binary mode**
### ssh console + git client
naviagte to the modules directory in your shop and create the "hdi" folder if you don't have it yet:
<pre>
mkdir hdi
cd hdi
wget https://raw.github.com/vanilla-thunder/hdi-tinymce/master/copy_this/modules/hdi/vendormetadata.php
</pre>
isinde the "hdi" directory:
<pre>
git clone -b module https://github.com/vanilla-thunder/hdi-tinymce.git
</pre>



## LICENSE AGREEMENT 
   HDI TinyMCE  
   Copyright (C) 2012-2013  HEINER DIRECT GmbH & Co. KG  
   info:  oxid@heiner-direct.com  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 
<img src="https://ma-be.info/piwik/piwik.php?idsite=2&rec=1&action_name=hdi_tinymce" style="border:0" alt="" />
