window.onload = function() {
  document.body.classList.add('signin');

	if( window.innerWidth < 920 ){
	    TweenMax.fromTo("body",2,{backgroundPosition:"center bottom"},{backgroundPosition:"center center",ease: Power3.easeOut,delay:0.3});
	}else{
	    TweenMax.fromTo("body",2,{backgroundPosition:"center bottom"},{backgroundPosition:"center center",ease: Power3.easeOut,delay:0.3});
	}
	    TweenMax.fromTo("#kc-container-wrapper",1,{autoAlpha:0,scale:0.7},{autoAlpha:1,scale:1,ease: Back.easeOut.config(1.7),delay:1.5});
 var linkst = document.getElementsByTagName("a");

     for (var i = 0; i < linkst.length; i++) {
        linkst[i].addEventListener("click", function(){
         TweenMax.to("#kc-container-wrapper",0.4,{autoAlpha:0,scale:0.7});
       });
    }
	if(window.innerHeight < 720 || window.innerWidth < 920 ){
		TweenMax.to("#kc-container-wrapper",0.6,{ease: Back.easeOut.config(1.7),xPercent:-50, yPercent:0, left:"50%", top:"30px",transformOrigin:"50% 50%", x:0, y : 0});
	}else{
		TweenMax.to("#kc-container-wrapper",0.6,{ease: Back.easeOut.config(1.7),xPercent:-50, yPercent:-50, left:"50%", top:"50%",transformOrigin:"50% 50%", x:0, y : 0});
	}

    window.addEventListener('resize', function(){
	if(window.innerHeight < 720 || window.innerWidth < 920 ){
		TweenMax.to("#kc-container-wrapper",0.6,{ease: Back.easeOut.config(1.7),xPercent:-50, yPercent:0, left:"50%", top:"30px",transformOrigin:"50% 50%", x:0, y : 0});
	}else{
		TweenMax.to("#kc-container-wrapper",0.6,{ease: Back.easeOut.config(1.7),xPercent:-50, yPercent:-50, left:"50%", top:"50%",transformOrigin:"50% 50%", x:0, y : 0});
	}
    }, true);

  document.getElementById('kc-login').addEventListener("click", function(){
    this.value="Welcome";
    TweenMax.to(this,0.4,{width:"100%",height:"100%",left:0,bottom:-1});
  });
	 document.getElementById("signin").addEventListener("click", function(){
   document.getElementById('kc-login').value = 'Signin';
   document.body.classList.remove('signup');
   document.body.classList.add('signin');
   TweenMax.to('#toploginlogowrapper',0.4,{
        "--circle-x-variation":"100%"
    });
    TweenMax.to('.emailgroup',0.4,{
        height:"0px"
    });

   });
	 document.getElementById("signup").addEventListener("click", function(){
     document.getElementById('kc-login').value = 'Sign up';
      document.body.classList.remove('signin');
      document.body.classList.add('signup');
      TweenMax.to('#toploginlogowrapper',0.4,{
        "--circle-x-variation":"0%"
      });
     TweenMax.to('.emailgroup',0.4,{
        height:'60px'
    });
   });
	  var inputs = document.getElementsByTagName("input");
  Array.prototype.forEach.call(inputs,function(input){
    input.addEventListener("focus", function(){
       this.previousSibling.classList.add('focused');
     });
     input.addEventListener("blur", function(){
       this.previousSibling.classList.remove('focused');
       if(this.value){
          this.previousSibling.classList.add('hasval');
       }else{
         this.previousSibling.classList.remove('hasval');
       }
     });
  });
}
