<body style="background: url('<?php echo base_url() ?>assets/img/22.jpg') no-repeat fixed center top / cover  transparent">

	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-collapse collapse">
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<div class="container">
		<div class="col-xs-1 col-sm-4"></div>
		<img class="col-xs-10 col-sm-4" src="<?php echo base_url()?>assets/img/logo22.png">
		<div class="col-xs-1 col-sm-4"></div>
		<div class="clearfix"></div>
		<?php
		$attribute = array('class'=>'form-signin', 'role'=>'form');
		echo form_open($post, $attribute);
		//<form class="form-signin" role="form" action="" method="post">
		?>
			<?php $this->load->view('notice-alert'); ?>
			<?php
			$attribute = array('name'=>'email_signin', 'for'=>'InputEmail', 'class'=>'form-control', 'placeholder'=>'Alamat Email', 'value'=> set_value('email_signin'));
			echo form_input($attribute);
			echo form_error('email_signin');
			$attribute = array('name'=>'pass_signin', 'for'=>'InputPassword', 'class'=>'form-control', 'placeholder'=>'Password', 'value'=> set_value('pass_signin'));
			echo form_password($attribute);
			echo form_error('pass_signin');
			$attribute = array('class'=>'btn btn-lg btn-primary btn-block', 'value'=>'Sign in');
			echo form_submit($attribute);
			?>
		<?php
		echo anchor('auth/daftar', 'Daftar Sekarang <br>');
		echo anchor('auth/forgot', 'Lupa Password');
		echo form_close();
		?>
	</div>
