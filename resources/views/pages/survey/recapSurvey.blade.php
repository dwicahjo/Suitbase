@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Recap of Survey</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <div class="form-group">
                            <label class="col-md-4 control-label" required>Select Question</label>
                            <div class = "col-md-6">
                                <select class="form-control select_menu" name = "questionSelect" id = "questionSelect" onchange = "questionSelect(this.value);">
                                    @foreach ($questions as $question)
                                    <option value="{{$question->id}}">{{$question->question}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Division</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                                <?php $i=0 ?>
                                @foreach ($questions as $question)
                                @if($i==0)
                                <input type="hidden" name="previousId" id="previousId" value="{{$question->id}}">
                                 <tbody id="table{{$question->id}}">
                                 <?php $i++ ?>
                                 @else
                                 <tbody id="table{{$question->id}}" style="display:none">
                                 @endif
                                    @foreach($question->answer()->get() as $answer)
                                <tr class="odd gradeA">
                                    <td>{{$answer->survey()->get()->first()->employee()->get()->first()->name}}</td>
                                    <td>{{$answer->survey()->get()->first()->employee()->get()->first()->division->get()->first()->name}}</td>
                                    <td>{{$answer->answer}}</td>
                                </tr>
                                @endforeach
                                 </tbody>
                                @endforeach

                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

</div>
<!-- /#page-wrapper -->
@endsection
