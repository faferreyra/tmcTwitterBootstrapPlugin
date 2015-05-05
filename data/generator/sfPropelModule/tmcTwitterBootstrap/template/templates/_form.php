[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div>
  [?php echo form_tag_for($form, '@<?php echo $this->params['route_prefix'] ?>', array('role' => 'form', 'class' => 'form-horizontal')) ?]
    [?php echo $form->renderHiddenFields(false) ?]

    [?php if ($form->hasGlobalErrors()): ?]
      <div class="alert alert-error">
        [?php echo $form->renderGlobalErrors() ?]
      </div>
    [?php endif; ?]

    [?php foreach ($configuration->getFormFields($form, $form->isNew() ? 'new' : 'edit') as $fieldset => $fields): ?]
      [?php include_partial('<?php echo $this->getModuleName() ?>/form_fieldset', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'fields' => $fields, 'fieldset' => $fieldset)) ?]
    [?php endforeach; ?]

    <div class="panel panel-default panel-form-actions">
      <div class="panel-body">
        <div class="panel-footer">
          <div class="row">
            <div class="col-sm-offset-6 col-sm-6 text-right">
                [?php include_partial('<?php echo $this->getModuleName() ?>/form_actions', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
