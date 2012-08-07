<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>


<script type="text/javascript">
    $(function () {


        $('.send').live('click', function (e) {
            e.preventDefault();
            var row_id = $(this).data('id');
            alert(row_id);
            $('#send-'+row_id).hide('slow');
            $('#ajax-loader-img-' + row_id).removeClass("no-display");
            $('#ajax-loader-img-' + row_id).addClass('table-image');

            $.get("/hello/post_to_friend_wall", { user_id: row_id },
                function(data){
                    if(data==1){
                        $('#ajax-loader-img-' + row_id).removeClass("table-image");
                        $('#ajax-loader-img-' + row_id).addClass('no-display');
                        $('#send-img-' + row_id).removeClass("no-display");
                        $('#send-img-' + row_id).addClass('table-image');
                                          }
                    else{
                        alert("Email could not be sent.");
                        $('#ajax-loader-img-' + row_id).removeClass("table-image");
                        $('#ajax-loader-img-' + row_id).addClass('no-display');
                        $('#send-'+row_id).show('slow');



                    }
        });
    });


    });


</script>


<div class="row">
    <div class="span12">
        <h2>Friends with Same Blood Group</h2>
                <br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Location</th>
                <th>Blood Group</th>
                <th>Post Message</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($friend_with_same_gp as $row) { ?>
            <tr>
                <td><?php echo $row->name?></td>
                <td><?php echo get_age_from_dob($row->dob)?></td>
                <td><?php echo $row->address?></td>
                <td><?php echo $row->blood_gp?></td>
                <td>
                    <a href="#"  class="send" id ="send-<?php echo $row->user_id;?>" data-id="<?php echo $row->user_id;?>">Post Blood Req Message</a>
                    <p class="no-display" id="send-img-<?php echo $row->user_id;?>"><img src="<?php echo base_url('/assets/img/OK.png')?>" alt=""></p>
                    <p class="no-display" id="ajax-loader-img-<?php echo $row->user_id;?>"><img src="<?php echo base_url('/assets/img/ajax-loader.gif')?>" alt=""></p>
                </td>

            </tr>
                <?php }?>
            </tbody>
        </table>


        <h2>Friends with Different Blood Group</h2>
        <br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Location</th>
                <th>Blood Group</th>
                <th>Post Message</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($friend_with_diff_gp as $row) { ?>
            <tr>
                <td><?php echo $row->name?></td>
                <td><?php echo get_age_from_dob($row->dob)?></td>
                <td><?php echo $row->address?></td>
                <td><?php echo $row->blood_gp?></td>
                <td>
                    <a href="#"  class="send" id ="send-<?php echo $row->user_id;?>" data-id="<?php echo $row->user_id;?>">Post Blood Req Message</a>
                    <p class="no-display" id="send-img-<?php echo $row->user_id;?>"><img src="<?php echo base_url('/assets/img/OK.png')?>" alt=""></p>
                    <p class="no-display" id="ajax-loader-img-<?php echo $row->user_id;?>"><img src="<?php echo base_url('/assets/img/ajax-loader.gif')?>" alt=""></p>
                </td>

            </tr>
                <?php }?>
            </tbody>
        </table>

        <h2>Friends those are not aware of this Website</h2>
        <br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>

                <th>Post Message</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($unknown_friends as $row) { ?>
            <tr>
                <td><?php echo $row?></td>

                <td><a href="#">Post</a></td>

            </tr>
                <?php }?>
            </tbody>
        </table>


    </div>
</div>