@extends('layouts.frontend.master')
@section('content')
						



						<div class="wa_banner_result_search">
							<h3>Featured jobs</h3>
							<div class="container">
								<a href="#">
									<img src="http://heyreceiver.com/wp-content/uploads/2013/01/1078874_65912525.jpg" height="200px" width="100%">
								</a>
							</div>
						</div>



						  
						<div class="container wa_block_result_search">
							<h3>{{ $result->data->total }} jobs</h3>
							<div class="row">
								<div class="col-md-4">
									@foreach($result->data->jobs as $job)
									<a id="wa_click_{{ $job->job_id }}" class="wa_click_need" href="#">
										<div class="row wa_box_title_job">
											<div class="col-md-4">
												<img src="{{$job->job_logo_url}}" width="100%">
											</div>
											<div class="col-md-8">
												<h4>{{ $job->job_title }}</h4>
												<p>{{ $job->job_company }}</p>
												@foreach($locations as $local)
													@if($local->location_id == $job->job_location)
														<p><i></i> {{$local->lang_vn}}</p>
													@endif
												@endforeach
											</div>
										</div>
									</a>
									@endforeach
									
									<nav class="wa_pagination" style="text-align:center">
									  <ul class="pagination">
									    <li>
									      <a href="#" aria-label="Previous">
									        <span aria-hidden="true">&laquo;</span>
									      </a>
									    </li>
									    <li><a href="#">1</a></li>
									    <li><a href="#">2</a></li>
									    <li><a href="#">3</a></li>
									    <li><a href="#">4</a></li>
									    <li><a href="#">5</a></li>
									    <li>
									      <a href="#" aria-label="Next">
									        <span aria-hidden="true">&raquo;</span>
									      </a>
									    </li>
									  </ul>
									</nav>
									

									
								</div>
								
								
								@foreach($details as $job)
								<div id="wa_show_click_{{ $job->data->job_detail->job_id }}" class="col-md-7 col-md-offset-1 wa_content_job">
										<div class="title">
											<div class="col-md-6">
												<h4 class="wa_h4">{{ $job->data->job_detail->job_title }}</h4>
											</div>
											<div class="col-md-6 wa_btn_apply_block">
												<a href="#" class="btn btn_apply">Apply</a>
											</div>
										</div>
										<div class="col-md-12 wa_nd_job">
												<!-- <img src="img/avarta_job.png" width="100%"> -->
												<b>Job Description</b>
												<p>{{ $job->data->job_detail->job_description }}</p>
												<b>Job Requirement</b>
												<p>{{ $job->data->job_detail->job_requirement }}</p>
												<b>{{ $job->data->job_company->company_name }}</b>
												<p>{{ $job->data->job_company->company_address }}</p>
												<div style="text-align:center">
													<a href="#" class="btn btn_apply">Apply</a>
												</div>
										</div>
									
								</div>
								@endforeach

							</div>
						</div>




@stop



@section('script')
<script type="text/javascript">

	function getSelname(input)
	{
		return sel = input.replace('id','sel');
	}


	



	$(document).ready(function()
	{

		$('.wa_content_job').hide();
		$('.wa_block_result_search .wa_content_job').first().show();
		$('.wa_click_need').click(function()
		{
			var id = $(this).attr('id');
			id = id.split('_');
			id = id[2];
			var idshow = '#wa_show_click_'+id;
			$(idshow).show();
			$(idshow).siblings('.wa_content_job').hide();
		})








		var local = '#wa_id_location';
		var sel_local = getSelname(local);

		var salary = '#wa_id_salary';
		var sel_salary = getSelname(salary);

		var level = '#wa_id_level';
		var sel_level = getSelname(level);

		var array = [
			local,level,salary
		]

		var array_sel = [
			sel_local,sel_salary,sel_level
		]

		for(var i = 0; i<=2 ; i++)
		{
			// hide option
			$(array_sel[i]).hide();


			$(array[i]).click(function(){
				$(this).hide();
				$(this).siblings('i').hide();
				$(this).siblings('select').show();
			})


			$(array_sel[i]).change(function(){

				$(this).siblings('input').val($(this).val());
				$(this).hide();

				$(this).siblings('input').show();
				$(this).siblings('i').show();
			})
			
		}

	})
</script>
@stop