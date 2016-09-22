<?php

class myComponentOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'myComponentItem';
    public $classKey = 'myComponentItem';
    public $languageTopics = array('mycomponent');
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('mycomponent_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
            $this->modx->error->addField('name', $this->modx->lexicon('mycomponent_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'myComponentOfficeItemCreateProcessor';