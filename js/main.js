$(document).ready(function(){
	$('#refresh-view').on('click', function(e){
		$.ajax({
	  		url: "https://api.myjson.com/bins/qw6q1"
		}).done(function(data){
			console.log(data);
			$('#display-block').html(`
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Caller: ${data.Name}</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-9">
								<ul class="list-group">
									<li class="list-group-item">Number: ${data.PhoneNumber}</li>
									<li class="list-group-item">Coordinates: ${data.Latitude} , ${data.Longitude}</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			`);
		});
	});
	$.ajax({
	  url: "https://api.myjson.com/bins/qw6q1"
	}).done(function(data){
		console.log(data);
		$('#display-block').html(`
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Emergency Caller: ${data.Name}</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-9">
							<ul class="list-group">
								<li class="list-group-item">Number: ${data.PhoneNumber}</li>
								<li class="list-group-item">Coordinates: ${data.Latitude} , ${data.Longitude}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		`);
	});
});
