



// loading
document.addEventListener('DOMContentLoaded', function() {
    const loadingIndicator = document.getElementById('loading-indicator');
    const forms = document.querySelectorAll('form');
    const button = document.getElementById('button1');

    // ketika disubmit buttomya hilang, loadingnya muncul
    forms.forEach(function(form) {
      form.addEventListener('submit', function(event) {
        loadingIndicator.classList.remove('hidden');
        button.classList.add('hidden');
      });
    });
  
    const xhr = new XMLHttpRequest();
    xhr.addEventListener('loadstart', function() {
      loadingIndicator.classList.remove('hidden');
    });
    xhr.addEventListener('loadend', function() {
      loadingIndicator.classList.add('hidden');
    });
  });