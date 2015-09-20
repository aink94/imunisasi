  <body>
	<?php $this->load->view('navbar');?>
	<div class="container">
		<div class="row">
			<?php $this->load->view('notice-alert');?>
			<div class="col-sm-12 bunda"><h4>Setting</h4></div>
			<div class="col-sm-12 hati"><h4>Ganti Password</h4></div>
			<div class="clearfix"></div>
			<?php
			$data['attrib'] = array('name'=>'gantipass','class'=>'form-horizontal', 'role'=>'form');
			echo form_open($post, $data['attrib']);
			?>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Password Lama</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'pass_old', 'class'=>'form-control', 'value'=>set_value('pass_old'), 'placeholder'=>'Password Lama');
					echo form_password($data['attrib']);
					echo form_error('pass_old');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Password Baru</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'pass_new', 'class'=>'form-control', 'value'=>set_value('pass_new'));
					echo form_password($data['attrib']);
					echo form_error('pass_new');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Ulang Password Baru</label>
				  <div class="col-sm-9">
						<?php
						$data['attrib'] = array('name'=>'re_pass_new', 'class'=>'form-control', 'value'=>set_value('re_pass_new'));
						echo form_password($data['attrib']);
						echo form_error('re_pass_new');
						?>
				  </div>
			   </div>
			   <div class="col-xs-4 pull-right">
					<?php
					$data['attrib'] = array('name'=>'ganti_pass', 'class'=>'btn btn-large btn-danger btn-block hati2', 'value'=>'Ganti Password');
					echo form_submit($data['attrib']);
					?>
			   </div>
			<?php
			echo form_close();
			?>
			<div class="col-sm-12 bunda"><h4>Reminder Setting</h4></div>
			<div class="col-sm-12 hati"><h4>Pilih Reminder</h4></div>
			<div class="clearfix"></div>
			<?php
			$data['attrib'] = array('name'=>'reminder_set','class'=>'form-horizontal', 'role'=>'form');
			echo form_open($post, $data['attrib']);
			?>
				Notifikasi<br>
				SMS<br>
				<div class="form-group">
				  <label class="col-sm-3 control-label">Reminder Setting</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Range Reminder --', '7'=>'7 Hari Sebelumnya', '14'=>'14 Hari Sebelumnya', '21'=>'21 Hari Sebelumnya', '30'=>'1 Bulan Sebelumnya');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('range_reminder', $options, set_value('range_reminder'), $data['attrib']);
						echo form_error('range_reminder');
						?>
					 </div>
			   </div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">Kali Pengiriman</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Kali Pengiriman --', '1'=>'1 Kali', '2'=>'2 Kali', '3'=>'3 Kali');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('kali_pengiriman', $options, set_value('kali_pengiriman'), $data['attrib']);
						echo form_error('kali_pengiriman');
						?>
					 </div>
			   </div>
			   <div class="col-xs-4 pull-right">
					<?php
					$data['attrib'] = array('class'=>'btn btn-large btn-danger btn-block', 'value'=>'Simpan');
					echo form_submit($data['attrib']);
					?>
			   </div>
			<?php
			echo form_close();
			?>
		</div>
	</div>