<?php

class Model_Posts extends Model
{

	public  $tree = "";

	public function add_post(){

	}

	public function readMessages(){
		$sql = "SELECT * FROM `post` WHERE 1 order by p_id ASC, p_parent_id ASC ";
		$sth = $this->db()->prepare($sql);
		$sth->execute();
		$rez = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $this->array_to_tree($rez);
	}

	public function array_to_tree($array)
	{
		$new_arr = [];
		for ($i = 0, $c = count($array); $i < $c; $i++) {
			$new_arr[$array[$i]['p_parent_id']][] = $array[$i];
		}
		$this->tree.="[";
		$this->json_generate($new_arr);
		$this->tree.="]";
		return $this->tree;
	}


	public function json_generate($data, $parent = 0, $level = 0)
	{
		$arr = $data[$parent];

		for ($i = 0; $i < count($arr); $i++) {
			$this->tree .= "{\n";
			$this->tree .= "'p_id': '" . $arr[$i]['p_id'] . "',\n";
			$this->tree .= "'p_parent_id': '" . $arr[$i]['p_parent_id'] . "',\n";
			$this->tree .= "'p_text': '" . $arr[$i]['p_text'] . "',\n";
			$this->tree .= "'p_date': '" . $arr[$i]['p_date'] . "',\n";
			if (isset($data[$arr[$i]['p_id']])) {
				$this->tree .= "'nodes': [";
				$this->json_generate($data, $arr[$i]['p_id'], $level++);
				$this->tree .= "],";
			}
			$this->tree .= "},\n";
		}
	}


}
