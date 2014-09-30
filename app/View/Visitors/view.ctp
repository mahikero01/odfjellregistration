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
<dt><?php echo __('Registered'); ?></dt>
<dd>
	<?php echo __($visitor['Visitor']['in'] ? 'Yes' : 'No'); ?>
</dd>



<dt><?php echo __('Created'); ?></dt>
<dd><?php echo $this->Time->nice($visitor['Visitor']
['created']); ?></dd>
<dt><?php echo __('Modified'); ?></dt>
<dd><?php echo $this->Time->nice($visitor['Visitor']
['modified']); ?></dd>
</dl>