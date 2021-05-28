<template>
    <div class="container">
        <div class="form-row">
            <div class="col-row">
                <input type="text" class="form-control" @keyup="searchInfl" v-model="q" 
                placeholder="Rechercher ..."
                >
            </div>
        </div>
        
        <!-- <add-infl></add-infl>
        <addInflInfo></addInflInfo>
        <instagrame></instagrame>
        <facebook></facebook>
        <youtube></youtube>
        <snapchat></snapchat> -->

        <add-infl @personne-added="refresh1"></add-infl>
        <add-inflInfo  @personneInfo-added="refresh1"></add-inflInfo>
        <!-- <add-inflInsta  @personneInsta-added="refresh1"></add-inflInsta>
        <add-inflFb  @personneInsta-added="refresh1"></add-inflFb>
        <add-inflYtb  @personneInsta-added="refresh1"></add-inflYtb> 
        <add-inflSnap @personneInsta-added="refresh1"></add-inflSnap>  -->
        <!-- <wizard></wizard> -->
        <!-- <wizard2></wizard2> -->
     <table id="dataTable" class="table table-stripped">
                    <thead class="text-primary">
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Photo</th>
                      <th>Ville</th>
                      <th>Date de naissance</th>
                      <th>Plus info</th>
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
                                <Icon type="md-person" />
                                </button>
                        </td>
                        <td>{{user3.added }}</td>
                        <td>{{user3.updated }}</td>
                          <td><button  type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInfl" @click="getPersonne(user3.id)">
                          Editer1</button>
                          <button v-if="user3.info" type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInflInfo" @click="getPersonneInfo(user3.id)">
                          Editer2</button>
                          <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInflType2" @click="getPersonneType(user3.id)">
                           Editer3</button>-->
                          <button v-if="user3.instagram" type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInflInsta" @click="getPersonneInstagram(user3.id)">
                          Instagram</button> 
                          <button v-if="user3.facebook" type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInflFb" @click="getPersonneFacebook(user3.id)">
                          Facebook</button> 
                          <button v-if="user3.youtube" type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInflYtb" @click="getPersonneYoutube(user3.id)">
                          Youtube</button> 
                          <button v-if="user3.snapchat" type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInflSnap" @click="getPersonneSnapchat(user3.id)">
                          Snapchat</button> 
                          </td>
                          <!-- <edit-infl></edit-infl> -->
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
                    <pagination :data="personnes.perso" @pagination-change-page="getResults" class="mt-5"></pagination>
                    <edit-infl v-bind:personne1="personne1" @personne-updated="refresh1"></edit-infl>
                    <edit-inflInfo v-bind:personne2="personne2" @personneInfo-updated="refresh1"></edit-inflInfo>
                    <edit-inflInsta v-bind:personne4="personne4" v-bind:personneid="personneid" @personneInsta-updated="refresh1"></edit-inflInsta>
                    <edit-inflFb v-bind:personne5="personne5"  @personneInsta-updated="refresh1"></edit-inflFb>
                    <edit-inflYtb v-bind:personne6="personne6" @personneInsta-updated="refresh1"></edit-inflYtb> 
                    <edit-inflSnap v-bind:personne7="personne7"  @personneInsta-updated="refresh1"></edit-inflSnap> 
                    
                    
    <!-- <edit-infl @infl-updated="getPersonnes"></edit-infl> -->
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
                personne1:{},
                personne2:{},
                personne3:{},
                personne4:{},
                personne5:{},
                personne6:{},
                personne7:{},
                personneid:'',
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
                    // this.personnes2=response.data;
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
            getPersonne(id){
                axios.get('/api/personne/'+id)
                .then(response=>this.personne1=response.data)
                .catch(error=>console.log(error));
            },
            getPersonneInfo(id){
                axios.get('/api/personneInfo/'+id)
                .then(response=>this.personne2=response.data)
                .catch(error=>console.log(error));
            },
            getPersonneInstagram(id){
                axios.get('/api/personneTypeInstagram/'+id)
                .then(response=>this.personne4=response,
                this.personneid=id
                )
                .catch(error=>console.log(error));
            },
            getPersonneFacebook(id){
                axios.get('/api/personneTypeFacebook/'+id)
                .then(response=>this.personne5=response,
                this.personneid=id
                )
                .catch(error=>console.log(error));
            },
            getPersonneYoutube(id){
                axios.get('/api/personneTypeYoutube/'+id)
                .then(response=>this.personne6=response,
                this.personneid=id
                )
                .catch(error=>console.log(error));
            },
            getPersonneSnapchat(id){
                axios.get('/api/personneTypeSnapchat/'+id)
                .then(response=>this.personne7=response,
                this.personneid=id
                )
                .catch(error=>console.log(error));
            },
            searchInfl(){
                   if(this.q.length>3){
                    axios.get('/api/personneSearch/'+this.q).then(response=>this.personnes=response.data)
                    // console.log(response.data); 
                    .catch(error=>console.log(error));
                }else{
                    axios.get('/api/personne/').then(response=>this.personnes=response.data)
                    // console.log(response.data); 
                    .catch(error=>console.log(error));
                }
            },
            deletePersonne(id){
                Swal.fire({
                    position:'center',
                    title: 'etes vous sur?',
                    text: "test test test!",
                    icon: 'warning',
                    showCancelButton: true,
                    showConfirmationButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui',
                    camcelButtonText:'Annuler'
                    }).then((result) => {
                        
                            if (result.isConfirmed) {
                                axios.delete('/api/personne/'+id).then(response=>{
                                    // console.log('res : '+response.data);
                            // this.personnes=response;
                            this.refresh1();
                                Swal.fire(
                                    'Deleted!',
                                    'Your Manager has been deleted',
                                    'success'
                                )
                                }).catch(()=>{
                             Swal.fire(
                            'Failed!',
                            'something wrong',
                            'warning'
                            )
                        });
                            }        
                })
            },
            // deletePersonne(id){
            //     Swal.fire({
            //         title: 'Etes vous sur?',
            //         // text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         showConfirmButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         cancelButtonText: 'Annuler',
            //         confirmButtonText: 'Oui'
            //         }).then(result => {
            //           if(result.value){
            //             // axios.delete('/api/personneDelete/'+id)
            //             axios.delete('/api/personne/'+id)
            //             .then(res=>{
            //                 Swal.fire({
            //                 position:'center',
            //                 icon:'success',
            //                 title:'Personne supprime',
            //                 showConfirmButton: flase,
            //                 timer:1200
            //             });
            //             this.getPersonnes();
            //             }).catch(()=>{  
            //                 Swal.fire({
            //                 position:'center',
            //                 icon:'failed',
            //                 title:'Personne non supprime',
            //                 showConfirmButton: flase,
            //                 timer:1200
            //                 }); 
            //             });
            //         }
            //         }
            //         )
            //         },
            refresh1(){
              // console.log('hahahah');
                this.getPersonnes();
            },
            refresh(personnes){
                this.personnes.perso=personnes.perso.data;
            },
        
        // mounted() {
        //     this.fetchManagers();
        // }
    }
    }
</script>           