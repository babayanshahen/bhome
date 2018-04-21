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
$loader-color__green-dark: #68CC98;
$loader-color__green-mid: #EDF2EF;
.container {
text-align: center;
height: 100%;
width: 100%;
font-family: "Avenir Next", "Avenir", "Helvetica Neue", sans-serif;
font-weight: 400;
}
#reload {
color: #555;
cursor: pointer;
border: 1px solid #555;
padding: .5em 1em;
border-radius: 4px;
}
.btn.btn-update {
/*margin: 10% auto;*/
text-align: center;
padding: 0 0 0 0 ;
}
.save-btn {
background-color: #424f95;
border-color: transparent;
border-radius: 3px;
border-style: solid;
border-width: 1px;
box-sizing: border-box;
color: #fff;
cursor: pointer;
outline: none;
padding: 0;
position: relative;
display: block;
height: 2.5em;
line-height: 2.5em;
/*min-width: 12em;*/
padding-left: 6em;
padding-right: 3em;
margin: 0 auto;

&:hover,
&:active {
background-color: darken($green, 10%);
}
}
.message,
.confirm-message,
.loader,
.checkmark {
position: absolute;
width: 100%;
top: 0;
bottom: 0;
left: 0;
right: 0;
transition: all .5s ease;
}
.checkmark:after {
content: '';
display: block;
width: 5px;
height: 10px;
border: solid #fff;
border-width: 0 2.5px 2.5px 0;
transform: rotate(45deg);
}
.loader,
.confirm-message,
.checkmark {
opacity: 0;
}
.loader {
top: 7px;
}
.message.animate {
animation: fade-out .3s ease .1s;
animation-fill-mode: forwards;
}
.loader.animate {
animation: fade-in .3s ease .5s, fade-out .3s ease 1.5s;
animation-fill-mode: forwards;
}
.checkmark.animate1 {
top: 11px;
left: 90px;
animation: fade-in .1s ease 1.8s, slide-over .1s ease 2s;
animation-fill-mode: forwards;
}
.confirm-message.animate1 {
left: -5px;
animation: fade-in .1s ease 2.05s;
animation-fill-mode: forwards;
}
.checkmark.animate2 {
left: 43px;
animation: check-pop-up .1s ease 1.9s;
animation-fill-mode: forwards;
}
.confirm-message.animate2 {
left: -5px;
animation: pop-up .1s ease 1.8s;
animation-fill-mode: forwards;
}
.checkmark.animate3 {
left: 123px;
top: 11px;
animation: fade-in .1s ease 1.8s;
animation-fill-mode: forwards;
}
.confirm-message.animate3 {
left: -5px;
animation: fade-in .1s ease 1.8s;
animation-fill-mode: forwards;
}
.checkmark.animate4 {
left: 90px;
top: 11px;
animation: check-pop-up .1s ease 1.8s;
animation-fill-mode: forwards;
}
@keyframes fade-in {
from {opacity: 0;}
to {opacity: 1;}
}
@keyframes fade-out {
from {opacity: 1;}
to {opacity: 0;}
}
@keyframes slide-in {
from {left: -15px; opacity: 0;}
to {left: -5px; opacity: 1;}
}
@keyframes slide-over {
to {left: 123px;}
}
@keyframes pop-up {
from {top: 50%; opacity: 0;}
to {top: 0; opacity: 1;}
}
@keyframes check-pop-up {
from {top: 50%; opacity: 0;}
to {top: 11px; opacity: 1;}
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
                                <a href="<?php echo base_url('dashboard') ?>">
                                    <?php if(!is_null($user->avatar)): ?>
                                    <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/statements-img/user-'.$user->id.''.'/avatar/avatar_user_'.$user->id.'.jpg') ?>" alt="" title="Upload Your Image">
                                    <?php else: ?>
                                    <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/img/profile/images.jpg') ?>" alt="avatar">
                                    <?php endif ?>
                                </a>
                                <!-- <input type="file" name="upload-photo" id="upload-avatar" style="display: none;" accept="image/x-png,image/jpeg, image/jpg"  >  -->
                                <a href="<?php echo base_url('dashboard/settings') ?>">
                                    <ul class="meta list list-unstyled m-top">
                                        <li class="name">
                                            <?php echo $user->full_name?>
                                        </li>
                                    </ul>
                                </a>
                            </div>
                            <!-- <nav class="side-menu">
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
                            </nav> -->
                            
                            <?php $this->load->view('dashboard-template/dashboard-side-bar') ?>
                        </div>
                        <div class="content-panel">
                            <?php
                                // if( !is_null($this->session->userdata('update_success')) )
                                // {
                                //     echo $this->session->userdata('update_success');
                                //     $this->session->unset_userdata('update_success');
                                // }
                            ?>
                            <div class="content-header-wrapper">
                                <h2 class="title"><?php echo $currentUser->full_name?> Drive</h2>
                            </div>
                            <div class="drive-wrapper drive-grid-view">
                                <div class="grid-items-wrapper">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <?php if (!empty($statements)): ?>
                                            <?php foreach ($statements as $statement): ?>
                                            <!-- onclick="statementEdit( $(this).attr('data-statement-id') )" data-statement-id="<?php echo  $statement->id ?>" -->
                                            <div class="col-md-4">
                                                <div class="custom-card">
                                                    <?php if(is_file( (FCPATH.'assets/statements-img/user-'.$statement->user_id.'/'.$statement->id.'/'.$statement->main_image.'.jpg') )): ?>
                                                    <img src="<?php echo base_url('assets/statements-img/user-').$statement->user_id.'/'.$statement->id.'/'.$statement->main_image?>.jpg" alt="Avatar" style="width:100%">
                                                    <?php else: ?>
                                                    <img src="<?php echo  base_url('assets/statements-img/default-image/default')?>.png" style="width:100%" >
                                                    <?php endif ?>
                                                    <div class="custom-container">
                                                        <h4><b><?php echo  cutString($statement->name,28) ?></b></h4>
                                                        <!-- <p><?php //echo cutString($statement->description , 50) ?></p> -->
                                                    </div>
                                                        <div class="btn btn-update custom-container">
                                                            <button class="save-btn" id="btn2">
                                                            <div class="message">Թարմացնել</div>
                                                            <div class="loader">
                                                                <svg x="0px" y="0px" width="25px" height="25px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 5 0;" xml:space="preserve">
                                                                    <path fill="#FFF" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
                                                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="780ms" repeatCount="indefinite" calcMode="spline" keySplines="0.44, 0.22, 0, 1" keyTimes="0;1"/>
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                                <div class="confirm-message"></div>
                                                                <div class="checkmark"></div>
                                                            </button>
                                                        </div>
                                                    <!-- <a href="<?php echo base_url('dashboard/updateStatement/'.$statement->id) ?>" class="btn btn-success">Update</a> -->
                                                    <a href="<?php echo base_url('dashboard/upload/'.$statement->id) ?>" class="btn btn-warning">Փոփոխել</a>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                            <?php else: ?>
                                                Դուք դեռ չունեք հայտարարություն ձեր անձնական էջում
                                                    <a href="<?php echo base_url('dashboard/upload')?>">Ավելացնել հիմա </a>
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
    <script>
    $('.save-btn').on('click', function(e){
        e.preventDefault();
        var _statementId = <?php echo $statement->id ?>;
        $(this).find('.message').addClass('animate');
        $(this).find('.loader').addClass('animate');
        $.ajax({url: baseUrl+"dashboard/updateStatement/"+_statementId,
            success: function(status){

            // $("#div1").html(result);
        }});
    });
    // $('#btn1').on('click', function(e){
    //     e.preventDefault();
    //     $(this).find('.confirm-message').addClass('animate1');
    //     $(this).find('.checkmark').addClass('animate1');
    // });
    $('#btn2').on('click', function(e){
        e.preventDefault();
        $(this).find('.confirm-message').addClass('animate2');
        $(this).find('.checkmark').addClass('animate2');
    });
    // $('#btn3').on('click', function(e){
    //     e.preventDefault();
    //     $(this).find('.confirm-message').addClass('animate3');
    //     $(this).find('.checkmark').addClass('animate3');
    // });
    // $('#btn4').on('click', function(e){
    // e.preventDefault();
    // $(this).find('.checkmark').addClass('animate4');
    // });
    // $('#reload').on('click', function(e){
    //     e.preventDefault();
    //     $('.message, .loader, .confirm-message, .checkmark').removeClass('animate animate1 animate2 animate3 animate4');
    // });
    </script>