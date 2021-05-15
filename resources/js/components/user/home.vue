<template>

<div>
    <pagination :data="this.personnes.perso" @pagination-change-page="getResults" class="mt-5"></pagination>
   <div class="col-sm-4" v-for="(user,index) in filteredPersonnes"  :key="index">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
                                            <img :src="user.photo" alt="" />
											<p>{{user.nom}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<!-- <div class="product-overlay">
											<div class="overlay-content">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div> -->
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
//     import { mdbTbl, mdbTblHead, mdbTblBody } from 'mdbvue';

    export default {
        data(){
            return{
                personnes:{},
                personnes2:{},
                his:{},
                nom:'',
                id:[],
                selectedHistorique:'all',
                personne7:{},
                personneid:'',
                filterNom: undefined,
                q:''
            }
        },
        created(){
            this.getHistorique();
            this.getPersonnes();
            this.getPersonnes2();
            // filteredPersonnes();
            
            // axios.get('/admin/users').then(response=>this.users=response.data)
            //         // console.log(response.data); 
            //     .catch(error=>console.log(error));
        },
        mounted() {
            console.log('moooonted');
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
                // alert('hello1');
                // console.log('debut');
                axios.get('/api/personne').then(response=>{
                    console.log('dataaaaaa: '+response.data);
                    this.personnes=response.data;
                    console.log('fin');
                    // this.lastId=response.data[0].id;
                    // this.lastId2=personnes.data[0].id;
                })
                .catch(error=>{console.log(error)})
            },
            getPersonnes2(){
                axios.get('/api/personneWithoutPagination').then(response=>{
                    console.log('daaaataaaa2 : '+response.data);
                    this.personnes2=response.data;
                    console.log('peeeeeeeer2 : '+response.data);
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
            selectedHis(id){
                alert('hello '+id)
                this.selectedHistorique=id;
                    },
            refresh(personnes){
                this.getPersonnes();
            },
    },
    computed:{
        filterInfl:function(){
            var vm=this;
            var historique=vm.selectedHistorique;
                if(historique===''){
                    return vm.personnes;
                }else{
                    // return vm.personnes.perso.data.filter((pers)=>pers.id===7);
                    return vm.personnes.perso.data.filter(function(person) {
					// return this.data.some(has=>person.data.id.includes(has));
                        return person.nom.includes('laravel');
				});
                }   
        },
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
            if(this.personnes.perso){
                console.log('deeeeeeeeeeeefined');
                var per = this.personnes.perso.data;
    	        var per2 = this.personnes2.perso
                
            }
    	
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