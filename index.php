

<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	// Redirect the user to login page if he is not logged in.
	if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}
	
	require_once('inc/config/constants.php');
	require_once('inc/config/db.php');
	require_once('inc/header.html');

	$fetchTopicSql = "Select * from topics"	;		
	$temp = $conn->prepare($fetchTopicSql);
	$temp->execute();
	$topics = $temp->fetchAll();
	if($topics){
		$count = $temp->rowCount();
		// echo "<script>alert('$count')</script>";
	} else {
		echo "<script>alert('no topics found ')</script>";
	}


	$fetchAuthorSql = "select * from authors";
	$temp1 = $conn->prepare($fetchAuthorSql);
	$temp1->execute();
	$authors = $temp1->fetchAll();
	if($authors){
		$count = $temp1->rowCount();
		// echo "<script>alert('$count')</script>";
		// foreach($authors as $row){
		// 	$author = $row['auth_fname'] . " " . $row['auth_lname'] ;
		// 	echo "<script>alert('$author')</script>";

		// }
	} 
	else {
		echo "<script>alert('no authors found ')</script>";
	}

	$fetchbNameSql = "Select * from books"	;		
	$temp2 = $conn->prepare($fetchbNameSql);
	$temp2->execute();
	$books = $temp2->fetchAll();
	if($books){
		$count = $temp2->rowCount();
		// echo "<script>alert('$count')</script>";
	} else {
		echo "<script>alert('no books found ')</script>";
	}
	
	$fetchCustomerSql = "select * from customers";
	$temp3 = $conn->prepare($fetchCustomerSql);
	$temp3->execute();
	$customers = $temp3->fetchAll();
	if($customers){
		$count = $temp3->rowCount();
	} 
	else {
		echo "<script>alert('no customers found ')</script>";
	}
	
?>


<body>
<?php
	require 'inc/navigation.php';
?>
    <!-- Page Content -->
    <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-2">
		<h1 class="my-4"></h1>
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link active" id="v-pills-item-tab" data-toggle="pill" href="#v-pills-item" role="tab" aria-controls="v-pills-item" aria-selected="true">Books</a>
			  <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#v-pills-purchase" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Rentals</a>
			  <a class="nav-link" id="v-pills-invoice-tab" data-toggle="pill" href="#v-pills-invoice" role="tab" aria-controls="v-pills-invoice" aria-selected="false">Invoices</a>
			  <a class="nav-link" id="v-pills-sale-tab" data-toggle="pill" href="#v-pills-sale" role="tab" aria-controls="v-pills-sale" aria-selected="false">Payments</a>
			  <a class="nav-link" id="v-pills-vendor-tab" data-toggle="pill" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Authors</a>
			  <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">Customers</a>
			  <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="false">Search</a>
			  <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
			  <a class="nav-link" id="v-pills-datareports-tab" data-toggle="pill" href="#v-pills-datareports" role="tab" aria-controls="v-pills-datareports" aria-selected="false">Data Analysis</a>
			</div>
		</div>
		 <div class="col-lg-10">
			<div class="tab-content" id="v-pills-tabContent">
			  <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Book Details</div>
				  <div class="card-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#itemDetailsTab">Book</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#itemImageTab">Upload Image</a>
						</li>
					</ul>
					
					<!-- Tab panes for item details and image sections -->
					<div class="tab-content">
						<div id="itemDetailsTab" class="container-fluid tab-pane active">
							<br>
							<!-- Div to show the ajax message from validations/db submission -->
							<div id="itemDetailsMessage"></div>
							<form>
							  <div class="form-row">
								<div class="form-group col-md-3" style="display:inline-block">
								  <label for="bookDetailsbookId">Book Number<span class="requiredIcon">*</span></label>
								  <input type="text" class="form-control" name="bookDetailsbookId" id="bookDetailsbookId" autocomplete="off">
								  <div id="bookDetailsbookIdSuggestionsDiv" class="customListDivWidth"></div>
								</div>
								
							  </div>
							  <div class="form-row">
								  <div class="form-group col-md-6">
									<label for="bookDetailsbookName">Book Name<span class="requiredIcon">*</span></label>
									<input type="text" class="form-control" name="bookDetailsbookName" id="bookDetailsbookName" autocomplete="off">
									<div id="bookDetailsbookNameSuggestionsDiv" class="customListDivWidth"></div>
								  </div>
								</div>
								<div class="form-row">
								  <div class="form-group col-md-4">
									<label for="bookDetailsStatus">Status</label>
									<select id="bookDetailsStatus" name="bookDetailsStatus" class="form-control chosenSelect">
									<?php include('inc/statusList.html'); ?>
									</select>
								  </div>
									<div class="form-group col-md-4">
										<label for="bookTopic">Topic</label>
										<select id="bookTopic" name="bookTopic" class="form-control chosenSelect">
											<?php foreach($topics as $row):?>
												<option value="<?php echo $row['topic_id'];?>">
													<?php echo $row["topic_desc"];?>
												</option>
											<?php endforeach;?>
										</select>
								    </div>
									<div class="form-group col-md-4">
										<label for="bookAuthor">Author</label>
										<select id="bookAuthor" name="bookAuthor" class="form-control chosenSelect">
											<?php foreach($authors as $row):?>
												<option value="<?php echo $row['author_id'];?>">
													<?php echo $row["auth_fname"] . " ". $row["auth_lname"];?>
												</option>
											<?php endforeach;?>
										</select>
								    </div>
								</div>
							  <div class="form-row">
								<div class="form-group col-md-6" style="display:inline-block">
								  <!-- <label for="itemDetailsDescription">Description</label> -->
								  <textarea rows="4" class="form-control" placeholder="Description" name="bookDetailsDescription" id="bookDetailsDescription"></textarea>
								</div>
							  </div>
							  <div class="form-row">
								
								<div class="form-group col-md-3">
									<div id="imageContainer"></div>
								</div>
							  </div>
							  <button type="button" id="addBook" class="btn btn-success">Add Item</button>
							  <button type="button" id="updateBookDetailsButton" class="btn btn-primary">Update</button>
							  <button type="button" id="deleteItem" class="btn btn-danger">Delete</button>
							  <button type="reset" class="btn" id="itemClear">Clear</button>
							</form>
						</div>
						<div id="itemImageTab" class="container-fluid tab-pane fade">
							<br>
							<div id="itemImageMessage"></div>
							<p>You can upload an image for a particular item using this section.</p> 
							<p>Please make sure the item is already added to database before uploading the image.</p>
							<br>							
							<form name="imageForm" id="imageForm" method="post">
							  <div class="form-row">
								<div class="form-group col-md-3" style="display:inline-block">
								  <label for="itemImageItemNumber">Book Number<span class="requiredIcon">*</span></label>
								  <input type="text" class="form-control" name="itemImageItemNumber" id="itemImageItemNumber" autocomplete="off">
								  <div id="itemImageItemNumberSuggestionsDiv" class="customListDivWidth"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="itemImageItemName">Book Name</label>
									<input type="text" class="form-control" name="itemImageItemName" id="itemImageItemName" readonly>
								</div>
							  </div>
							  <br>
							  <div class="form-row">
								  <div class="form-group col-md-7">
									<label for="itemImageFile">Select Image ( <span class="blueText">jpg</span>, <span class="blueText">jpeg</span>, <span class="blueText">gif</span>, <span class="blueText">png</span> only )</label>
									<input type="file" class="form-control-file btn btn-dark" id="itemImageFile" name="itemImageFile">
								  </div>
							  </div>
							  <br>
							  <button type="button" id="updateImageButton" class="btn btn-primary">Upload Image</button>
							  <button type="button" id="deleteImageButton" class="btn btn-danger">Delete Image</button>
							  <button type="reset" class="btn">Clear</button>
							</form>
						</div>
						<div id="itemImageTab" class="container-fluid tab-pane fade">
							<br>
							<div id="itemImageMessage"></div>
							<p>You can upload an image for a particular item using this section.</p> 
							<p>Please make sure the item is already added to database before uploading the image.</p>
							<br>							
							<form name="imageForm" id="imageForm" method="post">
							  <div class="form-row">
								<div class="form-group col-md-3" style="display:inline-block">
								  <label for="itemImageItemNumber">Book Number<span class="requiredIcon">*</span></label>
								  <input type="text" class="form-control" name="itemImageItemNumber" id="itemImageItemNumber" autocomplete="off">
								  <div id="itemImageItemNumberSuggestionsDiv" class="customListDivWidth"></div>
								</div>
								<div class="form-group col-md-4">
									<label for="itemImageItemName">Book Name</label>
									<input type="text" class="form-control" name="itemImageItemName" id="itemImageItemName" readonly>
								</div>
							  </div>
							  <br>
							  <div class="form-row">
								  <div class="form-group col-md-7">
									<label for="itemImageFile">Select Image ( <span class="blueText">jpg</span>, <span class="blueText">jpeg</span>, <span class="blueText">gif</span>, <span class="blueText">png</span> only )</label>
									<input type="file" class="form-control-file btn btn-dark" id="itemImageFile" name="itemImageFile">
								  </div>
							  </div>
							  <br>
							  <button type="button" id="updateImageButton" class="btn btn-primary">Upload Image</button>
							  <button type="button" id="deleteImageButton" class="btn btn-danger">Delete Image</button>
							  <button type="reset" class="btn">Clear</button>
							</form>
						</div>
					</div>
				  </div> 
				</div>
			  </div>
			<div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Rental Details</div>
				  <div class="card-body">
					<div id="purchaseDetailsMessage"></div>
					<form>
					  <div class="form-row">
						<div class="form-group col-md-3">
							<label for="purchaseDetailsCustName">Customer Name</label>
							<select id="purchaseDetailsCustId" name="purchaseDetailsCustName" class="form-control chosenSelect">
								<?php foreach($customers as $row):?>
									<option value="<?php echo $row['cust_id'];?>">
										<?php echo $row["cust_fname"] . " ". $row["cust_lname"];?>
									</option>
								<?php endforeach;?>
							</select>
						</div>
						
						<div class="form-group col-md-3">
						  <label for="purchaseDetailsPurchaseDate">Purchase Date<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control datepicker" id="purchaseDetailsPurchaseDate" name="purchaseDetailsPurchaseDate" readonly value="2018-05-24">
						</div>
											
						<div class="form-group col-md-3">
							<label for="purchaseDetailsBookName">Book Name</label>
							<select id="purchaseDetailsBookId" name="purchaseDetailsBookName" class="form-control chosenSelect">
								<?php foreach($books as $row):?>
									<option value="<?php echo $row['book_id'];?>">
										<?php echo $row["book_name"];?>
									</option>
								<?php endforeach;?>
							</select>
						</div>
						
					  </div> 
					 					  
					  <div class="form-row">
						<div class="form-group col-md-3">
						  <label for="purchaseDetailsExpectedReturnDate">Expected Return Date<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control datepicker" id="purchaseDetailsExpectedReturnDate" name="purchaseDetailsExpectedReturnDate" readonly value="2018-05-24">
						</div>
						<div class="form-group col-md-3">
						  <label for="purchaseDetailsActualReturnDate">Actual Return Date<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control datepicker" id="purchaseDetailsActualReturnDate" name="purchaseDetailsActualReturnDate" readonly value="2018-05-24">
						</div>
						 <div class="form-group col-md-3">
									<label for="purchaseDetailsStatus">Status</label>
									<select id="purchaseDetailsStatus" name="purchaseDetailsStatus" class="form-control chosenSelect">
									<?php include('inc/statusList1.html'); ?>
									</select>
								  </div>
						
					  </div>
					  <button type="button" id="addPurchase" class="btn btn-success">Add Rental</button>
					  <button type="button" id="updatePurchaseDetailsButton" class="btn btn-primary">Update</button>
					  <button type="reset" class="btn">Clear</button>
					</form>
				  </div> 
				</div>
			  </div>
			  
			  <div class="tab-pane fade" id="v-pills-vendor" role="tabpanel" aria-labelledby="v-pills-vendor-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Author's Details</div>
				  <div class="card-body">
				  <!-- Div to show the ajax message from validations/db submission -->
				  <div id="vendorDetailsMessage"></div>
					 <form> 
					  <div class="form-row">
					  
						</div>
						<div class="form-row">
						<div class="form-group col-md-6">
						  <label for="vendorDetailsVendorFirstName">Author's First Name<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="vendorDetailsVendorFirstName" name="vendorDetailsVendorFirstName" placeholder="">
						</div>
						<div class="form-group col-md-6">
						  <label for="vendorDetailsVendorLastName">Author's Last Name<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="vendorDetailsVendorLastName" name="vendorDetailsVendorLastName" placeholder="">
						</div>
						
					  </div>
					  
					   <div class="form-group">
						<label for="vendorDetailsVendorAddress">Address: Flat Number<span class="requiredIcon">*</span></label>
						<input type="text" class="form-control" id="vendorDetailsVendorAddress" name="vendorDetailsVendorAddress">
					  </div>
					  <div class="form-group">
						<label for="vendorDetailsVendorAddress2">Street Address (Line 2)</label>
						<input type="text" class="form-control" id="vendorDetailsVendorAddress2" name="vendorDetailsVendorAddress2">
					  </div>
					  <div class="form-row">
						<div class="form-group col-md-6">
						  <label for="vendorDetailsVendorCity">City<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="vendorDetailsVendorCity" name="vendorDetailsVendorCity">
						</div>
						<div class="form-group col-md-4">
						  <label for="vendorDetailsVendorDistrict">State<span class="requiredIcon">*</span></label>
						  <select id="vendorDetailsVendorDistrict" name="vendorDetailsVendorDistrict" class="form-control chosenSelect">
							<?php include('inc/districtList.html'); ?>
						  </select>
						</div>
						<div class="form-group col-md-6">
						  <label for="vendorDetailsVendorCity">Zipcode<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="vendorDetailsVendorCity" name="vendorDetailsVendorCity">
						</div>
					  </div>
					  
					  <div class="form-row">
						  					  
						<div class="form-group col-md-6">
							<label for="vendorDetailsVendorEmail">Author's Email</label>
							<input type="email" class="form-control" id="vendorDetailsVendorEmail" name="vendorDetailsVendorEmail">
						</div>
					  </div>
					  <button type="button" id="addVendor" name="addVendor" class="btn btn-success">Add Author</button>
					  <button type="button" id="updateVendorDetailsButton" class="btn btn-primary">Update</button>
					  <button type="button" id="deleteVendorButton" class="btn btn-danger">Delete</button>
					  <button type="reset" class="btn">Clear</button>
					 </form>
				  </div> 
				</div>
			  </div>
			  
			  
			    <div class="tab-pane fade" id="v-pills-invoice" role="tabpanel" aria-labelledby="v-pills-invoice-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Invoice Details</div>
				  <div class="card-body">
					<div id="saleDetailsMessage"></div>
					<form>
					  <div class="form-row">

						<div class="form-group col-md-3">
							<label for="invoicecustName">Customer Name</label>
							<select id="invoicecustName" name="invoicecustName" class="form-control chosenSelect">
								<?php foreach($customers as $row):?>
									<option value="<?php echo $row['cust_id'];?>">
										<?php echo $row["cust_fname"] . " ". $row["cust_lname"];?>
									</option>
								<?php endforeach;?>
							</select>
						</div>			
									
						<!--<div class="form-group col-md-3">
							<label for="saleDetailsInvoiceID">Invoice ID<span class="requiredIcon">*</span></label>
							<input type="text" class="form-control" id="saleDetailsInvoiceID" name="saleDetailsInvoiceID" autocomplete="off">
							<div id="saleDetailsInvoiceIDSuggestionsDiv" class="InvoiceListDivWidth"></div>
						</div>-->
					
						
						
						</div>
					  
					  <button type="button" id="addinvoiceButton" class="btn btn-success" >Fetch Invoice</button>
					  <button type="reset" id="saleClear" class="btn">Clear</button>
					</form>
					
					
					
					
					
				  </div>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="invoiceSearchTab" class="container-fluid tab-pane active">
						  <br>
						  <p>Use the grid below to fetch all details of Invoices</p>
						 
							<div class="table-responsive" id="invoiceDetailsTableDiv"></div>
						</div>
						
					</div> 
					
				
				  
				</div>
			  </div>
			  
			  <div class="tab-pane fade" id="v-pills-datareports" role="tabpanel" aria-labelledby="v-pills-datareports-tab">
              				<div class="card card-outline-secondary my-4">
              				  <div class="card-header">Data Analysis</div>
              				  <div class="card-body">
              					<div id="datareportsDetailsMessage"></div>
              					<form>
              					  <div class="form-row">
              						<?php echo '<img src="image.png">'; ?>
              						<div class="form-group col-md-3">
              						</div>
              					  </div>
              					</form>
              				  </div>
              				</div>
              			  </div>
			  
			  
			  
			    
			  <div class="tab-pane fade" id="v-pills-sale" role="tabpanel" aria-labelledby="v-pills-sale-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Payment Details</div>
				  <div class="card-body">
					<div id="saleDetailsMessage"></div>
					<form>
					  <div class="form-row">
						
						<div class="form-group col-md-3">
							<label for="saleDetailsInvoiceID">Invoice ID<span class="requiredIcon">*</span></label>
							<input type="text" class="form-control" id="saleDetailsInvoiceID" name="saleDetailsInvoiceID" autocomplete="off">
							<div id="saleDetailsInvoiceIDSuggestionsDiv" class="InvoiceListDivWidth"></div>
						</div>
						
						<div class="form-group col-md-2">
						  <label for="saleDetailsSaleID">Payment ID</label>
						  <input type="text" class="form-control invTooltip" id="saleDetailsSaleID" name="saleDetailsSaleID" title="This will be auto-generated when you add a new record" autocomplete="off">
						  <div id="saleDetailsSaleIDSuggestionsDiv" class="customListDivWidth"></div>
						</div>
					  </div>
					  <div class="form-row">
						  
						  <div class="form-group col-md-3">
							  <label for="saleDetailsSaleDate">Payment Date<span class="requiredIcon">*</span></label>
							  <input type="text" class="form-control datepicker" id="saleDetailsSaleDate" value="2018-05-24" name="saleDetailsSaleDate">
						  </div>
					  </div>
					  <div class="form-row">
						
						<div class="form-group col-md-3">
						  <label for="saleDetailsTotal">Payment Amount<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="saleDetailsTotal" name="saleDetailsTotal">
						</div>
					  </div>
					  
					  <button type="button" id="addSaleButton" class="btn btn-success">Add Payment</button>
					  <button type="reset" id="saleClear" class="btn">Clear</button>
					</form>
				  </div> 
				</div>
			  </div>
			  <div class="tab-pane fade" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Customer Details</div>
				  <div class="card-body">
				  <!-- Div to show the ajax message from validations/db submission -->
				  <div id="customerDetailsMessage"></div>
					 <form> 
					  <div class="form-row">
						<div class="form-group col-md-6">
						  <label for="customerDetailsCustomerFirstName">First Name<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="customerDetailsCustomerFirstName" name="customerDetailsCustomerFirstName">
						</div>
						<div class="form-group col-md-6">
						  <label for="customerDetailsCustomerLastName">Last Name<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="customerDetailsCustomerLastName" name="customerDetailsCustomerLastName">
						</div>
						 <div class="form-group col-md-3">
							<label for="customerDetailsCustomerID">Customer ID</label>
							<input type="text" class="form-control invTooltip" id="customerDetailsCustomerID" name="customerDetailsCustomerID" title="This will be auto-generated when you add a new customer" autocomplete="off">
							<div id="customerDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
						</div>
					  </div>
					  <div class="form-row">
						  <div class="form-group col-md-3">
							<label for="customerDetailsCustomerMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
							<input type="text" class="form-control invTooltip" id="customerDetailsCustomerMobile" name="customerDetailsCustomerMobile" title="Do not enter leading 0">
						  </div>
						  
						  <div class="form-group col-md-6">
							<label for="customerDetailsCustomerEmail">Email</label>
							<input type="email" class="form-control" id="customerDetailsCustomerEmail" name="customerDetailsCustomerEmail">
						</div>
					  </div>
					 					
						   <div class="form-group col-md-4">
						  <label for="vendorDetailsVendorDistrict">Identification Type<span class="requiredIcon">*</span></label>
						  <select id="vendorDetailsVendorDistrict" name="vendorDetailsVendorDistrict" class="form-control chosenSelect">
							<?php include('inc/statusList2.html'); ?>
						  </select>
						</div>
					  	
						 <div class="form-group">
						<label for="vendorDetailsIdentificationNumber">Identification Number<span class="requiredIcon">*</span></label>
						<input type="text" class="form-control" id="vendorDetailsIdentificationNumber" name="vendorDetailsIdentificationNumber">
					  </div>
						
					  <button type="button" id="addCustomer" name="addCustomer" class="btn btn-success">Add Customer</button>
					  <button type="button" id="updateCustomerDetailsButton" class="btn btn-primary">Update</button>
					  <button type="button" id="deleteCustomerButton" class="btn btn-danger">Delete</button>
					  <button type="reset" class="btn">Clear</button>
					 </form>
					 </div>
				  </div> 
				</div>
		
			
			  <div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Search Books Inventory<button id="searchTablesRefresh" name="searchTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
				  <div class="card-body">										
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#itemSearchTab">Books</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#purchaseSearchTab">Rentals</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#saleSearchTab">Payments</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#vendorSearchTab">Authors</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#customerSearchTab">Customers</a>
						</li>
					</ul>
  
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="itemSearchTab" class="container-fluid tab-pane active">
						  <br>
						  <p>Use the grid below to search all details of books</p>
						  <!-- <a href="#" class="itemDetailsHover" data-toggle="popover" id="10">wwwee</a> -->
							<div class="table-responsive" id="itemDetailsTableDiv"></div>
						</div>
						<div id="customerSearchTab" class="container-fluid tab-pane fade">
						  <br>
						  <p>Use the grid below to search all details of customers</p>
							<div class="table-responsive" id="customerDetailsTableDiv"></div>
						</div>
						<div id="saleSearchTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to search payments details</p>
							<div class="table-responsive" id="saleDetailsTableDiv"></div>
						</div>
						<div id="purchaseSearchTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to search rentals details</p>
							<div class="table-responsive" id="purchaseDetailsTableDiv"></div>
						</div>
						<div id="vendorSearchTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to search Authors details</p>
							<div class="table-responsive" id="vendorDetailsTableDiv"></div>
						</div>
					</div>
				  </div> 
				</div>
			  </div>
			  
			  <div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Reports<button id="reportsTablesRefresh" name="reportsTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
				  <div class="card-body">										
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#itemReportsTab">Books</a>
						</li>
										
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#purchaseReportsTab">Rentals</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#saleReportsTab">Payments</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#vendorReportsTab">Authors</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#customerReportsTab">Customers</a>
						</li>
					</ul>
  
						<!-- Tab panes for reports sections -->
					<div class="tab-content">
						<div id="itemReportsTab" class="container-fluid tab-pane active">
							<br>
							<p>Use the grid below to get reports for books</p>
							<div class="table-responsive" id="itemReportsTableDiv"></div>
						</div>
						<div id="customerReportsTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to get reports for customers</p>
							<div class="table-responsive" id="customerReportsTableDiv"></div>
						</div>
						<div id="saleReportsTab" class="container-fluid tab-pane fade">
							<br>
							<!-- <p>Use the grid below to get reports for sales</p> -->
							<form> 
							  <div class="form-row">
								  <div class="form-group col-md-3">
									<label for="saleReportStartDate">Start Date</label>
									<input type="text" class="form-control datepicker" id="saleReportStartDate" value="2018-05-24" name="saleReportStartDate" readonly>
								  </div>
								  <div class="form-group col-md-3">
									<label for="saleReportEndDate">End Date</label>
									<input type="text" class="form-control datepicker" id="saleReportEndDate" value="2018-05-24" name="saleReportEndDate" readonly>
								  </div>
							  </div>
							  <button type="button" id="showSaleReport" class="btn btn-dark">Show Report</button>
							  <button type="reset" id="saleFilterClear" class="btn">Clear</button>
							</form>
							<br><br>
							<div class="table-responsive" id="saleReportsTableDiv"></div>
						</div>
						<div id="purchaseReportsTab" class="container-fluid tab-pane fade">
							<br>
							<!-- <p>Use the grid below to get reports for purchases</p> -->
							<form> 
							  <div class="form-row">
								  <div class="form-group col-md-3">
									<label for="purchaseReportStartDate">Start Date</label>
									<input type="text" class="form-control datepicker" id="purchaseReportStartDate" value="2018-05-24" name="purchaseReportStartDate" readonly>
								  </div>
								  <div class="form-group col-md-3">
									<label for="purchaseReportEndDate">End Date</label>
									<input type="text" class="form-control datepicker" id="purchaseReportEndDate" value="2018-05-24" name="purchaseReportEndDate" readonly>
								  </div>
							  </div>
							  <button type="button" id="showPurchaseReport" class="btn btn-dark">Show Report</button>
							  <button type="reset" id="purchaseFilterClear" class="btn">Clear</button>
							</form>
							<br><br>
							<div class="table-responsive" id="purchaseReportsTableDiv"></div>
						</div>
						<div id="vendorReportsTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to get reports for vendors</p>
							<div class="table-responsive" id="vendorReportsTableDiv"></div>
						</div>
					</div>
				  </div> 
				</div>
			  </div>
				  </div> 
				</div>
			  </div>
			</div>
		 </div>
	  </div>
    </div>       


<?php
	require 'inc/footer.php';
?>
  </body>
</html>
