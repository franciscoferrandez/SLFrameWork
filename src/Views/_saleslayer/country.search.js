$(function() {
  
	function initialize() {

  		// activar tooltips definidos
 		$('[data-toggle="tooltip"]').tooltip(); 

 		// asignación dinámica de botones de comando
 		$('[aria-command]').each(function( index ) {
	  		$( this ).on('click', window[$(this).attr("aria-command")]);
		});

		// submit de formulario al hacer intro
		$('input').keypress(function (e) {
		  if (e.which == 13) {

		    $('[type="submit"]',$(this).parents('form:first')).click();
		    return false;    //<---- Add this line
		  }
		});

		$("#searchCountryForm").submit(function(e){
		    e.preventDefault();
		    var form = this;
			if( $('#searchAjax', form).is(':checked') ) {
				request = formAjax(form).then(function () {
						$('.loading-overlay').hide();
						$('#searchCountryName').focus().select();
						initialize();
				});
			} else {
				form.submit();
			}
		});
	}



	initialize();
 
});


function formAjax(form) {
    var url = $(form).attr('action');
    var method = $(form).attr('method');
	var data = $(form).serializeArray(); // convert form to array
	data.push({name: "ajax", value: true});
    var request = $.ajax({
           type: method,
           url: url,
           data: data, // serializes the form's elements.
		   beforeSend: function( xhr ) {
	    		$('.loading-overlay').show();
	  	   }
         });

		request.done(function( msg ) {
		  $("main").html(msg);
		});
		 
		request.fail(function( jqXHR, textStatus ) {
		  alert( "Request failed: " + textStatus );
		  $('.loading-overlay').hide();
		});

	return request;
}

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