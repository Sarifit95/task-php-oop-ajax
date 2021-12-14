$('#formid').hide();
$('#tasktable').hide();

$( document ).ready(function() {

// taskview function call
    taskview();

    //create function for child task show

    function taskview(){
        $('#headvalue').html("Child Task list");
        $('#tasktable').show();
        $('#formid').hide();
        $('#dcbtn').hide();


        $.ajax({
            url: "web/_child_ajax.php",
            method: "POST",
            data: {action:'view'},
            success: function (data) {
                // var string = JSON.stringify(data)
                var json = JSON.parse(data)
                var sl=0;
                $('#tbody').text('');


                Object.keys(json).forEach(function (key) {
                    sl++;
                    let value = json[key];











                  

                    let Datetime= new Date(value.taskDate).toLocaleString(['en-TT'], { hour12: true})
                    $('#tbody').append(
                        '<tr>' +
                        '                            <th scope="row">'+sl+'' +
                        '                            <th scope="row">'+value.name+'</th>' +
                        '                            <th scope="row">'+value.description+'</th>' +
                        '                            <th scope="row">'+value.task_name+'</th>' +

                        '                            <th scope="row">' +
                        '<button  data-id='+value.id+' class="deleteid btn btn-sm btn-danger">Delete</button>' +
                        '</th>' +

                        '                        </tr>'
                    );

                });





                $(".deleteid").click(function () {
                    let id = $(this).attr("data-id");

                    $.ajax({
                        url: "web/_child_ajax.php",
                        method: "POST",
                        data: {action:'delete',taskid:id},
                        success: function (data) {
                            taskview();

                        }
                    });

                });


            }
        });
    }

    //add child task form show
    $("#addnew").click(function(){
        $('#headvalue').html("Add New Child Task");
        $('#taskform').trigger("reset");
        $('#inputAction').val('insert')
        $('#formid').show();
        $('#tasktable').hide();
    });

    // if child task list show then table is view
    $("#tasklist").click(function(){
        taskview();
    })

    //ad child task data
    $('#taskform').on('submit', function (e) {

        e.preventDefault();



        $.ajax({
            type: 'post',
            url: 'web/_child_ajax.php',
            data: $('#taskform').serialize(),
            success: function (data) {
                if (data==true){
                    $('#taskform').trigger("reset");
                    taskview();
                }
                else if(data==false){
                    alert("sorry! data not inserted");
                }

            }
        });

    });



});


