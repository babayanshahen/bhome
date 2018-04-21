<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('cutString')) {
    function cutString($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } 
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } 
        else {
            $output = $text;
        }
        return $output;
        }
}

if (!function_exists('loadJS')) {
    function loadJS($files,$dataLoadInJS=null) {
        if (!empty($files) && is_array($files)) {
            foreach ($files as $file=>$params) {
                if ($params != 'external') {
                    echo '<script src="'.base_url('assets/js/'.$file.'.js').'" type="text/javascript"></script>'."\n";
                    echo "<script>var base_url = '$dataLoadInJS'</script>";
                } else {
                    echo '<script src="'.$file.'" type="text/javascript"></script>'."\n";
                }
            }
        }
    }
}

if (!function_exists('loadCSS')) {
    function loadCSS($files) {
        if (!empty($files) && is_array($files)) {
            foreach ($files as $file=>$params) {
                if ($params != 'external') {
                    $paramsString = '';
                    foreach ($params as $param=>$value) {
                        $paramsString .= $param.'="'.$value.'" ';
                    }
                    echo '<link rel="stylesheet" href="'.base_url('assets/style/'.$file.'.css').'" '.$paramsString.'type="text/css">'."\n";
                } else {
                    echo '<link rel="stylesheet" href="'.$file.'" type="text/css">'."\n";
                }
            }
        }
    }
}

if (!function_exists('loadMedia')) {
    function loadMedia($file,$attributes ='') {
        
        if (!empty($file)) {
            $path_parts = pathinfo($file);
            $extension = isset($path_parts['extension'])?$path_parts['extension']:'';
            $extension = strtolower($extension);
            $uniqid = uniqid().'_'.rand(0,1000);
            $player_url = base_url('assets/plugins/flowplayer/flowplayer-3.2.16.swf');

            switch($extension)
            {
                case'png':
                case'gif':
                case'jpg':
                    echo "<img src='$file'alt='image' $attributes>";
                    break;
                case 'swf':
                    echo "<embed src='$file' width='100%' height='100%' $attributes>";
                    break;
                case 'mp4':
                    echo "
                    <a   href='$file' $attributes class='video_flawplayer'></a>
                    <script type='text/javascript'>
                    $(document).ready(function(){
                        if(typeof window.video_creation_is_run === 'undefined')
                        {
                           flowplayer('a.video_flawplayer', '$player_url',{
                            clip: {
                                    autoPlay: false,
                                    autoBuffering: true 
                            },
                            plugins: {
                                controls: {
                                    autoHide: {
                                        enabled: false
                                    }

                                }
                            }
                            });
                            window.video_creation_is_run = true;
                        }
                    });
                    </script>";
                        break;
                case 'mp3':

                    echo "
                    <a  href='$file'
                     class='audio_flowplayer' style='display:block;height:30px'></a>
                    <script type='text/javascript'>
                    $(document).ready(function(){
                        if(typeof window.audio_creation_is_run === 'undefined')
                        {
                           flowplayer('a.audio_flowplayer', '$player_url',{
                            clip: {
                                    autoPlay: false 
                            },
                            plugins: {
                                controls: {
                                    autoHide: false,
                                    height: 30,
                                    fullscreen: false,
                                    mute: false,
                                    time: false
                                }
                            }
                            });
                        window.audio_creation_is_run = true;
                        }
                    });
                    </script>";
                        break;
                default:
                    echo '';
                    break;

            }

        }
    }
}
