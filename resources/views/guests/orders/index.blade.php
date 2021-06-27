<!-- braintree -->
<!-- 
Card Number: 4111 1111 1111 1111
Expiration Date: 09/22
 -->
<!-- html -->
<script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.js"></script>

<div id="dropin-container"></div>
<button id="submit-button" class="button button--small button--green">Purchase</button>
<!-- css -->
<style>
.button {
  cursor: pointer;
  font-weight: 500;
  left: 3px;
  line-height: inherit;
  position: relative;
  text-decoration: none;
  text-align: center;
  border-style: solid;
  border-width: 1px;
  border-radius: 3px;
  -webkit-appearance: none;
  -moz-appearance: none;
  display: inline-block;
}

.button--small {
  padding: 10px 20px;
  font-size: 0.875rem;
}

.button--green {
  outline: none;
  background-color: #64d18a;
  border-color: #64d18a;
  color: white;
  transition: all 200ms ease;
}

.button--green:hover {
  background-color: #8bdda8;
  color: white;
}
</style>
<!-- js -->
<script>
var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_7b83drqs_8mwh82p8nbkbbr3n',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});
</script>