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

class oxviewconfig_hditinymce extends oxviewconfig_hditinymce_parent
{
    public function getTinyPlugins()
    {
        $cfg = oxRegistry::getConfig();

        $aAvailablePlugins = array("advlist","anchor","autolink",/*"autoresize", // bad for oxid frameset*/
            "autosave","bbcode","charmap","code", /* "compat3x", // we dont use old v3.x modules */
            "contextmenu","directionality","emoticons",/*"example","example_dependency","fullpage",*/
            "fullscreen","hr","image","insertdatetime",/*"layer", // nobody knows what exactly it does, will be removed soon */
            "link","lists",/*"importcss",*/"media","nonbreaking","noneditable","pagebreak",
            "paste","preview","print",/*"save", // will add custom save button. will not work in oxid*/
            "searchreplace","spellchecker","tabfocus",
            "table","template","textcolor","visualblocks","visualchars","wordcount");
        if($this->getActiveClassName() == "newsletter_main") $aPlugins[] = "legacyoutput";

        $aPlugins = array();

        foreach($aAvailablePlugins as $plugin)
        {
            if($cfg->getConfigParam("bTinyMCE_".$plugin)) $aPlugins[] = $plugin;
        }

        return (count($aPlugins)) ? $aPlugins : false;
    }
    public function getTinyExtPlugins()
    {
        $aPlugins = oxRegistry::getConfig()->getConfigParam("aTinyMCE_external_plugins");
        if(function_exists("getExtPlugins")) $aPlugins = array_merge(parent::getExtPlugins(), $aPlugins);
        return $aPlugins;
    }

    public function getTinyExtControls()
    {
        $sExtControls = oxRegistry::getConfig()->getConfigParam("sTinyMCE_external_controls");
        if(function_exists("getExtPlugins")) $sExtControls = parent::getExtControls()." ". $sExtControls;
        return $sExtControls;
    }

    public function getTinyExtConfig()
    {
        $aExtConfig = oxRegistry::getConfig()->getConfigParam("aTinyMCE_external_config");
        if(function_exists("getExtConfig")) $aExtConfig = array_merge(parent::getExtConfig(), $aExtConfig);
        return $aExtConfig;
    }
}