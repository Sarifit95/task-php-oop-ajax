<?php
session_start();
require_once ("../class/ChildTask.php");


//create object of childtask class
$task=new ChildTask();





if (!empty($_POST['action'])){

    //action for child task view
    if ($_POST['action']=='view'){
        $alltaks=$task->alltask();
       echo json_encode($alltaks);



    }

    //action for add child task
    if ($_POST['action']=='insert'){

       $name= $_POST['name'];
       $description= $_POST['description'];
       $task_id= $_POST['task'];


       if (!empty($name) && !empty($description) && !empty($task_id)){
           $task->addChildTask($name, $description, $task_id);
           echo true;
       }
       else{
           echo false;
       }





    }

   //action for delete child task
    if ($_POST['action']=='delete'){

       $id= $_POST['taskid'];

       if (!empty($id)){
           $task=$task->deleteTask($id);
           if ($task){
               echo true;
           }

       }
       else{
           echo false;
       }





    }

}




