<?php
/**
 *  Module EmptyCart For Help & Support angelmaria87@gmail.com
 *
 *  @author    Ángel María de Troya de la Vega
 *  @copyright 2014
 */

class EmptyCart extends Module
{
    public function __construct()
    {
        //SET WITH CASE SENSITIVE
        $this->name = 'emptycart';
        //SET TAB
        $this->tab = 'quick_bulk_update';

        $this->version = '1.0';
        $this->author = 'selectomer';
        $this->need_instance = 0;
        $this->module_key = 'module_key';

        parent::__construct();
        //SET
        $this->displayName = $this->l('Empty Cart');
        //SET
        $this->description = $this->l('This module reset the cart');

        $path = dirname(__FILE__);
        if (strpos(__FILE__, 'Module.php') !== false)
            $path .= '/../modules/'.$this->name;


    }

    public function install()
    {
        if (!parent::install() ||
            !$this->registerHook('displayBackOfficeHeader') ||
            !$this->registerHook('displayHeader') ||
            !$this->registerHook('displayShoppingCart'))
            return false;

        // Default Module Configuration
        Configuration::updateValue('CUSTOM_VALUE', 0);

        return true;
    }

    public function uninstall()
    {
       // $id_lang = $this->context->language->id;


        if (!parent::uninstall() ||
            !$this->unregisterHook('displayBackOfficeHeader') ||
            !$this->unregisterHook('displayHeader') ||
            !$this->unregisterHook('displayShoppingCart'))
            return false;

        //Default Module Configuration
        Configuration::deleteByName('CUSTOM_VALUE');

        return true;
    }

    public function hookDisplayBackOfficeHeader(){
        if (method_exists($this->context->controller, 'addJquery'))
        {
            $this->context->controller->addJquery();

        }
    }

    public function hookDisplayHeader(){
        if (method_exists($this->context->controller, 'addJquery'))
        {
            $this->context->controller->addJquery();

        }
    }

    public function hookDisplayShoppingCart()
    {
            //TO DO
            $data = 'TEST';
            $this->smarty->assign('data', $data);
            return $this->display(__FILE__, 'emptycart.tpl');
    }

}