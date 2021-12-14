<html>
<head>


    <title>Child Task</title>
    <meta name="author" content="Sariful Islam">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable lib -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .btn-success {
            color: white !important;
        }
    </style>
</head>
<body>


<div style="text-align: center">
<!--    Back to task List Button-->
    <a class="btn btn-sm btn-info" href="index">Back Task</a>

</div>
<h3 style="text-align: center" id="headvalue"></h3>

<div class="row">

    <div class="col-md-12 ">

        <div class="card border" style="">

            <div class="card-body" style=" text-align: center;">
                <!--                ***** Child Task add form  Start -->

                <div id="formid">
                    <div style="text-align: center">

                        <a id="tasklist" class="btn btn-sm btn-success">Child Task List</a></div>
                    <br>


                    <form action="" method="POST" name="taskform" id="taskform">
                        <input type="hidden" name="action" value="insert" id="inputAction">


                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Child Name</label>
                            <div class="col-md-8">
                                <input type="text" required id="name" name="name" class="form-control"
                                       placeholder="Child Task Name">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label">Child Description</label>
                            <div class="col-md-8">
                                <textarea required id="description" name="description" class="form-control"></textarea>

                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="task" class="col-md-2 col-form-label">Select Task</label>
                            <div class="col-md-8">
                                <select id="task" name="task" class="form-control">

                                    <?php
                                    require_once("class/Task.php");
                                    $tasks = new Task();
                                    $alltask = $tasks->alltask();
                                    if (!empty($alltask)) {
                                        foreach ($alltask as $k => $v) {
                                            ?>
                                            <option value="<?php echo $alltask[$k]["id"]; ?>"><?php echo $alltask[$k]["name"]; ?></option>

                                            <?php


                                        }

                                    }
                                    ?>
                                </select>


                            </div>

                        </div>

                        <div class="form-group row">


                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success" style="">Submit</button>

                            </div>

                        </div>


                    </form>

                </div>
                <!--                ***** Child Task add form  End -->


                <!--                ***** Child Task show in tabel Start -->
                <div id="tasktable">
                    <div style="text-align: center">
                        <div class="form-group row">

                            <div class="col-md-3">
                                <a id="addnew" class="btn btn-sm btn-success">Add new</a>
                            </div>

                        </div>


                    </div>
                    <br>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Child Name</th>
                            <th scope="col">Child Description</th>
                            <th scope="col">Task Name</th>

                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
                <!--                ***** Child Task show in tabel end -->

            </div>
        </div>
    </div>
</div>


<script src="js/child.js" type="text/javascript"></script>

</body>
</html>












