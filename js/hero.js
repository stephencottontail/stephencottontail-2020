!function(){var e=document.getElementsByClassName("hero-header")[0],t=e.getElementsByTagName("svg")[0],a=e.offsetHeight;window.addEventListener("scroll",function(){var e=500*(window.scrollY/a);t.setAttribute("style","stroke-dasharray: "+Math.max(500-e,0)+" "+Math.min(0+e,500))})}();