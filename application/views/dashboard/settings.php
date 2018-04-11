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
/*.container {
position: relative;
width: 50%;
}*/
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
cursor: cell;
opacity: 1;
}
.text {
background-color: #4CAF50;
color: white;
font-size: 16px;
padding: 5px ;
}
</style>
<div class="view intro-2">
    <div class="custom-gradient">
        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <div class="user-info">
                                <?php if(!is_null($user->avatar)): ?>
                                    <img class="img-profile img-circle img-responsive center-block hover" src="<?php echo base_url('assets/statements-img/user-'.$user->id.''.'/avatar/avatar_user_'.$user->id.'.jpg') ?>" alt="" title="Upload Your Image">
                                <?php else: ?>
                                    <img class="img-profile img-circle img-responsive center-block hover" src="<?php echo base_url('assets/img/profile/images.jpg') ?>" alt="avatar">
                                <?php endif ?>
                                <!-- <input type="file" name="upload-photo" id="upload-avatar" style="display: none;" accept="image/x-png,image/jpeg, image/jpg"  >  -->
                                <ul class="meta list list-unstyled m-top">
                                    <li class="name">
                                        <?php echo $user->full_name?>
                                    </li>
                                </ul>
                            </div>
                            <nav class="side-menu">
                                <ul class="nav">
                                    <li>
                                        <a href="<?php echo base_url('dashboard/upload') ?>"><span class="fa fa-plus"></span> Upload New Item</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('dashboard') ?>"><span class="fa fa-user"></span> Profile</a>
                                    </li>
                                    <li class="active">
                                        <a href="<?php echo base_url('dashboard/settings') ?>"><span class="fa fa-cog"></span> Settings</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('dashboard/logout') ?>"><span class="fa fa-sign-out"></span> Logout</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="content-panel">
                            <div class="content-header-wrapper">
                                <h2 class="title"><?php echo $user->full_name?> Drive</h2>
                            </div>
                            <div class="drive-wrapper drive-grid-view">
                                <div class="grid-items-wrapper">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <form action="<?php echo base_url('dashboard/updateUserParams')?>" method="POST" enctype="multipart/form-data" >
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="address" placeholder="Էլեկտրոնային հասցե" required="required" value="<?php echo $user->email ?>" readonly>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-xs-3 profile-image" >
                                                        <?php if(!is_null($user->avatar)): ?>
                                                        <img src="<?php echo base_url('assets/statements-img/user-'.$user->id.''.'/avatar/avatar_user_'.$user->id.'.jpg') ?>" class="image img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:204px; " >
                                                            <?php else: ?>
                                                        <img src="<?php echo base_url('assets/img/profile/profile-avatar.png')?>" class="image img-responsive img-circle" alt="Cinque Terre" style="width:204px;height:204px; " >
                                                        <?php endif ?>
                                                        <!-- <img src="img_avatar.png" alt="Avatar" class="image" style="width:100%"> -->
                                                        <div class="middle">
                                                            <div class="text" onclick="$('#upload-avatar-image').click()">Նոր  նկար</div>
                                                            <input type="file" style="display: none;" id="upload-avatar-image" name="upload-avatar-image" onchange="previewFile()" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-9">
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
                                                    </div>
                                                    
                                                </div>
                                                <button href="" class="btn btn-success btn-block" type="submit"> Թարմացնել</button>
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
    }, false);
    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>