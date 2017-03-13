<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");

if (isset($_POST['submit'])){

    $newEmployee = new Employee;
   
    if($newEmployee->attach_employee($_POST['first_name'], $_POST['last_name'], $_POST['stepen'])){
        
        if ($newEmployee->save()){
            $session->message("Uspesno ste dodali radnika!");
            redirect_to("index.php");
        } else {
            $session->message("Neuspesno dodavanje!");
            //redirect_to("index.php");
        }
        
    } else {
        
        $session->message("Unesite sve parametre!");
    }
    

}



?>
    
<div id="wrapper">
    
    
<header>

    <div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a> </div>

    <div class="btn btn-info" type="button">  <a href="new_employee.php">Dodaj radnika</a> </div>

    <div class="btn btn-info" type="button"></div>

</header> <!-- header -->
    
<div id='validation'>
<?php if (!empty($session->message)){ ?>
    
        <div class="alert alert-danger"><?php echo $session->message ?> </div>
    
<?php   }  ?>
</div>
    
<article>

    <form class="" method="post" action="new_employee.php" onsubmit="return validate_employee()">
						
        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label">Ime</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Upiši ime" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="cols-sm-2 control-label">Prezime</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="last_name" id="last_name"  placeholder="Upiši prezime" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="username" class="cols-sm-2 control-label">Stepen</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="number" class="form-control" name="stepen" id="stepen"  placeholder="Upiši stepen" />
                </div>
            </div>
        </div>

        <div class="form-group ">
            <input type="submit" name="submit" value="Dodaj" class="btn btn-primary btn-lg btn-block login-button">
        </div>

    </form>
    <p class='self-link'><a href="index.php" style="">cancel</a></p>
</article> <!-- article -->
    

<aside>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno procenata </div>
        <div class="result" id="ukupnoProcenata"></div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno na odredjeno </div>
        <div class="result" id="naOdredjeno"> Ukupno na odredjeno  </div>
    </div>
    
    <div id="side-menu">
        <div class="side-name"> Ukupno na neodredjeno  </div>
        <div class="result" id="naNeodredjeno"> Ukupno na neodredjeno  </div>
    </div>
    
</aside> <!-- aside -->

</div><!-- wrapper -->

<?php include("../include/hf/footer.php"); ?>