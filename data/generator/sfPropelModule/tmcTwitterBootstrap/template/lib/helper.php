[?php

/**
 * <?php echo $this->getModuleName() ?> module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage <?php echo $this->getModuleName()."\n" ?>
 * @author     ##AUTHOR_NAME##
 */
abstract class Base<?php echo ucfirst($this->getModuleName()) ?>GeneratorHelper extends sfModelGeneratorHelper
{
    public function linkToNew($params)
    {
        return link_to('<span class="glyphicon glyphicon-plus"></span> ' . __($params['label'], array(), 'sf_admin'),
            '@'.$this->getUrlForAction('new'), array('class' => 'btn btn-success btn-sm'));
    }

    public function linkToEdit($object, $params)
    {
        return link_to('<span class="glyphicon glyphicon-pencil"></span> ' .__($params['label'], array(), 'sf_admin'),
            $this->getUrlForAction('edit'), $object, array('class' => 'btn btn-primary btn-sm'));
    }

    public function linkToDelete($object, $params)
    {
        if ($object->isNew())
        {
            return '';
        }

        return link_to('<span class="glyphicon glyphicon-remove"></span> ' . __($params['label'], array(), 'sf_admin'),
            $this->getUrlForAction('delete'), $object, array('class' => 'btn btn-danger btn-sm', 'method' => 'delete',
                'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm']));
    }

  public function getUrlForAction($action)
  {
    return 'list' == $action ? '<?php echo $this->params['route_prefix'] ?>' : '<?php echo $this->params['route_prefix'] ?>_'.$action;
  }

  public function linkToMoveUp($object, $params)
  {
    if ($object->isFirst())
    {
      return '<li class="sf_admin_action_moveup disabled"><span>'.__($params['label'], array(), 'sf_admin').'</span></li>';
}

    if (empty($params['action']))
    {
      $params['action'] = 'moveUp';
    }

    return '<li class="sf_admin_action_moveup">'.link_to(__($params['label'], array(), 'sf_admin'), '<?php echo $this->params['moduleName'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'</li>';
  }

  public function linkToMoveDown($object, $params)
  {
    if ($object->isLast())
    {
      return '<li class="sf_admin_action_movedown disabled"><span>'.__($params['label'], array(), 'sf_admin').'</span></li>';
    }

    if (empty($params['action']))
    {
      $params['action'] = 'moveDown';
    }

    return '<li class="sf_admin_action_movedown">'.link_to(__($params['label'], array(), 'sf_admin'), '<?php echo $this->params['moduleName'] ?>/'.$params['action'].'?<?php echo $this->getPrimaryKeyUrlParams('$object', true); ?>).'</li>';
  }

    public function linkToList($params)
    {
        return link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list'),
            array('class' => 'btn btn-default btn-sm'));
    }

    public function linkToSave($object, $params)
    {
        return '<input class="btn btn-success" type="submit" value="' . __($params['label'], array(), 'sf_admin') . '" />';
    }

    public function linkToSaveAndAdd($object, $params)
    {
        if (!$object->isNew())
        {
            return '';
        }
        return '<input class="btn btn-primary" type="submit" name="_save_and_add" value="' . __($params['label'], array(), 'sf_admin') . '" />';
    }
}
