<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <?php if ($this->twits): ?>
                <?php foreach ($this->twits as $twitt): ?>
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
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-danger">Sorry :( There is no Twitts! Be first and write something!</div>
            <?php endif; ?>
        </div>
    </div>
</div>




