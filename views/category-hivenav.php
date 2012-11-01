<?php
	$rowcount = 1;
?>
<table class="hivenav combs">
	<tr>
		<td class="hidden" colspan="2"></td>
		<td></td>
	</tr>
	
	<?php
		$rowcount++;
	?>
	<tr>
	
		<?php for( $i = 0; $i < count($categories) && $i < 3; $i++ ) {	
			$category = $categories[$i]; 
		?>
		<td>
			<a href="/hive/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
		</td>
		<?php } ?>
		<?php for( $f = $i; $f <= 3; $f++ ) { ?>
				<td></td>
		<?php } ?>
	</tr>
	
	<?php if( count($categories) > 3 ) {
		$rowcount++;
	?>
	<tr>
		<td></td>
		<?php for( $i; $i < count($categories) && $i < 7; $i++ ) {	
				$category = $categories[$i]; 
			?>
				<td>
					<a href="/hive/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
				</td>
			<?php } ?>
			<?php for( $f = $i; $f < 7; $f++ ) { ?>
				<td></td>
			<?php } ?>
		</tr>
	<?php } ?>
	
	<tr>
		<td class="hidden" colspan="<?php echo ($rowcount>2)?'4':'3' ?>"></td>
		<?php if( count($categories) > 7 ) {
			$category = $categories[$i]; 
		?>
			<td>
				<a href="/hive/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
			</td>
		<?php } else if( $rowcount<=2 ) { ?>
			<td></td>
		<?php } ?>
		<td></td>
	</tr>
	<?php $rowcount++; ?>
</table>
<script type="text/javascript">
$(function() {
	var rc = <?php echo $rowcount; ?>;
	var rowheight = 98.75;
	$('.hivenav').height((rowheight * rc) + 'px');
});
</script>