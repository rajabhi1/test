<div class="container p-5">
	<?= form_open_multipart("admin/update/{$userdata->id}") ?>
  <fieldset>
    <legend class="text-center text-success">Fill user data</legend>
    <div class="form-group">
      <label for="exampleInputname">Name</label>
      <?= form_input(['name'=>'name','class'=>'form-control','placeholder'=>'Your name','value'=>set_value('name',$userdata->name)]) ?>
      <span class="error"><?= form_error('name'); ?></span>
      <!-- <input type="text" class="form-control" placeholder="Your name"> -->
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <?= form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Enter email','value'=>set_value('email',$userdata->email)]) ?>
      <span class="error"><?= form_error('email'); ?></span>
      <!-- <input type="email" class="form-control" placeholder="Enter email"> -->
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <?= form_input(['name'=>'phone','class'=>'form-control','placeholder'=>'phone','value'=>set_value('phone',$userdata->phone)]) ?>
      <span class="error"><?= form_error('phone'); ?></span>
      <!-- <input type="password" class="form-control"  placeholder="Password"> -->
    </div>
     <div class="form-group">
     <?php $gender = set_value('gender',$userdata->gender); ?>
      <label for="exampleSelect1">Gender</label>
      <select class="form-control" name="gender">
        <option value=""> Select gender</option>
        <option value="male" <?php if(isset($gender) && $gender == 'male'){ echo "selected='selected'";} ?> >Male</option>
        <option value="female"  <?php if(isset($gender) && $gender == 'female'){echo "selected='selected'";} ?>  > Female</option>
        <option value="other"  <?php if(isset($gender) && $gender == 'other'){echo "selected='selected'";} ?> >Other</option>
      </select>
      <span class="error"><?= form_error('gender'); ?></span>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <?= form_upload(['name'=>'image','class'=>'form-control-file']) ?>
      <span class="error"><?php if(isset($img_error)) echo $img_error  ?></span>
      <!-- <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp"> -->
    </div>
    	<?= form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Submit']); ?>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
  </fieldset>
<?= form_close(); ?>
</div>