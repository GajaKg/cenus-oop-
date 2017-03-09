<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");

//($current_page=0, $per_page=15, $total_count)
$page = !empty($_GET['page']) ? $_GET['page'] : 1;

$per_page = 2;

$total_count = Employee::count_all();

$pagination = new Pagination($page, $per_page, $total_count);


?>
    
<div id="wrapper">
    
    
<header>

<div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a></div>

<button class="btn btn-info" type="button"></button>

<button class="btn btn-info" type="button"></button>

</header>



<article>
<?php echo Employee::employee_bio($per_page, $pagination->offset(), "prezime"); ?>

<div id='pagination'>
<?php
    
echo $pagination->display_pagination();
    

?>    
</div>    
    
</article>

<aside>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno procenata </div>
        <div class="result"> Ukupno procenata </div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno procenata </div>
        <div class="result"> Ukupno procenata </div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno procenata </div>
        <div class="result"> Ukupno procenata </div>
    </div>
    
</aside>

</div><!-- wrapper -->

<?php include("../include/hf/footer.php"); ?>