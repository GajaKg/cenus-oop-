<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");

?>
    
<div id="wrapper">
    
    
<header>

<div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a></div>

<button class="btn btn-info" type="button"></button>

<button class="btn btn-info" type="button"></button>

</header>



<article>
<?php echo Employee::employee_bio(); ?>

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