@extends('layout')
@section('title', ' রিপোর্ট ')
@section('page_header', ' রিপোর্ট')
@section('finalReport','active')
@section('extracss')
    <style>
        p {
            line-height: .5 ;
        }
        @media print
        {
            title{display:none;}
        }
    </style>
@endsection
@section('content')

    @if ($message = Session::get('successMessage'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thanks!</h4>
            {{ $message }}</b>
        </div>
    @endif
    @if ($message = Session::get('errorMessage'))

        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Sorry!</h4>
            {{ $message }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 report" style="display: none;">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div id="printArea">
                        <div class="col-sm-12" style="border:1px solid black; margin-bottom: 15px; margin-left: 8px;">
                            <p style="text-align: center; margin-top: 5px; font-size: 14px;">
                                From to be used by the Chemical Examiner/Forensic Expert When reporting the
                            </p>
                            <p style="text-align: center; font-size: 20px;"><b>Result of Analysis</b></p>
                        </div>
                        <div class="col-sm-12">
                            <p>
                                Report no-706/1/Forensic/
                                <span class="pull-right">Dated: <?php echo Date('d-M-Y')?> </span>
                            </p>
                        </div>
                        <div class="col-sm-12" style="border:1px solid black; margin-bottom: 10px; width:280px; margin-left: 8px;">
                            Please quote this number in future reference
                        </div>
                        <div class="col-sm-12" style="margin-bottom: 8px;">
                            From,
                        </div>
                        <div class="col-sm-12" style="margin-bottom: 8px;">
                            Director, Investigation and Forensic Wing, RAB Forces Headquarters, Kurmitola, Dhaka-1229
                        </div>
                        <div class="col-sm-12" style="margin-bottom: 10px;">
                            To,
                        </div>
                        <div class="col-sm-12 designation" style="margin-bottom: 5px; margin-left: 30px;">

                        </div>
                        <div class="col-sm-12" style="margin-bottom: 8px;">
                            <p style="font-size: 15px;">
                                <b >a.</b>
                                <span style="margin-left: 25px;"><b> <u>Suspected sample</u></b></span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 40px;">
                                (1)
                                <span class="letterNo" style="margin-left: 20px;"></span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 40px;">
                                (2)
                                <span class="receivedFrom" style="margin-left: 20px;"></span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 40px;">
                                (3)
                                <span class="receivedBy" style="margin-left: 20px;"></span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 40px;">
                                (4)
                                <span class="receivedDate" style="margin-left: 20px;"></span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 40px;">
                                (5)
                                <span class="marked" style="margin-left: 20px;"></span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <div style="margin-left: 40px;">
                                (6)
                                <span class="description" style="margin-left: 20px;"></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div style="margin-left: 80px;" class="consisted">

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 80px;" class="enclosed">

                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 80px;" class="impression">

                            </p>
                        </div>
                        <div class="col-sm-12">
                            <p style="margin-left: 80px;" class="contained">

                            </p>
                        </div>
                        <div class="col-sm-12 caseNoDiv" style="margin-bottom: 12px;">
                            <p style="margin-left: 40px;">
                                (7)
                                <span class="caseNo" style="margin-left: 20px;"></span>
                            </p>
                        </div>
                        <div class="col-sm-12" style="margin-bottom: 8px;">
                            <div style="font-size: 15px;">
                                <b >b.</b>
                                <span style="margin-left: 25px;"><b> <u>Result of analysis</u></b></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div style="margin-left: 80px;" class="analysis">

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div style="margin-left: 40px;" class="editor_text">

                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-bottom: 30px;">
                            <p style="font-size: 15px;">
                                <b >c.</b>
                                <span style="margin-left: 25px;"><b> <u>Methodology</u></b></span>
                            </p>
                            <p id="test_name" style="margin-left: 40px;">

                            </p>
                        </div>
                        <div class="col-sm-4 pull-right" style="margin-top: 50px;">
                            <div class="designationDir">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary barSubmit" onclick="printDiv('printArea')">Print</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sample Lists </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Entry Date </th>
                            <th>Barcode </th>
                            <th>Analysis By </th>
                            <th>Received Date </th>
                            <th>Memo/Letter No </th>
                            <th>Received From </th>
                            <th>Received By </th>
                            <th>Tool</th>
                        </tr>
                        @foreach($reports as $report)
                            <tr>
                                <td> {{$report->date}} </td>
                                <td> {{$report->bacode}} </td>
                                <td> {{$report->analysis_by}} </td>
                                <td> {{$report->receivedDate}} </td>
                                <td> {{$report->letterNo}} </td>
                                <td> {{$report->receivedFrom}} </td>
                                <td> {{$report->receivedBy}} </td>
                                <td class="td-actions text-center">
                                    <button type="button" rel="tooltip" class="btn btn-success view" data-id="{{$report->id}}">
                                        <i class="fa fa-eye">View</i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $reports->links() }}
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
        $(function(){
            $(document).on('click', '.view', function(e){
                e.preventDefault();
                $('.divform').show();
                var id = $(this).data('id');
                getRow(id);
            });
            $(document).on('click', '.delete', function(e){
                e.preventDefault();
                $('#modal-danger').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });
        });
        function getRow(id){
            $.ajax({
                type: 'POST',
                url: 'getSampleListByIdAdmin',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                dataType: 'json',
                success: function(response){
                    var data = response.data;
                    var methodology = response.methodology;
                    $('.id').val(data.s_id);
                    $('.type').val(data.type);
                    $('.year').val(data.year);
                    $('.designation').html(data.designation);
                    $('.letterNo').html('Your vide memo/letter no:'+' '+data.letterNo);
                    $('.receivedFrom').html('Received from:'+' '+data.receivedFrom);
                    $('.receivedBy').html('Received by:'+' '+data.receivedBy);
                    $('.receivedDate').html('Received date:'+' '+data.receivedDate);
                    $('.marked').html('Marked as:'+' '+data.bacode);
                    $('.consisted').html('The parcel consisted of:'+' '+data.consisted);
                    $('.contained').html('Contained:'+' '+data.contained);
                    $('.enclosed').html('Enclosed within:'+' '+data.name);
                    if(data.impression == 1){
                        $('.impression').html('Impression of seal:'+' '+'সিলগালা আছে');
                    }
                    else{
                        $('.impression').html('Impression of seal:'+' '+'সিলগালা নেই');
                    }
                    $('.description').html('Description of the parcel:'+' '+data.description);
                    $('.analysis').html(data.analysis);
                    $('.analysisBy').val(data.analysis_by);
                    $('.editor_text').html(data.editor_ext);
                    if(data.caseNo){
                        $('.caseNoDiv').show();
                        $('.caseNo').html('Case No/GD No:'+' '+data.caseNo);
                    }
                    else{
                        $('.caseNoDiv').hide();
                    }
                    var para ="";
                    for(var j=0; j<methodology.length; j++){
                        var k=j+1;
                        para +=' ( ' + k + ' ) ' +methodology[j];
                    }
                    $('#test_name').html(para);
                    $('.designationDir').html(response.designation);
                    var checboxSum ="";
                    for(var i=0; i<methodology.length; i++){
                        checboxSum +='<input type="checkbox" name="tests[]" value="'+methodology[i].id+'" class="form-check-input" id="exampleCheck'+i+'">&nbsp;&nbsp;' +
                            '<label class="form-check-label" for="exampleCheck'+i+'">'+methodology[i].name+'&nbsp;&nbsp;&nbsp;</label>';
                    }
                    $("#p_test").empty();
                    $(".p_test").append( checboxSum);
                    $('.report').show();
                }
            });
        }
    </script>
@endsection
