<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 22.01.2017
 * Time: 16:42
 */
$yui = new tree();
header('Content-Type: text/html; charset=utf-8');
echo '<pre>';
echo $yui->array_to_tree($yui->array);
echo '</pre>';


class tree
{

    public $tree = "";

    public function array_to_tree($array)
    {
        $new_arr = [];
        for ($i = 0, $c = count($array); $i < $c; $i++) {
            $new_arr[$array[$i]['p_parent_id']][] = $array[$i];
        }
        $this->tree.="[";
        $this->my_sort($new_arr);
        $this->tree.="]";
        return $this->tree;
    }


    public function my_sort($data, $parent = 0, $level = 0)
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
                $this->my_sort($data, $arr[$i]['p_id'], $level++);
                $this->tree .= "],";
            }
            $this->tree .= "},\n";
        }
    }
}

