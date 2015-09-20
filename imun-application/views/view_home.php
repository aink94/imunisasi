  <body>
	<?php $this->load->view('navbar'); ?>
	
	<div class="container">
		<div class="row">
			<?php $this->load->view('notice-alert');?>
			<div class="col-xs-12 bunda"><h4>Hallo Bunda</h4></div>
			<div class="col-xs-12 hati"><h4>Buah Hati Bunda</h4></div>
			<div class="row">
				<div class="col-xs-6"><h3>Nama Buah Hati</h3></div>
				<div class="col-xs-6"><h3>Foto Buah Hati</h3></div>
				<?php
				foreach($buah_hati->result_array() as $bh){
					echo anchor('buahhati/index/'.$bh{'id_buah_hati'}, '
					<div class="col-xs-6">
						<h5>'.$bh['nama'].'</h5>
					</div>
					<div class="col-xs-6">
					<div class="row">
						<span class="col-xs-4"></span>
						<img class="col-xs-4 img-thumbnail" src="'.base_url().'/assets/foto_buah_hati/'.$bh['foto'].'" />
						<span class="col-xs-4"></span>
					</div>
					</div>');
				?>
				
				<?php
				}
				?>
			</div>
		</div>
	</div>