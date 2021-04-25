{% if _post.ajax  %}
    {% set extendedTemplate = "blank.php" %}
{% else %}
    {% set extendedTemplate = "dashboard.php" %}
{% endif %}
{% extends extendedTemplate %}
{% block content %}
<div class="col-md-12 mt-4">

      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative p-4">
        <div class="btn-group ml-auto" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary" aria-command="importData" data-toggle="tooltip" data-placement="top" title="Import data from Restcountry to local database">Import</button>
          <button type="button" class="btn btn-secondary" aria-command="truncateData" data-toggle="tooltip" data-placement="top" title="Empty all data from local database">Empty</button>
          <button type="button" class="btn btn-secondary" aria-command="setTestData" data-toggle="tooltip" data-placement="top" title="Remove Spain from local database for testing purposes">Remove Spain</button>
        </div>
      </div>

      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative p-4">
        <form class="w-100" method="POST" id="searchCountryForm">
          <div class="form-row align-items-center">
            <div class="col-9">
              <label class="sr-only" for="inlineFormInput">Country Name</label>
              <input type="text" class="form-control mb-2" id="searchCountryName" name="searchCountryName" placeholder="Enter country name" autofocus value="{{_post.searchCountryName}}">
            </div>
            <div class="col-auto">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
                Search</button>
            </div>
          </div>
          <div class="form-row align-items-center">
            <div class="col-auto m-2">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="searchOffline" name="searchOffline" {{ _post.searchOffline ? 'checked' : '' }}>
                <label class="form-check-label" for="searchOffline">
                  Offline
                </label>
              </div>
            </div>
            <div class="col-auto m-2">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="searchAjax" name="searchAjax" {{ _post.searchAjax ? 'checked' : '' }}>
                <label class="form-check-label" for="searchAjax">
                  Ajax
                </label>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    {% include 'part.horizontal-card.php' %}
{% endblock %}
{% block scripts %}
    {{ parent() }}
    <script src="/src/Views/{{env.APPLICATION_THEME}}/country.search.js"></script>
{% endblock %}