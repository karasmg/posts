<?php
namespace Posts\Models;


use Posts\Core\Model;
use \PDO as PDO;

class Model_Posts extends Model
{

	public  $tree = "";

	public function addPost($post){
			$sql = "
				INSERT INTO `post`
				(`p_parent_id`, `p_text`, `p_date`, `p_uid`)
				VALUES (" . $post['p_parent_id'] .", '" . $post['p_text'] ."', '" . date("Y-m-d H:i:s") . "', " . $_SESSION['user_id'] . ")
		";
		$rdb = $this->db();
		$sth = $rdb->prepare($sql);
		$sth->execute();
		return $rdb->lastInsertId();
	}

	public function readPosts($parentId=0, $from=0, $to=10){
		$sql = "
			SELECT *
			FROM `post`
			LEFT JOIN (SELECT u_id, u_name FROM `user`) as u on p_uid = u_id
			WHERE `p_parent_id`= ".(int)$parentId."
			ORDER BY `p_id` DESC
			LIMIT ".(int)$from." , ".(int)$to."
		";
		$sth = $this->db()->prepare($sql);
		$sth->execute();
		$rez = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $this->array_to_tree($rez, $parentId);
	}

	public function readComments(){
		$sql = "SELECT p_id, p_parent_id, p_text, p_date, u_name
				FROM `post`
				LEFT JOIN (SELECT u_id, u_name FROM `user`) as u on p_uid = u_id
				ORDER BY p_id ASC, p_parent_id ASC";
		$sth = $this->db()->prepare($sql);
		$sth->execute();
		$rez = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $this->array_to_tree($rez);
	}

	public function array_to_tree($array, $parent = 0)
	{
		$new_arr = [];
		for ($i = 0, $c = count($array); $i < $c; $i++) {
			$new_arr[$array[$i]['p_parent_id']][] = $array[$i];
		}
		$this->tree.='[';
		$this->json_generate($new_arr, $parent);
		$this->tree.=']';
		return $this->tree;
	}


	public function json_generate($data, $parent = 0, $level = 0)
	{
		if(!isset($data[$parent]))
			return false;
		$arr = $data[$parent];
		for ($i = 0; $i < count($arr); $i++) {
			$this->tree .= ($i==0) ? '{' : ' , {';
			$this->tree .= '"p_id" : ' . $arr[$i]['p_id'] . ',';
			$this->tree .= '"p_parent_id" : ' . $arr[$i]['p_parent_id'] . ',';
			$this->tree .= '"p_text" : "' . $arr[$i]['p_text'] . '",';
			$this->tree .= '"p_date" : "' . $arr[$i]['p_date'] .  '",';
			$this->tree .= '"u_name" : "' . $arr[$i]['u_name'] .  '"';
			if (isset($data[$arr[$i]['p_id']])) {
				$this->tree .= '"nodes": [';
				$this->json_generate($data, $arr[$i]['p_id'], $level++);
				$this->tree .= '],';
			}
			$this->tree .= "}";
		}
	}
}
