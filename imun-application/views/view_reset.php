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
	
	$data['attrib'] = array('class'=>'form-signin', 'role'=>'form');
	echo form_open($post, $data['attrib']);
	$this->load->view('notice-alert');
	?>
		<?php
		$data['attrib'] = array('name'=>'pass_forget', 'class'=>'form-control', 'placeholder'=>'Masukkan email Baru');
		echo form_password($data['attrib']);
		echo form_error('pass_forget');
		$data['attrib'] = array('name'=>'conf_pass_forget', 'class'=>'form-control', 'placeholder'=>'Ulangi email Baru');
		echo form_password($data['attrib']);
		echo form_error('conf_pass_forget');
		$data['attrib'] = array('class'=>'btn btn-lg btn-primary btn-block', 'value'=>'Lupa');
		echo form_submit($data['attrib']);
		?>
	<?php
	echo form_close();
	?>
</div>
	