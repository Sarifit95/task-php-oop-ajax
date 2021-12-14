<?php
session_start();
require_once("../class/Task.php");

//create class object
$task = new Task();

//this file receive data from js file and response


if (!empty($_POST['action'])) {
    //if view all task
    if ($_POST['action'] == 'view') {
        $alltaks = $task->alltask();
        $response = [
            'success' => true,
            'tasklist' => $alltaks,
            'message' => 'Task List',
        ];
        echo json_encode($response);


    }
    //if add task
    if ($_POST['action'] == 'insert') {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $datetime = $_POST['datetime'];

        if (!empty($name) && !empty($description) && !empty($datetime)) {
            $alltaks = $task->addTask($name, $description, $datetime);
            echo true;
        } else {
            echo false;
        }


    }
    //if update task
    if ($_POST['action'] == 'update') {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $datetime = $_POST['datetime'];
        $updateid = $_POST['updateid'];


        if (!empty($name) && !empty($description) && !empty($datetime)) {
            $alltaks = $task->updateTask($updateid, $name, $description, $datetime);
            echo true;
        } else {
            echo false;
        }


    }
    //if Action is get task by id
    if ($_POST['action'] == 'getById') {

        $id = $_POST['taskid'];

        if (!empty($id)) {
            $task = $task->getById($id);
            echo json_encode($task);
        } else {
            echo false;
        }


    }
    //if Action is delete one Task
    if ($_POST['action'] == 'delete') {

        $id = $_POST['taskid'];


        if (!empty($id)) {
            if ($task->haveChildTask($id) == 0) {
                $task = $task->deleteTask($id);


                $response = [
                    'success' => true,
                    'message' => 'Deleted Successfully!',
                ];

            } else {
                $response = [
                    'success' => false,
                    'message' => 'Sorry! You have Child Task under This Task',
                ];

            }


        } else {
            $response = [
                'success' => false,
                'message' => 'Your Data is not found!',
            ];
        }
        echo json_encode($response);


    }
    //if Action is delete Multiple Task
    if ($_POST['action'] == 'deleteMultiple') {

        $id = $_POST['taskid'];

        if (!empty($id)) {
            if ($task->haveChildTask($id) == 0) {
                $task = $task->deleteTask($id);


                $response = [
                    'success' => true,
                    'message' => 'Deleted Successfully!',
                ];

            } else {
                $response = [
                    'success' => false,
                    'message' => 'Sorry! You have Child Task under This Task',
                ];

            }


        } else {
            $response = [
                'success' => false,
                'message' => 'Your Data is not found!',
            ];
        }
        echo json_encode($response);


    }
    /// if action is Complete multiple Task
    if ($_POST['action'] == 'completeMultiple') {

        $id = $_POST['taskid'];


        if (!empty($id)) {
            $task = $task->completeMultipleTask($id);
            if ($task) {
                echo true;
            }

        } else {
            echo false;
        }


    }
}




