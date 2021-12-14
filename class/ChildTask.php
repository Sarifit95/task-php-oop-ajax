<?php
//require_once ("class/DBController.php");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/class/DBController.php');

class ChildTask
{
    private $db_handle;

    function __construct()
    {
        //add DBController for database and query
        $this->db_handle = new DBController();
    }

    //get all chil task
    public function alltask()
    {
        $query = "SELECT t.name as task_name, c.name, c.description, c.id  FROM child_tasks as c  left join tasks as t on c.task_id=t.id order by c.id desc";

        $result = $this->db_handle->runBaseQuery($query);


        return $result;
    }

//delete chil task
    public function deleteTask($id)
    {
        $query = "Delete  FROM child_tasks  WHERE id = ? ";


        $paramType = "i";
        $paramValue = array(
            $id,
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return true;
    }

    //add chil task

    public function addChildTask($name, $description, $task)
    {


        $query = "INSERT INTO child_tasks (name, description, task_id) VALUES (?, ?, ?)";
        $paramType = "sss";
        $paramValue = array(
            $name,
            $description,
            $task,
        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }


}
