<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<!-- Import Foundation Style -->
<link rel="stylesheet" href="foundation-6/css/foundation.css" />
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Administrator Edit</title>

<style type="text/css">
body {
	background-image: url("pics/adminbk2.jpg");
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-attachment: fixed;
}
</style>

 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
      $( "#datepicker" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
   });
 </script>

</head>

<?php
// Check Session
session_start ();
if (! isset ( $_SESSION ['logstatus'] )) {
	header ( 'Location: http://localhost/adminlogin.php' );
}
?>

<body>
	<div class="top-bar" id="realEstateMenu">
		<div class="top-bar-left">
			<ul class="menu accordion-menu" data-responsive-menu="accordion"
				role="tablist" aria-multiselectable="true"
				data-accordionmenu="2xy504-accordionmenu"
				data-responsivemenu="ugo6pb-responsivemenu">
				<li class="menu-text" role="menuitem">Administrator</li>
				<li role="menuitem"><a href="http://localhost/editpage.php">Edit Record</a></li>
				<li role="menuitem"><a href="http://localhost/uploadpage.php">Upload</a></li>
			</ul>
		</div>
		<div class="top-bar-right">
			<ul class="menu">
				<li class="menu-text">Welcome. <?php echo $_SESSION['username']?></li>
				<li><button class="button" onclick="javascript: window.location.href='http://localhost/adminlogout.php'">Logout</button></li>
			</ul>
		</div>
	</div>
	<br>
	<header>
  <div class="row">
    <div class="large-12 columns">
      <h1>Very Compelling Content</h1>
      <h4>You can't take your eyes off of it.</h4>
    </div>
  </div>
</header>

<section id="main-content" class="main-content">

  <div class="row">

    <div class="small-7 medium-8 columns">
      <h2>I'm not sure I see what you're getting at.</h2>
      <h4 class="subheader">Do not go gentle into that good night; Old age should burn and rave at close of day. Rage, rage against the dying of the light.
      </h4>

      <hr>

      <article>
        <p>We've always defined ourselves by the ability to overcome the impossible. And we count these moments. These moments when we dare to aim higher, to break barriers, to reach for the stars, to make the unknown known. We count these moments as our
          proudest achievements. But we lost all that. Or perhaps we've just forgotten that we are still pioneers. And we've barely begun. And that our greatest accomplishments cannot be behind us, because our destiny lies above us.</p>

        <p>We used to look up at the sky and wonder at our place in the stars, now we just look down and worry about our place in the dirt.</p>

        <p>Mankind was born on Earth. It was never meant to die here.</p>

        <p>Today is my birthday. And it's a special one because you once told me that when you came back, we might be the same age. Well, now I'm the same age that you were when you left... and it'd be really great if you came back soon.</p>

        <p>You know, one of those useless machines they used to make was called an MRI, and if we had one of those left the doctors would have been able to find the cyst in my wife's brain, before she died instead of afterwards, and then she would've been
          the one sitting here, listening to this instead of me which would've been a good thing because she was always the... calmer one.</p>

        <p>Maybe it means something more - something we can't yet understand. Maybe it's some evidence, some artifact of a higher dimension that we can't consciously perceive. I'm drawn across the universe to someone I haven't seen in a decade who I know
          is probably dead. Love is the one thing that we're capable of perceiving that transcends dimensions of time and space. Maybe we should trust that, even if we can't understand it. All right Cooper. Yes, the tiniest possibility of seeing Wolf
          again excites me. That doesn't mean I'm wrong.</p>
      </article>
    </div>

    <div class="small-3 medium-4 columns">

      <article id="sidebar" class="events-press-cta panel sticky">
        <p class="lead">What are you going to do with it?</p>
        <p class="lead">Can't we just let it go? It's not harming anyone.</p>
        <p>How we can help:
          <ul>
            <li>Feature it here!</li>
            <li>Help promote it.</li>
            <li>Review material for accuracy.</li>
            <li>Stickers!</li>
          </ul>

        </p>
        <a class="tiny button" href="#">Contact us</a>
      </article>

    </div>

  </div>

  <div class="row">

    <div class="medium-8 columns">
      <h2>Press</h2>
      <h4 class="subheader">Latest articles and tutorials
      </h4>

      <ul class="blog-posts delicious">
        <li>
          <a href="http://www.creativebloq.com/web-design/20-best-web-design-agencies-2015-61515079">
            <span class="date">06/12/15</span>
            <span class="title">The 20 best web design agencies of 2015 | Web design | Creative Bloq</span>
            <span class="description">Creative Bloq annouced that ZURB's been voted one of the 20 best agencies of 2015!</span>
          </a>
        </li>
        <li>
          <a href="http://speckyboy.com/2015/05/12/how-to-choose-the-right-ui-patterns-for-your-web-design/">
            <span class="date">05/26/15</span>
            <span class="title">Speckyboy features PatternTap</span>
            <span class="description">Our friends at Speckyboy have included PatternTap in this article about UI patterns</span>
          </a>
        </li>
        <li>
          <a href="http://www.sitepoint.com/building-responsive-mega-menu-foundation/">
            <span class="date">05/26/15</span>
            <span class="title">Building a Responsive Mega Menu with Foundation by Sitepoint</span>
            <span class="description">Sitepoint's George Martsoukos wrote up this great tutorial on building a menu with Foundation for Sites</span>
          </a>
        </li>
        <li>
          <a href="https://scotch.io/tutorials/building-responsive-email-templates-with-ink">
            <span class="date">04/30/15</span>
            <span class="title">Building Responsive Email Templates with Ink</span>
            <span class="description">Our friends at Scotch.io have published this guide to building emails that look great on any device with Ink</span>
          </a>
        </li>
        <li>
          <a href="http://www.smashingmagazine.com/2015/04/28/creating-web-app-in-foundation-for-apps/">
            <span class="date">04/28/15</span>
            <span class="title">Smashing Magazine: Creating A Complete Web App In Foundation For Apps</span>
            <span class="description">Our friends at Smashing Magazine have written this easy tutorial for creating a "Star Wars" themed web app with Foundation for Apps</span>
          </a>
        </li>
        <li>
          <a href="http://www.cssauthor.com/grid-systems/">
            <span class="date">04/20/15</span>
            <span class="title">CSSAuthor.com Includes Foundation In List of Best Responsive Grids</span>
            <span class="description">Foundation was included in this roundup of the best grids in responsive web design</span>
          </a>
        </li>
        <li>
          <a href="https://scotch.io/courses/getting-started-with-foundation-5">
            <span class="date">04/20/15</span>
            <span class="title">Scotch.io's Introduction to Foundation 5 Course</span>
            <span class="description">Our friends at Scotch.io have compiled this series of articles to help people get started with Foundation 5</span>
          </a>
        </li>
        <li>
          <a href="http://webdesign.tutsplus.com/articles/a-quick-guide-to-choosing-the-best-framework-for-you--cms-23575">
            <span class="date">04/20/15</span>
            <span class="title">Tuts+ Guide to Choosing the Right Framework for You</span>
            <span class="description">Tuts+ have included Foundation in this comprehensive guide to choosing responsive frameworks</span>
          </a>
        </li>
        <li>
          <a href="http://webdesign.tutsplus.com/courses/up-and-running-with-foundation-for-apps">
            <span class="date">03/31/15</span>
            <span class="title">Up and Running with Foundation for Apps with Tuts+</span>
            <span class="description">Our friends at Tuts+ have put up this awesome course for getting up and running with Foundation for Apps</span>
          </a>
        </li>
        <li>
          <a href="http://www.smashingmagazine.com/2015/03/27/simple-real-and-bug-free-foundation-development/">
            <span class="date">03/27/15</span>
            <span class="title">SmashingMagazine.com Article on Framework Development Featuring the ZURB Process</span>
            <span class="description">Our own Ben Gremillion wrote this great piece on bug-free development for Smashing Magazine</span>
          </a>
        </li>
        <li>
          <a href="http://thenextweb.com/dd/2015/03/24/how-to-create-visual-relationships-with-contrast-similarity/">
            <span class="date">03/24/15</span>
            <span class="title">ZURB's Use of Visual Contrast Featured on The Next Web</span>
            <span class="description">Jerry Cao of UXPin wrote about ZURB's use of visual contrast on our website and Patterntap.com in this TNW article.</span>
          </a>
        </li>
        <li>
          <a href="http://www.smashingmagazine.com/2015/03/02/harnessing-flexbox-for-todays-web-apps/">
            <span class="date">03/11/15</span>
            <span class="title">Harnessing Flexbox For Today's Web Apps - Smashing Magazine</span>
            <span class="description">Our friends at Smashing Magazine included Foundation for Apps in this fantastic Flexbox writeup</span>
          </a>
        </li>
        <li>
          <a href="http://blog.uxpin.com/6264/use-right-ui-design-patterns/">
            <span class="date">03/02/15</span>
            <span class="title">How to Use the Best UI Design Patterns - By UXPin</span>
            <span class="description">Our friends at UXPin included Pattern Tap in their selection of design pattern resources</span>
          </a>
        </li>
        <li>
          <a href="http://www.creativebloq.com/netmag/3-top-ways-build-website-prototype-21514247">
            <span class="date">02/26/15</span>
            <span class="title">Creative Bloq - 3 Top Ways to Build a Website Prototype</span>
            <span class="description">Jerry Cao of UXPin includes Verify in his list of tools for prototyping websites</span>
          </a>
        </li>
        <li>
          <a href="http://www.motocms.com/blog/web-design/25-ux-design-tools/">
            <span class="date">02/26/15</span>
            <span class="title">25 Design Tools to Simplify Designer's Daily Routine - Solidify</span>
            <span class="description">Michael Evans of MotoCMS includes Solidify in this list of designer tools</span>
          </a>
        </li>
      </ul>

    </div>
    
</section>

</body>
</html>