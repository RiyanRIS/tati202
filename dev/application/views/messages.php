<?php if ($this->session->has_userdata('warning')) { ?>
	<div class="alert alert-warning" role="alert">
		<div class="iq-alert-icon">
			<i class="ri-information-line"></i>
		</div>
		<div class="iq-alert-text"><?= $this->session->flashdata('warning'); ?></div>
		<button type="button" style="color:yellow !important;" class="close" data-dismiss="alert" aria-label="Close">
			<i class="ri-close-line"></i>
		</button>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('danger')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= $this->session->flashdata('danger'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('success')) { ?>
	<div class="alert alert-success" role="alert">
		<div class="iq-alert-icon">
			<i class="ri-information-line"></i>
		</div>
		<div class="iq-alert-text"><?= $this->session->flashdata('success'); ?></div>
		<button type="button" style="color:green !important;" class="close" data-dismiss="alert" aria-label="Close">
			<i class="ri-close-line"></i>
		</button>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
	<div class="alert alert-error" role="alert">
		<div class="iq-alert-icon">
			<i class="ri-information-line"></i>
		</div>
		<div class="iq-alert-text"><?= $this->session->flashdata('error'); ?></div>
		<button type="button" style="color:black !important;" class="close" data-dismiss="alert" aria-label="Close">
			<i class="ri-close-line"></i>
		</button>
	</div>
<?php } ?>