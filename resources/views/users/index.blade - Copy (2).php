@extends('admin\layouts.backend')

@section('content')

                        <div class="m-content">
                              <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
                                   <div class="m-alert__icon">
                                        <i class="flaticon-exclamation m--font-brand"></i>
                                   </div>
                                   <div class="m-alert__text">
                                        The Metronic Datatable component supports initialization from HTML table. It also defines the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and paging performed in user browser(frontend).
                                   </div>
                              </div>
                              <div class="m-portlet m-portlet--mobile">
                                   <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                             <div class="m-portlet__head-title">
                                                  <h3 class="m-portlet__head-text">
                                                       User Administration
                                                  </h3>
                                             </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                             <ul class="m-portlet__nav">
                                                  <li class="m-portlet__nav-item">
                                                       <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                                            <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                                                 <i class="la la-ellipsis-h m--font-brand"></i>
                                                            </a>
                                                            <div class="m-dropdown__wrapper">
                                                                 <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                                 <div class="m-dropdown__inner">
                                                                      <div class="m-dropdown__body">
                                                                           <div class="m-dropdown__content">
                                                                                <ul class="m-nav">
                                                                                     <li class="m-nav__section m-nav__section--first">
                                                                                          <span class="m-nav__section-text">
                                                                                               Quick Actions
                                                                                          </span>
                                                                                     </li>
                                                                                     <li class="m-nav__item">
                                                                                          <a href="" class="m-nav__link">
                                                                                               <i class="m-nav__link-icon flaticon-share"></i>
                                                                                               <span class="m-nav__link-text">
                                                                                                    Create Post
                                                                                               </span>
                                                                                          </a>
                                                                                     </li>
                                                                                     <li class="m-nav__item">
                                                                                          <a href="" class="m-nav__link">
                                                                                               <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                                               <span class="m-nav__link-text">
                                                                                                    Send Messages
                                                                                               </span>
                                                                                          </a>
                                                                                     </li>
                                                                                     <li class="m-nav__item">
                                                                                          <a href="" class="m-nav__link">
                                                                                               <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                                               <span class="m-nav__link-text">
                                                                                                    Upload File
                                                                                               </span>
                                                                                          </a>
                                                                                     </li>
                                                                                     <li class="m-nav__section">
                                                                                          <span class="m-nav__section-text">
                                                                                               Useful Links
                                                                                          </span>
                                                                                     </li>
                                                                                     <li class="m-nav__item">
                                                                                          <a href="" class="m-nav__link">
                                                                                               <i class="m-nav__link-icon flaticon-info"></i>
                                                                                               <span class="m-nav__link-text">
                                                                                                    FAQ
                                                                                               </span>
                                                                                          </a>
                                                                                     </li>
                                                                                     <li class="m-nav__item">
                                                                                          <a href="" class="m-nav__link">
                                                                                               <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                                               <span class="m-nav__link-text">
                                                                                                    Support
                                                                                               </span>
                                                                                          </a>
                                                                                     </li>
                                                                                     <li class="m-nav__separator m-nav__separator--fit m--hide"></li>
                                                                                     <li class="m-nav__item m--hide">
                                                                                          <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
                                                                                               Submit
                                                                                          </a>
                                                                                     </li>
                                                                                </ul>
                                                                           </div>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </li>
                                             </ul>
                                        </div>
                                   </div>
                                   <div class="m-portlet__body">
                                        <!--begin: Search Form -->
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                             <div class="row align-items-center">
                                                  <div class="col-xl-8 order-2 order-xl-1">
                                                       <div class="form-group m-form__group row align-items-center">
                                                            <div class="col-md-4">
                                                                 <div class="m-input-icon m-input-icon--left">
                                                                      <input class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch" type="text">
                                                                      <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                           <span>
                                                                                <i class="la la-search"></i>
                                                                           </span>
                                                                      </span>
                                                                 </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                                  <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                       <a href="{{ route('users.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                                            <span>
                                                                 <i class="la la-cart-plus"></i>
                                                                 <span>
                                                                      Add User
                                                                 </span>
                                                            </span>
                                                       </a>
                                                       <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                  </div>
                                             </div>
                                        </div>
                                        <!--end: Search Form -->
          <!--begin: Datatable -->
                                        <div class="m-datatable m-datatable--default m-datatable--brand m-datatable--loaded">
                                             <table id="m-datatable--1283290216543" style="display: block; position: static; height: auto; overflow-x: auto;" class="m-datatable__table" width="100%">
                                             <thead class="m-datatable__head">
                                                  <tr class="m-datatable__row" style="height: 53px;">
                                                       <th title="Field #1" class="m-datatable__cell m-datatable__cell--sort" data-field="
                                                            Name
                                                       "><span style="width: 130px;">
                                                           Name
                                                       </span></th>
                                                       <th title="Field #2" class="m-datatable__cell m-datatable__cell--sort" data-field="
                                                           Email
                                                       "><span style="width: 130px;">
                                                           Email
                                                       </span></th>
                                                       <th title="Field #3" class="m-datatable__cell m-datatable__cell--sort" data-field="
                                                           Date/Time Added
                                                       "><span style="width: 130px;">
                                                            Date/Time Added
                                                       </span></th>
                                                       <th title="Field #4" class="m-datatable__cell m-datatable__cell--sort" data-field="
                                                           User Roles
                                                       "><span style="width: 130px;">
                                                           User Roles
                                                       </span></th>
                                                       <th title="Field #5" class="m-datatable__cell m-datatable__cell--sort" data-field="
                                                            Operations
                                                       "><span style="width: 130px;">
                                                            Operations
                                                       </span></th>

                                                  </tr>
                                             </thead>
                                             <tbody class="m-datatable__body" style="">
    @foreach ($users as $user)
                                                  <tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 43px;">

                                                       <td data-field="Order ID" class="m-datatable__cell"><span style="width: 130px;">
                                                           {{ $user->name }}
                                                       </span></td>

                                                       <td data-field="
                                                            Owner
                                                       " class="m-datatable__cell"><span style="width: 130px;">
                                                           {{ $user->email }}
                                                       </span></td>


                                                         <td data-field="
                                                            Owner
                                                       " class="m-datatable__cell"><span style="width: 130px;">
                                                          {{ $user->created_at->format('F d, Y h:ia') }}
                                                       </span></td>


                                                       <td data-field="
                                                            Contact
                                                       " class="m-datatable__cell"><span style="width: 130px;">
                                                         

                                                           {{ $user->rolevalue }}
                                                       </span></td>

                                                       <td data-field="
                                                            Car Make
                                                       " class="m-datatable__cell"><span style="width: 130px;">
                                                           <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                                                       </span></td>

                                                       

                                                      

                                                  </tr>

                                                   @endforeach
                                                     </tbody>
                                        </table>

                                        <div class="m-datatable__pager m-datatable--paging-loaded clearfix">

                                             <ul class="m-datatable__pager-nav">
                                                  <li><a title="First" class="m-datatable__pager-link m-datatable__pager-link--first m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-double-left"></i></a></li>
                                                  <li><a title="Previous" class="m-datatable__pager-link m-datatable__pager-link--prev m-datatable__pager-link--disabled" data-page="1" disabled="disabled"><i class="la la-angle-left"></i></a></li>
                                                  <li style="display: none;"><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-prev" data-page="1"><i class="la la-ellipsis-h"></i></a></li>
                                                  <li style="display: none;"><input class="m-pager-input form-control" title="Page number" type="text"></li>
                                                  <li><a class="m-datatable__pager-link m-datatable__pager-link-number m-datatable__pager-link--active" data-page="1" title="1">1</a></li>
                                                  <li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="2" title="2">2</a></li>
                                                  <li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="3" title="3">3</a></li>
                                                  <li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="4" title="4">4</a></li>
                                                  <li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="5" title="5">5</a></li>
                                                  <li><a class="m-datatable__pager-link m-datatable__pager-link-number" data-page="6" title="6">6</a></li>
                                                  <li><a title="More pages" class="m-datatable__pager-link m-datatable__pager-link--more-next" data-page="7"><i class="la la-ellipsis-h"></i></a></li>
                                                  <li><a title="Next" class="m-datatable__pager-link m-datatable__pager-link--next" data-page="2"><i class="la la-angle-right"></i></a></li>
                                                  <li><a title="Last" class="m-datatable__pager-link m-datatable__pager-link--last" data-page="15"><i class="la la-angle-double-right"></i></a></li>

                                             </ul>




                                        <!--end: Datatable -->
                                   </div>
                              </div>
                         </div>

                          </div>
@endsection
