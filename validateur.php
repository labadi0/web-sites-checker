<?php
	include_once'fonctions.inc.php';
 ?>
 <?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
   $cookie_url=$_POST['leUrl'];
   $cookie_html=@$_POST['html'];
   $cookie_css=@$_POST['css'];
   $cookie_lien=@$_POST['liens'];
	 $cookie_image=@$_POST['images'];

	 $cookie_html_site=@$_POST['html_site'];
	 $cookie_css_site=@$_POST['css_site'];
	 $cookie_lien_site=@$_POST['lien_site'];
	 $cookie_image_site=@$_POST['image_site'];







   setcookie("url", $cookie_url, time() + (86400 * 30), "/"); // 86400 = 1 day
   setcookie("choixHtml",$cookie_html, time() + (86400 * 30), "/"); // 86400 = 1 day
   setcookie("choixCss",$cookie_css, time() + (86400 * 30), "/"); // 86400 = 1 day
   setcookie("choixlien", $cookie_lien, time() + (86400 * 30), "/"); // 86400 = 1 day
	 setcookie("choiximage", $cookie_image, time() + (86400 * 30), "/"); // 86400 = 1 day

	 setcookie("choixFullHTml", $cookie_html_site, time() + (86400 * 30), "/"); // 86400 = 1 day
	 setcookie("choixFullcss", $cookie_css_site, time() + (86400 * 30), "/"); // 86400 = 1 day
	 setcookie("choixFullBRLinks", $cookie_lien_site, time() + (86400 * 30), "/"); // 86400 = 1 day
	 setcookie("choixFullImages", $cookie_image_site, time() + (86400 * 30), "/"); // 86400 = 1 day





 }

 ?>




<!DOCTYPE html>
<html lang="fr" >
<head>
<meta charset="utf-8">
<title>Page de Validation</title>

    <style>
		@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
		body{
			background: -webkit-linear-gradient(left, #25c481, #25b7c4);
			background: linear-gradient(to right, #25c481, #25b7c4);
			font-family: 'Roboto', sans-serif;

    }
    form{
      width: 300px;
      padding: 40px;
      position: absolute;
      top: 60%;
      left: 50%;
      transform: translate(-50%,-50%);
      text-align: center;
    }





    input[type=text]{

        border: 0;
        background: none;
        display: block;
        margin: 20px auto;
        text-align: center;
        border: 2px solid black;
				/**
				*/
        padding: 14px 10px;
        width: 200px;
        outline: none;
        color: black;
        border-radius:  24px;
        transition: 0.25s;
    }

    input[type=text]:focus  {
      width: 280px;
      border-color: white;
      }

    input[type=submit]{

      border: 0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid black;
      padding: 14px 40px;

      outline: none;
      color: black;
      border-radius:  24px;
      transition: 0.25s;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background: rgba(255,255,255,0.4);
    }

		.label__checkbox {
		display: none;
		}

		.label__check {
		display: inline-block;
		border-radius: 50%;
		border: 5px solid rgba(0,0,0,0.1);
		background: white;
		vertical-align: middle;
		margin-right: 20px;
		width: 1.5em;
		height: 1.5em;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
		transition: border .3s ease;

		i.icon {
		  opacity: 0.2;
		  font-size: ~'calc(1rem + 1vw)';
		  color: transparent;
		  transition: opacity .3s .1s ease;
		  -webkit-text-stroke: 3px rgba(0,0,0,.5);
		}

		&:hover {
		  border: 5px solid rgba(0,0,0,0.2);
		}
		}

		.label__checkbox:checked + .label__text .label__check {
		animation: check .5s cubic-bezier(0.895, 0.030, 0.685, 0.220) forwards;

		.icon {
		  opacity: 1;
		  transform: scale(0);
		  color: white;
		  -webkit-text-stroke: 0;
		  animation: icon .3s cubic-bezier(1.000, 0.008, 0.565, 1.650) .1s 1 forwards;
		}
		}



		@keyframes icon {
		from {
		  opacity: 0;
		  transform: scale(0.3);
		}
		to {
		  opacity: 1;
		  transform: scale(1)
		}
		}

		@keyframes check {
		0% {
		  width: 1.5em;
		  height: 1.5em;
		  border-width: 5px;
		}
		10% {
		  width: 1.5em;
		  height: 1.5em;
		  opacity: 0.1;
		  background: black;
		  border-width: 15px;
		}
		12% {
		  width: 1.5em;
		  height: 1.5em;
		  opacity: 0.4;
		  background: black;
		  border-width: 0;
		}
		50% {
		  width: 2em;
		  height: 2em;
		  background: white;
		  border: 0;
		  opacity: 0.6;
		}
		100% {
		  width: 2em;
		  height: 2em;
		  background: black;
		  border: 0;
		  opacity: 1;
		}
		}




.boxes {
/*
	right: 150%;
	  width: 10px;
		position: relative;
		*/
		width: 40px;
    height: 80px;
		right: 5%;

    position: relative;



}

.affichage{
  width:100%;
  table-layout: fixed;
	border:  1px solid black;
}





.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }


.tbl-content{
  height:600px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);


}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 14px;
  color: #fff;
  text-transform: uppercase;

}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 16px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
	border:  1px solid black;

}
.chekkers{
	border: none;
}
.titles_check{
	text-align: left;
}


/*section{
  margin: 50px;
}*/
.tbl-content tr:hover {background-color: rgba(255,255,255,0.3);}



::-webkit-scrollbar {
    width: 6px;
}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}



/**
*/

.logo {
  font: 84px 'Arial Narrow', sans-serif;/* I picked this font because it's the closest looking 'web safe' font http://cssfontstack.com/ */
  color: #fefefe;
  text-transform: uppercase;
  letter-spacing: -4px;


	     text-align: center;


}

/* stuff for both words */
.logo span {
  position: relative;
}
.logo span:before,
.logo span:after {
  content: '';
  position: absolute;
  border-width: 32px;/* makes a nice, big 64px square */
  border-style: solid;
  border-color: transparent;
  height: 0;
  z-index: 10;
}

/* stuff for 1st word */
.logo .word1 {
  color: white;
  margin-right: -38px;
  transform: rotateY(180deg);/* using Prefix free */
  display: inline-block;/* required for transform */
  z-index: 10;/* stack 1st word on top */
}
.logo .word1:before {
  right: -4px;/* would be left, but we flipped the word */
  top: -9px;
  border-top-color: #282828;/* match background color */
  border-right-color: #282828;/* would be left, but we flipped the word */
}
.logo .word1:after {
  left: 17px;/* would be right, but we flipped the word */
  bottom: -15px;
  border-bottom-color: #282828;
  border-left-color: #282828;/* would be right, but we flipped the word */
}

/* stuff for 2nd word */
.logo .word2 {
  z-index: 0;/* stack 2nd word below */
}
.logo .word2:before {
  left: -4px;
  top: -6px;
  border-top-color: #282828;
  border-left-color: #282828;
}
.logo .word2:after {
  right: -4px;
  bottom: 4px;
  border-bottom-color: #282828;
  border-right-color: #282828;
}

footer {

	left : 0%;
	top : 500px ;
position: relative;

}

.university{
	width: 900px;
	position: absolute;
	  top:  2%;


}











    </style>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body>
	<header>
		<h1 class="logo">
			<span class="word1">TS</span>
      <span class="word2">VALIDATOR</span>


		</h1>
	</header>
	<div class = "university">
	<a href="https://www.u-cergy.fr/fr/index.html"> <img src="./logo.jpg" alt="" style="width :10%; float: left;  " > </a>
</div>

<form   action="#" method="post">
<input type="text" name="leUrl" placeholder=" tapez votre url " >
<input type="submit" name="monurl" value="valide">


		<table class="boxes">
			<tr>

				<td class="chekkers" >
					<p class="titles_check">html page</p>
		<label class="container">
    <input type="checkbox" class="label__checkbox" name="html">
    <span class="label__text">
			<span class="label__check" >
				<i class="fa fa-check icon"></i>
			</span>
			</span>
    </label>
		</td>






<td class="chekkers" >
<p class="titles_check">css page</p>
    <label class="container">
    <input type="checkbox" class="label__checkbox" name="css">
    <span class="label__text">
			<span class="label__check" >
				<i class="fa fa-check icon"></i>
			</span>

		</span>

    </label>

</td>

<td class="chekkers" >
	<p class="titles_check">image size</p>
    <label class="container">
    <input type="checkbox" class="label__checkbox" name="images">
    <span class="label__text">
			<span class="label__check" >
				<i class="fa fa-check icon"></i>
			</span>

		</span>
    </label>
</td>

<td class="chekkers" >
	<p class="titles_check">broken links</p>
    <label class="container">
    <input type="checkbox" class="label__checkbox" name="liens">
		<span class="label__text">
			<span class="label__check" >
				<i class="fa fa-check icon"></i>
			</span>

		</span>
    </label>
</td>

</tr>

<tr>

	<td class="chekkers" >
		<p class="titles_check">html website</p>
		<label class="container">
    <input type="checkbox" class="label__checkbox" name="html_site">
		<span class="label__text">
			<span class="label__check" >
				<i class="fa fa-check icon"></i>
			</span>

		</span>
    </label>

	<td class="chekkers" >
		<p class="titles_check">css website </p>
	    <label class="container">
	    <input type="checkbox" class="label__checkbox" name="css_site">
			<span class="label__text">
				<span class="label__check" >
					<i class="fa fa-check icon"></i>
				</span>

			</span>
	    </label>
	</td>
	<td class="chekkers" >
		<p class="titles_check">links website </p>
	    <label class="container">
	    <input type="checkbox" class="label__checkbox" name="lien_site">
			<span class="label__text">
				<span class="label__check" >
					<i class="fa fa-check icon"></i>
				</span>

			</span>
	    </label>
	</td>
	<td class="chekkers" >
		<p class="titles_check">images website</p>
	    <label class="container">
	    <input type="checkbox" class="label__checkbox" name="image_site">
			<span class="label__text">
				<span class="label__check" >
					<i class="fa fa-check icon"></i>
				</span>

			</span>
	    </label>
	</td>


</tr>






</table>

</form>

<?php
if (isset($_POST['monurl']) && isset($_POST['html'])){
    $myUrl = $_POST['leUrl'];
    $content=extractlinks($myUrl);
    $result=validatHtml($content,$myUrl);
    echo "<br />";
      echo "<br />";
        echo "<br />";
          echo "<br />";
					echo "<br />";
		        echo "<br />";
		          echo "<br />";
    echo $result;
}

if (isset($_POST['monurl']) && isset($_POST['css'])){
	 $myUrl = $_POST['leUrl'];

	 $result=@validCsssite($myUrl);
	 	echo "<br />";
	 		echo "<br />";
	 			echo "<br />";
	 				echo "<br />";
					echo "<br />";
		        echo "<br />";
		          echo "<br />";
	 echo $result;
}




if (isset($_POST['monurl']) && isset($_POST['images'])){
	 $myUrl = $_POST['leUrl'];
	 echo "<br />";
		 echo "<br />";
			 echo "<br />";
	 $result=validImage($myUrl,$myUrl);

	 echo $result;
}


 if (isset($_POST['monurl']) && isset($_POST['liens'])){
    $myUrl = $_POST['leUrl'];
		echo "<br />";
			echo "<br />";
				echo "<br />";
    $result=validatLink($myUrl);

    echo $result;
}


// site complet html -------------------------------------------

if (isset($_POST['monurl']) && isset($_POST['html_site'])){
    $myUrl = $_POST['leUrl'];
		echo "<br />";
			echo "<br />";
				echo "<br />";
    //$content=extractlinks($myUrl);
    //$result=validatHtml($content);
    $result=@validHtmlsite2($myUrl);

    echo $result;
}


if (isset($_POST['monurl']) && isset($_POST['css_site'])){
	 $myUrl = $_POST['leUrl'];
	 echo "<br />";
		 echo "<br />";
			 echo "<br />";
	 //$content=extractlinks($myUrl);
	 //$result=validCss($content);
	 echo validCsssite2($myUrl);
}

if (isset($_POST['monurl']) && isset($_POST['image_site'])){
	 $myUrl = $_POST['leUrl'];
	 echo "<br />";
		 echo "<br />";
			 echo "<br />";
	 //$content=extractlinks($myUrl);
	 //$result=validCss($content);
echo valid_image_site($myUrl);
}


if (isset($_POST['monurl']) && isset($_POST['lien_site'])){
	 $myUrl = $_POST['leUrl'];
	 echo "<br />";
		 echo "<br />";
			 echo "<br />";
	 //$content=extractlinks($myUrl);
	 //$result=validCss($content);
	 	print_r(@lien_site($myUrl));
}











?>





<footer>
<p class="copyright">&copy;sofiane IDMBARK tarek LABADI </p>
</footer>


</body>
</html>
