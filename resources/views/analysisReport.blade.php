@extends('layout')
@section('title', 'Report Form')
@section('page_header', 'Report Form Management')
@section('analysisReport','active')
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
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="">Scan Barcode</label>
                        <input type="text" class="form-control barcode" id="barcode"  name="barcode" placeholder="Scan Barcode" required>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id" id="id" class="id">
                    <button type="submit" class="btn btn-primary barSubmit">Submit</button>
                </div>
            </div>
        </div>
        <div class="col-md-12 withData" style="display: none;">
            <!-- general form elements -->
            <div class="box box-primary">
                {{ Form::open(array('url' => 'UpdateResultAnalysis',  'method' => 'post')) }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Sample Types</label>
                            <select class="form-control select2 type" name="type" style="width: 100%;" required>
                                <option value="" selected>Select Sample</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Year</label>
                            <input type="text" class="form-control year" id="year"  name="year" placeholder="Year" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Your vide memo letter no.</label>
                            <input type="text" class="form-control letterNo" id="letterNo"  name="letterNo" placeholder="Your vide memo letter no." required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Received from</label>
                            <input type="text" class="form-control receivedFrom" id="receivedFrom"  name="receivedFrom" placeholder="Received from" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Received By</label>
                            <input type="text" class="form-control receivedBy" id="receivedBy"  name="receivedBy" placeholder="Received by" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Received Date</label>
                            <input type="text" class="form-control receivedDate" id="receivedDate"  name="receivedDate" placeholder="Received date" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Description of the parcel</label>
                            <input type="text" class="form-control description" id="description"  name="description" placeholder="Description of the parcel" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">The parcel consisted of</label>
                            <input type="text" class="form-control consisted" id="consisted"  name="consisted" placeholder="The parcel consisted of" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Enclosed within</label>
                            <select class="form-control select2 enclosed" name="enclosed" style="width: 100%;" required>
                                <option value="" selected>Select Enclosed within</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Impression of seal</label>
                            <select class="form-control select2 impression" name="impression" style="width: 100%;" required>
                                <option value="" selected>Select Impression of seal</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Contained</label>
                            <input type="text" class="form-control contained" id="contained"  name="contained" placeholder="Contained" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Case No/GD No</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="yes" >
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="no" >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                            <input type="text" style="display: none;" class="form-control caseNo" id="caseNo"  name="caseNo" placeholder="Case No/GD No">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">To</label>
                            <textarea  class="form-control designation" id="designation"  name="designation" placeholder="To" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label>Performed Tests</label>
                        <div class="form-check p_test" id="p_test">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Result of Analysis</label>
                            <textarea class="form-control analysis" id="analysis" rows="6" name="analysis" placeholder="Write Result of Analysis" required></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Textarea</label>
                            <textarea class="form-control editorText" id="editorText" rows="6" name="editorText"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-4 pull-right">
                        <div class="form-group">
                            <input type="text" class="form-control analysisBy" id="analysisBy"  name="analysisBy" placeholder="Analysis By" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id" id="id" class="id">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="col-md-12 nodata" style="display: none;">
            <div class="box box-primary">
                <div class="box-body">
                    <h4> No Data Available!Please Try again</h4>
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
                                    @if($report->status == 2)
                                    <button type="button" rel="tooltip" class="btn btn-info forward" data-id="{{$report->id}}">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                    @endif
                                    <button type="button" rel="tooltip" class="btn btn-success edit" data-id="{{$report->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" rel="tooltip"  class="btn btn-danger delete" data-id="{{$report->id}}">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $reports->links() }}
                    <div class="modal modal-danger fade" id="modal-danger">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    <center><p>Do you want to delete?</p></center>
                                </div>
                                <div class="modal-footer">
                                    {{ Form::open(array('url' => 'deleteReceivedSample',  'method' => 'post')) }}
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-outline">Yes</button>
                                    <input type="hidden" name="id" id="id" class="id">
                                    {{ Form::close() }}
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal modal-info fade" id="modal-info">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Forward</h4>
                                </div>
                                <div class="modal-body">
                                    <center><p>Do you want to forward?</p></center>
                                </div>
                                <div class="modal-footer">
                                    {{ Form::open(array('url' => 'forwardAdminSample',  'method' => 'post')) }}
                                    {{ csrf_field() }}
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-outline">Yes</button>
                                    <input type="hidden" name="id" id="id" class="id">
                                    {{ Form::close() }}
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/asset/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'editorText' );
        CKEDITOR.replace( 'designation' );
    </script>
    <script>
        $.ajax({
            url: 'getAllSample',
            type: "GET",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                var data = response.data;
                var len = data.length;
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['sample'];
                    $(".type").append("<option value='"+id+"'>"+name+"</option>");
                }

            },
            failure: function (msg) {
                alert('an error occured');
            }
        });
        $.ajax({
            url: 'getAllEnclosedItem',
            type: "GET",
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function (response) {
                var data = response.data;
                var len = data.length;
                for( var i = 0; i<len; i++){
                    var id = data[i]['id'];
                    var name = data[i]['name'];
                    $(".enclosed").append("<option value='"+id+"'>"+name+"</option>");
                }

            },
            failure: function (msg) {
                alert('an error occured');
            }
        });
        $(".barSubmit").click(function(){
            var id =$('.barcode').val();
            $.ajax({
                type: 'GET',
                url: 'getDataByBarcode',
                data: {id:id},
                dataType: 'json',
                success: function (response) {
                    var data = response.data;
                    var count = response.count;
                    var methodology = response.methodology;
                    if(count>0){
                        $('.id').val(data.id);
                        $('.type').val(data.type);
                        $('.year').val(data.year);
                        $('.letterNo').val(data.letterNo);
                        $('.receivedFrom').val(data.receivedFrom);
                        $('.receivedBy').val(data.receivedBy);
                        $('.receivedDate').val(data.receivedDate);
                        $('.consisted').val(data.consisted);
                        $('.contained').val(data.contained);
                        $('.enclosed').val(data.enclosed);
                        $('.impression').val(data.impression);
                        $('.description').val(data.description);
                        $('.analysis').val(data.analysis);
                        $('.analysisBy').val(data.analysis_by);
                        CKEDITOR.instances['editorText'].setData(data.editor_ext);
                        CKEDITOR.instances['designation'].setData(data.designation);
                        if(data.caseNo){
                            $("#inlineRadio1").attr('checked', 'checked');
                            $('.caseNo').show();
                            $('.caseNo').val(data.caseNo);
                        }
                        else{
                            $("#inlineRadio2").attr('checked', 'checked');
                            $('.caseNo').hide();
                        }
                        var checboxSum ="";
                        for(var i=0; i<methodology.length; i++){
                            checboxSum +='<input type="checkbox" name="tests[]" value="'+methodology[i].id+'" class="form-check-input" id="exampleCheck'+i+'">&nbsp;&nbsp;' +
                                '<label class="form-check-label" for="exampleCheck'+i+'">'+methodology[i].name+'&nbsp;&nbsp;&nbsp;</label>';
                        }
                        $(".p_test").html( checboxSum);
                        $('.withData').show();
                        $('.nodata').hide();
                    }
                    if(count<1){
                        $('.nodata').show();
                        $('.withData').hide();
                    }
                },
                failure: function (msg) {
                    alert('an error occured');
                }
            });
        });
        $(function(){
            $(document).on('click', '.edit', function(e){
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
            $(document).on('click', '.forward', function(e){
                e.preventDefault();
                $('#modal-info').modal('show');
                var id = $(this).data('id');
                $('.id').val( id);
            });
        });
        function getRow(id){
            $.ajax({
                type: 'POST',
                url: 'getSampleListById',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                dataType: 'json',
                success: function(response){
                    var data = response.data;
                    var methodology = response.methodology;
                    $('.id').val(data.id);
                    $('.type').val(data.type);
                    $('.year').val(data.year);
                    $('.letterNo').val(data.letterNo);
                    $('.receivedFrom').val(data.receivedFrom);
                    $('.receivedBy').val(data.receivedBy);
                    $('.receivedDate').val(data.receivedDate);
                    $('.consisted').val(data.consisted);
                    $('.contained').val(data.contained);
                    $('.enclosed').val(data.enclosed);
                    $('.impression').val(data.impression);
                    $('.description').val(data.description);
                    $('.analysis').val(data.analysis);
                    $('.analysisBy').val(data.analysis_by);
                    $('.forward').val('forward');
                    CKEDITOR.instances['editorText'].setData(data.editor_ext);
                    CKEDITOR.instances['designation'].setData(data.designation);
                    if(data.caseNo){
                        $("#inlineRadio1").attr('checked', 'checked');
                        $('.caseNo').show();
                        $('.caseNo').val(data.caseNo);
                    }
                    else{
                        $("#inlineRadio2").attr('checked', 'checked');
                        $('.caseNo').hide();
                    }
                    var checboxSum ="";
                    for(var i=0; i<methodology.length; i++){
                        checboxSum +='<input type="checkbox" name="tests[]" value="'+methodology[i].id+'" class="form-check-input" id="exampleCheck'+i+'">&nbsp;&nbsp;' +
                            '<label class="form-check-label" for="exampleCheck'+i+'">'+methodology[i].name+'&nbsp;&nbsp;&nbsp;</label>';
                    }
                    $("#p_test").empty();
                    $(".p_test").append( checboxSum);
                    $('.withData').show();
                    $('.forward').show();
                }
            });
        }
    </script>
@endsection
