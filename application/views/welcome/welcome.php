<h2 class="main-title">
   Welcome
</h2>


<form class="well" action="<?php echo site_url('hello/update')?>" id="form" method="post"
      enctype="multipart/form-data">
    <div class="row">




        <div class="span12 ">
            <input type="hidden" name="id" value="<?php echo $user_profile['id'];?>"/>
            <label>Name</label><input type="text" name="name" id="name" value="<?php echo $user_profile['name']?>" placeholder="Enter your Name"/>
            <label>Age</label>
            <input type="text" name="age" value="" placeholder="Enter your Age"/>
            <label>Location</label>
            <input type="text" name="location" value="" placeholder="Enter your location like Delhi, India"/>
            <label>Blood Group</label>
            <input type="text" name="blood_gp" value="" placeholder="Enter your Blood group,example A,B,O"/>
            <br/>
            <input class="btn" type="submit" value="Update"/>
        </div>

    </div>
</form>