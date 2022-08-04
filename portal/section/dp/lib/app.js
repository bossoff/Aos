// var handler = PaystackPop.setup({
// 	key: 'Your_public_key', //put your public key here
// 	email: 'Customer@gmail.com' //put customer email here
// 	amount: 300000, //amount the cumtomer post to pay
// 	metadata: {
// 		custom_fields: [
// 			{
// 				display_name: "Mobile_Number",
// 				variable_name: "mobile_number",
// 				value: "+2348167735273" // Customer's mobile number
// 			}
// 		]
// 	},

// 	callback: function (respose) {
// 		// after the transaction have completed
// 		alert('success. transaction ref is' + respose); //transerction 
// 	}, 
// 	onClose: function(){
// 		//when the user close the payment modal
// 		alert('Transaction Cancilled');
// 	}
// });




function payWithPaystack() {

    var handler = PaystackPop.setup({ 
        key: 'pk_test_74da26e0cce5039826ef2c9e70955dd4c6ee84f0', //put your public key here
        email: 'rajiatlive@gmail.com', //put your customer's email here
        amount: 370000, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: "Raji Samad",
                    variable_name: "mobile_number",
                    value: "+2348012345678" //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment 
            //using transaction reference as post data
            $.post("verify.php", {reference:response.reference}, function(status){
                if(status == "success")
                    //successful transaction
                    alert('Transaction was successful');
                else
                    //transaction failed
                    alert(response);
            });
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}