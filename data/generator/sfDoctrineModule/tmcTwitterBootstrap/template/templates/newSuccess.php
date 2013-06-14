[?php use_helper('I18N', 'Date') ?]
[?php include_partial('<?php echo $this->getModuleName() ?>/assets') ?]

<div class="container-fluid">
    <div class="row-fluid">
        [?php if ($sidebar_status): ?]
            [?php include_partial('<?php echo $this->getModuleName() ?>/new_sidebar', array('configuration' => $configuration)) ?]
        [?php endif; ?]

        <div class="span[?php echo $sidebar_status ? '10' : '12'; ?]">

            <h2>[?php echo <?php echo $this->getI18NString('new.title') ?> ?]</h2>

            [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]

            <div id="sf_admin_header" class="page-header">
                [?php include_partial('<?php echo $this->getModuleName() ?>/form_header', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
            </div>

            <div id="sf_admin_content">
                [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
            </div>

            <div id="sf_admin_footer">
                [?php include_partial('<?php echo $this->getModuleName() ?>/form_footer', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration)) ?]
            </div>
        </div>
    </div>
</div>

