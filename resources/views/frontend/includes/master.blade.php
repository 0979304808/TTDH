<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')

<body>

<div class="main">
    @yield('content')
</div>
@include('frontend.includes.modal')

@include('frontend.includes.footer')
@include('includes.partials.params')
<script>
    window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= window.innerHeight + 1) {
            $('.button-top').show();
        }else {
            $('.button-top').hide();
        }
    };

    $(document).ready(function () {
        $('.button-top').click(function (){
            $('html, body').animate({ scrollTop: 0 }, 600);
        });
    });
</script>
<script src="{{ asset('frontend/auth.js') }}"></script>
<script src="{{ asset('frontend/js/notify.min.js') }}"></script>
@yield('script')
{{ HTML::script('frontend/main.js') }}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>


</body>
</html>
