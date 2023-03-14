percentcheck();

function percentcheck() {
    let table = document.getElementById('todolist');
   
   let plan = table.tBodies[0].rows.length;
//    if (plan) {
//     //   numPlan = plan.length;
//       console.log(plan);
//    }
//    else {
//       plan = 0;
//    }

   const chart = document.getElementById("chart");
   const numCheck = document.querySelectorAll('input[type="checkbox"]:checked').length;
   //alert(numPlan);
   if (plan == 0 || plan==null){
      newPercent = 0;
   }
   else{
      let calc = (numCheck/plan) * 100;
      var newPercent = parseFloat(calc).toFixed(2);
   }
   // newPercent.toFixed(2);
   chart.style.setProperty("--p", newPercent);
   chart.innerHTML = parseInt(newPercent) + "%";
   
}

const checkbox = document.querySelector('.inp-cbx');
const chart = document.getElementById("chart");
