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
</style>
<div class="view intro-2">
    <div class="custom-gradient">
        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <!--  <div class="user-info">
                                <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/img/profile/images.jpg') ?>" alt="" title="Upload Your Image" onclick="$('#upload-avatar').trigger('click');">
                                <input type="file" name="upload-photo" id="upload-avatar" style="display: none;" accept="image/x-png,image/jpeg, image/jpg"  >
                                <ul class="meta list list-unstyled m-top">
                                    <li class="name">
                                        <?php echo $currentUser->full_name?>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="user-info">
                                <?php if(!is_null($user->avatar)): ?>
                                <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/statements-img/user-'.$user->id.''.'/avatar/avatar_user_'.$user->id.'.jpg') ?>" alt="" title="Upload Your Image">
                                <?php else: ?>
                                <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/img/profile/images.jpg') ?>" alt="avatar">
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
                                    <li class="active">
                                        <a href="<?php echo base_url('dashboard') ?>"><span class="fa fa-user"></span> Profile</a>
                                    </li>
                                    <li>
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
                                <h2 class="title"><?php echo $currentUser->full_name?> Drive</h2>
                            </div>
                            <div class="drive-wrapper drive-grid-view">
                                <div class="grid-items-wrapper">
                                    <div class="container-fluid">
                                        <div class="row">
                                        <form action="<?php echo base_url('dashboard/uploadNewPhoto')?>" method="POST" enctype="multipart/form-data">
                                        <div class="status-text"></div>
                                        <fieldset class="form-group" id="myinput">
                                            <a href="javascript:void(0)"  class="btn btn-default upload_click"><span class="fa fa-plus"></span> Նոր Նկար</a>
                                            <input type="file" id="pro-image-1" name="pro-image[]" style="display:none;" multiple="multiple" />
                                        </fieldset>
                                            <div class="preview-images-zone">
                                            <?php if(!is_null($user->id) && !empty($user->id)): ?>
                                            <?php foreach (glob( FCPATH.'assets/statements-img/user-'.thisUserId().'/'.$statement_id.'/*.*') as $key => $image): ?>
                                            <div class="preview-image preview-show-<?php echo $key+1 ?>" <?php echo $statement->main_image == explode( '.',explode('/',$image)[4] )[0] ? " style='border: 2px solid red;' " : "" ?> >
                                                <div class="image-cancel" onclick="<?php echo "deleteImage('".explode( '.',explode('/',$image)[4] )[0]."','".$statement_id."','".thisUserId()."')" ?>" >x</div>
                                                <div class="image-default set-main" data-key="<?php echo explode( '.',explode('/',$image)[4] )[0]?>" data-statement-id="<?php echo $statement_id ?>" >Գլխավոր</div>
                                                <div class="image-zone">
                                                    <img id="pro-img-<?php echo ($key+1) ?>" src="<?php echo base_url(removeFpath($image))?> ">
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            <?php endif; ?>
                                            </div>
                                            <input type="hidden" name="statement_id" value="<?php echo $statement_id ?>">
                                            <button type="submit" class="btn btn-default"> Ավելացնել Հիմա </button>
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
// function newImage(){
//     var preview = $(".image.img-responsive.img-circle");
//     var file = document.querySelector('input[type=file]').files[0];
//     var reader = new FileReader();

//     reader.addEventListener("load", function() {
//         $(".image.img-responsive.img-circle").attr("src", reader.result);
//     }, false);

//     if (file) {
//         reader.readAsDataURL(file);
//     }
// }

$(function() {
    $('.image-default.set-main').click(function(e) {
        e.preventDefault();
        if (window.confirm("Are you sure?")) {
            var _imageKey = $(this).attr('data-key') ;
            var _statementId = $(this).attr('data-statement-id') ;
            // var _userId = $(this).attr('data-user-id') ;
            $.ajax({
                url: baseUrl+"dashboard/setMainImage/"+_imageKey+'/'+ _statementId,
                success: function(data) {
                    _status = jQuery.parseJSON(data);
                    if(_status){
                        location.reload();
                        $(".status-text").html(
                            "<p>"+_imageKey+" update success</p>"
                            );
                    }else{
                        $(".status-text").html(
                            "<p>"+_imageKey+" update error</p>"
                            );
                    }
                }
            });
        }
    });
});
// function   setMainImage(p1,p2,p3){
//    alert(p1);
//    alert(p2);
//    alert(p3);

// }
</script>