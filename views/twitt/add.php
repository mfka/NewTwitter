<div class="container">

    <?php if ($this->message): ?>
        <p class="alert alert-warning"><?php echo $this->message; ?></p>
    <?php endif; ?>

    <?php $this->render('forms/twitt'); ?>

    <?php if ($this->arrTwitts): ?>

        <?php foreach ($this->arrTwitts as $twitt): ?>
            <div class="container">
                <div class="row top-buffer">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="text-left">
                                <img src="<?php echo $twitt['photo'] ?>">
                                <?php echo $twitt['name']; ?>
                            </div>
                            <hr>
                            <div>
                                <?php echo $twitt['text']; ?>
                            </div>
                            <div class="text-right">
                                <strong><?php echo $twitt['publish']; ?></strong>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        <?php endforeach; ?>

    <?php else: ?>

        <div class="row">
            <p class="alert alert-danger">Sorry :( There is no Twitts! Be first and write something!</p>
        </div>

    <?php endif; ?>

</div>



