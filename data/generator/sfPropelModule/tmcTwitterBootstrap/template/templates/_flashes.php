[?php if ($sf_user->hasFlash('notice')): ?]
  <div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      [?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?]
  </div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('error')): ?]
  <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      [?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?]
  </div>
[?php endif; ?]
