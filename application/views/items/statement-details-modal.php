<div class="modal fade" id="exampleModal-<?php echo (int)$statement_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title p2-color" id="exampleModalLabel"><?php echo $statement->name ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<script>
							jssor_1_slider_init = function() {
							    var jssor_1_options = {
							        $AutoPlay: 1,
							        $SlideshowOptions: {
							            $Class: $JssorSlideshowRunner$,
							            $Transitions: jssor_1_SlideshowTransitions,
							            $TransitionsOrder: 1
							        },
							        $BulletNavigatorOptions: {
							            $Class: $JssorBulletNavigator$
							        },
							        $ThumbnailNavigatorOptions: {
							            $Class: $JssorThumbnailNavigator$,
							            $Orientation: 2
							        }
							    };
							    var jssor_1_slider = new $JssorSlider$("jssor_<?php echo (int)$statement_id?>", jssor_1_options);
							    var MAX_WIDTH = 980;

							    function ScaleSlider() {
							        var containerElement = jssor_1_slider.$Elmt.parentNode;
							        var containerWidth = containerElement.clientWidth;
							        if (containerWidth) {
							            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);
							            jssor_1_slider.$ScaleWidth(expectedWidth);
							        } else {
							            window.setTimeout(ScaleSlider, 30);
							        }
							    }
							    ScaleSlider();
							    $Jssor$.$AddEvent(window, "load", ScaleSlider);
							    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
							    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
							};
					</script>
					
					
					<div id="jssor_<?php echo (int)$statement_id?>" style="position:relative;margin:0 auto;top:0px;left:-15px;width:980px;height:380px;overflow:hidden;visibility:hidden;right: -15px;">
						<div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
							<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php base_url('assets/img/spin.svg') ?>" />
						</div>
						<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
							<?php drawImage($statement_id,$statement_user_id) ?>
						</div>
						<div data-u="thumbnavigator" class="jssort121" style="position:absolute;left:0px;top:0px;width:120px;height:380px;overflow:hidden;cursor:default;" data-autocenter="2" data-scale-left="0.75">
							<div data-u="slides">
								<div data-u="prototype" class="p" style="width:268px;height:68px;">
									<div data-u="thumbnailtemplate" class="t"></div>
								</div>
							</div>
						</div>
						<div data-u="navigator" class="jssorb111" style="position:absolute;bottom:12px;right:12px;" data-scale="0.5">
							<div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
								<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
									<circle class="b" cx="8000" cy="8000" r="3000"></circle>
								</svg>
								<div data-u="numbertemplate" class="n"></div>
							</div>
						</div>
					</div>
					<script type="text/javascript">
						jssor_1_slider_init();
					</script>

						<div class="container">
							<?php drawKeywords($statement); ?>
						</div>

						<div class="container">
							<?php echo $statement->description ?>
						</div>
						<button type="button" class="btn bt-color1 phone-number" >
							<i class="fa fa-phone fa-2x" >&nbsp;</i><?php echo $statement->mobile_number_1 ?>
						</button>
						<?php if (!is_null($statement->mobile_number_2) && !empty($statement->mobile_number_2) ): ?>
							<button type="button" class="btn bt-color1 phone-number" >
								<i class="fa fa-phone fa-2x" >&nbsp;</i><?php echo $statement->mobile_number_2 ?>
							</button>
						<?php endif ?>
						<?php if (!is_null($statement->mobile_number_3) && !empty($statement->mobile_number_3) ): ?>
							<button type="button" class="btn bt-color1 phone-number" >
								<i class="fa fa-phone fa-2x" >&nbsp;</i><?php echo $statement->mobile_number_3 ?>
							</button>
						<?php endif ?>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn bt-color1" data-dismiss="modal">Փակել</button>
			</div>
		</div>
	</div>
</div>