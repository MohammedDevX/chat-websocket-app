<?php 
function sidebare() { 
    require_once "query.php";
    $data1 = query1();
?>
    <div class="sidebare">
            <?php foreach ($data1 as $row) { ?>
                <a href="chat.php?id=<?= $row["user_id"] ?>">
                    <div class="users" data-id="<?= $row["user_id"] ?>">
                        <div>
                            <div class="name">
                                <?= $row["nom"] ?>
                            </div>
                            <div class="message">
                                <?= $row["message"] ?>
                            </div>
                        </div>
                        <div class="time">
                            <?= $row["created_at"] ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
<?php 
}
?>