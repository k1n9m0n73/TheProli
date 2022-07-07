<!DOCTYPE html>
<html lang="en">
<head>
@include('header-footer.header')


</head>

<body>
@include('admin.sidebar.sidebar')
 <div class="all-content-wrapper"> 
@include('admin.top-header.all')
@include('admin.sub-header.subheader')

<style type="text/css">
    .quick-stats__info{
        display: inline-flex;
      
    }
    .quick-stats__info > div:nth-child(1){
        color: #000;
        font-size: 22px;
        font-weight: 700;
    }

    .quick-stats__info > div:nth-child(2){
        color: #000;
        float: right;
    }


  

  li.actived_ a{
    background: #933EC5;
    color: #fff;
  }

  li[update-qty] a,li[update-qty]{
    cursor: pointer;
    font-size: 1.7rem;
    font-weight: 600;
    text-align: center;
    background: #000;

  }
li.actived_{
    background: #933EC5;
   
  }
  li[update-qty]:hover{
    background: #933EC5;
    opacity: 0.5;
  }
.mt{
  margin: 0 0 1.22em 0;
}
.card{
    background: #fff;
    box-shadow: 0 0 12px;
    margin: 12px 0;
    border-radius: 5px;
}
.listview__content{
    background-color: #000;
    color: #fff;
    margin: 12px 0;

}
</style>

 

<div class="data-table-area mg-b-15">
            <div class="container-fluid">

    <form token method="post" forms >
                        @csrf
                        <div class="row data-count" ></div>
                         <div class="row" cont>
                        
                          
                         <div class="col-sm-4 col-md-4 col-xs-12 agg_"    >
                         
                         </div>

                         <div class="col-sm-4 col-md-4 col-xs-12 far_"    >
                         
                         </div>
                         <div class="col-sm-4 col-md-4 col-xs-12 hub_"    >
                         
                         </div>

                         <div class="col-sm-4 col-md-4 col-xs-12 log_"    >
                         
                         </div>
                         <div class="col-sm-4 col-md-4 col-xs-12 war_"    >
                         
                         </div>

                         <div class="col-sm-4 col-md-4 col-xs-12 cus_"    >
                         
                         </div>

                         <div class="col-sm-4 col-md-4 col-xs-12 prod_"    >
                         
                         </div>

                         <div class="col-sm-4 col-md-4 col-xs-12 ord_"    >
                         
                         </div>

                             </div>  



                             <div class="row" >
                                
                          <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="card widget-visitors">

                              <div class="card-body">
                                  <h4 class="card-title" style="color: #000">Realtime Visitors</h4>
                                  <h6 class="card-subtitle" style="color: #000">Site visitor analysis <a href="/admin/analytics/site-visitors">View Details</a></h6>

                                  <div class="widget-visitors__stats" >
                                      <div  style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" class="__num-visitor">0</strong>
                                          <small style="color: #000">Visitor for last 24 hours</small>
                                      </div>
                                      <!--  <div style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" >746</strong>
                                          <small style="color: #000">Visitors last 30 minutes</small>
                                      </div> -->
                                  </div>

                                  <!--  <div class="widget-visitors__map map-visitors"></div> -->
                              </div>

                              <div class="listview listview--bordered ___visitor" style="    max-height: 137px;overflow-y: auto;">

                                  
                                
                                
                              </div>
                          </div>
                          </div>  
                              

                            <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="card widget-visitors">

                              <div class="card-body">
                                  <h4 class="card-title" style="color: #000">Session that lead to cart</h4>
                                  <h6 class="card-subtitle" style="color: #000">Site visitor analysis</h6>

                                  <div class="widget-visitors__stats" >
                                      <div  style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" class="__num-visitor">0</strong>
                                          <small style="color: #000">Visitor for last 24 hours</small>
                                      </div>
                                      <!--  <div style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" >746</strong>
                                          <small style="color: #000">Visitors last 30 minutes</small>
                                      </div> -->
                                  </div>

                                  <!--  <div class="widget-visitors__map map-visitors"></div> -->
                              </div>

                              <div class="listview listview--bordered ___visitor_cart" style="    max-height: 137px;overflow-y: auto;">

                                  
                                
                                
                              </div>
                          </div>
                          </div>  
                            
                            <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="card widget-visitors">

                              <div class="card-body">
                                  <h4 class="card-title" style="color: #000">Session that lead to checkout</h4>
                                  <h6 class="card-subtitle" style="color: #000">Site visitor analysis </h6>

                                  <div class="widget-visitors__stats" >
                                      <div  style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" class="__num-visitor">0</strong>
                                          <small style="color: #000">Visitor for last 24 hours</small>
                                      </div>
                                      <!--  <div style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" >746</strong>
                                          <small style="color: #000">Visitors last 30 minutes</small>
                                      </div> -->
                                  </div>

                                  <!--  <div class="widget-visitors__map map-visitors"></div> -->
                              </div>

                              <div class="listview listview--bordered ___visitor_checkout" style="    max-height: 137px;overflow-y: auto;">

                                  
                                
                                
                              </div>
                          </div>
                          </div>  

                          <div class="col-md-4 col-sm-4 col-xs-12">
                          <div class="card widget-visitors">

                              <div class="card-body">
                                  <h4 class="card-title" style="color: #000">Session that lead to payment</h4>
                                  <h6 class="card-subtitle" style="color: #000">Site visitor analysis</h6>

                                  <div class="widget-visitors__stats" >
                                      <div  style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" class="__num-visitor">0</strong>
                                          <small style="color: #000">Visitor for last 24 hours</small>
                                      </div>
                                      <!--  <div style="box-shadow: 0 1px 5px rgba(0, 0, 0, .1)">
                                          <strong style="color: #000" >746</strong>
                                          <small style="color: #000">Visitors last 30 minutes</small>
                                      </div> -->
                                  </div>

                                  <!--  <div class="widget-visitors__map map-visitors"></div> -->
                              </div>

                              <div class="listview listview--bordered ___visitor_payment" style="    max-height: 137px;overflow-y: auto;">

                                  
                                
                                
                              </div>
                          </div>
                          </div>  
    
                             </div>
                       </form>

                         <!-- ===================================== -->

                  
                
                        <!-- ======ul=================================== -->

                                

                        <!-- ======ul================================== -->
                        
                       
                        <!-- ======ul=================================== -->

                                

                        <!-- ======ul================================== -->




            </div>
</div>





@include('header-footer.footer')
</body>

<script type="text/javascript">

function getCount(callback,who){
    let item_category = user().getData({ 
     
     appends:[],
     url:"/admin/"+who.slug,
     token:document.querySelector("form[token]").querySelector("input[name='_token']").value
    });
    
    item_category.then(d=>{
        if(d.res.data){
            //console.log("wertyuio")
            callback(d.res.data)
        }
    }).catch(er=>{

    })

}
let dataOrder  = ($d)=>{
    console.log($d,"amount")
    document.querySelector(".data-count").innerHTML  = `<div class="col-sm-6 col-md-3">

<div class="quick-stats__item" style="background-color: #fff;color: #000; box-shadow: 0 0 12px 0;
    margin: 31PX;">
    <div class="quick-stats__info" style="color: #000">
        <h2 style="color: #000" class="_tot-new-agg">
               ${$d}
        </h2>
        <small style="color: #000"> </small>
    </div>

    <div class="quick-stats__chart peity-bar _mon-data-agg-1 agg" style="color: #000">Total order</div>
</div>
 
</div> 
 `

}


getCount(dataOrder,{slug:'counter/getCountOrder'})

setInterval(()=>{
    getCount(dataOrder,{slug:'counter/getCountOrder'})
},100*60*5)


let callCount = 0;
   function dropDownBox(option){
     console.log(option)
    callCount += 1   
  
    let li_iption  = ``;
  let tag_name  = option.name?option.name:`defaul_li${callCount}` ; 
if(option.hasOwnProperty("range")){
   
    for (let i = option['range'][0];   i <= option['range'][1]; i++) {
      let num2dig = `${i}`.length == 1? '0'+i:i
      li_iption +=` <li  update-qty 
                         tabindex="key"
                         qty="${num2dig}"
                         role="option"
                         which="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" 
                         aria-labelledby="kry" 
                         class="a-dropdown-item ${option.activeVal} ${i}  quantity-option ${i===option.activeVal?"actived_":"none"}  ${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}"
                         >
                        <a tabindex="-1" href="javascript:void(0)" aria-hidden="true"  id="id" class="a-dropdown-link">${num2dig}</a>
                       </li>`
      
    }
}    

if(option.hasOwnProperty("list")){
option.list.forEach(item=>{
  li_iption +=`<li  update-qty 
                         tabindex="key"
                         role="option"
                         which="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" 
                         aria-labelledby="kry" 
                         qty="${item}"
                         class="a-dropdown-item  quantity-option ${ item === option.activeVal?"actived_":"none"}  ${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}"
                         >
                        <a tabindex="-1" href="javascript:void(0)" aria-hidden="true"  id="id" class="a-dropdown-link">${item}</a>
                       </li>`
})

}
  

function handleUpdate(callback){
  setTimeout(()=>{
    document.querySelectorAll(`li[which  = '${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}' ]`).forEach( (el,ind)=>{
    el.addEventListener('click',()=>{
       try {
        el.offsetParent.previousElementSibling.innerText = el.getAttribute('qty') 
        el.offsetParent.querySelector("input").value  = el.getAttribute('qty')=='no-option'?"":el.getAttribute('qty'); 
        el.offsetParent.querySelector(".actived_").classList.remove("actived_")
        el.classList.add("actived_")
       } catch (error) {
         console.log(error)
       }

    
        })
   })
  },3000)
return ''
  }
    return(`                   
                            
                             <div class="btn-group" title="${tag_name}">
                                       
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              ${tag_name}:
                              </button>
                              <div class="dropdown-menu">
                               <input type="hidden" name="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" />
                                  <ul tabindex="-1" class="a-nostyle a-list-link qty-drop" role="listbox" aria-multiselectable="false">
                                <li  update-qty 
                                    tabindex="key"
                                    role="option"
                                    which="${tag_name.replace(/[\W\- ]/g,"_").toLowerCase()}" 
                                    aria-labelledby="kry" 
                                    qty="no-option"
                                    class="a-dropdown-item  quantity-option"
                                    >
                                    <a tabindex="-1" href="javascript:void(0)" aria-hidden="true"  id="id" class="a-dropdown-link">Select</a>
                                </li>    
                                     ${li_iption }                   
                                  </ul>


                              </div>
                                </div>
                                 ${handleUpdate({})}
                                `
                                
                          )



}

function graphPlotter(type,element,data_,x_title,y_title){



 setTimeout(()=>{

    var ctx  = document.getElementById(element)
//console.log(ctx)
 let chartOptions_                  = {
   scales: {
                title: {
                    //display: true,
                    //text: 'Chart.js Line Chart - Animation Progress Bar'
                },
                animation: {
                    duration  : 2000,
                    numSteps  : 100,
                    easing    : 'easeOutBounce',
                    scale     : true,
                                    
                },

                         xAxes: [ {
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: x_title
                    }
                        } ],

                        
                         yAxes: [{
                                 ticks: {
                        beginAtZero: true,
                        // maxTicksLimit: 10,
                        // stepSize: Math.ceil(100 /5),//deno num step
                        // max: 100
                      },
                    scaleLabel: {
                        display: true,
                        labelString: y_title
                    }
                      
                             }]

                     },


 }


 chartOptions_.datasetFill = false;
    

  var myLineChart = new Chart(ctx, {
    type: type,
    data: {
        labels:data_.x,
        datasets:data_.y

    },
    options: chartOptions_
}


);
return 'cate'
},0)
////////////////////////////
return ''
}


function gData(callback,who){
    
    let d  = [
        who.yearf,
        who.monthf,
        who.dayf,
        who.yeart,
        who.montht,
        who.dayt,
       3]
    console.log(who,'who',d)
 let item_category = user().getData({ 
     
     appends:d,
     url:"/admin/dataGraph/"+who.slug,
     token:document.querySelector("form[token]").querySelector("input[name='_token']").value
    });
;
/////////////////////////////////
item_category.then(data=>{
if (data.res.data) {

    let d =  {
     x:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
     y: [
         {
          label               : "New "+who.abbrName,
          data                : data.res.data[0],
          fill                : false,  
          borderColor         :"#f00",
          
        },


         {
          label               : "Confirmed "+who.abbrName,
          data                : data.res.data[1],
          fill                : false,  
          borderColor         :"#0f0",
          
        },

         {
          label               : "Total "+who.abbrName,
          data                : data.res.data[2],
          fill                : false,  
          borderColor         :"#00f",
          
        }

     ],
     total:[data.res.data]
    }

callback(d,who);


}/////////////////////if data

})
////////////////////////////////////


}
function dataGetter(data,who){
    
  let a =  {name:who.name,slug:who.slug,abbrName:who.abbrName,chart:who.chart}


    return (`
    <div class="col-sm-12 col-md-12 col-xs-12 "    margin-bottom: 26px;">
                         

<div class="quick-stats__ite" style="background-color: #fff;color: #000;position: relative;padding: 16px">

    <div class="quick-stats__info " style="color: #000;box-shadow: 0 0 12px 0 rgba(0,0,0,0.07);">
       <div>
        <small>${who.name} Details</small> 
        <small ><a href="${who.path}" style="color: #3498db;"> view Details</a></small>
         <h6 style="color: #000" class="_tot-new-agg">${data.total[0][3]} New ${who.name}</h2>
         <h6 style="color: #000" class="_tot-conf-agg">${data.total[0][4]} Confirm ${who.name}</h2>
         <h6 style="color: #000" class="_tot-agg">${data.total[0][5]} Total ${who.name}</h2>
       </div> 
       <div class="opt">
   
       </div>  
    </div>
    <div>
    ${dropDownBox({range:[2020,2050], activeVal:parseInt(new Date().getUTCFullYear()),name:"Year from" })}
     ${dropDownBox({list:["January","February","March","April","May","June","July","August","September","Octomber","November","December"], activeVal:parseInt(new Date().getUTCFullYear()),name:"Month from" })}
     ${dropDownBox({range:[1,31], activeVal:parseInt(new Date().getUTCFullYear()),name:"Day from" })}
     <br/>
     ${dropDownBox({range:[2020,2050], activeVal:parseInt(new Date().getUTCFullYear()),name:"Year to" })}
     ${dropDownBox({list:["January","February","March","April","May","June","July","August","September","Octomber","November","December"], activeVal:parseInt(new Date().getUTCFullYear()),name:"Month to" })}
     ${dropDownBox({range:[1,31], activeVal:parseInt(new Date().getUTCFullYear()),name:"Day to" })}
     <br />
   ${dropDownBox({list:["line","bar","pie","doughnut"], activeVal:'line',name:"Graph" })}
   <button type="button" class="btn btn-default" data='${JSON.stringify(a)}' plot> Plot</button>
   </div>
    <div class="chart">
     <canvas id="${who.chart}"  height="510" width="510"></canvas>
     </div>
    
</div>

</div>
${ graphPlotter('line',who.chart,data,who.xlb?who.xlb:"Month",who.ylb?who.ylb:"Number of user")  }
`)
}
let allG  = `

`
gData(($d,$who)=>{
   document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Aggregator',slug:'aggStat',abbrName:'agg',chart:"agg_",path:"/admin/users/agg/approved"})


gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Farmer',slug:'farStat',abbrName:'far',chart:"far_",path:"/admin/users/far/approved"})



gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Hub',slug:'hubStat',abbrName:'hub',chart:"hub_",path:"/admin/setting/hub"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Logistics',slug:'logStat',abbrName:'log',chart:"log_",path:"/admin/users/log/approved"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Warehouse',slug:'warStat',abbrName:'war',chart:"war_",path:"/admin/users/war/approved"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Customer',slug:'cusStat',abbrName:'cus',chart:"cus_",path:"/admin/users/cus"})

// gData(($d,$who)=>{
//     document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
// },{name:'Product',slug:'prodGraph',abbrName:'prod',chart:"prod_"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Product',slug:'prodGraph',abbrName:'prod',chart:"prod_",path:"/admin/product/all",ylb:"Number of product"})








setInterval(function(){

    gData(($d,$who)=>{
   document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Aggregator',slug:'aggStat',abbrName:'agg',chart:"agg_",path:"/admin/users/agg/approved"})


gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Farmer',slug:'farStat',abbrName:'far',chart:"far_",path:"/admin/users/far/approved"})



gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Hub',slug:'hubStat',abbrName:'hub',chart:"hub_",path:"/admin/setting/hub"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Logistics',slug:'logStat',abbrName:'log',chart:"log_",path:"/admin/users/log/approved"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Warehouse',slug:'warStat',abbrName:'war',chart:"war_",path:"/admin/users/war/approved"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Customer',slug:'cusStat',abbrName:'cus',chart:"cus_",path:"/admin/users/cus"})

// gData(($d,$who)=>{
//     document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
// },{name:'Product',slug:'prodGraph',abbrName:'prod',chart:"prod_"})

gData(($d,$who)=>{
    document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,$who)
},{name:'Product',slug:'prodGraph',abbrName:'prod',chart:"prod_",path:"/admin/product/all",ylb:"Number of product"})



},1000*60*60*5)



function searchPlot(el){
    console.log(el)
       // document.querySelectorAll("[plot]").forEach(function(el){
                     //   el. addEventListener("click",function(){
                     el.setAttribute("disabled","true")    
                      let $this  = el
                         let who  = JSON.parse($this.getAttribute("data"))  
                         let g =  $this.parentElement.querySelector("input[name='graph']").value?$this.parentElement.querySelector("input[name='graph']").value :'line'
                         let yf =  $this.parentElement.querySelector("input[name='year_from']").value
                            let mf =  $this.parentElement.querySelector("input[name='month_from']").value
                            let df =  $this.parentElement.querySelector("input[name='day_from']").value//?$this.parentElement.querySelector("input[name='year_from']").value :null
                            let yt =  $this.parentElement.querySelector("input[name='year_to']").value
                            let mt =  $this.parentElement.querySelector("input[name='month_to']").value
                            let dt =  $this.parentElement.querySelector("input[name='day_to']").value//?$this.parentElement.querySelector("input[name='year_to']").value :null
                            who['gtype']    = g
                            who['yearf']   = yf
                            who['monthf']  = mf
                            who['dayf']    = df
                            who['yeart']   = yt 
                            who['montht']  = mt
                            who['dayt']    = dt
                         gData(($d,$who)=>{
                               document.querySelector(`.${$who.chart}`).innerHTML =  dataGetter($d,who)
                            //   graphPlotter(who.gtype?who.gtype:'line',who.chart,$d,"Month","Number of user")
                               graphPlotter(who.gtype?who.gtype:'line',who.chart,$d,who.xlb?who.xlb:"Month",who.ylb?who.ylb:"Number of user")
                        },who )


       // })
       // } )
        
       return false;
       
    }

   setTimeout(function(){
        document.querySelector("[cont]").addEventListener('click',function(ev){
            console.log(ev,ev.target)
            if(ev.target.hasAttribute('plot')){
                let $this  = ev.target
             
                searchPlot($this)
             }
        })
       
    },
       
       0) 

//////////END OF PRODUCT AND USERS/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////



function ordergData(callback,who){
    
    let d  = [
        who.yearf,
        who.monthf,
        who.dayf,
        who.yeart,
        who.montht,
        who.dayt,
    
    who.cate]
    console.log(who,'who',d)
 let item_category = user().getData({ 
     
     appends:d,
     url:"/admin/dataGraph/"+who.slug,
     token:document.querySelector("form[token]").querySelector("input[name='_token']").value
    });
;
/////////////////////////////////
item_category.then(data=>{
if (data.res.data) {

    let d =  {
     x:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
     y: [
         {
          label               : "Incomplete "+who.abbrName,
          data                : data.res.data[0],
          fill                : false,  
          borderColor         :"#f00",
          
        },


         {
          label               : "Completed "+who.abbrName,
          data                : data.res.data[1],
          fill                : false,  
          borderColor         :"#0f0",
          
        },

         {
          label               : "Total "+who.abbrName,
          data                : data.res.data[2],
          fill                : false,  
          borderColor         :"#00f",
          
        }

     ],
     total:[data.res.data]
    }

callback(d,who);


}/////////////////////if data

})
////////////////////////////////////


}

function getItemTypeImages(){

	
let item_subcategory = user().getData({ 
   token:document.querySelector('input[name="_token"]').value,
    appends:['all'],
    url:"{{route('getCategory')}}"
   
   });


/////////////////////////////////
item_subcategory.then(data=>{
   
if (data.res.data) {
  let category_carrirer=`<option value=""> select an item</option>`
 data.res.data.forEach( (category,i)=>{

     if(data.res.data.length > 0 ){
    
    category_carrirer += `<option value='${category.a}'>${category.b}</option>`

}



})

/////////////////////////////////check
document.querySelector("[cate]").innerHTML  = category_carrirer



}/////////////////////if data

})
////////////////////////////////////


return ''

}

function orderdataGetter(data,who){
    console.log(data)
    let a =  {name:who.name,slug:who.slug,abbrName:who.abbrName,chart:who.chart}
  
  
      return (`
      <div class="col-sm-12 col-md-12 col-xs-12 "    margin-bottom: 26px;">
                           
  
  <div class="quick-stats__ite" style="background-color: #fff;color: #000;position: relative;padding: 16px">
  
      <div class="quick-stats__info " style="color: #000;box-shadow: 0 0 12px 0 rgba(0,0,0,0.07);">
         <div>
          <small>${who.name} Details</small> 
          <small ><a href="${who.path}" style="color: #3498db;"> view Details</a></small>
           <h6 style="color: #000" class="_tot-new-agg">${data.total[0][3]} Incomplete ${who.name}</h2>
           <h6 style="color: #000" class="_tot-conf-agg">${data.total[0][4]} Completed ${who.name}</h2>
           <h6 style="color: #000" class="_tot-agg">${data.total[0][5]} Total ${who.name}</h2>
         </div> 
         <div class="opt">
     
         </div>  
      </div>
      <div>
      ${dropDownBox({range:[2020,2050], activeVal:parseInt(new Date().getUTCFullYear()),name:"Year from" })}
     ${dropDownBox({list:["January","February","March","April","May","June","July","August","September","Octomber","November","December"], activeVal:parseInt(new Date().getUTCFullYear()),name:"Month from" })}
     ${dropDownBox({range:[1,31], activeVal:parseInt(new Date().getUTCFullYear()),name:"Day from" })}
     <br/>
     ${dropDownBox({range:[2020,2050], activeVal:parseInt(new Date().getUTCFullYear()),name:"Year to" })}
     ${dropDownBox({list:["January","February","March","April","May","June","July","August","September","Octomber","November","December"], activeVal:parseInt(new Date().getUTCFullYear()),name:"Month to" })}
     ${dropDownBox({range:[1,31], activeVal:parseInt(new Date().getUTCFullYear()),name:"Day to" })}
     <br />
     ${`<div class="btn-group"> <select class="form-control" name="cate" style="text-transform: capitalize;" cate> 
                           <option value="">Select item</option>
                                     
                                </select></div>`}
     ${dropDownBox({list:["line","bar","pie","doughnut"], activeVal:'line',name:"Graph" })}
     <button type="button" class="btn btn-default" data='${JSON.stringify(a)}' plot-order> Plot</button>
     </div>
      <div class="chart">
       <canvas id="${who.chart}"  height="510" width="510"></canvas>
       </div>
      
  </div>
  
  </div>
  ${getItemTypeImages()}
  ${ graphPlotter('line',who.chart,data,who.xlb?who.xlb:"Month",who.ylb?who.ylb:"Number of user")  }
  `)
  }



  ordergData(($d,$who)=>{

document.querySelector(`.${$who.chart}`).innerHTML =  orderdataGetter($d,$who)

},
{name:'Order',slug:'orderGraph',abbrName:'ord',chart:"ord_",path:"/admin/analytics/order",ylb:"Number of order"}
)

setInterval(function(){

ordergData(($d,$who)=>{

document.querySelector(`.${$who.chart}`).innerHTML =  orderdataGetter($d,$who)

},
{name:'Order',slug:'orderGraph',abbrName:'ord',chart:"ord_",path:"/warehouse/analytics/order",ylb:"Number of order"}
)


},1000*60*5)
function ordersearchPlot(el){
    console.log(el)
       // document.querySelectorAll("[plot]").forEach(function(el){
                     //   el. addEventListener("click",function(){
                     el.setAttribute("disabled","true")    
                      let $this  = el
                         let who  = JSON.parse($this.getAttribute("data"))  
                         let g =  $this.parentElement.querySelector("input[name='graph']").value?$this.parentElement.querySelector("input[name='graph']").value :'line'
                         let yf =  $this.parentElement.querySelector("input[name='year_from']").value
                            let mf =  $this.parentElement.querySelector("input[name='month_from']").value
                            let df =  $this.parentElement.querySelector("input[name='day_from']").value//?$this.parentElement.querySelector("input[name='year_from']").value :null
                            let yt =  $this.parentElement.querySelector("input[name='year_to']").value
                            let mt =  $this.parentElement.querySelector("input[name='month_to']").value
                            let dt =  $this.parentElement.querySelector("input[name='day_to']").value
                            let cate =  $this.parentElement.querySelector("select[name='cate']").value//?$this.parentElement.querySelector("input[name='year_to']").value :null
                            who['gtype']    = g
                            who['yearf']   = yf
                            who['monthf']  = mf
                            who['dayf']    = df
                            who['yeart']   = yt 
                            who['montht']  = mt
                            who['dayt']    = dt
                            who['cate']  = cate
                            ordergData(($d,$who)=>{
                               document.querySelector(`.${$who.chart}`).innerHTML =  orderdataGetter($d,who)
                             
                               graphPlotter(who.gtype?who.gtype:'line',who.chart,$d,who.xlb?who.xlb:"Month",who.ylb?who.ylb:"Number of user")
                        },who )


       // })
       // } )
        
       return false;
       
    }

   setTimeout(function(){
        document.querySelector("[cont]").addEventListener('click',function(ev){
            console.log(ev,ev.target)
            if(ev.target.hasAttribute('plot-order')){
                let $this  = ev.target
             
                ordersearchPlot($this)
             }
        })
       
    },
       
       0) 






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function populate_new_table(container_class,page=null){
 
 let new_warehouse = user().getData({
     appends:page!==null?["1","a","b","c",page]:['1'],
     url:"/admin/dataGraph"+(page!==null?("/"+page):""),
     token:document.querySelector("form[token]").querySelector("input[name='_token']").value
    })
   
    let elements_inside_data_container = Array.from(document.querySelector(container_class).children);
 elements_inside_data_container.forEach(el=>{
     if (el) {
        el.remove()  
     }
    
 })
 //console.log(elements_inside_data_container);
 
        document.querySelector(container_class).insertAdjacentHTML("beforeend","<div class='loader'></div>")
 
   
        
 
    let prev_loader = `<center><div class="car"><span class="throbber-loader"></span> </div> </center>`
   document.querySelector(container_class).querySelector('.loader').innerHTML= prev_loader                                  
  let done = false;
 new_warehouse.then( (data,key)=>{
   if (data.res.data) {
    all_wh_d   = data.res.data
 
 if (all_wh_d.length==0) {
     let loader =  document.querySelector(container_class).querySelector(".loader")
     setTimeout(function(){
          if (loader) {
     loader.remove();
  }  
     },3000)
 }
     //////////////////////////////
    data.res.data.forEach((o,key)=>{
    // console.log(o)
 //${new Date(parseInt( o.joined)*1000 ).toString().substr(0,15)}
   //console.log(parseInt(o.joined))
   // var dateobj = new Date (new Date().getTime()+parseInt(o.joined)); 
   //   var B = dateobj.toString();
   //   let c = B.substring(0,15)
     let cont  =       `<div class="listview__item">
                                 <div class="listview__content">
                                     <div class="listview__heading">${new Date(parseInt(o.d) *1000).toString().substr(0,15)}</div>
 
                                     <div class="listview__attrs">
                                         <span><img class="widget-visitors__country" src="demo/img/flags/Japan.png" alt="">
                                         Visiting  ${o.c} page </span>
                                         <span>${o.a}</span>
                                          <span>${o.b}</span>
                                       
                                     </div>
                                 </div>
                             </div>`
 
 
 
 let loader =   document.querySelector(container_class).querySelector(".loader")
 setTimeout(function(){
 
 
  if (loader) {
     loader.remove();
  }  
 
 
 
   document.querySelector(container_class).insertAdjacentHTML("beforeend",cont)
 
 
 
 /*****************************/ 
 document.querySelector(container_class).previousElementSibling.querySelector(".__num-visitor").innerText=data.res.data.length
 /*****************************/ 
 
 
    
 },3000)
 
 
    })  
 
 ////////////////////////
 
 
 }else if(data.res.err){
  // notify("error",data.res.err)
 
   setTimeout(function(){
     
      if (document.querySelector(container_class).querySelector("div.loader")) {
       
       document.querySelector(container_class).querySelector("div.loader").remove() 
        document.querySelector(container_class).innerHTML  = `<p style="color: #000; font-size: 31px;font-weight: bold;">${data.res.err}  </p> `
     }
    
    
 
   },3000)
 }
   
 
 }).catch(e=>{
     if (e) {
         console.log(e);
         notify("error",e)
 
     }
 })
 
}
 


populate_new_table('.___visitor','visitor')


populate_new_table('.___visitor_cart','carts')




populate_new_table('.___visitor_payment','payment')

populate_new_table('.___visitor_checkout','checkout')


setInterval(function(){

populate_new_table('.___visitor','visitor')

populate_new_table('.___visitor_cart','carts')


populate_new_table('.___visitor_checkout','checkout')

populate_new_table('.___visitor_payment','payment') 
 //callback('cus','customers');
},5*60*1000)
</script>
</html>