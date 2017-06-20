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

$sLangName = 'Deutsch';
$aLang = array(
   'charset'                                => 'UTF-8',
   'BLA_TINYMCE_TOGGLE'                     => 'TinyMCE zeigen/verstecken',
   'BLA_TINYMCE_PLAINCMS'                   => '<b class="errorbox">TinyMCE wurde für diese Seite deaktiviert, weil sie keine HTML Formatierung enthalten darf </b>',
   'SHOP_MODULE_GROUP_tinyMceMain'          => '<style type="text/css">.groupExp a.rc b {font-size:medium;color:#ff3600;}.groupExp dt input.txt {width:430px !important} .groupExp dl {display:block !important;} input.confinput {position:fixed;top:20px;right:70px;background:#008B2D;padding:10px 25px;color:white;border:1px solid black;cursor:pointer;font-size:125%;} input.confinput:hover {outline:3px solid #ff3600;} .groupExp dt textarea.txtfield {width:430px;height:150px;}</style>Moduleinstellungen',
   'SHOP_MODULE_blTinyMCE_filemanager'      => 'Dateimanager aktivieren',
   'HELP_SHOP_MODULE_blTinyMCE_filemanager' => 'Ist diese Option aktiv, können Bilder hochgeladen werden. Der Speicherort ist: out/pictures/wysiwigpro/',
   'SHOP_MODULE_aTinyMCE_classes'           => '<h3>TinyMCE für folgende Backend-Seiten laden:</h3><ul><li>article_main (Artikelbeschreibung)</li><li>content_main (CMS Seiten)</li><li>category_text (Kategorienbeschreibung)</li><li>newsletter_main (Newsletter)</li><li>news_text (Nachrichten-Text)</li></ul>',
   'HELP_SHOP_MODULE_aTinyMCE_classes'      => 'für die Benutzung von TinyMCE in eigenen Admin Views muss hier die entsprechende View Klasse eingetragen werden, dann werden für jedes textarea je ein Editor erzeugt',
   'SHOP_MODULE_aTinyMCE_plaincms'          => '<h3>plaintext CMS Seiten</h3>Für diese CMS Seiten wird TinyMCE deaktiviert.',
   'HELP_SHOP_MODULE_aTinyMCE_plaincms'     => 'Einige CMS Seiten dürfen keine HTML Tags enthalten, z.B: Plaintext Emails, Email Betreffzeilen, SEO Beschreibung, etc.',
   'SHOP_MODULE_aTinyMCE_extjs'             => '<h3>Externe JS Abhängigkeiten</h3>',
   'HELP_SHOP_MODULE_aTinyMCE_extjs'        => 'Komplette URL mit http:// bzw https:// falls der Shop über HTTPS läuft.',
   'SHOP_MODULE_GROUP_tinyMceSettings'      => 'TinyMCE Einstellungen &amp; Plugins',
   'SHOP_MODULE_aTinyMCE_config'            => '<h3>eigene TinyMCE Konfiguration <a href="https://www.tinymce.com/docs/configure/" target="_blank" title="mehr Infos">(?)</a></h3>hier können Parameter für externe Plugins hinterlegt oder auch standard Werte  überschreiben werden<br/><b>parameter => "wert"</b> (mit Anführungszeichen, falls erforderlich!)',
   'SHOP_MODULE_aTinyMCE_plugins'           => '<h3>TinyMCE Plugins aktivieren/überschreiben <a href="https://www.tinymce.com/docs/configure/integration-and-setup/#plugins" target="_blank">(?)</a></h3><b>Plugin hinzufügen:</b>&nbsp;<i>plugin => plugin buttons</i><br/><b>Plugin ohne Buttons:</b>&nbsp;<i>plugin => |</i><br/><b>Plugin entfernen:</b>&nbsp;<i>plugin => false</i>',
   'SHOP_MODULE_aTinyMCE_external_plugins'  => '<h3>externe Plugins <a href="https://www.tinymce.com/docs/configure/integration-and-setup/#external_plugins" target="_blank">(?)</a></h3>Eingabeformat:<br/>Pluginname => Pfad/zur/Datei.js <b>|</b> plugin buttons',
   'SHOP_MODULE_aTinyMCE_buttons'           => '<h3>Toolbar Buttons überschreiben <a href="https://www.tinymce.com/docs/advanced/editor-control-identifiers/#toolbarcontrols" target="_blank">(?)</a></h3><b style="color:#ff3600;">es betrifft nur Buttons (Toolbar controls) unter dem ersten Punkt: "core" + Buttons für externe Plugins</b><br/>Standard Buttons:' . "<textarea rows='7' cols='55'>undo redo\nbold italic underline strikethrough\nalignleft aligncenter alignright alignjustify\nbullist numlist\noutdent indent\nblockquote\nremoveformat\nsubscript\nsuperscript\nformatselect\nfontselect\nfontsizeselect</textarea>"
);
