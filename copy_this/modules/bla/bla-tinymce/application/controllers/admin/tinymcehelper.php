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
 
class tinymcehelper extends oxAdminView
{
    protected $_errors;
    protected $_content;

    public function render()
    {
        $oOutput = oxRegistry::get("oxOutput");
        $oOutput->setCharset($this->getCharSet());
        $oOutput->setOutputFormat(oxOutput::OUTPUT_FORMAT_JSON);
        $oOutput->sendHeaders();
        $oOutput->output('errors', $this->_errors);
        $oOutput->output('content', $this->_content);
        exit;
    }

    public function search()
    {
        $cfg = oxRegistry::getConfig();
        
        $what  = $cfg->getRequestParameter("what");
        $where = $cfg->getRequestParameter("where");
        
        $this->_content = $what . ' + '. $where;
    }
    
    public function getCMS()
    {
        $oList = oxNew("oxlist");
        $oList->init("oxcontent");
        $oListObject = $oList->getBaseObject();
        $sViewName = $oListObject->getViewName();
        $sActiveSnippet = $oListObject->getSqlActiveSnippet();
        $sSQL = "SELECT OXID, OXLOADID, OXTITLE FROM {$sViewName} WHERE {$sActiveSnippet} AND {$sViewName}.oxfolder != 'CMSFOLDER_EMAILS'";
        
        $aPages = oxDB::getDb()->getAssoc($sSQL);
        $this->_content = $aPages;
    }
    
    public function oxgetseourl()
    {
        $cfg = oxRegistry::getConfig();
        
        $type = ($cfg->getRequestParameter("type") ? $cfg->getRequestParameter("type") : "oxcontent");
        $oxid = ($cfg->getRequestParameter("oxid") ? $cfg->getRequestParameter("oxid") : "oximpressum");
    }

}
