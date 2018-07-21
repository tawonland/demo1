<?php

/**
* 
*/
class Books extends Auth_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Books/M_Books');
	}

	function display_books()
	{
		
		$data['page_header'] = 'All Books';
		$data['description'] = 'Display All Books';
		//$data['content_view'] = 'Books/display_books_v';
		$data['box_title'] = 'Books';
		$data['content_view'] = 'inc_listview';
		
		$data['rows'] = $this->M_Books->get_all();

		$this->template->admin_template($data);
	}

	function addBook()
	{
		$data['page_header'] = 'Add a Books';
		$data['description'] = 'Add a Books to the system';
		$data['content_view'] = 'Books/add_book_v';
		
		$data['genres'] = $this->create_genres_select();
		$data['publishers'] = $this->create_publishers_select();
		$data['authors'] = $this->create_authors_select();

		$this->template->admin_template($data);
	}

	function post_book()
	{

		$image_array = $book_authors = array();
		
		$authors = $this->input->post('authors');
		unset($_POST['authors']);

		$id = $this->M_Books->post_book();
		
		if(count($authors) > 0){
			foreach ($authors as $author) {
				$book_authors[] = [ 
					'BookId' => $id, 
					'AuthorID' => $author
				];
			}

			$this->M_Books->add_book_author($book_authors);
		}

		if (count($_FILES) > 0)
		{
			$this->load->library('upload');
			$files = $_FILES;
			$images = count($_FILES['book_images']['name']);

			for ($i=0; $i < $images ; $i++) { 
				$_FILES['book_images']['name'] = $files['book_images']['name'][$i];
				$_FILES['book_images']['type'] = $files['book_images']['type'][$i];
				$_FILES['book_images']['tmp_name'] = $files['book_images']['tmp_name'][$i];
				$_FILES['book_images']['error'] = $files['book_images']['error'][$i];
				$_FILES['book_images']['size'] = $files['book_images']['size'][$i];

				$this->upload->initialize($this->set_upload_options());
				if (!$this->upload->do_upload('book_images'))
				{
					$error = array('error' => $this->upload->display_errors());
				}
				else
				{
					$image_array[] = [
						'imagePath' => base_url() . "upload/books/" . $_FILES['book_images']['name'],
						'book_id' => $id
					];
				}
			}

			$this->M_Books->add_book_images($image_array);
			
			redirect(base_url() . 'Admin/books');
		}
	}

	function set_upload_options()
	{
		$config = array();
		$config['upload_path'] 		= FCPATH . 'upload/books/';
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '100';
		$config['overwrite'] 		= FALSE;

		return $config;
	}

	function create_genres_select()
	{
		$this->load->model('Genres/M_Genres');

		$genres = $this->M_Genres->get_active_genres();

		$option = '';
		if (count($genres))
		{
			foreach ($genres as $key => $value) 
			{
				$option .= "<option value = '{$value->book_genreid}'>{$value->book_genre}</option>";
			}
		}

		return $option;
	}

	function create_publishers_select()
	{
		$this->load->model('Publishers/M_Publishers');

		$publishers = $this->M_Publishers->get_active_publishers();

		$option = '';
		if (count($publishers)){
			foreach ($publishers as $key => $value) {
				$option .= "<option value = '{$value->publisher_id}'>{$value->publisher_name}</option>";
			}
		}

		return $option;
	}

	function create_authors_select()
	{
		$this->load->model('Authors/M_Authors');

		$authors = $this->M_Authors->get_active_authors();

		$option = '';
		if (count($authors)){
			foreach ($authors as $key => $value) {
				$option .= "<option value = '{$value->author_id}'>{$value->author_lastname} {$value->author_firstname}</option>";
			}
		}

		return $option;
	}
}