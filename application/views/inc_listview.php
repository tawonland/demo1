<table id="example1" class="table table-bordered table-striped">
	<thead>
		<?
		if(count($a_kolom) > 0)
		{
			$colspan = 0;
			foreach ($a_kolom as $key => $kolom) 
			{
				$colspan++;
			?>
				<th><?php echo $kolom['label']; ?> </th>
			<?
			}
		}
		?>
	</thead>
	<tbody>
		<?

		if(count($rows) > 0)
		{
			$i = 0;
			foreach ($rows as $key => $row) 
			{
				$i++;
			?>
			<tr>
				<?
				if(count($a_kolom) > 0)
				{
					$colspan = 0;
					foreach ($a_kolom as $key_k => $kolom) 
					{
						$colspan++;
					?>
						<td><?php echo $row->{$kolom['field']}; ?></td>
					<?
					}
				}
				?>
			</tr>
			<?
			} 
		}
		else
		{
		?>
			<td colspan="<?php echo $colspan; ?>" class="text-center">Tidak ada data</td>
		<?
		}

		?>
	</tbody>
</table>