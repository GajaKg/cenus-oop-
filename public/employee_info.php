<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");

if ($session->is_logged_in()){
    $admin = Administrator::find_by_id($session->admin_id());
} else {
    redirect_to("login.php");
}

$id = $_GET['id'];
$page = isset($_GET['page']) ? $_GET['page'] : null;


if(isset($_POST['submit'])){

    $employeeInfo = new Info;

    if($employeeInfo->attach_info($id, $_POST['pozicija'], $_POST['procenat'], $_POST['tip_ugovora'])){
        $employeeInfo->save();
        $session->message("Uspesno ste dodali ugovor!");
        //redirect_to()
    } else {
        $er = display_errors($employeeInfo->errors);
        $session->message($er);
    }

}



?>

<div id="wrapper">
    
    
<header>

<div class="btn btn-info"> <a href="index.php">Prikazi sve radnike</a></div>

<button class="btn btn-info" type="button"></button>

<button class="btn btn-info" type="button"></button>

</header>


<div id='validation'>
<?php if (!empty($session->message)){ ?>
    
        <div class="alert alert-danger">  <?php echo $session->message; ?> </div>
    
<?php   }  ?>
</div>
    
<article>
    
    <?php echo Info::employee_info($id); ?>
    
    <p class='self-link'><a href="index.php?page=<?php echo urlencode($page) ?>" style="">&larr;nazad</a></p>
    
<?php if ($session->is_director()): ?>
    <div id='contract' class="side-name"><a href="#openModal" style="width:100%;">Dodaj ugovor</a></div>

    
    <!--  modal new contract-->
    <div id="openModal" class="modalDialog">
    <div><a href="#close" title="Close" class="close">X</a>
        
    <div id='contract-add'>
        <form class="" method="post" action="employee_info.php?id=<?php echo urlencode($id) ?>" onsubmit="return validate_contract()">
						
            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Pozicija</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <select class="form-control" name="pozicija" id="pozicija"></select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tip" class="cols-sm-2 control-label">Tip ugovora</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <select class="form-control" name="tip_ugovora" id="tipUgovora">
                            <option value="Odredjeno">Na odredjeno</option>
                            <option value="Neodredjeno">Na neodredjeno</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Procenat</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="number" class="form-control" name="procenat" id="procenat"  placeholder="Upiši procenat" />
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
<?php endif ?>
    
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