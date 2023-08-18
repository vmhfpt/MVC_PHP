
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AVX3pQkbnvgt4mPcaGq5R84dSZNANoF_42RzHUxALRiEotXy0fWRYl96F_4sLjJJUjpPLi_BImOF67Ca&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Order is created on the server and the order id is returned
        createOrder(data, actions) {
          return actions.order.create({
             purchase_units : [{
                amount : {
                    value : '1.2'
                }
             }]
          })
        },
        // Finalize the transaction on the server after payer approval
        onApprove(data, actions) {
           return actions.order.capture().then(function(orderData){
              const transaction = orderData.purchase_units[0].payments.captures[0];
              const userPayment = orderData.payer;
              
              
              const CountryUserPayment = `Quốc gia : ${userPayment.address.country_code}`;
              const naneUserPayment = `Họ tên : ${userPayment.name.given_name} ${userPayment.name.surname}`
              const idTransaction = `Mã giao dịch : ${transaction.id}`;
              const dateTransaction = `Ngày chuyển ${transaction.create_time}`;
              const detailPrice = `Tổng tiền : ${transaction.amount.value}, tiền tệ : ${transaction.amount.currency_code}`

           });
        }
      }).render('#paypal-button-container');
//sb-g8grq27054856@personal.example.com
//   /=doUA%3
   



    </script>
  </body>
</html>