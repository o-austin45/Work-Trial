<template>

 <table>
<tr>
 <th>Car</th><th v-for="car in carsList" :key="carsList.id">
 
<a v-bind:href="'/cars/get/'+ car.id" >{{ car.name }}</a>

 </th>

</tr>
</table>
</template>



<script>

export default {
   props:["cars"],

    data(){


        return {
          carsList: JSON.parse(this.cars),
        }

    },


    methods:
    {

         fetchCars()
        {
          console.log((this.cars))
          console.log(typeof(this.cars))
          console.log(this.carsList)
          console.log((typeof(this.cars)))
        }


    },

  mounted: function mounted()
  {

    this.fetchCars();
  }


    
}


</script>