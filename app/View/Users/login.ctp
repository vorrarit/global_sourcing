        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">

<?php echo $this->Form->create('User'); ?>
<div class="users form">
	<fieldset>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?php echo $this->Form->button(__('Submit'), array('type'=>'submit', 'class'=>'btn btn-primary btn-block')); ?>
<?php echo $this->Form->end(); ?>
</div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>