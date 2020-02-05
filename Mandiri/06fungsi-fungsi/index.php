<?php require_once('header.php'); ?>

    <main>
      Selamat datang di sekolah koding, tempat
      belajar programming online.

      <h2>Implode dan Explode</h2>

      <?php
      //implde(separator, array)
      $pekerjaan = ["programmer", "designer", "manager"];
      echo implode(" | ", $pekerjaan);

      echo " <br> ";

      $pelajaran = "html css javascript php";
      print_r( explode(" ", $pelajaran) );

      ?>

      <h2>Fungsi Date</h2>

      <?php
        echo date('d - M - Y');
      ?>

      <h2>Trim dan Strip Tags</h2>

      <?php
        $text = " ini adalah input user ";

        echo "sebelum" . $text . "disini";
        echo "<br>";
        echo "sesudah" . trim($text) . "disini";
        echo "<br>";

        $text2 = "<script>alert('halo semuanya!')</script>";
        $text3 = "<b> Halo </b> semuanya";
        echo strip_tags($text3, '<b>');
      ?>



    </main>

<?php require_once('footer.php'); ?>
