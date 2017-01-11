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


$sMetadataVersion = '1.1';
$aModule          = array(
    'id'          => 'bla-tinymce',
    'title'       => '<strong style="color:#95b900;font-size:125%;">best</strong><strong style="color:#c4ca77;font-size:125%;">life</strong> <strong>TinyMCE</strong>',
    'description' => 'TinyMCE Editor for OXID eShop CE',
    'thumbnail'   => 'tinymce.png',
    'version'     => '2.0.2 2017-1-11',
    'author'      => 'Marat Bedoev, bestlife AG',
    'email'       => 'oxid@bestlife.ag',
    'url'         => 'https://github.com/vanilla-thunder/bla-tinymce',
    'extend'      => array( 'oxviewconfig'      => 'bla/bla-tinymce/application/core/blatinymceoxviewconfig'),
    'files'       => array( 'tinymcehelper'     => 'bla/bla-tinymce/application/controllers/admin/tinymcehelper.php' ),
    'templates'   => array( 'tinymcehelper.tpl' => 'bla/bla-tinymce/application/views/admin/tinymcehelper.tpl' ),
    'blocks'      => array(
        array(
            'template' => 'bottomnaviitem.tpl',
            'block'    => 'admin_bottomnaviitem',
            'file'     => '/application/views/blocks/admin/bottomnaviitem_admin_bottomnaviitem.tpl'
        )
    ),
    'settings'    => array(
        /* enabling tinyMCE for these classes */
        array(
            'group'    => 'tinyMceMain',
            'name'     => 'blTinyMCE_filemanager',
            'type'     => 'bool',
            'value'    => true,
            'position' => 0
        ),
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
            'position' => 1
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
           'position' => 2
        ),
        array(
           'group'    => 'tinyMceMain',
           'name'     => 'aTinyMCE_extjs',
           'type'     => 'arr',
           'value'    => array(),
           'position' => 3
        ),


        // ################################################################# tinymce settings

        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_config',
            'type'     => 'aarr',
            'value'    => array(),
            'position' => 0
        ),
        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_plugins',
            'type'     => 'aarr',
            'value'    => array(),
            'position' => 1
        ),
        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_external_plugins',
            'type'     => 'aarr',
            'value'    => array(),
            'position' => 2
        ),
        array(
            'group'    => 'tinyMceSettings',
            'name'     => 'aTinyMCE_buttons',
            'type'     => 'arr',
            'value'    => array(),
            'position' => 3
        )
    )
);
