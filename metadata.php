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
     * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
     * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
     */

    $v = "https://raw.githubusercontent.com/vanilla-thunder/bla-tinymce/master/copy_this/modules/bla/bla-tinymce/version.jpg";

    $sMetadataVersion = '1.1';
    $aModule          = array(
        'id'          => 'bla-tinymce',
        'title'       => '<strong style="color:#95b900;font-size:125%;">best</strong><strong style="color:#c4ca77;font-size:125%;">life</strong> <strong>TinyMCE</strong>',
        'description' => 'TinyMCE 4.1.3 WYSIWYG Editor for OXID eShop 4.7 & 4.8<br/>visit <a href="http://www.tinymce.com/" target="_blank">http://www.tinymce.com/</a> for demo and more details<hr/><b style="display: inline-block; float:left;">newest version:</b><img src="' . $v . '" style=" float:left;"/><a style="display: inline-block; padding: 1px 25px; background: dodgerblue;  border: 1px solid #585858; color: white;" href="http://bit.ly/bla-TinyMCE" target="_blank">info</a>&nbsp;<a style="display: inline-block; padding: 1px 25px; background: forestgreen; border: 1px solid #585858; color: white;" href="https://github.com/vanilla-thunder/bla-tinymce/archive/master.zip">download</a>',
        'thumbnail'   => 'tinymce.png',
        'version'     => '1.3.0 (2014-08-20)',
        'author'      => 'Marat Bedoev, bestlife AG',
        'email'       => 'oxid@bestlife.ag',
        'url'         => 'http://www.bestlife.ag',
        'extend'      => array(
            'oxviewconfig'    => 'bla/bla-tinymce/core/blatinymceoxviewconfig'
        ),
        'templates'   => array(
            'tinymce.tpl' => 'bla/bla-tinymce/views/tinymce.tpl',
        ),
        'blocks'      => array(
            array(
                'template' => 'bottomnaviitem.tpl',
                'block'    => 'admin_bottomnaviitem',
                'file'     => '/views/blocks/admin/bottomnaviitem_admin_bottomnaviitem.tpl'
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
            array(
                'group'    => 'tinyMceSettings',
                'name'     => 'sTinyMCE_height',
                'type'     => 'str',
                'value'    => '300',
                'position' => 0
            ),
            array(
                'group'    => 'tinyMceSettings',
                'name'     => 'aTinyMCE_plugins_override',
                'type'     => 'arr',
                'value'    => null,
                'position' => 1
            ),
            array(
                'group'    => 'tinyMceSettings',
                'name'     => 'aTinyMCE_external_plugins',
                'type'     => 'arr',
                'value'    => null,
                'position' => 2
            ),
            array(
                'group'    => 'tinyMceSettings',
                'name'     => 'sTinyMCE_custom_controls',
                'type'     => 'str',
                'value'    => '',
                'position' => 3
            ),
            array(
                'group'    => 'tinyMceSettings',
                'name'     => 'aTinyMCE_custom_config',
                'type'     => 'aarr',
                'value'    => null,
                'position' => 4
            ),
        )
    );
