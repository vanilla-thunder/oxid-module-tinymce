<?php

/**
 * HDI TinyMCE
 * Copyright (C) 2012  HEINER DIRECT GmbH & Co. KG
 *  info:  info@heiner-direct.com
 * 
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
$sMetadataVersion = '1.0';
$aModule = array(
		'id' => 'hdi-tinymce',
		'title' => '<strong style="color:#006a8c;border: 1px solid #e30061;padding: 0 2px;background:white;">HDI</strong> <strong>TinyMCE 3.5.8</strong>',
		'description' => 'backend implementation of TinyMCE Editor<br/>visit <a href="http://www.tinymce.com/" target="_blank">http://www.tinymce.com/</a> for more details',
		'thumbnail' => 'hdi.png',
		'version' => '1.0.1 (2012-12-19)</dd><dt>newest version</dt><dd><img src="https://raw.github.com/vanilla-thunder/hdi-tinymce/module/version.jpg" /><br/>
		 <a style="display: inline-block; padding: 1px 15px; background: #f0f0f0; border: 1px solid gray" href="https://github.com/vanilla-thunder/hdi-tinymce/" target="_blank">info</a> <a style="display: inline-block; padding: 1px 15px; background: #f0f0f0; border: 1px solid gray" href="https://github.com/vanilla-thunder/hdi-tinymce/archive/master.zip">download</a>',
		'author' => 'Marat Bedoev, HEINER DIRECT GmbH & Co. KG',
		'email' => 'info@heiner-direct.com',
		'url' => 'http://www.heiner-direct.com',
		'extend' => array(
				'article_main' => 'hdi/hdi-tinymce/tinymce',
				'category_text' => 'hdi/hdi-tinymce/tinymce',
				'content_main' => 'hdi/hdi-tinymce/tinymce',
				'newsletter_main' => 'hdi/hdi-tinymce/tinymce',
				'news_text' => 'hdi/hdi-tinymce/tinymce'
		),
		'templates' => array(
				'tinymce.tpl' => 'hdi/hdi-tinymce/out/tpl/tinymce.tpl',
		),
		'blocks' => array(
				array('template' => 'bottomnaviitem.tpl', 'block' => 'admin_bottomnaviitem', 'file' => 'admin_bottomnaviitem.tpl')
		),
		'settings' => array(
				/* enabling tinyMCE for this classes */
				array('group' => 'tinyMceMain', 'name' => 'bTinyMCE_article_main', 'type' => 'bool', 'value' => true, 'position' => 1),
				array('group' => 'tinyMceMain', 'name' => 'bTinyMCE_category_text', 'type' => 'bool', 'value' => true, 'position' => 2),
				array('group' => 'tinyMceMain', 'name' => 'bTinyMCE_content_main', 'type' => 'bool', 'value' => true, 'position' => 3),
				array('group' => 'tinyMceMain', 'name' => 'bTinyMCE_newsletter_main', 'type' => 'bool', 'value' => true, 'position' => 4),
				array('group' => 'tinyMceMain', 'name' => 'bTinyMCE_news_text', 'type' => 'bool', 'value' => true, 'position' => 5),
				/* TinyMCE Settings */
				array('group' => 'tinyMceSettings', 'name' => 'sTinyMCE_height', 'type' => 'str', 'value' => '400', 'position' => 1),
				array('group' => 'tinyMceSettings', 'name' => 'bTinyMCE_relative_urls', 'type' => 'bool', 'value' => true, 'position' => 2),
				/* plugins */
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_autolink', 'type' => 'bool', 'value' => true, 'position' => 1),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_ists', 'type' => 'bool', 'value' => true, 'position' => 2),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_pagebreak', 'type' => 'bool', 'value' => true, 'position' => 3),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_style', 'type' => 'bool', 'value' => true, 'position' => 4),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_layer', 'type' => 'bool', 'value' => true, 'position' => 5),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_table', 'type' => 'bool', 'value' => true, 'position' => 6),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_save', 'type' => 'bool', 'value' => true, 'position' => 7),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_advhr', 'type' => 'bool', 'value' => true, 'position' => 8),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_advimage', 'type' => 'bool', 'value' => true, 'position' => 9),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_advlink', 'type' => 'bool', 'value' => true, 'position' => 10),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_emotions', 'type' => 'bool', 'value' => true, 'position' => 11),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_iespell', 'type' => 'bool', 'value' => true, 'position' => 12),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_inlinepopups', 'type' => 'bool', 'value' => true, 'position' => 13),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_insertdatetime', 'type' => 'bool', 'value' => true, 'position' => 14),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_preview', 'type' => 'bool', 'value' => true, 'position' => 15),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_media', 'type' => 'bool', 'value' => true, 'position' => 16),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_searchreplace', 'type' => 'bool', 'value' => true, 'position' => 17),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_print', 'type' => 'bool', 'value' => true, 'position' => 18),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_contextmenu', 'type' => 'bool', 'value' => true, 'position' => 19),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_paste', 'type' => 'bool', 'value' => true, 'position' => 20),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_directionality', 'type' => 'bool', 'value' => true, 'position' => 21),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_fullscreen', 'type' => 'bool', 'value' => true, 'position' => 22),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_noneditable', 'type' => 'bool', 'value' => true, 'position' => 23),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_visualchars', 'type' => 'bool', 'value' => true, 'position' => 24),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_nonbreaking', 'type' => 'bool', 'value' => true, 'position' => 25),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_xhtmlxtras', 'type' => 'bool', 'value' => true, 'position' => 26),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_template', 'type' => 'bool', 'value' => true, 'position' => 27),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_wordcount', 'type' => 'bool', 'value' => true, 'position' => 28),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_advlist', 'type' => 'bool', 'value' => true, 'position' => 29),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_autosave', 'type' => 'bool', 'value' => true, 'position' => 30),
				array('group' => 'tinyMcePlugins', 'name' => 'bTinyMCE_visualblocks', 'type' => 'bool', 'value' => true, 'position' => 31),
				array('group' => 'tinyMcePlugins', 'name' => 'sTinyMCE_customplugins', 'type' => 'str', 'value' => "", 'position' => 32)
		)
);