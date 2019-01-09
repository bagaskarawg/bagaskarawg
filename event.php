<?php
    include 'config.php';
    if (isset($_GET['id'])) {
        $queryEvent = "SELECT * FROM events WHERE id = {$_GET['id']} ORDER BY date DESC LIMIT 1";
        $result = mysqli_query($link, $queryEvent);
        $event = mysqli_fetch_array($result);
    } else {
        $queryEvents = "SELECT * FROM events ORDER BY date DESC";
        $result = mysqli_query($link, $queryEvents);

        $countQueryEvents = "SELECT count(*) AS count FROM events ORDER BY date DESC";
        $countResult = mysqli_query($link, $countQueryEvents);
        $count = mysqli_fetch_array($countResult);
    }
    include 'includes/header.php';
?>
    <div id="content">
        <?php if (isset($_GET['id'])) : ?>
            <h1 style="color:#666"><?= $event['title'] ?></h1>
            <p style="text-align:center; ">
                Venue: <?= $event['venue'] ?><br><br>
                Date: <?= date('d F Y - H:i:s', strtotime($event['date'])) ?><br><br>
                <img src="<?= $event['image'] ?>" alt="<?= $event['title'] ?>" style="width: 500px; max-width: 100%">
            </p>
            <p style="margin: 0 20px; text-align: justify"><?= $event['content'] ?></p>
            <br>
        <?php else : ?>
            <h1 style="color:#666">events</h1>
            <?php
            if ($count['count'] > 0) :
                $i = 0;
                ?>
                <?php while ($event = mysqli_fetch_array($result)) : ?>
                    <?php
                    switch ($i % 3) {
                        case 1:
                            $col = 'center';
                            break;
                        case 2:
                            $col = 'right';
                            break;
                        default:
                            $col = 'left';
                            echo '<div class="clear"></div><br>';
                            break;
                    }
                    $i++;
                    ?>
                    <div id="column-<?= $col ?>">
                        <div id="content_area">
                            <div id="content-img">
                                <img src="<?= $event['image'] ?>" width="351" height="224" alt=""/>
                            </div>
                            <div id="title_news">
                                <a href="event.php?id=<?= $event['id'] ?>"><?= $event['title'] ?></a>
                            </div>
                            <div id="date">
                                <?= date('d F Y', strtotime($event['date'])) ?>
                            </div>
                            <div id="news">
                                <?= substr($event['content'], 0, 250) ?>
                            </div>
                            <div id="readmore">
                                <a href="event.php?id=<?= $event['id'] ?>">read more...</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="clear"></div>
            <?php else : ?>
                <p style="margin: 0 20px">there are currently no events available</p>
            <?php endif; ?>
        <?php endif; ?>
        <br>
	</div>
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>
