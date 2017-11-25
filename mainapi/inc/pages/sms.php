<?php
if (!defined('MAINAPIPATH')) {
    exit('No direct script access allowed');
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <center><h2>Broadcast Article</h2></center>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
                if($param["response"] != "")
                {
                    echo "<div class='alert alert-info'>".$param["response"]."</div>";
                }
                
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" action="<?php echo str_replace('%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
                <div class="form-group">
                    <label for="reciever">Broadcast :</label>
                     <input type="text" class="form-control" id="reciever" name="reciever" value="" placeholder="Enter Target Number">
                </div>
                <div class="form-group">
                    <label for="article">Article :</label>
                    <select class="form-control" id="article" name="article">
                        <option>== Choose Article ==</option>
                        <?php 
                        foreach ($param["data"] as $key => $value) {
                        ?>
                        <option value="<?= $value->ID ?>"><?= $value->post_title ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <center><button type="submit" class="btn btn-default" name="broadcast">Broadcast</button></center>
                </div>
            </form>
        </div>
    </div>
</div>

