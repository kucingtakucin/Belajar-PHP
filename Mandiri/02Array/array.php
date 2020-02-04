<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Belajar PHP</title>
  </head>
  <body>

    <h1>Array PHP</h1>

    <?php
      //------- tipe data array -------
      // $angka = [5, 10,2, 1, 6];
      // $kotak = array('anjing', 'kurakura', 'koala', 'banteng');
      // $nama  = ['Hilman', 'Endy', 'Tiqa'];

      //print_r($kotak);
      //echo $nama[0];

      //-------- metode array -----------
      //array_unique, _reverse, shuffle, count, sort

      // sort($angka);
      // print_r( $angka );

      //echo count($nama);

      //-------- Associative array -----------
      // key => isi
      //
      // $data = array( "nama"  => "hilman" ,
      //                "umur"  => 21 ,
      //                "kerja" => "pengacara"
      //         );
      //
      // $data2 = array( "istri"  => " belum ada " ,
      //                 "laptop"  => "ChromeBook"
      //         );

      //print_r($data);
      // $data['nama'] = "Hilman Ramadhan";
      // echo "Nama adalah " . $data['nama'];

      //---------- methode assosiatif array -----
      // array_values array_keys array_merge
      //print_r( array_merge($data, $data2) );

      ///----------multi dimensi array---------
      // array di dalam array ( lebih dari satu)

      $data = array(
                array("programmer", "21", "males"),
                array("designer", "24", "rajin"),
                array("manager", "34", "males banget")
              );

      // 00 01 02
      // 10 11 12
      // 20 21 22

      $data[2][0] = "proyek manager";
      echo $data[2][0];


    ?>

  </body>
</html>
