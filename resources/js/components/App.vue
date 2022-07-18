<template>
 <div >
  <table>
<tr>
 <th>Name</th><th v-for="animal in animalsdata" :key="animal.id">
 
<a v-bind:href="'/animals/get/'+ animal.id" >{{ animal.name }}-{{animal.id}}</a>

 </th>

</tr>
</table>

</div>


</template>





<script>





export default{

  props:["animalsdata"],


  

  data(){


    return{

      animals:[],
    }
  },
  methods:{

    fetchAnimals(){
      console.log(this.animalsdata);
      this.animalsdata = JSON.parse(this.animalsdata);
      console.log(this.animalsdata);
      console.log(typeof(this.animalsdata));

      



    }



  },

  mounted: function mounted(){

    this.fetchAnimals();
  }


}





</script>

<style>

 th {
  border: 1px solid black;
}
a:link {
  color: green;
  background-color: transparent;
  text-decoration: none;
}
a:visited {
  color:purple;
  background-color: transparent;
  text-decoration: none;
}
a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}

</style>