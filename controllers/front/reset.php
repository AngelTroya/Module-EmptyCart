<?php

/**
 *  Module EmptyCart For Help & Support angelmaria87@gmail.com
 *
 *  @author    Ángel María de Troya de la Vega
 *  @copyright 2014
 */
class EmptyCartResetModuleFrontController extends ModuleFrontController {

    public $ssl = true;

    public function initContent() {
        $info = $this->postProcess();

        $arr = array();

        $this->context->smarty->assign('data', $arr);

//        Get links
        $controller_link = Context::getContext()->link->getPageLink('order');
        $this->context->smarty->assign('path', _MODULE_DIR_.$this->module->name);
        $this->context->smarty->assign('controller_link', $controller_link);
        $this->context->smarty->assign('info', $info);

        Tools::redirect($controller_link);

        parent::initContent();
    }

    public function setMedia() {
        if (method_exists($this->context->controller, 'addJquery')) {
            $this->context->controller->addJquery();
//            $this->context->controller->addJqueryPlugin('fancybox');
//            $this->context->controller->addJqueryUI('ui.sortable');
        }

        return parent::setMedia();
    }

    public function postProcess() {
        $info = '';

        if (Tools::isSubmit('btnSubmit')) {

            $id_cart = $this->context->cookie->id_cart;
            if ($id_cart) {
                $this->context->smarty->assign('state', (int)Tools::getValue('state', 0));
                Db::getInstance()->execute('DELETE FROM`'._DB_PREFIX_.'cart` WHERE `id_cart` = '.$id_cart);
            }
        }
        return $info;
    }

    public function ajaxProcessAdminModule() {
        $this->context->smarty->assign(array('content_only' => '1'));

        die('data');
    }

}
