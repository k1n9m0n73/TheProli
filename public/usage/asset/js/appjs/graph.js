
     (function promotion_grade(){

      let student_record = user().getData({url:PATH+"superadmin/student_record"});
       
       let rec = student_record.then(d=>{
     
        d =  d.res.data;
     


      let ctx = document.getElementById("barChart");
            let myChart = new Chart(ctx, {
                 type: 'bar',
                 data: {
                     labels: ["30-39%", "40-49%", "50-59%", "60-69%","70-100%"],
                     datasets: [
                         {
                             label: "Percentage of boys with the average mark range 30-100% ",
                             data: d.b,
                             borderColor: "rgba(225, 0, 0, 0.76)",
                             borderWidth: "0",
                             backgroundColor: "rgba(225, 0, 0, 0.76)"
                         },
                         {
                             label: "Percentage of girls with the average mark range 30-100% ",
                             data:d.g,
                             borderColor: "rgba(0, 0, 225, 0.76)",
                             borderWidth: "0",
                             backgroundColor: "rgba(0, 0, 225, 0.76)"
                         }
                     ]
                 },

                 options: {
                     scales: {


                         xAxes: [ {
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Average Percentage'
                    }
                        } ],
                         yAxes: [{
                                 ticks: {
                        beginAtZero: true,
                        maxTicksLimit: 10,
                        stepSize: Math.ceil(100 /5),//deno num step
                        max: 100
                      },
                    scaleLabel: {
                        display: true,
                        labelString: 'Percentage of student'
                    }
                      
                             }]

                     }
                 }



             });

       }).catch(err=>{
            console.log(err)
       }) 





          } )();  
         




function douPloter(element,data,bg,bgh,lab){
   let ctx = document.getElementById(element);
             let myChart = new Chart(ctx, {
                 type: 'doughnut',
                 data: {
                     datasets: [{
                             data: data,
                              backgroundColor:bg,
                             hoverBackgroundColor: bgh
         
                         }],
                     labels: lab
                 },
                 options: {
                     responsive: true
                 }
             });
}


function plot_all_gender_analysis(){

let student_record = user().getData({url:PATH+"superadmin/staff_student_data"});

student_record.then(data=>{

douPloter("singelBarChart0",data.res.data.admin, ["#0000ff","#00ffff"],["rgba(0, 150, 136, 0.76)", "rgba(0,0,0,0.07)" ],[ "Male admin","Female admin"])

douPloter("singelBarChart1",data.res.data.staff, ["#0000ff","#00ffff"],["rgba(0, 150, 136, 0.76)", "rgba(0,0,0,0.07)" ],[ "Male admin","Female admin"])

douPloter("singelBarChart2",data.res.data.student, ["#0000ff","#00ffff"],["rgba(0, 150, 136, 0.76)", "rgba(0,0,0,0.07)" ],[ "Male admin","Female admin"])






}).catch(err=>{

})


}


plot_all_gender_analysis()





function promotion_grade_dynamic(arraya,arrayb){

        let ctx = document.getElementById("barChart2");
        let myChart = new Chart(ctx, {
                 type: 'bar',
                 data: {
                     labels: ["30-39%", "40-49%", "50-59%", "60-69%","70-100%"],
                     datasets: [
                         {
                             label: "Percentage of boys with the average mark range indicated ",
                             data:  arraya,
                             borderColor: "rgba(225, 0, 0, 0.76)",
                             borderWidth: "0",
                             backgroundColor: "rgba(225, 0, 0, 0.76)"
                         },
                         {
                              label: "Percentage of girls with the average mark range indicated ",
                             data: arrayb,
                             borderColor: "rgba(0, 0, 225, 0.76)",
                             borderWidth: "0",
                             backgroundColor: "rgba(0, 0, 225, 0.76)"
                         }
                     ]
                 },

                 options: {
                     scales: {


                         xAxes: [ {
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Average Percentage'
                    }
                        } ],
                         yAxes: [{
                                 ticks: {
                        beginAtZero: true,
                        maxTicksLimit: 10,
                        stepSize: Math.ceil(100 /5),//deno num step
                        max: 100
                      },
                    scaleLabel: {
                        display: true,
                        labelString: 'Percentage of student'
                    }
                      
                             }]

                     }
                 }



             });
          } ;  





   if (document.querySelector("select[id='snfg']")) 
             {

function gdd(){




                        _schn = document.querySelector("select[id='snfg']").value;
                        _yvfg = document.querySelector("select[id='yvfg']").value;
                               var request = new XMLHttpRequest();
                                 if (_yvfg==="") {
                                _yvfg = new Date().getFullYear();
                               }
                
                               let form = new FormData();
                                form.append("schn",_schn);
                              form.append("yvfg",_yvfg);
                             

                            request.onreadystatechange = function() {
                                 
                                     if (this.readyState == 4 && this.status == 200) {
                                          setTimeout(function(){ 
                                            let data_ =JSON.parse(request.response)

                                           promotion_grade_dynamic(JSON.parse(data_.b),JSON.parse(data_.g) )
                                           
                                          },2000)
                                                    
                                                  


                                                }
                                       }
                                
 request.open('POST',PATH+'jqexe', /* async = */ true);
  request.send(form);

    
}

window.addEventListener("load",function(){
   gdd();
})



$("select[id='snfg'],select[id='yvfg']").each(function(){
   $(this).on('change',function(){
      gdd();
   })
})
                       

}
