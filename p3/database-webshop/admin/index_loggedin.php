<?php
include('core/header.php');
include('core/checklogin_admin.php');
?>
<a class="logout" href="loggout.php">Uitloggen</a> <br>

<main>
    <section class="section-loggedin">
        <div class="titel-container">
            <h3>Welkom gebruiker <?php echo $_SESSION['Sadmin_email']; ?></h3>
        </div>
        <div class="admin-menu">
            <a class="admin-link" href="<?php echo BASEURL; ?>/admin/users/index.php">
                <div class="admin-block">Gebruikers </div>
            </a>
            <a class="admin-link" href="<?php echo BASEURL; ?>/admin/orders/index.php">
                <div class="admin-block">Bestellingen</div>
            </a>
            <a class="admin-link" href="<?php echo BASEURL; ?>/admin/producten/index.php">
                <div class="admin-block">Producten </div>
            </a>
        </div>
    </section>
</main>
<?php
include('core/footer.php');
?>