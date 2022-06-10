<?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-succces" role="alert">
            <?= $_GET['msg'] ?>
        </div>
<?php endif; ?>