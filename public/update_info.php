<?php 
include("../include/hf/header.php");
require_once("../include/initialize.php");
$infoId = $_GET['infoId'];
$id = $_GET['id'];

$page = isset($_GET['page']) ? $_GET['page'] : null;

// for redirect 
$whereToRedirect = empty($id) ? null : "?id=".$id;

$employee = Employee::find_by_id($id);
$employee_info = Info::find_by_id($infoId);

if (isset($_POST['submit'])){
 
    $employee_info->__set("pozicija", $_POST['pozicija']);
    $employee_info->__set("tip_ugovora", $_POST['tip_ugovora']);
    $employee_info->__set("procenat", (int)$_POST['procenat']);
    
    if ($employee_info->save()){
        $session->message("Uspesno ste izmenili ugovor!");
        redirect_to("employee_info.php".$whereToRedirect);
    } else {
        $session->message("Izmena nije uspela!");
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

    
    <p class='self-link'><a href="employee_info.php?id=<?php echo urlencode($id) ?>" style="">&larr;nazad</a></p>
    

        <h3><?php echo $employee->full_name(); ?></h3>
        <form class="" method="post" action="update_info.php?infoId=<?php echo urlencode($employee_info->id()); ?>&id=<?php echo urlencode($employee->id()); ?>" onsubmit="return validate_contract()">
						
            <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Pozicija</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                        <select class="form-control" name="pozicija" id="pozicija">
                            <option value="<?php echo htmlentities($employee_info->__get("pozicija")); ?>">
                                <?php echo ucfirst($employee_info->__get("pozicija")); ?>
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="tip" class="cols-sm-2 control-label">Tip ugovora</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                        <select class="form-control" name="tip_ugovora" id="tipUgovora">
                            <option value="Odredjeno" <?php if ($employee_info->__get("tip_ugovora") == "Odredjeno"){ echo "selected";} ?> >
                                Na odredjeno
                            </option>
                            <option value="Neodredjeno" <?php if ($employee_info->__get("tip_ugovora") == "Neodredjeno"){ echo "selected";}?> >
                                Na neodredjeno
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Procenat</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                        <input type="number" class="form-control" name="procenat" id="procenat"  placeholder="Upiši procenat" value="<?php echo $employee_info->__get("procenat"); ?>" />
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <input type="submit" name="submit" value="Izmeni" class="btn btn-primary btn-lg btn-block login-button">
            </div>

        </form>
 

  

    
</article>
    
    
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
    
</aside>

</div><!-- wrapper -->

<?php include("../include/hf/footer.php"); ?>