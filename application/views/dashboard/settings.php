<style>
.custom-card {
box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
transition: 0.3s;
width: 100%;
border-radius: 5px;
}
.custom-card:hover {
box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.custom-card img {
border-radius: 5px 5px 0 0;
}
.custom-container {
padding: 2px 16px;
}

.image {
opacity: 1;
display: block;
width: 100%;
height: auto;
transition: .5s ease;
backface-visibility: hidden;
}
.middle {
transition: .5s ease;
opacity: 0;
position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
text-align: center;
}
.profile-image:hover .image {
opacity: 0.3;
}
.profile-image:hover .middle {
cursor: pointer;
opacity: 1;
}
.text {
background-color: #4CAF50;
color: white;
font-size: 16px;
padding: 5px ;
}
</style>
<link rel="stylesheet"  href="<?php echo base_url('assets/cropper-master/dist/cropper.css') ?>" >
<script src="<?php echo base_url('assets/cropper-master/dist/cropper.js') ?>"></script>
<script>
    function crop() {
        $("#image").cropper('getCroppedCanvas').toBlob(function (blob){
            var formData = new FormData();

            formData.append('croppedImage', blob);
            $.ajax(baseUrl+'dashboard/updatePhoto', {
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                success: function (status) {
                  if(status){
                    $("#upload-image").hide();
                    $("#new-image").show();
                    // location.reload(true);
                    window.location.reload(true)
                  }else{
                    alert('error upload photo')
                  }
                },
                error: function () {
                  alert('Upload error');
                }
            });
        })
    }
</script>
<div class="view intro-2">
    <div class="custom-gradient">
        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <div class="user-info">
                                <a href="<?php echo base_url('dashboard') ?>">
                                <?php if(!is_null($user->avatar)): ?>
                                    <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/statements-img/user-'.$user->id.''.'/avatar/avatar_user_'.$user->id.'.jpg') ?>"  alt="" title="Upload Your Image">
                                <?php else: ?>
                                    <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/img/profile/images.jpg') ?>" alt="avatar">
                                <?php endif ?>
                                </a>
                                <!-- <input type="file" name="upload-photo" id="upload-avatar" style="display: none;" accept="image/x-png,image/jpeg, image/jpg"  >  -->
                                <ul class="meta list list-unstyled m-top">
                                    <a href="<?php echo base_url('dashboard/settings') ?>">
                                        <li class="name">
                                                <?php echo $user->full_name?>
                                        </li>
                                    </a>
                                </ul>
                            </div>
                            <?php $this->load->view('dashboard-template/dashboard-side-bar') ?>
                            
                        </div>
                        <div class="content-panel">
                            <div class="drive-wrapper drive-grid-view">
                                <div class="grid-items-wrapper">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <form action="<?php echo base_url('dashboard/updateUserParams')?>" method="POST" enctype="multipart/form-data" >
                                                    
                                                <div class="row">
                                                    <div class="col-xs-3 profile-image" >
                                                        <?php if(!is_null($user->avatar)): ?>
                                                        <img  src="<?php echo base_url('assets/statements-img/user-'.$user->id.''.'/avatar/avatar_user_'.$user->id.'.jpg') ?>" class="image img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:204px; " id='image'>
                                                            <?php else: ?>
                                                        <img  src="<?php echo base_url('assets/img/profile/profile-avatar.png')?>" class="image img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:204px; " id='image'>
                                                        <?php endif ?>
                                                        <!-- <img src="img_avatar.png" alt="Avatar" class="image" style="width:100%"> -->
                                                        <div class="middle">
                                                            <div class="text" onclick="$('#upload-avatar-image').click()" id="new-image">Նոր  նկար</div>
                                                            <input type="file"  id="upload-avatar-image" name="upload-avatar-image" onchange="previewFile()" style='display:none' />
                                                            <div onclick="crop()" id="upload-image" class="text" style='display:none' >Բեռնել</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" class="form-control" name="address" placeholder="Էլեկտրոնային հասցե" required="required" value="<?php echo $user->email ?>" readonly>
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-info" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="text" class="form-control" name="full_name" placeholder="Անուն Ազգանուն" required="required" value="<?php echo $user->full_name ?>">
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="password" class="form-control" name="password" placeholder="Գաղտնաբառ">
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="password" class="form-control" name="new_password" placeholder="Նոր գաղտնաբառ" />
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-lock" aria-hidden="true"></i>
                                                            </span>
                                                            <input type="password" class="form-control" name="c_new_password" placeholder="Կրկնել գաղտնաբառ" />
                                                        </div>
                                                        <br>
                                                        <button class="btn bt-color1 btn-block" type="submit"> Թարմացնել</button>
                                                    </div>
                                                    
                                                </div>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script>
function previewFile() {
    var preview = $(".image.img-responsive.img-circle");
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();
    reader.addEventListener("load", function() {
        $(".image.img-responsive.img-circle").attr("src", reader.result);
        // $(".image.img-responsive.img-circle").attr("id", 'image');
        $("#image").cropper();
        $("#new-image").hide();
        $("#upload-image").show();
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>