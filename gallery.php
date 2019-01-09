<?php
    include 'config.php';
    $queryVideo = "SELECT * FROM galleries WHERE type = 'video' ORDER BY date DESC";
    $videoResult = mysqli_query($link, $queryVideo);

    $countQueryGallery = "SELECT count(*) AS count FROM galleries WHERE type = 'video' ORDER BY date DESC";
    $countResult = mysqli_query($link, $countQueryGallery);
    $videoCount = mysqli_fetch_array($countResult);

    $queryPhoto = "SELECT * FROM galleries WHERE type = 'photo' ORDER BY date DESC";
    $photoResult = mysqli_query($link, $queryPhoto);

    $countQueryGallery = "SELECT count(*) AS count FROM galleries WHERE type = 'photo' ORDER BY date DESC";
    $countResult = mysqli_query($link, $countQueryGallery);
    $photoCount = mysqli_fetch_array($countResult);
    include 'includes/header.php';
?>
    <div id="content">
        <div id="photo">
            <h1 style="color:#666">photo gallery</h1>
            <?php
            if ($photoCount['count'] > 0) :
                $i = 0;
                ?>
                <?php while ($photo = mysqli_fetch_array($photoResult)) : ?>
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
                            break;
                    }
                    $i++;
                    ?>
                    <div id="column-<?= $col ?>">
                        <div id="content_area">
                            <div id="content-img">
                                <img src="<?= $photo['url'] ?>" width="351" height="224" alt=""/>
                            </div>
                            <p id="title_news"><?= $photo['title'] ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="clear"></div>
            <?php else : ?>
                <p style="margin: 0 20px">there are currently no photos available</p>
            <?php endif; ?>
        </div>
        <div id="video">
            <h1 style="color:#666">video gallery</h1>
            <?php
            if ($videoCount['count'] > 0) :
                $i = 0;
                ?>
                <?php while ($video = mysqli_fetch_array($videoResult)) : ?>
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
                            break;
                    }
                    $i++;
                    ?>
                    <div id="column-<?= $col ?>">
                        <div id="content_area">
                            <div id="content-img">
                                <iframe style="margin-bottom: 12px" width="100%" height="238" src="https://www.youtube.com/embed/<?= $video['url'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <p id="title_news"><?= $video['title'] ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="clear"></div>
            <?php else : ?>
                <p style="margin: 0 20px">there are currently no videos available</p>
            <?php endif; ?>
        </div>
    </div>
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>
