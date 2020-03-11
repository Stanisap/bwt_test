<div class="container">
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-6">
            <?php 
            for ($i = 0; $i < count($data); $i++) {
                ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading"><?= $data[$i]['user']['first_name'] . " " . $data[$i]['user']['last_name']; ?></h4><br>
                        <p class="list-group-item-text"><?= $data[$i]['text']; ?></p>
                        <time class="badge"><?= $data[$i]['date']; ?></time>
                    </li>
                </ul>
                <?php
            }
            ?>
            <div class="btn-group col-centered" role="group" aria-label="...">
                <a href="/feetback/form" class="btn btn-default active">Оставить отзыв</a>
            </div>
        </div>
    </div>
</div>