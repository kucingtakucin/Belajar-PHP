<?php
require_once 'core/init.php';
if (!$user->is_logged_in()):
    Session::flash('Login', 'Kamu harus login terlebih dahulu!');
    Redirect::to('login');
endif;
if (!$user->is_admin(Session::get('User'))):
    Session::flash('ProfileAdmin', 'Halaman itu khusus admin!');
    Redirect::to('profile');
endif;
$employees = $user->get_users();
//die(print_r($employees));
require_once 'templates/header.php';
?>
<main>
    <section id="judul">
        <h1><u>Halaman Admin</u></h1>
    </section>
    <section id="employe">
        <?php foreach ($employees as $employee): ?>
            <h4><a href="profile.php?nama=<?php echo $employee->username; ?>"><?php echo $employee->username; ?></a></h4>
        <?php endforeach; ?>
    </section>
</main>
<?php require_once 'templates/footer.php'; ?>
