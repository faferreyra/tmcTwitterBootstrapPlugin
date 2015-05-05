<?php

abstract class tmcTwitterBootstrapFormPropel extends sfFormPropel
{
    private $formControlWidgets = array(
        'sfWidgetFormInputText',
        'sfWidgetFormTextArea',
        'sfWidgetFormChoice',
        'sfWidgetFormPropelChoice'
    );

    public function setup()
    {
        foreach ($this->getWidgetSchema()->getFields() as $name => $field)
        {
            $originalCssClasses = $this->getWidget($name)->getAttribute('class');
            if (in_array(get_class($field), $this->formControlWidgets)) {
                $cssClass = $originalCssClasses . ' form-control';
                $this->getWidget($name)->setAttribute('class', $cssClass);
            }

            if ($field instanceof sfWidgetFormDate)
            {
                $this->widgetSchema[$name]->setOption('format', '%year%-%month%-%day%');
                $this->getWidget($name)->setAttribute('class', 'date');
            }

            if ($field instanceof sfWidgetFormInputCheckbox)
            {
                // $this->widgetSchema[$name] = new sfWidgetFormBootstrapCheckbox($field->getOptions());
            }

            if (in_array($name, $this->getUnsetFields()))
            {
                unset($this[$name]);
            }

            if ($this->isI18n())
            {
                $this->embedI18n(sfConfig::get('app_langs_enabled', array()));
            }

            $this->getWidgetSchema()->getFormFormatter()->setTranslationCatalogue('messages');
        }
    }

    protected function getUnsetFields()
    {
        return array('slug', 'created_at', 'updated_at', 'created_by', 'updated_by');
    }
}