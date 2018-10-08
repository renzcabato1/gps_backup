<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="{{ asset('/images/logo.ico')}}">
        
    
        <title>LFUGGOC</title>
    

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            input{

                 width: 30%;
                padding: 12px 8px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            ul {
                list-style: none;
                }
                .isa_info, .isa_success, .isa_warning, .isa_error {
            margin: 10px 0px;
            padding:8px;
            
            }
            .isa_info {
                color: #00529B;
                background-color: #BDE5F8;
            }
            .isa_success {
                color: #4F8A10;
                background-color: #DFF2BF;
            }
            .isa_warning {
                color: #9F6000;
                background-color: #FEEFB3;
            }
            .isa_error {
                color: #D8000C;
                background-color: #FFD2D2;
            }
            .isa_info i, .isa_success i, .isa_warning i, .isa_error i {
                margin:5px 5px;
                font-size:2em;
                vertical-align:middle;
            }
        </style>
        <script type="text/javascript"> 
            function display_c(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct()',refresh)
            }
            
            function display_ct() {
            var x = new Date()
            var hour=x.getHours();
            var minute=x.getMinutes();
            var second=x.getSeconds();
            if(hour <10 ){hour='0'+hour;}
            if(minute <10 ) {minute='0' + minute; }
            if(second<10){second='0' + second;}
            var x3 = hour+':'+minute+':'+second
            if ((minute == 00 )&& (hour == 00 )&& (second == 01 ))
            {
            document.getElementById('ct').innerHTML = x3;
            
            display_c();
            
             }
            </script>
            </head>
    
            <body onload=display_ct();>
                <div class="flex-center position-ref full-height">
                    <div class="content">
                            <span id='ct' style="font-size:100px;"></span>
                        <div class="links"  >
                            
                        </div>
                        <form method="post" action="data" target="_blank">
                                {{ csrf_field() }}
                        <div >
                        Start Date <input type='date' name='start_date' value="{{ old('start_date')}}"  required>
                        End Date <input type='date' name='end_date' value="{{ old('end_date')}}"  required>
                            <button id='renz' style='background-color: coral;padding:10px' >Manual Backup</button>
                            </div>
                            @include('error')
                        </form>
                        <br>
                        
                    </div>
                </div>
            </body>
        </html>
{{-- href="{{ url('/data-connect') }}" --}}