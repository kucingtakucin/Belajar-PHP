<?php
  require_once 'core/init.php';

  if( !$user->is_loggedIn() ){
    Session::flash('login', 'anda harus login');
    Redirect::to('login');
  }

  if( Session::exists('profile')){
    echo Session::flash('profile');
  }

  if( Input::get('nama') ){
    $user_data = $user->get_data(  Input::get('nama') );
  }else{
    $user_data = $user->get_data( Session::get('username'));
  }

  require_once 'templates/header.php';
?>

<h2> Profile </h2>
<h3> Hai <?php echo $user_data['username']; ?>  </h3>


<?php if( $user_data['username'] == Session::get('username') ) { ?>

  <a href="change-password.php">Ganti Password</a>

  <!-- Contoh fungsi yang hanya bisa dilihat oleh Admin  -->
  <?php if( $user->is_admin( Session::get('username') )){ ?>
    <a href="admin.php"> Admin </a>
  <?php } ?>

<?php } ?>

<?php require_once 'templates/footer.php'; ?>
