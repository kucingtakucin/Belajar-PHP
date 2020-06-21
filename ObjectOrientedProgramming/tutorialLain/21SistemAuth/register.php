<?php
require_once 'core/init.php';
if ($user->is_logged_in()): Redirect::to('profile'); endif;
$errors = array();
if (Input::post('submit') && Token::check(Input::post('token'))):
    $validation = new Validation();
    $validation = $validation->check(array(
        'Username' => array(
            'required' => true,
            'min' => 3,
            'max' => 50,
        ),
        'Password' => array(
            'required' => true,
            'min' => 3,
            'max' => 255,
        ),
        'password-verify' => array(
            'required' => true,
            'match' => 'password'
        )
    ));
    if ($validation->passed()):
        if ($user->cek_nama(Input::post('Username'))):
            $errors[] = 'Register error! Data sudah ada!';
        else:
            $user->register_user(array(
                'username' => Input::post('Username'),
                'password' => password_hash(Input::post('Password'), CRYPT_BLOWFISH),
            ));
            Session::flash('UserBaru', 'Register berhasil! Silakan login terlebih dahulu!');
            Redirect::to('login');
        endif;
    else: $errors = $validation->errors(); endif;
endif;

require_once 'templates/header.php';
?>
<main>
    <section id="judul">
        <h1><u>Register</u></h1>
    </section>
    <form method="post">
        <label for="Username">Username</label><br>
        <input type="text" name="Username" id="Username" placeholder="Masukkan username" required><br><br>
        <label for="Password">Password</label><br>
        <input type="password" name="Password" id="Password" placeholder="Masukkan password" required><br><br>
        <label for="password-verify">Ulangi Password</label><br>
        <input type="password" name="password-verify" id="password-verify" placeholder="Ulangi password" required><br><br>
        <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" name="submit" id="submit" value="Register">
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
