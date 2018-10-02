<form method='POST' action='new_data' target="">
        {{ csrf_field() }}
<table style='padding-bottom:10px'><tr><td>
        <a href="{{ url('/data-connect') }}" style='background-color: coral;padding:10px'>Refresh</a>
      
        
</td></tr></table >

<table border='1'>
        <tr><td colspan='2'><button type="submit" style='background-color: green;padding:10px;color:white'>Save </button></td></tr>

        <tr>
            <td>
            ID
            </td>
            <td>
            ID
            </td>
            <td>
            Altitude
            </td>
            <td>
            Course
            </td>
            <td>
             Latitude
            </td>
            <td>
            Longtitude
            </td>
            <td>
            Power
            </td>
            <td>
            Speed
            </td>
            <td>
            time
            </td>
            <td>
            device_time
            </td>       
            <td>
                server_time
        </td>
        <td>
                sensors_values
        </td>
            <td>
                    distance
            </td>
            <td>
                    protocol
            </td>
            <td>
                    item_id
            </td>       
            <td>
                    raw_time
            </td> 
            <td>
                    lat
            </td> 
            <td>
                    lng
            </td> 
        </tr>
@foreach($datas as $item)

@foreach($item['items'] as $key => $values )

<?php
 $rUrl = 'http://gpstracker.lafilgroup.com/api/get_history?device_id='.$values['id'].'&from_date=2018-09-25&from_time=08:00&to_date=2018-09-25&to_time=09:00&user_api_hash=$2y$10$AeNfa92L0azC0yfYhS9UMuQrrcACiitaR.8AvcidoCPDVFC5pl4cW';
 $datas_mo = json_decode(file_get_contents($rUrl), true);
 ?>


@foreach($datas_mo['items'] as $item)
@foreach($item['items'] as $data)
<tr>
    
        <td>
                {{$data['device_id']}}
        </td>
        <td>
                {{$data['id']}}
        </td>
        <td>
                {{$data['altitude']}}
        </td>
        <td>
                {{$data['course']}}
        </td>
        <td>
                {{$data['latitude']}}
        </td>
        <td>
                {{$data['longitude']}}
        </td>
        <td>
                {{$data['power']}}
        </td>
        <td>
                {{$data['speed']}}
        </td>
        <td>
                {{$data['time']}}
        </td>
        <td>
                {{$data['device_time']}}
        </td>       
        <td>
                {{$data['server_time']}}
        </td>
        <td>
                {{$data['sensors_values']}}
        </td>
        <td>
                {{$data['distance']}}
        </td>
        <td>
                {{$data['protocol']}}
        </td>
        <td>
                {{$data['item_id']}}
        </td>       
        <td>
                {{$data['raw_time']}}
        </td> 
        <td>
                {{$data['lat']}}
        </td> 
        <td>
                {{$data['lng']}}
        </td> 
</tr>

@endforeach
@endforeach
@endforeach 
@endforeach
</table>
</form>