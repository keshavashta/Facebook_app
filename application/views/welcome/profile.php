<script type="text/javascript">
    $(document).ready(function () {
        $('#search_form').submit(function (e) {
            $.post(
                    '/welcome/search',

                    function (data) {
                        $('.search_result').remove();
                        $('#search_result').html(data);
                    }
            );

            e.preventDefault();
        });
        $("#various1").fancybox({
            'titlePosition':'inside',
            'transitionIn':'none',
            'transitionOut':'none'
        });

        $("#login_form").submit(function () {
            var unameval = $("#username").val();
            var pwordval = $("#password").val();
            var bld_gp = $("#blood_gp").val();
            alert(bld_gp);
            <!--            $("#flash").show();-->
//<!--            $("#flash").fadeIn("slow",0.25).html('<img src="ajax-loading.gif" align="absmiddle">&nbsp;<span class="loading">Loading...</span>');-->
            <!---->
            <!--            $.post("--><?php //echo base_url("/test/test_post")?><!--", { username: unameval,-->
            <!--                password: pwordval }, function(data) {-->
            <!--                $("#status").html(data);-->
            <!--            });-->
            <!--            $("#flash").hide();-->
            return false;

        });
    });
</script>

<!--<script type="text/javascript">-->
<!--    $(document).ready(function() {-->
<!---->
<!---->
<!---->
<!--    });-->
<!--</script>-->
<br/>
<br/>
<div class="row">
    <div class="span12">

        <div class="span3"><img class="img-polaroid"
                                src="https://graph.facebook.com/<?php echo getUser(); ?>/picture?type=large">
        </div>

        <div><p><b>Name :  <?php echo $data->name ?></b></p>

            <p><b>Age :  <?php echo get_age_from_dob($data->dob); ?></b></p>

            <p><b>Location :  <?php echo $data->address?></b></p>

            <p><b>Blood Group :  <?php echo $data->blood_gp ?></b></p>
            <?php if (empty($data->blood_gp)) { ?>
                <a class="btn btn-danger" id="various1" href="#inline1" title="">Edit Profile</a>
                <?php } else { ?>
                <a class="btn btn-success" id="various1" href="#inline1" title="">Edit Profile</a>
                <?php }?>
        </div>


    </div>

</div>

<div style="display: none;">
    <div id="inline1" style="min-width:200px;overflow:auto;padding:10px">
        <b>Edit Profile</b>
        <br/> <br/>

        <div id="flash" align="left"></div>
        <div id="status"></div>

        <form id="login_form" class="registration" method="post">
            <?php $js = 'id="blood_gp""';      ?>
            <label>Name</label>
            <input class="textboxinput" type="text" id="username" name="username" maxlength="120" value=""/>
            <label>Location</label>
            <input class="textboxinput" type="text" id="location" name="location" maxlength="120" value=""/>
            <label>Blood Group</label> <?php  $options = array('' => 'Select Blood Group',
            'A+' => 'A+',
            'A-' => 'A-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'B+' => 'B+', 'B-' => 'B-', 'O+' => 'O+', 'O-' => 'O-'
        );    ?>


            <?php if (empty($data->blood_gp)) {
            echo form_dropdown('blood_gp', $options, '', $js);
        } else {
            echo form_dropdown('blood_gp', $options, $data->blood_gp, $js);
        } ?>
            <br/>
            <input type="submit" class="btn" value="Sign In"/>
        </form>
    </div>
</div>
<div class="row">
    <div class="span12">
        <p>Search Friends</p>

        <p>

        <form id="search_form" action="/welcome/search" type="POST">

            <input type="submit" value="Search"/>
        </form>
        </p>
        <div id="search_result">

        </div>
    </div>
</div>