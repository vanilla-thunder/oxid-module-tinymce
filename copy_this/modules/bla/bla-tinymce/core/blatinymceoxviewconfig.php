<?php

/*
 * bestlife AG - TinyMCE for OXID eShop
 * Copyright (C) 2015  bestlife AG
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


class blaTinyMceOxViewConfig extends blaTinyMceOxViewConfig_parent
{
    public function loadTinyMce()
    {
        $cfg = oxRegistry::getConfig();
        $blEnabled = in_array( $this->getActiveClassName(), $cfg->getConfigParam( "aTinyMCE_classes" ) );
        $blPlainCms = in_array( $cfg->getActiveView()->getViewDataElement( "edit" )->oxcontents__oxloadid->value, $cfg->getConfigParam( "aTinyMCE_plaincms" ) );

        if (!$blEnabled) return;
        if ($blPlainCms) return oxRegistry::getLang()->translateString( "hdi_tinymce_plaincms" );

        // processind editor config & other stuff
        $sLang = oxRegistry::getLang()->getLanguageAbbr( oxRegistry::getLang()->getTplLanguage() );
        // array to assign shops lang abbreviations to lang file names of tinymce: shopLangAbbreviation => fileName (without .js )
        $aLang = array(
            "cs" => "cs",
            "da" => "da",
            "de" => "de",
            "fr" => "fr_FR",
            "it" => "it",
            "nl" => "nl",
            "ru" => "ru"
        );


        $aConfig = array(
            'browser_spellcheck'      => ( $cfg->getConfigParam( "bTinyMCE_browser_spellcheck" ) ? 'true' : 'false' ),
            'language'                => '"'.( in_array( $sLang, $aLang ) ? $aLang[$sLang] : 'en' ).'"',
            'height'                  => $cfg->getConfigParam( "sTinyMCE_height" ),
            'nowrap'                  => 'true',
            'selector'                => '"textarea:not(.mceNoEditor)"',
            'relative_urls'           => 'false',
            'document_base_url'       => '"'.$this->getBaseDir().'"',
            'menubar'                 => 'false',
            'plugin_preview_width'    => 'window.innerWidth',
            'plugin_preview_height'   => 'window.innerHeight-90',
            'code_dialog_width'       => 'window.innerWidth-50',
            'code_dialog_height'      => 'window.innerHeight-130',
            'image_advtab'            => 'true',
            'moxiemanager_fullscreen' => 'true',
            'insertdatetime_formats'  => '[ "%d.%m.%Y", "%H:%M" ]',
            'nonbreaking_force_tab'   => 'true', // http://www.tinymce.com/wiki.php/Plugin:nonbreaking
            'autoresize_max_height'   => '400'
        );


        //merging with custom config
        $aConfig = ( $aCustCfg = $this->_getTinyCustConfig() ) ? array_merge( $aConfig, $aCustCfg ) : $aConfig;

        // plugins and their buttons
        $aPlugins = array(
            "textcolor" => "forecolor backcolor",
            "advlist" => false,
            "anchor" => "anchor",
            "autolink" => false,
            "autoresize" => false,
            //"autosave" => false , // http://www.tinymce.com/wiki.php/Plugin:autosave // really bad stuff!
            //"bbcode" => ,
            "charmap" => "charmap",
            "colorpicker" => false,
            //"compat3x" => ,
            //"contextmenu" => , // http://www.tinymce.com/wiki.php/Plugin:contextmenu
            //"directionality" => "ltr rtl",
            "emoticons" => "emoticons",
            //"example" => ,
            //"example_dependency" => ,
            //"fullpage" => , // nein! http://www.tinymce.com/wiki.php/Plugin:fullpage
            "hr" => "hr",
            "image" => "image", // http://www.tinymce.com/wiki.php/Plugin:image
            "insertdatetime" => "insertdatetime",
            //"layer" => , // This plugin adds some layer controls. Only works on some browsers. Will probably be removed in the future. http://www.tinymce.com/wiki.php/Plugin:layer
            "legacyoutput" => false,
            "link" => "link unlink",
            "lists" => false,
            //"importcss" => false, // http://www.tinymce.com/wiki.php/Plugin:importcss
            "media" => "media",
            "nonbreaking" => "nonbreaking",
            //"noneditable" => false, // http://www.tinymce.com/wiki.php/Plugin:noneditable
            "pagebreak" => "pagebreak",
            "paste" => "pastetext",
            //"print" => "print",
            //"save" => "save cancel",
            "searchreplace" => "searchreplace",
            //"spellchecker" => "spellchecker", // http://www.tinymce.com/wiki.php/Plugin:spellchecker
            // "tabfocus" => false, // http://www.tinymce.com/wiki.php/Plugin:tabfocus
            "table" => "table",
            //"template" => "template",
            // "textpattern" => false, // sowas wie markdown http://www.tinymce.com/wiki.php/Plugin:textpattern
            "visualblocks" => "visualblocks",
            "visualchars" => "visualchars",
            "wordcount" => false,
            "code" => "code",
            "fullscreen" => "fullscreen",
            "preview" => "preview"
        );
        if ($this->getActiveClassName()=="newsletter_main")
		{
			$aPlugins["legacyoutput"] = false;
			$aPlugins["fullpage"] = "fullpage";
		}

        // plugin override
        if($aOverride = $cfg->getConfigParam("aTinyMCE_plugins_override"))
        {
            foreach( $aOverride AS $key => $value)
            {
                unset($aPlugins[$value]);
            }

        }

        $aConfig['plugins'] = '"'.implode( ' ', array_keys($aPlugins)).'"';

        // external plugins
        if ($aExtPlugins = $this->_getTinyExtPlugins())
        {
            $aConfig['external_plugins'] = '{ ';
            foreach ($aExtPlugins AS $plugin => $file)
            {
                $aConfig['external_plugins'] .= '"'.$plugin.'": "'.$file.'", ';
            }
            $aConfig['external_plugins'] .= ' }';
        }

        // default tollbar buttons
        $aButtons = $cfg->getConfigParam("aTinyMCE_buttons");
        if(!is_array($aButtons) || empty($aButtons))
        {
            // fallback
            $aButtons = array(
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
                "fontsizeselect"
            );    
        }
        
        
        // buttons for plugins, enable only if plugin is active
        $aButtons = array_merge($aButtons, array_filter(array_values($aPlugins)));

        // custom buttons
        $aButtons[] = $this->_getTinyCustControls();

        $aConfig['toolbar'] = '"'.implode( " | ", $aButtons ).'"';

        /*
        $aConfig['toolbar1']  = '"undo redo searchreplace preview print fullscreen code paste | image media emoticons table inserttable bullist numlist outdent indent | ';
        $aConfig['toolbar1'] .= 'ltr rtl | blockquote subscript superscript '.( $cfg->getConfigParam( "bTinyMCE_charmap" ) ? 'charmap' : '' ).' hr nonbreaking anchor link unlink ';
        $aConfig['toolbar1'] .= $this->_getTinyCustControls().'"';
        $aConfig['toolbar2'] = '"bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect formatselect | removeformat | spellchecker visualchars | insertdatetime"';
        */

        // compile the whole config stuff
        $sConfig = '';
        foreach ($aConfig AS $param => $value)
        {
            $sConfig .= "$param: $value, ";
        }

        // add init script
        $sInit = 'tinymce.init({ '.$sConfig.' });';

        $sCopyLongDescFromTinyMCE = 'function copyLongDescFromTinyMCE(sIdent)
{
    var editor = tinymce.get("editor_"+sIdent);
    if (editor && editor.isHidden() !== true)
    {
        console.log("copy content from tinymce");
        var content = editor.getContent({format: "raw"}).replace(/\[{([^\]]*?)}\]/g, function(m) { return m.replace(/&gt;/g, ">").replace(/&lt;/g, "<").replace(/&amp;/g, "&") });
        document.getElementsByName("editval[" + sIdent + "]").item(0).value = content;
        return true;
    }
    return false;
}

var origCopyLongDesc = copyLongDesc;
copyLongDesc = function(sIdent)
{
    if ( copyLongDescFromTinyMCE( sIdent ) ) return;
    console.log("tinymce disabled, copy content from regular textarea");
    origCopyLongDesc( sIdent );
}';

        // adding scripts to template
        $smarty = oxRegistry::get( "oxUtilsView" )->getSmarty();
        $sSufix = ( $smarty->_tpl_vars["__oxid_include_dynamic"] ) ? '_dynamic' : '';

        $aScript = (array) $cfg->getGlobalParameter( 'scripts'.$sSufix );
        $aScript[] = $sCopyLongDescFromTinyMCE;
        $aScript[] = $sInit;
        $cfg->setGlobalParameter( 'scripts'.$sSufix, $aScript );

        $aInclude = (array) $cfg->getGlobalParameter( 'includes'.$sSufix );
        $aInclude[3][] = $this->getModuleUrl( 'bla-tinymce', 'tinymce/tinymce.min.js' );
        $cfg->setGlobalParameter( 'includes'.$sSufix, $aInclude );

        return '<li style="margin-left: 50px;">
                        <button style="border: 1px solid #0089EE; color: #0089EE;padding: 3px 10px; margin-top: -10px; background: white;" onclick="tinymce.each(tinymce.editors, function(editor) { if(editor.isHidden()) { editor.show(); } else { editor.hide(); } });">
                            <span>TinyMCE zeigen/verstecken</span>
                        </button>
                    </li>';
        // javascript:tinymce.execCommand(\'mceToggleEditor\',false,\'editor1\');
    }

    protected function _getTinyCustControls()
    {
        $sControls = oxRegistry::getConfig()->getConfigParam( "sTinyMCE_custom_controls" );
        if (method_exists( get_parent_class( __CLASS__ ), __FUNCTION__ )) $sControls = parent::_getTinyCustControls()." ".$sControls;
        return $sControls;
    }

    protected function _getTinyExtPlugins()
    {
        $aPlugins = oxRegistry::getConfig()->getConfigParam( "aTinyMCE_external_plugins" );
        if (method_exists( get_parent_class( __CLASS__ ), __FUNCTION__ )) $aPlugins = array_merge( parent::_getTinyExtPlugins(), $aPlugins );
        return $aPlugins;
    }

    protected function _getTinyCustConfig()
    {
        $aConfig = oxRegistry::getConfig()->getConfigParam( "aTinyMCE_custom_config" );
        if (method_exists( get_parent_class( __CLASS__ ), __FUNCTION__ )) $aConfig = array_merge( parent::_getTinyCustConfig(), $aConfig );
        return $aConfig;
    }
}
