<style>
    

.form-group input[type="radio"] {
    display: none;
}

.form-group input[type="radio"] + .btn-group > label span {
    width: 20px;
}

.form-group input[type="radio"] + .btn-group > label span:first-child {
    display: none;
}
.form-group input[type="radio"] + .btn-group > label span:last-child {
    display: inline-block;   
}

.form-group input[type="radio"]:checked + .btn-group > label span:first-child {
    display: inline-block;
}
.form-group input[type="radio"]:checked + .btn-group > label span:last-child {
    display: none;   
}

.btn.btn-default.active{
    width: 140px !important;
}

.bt-color1{
    background-color: #424f95;
    color: white;
}

.bt-color1:hover{
    background-color: #424f95;
    color: white;
}

</style>
<!-- include libraries(jQuery, bootstrap) -->
<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"> -->
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>  -->
<!-- <script src="http://netdna.bootstarpcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>  -->

<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
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
                                <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/statements-img/user-'.$user->id.''.'/avatar/avatar_user_'.$user->id.'.jpg') ?>" alt="" title="Upload Your Image">
                                <?php else: ?>
                                <img class="img-profile img-circle img-responsive center-block" src="<?php echo base_url('assets/img/profile/images.jpg') ?>" alt="avatar">
                                <?php endif ?>
                                </a>
                                <!-- <input type="file" name="upload-photo" id="upload-avatar" style="display: none;" accept="image/x-png,image/jpeg, image/jpg"  >  -->
                                <ul class="meta list list-unstyled m-top">
                                    <a href="<?php echo base_url('dashboard/settings')?>">
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
                                <div class="content-header-wrapper">
                                    <h2 class="title">Upload</h2>
                                    <?php if ($this->session->userdata('add_statement_success')  ): ?>
                                        <h2 class="title">
                                            <?php echo $this->session->userdata('add_statement_success')?>
                                        </h2>
                                        <?php $this->session->unset_userdata('add_statement_success'); ?>
                                    <?php endif; ?>
                                    <?php if ($this->session->userdata('add_update_success')  ): ?>
                                    <h2 class="title">
                                    <?php echo $this->session->userdata('add_update_success')?>
                                    </h2>
                                    <?php $this->session->unset_userdata('add_update_success'); ?>
                                    <?php endif; ?>
                                    
                                    <div class="actions">
                                        <?php if (!empty($EditStatementResult->id)): ?>
                                            <a href="<?php echo base_url('dashboard/deleteStatement/'.$EditStatementResult->id) ?>" class="btn btn-danger">Հեռացնել</a>
                                        <?php endif ?>

                                        <!-- <a href="<?php echo base_url('dashboard')?>" class="btn btn-success upload_div"><i class="fa fa-dashboard"></i> &nbsp;Dashboard</a> -->
                                    </div>
                                </div>
                                <form action="<?php echo $action?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden"  name="id" value="<?php echo $EditStatementResult->id ?> ">
                                    <div class="input-group">
                                        <span class="input-group-addon">Տարածաշրջան</span>
                                        <?php drawRegion('state' ,null,$EditStatementResult->state); ?>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">Հայտարարության անվանում</span>
                                        <input  type="text" class="form-control" name="name" required="required" value="<?php echo $EditStatementResult->name?>"  />
                                    </div>
                                    <br>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-3">
                                                <div class="[ form-group ]">
                                                    <input type="radio" name="sale-or-rent" id="sale" value="sale" autocomplete="off" <?php isCheced($EditStatementResult->sale) ?> />
                                                    <div class="[ btn-group ]">
                                                        <label for="sale" class="[ btn bt-color1 ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>
                                                        <label for="sale" class="[ btn btn-default active ]">
                                                            Վաճառք
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="[ form-group ]">
                                                    <input type="radio" name="sale-or-rent" id="rent" value="rent" autocomplete="off" <?php isCheced($EditStatementResult->rent) ?> />
                                                    <div class="[ btn-group ]">
                                                        <label for="rent" class="[ btn bt-color1 ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>
                                                        <label for="rent" class="[ btn btn-default active ]">
                                                            Վարձակալություն
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="[ form-group ]">
                                                    <input type="radio" name="individual-or-agency" id="individual" value="individual" autocomplete="off" <?php isCheced($EditStatementResult->individual) ?> />
                                                    <div class="[ btn-group ]">
                                                        <label for="individual" class="[ btn bt-color1 ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>
                                                        <label for="individual" class="[ btn btn-default active ]">
                                                            Անհատ
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="[ form-group ]">
                                                    <input type="radio" name="individual-or-agency" id="agency" value="agency" autocomplete="off" <?php isCheced($EditStatementResult->agency) ?> />
                                                    <div class="[ btn-group ]">
                                                        <label for="agency" class="[ btn bt-color1 ]">
                                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                                            <span> </span>
                                                        </label>
                                                        <label for="agency" class="[ btn btn-default active ]">
                                                            Գործակալություն
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="diaxton">
                                        <div class="col-md-2 margin-left-0">
                                            <span>Վաճառք</span>
                                            <input id="sale" type="radio" name="sale-or-rent" value="sale" <?php isCheced($EditStatementResult->sale) ?>/>
                                        </div>
                                        <div class="col-md-10">
                                            <span >Վարձակալություն</span>
                                            <input id="rent" type="radio"  name="sale-or-rent" value="rent" <?php isCheced($EditStatementResult->rent) ?> />
                                        </div>
                                    </div>
                                    <div class="diaxton">
                                        <div class="col-md-2 margin-left-0">
                                            <span>Անհատ</span>
                                            <input id="sale" type="radio" name="individual-or-agency" value="individual"  <?php isCheced($EditStatementResult->individual) ?>/>
                                        </div>
                                        <div class="col-md-10">
                                            <span >Գործակալություն</span>
                                            <input id="rent" type="radio"  name="individual-or-agency" value="agency"  <?php isCheced($EditStatementResult->agency) ?> >
                                        </div>
                                    </div> -->
                                    <br>
                                    <div>
                                        <div class="input-group">
                                            <span class="input-group-addon">Հասցե</span>
                                            <input type="text" class="form-control" name="address" placeholder="Մուտքագրեք տեղանքը" required="required" value="<?php echo $EditStatementResult->address?>" />
                                        </div>
                                        <br>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon" >Տեսակը </span>
                                        <?php echo drawKindofBuilding('kind_build',null,$EditStatementResult->kind_build) ?>
                                    </div><br>
                                    <div class="input-group">
                                        <span class="input-group-addon" >Շինության տիպը</span>
                                        <?php drawTypeofBuilding('type_build',null,$EditStatementResult->type_build); ?>
                                    </div><br>
                                    <div class="input-group">
                                        <span class="input-group-addon">Սենյակներ</span>
                                        <select class="form-control"  name="size_room" >
                                            <option value="0">Նշել քանակ</option>
                                            <option value="1" <?php echo  selectOldValue(1,$EditStatementResult->size_room) ?> >1</option>
                                            <option value="2" <?php echo  selectOldValue(2,$EditStatementResult->size_room) ?> >2</option>
                                            <option value="3" <?php echo  selectOldValue(3,$EditStatementResult->size_room) ?> >3</option>
                                            <option value="4" <?php echo  selectOldValue(4,$EditStatementResult->size_room) ?> >4</option>
                                            <option value="5" <?php echo  selectOldValue(5,$EditStatementResult->size_room) ?> >5</option>
                                            <option value="6" <?php echo  selectOldValue(6,$EditStatementResult->size_room) ?> >6</option>
                                            <option value="7" <?php echo  selectOldValue(7,$EditStatementResult->size_room) ?> >7</option>
                                            <option value="8" <?php echo  selectOldValue(8,$EditStatementResult->size_room) ?> >7 և ավել</option>
                                        </select>
                                    </div><br>
                                    <div class="input-group">
                                        <span class="input-group-addon">Մակերեսը(մ քառ.)</span>
                                        
                                        <input id="msesasg" type="number" name="area" class="form-control" placeholder="Մ &sup2" value="<?php echo $EditStatementResult->area ?>">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">Հարկը</span>
                                        <select class="form-control" name="floor">
                                            <option value="">Նշել հարկը</option>
                                            <option value="1" <?php echo   selectOldValue(1,$EditStatementResult->floor) ?> >1</option>
                                            <option value="2" <?php echo   selectOldValue(2,$EditStatementResult->floor) ?> >2</option>
                                            <option value="3" <?php echo   selectOldValue(3,$EditStatementResult->floor) ?> >3</option>
                                            <option value="4" <?php echo   selectOldValue(4,$EditStatementResult->floor) ?> >4</option>
                                            <option value="5" <?php echo   selectOldValue(5,$EditStatementResult->floor) ?> >5</option>
                                            <option value="6" <?php echo   selectOldValue(6,$EditStatementResult->floor) ?> >6</option>
                                            <option value="7" <?php echo   selectOldValue(7,$EditStatementResult->floor) ?> >7</option>
                                            <option value="8" <?php echo   selectOldValue(8,$EditStatementResult->floor) ?> >8</option>
                                            <option value="9" <?php echo   selectOldValue(9,$EditStatementResult->floor) ?> >9</option>
                                            <option value="10" <?php echo  selectOldValue(10,$EditStatementResult->floor) ?> >10</option>
                                            <option value="11" <?php echo  selectOldValue(11,$EditStatementResult->floor) ?> >11</option>
                                            <option value="12" <?php echo  selectOldValue(12,$EditStatementResult->floor) ?> >12</option>
                                            <option value="13" <?php echo  selectOldValue(13,$EditStatementResult->floor) ?> >13</option>
                                            <option value="14" <?php echo  selectOldValue(14,$EditStatementResult->floor) ?> >14</option>
                                            <option value="15" <?php echo  selectOldValue(15,$EditStatementResult->floor) ?> >15</option>
                                            <option value="16" <?php echo  selectOldValue(16,$EditStatementResult->floor) ?> >15 և ավել</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon">Հարկերի քանակը</span>
                                        <select class="form-control" name="size_floor" >
                                            <option value="">Նշել հարկերի քանակ</option>
                                            <option value="1"  <?php echo selectOldValue(1,$EditStatementResult->size_floor) ?> >1</option>
                                            <option value="2"  <?php echo selectOldValue(2,$EditStatementResult->size_floor) ?> >2</option>
                                            <option value="3"  <?php echo selectOldValue(3,$EditStatementResult->size_floor) ?> >3</option>
                                            <option value="4"  <?php echo selectOldValue(4,$EditStatementResult->size_floor) ?> >4</option>
                                            <option value="5"  <?php echo selectOldValue(5,$EditStatementResult->size_floor) ?> >5</option>
                                            <option value="6"  <?php echo selectOldValue(6,$EditStatementResult->size_floor) ?> >6</option>
                                            <option value="7"  <?php echo selectOldValue(7,$EditStatementResult->size_floor) ?> >7</option>
                                            <option value="8"  <?php echo selectOldValue(8,$EditStatementResult->size_floor) ?> >8 </option>
                                            <option value="8"  <?php echo selectOldValue(8,$EditStatementResult->size_floor) ?> >8 և ավել</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-9">
                                            <input type="number" class="form-control" name="price" placeholder="Արժեք" value="<?php echo $EditStatementResult->price ?>">
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <img src="<?php echo base_url('assets/img/valute/dollar.png')?>" width="15" heigth="20" id="valute-icon"/>
                                                </span>
                                                <select class="form-control" required="required" name="valute">
                                                    <option value='1' <?php echo $EditStatementResult->valute == '1' ?  "selected='selected'": "" ?> > USD</option>
                                                    <option value='2'<?php echo $EditStatementResult->valute == '2' ?  "selected='selected'": "" ?> > AMD</option>
                                                    <option value='3'<?php echo $EditStatementResult->valute == '3' ?  "selected='selected'": "" ?> > EURO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="input-group" style="width: 100%;">
                                        <textarea type="text" id="summernote" class="form-control" name="description"  rows="5" cols="120" placeholder="Նկարագրություն"><?php echo $EditStatementResult->description ?></textarea>
                                    </div>
                                    <br>
                                    <?php if (empty($EditStatementResult->id)): ?>
                                        <fieldset class="form-group" id="myinput">
                                            <!-- <input type="hidden" name="update" value="true" /> -->
                                            <a href="javascript:void(0)"  class="btn btn-default upload_click">Upload Image</a>
                                            <input type="file" id="pro-image-1" name="pro-image[]" multiple="multiple" style="display:none;" />
                                        </fieldset>
                                    <?php else: ?>
                                        <fieldset class="form-group" id="myinput">
                                            <a href="<?php echo base_url('dashboard/editPhoto/'.$EditStatementResult->id) ?>"  class="btn btn-default">Ավելացնել կամ փոփոխել նկար</a>
                                        </fieldset>
                                    <?php endif ?>
                                    <div class="preview-images-zone">
                                        <?php if(!is_null($EditStatementResult->id) && !empty($EditStatementResult->id)): ?>
                                            <?php foreach (glob( FCPATH.'assets/statements-img/user-'.thisUserId().'/'.$EditStatementResult->id.'/*.*') as $key => $image): ?>
                                                <!-- onclick="deleteImage('<?php echo $EditStatementResult->images[$key]->key ?>',<?php echo  $EditStatementResult->id ?> , <?php echo thisUserId() ?>)" -->
                                                <div class="preview-image preview-show-<?php echo $key+1 ?>">
                                                    <!-- <div class="image-cancel" data-no="<?php //echo $key+1 ?> " >x</div> -->
                                                    <div class="image-zone">
                                                        <img id="pro-img-<?php echo ($key+1) ?>" src="<?php echo base_url(removeFpath($image))?> ">
                                                        <input type="file" name="image-<?php echo ($key+1) ?>" style="display:none;" />
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input  type="text" class="form-control" name="mobile_number_1" placeholder="<?php echo $EditStatementResult->mobile_number_1 ?>" required="required" value="<?php echo $EditStatementResult->mobile_number_1 ?>" onfocus="disableKeys(1)" onfocusout="enableKeys()" >
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input  type="text" class="form-control" name="mobile_number_2" placeholder="<?php echo $EditStatementResult->mobile_number_2 ?>" value="<?php echo $EditStatementResult->mobile_number_2 ?>"  onfocus="disableKeys(2)" onfocusout="enableKeys()">
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input id="tel" type="text" name="mobile_number_3" class="form-control" name="tel" placeholder="Արտերկիր +7 123 456-78-90"  value="<?php echo $EditStatementResult->mobile_number_3 ?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                   
                                    <?php if (isset($EditStatementResult->id) && !empty($EditStatementResult->id)): ?>
                                        <div class="actions">
                                            <button type="submit" class="btn btn-block bt-color1 update"><i class="fa fa-plus"></i> Թարմացնել</button>
                                        </div>
                                    <?php else: ?>
                                    <div class="actions">
                                        <button type="submit" class="btn btn-block bt-color1 confirm"><i class="fa fa-plus"></i> Ավելացնել</button>
                                    </div>
                                    <?php endif ?>
                                    <!-- </div> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script>
    function disableKeys(param){
        $(this).on("keydown",function (e) {
            var _string = $( "input[name=mobile_number_" +param+ "]" ).val();
            // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                 // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
            }
            // Ensure that it is a number and stop the keypress
            if ( (e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105) || _string.length > 16) {
                e.preventDefault();
            }
        });

        $(this).on("keyup",function (e) {
            if(e.keyCode != 8){
                if($( "input[name=mobile_number_" +param+ "]" ).val().length == 3){
                    var _value = $( "input[name=mobile_number_" +param+ "]" ).val();
                    if(_value == '098' || _value == '077' || _value == '093' || _value == '094' || _value == '077'  || _value == '049' || _value == '043' || _value == '099' || _value == '096' || _value == '091' || _value == '055' || _value == '095' || _value == '041'){
                        var _appendedValue = '( ' + _value + ' )'+' -';
                    }
                    $( "input[name=mobile_number_" +param+ "]" ).val(_appendedValue);
                }
                    // console.log($( "input[name=mobile_number_" +param+ "]" ).val().length);
                if($( "input[name=mobile_number_" +param+ "]" ).val().length == 11){

                var _second_value = $( "input[name=mobile_number_" +param+ "]" ).val();


                var _appended_second_value =  _second_value +'-';
                $( "input[name=mobile_number_" +param+ "]" ).val(_appended_second_value);


                }

                if($( "input[name=mobile_number_" +param+ "]" ).val().length == 14){
                    
                    var _second_value = $( "input[name=mobile_number_" +param+ "]" ).val();

                    
                    var _appended_second_value =  _second_value +'-';
                    $( "input[name=mobile_number_" +param+ "]" ).val(_appended_second_value);


                }

            }
        });
        
    }

    function enableKeys(){
        $(this).unbind('keydown').keydown();
    }
    $(document).ready(function() {
      $('#summernote').summernote();
    });
</script>