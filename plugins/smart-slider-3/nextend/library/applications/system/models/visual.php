<?php

class N2SystemVisualModel extends N2Model
{

    public $type = '';

    public $storage;

    public function __construct($tableName = null) {

        $this->storage = N2Base::getApplication('system')->storage;
        parent::__construct($tableName);
    }

    public function renderSetsForm() {

        $configurationXmlFile = $this->getPath() . '/forms/' . $this->type . '/sets.xml';

        N2Loader::import('libraries.form.form');
        $form = new N2Form();
        $form->loadXMLFile($configurationXmlFile);

        echo $form->render($this->type . 'set');
    }

    protected function getPath() {
        return dirname(__FILE__);
    }

    public function getSets() {
        return $this->storage->getAll($this->type . 'set');
    }

    public function getSetByVisualId($visualId) {
        $visual = $this->storage->getById($visualId, $this->type);
        if (!empty($visual)) {
            return array(
                'setId'   => $visual['referencekey'],
                'visuals' => $this->getVisuals($visual['referencekey'])
            );
        }
        return false;
    }

    public function createSet($name) {

        $setId = $this->storage->add($this->type . 'set', null, $name);

        $set = $this->storage->getById($setId, $this->type . 'set');
        if (!empty($set) && $set['section'] == $this->type . 'set') {
            return $set;
        }
        return false;
    }

    public function renameSet($setId, $name) {
        $set = $this->storage->getById($setId, $this->type . 'set');
        if (!empty($set) && $set['section'] == $this->type . 'set' && $set['editable']) {
            if ($this->storage->setById($setId, $name)) {
                $set['value'] = $name;
                return $set;
            }
        }
        return false;
    }

    public function deleteSet($setId) {
        $set = $this->storage->getById($setId, $this->type . 'set');
        if (!empty($set) && $set['section'] == $this->type . 'set' && $set['editable'] && $set['system'] == 0) {
            if ($this->storage->deleteById($setId)) {
                return $set;
            }
        }
        return false;
    }

    public function addVisual($setId, $visual) {

        $visualId = $this->storage->add($this->type, $setId, $visual);

        $visual = $this->storage->getById($visualId, $this->type);
        if (!empty($visual) && $visual['section'] == $this->type) {
            return $visual;
        }
        return false;
    }

    public function deleteVisual($id) {
        $visual = $this->storage->getById($id, $this->type);
        if (!empty($visual) && $visual['section'] == $this->type) {
            $this->storage->deleteById($id);
            return $visual;
        }
        return false;
    }

    public function changeVisual($id, $value) {
        if ($this->storage->setById($id, $value)) {
            return $this->storage->getById($id, $this->type);
        }
        return false;
    }

    public function getVisuals($setId) {
        return $this->storage->getAll($this->type, $setId);
    }

}