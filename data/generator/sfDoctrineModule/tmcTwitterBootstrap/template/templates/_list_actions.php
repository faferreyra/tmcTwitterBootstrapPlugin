<?php if ($actions = $this->configuration->getValue('list.actions')): ?>
<div class="well pull-left">
  <div class="btn-group">
            <?php foreach ($actions as $name => $params): ?>
            <?php if ('_new' == $name): ?>
                <?php echo $this->addCredentialCondition('[?php echo $helper->linkToNew('.$this->asPhp($params).') ?]', $params)."\n" ?>
                <?php elseif ('_import' == $name): ?>
                <?php echo $this->addCredentialCondition('[?php echo $helper->linkToImport('.$this->asPhp($params).') ?]', $params)."\n" ?>
            <?php else: ?>
                <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, false), $params)."\n" ?>
            <?php endif; ?>
        <?php endforeach; ?>

    <?php if ($this->configuration->hasFilterForm()): ?>
        [?php echo $helper->linkToFilters() ?]
    <?php endif; ?>

    [?php if ( $sf_user->getAttribute('<?php echo $this->getModuleName() ?>.filters', false, 'admin_module') && $sf_user->getAttribute('<?php echo $this->getModuleName() ?>.filters', false, 'admin_module')->count() > 0 ): ?]
        [?php echo link_to('<i class="icon-remove icon-black"></i> '. __('Reset filter', array(), 'tmcTwitterBootstrapPlugin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post', 'class' => 'btn')) ?]</li>
    [?php endif ?]
</div>
</div>
<?php endif; ?>
