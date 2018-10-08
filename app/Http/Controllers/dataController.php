<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\History;
use App\Otherarr;
class dataController extends Controller
{
    //


    public  function data_connect()
    {

      

        $rUrl = 'http://gpstracker.lafilgroup.com/api/get_devices?user_api_hash=$2y$10$AeNfa92L0azC0yfYhS9UMuQrrcACiitaR.8AvcidoCPDVFC5pl4cW';

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
                            $rUrl1 = 'http://gpstracker.lafilgroup.com/api/get_history?device_id='.$values['id'].'&from_date='.$date_today1.'&from_time=00:00&to_date='.$date_today1.'&to_time=23:59&user_api_hash=$2y$10$AeNfa92L0azC0yfYhS9UMuQrrcACiitaR.8AvcidoCPDVFC5pl4cW';
                            $datas1 = json_decode(file_get_contents($rUrl1), true);
                            foreach($datas1['items'] as $item){
                                foreach($item['items'] as $data){

                                    $data1 = new History;
                                    $data2 = new Otherarr;
                                 
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
            echo "<script>window.close();</script>";
  
    }
//     public static function renz1()
//     {

//         $rUrl = 'http://gpstracker.lafilgroup.com/api/get_history?device_id=36&from_date=2018-09-25&from_time=00:00&to_date=2018-09-25&to_time=23:00&user_api_hash=$2y$10$AeNfa92L0azC0yfYhS9UMuQrrcACiitaR.8AvcidoCPDVFC5pl4cW';

// $datas = json_decode(file_get_contents($rUrl), true);
// // return $datas;
// return view('display1',compact('datas'));
//     }

    // public static function new_data(Request $request)
    // {
  
        
    //     $count = (count($_POST)-1)/2;
        
    //   for($x=0;$x<$count;$x++)
    //   {
    //     $data = new data_retrieval;
    //     $data->id_name = $request->input(''.$x.'_id');
    //     $data->plate_number = $request->input(''.$x.'_name');
    //     $data->save();
    //   }

    //   echo"success";
     
        
       
       

    // }


    public  function manual_connect(Request $request)
    {
        $this->validate(request(),[
            'start_date' => 'date_format:Y-m-d|required',
            'end_date' =>'date_format:Y-m-d||after_or_equal:start_date|required',
    ]    
    );

    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

        $rUrl = 'http://gpstracker.lafilgroup.com/api/get_devices?user_api_hash=$2y$10$AeNfa92L0azC0yfYhS9UMuQrrcACiitaR.8AvcidoCPDVFC5pl4cW';

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
                            $rUrl1 = 'http://gpstracker.lafilgroup.com/api/get_history?device_id='.$values['id'].'&from_date='.$start_date.'&from_time=00:00&to_date='.$date_today1.'&to_time=23:59&user_api_hash=$2y$10$AeNfa92L0azC0yfYhS9UMuQrrcACiitaR.8AvcidoCPDVFC5pl4cW';
                            $datas1 = json_decode(file_get_contents($rUrl1), true);
                            foreach($datas1['items'] as $item){
                                foreach($item['items'] as $data){

                                    $data1 = new History;
                                    $data2 = new Otherarr;
                                 
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
            echo "<script>window.close();</script>";
  
    }
  
}

