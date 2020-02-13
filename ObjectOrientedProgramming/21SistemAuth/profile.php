<?php
require_once 'core/init.php';
if (!$user->is_logged_in()):
    Session::flash('Login', 'Kamu harus login terlebih dahulu!');
    Redirect::to('login');
endif;
if (Input::get('nama')): $data_user = $user->get_data(Input::get('nama'));
else: $data_user = $user->get_data(Session::get('User')); endif;
require_once 'templates/header.php';
?>
<main>
    <section id="judul">
        <h1><u>Profil</u></h1>
    </section>
    <section id="profile">
        <h1>Hai, <?php echo $data_user->username; ?>!</h1>
        <div>
            <?php if (Input::get('nama')): ?>
                <?php if ($user->is_admin($data_user->username)): ?>
                    <h2>Status: Admin</h2>
                <?php else: ?>
                    <h2>Status: User</h2>
                <?php endif; ?>
            <?php else: ?>
                <?php if ($user->is_admin(Session::get('User'))): ?>
                    <h2>Status: Admin</h2>
                <?php else: ?>
                    <h2>Status: User</h2>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php require_once 'templates/footer.php'; ?>
