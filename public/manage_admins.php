<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");

if (isset($_POST['submit'])){
    $new_admin = new Administrator;
    
    if ($new_admin->attach_admin($_POST['username'], $_POST['password'])){
        if ($new_admin->save()){
            $session->message("Uspesno dodat administrator");
            redirect_to("manage_admins.php");
        } else {
            $session->message("Neuspesna akcija, kontaktirajte administratora.");
        }
    }
    
    
}


?>
    
<div id="wrapper">
    
    
<header>



</header> <!-- header -->
    
<div id='validation'>
<?php if (!empty($session->message)){ ?>
    
        <div class="alert alert-danger"><?php echo $session->message ?> </div>
    
<?php   }  ?>
</div>
    
<article>
    <div id='contract' class="side-name"><a href="#openModal" style="width:100%;">Dodaj administratora</a></div>
    
    
    <!--  modal new contract-->
    <div id="openModal" class="modalDialog">
    <div><a href="#close" title="Close" class="close">X</a>
        
    <div id='contract-add'>
        <form class="" method="post" action="manage_admins.php" onsubmit="return ">
						
            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">korisnicko ime</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">lozinka</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <input type="submit" name="submit" value="Dodaj administratora" class="btn btn-primary btn-lg btn-block login-button">
            </div>

        </form>
    
    </div>
    </div>
    </div>
    <!--  modal -->
    
    
</article> <!-- article -->
    

<aside>
    

</aside> <!-- aside -->

</div><!-- wrapper -->

<?php include("../include/hf/footer.php"); ?>