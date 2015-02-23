<?php

/**
 * bestlife AG - TinyMCE for OXID eShop
 * Copyright (C) 2014  bestlife AG
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

$sLangName = 'Deutsch';
$aLang = array(
    'charset'                               => 'UTF-8',
    'SHOP_MODULE_GROUP_tinyMceMain'         => '<style type="text/css">.groupExp a.rc b {font-size: medium; color: #ff3600; }.groupExp dt input.txt { width: 430px !important} .groupExp dl { display: block !important; } input.confinput {position: fixed; top: 20px; right: 70px; background: #008B2D; padding: 10px 25px; color: white; border: 1px solid black; cursor:pointer; font-size: 125%; } input.confinput:hover {outline: 3px solid #ff3600;} .groupExp dt textarea.txtfield {width: 430px; height: 150px;}</style>Moduleinstellungen',
    'SHOP_MODULE_aTinyMCE_classes'          => '<b style="font-size:125%;">Liste der Backend-Klassen, wo TinyMCE angezeigt werden soll</b></li><li>article_main (Artikelbeschreibung)</li><li>content_main (CMS Seiten)</li><li>category_text (Kategorienbeschreibung)</li><li>newsletter_main (Newsletter)</li><li>news_text (Nachrichten-Text)</li></ul>',
    'SHOP_MODULE_aTinyMCE_plaincms'         => '<b style="font-size:125%;">Idents der CMS Seiten, für die TinyMCE nicht geladen werden soll</b> (plain Emails etc)',
    'SHOP_MODULE_sTinyMCE_height'           => '<b style="font-size:125%;">Höhe des Editors</b> (eine reine Zahl ohne Einheiten)',

    'SHOP_MODULE_GROUP_tinyMceSettings'     => 'TinyMCE Einstellungen &amp; Plugins',
    'SHOP_MODULE_aTinyMCE_buttons'          => '<b style="font-size:125%;">Basis-Buttons auf der Toolbar<a href="http://www.tinymce.com/wiki.php/Controls" target="_blank">(?)</a></b><br/>'.
                                                '<b style="color:#ff3600;">es betrifft nur die Buttons unter dem ersten Punkt: "core"!</b> Alle anderen werden über Plugins automatisch hinzugefügt bzw. entfernt.<br/>Standardwert:<br/>'.
                                                "<textarea rows='7' cols='30'>undo redo\nbold italic underline strikethrough\nalignleft aligncenter alignright alignjustify\nbullist numlist\noutdent indent\nblockquote\nremoveformat\nsubscript\nsuperscript\nformatselect\nfontselect\nfontsizeselect</textarea>",
    'SHOP_MODULE_aTinyMCE_plugins_override' => '<b style="font-size:125%;">Basis-Plugins von TinyMCE ausschalten</b><br/>jeweils ein Plugin pro Zeile,<br/>z.B. um Plugin "emoticons" zu deaktivieren, "emoticons" eintragen',
    'SHOP_MODULE_aTinyMCE_external_plugins' => '<b style="font-size:125%;">externe Plugins <a href="http://www.tinymce.com/wiki.php/Configuration:external_plugins" target="_blank">(?)</a></b><br/>Eingabeformat:<br/>Pluginname => Pfad/zur/Datei.js',
    'SHOP_MODULE_sTinyMCE_custom_controls'  => '<b style="font-size:125%;">zusätzliche Toolbar-Buttons</b> z.B. für externe Plugins',
    'SHOP_MODULE_aTinyMCE_custom_config'    => '<b style="font-size:125%;">eigene Konfigurationsparameter <a href="http://www.tinymce.com/wiki.php/Configuration" target="_blank" title="mehr Infos">(?)</a></b><br/>z.B. für externe Plugins oder um bestehende zu überschreiben<br/><b>parameter => "wert"</b> (mit Anführungszeichen, falls erforderlich!)',

    'hdi_tinymce_plaincms'                  => '<b class="errorbox">TinyMCE ist für diese Seite deaktiviert, weil sie keine HTML Formatierung enthalten darf </b>'

);