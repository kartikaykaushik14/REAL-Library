// File that creates the purchase details search table
purchaseDetailsSearchTableCreatorFile = 'model/purchase/purchaseDetailsSearchTableCreator.php';

// File that creates the Invoice details search table
invoicesDetailsSearchTableCreatorFile = 'model/invoices/invoicesDetailsSearchTableCreator.php';

// File that creates the customer details search table
customerDetailsSearchTableCreatorFile = 'model/customer/customerDetailsSearchTableCreator.php';

// File that creates the book details search table
bookDetailsSearchTableCreatorFile = 'model/item/itemDetailsSearchTableCreator.php';

// File that creates the vendor details search table
vendorDetailsSearchTableCreatorFile = 'model/vendor/vendorDetailsSearchTableCreator.php';

// File that creates the sale details search table
saleDetailsSearchTableCreatorFile = 'model/sale/saleDetailsSearchTableCreator.php';



// File that creates the purchase reports search table
purchaseReportsSearchTableCreatorFile = 'model/purchase/purchaseReportsSearchTableCreator.php';

// File that creates the customer reports search table
customerReportsSearchTableCreatorFile = 'model/customer/customerReportsSearchTableCreator.php';

// File that creates the book reports search table
bookReportsSearchTableCreatorFile = 'model/item/itemReportsSearchTableCreator.php';

// File that creates the vendor reports search table
vendorReportsSearchTableCreatorFile = 'model/vendor/vendorReportsSearchTableCreator.php';

// File that creates the sale reports search table
saleReportsSearchTableCreatorFile = 'model/sale/saleReportsSearchTableCreator.php';



// File that returns the last inserted vendorID
vendorLastInsertedIDFile = 'model/vendor/populateLastVendorID.php';

// File that returns the last inserted customerID
customerLastInsertedIDFile = 'model/customer/populateLastCustomerID.php';

// File that returns the last inserted purchaseID
purchaseLastInsertedIDFile = 'model/purchase/populateLastPurchaseIDForPurchaseTab.php';

// File that returns the last inserted saleID
saleLastInsertedIDFile = 'model/sale/populateLastSaleIDForSaleTab.php';

// File that returns the last inserted productID for book details tab
bookLastInsertedIDFile = 'model/item/populateLastProductID.php';



// File that returns purchaseIDs
showPurchaseIDSuggestionsFile = 'model/purchase/showPurchaseIDs.php';

// File that returns saleIDs
showSaleIDSuggestionsFile = 'model/sale/showSaleIDs.php';

// File that returns vendorIDs
showVendorIDSuggestionsFile = 'model/vendor/showVendorIDs.php';

// File that returns customerIDs
showCustomerIDSuggestionsFile = 'model/customer/showCustomerIDs.php';

// File that returns customerIDs for sale tab
showCustomerIDSuggestionsForSaleTabFile = 'model/customer/showCustomerIDsForSaleTab.php';



// File that returns bookNumbers
showBookNumberSuggestionsFile = 'model/book/showBookNumber.php';

// File that returns bookNumbers in image tab
showBookNumberSuggestionsForImageTabFile = 'model/book/showBookNumberForImageTab.php';

// File that returns bookNumbers for purchase tab
showBookNumberForPurchaseTabFile = 'model/book/showBookNumberForPurchaseTab.php';

// File that returns bookNumbers for sale tab
showBookNumberForSaleTabFile = 'model/book/showBookNumberForSaleTab.php';

// File that returns bookNames
showBookNamesFile = 'model/book/showBookNames.php';



// File that returns stock 
getBookStockFile = 'model/book/getBookStock.php';

// File that returns book name
getBookNameFile = 'model/book/getBookName.php';

// File that updates an image
updateImageFile = 'model/image/updateImage.php';

// File that deletes an image
deleteImageFile = 'model/image/deleteImage.php';



// File that creates the filtered purchase report table
purchaseFilteredReportCreatorFile = 'model/purchase/purchaseFilteredReportTableCreator.php';

// File that creates the filtered sale report table
saleFilteredReportCreatorFile = 'model/sale/saleFilteredReportTableCreator.php';



$(document).ready(function(){
	// Style the dropdown boxes. You need to explicitly set the width 
    // in order to fix the dropdown box not visible issue when tab is hidden
	$('.chosenSelect').chosen({ width: "95%"});
	
	// Initiate tooltips
	$('.invTooltip').tooltip(); 
	
	// Listen to customer add button
	$('#addCustomer').on('click', function(){
		alert("Trying to insert a Customer record");
		addCustomer();
	});
	
	// Listen to vendor add button
	$('#addVendor').on('click', function(){
		alert("Trying to insert a Author record");
		addVendor();
	});
	
	// Listen to book add button
	$('#addBook').on('click', function(){
		alert("Trying to insert a Book record");
		addBook();
	});
	
	// Listen to invoice fetch button
	$('#addinvoiceButton').on('click', function(){
		alert("Trying to Fetch an Invoice record");
		addinvoiceButton();
	});
	
	// Listen to purchase add button
	$('#addPurchase').on('click', function(){
			alert("Trying to insert a Rental record");
		addPurchase();
	});
	
	// Listen to sale add button
	$('#addSaleButton').on('click', function(){
		alert("Trying to insert a Purchase record");
		addSale();
	});
	
	// Listen to update button in book details tab
	$('#updateBookDetailsButton').on('click', function(){
		updateBook();
	});
	
	// Listen to update button in customer details tab
	$('#updateCustomerDetailsButton').on('click', function(){
		updateCustomer();
	});
	
	// Listen to update button in vendor details tab
	$('#updateVendorDetailsButton').on('click', function(){
		updateVendor();
	});
	
	// Listen to update button in purchase details tab
	$('#updatePurchaseDetailsButton').on('click', function(){
		updatePurchase();
	});
	
	// Listen to update button in sale details tab
	$('#updateSaleDetailsButton').on('click', function(){
		updateSale();
	});
	
	// Listen to delete button in book details tab
	$('#deleteBook').on('click', function(){
		// Confirm before deleting
		bootbox.confirm('Are you sure you want to delete?', function(result){
			if(result){
				deleteBook();
			}
		});
	});
	
	// Listen to delete button in customer details tab
	$('#deleteCustomerButton').on('click', function(){
		// Confirm before deleting
		bootbox.confirm('Are you sure you want to delete?', function(result){
			if(result){
				deleteCustomer();
			}
		});
	});
	
	// Listen to delete button in vendor details tab
	$('#deleteVendorButton').on('click', function(){
		// Confirm before deleting
		bootbox.confirm('Are you sure you want to delete?', function(result){
			if(result){
				deleteVendor();
			}
		});
	});
	
	// Listen to book name text box in book details tab
	$('#bookDetailsBookName').keyup(function(){
		showSuggestions('bookDetailsBookName', showBookNamesFile, 'bookDetailsBookNameSuggestionsDiv');
	});
	
	// Remove the book names suggestions dropdown in the book details tab
	// when user selects an book from it
	$(document).on('click', '#bookDetailsBookNamesSuggestionsList li', function(){
		$('#bookDetailsBookName').val($(this).text());
		$('#bookDetailsBookNamesSuggestionsList').fadeOut();
	});
	
	// Listen to book number text box in book details tab
	$('#bookDetailsBookNumber').keyup(function(){
		showSuggestions('bookDetailsBookNumber', showBookNumberSuggestionsFile, 'bookDetailsBookNumberSuggestionsDiv');
	});
	
	// Remove the book numbers suggestions dropdown in the book details tab
	// when user selects an book from it
	$(document).on('click', '#bookDetailsBookNumberSuggestionsList li', function(){
		$('#bookDetailsBookNumber').val($(this).text());
		$('#bookDetailsBookNumberSuggestionsList').fadeOut();
		getBookDetailsToPopulate();
	});
	

	// Listen to book number text box in sale details tab
	$('#saleDetailsBookNumber').keyup(function(){
		showSuggestions('saleDetailsBookNumber', showBookNumberForSaleTabFile, 'saleDetailsBookNumberSuggestionsDiv');
	});
	
	// Remove the book numbers suggestions dropdown in the sale details tab
	// when user selects an book from it
	$(document).on('click', '#saleDetailsBookNumberSuggestionsList li', function(){
		$('#saleDetailsBookNumber').val($(this).text());
		$('#saleDetailsBookNumberSuggestionsList').fadeOut();
		getBookDetailsToPopulateForSaleTab();
	});
	
	
	// Listen to book number text box in book image tab
	$('#bookImageBookNumber').keyup(function(){
		showSuggestions('bookImageBookNumber', showBookNumberSuggestionsForImageTabFile, 'bookImageBookNumberSuggestionsDiv');
	});
	
	// Remove the book numbers suggestions dropdown in the book image tab
	// when user selects an book from it
	$(document).on('click', '#bookImageBookNumberSuggestionsList li', function(){
		$('#bookImageBookNumber').val($(this).text());
		$('#bookImageBookNumberSuggestionsList').fadeOut();
		getBookName('bookImageBookNumber', getBookNameFile, 'bookImageBookName');
	});
	
	// Clear the image from book tab when Clear button is clicked
	$('#bookClear').on('click', function(){
		$('#imageContainer').empty();
	});
	
	// Clear the image from sale tab when Clear button is clicked
	$('#saleClear').on('click', function(){
		$('#saleDetailsImageContainer').empty();
	});
	
	// Refresh the purchase report datatable in the purchase report tab when Clear button is clicked
	$('#purchaseFilterClear').on('click', function(){
		reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
	});
	
	// Refresh the sale report datatable in the sale report tab when Clear button is clicked
	$('#saleFilterClear').on('click', function(){
		reportsSaleTableCreator('saleReportsTableDiv', saleReportsSearchTableCreatorFile, 'saleReportsTable');
	});
	
	
	// Listen to book number text box in purchase details tab
	$('#purchaseDetailsBookNumber').keyup(function(){
		showSuggestions('purchaseDetailsBookNumber', showBookNumberForPurchaseTabFile, 'purchaseDetailsBookNumberSuggestionsDiv');
	});
	
	// remove the book numbers suggestions dropdown in the purchase details tab
	// when user selects an book from it
	$(document).on('click', '#purchaseDetailsBookNumberSuggestionsList li', function(){
		$('#purchaseDetailsBookNumber').val($(this).text());
		$('#purchaseDetailsBookNumberSuggestionsList').fadeOut();
		
		// Display the book name for the selected book number
		getBookName('purchaseDetailsBookNumber', getBookNameFile, 'purchaseDetailsBookName');
		
		// Display the current stock for the selected book number
		getBookStockToPopulate('purchaseDetailsBookNumber', getBookStockFile, 'purchaseDetailsCurrentStock');
	});
	
	// Listen to CustomerID text box in customer details tab
	$('#customerDetailsCustomerID').keyup(function(){
		showSuggestions('customerDetailsCustomerID', showCustomerIDSuggestionsFile, 'customerDetailsCustomerIDSuggestionsDiv');
	});
	
	// Remove the CustomerID suggestions dropdown in the customer details tab
	// when user selects an book from it
	$(document).on('click', '#customerDetailsCustomerIDSuggestionsList li', function(){
		$('#customerDetailsCustomerID').val($(this).text());
		$('#customerDetailsCustomerIDSuggestionsList').fadeOut();
		getCustomerDetailsToPopulate();
	});
	

	// Listen to CustomerID text box in sale details tab
	$('#saleDetailsCustomerID').keyup(function(){
		showSuggestions('saleDetailsCustomerID', showCustomerIDSuggestionsForSaleTabFile, 'saleDetailsCustomerIDSuggestionsDiv');
	});
	
	// Remove the CustomerID suggestions dropdown in the sale details tab
	// when user selects an book from it
	$(document).on('click', '#saleDetailsCustomerIDSuggestionsList li', function(){
		$('#saleDetailsCustomerID').val($(this).text());
		$('#saleDetailsCustomerIDSuggestionsList').fadeOut();
		getCustomerDetailsToPopulateSaleTab();
	});
	
	
	// Listen to VendorID text box in vendor details tab
	$('#vendorDetailsVendorID').keyup(function(){
		showSuggestions('vendorDetailsVendorID', showVendorIDSuggestionsFile, 'vendorDetailsVendorIDSuggestionsDiv');
	});
	
	// Remove the VendorID suggestions dropdown in the vendor details tab
	// when user selects an book from it
	$(document).on('click', '#vendorDetailsVendorIDSuggestionsList li', function(){
		$('#vendorDetailsVendorID').val($(this).text());
		$('#vendorDetailsVendorIDSuggestionsList').fadeOut();
		getVendorDetailsToPopulate();
	});
	
	
	// Listen to PurchaseID text box in purchase details tab
	$('#purchaseDetailsPurchaseID').keyup(function(){
		showSuggestions('purchaseDetailsPurchaseID', showPurchaseIDSuggestionsFile, 'purchaseDetailsPurchaseIDSuggestionsDiv');
	});
	
	// Remove the PurchaseID suggestions dropdown in the customer details tab
	// when user selects an book from it
	$(document).on('click', '#purchaseDetailsPurchaseIDSuggestionsList li', function(){
		$('#purchaseDetailsPurchaseID').val($(this).text());
		$('#purchaseDetailsPurchaseIDSuggestionsList').fadeOut();
		getPurchaseDetailsToPopulate();
	});
	
	
	// Listen to saleID text box in sale details tab
	$('#saleDetailsSaleID').keyup(function(){
		showSuggestions('saleDetailsSaleID', showSaleIDSuggestionsFile, 'saleDetailsSaleIDSuggestionsDiv');
	});
	
	// Remove the SaleID suggestions dropdown in the sale details tab
	// when user selects an book from it
	$(document).on('click', '#saleDetailsSaleIDSuggestionsList li', function(){
		$('#saleDetailsSaleID').val($(this).text());
		$('#saleDetailsSaleIDSuggestionsList').fadeOut();
		getSaleDetailsToPopulate();
	});


	// Listen to image update button
	$('#updateImageButton').on('click', function(){
		processImage('imageForm', updateImageFile, 'bookImageMessage');
	});
	
	// Listen to image delete button
	$('#deleteImageButton').on('click', function(){
		processImage('imageForm', deleteImageFile, 'bookImageMessage');
	});
	
	// Initiate datepickers
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		todayHighlight: true,
		todayBtn: 'linked',
		orientation: 'bottom left'
	});
	
	// Calculate Total in purchase tab
	$('#purchaseDetailsQuantity, #purchaseDetailsUnitPrice').change(function(){
		calculateTotalInPurchaseTab();
	});

	// Calculate Total in sale tab
	$('#saleDetailsDiscount, #saleDetailsQuantity, #saleDetailsUnitPrice').change(function(){
		calculateTotalInSaleTab();
	});
	
	// Close any suggestions lists from the page when a user clicks on the page
	$(document).on('click', function(){
		$('.suggestionsList').fadeOut();
	});

	// Load searchable datatables for customer, purchase, book, vendor, sale
	searchTableCreator('itemDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'itemDetailsTable');
	searchTableCreator('purchaseDetailsTableDiv', purchaseDetailsSearchTableCreatorFile, 'purchaseDetailsTable');
	searchTableCreator('customerDetailsTableDiv', customerDetailsSearchTableCreatorFile, 'customerDetailsTable');
	searchTableCreator('saleDetailsTableDiv', saleDetailsSearchTableCreatorFile, 'saleDetailsTable');
	searchTableCreator('vendorDetailsTableDiv', vendorDetailsSearchTableCreatorFile, 'vendorDetailsTable');
	
	// Load searchable datatables for customer, purchase, book, vendor, sale reports
	reportsTableCreator('itemReportsTableDiv', bookReportsSearchTableCreatorFile, 'itemReportsTable');
	reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
	reportsTableCreator('customerReportsTableDiv', customerReportsSearchTableCreatorFile, 'customerReportsTable');
	reportsSaleTableCreator('saleReportsTableDiv', saleReportsSearchTableCreatorFile, 'saleReportsTable');
	reportsTableCreator('vendorReportsTableDiv', vendorReportsSearchTableCreatorFile, 'vendorReportsTable');
	
	// Initiate popovers
	$(document).on('mouseover', '.bookDetailsHover', function(){
		// Create book details popover boxes
		$('.bookDetailsHover').popover({
			container: 'body',
			title: 'Book Details',
			trigger: 'hover',
			html: true,
			placement: 'right',
			content: fetchData
		});
	});
	
	// Listen to refresh buttons
	$('#searchTablesRefresh, #reportsTablesRefresh').on('click', function(){
		searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');
		searchTableCreator('purchaseDetailsTableDiv', purchaseDetailsSearchTableCreatorFile, 'purchaseDetailsTable');
		searchTableCreator('customerDetailsTableDiv', customerDetailsSearchTableCreatorFile, 'customerDetailsTable');
		searchTableCreator('vendorDetailsTableDiv', vendorDetailsSearchTableCreatorFile, 'vendorDetailsTable');
		searchTableCreator('saleDetailsTableDiv', saleDetailsSearchTableCreatorFile, 'saleDetailsTable');
		
		reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
		reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
		reportsTableCreator('customerReportsTableDiv', customerReportsSearchTableCreatorFile, 'customerReportsTable');
		reportsTableCreator('vendorReportsTableDiv', vendorReportsSearchTableCreatorFile, 'vendorReportsTable');
		reportsSaleTableCreator('saleReportsTableDiv', saleReportsSearchTableCreatorFile, 'saleReportsTable');
	});
	
	
	// Listen to purchase report show button
	$('#showPurchaseReport').on('click', function(){
		filteredPurchaseReportTableCreator('purchaseReportStartDate', 'purchaseReportEndDate', purchaseFilteredReportCreatorFile, 'purchaseReportsTableDiv', 'purchaseFilteredReportsTable');
	});
	
	// Listen to sale report show button
	$('#showSaleReport').on('click', function(){
		filteredSaleReportTableCreator('saleReportStartDate', 'saleReportEndDate', saleFilteredReportCreatorFile, 'saleReportsTableDiv', 'saleFilteredReportsTable');
	});
	
});


// Function to fetch data to show in popovers
function fetchData(){
	var fetch_data = '';
	var element = $(this);
	var id = element.attr('id');
	
	$.ajax({
		url: 'model/book/getBookDetailsForPopover.php',
		method: 'POST',
		async: false,
		data: {id:id},
		success: function(data){
			fetch_data = data;
		}
	});
	return fetch_data;
}


// Function to call the script that process imageURL in DB
function processImage(imageFormID, scriptPath, messageDivID){
	var form = $('#' + imageFormID)[0];
	var formData = new FormData(form);
	$.ajax({
		url: scriptPath,
		method: 'POST',
		data: formData,
		contentType: false,
		processData: false,
		success: function(data){
			$('#' + messageDivID).html(data);
		}
	});
}

// Function to create searchable datatables for customer, book, purchase, sale
function searchTableCreator(tableContainerDiv, tableCreatorFileUrl, table){
	var tableContainerDivID = '#' + tableContainerDiv;
	var tableID = '#' + table;
	$(tableContainerDivID).load(tableCreatorFileUrl, function(){
		// Initiate the Datatable plugin once the table is added to the DOM
		$(tableID).DataTable();
	});
}

function invoiceTableCreator(tableContainerDiv, table, data){
	var tableContainer = document.getElementById(tableContainerDiv);
	tableContainer.innerHTML = data;

	var tableID = '#' + table;
	$(tableID).DataTable();
}


// Function to create reports datatables for customer, book, purchase, sale
function reportsTableCreator(tableContainerDiv, tableCreatorFileUrl, table){
	var tableContainerDivID = '#' + tableContainerDiv;
	var tableID = '#' + table;
	$(tableContainerDivID).load(tableCreatorFileUrl, function(){
		// Initiate the Datatable plugin once the table is added to the DOM
		$(tableID).DataTable({
			dom: 'lBfrtip',
			//dom: 'lfBrtip',
			//dom: 'Bfrtip',
			buttons: [
				'copy',
				'csv', 'excel',
				{extend: 'pdf', orientation: 'landscape', pageSize: 'LEGAL'},
				'print'
			]
		});
	});
}


// Function to create reports datatables for purchase
function reportsPurchaseTableCreator(tableContainerDiv, tableCreatorFileUrl, table){
	var tableContainerDivID = '#' + tableContainerDiv;
	var tableID = '#' + table;
	$(tableContainerDivID).load(tableCreatorFileUrl, function(){
		// Initiate the Datatable plugin once the table is added to the DOM
		$(tableID).DataTable({
			dom: 'lBfrtip',
			buttons: [
				'copy',
				{extend: 'csv', footer: true, title: 'Purchase Report'},
				{extend: 'excel', footer: true, title: 'Purchase Report'},
				{extend: 'pdf', footer: true, orientation: 'landscape', pageSize: 'LEGAL', title: 'Purchase Report'},
				{extend: 'print', footer: true, title: 'Purchase Report'},
			],
			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;
	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ?
						i.replace(/[\$,]/g, '')*1 :
						typeof i === 'number' ?
							i : 0;
				};
	 
				// Quantity total over all pages
				quantityTotal = api
					.column( 6 )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
	 
				// Quantity for current page
				quantityFilteredTotal = api
					.column( 6, { page: 'current'} )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
				
				// Unit price total over all pages
				unitPriceTotal = api
					.column( 7 )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
				
				// Unit price for current page
				unitPriceFilteredTotal = api
					.column( 7, { page: 'current'} )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
					
				// Full price total over all pages
				fullPriceTotal = api
					.column( 8 )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
				
				// Full price for current page
				fullPriceFilteredTotal = api
					.column( 8, { page: 'current'} )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
	 
				// Update footer columns
				$( api.column( 6 ).footer() ).html(quantityFilteredTotal +' ('+ quantityTotal +' total)');
				$( api.column( 7 ).footer() ).html(unitPriceFilteredTotal +' ('+ unitPriceTotal +' total)');
				$( api.column( 8 ).footer() ).html(fullPriceFilteredTotal +' ('+ fullPriceTotal +' total)');
			}
		});
	});
}


// Function to create reports datatables for sale
function reportsSaleTableCreator(tableContainerDiv, tableCreatorFileUrl, table){
	var tableContainerDivID = '#' + tableContainerDiv;
	var tableID = '#' + table;
	$(tableContainerDivID).load(tableCreatorFileUrl, function(){
		// Initiate the Datatable plugin once the table is added to the DOM
		$(tableID).DataTable({
			dom: 'lBfrtip',
			buttons: [
				'copy',
				{extend: 'csv', footer: true, title: 'Sale Report'},
				{extend: 'excel', footer: true, title: 'Sale Report'},
				{extend: 'pdf', footer: true, orientation: 'landscape', pageSize: 'LEGAL', title: 'Sale Report'},
				{extend: 'print', footer: true, title: 'Sale Report'},
			],
			"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;
	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ?
						i.replace(/[\$,]/g, '')*1 :
						typeof i === 'number' ?
							i : 0;
				};
	 
				// Quantity Total over all pages
				quantityTotal = api
					.column( 7 )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
	 
				// Quantity Total over this page
				quantityFilteredTotal = api
					.column( 7, { page: 'current'} )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
				
				// Unit price Total over all pages
				unitPriceTotal = api
					.column( 8 )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
				
				// Unit price total over current page
				unitPriceFilteredTotal = api
					.column( 8, { page: 'current'} )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
					
				// Full price Total over all pages
				fullPriceTotal = api
					.column( 9 )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
				
				// Full price total over current page
				fullPriceFilteredTotal = api
					.column( 9, { page: 'current'} )
					.data()
					.reduce( function (a, b) {
						return intVal(a) + intVal(b);
					}, 0 );
	 
				// Update footer columns
				$( api.column( 7 ).footer() ).html(quantityFilteredTotal +' ('+ quantityTotal +' total)');
				$( api.column( 8 ).footer() ).html(unitPriceFilteredTotal +' ('+ unitPriceTotal +' total)');
				$( api.column( 9 ).footer() ).html(fullPriceFilteredTotal +' ('+ fullPriceTotal +' total)');
			}
		});
	});
}


// Function to create filtered datatable for sale details with total values
function filteredSaleReportTableCreator(startDate, endDate, scriptPath, tableDIV, tableID){
	var startDate = $('#' + startDate).val();
	var endDate = $('#' + endDate).val();

	$.ajax({
		url: scriptPath,
		method: 'POST',
		data: {
			startDate:startDate,
			endDate:endDate,
		},
		success: function(data){
			$('#' + tableDIV).empty();
			$('#' + tableDIV).html(data);
		},
		complete: function(){
			// Initiate the Datatable plugin once the table is added to the DOM
			$('#' + tableID).DataTable({
				dom: 'lBfrtip',
				buttons: [
					'copy',
					{extend: 'csv', footer: true, title: 'Sale Report'},
					{extend: 'excel', footer: true, title: 'Sale Report'},
					{extend: 'pdf', footer: true, orientation: 'landscape', pageSize: 'LEGAL', title: 'Sale Report'},
					{extend: 'print', footer: true, title: 'Sale Report'},
				],
				"footerCallback": function ( row, data, start, end, display ) {
					var api = this.api(), data;
		 
					// Remove the formatting to get integer data for summation
					var intVal = function ( i ) {
						return typeof i === 'string' ?
							i.replace(/[\$,]/g, '')*1 :
							typeof i === 'number' ?
								i : 0;
					};
		 
					// Total over all pages
					quantityTotal = api
						.column( 7 )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
		 
					// Total over this page
					quantityFilteredTotal = api
						.column( 7, { page: 'current'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Total over all pages
					unitPriceTotal = api
						.column( 8 )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Quantity total
					unitPriceFilteredTotal = api
						.column( 8, { page: 'current'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
						
					// Full total over all pages
					fullPriceTotal = api
						.column( 9 )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Full total over current page
					fullPriceFilteredTotal = api
						.column( 9, { page: 'current'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
		 
					// Update footer columns
					$( api.column( 7 ).footer() ).html(quantityFilteredTotal +' ('+ quantityTotal +' total)');
					$( api.column( 8 ).footer() ).html(unitPriceFilteredTotal +' ('+ unitPriceTotal +' total)');
					$( api.column( 9 ).footer() ).html(fullPriceFilteredTotal +' ('+ fullPriceTotal +' total)');
				}
			});
		}
	});
}


// Function to create filtered datatable for purchase details with total values
function filteredPurchaseReportTableCreator(startDate, endDate, scriptPath, tableDIV, tableID){
	var startDate = $('#' + startDate).val();
	var endDate = $('#' + endDate).val();

	$.ajax({
		url: scriptPath,
		method: 'POST',
		data: {
			startDate:startDate,
			endDate:endDate,
		},
		success: function(data){
			$('#' + tableDIV).empty();
			$('#' + tableDIV).html(data);
		},
		complete: function(){
			// Initiate the Datatable plugin once the table is added to the DOM
			$('#' + tableID).DataTable({
				dom: 'lBfrtip',
				buttons: [
					'copy',
					{extend: 'csv', footer: true, title: 'Purchase Report'},
					{extend: 'excel', footer: true, title: 'Purchase Report'},
					{extend: 'pdf', footer: true, orientation: 'landscape', pageSize: 'LEGAL', title: 'Purchase Report'},
					{extend: 'print', footer: true, title: 'Purchase Report'}
				],
				"footerCallback": function ( row, data, start, end, display ) {
					var api = this.api(), data;
		 
					// Remove the formatting to get integer data for summation
					var intVal = function ( i ) {
						return typeof i === 'string' ?
							i.replace(/[\$,]/g, '')*1 :
							typeof i === 'number' ?
								i : 0;
					};
		 
					// Quantity total over all pages
					quantityTotal = api
						.column( 6 )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
		 
					// Quantity for current page
					quantityFilteredTotal = api
						.column( 6, { page: 'current'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Unit price total over all pages
					unitPriceTotal = api
						.column( 7 )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Unit price for current page
					unitPriceFilteredTotal = api
						.column( 7, { page: 'current'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Full price total over all pages
					fullPriceTotal = api
						.column( 8 )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
					
					// Full price for current page
					fullPriceFilteredTotal = api
						.column( 8, { page: 'current'} )
						.data()
						.reduce( function (a, b) {
							return intVal(a) + intVal(b);
						}, 0 );
		 
					// Update footer columns
					$( api.column( 6 ).footer() ).html(quantityFilteredTotal +' ('+ quantityTotal +' total)');
					$( api.column( 7 ).footer() ).html(unitPriceFilteredTotal +' ('+ unitPriceTotal +' total)');
					$( api.column( 8 ).footer() ).html(fullPriceFilteredTotal +' ('+ fullPriceTotal +' total)');
				}
			});
		}
	});
}


// Calculate Total Purchase value in purchase details tab
function calculateTotalInPurchaseTab(){
	var quantityPT = $('#purchaseDetailsQuantity').val();
	var unitPricePT = $('#purchaseDetailsUnitPrice').val();
	$('#purchaseDetailsTotal').val(Number(quantityPT) * Number(unitPricePT));
}


// Calculate Total sale value in sale details tab
function calculateTotalInSaleTab(){
	var quantityST = $('#saleDetailsQuantity').val();
	var unitPriceST = $('#saleDetailsUnitPrice').val();
	var discountST = $('#saleDetailsDiscount').val();
	$('#saleDetailsTotal').val(Number(unitPriceST) * ((100 - Number(discountST)) / 100) * Number(quantityST));
}


// Function to call the insertCustomer.php script to insert customer data to db
function addCustomer() {
	var customerDetailsCustomerFullName = $('#customerDetailsCustomerFullName').val();
	var customerDetailsCustomerEmail = $('#customerDetailsCustomerEmail').val();
	var customerDetailsCustomerMobile = $('#customerDetailsCustomerMobile').val();
	var customerDetailsCustomerPhone2 = $('#customerDetailsCustomerPhone2').val();
	var customerDetailsCustomerAddress = $('#customerDetailsCustomerAddress').val();
	var customerDetailsCustomerAddress2 = $('#customerDetailsCustomerAddress2').val();
	var customerDetailsCustomerCity = $('#customerDetailsCustomerCity').val();
	var customerDetailsCustomerDistrict = $('#customerDetailsCustomerDistrict option:selected').text();
	var customerDetailsStatus = $('#customerDetailsStatus option:selected').text();
	
	$.ajax({
		url: 'model/customer/insertCustomer.php',
		method: 'POST',
		data: {
			customerDetailsCustomerFullName:customerDetailsCustomerFullName,
			customerDetailsCustomerEmail:customerDetailsCustomerEmail,
			customerDetailsCustomerMobile:customerDetailsCustomerMobile,
			customerDetailsCustomerPhone2:customerDetailsCustomerPhone2,
			customerDetailsCustomerAddress:customerDetailsCustomerAddress,
			customerDetailsCustomerAddress2:customerDetailsCustomerAddress2,
			customerDetailsCustomerCity:customerDetailsCustomerCity,
			customerDetailsCustomerDistrict:customerDetailsCustomerDistrict,
			customerDetailsStatus:customerDetailsStatus,
		},
		success: function(data){
			$('#customerDetailsMessage').fadeIn();
			$('#customerDetailsMessage').html(data);
		},
		complete: function(data){
			populateLastInsertedID(customerLastInsertedIDFile, 'customerDetailsCustomerID');
			searchTableCreator('customerDetailsTableDiv', customerDetailsSearchTableCreatorFile, 'customerDetailsTable');
			reportsTableCreator('customerReportsTableDiv', customerReportsSearchTableCreatorFile, 'customerReportsTable');
		}
	});
}


// Function to call the insertVendor.php script to insert vendor data to db
function addVendor() {
	var vendorDetailsVendorFullName = $('#vendorDetailsVendorFullName').val();
	var vendorDetailsVendorEmail = $('#vendorDetailsVendorEmail').val();
	var vendorDetailsVendorMobile = $('#vendorDetailsVendorMobile').val();
	var vendorDetailsVendorPhone2 = $('#vendorDetailsVendorPhone2').val();
	var vendorDetailsVendorAddress = $('#vendorDetailsVendorAddress').val();
	var vendorDetailsVendorAddress2 = $('#vendorDetailsVendorAddress2').val();
	var vendorDetailsVendorCity = $('#vendorDetailsVendorCity').val();
	var vendorDetailsVendorDistrict = $('#vendorDetailsVendorDistrict option:selected').text();
	var vendorDetailsStatus = $('#vendorDetailsStatus option:selected').text();
	
	$.ajax({
		url: 'model/vendor/insertVendor.php',
		method: 'POST',
		data: {
			vendorDetailsVendorFullName:vendorDetailsVendorFullName,
			vendorDetailsVendorEmail:vendorDetailsVendorEmail,
			vendorDetailsVendorMobile:vendorDetailsVendorMobile,
			vendorDetailsVendorPhone2:vendorDetailsVendorPhone2,
			vendorDetailsVendorAddress:vendorDetailsVendorAddress,
			vendorDetailsVendorAddress2:vendorDetailsVendorAddress2,
			vendorDetailsVendorCity:vendorDetailsVendorCity,
			vendorDetailsVendorDistrict:vendorDetailsVendorDistrict,
			vendorDetailsStatus:vendorDetailsStatus,
		},
		success: function(data){
			$('#vendorDetailsMessage').fadeIn();
			$('#vendorDetailsMessage').html(data);
		},
		complete: function(data){
			populateLastInsertedID(vendorLastInsertedIDFile, 'vendorDetailsVendorID');
			searchTableCreator('vendorDetailsTableDiv', vendorDetailsSearchTableCreatorFile, 'vendorDetailsTable');
			reportsTableCreator('vendorReportsTableDiv', vendorReportsSearchTableCreatorFile, 'vendorReportsTable');
			$('#purchaseDetailsVendorName').load('model/vendor/getVendorNames.php');
		}
	});
}


// Function to call the insertBook.php script to insert book data to db
function addBook() {
	var bookDetailsbookId = $('#bookDetailsbookId').val();
	var bookDetailsbookName = $('#bookDetailsbookName').val();
	var bookDetailsStatus = $('#bookDetailsStatus').val();
	var bookDetailsDescription = $('#bookDetailsDescription').val();
	var bookAuthor = $('#bookAuthor').val();
	var bookTopic = $('#bookTopic').val();
	
	console.log("book topic")
	console.log(bookTopic)
	$.ajax({
		url: 'model/item/insertItem.php',
		method: 'POST',
		data: {
			bookDetailsbookId:bookDetailsbookId,
			bookDetailsbookName:bookDetailsbookName,
			bookAuthor:bookAuthor,
			bookTopic:bookTopic,
			bookDetailsStatus:bookDetailsStatus,
			bookDetailsDescription:bookDetailsDescription,
		},
		success: function(data){
			// console.log(data)
			alert('success');
			$('#bookDetailsMessage').fadeIn();
			$('#bookDetailsMessage').html(data);
		},
		complete: function(){
			populateLastInsertedID(bookLastInsertedIDFile, 'bookDetailsbookId');
			 getBookStockToPopulate('bookDetailsBookNumber', getBookStockFile, bookDetailsTotalStock);
			 searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');
			 reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
		},
		error: function (error) {
			alert('error; ' + eval(error));
		}
	});
}



// Function to call the insertBook.php script to insert book data to db
function addinvoiceButton() {
	var invoicecustName = $('#invoicecustName').val();
	$.ajax({
		url: 'model/invoices/invoicesDetailsSearchTableCreator.php',
		method: 'POST',
		data: {
			invoicecustName:invoicecustName,
			//invoicecustId:invoicecustId,
		},
		dataType: 'json',
		success: function(data){
			$('#invoiceDetailsMessage').fadeIn();
			$('#invoiceDetailsMessage').html(data);
		},
		complete: function(){
			// getBookStockToPopulate('purchaseDetailsBookNumber', getBookStockFile, 'purchaseDetailsCurrentStock');
			// populateLastInsertedID(purchaseLastInsertedIDFile, 'purchaseDetailsPurchaseID');
			// searchTableCreator('purchaseDetailsTableDiv', purchaseDetailsSearchTableCreatorFile, 'purchaseDetailsTable');
			// reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
			searchTableCreator('invoiceDetailsTableDiv', invoicesDetailsSearchTableCreatorFile, 'invoicesDetailsTable');
			// reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
		},


	});

}



// Function to call the insertPurchase.php script to insert purchase data to db
function addPurchase() {
	console.log("in purchase");
	var purchaseDetailsBookId = $('#purchaseDetailsBookId').val();
	var purchaseDetailsPurchaseDate = $('#purchaseDetailsPurchaseDate').val();
	var purchaseDetailsExpectedReturnDate = $('#purchaseDetailsExpectedReturnDate').val();
	var purchaseDetailsActualReturnDate = $('#purchaseDetailsActualReturnDate').val();
	var purchaseDetailsStatus = $('#purchaseDetailsStatus').val();
	var purchaseDetailsCustId = $('#purchaseDetailsCustId').val();
	
	$.ajax({
		url: 'model/purchase/insertPurchase.php',
		method: 'POST',
		data: {
			purchaseDetailsBookId:purchaseDetailsBookId,
			purchaseDetailsPurchaseDate:purchaseDetailsPurchaseDate,
			purchaseDetailsExpectedReturnDate:purchaseDetailsExpectedReturnDate,
			purchaseDetailsActualReturnDate:purchaseDetailsActualReturnDate,
			purchaseDetailsStatus:purchaseDetailsStatus,
			purchaseDetailsCustId:purchaseDetailsCustId,
		},
		success: function(data){
			$('#purchaseDetailsMessage').fadeIn();
			$('#purchaseDetailsMessage').html(data);
		},
		complete: function(){
			alert("Success");
			// getBookStockToPopulate('purchaseDetailsBookNumber', getBookStockFile, 'purchaseDetailsCurrentStock');
			// populateLastInsertedID(purchaseLastInsertedIDFile, 'purchaseDetailsPurchaseID');
			// searchTableCreator('purchaseDetailsTableDiv', purchaseDetailsSearchTableCreatorFile, 'purchaseDetailsTable');
			// reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
			// searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');
			// reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
		},
		error: function (error) {
			alert('error; ' + eval(error));
		}
	});
}



// Function to call the insertSale.php script to insert sale data to db
function addSale() {
	var saleDetailsBookNumber = $('#saleDetailsBookNumber').val();
	var saleDetailsBookName = $('#saleDetailsBookName').val();
	var saleDetailsDiscount = $('#saleDetailsDiscount').val();
	var saleDetailsQuantity = $('#saleDetailsQuantity').val();
	var saleDetailsUnitPrice = $('#saleDetailsUnitPrice').val();
	var saleDetailsCustomerID = $('#saleDetailsCustomerID').val();
	var saleDetailsCustomerName = $('#saleDetailsCustomerName').val();
	var saleDetailsSaleDate = $('#saleDetailsSaleDate').val();
	
	$.ajax({
		url: 'model/sale/insertSale.php',
		method: 'POST',
		data: {
			saleDetailsBookNumber:saleDetailsBookNumber,
			saleDetailsBookName:saleDetailsBookName,
			saleDetailsDiscount:saleDetailsDiscount,
			saleDetailsQuantity:saleDetailsQuantity,
			saleDetailsUnitPrice:saleDetailsUnitPrice,
			saleDetailsCustomerID:saleDetailsCustomerID,
			saleDetailsCustomerName:saleDetailsCustomerName,
			saleDetailsSaleDate:saleDetailsSaleDate,
		},
		success: function(data){
			$('#saleDetailsMessage').fadeIn();
			$('#saleDetailsMessage').html(data);
		},
		complete: function(){
			getBookStockToPopulate('saleDetailsBookNumber', getBookStockFile, 'saleDetailsTotalStock');
			populateLastInsertedID(saleLastInsertedIDFile, 'saleDetailsSaleID');
			searchTableCreator('saleDetailsTableDiv', saleDetailsSearchTableCreatorFile, 'saleDetailsTable');
			reportsSaleTableCreator('saleReportsTableDiv', saleReportsSearchTableCreatorFile, 'saleReportsTable');
			searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');
			reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
		}
	});
}


// Function to send bookNumber so that book details can be pulled from db
// to be displayed on book details tab
function getBookDetailsToPopulate(){
	// Get the bookNumber entered in the text box
	var bookNumber = $('#bookDetailsBookNumber').val();
	var defaultImgUrl = 'data/book_images/imageNotAvailable.jpg';
	var defaultImageData = '<img class="img-fluid" src="data/book_images/imageNotAvailable.jpg">';
	
	// Call the populateBookDetails.php script to get book details
	// relevant to the bookNumber which the user entered
	$.ajax({
		url: 'model/book/populateBookDetails.php',
		method: 'POST',
		data: {bookNumber:bookNumber},
		dataType: 'json',
		success: function(data){
			//$('#bookDetailsBookNumber').val(data.bookNumber);
			$('#bookDetailsProductID').val(data.productID);
			$('#bookDetailsBookName').val(data.bookName);
			$('#bookDetailsDiscount').val(data.discount);
			$('#bookDetailsTotalStock').val(data.stock);
			$('#bookDetailsUnitPrice').val(data.unitPrice);
			$('#bookDetailsDescription').val(data.description);
			$('#bookDetailsStatus').val(data.status).trigger("chosen:updated");

			newImgUrl = 'data/book_images/' + data.bookNumber + '/' + data.imageURL;
			
			// Set the book image
			if(data.imageURL == 'imageNotAvailable.jpg' || data.imageURL == ''){
				$('#imageContainer').html(defaultImageData);
			} else {
				$('#imageContainer').html('<img class="img-fluid" src="' + newImgUrl + '">');
			}
		}
	});
}


// Function to send bookNumber so that book details can be pulled from db
// to be displayed on sale details tab
function getBookDetailsToPopulateForSaleTab(){
	// Get the bookNumber entered in the text box
	var bookNumber = $('#saleDetailsBookNumber').val();
	var defaultImgUrl = 'data/book_images/imageNotAvailable.jpg';
	var defaultImageData = '<img class="img-fluid" src="data/book_images/imageNotAvailable.jpg">';
	
	// Call the populateBookDetails.php script to get book details
	// relevant to the bookNumber which the user entered
	$.ajax({
		url: 'model/book/populateBookDetails.php',
		method: 'POST',
		data: {bookNumber:bookNumber},
		dataType: 'json',
		success: function(data){
			//$('#saleDetailsBookNumber').val(data.bookNumber);
			$('#saleDetailsBookName').val(data.bookName);
			$('#saleDetailsDiscount').val(data.discount);
			$('#saleDetailsTotalStock').val(data.stock);
			$('#saleDetailsUnitPrice').val(data.unitPrice);

			newImgUrl = 'data/book_images/' + data.bookNumber + '/' + data.imageURL;
			
			// Set the book image
			if(data.imageURL == 'imageNotAvailable.jpg' || data.imageURL == ''){
				$('#saleDetailsImageContainer').html(defaultImageData);
			} else {
				$('#saleDetailsImageContainer').html('<img class="img-fluid" src="' + newImgUrl + '">');
			}
		},
		complete: function() {
			//$('#saleDetailsDiscount, #saleDetailsQuantity, #saleDetailsUnitPrice').trigger('change');
			calculateTotalInSaleTab();
		}
	});
}


// Function to send bookNumber so that book name can be pulled from db
function getBookName(bookNumberTextBoxID, scriptPath, bookNameTextbox){
	// Get the bookNumber entered in the text box
	var bookNumber = $('#' + bookNumberTextBoxID).val();

	// Call the script to get book details
	$.ajax({
		url: scriptPath,
		method: 'POST',
		data: {bookNumber:bookNumber},
		dataType: 'json',
		success: function(data){
			$('#' + bookNameTextbox).val(data.bookName);
		},
		error: function (xhr, ajaxOptions, thrownError) {
      }
	});
}


// Function to send bookNumber so that book stock can be pulled from db
function getBookStockToPopulate(bookNumberTextbox, scriptPath, stockTextbox){
	// Get the bookNumber entered in the text box
	var bookNumber = $('#' + bookNumberTextbox).val();
	
	// Call the script to get stock details
	$.ajax({
		url: scriptPath,
		method: 'POST',
		data: {bookNumber:bookNumber},
		dataType: 'json',
		success: function(data){
			$('#' + stockTextbox).val(data.stock);
		},
		error: function (xhr, ajaxOptions, thrownError) {
        //alert(xhr.status);
        //alert(thrownError);
		//console.warn(xhr.responseText)
      }
	});
}


// Function to populate last inserted ID
function populateLastInsertedID(scriptPath, textBoxID){
	$.ajax({
		url: scriptPath,
		method: 'POST',
		dataType: 'json',
		success: function(data){
			$('#' + textBoxID).val(data);
		}
	});
}


// Function to show suggestions
function showSuggestions(textBoxID, scriptPath, suggestionsDivID){
	// Get the value entered by the user
	var textBoxValue = $('#' + textBoxID).val();
	
	// Call the showPurchaseIDs.php script only if there is a value in the
	// purchase ID textbox
	if(textBoxValue != ''){
		$.ajax({
			url: scriptPath,
			method: 'POST',
			data: {textBoxValue:textBoxValue},
			success: function(data){
				$('#' + suggestionsDivID).fadeIn();
				$('#' + suggestionsDivID).html(data);
			}
		});
	}
}


// Function to delte book from db
function deleteBook(){
	// Get the book number entered by the user
	var bookDetailsBookNumber = $('#bookDetailsBookNumber').val();
	
	// Call the deleteBook.php script only if there is a value in the
	// book number textbox
	if(bookDetailsBookNumber != ''){
		$.ajax({
			url: 'model/book/deleteBook.php',
			method: 'POST',
			data: {bookDetailsBookNumber:bookDetailsBookNumber},
			success: function(data){
				$('#bookDetailsMessage').fadeIn();
				$('#bookDetailsMessage').html(data);
			},
			complete: function(){
				searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');
				reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
			}
		});
	}
}


// Function to delete book from db
function deleteCustomer(){
	// Get the customerID entered by the user
	var customerDetailsCustomerID = $('#customerDetailsCustomerID').val();
	
	// Call the deleteCustomer.php script only if there is a value in the
	// book number textbox
	if(customerDetailsCustomerID != ''){
		$.ajax({
			url: 'model/customer/deleteCustomer.php',
			method: 'POST',
			data: {customerDetailsCustomerID:customerDetailsCustomerID},
			success: function(data){
				$('#customerDetailsMessage').fadeIn();
				$('#customerDetailsMessage').html(data);
			},
			complete: function(){
				searchTableCreator('customerDetailsTableDiv', customerDetailsSearchTableCreatorFile, 'customerDetailsTable');
				reportsTableCreator('customerReportsTableDiv', customerReportsSearchTableCreatorFile, 'customerReportsTable');
			}
		});
	}
}


// Function to delete vendor from db
function deleteVendor(){
	// Get the vendorID entered by the user
	var vendorDetailsVendorID = $('#vendorDetailsVendorID').val();
	
	// Call the deleteVendor.php script only if there is a value in the
	// vendor ID textbox
	if(vendorDetailsVendorID != ''){
		$.ajax({
			url: 'model/vendor/deleteVendor.php',
			method: 'POST',
			data: {vendorDetailsVendorID:vendorDetailsVendorID},
			success: function(data){
				$('#vendorDetailsMessage').fadeIn();
				$('#vendorDetailsMessage').html(data);
			},
			complete: function(){
				searchTableCreator('vendorDetailsTableDiv', vendorDetailsSearchTableCreatorFile, 'vendorDetailsTable');
				reportsTableCreator('vendorReportsTableDiv', vendorReportsSearchTableCreatorFile, 'vendorReportsTable');
			}
		});
	}
}


// Function to send customerID so that customer details can be pulled from db
// to be displayed on customer details tab
function getCustomerDetailsToPopulate(){
	// Get the customerID entered in the text box
	var customerDetailsCustomerID = $('#customerDetailsCustomerID').val();
	
	// Call the populateBookDetails.php script to get book details
	// relevant to the bookNumber which the user entered
	$.ajax({
		url: 'model/customer/populateCustomerDetails.php',
		method: 'POST',
		data: {customerID:customerDetailsCustomerID},
		dataType: 'json',
		success: function(data){
			//$('#customerDetailsCustomerID').val(data.customerID);
			$('#customerDetailsCustomerFullName').val(data.fullName);
			$('#customerDetailsCustomerMobile').val(data.mobile);
			$('#customerDetailsCustomerPhone2').val(data.phone2);
			$('#customerDetailsCustomerEmail').val(data.email);
			$('#customerDetailsCustomerAddress').val(data.address);
			$('#customerDetailsCustomerAddress2').val(data.address2);
			$('#customerDetailsCustomerCity').val(data.city);
			$('#customerDetailsCustomerDistrict').val(data.district).trigger("chosen:updated");
			$('#customerDetailsStatus').val(data.status).trigger("chosen:updated");
		}
	});
}


// Function to send customerID so that customer details can be pulled from db
// to be displayed on sale details tab
function getCustomerDetailsToPopulateSaleTab(){
	// Get the customerID entered in the text box
	var customerDetailsCustomerID = $('#saleDetailsCustomerID').val();
	
	// Call the populateCustomerDetails.php script to get customer details
	// relevant to the customerID which the user entered
	$.ajax({
		url: 'model/customer/populateCustomerDetails.php',
		method: 'POST',
		data: {customerID:customerDetailsCustomerID},
		dataType: 'json',
		success: function(data){
			//$('#saleDetailsCustomerID').val(data.customerID);
			$('#saleDetailsCustomerName').val(data.fullName);
		}
	});
}


// Function to send vendorID so that vendor details can be pulled from db
// to be displayed on vendor details tab
function getVendorDetailsToPopulate(){
	// Get the vendorID entered in the text box
	var vendorDetailsVendorID = $('#vendorDetailsVendorID').val();
	
	// Call the populateVendorDetails.php script to get vendor details
	// relevant to the vendorID which the user entered
	$.ajax({
		url: 'model/vendor/populateVendorDetails.php',
		method: 'POST',
		data: {vendorDetailsVendorID:vendorDetailsVendorID},
		dataType: 'json',
		success: function(data){
			//$('#vendorDetailsVendorID').val(data.vendorID);
			$('#vendorDetailsVendorFullName').val(data.fullName);
			$('#vendorDetailsVendorMobile').val(data.mobile);
			$('#vendorDetailsVendorPhone2').val(data.phone2);
			$('#vendorDetailsVendorEmail').val(data.email);
			$('#vendorDetailsVendorAddress').val(data.address);
			$('#vendorDetailsVendorAddress2').val(data.address2);
			$('#vendorDetailsVendorCity').val(data.city);
			$('#vendorDetailsVendorDistrict').val(data.district).trigger("chosen:updated");
			$('#vendorDetailsStatus').val(data.status).trigger("chosen:updated");
		}
	});
}


// Function to send purchaseID so that purchase details can be pulled from db
// to be displayed on purchase details tab
function getPurchaseDetailsToPopulate(){
	// Get the purchaseID entered in the text box
	var purchaseDetailsPurchaseID = $('#purchaseDetailsPurchaseID').val();
	
	// Call the populatePurchaseDetails.php script to get book details
	// relevant to the bookNumber which the user entered
	$.ajax({
		url: 'model/purchase/populatePurchaseDetails.php',
		method: 'POST',
		data: {purchaseDetailsPurchaseID:purchaseDetailsPurchaseID},
		dataType: 'json',
		success: function(data){
			//$('#purchaseDetailsPurchaseID').val(data.customerID);
			$('#purchaseDetailsBookNumber').val(data.bookNumber);
			$('#purchaseDetailsPurchaseDate').val(data.purchaseDate);
			$('#purchaseDetailsBookName').val(data.bookName);
			$('#purchaseDetailsQuantity').val(data.quantity);
			$('#purchaseDetailsUnitPrice').val(data.unitPrice);
			$('#purchaseDetailsVendorName').val(data.vendorName).trigger("chosen:updated");
		},
		complete: function(){
			calculateTotalInPurchaseTab();
			getBookStockToPopulate('purchaseDetailsBookNumber', getBookStockFile, 'purchaseDetailsCurrentStock');
		}
	});
}


// Function to send saleID so that sale details can be pulled from db
// to be displayed on sale details tab
function getSaleDetailsToPopulate(){
	// Get the saleID entered in the text box
	var saleDetailsSaleID = $('#saleDetailsSaleID').val();
	
	// Call the populateSaleDetails.php script to get book details
	// relevant to the bookNumber which the user entered
	$.ajax({
		url: 'model/sale/populateSaleDetails.php',
		method: 'POST',
		data: {saleDetailsSaleID:saleDetailsSaleID},
		dataType: 'json',
		success: function(data){
			//$('#saleDetailsSaleID').val(data.saleID);
			$('#saleDetailsBookNumber').val(data.bookNumber);
			$('#saleDetailsCustomerID').val(data.customerID);
			$('#saleDetailsCustomerName').val(data.customerName);
			$('#saleDetailsBookName').val(data.bookName);
			$('#saleDetailsSaleDate').val(data.saleDate);
			$('#saleDetailsDiscount').val(data.discount);
			$('#saleDetailsQuantity').val(data.quantity);
			$('#saleDetailsUnitPrice').val(data.unitPrice);
		},
		complete: function(){
			calculateTotalInSaleTab();
			getBookStockToPopulate('saleDetailsBookNumber', getBookStockFile, 'saleDetailsTotalStock');
		}
	});
}


// Function to call the upateBookDetails.php script to UPDATE book data in db
function updateBook() {
	var bookDetailsbookId = $('#bookDetailsbookId').val();
	var bookDetailsbookName = $('#bookDetailsbookName').val();
	var bookDetailsStatus = $('#bookDetailsStatus').val();
	var bookDetailsDescription = $('#bookDetailsDescription').val();
	var bookAuthor = $('#bookAuthor').val();
	var bookTopic = $('#bookTopic').val();

	
	$.ajax({
		url: 'model/item/updateItemDetails.php',
		method: 'POST',
		data: {
			bookDetailsbookId:bookDetailsbookId,
			bookDetailsbookName:bookDetailsbookName,
			bookDetailsStatus:bookDetailsStatus,
			bookDetailsDescription:bookDetailsDescription,
			bookAuthor:bookAuthor,
			bookTopic:bookTopic,
		},
		success: function(data){
			console.log(data);
			// var result = $.parseJSON(data);
			$('#bookDetailsMessage').fadeIn();
			// $('#bookDetailsMessage').html(result.alertMessage);
		},
		complete: function(){
			// searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');			
			// searchTableCreator('purchaseDetailsTableDiv', purchaseDetailsSearchTableCreatorFile, 'purchaseDetailsTable');
			// searchTableCreator('saleDetailsTableDiv', saleDetailsSearchTableCreatorFile, 'saleDetailsTable');
			// reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
			// reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
			// reportsSaleTableCreator('saleReportsTableDiv', saleReportsSearchTableCreatorFile, 'saleReportsTable');
		}
	});
}


// Function to call the upateCustomerDetails.php script to UPDATE customer data in db
function updateCustomer() {
	var customerDetailsCustomerID = $('#customerDetailsCustomerID').val();
	var customerDetailsCustomerFullName = $('#customerDetailsCustomerFullName').val();
	var customerDetailsCustomerMobile = $('#customerDetailsCustomerMobile').val();
	var customerDetailsCustomerPhone2 = $('#customerDetailsCustomerPhone2').val();
	var customerDetailsCustomerAddress = $('#customerDetailsCustomerAddress').val();
	var customerDetailsCustomerEmail = $('#customerDetailsCustomerEmail').val();
	var customerDetailsCustomerAddress2 = $('#customerDetailsCustomerAddress2').val();
	var customerDetailsCustomerCity = $('#customerDetailsCustomerCity').val();
	var customerDetailsCustomerDistrict = $('#customerDetailsCustomerDistrict').val();
	var customerDetailsStatus = $('#customerDetailsStatus option:selected').text();
	
	$.ajax({
		url: 'model/customer/updateCustomerDetails.php',
		method: 'POST',
		data: {
			customerDetailsCustomerID:customerDetailsCustomerID,
			customerDetailsCustomerFullName:customerDetailsCustomerFullName,
			customerDetailsCustomerMobile:customerDetailsCustomerMobile,
			customerDetailsCustomerPhone2:customerDetailsCustomerPhone2,
			customerDetailsCustomerAddress:customerDetailsCustomerAddress,
			customerDetailsCustomerEmail:customerDetailsCustomerEmail,
			customerDetailsCustomerAddress2:customerDetailsCustomerAddress2,
			customerDetailsCustomerCity:customerDetailsCustomerCity,
			customerDetailsCustomerDistrict:customerDetailsCustomerDistrict,
			customerDetailsStatus:customerDetailsStatus,
		},
		success: function(data){
			$('#customerDetailsMessage').fadeIn();
			$('#customerDetailsMessage').html(data);
		},
		complete: function(){
			searchTableCreator('customerDetailsTableDiv', customerDetailsSearchTableCreatorFile, 'customerDetailsTable');
			reportsTableCreator('customerReportsTableDiv', customerReportsSearchTableCreatorFile, 'customerReportsTable');
			searchTableCreator('saleDetailsTableDiv', saleDetailsSearchTableCreatorFile, 'saleDetailsTable');
			reportsSaleTableCreator('saleReportsTableDiv', saleReportsSearchTableCreatorFile, 'saleReportsTable');
		}
	});
}


// Function to call the upateVendorDetails.php script to UPDATE vendor data in db
function updateVendor() {
	var vendorDetailsVendorID = $('#vendorDetailsVendorID').val();
	var vendorDetailsVendorFullName = $('#vendorDetailsVendorFullName').val();
	var vendorDetailsVendorMobile = $('#vendorDetailsVendorMobile').val();
	var vendorDetailsVendorPhone2 = $('#vendorDetailsVendorPhone2').val();
	var vendorDetailsVendorAddress = $('#vendorDetailsVendorAddress').val();
	var vendorDetailsVendorEmail = $('#vendorDetailsVendorEmail').val();
	var vendorDetailsVendorAddress2 = $('#vendorDetailsVendorAddress2').val();
	var vendorDetailsVendorCity = $('#vendorDetailsVendorCity').val();
	var vendorDetailsVendorDistrict = $('#vendorDetailsVendorDistrict').val();
	var vendorDetailsStatus = $('#vendorDetailsStatus option:selected').text();
	
	$.ajax({
		url: 'model/vendor/updateVendorDetails.php',
		method: 'POST',
		data: {
			vendorDetailsVendorID:vendorDetailsVendorID,
			vendorDetailsVendorFullName:vendorDetailsVendorFullName,
			vendorDetailsVendorMobile:vendorDetailsVendorMobile,
			vendorDetailsVendorPhone2:vendorDetailsVendorPhone2,
			vendorDetailsVendorAddress:vendorDetailsVendorAddress,
			vendorDetailsVendorEmail:vendorDetailsVendorEmail,
			vendorDetailsVendorAddress2:vendorDetailsVendorAddress2,
			vendorDetailsVendorCity:vendorDetailsVendorCity,
			vendorDetailsVendorDistrict:vendorDetailsVendorDistrict,
			vendorDetailsStatus:vendorDetailsStatus,
		},
		success: function(data){
			$('#vendorDetailsMessage').fadeIn();
			$('#vendorDetailsMessage').html(data);
		},
		complete: function(){
			searchTableCreator('purchaseDetailsTableDiv', purchaseDetailsSearchTableCreatorFile, 'purchaseDetailsTable');
			searchTableCreator('vendorDetailsTableDiv', vendorDetailsSearchTableCreatorFile, 'vendorDetailsTable');
			reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
			reportsTableCreator('vendorReportsTableDiv', vendorReportsSearchTableCreatorFile, 'vendorReportsTable');
		}
	});
}


// Function to call the updatePurchase.php script to update purchase data to db
function updatePurchase() {
	var purchaseDetailsBookNumber = $('#purchaseDetailsBookNumber').val();
	var purchaseDetailsPurchaseDate = $('#purchaseDetailsPurchaseDate').val();
	var purchaseDetailsBookName = $('#purchaseDetailsBookName').val();
	var purchaseDetailsQuantity = $('#purchaseDetailsQuantity').val();
	var purchaseDetailsUnitPrice = $('#purchaseDetailsUnitPrice').val();
	var purchaseDetailsPurchaseID = $('#purchaseDetailsPurchaseID').val();
	var purchaseDetailsVendorName = $('#purchaseDetailsVendorName').val();
	
	$.ajax({
		url: 'model/purchase/updatePurchase.php',
		method: 'POST',
		data: {
			purchaseDetailsBookNumber:purchaseDetailsBookNumber,
			purchaseDetailsPurchaseDate:purchaseDetailsPurchaseDate,
			purchaseDetailsBookName:purchaseDetailsBookName,
			purchaseDetailsQuantity:purchaseDetailsQuantity,
			purchaseDetailsUnitPrice:purchaseDetailsUnitPrice,
			purchaseDetailsPurchaseID:purchaseDetailsPurchaseID,
			purchaseDetailsVendorName:purchaseDetailsVendorName,
		},
		success: function(data){
			$('#purchaseDetailsMessage').fadeIn();
			$('#purchaseDetailsMessage').html(data);
		},
		complete: function(){
			getBookStockToPopulate('purchaseDetailsBookNumber', getBookStockFile, 'purchaseDetailsCurrentStock');
			searchTableCreator('purchaseDetailsTableDiv', purchaseDetailsSearchTableCreatorFile, 'purchaseDetailsTable');
			reportsPurchaseTableCreator('purchaseReportsTableDiv', purchaseReportsSearchTableCreatorFile, 'purchaseReportsTable');
			searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');
			reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
		}
	});
}


// Function to call the updateSale.php script to update sale data to db
function updateSale() {
	var saleDetailsBookNumber = $('#saleDetailsBookNumber').val();
	var saleDetailsSaleDate = $('#saleDetailsSaleDate').val();
	var saleDetailsBookName = $('#saleDetailsBookName').val();
	var saleDetailsQuantity = $('#saleDetailsQuantity').val();
	var saleDetailsUnitPrice = $('#saleDetailsUnitPrice').val();
	var saleDetailsSaleID = $('#saleDetailsSaleID').val();
	var saleDetailsCustomerName = $('#saleDetailsCustomerName').val();
	var saleDetailsDiscount = $('#saleDetailsDiscount').val();
	var saleDetailsCustomerID = $('#saleDetailsCustomerID').val();
	
	$.ajax({
		url: 'model/sale/updateSale.php',
		method: 'POST',
		data: {
			saleDetailsBookNumber:saleDetailsBookNumber,
			saleDetailsSaleDate:saleDetailsSaleDate,
			saleDetailsBookName:saleDetailsBookName,
			saleDetailsQuantity:saleDetailsQuantity,
			saleDetailsUnitPrice:saleDetailsUnitPrice,
			saleDetailsSaleID:saleDetailsSaleID,
			saleDetailsCustomerName:saleDetailsCustomerName,
			saleDetailsDiscount:saleDetailsDiscount,
			saleDetailsCustomerID:saleDetailsCustomerID,
		},
		success: function(data){
			$('#saleDetailsMessage').fadeIn();
			$('#saleDetailsMessage').html(data);
		},
		complete: function(){			
			getBookStockToPopulate('saleDetailsBookNumber', getBookStockFile, 'saleDetailsTotalStock');
			searchTableCreator('saleDetailsTableDiv', saleDetailsSearchTableCreatorFile, 'saleDetailsTable');
			reportsSaleTableCreator('saleReportsTableDiv', saleReportsSearchTableCreatorFile, 'saleReportsTable');
			searchTableCreator('bookDetailsTableDiv', bookDetailsSearchTableCreatorFile, 'bookDetailsTable');
			reportsTableCreator('bookReportsTableDiv', bookReportsSearchTableCreatorFile, 'bookReportsTable');
		}
	});
}