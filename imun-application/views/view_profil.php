  <body>
	<?php $this->load->view('navbar');?>
	<div class="container">
		<div class="row">
			<?php $this->load->view('notice-alert');?>
			<div class="col-sm-12 bunda"><h4>Profil Bunda</h4></div>
			<div class="col-sm-12 hati"><h4>Buah Bunda</h4></div>
			<div class="clearfix"></div>
			<?php
			$b = $profil_bunda->row_array();
			$a = $profil_ayah->row_array();
			$data['attrib'] = array('class'=>'form-horizontal', 'role'=>'form');
			echo form_open($post, $data['attrib']);
			?>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Nama Bunda</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'nama_bunda', 'class'=>'form-control', 'value'=>set_value('nama_bunda', $b['nama']), 'placeholder'=>'');
					echo form_input($data['attrib']);
					echo form_error('nama_bunda');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Tempat Lahir Bunda</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'tempat_lahir_bunda', 'class'=>'form-control', 'value'=>set_value('tempat_lahir_bunda', $b['tempat_lahir']));
					echo form_input($data['attrib']);
					echo form_error('tempat_lahir_bunda');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Tanggal Lahir Bunda</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'tgl_lahir_bunda', 'type'=>'date' ,'class'=>'form-control', 'value'=>set_value('tgl_lahir_bunda', $b['tanggal_lahir']));
					echo form_input($data['attrib']);
					echo form_error('tgl_lahir_bunda');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Agama Bunda</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Agama --','Islam'=>'Islam', 'Kristen Khatolik'=>'Kristen Khatolik', 'Kristen Protestan'=>'Kristen Protestan', 'Hindu'=>'Hindu', 'Budha'=>'Budha', 'DLL'=>'DLL');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('agama_bunda', $options, set_value('agama_bunda', $b['agama']), $data['attrib']);
						echo form_error('agama_bunda');
						?>
					 </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Golongan Darah Bunda</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Golongan Darah --', 'A'=>'A', 'B'=>'B', 'AB'=>'AB', 'O'=>'O');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('golongan_darah_bunda', $options, set_value('golongan_darah_bunda', $b['golongan_darah']), $data['attrib']);
						echo form_error('golongan_darah_bunda');
						?>
					 </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Pekerjaan Bunda</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'pekerjaan_bunda', 'class'=>'form-control', 'value'=>set_value('pekerjaan_bunda', $b['pekerjaan']));
					echo form_input($data['attrib']);
					echo form_error('pekerjaan_bunda');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Pendidikan Bunda</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Pendidikan Bunda --', 'Tidak Sekolah'=>'Tidak Sekolah', 'Sekolah Dasar'=>'Sekolah Dasar', 'Menengah pertama'=>'Menengah Pertama', 'Menengah Atas'=>'Menengah Atas', 'Akademik'=>'Akademik', 'Perguruan Tinggi'=>'Perguruan Tinggi');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('pendidikan_bunda', $options, set_value('pendidikan_bunda', $b['pendidikan']), $data['attrib']);
						echo form_error('pendidikan_bunda');
						?>
					 </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Kontak Bunda</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'kontak_bunda', 'class'=>'form-control', 'value'=>set_value('kontak_bunda', $b['kontak']));
					echo form_input($data['attrib']);
					echo form_error('kontak_bunda');
					?>
				  </div>
			   </div>
			   <div class="col-sm-12 hati hati2"><h4>Profil Ayah</h4></div>
				<div class="clearfix"></div>
				<div class="form-group">
				  <label class="col-sm-3 control-label">Nama Ayah</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'nama_ayah', 'class'=>'form-control', 'value'=>set_value('nama_ayah', $a['nama']), 'placeholder'=>'');
					echo form_input($data['attrib']);
					echo form_error('nama_ayah');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Tempat Lahir Ayah</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'tempat_lahir_ayah', 'class'=>'form-control', 'value'=>set_value('tempat_lahir_ayah', $a['tempat_lahir']));
					echo form_input($data['attrib']);
					echo form_error('tempat_lahir_ayah');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Tanggal Lahir Ayah</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'tgl_lahir_ayah', 'type'=>'date', 'class'=>'form-control', 'value'=>set_value('tgl_lahir_ayah', $a['tanggal_lahir']));
					echo form_input($data['attrib']);
					echo form_error('tgl_lahir_ayah');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Agama Ayah</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Agama --','Islam'=>'Islam', 'Kristen Khatolik'=>'Kristen Khatolik', 'Kristen Protestan'=>'Kristen Protestan', 'Hindu'=>'Hindu', 'Budha'=>'Budha', 'DLL'=>'DLL');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('agama_ayah', $options, set_value('agama_ayah', $a['agama']), $data['attrib']);
						echo form_error('agama_ayah');
						?>
					 </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Golongan Darah Ayah</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Golongan Darah --', 'A'=>'A', 'B'=>'B', 'AB'=>'AB', 'O'=>'O');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('golongan_darah_ayah', $options, set_value('golongan_darah_ayah', $a['golongan_darah']), $data['attrib']);
						echo form_error('golongan_darah_ayah');
						?>
					 </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Pekerjaan Ayah</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'pekerjaan_ayah', 'class'=>'form-control', 'value'=>set_value('pekerjaan_ayah', $a['pekerjaan']));
					echo form_input($data['attrib']);
					echo form_error('pekerjaan_ayah');
					?>
				  </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Pendidikan Ayah</label>
					<div class="col-sm-9">
						<?php
						$options = array(''=>'-- Pilih Pendidikan Ayah --', 'Tidak Sekolah'=>'Tidak Sekolah', 'Sekolah Dasar'=>'Sekolah Dasar', 'Menengah pertama'=>'Menengah Pertama', 'Menengah Atas'=>'Menengah Atas', 'Akademik'=>'Akademik', 'Perguruan Tinggi'=>'Perguruan Tinggi');
						$data['attrib'] = 'class="form-control" ';
						echo form_dropdown('pendidikan_ayah', $options, set_value('pendidikan_ayah', $a['pendidikan']), $data['attrib']);
						echo form_error('pendidikan_ayah');
						?>
					 </div>
			   </div>
			   <div class="form-group">
				  <label class="col-sm-3 control-label">Kontak Ayah</label>
				  <div class="col-sm-9">
					<?php
					$data['attrib'] = array('name'=>'kontak_ayah', 'class'=>'form-control', 'value'=>set_value('kontak_ayah', $a['kontak']));
					echo form_input($data['attrib']);
					echo form_error('kontak_ayah');
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