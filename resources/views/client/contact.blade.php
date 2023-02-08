
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contacts</title>
  @include('client.head')
</head>
<body>
<div class="container_12">
<!--==============================header=================================-->
	<div class="grid_12">
	    <header>
		  <h1><a class="logo" href="/main">PNA</a></h1>
			<nav>
			  <ul class="sf-menu">
				  <li><a href="/main">main page</a><span>welcome</span></li>
				  <li class="separate"><a href="/about">about us</a><span>who we are</span>
						<ul>
							 <li><a href="#">history</a></li>
							 <li><a href="#">news</a>
								  <ul>
										<li><a href="#">latest</a></li>
										<li><a href="#">archive</a></li>
								  </ul>
							 </li>
							 <li><a href="#">testimonials</a></li>
						</ul>
				  </li>
				  <li><a href="/services">services</a><span>what we do</span></li>
				  <li class="current"><a href="/contact">contact</a><span>stay in touch</span></li>
			  </ul>
			  <div class="clear"></div>
			 </nav>
		</header>
	</div>
	<div class="clear"></div>
<!--==============================content================================-->
    <section id="content">
      <div>
        <article class="grid_9">
          <h2 class="ind">Stay in Touch</h2>
          <div class="ext_box touch">
            <figure>
              <span class="map_wrapper img_wrap">
                <iframe id="map_canvas" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                </span>
            </figure>
            <div>
              <dl class="adress">
                <dt><strong  class="font_1">8901 Marmora Road,<br>Glasgow, D04 89GR.</strong></dt>
                <dd><span>Freephone:</span>+1 800 559 6580</dd>
                <dd><span>Telephone:</span>+1 959 603 6035</dd>
                <dd><span>FAX:</span>+1 504 889 9898</dd>
                <dd>E-mail: <a href="#" class="demo">mail@demolink.org</a></dd>
              </dl>
              <dl class="adress">
                <dt><strong  class="font_1">9863 - 9867 Mill Road, <br>Cambridge, MG09 99HT</strong></dt>
                <dd><span>Freephone:</span>+1 800 559 6580</dd>
                <dd><span>Telephone:</span>+1 959 603 6035</dd>
                <dd><span>FAX:</span>+1 504 889 9898</dd>
                <dd>E-mail: <a href="#" class="demo">mail@demolink.org</a></dd>
              </dl>
              <div class="clear"></div>
            </div>
          </div> 
        </article>
        <article class="grid_3">
          <h2 class="ind1">Contact Form</h2>
          <form id="contact-form">
            <div class="success">Contact form submitted!<br>
                  <strong>We will be in touch soon.</strong>
              </div>
            <fieldset>
              <label class="name">
                <input type="text" value="Name: ">
                  <span class="error">*This is not a valid name.</span> <span class="empty">*This field is required.</span>
              </label>
              <label class="email">
                <input type="text" value="E-mail: ">
                  <span class="error">*This is not a valid email address.</span> <span class="empty">*This field is required.</span>
              </label>
              <label class="phone">
                <input type="text" value="Phone: ">
                  <span class="error">*This is not a valid phone number.</span> <span class="empty">*This field is required.</span>
              </label>
              <label class="message">
                <textarea>Message: </textarea>
                  <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span>
              </label>
              <div class="buttons2">
                  <a href="#" data-type="reset" class="button">Reset</a>
                  <a href="#" data-type="submit" class="button">Submit</a>
              </div>
            </fieldset>
           </form>
        </article>
        <div class="clear"></div>
      </div>
    </section>
<!--==============================footer=================================-->
    <footer>
		  <div class="privacy">
				<a href="/main" class="f_logo">PNA</a> &nbsp;&copy; 2012  &nbsp;| &nbsp;<a href="index-4.html">Privacy Policy</a>
		  </div>
		  <div class="social">
				<a href="#" title="Google +"><img src="/templates/client/images/front_end/soc1.png" width="30" height="60" alt=""></a>
				<a href="#" title="Facebook"><img src="/templates/client/images/front_end/soc2.png" width="30" height="60" alt=""></a>
				<a href="#" title="Posterous"><img src="/templates/client/images/front_end/soc3.png" width="30" height="60" alt=""></a>
				<a href="#" title="Twitter"><img src="/templates/client/images/front_end/soc4.png" width="30" height="60" alt=""></a>
			</div>	
		  <div class="clear"></div>
    </footer>
</div>
</body>
</html>