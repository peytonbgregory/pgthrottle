import 'popper.js/dist/popper'; // Load Popper.js before Bootstrap

import 'bootstrap/js/dist/util'; // Required
import 'bootstrap/js/dist/alert';
import 'bootstrap/js/dist/button';
import 'bootstrap/js/dist/carousel';
import 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/dropdown';
import 'bootstrap/js/dist/index';
import 'bootstrap/js/dist/modal';
import 'bootstrap/js/dist/popover';
import 'bootstrap/js/dist/scrollspy';
import 'bootstrap/js/dist/tab';
import 'bootstrap/js/dist/toast';
import 'bootstrap/js/dist/tooltip';



// ADA Compliance - External Links open dialog
jQuery('a').filter(function () {
    return this.hostname && this.hostname !== location.hostname;
}).click(function (e) {
    if (!confirm("You are about to proceed to an external website.")) {
        // if user clicks 'no' then dont proceed to link.
        e.preventDefault();
    };
});
