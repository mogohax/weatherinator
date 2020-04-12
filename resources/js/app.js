import $ from 'jquery';
import bootstrap from 'bootstrap';

(function($) {
    'use strict';

    $(document).ready(function () {
        $('[data-action="load-weather"]').on('submit', function (e) {
            e.preventDefault();
            const $form = $(e.currentTarget);

            const apiKey = $form.find('[name="api_key"]').val();
            const city = $form.find('[name="city"]').val();

            const $errorHolder = $form.find('.js-error-holder').text('').fadeOut();

            if (apiKey && city) {
                const endpoint = $form.data('endpoint');

                $.ajax({
                    method: 'GET',
                    url: endpoint,
                    data:{'city': city, 'api_key': apiKey},
                    success: function (data) {
                        addTabContent({
                            name: data.city.name,
                            current_value: data.temperature.current.value,
                            current_units: data.temperature.current.units.symbol,
                            feels_value: data.temperature.feels_like.value,
                            feels_units: data.temperature.feels_like.units.symbol,
                            wind_value: data.wind_speed.value,
                            wind_units: data.wind_speed.units.symbol,
                        });

                        // add tab to DOM and show it
                        addTab({
                            title: data.city.name
                        }).find('.nav-link').tab('show');
                    },
                    error: function (error) {
                        $errorHolder
                            .text(error.responseJSON.message || "Unknown error. Please try again later")
                            .fadeIn();
                    }
                })
            }

        });
    });

    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);

    function loadTemplate(name) {
        return $(`script[data-template="${name}"]`).text().split(/\$\{(.+?)\}/g);
    }

    function renderTemplate(props) {
        return function (tok, i) {
            return (i % 2) ? props[tok] : tok;
        };
    }

    function addTabContent(props) {
        const $tabContainer = $('.js-tab-content');
        const tabContentTemplate = loadTemplate('tab-content');

        // render and append new element from template into the container
        return $(tabContentTemplate.map(renderTemplate(props)).join(''))
            .appendTo($tabContainer);
    }

    function addTab(props) {
        const $tabContainer = $('.js-tabs');
        const tabTemplate = loadTemplate('tab');

        // render and append new element from template into the container
        return $(tabTemplate.map(renderTemplate(props)).join(''))
            .appendTo($tabContainer);
    }
})($);
