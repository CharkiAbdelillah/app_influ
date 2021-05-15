<template>
<div>
                                    <!-- <h1>dkmekdekmedmmek</h1>  -->
                                    <div class="row">
            
            <input v-model="filterNom" placeholder="Nom"/>
        </div>
							<div class="product-image-wrapper" >
                                <div v-for="(user,index) in filteredPersonnes.data"  :key="index">
                
								<div class="single-products">
										<div class="productinfo text-center">
											<img :src="user.photo" alt="" />
											<h2>{{user.age}}</h2>
											<p>{{user.prenom}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
                                </div>
							</div>
     </div>               
</template>
<script>
export default {
        data(){
            return{
                personnes:{},
                personnes2:{},
                his:{},
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
                selectedHistorique:'all',
                personne7:{},
                personneid:'',
                filterNom: undefined,
                q:''
            }
        },
        created(){
            // this.getPersonnes();
            // this.getPersonnes2();
            // this.getHistorique();
            // axios.get('/admin/users').then(response=>this.users=response.data)
            //         // console.log(response.data); 
            //     .catch(error=>console.log(error));
        },
        methods:{
            getHistorique(){
        axios.get('/api/personneHistorique').then(response=>{
                    console.log('histo : '+response.data);
                    this.his=response.data;
                })
                .catch(error=>{console.log(error)})
      },
            getPersonnes(){
                axios.get('/api/personne').then(response=>{
                    console.log(response.data);
                    this.personnes=response.data;
                    console.log('peeeer: '+this.personnes.perso.data[0]['nom']);
                    // this.personnes2=response.data;
                })
                .catch(error=>{console.log(error)})
            },
            getPersonnes2(){
                axios.get('/api/personneWithoutPagination').then(response=>{
                    console.log(response.data);
                    this.personnes2=response.data;
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
            selectedHis(id){
                alert('hello '+id)
                this.selectedHistorique=id;
                    },
            refresh(personnes){
                this.getPersonnes();
            },
    },
    computed:{
        // searchevents: function(){
        //     let result = this.personnes.perso.data
        //     if (!this.selectedHistorique)
        //     return result

        //     // const filterValue = this.filterValue.toLowerCase()

        //     const filter = event => 
        //         // event.nom.toLowerCase().includes('laravel') ||
        //         // event.state.toLowerCase().includes(filterValue) ||
        //         event.historique.some(tag => tag.includes('Ambassadeur'))

        //     return result.filter(filter)
        // },
        filteredPersonnes () {
            // this.getPersonnes();
    	let per = this.personnes.perso;
    	let per2 = this.personnes2.perso
            if (this.filterNom) {
                per2 = per2.filter((p) => {
                    return p.nom.indexOf(this.filterNom) !== -1
                })
                return per2;
            }
            if(this.selectedHistorique && this.selectedHistorique !== 'all') {
                per2 = per2.filter((p) => {
                            let foundHistorique = p.historique.findIndex((c) => {
                             return c.id === this.selectedHistorique
                })
                return foundHistorique !== -1
                })
                this.selectedHistorique='all';
                return per2;
                
            }else
            return per
        },
        filteredPersonnesCount: function() {
            return this.filteredPersonnes.length;
        }
    }
    }
</script>           