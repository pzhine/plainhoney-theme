<?php
	$rowcount = 0;
?>
<table class="hivenav combs">
	<?php
		$categories = get_categories(array('parent'=>0, 'hide_empty'=>0, 'exclude'=>'1'));
		$rowcount++;
	?>
	<tr>
	
		<?php for( $i = 0; $i < 2; $i++ ) {	
			$category = $categories[$i]; 
		?>
		<td>
			<a href="/combs/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
		</td>
		<?php } ?>
		<td></td>
	</tr>
	
	<?php if( count($categories) > 2 ) {
		$rowcount++;
	?>
		<tr>
			<?php for( $i; $i < count($categories) && $i < 5; $i++ ) {	
				$category = $categories[$i]; 
			?>
				<td>
					<a href="/combs/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
				</td>
			<?php } ?>
			<?php for( $f = $i; $f <= 5; $f++ ) { ?>
				<td></td>
			<?php } ?>
		</tr>
	<?php } ?>

	<?php if( count($categories) > 5 ) {
		$rowcount++;
	?>
		<tr>
			<td></td>
			<?php if( count($categories) == 7 ) { ?>
				<td></td>
			<?php } ?>
			<?php for( $i; $i < count($categories) && $i < 8; $i++ ) {	
				$category = $categories[$i]; 
			?>
				<td>
					<a href="/combs/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
				</td>
			<?php } ?>
			
		</tr>
	<?php } ?>
	
	<tr>
		<td class="hidden" colspan="3"></td>
		<?php if( $i < count($categories) ) {
			for( $i; $i < count($categories) && $i < 10; $i++ ) {	
				$category = $categories[$i]; 
			?>
				<td>
					<a href="/combs/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
				</td>
			<?php } ?>
		<?php } else { ?>
			<td></td>
		<?php } ?>
		<?php if( $rowcount > 2 && $i != 10 ) { ?>
			<td></td>
		<?php }
			$rowcount++;
		?>
	</tr>
	<?php if( count($categories) > 10 ) { ?>
		<tr>
			<td class="hidden" colspan="4"></td>
			<?php for( $i; $i < count($categories) && $i < 12; $i++ ) {	
				$category = $categories[$i]; 
			?>
				<td>
					<a href="/combs/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
				</td>
			<?php } ?>
		</tr>
	<?php } ?>
	<?php sideblock(2, 1, 5, $categories, $i); ?>
	<?php sideblock(3, 3, 6, $categories, $i+3); ?>
</table>
<script type="text/javascript">
$(function() {
	var rc = <?php echo $rowcount; ?>;
	var rowheight = 98.75;
	$('.hivenav').height((rowheight * rc) + 'px');
});
</script>

<?php function sideblock($rows, $blockcount, $colspan, $categories, $i) {
	$bc = 0;
	while( $bc < $blockcount ) {
        $rc = 1;
        $run = 1;
		while( $i < count($categories) && $rc <= $rows ) { ?>
			<tr>
				<td class="hidden" colspan="<?php echo $colspan ?>"></td>
				<?php for( $i, $j=0; $i < count($categories) && $j < $run ; $i++, $j++ ) {	
					$category = $categories[$i]; 
				?>
					<td>
						<a href="/combs/<?php echo $category->slug ?>"><?php echo _hive($category) ?></a>
					</td>
				<?php } ?>
			</tr>
		<?php
			$rc++;
			$run = 2;
		}
		$bc++;
        $colspan++;
	} ?>
	
<?php } ?>