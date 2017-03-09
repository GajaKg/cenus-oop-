<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");
$id = $_GET['id'];


?>

<div id="wrapper">
    
    
<header>

<div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a></div>

<button class="btn btn-info" type="button"></button>

<button class="btn btn-info" type="button"></button>

</header>



<article>
<?php echo Info::employee_info($id); ?>
<p class='self-link'><a href="index.php" style="">&larr;nazad</a></p>
    
</article>

<aside>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno procenata </div>
        <div class="result"> Ukupno procenata </div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno na odredjeno </div>
        <div class="result"> Ukupno na odredjeno  </div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno na neodredjeno  </div>
        <div class="result"> Ukupno na neodredjeno  </div>
    </div>
    
</aside>

</div><!-- wrapper -->

<?php include("../include/hf/footer.php"); ?>