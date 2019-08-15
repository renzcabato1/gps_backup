<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\History;
use App\Otherarr;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class dataController extends Controller
{
    //


    public  function data_connect()
    {
        $rUrl = 'http://gpstracker.lafilgroup.com/api/get_devices?user_api_hash=$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6';

            $datas = json_decode(file_get_contents($rUrl), true);
            foreach($datas as $item)
            {
                foreach($item['items'] as  $values )
                        {
                            $data = new Device;
                            $data->device_id = $values['id'];
                            $data->plate_number = $values['name'];
                            if (Device::where('device_id', '=', $values['id'])->count() > 0) {
                               
                             }
                             else
                             {
                                $data->save();
                             }
                            $date_today= date('Y-m-d'); 
                            $date = strtotime($date_today);
                            $date = strtotime("-1 day", $date);
                            $date_today1 = date('Y-m-d', $date);
                            $rUrl1 = 'http://gpstracker.lafilgroup.com/api/get_history?device_id='.$values['id'].'&from_date='.$date_today1.'&from_time=00:00&to_date='.$date_today1.'&to_time=23:59&user_api_hash=$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6';
                            $datas1 = json_decode(file_get_contents($rUrl1), true);
                            foreach($datas1['items'] as $item){
                                foreach($item['items'] as $data){

                                    $data1 = new History;
                                    $data2 = new Otherarr;
                                    if (array_key_exists("id",$data))
                                    {
                                        $history = History::findOrfail($data['id']);
                                        if($history == null)
                                        {
                                        $data1->history_id=$data['id'];
                                        $data1->device_id=$data['device_id'];
                                        $data1->altitude=$data['altitude'];
                                        $data1->course=$data['course'];
                                        $data1->latitude=$data['latitude'];
                                        $data1->longtitude=$data['longitude'];
                                        $data1->power=$data['power'];
                                        $data1->speed=$data['speed'];
                                        $data1->time=$data['time'];
                                        $data1->device_time=$data['device_time'];
                                        $data1->server_time=$data['server_time'];
                                        $data1->sensors_values=$data['sensors_values'];
                                        $data1->valid=$data['valid'];
                                        $data1->distance=$data['distance'];
                                        $data1->protocol=$data['protocol'];
                                        $data1->color=$data['color'];
                                        $data1->item_id=$data['item_id'];
                                        $data1->raw_time=$data['raw_time'];
                                        $data1->lat=$data['lat'];
                                        $data1->lng=$data['lng']; 
                                        if (History::where('history_id', '=', $data['id'])->count() > 0) {
                               
                                        }
                                        else
                                        {
                                           $data1->save();
                                        }
                                        $data2->sequence= substr($data['other_arr'][0],10);
                                        $data2->distance= substr($data['other_arr'][1],10);
                                        $data2->totaldistance=substr($data['other_arr'][2],15);
                                        $data2->motion= substr($data['other_arr'][3],8);
                                        $data2->valid=substr($data['other_arr'][4],7);
                                        $data2->ignition=substr($data['other_arr'][5],10);
                                        $data2->temp1=substr($data['other_arr'][6],7);
                                        $data2->history_id=$data['id'];
                                    
                                            if (array_key_exists("7",$data['other_arr']))
                                            {
                                                $data2->enginehours=substr($data['other_arr'][7],13);
                                            }
                                            else
                                            {
                                                $data2->enginehours=NULL;
                                            }
                                            if (Otherarr::where('history_id', '=', $data['id'])->count() > 0) {
                               
                                            }
                                            else
                                            {
                                               $data2->save();
                                            }
                                    }
                                }
                            }
                            }
                 }
            }
            echo "<script>window.close();</script>";
  
    }

    public  function manual_connect(Request $request)
    {

    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

        $rUrl = 'http://gpstracker.lafilgroup.com/api/get_devices?user_api_hash=$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6';

            $datas = json_decode(file_get_contents($rUrl), true);
            foreach($datas as $item)
            {
                foreach($item['items'] as  $values )
                        {
                            // dd($values['device_data']['sim_number']);
                            $data = new Device;
                            $data->device_id = $values['id'];
                            $data->sim_card = $values['device_data']['sim_number'];
                            $data->imei = $values['device_data']['imei'];
                            $data->plate_number = $values['name'];
                            if (Device::where('device_id', '=', $values['id'])->count() > 0) {
                               
                             }
                             else
                             {
                                $data->save();
                             }
                             
                            $rUrl1 = 'http://gpstracker.lafilgroup.com/api/get_history?device_id='.$values['id'].'&from_date='.$start_date.'&from_time=00:00&to_date='.$end_date.'&to_time=23:59&user_api_hash=$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6';
                            $datas1 = json_decode(file_get_contents($rUrl1), true);
                             foreach($datas1['items'] as $item){
                                foreach($item['items'] as $data){

                                    $data1 = new History;
                                    $data2 = new Otherarr;
                                    if (array_key_exists("id",$data))
                                    {
                                        $history = History::findOrfail($data['id']);
                                        if($history == null)
                                        {
                                        $data1->history_id=$data['id'];
                                        $data1->device_id=$data['device_id'];
                                        $data1->altitude=$data['altitude'];
                                        $data1->course=$data['course'];
                                        $data1->latitude=$data['latitude'];
                                        $data1->longtitude=$data['longitude'];
                                        $data1->power=$data['power'];
                                        $data1->speed=$data['speed'];
                                        $data1->time=$data['time'];
                                        $data1->device_time=$data['device_time'];
                                        $data1->server_time=$data['server_time'];
                                        $data1->sensors_values=$data['sensors_values'];
                                        $data1->valid=$data['valid'];
                                        $data1->distance=$data['distance'];
                                        $data1->protocol=$data['protocol'];
                                        $data1->color=$data['color'];
                                        $data1->item_id=$data['item_id'];
                                        $data1->raw_time=$data['raw_time'];
                                        $data1->lat=$data['lat'];
                                        $data1->lng=$data['lng']; 
                                        if (History::where('history_id', '=', $data['id'])->count() > 0) {
                               
                                        }
                                        else
                                        {
                                           $data1->save();
                                        }
                                        $data2->sequence= substr($data['other_arr'][0],10);
                                        $data2->distance= substr($data['other_arr'][1],10);
                                        $data2->totaldistance=substr($data['other_arr'][2],15);
                                        $data2->motion= substr($data['other_arr'][3],8);
                                        $data2->valid=substr($data['other_arr'][4],7);
                                        $data2->ignition=substr($data['other_arr'][5],10);
                                        $data2->temp1=substr($data['other_arr'][6],7);
                                        $data2->history_id=$data['id'];
                                    
                                            if (array_key_exists("7",$data['other_arr']))
                                            {
                                                $data2->enginehours=substr($data['other_arr'][7],13);
                                            }
                                            else
                                            {
                                                $data2->enginehours=NULL;
                                            }
                                            if (Otherarr::where('history_id', '=', $data['id'])->count() > 0) {
                               
                                            }
                                            else
                                            {
                                               $data2->save();
                                            }
                                    }
                                }
                                }
                            }
                 }
            }
            echo "<script>window.close();</script>";
    }
    public function destroy()
    {
        
            $rUrl = 'http://gpstracker.lafilgroup.com/api/get_alerts?user_api_hash=$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6';
            $datas = json_decode(file_get_contents($rUrl), true);
            // dd($datas);
            foreach($datas['items']['alerts'] as $k => $v) {
                if( strtotime( $v['created_at'] ) < strtotime( date('Y-m-d H:i:s') ) ) {
                
                    $client = new Client();
   
                    // Create a POST request
                    $response = $client->request(
                        'POST',
                        'http://gpstracker.lafilgroup.com/api/destroy_alert',
                        [
                            'form_params' => [
                                'user_api_hash' =>'$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6',
                                'alert_id' => $v['id'],
                                ]
                                ]
                            );
               }
            }
            $rUrl = 'http://gpstracker.lafilgroup.com/api/get_geofences?user_api_hash=$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6';
            $datas = json_decode(file_get_contents($rUrl), true);

            foreach($datas['items']['geofences'] as $k => $v) {
                if( strtotime( $v['created_at'] ) < strtotime( date('Y-m-d H:i:s') ) ) {
                    $client = new Client();
   
                    // Create a POST request
                    $response = $client->request(
                        'POST',
                        'http://gpstracker.lafilgroup.com/api/destroy_geofence',
                        [
                            'form_params' => [
                                'user_api_hash' =>'$2y$10$uH/xP348G263pv6mCnKGneAFAoffF9oYwEs8JTeYpV13PdIWVq8x6',
                                'geofence_id' => $v['id'],
                                ]
                                ]
                            );
                  
                
                }
            }
            echo "<script>window.close();</script>";
    }
  
}

