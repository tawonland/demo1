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

    function getLimit()
    {
        return static::limit;
    }

	function getRowById($id)
	{
		$query = $this->db->where([static::getKey() => $id])->get('users');

		$num = $query->num_rows();

		if($num < 1)
		{
			return false;
		}

		$row = $query->row();

		$array = json_decode(json_encode($row), True);

		return $array;
	}

    function update($data, $id)
    {
        $where = array(static::getKey() => $id);

        $ok = $this->db->update(static::getTable(), $data, $where);
        
    }

}