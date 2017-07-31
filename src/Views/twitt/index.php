<div class="container">

    <?php var_dump($this); ?>

    <?php if ($this->twits): ?>

        <?php foreach ($this->twits as $twitt): ?>
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

        <!--        <div class="row">-->
        <!--            <p class="alert alert-danger">Sorry :( There is no Twitts! Be first and write something!</p>-->
        <!--        </div>-->

    <?php endif; ?>

</div>



