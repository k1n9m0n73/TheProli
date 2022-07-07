<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
<table style="border-spacing:0;border-collapse:collapse;vertical-align:top;height:100%;width:100%;table-layout:fixed;margin: 0px auto;" cellpadding="0" cellspacing="0" width="100%" border="0">
        <tbody>
        <tr style="vertical-align:top">


       <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;background-color:transparent;padding-top:0;padding-right:0;padding-bottom:0px;padding-left:0;border-top:1px solid #ededed;border-right:1px solid #ededed;border-bottom:1px solid #ededed;border-left:1px solid #ededed">
                                                                                        
     <div style="font-size:14px;line-height:17px;text-align:center;color:white;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;background:#f05050">
    <p style="margin:0;font-size:14px;line-height:17px;text-align:center">{{$details['subject']}}</p>
  </div>
 
   
           
  <table style="border-spacing:0;border-collapse:collapse;vertical-align:top;background:#89dd52;" repeat cellpadding="0" cellspacing="0" width="100%">
<tbody>
 <tr style="vertical-align:top">
   <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:40px;padding-right:10px;padding-bottom:0px;padding-left:10px">
    <div style="color:#fdfffe;line-height:150%;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;">             
        <div style="padding-bottom:40px">                           
        <p style="margin:0 auto;max-width:300px;font-size:12px;line-height:18px;text-align:center;color:#fff;">           
            <span style="font-size:20px;line-height:20px;color:#fff;font-weight:700">
            <a  style="color:#fff; text-decoration: none" href="mailto:{{$details['to']}}" target="_blank">{{$details['to']}}</a>
          </span>
      </p>
      </div>
      </div>
    </td>
   </tr>     
      
   </tbody>      
    </table>

   




   <table style="border-spacing:0;border-collapse:collapse;vertical-align:top" cellpadding="0" cellspacing="0" width="100%">           
     <tbody>
        <tr style="vertical-align:top">
             <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:20px;padding-right:10px;padding-bottom:20px;padding-left:10px">
        <div style="color:#555555;line-height:120%;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;"> 

            <div style="margin-top:20px;margin-bottom:10px;padding:0px;border:none;outline:none;list-style:none;display:inline;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif">

                <p style="margin:0;font-size:14px;line-height:17px;text-align:center">
                           <strong>
                        <span style="font-size:16px;line-height:19px">Email Details</span>
                        </strong>
                        <br />
               </p>
             </div>
        </div>
   </td>      
    </tr>
 </tbody>
 </table>


 <table style="border-spacing:0;border-collapse:collapse;vertical-align:top" cellpadding="0" cellspacing="0" width="100%">           
     <tbody>

        <tr style="vertical-align:top">
          <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:20px;padding-right:10px;padding-bottom:20px;padding-left:10px">
            <div style="color:#555555;line-height:120%;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;">                      
            <div style="margin-top:20px;margin-bottom:10px;padding:0px;border:none;outline:none;list-style:none;display:inline;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif">
                <p style="margin:0;font-size:14px;line-height:17px;text-align:left">
                           <strong>
                        <span style="font-size:16px;line-height:19px"><?=$details['message']?></span>
                        </strong>

                      <br />
               </p> 
             </div>
        </div>
      </td>
    </tr>
 </tbody>
 </table>



<table style="border-spacing:0;border-collapse:collapse;vertical-align:top" cellpadding="0" cellspacing="0" width="100%">           
     <tbody>
        <tr style="vertical-align:top">
             <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:20px;padding-right:10px;padding-bottom:20px;padding-left:10px">
            <div style="color:#555555;line-height:120%;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;border-top:0.07px inset rgba(0,0,0,.1);">     
            <br>                 
             <div style="font-size:14px;line-height:17px;text-align:center;color:#555555;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;">
                <p style="margin:0;font-size:14px;line-height:17px;text-align:left">
                          <a href ="{{$details['link']}}"> <strong>
                        <span style="font-size:16px;line-height:19px;color:red;">{{$details['link_text']}}</span>
                        </strong></a><br />
               </p>
             </div>
        </div>
   </td>      
    </tr>
 </tbody>

<table style="border-spacing:0;border-collapse:collapse;vertical-align:top" cellpadding="0" cellspacing="0" width="100%">
    <tbody>     
        
        <tr style="vertical-align:top">
          <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:0;padding-right:20px;padding-bottom:0;padding-left:20px">
                      <div style="color:#555555;line-height:120%;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif;">  
                         <div style="margin-top:20px;margin-bottom:10px;padding:0px;border:none;outline:none;list-style:none;display:inline;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif">

       

                 <br />
                      <p style="margin:0;font-size:14px;line-height:17px;text-align:left">&nbsp; Date
                     <strong style="float:right">{{$details['time']}}</strong>  
                     <br>
                    </p>
               </div>
            </td>
          </tr> 
</tbody>
</table>


 <table style="border-spacing:0;border-collapse:collapse;vertical-align:top" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tbody>
           <tr style="vertical-align:top">
              <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:30px;padding-right:10px;padding-bottom:10px;padding-left:10px" align="center">
                       <div style="height:1px">
                           <table style="border-spacing:0;border-collapse:collapse;vertical-align:top;border-top:1px solid #d9d9d9;width:20px" align="center" border="0" cellspacing="0">
                               <tbody>
                                   <tr style="vertical-align:top">
                                 <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top" align="center"></td>
                                </tr>
                            </tbody>
                              </table>
                        </div>
                </td>
            </tr>
      </tbody>
  </table>



    <table style="border-spacing:0;border-collapse:collapse;vertical-align:top" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
         <tr style="vertical-align:top;background: #000;color: #ffff">
           <td style="word-break:break-word;border-collapse:collapse!important;vertical-align:top;padding-top:20px;padding-right:10px;padding-bottom:0px;padding-left:10px;text-align:center">
                        <div style="margin-top:20px;margin-bottom:10px;padding:0px;border:none;outline:none;list-style:none;display:inline;font-family:-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Oxygen,Ubuntu,Cantarell,Fira Sans,Droid Sans,Helvetica Neue,sans-serif">
                          <center>coypright THEPROLI {{$details['year']}}</center>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>


 </td>  
 </tr>
 </tbody>
 </table>
</body>
</html>