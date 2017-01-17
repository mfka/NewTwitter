<div class="container text-center">
    <div class="row">
        <?php if ($this->message): ?>
            <div class="alert alert-warning"><span><?php echo $this->message; ?></span></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1): ?>
            <?php ?>
        <?php else: ?>
            <?php $this->render('forms/login'); ?>
            <?php $this->render('forms/register'); ?>
        <?php endif; ?>
    </div>
</div>


