<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Default Title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/remixicon.css')}}">
<link rel="stylesheet" href="{{asset('css/uicons-regular-rounded.css')}}">
<link rel="stylesheet" href="{{asset('css/flaticon_baxo.css')}}">
<link rel="stylesheet" href="{{asset('css/swiper.bundle.min.css')}}">
<link rel="stylesheet" href="{{asset('css/aos.css')}}">
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/footer.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('css/dark-theme.css')}}">
<link rel="icon" type="image/png" href="{{asset('img/favicon.webp')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />







 
<style type="text/css">
    .loading {
        z-index: 20;
        position: absolute;
        top: 0;
        left:-5px;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.4);
    }
    .loading-content {
        position: absolute;
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        top: 40%;
        left:50%;
        animation: spin 2s linear infinite;
        }
          
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
</style>
</head>
<body>
    @include('layouts.header')

    @php
     use Mews\Purifier\Facades\Purifier;
@endphp


<div class="container">
  
    <section id="loading">
        <div id="loading-content"></div>
    </section>





   
        @yield('content')


        @include('layouts.footer')
    </div>

    {{-- <footer class="bg-dark text-white text-center py-3">
        <p>&copy; {{ date('Y') }} blogspot</p>
    </footer> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    {{-- <script src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js" integrity="sha512-Ysw1DcK1P+uYLqprEAzNQJP+J4hTx4t/3X2nbVwszao8wD+9afLjBQYjz7Uk4ADP+Er++mJoScI42ueGtQOzEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><script src="{{asset('js/aos.js')}}"> </script>
<script src="{{asset('js/main.js')}}"> </script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/tjy9xqnyofcfag6nu8e4fkdet25ymn7mq4a8z1w8033903xg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('js/tiny.js')}}"></script>
<script src = "{{asset('js/ajaxscript.js')}}"></script>




</body>
 
<script type="text/javascript">
  
    /*------------------------------------------
    --------------------------------------------
    Add Loading When fire Ajax Request
    --------------------------------------------
    --------------------------------------------*/
    $(document).ajaxStart(function() {
        $('#loading').addClass('loading');
        $('#loading-content').addClass('loading-content');
    });
  
    /*------------------------------------------
    --------------------------------------------
    Remove Loading When fire Ajax Request
    --------------------------------------------
    --------------------------------------------*/
    $(document).ajaxStop(function() {
        $('#loading').removeClass('loading');
        $('#loading-content').removeClass('loading-content');
    });
      
</script>
  
@yield('javascript')
</html>