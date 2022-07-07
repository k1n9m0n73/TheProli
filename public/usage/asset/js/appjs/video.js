let video = document.querySelector('.vid1');
let video2 = document.querySelector('.vid2');
startVid = function(){
    
navigator.getUserMedia(
    {video:video},
    stream=>{
        video.srcObject=stream;
        stream.onaddtrack()
        console.log(stream)}
    ,err=>console.log(err))   



}
console.log(video,video2);
//startVid();
 function liveStream(){
     let streamObj = {
         audio:false,
         video:{facingMode:"user",
                width:640,ideal:1280,max:1920,muted:false
        }
     }
       //////////////////
    if (navigator.mediaDevices==='undefined') {
        
    }else{
        navigator.mediaDevices.enumerateDevices().then(device=>{
           console.log(device);
        }).catch(err=>{
            console.log(err.name,err.message)
        })

    }
    ////////////////////////////////////////
    
    navigator.mediaDevices.getUserMedia(streamObj).then(streamcont=>{
        if("srcObject" in video){
           video.srcObject = streamcont; 
        }else{
            //////////old version
            video.src = window.URL.createObjectURL(streamcont);
        }
     video.onloadeddata = function(ev){
         console.log(ev)
         video.play()

     }

     ///////////////////save video and audeo
     let btn = {
         start:document.querySelector('.start'),
         stop:document.querySelector('.stop'),
         pause:document.querySelector('.pause'),
         save:document.querySelector('.save')
     }

     let chk=[];

   
     let mediaRecorder = new MediaRecorder(streamcont);
     console.log(mediaRecorder)
     btn.start.addEventListener('click',function(ev){
         mediaRecorder.start()
         console.log('start')
    })  

     btn.stop.addEventListener('click',function(ev){mediaRecorder.stop()})  
     btn.pause.addEventListener('click',function(ev){mediaRecorder.pause()})    
     btn.save.addEventListener('click',function(ev){mediaRecorder.save()}) 

    mediaRecorder.onstart = function(data){
        
       console.log(data.data)
    } 

    mediaRecorder.ondataavailable = function(data){
         console.log(data)
         chk.push(data.data)
    //   let file = new FileReader();
    //   file.onload = function(d){
    //     console.log(d)
      //}  
     // let src  = 

    }

  mediaRecorder.onaddtrack=function(data){
      console.log(data)
  }

  mediaRecorder.onstop=function(data){
      let blob = new Blob(chk,{type:'video/mp4'});
      chk =[];
      let vidSrc = window.URL.createObjectURL(blob);
      console.log(vidSrc);
      video2.src = vidSrc
    console.log(data)
}

    }).catch(err=>{
        //console.log(err.name,err.message)
    })
    //////////////////////////////////////////////////

    

 }
 liveStream()


