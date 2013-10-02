<?php

/**
 * HDI TinyMCE
 * Copyright (C) 2012-2013  HEINER DIRECT GmbH & Co. KG
 * info:  oxid@heiner-direct.com
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */

$sLangName = 'Deutsch';
$aLang     = array(
    'charset'                                 => 'UTF-8',
    'SHOP_MODULE_GROUP_tinyMceMain'           => '<style type="text/css">.groupExp a.rc b {font-size: medium; color: #ff3600; }.groupExp dt input.txt { width: 400px !important} .groupExp dl { display: block !important; } input.confinput {position: fixed; top: 20px; right: 70px; background: #008B2D; padding: 5px 20px; color: white; border: 1px solid black; cursor:pointer; font-size: 125%; } input.confinput:hover {outline: 3px solid #ff3600;} .groupExp dt textarea.txtfield {height: 135px;}</style>Moduleinstellungen',
    'SHOP_MODULE_aTinyMCE_classes'            => '<ul style="list-style:none;"><li><strong style="font-size:125%;">Liste der Backend-Klassen, wo TinyMCE angezeigt werden soll:</strong></li><li>article_main (Artikelbeschreibung)</li><li>content_main (CMS Seiten)</li><li>category_text (Kategorienbeschreibung)</li><li>newsletter_main (Newsletter)</li><li>news_text (Nachrichten-Text)</li></ul>',
    'SHOP_MODULE_aTinyMCE_plaincms'           => 'Idents der CMS Seiten, wo TinyMCE nicht geladen werden soll (plain Emails etc)',
    'SHOP_MODULE_sTinyMCE_height'             => 'Höhe des Editors (eine reine Zahl ohne Einheiten)',
    'SHOP_MODULE_bTinyMCE_smallui'            => 'kleine Menü-Knöpfe verwenden',
    'SHOP_MODULE_bTinyMCE_legacyoutput'       => 'HTML4 Standard im Newsletter-Inhalt verwenden',
    'SHOP_MODULE_sTinyMCE_cssfile'            => 'Pfad zu der CSS Datei mit den Stylesheets für Texte',

    'SHOP_MODULE_GROUP_tinyMceSettings'       => 'TinyMCE Einstellungen &amp; Plugins</b></a>&nbsp;&nbsp;&nbsp;<a href="http://www.tinymce.com/wiki.php/Configuration" target="_blank" title="mehr Infos"><b>( ? )',
    'SHOP_MODULE_bTinyMCE_relative_urls'      => 'relative Urls verwenden',
    'SHOP_MODULE_bTinyMCE_browser_spellcheck' => 'Rechtschreibprüfung des Browsers aktivieren',
    'SHOP_MODULE_bTinyMCE_autolink'           => 'autolink',
    'SHOP_MODULE_bTinyMCE_advlist'            => 'advlist',
    'SHOP_MODULE_bTinyMCE_anchor'             => 'anchor',
    'SHOP_MODULE_bTinyMCE_autolink'           => 'autolink',
    'SHOP_MODULE_bTinyMCE_autoresize'         => 'autoresize',
    'SHOP_MODULE_bTinyMCE_autosave'           => 'autosave',
    'SHOP_MODULE_bTinyMCE_bbcode'             => 'bbcode',
    'SHOP_MODULE_bTinyMCE_charmap'            => 'charmap',
    'SHOP_MODULE_bTinyMCE_code'               => 'code',
    'SHOP_MODULE_bTinyMCE_compat3x'           => 'compat3x',
    'SHOP_MODULE_bTinyMCE_contextmenu'        => 'contextmenu',
    'SHOP_MODULE_bTinyMCE_directionality'     => 'directionality',
    'SHOP_MODULE_bTinyMCE_emoticons'          => 'emoticons',
    'SHOP_MODULE_bTinyMCE_example'            => 'example',
    'SHOP_MODULE_bTinyMCE_example_dependency' => 'example_dependency',
    'SHOP_MODULE_bTinyMCE_fullpage'           => 'fullpage',
    'SHOP_MODULE_bTinyMCE_fullscreen'         => 'fullscreen',
    'SHOP_MODULE_bTinyMCE_hr'                 => 'hr',
    'SHOP_MODULE_bTinyMCE_image'              => 'image',
    'SHOP_MODULE_bTinyMCE_insertdatetime'     => 'insertdatetime',
    'SHOP_MODULE_bTinyMCE_layer'              => 'layer',
    'SHOP_MODULE_bTinyMCE_link'               => 'link',
    'SHOP_MODULE_bTinyMCE_lists'              => 'lists',
    'SHOP_MODULE_bTinyMCE_media'              => 'media',
    'SHOP_MODULE_bTinyMCE_nonbreaking'        => 'nonbreaking',
    'SHOP_MODULE_bTinyMCE_noneditable'        => 'noneditable',
    'SHOP_MODULE_bTinyMCE_pagebreak'          => 'pagebreak',
    'SHOP_MODULE_bTinyMCE_paste'              => 'paste',
    'SHOP_MODULE_bTinyMCE_preview'            => 'preview',
    'SHOP_MODULE_bTinyMCE_print'              => 'print',
    'SHOP_MODULE_bTinyMCE_save'               => 'save',
    'SHOP_MODULE_bTinyMCE_searchreplace'      => 'searchreplace',
    'SHOP_MODULE_bTinyMCE_spellchecker'       => 'spellchecker',
    'SHOP_MODULE_bTinyMCE_tabfocus'           => 'tabfocus',
    'SHOP_MODULE_bTinyMCE_table'              => 'table',
    'SHOP_MODULE_bTinyMCE_template'           => 'template',
    'SHOP_MODULE_bTinyMCE_textcolor'          => 'textcolor',
    'SHOP_MODULE_bTinyMCE_visualblocks'       => 'visualblocks',
    'SHOP_MODULE_bTinyMCE_visualchars'        => 'visualchars',
    'SHOP_MODULE_bTinyMCE_wordcount'          => 'wordcount',

    'SHOP_MODULE_GROUP_tinyMceExtPlugins'     => 'TinyMCE externe Plugins',
    'SHOP_MODULE_aTinyMCE_external_plugins'   => '<strong>externe Plugins</strong><br/>Eingabeformat:<br/>Pluginname => Pfad_zu_der_Datei.js',
    'SHOP_MODULE_sTinyMCE_external_controls'  => 'Buttons der externen Plugins',

    'hdi_tinymce_plaincms' => '<h4 class="errorbox">TinyMCE ist für diese Seite deaktiviert, weil sie keine HTML Formatierung enthalten darf </h4>'

);