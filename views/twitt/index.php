<div class="row">
    <div class="container">


        <?php if ($this->arrTwitt): ?>

            <?php foreach ($this->arrTwitt as $twitt): ?>

            <?php endforeach; ?>

        <?php else: ?>
            <div>
                <p class="alert alert-danger">Sorry :( There is no Twitts! Be first and write something!</p>

                <?php $this->render('forms/twitt'); ?>
            </div>
        <?php endif; ?>

    </div>
</div>

