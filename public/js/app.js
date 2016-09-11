function Application() {
    this.formSubmit = function (elements, callback) {
        elements = Array.from(elements);
        elements.forEach(function (element) {
            if (element.addEventListener) {
                element.addEventListener('submit', callback, false);
            } else if (element.attachEvent) {
                element.attachEvent('onsubmit', callback);
            }
        });
    };
};

var application = new Application();
application.formSubmit(document.getElementsByTagName('form'), function (e) {
    Array.from(e.target.getElementsByTagName('button')).forEach(function (btn) {
        if (btn.type === 'submit') {
            btn.innerHTML = 'Processing...';
        }
    });
});
