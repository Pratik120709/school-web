<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="frontAssets/images/favicon.png">
    <title>FindMyUniversities</title>
    <link href="{{ URL::asset('/frontAssets/plugins/aos/aos.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/OwlCarousel2/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/OwlCarousel2/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/jquery-fancyfileuploader/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/ion.rangeSlider/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/frontAssets/plugins/select2-bootstrap-5/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet">
    <!-- Custom style for this template -->
    <link href="{{ URL::asset('/frontAssets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    
    
    @yield('content')
    <!-- start footer -->
     @include('website.layout.footer')
</body>

</html>