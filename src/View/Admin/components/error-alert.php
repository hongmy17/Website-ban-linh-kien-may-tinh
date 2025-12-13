<?php if (isset($_SESSION["error"])): ?>
  <div class="alert alert-danger alert-dismissible fade show position-fixed top-0 end-0 mt-3 me-3 shadow" role="alert"
    id="error-alert" style="z-index: 1050; min-width: 250px;">
    <?= $_SESSION["error"];
    unset($_SESSION["error"]); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>