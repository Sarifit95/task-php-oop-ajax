<?php
//require_once ("class/DBController.php");
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/class/DBController.php');

class Task
{
    private $db_handle;

    function __construct()
    {
        $this->db_handle = new DBController();
    }

    //View All Task
  public  function alltask()
    {
        $this->deleteOldData();
        $query = "SELECT * FROM tasks order by id desc";

        $result = $this->db_handle->runBaseQuery($query);


        return $result;
    }

    //Ad Task in list
  public  function addTask($name, $description, $datetime)
    {


        $query = "INSERT INTO tasks (name, description, isDone, taskDate) VALUES (?, ?, ?, ?)";
        $paramType = "ssss";
        $paramValue = array(
            $name,
            $description,
            '0',
            $datetime,

        );

        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }


    //Get Task By Id
  public function getById($id)
    {
        $query = "SELECT * FROM tasks  WHERE id = ? ";


        $paramType = "i";
        $paramValue = array(
            $id,
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result[0];
    }

//Delete Task by Task id
    public function deleteTask($id)
    {
        $query = "Delete  FROM tasks  WHERE id = ? ";


        $paramType = "i";
        $paramValue = array(
            $id,
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return true;
    }


    //Update Task

    public function updateTask($id, $name, $description, $datetime)
    {


        $query = "UPDATE tasks SET name = ?,description = ?,taskDate = ? WHERE id = ?";
        $paramType = "sssi";
        $paramValue = array(
            $name,
            $description,
            $datetime,
            $id,

        );

        $this->db_handle->update($query, $paramType, $paramValue);
        return $this->getById($id);

    }


    /// Complete Multiple task

    public function completeMultipleTask($id)
    {


        $query = "UPDATE tasks SET isDone = ? WHERE id = ?";
        $paramType = "ii";
        $paramValue = array(
            '1',
            $id,

        );

        return $this->db_handle->update($query, $paramType, $paramValue);


    }


    //if have child task

    public function haveChildTask($id)
    {
        $query = "SELECT count(id) as total FROM child_tasks  WHERE task_id = ? ";


        $paramType = "i";
        $paramValue = array(
            $id,
        );
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result[0]['total'];
    }


    ///deleteOldData where date

    public function deleteOldData()
    {

        $query = "DELETE t1, t2 FROM tasks t1 LEFT JOIN child_tasks t2 ON t1.id = t2.task_id WHERE DATE_ADD(t1.taskDate, INTERVAL 2 DAY)<CURDATE() and t1.isDone= ?";
        $paramType = "i";
        $paramValue = array(
            '1'
        );
        return $this->db_handle->update($query, $paramType, $paramValue);
    }


}
