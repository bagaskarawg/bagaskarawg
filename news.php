<?php
    include 'config.php';
    if (isset($_GET['id'])) {
        $queryNews = "SELECT * FROM news WHERE id = {$_GET['id']} ORDER BY date DESC LIMIT 1";
        $result = mysqli_query($link, $queryNews);
        $news = mysqli_fetch_array($result);
    } else {
        $queryNews = "SELECT * FROM news ORDER BY date DESC";
        $result = mysqli_query($link, $queryNews);

        $countQueryNews = "SELECT count(*) AS count FROM news ORDER BY date DESC";
        $countResult = mysqli_query($link, $countQueryNews);
        $count = mysqli_fetch_array($countResult);
    }
    include 'includes/header.php';
?>
    <div id="content">
        <?php if (isset($_GET['id'])) : ?>
            <h1 style="color:#666"><?= $news['title'] ?></h1>
            <p style="text-align:center; ">
                <?= date('d F Y - H:i:s', strtotime($news['date'])) ?><br><br>
                <img src="<?= $news['image'] ?>" alt="<?= $news['title'] ?>" style="width: 500px; max-width: 100%">
            </p>
            <p style="margin: 0 20px; text-align: justify"><?= $news['content'] ?></p>
            <br>
        <?php else : ?>
            <h1 style="color:#666">news</h1>
            <?php
            if ($count['count'] > 0) :
                $i = 0;
                ?>
                <?php while ($news = mysqli_fetch_array($result)) : ?>
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
                            echo '<div class="clear"></div>';
                            break;
                    }
                    $i++;
                    ?>
                    <div id="column-<?= $col ?>">
                        <div id="content_area">
                            <div id="content-img">
                                <img src="<?= $news['image'] ?>" width="351" height="224" alt=""/>
                            </div>
                            <div id="title_news">
                                <a href="news.php?id=<?= $news['id'] ?>"><?= $news['title'] ?></a>
                            </div>
                            <div id="date">
                                <?= date('d F Y', strtotime($news['date'])) ?>
                            </div>
                            <div id="news">
                                <?= substr($news['content'], 0, 250) ?>
                            </div>
                            <div id="readmore">
                                <a href="news.php?id=<?= $news['id'] ?>">read more...</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="clear"></div>
            <?php else : ?>
                <p style="margin: 0 20px">there are currently no news available</p>
            <?php endif; ?>
        <?php endif; ?>
        <br>
	</div>
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>
