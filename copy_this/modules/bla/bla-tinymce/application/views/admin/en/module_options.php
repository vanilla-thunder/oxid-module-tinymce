<?php

/*
 * TinyMCE Editor for OXID eShop CE
 * Copyright (C) 2017  bestlife AG
 * info:  oxid@bestlife.ag
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 *
 * Marat Bedoev
 */

$sLangName = 'English';
$aLang = array(
   'charset'                                => 'UTF-8',
   'BLA_TINYMCE_TOGGLE'                     => 'toggle TinyMCE',
   'BLA_TINYMCE_PLAINCMS'                   => '<b class="errorbox">TinyMCE was disabled for this page because it may not contain HTML code</b>',
   'SHOP_MODULE_GROUP_tinyMceMain'          => '<style type="text/css">.groupExp a.rc b {font-size:medium;color:#ff3600;}.groupExp dt input.txt {width:430px !important} .groupExp dl {display:block !important;} input.confinput {position:fixed;top:20px;right:70px;background:#008B2D;padding:10px 25px;color:white;border:1px solid black;cursor:pointer; font-size: 125%; } input.confinput:hover {outline: 3px solid #ff3600;} .groupExp dt textarea.txtfield {width: 430px; height: 150px;}</style>module settings',
   'SHOP_MODULE_blTinyMCE_filemanager'      => 'enable filemanager',
   'HELP_SHOP_MODULE_blTinyMCE_filemanager' => 'When enabled, you can upload pictures into this directory: out/pictures/wysiwigpro/',
   'SHOP_MODULE_aTinyMCE_classes'           => '<h3>Enable TinyMCE for following backend pages:</h3><ul><li>article_main (product details)</li><li>content_main (CMS pages)</li><li>category_text (category description)</li><li>newsletter_main (newsletter)</li><li>news_text (news text)</li></ul>',
   'HELP_SHOP_MODULE_aTinyMCE_classes'      => 'if you want to use TinyMCE for your custom views/controllers, you need to enter their class names here.',
   'SHOP_MODULE_aTinyMCE_plaincms'          => '<h3>Plain Text CMS pages</h3>TinyMCE will not be loaded for these cms pages. e.g: Plain text Emails, Email subjects, etc.',
   'HELP_SHOP_MODULE_aTinyMCE_plaincms'     => 'some cms pages may not contain HTML tags, because the are used as plain text emails. email subjects or SEO description',
   'SHOP_MODULE_aTinyMCE_extjs'             => '<h3>external JS dependencies</h3> (e.g. for plugins)',
   'HELP_SHOP_MODULE_aTinyMCE_extjs'        => 'full URL with http:// or https:// if your shop runs with HTTPS.',
   'SHOP_MODULE_GROUP_tinyMceSettings'      => 'TinyMCE Settings &amp; Plugins',
   'SHOP_MODULE_aTinyMCE_config'            => '<h3>custom TinyMCE configuration <a href="https://www.tinymce.com/docs/configure/" target="_blank" title="more info">(?)</a></h3>here you can add custom config params for external plugins or overwrite default params<br/><b>param => "value"</b> (with quotes, if required!)',
   'SHOP_MODULE_aTinyMCE_plugins'           => '<h3>enable/overwrite TinyMCE Plugins <a href="https://www.tinymce.com/docs/configure/integration-and-setup/#plugins" target="_blank">(?)</a></h3><b>add plugin:</b>&nbsp;<i>plugin => plugin buttons</i><br/><b>add plugin without buttons:</b>&nbsp;<i>plugin => |</i><br/><b>disable plugin:</b>&nbsp;<i>plugin => false</i>',
   'SHOP_MODULE_aTinyMCE_external_plugins'  => '<h3>external plugins <a href="https://www.tinymce.com/docs/configure/integration-and-setup/#external_plugins" target="_blank">(?)</a></h3>example:<br/>pluginname => path/to/file.js <b>|</b> plugin buttons',
   'SHOP_MODULE_aTinyMCE_buttons'           => '<h3>Toolbar Buttons <a href="https://www.tinymce.com/docs/advanced/editor-control-identifiers/#toolbarcontrols" target="_blank">(?)</a></h3><b style="color:#ff3600;">only for core toolbar controls and buttons for custom and external plugins!</b><br/>default buttons:' . "<textarea rows='7' cols='55'>undo redo\nbold italic underline strikethrough\nalignleft aligncenter alignright alignjustify\nbullist numlist\noutdent indent\nblockquote\nremoveformat\nsubscript\nsuperscript\nformatselect\nfontselect\nfontsizeselect\nsubscript superscript</textarea>"
);