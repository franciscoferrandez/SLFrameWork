$(function() {
  
  		// activar tooltips definidos
 		$('[data-toggle="tooltip"]').tooltip(); 

 		// asignación dinámica de botones de comando
 		$('[aria-command]').each(function( index ) {
	  		$( this ).on('click', window[$(this).attr("aria-command")]);
		});
 
});

function simpleAjax(callUrl) {
	var request = $.ajax({
	  url: callUrl,
	  method: "GET",
	  //data: { id : menuId },
	  //dataType: "html"
	  beforeSend: function( xhr ) {
    		$('.loading-overlay').show();
  		}
	});
	 
	request.done(function( msg ) {
	  $( "#log" ).html( msg );
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});

	request.always(function( jqXHR, textStatus ) {
	  $('.loading-overlay').hide();
	});

	return request;
}

function importData() {
	request = simpleAjax("/rest/Country/import").then(function() {simpleAjax("/rest/CountryName/import")});
}


function truncateData() {
	request = simpleAjax("/rest/Country/truncate").then(function() {simpleAjax("/rest/CountryName/truncate")});
}

function setTestData() {
	request = simpleAjax("/rest/Country/removeByName/Spain");
}