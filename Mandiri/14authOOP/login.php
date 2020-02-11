<?php
  require_once 'core/init.php';

  if( $user->is_loggedIn() ){
    Redirect::to('profile');
  }

  if( Session::exists('login')){
    echo Session::flash('login');
  }

  $errors = array();

  if( Input::get('submit') ){
    if( Token::check( Input::get('token') ) ){
    // 1. memanggil objek validasi
    $validation = new Validation();

    // 2. metode check
    $validation = $validation->check(array(
      'username' => array( 'required' => true ),
      'password' => array( 'required' => true )
    ));

    // 3. lolos ujian
    if ( $validation->passed() ){

    if($user->cek_nama(Input::get('username'))){
      if( $user->login_user( Input::get('username'), Input::get('password') ) )
      {
        Session::set('username', Input::get('username'));
        Redirect::to('profile');
      }else{
        $errors[] = 'login gagal';
      }
    }else{
      $errors[] = 'namanya belum terdaftar';
    }

    }else{
      $errors = $validation->errors();
    }

   }//end of token
  }//end if input submit


  require_once 'templates/header.php';
?>

<h2>Login Di sini</h2>

<form action="login.php" method="post">
  <label>Username</label>
  <input type="text" name="username"> <br>

  <label>Password</label>
  <input type="password" name="password"> <br>

  <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

  <input type="submit" name="submit" value="Login Sekarang">

  <?php if(!empty($errors)){ ?>
    <div id="errors">
      <?php foreach ($errors as $error){ ?>
        <li> <?php echo $error; ?> </li>
      <?php } ?>
    </div>
  <?php } ?>
</form>

<?php require_once 'templates/footer.php'; ?>
