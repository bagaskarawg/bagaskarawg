<?php
    include 'config.php';
    $queryNews = "SELECT * FROM news ORDER BY date DESC LIMIT 1";
    $result = mysqli_query($link, $queryNews);
    $latestNews = mysqli_fetch_array($result);

    $queryEvent = "SELECT * FROM events ORDER BY date DESC LIMIT 1";
    $result = mysqli_query($link, $queryEvent);
    $latestEvent = mysqli_fetch_array($result);

    $queryGallery = "SELECT * FROM galleries ORDER BY date DESC LIMIT 1";
    $result = mysqli_query($link, $queryGallery);
    $latestGallery = mysqli_fetch_array($result);
    include 'includes/header.php';
?>
    <script type="text/javascript" src="js/jssor.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script type="text/javascript" src="js/slideshow.js"></script>
    <div id="slide">
        <div id="slider2_container" style="position: relative; top: 0px; left: 0px; width:600px;height:425px;">
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                    background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
                    top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
            </div>
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1200px; height: 425px;overflow: hidden;">
                <?php if ($latestNews) : ?>
                    <div>
                        <a u=image href="news.php?id=<?= $latestNews['id']; ?>"><img src="<?= $latestNews['image'] ?>" /></a>
                    </div>
                <?php endif ?>
                <?php if ($latestEvent) : ?>
                    <div>
                        <a u=image href="event.php?id=<?= $latestEvent['id'] ?>"><img src="<?= $latestEvent['image'] ?>" /></a>
                    </div>
                <?php endif?>
                <?php if ($latestGallery) : ?>
                    <?php $image = $latestGallery['type'] == 'photo' ? $latestGallery['url'] : 'https://img.youtube.com/vi/'.$latestGallery['url'].'/0.jpg'; ?>
                    <div>
                        <a u=image href="gallery.php#<?= $latestGallery['type'] ?>"><img src="<?= $image ?>" /></a>
                    </div>
                <?php endif ?>
            </div>
            <div u="navigator" class="jssorb01" style="bottom: 16px; right:0px;">
                <div u="prototype"></div>
            </div>
        </div>
    </div>
    <div id="content" style="margin-top:0;">
        <div id="column-left">
            <div id="content_area">
                <h1 style="color:#666">latest news</h1>
                <?php if ($latestNews) : ?>
                    <div id="content-img">
                        <img src="<?= $latestNews['image'] ?>" width="351" height="224" alt=""/>
                    </div>
                    <div id="title_news">
                        <a href="news.php?id=<?= $latestNews['id'] ?>"><?= $latestNews['title'] ?></a>
                    </div>
                    <div id="date">
                        <?= date('d F Y', strtotime($latestNews['date'])) ?>
                    </div>
                    <div id="news">
                        <?= substr($latestNews['content'], 0, 250) ?>
                    </div>
                    <div id="readmore">
                        <a href="news.php?id=<?= $latestNews['id'] ?>">read more...</a>
                    </div>
                <?php else: ?>
                    <p>there are currently no news available</p>
                <?php endif; ?>
            </div>
        </div>
        <div id="column-center">
            <div id="content_area">
                <h1 style="color:#666">latest event</h1>
                <?php if ($latestEvent) : ?>
                    <div id="content-img">
                        <img src="<?= $latestEvent['image'] ?>" width="351" height="224" alt=""/>
                    </div>
                    <div id="title_news">
                        <a href="event.php?id=<?= $latestEvent['id'] ?>"><?= $latestEvent['title'] ?></a>
                    </div>
                    <div id="date">
                        <?= date('d F Y', strtotime($latestEvent['date'])) ?>
                    </div>
                    <div id="news">
                        <?= substr($latestEvent['content'], 0, 250) ?>
                    </div>
                    <div id="readmore">
                        <a href="event.php?id=<?= $latestEvent['id'] ?>">read more...</a>
                    </div>
                <?php else: ?>
                    <p>there are currently no events available</p>
                <?php endif; ?>
            </div>
        </div>
        <div id="column-right">
            <div id="content_area">
                <h1 style="color:#666">profile</h1>
                <div id="content-img" style="text-align:center">
                    <img src="https://yuca.co/images/bagaskara.1545724660.jpg" width="224" height="224" alt=""/>
                </div>
                <div id="title_news">
                    <a href="profile.php">Profile</a>
                </div>
                <div id="date">
                    24 Juni 1997
                </div>
                <div id="news">
                    Nama: Bagaskara Wisnu Gunawan<br>
                    NIM: 41816110066<br>
                    Semester: 5<br>
                    Fakultas: Ilmu Komputer<br>
                    Program Studi: Sistem Informasi<br>
                    Universitas Mercu Buana<br>
                </div>
                <div id="readmore">
                    <a href="profile.php">read more...</a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <br>
	</div>
<?php include 'includes/footer.php' ?>
</div>
</body>
</html>
