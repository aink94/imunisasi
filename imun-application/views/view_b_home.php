  <body>
	<?php $this->load->view('navbar'); ?>
	
	<div class="container">
		<div class="row">
			<?php $this->load->view('notice-alert');
				$this->load->view('just_nav');
				$bunda=$bunda->row_array();
			?>
			<div class="col-xs-12 bunda"><h4>Hallo Bunda Ibu <?=$bunda['nama']?></h4></div>
			<div class="col-xs-12 hati" style="margin-bottom: 15px"><h4>Buah Hati</h4></div>
			<div class="row">
				<?php
				foreach($buah_hati->result_array() as $bh){
					echo '<div class="col-xs-6"><img class="col-xs-4 img-thumbnail" src="'.base_url().'/assets/foto_buah_hati/'.$bh['foto'].'" /></div><div class="col-xs-6"><h5>'.$bh['nama'].'</h5></div>'
				?>

				<?php
				}
				?>
			</div>
		</div>
	</div>
