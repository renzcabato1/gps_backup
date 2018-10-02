<form method='POST' action='new_data' target="">
        {{ csrf_field() }}
<table style='padding-bottom:10px'><tr><td>
        <a href="{{ url('/data-connect') }}" style='background-color: coral;padding:10px'>Refresh</a>
      
        
</td></tr></table >

<table border='1'>
        <tr><td colspan='2'><button type="submit" style='background-color: green;padding:10px;color:white'>Save </button></td></tr>

    <tr>
            <td>
                    Device ID
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
@foreach($datas['items'] as $item)
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
</table>
</form>