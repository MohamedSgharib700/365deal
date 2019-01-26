</div>
        
      </div>
   <div class="sidebar">
        <div class="searchform">
          
        </div>
        <div class="gadget">
         <h2 class="star"><span>List</span> of services : <hr /></h2>
           
          <h2 class="star"><span>Courses</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="https://www.youtube.com/playlist?list=PL2FC19B8B292CDFE0">- PHP language course</a></li>
            <li><a href="https://www.youtube.com/playlist?list=PLEBB1267A4B492FF7">- C# language course</a></li>
            <li><a href="https://www.youtube.com/playlist?list=PL61AF4914C2862882">- .NET language course</a></li>
            <li><a href="https://www.youtube.com/playlist?list=PL3F7BB1C0B73425A6">- Jave language course</a></li>
            <li><a href="https://www.youtube.com/playlist?list=PLA26A3C4698549782">- Oracle language course</a></li>
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Recent Posts</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
          <?php
		    include_once("../Classes/Utility.php");
			include_once("../Classes/Post.class.php");
			if(CheckUserLogin() != false && $_COOKIE['user'] == "Gharib Admin")
			  echo"<a href='..\Admin\AddPost.php?tybe=add'>[Add New Post]</a> || <a href='..\Admin\Searchp.php'>[Search Post]</a>";
			  
			 $showLink = new POST();
			 echo $showLink->GetLinksLastsPosts(6);
		  ?>
            
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image Gallery</span></h2>
        <a href="#"><img src="../images/pix1.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="../images/pix2.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="../images/pix3.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="../images/pix4.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="../images/pix5.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="../images/pix6.jpg" width="58" height="58" alt="" /></a> </div>
      <div class="col c2">
        <h2><span>Lorem Ipsum</span></h2>
        <p>Lorem ipsum dolor<br />
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam</a>, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
      </div>
      <div class="col c3">
        <h2><span>Contact</span></h2>
        <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue.</p>
        <p><a href="#">support@yoursite.com</a></p>
        <p>+1 (123) 444-5677<br />
          +1 (123) 444-5678</p>
        <p>Address: 123 TemplateAccess Rd1</p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">MyWebSite</a>.</p>
      <p class="rf">Layout by Atomic <a href="http://www.atomicwebsitetemplates.com/">Website Templates</a></p>
      <div class="clr"></div>
    </div>
  </div>
</div>
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
