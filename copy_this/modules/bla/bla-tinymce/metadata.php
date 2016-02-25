<?php

/*
 * ###_MODULE_###
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
 *
 * ###_AUTHOR_###
 */

$v = "https://raw.githubusercontent.com/vanilla-thunder/bla-tinymce/master/copy_this/modules/bla/bla-tinymce/version.jpg";

$sMetadataVersion = '1.1';
$aModule          = array(
    'id'          => 'bla-tinymce',
    'title'       => '<strong style="color:#95b900;font-size:125%;">best</strong><strong style="color:#c4ca77;font-size:125%;">life</strong> <strong>TinyMCE</strong>',
    'description' => '###_MODULE_### 4.7 - 4.9<br/><b style="display:inline-block;float:left;line-height:18px;">newest version:</b><img src="' . $v . '"/><br/>(no need to update if you already have this version)',
    'thumbnail'   => 'tinymce.png',
    'version'     => '###_VERSION_###',
    'author'      => '###_AUTHOR_###, ###_COMPANY_###',
    'email'       => '###_EMAIL_###',
    'url'         => '###_URL_###',
    'extend'      => array(
        'oxviewconfig' => 'bla/bla-tinymce/extend/blatinymceoxviewconfig'
    ),
    'blocks'      => array(
        array(
            'template' => 'bottomnaviitem.tpl',
            'block'    => 'admin_bottomnaviitem',
            'file'     => '/application/views/blocks/admin/bottomnaviitem_admin_bottomnaviitem.tpl'
        )
    ),
    'settings'    => array(
        /* enabling tinyMCE for this classes */
        array(
            'group'    => 'tinyMceMain',
            'name'     => 'aTinyMCE_classes',
            'type'     => 'arr',
            'value'    => array(
                "article_main",
                "category_text",
                "content_main",
                "newsletter_main",
                "news_text"
            ),
            'position' => 0
        ),
        array(
            'group'    => 'tinyMceMain',
            'name'     => 'aTinyMCE_plaincms',
            'type'     => 'arr',
            'value'    => array(
                "oxadminorderplainemail",
                "oxadminordernpplainemail", // bestellbenachrichtigung admin + fremdländer
                "oxuserorderplainemail",
                "oxuserordernpplainemail",
                "oxuserorderemailendplain", // bestellbenachrichtigung user + fremdländer + abschluss
                "oxordersendplainemail", // versandbestätigung
                "oxregisterplainemail",
                "oxregisterplainaltemail", // registrierung
                "oxupdatepassinfoplainemail", // passwort update
                "oxnewsletterplainemail", // newsletter
                "oxemailfooterplain", // email fußtext
                "oxrighttocancellegend",
                "oxrighttocancellegend2", // widerrufsrecht
                "oxstartmetadescription",
                "oxstartmetakeywords" // META Tags
            ),
            'position' => 1
        ),
        // ################################################################# tinymce settings

        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_config_override',
            'type'     => 'aarr',
            'value'    => array(),
            'position' => 0
        ),
        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_buttons',
            'type'     => 'arr',
            'value'    => array(
                "undo redo",
                "bold italic underline strikethrough",
                "alignleft aligncenter alignright alignjustify",
                "bullist numlist",
                "outdent indent",
                "blockquote",
                "removeformat",
                "subscript",
                "superscript",
                "formatselect",
                "fontselect",
                "fontsizeselect",
                "subscript superscript"
            ),
            'position' => 1
        ),
        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_plugins',
            'type'     => 'arr',
            'value'    => array(
                'advlist',
                'anchor',
                'autolink',
                'autoresize',
                'charmap',
                'code',
                'colorpicker',
                'fullscreen',
                'hr',
                'image',
                'imagetools',
                'insertdatetime',
                'link',
                'lists',
                'media',
                'nonbreaking',
                'pagebreak',
                'paste',
                'preview',
                'searchreplace',
                'spellchecker',
                'table',
                'textcolor',
                'visualblocks',
                'wordcount'
            ),
            'position' => 2
        ),
        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_external_plugins',
            'type'     => 'aarr',
            'value'    => array(),
            'position' => 3
        )
    )
);
