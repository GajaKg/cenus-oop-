<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");

//($current_page=0, $per_page=15, $total_count)
$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$per_page = 10;

$total_count = Employee::count_all();

$pagination = new Pagination($page, $per_page, $total_count);


?>
    
<div id="wrapper">
    
    
<header>

<div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a> </div>

<div class="btn btn-info"> <a href="new_employee.php">Dodaj radnika</a> </div>

<div class="btn btn-info"></div>

</header>

<?php if (!empty($session->message)){ ?>
    
        <div class="alert alert-danger"><?php echo $session->message ?> </div>
    
<?php   }  ?>

<article>
<?php echo Employee::employee_bio($per_page, $pagination->offset(), "prezime", $page); ?>

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