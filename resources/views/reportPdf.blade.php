<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<style>
    body {
        font-family: 'examplefont', sans-serif;

    }
    @font-face {
        font-family: 'font_family';
        font-style: normal;
        font-weight: normal;
        src: url('{{public_path()}}/public/asset/font/kalpurush.ttf') format('truetype');
    }
</style>
<body>
<div style="border:1px solid black; height: 50px;">
    <p style="text-align: center; margin-top: 5px; margin-bottom: 2px;">
        From to be used by the Chemical Examiner/Forensic Expert When reporting the
        <br>
        <b>Result of Analysis</b>
    </p>
</div>
<div>
    <p>
        Report no-706/1/Forensic/
        <span class="pull-right" style="margin-left: 396px;">Dated: <?php echo Date('d-M-Y')?> </span>
    </p>
</div>
<div  style="border:1px solid black; margin-bottom: 10px; width:310px;">
    Please quote this number in future reference
</div>
<div class="col-sm-12" style="margin-bottom: 8px;">
    From,
</div>
<div class="col-sm-12" style="margin-bottom: 8px;">
    Director, Investigation and Forensic Wing, RAB Forces Headquarters, Kurmitola, Dhaka-1229
</div>
<div class="col-sm-12" style="margin-bottom: 4px;">
    To,
</div>
<div style="margin-bottom: 5px; margin-left: 30px;">
 {!! $data->designation !!}
</div>
</body>
</html>
