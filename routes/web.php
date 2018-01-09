<?php


use App\Model\User;
	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

	

	Route::get('/', function(){
		return view('auth.login');
	});

	Route::get('/test', function(){
		$pathToFile = "http://localhost/tms/";
		return response()->download($pathToFile);

	});
	

	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/users', [ 'as' => '.users', 'uses' => 'UsersController@index']);
		
	Route::group( ['middleware' => ['auth']], function() {

		Route::get('/', 'DashboardController@index');

		/*  User Role route */
		Route::get('/dashboard', 'DashboardController@index');
	    Route::resource('/users', 'UsersController');
	    Route::resource('/roles', 'RolesController');

	    /* truck Route */

		Route::get('/trucks', 'TruckController@index');
		Route::get('/trucks/basic_info/{id?}', 'TruckController@basicInfo');
		Route::post('/trucks/basic_info', [
		    'as' => 'truck.basicinfo', 'uses' => 'TruckController@addBasicInfo'
		]);

		Route::get('/trucks/edit_basic_info/{id?}', 'TruckController@editBasicInfo');
		Route::post('/trucks/edit_basic_info/{id?}', [
		    'as' => 'truck.updateBasicInfo', 'uses' => 'TruckController@updateBasicInfo'
		]);

		Route::get('/trucks/other_detail', 'TruckController@otherDetail');
		Route::post('/trucks/other_detail', [
		    'as' => 'truck.otherDetail', 'uses' => 'TruckController@addOtherDetail'
		]);

		Route::get('/trucks/edit_other_detail/{id?}', 'TruckController@editOtherDetail');
		Route::post('/trucks/edit_other_detail/{id?}', [
		    'as' => 'truck.updateOtherDetail', 'uses' => 'TruckController@updateOtherDetail'
		]);

		Route::get('/trucks/ap_deduction', 'TruckController@apDeduction');
		Route::post('/trucks/ap_deduction', [ 'as' => 'truck.apDeduction', 'uses' => 'TruckController@saveApDeduction' ]);

		Route::get('/trucks/edit_ap_deduction/{id?}', 'TruckController@editApDeduction');
		Route::post('/trucks/edit_ap_deduction/{id?}', [ 'as' => 'truck.updateApDeduction', 'uses' => 'TruckController@updateApDeduction' ]);

		Route::post('/trucks/add_owner', [
		    'as' => 'truck.addOwner', 'uses' => 'TruckController@addOwner'
		]);
		Route::post('/trucks/one_time_deductions', ['as' => 'truck.onetimedeductions', 'uses' => 'TruckController@oneTimeDeductions']);
		Route::post('/trucks/update_one_time_deductions', ['as' => 'truck.updateOnetimedeductions', 'uses' => 'TruckController@updateOnetimedeductions']);

		Route::get('/trucks', 'TruckController@index');
		Route::get('/trucks/upload_documents', 'TruckController@uploadDocuments');
		Route::post('/trucks/upload_documents', ['as' => 'truck.saveDocuments', 'uses' => 'TruckController@saveDocuments']);
		Route::delete('/trucks/upload_documents/{id?}', ['as' => 'truck.deleteDocument', 'uses' => 'TruckController@deleteDocument']);

		Route::post('/trucks/status_truck', ['as' => 'truck.statusTruck', 'uses' => 'TruckController@statusTruck']);


		/* Driver Route */

		Route::get('/driver', 'DriverController@index');
		Route::get('/driver/basicinfo', 'DriverController@create');
		Route::post('/driver/basicinfo', ['as'=> 'driver.basicinfo', 'uses'=>'DriverController@savebasicinfo']);

		Route::get('/driver/edit_basicinfo/{id?}', 'DriverController@editBasicInfo');
		Route::post('/driver/edit_basicinfo/{id?}', [
		    'as' => 'driver.updateBasicInfo', 'uses' => 'DriverController@updateBasicInfo'
		]);

		Route::get('/driver/licenceinfo', 'DriverController@showlicenceinfo');
		Route::post('/driver/licenceinfo', ['as'=> 'driver.createlicence', 'uses'=>'DriverController@savelicenceinfo']);


		Route::get('/driver/edit_licenceinfo/{id?}', 'DriverController@editLicenceInfo');
		Route::post('/driver/edit_licenceinfo/{id?}', [
		    'as' => 'driver.updateLicenceInfo', 'uses' => 'DriverController@updateLicenceInfo'
		]);

		Route::get('/driver/uploaddocuments', 'DriverController@showuploaddocuments');
		Route::post('/driver/uploaddocuments', [ 'as' => 'driver.uploaddocuments' , 'uses'=>'DriverController@saveuploaddocuments']);
		Route::delete('/driver/uploaddocuments/{id?}', ['as' => 'driver.deleteDocument', 'uses' => 'DriverController@deleteDocument']);

		Route::get('/driver/checklist','DriverController@showchecklist');
		Route::post('/driver/checklist', ['as'=> 'driver.checklist', 'uses'=>'DriverController@savechecklist']);

		Route::get('/driver/edit_checklist/{id?}','DriverController@editChecklist');
		Route::post('/driver/edit_checklist/{id?}', ['as'=> 'driver.updateChecklist', 'uses'=>'DriverController@updateChecklist']);

		Route::get('/driver/formw9','DriverController@showformw9');
		Route::post('/driver/formw9', ['as'=> 'driver.formw9', 'uses'=>'DriverController@saveformw9']);

		Route::get('/driver/edit_formw9/{id?}','DriverController@editFormw9');
		Route::post('/driver/edit_formw9/{id?}', ['as'=> 'driver.updateFormw9', 'uses'=>'DriverController@updateFormw9']);

		Route::post('/driver/status_truck', ['as' => 'driver.statusDriver', 'uses' => 'DriverController@statusDriver']);
		Route::get('/driver/add_driverlogin/{id?}', 'DriverController@addDriverLogin');
				
		Route::post('/driver/add_driverlogin/{id?}', [
		'as' => 'driver.add_driverlogin', 'uses' => 'DriverController@storeDriverLogin'
		]);

		Route::get('/driver/edit_driverlogin/{id?}/{did?}', 'DriverController@editDriverLogin');

		Route::post('/driver/edit_driverlogin/{id?}', [
		'as' => 'driver.edit_driverlogin', 'uses' => 'DriverController@updateDriverLogin'
		]);

		
		/* Customer Route */

		Route::get('/customer', 'CustomerController@index');

	 	Route::get('/customer/basicinfo', 'CustomerController@basicInfo');
	 	Route::post('/customer/basicinfo', ['as' => 'customer.saveBasicInfo', 'uses'=>'CustomerController@saveBasicInfo']);


	 	Route::get('/customer/edit_basicinfo/{id?}', 'CustomerController@editBasicInfo');
		Route::post('/customer/edit_basicinfo/{id?}', [
		    'as' => 'customer.updateBasicInfo', 'uses' => 'CustomerController@updateBasicInfo'
		]);

		Route::get( '/customer/address_contact' , 'CustomerController@addressContact' );
		Route::post( '/customer/address_contact' , [ 'as' =>'customer.saveAddressContact', 'uses'=>'CustomerController@saveAddressContact'] );

		Route::get('/customer/edit_address_contact/{id?}', 'CustomerController@editAddressContact');
		Route::post('/customer/edit_address_contact/{id?}', [
		    'as' => 'customer.updateAddressContact', 'uses' => 'CustomerController@updateAddressContact'
		]);
	
		Route::get( '/customer/billing_details' , 'CustomerController@billingDetails' );
		Route::post( '/customer/billing_details' , [ 'as'=>'customer.saveBillingDetail', 'uses'=>'CustomerController@saveBillingDetail'] );
		Route::post( '/customer/billing_other_details' , [ 'as'=>'customer.billingOtherDetail', 'uses'=>'CustomerController@saveBillingOtherDetail'] );

		Route::get('/customer/edit_billing_details/{id?}', 'CustomerController@editBillingDetails');
		Route::post('/customer/edit_billing_details/{id?}', [
		    'as' => 'customer.updateBillingDetails', 'uses' => 'CustomerController@updateBillingDetails'
		]);
		Route::post('/customer/edit_billing_other_details/{id?}', [
		    'as' => 'customer.updateBillingOtherDetails', 'uses' => 'CustomerController@updateBillingOtherDetails'
		]);

	
		Route::get( '/customer/customer_imaging' , 'CustomerController@customerImaging' );
		Route::post('/customer/customer_imaging', [ 'as' => 'customer.uploaddocuments' , 'uses'=>'CustomerController@saveUploadDocuments']);
		Route::delete('/customer/customer_imaging/{id?}', ['as' => 'customer.deleteDocument', 'uses' => 'CustomerController@deleteDocument']);	
		
		Route::post('/customer/status_customer', ['as' => 'customer.statusCustomer', 'uses' => 'CustomerController@statusCustomer']);

		Route::get('/customer/get_address_detail',  'CustomerController@getCustomAjaxDetail');
		Route::post('/customer/get_address_detail', 'CustomerController@getCustomAjaxDetail');

		Route::get('/customer/set_customer_email',  'CustomerController@getSetupCustomerEmail');
		Route::post('/customer/set_customer_email', ['as' => 'customer.saveSetupCustomerEmail', 'uses'=>'CustomerController@saveSetupCustomerEmail']);

		Route::get('/customer/edit_set_customer_email/{id?}',  'CustomerController@getUpdateSetupCustomerEmail');
		Route::post('/customer/edit_set_customer_email/{id?}', ['as' => 'customer.updateSetupCustomerEmail', 'uses'=>'CustomerController@updateSetupCustomerEmail']);


		/* Order Route */		
		Route::get('/order', 'OrderController@index');

       	 Route::get('/order/basicinfo', 'OrderController@basicInfo');
      	 Route::post('/order/basicinfo', ['as'=> 'order.basicinfo', 'uses'=>'OrderController@savebasicinfo']);

       Route::get('/order/edit_basicinfo/{id?}', 'OrderController@editBasicInfo');
       Route::post('/order/edit_basicinfo/{id?}', ['as'=> 'order.updateBasicinfo', 'uses'=>'OrderController@updatebasicinfo']);

       Route::get('/order/searchCustomerAjax', ['as'=>'order.searchCustomerAjax','uses'=>'OrderController@searchCustomerResponse']);

        Route::get('/order/location', 'OrderController@showlocationform');
       Route::post('/order/location', ['as'=> 'order.location' ,'uses'=>'OrderController@saveLocation']);

       Route::get('/order/charge', 'OrderController@showchargeform');
       Route::post('/order/charge', ['as'=> 'order.charge' ,'uses'=>'OrderController@saveCharge']);

          Route::get('/order/trip', 'OrderController@showtripsform');
       	Route::post('/order/trip', ['as'=> 'orders.trips' ,'uses'=>'OrderController@savetrips']);
          Route::post('/order/get_deliver_location', 'OrderController@getDeliverLocation');
          Route::post('/order/get_truck_by_driver', 'OrderController@getTruckByDriver');
          Route::post('/order/get_order_trip_detail', 'OrderController@getOrderTripDetail');
          Route::post('/order/save_trip_order_data', 'OrderController@saveTripOrderData');
          Route::delete('/order/delete_order_trip_details/{id}', 'OrderController@delOrderTripDetl');

          	Route::get('/order/dispatch/{id?}', 'OrderController@checkdispatch'); 
       
	        Route::post('/order/dispatchsave', 'OrderController@dispatchSave');
			
			Route::get('/order/complete/{id?}', 'OrderController@checkcomplete'); 
	       
	        Route::post('/order/completesave', 'OrderController@completedSave');


	       	Route::post('/order/get_deliver_location', 'OrderController@getDeliverLocation'); 

	       	Route::post('/order/get_truck_by_driver', 'OrderController@getTruckByDriver');

	       	Route::get('/order/completedlist', 'OrderController@completedlist');

	       	Route::get('/order/dispatchedlist', 'OrderController@dispatchedlist');

			Route::resource('/yards', 'YardController');
// billing
			Route::get('/billing', "BillingController@index");
			Route::post('/billing', [ "as" => "billing.orderReady" , "uses"=>"BillingController@orderReady"]);
			Route::get('/billing/download/{id?}', "BillingController@download");


	});