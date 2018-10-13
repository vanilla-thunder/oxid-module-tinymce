<?php

/*
 * bla-tinymce
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

$sMetadataVersion = '2.0';
$aModule = [
   'id'          => 'bla-tinymce',
   'title'       => '<strong style="color:#95b900;font-size:125%;">best</strong><strong style="color:#c4ca77;font-size:125%;">life</strong> <strong>TinyMCE</strong>',
   'description' => 'TinyMCE Editor for OXID eShop CE',
   'thumbnail'   => 'tinymce.png',
   'version'     => '2.2.0 ( 2018-07-09 )',
   'author'      => 'Marat Bedoev, bestlife AG',
   'email'       => 'oxid@bestlife.ag',
   'url'         => 'https://github.com/vanilla-thunder/bla-tinymce',
   'extend'      => [
       \OxidEsales\Eshop\Core\ViewConfig::class => \bla\tinymce\application\core\blaTinyMceOxViewConfig::class
   ],
   'controllers'       => [
       'tinymcehelper' => \bla\tinymce\application\controllers\admin\tinymcehelper::class
   ],
   'templates'   => [
       'tinymcehelper.tpl' => 'bla/bla-tinymce/application/views/admin/tinymcehelper.tpl'
   ],
   'blocks'      => [
      [
         'template' => 'bottomnaviitem.tpl',
         'block'    => 'admin_bottomnaviitem',
         'file'     => '/application/views/blocks/admin/bottomnaviitem_admin_bottomnaviitem.tpl'
      ]
   ],
   'settings'    => [
      /* enabling tinyMCE for these classes */
      [
         'group'    => 'tinyMceMain',
         'name'     => 'blTinyMCE_filemanager',
         'type'     => 'bool',
         'value'    => true,
         'position' => 0
      ],
      [
         'group'    => 'tinyMceMain',
         'name'     => 'aTinyMCE_classes',
         'type'     => 'arr',
         'value'    => [
            "article_main",
            "category_text",
            "content_main",
            "newsletter_main",
            "news_text"
         ],
         'position' => 1
      ],
      [
         'group'    => 'tinyMceMain',
         'name'     => 'aTinyMCE_plaincms',
         'type'     => 'arr',
         'value'    => [
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
         ],
         'position' => 2
      ],
      [
         'group'    => 'tinyMceMain',
         'name'     => 'aTinyMCE_extjs',
         'type'     => 'arr',
         'value'    => [],
         'position' => 3
      ],


      // ################################################################# tinymce settings

      [
         'group'    => 'tinyMceSettings',
         'name'     => 'aTinyMCE_config',
         'type'     => 'aarr',
         'value'    => [],
         'position' => 0
      ],
      [
         'group'    => 'tinyMceSettings',
         'name'     => 'aTinyMCE_plugins',
         'type'     => 'aarr',
         'value'    => [],
         'position' => 1
      ],
      [
         'group'    => 'tinyMceSettings',
         'name'     => 'aTinyMCE_external_plugins',
         'type'     => 'aarr',
         'value'    => [],
         'position' => 2
      ],
      [
         'group'    => 'tinyMceSettings',
         'name'     => 'aTinyMCE_buttons',
         'type'     => 'arr',
         'value'    => [],
         'position' => 3
      ]
   ]
];
