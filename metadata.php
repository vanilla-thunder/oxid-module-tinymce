<?php

/*
 * vanilla-thunder/oxid-module-tinymce
 * TinyMCE 5 Integration for OXID eShop V6.2
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */


$sMetadataVersion = '2.1';
$aModule = [
    'id' => 'vt-tinymce',
    'title' => '[vt] TinyMCE',
    'description' => 'TinyMCE 5 Integration for OXID eShop ≥ V6.2',
    'thumbnail' => 'tinymce.png',
    'version' => '3.1.0 ( 2021-10-20 )',
    'author' => 'Marat Bedoev',
    'email' => openssl_decrypt("Az6pE7kPbtnTzjHlPhPCa4ktJLphZ/w9gKgo5vA//p4=", str_rot13("nrf-128-pop"), str_rot13("gvalzpr")),
    'url' => 'https://github.com/vanilla-thunder/oxid-module-tinymce',
    'extend' => [
        OxidEsales\Eshop\Core\ViewConfig::class => VanillaThunder\TinyMCE\Application\Core\ViewConfig::class
    ],
    'controllers' => [
        'tinyfilemanager' => VanillaThunder\TinyMCE\Application\Controller\Admin\TinyFileManager::class,
        'tinyhelper' => VanillaThunder\TinyMCE\Application\Controller\Admin\TinyHelper::class
    ],
    'templates' => [
        'tiny/filemanager.tpl' => 'vt/TinyMCE/Application/views/admin/filemanager.tpl',
        'tiny/helper.tpl' => 'vt/TinyMCE/Application/views/admin/helper.tpl'
    ],
    'blocks' => [
        [
            'template' => 'bottomnaviitem.tpl',
            'block' => 'admin_bottomnaviitem',
            'file' => 'Application/views/blocks/admin/bottomnaviitem_admin_bottomnaviitem.tpl'
        ]
    ],
    'settings' => [
        /* enabling tinyMCE for these classes */
        [
            'group' => 'tinyMceMain',
            'name' => 'aTinyMCE_classes',
            'type' => 'arr',
            'value' => [
                "article_main",
                "category_text",
                "content_main",
                "newsletter_main",
                "news_text"
            ],
            'position' => 0
        ],
        [
            'group' => 'tinyMceMain',
            'name' => 'aTinyMCE_plaincms',
            'type' => 'arr',
            'value' => [
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
            'position' => 1
        ],
        [
            'group' => 'tinyMceMain',
            'name' => 'blTinyMCE_filemanager',
            'type' => 'bool',
            'value' => true,
            'position' => 2
        ],
        [
            'group' => 'tinyMceMain',
            'name' => 'aTinyMCE_extjs',
            'type' => 'arr',
            'value' => [],
            'position' => 3
        ],


        // ################################################################# tinymce settings

        [
            'group' => 'tinyMceSettings',
            'name' => 'aTinyMCE_config',
            'type' => 'aarr',
            'value' => [],
            'position' => 0
        ],
        [
            'group' => 'tinyMceSettings',
            'name' => 'aTinyMCE_plugins',
            'type' => 'aarr',
            'value' => [],
            'position' => 1
        ],
        [
            'group' => 'tinyMceSettings',
            'name' => 'aTinyMCE_external_plugins',
            'type' => 'aarr',
            'value' => [],
            'position' => 2
        ],
        [
            'group' => 'tinyMceSettings',
            'name' => 'aTinyMCE_buttons',
            'type' => 'arr',
            'value' => [],
            'position' => 3
        ]
    ]
];
