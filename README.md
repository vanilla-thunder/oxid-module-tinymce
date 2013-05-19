# TinyMCE 3.5.8 for OXID eShop CE  4.6+
TinyMCE is a platform independent web based Javascript HTML WYSIWYG editor control released as Open Source under LGPL.
More information here: http://www.tinymce.com/
and here: https://github.com/tinymce

## module version 1.0.2 from 2012-12-20
### changelog  
* bugfix: changed text haven't been saved without toggling editor

## INSTALLATION
### upload over ftp/ssh:
copy the content of the "copy_this" folder into the shop root directory  
**if you are uploading files via ftp, switch to the binary transfer mode**  
### ssh shell + git client:
navigate into the modules directory and create a "hdi" directory with a "vendormetadata.php" file inside it (can be empty yet)  
clone remote git repo and switch to the "module" branch.  
this commands works for debian and centos:
<pre>mkdir hdi
cd hdi/
wget https://raw.github.com/vanilla-thunder/hdi-tinymce/master/copy_this/modules/hdi/vendormetadata.php
git clone -b module git://github.com/vanilla-thunder/hdi-tinymce.git
</pre>


## LICENSE AGREEMENT 
   HDI TinyMCE
   Copyright (C) 2012  HEINER DIRECT GmbH & Co. KG  
   info:  info@heiner-direct.com  
  
   This program is free software;  
   you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
   either version 3 of the License, or (at your option) any later version.
  
   This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;  
   without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
   You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 
<img src="https://ma-be.info/piwik/piwik.php?idsite=2&amp;rec=1&mp;action_name=hdi_tinymce" style="border:0" alt="" />
