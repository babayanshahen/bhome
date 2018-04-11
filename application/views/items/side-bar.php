    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">

            <!-- grid-filter-sidebar -->
            <div class="col-md-2">
                <form role="form">
                    <!-- <p class="h5 mt-3 p2-color">Հայտարարության տեսակը</p> -->
                    <div class="form-group checkbox">
                        <p class="h5 mt-3 p2-color">Տարածաշրջան</p>
                        <div class="form-row  checkbox">
                           <?php  drawRegion('state','target-change') ?>
                        </div>
                        <br>
                        
                        <input type="checkbox" id="anId5" class="target-change">
                        <label for="anId5">Անհատական</label><br>

                        <input type="checkbox" id="anId6" class="target-change">
                        <label for="anId6">Գործակալություն</label>

                        <hr>
                        <input type="checkbox" id="anId7" class="target-change">
                        <label for="anId7">Վաճառք</label><br>

                        <input type="checkbox" id="anId8" class="target-change">
                        <label for="anId8">Վարձակալություն</label>
                        <hr>

                        <p class="h5 mt-3 p2-color">Գին</p>
                        <input type="number" name="price-from" class="form-control target-change" placeholder="sksac"><br>
                        <input type="number"  name="price-to" class="form-control target-change" placeholder="verjacrac"><br>

                        <p class="h5 mt-3 p2-color">Մակերես</p>
                        <input type="number" class="form-control target-change" name="area-from" placeholder="sksac"><br>
                        <input type="number" class="form-control target-change" name="area-to" placeholder="verjacrac"><br>
                        
                        <p class="h5 mt-3 p2-color">Շինության տիպը</p>
                        <div class="form-row  checkbox">
                          <?php drawTypeofBuilding('type_build',null,"target-change") ?>
                        </div>

                        <p class="h5 mt-3 p2-color">Ինձ պետք է</p>
                        <div class="form-row  checkbox">
                          <?php drawKindofBuilding('kind_build',null,"target-change") ?>
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
                        <button type="submit" class="btn bt-color1 btn-block">pntrel</button>
                    </div>
                </form>
            </div>