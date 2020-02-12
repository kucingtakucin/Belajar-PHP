<?php
require_once 'core/init.php';
$errors = array();
if (Input::post('submit')) {
    $validation = new Validation();
    $validation = $validation->check(array(
        'username' => array(
            'required' => true,
            'min' => 3,
            'max' => 50,
        ),
        'password' => array(
            'required' => true,
            'min' => 3,
            'max' => 255,
        )
    ));
    if ($validation->passed()) {
        $user->register_user(array(
            'username' => Input::post('username'),
            'password' => password_hash(Input::post('password'), CRYPT_BLOWFISH),
        ));
        header('Location: login.php');
    } else {
        $errors = $validation->errors();
    }
}

require_once 'templates/header.php';
?>
<main>
    <section id="judul">
        <h1><u>Register</u></h1>
    </section>
    <form method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" placeholder="Masukkan username" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="Masukkan password" required><br><br>
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
