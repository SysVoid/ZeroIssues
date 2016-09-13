var app = new (function () {
    var _jsDictionary           = null,
        _jsDictionaryFetched    = false;

    var _base = document.getElementsByTagName('head')[0].getElementsByTagName('base')[0].href;

    (function () {
        _fetchDictionary();
    })();

    function formSubmit(elements, callback) {
        elements = Array.from(elements);
        elements.forEach(function (element) {
            if (element.addEventListener) {
                element.addEventListener('submit', callback, false);
            } else if (element.attachEvent) {
                element.attachEvent('onsubmit', callback);
            }
        });
    }

    function _getIndex(object, dotNotation) {
        return dotNotation.split('.').reduce(function (obj, i) {
            return obj[i];
        }, object);
    }

    function _ajax(url, callback) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                callback(xmlhttp.responseText);
            }
        };
        xmlhttp.open('GET', url, true);
        xmlhttp.send();
    }

    function _fetchDictionary() {
        _ajax(_base + '/jsdict', _setDictionary);
    }

    function _setDictionary(data) {
        _jsDictionary = JSON.parse(data);
        _jsDictionaryFetched = true;
    }

    function i18n(key) {
        if (!_jsDictionaryFetched) {
            return '[Missing Translation]';
        }

        var lang = _getIndex(_jsDictionary, key);
        return (lang == undefined ? '[Missing Translation]' : lang);
    }

    return {
        formSubmit: formSubmit,
        i18n: i18n
    };
})();

app.formSubmit(document.getElementsByTagName('form'), function (e) {
    Array.from(e.target.getElementsByTagName('button')).forEach(function (btn) {
        if (btn.type === 'submit') {
            btn.innerHTML = app.i18n('forms.processing_button');
        }
    });
});
