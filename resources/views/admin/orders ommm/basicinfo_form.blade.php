@php
		$arrChkList  =  [];
	if(!empty($customerContDetl->load_weight_other)) {
		$arrChkList = unserialize($customerContDetl->load_weight_other) ?? '';
	} else {
		$arrChkList = [];
	}

	$arrLoadWeight = ['Over-Weight', 'Hazmat'];

@endphp
	<div class="m-portlet__body">
		<div class="form-group m-form__group row">
			<div class="col-lg-2 col-form-label">
				<label class="col-form-label">
					Terminal:
				</label>
			</div>
			<div class="col-lg-3">
				{{ Form::select('terminal', $terminal,
					    null, 
						['class' => 'form-control m-input m-input--square'])   
				}}
			</div>
			<div class="col-lg-6">
				<div class="m-radio-inline">
					<label class="m-radio">
					{{ Form::radio('line_haul', '1', true) }}
						Line Haul
						<span></span>
					</label>
					<label class="m-radio">
					{{ Form::radio('line_haul', '2') }}
						 Interline(Brokered)
						<span></span>
					</label>
					
				</div>
			</div>
		</div>
		<div class="form-group m-form__group row">
			
			<div class="col-lg-2">
				<label class="col-form-label"">
					Import or Export ?:
				</label>
			</div>
			
			<div class="col-lg-6">
				
				<div class="m-radio-inline" id="type">
					<label class="m-radio">
						{{ Form::radio('import_export', 'Import', true) }}
						Import
						<span></span>
					</label>

					<label class="m-radio">
						{{ Form::radio('import_export', 'Export') }}
						Export
						<span></span>
					</label>

					<label class="m-radio">
						{{ Form::radio('import_export', 'LTL/CFS') }}
						 LTL/CFS
						<span></span>
					</label>

					<label class="m-radio">
						{{ Form::radio('import_export', 'One Way') }}				
						One Way
						<span></span>
					</label>

					<label class="m-radio">
						{{ Form::radio('import_export', 'Drop & Hook') }}				
						 Drop & Hook
						<span></span>
					</label>

					<label class="m-radio">
						{{ Form::radio('import_export', 'Bobtail') }}
						 Bobtail
						<span></span>
					</label>

					<label class="m-radio">
						{{ Form::radio('import_export', 'Other') }}
						 Other
						<span></span>
					</label> 
				</div>
			</div>
			<div class="col-lg-4">
					{!! Form::text('otherorbobtaildata', null, ['class' => 'form-control m-input','id'=>'otherorbobtaildata','placeholder'=>'Explain Here if Bobtail or Other Type', 'style'=>'display:none;']) !!}
			</div>
		</div>
		

		<div class="form-group m-form__group row">
			<div class="col-lg-2">
			
				<label class="col-form-label">
					Customer or Billee:
				</label>
			</div>
			<div class="col-lg-3">											
					{!! Form::text('customer_billee_name', null, ['class' => 'form-control m-input','id'=>'customer_billee_name', 'placeholder'=>'Enter Customer or Billee']) !!}
				
			</div>
			<div class="col-lg-2">											
				<label class="col-form-label">
					Appointment at customer:
				</label>
			</div>
			<div class="col-lg-4">
				<div class="input-group date" id="m_datetimepicker_5">
					{{ Form::text('appointment_date', null, ['class'=>'form-control m-input', 'id'=>'appointment_date', 'placeholder'=> 'Appointment Date']) }}
					<span class="input-group-addon">
						<i class="la la-calendar glyphicon-th"></i>
					</span>
				</div>
			</div>
			
		</div>
		<div class="form-group m-form__group row">
			<div class="col-lg-1">
				<label class="col-form-label">
					Reference:
				</label>
			</div>
			<div class="col-lg-3">
				{!! Form::text('reference', null, ['class' => 'form-control m-input','id'=>'reference', 'placeholder'=>'Reference']) !!}
				
			</div>
			<div class="col-lg-1">
				<label class="col-form-label">
					Booking/BL#:
				</label>
			</div>
			<div class="col-lg-3">
				{!! Form::text('booking_bl', null, ['class' => 'form-control m-input','id'=>'booking_bl', 'placeholder'=>'Booking/BL#']) !!}							
			</div>
			<div class="col-lg-1">
				<label class="col-form-label">
					Seal:
				</label>
			</div>
			<div class="col-lg-3">
				{!! Form::text('seal', null, ['class' => 'form-control m-input','id'=>'seal', 'placeholder'=>'Seal']) !!}							
			</div>
		</div>

		<div class="form-group m-form__group order_chassis" id="container_chassis">
			<div class="row">
				<div class="col-lg-12">
					<label class="col-form-label">
						Container/Chassis:
					</label>
				</div>
			</div>
				@php
				if(!empty(request()->id)) :
					if (!empty($orderBasicInfo->container_chassis)):
						$arrContainerChassis = unserialize($orderBasicInfo->container_chassis);
						for($i=0; $i < count($arrContainerChassis['container']); $i++) : 
							@endphp
							<div class="row container_chassis">
								<div class="col-lg-2">
									
									{!! Form::text('container_chassis[container][]', $arrContainerChassis['container'][$i], ['class' => 'form-control m-input','id'=>'container', 'placeholder'=>'Container']) !!}
								</div>
								<div class="col-lg-1">
									{{ Form::select('container_chassis[size][]', ['20' => '20','40' => '40' ], $arrContainerChassis['size'][$i],  ['class' => 'form-control m-input m-input--square'])
									}}
								</div>						
								<div class="col-lg-1">
									{{ Form::select('container_chassis[standard_dry][]', ['Standard(Dry)' => 'Standard(Dry)',
										   'USA' => 'USA'], $arrContainerChassis['standard_dry'][$i],  ['class' => 'form-control m-input m-input--square'])
									}}												
								</div>
								<div class="col-lg-1">
									
									{!! Form::text('container_chassis[le][]', $arrContainerChassis['le'][$i], ['class' => 'form-control m-input','id'=>'le', 'placeholder'=>'L/E']) !!}							
								</div>
								<div class="col-lg-2">
									
									{!! Form::text('container_chassis[chassis][]', $arrContainerChassis['chassis'][$i], ['class' => 'form-control m-input','id'=>'chassis', 'placeholder'=>'Chassis']) !!}
								</div>
								<div class="col-lg-2">
									
									{!! Form::text('container_chassis[chassis_vendor][]', $arrContainerChassis['chassis_vendor'][$i], ['class' => 'form-control m-input','id'=>'chassis_vendor', 'placeholder' => 'Chassis Vendor']) !!}
								</div>
								<div class="col-lg-2">
									
									{!! Form::text('container_chassis[company_chassis][]', $arrContainerChassis['company_chassis'][$i], ['class' => 'form-control m-input','id'=>'company_chassis', 'placeholder'=>'Company Chassis']) !!}
								</div>
								<div class="col-lg-1">
									@if ($i == 0)
										<a href="" class="add_chassis"><i class="m-nav__link-icon fa fa-plus"></i></a>
									@else
										<a href="" class="remove_chassis"><i class="m-nav__link-icon fa fa-minus"></i></a>
									@endif


								</div>
							</div>	
				@php 	endfor; 
						 	endif; 
					else :
				 @endphp

					<div class="row container_chassis">
					 	<div class="col-lg-2">
							
							{!! Form::text('container_chassis[container][]', null, ['class' => 'form-control m-input','id'=>'container', 'placeholder'=>'Container']) !!}
						</div>
						<div class="col-lg-1">
							
							{{ Form::select('container_chassis[size][]', ['20' => '20','40' => '40' ], null,  ['class' => 'form-control m-input m-input--square'])
							}}
						</div>						
						<div class="col-lg-1">
							
							{{ Form::select('container_chassis[standard_dry][]', ['Standard(Dry)' => 'Standard(Dry)',
								   'USA' => 'USA'], null,  ['class' => 'form-control m-input m-input--square'])
							}}												
						</div>
						<div class="col-lg-1">
							
							{!! Form::text('container_chassis[le][]', null, ['class' => 'form-control m-input','id'=>'le', 'placeholder'=>'L/E']) !!}							
						</div>
						<div class="col-lg-2">
							
							{!! Form::text('container_chassis[chassis][]', null, ['class' => 'form-control m-input','id'=>'chassis', 'placeholder'=>'Chassis']) !!}
						</div>
						<div class="col-lg-2">
							
							{!! Form::text('container_chassis[chassis_vendor][]', null, ['class' => 'form-control m-input','id'=>'chassis_vendor', 'placeholder' => 'Chassis Vendor']) !!}
						</div>
						<div class="col-lg-2">
							
							{!! Form::text('container_chassis[company_chassis][]', null, ['class' => 'form-control m-input','id'=>'company_chassis', 'placeholder'=>'Company Chassis']) !!}
						</div>
						<div class="col-lg-1">
							<a href="" class="add_chassis"><i class="m-nav__link-icon fa fa-plus"></i></a>
						</div>
					</div>	
					 @php				 	
						endif;	 					 	
					 @endphp
			</div>

		<div class="form-group m-form__group row">
			<div class="col-lg-2">
			
				<label class="col-form-label">
					Load Weight:
				</label>
			</div>
			<div class="col-lg-3">											
				{!! Form::text('load_weight', null, ['class' => 'form-control m-input','id'=>'load_weight', 'placeholder'=>'Enter Load Weight']) !!}
			</div>
			<div class="col-lg-6">
				<div class="m-checkbox-inline">

				@foreach ($arrLoadWeight as $checkdata)
					@php
							$checked = '';
						if(in_array($checkdata, $arrChkList)) :
							$checked = 'checked';
						endif;
					@endphp

				<label class="m-checkbox">
					<input type="checkbox" name="load_weight_other[]" value="{{ $checkdata }}" {{ $checked }}>
						{{ $checkdata }}
					<span></span>
				</label>
			@endforeach

					{{-- <label class="m-checkbox">											
					{{ Form::checkbox('load_weight_other[]', 'Over-Weight') }} Over-Weight
					<span></span>
					</label>

					<label class="m-checkbox">
			
					{{ Form::checkbox('load_weight_other[]', 'Hazmat') }} Hazmat
					<span></span>
					</label> --}}

					
				</div>
			</div>	
			
		</div>

		<div class="form-group m-form__group row">
			<div class="col-lg-1">
			
				<label class="col-form-label">
					Pickup#:
				</label>
			</div>
			<div class="col-lg-3">											
					{!! Form::text('pickup', null, ['class' => 'form-control m-input','id'=>'pickup', 'placeholder'=>'Enter Pickup']) !!}
				
			</div>
			<div class="col-lg-1">
			
				<label class="col-form-label">
					Commodity:
				</label>
			</div>
			<div class="col-lg-3">											
					{!! Form::text('commodity', null, ['class' => 'form-control m-input','id'=>'commodity', 'placeholder'=>'Enter Commodity']) !!}
				
			</div>
			<div class="col-lg-1">
			
				<label class="col-form-label">
					No of Packages:
				</label>
			</div>
			<div class="col-lg-3">											
					{!! Form::text('no_of_packages', null, ['class' => 'form-control m-input','id'=>'no_of_packages', 'placeholder'=>'Enter No of Packages']) !!}
				
			</div>	
			
		</div>

		<div class="form-group m-form__group row">
			
			<div class="col-lg-3">
			<label>
					ETA:
			</label>											
					{!! Form::text('eta', null, ['class' => 'form-control m-input','id'=>'eta', 'placeholder'=>'ETA']) !!}
				
			</div>

			<div class="col-lg-3">
			<label>
					Release Date:
			</label>	
				<div class="input-group date" id="m_datepicker_3" data-date-format="yyyy-mm-dd" > 
                

                {!! Form::text('release_date', null, ['class' => 'form-control m-input','id'=>'release_date', 'placeholder'=>'Release Date']) !!}

                    <span class="input-group-addon">
                        <i class="la la-calendar"></i>
                    </span>
                </div>

			</div>

			<div class="col-lg-3">
			<label>
					Strong LFD:
			</label>											
					{!! Form::text('strong_lfd', null, ['class' => 'form-control m-input','id'=>'strong_lfd', 'placeholder'=>'Strong LFD']) !!}
				
			</div>
		
			<div class="col-lg-3">	
			<label>
					Perdlem LFD / Cut Off:
			</label>										
					{!! Form::text('perdlem_lfd', null, ['class' => 'form-control m-input','id'=>'perdlem_lfd', 'placeholder'=>'Perdlem LFD / Cut Off']) !!}
				
			</div>	
			
		</div>

		<div class="form-group m-form__group row">
			<div class="col-lg-1">
			
				<label class="col-form-label">
					Ship / Rail Line:
				</label>
			</div>

			<div class="col-lg-3">
													
					{{ Form::select('ship_rail_line', [
						'ACL' => 'ACL',
						'ANL-USL' =>'ANL-USL',
						'APL' =>'APL',
						'ATLANTIC CARGO' =>'ATLANTIC CARGO',
						'BERMUDA CONTAINER LINE' => 'BERMUDA CONTAINER LINE',
						'CCNI' => 'CCNI',
						'China Shipping Container Line' => 'China Shipping Container Line',
						'CMA/CGM' => 'CMA/CGM',
						'COSCO' => 'COSCO',
						'CSAV' => 'CSAV',
						'Elmskip USA' => 'Elmskip USA',
						'Evergreen Shipping Agency' => 'Evergreen Shipping Agency',
						'Galbong Pte' => 'Galbong Pte',
						'Hamburg Sud' => 'Hamburg Sud',
						'Hanjin' => 'Hanjin',
						'Hapag-Lloyd' => 'Hapag-Lloyd',
						'Horizon Lines (CSX)' => 'Horizon Lines (CSX)',
						'Horizon Lines Of Alaska' => 'Horizon Lines Of Alaska',
						'Hyundai' => 'Hyundai',
						'K-Line' => 'K-Line',
						'Maersk' => 'Maersk',
						'Maruba S.C.A' => 'Maruba S.C.A',
						'Mastson Navigation' => 'Mastson Navigation',
						'MOL America' => 'MOL America',
						'MSC (Mediterranean Shipping Company)' => 'MSC (Mediterranean Shipping Company)',
						'Nordana Line' => 'Nordana Line',
						'NYK Line(Nippon Yusen Kaisha)' => 'NYK Line(Nippon Yusen Kaisha)',
						'OOCL (USA) Inc.' => 'OOCL (USA) Inc.',
						'Pacer Stacktrain' => 'Pacer Stacktrain',
						'Pacific International Lines' => 'Pacific International Lines',
						'Safmarine' => 'Safmarine',
						'Sea Star Line' => 'Sea Star Line',
						'Senator Lines Gmbh' => 'Senator Lines Gmbh',
						'Somers Isles' => 'Somers Isles',
						'Swire Shipping (Indotrans)' => 'Swire Shipping (Indotrans)',
						'TransAtlantic' => 'TransAtlantic',
						'Turkon' => 'Turkon',
						'United Arab' => 'United Arab',
						'Wan Hai Lines' => 'Wan Hai Lines',
						'Yangming' => 'Yangming',
						'Zim America' => 'Zim America'

						],
					    null, 
						['class' => 'form-control m-input m-input--square'])   
					}}

				
			</div>

			<div class="col-lg-1">
			
				<label class="col-form-label">
					Vessel
				</label>
			</div>


			<div class="col-lg-3">								                                                
				{!! Form::text('vessel', null, ['class' => 'form-control m-input','id'=>'vessel', 'placeholder'=>'Enter Vessel']) !!}
			</div>
			<div class="col-lg-1">
			
				<label class="col-form-label">
					Voyage
				</label>
			</div>

			<div class="col-lg-3">
													
					{!! Form::text('voyage', null, ['class' => 'form-control m-input','id'=>'voyage', 'placeholder'=>'Enter Voyage']) !!}
				
			</div>
		</div>

		<div class="form-group m-form__group row">
			
		<div class="col-lg-4">
			<label>
					Sch. at:
			</label>	


			{{ Form::select('sch_at', 
				[
					   '1' => 'BNSF-BNSF- Oakland International Gateway,Oakland, CA',
					   '2' => 'OICT-Oakland International Container Terminal , Oakland, CA',
						'3' => 'PAO-Ports America Oakland, Oakland,CA',
						'4' => 'TRAPAC-TraPac, Oakland, CA',
						'5' => 'UPFS-UP- Ferro Street, Oakland, CA',
						'6' => 'UPMH-UP - Middle Harbor, Oakland, CA'
				],
			    null, 
				['class' => 'form-control m-input m-input--square'])   
			}}

			<label>
					Terminated. at:
			</label>	


			{{ Form::select('terminated_at', 
				[
					   '1' => 'BNSF-BNSF- Oakland International Gateway,Oakland, CA',
					   '2' => 'OICT-Oakland International Container Terminal , Oakland, CA',
						'3' => 'PAO-Ports America Oakland, Oakland,CA',
						'4' => 'TRAPAC-TraPac, Oakland, CA',
						'5' => 'UPFS-UP- Ferro Street, Oakland, CA',
						'6' => 'UPMH-UP - Middle Harbor, Oakland, CA'
				],
			    null, 
				['class' => 'form-control m-input m-input--square'])   
			}}


		</div>




			<div class="col-lg-6">
			<label>
					Sch. Date & Time: 
			</label>				

                <div class="input-group date" id="m_datetimepicker_5_2">
					{{ Form::text('sch_date', null, ['class'=>'form-control m-input', 'id'=>'sch_date', 'placeholder'=> 'Sch. Date & Time']) }}
					<span class="input-group-addon">
						<i class="la la-calendar glyphicon-th"></i>
					</span>
				</div>


                <label>
					Terminated Date & Time:
			</label>	

			<div class="input-group date" id="m_datetimepicker_5_3">
				{{ Form::text('ter_date', null, ['class'=>'form-control m-input', 'id'=>'ter_date', 'placeholder'=> 'Terminated Date & Time']) }}
				<span class="input-group-addon">
					<i class="la la-calendar glyphicon-th"></i>
				</span>
			</div>
		</div>

			
			
		</div>
		<div class="form-group m-form__group row">
			<div class="col-lg-1">
			
				<label class="col-form-label">
					Comments:
				</label>
			</div>

			<div class="col-lg-10" >
			{!! Form::textarea('basic_comments', null, ['class' => 'form-control m-input m-input','id'=>'basic_comments', 'size' => '50x3','placeholder'=>'Comments']) !!}
			</div>
		</div>
	</div>
	<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
		<div class="m-form__actions m-form__actions--solid">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-10">
					<button type="submit" class="btn btn-success">
						Submit
					</button>
					<button type="reset" class="btn btn-secondary">
						Cancel
					</button>
				</div>
			</div>
		</div>
	</div>
