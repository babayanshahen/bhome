<?php 
// out($_POST);
    $state = '';
    $individual = '';
    $individualActive = '';
    $agency = '';
    $agencyActive = '';

    $sale = '';
    $saleActive = '';
    $rent = '';
    $rentActive = '';

    $priceFrom  = '';
    $priceTo    = '';

    $areaFrom  = '';
    $areaTo    = '';

    if( isset($postItem['state']) ){
            $state = (int)$postItem['state'];
    }

    if(isset($postItem['individual-or-agency']) ){
        if($postItem['individual-or-agency'] == 'individual')
        {
            $individual = 'checked';
            $individualActive = 'active';
        }elseif($postItem['individual-or-agency'] == 'agency'){
            $agency = 'checked';
            $agencyActive = 'active';
        }
    }

    if(isset($postItem['sale-or-rent'])){
        if($postItem['sale-or-rent'] == 'sale')
        {
            $sale = 'checked';
            $saleActive = 'active';
        }elseif($postItem['sale-or-rent'] == 'rent'){
            $rent = 'checked';
            $rentActive = 'active';
        }
    }

    if( isset($postItem['price-from']) ){
            $priceFrom = (int)$postItem['price-from'];
    }

    if( isset($postItem['price-to']) ){
            $priceTo = (int)$postItem['price-to'];
    }

    if( isset($postItem['area-from']) ){
            $areaFrom = (int)$postItem['area-from'];
    }

    if( isset($postItem['area-to']) ){
            $areaTo = (int)$postItem['area-to'];
    }

// out($priceFrom,'dump');
?>
    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
            <!-- grid-filter-sidebar -->
            <div class="col-md-2">
                <form role="form">
                    <!-- <p class="h5 mt-3 p2-color">Հայտարարության տեսակը</p> -->
                    <div class="form-group checkbox">
                        <p class="h5 mt-3 p2-color">Տարածաշրջան</p>
                        <div class="form-row  checkbox">
                           <?php  drawRegion('state','target-change',$state) ?>
                        </div>
                        <br>
                        <div class="btn-group checkbox" data-toggle="buttons" style="display: grid;">
                            <label class="btn bt-color1 form-check-label <?php echo $individualActive?>">
                                <input class="form-check-input target-change" type="radio" name="individual-or-agency" autocomplete="off" style="display: none;" value="individual" id="anId5" <?php echo $individual ?> /> Անհատական
                            </label>
                            
                            <label class="btn bt-color1 form-check-label <?php echo $agencyActive?>">
                                <input class="form-check-input target-change" type="radio" name="individual-or-agency" autocomplete="off"  style="display: none;" value="agency" id="anId6" <?php echo $agency ?> /> Գործակալություն
                            </label>
                        </div>
                       <!--  <input type="checkbox" id="anId5" class="target-change" <?php //echo isset($postItem['individual-or-agency']) && $postItem['individual-or-agency'] == 'individual' ? 'checked' : ''  ?> />
                       <label for="anId5">Անհատական</label><br>
                       
                       <input type="checkbox" id="anId6" class="target-change">
                       <label for="anId6">Գործակալություն</label> -->

                        <hr>

                        <div class="btn-group checkbox" data-toggle="buttons" style="display: grid;">
                            <label class="btn bt-color1 form-check-label <?php echo $saleActive ?>">
                                <input class="form-check-input target-change" type="radio" name="sale-or-rent" autocomplete="off" style="display: none;" value="sale" id="anId7" <?php echo $sale ?> /> Վաճառք
                            </label>
                            
                            <label class="btn bt-color1 form-check-label <?php echo $rentActive ?>">
                                <input class="form-check-input target-change" type="radio" name="sale-or-rent" autocomplete="off"  style="display: none;" value="rent" id="anId8" <?php echo $rent ?> /> Վարձակալություն
                            </label>
                        </div>

                       <!--  <input type="checkbox" id="anId7" class="target-change">
                       <label for="anId7">Վաճառք</label><br>
                       
                       <input type="checkbox" id="anId8" class="target-change">
                       <label for="anId8">Վարձակալություն</label> -->
                        <hr>

                        <p class="h5 mt-3 p2-color">Գին</p>
                        <input type="number" name="price-from" class="form-control target-change" placeholder="Սկսած" value="<?php echo $priceFrom != 0 ? $priceFrom : '' ?>"><br>
                        <input type="number"  name="price-to" class="form-control target-change" placeholder="Վերջացրած" value="<?php echo $priceTo != 0 ? $priceTo : '' ?>"><br>
                        <select class="form-control target-change" name="valute">
                            <option value=''>Ցանկացած արժույթով</option>
                            <option value='1'> Միայն - Դոլլար </option>
                            <option value='2'> Միայն - Դրամ</option>
                            <option value='3'> Միայն - Եվրո</option>
                        </select>
                        <br>

                        <p class="h5 mt-3 p2-color">Մակերես</p>
                        <input type="number" class="form-control target-change" name="area-from" placeholder="sksac" value="<?php echo $areaFrom != 0 ? $areaFrom : ''?>">
                        <br>
                        <input type="number" class="form-control target-change" name="area-to" placeholder="verjacrac" value="<?php echo $areaTo != 0 ? $areaTo : '' ?>">
                        <br>
                        
                        <p class="h5 mt-3 p2-color">Շինության տիպը</p>
                        <div class="form-row  checkbox">
                          <?php drawTypeofBuilding('type_build','target-change',null) ?>
                        </div>

                        <p class="h5 mt-3 p2-color">Ինձ պետք է</p>
                        <div class="form-row  checkbox">
                          <?php drawKindofBuilding('kind_build','target-change',null) ?>
                        </div>
                        
                        <p class="h5 mt-3 p2-color">Սենյակների քանակ</p>
                        <div class="form-row  checkbox">
                          <?php drawSizeofFloor('size_room',"target-change") ?>
                        </div>
                        <p class="h5 mt-3 p2-color">Հարկը</p>
                        <div class="form-row  checkbox">
                          <?php drawFloorofBuilding('floor',"target-change") ?>
                        </div>
                        <p class="h5 mt-3 p2-color">Հարկերի քանակ</p>
                        <div class="form-row  checkbox">
                          <?php drawSizeOfRoom('size_floor',"target-change") ?>
                        </div>
                        <p class="h5 mt-3 p2-color">Ցույց տալ միայն արժույթով</p>
                        <div class="form-row  checkbox">
                          <?php drawTypeofValue('valute',"target-change") ?>
                        </div>
                        <!-- <button type="submit" class="btn bt-color1 btn-block">Փնտրել</button> -->
                    </div>
                </form>
            </div>
<?php 
    $individual = '';
    $individualActive = '';
    $agency = '';
