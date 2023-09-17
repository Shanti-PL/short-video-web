<?php echo form_open(base_url().'register/validation'); ?>
<div class="container">
    <div class="col-4 offset-4">
        <br />
        <h2 class="text-center">Resgister</h2>
        <?php
        if($this->session->flashdata('message')) {
            echo '
            <div class="alert alert-success">
                '.$this->session->flashdata("message").'
            </div>
            ';
        }
        ?>
        <form method='post' action="<?php echo base_url(); ?>register/validation">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo set_value('username');?>" />
            <span class="text-danger"><?php echo form_error('username'); ?></span>
        </div> 
        <div class="form-group">
            <input type="text" name="useremail" placeholder="Useremail" class="form-control" value="<?php echo set_value('useremail');?>" />
            <span class="text-danger"><?php echo form_error('useremail'); ?></span>
        </div> 
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control" value="<?php echo set_value('password');?>" />
            <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div> 
        <div class="form-group">
            <input type="submit" name="register" value="Register" class="btn btn-primary btn-block" />
        </div>
        <br />
    </div>

    </div>
</div>
<?php echo form_close(); ?>