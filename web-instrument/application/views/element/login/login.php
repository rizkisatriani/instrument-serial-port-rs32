<?php
    /*
    $this->session->set_userdata(array(
								'logged_in' => FALSE

                                ));

    */
    $warning = "";
	if ($this->session->flashdata('logged_error'))
	{
		$warning =  $this->session->flashdata('warning');
	}
?>
<style>
body {
  /*background-image: url('assets/images/login/laboratory.jpg');*/
  background-image: url('assets/images/login/background2.png');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: contain;
  background-position: center;
  background-color: white; 
  /*background-size: cover;*/
}
</style>
<body class="m4-cloak h-vh-100 d-flex flex-justify-center flex-align-center ">
    <div class="login-box border bd-gray">
        <form class="bg-white p-4"
              action="<?php echo base_url(); ?>site/login/"
              data-role="validator"
              data-clear-invalid="2000"
              data-on-error-form="invalidForm" method="post">
            <!--<img src="<?php echo base_url(); ?>assets/images/p-120x120.png" class="place-right mt-4-minus mr-6-minus">-->
            <img src="<?php echo base_url(); ?>assets/images/logo2.png" class="place-right mt-4-minus mr-6-minus">
            <h1 class="mb-0 fg-blue">Login</h1>
            <div class="text-muted mb-4 fg-gray"><small><i><?=SYSTEM_NAME?></i></small></div>
            <div class="form-group">
                <input type="text" name='user' data-role="input" placeholder="User Name" data-append="<span class='mif-user'>" data-validate="required">
                <span class="invalid_feedback">Please enter a valid user name</span>
            </div>
            <div class="form-group">
                <input type="password" name='password' data-role="input" placeholder="Password" data-append="<span class='mif-key'>" data-validate="required">
                <span class="invalid_feedback">Please enter a password</span>
            </div>
            <div class="form-group d-flex flex-align-center flex-justify-between">
                <input type="checkbox" data-role="checkbox" data-caption="Remember Me">
                <button class="button primary">Login</button>
            </div>
            <div class="text-center m-4">
            <p class="fg-red">
                   <?=$warning?>
            </p>
            </div>
            <div class="form-group border-top bd-default pt-2">
                <h4>Forgot your password ?</h4>
                <p>
                    Please contact your administrator to reset your password.
                </p>
            </div>
        </form>
    </div>

    <script>
        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-ring");
            setTimeout(function(){
                form.removeClass("ani-ring");
            }, 1000);
        }
    </script>
</body>
</html>
