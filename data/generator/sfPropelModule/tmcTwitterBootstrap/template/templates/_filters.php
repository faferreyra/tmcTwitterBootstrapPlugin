[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="admin-bs-filters"
     xmlns="http://www.w3.org/1999/html">
    <div class="modal-dialog">
        <div class="modal-content">
            <form
                action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]"
                method="post"
                role="form"
                class="form-horizontal">
                [?php echo $form->renderHiddenFields() ?]
            <div class="modal-header">

            </div>
            <div class="modal-body">
                [?php if ($form->hasGlobalErrors()): ?]
                [?php echo $form->renderGlobalErrors() ?]
                [?php endif; ?]

                [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
                [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
                [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
                'name'       => $name,
                'attributes' => $field->getConfig('attributes', array()),
                'label'      => $field->getConfig('label'),
                'help'       => $field->getConfig('help'),
                'form'       => $form,
                'field'      => $field,
                'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
                )) ?]
                [?php endforeach; ?]
            </div>
            <div class="modal-footer">
                [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>',
                        array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn btn-default btn-sm')) ?]
                <button type="submit" class="btn btn-primary btn-sm" />[?php echo __('Filter', array(), 'sf_admin') ?]</button>
            </div>
            </form>
        </div>
    </div>
</div>
