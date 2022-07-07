<?php
if(!is_dir('public/usage/images')){
    mkdir('public/usage/images');
    echo " Image directory created". "\n";
}

if(!is_dir('public/usage/images/about-icon')){
    mkdir('public/usage/images/about-icon');
    echo " about icon directory created". "\n";
}

if(!is_dir('public/usage/images/admimg')){
    mkdir('public/usage/images/admimg');
    echo " admin files directory created". "\n";
}

if(!is_dir('public/usage/images/advimg')){
    mkdir('public/usage/images/advimg');
    echo "advert files directory created". "\n";
}
sleep(3);
if(!is_dir('public/usage/images/aggimg')){
    mkdir('public/usage/images/aggimg');
    echo " aggregator files directory created". "\n";
}
sleep(3);
if(!is_dir('public/usage/images/hubimg')){
    mkdir('public/usage/images/hubimg');
    echo " hub files directory created". "\n";
}
if(!is_dir('public/usage/images/banner')){
    mkdir('public/usage/images/banner');
    echo " courosel files directory created". "\n";
}

if(!is_dir('public/usage/images/cat-icon')){
    mkdir('public/usage/images/cat-icon');
    echo " product icon files directory created". "\n";

}
echo "Proceeding to the next step\n";
sleep(3);

if(!is_dir('public/usage/images/desc-message')){
    mkdir('public/usage/images/desc-message');
    echo "image for message files directory created". "\n";
}

if(!is_dir('public/usage/images/disc-pimg')){
    mkdir('public/usage/images/disc-pimg');
    echo " product image files directory created". "\n";
}

if(!is_dir('public/usage/images/farimg')){
    mkdir('public/usage/images/farimg');
    echo "farmer  files directory created". "\n";
}

if(!is_dir('public/usage/images/itemimg')){
    mkdir('public/usage/images/itemimg');
     echo "item type files directory created". "\n";
}

if(!is_dir('public/usage/images/logimg')){
    mkdir('public/usage/images/logimg');
    echo "logistics files directory created". "\n";
}

if(!is_dir('public/usage/images/mesimg')){
    mkdir('public/usage/images/mesimg');
    echo " message files directory created". "\n";
}
echo "Proceeding to the next step\n";
sleep(3);
if(!is_dir('public/usage/images/newletter-images')){
    mkdir('public/usage/images/newletter-images');
    echo " newsletter files directory created". "\n";
    
}

if(!is_dir('public/usage/images/pimg')){
    mkdir('public/usage/images/pimg');
    echo "product  files directory created". "\n";
}

if(!is_dir('public/usage/images/summer-img-for-reg')){
    mkdir('public/usage/images/summer-img-for-reg');
    echo " registration news files directory created". "\n";
}

if(!is_dir('public/usage/images/vesimg')){
    mkdir('public/usage/images/vesimg');
    echo " vehicles files directory created". "\n";
}
echo "Proceeding to the next step\n";
sleep(3);
if(!is_dir('public/usage/images/warimg')){
    mkdir('public/usage/images/warimg');
    echo " warewhouse files directory created". "\n";
}
$cons  = scandir('cat-icon');
  foreach($cons as $key => $con ){
     if(preg_match("/png/",$con)){
         copy("cat-icon/{$con}","./public/usage/images/cat-icon/{$con}");
     }
  }

//$copy("cat-icon","./public/usage/images");
echo  "finish creating directory";