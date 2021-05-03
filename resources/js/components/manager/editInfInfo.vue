<template>
<div>
  <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInfl">
     <Icon type="md-create" />
  </button> -->
    <div class="modal fade" id="updateInflInfo" tabindex="-1" role="dialog" aria-labelledby="updateInflInfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="updateInfType" enctype="multipart/form-data">
        <!-- <input type="hidden" v-model="personne2.id"> -->
          <div class="row">
            Taille:
            <div class="col-3">
              <input type="text" v-model="personne2.cm" class="form-control" placeholder="cm">
            </div>
            <div class="col-3">
              <input type="text" v-model="personne2.kg" class="form-control" placeholder="kg">
            </div>
          </div>
          <select class="custom-select" v-model="personne2.cheveux">
            <option selected>Cheveux</option>
            <option value="Noir">Noir</option>
            <option value="Brun">Brun</option>
            <option value="Chatain">Chatain</option>
            <option value="Blond">Blond</option>
            <option value="Roux">Roux</option>            
          </select>
          <select class="custom-select" v-model="personne2.longueur">
            <option selected>Longueur</option>
            <option value="Très court">Très court</option>
            <option value="Court">Court</option>
            <option value="Mi-long">Mi-long</option>
            <option value="Long">Long</option>
          </select>
          <select class="custom-select" v-model="personne2.nature">
            <option selected>Nature</option>
            <option value="Lisse">Lisse</option>
            <option value="Ondulés">Ondulés</option>
            <option value="Bouclés">Bouclés</option>
            <option value="Crépus">Crépus</option>
          </select>
          <select class="custom-select" v-model="personne2.couleur">
            <option selected>Couleur de peau</option>
            <option value="Blanche">Blanche</option>
            <option value="Beige">Beige</option>
            <option value="Matte">Matte</option>
            <option value="Noir">Noir</option>
          </select>
          <select class="custom-select" v-model="personne2.yeux">
            <option selected>Yeux</option>
            <option value="Noir">Noir</option>
            <option value="Brun">Brun</option>
            <option value="Vert">Vert</option>
            <option value="Bleu">Bleu</option>
          </select>
          <select class="custom-select" v-model="personne2.niveux">
            <option selected>Niveau éducatif</option>
            <option value="Bac">Bac</option>
            <option value="Bac+2 (DEUG)">Bac+2 (DEUG)</option>
            <option value="Bac+3 (Licence)">Bac+3 (Licence)</option>
            <option value="Bac+5 (Master)">Bac+5 (Master)</option>
            <option value="Bac+8 (Doctorat)">Bac+8 (Doctorat)</option>
          </select>
          <select class="custom-select" v-model="personne2.specialite">
            <option selected>Spécialité</option>
            <option value="Journalisme">Journalisme</option>
            <option value="Économie">Économie</option>
            <option value="Ingénierie">Ingénierie</option>
            <option value="Informatique">Informatique</option>
            <option value="Médecine">Médecine</option>
            <option value="Autre…">Autre…</option>
          </select>
          <select class="custom-select" v-model="personne2.situation">
            <option selected>Situation matrimoniale</option>
            <option value="Marié">Marié</option>
            <option value="Célibataire">Célibataire</option>
          </select>
          <select class="custom-select" v-model="personne2.nombre">
            <option selected>Nombre d'enfants</option>
            <option value="1 enfant">1 enfant</option>
            <option value="2 enfants">2 enfants</option>
            <option value="3 enfants et plus">3 enfants et plus</option>
          </select>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit" class="btn btn-success">Cree</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>

import addInflInfo from "./addInflInfo";
export default{
     data(){
          return {
            name:'',
            prenom:'',
            ville:'',
            daten:'',
            test:'',
            image:null,
            personnes:{},
       };
    },
    created(){
            this.getPersonnes();
            // axios.get('/admin/users').then(response=>this.users=response.data)
            //         // console.log(response.data); 
            //     .catch(error=>console.log(error));
        },
    props:['personne2'],
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
      updateInfType(e){
        e.preventDefault();//pour ne pas actualiser la page
        let formData=new FormData();//pour communiquer avec la form
        formData.append("id",this.personne2.id);
        formData.append("cheveux",this.personne2.cheveux);
        formData.append("kg",this.personne2.kg);
        formData.append("cm",this.personne2.cm);
        formData.append("couleur",this.personne2.couleur);
        formData.append("longueur",this.personne2.longueur);
        formData.append("niveux",this.personne2.niveux);
        formData.append("nombre",this.personne2.nombre);
        formData.append("situation",this.personne2.situation);
        formData.append("specialite",this.personne2.specialite);
        formData.append("situation",this.personne2.situation);
        formData.append("yeux",this.personne2.yeux);
        formData.append("_method","put");//pour dire que on a en train de modifer
        // formData.append("image",this.image);
        axios.post("/api/personneInfo/"+this.personne2.id,formData).then(res=>{
        this.$emit('personneInfo-updated',res)
        // $('#updateInfl').modal('hide');  
        
        // this.$refs.modalComponent.show(); 
        console.log('update pers info');
        Swal.fire({
          position:"center",
          icon:"success",
          title:"Personne modifie",
          showConfirmButton:false,
          timer:1500
        });
        
        // this.$emit('infl-added');
      }).catch(err=>console.log('hahaha'));
      }
    }
}
</script>
