<?php
class MY_Model extends CI_Model
{

	const schema 	= null;
    const table 	= null;
    const sequence 	= null;
    const key 		= null;
    const value 	= null;
    const order 	= null;
    const label 	= null;
    // untuk paging
    const nav = 3;
    const limit = 10;
    const findlimit = 20;

	function __construct()
	{
		parent::__construct();
	}

	function getSchema() {
        global $conf;

        $schema = static::schema;
        if (empty($schema) and ! empty($conf['db_dbschema']))
            $schema = $conf['db_dbschema'];

        return $schema;
    }

	function getTable($table = null) {
        if (empty($table))
            $table = static::table;

        $schema = static::getSchema();
        if (empty($schema))
            return $table;
        else
            return $schema . '.' . $table;
    }

    private function getArray($key, $array = false) {
        $a_key = explode(',', $key);

        foreach ($a_key as $k => $v)
            $a_key[$k] = trim($v);

        if (count($a_key) == 1) {
            if ($array)
                return array($key);
            else
                return $key;
        } else
            return $a_key;
    }

    function getKey($array = false) {
        return self::getArray(static::key, $array);
    }


	function getList($offset = NULL){
		//$c = get_called_class();
		$query = $this->db->get(static::getTable(), static::getLimit(), $offset);

		return $query->result_array();
	}

    function get_where($where = NULL, $limit = NULL, $offset = NULL)
    {
        
        if($limit === NULL)
        {
            $limit = static::getLimit();
        }

        $query = $this->db->get_where(static::getTable(), $where, $limit, $offset);
        
        return $query;
    }

    function getLimit()
    {
        return static::limit;
    }

	// function getRowById($id)
	// {
	// 	$query = $this->db->where([static::getKey() => $id])->get('users');

	// 	$num = $query->num_rows();

	// 	if($num < 1)
	// 	{
	// 		return false;
	// 	}

	// 	$row = $query->row();

	// 	$array = json_decode(json_encode($row), True);

	// 	return $array;
	// }

    function getCount()
    {
        return $this->db->count_all_results(static::getTable());
    }

    function getCountSearch($search)
    {
        
        $this->db->select('*');
        $this->db->from(static::getTable());
        
        if (!empty($search)) {
            $this->db->like('user_fullname', $search);
        }

        $this->db->order_by('user_fullname','asc');

        $getData = $this->db->get('', $perPage, $uri);

        if ($getData->num_rows() > 0)
            return $getData->result_array();
        else
            return null;
        

    }

    function insert($data, $insert_id = false)
    {
        $insert = $this->db->insert(static::getTable(), $data);

        if($insert_id)
        {
            return $this->db->insert_id();
        }
        else
        {
            return $insert;
        }        
    }

    function update($data, $id, $return = false)
    {
        $where = array(static::getKey() => $id);

        $ok = $this->db->update(static::getTable(), $data, $where);
        
        if(!$ok)
        {
            $error = $this->db->error();
        }

        if($return)
        {
            return true;
        }

        list($dash, $ctl) = explode("_",strtolower(get_class($this)));

        $this->session->set_flashdata('success', info('not_saved'));
        redirect($ctl.'/detail/'.$id);
        
    }

     function delete($id, $return = false)
    {
        $where = array(static::getKey() => $id);

        $ok = $this->db->delete(static::getTable(), $where);
        
        if(!$ok)
        {
            $error = $this->db->error();
            return array(false, $error);
    
        }

        return true;
   
        
    }



}