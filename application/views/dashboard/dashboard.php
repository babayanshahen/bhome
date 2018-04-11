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
                                     <img class="img-profile img-circle img-responsive center-block hover" src="<?php echo base_url('assets/img/profile/images.jpg') ?>" alt="" title="Upload Your Image" onclick="$('#upload-avatar').trigger('click');">

                                    <input type="file" name="upload-photo" id="upload-avatar" style="display: none;" accept="image/x-png,image/jpeg, image/jpg"  > 

                                    <ul class="meta list list-unstyled m-top">
                                        <li class="name">
                                            <?php echo $currentUser->full_name?>
                                        </li>
                                    </ul>
                                </div> -->
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
                                            <?php if (!empty($statements)): ?>
                                                <?php foreach ($statements as $statement): ?>
                                                    <div class="col-md-4" onclick="statementEdit( $(this).attr('data-statement-id') )" data-statement-id="<?php echo  $statement->id ?>">
                                                        <div class="custom-card">
                                                            <img src="<?php echo base_url('assets/statements-img/user-').$statement->user_id.'/'.$statement->id.'/'.$statement->main_image?>" alt="Avatar" style="width:100%">
                                                            <div class="custom-container">
                                                                <h4><b><?php echo  cutString($statement->name,28) ?></b></h4>
                                                                <p><?php echo cutString($statement->description , 50) ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach ?>
                                            <?php endif ?>
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