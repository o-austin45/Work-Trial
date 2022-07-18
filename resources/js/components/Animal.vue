<template>


<table>

    <tr>
        <th>Animal Name:</th>
        <th>{{animal.name}}</th>


    </tr>
    <tr>
        <th>Animal Latin Name:</th>
        <th>{{animal.latin_name}}</th>


    </tr>
    <tr>
        <th>Animal Conservation Status:</th>
        <th>{{animal.conservation_status}}</th>


    </tr>
     <tr>
        <th>Animal Class:</th>
        <th>{{animal.class}}</th>


    </tr>
</table>






</template>


<script>
import { createDecipheriv } from 'crypto';


export default{

props:["id", "animaldata"],
   
    
  data(){




    return{


      animal:[]

    

     
    }
  },
  methods:{


    fetchAnimals(){
       this.animal=JSON.parse(this.animaldata);
       //converting string object to Object
    }


  },

  mounted: function mounted(){
    this.fetchAnimals()
  }
  }










</script>