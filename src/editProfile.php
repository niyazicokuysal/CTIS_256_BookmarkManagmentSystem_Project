<div class="container">
    <h1 class="card-panel teal center white-text">Edit User</h1>
    <form method="post" enctype="multipart/form-data" action="editUserDB">
    <!-- upload image-->
    <input type="hidden" name="profile" value="<?=$_SESSION["user"]["profile"]?>">
    <!-- upload image-->
      
      <div class="input-field">
        <input placeholder="Name" id="user_name" type="text" name="name" value="<?= $_SESSION["user"]["name"] ?>">
        <label for="user_name">Full Name</label>
      </div>

      <div class="input-field">
        <input placeholder="Email" id="user_email" type="text" name="email" value="<?= $_SESSION["user"]["email"] ?>">
        <label for="user_email">Email</label>
      </div>

      <div class="input-field">
           <input type="text" placeholder="Birthday" class="datepicker" name="bday" id="user_bday" value="<?= $_SESSION["user"]["bday"] ?>"/>
      </div>
      <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="user_pass_current" type="password" name="password_current">
                                    <label for="user_pass_current">Current password</label>
      </div>
      <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="user_pass" type="password" name="password">
                                    <label for="user_pass">Password</label>
      </div>
      <div class="input-field">
                                    <i class="material-icons prefix">lock</i>
                                    <input id="user_pass_confirm" type="password" name="password_confirm">
                                    <label for="user_pass_confirm">Confirm the password</label>
      </div>

      <!-- image/file uploading-->
      <div class="file-field input-field">
          <div class="btn">
            <span>Profile Image</span>
            <input type="file" name="user_profile">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
    </div>
      <!-- image/file uploading-->


      <div class="input-field">
        <button class="btn waves-effect waves-light update_user" type="submit" name="action">Update
          <i class="material-icons right">send</i>
        </button>
      </div>
     
    </form>
  </div>

<script>
     $(function(){
       $('.datepicker').datepicker({
        format: "yyyy-mm-dd" 
       });
    });

    

</script>

  
