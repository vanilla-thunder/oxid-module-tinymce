<?php

/**
 * bestlife AG - TinyMCE for OXID eShop
 * Copyright (C) 2015  bestlife AG
 * info:  oxid@bestlife.ag
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

$sLangName = 'English';
$aLang = array(
    'charset'                               => 'UTF-8',
    'SHOP_MODULE_GROUP_tinyMceMain'         => '<style type="text/css">.groupExp a.rc b {font-size: medium; color: #ff3600; }.groupExp dt input.txt { width: 430px !important} .groupExp dl { display: block !important; } input.confinput {position: fixed; top: 20px; right: 70px; background: #008B2D; padding: 10px 25px; color: white; border: 1px solid black; cursor:pointer; font-size: 125%; } input.confinput:hover {outline: 3px solid #ff3600;} .groupExp dt textarea.txtfield {width: 430px; height: 150px;}</style>general module settings',
    'SHOP_MODULE_aTinyMCE_classes'          => '<b style="font-size:125%;">list of backend classes, TinyMCE will be active for:</b><ul><li>article_main (product description)</li><li>content_main (CMS pages)</li><li>category_text (category description)</li><li>newsletter_main (newsletter)</li><li>news_text (news text)</li></ul>',
    'SHOP_MODULE_aTinyMCE_plaincms'         => '<b style="font-size:125%;">Idents of CMS pages TinyMCE will be excluded for</b> (e.g. plain Emails)',
    'SHOP_MODULE_sTinyMCE_height'           => '<b style="font-size:125%;">editor height in px</b> (without units)',
    
    'SHOP_MODULE_GROUP_tinyMceSettings'     => 'TinyMCE settings &amp; plugins',
    'SHOP_MODULE_aTinyMCE_buttons'          => '<b style="font-size:125%;">default toolbar controls <a href="http://www.tinymce.com/wiki.php/Controls" target="_blank">(?)</a></b><br/>'.
                                                '<b style="color:#ff3600;">it concerns core buttons only!</b> The other buttons depend on active plugins and will be loaded automaticaly.<br/>default value:<br/>'.
                                                "<textarea rows='7' cols='30'>undo redo\nbold italic underline strikethrough\nalignleft aligncenter alignright alignjustify\nbullist numlist\noutdent indent\nblockquote\nremoveformat\nsubscript\nsuperscript\nformatselect\nfontselect\nfontsizeselect</textarea>",
    'SHOP_MODULE_aTinyMCE_plugins_override' => '<b style="font-size:125%;">disable TinyMCE core plugins</b><br/>enter one plugin per row,<br/>e.g. type "emoticons" to deactivate the emoticons plugin',
    'SHOP_MODULE_aTinyMCE_external_plugins' => '<b style="font-size:125%;">external plugins <a href="http://www.tinymce.com/wiki.php/Configuration:external_plugins" target="_blank">(?)</a></b><br/>format:<br/>pluginname => path/to/the/file.js',
    'SHOP_MODULE_sTinyMCE_custom_controls'  => '<b style="font-size:125%;">additional toolbar controls</b> e.g. for external plugins',
    'SHOP_MODULE_aTinyMCE_custom_config'    => '<b style="font-size:125%;">custom configuration params <a href="http://www.tinymce.com/wiki.php/Configuration" target="_blank">(?)</a></b><br/>e.g. for external plugins or for overriding default config<br/><b>parameter => "value"</b> (with quotes if required!)',
    
    'hdi_tinymce_plaincms'                  => '<b class="errorbox">TinyMCE was deactivated from this page because it may not contain HTML code</b>'

);