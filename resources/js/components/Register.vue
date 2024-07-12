<template>
  <form onsubmit="register()">
    <div class="form-group">
      <label style="font-weight: bold;" for="exampleInputEmail1">Name</label>
      <input type="text" class="form-control" id="Name" placeholder="Enter name" v-model="Person.name">
    </div>
    <div class="form-group">
      <label  style="font-weight: bold;" for="exampleInputEmail1">Email</label>
      <input type="text" class="form-control" id="Email" placeholder="Enter email" v-model="Person.email">
    </div>
    <div class="form-group">
      <label style="font-weight: bold;" for="exampleInputEmail1">Phone</label>
      <input type="text" class="form-control" id="Phone" placeholder="Enter phone" v-model="Person.phone">
    </div>
    <button type="submit" class="btn btn-primary" @click="addToApi">Submit</button>
  </form>
</template>


<script>

  import axios from "axios";
  export default{
    name: "register",
    data(){
      return {
        Person: {name: '', email: '', phone: ''},

      }
    }, methods:{
      addToApi(){

        axios.post('/person', {
          name: this.Person.name,
          email: this.Person.email,
          phone: this.Person.phone
        })
        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
          
      }
    }
  }
</script>

