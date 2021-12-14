<html>
<head>


    <title> Task</title>
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


<div style="text-align: center"><a class="btn btn-sm btn-info" href="child-task">Child Task</a></div>

<h3 style="text-align: center" id="headvalue"></h3>

<div class="row">

    <div class="col-md-12 ">

        <div class="card border" style="">

            <div class="card-body" style=" text-align: center;">

                <!--        ********  insert and update form start --->
                <div id="formid">
                    <div style="text-align: center"><a id="tasklist" class="btn btn-sm btn-success">Task List</a></div>
                    <br>


                    <form action="" method="POST" name="taskform" id="taskform">
                        <input type="hidden" name="action" value="insert" id="inputAction">
                        <input type="hidden" name="updateid" value="" id="updateid">

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">Task Name</label>
                            <div class="col-md-8">
                                <input type="text" required id="name" name="name" class="form-control"
                                       placeholder="Task Name">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label">Task Description</label>
                            <div class="col-md-8">
                                <textarea required id="description" name="description" class="form-control"></textarea>

                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="datetime" class="col-md-2 col-form-label">Date & Time</label>
                            <div class="col-md-8">
                                <input required type="datetime-local" id="datetime" name="datetime"
                                       class="form-control">


                            </div>

                        </div>

                        <div class="form-group row">


                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success" style="">Submit</button>

                            </div>

                        </div>


                    </form>

                </div>

                <!--        ********   insert and update form End --->


                <!--        ********  show data in table start --->
                <div id="tasktable">
                    <div style="text-align: center">
                        <div class="form-group row">

                            <div class="col-md-3">
                                <a id="addnew" class="btn btn-sm btn-success">Add new</a>
                            </div>
                            <div class="col-md-6" id="dcbtn">
                                <a id="deletebtn" class="btn btn-sm btn-success">Delete</a>

                                <a id="completebtn" class="btn btn-sm btn-success">Complete</a>
                            </div>

                        </div>


                    </div>
                    <br>
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Checkbox</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Complete Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
                <!--        ********  show data in table end-->
            </div>
        </div>
    </div>
</div>


<script src="js/index.js" type="text/javascript"></script>

</body>
</html>












