
<!--This is the tab switching Script

Working : In this user have two chances to move from the tab after that it will show disqualified .

1. Firefox : User have two chances to move when user will return on that tab it will show an alert message like that 'It was your first time to switch' . After third attempt it will show an alert message like that 'Sorry You are disqualified '.

2. Chrome : Same as Firefox

3. IE : Same as Firefox

So Firefox, Chrome and IE are showing same type of behaviour.

I am adding the feature for store the user name , time and attempt in database in Firefox, Chrome and IE.
This will store 3 attempt because if users tried more than 2 times then he will be disqualify.

4. Opera : Opera is nearly same as above all but when an alert box shows then you need to click back on the window to get the focus. All the other things are working same .
-->

<?php
session_start();
if(!isset($_SESSION['name'])||!isset($_SESSION['pass']))
header("Location: /proctoring/login.php");
?>

<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script class="jsbin" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<title>Tab Switching</title>

<style>
body {
background-color:Gainsboro;
  -webkit-user-select: none;
     -moz-user-select: -moz-none;
      -ms-user-select: none;
          user-select: none;
}

div.logout{
width:70;
height:20;
margin:2 1000;
position:absolute;
background-color:brown;
border:5px solid grey;
color:white;
text-align:center;
}

</style>

</head>

<body>


<script>
 // This is for the Opera... 
//Here i did conditional coding for opera .... So script will detect that the browser is opera so control will come in this block
// inside the IF condition means is that find a string with OPR then space then some digits a "." then some digits (here digits are basically for versions)  OR find Opera then space "digits" "." "digits" .... 

   if(/OPR[\/\s](\d+\.\d+)/.test(navigator.userAgent)||/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)){   
  // Code name is Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36       OPR/22.0.1471.50
	 var count = 0;
 
	 window.onfocus = function () {   // here i am using on focus event so lets take a exaple that user goes to the other tab or other window then he looses tha focus from the current tab then when he will come back so this onfocus event will trigger and ia m using tha static variable count so count will increase and it will show an alert message which turn was your to switch 
	  
          count++;
	  if(count==1){
	  alert('this was your first time switch'); }
 
	  if(count==3){
	  alert('this was your second time switch'); }
 
          if(count==5){
          alert('sorry you are disqualified'); }   
  
      };
 
 
} 
// for Opera code ends here...

//This is for the Safari...
// here i same did the conditional coding for safari , So condition of if means here is that 
// navigator.userAgent.search("Safari") > 0 will return some value greater than 0 if he found the Safari also and
// navigator.userAgent.search("Chrome") < 0 will return -1 if not found the Chrome 
// So finally this means is find safari but not the chrome

 else if(navigator.userAgent.search("Safari") > 0 && navigator.userAgent.search("Chrome") < 0){

 
 var count = 0,count_ctr=0;
 var flag1=0,flag2=0,flagf=0,flagt1=0,flagt2=0,flagt3=0,flagt4=0,flagt5=0,flagt6=0,flagm1=0;
 var chance=3;  // chance is for total try user can to switch, So when user will try any switch then it will decrease...

 
 $(window).keydown(function(event) {
 // here i am using keydown event so if user will open the tab by ctrl t so it will detect flagt1 will be 1
  if(event.ctrlKey && event.keyCode == 84) { 
     flagt1 = 1;
          }
		  	  
 });  

 // now i am going to use onfocus and onblur event when user will try to switch on blur event will ocur 
 
 window.onfocus = function () {
 
  if(flagt1 == 0){
  // this block will run only when user not tried to switch by ctrl t(shortcut key) and comes back to the tab 
  //alert('i am here');
 if(count>2&&chance==1){       // if remaining chance is 1 then show this 
 alert('Sorry you are disqualified');
chance--;
 }
 
 if(count>2&&chance==2){
 alert('This was your second time switch'); // if remaining chance is 2 then show this
 count=-1;
chance--;
 }
 
 if(count>1&&chance==3){
 alert('This was your first time switch');  // if remaining chance is 3 then show this
 count=-1; 
chance--;}     }

if(count_ctr>0&&flagt3==1&&flagt4==0){    // when flagt3 = 1 and count_ctr>0 and flagt4=0 the according to remaining chance alert msg will  show and set the flagt4 = 1 then go to the onblur event 
 if(chance==1){alert('by ctrt sorry you are disqualified'); chance--; } // user tried  ctrl t and remaing chance is 1 show this
 if(chance==2){alert('by ctrt This was your second time'); chance--; }  // user tried  ctrl t and remaing chance is 2 show this
 if(chance==3){ alert('by ctrt This was your first time'); chance--;}  // user tried  ctrl t and remaing chance is 3 show this
  flagt4=1; }
  
 if(flagt2==1){  flagt3=1;  }
 
 if(flagt6==1){flagt1=0; flagt2=0;flagt3=0, flagt4=0,flagt5=0,flagt6=0;count_ctr=0;} // if flagt6 is set clear all flags and count 

 if(flagt5==1){   // flag t5=1 then set flagt6=1 
   flagt6=1;
   }
 
 };

 window.onblur = function () {
 
 if(flagt1==0&&count_ctr==0){ count++;}  // count will increase only when flagt1 == 0 means that users not tried ctrl t he tried other thing 
 
 if(flagt1==1){ flagt2 = 1;} // control will come in this block only when user tried to switch by ctrl t and after that it will got to the onfocus event and there it will make flagt3 = 1 then it will come back in this block 
 
 if(flagt3==1){ count_ctr++; }  // now flagt3 = 1 so count_ctr will increase and control will go to the onfocus event 
 
 if(flagt4==1){ flagt5 =1; }   // if flagt4 = 1 then set flagt5 = 1 and control will go to the onfocus event
 
   };
 
}

// This is for the Firefox...   
//Here i did conditional coding for Firefox .... So script will detect that the browser is Firefox so control will come in this block
// inside the IF condition means is that find a string with Firefox then space then some digits a "." then some digits (here digits are basically for versions)

else if(/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)){  
// Code name is Mozilla/5.0 (Windows NT 6.1; rv:29.0) Gecko/20100101 Firefox/29.0

var count = 0;
var ur = '<?php echo $_SESSION['name']; ?>';

window.onfocus = function () {
if(count==1){
 
  alert('this was your first time switch'); 
  }
 
 if(count==3){
 alert('this was your second time switch'); }
 
 if(count==5){
 alert('sorry you are disqualified'); }
};

window.onblur = function () { 
  if(count == 0 || count==2 || count==4)
  {  

      if(count  == 0 )
        var attempt = 1;
      else if(count == 2)
        var attempt = 2;
      else 
        var attempt = 3;
 
      console.log(ur,' : ',attempt);

      $.ajax(
    {
    url: "store.php",
    type: "POST",

    data: { id: ur,id1: attempt},
    success: function(response) {
     AppendResponse(response);
    }
  });  

  } 

  // if user will shitch then this event will fire and count will increase
  count++;                      // first time count increses 1 (value of count=1)time and when user comes back in the tab then onfocus event will fire and correspondig alert msg will pop up 
// so when alert msg occurs then control comes back in this so count increses (value of count=2 ) one more time and after pressing ok on alert box controle goes back to onfocus event
// then if user will again try to switch then onblur event will fire and count will 3 this time and when user goes back to tab then on focus event will occur and corresponding alert msg will pop up and as same will be for next try

};

 }
 

// if browser are not from the above then control will come here
// chrome and ie...
else{  

var count = 0;
var ur = '<?php echo $_SESSION['name']; ?>';
window.onfocus = function () {

if(count==1){
  alert('this was your first time switch'); 
  }
 
 if(count==2){
 alert('this was your second time switch'); }
 
 if(count==3){
 alert('sorry you are disqualified'); }
};

window.onblur = function () {  // when user will switch onblur event will fire and count will increse 
                               // and when he will return back to the tab then onfocus event will fire and corresponding alert msg will pop up 
if(count == 0 || count==1 || count==2)
  {  

      if(count  == 0 )
        var attempt = 1;
      else if(count == 1)
        var attempt = 2;
      else 
        var attempt = 3;
 
      console.log(ur,' : ',attempt);

      $.ajax(
    {
    url: "store.php",
    type: "POST",

    data: { id: ur,id1: attempt},
    success: function(response) {
     AppendResponse(response);
    }
  });  

  }                               
  count++;

};

 }
</script>
  <?php $name = $_SESSION['name'];  ?>
  <h3><p align="center">Hello <?php echo $name; ?> </p></h3>
  <br><br />
  <form name="input" action="sub.html" method="get">
 Question: 10/5 = ?<input type="text">
 <input type="button" value="Submit"> <!-- I am not Linking it to take result because moto is detectoin of cheating-->
 <a href="logout.php"><div class="logout">logout</div></a>

</body>

</html>
