<?php
require_once 'core/init.php';
$errors = array();
if (Session::isExist('UserBaru')): $errors[] = Session::flash('UserBaru'); endif;
if (Session::isExist('PasswordBaru')): $errors[] = Session::flash('PasswordBaru'); endif;
if (Session::isExist('Login')): $errors[] = Session::flash('Login'); endif;
if ($user->is_logged_in()): Redirect::to('profile'); endif;
if (Input::post('submit') && Token::check(Input::post('token'))):
    $validation = new Validation();
    $validation = $validation->check(array(
        'username' => array('required' => true,),
        'password' => array('required' => true,)
    ));
    if ($validation->passed()):
        if ($user->cek_nama(Input::post('username'))):
            if ($user->login_user(Input::post('username'), Input::post('password'))):
                Session::set('User', Input::post('username'));
                header('Location: profile.php');
            else: $errors[] = 'Login gagal! Password tidak tepat!'; endif;
        else: $errors[] = 'Login gagal! Data tidak ada!'; endif;
    else: $errors = $validation->errors(); endif;
endif;
require_once 'templates/header.php';
?>
<main>
    <section id="judul">
        <h1><u>Login</u></h1>
    </section>
    <form method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" placeholder="Masukkan username" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="Masukkan password" required><br><br>
        <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" name="submit" id="submit" value="Login">
    </form>
    <?php if(!empty($errors)):?>
        <section id="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php endif; ?>
</main>
<?php
require_once 'templates/footer.php'
?>
