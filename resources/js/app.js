import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import Inputmask from "inputmask";

document.addEventListener('DOMContentLoaded', function() {
    const moneyFields = document.querySelectorAll('input[data-mask="money"]');
    moneyFields.forEach(field => {
        Inputmask("decimal", {
            groupSeparator: ".",
            radixPoint: ",",
            digits: 2,
            autoGroup: true,
            rightAlign: false,
            removeMaskOnSubmit: true
        }).mask(field);
    });
});
