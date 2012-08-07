<div class="row">
    <div class="span12">
        <h2>Edit Profile</h2>
        <form class="well" action="<?php echo site_url('hello/update')?>" id="form" method="post"
              enctype="multipart/form-data">


            <input type="hidden" name="id" value="<?php echo $data->user_id;?>"/>
            <label>Name</label>
            <input type="text" name="name" id="name" value="<?php echo $data->name?>"
                   placeholder="Enter your Name"/>
            <label>Date of Birth</label>
            <input type="text" name="dob" id="dob" value="<?php echo $data->dob?>"
                   placeholder="Enter your date of birth"/>

            <label>Location</label>
            <input type="text" name="location" value="<?php echo $data->address;?>" placeholder="Enter your location like Delhi, India"/>
            <label>Blood Group</label>
            <!--            <select class="span3">-->
            <!--                <option>A+</option>-->
            <!--                <option>A-</option>-->
            <!--                <option>B+</option>-->
            <!--                <option>B-</option>-->
            <!--                <option>AB+</option>-->
            <!--                <option>AB-</option>-->
            <!--                <option>O+</option>-->
            <!--                <option>O-</option>-->
            <!--            </select>-->
           <?php  $options = array( ''=>'Select Blood Group'  ,
            'A+' => 'A+',
            'A-' => 'A-'
            );    ?>


            <?php if (empty($data->blood_gp)) {
            echo form_dropdown('blood_gp', $options, '');
        } else {
            echo form_dropdown('blood_gp', $options, $data->blood_gp);
        } ?>

            <br/>
            <input class="btn" type="submit" value="Update"/>


        </form>
    </div>
</div>