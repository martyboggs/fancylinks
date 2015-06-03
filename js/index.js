jQuery(function () {
    var localize = window.localize;
    var History = window.History;
    if (!History.enabled) {
        return false;
    }

    var lsAvailable = false;
    if (Modernizr.localstorage) {
        var lsAvailable = true;

        // add clear button for debugging
        if (localize.userLoggedIn) {
            jQuery('.header-bar').append('<button class="btn btn-primary" id="cache-clear">clear cache</button>');
            jQuery('#cache-clear').on('click', function (e) {
                localStorage.clear();
            });
        }
    }

    // statechange (initial load gets php template)
    History.Adapter.bind(window, 'statechange', function () {
        var state = History.getState();
        var d = new Date();
        var now = d.getTime();
        var useCache = false;

        // ga register click (whether ajax or ls)
        if (localize.ga) {
            ga('send', 'pageview', { page: state.url });
        }

        // get cache if it exists
        if (lsAvailable) {
            if (state.url in localStorage && state.url + 'exp' in localStorage) {
                var cache = localStorage[state.url];
                var exp = localStorage[state.url + 'exp'];
                if (exp > now) {
                    useCache = true
                }
            }
        }

        if (useCache) {
            jQuery('#content').replaceWith(cache);
            var used = unescape(encodeURIComponent(JSON.stringify(localStorage))).length / 1000;
            console.log('expiration in ' + ((exp - now) / 1000) + ' seconds... AAA!');
            // console.log('remaining space (kb): ' + (1.024 * 1024 * 5 - used));
            console.log('used space (kb): ' + used);
        } else {
            jQuery('#content').empty();
            var end = state.url.slice(localize.home.length);
            var url = localize.home + '/partials' + end;
            jQuery.get(url + ' #content', function (data) {
                jQuery('#content').replaceWith(data);
                localStorage[state.url] = data;
                localStorage[state.url + 'exp'] = now + 86400000; // expires after 24 hrs.
            });
        }
    });

    jQuery(document.body).on('click', 'a', function (e) {
        e = e || window.event;
        var target = jQuery(this);
        var link = target.prop('href');

        if (link.indexOf(location.hostname) !== -1
        && link.indexOf('wp-login.php?action=logout') === -1
        && link.indexOf('/wp-admin/') === -1
        && link.search(/\.(...)$/) === -1) {
            e.preventDefault();
            History.pushState(null, target.text() + ' - Marty\'s Test Website', link);
        }
    });
});

// now json api is not required
// now pretty permalinks aren't required
// now most of the code is gone lol

// function setHeight() {
//     jQuery('section.interstitial').each(function () {
//         jQuery(this).css('height', jQuery(this).children(':first').height() + 90);
//     });
// }
