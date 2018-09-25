

<html>
<head>
   <title>
       Affiche topics
   </title>

	<?php 
       session_start();
          
       include"php/function.php";

       include "class/getDataConnect.class.php";
       $getData=new getDataConnect();


	 require "php/topics_php.php";
	 require"php/function_forum.php";


      if ($getData->getIdPublic()!=null) {
         # code...

        ?>

 
                 <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
                <script src="js/jquery.js"></script>
            
                 <script src="js/jquery 2.2.0.js"></script>
                  <script src="js/forum_js.js"></script>
                 
                    <script src='js/jquery.wysibb.js'></script>
                    <link rel="stylesheet" href="css/wbbtheme2.css" type="text/css">
                    <script src='js/wysibb.fr.js'></script>
                    <link rel="stylesheet" href="css/forum.css">
                    <meta charset="utf-8">  

         <script>
            
           
      var $j=jQuery.noConflict();

        $j(function(){


              var option = {
                 buttons:"smilebox,bold,italic,underline,fontcolor,|,bullist,video,tweet,img,link,|,code,quote",lang:"fr",resize_maxheight:"5000",allButtons:{code:{hotkey:"ctrl+shift+3",transform:{"<pre><code>{SELTEXT}</code></pre>":"[code]{SELTEXT}[/code]"}},tweet:{title:"Insérer un Tweet",buttonText:"Tweet",modal:{title:"Insérer un Tweet",width:"600px",tabs:[{input:[{param:"ID",title:'Entrez l\'id du tweet (Ex: <span style="color:#c1c1c1">https://twitter.com/PrimFX/status/</span><u>703307263306539013</u>)',validation:"^([0-9]*)$"}]}],onLoad:function(){},onSubmit:function(){}},transform:{'<div class="tweet-box">Ce Tweet (https://twitter.com/twitter/status/{ID}) apparaîtra à cet emplacement dans l\'article</div>':"[tweet]{ID}[/tweet]"}},

                         img : {
                  title: CURLANG.img,
                  buttonHTML: '<span class="fonticon ve-tlb-img1">\uE006</span>',
                  hotkey: 'ctrl+shift+1',
                  addWrap: true,
                  modal: {
                    title: CURLANG.modal_img_title,
                    width: "600px",
                    tabs: [
                      {
                        title: CURLANG.modal_img_tab1,
                        input: [
                          {param: "SRC",title:CURLANG.modal_imgsrc_text,validation: '^*?\.(jpg|png|gif|jpeg)$'}
                        ]
                      }
                    ],
                    onLoad: this.imgLoadModal
                  },
                  transform : {
                    '<img src="{SRC}" />':"[img]{SRC}[/img]",
                    '<img src="{SRC}" width="{WIDTH}" height="{HEIGHT}"/>':"[img width={WIDTH},height={HEIGHT}]{SRC}[/img]"
                  }
                }
                  }
            
  
                }


      $j("#wysibb").wysibb(option);

      
   })


         </script>
    </head>

    <body>

    <div class="container">
        <div class="row">

           <?php include "bout de page/entete.php"; ?>

       </div>
       <br>
        


          <div class="row col-md-11 col-sm-11 col-xs-11" id="suivie"  >

            <a href="index.php" style="text-decoration: none;">
            <span style="color: #FF4500; ">Acceuil</span> <img src="img/icone/next3.png" width="13" >  </a>
            <a href="forums.php" title="retourner" style="text-decoration: none;"><span  style="color: #FF4500; "> Forums </span ></a><img src="img/icone/next3.png" width="13" >
            <span style=" color: #A8A8A8;"> <?= $_GET['titre'] ?> </span >

        </div>
        <br><br><br>

<!-- affichage des categories et sous categories toute ici dans cette partie-->
        <section class="row">
            
      
         <span class="sujet_titre" style="font-size: 35px;margin-left: 95px"><?= $t['sujet']; ?></span><br>
            <br>
            <div class="row col-md-9 col-md-offset-1 view_topic_autor" style="background: #9ACD32;margin-left: 130px" >

                  
                    <span class="prenom_auteur row 1 "  >   <?= get_pseudo($t['id_createur']);?></span>
                      <span class="avatar_auteur row col-md-2"  >
                        <?php

                         $avatar=get_avatar($t['id_createur']);

                     echo "<img src='php/img_update/$avatar' style='border-radius: 3px;' width=100 height=80>"; ?>
                        
                     </span>

                     <span class="contenu_topic col-md-8 ">

                        <?php 
                                 $parser->parse($t['contenu']);
                                     
                                 echo $parser->getAsHtml();


                     ?></span>

                      <span class="row" style="position: absolute;bottom:0">

                                     <?php 
                                    
                                      echo "Le ".$t['date_heure_creation'];
                                

                             ?></span>

                  
            </div>
            <br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
            <br><br><br><br>
            <br> 

                <?php 
                  $ir=0;
                 while ($r=$reponses->fetch()) {
                      $ir++;
                    ?>

                <div class="row col-md-9 col-md-offset-1 view_topic"   class=<?=$ir ?> >

                    
                        <span class="prenom_auteur row"><?= get_pseudo($r['id_posteur']); ?></span>

                        <span class="avatar_auteur row col-md-2"  >

                                 <?php

                           
                             $avatar=get_avatar($r['id_posteur'],"inscription");
                             echo "<img src='php/img_update/$avatar' width=80 height=70; style='border-radius:5pxs'>"; 
                             ?>
                                
                        
                         </span>

                         <span class="contenu_topic col-md-8 ">

                                     <?php 
                                    
                                      $parser->parse($r['contenu']);
                                    echo $parser->getAsHtml();

                             ?></span>

                             <span class="row" style="position: absolute;bottom:0">

                                     <?php 
                                    
                                      echo "Le ".$r['date_heure_post'];
                                

                             ?></span>


                         
                  
            </div>

                 
                    <?php
                }
                
                

               
                 ?> 

</section>
            <?php if ($getData->getIdPublic()!=null) {
                ?>   
  <br><br>  <br><br><br>
            <form  method="post" class="row ">

                    <div class="row form-group " >
                         <button type="submit" class="topic_reponse_submit pull-right"  name="topic_reponse_submit" value='poster ma reponse'>
                        <img src="img/icone/pinceau1.jpg" width="15" height="15"  alt="pinceau">Poster ma reponse
                     </button>
                        <textarea id="wysibb"  name="topic_reponse"  placeholder="votre réponse" class="topic_reponse" ><?php if (isset($reponse)) {
                            echo $reponse;} ?>
                            
                        </textarea>

                            </div>
                            <br>

                  
                    
                    
                   
                    

                    <span class="reponse_msg">
                    <?php if (!empty($reponse_msg)) {
                    echo $reponse_msg;
                            } ?> </span>
            </form>

                <?php
            } 
            else{
                ?>
                <p>veuillez vous connecter ou creer un compte pour poster une reponse</p>
                 <?php


            } ?>
            
            
               <?php 
                
                // for ($i=0; $i<=$pagesTotales ; $i++) {  

                //      if ($i==$pageCourante) {

                //      echo $i.' ';
                //                          }

                //      else{

                //      echo '<a  href="topics_view.php? titre='.$get_titre.'&id='.$get_id.'&page='.$i.'"  style="position:relative;left:20%; margin-left:1%"'.'>'.$i.'</a>';
                //  }
                //  # code...
                // }

                 ?>
       

</div>
    </body>
</html>




        <?php
     }
	

     ?>
	