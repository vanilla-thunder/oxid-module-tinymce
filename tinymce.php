<?php

/**
 * HDI TinyMCE
 * Copyright (C) 2012-2013  HEINER DIRECT GmbH & Co. KG
 * info:  oxid@heiner-direct.com
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 */
class tinyMCE extends tinyMCE_parent
{

    protected function _generateTextEditor($iWidth, $iHeight, $oObject, $sField, $sStylesheet = null)
    {
        $myConfig  = oxRegistry::getConfig();
        $aClasses  = $myConfig->getConfigParam("aTinyMCE_classes");
        $aPlainCms = $myConfig->getConfigParam("aTinyMCE_plaincms");

        if (in_array($this->getClassName(), $aClasses) && !in_array($oObject->oxcontents__oxloadid->value, $aPlainCms))
        {
            $oViewConf = $this->_aViewData["oViewConf"];
            $smarty    = oxRegistry::get("oxUtilsView")->getSmarty();

            //$sEditor = $smarty->fetch($myConfig->getModulesDir()."hdi/hdi-tinymce/test.tpl");

            if ($oObject)
            {
                $sInitialValue = '';
                if ($oObject->$sField instanceof oxField)
                {
                    $sInitialValue = $oObject->$sField->getRawValue();
                }
                else
                {
                    $sInitialValue = $oObject->$sField->value;
                }
                $sLang = oxRegistry::getLang()->getLanguageAbbr(oxRegistry::getLang()->getTplLanguage());
                // array to assign shops lang abbreviations to lang file names of tinymce: shopLangAbbreviation => fileName (without .js )
                $aLang = array("cs" => "cs", "da" => "da", "de" => "de", "fr" => "fr_FR", "it" => "it", "nl" => "nl", "ru" => "ru");
                $smarty->assign("sEditorLang", (in_array($sLang, $aLang) ? $aLang[$sLang] : "en"));

                //$oObject->$sField = new oxField(str_replace('[{$shop->currenthomedir}]', $myConfig->getCurrentShopURL(), $sInitialValue), oxField::T_RAW);
                $smarty->assign("sField", $sField);
                $smarty->assign("iWidth", (strpos($iWidth, '%') === false) ? $iWidth . 'px' : $iWidth);
                //$smarty->assign("iHeight", "80%");
                $smarty->assign("iHeight", (strpos($iHeight, '%') === false) ? $iHeight . 'px' : $iHeight);
                $smarty->assign("sContent", $this->_getEditValue($oObject, $sField));

                //var_dump($myConfig->getModulesDir()."hdi/hdi-tinymce/test.tpl");
                $smarty->assign("cfg", $myConfig);
                $oVC = $this->_aViewData["oViewConf"];
                $smarty->assign("oViewConf", $oVC);

                //external plugins & controls
                $smarty->assign("extPlugins",  $oVC->getExtPlugins());
                $smarty->assign("extControls", $oVC->getExtControls());
                $smarty->assign("extConfig",   $oVC->getExtConfig());

                $sEditor = $smarty->fetch("tinymce.tpl");
            }

            return $sEditor;
        }
        else
        {
            //returning default textarea or whatever
            $sEditor = parent::_generateTextEditor($iWidth, $iHeight, $oObject, $sField, $sStylesheet);
            if (in_array($oObject->oxcontents__oxloadid->value, $aPlainCms))
            {
                $sEditor .= oxRegistry::getLang()->translateString("hdi_tinymce_plaincms");
            }

            return $sEditor;
        }
    }



}