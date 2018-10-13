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
namespace bla\tinymce\application\controllers\admin;

use OxidEsales\Eshop\Application\Controller\Admin\AdminController;
use OxidEsales\Eshop\Application\Model\Content;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Model\ListModel;
use OxidEsales\Eshop\Core\Output;
use OxidEsales\Eshop\Core\Registry;

/**
 * Class tinymcehelper
 *
 * @package bla\tinymce\application\controllers\admin
 */
class tinymcehelper extends AdminController
{
    protected $_errors;
    protected $_content;

    public function render()
    {
        $oOutput = Registry::get(Output::class);
        $oOutput->setCharset($this->getCharSet());
        $oOutput->setOutputFormat(Output::OUTPUT_FORMAT_JSON);
        $oOutput->sendHeaders();
        $oOutput->output('errors', $this->_errors);
        $oOutput->output('content', $this->_content);
        exit;
    }

    public function search()
    {
        $cfg = Registry::getRequest();
        
        $what  = $cfg->getRequestParameter("what");
        $where = $cfg->getRequestParameter("where");
        
        $this->_content = $what . ' + '. $where;
    }

    /**
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function getCMS()
    {
        /** @var ListModel $oList */
        $oList = oxNew(ListModel::class);
        $oList->init(Content::class);

        /** @var Content $oListObject */
        $oListObject = $oList->getBaseObject();
        $sViewName = $oListObject->getViewName();
        $sActiveSnippet = $oListObject->getSqlActiveSnippet();
        $sSQL = "SELECT OXID, OXLOADID, OXTITLE FROM {$sViewName} WHERE {$sActiveSnippet} AND {$sViewName}.oxfolder != 'CMSFOLDER_EMAILS'";
        
        $aPages = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll($sSQL);
        $this->_content = $aPages;
    }
}
