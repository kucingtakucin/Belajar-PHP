<?php
  require_once 'core/init.php';

  if( $user->is_loggedIn() ){
    Redirect::to('profile');
  }

  $errors = array();

  if( Input::get('submit') ){
    if( Token::check( Input::get('token') ) ){

    // 1. memanggil objek validasi
    $validation = new Validation();

    // 2. metode check
    $validation = $validation->check(array(
      'username' => array(
                      'required' => true,
                      'min'      => 3,
                      'max'      => 50,
                    ),
      'password' => array(
                      'required' => true,
                      'min'      => 3,
                    ),
      'password_verify' => array(
                      'required' => true,
                      'match'    => 'password'
                    )
    ));


    //menguji apakah nama sudah ada atau belum di database
    if( $user->cek_nama(Input::get('username')) ){
      $errors[] = 'nama sudah terdaftar';
    }else{
      // 3. lolos ujian
      if ( $validation->passed() ){

        $user->register_user(array(
          'username' => Input::get('username'),
          'password' => password_hash(Input::get('password'), PASSWORD_DEFAULT)
        ));

        Session::flash('profile', 'selamat! anda berhasil mendaftar');
        Session::set('username', Input::get('username'));
        Redirect::to('profile');

      }else{
        $errors = $validation->errors();
      }
    }
  }
  }


  require_once 'templates/header.php';
?>

<h2>Daftar Di sini</h2>

<form action="register.php" method="post">
  <label>Username</label>
  <input type="text" name="username"> <br>

  <label>Password</label>
  <input type="password" name="password"> <br>

  <label>Ulangi password</label>
  <input type="password" name="password_verify"> <br>

  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

  <input type="submit" name="submit" value="Daftar Sekarang">

  <?php if(!empty($errors)){ ?>
    <div id="errors">
      <?php foreach ($errors as $error){ ?>
        <li> <?php echo $error; ?> </li>
      <?php } ?>
    </div>
  <?php } ?>

</form>

<?php require_once 'templates/footer.php'; ?>
