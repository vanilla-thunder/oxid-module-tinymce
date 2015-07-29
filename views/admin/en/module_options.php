<?php

/*
 * ###_COMPANY_### - ###_MODULE_###
 * Copyright (C) ###_YEAR_###  ###_COMPANY_###
 * info:  ###_EMAIL_###
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
$aLang     = array(
    'charset'                               => 'UTF-8',
    'SHOP_MODULE_GROUP_tinyMceMain'         => '<style type="text/css">.groupExp a.rc b {font-size: medium; color: #ff3600; }.groupExp dt input.txt { width: 430px !important} .groupExp dl { display: block !important; } input.confinput {position: fixed; top: 20px; right: 70px; background: #008B2D; padding: 10px 25px; color: white; border: 1px solid black; cursor:pointer; font-size: 125%; } input.confinput:hover {outline: 3px solid #ff3600;} .groupExp dt textarea.txtfield {width: 430px; height: 150px;}</style>module settings',
    'SHOP_MODULE_aTinyMCE_classes'          => '<h3>Enable TinyMCE For This Backend Views</h3><ul><li>article_main (product description)</li><li>content_main (CMS pages)</li><li>category_text (category description)</li><li>newsletter_main (Newsletter)</li><li>news_text (news text)</li></ul>',
    'HELP_SHOP_MODULE_aTinyMCE_classes'     => 'if you want to use TinyMCE for your custom views, add here the view\'s class name, then textareas should become editor instances',
    'SHOP_MODULE_aTinyMCE_plaincms'         => '<h3>Plain Text CMS pages</h3>TinyMCE will not apper for this cms pages. e.g: Plaintext Emails, Email subjects, etc',

    'SHOP_MODULE_GROUP_tinyMceSettings'     => 'TinyMCE Settings &amp; Plugins',
    'SHOP_MODULE_aTinyMCE_config_override'  => '<h3>Custom Editor Configuration <a href="http://www.tinymce.com/wiki.php/Configuration" target="_blank" title="mehr Infos">(?)</a></h3>e.g. for external plugins or to overwrite default configuration<br/><b>parameter => "value"</b> (with quotes, if required!)',
    'SHOP_MODULE_aTinyMCE_buttons'          => '<h3>Toolbar Buttons <a href="http://www.tinymce.com/wiki.php/Controls" target="_blank">(?)</a></h3>'.
        '<b style="color:#ff3600;">only for core toolbar controls and buttons for custom and external plugins!</b><br/>Buttons for standard plugins will be displayd if the plugin is active.<br/>See the help popup for the default value of this setting',
    'HELP_SHOP_MODULE_aTinyMCE_buttons'     => "<textarea rows='7' cols='55'>undo redo\nbold italic underline strikethrough\nalignleft aligncenter alignright alignjustify\nbullist numlist\noutdent indent\nblockquote\nremoveformat\nsubscript\nsuperscript\nformatselect\nfontselect\nfontsizeselect\nsubscript superscript</textarea>",
    'SHOP_MODULE_aTinyMCE_plugins'          => '<h3>Active Editor Plugins <a href="http://www.tinymce.com/wiki.php/Plugins" target="_blank">(?)</a></h3>enter here the default plugins you want to be enabled<br/>See the help popup for the default value of this setting',
    'HELP_SHOP_MODULE_aTinyMCE_plugins'     => "<textarea rows='7' cols='55'>advlist\nanchor\nautolink\nautoresize\ncharmap\ncode\ncolorpicker\nfullscreen\nhr\nimage\nimagetools\ninsertdatetime\nlink\nlists\nmedia\nnonbreaking\npagebreak\npaste\npreview\nsearchreplace\nspellchecker\ntable\ntextcolor\nvisualblocks\nwordcount</textarea>",

    'SHOP_MODULE_aTinyMCE_external_plugins' => '<h3>External Plugins <a href="http://www.tinymce.com/wiki.php/Configuration:external_plugins" target="_blank">(?)</a></h3>pluginname => plugin_path/or/url/plugin.js',

    'hdi_tinymce_plaincms'                  => '<b class="errorbox">TinyMCE was deactivated from this page because it may not contain HTML code</b>'
);