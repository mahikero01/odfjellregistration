<?php
echo $this->Form->create('Visitor');
echo $this->Form->input('id',array('type' => 'hidden'));
echo $this->Form->input('lastname', array('default'=>'NO LASTNAME'));
echo $this->Form->input('firstname', array('default'=>'NO FIRSTNAME'));
echo $this->Form->input('rankcode', array('default'=>'NO RANKCODE'));
echo $this->Form->input('address', array('default'=>'NO ADDRESS'));
echo $this->Form->input('in', array('type'=>'checkbox'));
echo $this->Form->end('Save');
?>
