<table id="kontobevegelser" cellpadding="0" cellspacing="0">
<tr>
        <th><?php echo __('Nummer');?></th>
        <th><?php echo __('Frå');?></th>
        <th><?php echo __('Til');?></th>
        <th><?php echo __('Kroner');?></th>
        <th><?php echo __('Dato');?></th>
        <th><?php echo __('Beskrivelse');?></th>
        <th><?php echo __('Faktura');?></th>
        <th class="actions"><?php __('Actions');?></th>
</tr>
<?php echo $this->element("pengeflytting", array('pengeflyttinger' => $pengeflyttinger, 'key' => 'Pengeflytting')); ?>
</table>

