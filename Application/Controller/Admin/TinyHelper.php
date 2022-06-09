<?php
namespace VanillaThunder\TinyMCE\Application\Controller\Admin;


class TinyHelper extends \OxidEsales\Eshop\Application\Controller\Admin\AdminController
{
    protected $_sThisTemplate = "tiny/helper.tpl";

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

}
