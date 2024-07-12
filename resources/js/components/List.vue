<template>
    <div>
        <table style="table-layout: fixed;" class="table">
            <thead>
                <tr>
                    <th  class="col-3">Id</th>
                    <th  class="col-3">Name</th>
                    <th  class="col-3">Email</th>
                    <th  class="col-3">Phone</th>
                    <th class="col-3"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <div v-for="person in persons" :key="person.id" class="person" >
                        <td  class="col-2">
                            <input  disabled type="text" v-model="person.id">
                        </td>
                        <td   class="col-2">
                            <input type="text" v-model="person.name">
                        </td>
                        <td  class="col-2">
                            <input type="text" v-model="person.email">
                        </td>
                        <td  class="col-2">
                            <input type="text" v-model="person.phone">
                        </td>
                        <td  class="col-2">
                            <button  class="edit" title="Edit" @click="updatePerson(person.id, person.name, person.email, person.phone)" data-toggle="tooltip"><i class="material-icons"></i></button>
                        </td>
                        <td  class="col-2">
                            <button  class="delete" title="Delete" @click="deletePerson(person.id)" data-toggle="tooltip"><i class="material-icons"></i></button>
                        </td>
                </div>
            </tr>
            </tbody>
        </table>
    </div>
  </template>


  <script>
  import axios from "axios";

  var persons = [];
  export default{
        data(){
            return{
                //componentKeyList:0,
                persons:[]
            }
        },methods:{
            deletePerson(id){
                axios.delete(`person/${id}`)
                    .then(response => {
                        console.log(`Deleted post with ${id}`);
                    })
                    .catch(error => {
                        console.error(error);
                    });
                    location.reload();
                    /*
                     reload na pagina inteira foi utilizado apenas para que o componente seja renderizado novamente
                     porém, o ideal seria atualizar apenas o componente, ainda não impementado
                     */
                   //console.log(componentKeyList);
                   //this.componentKeyList+=1;
                   //console.log(componentKeyList);
            },
            updatePerson(id,name,email,phone){
                axios.put(`person/${id}`, {
                    name: name,
                    email: email,
                    phone: phone,
                    })
                    .then((response) => {
                        console.log(response.data);
                    })
                    .catch((error) => {
                        console.error(error);
                    });
                    location.reload();
            }
        },
        mounted(){
            fetch('http://localhost:8000/api/person')
            .then(res => res.json())
            .then(data => this.persons = data)
            .then(console.log(persons))
            .catch( err => console.log(err.massage))
        }
        /*
        Acredito ser por problemas de sincronismo, mas não consegui trazer os dados utilizando o axios a tempo,
        devido a isso farei um fetch com js puro para o get

        mounted(){
            axios.get('person')
                .then(function (response) {
                    console.log(response.data);
                    persons = response.data;
                })
        }, 


        */
      }
</script>