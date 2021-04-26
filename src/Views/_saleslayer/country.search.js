$(function() {
  
	function initialize() {

  		// activar tooltips definidos
 		$('[data-toggle="tooltip"]').tooltip(); 

 		// asignación dinámica de botones de comando
 		$('[aria-command]').each(function( index ) {
	  		$( this ).on('click', window[$(this).attr("aria-command")]);
		});

 		// asignación dinámica de botones de comando
 		$('a.viewCountryInfo').each(function( index ) {
	  		$( this ).on('click', function (e) {
	  			e.preventDefault();
	  			$('#bootstrapModal').modal('show', $(this));
	  		});
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

	// evento al mostrar el popup
	$('#bootstrapModal').on('show.bs.modal', function (e) {

		var modal = $(this);
		var modalBody = $(".modal-body", this);
		var modalTitle = $(".modal-title", this);
		var src = $(e.relatedTarget);

		modalBody.html("<div id='map' style='width:100%;height:600px;'></div>");
		modalTitle.html(src.attr("countryName"));

		setTimeout(function () {
			var map = L.map('map').
			setView(JSON.parse(src.attr('latlng')), 
			4);
			 
			L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
			    maxZoom: 14
			}).addTo(map);

			L.control.scale().addTo(map);
			L.marker(JSON.parse(src.attr('latlng')), {draggable: true}).addTo(map);

			map.invalidateSize();
		},500);

	})


 
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