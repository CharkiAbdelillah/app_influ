<template>
    
    <div>
     <table id="dataTable" class="table table-stripped">
                    <thead class="text-primary">
                      <th>Nom</th>
                      <th>Email</th>
                      <th>Créé à</th>
                      <th>Mettre à jour</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </thead>
                    <tbody>
                      <tr v-for="user3 in this.managers" :key="user3.id">
                        <th scope="row">{{user3.name}}</th>
                        <td>{{user3.email}}</td>
                        <td>{{user3.created_at | formatDate}}</td>
                        <td>{{user3.updated_at | formatDate}}</td>
                        </tr>
                    </tbody>
  
    

</table>
    </div>
</template>

<script>
//     import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';

  

    export default {
        data(){
            return{
                managers:[]
            }
        },
        methods:{
            fetchManagers(){
                axios.get('/admin/managers').then(response=>{
                    // console.log(response.data);
                    this.managers=response.data;
                })
                .catch(error=>{console.log(error)})
            }
        },
        mounted() {
            this.fetchManagers();
        }

        
    }
    
</script>