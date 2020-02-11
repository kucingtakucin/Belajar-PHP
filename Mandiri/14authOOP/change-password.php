<?php
  require_once 'core/init.php';

  if( !$user->is_loggedIn() ){
    Session::flash('login', 'anda harus login');
    Redirect::to('login');
  }
    $user_data = $user->get_data( Session::get('username'));
    $errors    = array();

    if( Input::get('submit') ){
      if( Token::check( Input::get('token') ) ){

          $validation = new Validation();

          // 2. metode check
          $validation = $validation->check(array(
            'password'      => array( 'required' => true ),
            'password_baru' => array(
                              'required' => true,
                              'min'      => 3,
                            ),
            'password_verify' => array(
                              'required' => true,
                              'match'    => 'password_baru'
                            )
          ));

          // 3. lolos ujian
          if ( $validation->passed() ){
            if( password_verify(Input::get('password'), $user_data['password']) ){

                $user->update_user(array(
                  'password' => password_hash(Input::get('password_baru'), PASSWORD_DEFAULT)
                ), $user_data['id']);

                Session::flash('profile', 'selamat! anda berhasil mengganti password');
                Redirect::to('profile');

            }else{
              $errors[] = 'password lama anda salah';
            }

          }else{
            $errors = $validation->errors();
          }

      }
    }


  require_once 'templates/header.php';
?>

<h2> Ganti Password </h2>
<h3> Hai <?php echo $user_data['username']; ?>  </h3>

<form action="change-password.php" method="post">
    <label>Password Lama</label>
    <input type="password" name="password"> <br>

    <label>Password Baru</label>
    <input type="password" name="password_baru"> <br>

    <label>Password Baru verifikasi</label>
    <input type="password" name="password_verify"> <br>

    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

    <input type="submit" name="submit" value="Ganti Password">

      <?php if(!empty($errors)){ ?>
        <div id="errors">
          <?php foreach ($errors as $error){ ?>
            <li> <?php echo $error; ?> </li>
          <?php } ?>
        </div>
      <?php } ?>
</form>

<?php require_once 'templates/footer.php'; ?>
