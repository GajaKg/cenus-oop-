<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");
$id = $_GET['id'];
$page = isset($_GET['page']) ? $_GET['page'] : null;


?>

<div id="wrapper">
    
    
<header>

<div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a></div>

<button class="btn btn-info" type="button"></button>

<button class="btn btn-info" type="button"></button>

</header>



<article>
    
    <?php echo Info::employee_info($id); ?>
    <p class='self-link'><a href="index.php?page=<?php echo urlencode($page) ?>" style="">&larr;nazad</a></p>
    
    <div id='contract' class="side-name"><a href="#openModal" style="width:100%;">Dodaj ugovor</a></div>
    <!--  modal -->
    <div id="openModal" class="modalDialog">
    <div><a href="#close" title="Close" class="close">X</a>
        
    <div id='contract-add'>
        <form class="" method="post" action="new_employee.php" onsubmit="return validate_contract()">
						
            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Pozicija</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Upiši ime" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="cols-sm-2 control-label">Tip ugovora</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Upiši prezime" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Procenat</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="number" class="form-control" name="stepen" id="procent"  placeholder="Upiši procenat" />
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <input type="submit" name="submit" value="Dodaj" class="btn btn-primary btn-lg btn-block login-button">
            </div>

        </form>
    
    </div>
    </div>
    </div>
    <!--  modal -->

    
</article>
    
<?php if (!empty($session->message)){ ?>
    
        <div class="alert alert-danger"><?php echo $session->message ?> </div>
    
<?php   }  ?>
    
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