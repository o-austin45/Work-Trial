<template>


<table>

    <tr>
        <th>Car Name:</th>
        <th>{{car.name}}</th>


    </tr>
     <tr>
        <th>Manufacturer:</th>
        <th>{{manu.name}}</th>


    </tr>
    <tr>
        <th>Number of Doors:</th>
        <th>{{car.doors}}</th>


    </tr>
    <tr>
        


    </tr>
     <tr>
        <th>Top Speed:</th>
        <th>{{car.top_speed}}</th>


    </tr>
    

    <tr>
        <th>fuel type:</th>
        <th>{{fuel.name}}</th>
        


    </tr>
      <tr>
        <th>Price($):</th>
        <th>{{car.price}}</th>


    </tr>
   
</table>

</template>


<script>
import { createDecipheriv } from 'crypto';


export default{

  props:["manufacturer", "cars", "fueltype"],
    
  data()
  {
    
    return {

      car: JSON.parse(this.cars),
      manu: JSON.parse(this.manufacturer),
      fuel: JSON.parse(this.fueltype),
      
      }
  },

 methods:
 {

  fetCar()
  {
    console.log()
  }
  
 },


}
     










</script>