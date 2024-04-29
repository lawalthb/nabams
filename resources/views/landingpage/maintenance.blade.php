@php
$header = App\Models\WebHeaders::where('id', 1)->first();
$webSection  = App\Models\WebSetting::where('id', 1)->first();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Maintenance Mode - {{$header->site_name}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	

body {
    overflow: hidden;
    /* background: transparent url("{{$header->logo}}") left 40%; */
    background-size: cover;
    font-size: 15px;
    margin: 0;
    padding: 0;
}
.layout-align-center-vertical {
    -webkit-justify-content: center;
    -moz-justify-content: center;
    -ms-justify-content: center;
    justify-content: center;
    max-height: 100%;
}
.horizontal-align {
    position: relative;
    left: 50%;
    -webkit-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    transform: translateX(-50%);
}

.width-7, .size-7 {
    width: 392px !important;
    margin-top:100px;
}
.height-7, .size-7 {
    height: 392px !important;
}
.logo-box-primary .logo {
    color: #fff;
    background-color: #009688 !important;
}
.logo-box, .logo-box .logo {
    display: -webkit-flex;
    display: -moz-flex;
    display: -ms-flexbox;
    display: -ms-flex;
    display: flex;
    -webkit-justify-content: center;
    -moz-justify-content: center;
    -ms-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    align-items: center;
    -webkit-align-content: center;
    -moz-align-content: center;
    -ms-align-content: center;
    align-content: center;
}

    </style>
</head>
<body>
<div class="full-size layout-column layout-align-center-vertical bootstrap snippets bootdeys">
<div class="size-7 horizontal-align">
<div class="panel panel-default">
<div class="panel-body text-center">
<div class="logo-box logo-box-primary padding-top-4">
<div class="logo">
<img src="{{asset($header->logo)}}" >
</div>
</div>
<h2>Under Maintenance</h2>
<p>{!! $webSection->maintenance_text !!}</p>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	


</script>
</body>
</html>