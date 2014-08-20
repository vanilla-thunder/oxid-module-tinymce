## [bla] TinyMCE for OXID eShop 4.7 & 4.8
#### raw module branch, also contains development files

### installation
* navigate into modules/ directory of your shop
* mkdir bla & cd bla
* echo "<?php \$sVendorMetadataVersion = '1.0';" > vendormetadata.php
* git clone -b module https://github.com/vanilla-thunder/bla-tinymce.git


### development / updating (node.js required)
* nagivate into bla-tinymce/ directory
* npm install
* "node update.js" will update tinymce and language files
* "node update.js version x.y" will get new update.jpg for version x.y