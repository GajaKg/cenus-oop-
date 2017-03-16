<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");

if ($session->is_logged_in()){
    $admin = Administrator::find_by_id($session->admin_id());
} else {
    redirect_to("login.php");
}

//($current_page=0, $per_page=15, $total_count)
$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$per_page = 10;

$total_count = Employee::count_all();

$pagination = new Pagination($page, $per_page, $total_count);


?>
    
<div id="wrapper">
    
    
<header>

<div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a> </div>
    
<?php if ($session->is_director()): ?>
<div class="btn btn-info"> <a href="new_employee.php">Dodaj radnika</a> </div>
<?php endif ?>
    
<div class="btn btn-info"><a href="manage_admins.php">Vrati se na admin stranu</a></div>

</header>

<?php if (!empty($session->message)){ ?>
    
        <div class="alert alert-danger"><?php echo $session->message ?> </div>
    
<?php   }  ?>

<article>
<?php echo Employee::employee_bio($per_page, $pagination->offset(), "prezime", $page, $session->is_director()); ?>

<div id='pagination'>
<?php echo $pagination->display_pagination($page); ?>    
</div>    
    
</article>

<aside>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno procenata </div>
        <div class="result" id="ukupnoProcenata"></div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno na odredjeno </div>
        <div class="result" id="naOdredjeno"></div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno na neodredjeno </div>
        <div class="result" id="naNeodredjeno"></div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno nastavno osoblje </div>
        <div class="result" id="nastavno"></div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno nenastavno osoblje </div>
        <div class="result" id="nenastavno"></div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno domar/lozac </div>
        <div class="result" id="domar"></div>
    </div>

    <div id="side-menu">
        <div class="side-name"> Ukupno pomocni radnici </div>
        <div class="result" id="pomocni"></div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno kuvara </div>
        <div class="result" id="kuvar"></div>
    </div>
    
</aside>

</div><!-- wrapper -->

<?php include("../include/hf/footer.php"); ?>