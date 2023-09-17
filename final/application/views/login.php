
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="container">
      <div class="col-4 offset-4">
			<?php echo form_open(base_url().'login/check_login'); ?>
				<br />
				<h2 class="text-center">Login</h2>       
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Username" required="required" name="username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required="required" name="password">
					</div>
					<div class="form-group">
					<?php echo $error; ?>
					</div>
					<div class="form-group">
						<label>Captcha</label>
						<?php echo $captcha_image;?>
					</div>
					<div class="form-group">
						<label>Enter Captcha Text</label>
						<input type="text" name="captcha" class="form-control" required>
					</div>
					<div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6Lf4Er4aAAAAANRCG8yXwTP28A4iTdmJNqnoiCro"></div>
                    </div>
					<div class="form-group">
						<button type="submit" name='submit' value='login' class="btn btn-primary btn-block">Log in</button>
					</div>
					<div class="clearfix">
						<label class="float-left form-check-label"><input type="checkbox" name="remember"> Remember me</label>
						<a href="#" class="float-right">Forgot Password?</a>
					</div> 
				<br />   
			<?php echo form_close(); ?>
	</div>
</div>