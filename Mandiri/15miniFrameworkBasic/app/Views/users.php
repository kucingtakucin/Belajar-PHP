<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home MVC</title>
    <link rel="stylesheet" href="<?php echo $GLOBALS['path'] ?>/css/style.css">
  </head>
  <body>
    <h1>Daftar User</h1>

    <?php foreach ($data['users'] as $user){ ?>
      <p> <?php echo $user['username']; ?> </p>
    <?php } ?>
  </body>
</html>
