<?php
include 'simple_html_dom.php';


function extractlinks($link5){
    $opts =array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );

    $context = stream_context_create($opts);
    $url = file_get_contents($link5,false,$context); // Ont r�cupere tout le code xhtml de la page.
    return $url;
}


function validatHtml($lien,$linkoo){
  for ($i=0; $i <28 ; $i++) {
      echo "<br />";
  }
echo "<section>";


 $curl = curl_init();
 curl_setopt_array($curl, array(
		 CURLOPT_URL => "http://validator.w3.org/nu/?out=json",
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS => 10,
		 CURLOPT_TIMEOUT => 30,
		 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		 CURLOPT_CUSTOMREQUEST => "POST",
		 CURLOPT_POSTFIELDS =>$lien,
		 CURLOPT_HTTPHEADER => array(
				 "User-Agent: Any User Agent",
				 "Cache-Control: no-cache",
				 "Content-type: text/html",
				 "charset: utf-8",
				 "Accept-Language: fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5",

		 ),
 ));
 $response = curl_exec($curl);
 $err = curl_error($curl);
 curl_close($curl);
 if ($err) {
		 //handle error here
		 die('sorry etc...');
 }
 $resJson = json_decode($response, true);





 $i=1;


if ( count($resJson['messages']) == 0){
//  echo  '<h3><strong style = "font-size: 20px;color :white; background-color:  	#00FF7F;border: 3px solid #ccc; border-radius: 6px;"> HTML  VALID</strong>'    .'</h3>';

  echo  '<h3><strong style = "font-size: 20px;color :white; background-color:  	#00FF7F;border: 3px solid #ccc; border-radius: 6px;"> HTML  VALID:'.$linkoo.'</strong>'    .'</h3>';

}
else {
//  echo  '<h3><strong style = "font-size: 20px;color :white; background-color: #F08080;border: 3px solid #ccc; border-radius: 6px;">HTML INVALID</strong>'    .'</h3>';

  echo  '<h3><strong style = "font-size: 20px;color :white; background-color: #F08080;border: 3px solid #ccc; border-radius: 6px;">HTML INVALID:'.$linkoo.'</strong>'    .'</h3>';
}



echo '<div class="tbl-header">';

 echo '<table class = "affichage"   >';
      echo "<thead>";
          echo "<tr>";
            echo "<th>type</th>";
            echo "<th>message</th>";
            echo "<th>line</th>";
          echo "</tr>";
 echo "</thead>";
 echo "</table>";
echo "</div>";




echo '<div class="tbl-content">';
echo '<table  class ="affichage" >';
echo "<tbody>";
foreach($resJson['messages'] as $val){

 if(empty($val['lastLine'])){
	 if ($val['type'] == 'info'){
     $val['message'] = str_replace('<',' ',  $val['message'] );


		 echo '<tr >'.'<td  >'. "<p>".$i.'-','<strong style = " background-color: #FFA500;border: 1px solid #ccc; border-radius: 6px;">Warning</strong>'."</p>".'</td>';
     echo '<td><p>'.$val['message'].'</p></td>';
     echo '<td> </td>';
		 echo '</tr>';
$i=$i+1;
	 }
	 else {


     $val['message'] = str_replace('<',' ',  $val['message'] );


	 echo '<tr  >'.'<td  >'. "<p>".$i.'-','<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error</strong>'."</p>".'</td>';
   echo '<td><p>'.$val['message'].'</p></td>';
   echo '<td> </td>';

	 echo '</tr>';
$i=$i+1;
 }
 }

 elseif ($val['type'] == 'info'){

   $val['message'] = str_replace('<',' ',  $val['message'] );
  // $val['message'] = str_replace('&lt',' ',  $val['message'] );

	 echo '<tr >'.'<td >'. "<p>".$i.'-','<strong style = " background-color: #FFA500;border: 1px solid #ccc; border-radius: 6px;">Warning</strong>'."</p>".'</td>';
   echo '<td><p>'.$val['message'].'</p></td>';
   echo '<td>la ligne'.$val['lastLine'].'</td>';
	 echo '</tr>';
	 $i=$i+1;
 }
 else {
   $val['message'] = str_replace('<',' ',  $val['message'] );
  // $val['message'] = str_replace('&lt',' ',  $val['message'] );
   echo '<tr  >'.'<td  >'. "<p>".$i.'-','<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error</strong>'."</p>".'</td>';
   echo '<td><p>'.$val['message'].'</p></td>';
   echo '<td>la ligne'.$val['lastLine'].'</td>';

	 echo '</tr>';

   //66666666666666666666666


 $i=$i+1;
}
 }

echo "</tbody>";
 echo '</table>';
 echo "</div>";
 echo "</section>";

}





function validCss($lien,$linkoo){
  for ($j=0; $j <28 ; $j++) {
    echo "<br />";
  }
echo "<section>";
 $curl = curl_init();
 curl_setopt_array($curl, array(
		 CURLOPT_URL => "http://validator.w3.org/nu/?out=json",
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS => 10,
		 CURLOPT_TIMEOUT => 30,
		 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		 CURLOPT_CUSTOMREQUEST => "POST",
		 CURLOPT_POSTFIELDS =>$lien,
		 CURLOPT_HTTPHEADER => array(
				 "User-Agent: Any User Agent",
				 "Cache-Control: no-cache",
				 "Content-type: text/css",
				 "charset: utf-8",
				 "Accept-Language: fr-CH, fr;q=0.9, en;q=0.8, de;q=0.7, *;q=0.5",

		 ),
 ));
 $response = curl_exec($curl);
 $err = curl_error($curl);
 curl_close($curl);
 if ($err) {
		 //handle error here
		 die('sorry etc...');
 }
 $resJson = json_decode($response, true);

$i=1;
 if ( count($resJson['messages']) == 0){

   echo  '<h3><strong style = "font-size: 20px;color :white; background-color:  	#00FF7F;border: 3px solid #ccc; border-radius: 6px;"> CSS  VALID :'.$linkoo.'</strong>'.'</h3>';

 }
 else {
   echo  '<h3><strong style = "font-size: 20px;color :white; background-color: #F08080;border: 3px solid #ccc; border-radius: 6px;">CSS INVALID : '.$linkoo.'</strong>'.'</h3>';
 }



 //--------
 echo '<div class="tbl-header">';

  echo '<table class = "affichage"   >';
       echo "<thead>";
           echo "<tr>";
             echo "<th>type</th>";
             echo "<th>message</th>";
             echo "<th>extract</th>";
             echo "<th>line</th>";
           echo "</tr>";
  echo "</thead>";
  echo "</table>";
 echo "</div>";




 //------------




 echo '<div class="tbl-content">';
 echo '<table  class ="affichage" >';
 echo "<tbody>";
foreach($resJson['messages'] as $val){

  if(empty($val['lastLine'])){
 	 if ($val['type'] == 'info'){
     /*
      echo '<tr>';
      echo '<td  ><p>'.$i.'-''<strong style = " background-color: #FFA500;border: 1px solid #ccc; border-radius: 6px;">Warning</strong></p></td>';
      echo '<td>'.$val['message'].'</td>';
      echo "<td>".$val['extract']."</td>";
      echo "<td> </td>";
      echo '</tr>';
      */
      $val['message'] = str_replace('<','&lt',  $val['message'] );
      //<!DOCTYPE html>
      $val['message'] = str_replace("<!DOCTYPE html>"," ",  $val['message'] );
      $val['extract'] = str_replace("<!DOCTYPE html>"," ",  $val['message'] );



      echo '<tr >'.'<td  >'. "<p>".$i.'-','<strong style = " background-color: #FFA500;border: 1px solid #ccc; border-radius: 6px;">Warning</strong>'."</p>".'</td>';
      echo '<td><p>'.$val['message'].'</p></td>';
      echo '<td><p>'.$val['extract'].'</p></td>';
      echo '<td> </td>';
 		 echo '</tr>';

 $i=$i+1;
 	 }
 	 else {
/*
     echo '<tr>';
     echo '<td  >';
     echo  "<p>".$i.'-'.'<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error</strong>'."</p>".'</td>';
      echo '<td>'.$val['message'].'</td>';
      echo '<td>'.$val['extract'].'</td>';
      echo "<td> </td>";
     echo '</tr>';
     */
     $val['message'] = str_replace('<','&lt',  $val['message'] );
     $val['message'] = str_replace("<!DOCTYPE html>"," ",  $val['message'] );
     $val['extract'] = str_replace("<!DOCTYPE html>"," ",  $val['extract'] );


     echo '<tr  >'.'<td  >'. "<p>".$i.'-','<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error</strong>'."</p>".'</td>';
     echo '<td><p>'.$val['message'].'</p></td>';
     echo '<td><p>'.$val['extract'].'</p></td>';
     echo '<td> </td>';

  	 echo '</tr>';

 $i=$i+1;
  }
  }


  elseif ($val['type'] == 'info'){
/*
    echo '<tr>';
    echo '<td  >';
    echo  "<p>".$i.'-'.'<strong style = " background-color: #FFA500;border: 1px solid #ccc; border-radius: 6px;">Warning</strong>'."</p>";
    echo '</td>';
     echo '<td>'.$val['message'].'</td>';
     echo '<td>'.$val['extract'].'</td>';
     echo '<td> la ligne :'.$val['lastLine'].'</td>';
     echo "<td> </td>";
    echo '</tr>';
    */
    $val['message'] = str_replace('<','&lt',  $val['message'] );
    $val['message'] = str_replace("<!DOCTYPE html>"," ",  $val['message'] );
    $val['extract'] = str_replace("<!DOCTYPE html>"," ",  $val['extract'] );


    echo '<tr >'.'<td >'. "<p>".$i.'-','<strong style = " background-color: #FFA500;border: 1px solid #ccc; border-radius: 6px;">Warning</strong>'."</p>".'</td>';
    echo '<td><p>'.$val['message'].'</p></td>';
    echo '<td><p>'.$val['extract'].'</p></td>';
    echo '<td>la ligne'.$val['lastLine'].'</td>';
 	 echo '</tr>';
 	 $i=$i+1;




    $i=$i+1;
  }
  else {
/*
    echo '<td  >';
    echo "<p>".$i.'-'.'<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error</strong>'."</p>";
    echo '</td>';
    echo '<td>'.$val['message'].'</td>';
    echo '<td>'.$val['extract']."</td>";
    echo '<td> la ligne :'.$val['lastLine'].'</td>';

  echo '</tr>';
  */
  $val['message'] = str_replace('<','&lt',  $val['message'] );
  $val['message'] = str_replace("<!DOCTYPE html>"," ",  $val['message'] );
  $val['extract'] = str_replace("<!DOCTYPE html>"," ",  $val['extract'] );


  echo '<tr  >'.'<td  >'. "<p>".$i.'-','<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error</strong>'."</p>".'</td>';
  echo '<td><p>'.$val['message'].'</p></td>';
  echo '<td><p>'.$val['extract'].'</p></td>';

  echo '<td>la ligne'.$val['lastLine'].'</td>';

  echo '</tr>';




  $i=$i+1;
  }

 }

echo "</tbody>";
 echo '</table>';
 echo "</div>";
  echo "</section>";
}


function validCsssite($link5){
      $linkscss=linkCss($link5);
      if (is_array($linkscss)){
        foreach ($linkscss as $link) {


          $content=extractlinks($link);
          $css=validCss($content,$link);

          echo $css;

          }

      }
     }


     function linkCss($link5){
      $context = stream_context_set_default( [
          'ssl' => [
             'verify_peer' => false,
             'verify_peer_name' => false,
          ],
       ]);
      $url = file_get_html($link5,false,$context); // Ont récupere tout le code xhtml de la page.
      $liens=array();
      $links = array();
      if($url && is_object($url) && isset($url->nodes)){
      foreach($url->find('<link') as $a) {
      $links[] = $a->href;
      }
  }
      foreach($links as $link){

      if(preg_match("#.css?#",$link)){

          if(strpos($link, 'http') === 0){

                if(strpos($link, $link5) === 0){
                array_push($liens,$link);}

            }
        elseif(strpos($link, '..') === 0) {
          $link5=preg_replace('#[^/]*$#', '', $link5);

            $link=$link5.'/'.'..'.'/'.$link;

            if(strpos($link, $link5) === 0){
                array_push($liens,$link);}

        }
        elseif(preg_match("#^[a-z]#",$link)) {
          $link5=preg_replace('#[^/]*$#', '', $link5);
            $link=$link5.'/'.$link;

            if(strpos($link, $link5) === 0){
                array_push($liens,$link);}

        }

        elseif(strpos($link, '.') === 0){
          $link5=preg_replace('#[^/]*$#', '', $link5);
            $link=$link5.'/'.$link;

            if(strpos($link, $link5) === 0){
                array_push($liens,$link);}

        }
        else{

            array_push($liens,$link);

        }

        }



       return $liens;
          }

  }
































 function validImage($link5,$linkoo){
   for ($i=0; $i <28 ; $i++) {
       echo "<br />";
   }

 echo "<section>";
 echo  '<h3><strong style = "font-size: 20px;color :white; border: 3px solid #ccc; border-radius: 6px;"> link that have this images :'.$linkoo.'</strong>'    .'</h3>';

		 $mm="";
		 $context = stream_context_set_default( [ // nécessaire pour utiliser https avec un certificat auto-signé (donc non valide) avec file_get_contents
				 'ssl' => [
						'verify_peer' => false,
						'verify_peer_name' => false,
				 ],
			]);
		 $url = file_get_html($link5,false,$context); // Ont récupere tout le code xhtml de la page.
		 //$url  = htmlspecialchars($url);

		 $urll = explode("\n", $url);
		 $images = array();



     //(((())))
     echo '<div class="tbl-header">';

      echo '<table class = "affichage"   >';
           echo "<thead>";
               echo "<tr>";
                 echo "<th>type</th>";
                 echo "<th>image</th>";
                 echo "<th>taille</th>";

               echo "</tr>";
      echo "</thead>";
      echo "</table>";
     echo "</div>";


		 foreach($url->find('img') as $img) {
		 $images[] = $img->src;
		 }

     $j = 1;
     $i = 1;
     echo '<div class="tbl-content">';
     echo '<table  class = "affichage" >';
		 foreach($images as $image){
				 //echo  $image;

				 $image1 = get_headers($link5.'/'.$image, 1);
				 $bytes = $image1 ["Content-Length"];
				 $tailleMo=$bytes/(1024 * 1024);





				 if ($tailleMo>=0.03)  {
           echo '<tr >';
           echo '<td    >';
				 echo '<h4><strong style = " background-color: #F08080;border: 3px solid #ccc; border-radius: 6px;">error image'.$j.'</strong>'.'</h4>';
         echo "</td>";
         echo "<td>";
         echo $image;;
        echo "</td>";

        echo "<td>";
        echo "la taille :".$tailleMo."Mo";
       echo "</td>";


         echo "</tr>";
         $j=$j+1;
         //--------------------------










         }




         else {
           echo '<tr  >';
           echo '<td  >';
         echo  '<h4><strong style = " background-color:  	#00FF7F;border: 3px solid #ccc; border-radius: 6px;"> valide image'.$i .'</strong>'.'</h4>';
         echo "</td>";

         echo "<td>";
         echo $image;
         echo "</td>";

         echo "<td>";
         echo "la taille :".$tailleMo."Mo";
        echo "</td>";


         echo "</tr>";
         $i = $i+1;



         }



		 }








     echo "</table>";
     echo "</div>";
      echo "</section>";
}

function validatLink($link5){
 $context = stream_context_set_default( [ // nécessaire pour utiliser https avec un certificat auto-signé (donc non valide) avec file_get_contents
		 'ssl' => [
				'verify_peer' => false,
				'verify_peer_name' => false,
		 ],
	]);
 $url = file_get_html($link5,false,$context); // Ont récupere tout le code xhtml de la page.
 $urll = explode("\n", $url);

 for ($i=0; $i <28 ; $i++) {
     echo "<br />";
 }

		 $links = array();
		 foreach($url->find('a') as $a) {
		 $links[] = $a->href;
		 }
     echo "<section>";


     //((((((((((((((((()))))))))))))))))
     echo '<div class="tbl-header">';

      echo '<table class = "affichage"   >';
           echo "<thead>";
               echo "<tr>";
                 echo "<th>type</th>";
                 echo "<th>link</th>";
               echo "</tr>";
      echo "</thead>";
      echo "</table>";
     echo "</div>";

     echo '<div class="tbl-content">';
     echo '<table  class = "affichage" >';



		 foreach($links as $link){
				// echo $link;


		 if(strpos($link, 'http') === 0){
						 echo @validlien($link) ;


				 }
		 elseif(strpos($link, '..') === 0) {
				 $link=$link5.'/../'.$link;
				 echo @validlien($link);


		 }
		 elseif(preg_match("#^[a-z]#",$link)) {
				 $link=$link5.'/'.$link;
				 echo @validlien($link);


		 }

		 elseif(strpos($link, '.') === 0){
				 $link=$link5.'/'.$link;
				 echo @validlien($link);


		 }
		 else{

				 echo @validlien($link);
		 }





		 }
     echo "</table>";
     echo "</div>";
     echo "</section>";



 }


 function validlien($lien){


     $bool=fopen($lien,'r');



     if($bool==true){

		 }
		 else {





       //---------------------------------------
       echo '<tr  >';
       echo '<td >';
         echo "<h4>",'<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error broken link 404 not found : </strong>'."</h4>";
         echo "</td>";
         echo "<td>".$lien."</td>";

         echo "</tr>";




		 }
 }

 // hna html complet --------------------------------------------
 function linkHTML($link5){
         $context = stream_context_set_default( [ // nécessaire pour utiliser https avec un certificat auto-signé (donc non valide) avec file_get_contents
             'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
             ],
          ]);
         $url = file_get_html($link5,false,$context); // Ont récupere tout le code xhtml de la page.
         $urll = explode("\n", $url);

         $liens=array();
         $links = array();
         if($url && is_object($url) && isset($url->nodes)){
         foreach($url->find('a') as $a) {
         $links[] = $a->href;
         }
     }
         foreach($links as $link){
             if ((preg_match("#.php?#", $link)||(preg_match("#.html?#", $link))) && !(preg_match("#phpinfo.php?#", $link) )) {


         if(strpos($link, 'http') === 0){
                 //echo $link. '1';
                 //echo "<br />";

                 if(strpos($link, $link5) === 0){
                 array_push($liens,$link);}

             }

         elseif(strpos($link, '..') === 0) {
             $link=$link5.'/'.$link;
             //echo $link.'2';
             //echo "<br />";

             if(strpos($link, $link5) === 0){
                 array_push($liens,$link);}

         }
         elseif(preg_match("#^[a-z]#",$link)) {
             $link=$link5.'/'.$link;
            //echo $link.'4';
            //echo "<br />";

             if(strpos($link, $link5) === 0){
                 array_push($liens,$link);}

         }

         elseif(strpos($link, '.') === 0){
             $link=$link5.'/'.$link;
             //echo $link.'3';
             //echo "<br />";

             if(strpos($link, $link5) === 0){
                 array_push($liens,$link);}

         }
         else{
             //echo $link.'5';
             //echo "<br />";

             array_push($liens,$link);

         }

         }
     }

         return $liens;
     }

 /********************************** */
 function validHtmlsite2($link5){
     $tabs=linkHTML($link5);
     foreach($tabs as $tab ){
         //$res=validatHtml($tab);
         if(validlien2($tab)==false){


         }
         else {
         $content=extractlinks($tab);
         $res=validatHtml($content,$tab);
         echo $res;


         }
     }
 }

 /******************************* */
 function validlien2($lien){
     $bool=fopen($lien,'r');
     // if($bool==true){
     //     echo 'mzian';
     // }
     // else {
     //     echo 'walo';
     // }
     return $bool;
 }


 // css complet ------------------------------------------
 function validatLink2($link5){

     $context = stream_context_set_default( [ // nécessaire pour utiliser https avec un certificat auto-signé (donc non valide) avec file_get_contents
         'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
         ],
      ]);
     $url = file_get_html($link5,false,$context); // Ont récupere tout le code xhtml de la page.
     $urll = explode("\n", $url);

     $liens=array();
     $links = array();
     if($url && is_object($url) && isset($url->nodes)){
     foreach($url->find('a') as $a) {
     $links[] = $a->href;
     }
 }
     foreach($links as $link){
        // echo $link;

     if(strpos($link, 'http') === 0){
             //echo $link. '1';
             //echo "<br />";

             if(strpos($link, $link5) === 0){
             array_push($liens,$link);}

         }

     elseif(strpos($link, '..') === 0) {
         $link=$link5.'/'.$link;
         //echo $link.'2';
         //echo "<br />";

         if(strpos($link, $link5) === 0){
             array_push($liens,$link);}

     }
     elseif(preg_match("#^[a-z]#",$link)) {
         $link=$link5.'/'.$link;
        //echo $link.'4';
        //echo "<br />";

         if(strpos($link, $link5) === 0){
             array_push($liens,$link);}

     }

     elseif(strpos($link, '.') === 0){
         $link=$link5.'/'.$link;
         //echo $link.'3';
         //echo "<br />";

         if(strpos($link, $link5) === 0){
             array_push($liens,$link);}

     }
     else{
         //echo $link.'5';
         //echo "<br />";

         array_push($liens,$link);

     }

     }


     return $liens;
 }


 function validCsssite2($link5){
     $pages=validatLink2($link5);
     foreach($pages as $page){
         if(@fopen($page,'r')==true){
         $linkscss=linkCss($page);
         if(is_array($linkscss)){
         foreach($linkscss as $link){

             $content=extractlinks($link);
             $css=validCss($content,$link);

             echo $css;



        }
     }
         echo "<br />";
     }
     else {
         continue;
     }
     }

 }

// image complet

function extractlinks2($link5){
    $context = stream_context_set_default( [ // nécessaire pour utiliser https avec un certificat auto-signé (donc non valide) avec file_get_contents
        'ssl' => [
           'verify_peer' => false,
           'verify_peer_name' => false,
        ],
     ]);
    $url = file_get_html($link5,false,$context); // Ont récupere tout le code xhtml de la page.
    $urll = explode("\n", $url);

    $liens=array();
    $links = array();
    if($url && is_object($url) && isset($url->nodes)){
    foreach($url->find('a') as $a) {
    $links[] = $a->href;
    }
}
    foreach($links as $link){

    if(strpos($link, 'http') === 0){

            if(strpos($link, $link5) === 0){
            array_push($liens,$link);}

        }

    elseif(strpos($link, '..') === 0) {
        $link=$link5.'/../../'.$link;

        if(strpos($link, $link5) === 0){
            array_push($liens,$link);}

    }
    elseif(preg_match("#^[a-z]#",$link)) {
        $link=$link5.'/'.$link;


        if(strpos($link, $link5) === 0){
            array_push($liens,$link);}

    }

    elseif(strpos($link, '.') === 0){
        $link=$link5.'/'.$link;


        if(strpos($link, $link5) === 0){
            array_push($liens,$link);}

    }
    else{

        if(strpos($link, $link5) === 0){
        array_push($liens,$link);
        }
    }

    }


    return $liens;
}








function valid_image_site($lien){
    $pages=array();
    $pages=extractlinks2($lien);

    foreach($pages as $page){

        if(@fopen($page,'r'==true)){
          //echo $page;

        $image_page_valid=validImage($page,$page);


        echo $image_page_valid;

        }
        else {
            continue;
        }
    }
}


// lien complettttt

function lien_de_page($url){

    $context = stream_context_set_default( [ // nécessaire pour utiliser https avec un certificat auto-signé (donc non valide) avec file_get_contents
        'ssl' => [
           'verify_peer' => false,
           'verify_peer_name' => false,
        ],
     ]);
if(@fopen($url,r)==true){
$html = file_get_html($url);
$links = array();
foreach($html->find('a') as $element){
       $links[] = $element->href;
}
return $links;
}
else {
    //echo 'lien cassé'.$url;
   // echo "<br />";
}

}

function lien_site($lien){
    $liens=array();
    $liens2=array();
    $liens=@lien_de_page($lien);
    for ($i=0; $i < count($liens) ; $i++){
        if(preg_match("#^[a-z]#",$liens[$i]) && !(strpos($liens[$i], 'http') === 0)){
            $liens[$i]=$lien.'/'.$liens[$i];
             if(strpos($liens[$i], $lien) === 0){
                 //echo $liens[$i];
                 //echo "<br />";
               $liens2=@lien_de_page($liens[$i]);
              for($j=0;$j<count($liens2);$j++){
                 //echo $liens2[$j];
                 //echo "<br />";
              if(strpos($liens2[$j], '..') === 0){
                  $liens2[$j]=$liens[$i].'/../../'.$liens2[$j];
                  //echo $liens2[$j];
                 //echo "<br />";
                  if(!in_array($liens2[$j],$liens)){
                     array_push($liens,$liens2[$j]);

                  }
              }
              if(strpos($liens2[$j], '#') === 0)
               {

                    $liens2[$j]=$liens[$i].'/'.$liens2[$j];
                   // echo $liens2[$j];
                   //echo "<br />";
                    if(!in_array($liens2[$j],$liens)){
                       array_push($liens,$liens2[$j]);

                    }
                }
              }
          }

             }

        }

          echo "<section>";

          for ($i=0; $i <28 ; $i++) {
              echo "<br />";
          }


        echo '<div class="tbl-header">';

         echo '<table class = "affichage"   >';
              echo "<thead>";
                  echo "<tr>";
                    echo "<th>Type</th>";
                    echo "<th>Link</th>";

                  echo "</tr>";
         echo "</thead>";
         echo "</table>";
        echo "</div>";




        echo '<div class="tbl-content">';
        echo '<table  class ="affichage" >';
        echo "<tbody>";






        foreach($liens as $lien){
            if(@fopen($lien,'r')==true){

            }
            else{

              echo '<tr  >';
              echo '<td >';
                echo "<h4>",'<strong style = " background-color: #fe6262;border: 1px solid #ccc; border-radius: 6px;" >Error broken link 404 not found : </strong>'."</h4>";
                echo "</td>";
                echo "<td>".$lien."</td>";

                echo "</tr>";

            }
        }
        echo "</tbody>";
         echo '</table>';
         echo "</div>";
         echo "</section>";

}















 ?>
