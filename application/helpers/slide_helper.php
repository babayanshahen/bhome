<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('removeFpath')) {
    function removeFpath($string) {
        return  str_replace(FCPATH, '', $string);
    }
}

if (!function_exists('UserDetails')) {
    function UserDetails() {
            $CI =& get_instance();
            return is_null($CI->session->userdata('user'))  ? false : $CI->session->userdata('user');
    }
}

if (!function_exists('thisUserId')) {
    function thisUserId() {
            $CI =& get_instance();
            return is_null($CI->session->userdata('user'))  ? false : $CI->session->userdata('user')->id ;
    }
}

if (!function_exists('isCheced')) {
    function isCheced($result) {
        // out($result);
        echo  ( isset($result) && !empty( $result ) && $result == 'true'  ) ? "checked='checked'" : "" ;
    }
}

if (!function_exists('selectOldValue')) {
    function selectOldValue($one,$two) {
        return  ( $one == $two ) ? "selected='selected'" : "" ;
    }
}

if (!function_exists('isUserLoggedIn')) {
    function isUserLoggedIn() {
        $CI =& get_instance();
        return is_null($CI->session->userdata('user')) ?  false : true ;
    }
}

if (!function_exists('drawImage')) {
    function drawImage($statement_id,$statement_user_id=null)
    {
        $CI =& get_instance();
        $CI->load->model('statement_images_model');
        $statement_images = $CI->statement_images_model->getImages($statement_id);
        
        // out($statement_images);
        $content = "";

        foreach ($statement_images as $statement_image)
        {
            // out($statement_images);

            if(is_file( (FCPATH.'assets/statements-img/user-'.$statement_user_id.'/'.$statement_id.'/'.$statement_image->key).'.jpg'))
            {
                $content .=  
                            "<div data-p='170.00'>
                                <img data-u='image' src='".base_url('assets/statements-img/user-'.$statement_user_id.'/'.$statement_id.'/'.$statement_image->key).".jpg' />
                                <div data-u='thumb'>
                                    <img data-u='thumb' class='i' src='".base_url('assets/statements-img/user-'.$statement_user_id.'/'.$statement_id.'/'.$statement_image->key).".jpg'  style='width: 95px;height: 48px;'/>
                                </div>
                            </div>";
            }else{
                $content .=  
                    "<div data-p='170.00'>
                                <img data-u='image' src='".base_url('assets/statements-img/default-image/default').".png' />
                                <div data-u='thumb'>
                                    <img data-u='thumb' class='i' src='".base_url('assets/statements-img/default-image/default').".png'  style='width: 95px;height: 48px;'/>
                                </div>
                            </div>";
            }
        }

        echo $content;
    }
}

if (!function_exists('drawTopImage')) {
    function drawTopImage($statement_id)
    {

    }
}

if (!function_exists('drawRegion')) {
    function drawRegion($statementName='state',$class='' ,$selectedItem=null,$required=false)
    {
        $drawRegionText = "";
        $drawRegionText = 
            "<select class='form-control state ".$class."' name='".$statementName."' ".$required.">
                                                <option value=''>Բոլորը</option>
                                                <optgroup label='Երևան'>
                                                    <option value='2'  ".selectOldValue(2,$selectedItem)." >Աջափնյակ</option>
                                                    <option value='3'  ".selectOldValue(3,$selectedItem)." >Արաբկիր</option>
                                                    <option value='4'  ".selectOldValue(4,$selectedItem)." >Ավան</option>
                                                    <option value='5'  ".selectOldValue(5,$selectedItem)." >Դավիթաշեն</option>
                                                    <option value='6'  ".selectOldValue(6,$selectedItem)." >Էրեբունի</option>
                                                    <option value='7'  ".selectOldValue(7,$selectedItem)." >Քանաքեռ Զեյթուն</option>
                                                    <option value='8'  ".selectOldValue(8,$selectedItem).">Կենտրոն</option>
                                                    <option value='9'  ".selectOldValue(9,$selectedItem).">Մալաթիա Սեբաստիա</option>
                                                    <option value='10' ".selectOldValue(10,$selectedItem).">Նոր Նորք</option>
                                                    <option value='11' ".selectOldValue(11,$selectedItem).">Նորք Մարաշ</option>
                                                    <option value='12' ".selectOldValue(12,$selectedItem).">Նուբարաշեն</option>
                                                    <option value='13' ".selectOldValue(13,$selectedItem).">Շենգավիթ</option>
                                                </optgroup>
                                                <optgroup label='Արագածոտն'>
                                                    <option value='15' ".selectOldValue(15,$selectedItem)." >Ապարան</option>
                                                    <option value='16' ".selectOldValue(16,$selectedItem)." >Արագած</option>
                                                    <option value='73' ".selectOldValue(73,$selectedItem)." >Արուճ</option>
                                                    <option value='17' ".selectOldValue(17,$selectedItem)." >Աշտարակ</option>
                                                    <option value='92' ".selectOldValue(92,$selectedItem)." >Կոշ</option>
                                                    <option value='18' ".selectOldValue(18,$selectedItem)." >Թալին</option>
                                                    <option value='72' ".selectOldValue(72,$selectedItem)." >Ուջան</option>
                                                </optgroup>
                                                <optgroup label='Արարատ'>
                                                    <option value='20' ".selectOldValue(20,$selectedItem).">Արարատ</option>
                                                    <option value='21' ".selectOldValue(21,$selectedItem).">Արտաշատ</option>
                                                    <option value='80' ".selectOldValue(80,$selectedItem).">Գեղանիստ</option>
                                                    <option value='22' ".selectOldValue(22,$selectedItem).">Մասիս</option>
                                                    <option value='86' ".selectOldValue(86,$selectedItem).">Վեդի</option>
                                                </optgroup>
                                                <optgroup label='Արմավիր'>
                                                    <option value='24' ".selectOldValue(24,$selectedItem).">Արմավիր</option>
                                                    <option value='25' ".selectOldValue(25,$selectedItem).">Էջմիածին</option>
                                                    <option value='26' ".selectOldValue(26,$selectedItem).">Մեծամոր</option>
                                                </optgroup>
                                                <optgroup label='Արցախ'>
                                                    <option value='29' ".selectOldValue(29,$selectedItem).">Ասկերան</option>
                                                    <option value='30' ".selectOldValue(30,$selectedItem).">Հադրութ</option>
                                                    <option value='87' ".selectOldValue(87,$selectedItem).">Քաշաթաղ</option>
                                                    <option value='31' ".selectOldValue(31,$selectedItem).">Լաչին</option>
                                                    <option value='32' ".selectOldValue(32,$selectedItem).">Մարտակերտ</option>
                                                    <option value='33' ".selectOldValue(33,$selectedItem).">Մարտունի</option>
                                                    <option value='88' ".selectOldValue(88,$selectedItem).">Շահումյան</option>
                                                    <option value='34' ".selectOldValue(34,$selectedItem).">Շուշի</option>
                                                    <option value='28' ".selectOldValue(28,$selectedItem).">Ստեփանակերտ</option>
                                                </optgroup>
                                                <optgroup label='Գեղարքունիք'>
                                                    <option value='71' ".selectOldValue(1,$selectedItem).">Ճամբարակ</option>
                                                    <option value='36' ".selectOldValue(1,$selectedItem).">Գավառ</option>
                                                    <option value='37' ".selectOldValue(1,$selectedItem).">Մարտունի </option>
                                                    <option value='38' ".selectOldValue(1,$selectedItem).">Սևան</option>
                                                    <option value='39' ".selectOldValue(1,$selectedItem).">Վարդենիս</option>
                                                </optgroup>
                                                <optgroup label='Կոտայք'>
                                                    <option value='41' ".selectOldValue(41,$selectedItem).">Աբովյան</option>
                                                    <option value='83' ".selectOldValue(83,$selectedItem).">Աղվերան</option>
                                                    <option value='79' ".selectOldValue(79,$selectedItem).">Արգել</option>
                                                    <option value='81' ".selectOldValue(81,$selectedItem).">Առինջ</option>
                                                    <option value='90' ".selectOldValue(90,$selectedItem).">Բջնի</option>
                                                    <option value='76' ".selectOldValue(76,$selectedItem).">Բյուրեղավան</option>
                                                    <option value='66' ".selectOldValue(66,$selectedItem).">Չարենցավան</option>
                                                    <option value='89' ".selectOldValue(89,$selectedItem).">Ձորաղբյուր</option>
                                                    <option value='77' ".selectOldValue(77,$selectedItem).">Գառնի</option>
                                                    <option value='42' ".selectOldValue(42,$selectedItem).">Հրազդան</option>
                                                    <option value='82' ".selectOldValue(82,$selectedItem).">Ջրվեժ</option>
                                                    <option value='84' ".selectOldValue(84,$selectedItem).">Քանաքեռավան</option>
                                                    <option value='85' ".selectOldValue(85,$selectedItem).">Քասախ</option>
                                                    <option value='75' ".selectOldValue(75,$selectedItem).">Նոր Հաճըն</option>
                                                    <option value='91' ".selectOldValue(91,$selectedItem).">Պտղնի</option>
                                                    <option value='43' ".selectOldValue(43,$selectedItem).">Ծաղկաձոր</option>
                                                    <option value='67' ".selectOldValue(67,$selectedItem).">Եղվարդ</option>
                                                    <option value='70' ".selectOldValue(70,$selectedItem).">Զովունի</option>
                                                </optgroup>
                                                <optgroup label='Լոռի'>
                                                    <option value='45' ".selectOldValue(45,$selectedItem).">Ալավերդի</option>
                                                    <option value='46' ".selectOldValue(46,$selectedItem).">Սպիտակ</option>
                                                    <option value='47' ".selectOldValue(47,$selectedItem).">Ստեփանավան</option>
                                                    <option value='69' ".selectOldValue(69,$selectedItem).">Տաշիր</option>
                                                    <option value='48' ".selectOldValue(48,$selectedItem).">Վանաձոր</option>
                                                </optgroup>
                                                <optgroup label='Շիրակ'>
                                                    <option value='50' ".selectOldValue(50,$selectedItem).">Արթիկ</option>
                                                    <option value='51' ".selectOldValue(51,$selectedItem).">Գյումրի</option>
                                                    <option value='78' ".selectOldValue(78,$selectedItem).">Մարալիկ</option>
                                                </optgroup>
                                                <optgroup label='Սյունիք'>
                                                    <option value='53' ".selectOldValue(53,$selectedItem).">Գորիս</option>
                                                    <option value='74' ".selectOldValue(74,$selectedItem).">Քաջարան</option>
                                                    <option value='54' ".selectOldValue(54,$selectedItem).">Կապան</option>
                                                    <option value='55' ".selectOldValue(55,$selectedItem).">Մեղրի</option>
                                                    <option value='56' ".selectOldValue(56,$selectedItem).">Սիսիան</option>
                                                </optgroup>
                                                <optgroup label='Տավուշ'>
                                                    <option value='59' ".selectOldValue(59,$selectedItem).">Բերդ</option>
                                                    <option value='58' ".selectOldValue(58,$selectedItem).">Դիլիջան</option>
                                                    <option value='60' ".selectOldValue(60,$selectedItem).">Իջևան</option>
                                                    <option value='68' ".selectOldValue(68,$selectedItem).">Նոյեմբերյան</option>
                                                </optgroup>
                                                <optgroup label='Վայոց Ձոր'>
                                                    <option value='65' ".selectOldValue(65,$selectedItem).">Ջերմուկ</option>
                                                    <option value='62' ".selectOldValue(62,$selectedItem).">Վայք</option>
                                                    <option value='63' ".selectOldValue(63,$selectedItem).">Եղեգնաձոր</option>
                                                </optgroup>
                                                    <option value='64' ".selectOldValue(64,$selectedItem).">Հայաստանից դուրս</option>
                                            </select>";
                                            echo $drawRegionText;

    }
}

if (!function_exists('drawKindofBuilding')) {
    function drawKindofBuilding($drawType,$class='',$selectedItem)
    {
        echo    "<select name='".$drawType."' class='form-control state ".$class."' required>
                    <option value=''>Ամբողջը</option>                                                                            
                    <option value='1' ".selectOldValue(1,$selectedItem)." >Սեփական տուն</option>
                    <option value='2' ".selectOldValue(2,$selectedItem)." >Բնակարան</option>
                    <option value='3' ".selectOldValue(3,$selectedItem)." >Հողատարածք</option>
                    <option value='4' ".selectOldValue(4,$selectedItem)." >Կոմերցիոն տարածք</option>
                    <option value='5' ".selectOldValue(5,$selectedItem)." >Ավտոտնակ</option>                                                
                    <option value='6' ".selectOldValue(6,$selectedItem)." >Այլ</option>
                </select>";

    }
}

if (!function_exists('drawTypeofBuilding')) {
    function drawTypeofBuilding($drawTypeofBuildingId,$class='',$selectedItem)
    {
        echo    "<select name='".$drawTypeofBuildingId."' class='form-control state ".$class."' required>
                    <option value=''>Ամբողջը</option>
                    <option value='1' ".selectOldValue(1,$selectedItem)." >Քարե</option>
                    <option value='2' ".selectOldValue(2,$selectedItem)." >Պանելային</option>
                    <option value='3' ".selectOldValue(3,$selectedItem)." >Մոնոլիտ</option>
                    <option value='4' ".selectOldValue(4,$selectedItem)." >Աղյուսե</option>
                    <option value='5' ".selectOldValue(5,$selectedItem)." >Կասետային</option>
                    <option value='6' ".selectOldValue(6,$selectedItem)." >Փայտե</option>
                </select>";

    }
}

if (!function_exists('drawSizeofFloor')) {
    function drawSizeofFloor($drawType,$class='')
    {
        echo    "<select name='".$drawType."' class='form-control state ".$class."'>
                    <option value='0'>Ամբողջը</option>                                                                            
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>                                                
                    <option value='6'>6</option>
                    <option value='7'>6 և ավել</option>
                </select>";

    }
}

if (!function_exists('drawFloorofBuilding')) {
    function drawFloorofBuilding($drawType,$class)
    {
        echo    "<select name='".$drawType."' class='form-control state ".$class."'>
                    <option value='0'>Ամբողջը</option>                                                                            
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>                                                
                    <option value='6'>6</option>
                    <option value='7'>6 և ավել</option>
                </select>";

    }
}

if (!function_exists('drawSizeOfRoom')) {
    function drawSizeOfRoom($drawType,$class)
    {
        echo    "<select name='".$drawType."' class='form-control state ".$class."'>
                    <option value='0'>Ամբողջը</option>                                                                            
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>                                                
                    <option value='6'>6</option>
                    <option value='7'>6 և ավել</option>
                </select>";

    }
}

if (!function_exists('drawTypeofValue')) {
    function drawTypeofValue($drawType,$class)
    {
        echo    "<select name='".$drawType."' class='form-control state ".$class."' required>
                    <option value='0'>Ամբողջը</option>
                    <option value='1'>USD</option>                                                                            
                    <option value='2'>AMD</option>                                                                            
                    
                </select>";

    }
}

if (!function_exists('drawKeywords')) {
    function drawKeywords($statement)
    {
      
    $text = "";
    	$text   .="<ul style='list-style-type: none;margin-top:20px' class='pl-0'>";
    if ($statement->individual == "true") {
        $text .=    "<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
                        Անհատ
                    </li>";
    }
    elseif ($statement->individual == "false"){
        $text .=    "<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
                        Գործակալություն
                    </li>";
    }

	if ($statement->sale == 'false')
	{
	    $text .=    "<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
	                    Վարձակալություն
	                </li>";
	}
	elseif ($statement->sale == "true"){
	    $text .=    "<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
	                    Վաճառք
	                </li>";
	}
    switch ($statement->valute) {
        case '1':
            $valute =  "USD";
            break;
        case '2':
            $valute =  "AMD";
            break;
        case '3':
            $valute =  "EURO";
            break;
    }
		$text .= 	"<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
                             $statement->price  $valute
	            	</li>";

	if ( !(is_null($statement->address)) )
    {
	    $text .= 	"<li class='btn btn-sm p2-color' style='font-size: 14px;'>
                             $statement->address
	            	</li>";
	}

    if ( !(is_null($statement->state->name)) ) 
    {
        $text .=    "<li class='btn btn-sm p2-color' style='font-size: 14px;'>
                            ".$statement->state->name."
                    </li>";
    }
	
	if ( !(is_null($statement->size_floor)) ) {

		$text .= 	"<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
	                            $statement->size_floor Հարկանի
	                        </li>";
	}

    if ( !(is_null($statement->type_build)) ) {

        $text .=    "<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
                               ".$statement->type_build->type_build." 
                            </li>";
    }

	if ( !(is_null($statement->floor)) && (int)$statement->floor != 0 )
	{
		$text .= 	"<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
	                            Գնտվում է շենքի ".(int)$statement->floor." -րդ հարկում
	                        </li>";
	}

    if ( !(is_null($statement->size_room)) )
    {
        $text .=    "<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
                                Սենյակների քանակը - ".(int)$statement->size_room."
                            </li>";
    }

    if ( !(is_null($statement->kind_build)) )
    {
        $text .=    "<li class='btn btn-sm  p2-color' style='font-size: 14px;'>
                                ".$statement->kind_build->kind_build."
                            </li>";
    }

    echo $text;
    }
}