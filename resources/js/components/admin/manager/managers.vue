<template>
    
    <div class="container">
        <div class="form-row">
            <div class="col-row">
                <input type="text" class="form-control" @keyup="searchManager" v-model="q" 
                placeholder="Rechercher ..."
                >
            </div>
        </div>
        <add-manager @manager-added="refresh"></add-manager>
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
                        
                      <tr v-for="user3 in this.managers.data"  :key="user3.id" >  
                        <!-- <template v-if="user3.id == 2">   -->
                        <th scope="row">{{user3.name}}</th>
                        <td>{{user3.email}}</td>
                        <td>{{user3.created_at }}</td>
                        <td>{{user3.updated_at }}</td>
                        <td><button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#editModal" @click="getManager(user3.id)">
                        Editer</button>
                        </td>
                        <td><button type="button" class="btn btn-danger float-left"  @click="deleteManager(user3.id)">
                        Supprimer</button>
                        </td>
                        <!-- </template> -->
                        </tr>
                    </tbody>
                    <edit1-manager v-bind:hello1="hello1" @manager-updated="refresh"></edit1-manager>
</table>
<pagination :data="managers" @pagination-change-page="getResults" class="mt-5"></pagination>
    </div>
</template>

<script>
//     import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';

  

    export default {
        data(){
            return{
                managers:{},
                managerEdit:'',
                hello1:{},
                q:''
            }
        },
        created(){
            axios.get('/admin/managers').then(response=>this.managers=response.data)
                    // console.log(response.data); 
                .catch(error=>console.log(error));
        },
        methods:{
            // fetchManagers(){
            //     axios.get('/admin/managers').then(response=>{
            //         // console.log(response.data);
            //         this.managers=response.data;
            //     })
            //     .catch(error=>{console.log(error)})
            // },
            getResults(page = 1) {
			axios.get('/admin/managers?page=' + page)
				.then(response => {
					this.managers = response.data;
				});
		    },
            getManager(id){
                axios.get('/admin/manager-edit/'+id)
                .then(response=>this.hello1=response.data)
                // .then(response1=>console.log(response1.data))
                // .then(response1=>this.managerEdit=response1.name)
                // .then(response1=>this.managerEdit=response1.name)
                .catch(error=>console.log(error));
            },
            deleteManager(id){
                axios.delete('/admin/manager-delete/'+id)
                .then(response=>this.managers=response.data) 
                .catch(error=>console.log(error));
            },
            refresh(managers){
                this.managers=managers.data
            },
            searchManager(){
                   if(this.q.length>3){
                    axios.get('/admin/managers/'+this.q).then(response=>this.managers=response.data)
                    // console.log(response.data); 
                    .catch(error=>console.log(error));
 
                }else{
                    axios.get('/admin/managers').then(response=>this.managers=response.data)
                    // console.log(response.data); 
                    .catch(error=>console.log(error));
                }
            }
        }
        // mounted() {
        //     this.fetchManagers();
        // }
    }
    
</script>           