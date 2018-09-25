<?php 
session_start();
require_once "jbbcode/Parser.php";
include"php/function_forum.php";
include"php/function.php";
include "class/getDataConnect.class.php";
$getData=new getDataConnect();

include "php/forum_php.php";
include"php/nouveau_topic_php.php";

 ?>

<html>
<head>

    <meta charset="utf-9" >
	<title>creer un topics</title>


  
                  
                 <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
                <script src="js/jquery.js"></script>
            
                <script src="js/jquery 2.2.0.js"></script>
                
                
                  <script src="js/forum_js.js"></script>
                  

                 <script src='js/jquery.wysibb.js'></script>
                 <script src='js/wysibb.fr.js'></script>
                  <link rel="stylesheet" href="css/wbbtheme.css" type="text/css">
                  <link rel="stylesheet" href="css/forum.css">
           
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


      $j("#editor").wysibb(option);

      
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
            <span style=" color: #A8A8A8;"> <?= $_GET['categorie'] ?> </span >

        </div>



    
       <br><br><br>

       <section class="row">

          <a href="#formulaire" title="descendre" class="descendre">
           <button class="creer_topics pull-right" id="creerTopic" title="creer un topic"><img src="img/icone/pinceau1.jpg" width="15" height="15"  alt="pinceau">  creer un sujet </button>
            </a>
            <div id="nom_sujet" class="col-md-offset-1 pull-left" >
               
              <?php 
              $s=htmlspecialchars($_GET['categorie']); 
              if (!empty($s) ) {
                
                ?>
                <h1 style="color: #7f8c8d; "><?php echo $s; ?></h1>

                <?php
              } else{
                die("erreur la variable n'existe pass");
              } ?>
            </div>
            <br><br><br><br>

           <!-- affichage des topics -->
        <div class="row col-md-9 col-md-offset-1" id="topicsShow"  >


          <?php  while ($t=$topics->fetch()) {
          ?>  


            <a href='topics_view.php?titre=<?=$t['sujet']?>&id=<?=$t['topics_base_id'] ?>' >

             <div class="row affichage_topics" ">
                
              <h4  style=" color: #3D3D3D"> <?php echo $t['sujet']; ?></h4>

              <span  style="color: #7f8c8d"> 

               <?= derniere_reponse_topic($t['topics_base_id']) ?>
                 
               </span>
              <span class="message_topics" style="margin-left: 80px;">

              <?php 
              if (reponse_nbr_topic($t['topics_base_id'])==0)
               {
                echo "<span style='margin-left:160px'> Aucun messsage</span>";
              }
              else{
                echo reponse_nbr_topic($t['topics_base_id'])."  "."messsages";
              }

               ?> 
                </span>

              <span class="date_topics pull-right" ><?php echo $t['date_heure_creation']; ?> </span>
              <span class="createur_topics pull-right"> par <?php echo "  ".$t['prenom']." "; ?></span>
           

             <br>
            </div>

          </a>
              

            <?php
            
          } ?>
           


       </div>
  </section>

<br><br><br>


      <!-- ici le block pour ajouter un nouveau topics -->
<section id="formulaire" class="row col-md-7 col-md-offset-2" style="background-color: white;line-height: 30px" >
      <?php if (!empty($_GET['categorie']) and !empty($_GET['id_cat'])) {
        
        ?>
         
         <div class="row entete_topics " style="padding-left: 100px;padding-right: 10px"> 
              <span >CREER UN SUJET </span>

            </div>
          
      

        <br>

        <div id="corp_topics" class="row">

        <form action="" method="post">


              <div class="row form-group col-md-10"  >
                
              
                <label>Sujet </label>
                <input type="text" name="Tsujet"  class="form-control pull-right" placeholder="" autocomplete="off" maxlength="70" >
               
              </div>
               <br>
               <br>
             

             
         
              <br>
                   <div class="row " style="background-color:#EBECE4;">
               
                    <label  style="margin-left: 50px">sous-categorie</label>

                    <select  name="souscategorie" class="pull-right">

                      <?php while ($cat=$souscategorie->fetch()) {

                   ?> 
                   <option value=<?= $cat['id'] ?>> <?= $cat['nom'];  //affichage de l'id categorie pour recuperer
                  ?></option>
                    
                   <?php
                } 

              
                ?>
               
              </select>
            </div>
            <br>

           
                   <span >     
              <!-- affichage de la variable errreur au cas ou l'utilisateur a depasser 70 caractere -->
              <?php if (isset($terror)) {
               echo $terror;
             }
            ?></span>

              <div class="row form-group col-md-9 " >

                 

                   <textarea    name="Tcontenu"  id="editor" class="textarea editor "></textarea>
                
              </div>
              <br>
                <br>

                <div >

               <label style="margin-right: 25px"> Me notifier par mail</label>
               <input type="checkbox"  name="Tmail" class="check" >

               </div>
              <br>

             <input type="submit" name="Tsubmit"  value="Poster le topic" class="submit"  style=" font-size: 20px;"></div>
              

            </form>
          
       </div>
     </div>

          <a href="#creerTopic" title="Remonter" class="remonter"> <div class="row pull-right up"  >
           
             <img src="img/icone/up3.png" alt="remonter" width="150" height="150">

           </a>
     </div>
</section>
      </div>
      <br><br>
      <?php
      } 

      else{

        die("erreur pas de categorie definie..");

      }  ?>

  
</body>

