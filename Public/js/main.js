document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });
  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.tabs').tabs();
    $(".dropdown-button").dropdown();
  });
  $("#submit-signup").click(function(){
  	$("#submit-signup").css('opacity', '0.4');
    var name = $("#name").val();
    var username = $("#username-signup").val();
    var email = $("#email").val();
    var password = $("#password-signup").val();
    var confirm = $("#confirm").val();
    $.post(url+"account/signup/action",{name:name,username:username,email:email,password:password,confirm:confirm},function(data){
      $("#submit-signup").css('opacity', '1');
      	 var toastHTML = '<span>'+ data +'</span>';
 			 M.toast({html: toastHTML});        
    });
  });        
 $("#submit-login").click(function(){
  	$("#submit-login").css('opacity', '0.4');
    var username = $("#username-login").val();
    var password = $("#password-login").val();   
     $.post(url+"account/login/action",{username:username,password:password},function(data){
     	  $("#submit-login").css('opacity', '1');
     	 if(data !== '1'){
         	 var toastHTML = '<span>'+ data +'</span>';
 			     M.toast({html: toastHTML});      
        }else{
      	 	window.location = url+"@"+username;
        }    
    });
  });    

  $("#submit-reset").click(function(){
    $("#submit-reset").css('opacity', '0.4');
    var email = $("#email").val();  
     $.post(url+"account/reset/action",{email:email},function(data){
        $("#submit-reset").css('opacity', '1');
        var toastHTML = '<span>'+ data +'</span>';
        M.toast({html: toastHTML});      
    });
  });    

  $("#submit-reset-process").click(function(){
    $("#submit-reset-process").css('opacity', '0.4');
    var password = $("#password").val();  
    var confirm = $("#confirm").val();  
    var token = $("#token").val();  
     $.post(url+"account/reset/password-password/process",{password:password,confirm:confirm,token:token},function(data){
        $("#submit-reset-process").css('opacity', '1');
        var toastHTML = '<span>'+ data +'</span>';
        M.toast({html: toastHTML});      
    });
  }); 

  $("#submit-update").click(function(){
  	$("#submit-update").css('opacity', '0.4');
    var name = $("#name").val();
    var id = $("#id").val();
    var username = $("#username-update").val();
    var email = $("#email").val();
    $.post(url+"account/update/action",{id:id,name:name,username:username,email:email},function(data){
      $("#submit-update").css('opacity', '1');
      	 var toastHTML = '<span>'+ data +'</span>';
 			   M.toast({html: toastHTML});        
    });
  }); 
  $("#submit-update-password").click(function(){
    $("#submit-update-password").css('opacity', '0.4');
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    $.post(url+"account/update/password/action",{password:password,confirm:confirm},function(data){
      $("#submit-update-password").css('opacity', '1');
         var toastHTML = '<span>'+ data +'</span>';
       M.toast({html: toastHTML});        
    });
  }); 
  $("#submit-detail").click(function(){
    $("#submit-detail").css('opacity', '0.4');
    var bio = $("#bio").val();
    $.post(url+"account/update/bio/action",{bio:bio},function(data){
      $("#submit-detail").css('opacity', '1');
         var toastHTML = '<span>'+ data +'</span>';
       M.toast({html: toastHTML});        
    });
  }); 
  $("#submit-address").click(function(){
    $("#submit-address").css('opacity', '0.4');
    var address = $("#address").val();
    var city = $("#city").val();
    var zip = $("#zip").val();
    var state = $("#state").val();
    var country = $("#country").val();
    var pnumber = $("#pnumber").val();            
    $.post(url+"account/update/action/address",{address:address,city:city,zip:zip,state:state,country:country,pnumber:pnumber},function(data){
      $("#submit-address").css('opacity', '1');
         var toastHTML = '<span>'+ data +'</span>';
       M.toast({html: toastHTML});        
    });
  }); 
$(document).on('submit',"#profile-img",function(e){
  e.preventDefault();
  $("#submit-img").css('opacity','0.4');
    $.ajax({
    url: url+"account/update/action/pimage",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false, 
    success: function(data){
      $("#submit-img").css('opacity','1');
        var toastHTML = '<span>'+ data +'</span>';
        M.toast({html: toastHTML});   
    },
    }); 
});

var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000);
}
  $(".searchbtn").click(function(){
    $(".media-search").css('height' , '600px');
    $('.media-search').css('transition' , '1s');
  });
  $('.search-close').click(function() {
    $('.media-search').css('height' , '0px');
    $('.media-search').css('transition' , '0.2s');
  });
  $("#search").click(function(){
    document.getElementById("overlay").style.display = "block";
    document.getElementById("search-page").style.display = "block";
    
  });
function mobilenavbar() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}