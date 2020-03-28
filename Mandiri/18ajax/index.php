<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Komentar Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <style media="screen">
      * {
        font-family: 15px; font-family: sans-serif;
      }
      body { width: 80%; margin: 10% auto;}
      button {
        background-color: red; color: white; border: none;
      }
    </style>
  </head>
  <body>
    <h1>Artikel SekolahKoding</h1>
    <p> ini isi artikelnya </p>

    <textarea name="textarea_komentar" id="textarea_komen" rows="8" cols="40"></textarea> <br>
    <input type="submit" name="submit_komen" id="submit_komen" value="Submit">
    <div id="komentar_wrapper">
      <?php
        include_once 'database.php';
        $query = "SELECT * FROM komentar ORDER BY id DESC";
        $comments = mysqli_query($link, $query);

        foreach ($comments as $comment) { ?>
          <p class="komentar_text" id="komentar_<?=$comment['id'];?>" data-id="<?=$comment['id'];?>"> <?=$comment['isi_komentar']; ?></p>
          <button type="button" class="hapus_komentar" data-id="<?=$comment['id'];?>">Hapus</button>
          <button type="button" class="edit_komentar" data-id="<?=$comment['id'];?>">Edit</button>
      <?php } ?>
    </div>

    <script type="text/javascript">

      $('#submit_komen').on('click',function(){
        var isi = $('#textarea_komen').val();
        $.ajax({
          method: "POST",
          url: "komentar_ajax.php",
          data: { isi_komentar : isi, type:"insert"},
          success: function(data){
            if(data == '0'){
              alert("anda harus login!");
            }else{
              $('#textarea_komen').val("");
              $('#komentar_wrapper').prepend(data);
            }
          }
        });
      });

      $(document).on('click','.hapus_komentar',function(){
        var id = $(this).attr('data-id');
        $.ajax({
          method: "POST",
          url: "komentar_ajax.php",
          data: { id_komen:id , type:"delete"},
          success: function(data){
            if(data == '0'){
              alert("anda harus login!");
            }else if(data == '1'){
              $("#komentar_"+id).fadeOut();
            }
          }
        });
      });

      $(document).on('click','.komentar_text',function(){
        var id = $(this).attr('data-id');
        var textbox = $(document.createElement('textarea')).attr('id','textarea_'+id);
        $(this).replaceWith(textbox);
      });

      $(document).on('click','.edit_komentar',function(){
        var id = $(this).attr('data-id');
        var isi = $('#textarea_'+id).val();
        var text = $(document.createElement('p')).attr({
                                'id':'textarea_'+id,
                                'class':'komentar_text',
                                'data-id':id
                      }).text(isi);

        $.ajax({
          method: "POST",
          url: "komentar_ajax.php",
          data: { isi_komen:isi, id_komen:id , type:"update"},
          success: function(data){
            console.log(data);
            if(data == '0'){
              alert("anda harus login!");
            }else if(data == '1'){
              $('#textarea_'+id).replaceWith(text);
            }
          }
        });
      });
    </script>















  </body>
</html>
