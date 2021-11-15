<!DOCTYPE html>
<html lang="en">
@include('frontend.includes.header')

<body>

<div class="main">
    @yield('content')
</div>

@include('frontend.includes.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#quynh22").click(function () {
            $("#logreg-forms").show(100);
            $("#quynh333").show(500);
        });
        $("#quynh33").click(function () {
            $("#logreg-forms").hide(500);
            $("#quynh333").hide(500);
        });
        $("#logreg-forms").hide()
        $("#quynh333").hide()
    });
    @yield('script')
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

</body>
</html>
