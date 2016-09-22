<?php

/**
 * The home manager controller for myComponent.
 *
 */
class myComponentHomeManagerController extends modExtraManagerController
{
    /** @var myComponent $myComponent */
    public $myComponent;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('mycomponent_core_path', null,
                $this->modx->getOption('core_path') . 'components/mycomponent/') . 'model/mycomponent/';
        $this->myComponent = $this->modx->getService('mycomponent', 'myComponent', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('mycomponent:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('mycomponent');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->myComponent->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->myComponent->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/mycomponent.js');
        $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/widgets/items.grid.js');
       // $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/widgets/items.form.js');        $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->myComponent->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        myComponent.config = ' . json_encode($this->myComponent->config) . ';
        myComponent.config.connector_url = "' . $this->myComponent->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "mycomponent-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->myComponent->config['templatesPath'] . 'home.tpl';
    }
}