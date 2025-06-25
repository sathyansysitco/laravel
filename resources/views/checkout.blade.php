<!DOCTYPE html>
<html>
<head>
    <title>PayPal Checkout</title>
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}"></script>
</head>
<body>
    <h1>Pay with PayPal</h1>

    <div id="paypal-button-container"></div>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return fetch('/create-order', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        amount: '10.00'
                    })
                }).then(res => res.json())
                  .then(order => order.id);
            },
            onApprove: function(data, actions) {
                return fetch('/capture-order', {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        orderID: data.orderID
                    })
                }).then(res => res.json())
                  .then(orderData => {
                      alert('Transaction completed!');
                      console.log(orderData);
                  });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
