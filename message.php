<?php
    //buat koneksi dengan MySQL
    $link=mysql_connect('localhost','root','');

    //jika koneksi gagal, langsung keluar dari PHP
    if (!$link)
    {
       die("Koneksi dengan MySQL gagal");
    }

    //gunakan database contact_db
    $result=mysql_query('USE contact_db');
    if (!$result)
    {
       die("Database contact_db gagal digunakan");
    }

    //tampilkan tabel message
	$result=mysql_query('SELECT * FROM message');
	include 'includes/header.php';
?>
    <div id="contact-page">
        <div class="container" style="padding-top: 15px;">
            <h1>Pesan Masuk</h1>
            <table style="border: 1px dashed #ccc; padding:5px auto; width: 90%; margin: 0 auto;">
                <tr>
                    <th style="border: 1px dashed #ccc; padding:5px auto">Name</th>
                    <th style="border: 1px dashed #ccc; padding:5px auto">Email</th>
                    <th style="border: 1px dashed #ccc; padding:5px auto">Gender</th>
                    <th style="border: 1px dashed #ccc; padding:5px auto">Country</th>
                    <th style="border: 1px dashed #ccc; padding:5px auto">Subject</th>
                </tr>
                <?php
                    while ($row=mysql_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['gender']."</td>";
                        echo "<td>".$row['country']."</td>";
                        echo "<td>".$row['subject']."</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</div>
</body>
</html>
