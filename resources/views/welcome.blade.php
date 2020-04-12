<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weatherinator</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    </head>
    <body class="bg-light">

        <div class="container">
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"
                     alt="" width="72" height="72">
                <h2>Weather data</h2>
                <p class="lead">Below is an example weather application. It interfaces with the backend via ajax calls. Checkout API Docs <a href="/api/documentation">HERE!</a></p>
            </div>

            <div class="row">
                <div class="offset-md-3 col-md-6 mb-4">
                    <h4 class="mb-3">City Weather</h4>
                    <form class="needs-validation" novalidate data-action="load-weather" data-endpoint="{{ route('api.v1.weather.get_weather') }}">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="api_key" placeholder="Your API key" required="required" aria-required="true">
                            <div class="invalid-feedback">
                                API key is required
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="City name" name="city" required="required" aria-required="true">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-success">
                                        Check <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="invalid-feedback">
                                    City name is required
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger js-error-holder" role="alert" style="display: none;">
                                    This is a danger alert—check it out!
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs js-tabs" id="myTab" role="tablist">
                    </ul>
                    <div class="tab-content js-tab-content" id="myTabContent">
                    </div>
                </div>
            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2020</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="/api/documentation">Docs</a></li>
                </ul>
            </footer>
        </div>

        <script src="{{ asset('/js/app.js') }}"></script>
        <script type="text/template" data-template="tab">
            <li class="nav-item">
                <a class="nav-link" id="${title}-tab" data-toggle="tab" href="#${title}" role="tab" aria-controls="${title}" aria-selected="false">${title}</a>
            </li>
        </script>
        <script type="text/template" data-template="tab-content">
            <div class="tab-pane fade" id="${name}" role="tabpanel" aria-labelledby="home-tab">
                <dl class="row">
                    <dt class="col-sm-3">City name</dt>
                    <dd class="col-sm-9">${name}</dd>

                    <dt class="col-sm-3">Current temperature</dt>
                    <dd class="col-sm-9">${current_value}${current_units}</dd>

                    <dt class="col-sm-3">Feels like</dt>
                    <dd class="col-sm-9">${feels_value}${feels_units}</dd>

                    <dt class="col-sm-3">Wind Speed</dt>
                    <dd class="col-sm-9">${wind_value}${wind_units}</dd>
                </dl>
            </div>
        </script>
    </body>
</html>
