<template>
    
    <div class="container">
        <div class="form-row">
            <div class="col-row">
                <input type="text" class="form-control" @keyup="searchUser" v-model="q" 
                placeholder="Rechercher ..."
                >
            </div>
        </div>
        <add-user @user-added="refresh"></add-user>
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
                      <tr v-for="user3 in this.users.data"  :key="user3.id" >  
                          <template v-if="user3.id ==0">
                        <th scope="row">{{user3.name}}</th>
                        <td>{{user3.email}}</td>
                        <td>{{user3.created_at }}</td>
                        <td>{{user3.updated_at }}</td>
                          
                        <td><button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#editModal" @click="getManager(user3.id)">
                        Editer</button>
                        </td>
                        <td><button type="button" class="btn btn-danger float-left"  @click="deleteUser(user3.id)">
                        Supprimer</button>
                        </td>
                        </template>
                        </tr>
                    </tbody>
                    <edit1-user v-bind:hello1="hello1" @user-updated="refresh"></edit1-user>
</table>
<pagination :data="users" @pagination-change-page="getResults" class="mt-5"></pagination>
    </div>
</template>

<script>
//     import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';

  

    export default {
        data(){
            return{
                users:{},
                userEdit:'',
                hello1:{},
                q:''
            }
        },
        created(){
            axios.get('/admin/users').then(response=>this.users=response.data)
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
			axios.get('/admin/users?page=' + page)
				.then(response => {
					this.users = response.data;
				});
		    },
            getManager(id){
                axios.get('/admin/user-edit/'+id)
                .then(response=>this.hello1=response.data)
                // .then(response1=>console.log(response1.data))
                // .then(response1=>this.managerEdit=response1.name)
                // .then(response1=>this.managerEdit=response1.name)
                .catch(error=>console.log(error));
            },
            deleteManager(id){
                axios.delete('/admin/user-delete/'+id)
                .then(response=>this.users=response.data) 
                .catch(error=>console.log(error));
            },
            refresh(users){
                this.users=users.data
            },
            searchUser(){
                   if(this.q.length>3){
                    axios.get('/admin/users/'+this.q).then(response=>this.users=response.data)
                    // console.log(response.data); 
                    .catch(error=>console.log(error));
 
                }else{
                    axios.get('/admin/users').then(response=>this.users=response.data)
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