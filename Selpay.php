<?php session_start(); ?>

<style type="text/css">
/* Variables
–––––––––––––––––––––––––––––––––––––––––––––––––– */
:root {
	--primary-c: #2196F3;
	--secondary-c: #B2D7F5;
	
	--white: #FDFBFB;
	
	--text: #082943;	
	--bg: var(--primary-c);
}


/* Basic Config
–––––––––––––––––––––––––––––––––––––––––––––––––– */
html, body {
	height: 100%;
	padding: 0;
	margin: 0;
}

body {
  background-image: url('1.jpg');
  display: flex;
  justify-content: center;
  align-items: center;
	font-family: 'Raleway', sans-serif;
	color: var(--text);
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}

ul {
	list-style-type: none;
	padding-left: 50px;
	margin: 0;
}

li {
	display: block;
	position: relative;
	padding: 20px 0px;
}

h2 {
	margin: 10px 0;
	font-weight: 900;
}


/* Card
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.card {
	display: flex;
	flex-direction: column;	
	background: var(--white);
	width: 300px;
	padding: 20px 25px;
	border-radius: 20px;
	box-shadow: 0 19px 38px rgba(0, 0, 0, 0.13);
}


/* Radio Button
–––––––––––––––––––––––––––––––––––––––––––––––––– */
input[type=radio] {
	position: absolute;
	visibility: hidden;
}

label { 
	cursor: pointer; 
	font-weight: 400;
}

.check {
	width: 30px; height: 30px;
	position: absolute;
	border-radius: 50%;
	transition: transform .6s cubic-bezier(0.68, -0.55, 0.27, 1.55);
}

.reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
}

input[type="radio"]:checked ~ .reveal-if-active {
  opacity: 1;
  max-height: 100px; /* little bit of a magic number :( */
  overflow: visible;
}

/* Reset */
input#one ~ .check { 
	transform: translate(-50px, -25px); 
	background: var(--secondary-c); 
}
input#two ~ .check { 
	transform: translate(-50px, -215px); 
	background: var(--primary-c);
	box-shadow: 0 6px 12px rgba(33, 150, 243, 0.35);
}

/* Radio Input #1 */
input#one:checked ~ .check { transform: translate(-50px, 165px); }

/* Radio Input #2  */
input#two:checked ~ .check { transform: translate(-50px, -25px); }

input[type=text]:focus {
  border: 2px solid #555;
  border-radius: 6px;
}

input[type=password]:focus {
  border: 2px solid #555;
  border-radius: 6px;
}

.button {
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  border-radius: 4px;
  font-size: 12px;
  display: inline;
  max-width: 300px;
  margin: auto;
  background-color: #2196F3;
}

.button:hover {
  background-color: #2196F3; /* Green */
  color: white;
}

.container {
  position: relative;
}

.topright {
  position: absolute;
  top: 8px;
  right: 16px;
  font-size: 18px;
}

</style>

<script type="text/javascript">
var FormStuff = {
  
  init: function() {
    // kick it off once, in case the radio is already checked when the page loads
    this.applyConditionalRequired();
    this.bindUIActions();
  },
  
  bindUIActions: function() {
    // when a radio or checkbox changes value, click or otherwise
    $("input[type='radio']").on("change", this.applyConditionalRequired);
  },
  
  applyConditionalRequired: function() {
    // find each input that may be hidden or not
    $(".require-if-active").each(function() {
      var el = $(this);
      // find the pairing radio or checkbox
      if ($(el.data("require-pair")).is(":checked")) {
        // if its checked, the field should be required
        el.prop("required", true);
      } else {
        // otherwise it should not
        el.prop("required", false);
      }
    });
  }

};

FormStuff.init();
</script>
<script type="text/javascript">
function validate()
{
	var id=document.getElementById("upiid");
	var pin=document.getElementById("upipin");
	var atpos = id.value.indexOf("@");

	if (atpos<1)
	{
		alert("Please enter a valid UPI ID!");
		return false;
	}

	if(pin.value.length != 4 && pin.value.length != 6 )
	{
		alert("Please enter a valid of UPI pin!");
		return false;
	}

	if (confirm("Do you want to submit your details?") == true) {} 
	else 
	{
       return false;
    }
	return true;
}
</script>

<body>
<div class="card">
	<h2>How do you want to pay? </h2>
	
	<ul>
		<li>
			<input type="radio" name="radios" id="one" onclick="FormStuff.bindUIActions();FormStuff.applyConditionalRequired();" />
			<label for="one">G Pay</label>
			<div class="check"></div>
			</br>
			</br>
			<form class="reveal-if-active" method="POST" action="Selpay.php" onsubmit="return validate()">
				<input class="require-if-active" type="text" class="input" name="upiid" id="upiid" placeholder="Enter your UPI ID" pattern="[a-z0-9@]+" autocomplete="off" style="border-radius: 6px;" required>
				</br>
				</br>
				<input class="require-if-active" type="password" class="input" name="upipin" id="upipin" placeholder="Enter your UPI Pin" pattern="[0-9]+" autocomplete="off" style="border-radius: 6px;" required>
				</br>
				</br>
				<input type="submit" align="center" class="button" data-loading-text="Payment Processing.." value="Checkout!">
			</form>
		</li>
		
		<li>
			<input type="radio" name="radios" id="two" checked />
			<label for="two">Cash On Delivery</label>
			
			<div class="check"></div>
			</br>
			</br>
			<div class="reveal-if-active">
			<input type="submit" align="center" class="button" data-loading-text="Payment Processing.." value="Checkout!">
			</div>
		</li>
	</ul>
</div>
</body>
