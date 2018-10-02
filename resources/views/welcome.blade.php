<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
            if (hour == 00 )
            {
                window.open("data-connect","PopupWindow","resizable=0"); 
            }
            
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
                    <a href="{{ url('/data-connect') }}" style='background-color: coral;padding:10px' target='_blank'>Manual Backup</a>
                </div>
                    <br>
                
            </div>
        </div>
    </body>
</html>
