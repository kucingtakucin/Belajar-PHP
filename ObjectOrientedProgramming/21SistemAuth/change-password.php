<?php
require_once 'core/init.php';
if (!$user->is_logged_in()):
    Session::flash('Login', 'Kamu harus login terlebih dahulu!');
    Redirect::to('login');
endif;
$errors = array();
$data_user = $user->get_data(Session::get('User'));
if (Input::post('submit') && Token::check(Input::post('token'))):
    $validation = new Validation();
    $validation = $validation->check(array(
        'password-lama' => array('required' => true),
        'password-baru' => array(
            'required' => true,
            'min' => 3
        ),
        'password-baru-verify' => array(
            'required' => true,
            'match' => 'password-baru'
        )
    ));
    if ($validation->passed()):
        if (password_verify(Input::post('password-lama'), $data_user->password)):
            $user->ganti_password_user($data_user->id, array(
                'password' => password_hash(Input::post('password-baru'), CRYPT_BLOWFISH)
            ));
            Session::delete('User');
            Session::flash('PasswordBaru', 'Ganti password berhasil! Silakan login terlebih dahulu!');
            Redirect::to('login');
        else: $errors[] = 'Password lama salah!'; endif;
    else: $errors = $validation->errors(); endif;
endif;
require_once 'templates/header.php';
?>
<main>
    <section id="judul">
        <h1><u>Ganti Password</u></h1>
    </section>
    <form method="post">
        <label for="password-lama">Password lama</label><br>
        <input type="password" name="password-lama" id="password-lama" placeholder="Masukkan password lama" required><br><br>
        <label for="password-baru">Password baru</label><br>
        <input type="password" name="password-baru" id="password-baru" placeholder="Masukkan password baru" required><br><br>
        <label for="password-baru-verify">Ulangi password baru</label><br>
        <input type="password" name="password-baru-verify" id="password-baru-verify" placeholder="Ulangi password baru" required><br><br>
        <input type="hidden" name="token" id="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" name="submit" id="submit" value="Ganti Password">
        <?php if(!empty($errors)):?>
            <section id="errors">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        <?php endif; ?>
    </form>
</main>
<?php require_once 'templates/footer.php'; ?>
