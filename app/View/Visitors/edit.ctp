<h2>
	<?php echo h($visitor['Visitor']['firstname']); ?>
	<?php echo h($visitor['Visitor']['lastname']); ?>
</h2>
<dl>
<dt><?php echo __('Rank Code'); ?></dt>
<dd>
	<?php echo __($visitor['Visitor']['rankcode']); ?>
</dd>
<dt><?php echo __('Address'); ?></dt>
<dd>
	<?php echo __($visitor['Visitor']['address']); ?>
</dd>

<?php
echo $this->Form->create('Visitor');
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->input('in', array('type'=>'checkbox'));
echo $this->Form->end('Save');
?>

