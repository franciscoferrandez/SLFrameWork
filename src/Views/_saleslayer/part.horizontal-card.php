{% if model.countries is not empty %}
    {% for country in model.countries %}
        {% if model.source == 'online' %}
            {% set source_class = 'text-success' %}
        {% else %}
            {% set source_class = 'text-danger' %}
        {% endif %}
        {% block content %}
        <div class="col-md-12 mt-4">
              <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 {{source_class}}">{{model.source}}</strong>
                  <h3 class="mb-0">{{country.name}} <span class="text-muted" style="font-size:small">({{country.alpha3Code}})</span></h3>
                  <div class="mb-1 text-muted">{% if country.name != country.nativeName%}{{country.nativeName}}{%endif%}</div>
                  <p class="mb-auto"><b>Capital:</b> {{country.capital}}</p>
                  <p class="mb-auto"><b>Region:</b> {{country.region}}</p>
                  <p class="mb-auto"><b>Suregion:</b> {{country.subregion}}</p>
                  <a href="https://www.google.com/maps/@?api=1&map_action=map&center={{country.latlng|join(',')}}&zoom=6&basemap=satellite" target=_blank class="stretched-link mt-4">View in Google Maps</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  <img src="{{country.flag}}" class="bd-placeholder-img" width="300" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="{{country.name}}">
                    <title>{{country.name}}</title></img>
                </div>
              </div>
            </div>
        {% endblock %}
    {% endfor %}
{% else %}
    <p>No hay resultados</p>
{% endif %}