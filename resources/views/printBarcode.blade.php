@extends('layout')
@section('title', 'Barcode')
@section('page_header', 'Barcode Management')
@section('sampleType','active')
@section('content')
@section('extracss')
    <style type="text/css">
        @media print
        {
            body {
                padding-top:5mm;
            }
        }
    </style>
@endsection

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <h3 class="box-title">Barcode</h3>
                    <div class="barcode" id="printMe">
                        <?php
                        echo $barcode.'<br>';
                        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($id, 'C128') . '" alt="barcode" />';
                        ?>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" onclick="printDiv('printMe')" class="btn btn-primary print">Print</button>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

@endsection
