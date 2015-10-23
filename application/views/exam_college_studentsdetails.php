<div class="middle">
    <div class="container">

        <div class="row about">
            <div id="container_id" class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>Add student</h2>
                    <br />
                    <br />
                    <?php $this->load->helper('form');
                    $this->load->helper('url');
                    echo form_open('/exam/add_student', array('class' => 'form-register ', 'role' => 'form', 'id' => 'add_student'));
                    ?>

                    <div class="responsive-table">
                        <table class="table table-condensed text-left">


                            <tr>
                                All fields marked * are required
                            </tr>
                            <tr>
                            <br>
                            <br>
                            </tr>
                            <tr>
                                <td width="150px">
                                    <label for="admnno">Admission Number<sup>*</sup>
                                    </label>
                                </td>
                                <td width="250px">
                                    <input type="number" class="form-control margin_bottom_10" name="admnno" id="admnno" placeholder="Admission Number"  required>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="year">Academic Month/Year<sup>*</sup>
                                    </label>
                                </td>
                                <td>

                                    <select required="required" class="form-control margin_bottom_10" id="month" name="month">
                                        <option value="select">Select Month</option>
                                        <option value="July">July</option>
                                    </select>
                                    <select required="required" id="year" name="year" class="form-control margin_bottom_10">
                                        <option value="select">Select Year</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                    </select>

                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <label for="degree">Degree Name<sup>*</sup>
                                    </label>
                                </td>
                                <td>
                                    <select onchange="javascript:load_branches();" class="form-control margin_bottom_10" name="degree" id="degree" required>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="branch">Branch Name<sup>*</sup>
                                    </label>
                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" id="branch" name="branch" required>

                                    </select>
                                </td>
                            </tr>

                            <tr class="step2">
                                <td>
                                    <label for="std_name">Student Name<sup>*</sup>
                                    </label>
                                </td>
                                <td > <input class="form-control margin_bottom_10" name="name" id="name"placeholder="Student Name" required >
                                    <br>
                                </td>
                            </tr>
                            <tr >
                                <td >
                                    <label for="email">Email Address<sup>*</sup>
                                    </label>
                                </td>
                                <td >
                                    <input class="form-control margin_bottom_10" name="email" id="email" placeholder="Email Address" type="email" required >
                                </td>
                            </tr>



                            <tr>
                                <td colspan="2">
                                    <div id="result"></div>
                                </td>
                            </tr>






                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Add Student</button>
                                    <br>
                                </td>
                            </tr>

                        </table>
                    </div>
                    </form>
                </div>

            </div>

        </div>


    </div>




</div>

<script type="text/javascript">


    $('#add_student').prop("action", "javascript:add_student();");


    function add_student() {
        var admnno = $("#admnno").val();

        var month = $("#month").val();
        var year = $("#year").val();

        var degree = $("#degree").val();
        var branch = $("#branch").val();
        var name = $("#name").val();
        var email = $("#email").val();
        if (admnno <= 0 || admnno == "")
            alert("Enter correct Admission number");
        else if (month == "" || month == "select")
            alert("Enter correct Month");
        else if (year == "" || year == "select")
            alert("Enter correct Year");
        else if (degree == "" || degree == "select")
            alert("Enter correct degree");
        else if (branch == "" || branch == "select")
            alert("Enter correct branch");
        else if (name == "")
            alert("Enter correct name");
        else if (email == "")
            alert("Enter correct email");
        else
            $.ajax({
                url: url + "students_add",
                type: 'POST',
                data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                    "admnno": admnno,
                    "month": month,
                    "year": year,
                    "degree": degree,
                    "branch": branch,
                    "name": name,
                    "email": email

                },
                success: function (result) {
                    var ok = '<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student added Successfully</div>';
                    var fail = '<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Student addition failed    </div>';

                    if (result == "ok") {
                        $('#admnno , #name , #email').val('');

                        $('#result').html(ok);
                    }
                    else if (result == "not ok")
                        $('#result').html(fail);
                    else {
                        $('#result').html(fail + " " + result);
                    }
                }

            });


    }

    var url = '<?php echo base_url(); ?>index.php/exam/';

    $.ajax({
        url: url + "degree_list",
        type: 'POST',
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            "college_id": <?php echo $this->session->userdata('collegeid'); ?>
        },
        success: function (result) {
            $("#degree").html(result);
        }

    });


    function load_branches() {
        if ($("#degree").val() == "select" || $("#degree").val() == "") {
            $("#branch").html("");
            return false;

        }

        $.ajax({
            url: url + "branch_list",
            type: 'POST',
            data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                "course_id": $("#degree").val()
            },
            success: function (result) {
                $("#branch").html(result);

            }

        });
    }
</script>
