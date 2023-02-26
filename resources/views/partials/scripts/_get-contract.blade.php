@include('partials.scripts._get-param-from-url')
<script>

    var id = getParamFromUrl("contractId");
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                var response = xhr.response;
                var dates = response.monthly_percentage.map(function(ob) {
                    return ob.month;
                })
                var cryptoValues = response.monthly_percentage.map(function(ob) {
                    return ob.value;
                })
                var usdValues = response.monthly_percentage.map(function(ob) {
                    return ob.value_in_usd;
                })
                
                var chart = showChart(
                    response.currency,
                    dates,
                    cryptoValues
                );

                setEventListenersForPriceCurrency(cryptoValues, usdValues, chart);

            } else {
                var errorMessage = document.getElementById('error-message');
                errorMessage.innerHTML = 'Something went wrong';
            }
        }
    };

    xhr.open('GET', '/contract/' + id);
    xhr.responseType = 'json';
    xhr.send();

    // This event listeners are responsible to change the price currency from US Dolar
    // to some crypto-currency or vice-versa
    function setEventListenersForPriceCurrency(cryptoValues, usdValues, chart) {
        const usdButton = document.getElementById('show-usd-price-button');
        const cryptoButton = document.getElementById('show-crypto-price-button');

        usdButton.addEventListener('click', () => {
            usdButton.classList.add('is-info');
            cryptoButton.classList.remove('is-info');

            chart.data.datasets[0].data = usdValues;
            chart.update();
        });

        cryptoButton.addEventListener('click', () => {
            cryptoButton.classList.add('is-info');
            usdButton.classList.remove('is-info');

            chart.data.datasets[0].data = cryptoValues;
            chart.update();
        });
    }
</script>