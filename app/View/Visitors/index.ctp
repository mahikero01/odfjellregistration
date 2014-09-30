<h2><?php echo __('Iloilo Conference'); ?></h2>
<?php 
echo $this->Form->create('Visitor', array('action' =>'search'));
	if (!isset($searchQuery)) {
		$searchQuery = '';
	}
	echo $this->Form->input('searchQuery', array('value' => h($searchQuery)));
	echo $this->Form->end(__('Search'));
?>
<div>
<?php echo $this->Html->link(__('Add new visitor'),
array('action' => 'add')); ?>
</div>
<table>
<tr>
<th><?php echo $this->Paginator->sort('lastname'); ?></th>
<th><?php echo $this->Paginator->sort('firstname'); ?></th>
<th><?php echo 'Registered'; ?></th>
<!-- <th><?php echo 'Table'; ?></th> -->
<th><?php echo _(''); ?></th>
</tr>

<?php foreach ($visitors as $visitor): ?>
<tr>
<td><?php echo $visitor['Visitor']['lastname']; ?></td>
<td><?php echo $visitor['Visitor']['firstname']; ?></td>
<td><?php echo $visitor['Visitor']['in'] ? 'Yes' : 'No'; ?></td>
<!-- <td><?php //echo  ((bool)$visitor['Visitor']['in'] ? $this->Time->timeAgoInWords($visitor['Visitor']['modified']) : 'N/A'); ?></td> -->
<!-- <td><?php //echo ((bool)$visitor['Visitor']['in'] ? 'Yes' : 'No'); ?></td> -->
<!-- <td><?php echo $visitor['Visitor']['table']; ?></td> -->
<td><?php echo $this->Html->link(__('Change'), array('action' => 'edit', $visitor['Visitor']['id'])); ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php $visitorCounter = 0; ?>
<?php
foreach($personall as $person){
		if ($person['Visitor']['in'] == 1)
			 ++$visitorCounter;
}; 
?>
<h3>Total Visitors Registered <?php echo $visitorCounter; ?> </h3>
<div>
<?php echo $this->Paginator->counter(array('format' => __('Page
{:page} of {:pages}, showing {:current} records out of {:count}
total, starting on record {:start}, ending on {:end}'))); ?>
</div>
<div>
<?php
echo $this->Paginator->prev(__('< previous'), array(), null,
array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next >'), array(), null,
array('class' => 'next disabled'));
?>
</div>