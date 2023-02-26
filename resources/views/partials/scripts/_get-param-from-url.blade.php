<script>

function getParamFromUrl(paramName) {
    // Get the query string portion of the current URL
    var queryString = window.location.search.substring(1);

    // Split the query string into an array of "key=value" pairs
    var queryParams = queryString.split('&');

    // Loop through the array and build an object of key-value pairs
    var params = {};
    for (var i = 0; i < queryParams.length; i++) {
        var pair = queryParams[i].split('=');
        var key = decodeURIComponent(pair[0]);
        var value = decodeURIComponent(pair[1]);
        params[key] = value;
    }

    // Get the value of a specific parameter (in this case, "id")
    var param = params[paramName];

    return param;
}

</script>