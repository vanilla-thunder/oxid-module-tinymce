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

namespace VanillaThunder\TinyMCE\Application\Core;
use \OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\UtilsServer;

/** funtion for adding quotes to config variables
 * @param $string
 * @return string
 */
function q($string) { return '"'.addslashes($string).'"'; }

/**
 * ViewConfig class wrapper for TinyMCE module.
 *
 * @mixin \OxidEsales\Eshop\Core\ViewConfig
 */
class ViewConfig extends ViewConfig_parent
{
    public function loadTinyMce()
    {
        $cfg = Registry::getConfig();

        // is tinymce enabled for current controller?
        $aEnabledClasses = $cfg->getConfigParam("aTinyMCE_classes") ?? [];
        if (!in_array($this->getActiveClassName(), $aEnabledClasses)) return '';

        $oLang = Registry::getLang();

        // filter plain cms pages
        $oEditObject = $cfg->getActiveView()->getViewDataElement("edit");
        $sCoreTableName = $oEditObject->getCoreTableName();
        $aPlainCmsPages = $cfg->getConfigParam("aTinyMCE_plaincms") ?? [];
        if ($sCoreTableName === "oxcontents" && in_array($oEditObject->getLoadId(), $aPlainCmsPages)) {
            return $oLang->translateString("BLA_TINYMCE_PLAINCMS");
        }

        // ******************** TinyMCE Config ********************

        // array to assign shop lang abbreviations to lang files of tinymce: shopLang => langfile (without .js )
        $aLang = array(
            "cs" => "cs",
            "da" => "da",
            "de" => "de",
            "es" => "es_419",
            "fr" => "fr_FR",
            "it" => "it_IT",
            "nl" => "nl",
            "ru" => "ru"
        );
        $sLang = $aLang[$oLang->getLanguageAbbr($oLang->getTplLanguage())] ?? "en";


        // processing editor config & other stuff

        // default config, updated on 2021-10-10 according to
        $aConfig = array(
            // integration options https://www.tiny.cloud/docs/configure/integration-and-setup/
            // 'auto_focus' => '', // don't think we need me, maybe for cms pages?
            'base_url' => q($this->getBaseDir().'modules/vt/TinyMCE/out/tinymce/'),
            'cache_suffix' => q('?v=20211010'),
            'selector' => '"textarea:not(.mceNoEditor)"',

            // gui options https://www.tiny.cloud/docs/configure/editor-appearance/
            'contextmenu' => 'false', q("link linkchecker  image imagetools table"),
            'min_height' => 350,
            'max_height' => q('90%'),
            'max_width' => q('90%'),
            'menubar' => 'false',
            'toolbar_sticky' => 'true',

            // content appearance https://www.tiny.cloud/docs/configure/content-appearance/
            'content_css' => q('/out/wave/src/css/styles.min.css'), // hardcoded, for testing purposes

            // content filtering https://www.tiny.cloud/docs/configure/content-filtering/
            'entity_encoding' => q('raw'),
            'protect' => '[ /\[\{((?!\}\]).)+\}\]/gm ]', // holy shit, this is like Weihnachten and Geburtstag all at once

            // content formatting https://www.tiny.cloud/docs/configure/content-formatting/

            // localization https://www.tiny.cloud/docs/configure/localization/
            'language' => q($sLang),

            // URL handling https://www.tiny.cloud/docs/configure/url-handling/
            'document_base_url' => q($this->getBaseDir()),
            'relative_urls' => 'true',

            // plugins
            'image_advtab' => 'true'


/*
            // old
            //'spellchecker_language'   => '"' . (in_array($sLang, $aLang) ? $aLang[$sLang] : 'en') . '"',
            'nowrap' => 'false',
            // http://www.tinymce.com/wiki.php/Configuration:entity_encoding
            // http://www.tinymce.com/wiki.php/Configuration:document_base_url
            // http://www.tinymce.com/wiki.php/Configuration:relative_urls
            'plugin_preview_width' => 'window.innerWidth',
            'plugin_preview_height' => 'window.innerHeight-90',
            'code_dialog_width' => 'window.innerWidth-50',
            'code_dialog_height' => 'window.innerHeight-130',
            'imagetools_toolbar' => '"rotateleft rotateright | flipv fliph | editimage imageoptions"',
            'moxiemanager_fullscreen' => 'true',
            'insertdatetime_formats' => '[ "%d.%m.%Y", "%H:%M" ]',
            'nonbreaking_force_tab' => 'true',
            // http://www.tinymce.com/wiki.php/Plugin:nonbreaking
            'urlconverter_callback' => '"urlconverter"',
            'filemanager_access_key' => '"' . md5($_SERVER['DOCUMENT_ROOT']) . '"',
            'tinymcehelper' => '"' . $this->getSelfActionLink() . 'renderPartial=1"'
            */
        );

        //merging with onfig override
        $aOverrideCfg = $this->_getTinyCustConfig();
        if (!empty($aOverrideCfg) && is_array($aOverrideCfg)) {
            $aConfig = array_merge($aConfig, $aOverrideCfg);
        }


        // default plugins and their buttons
        $aPlugins = array(
            //'advlist' => '', // '' = plugin has no buttons
            'anchor' => 'anchor',
            'autolink' => '',
            'autoresize' => '',
            'charmap' => 'charmap',
            'code' => 'code',
            'hr' => 'hr',
            'image' => 'image',
            // 'imagetools' => '', // das hier klingt sehr kompliziert
            'link' => 'link unlink',
            'lists' => '',
            'media' => 'media',
            'nonbreaking' => 'nonbreaking',
            'pagebreak' => 'pagebreak',
            'paste' => 'pastetext',
            'preview' => 'preview',
            'quickbars' => '',//'quicklink quickimage quicktable',
            'searchreplace' => 'searchreplace',
            'table' => 'table',
            'visualblocks' => 'visualblocks',
            'wordcount' => '',
            'oxfullscreen' => 'fullscreen', //custom fullscreen plugin
            //'oxwidget'       => 'widget'
            //'oxgetseourl'    => 'yolo' //custom seo url plugin // wip
        );

        // plugins for newsletter emails
        if ($this->getActiveClassName() === "newsletter_main") {
            $aPlugins["legacyoutput"] = "";
            $aPlugins["fullpage"] = "fullpage";
        }


        // override for active plugins
        $aOverridePlgns = $cfg->getConfigParam("aTinyMCE_plugins");
        if (!empty($aOverridePlgns) && is_array($aOverridePlgns)) {
            $aPlugins = array_merge($aPlugins, $aOverridePlgns);
        }
        $aPlugins = array_filter($aPlugins, function ($value) {
            return $value !== "false";
        });

        // array keys von $aPlugins enthalten aktive plugins
        $aConfig['plugins'] = '"' . implode(' ', array_keys($aPlugins)) . '"';

        // external plugins
        $aConfig['external_plugins'] = '{ "oxfullscreen":"' . $this->getModuleUrl(
                'vt-tinymce',
                'out/plugins/oxfullscreen/plugin.js'
            ) . '" ';
        //$aConfig['external_plugins'] .= ', "oxwidget":"' . $this->getModuleUrl('bla-tinymce', 'plugins/oxwidget/plugin.js') . '" ';


        $blFilemanager = $cfg->getConfigParam("blTinyMCE_filemanager");
        // @todo: $blFilemanager wiederherstellen
        if ($blFilemanager)
        {
            $aConfig['filemanager_url'] = q(str_replace('&amp;','&',$this->getSslSelfLink())."cl=tinyfilemanager");
            $sFilemanagerKey = md5_file(Registry::getConfig()->getConfigParam("sShopDir")."/config.inc.php");
            //$aConfig['filemanager_access_key'] = q($sFilemanagerKey);
            Registry::get(UtilsServer::class)->setOxCookie("filemanagerkey", $sFilemanagerKey);

            $aConfig['external_plugins'] .= ',"roxy":' . q($this->getModuleUrl(
                    'vt-tinymce',
                    'out/plugins/roxy/plugin.js'
                ));
        }

        //$aConfig['external_plugins'] .= ',"oxgetseourl":"' . $this->getModuleUrl('bla-tinymce', 'plugins/oxgetseourl/plugin.js') . '" ';

        $aExtPlugins = $this->_getTinyExtPlugins();
        if (!empty($aExtPlugins) && is_array($aExtPlugins)) {
            foreach ($aExtPlugins as $plugin => $file) {
                $aConfig['external_plugins'] .= ', "' . $plugin . '": "' . $file . '" ';
            }
        }
        $aConfig['external_plugins'] .= ' }';

        // default toolbar buttons
        $aDefaultButtons = array(
            "undo redo",
            //"cut copy paste",
            "forecolor backcolor",
            "bold italic underline strikethrough",
            "alignleft aligncenter alignright alignjustify",
            "bullist numlist",
            "outdent indent",
            "blockquote",
            "subscript",
            "superscript",
            "formatselect",
            //"fontselect",
            //"fontsizeselect",
            "removeformat"
        );
        $aOverrideButtons = $cfg->getConfigParam("aTinyMCE_buttons");
        $aButtons = (empty($aOverrideButtons) || !is_array($aOverrideButtons)) ? $aDefaultButtons : $aOverrideButtons;

        // plugin buttons
        $aPluginButtons = array_filter($aPlugins);

        // zusätzliche buttons
        $aCustomButtons = $this->_getTinyToolbarControls();

        $aButtons = array_merge(array_filter($aButtons), [" | "], array_filter($aPluginButtons), array_filter($aCustomButtons));
        $aConfig['toolbar'] = '["' . implode(" | ", $aButtons) . '"]';


        // compile the whole config stuff
        $sConfig = '';
        foreach ($aConfig as $param => $value) {
            $sConfig .= "$param: $value, ";
        }

        // add init script
        $sInit = 'tinymce.init({ ' . $sConfig . ' });';

        $sCopyLongDescFromTinyMCE = 'function copyLongDescFromTinyMCE(sIdent) {
   var editor = tinymce.get("editor_"+sIdent);
   var content = (editor && !editor.isHidden()) ? editor.getContent() : document.getElementById("editor_"+sIdent).value;
   document.getElementsByName("editval[" + sIdent + "]").item(0).value = content.replace(/\[{([^\]]*?)}\]/g, function(m) { return m.replace(/&gt;/g, ">").replace(/&lt;/g, "<").replace(/&amp;/g, "&") });
   return true;
}

var origCopyLongDesc = copyLongDesc;
copyLongDesc = function(sIdent) {
    if ( copyLongDescFromTinyMCE( sIdent ) ) return;
    console.log("tinymce disabled, copy content from regular textarea");
    origCopyLongDesc( sIdent );
}';
        $sUrlConverter = 'function urlconverter(url, node, on_save) {
      console.log(tinyMCE.activeEditor);
      if(url.indexOf("[{") == 0) return url;
      return (tinyMCE.activeEditor.settings.relative_urls) ? tinyMCE.activeEditor.documentBaseURI.toRelative(url) : tinyMCE.activeEditor.documentBaseURI.toAbsolute(url); 
}';

        // adding scripts to template
        $smarty = Registry::get("oxUtilsView")->getSmarty();
        $sSufix = ($smarty->_tpl_vars["__oxid_include_dynamic"]) ? '_dynamic' : '';

        $aScript = (array)$cfg->getGlobalParameter('scripts' . $sSufix);
        $aScript[] = $sCopyLongDescFromTinyMCE;
        $aScript[] = $sUrlConverter;
        $aScript[] = $sInit;
        $cfg->setGlobalParameter('scripts' . $sSufix, $aScript);

        $aInclude = (array)$cfg->getGlobalParameter('includes' . $sSufix);

        $aExtjs = $cfg->getConfigParam('aTinyMCE_extjs');
        if (!empty($aExtjs) && is_array($aExtjs)) {
            foreach ($aExtjs as $key => $js) {
                $aInclude[3][] = $js;
            }
        }

        $aInclude[3][] = $this->getModuleUrl('vt-tinymce', 'out/tinymce/tinymce.min.js');
        $cfg->setGlobalParameter('includes' . $sSufix, $aInclude);

        return '<li style="margin-left: 50px;"><button style="border: 1px solid #0089EE; color: #0089EE;padding: 3px 10px; margin-top: -10px; background: white;" ' .
            'onclick="tinymce.each(tinymce.editors, function(editor) { if(editor.isHidden()) { editor.show(); } else { editor.hide(); } });"><span>' .
            Registry::getLang()->translateString('BLA_TINYMCE_TOGGLE') . '</span></button></li>';
        // javascript:tinymce.execCommand(\'mceToggleEditor\',false,\'editor1\');
    }

    protected function _getTinyToolbarControls()
    {
        $aControls = (method_exists(
            get_parent_class(__CLASS__),
            __FUNCTION__
        )) ? parent::_getTinyToolbarControls() : array();
        return $aControls;
    }

    protected function _getTinyExtPlugins()
    {
        $aPlugins = Registry::getConfig()->getConfigParam("aTinyMCE_external_plugins");
        if (method_exists(get_parent_class(__CLASS__), __FUNCTION__)) {
            $aPlugins = array_merge(parent::_getTinyExtPlugins(), $aPlugins);
        }
        return $aPlugins;
    }

    protected function _getTinyCustConfig()
    {
        //$oModCfg = ContainerFactory::getInstance()->getContainer()->get(ModuleSettingBridgeInterface::class);
        //$oModCfg->get('setting-name', 'module-id');

        $aConfig = Registry::getConfig()->getConfigParam("aTinyMCE_config");
        if (method_exists(get_parent_class(__CLASS__), __FUNCTION__)) {
            $aConfig = array_merge(parent::_getTinyCustConfig(), $aConfig);
        }
        return $aConfig;
    }
}
