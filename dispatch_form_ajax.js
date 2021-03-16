    $(document).ready(function(){
//   Отправка формы в классе email
console.log($('.email form'));
  let contacts = document.querySelector('.email form');
  contacts.addEventListener('submit',function(e){
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    let email = this.querySelector('[name=email]').value;
    
    if(email==""){ 
      $('.question2 .popup2').css({display:"flex"});
         $('.question2 .popup-content2 p').html("<h1>Вы не ввели данные</h1>");
     }
    else{
         if(email.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) ){
             $('.question2 .popup2').css({display:"none"});
         
         
    xhr.open('POST','insert_contacts.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('email=' + email);

  xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            if(xhr.responseText=='Yes'){
                  contacts.reset();
                  $('.fon').css({"display":"flex"});
                      $('.watch a').css({"display":"flex"});
                setInterval(function(){
                    $('.fon').css({"display":"none"});
                      $('.watch a').css({"display":"none"});
                },8000);
            }else{
                window.location="error.php"
            }
   
        }
    }
    
    }else{
             $('.question2 .popup2').css({display:"flex"});
             $('.question2 .popup-content2 p').html("<h1>Вы неправильно ввели email</h1>");  
             
         } 
    }
    
});
});
  