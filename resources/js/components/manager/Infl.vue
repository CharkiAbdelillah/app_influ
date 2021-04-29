<template>
    <div class="container">
        <div class="form-row">
            <div class="col-row">
                <input type="text" class="form-control" @keyup="searchUser" v-model="q" 
                placeholder="Rechercher ..."
                >
            </div>
        </div>
        
        <add-infl></add-infl>
        <addInflInfo></addInflInfo>
        <type-activite></type-activite>
        <instagrame></instagrame>
        
     <table id="dataTable" class="table table-stripped">
                    <thead class="text-primary">
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Photo</th>
                      <th>Ville</th>
                      <th>Date de naissance</th>
                      <th>Plus info</th>
                      <th>Type</th>
                      <th>Créé à</th>
                      <th>Mettre à jour</th>
                      <th>Modifier</th>
                      <th>Supprimer</th>
                    </thead>
                    <tbody v-for="(user3,index) in this.personnes.perso.data"  :key="index">
                        <tr  >  
                          <!-- <template > -->
                        <th scope="row">{{user3.nom}}</th>
                        <td>{{user3.prenom}}</td>
                        <td>
                            <img :src="user3.photo" alt=""
                            class="img-fluid mr-2 rounded shadow-sm"
                            height="60"
                            width="60"
                            >
                        </td>
                        <td>{{user3.ville}}</td>
                        <td>{{user3.date}}</td>
                        <td>    
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#info-' + user3.id">
                                <i class="bi bi-info-circle"></i>
                                </button>
                        </td>
                         <td v-for="(item,i) in user3.type" :key="i">
                          <ul>
                            <li v-if="item.nom == 'Facebook'"><Icon type="logo-facebook"/></li>
                            <li v-if="item.nom == 'Youtube'"><Icon type="logo-youtube" /></li>
                            <li v-if="item.nom == 'Instagram'"><Icon type="logo-instagram" /></li>
                          </ul>
                          <!-- <ul>
                            <li >a</li>
                            <li >b</li>
                            <li >c</li>
                          </ul> -->
                        </td>
                        <td>{{user3.added }}</td>
                        <td>{{user3.updated }}</td>
                        <td>
                          <a @click="deletePersonne(user3.id)">
                            <i class="bi bi-pencil-square"></i>
                            <Icon type="ios-trash" />
                          </a>
                          <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#editModal" @click="getManager(user3.id)">
                        Editer</button> -->
                        </td>
                        <td>
                          <a @click="deletePersonne(user3.id)">
                            <i class="bi bi-pencil-square"></i>
                            <Icon type="ios-trash" />
                          </a>
                        </td>
                        
                       
                        </tr> 
                    <!-- Modal info -->
                         <div class="modal fade" :id="'info-' + user3.id" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
                          <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="infoLabel">Critères physiques</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body" v-if="user3.info!=null">
                              <!-- <template v-if="user3.info.personne_id==1"> -->
                            <label >Taille</label>
                            <div class="form-row">
                              
                              <div class="col-md-6 mb-3">
                                <label >kg</label>
                                <input type="text" class="form-control"  :value="user3.info.kg" >
                              </div>
                              <div class="col-md-6 mb-3">
                                <label>cm</label>
                                <input type="text" class="form-control"  :value="user3.info.cm" >
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="inputCity">Cheveux</label>
                                <input type="text" class="form-control"  :value="user3.info.cheveux" >
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState">Longueur</label>
                                <input type="text" class="form-control"  :value="user3.info.longueur" >
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputZip">Nature</label>
                                <input type="text" class="form-control"  :value="user3.info.nature" >
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="inputCity">Couleur de peau</label>
                                <input type="text" class="form-control"  :value="user3.info.couleur" >
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState">Yeux</label>
                                <input type="text" class="form-control"  :value="user3.info.yeux" >
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputZip">Niveau éducatif</label>
                                <input type="text" class="form-control"  :value="user3.info.niveux" >
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <label for="inputCity">Spécialité</label>
                                <input type="text" class="form-control"  :value="user3.info.specialite" >
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState">Situation matrimoniale</label>
                                <input type="text" class="form-control"  :value="user3.info.situation" >
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputZip">Nombre d'enfants</label>
                                <input type="text" class="form-control"  :value="user3.info.nombre" >
                              </div>
                              <div class="form-group col-md-4">
                                <!-- <label for="inputZip">Les type coresspondant</label>
                                <select name="" id="" v-for="(user4,index4) in this.personnes.type.data"  :key="index4">
                                  <option :value="user4.nom"></option>
                                </select> -->
                                <!-- <input type="text" class="form-control"  :value="user3.info.nombre"> -->
                              </div>
                            </div>
                            
                          </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Ok</button>
                              </div>
                          </div>
                          </div>
                        </div>
                    <div>
                    </div>                    
                    </tbody>
                    </table>
                    <pagination :data="personnes" @pagination-change-page="getResults" class="mt-5"></pagination>
    
    </div>
    
</template>

<script>
//     import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';

    export default {
        data(){
            return{
                personnes:{},
                personnes2:{},
                nom:'',
                id:[],
                id_per:'',
                lastId2:'',
                hello1:{},
                q:''
            }
        },
        created(){
            this.getPersonnes();
            // axios.get('/admin/users').then(response=>this.users=response.data)
            //         // console.log(response.data); 
            //     .catch(error=>console.log(error));
        },
        methods:{
            getPersonnes(){
                axios.get('/api/personne').then(response=>{
                    console.log(response.data);
                    this.personnes=response.data;
                    this.personnes2=response.data;
                    this.lastId=response.data[0].id;
                    this.lastId2=personnes.data[0].id;
                })
                .catch(error=>{console.log(error)})
            },
            getResults(page = 1) {
			axios.get('/api/personne?page=' + page)
				.then(response => {
					this.personnes = response.data;
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
            deletePersonne(id){
                Swal.fire({
                    title: 'Etes vous sur?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Annuler',
                    confirmButtonText: 'Oui'
                    }).then(result => {
                      if(result.value){
                        // axios.delete('/api/personneDelete/'+id)
                        axios.delete('/api/personne/'+id)
                        .then(res=>{
                            Swal.fire({
                            position:'center',
                            icon:'success',
                            title:'Personne supprime',
                            showConfirmButton: flase,
                            timer:1200
                        });
                        this.getPersonnes();
                        }).catch(()=>{  
                            Swal.fire({
                            position:'center',
                            icon:'failed',
                            title:'Personne non supprime',
                            showConfirmButton: flase,
                            timer:1200
                            }); 
                        });
                    }
                    }
                    )
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
        
        // mounted() {
        //     this.fetchManagers();
        // }
    }
    }
</script>           