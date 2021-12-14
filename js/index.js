$('#formid').hide();//form hide
$('#tasktable').hide(); //task table hide

$(document).ready(function () {


//call task view function
    taskview();


    ///create Taskview function
    function taskview() {
        $('#headvalue').html("Task list");
        $('#tasktable').show();
        $('#formid').hide();
        $('#dcbtn').hide();

//ajax request for data
        $.ajax({
            url: "web/_ajax.php",
            method: "POST",
            data: {action: 'view'},
            success: function (dat) {
                var jsona = $.parseJSON(dat);
                //if response and then check response success is true then show data in table
                if (jsona.success == true) {
                    var sl = 0;
                    $('#tbody').text('');

                    let json = jsona.tasklist;


                    Object.keys(json).forEach(function (key) {

                        sl++;
                        let value = json[key];

                        let done = value.isDone == "1" ? "Done" : "Pending";
                        let style = value.isDone == "1" ? "color: green" : "color: red";

                        let Datetime = new Date(value.taskDate).toLocaleString(['en-TT'], {hour12: true})
                        $('#tbody').append(
                            '<tr>' +
                            '                            <th scope="row">' + sl + '</th>' +
                            '<th><input class="btncheckbox" name="checkbox[]" type="checkbox" value="' + value.id + '"></th>' +
                            '                            <th scope="row">' + value.name + '</th>' +
                            '                            <th scope="row">' + value.description + '</th>' +
                            '                            <th  scope="row">' + Datetime + '</th>' +

                            '                            <th style="' + style + '" scope="row">' + done + '</th>' +
                            '                            <th scope="row">' +
                            '<button  data-id="' + value.id + '" style="margin: 5px;" class="editid btn btn-sm btn-info">Edit</button>' +
                            '<button  data-id=' + value.id + ' class="deleteid btn btn-sm btn-danger">Delete</button>' +
                            '</th>' +

                            '                        </tr>'
                        );

                    });

                } else {
                    console.log('Error');
                }


                //if click btncheckbox in single row then show multiple delete and multiple complete button
                $(".btncheckbox").click(function () {

                    //Reference the CheckBoxes and determine Total Count of checked CheckBoxes.
                    var checked = $('input[name="checkbox[]"]:checked').length;


                    if (checked > 0) {
                        $('#dcbtn').show();

                    } else {
                        $('#dcbtn').hide();

                    }


                    // else {
                    //     alert("Please select CheckBoxe(s).");
                    //     return false;
                    // }
                });


                //action for edit button
                $(".editid").click(function () {
                    let id = $(this).attr("data-id");
                    $('#inputAction').val('update')
                    $('#updateid').val(id);

                    $.ajax({
                        url: "web/_ajax.php",
                        method: "POST",
                        data: {action: 'getById', taskid: id},
                        success: function (data) {
                            // var string = JSON.stringify(data)
                            $('#headvalue').html("Update Task");
                            var json = JSON.parse(data)
                            $('#name').val(json.name);

                            $('#description').val(json.description);

                            let date = new Date(json.taskDate);

                            let d = new Date(json.taskDate);
                            const now = (d.toLocaleString("sv-SE") + '').replace(' ', 'T');


                            $('#datetime').val(now);
                            $('#formid').show();
                            $('#tasktable').hide();


                        }
                    });


                });

               //action for delete button
                $(".deleteid").click(function () {
                    let id = $(this).attr("data-id");

                    $.ajax({
                        url: "web/_ajax.php",
                        method: "POST",
                        data: {action: 'delete', taskid: id},
                        success: function (data) {
                            var json = $.parseJSON(data);
                            if (json.success == false) {
                                alert(json.message);


                            }
                            console.log(json.success);


                            taskview();

                        }
                    });

                });


            }
        });
    }



//multiple delete action with deletebtn id
    $("#deletebtn").click(function () {

        $('input[name="checkbox[]"]:checked').each(function (index) {
            const id = $(this).val();

            $.ajax({
                url: "web/_ajax.php",
                method: "POST",
                data: {action: 'deleteMultiple', taskid: id},
                success: function (data) {
                    var json = $.parseJSON(data);
                    if (json.success == false) {
                        alert(json.message);


                    }
                    console.log(json.success);
                    taskview();

                }
            });

        });


    });

    //multiple complete action with completebtn id
    $("#completebtn").click(function () {
        $('input[name="checkbox[]"]:checked').each(function (index) {
            const id = $(this).val();

            $.ajax({
                url: "web/_ajax.php",
                method: "POST",
                data: {action: 'completeMultiple', taskid: id},
                success: function (data) {
                    taskview();

                }
            });

        });


    });


    ///if click add new function then show form for add
    $("#addnew").click(function () {
        $('#headvalue').html("Add New Task");
        $('#taskform').trigger("reset");
        $('#inputAction').val('insert')
        $('#formid').show();
        $('#tasktable').hide();
    });


    /// click task list button then show list
    $("#tasklist").click(function () {
        taskview();
    })

    //if submit form for task insert and update
    $('#taskform').on('submit', function (e) {

        e.preventDefault();


        $.ajax({
            type: 'post',
            url: 'web/_ajax.php',
            data: $('#taskform').serialize(),
            success: function (data) {
                if (data == true) {
                    $('#taskform').trigger("reset");
                    taskview();
                } else if (data == false) {
                    alert("sorry! data not inserted");
                }

            }
        });

    });


});


