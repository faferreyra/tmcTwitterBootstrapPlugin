<?php foreach ($this->configuration->getValue('show.display') as $title => $fields): ?>
   <?php if('NONE' !== $title): ?>
    <h2>[?php echo __('<?php echo $title ?>') ?]</h2>
    <?php endif ?>

<table class="table table-bordered table-striped table-show" id="show_<?php echo $this->getModuleName() ?>">
        <tbody>
        <?php foreach ($fields as $name => $field): ?>
            <?php if ($field->isPartial()): ?>
                [?php include_partial('<?php echo $this->getModuleName() ?>/<?php echo $name ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
            <?php elseif ($field->isComponent()): ?>
                [?php include_component('<?php echo $this->getModuleName() ?>', '<?php echo $name ?>', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>)) ?]
            <?php else: ?>
                <tr>
                <th>[?php echo __('<?php echo $field->getConfig('name', sfInflector::humanize(sfInflector::underscore($name))) ?>', array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</th>
            <?php echo $this->addCredentialCondition(sprintf(<<<EOF
<td class="sf_admin_%s sf_admin_list_th_%s">
[?php echo %s ?]
</td>
EOF
, strtolower($field->getType()), $name, $this->renderField($field)), $field->getConfig()) ?>
                </tr>
            <?php endif ?>
        <?php endforeach; ?>
    </tbody>
    </table>
<?php endforeach ?>
