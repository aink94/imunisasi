<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if($notice[0] == 'warning'){ ?>
	<div class="alert  alert-warning"><a class="close" data-dismiss="alert">×</a>
		<strong>Warning!</strong> <?php echo $notice[1] ?>
	</div>
<?php }
if($notice[0] == 'success'){ ?>
	<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a>
		<strong>Success!</strong> <?php echo $notice[1] ?>
	</div>
<?php }
if($notice[0] == 'info'){ ?>
	<div class="alert alert-info"><a class="close" data-dismiss="alert">×</a>
		<strong>Info!</strong> <?php echo $notice[1] ?>
	</div>
<?php }
if($notice[0] == 'error'){ ?>
	<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a>
		<strong>Error!</strong> <?php echo $notice[1] ?>
	</div>
<?php }?>