@extends('layoutTemplate')
@section('content')
	<div id="page-wrapper">
	    <div class="row">
	        <div class="col-lg-12">
	            <h1 class="welcome">WELCOME TO SUITBASE, </h1>
	            <h1><p class="name"> {{ Auth::user()->name }} ! </p></h1>
	        </div>
	        <!-- /.col-lg-12 -->
	    </div>
	    <br>
	    <!-- /.row -->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<canvas id="barLeave"></canvas>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<canvas id="barRemote"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<canvas id="barTraining"></canvas>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<canvas id="barProcurement"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
	</div>
	 <!-- /#page-wrapper -->
@endsection

@section('scripts')
	<script>
		$(document).ready(function() {
			var chartLeave = document.getElementById("barLeave");
			var chartRemote = document.getElementById("barRemote")
			var chartTraining = document.getElementById("barTraining")
			var chartProcurement = document.getElementById("barProcurement")

		    var leaveLabels = [];
		    var leaveDatas = [];
		    var remoteLabels = [];
		    var remoteDatas = [];
		    var trainingLabels = [];
		    var trainingDatas = [];
		    var procurementLabels = [];
		    var procurementDatas = [];


		    @foreach ($leaveLabels as $label)
		        leaveLabels.push('{{ $label }}');
		    @endforeach

		    @foreach ($leaveDatas as $data)
		        leaveDatas.push('{{ $data }}');
		    @endforeach

		    @foreach ($remoteLabels as $label)
		        remoteLabels.push('{{ $label }}');
		    @endforeach

		    @foreach ($remoteDatas as $data)
		        remoteDatas.push('{{ $data }}');
		    @endforeach

		    @foreach ($trainingLabels as $label)
		        trainingLabels.push('{{ $label }}');
		    @endforeach

		    @foreach ($trainingDatas as $data)
		        trainingDatas.push('{{ $data }}');
		    @endforeach

		    @foreach ($procurementLabels as $label)
		        procurementLabels.push('{{ $label }}');
		    @endforeach

		    @foreach ($procurementDatas as $data)
		        procurementDatas.push('{{ $data }}');
		    @endforeach

		    var dataLeave = {
		        labels: leaveLabels,
		        datasets: [
		            {
		                label: "Total Leave Request",
		                backgroundColor: "rgba(255,99,132,0.2)",
		                borderColor: "rgba(255,99,132,1)",
		                borderWidth: 1,
		                hoverBackgroundColor: "rgba(255,99,132,0.4)",
		                hoverBorderColor: "rgba(255,99,132,1)",
		                data: leaveDatas,
		            }
		        ]
		    };

		    var dataRemote = {
		        labels: remoteLabels,
		        datasets: [
		            {
		                label: "Total Remote Request",
		                backgroundColor: "rgba(255,99,132,0.2)",
		                borderColor: "rgba(255,99,132,1)",
		                borderWidth: 1,
		                hoverBackgroundColor: "rgba(255,99,132,0.4)",
		                hoverBorderColor: "rgba(255,99,132,1)",
		                data: remoteDatas,
		            }
		        ]
		    };

		    var dataTraining = {
		        labels: trainingLabels,
		        datasets: [
		            {
		                label: "Total Training Request",
		                backgroundColor: "rgba(255,99,132,0.2)",
		                borderColor: "rgba(255,99,132,1)",
		                borderWidth: 1,
		                hoverBackgroundColor: "rgba(255,99,132,0.4)",
		                hoverBorderColor: "rgba(255,99,132,1)",
		                data: trainingDatas,
		            }
		        ]
		    };

		    var dataProcurement = {
		        labels: procurementLabels,
		        datasets: [
		            {
		                label: "Total Procurement Request",
		                backgroundColor: "rgba(255,99,132,0.2)",
		                borderColor: "rgba(255,99,132,1)",
		                borderWidth: 1,
		                hoverBackgroundColor: "rgba(255,99,132,0.4)",
		                hoverBorderColor: "rgba(255,99,132,1)",
		                data: procurementDatas,
		            }
		        ]
		    };

		    var optionBar = {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    };

		    var barLeave = new Chart(chartLeave, {
		        type: 'bar',
		        data: dataLeave,
		        options: optionBar,
		        responsive: true,
		        maintainAspectRatio: true
		    });

		    var barRemote = new Chart(chartRemote, {
		        type: 'bar',
		        data: dataRemote,
		        options: optionBar,
		        responsive: true,
		        maintainAspectRatio: true
		    });

		    var barTraining = new Chart(chartTraining, {
		        type: 'bar',
		        data: dataTraining,
		        options: optionBar,
		        responsive: true,
		        maintainAspectRatio: true
		    });

		    var barProcurement = new Chart(chartProcurement, {
		        type: 'bar',
		        data: dataProcurement,
		        options: optionBar,
		        responsive: true,
		        maintainAspectRatio: true
		    });
		});
	</script>
@endsection