<?php
if (!defined('MAINAPIPATH')) {
    exit('No direct script access allowed');
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="container">
    <center><h2>Configuration Settings</h2></center>
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
                    <label for="clientID">Client ID :</label>
                    <input type="text" class="form-control" id="clientID" name="clientID" value="<?= $param["data"]["client_id"] ?>" placeholder="Enter Your Client ID">
                </div>
                <div class="form-group">
                    <label for="SecretID">Secret ID :</label>
                    <input type="text" class="form-control" id="SecretID" name="SecretID" value="<?= $param["data"]["secret_id"] ?>" placeholder="Enter Your Secret ID">
                </div>
                <div class="form-group">
                    <label for="message">Message Templates :</label>
                    <p>Use <pre>{enter}</pre> to Line Break, and use <pre>{link}</pre> for insert Link Article into your Broadcast</p>
                    <textarea id="message" class="form-control" name="message" rows="4"><?= $param["data"]["message"] ?></textarea>
                </div>
                <div class="form-group">
                    <center><button type="submit" class="btn btn-default" name="saveConfig">Save</button></center>
                </div>
            </form>
        </div>
    </div>
</div>

