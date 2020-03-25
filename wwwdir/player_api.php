<?php
/*Rev:26.09.18r0*/

require 'init.php';
header('Content-Type: application/json');
$f0ac6ad2b40669833242a10c23cad2e0 = true;
$B626d33e939f0dd9b6a026aa3f8c87a3 = $_SERVER['REMOTE_ADDR'];
$user_agent = trim($_SERVER['HTTP_USER_AGENT']);
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
}
header('Access-Control-Allow-Credentials: true');
$Edcf28ccdc0122ea787e348c040427ed = empty(ipTV_lib::$request['params']['offset']) ? 0 : abs(intval(ipTV_lib::$request['params']['offset']));
$Ffb14fe8aab74bc4aab279b42393475f = empty(ipTV_lib::$request['params']['items_per_page']) ? 0 : abs(intval(ipTV_lib::$request['params']['items_per_page']));
if (!empty(ipTV_lib::$request['username']) && !empty(ipTV_lib::$request['password'])) {
    ini_set('memory_limit', -1);
    $e4b5e869e986190a8c65320793f9f9c7 = array(200 => 'get_vod_categories', 201 => 'get_live_categories', 202 => 'get_live_streams', 203 => 'get_vod_streams', 204 => 'get_series_info', 205 => 'get_short_epg', 206 => 'get_series_categories', 207 => 'get_simple_data_table', 208 => 'get_series', 209 => 'get_vod_info');
    $username = ipTV_lib::$request['username'];
    $password = ipTV_lib::$request['password'];
    $output = array();
    if ($result = ipTV_streaming::GetUserInfo(null, $username, $password, true, true, true, array(), false, '', '', array('offset' => $Edcf28ccdc0122ea787e348c040427ed, 'items_per_page' => $Ffb14fe8aab74bc4aab279b42393475f))) {
        $D3786992403104d27e1032eda43412cb = ipTV_lib::$settings['mobile_apps'];
        if ($result['is_e2'] == 1) {
            if (!empty(ipTV_lib::$request['token'])) {
                $ipTV_db->query('SELECT * FROM enigma2_devices WHERE `token` = \'%s\' AND `public_ip` = \'%s\' AND `key_auth` = \'%s\' LIMIT 1', ipTV_lib::$request['token'], $B626d33e939f0dd9b6a026aa3f8c87a3, $user_agent);
                if ($ipTV_db->num_rows() <= 0) {
                    die;
                }
            } else {
                die;
            }
        }
        $B07dbd32bd4b3504b1aa499feb5ed369 = false;
        if ($result['admin_enabled'] == 1 && $result['enabled'] == 1 && (is_null($result['exp_date']) or $result['exp_date'] > time())) {
            $f0ac6ad2b40669833242a10c23cad2e0 = false;
            $B07dbd32bd4b3504b1aa499feb5ed369 = true;
        }
        $b4af8b82d0e004d138b6f62947d7a1fa = !empty(ipTV_lib::$request['action']) && (in_array(ipTV_lib::$request['action'], $e4b5e869e986190a8c65320793f9f9c7) || array_key_exists(ipTV_lib::$request['action'], $e4b5e869e986190a8c65320793f9f9c7)) && $B07dbd32bd4b3504b1aa499feb5ed369 ? ipTV_lib::$request['action'] : '';
        switch ($b4af8b82d0e004d138b6f62947d7a1fa) {
            case 'get_series_info':
            case 204:
                $acb1d10773fb0d1b6ac8cf2c16ecf1b5 = empty(ipTV_lib::$request['series_id']) ? 0 : intval(ipTV_lib::$request['series_id']);
                $deff942ee62f1e5c2c16d11aee464729 = ipTV_lib::DCA7AA6Db7C4Ce371E41571A19bCe930();
                if (!empty($deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]) && in_array($acb1d10773fb0d1b6ac8cf2c16ecf1b5, $result['series_ids'])) {
                    $output['seasons'] = !empty($deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['seasons']) ? array_values(json_decode($deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['seasons'], true)) : array();
                    $output['info'] = array('name' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['title'], 'cover' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['cover'], 'plot' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['plot'], 'cast' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['cast'], 'director' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['director'], 'genre' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['genre'], 'releaseDate' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['releaseDate'], 'last_modified' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['last_modified'], 'rating' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['rating'], 'rating_5based' => number_format($deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['rating'] * 0.5, 1) + 0, 'backdrop_path' => json_decode($deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['backdrop_path'], true), 'youtube_trailer' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['youtube_trailer'], 'episode_run_time' => $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['episode_run_time'], 'category_id' => !empty($deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['category_id']) ? $deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['category_id'] : null);
                    foreach ($deff942ee62f1e5c2c16d11aee464729[$acb1d10773fb0d1b6ac8cf2c16ecf1b5]['series_data'] as $c0792eb00d656504ed969c0d4d84f7e3 => $E86ff017778d0dc804add84ab1be9052) {
                        $F413fb4a34e3e65ab00d750206ac1bc3 = 1;
                        foreach ($E86ff017778d0dc804add84ab1be9052 as $a14a8f906639aa7f5509518ff935b8f0) {
                            $movie_properties = ipTV_lib::cAdEb9125B2e81B183688842C5ac3AD7($a14a8f906639aa7f5509518ff935b8f0['stream_id']);
                            $output['episodes'][$c0792eb00d656504ed969c0d4d84f7e3][] = array('id' => $a14a8f906639aa7f5509518ff935b8f0['stream_id'], 'episode_num' => $F413fb4a34e3e65ab00d750206ac1bc3++, 'title' => $a14a8f906639aa7f5509518ff935b8f0['stream_display_name'], 'container_extension' => Dc53aE228dF72D4c140FDa7fD5e7E0bE($a14a8f906639aa7f5509518ff935b8f0['target_container']), 'info' => $movie_properties, 'custom_sid' => $a14a8f906639aa7f5509518ff935b8f0['custom_sid'], 'added' => $a14a8f906639aa7f5509518ff935b8f0['added'], 'season' => $c0792eb00d656504ed969c0d4d84f7e3, 'direct_source' => !empty($a14a8f906639aa7f5509518ff935b8f0['stream_source']) ? json_decode($a14a8f906639aa7f5509518ff935b8f0['stream_source'], true)[0] : '');
                        }
                    }
                }
                break;
            case 'get_series':
            case 208:
                $Fe9028a70727ba5f6b7129f9352b020c = empty(ipTV_lib::$request['category_id']) ? 0 : intval(ipTV_lib::$request['category_id']);
                $A53459db49b9c062de3f1777e4c87981 = 0;
                if (!empty($result['series_ids'])) {
                    $deff942ee62f1e5c2c16d11aee464729 = ipTV_lib::dCA7aa6db7C4Ce371e41571A19bce930();
                    foreach ($deff942ee62f1e5c2c16d11aee464729 as $acb1d10773fb0d1b6ac8cf2c16ecf1b5 => $a62676726d339eb8ed6d6c13795402f9) {
                        if (!in_array($acb1d10773fb0d1b6ac8cf2c16ecf1b5, $result['series_ids'])) {
                            continue;
                        }
                        if (!empty($Fe9028a70727ba5f6b7129f9352b020c) && $a62676726d339eb8ed6d6c13795402f9['category_id'] != $Fe9028a70727ba5f6b7129f9352b020c) {
                            continue;
                        }
                        $output[] = array('num' => ++$A53459db49b9c062de3f1777e4c87981, 'name' => $a62676726d339eb8ed6d6c13795402f9['title'], 'series_id' => (int) $a62676726d339eb8ed6d6c13795402f9['id'], 'cover' => $a62676726d339eb8ed6d6c13795402f9['cover'], 'plot' => $a62676726d339eb8ed6d6c13795402f9['plot'], 'cast' => $a62676726d339eb8ed6d6c13795402f9['cast'], 'director' => $a62676726d339eb8ed6d6c13795402f9['director'], 'genre' => $a62676726d339eb8ed6d6c13795402f9['genre'], 'releaseDate' => $a62676726d339eb8ed6d6c13795402f9['releaseDate'], 'last_modified' => $a62676726d339eb8ed6d6c13795402f9['last_modified'], 'rating' => $a62676726d339eb8ed6d6c13795402f9['rating'], 'rating_5based' => number_format($a62676726d339eb8ed6d6c13795402f9['rating'] * 0.5, 1) + 0, 'backdrop_path' => json_decode($a62676726d339eb8ed6d6c13795402f9['backdrop_path'], true), 'youtube_trailer' => $a62676726d339eb8ed6d6c13795402f9['youtube_trailer'], 'episode_run_time' => $a62676726d339eb8ed6d6c13795402f9['episode_run_time'], 'category_id' => !empty($a62676726d339eb8ed6d6c13795402f9['category_id']) ? $a62676726d339eb8ed6d6c13795402f9['category_id'] : null);
                        //e86ad239e7617e97fb21e811e3756ff7:
                    }
                }
                break;
            case 'get_vod_categories':
            case 200:
                $afdd6246d0a110a7f7c2599f764bb8e9 = B303f4B9BCfA8D2Ffc2ae41C5d2Aa387('movie');
                foreach ($afdd6246d0a110a7f7c2599f764bb8e9 as $d623cb8e6629e10f288da34e620b78b9) {
                    if (!ipTV_streaming::bC358DB57d4903BfdDf6652560FAe708($d623cb8e6629e10f288da34e620b78b9['id'], $result['bouquet'])) {
                        continue;
                    }
                    $output[] = array('category_id' => $d623cb8e6629e10f288da34e620b78b9['id'], 'category_name' => $d623cb8e6629e10f288da34e620b78b9['category_name'], 'parent_id' => 0);
                    //cc48aa349517f25e6d0523ec57ee0590:
                }
                break;
            case 'get_series_categories':
            case 206:
                $afdd6246d0a110a7f7c2599f764bb8e9 = B303f4B9Bcfa8d2FFc2AE41C5D2aA387('series');
                foreach ($afdd6246d0a110a7f7c2599f764bb8e9 as $d623cb8e6629e10f288da34e620b78b9) {
                    $output[] = array('category_id' => $d623cb8e6629e10f288da34e620b78b9['id'], 'category_name' => $d623cb8e6629e10f288da34e620b78b9['category_name'], 'parent_id' => 0);
                    //eae8f557c49634b874ccca3ec1debbf1:
                }
                break;
            case 'get_live_categories':
            case 201:
                $afdd6246d0a110a7f7c2599f764bb8e9 = b303F4b9Bcfa8d2FFC2Ae41c5D2AA387('live');
                foreach ($afdd6246d0a110a7f7c2599f764bb8e9 as $d623cb8e6629e10f288da34e620b78b9) {
                    if (!ipTV_streaming::Bc358db57d4903bfddF6652560Fae708($d623cb8e6629e10f288da34e620b78b9['id'], $result['bouquet'])) {
                        continue;
                    }
                    $output[] = array('category_id' => $d623cb8e6629e10f288da34e620b78b9['id'], 'category_name' => $d623cb8e6629e10f288da34e620b78b9['category_name'], 'parent_id' => 0);
                    //a7bb730f1ea245a9010f69653f9a7e0a:
                }
                break;
            case 'get_simple_data_table':
            case 207:
                $output['epg_listings'] = array();
                if (!empty(ipTV_lib::$request['stream_id'])) {
                    $A7386eca40c08bf499c3668f497f7653 = intval(ipTV_lib::$request['stream_id']);
                    $ipTV_db->query('SELECT `tv_archive_server_id`,`tv_archive_duration`,`channel_id`,`epg_id` FROM `streams` WHERE `id` = \'%d\' AND epg_id IS NOT NULL', $A7386eca40c08bf499c3668f497f7653);
                    if ($ipTV_db->num_rows() > 0) {
                        $Cb52bcec44c66c3338fb465d14935a95 = $ipTV_db->get_row();
                        $ipTV_db->query('SELECT *,UNIX_TIMESTAMP(start) as start_timestamp,UNIX_TIMESTAMP(end) as stop_timestamp FROM `epg_data` WHERE `epg_id` = \'%d\' AND `channel_id` = \'%s\' ORDER BY `start` ASC', $Cb52bcec44c66c3338fb465d14935a95['epg_id'], $Cb52bcec44c66c3338fb465d14935a95['channel_id']);
                        if ($ipTV_db->num_rows() > 0) {
                            foreach ($ipTV_db->get_rows() as $faca5f1c4c9dec5b739d7a905876b0cd) {
                                $Af72b52dd9e421439dfab285e9497fb5 = 0;
                                $C70062cf7c0eb2a3cb7085217bbb131c = 0;
                                if ($faca5f1c4c9dec5b739d7a905876b0cd['start_timestamp'] <= time() && $faca5f1c4c9dec5b739d7a905876b0cd['stop_timestamp'] >= time()) {
                                    $Af72b52dd9e421439dfab285e9497fb5 = 1;
                                }
                                if (!empty($Cb52bcec44c66c3338fb465d14935a95['tv_archive_duration']) && time() > $faca5f1c4c9dec5b739d7a905876b0cd['stop_timestamp'] && strtotime("-{$Cb52bcec44c66c3338fb465d14935a95['tv_archive_duration']} days") <= $faca5f1c4c9dec5b739d7a905876b0cd['stop_timestamp']) {
                                    $C70062cf7c0eb2a3cb7085217bbb131c = 1;
                                }
                                $faca5f1c4c9dec5b739d7a905876b0cd['now_playing'] = $Af72b52dd9e421439dfab285e9497fb5;
                                $faca5f1c4c9dec5b739d7a905876b0cd['has_archive'] = $C70062cf7c0eb2a3cb7085217bbb131c;
                                $output['epg_listings'][] = $faca5f1c4c9dec5b739d7a905876b0cd;
                            }
                        }
                    }
                }
                break;
            case 'get_short_epg':
            case 205:
                $output['epg_listings'] = array();
                if (!empty(ipTV_lib::$request['stream_id'])) {
                    $A7386eca40c08bf499c3668f497f7653 = intval(ipTV_lib::$request['stream_id']);
                    $Ffb14fe8aab74bc4aab279b42393475f = empty(ipTV_lib::$request['limit']) ? 4 : intval(ipTV_lib::$request['limit']);
                    $ipTV_db->query('SELECT `channel_id`,`epg_id` FROM `streams` WHERE `id` = \'%d\' AND epg_id IS NOT NULL', $A7386eca40c08bf499c3668f497f7653);
                    if ($ipTV_db->num_rows() > 0) {
                        $faca5f1c4c9dec5b739d7a905876b0cd = $ipTV_db->get_row();
                        $ipTV_db->simple_query("SELECT *,UNIX_TIMESTAMP(start) as start_timestamp, UNIX_TIMESTAMP(end) as stop_timestamp  FROM `epg_data` WHERE `epg_id` = '{$faca5f1c4c9dec5b739d7a905876b0cd['epg_id']}' AND `channel_id` = '{$faca5f1c4c9dec5b739d7a905876b0cd['channel_id']}' AND ('" . date('Y-m-d H:i:00') . '\' BETWEEN `start` AND `end` OR `start` >= \'' . date('Y-m-d H:i:00') . "') ORDER BY `start` LIMIT {$Ffb14fe8aab74bc4aab279b42393475f}");
                        if ($ipTV_db->num_rows() > 0) {
                            $output['epg_listings'] = $ipTV_db->get_rows();
                        }
                    }
                }
                break;
            case 'get_live_streams':
            case 202:
                $Fe9028a70727ba5f6b7129f9352b020c = empty(ipTV_lib::$request['category_id']) ? 0 : intval(ipTV_lib::$request['category_id']);
                $ffbf5ba007ab5c76700047a4ec5b648e = 0;
                foreach ($result['channels'] as $channel) {
                    if ($channel['live'] != 1) {
                        continue;
                    }
                    if (!empty($Fe9028a70727ba5f6b7129f9352b020c) && $channel['category_id'] != $Fe9028a70727ba5f6b7129f9352b020c) {
                        continue;
                    }
                    $f6cb8ff50fa6609892442191828c234b = $channel['stream_icon'];
                    $B9a8ab6cf4c1498733180431a3d477f5 = !empty($channel['tv_archive_server_id']) && !empty($channel['tv_archive_duration']) ? 1 : 0;
                    $output[] = array('num' => ++$ffbf5ba007ab5c76700047a4ec5b648e, 'name' => $channel['stream_display_name'], 'stream_type' => $channel['type_key'], 'stream_id' => (int) $channel['id'], 'stream_icon' => $f6cb8ff50fa6609892442191828c234b, 'epg_channel_id' => $channel['channel_id'], 'added' => $channel['added'], 'category_id' => !empty($channel['category_id']) ? $channel['category_id'] : null, 'custom_sid' => $channel['custom_sid'], 'tv_archive' => $B9a8ab6cf4c1498733180431a3d477f5, 'direct_source' => !empty($channel['stream_source']) ? json_decode($channel['stream_source'], true)[0] : '', 'tv_archive_duration' => $B9a8ab6cf4c1498733180431a3d477f5 ? $channel['tv_archive_duration'] : 0);
                    //E8f474ebb65ec54348db536eaeed50a9:
                }
                break;
            case 'get_vod_info':
            case 209:
                $output['info'] = array();
                if (!empty(ipTV_lib::$request['vod_id'])) {
                    $E3f154d2577bf634396fbfff5a2f8434 = intval(ipTV_lib::$request['vod_id']);
                    if (!empty($result['channels'][$E3f154d2577bf634396fbfff5a2f8434])) {
                        $row = $result['channels'][$E3f154d2577bf634396fbfff5a2f8434];
                        $output['info'] = ipTV_lib::CadEB9125B2E81B183688842C5AC3Ad7($E3f154d2577bf634396fbfff5a2f8434);
                        $output['movie_data'] = array('stream_id' => (int) $row['id'], 'name' => $row['stream_display_name'], 'added' => $row['added'], 'category_id' => !empty($row['category_id']) ? $row['category_id'] : null, 'container_extension' => DC53Ae228df72D4C140fda7Fd5e7E0Be($row['target_container']), 'custom_sid' => $row['custom_sid'], 'direct_source' => !empty($row['stream_source']) ? json_decode($row['stream_source'], true)[0] : '');
                    }
                }
                break;
            case 'get_vod_streams':
            case 203:
                $Fe9028a70727ba5f6b7129f9352b020c = empty(ipTV_lib::$request['category_id']) ? 0 : intval(ipTV_lib::$request['category_id']);
                $A53459db49b9c062de3f1777e4c87981 = 0;
                foreach ($result['channels'] as $channel) {
                    if ($channel['live'] != 0 || $channel['type_key'] != 'movie') {
                        continue;
                    }
                    if (!empty($Fe9028a70727ba5f6b7129f9352b020c) && $channel['category_id'] != $Fe9028a70727ba5f6b7129f9352b020c) {
                        continue;
                    }
                    $movie_properties = ipTV_lib::CaDEB9125b2e81b183688842c5Ac3AD7($channel['id']);
                    $output[] = array('num' => ++$A53459db49b9c062de3f1777e4c87981, 'name' => $channel['stream_display_name'], 'stream_type' => $channel['type_key'], 'stream_id' => (int) $channel['id'], 'stream_icon' => $movie_properties['movie_image'], 'rating' => $movie_properties['rating'], 'rating_5based' => number_format($movie_properties['rating'] * 0.5, 1) + 0, 'added' => $channel['added'], 'category_id' => !empty($channel['category_id']) ? $channel['category_id'] : null, 'container_extension' => Dc53Ae228dF72d4C140fdA7fD5e7E0Be($channel['target_container']), 'custom_sid' => $channel['custom_sid'], 'direct_source' => !empty($channel['stream_source']) ? json_decode($channel['stream_source'], true)[0] : '');
                    //fda08156cf8f9416e4e3d8f6df975fe8:
                }
                break;
            default:
                $output['user_info'] = array();
                $e3539ad64f4d9fc6c2e465986c622369 = empty(ipTV_lib::$StreamingServers[SERVER_ID]['domain_name']) ? ipTV_lib::$StreamingServers[SERVER_ID]['server_ip'] : ipTV_lib::$StreamingServers[SERVER_ID]['domain_name'];
                $output['server_info'] = array('url' => $e3539ad64f4d9fc6c2e465986c622369, 'port' => ipTV_lib::$StreamingServers[SERVER_ID]['http_broadcast_port'], 'https_port' => ipTV_lib::$StreamingServers[SERVER_ID]['https_broadcast_port'], 'server_protocol' => ipTV_lib::$StreamingServers[SERVER_ID]['server_protocol'], 'rtmp_port' => ipTV_lib::$StreamingServers[SERVER_ID]['rtmp_port'], 'timezone' => ipTV_lib::$settings['default_timezone'], 'timestamp_now' => time(), 'time_now' => date('Y-m-d H:i:s'));
                if ($D3786992403104d27e1032eda43412cb == 1) {
                    $output['server_info']['process'] = true;
                }
                $output['user_info']['username'] = $result['username'];
                $output['user_info']['password'] = $result['password'];
                $output['user_info']['message'] = ipTV_lib::$settings['message_of_day'];
                $output['user_info']['auth'] = 1;
                if (($result['admin_enabled'] == 0)) {   
                    $output['user_info']['status'] = 'Active';
                }
                else if (($result['enabled'] == 0)) {
                    $output['user_info']['status'] = 'Disabled';  
                }
                if (is_null($result['exp_date']) or $result['exp_date'] > time()) {
                    $output['user_info']['status'] = 'Expired';
                } else {
                    $output['user_info']['status'] = 'Banned'; 
                    //Aa5927a42f7de3a7f5067e9f5367f680:
                    //goto C990cb8ca4eb2c08f724425da316de5c;
                    //B2a94eefd0d9e3f07bf5d5dde6f8b2a2:
                    //goto C990cb8ca4eb2c08f724425da316de5c;
                }
                $output['user_info']['exp_date'] = $result['exp_date'];
                $output['user_info']['is_trial'] = $result['is_trial'];
                $output['user_info']['active_cons'] = $result['active_cons'];
                $output['user_info']['created_at'] = $result['created_at'];
                $output['user_info']['max_connections'] = $result['max_connections'];
                $output['user_info']['allowed_output_formats'] = array_keys($result['output_formats']);
        }
    } else {
        $output['user_info']['auth'] = 0;
    }
    die(json_encode($output, JSON_PARTIAL_OUTPUT_ON_ERROR));
}
if ($f0ac6ad2b40669833242a10c23cad2e0) {
    D9f93b7c177E377d0BBFE315eAEae505();
}
?>
