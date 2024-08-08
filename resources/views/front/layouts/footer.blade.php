<footer>
    <div class="footerLogo">
        <a href=""><img src="{{ asset('public/front/images/logo.png') }}" alt="Logo"/></a>
    </div>
    <div class="footerLinks">
        <a href="">All Categories</a>
        <a href="">Today's best deal</a>
        <a href="">Latest Viewed</a>
        <a href="">Shops</a>
        <a href="">Order List</a>
    </div>
    <div class="social">
        <a href=""><img src="{{ asset('public/front/images/insta.png') }}" alt="social"/></a>
        <a href=""><img src="{{ asset('public/front/images/twitter.png') }}" alt="social"/></a>
        <a href=""><img src="{{ asset('public/front/images/fb.png') }}" alt="social"/></a>
    </div>
    <div class="copyright">
        Copyright © 2010-2022 eCoopu Company. All rights reserved.
    </div>
</footer>
            <!--footer close-->
</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> 
<script src="{{ asset('public/front/js/slick.js') }}" type="text/javascript" charset="utf-8"></script> 
<script type="text/javascript">
    $(document).on('ready', function() {
        $(".lazy").slick({
        lazyLoad: 'ondemand', // ondemand progressive anticipated
    autoplay: true,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    arrows: false,
    dots: true,
        });
    $(".variable").slick({
        dots: false,
        infinite: true,
    autoplay: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: false,
        });
    });
//     function openTab(loginRegisterTab) {
//         // alert(loginRegisterTab);
//   var i;
//   var x = document.getElementsByClassName("loginDiv");
//   for (i = 0; i < x.length; i++) {
//     x[i].style.display = "none";  
//   }
//   document.getElementById(loginRegisterTab).style.display = "block";  
// }
// function openTab(loginRegisterTab) {
//               var i;
//               var x = document.getElementsByClassName("loginDiv");
//               for (i = 0; i < x.length; i++) {
//                 x[i].style.display = "none";  
//               }
//               document.getElementById(loginRegisterTab).style.display = "block";  
//             }
function switchTab(type,page,el)
{    
    if(type == 'shop')
    {
        if(el.previousElementSibling.classList.contains('activeTab'))
        {
            el.previousElementSibling.classList.remove('activeTab');
            el.classList.add('activeTab');
            if(page == 'register')
            {
                el.parentElement.parentElement.previousElementSibling.children[1].innerHTML = 'You are Registering as a Shop Owner!';
                el.parentElement.parentElement.children[1].style.display = 'none';
                el.parentElement.parentElement.children[2].style.display = 'block';
            }
            if(page == 'login')
            {
                el.parentElement.parentElement.previousElementSibling.children[1].innerHTML = 'You are Signing as a Shop Owner!';
                el.parentElement.parentElement.children[1].style.display = 'none';
                el.parentElement.parentElement.children[2].style.display = 'block';
            }
        }
    }
    if(type == 'customer')
    {
        if(el.nextElementSibling.classList.contains('activeTab'))
        {
            el.nextElementSibling.classList.remove('activeTab');
            el.classList.add('activeTab');
            if(page == 'register')
            {
               el.parentElement.parentElement.previousElementSibling.children[1].innerHTML = 'You are Registering as a Customer!';
               el.parentElement.parentElement.children[2].style.display = 'none';
               el.parentElement.parentElement.children[1].style.display = 'block';
            }
            if(page == 'login')
            {
                el.parentElement.parentElement.previousElementSibling.children[1].text = 'You are Signing as a Cutomer!';
                el.parentElement.parentElement.children[2].style.display = 'none';
                el.parentElement.parentElement.children[1].style.display = 'block';
            }
        }
    }
}

setTimeout(function(){
    $('.alert-success').fadeOut('slow');
},3000);

$(".profile").click(function(){ $(".profile").children("ul").toggle();}); 
</script>