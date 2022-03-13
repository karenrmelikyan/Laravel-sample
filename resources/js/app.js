require('./bootstrap');
// import '@popperjs/core';
import { Modal } from 'bootstrap';

// Delete modal
(function() {
    const deleteModalEl = document.getElementById('delete-modal-id');
    if (deleteModalEl) {
        const modal = new Modal(deleteModalEl);
        const modalTriggerListener = function (event) {
            event.preventDefault();
            const target = event.currentTarget;

            // Add event on 'Yes' button click
            const confirmBtn = deleteModalEl.querySelector('.btn-confirm');
            const submitForm = function (event) {
                target.removeEventListener('submit', modalTriggerListener);
                target.submit();
            };
            confirmBtn.addEventListener('click', submitForm);
            deleteModalEl.addEventListener('hidden.bs.modal', () => {
                confirmBtn.removeEventListener('click', submitForm);
            });

            modal.show();
        };

        const removeTriggers = document.querySelectorAll('.remove-item');
        removeTriggers.forEach(function(triggerEl) {
            triggerEl.addEventListener('submit', modalTriggerListener);
        });
    }
})();

// Dashboard
document.addEventListener('DOMContentLoaded', (event) => {

    const tag = document.querySelectorAll('.card-text');

    if (tag.length > 0) {
        tag.forEach(function (elem) {
            const url = elem.dataset.url;
            const key = elem.dataset.key;

            if (url !== undefined && key !== undefined) {
                fetch(url).then(response => response.json()).then(data => {
                    elem.textContent = data[key];
                });
            }
        });
    }
})
