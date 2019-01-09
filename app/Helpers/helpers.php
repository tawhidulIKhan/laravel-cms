<?php

function cms_notification($errors){
    
    if(session()->has('message')):
        echo '<div class="alert alert-'.session()->get('type').'">'.session()->get('message').'</div>';
    endif;

    if($errors->any()):
    echo '<div class="alert alert-danger">';
      foreach ($errors->all() as $error):
            echo '<li>'. $error .'</li>';
      endforeach;
    echo '</div>';
    endif;


}



// Image Link

function cms_thumbnail($name){

    $link = substr($name,0,7);

    if($link === "https:/" || $link === "http://" ){
        return $name;
    }elseif($name === null){
        return asset('storage/images/default.jpg');

    }
    return asset('storage/images/'.$name);
}


function cms_image_process($request,$name){

    if($request->hasFile($name)){

        $validator = validator()->make($request->all(),[
            $name  => 'image',
       ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator);
        }


        $imgName = sprintf('%s.%s',str_random(10),$request->$name->extension());
        
        $request->$name->storeAs('images',$imgName);


    }else{

        $imgName = 'default.jpg';

    }

    return $imgName;

}