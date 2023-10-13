<?php if ($this->session->has_userdata('warning')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert" id="myAlert">
    <?= $this->session->flashdata('danger'); ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
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
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	<?= $this->session->flashdata('success'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= $this->session->flashdata('danger'); ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php } ?>