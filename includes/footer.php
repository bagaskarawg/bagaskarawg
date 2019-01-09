<?php
include 'config.php';
$queryVideo = "SELECT * FROM galleries WHERE type = 'video' ORDER BY date DESC LIMIT 1";
$result = mysqli_query($link, $queryVideo);
$latestVideo = mysqli_fetch_array($result);

$queryCountGalleries = "SELECT COUNT(*) AS count FROM galleries WHERE type = 'photo'";
$resultCount = mysqli_query($link, $queryCountGalleries);
$count = mysqli_fetch_array($resultCount);
?>
<script type="text/javascript" src="js/thumbmail-gallery.js"></script>
<div id="footer">
    <div id="column-left">
        <div id="content_area">
            <h1 style="color:orange">contact</h1>
            <div id="footer_contact">
                Green Hill Resort Ciherang, Pacet, Ciherang, Pacet, Kabupaten Cianjur, Jawa Barat 43253</br></br>
                T : 0263 5840 816</br></br>
                ext: 2751</br></br>
                F : 0263 5840 015</br></br>
                E : <a href="mailto:me@bagaskarawg.id">me@bagaskarawg.id</a></br></br>
            </div>
            <div id="button" style="margin-top: 5px;">
                <a href="contact.php" class="button-blue" style="text-decoration: none;">Send Message</a>
            </div>
        </div>
    </div>
    <div id="column-center">
        <div id="content_area">
            <h1 style="color:orange">Photo Gallery</h1>
            <?php
                $i = 0;
                $queryGalleries = "SELECT * FROM galleries WHERE type = 'photo' ORDER BY date DESC LIMIT 16";
                $result = mysqli_query($link, $queryGalleries);
                while ($row = mysqli_fetch_array($result)) :
            ?>
                <?php if ($i % 4 == 0) : ?>
                <div class="row">
                <?php endif ?>
                    <div class="column">
                        <img src="<?= $row['url'] ?>" style="width:100%" onclick="openModal();currentSlide(<?= $i + 1 ?>)" class="hover-shadow cursor">
                    </div>
                <?php if ($i % 4 == 3 || $i + 1 == $count['count']) : ?>
                </div>
                <?php endif ?>
            <?php
                    $i++;
                    endwhile; ?>
            <div id="myModal" class="modal">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">
                    <?php
                        $i = 0;
                        $queryGalleries = "SELECT * FROM galleries WHERE type = 'photo' ORDER BY date DESC LIMIT 16";
                        $result = mysqli_query($link, $queryGalleries);
                        while ($row = mysqli_fetch_array($result)) :
                            $i++;
                    ?>
                    <div class="mySlides">
                        <div class="numbertext"><?= $i ?> / <?= $count['count'] ?></div>
                        <img src="<?= $row['url'] ?>" style="width:100%" alt="<?= $row['title'] ?>">
                    </div>
                    <?php endwhile ?>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <div class="caption-container">
                        <p id="caption"><a href="gallery.php#photo" class="button-red">More Photo</a></p>
                    </div>
                </div>
            </div>
            <div id="button">
                <a href="gallery.php#photo" class="button-green" style="text-decoration: none">More Photo</a>
            </div>
        </div>
    </div>
    <div id="column-right">
        <div id="content_area">
            <h1 style="color:orange">Video Gallery</h1>
            <iframe style="margin-bottom: 12px" width="100%" height="238" src="https://www.youtube.com/embed/<?= $latestVideo['url'] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div id="button">
                <a href="gallery.php#video" class="button-orange" style="text-decoration: none">More Video</a>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
    <div id="medsos">
    <div id="medsos_area">
        <div class="row">
            <div class="column">
                <a href="https://facebook.com/kars.xitachi" target="_blank">
                    <img src="images/ico_fb.png" style="width:100%" class="hover-shadow cursor">
                </a>
            </div>
            <div class="column">
                <a href="https://instagram.com/bagaskarawisnugunawan" target="_blank">
                    <img src="images/ico_ig.png" style="width:100%" class="hover-shadow cursor">
                </a>
            </div>
            <div class="column">
                <a href="https://twitter.com/KaRSxX" target="_blank">
                    <img src="images/ico_tw.png" style="width:100%" class="hover-shadow cursor">
                </a>
            </div>
            <div class="column">
                <a href="https://www.youtube.com/channel/UCzsKyh_mG4PXc6KDWnTlq6Q?view_as=subscriber" target="_blank">
                    <img src="images/ico_yt.png" style="width:100%" class="hover-shadow cursor">
                </a>
            </div>
        </div>
    </div>
    <div id="copyright">&copy; 2018 | <a href="https://www.bagaskarawg.id">www.bagaskarawg.id</a></div>
</div>