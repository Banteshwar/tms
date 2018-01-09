@php
	$truckEditId = (session()->get('truck_edit_id')) ?? '';
	$edit = !empty($truckEditId) ? 'edit_' : '';
@endphp

<div  id="m_ver_menu"  class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 	data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500" >
	<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">			
		<li class="m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			<a  href="#" class="m-menu__link m-menu__toggle">
				<i class="m-menu__link-icon flaticon-interface-7"></i>
				<span class="m-menu__link-text">
					Admin
				</span>
				<i class="m-menu__ver-arrow la la-angle-right"></i>
			</a>
			<div class="m-menu__submenu">
				<span class="m-menu__arrow"></span>
				<ul class="m-menu__subnav">
					<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
						<a  href="#" class="m-menu__link ">
							<span class="m-menu__link-text">
								Forms
							</span>
						</a>
					</li>
					
					<li class="m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="#" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Trucks
							</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/trucks')}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Trucks List
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a href="{{ url('/trucks/'.$edit.'basic_info/' . $truckEditId) }}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">	
											Basic Info
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/trucks/'.$edit.'other_detail/'. $truckEditId)}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Other Detail
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/trucks/'.$edit.'ap_deduction/'. $truckEditId)}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Ap Deductions
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/trucks/upload_documents')}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Imaging
										</span>
									</a>
								</li>									
							</ul>
						</div>
					</li>

					<li class="m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded" aria-haspopup="true"  data-menu-submenu-toggle="hover">
						<a  href="#" class="m-menu__link m-menu__toggle">
							<i class="m-menu__link-bullet m-menu__link-bullet--dot">
								<span></span>
							</i>
							<span class="m-menu__link-text">
								Drivers
							</span>
							<i class="m-menu__ver-arrow la la-angle-right"></i>
						</a>
						<div class="m-menu__submenu">
							<span class="m-menu__arrow"></span>
							<ul class="m-menu__subnav">
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/driver')}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Driver List
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a href="{{ url('/trucks/'.$edit.'basic_info/' . $truckEditId) }}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">	
											Basic Info
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/trucks/'.$edit.'other_detail/'. $truckEditId)}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Other Detail
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/trucks/'.$edit.'ap_deduction/'. $truckEditId)}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Ap Deductions
										</span>
									</a>
								</li>
								<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
									<a  href="{{url('/trucks/upload_documents')}}" class="m-menu__link ">
										<i class="m-menu__link-bullet m-menu__link-bullet--dot">
											<span></span>
										</i>
										<span class="m-menu__link-text">
											Imaging
										</span>
									</a>
								</li>									
							</ul>
						</div>
					</li>


				</ul>
			</div>
		</li>
	</ul>
</div>