/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
const $ = require('jquery');

require('./styles/app.scss');
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
require('./styles/toastr.css');
import './styles/toastr.css';


// start the Stimulus application
import './bootstrap';
import './bo_js/toastr';
import './bo_js/datatable';

import { definitionsFromContext } from '@stimulus/webpack-helpers';

require( 'datatables.net-buttons/js/buttons.colVis.js' )(); 
require( 'datatables.net-buttons/js/buttons.html5.js' )();  
require( 'datatables.net-buttons/js/buttons.print.js' )();

_initToastr();

function _initToastr(){
    // notifications by TOASTR
    let $notifications = getConfiguration().notifications;

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "50000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    if (0 < $notifications.length) {
        $.each($notifications, function (key, value) {
            if (value.label.includes('success')) {
                toastr.success(value.message);
            } else if (value.label.includes('error')) {
                toastr.error(value.message);
            } else {
                toastr.info(value.message);
            }
        });
    }
}

function getConfiguration() {
    return {
        "vars": $("#js-vars").data("vars"),
        "notifications": $("#js-notifications").data("notifications"),
    };
}