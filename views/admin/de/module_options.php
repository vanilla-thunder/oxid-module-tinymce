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
$aLang     = array(
    'charset'                               => 'UTF-8',
    'SHOP_MODULE_GROUP_tinyMceMain'         => '<style type="text/css">.groupExp a.rc b {font-size: medium; color: #ff3600; }.groupExp dt input.txt { width: 430px !important} .groupExp dl { display: block !important; } input.confinput {position: fixed; top: 20px; right: 70px; background: #008B2D; padding: 10px 25px; color: white; border: 1px solid black; cursor:pointer; font-size: 125%; } input.confinput:hover {outline: 3px solid #ff3600;} .groupExp dt textarea.txtfield {width: 430px; height: 150px;}</style>Moduleinstellungen',
    'SHOP_MODULE_aTinyMCE_classes'          => '<h3>Liste der Backend-Klassen, wo TinyMCE angezeigt werden soll</h3><ul><li>article_main (Artikelbeschreibung)</li><li>content_main (CMS Seiten)</li><li>category_text (Kategorienbeschreibung)</li><li>newsletter_main (Newsletter)</li><li>news_text (Nachrichten-Text)</li></ul>',
    'HELP_SHOP_MODULE_aTinyMCE_classes'     => 'für die Benutzung von TinyMCE in eigenen Admin Views muss hier die entsprechende View Klasse eingetragen werden, dann werden für jedes textarea je ein Editor erzeugt',
    'SHOP_MODULE_aTinyMCE_plaincms'         => '<h3>plaintext CMS Seiten</h3>bei CMS Seiten mit diesen Idents wird kein Editor geladen. Z.B: Plaintext Emails, Email Betreffzeilen, etc',
    'SHOP_MODULE_GROUP_tinyMceSettings'     => 'TinyMCE Einstellungen &amp; Plugins',
    'SHOP_MODULE_aTinyMCE_config_override'  => '<h3>eigene Editor Konfiguration <a href="http://www.tinymce.com/wiki.php/Configuration" target="_blank" title="mehr Infos">(?)</a></h3>z.B. für externe Plugins oder um standard Parameter zu überschreiben<br/><b>parameter => "wert"</b> (mit Anführungszeichen, falls erforderlich!)',
    'SHOP_MODULE_aTinyMCE_buttons'          => '<h3>Toolbar Buttons <a href="http://www.tinymce.com/wiki.php/Controls" target="_blank">(?)</a></h3><b style="color:#ff3600;">es betrifft nur die Buttons (Toolbar controls) unter dem ersten Punkt: "core"</b> und buttons für eigene / externe plugins.<br/>Buttons von standard Plugins werden über Plugins-Konfiguration automatisch hinzugefügt bzw. entfernt.<br/>Standardwerte finden Sie in dem Hilfe-Popup',
    'HELP_SHOP_MODULE_aTinyMCE_buttons'     => "<textarea rows='7' cols='55'>undo redo\nbold italic underline strikethrough\nalignleft aligncenter alignright alignjustify\nbullist numlist\noutdent indent\nblockquote\nremoveformat\nsubscript\nsuperscript\nformatselect\nfontselect\nfontsizeselect\nsubscript superscript</textarea>",
    'SHOP_MODULE_aTinyMCE_plugins'          => '<h3>aktive Editor Plugins <a href="http://www.tinymce.com/wiki.php/Plugins" target="_blank">(?)</a></h3>jeweils ein Plugin pro Zeile.<br/>Standardwerte finden Sie in dem Hilfe-Popup',
    'HELP_SHOP_MODULE_aTinyMCE_plugins'     => "<textarea rows='7' cols='55'>advlist\nanchor\nautolink\nautoresize\ncharmap\ncode\ncolorpicker\nfullscreen\nhr\nimage\nimagetools\ninsertdatetime\nlink\nlists\nmedia\nnonbreaking\npagebreak\npaste\npreview\nsearchreplace\nspellchecker\ntable\ntextcolor\nvisualblocks\nwordcount</textarea>",

    'SHOP_MODULE_aTinyMCE_external_plugins' => '<h3>externe Plugins <a href="http://www.tinymce.com/wiki.php/Configuration:external_plugins" target="_blank">(?)</a></h3><br/>Eingabeformat:<br/>Pluginname => Pfad/zur/Datei.js',
    'hdi_tinymce_plaincms'                  => '<b class="errorbox">TinyMCE ist für diese Seite deaktiviert, weil sie keine HTML Formatierung enthalten darf </b>'

);