<div class="row">
	<div class="col-md-12">
		
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Books</h3>

              <a href="<?php echo base_url();?>Admin/addBook" class="btn btn-success pull-right">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<th>#</th>
						<th>Book Name</th>
						<th>ISBN</th>
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
								<td><?php echo $i; ?></td>
								<td><?php echo $row->book_title; ?></td>
								<td><?php echo $row->book_isbn; ?></td>
							</tr>
							<?
							} 
						}
						else
						{
						?>
							<td colspan="3">Tidak ada data</td>
						<?
						}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>