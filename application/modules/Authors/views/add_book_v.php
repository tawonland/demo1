<div class="row">
	<div class="col-md-12">
	<form method ="POST" action="<?php echo base_url();?>Books/post_book">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label>Book Title</label>
					<input type="text" name="book_title" class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>ISBN Number</label>
					<input type="text" name="book_isbn" class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Year of Publication</label>
					<input type="text" name="book_yop" class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Book Genre</label>
					<input type="text" name="book_genreid" class="form-control select2">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Publisher</label>
					<select name="book_publisherid" class="form-control select2">
						<option>Select a publisher</option>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Authors</label>
					<select name="authors[]" class="form-control select2">
						<option>Select 1 or more authors</option>
					</select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Authors</label>
					<input type="file" name="book_images" multiple>
				</div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-primary btn-large">Save</button>
			</div>
		</div>
	</div>
</div>