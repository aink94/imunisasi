  <body style="background: url('<?php echo base_url() ?>assets/img/22.jpg') no-repeat fixed center top / cover  transparent">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-collapse collapse">
        </div><!--/.nav-collapse -->
      </div>
    </div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12 bunda"><h4>Pendaftaran</h4></div>
			<div class="col-sm-12 hati"><h4>Login</h4></div>
			<div class="clearfix"></div>
			<?php
			$attribute = array('class'=>'form-horizontal', 'role'=>'form');
			echo form_open($post, $attribute);
			?>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Username</label>
				  <div class="col-sm-9">
					<?php
					$attribute = array('name'=>'email_signup', 'class'=>'form-control', 'value'=>set_value('email_signup'));
					echo form_input($attribute);
					echo form_error('email_signup');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Password</label>
				  <div class="col-sm-9">
					<?php
					$attribute = array('name'=>'pass_signup', 'class'=>'form-control', 'value'=>set_value('pass_signup'));
					echo form_password($attribute);
					echo form_error('pass_signup');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Ulangi Password</label>
				  <div class="col-sm-9">
					<?php
					$attribute = array('name'=>'conf_pass_signup', 'class'=>'form-control', 'value'=>set_value('conf_pass_signup'));
					echo form_password($attribute);
					echo form_error('conf_pass_signup');
					?>
				  </div>
			   </div>
			   <div class="col-sm-12 hati hati2"><h4>Profil Bunda</h4></div>
			   <div class="clearfix"></div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Nama Bunda</label>
				  <div class="col-sm-9">
					<?php
					$attribute = array('name'=>'nama_bunda', 'class'=>'form-control', 'value'=>set_value('nama_bunda'));
					echo form_input($attribute);
					echo form_error('nama_bunda');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Pekerjaan Bunda</label>
				  <div class="col-sm-9">
					<?php
					$attribute = array('name'=>'pekerjaan_bunda', 'class'=>'form-control', 'value'=>set_value('pekerjaan_bunda'));
					echo form_input($attribute);
					echo form_error('pekerjaan_bunda');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">No Telepon Bunda</label>
				  <div class="col-sm-9">
					<?php
					$attribute = array('name'=>'no_tlp_bunda', 'class'=>'form-control', 'value'=>set_value('no_tlp_bunda'));
					echo form_input($attribute);
					echo form_error('no_tlp_bunda');
					?>
				  </div>
			   </div>
			   <div class="col-xs-4 pull-right">
				<?php
				$attribute = array('class'=>'btn btn-large btn-danger btn-block', 'value'=>'Simpan');
				echo form_submit($attribute);
				?>
			   </div>
			<?php
			echo form_close();
			?>
		</div>
	</div>
	