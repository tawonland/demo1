<?php

/**
* 
*/
class Books extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	function display_books()
	{
		$data['page_header'] = 'All Books';
		$data['description'] = 'Display All Books';
		$data['content_view'] = 'Books/display_books_v';
		$this->template->admin_template($data);
	}

	function addBook()
	{
		$data['page_header'] = 'Add a Books';
		$data['description'] = 'Add a Books to the system';
		$data['content_view'] = 'Books/add_book_v';
		$this->template->admin_template($data);
	}
}