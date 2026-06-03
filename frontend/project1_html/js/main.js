
// Array
let friends = [
    "Mohammed",
    "Salim",
    "Ali"
]; 


// Object basic without oop
let myObject = {
  
    "name": "Yousuf AL Hadhrami",
    "address": "Izki",
    "job": ["Technical Support", "Programmer"],
    "hobbies": {
        "hobby1": "Programming",
        "hobby2": "Football"
    }
};

document.getElementById("show").innerHTML=`${ friends[0]}`;

document.getElementById("btn").addEventListener("click", function(){
  
    
document.getElementById("show").innerHTML=`${ myObject.name }`
document.getElementById("show").style.cssText= `
  
   background-color:red;
   text-align:center;
`
})


document.getElementById("show").addEventListener("click", function(){

    document.getElementById("show").style.display='none';
})


function sum(x , y)
{
    if(x + y == 10 )
    {

    //  setTimeout(() => {

    //  document.getElementById("show").innerHTML=`${ myObject.name }`
    //  document.getElementById("show").style.cssText= `
  
    //     background-color:red;
    //     text-align:center;
    //     `


    //  }, 3000)

    return true;

    }
}

//let value = sum(5 , 5);



// if(value)
// {
//      setTimeout(function(){

//      document.getElementById("show").innerHTML=`${ myObject.name }`
//      document.getElementById("show").style.cssText= `
  
//         background-color:red;
//         text-align:center;
//         `


//      }, 3000)
// }


// function reset parameters
function calc(...numbers)
{
    let sum = 0 , avg , min = numbers[0], max = numbers[0];

    for(let i = 0;  i < numbers.length; i++)
    {
        // sum = sum + numbers[i];
           sum += numbers[i];
           avg = sum / numbers.length;

           if(numbers[i] > max)
           {
              max = numbers[i];
           }

           if(numbers[i] < min)
           {
              min = numbers[i];
           }
    }

    return  ` The Sum is ${sum}
              The Average is ${avg}
              The Maximun is ${max}
              The Minimum is ${min}

           `;
}

// console.log(calc([6,2,3]));

// document.getElementById("show").textContent = calc([9,5,4,3,4]);
document.getElementById("show").textContent = calc(9,5,4,3,4,1,5,12);


$(document).ready(function () {
$('#card').click(function(){
$('#card').css({'background-color':'red'});
})

})

/*

- xhr => XMLHttpRequest 
- fetch() 
*/


async function getUsers() {
    try {
        const response = await fetch('https://jsonplaceholder.typicode.com/todos/');

        if (!response.ok) {
            throw new Error('Failed to fetch data');
        }

        const data = await response.json();

        console.log(data);
    } catch (error) {
        console.error(error);
    }
}

getUsers();


