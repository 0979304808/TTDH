<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.backend') }}</title>

    <!-- Bootstrap -->
    <link href="{{url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{url('vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('css/pace-themes/bounce.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{url('build/css/custom.min.css')}}" rel="stylesheet">

    <script src="{{url('js/pace.min.js')}}"></script>
    <script src="{{url('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('vendors/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script>
		jQuery.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
            beforeSend: function(){
                ajaxindicatorstart('Loading...');
            },
            complete: function(){
                ajaxindicatorstop();
            }
		})
		function ajaxindicatorstart(text){
			if(jQuery('body').find('#resultLoading').attr('id') != 'resultLoading'){
				jQuery('body').append('<div id="resultLoading" style="display:none"><div><img src="{{ url("images/loading.gif") }}"><div>'+text+'</div></div><div class="bg"></div></div>');
			}
			jQuery('#resultLoading').css({
				'width':'100%',
				'height':'100%',
				'position':'fixed',
				'z-index':'10000000',
				'top':'0',
				'left':'0',
				'right':'0',
				'bottom':'0',
				'margin':'auto'
			});

			jQuery('#resultLoading .bg').css({
				'background':'#000000',
				'opacity':'0.7',
				'width':'100%',
				'height':'100%',
				'position':'absolute',
				'top':'0'
			});

			jQuery('#resultLoading>div:first').css({
				'width': '250px',
				'height':'75px',
				'text-align': 'center',
				'position': 'fixed',
				'top':'0',
				'left':'0',
				'right':'0',
				'bottom':'0',
				'margin':'auto',
				'font-size':'16px',
				'z-index':'10',
				'color':'#ffffff'

			});
			jQuery('#resultLoading .bg').height('100%');
			jQuery('#resultLoading').fadeIn(300);
			jQuery('body').css('cursor', 'wait');
		}
		function ajaxindicatorstop(){
			jQuery('#resultLoading .bg').height('100%');
			jQuery('#resultLoading').fadeOut(300);
			jQuery('body').css('cursor', 'default');
		}
    </script>
    @yield('after-script')
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            {{-- Form login/register --}}
            @yield('main')

          </section>
        </div>
      </div>
    </div>
    {{--  @include('includes.partials.params')  --}}
  </body>
</html>