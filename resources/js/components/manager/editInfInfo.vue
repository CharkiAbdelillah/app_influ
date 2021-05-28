<template>
<div>
  <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInfl">
     <Icon type="md-create" />
  </button> -->
    <div class="modal fade" id="updateInflInfo" tabindex="-1" role="dialog" aria-labelledby="updateInflInfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" >
        <div v-for="(v,i) in personnes.perso.data" :key="i" >
        <h5 class="modal-title" id="exampleModalLabel" v-if="(v.id==personne2.personne_id)===true">Modifier info de <strong>{{v.nom}}</strong></h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="updateInfInfo" enctype="multipart/form-data">
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
         <br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Cheveux" v-model="personne2.cheveux" filterable>
                    <Option value="Noir">Noir</Option>
                    <Option value="Brun">Brun</Option>
                    <Option value="Chatain">Chatain</Option>
                    <Option value="Blond">Blond</Option>
                    <Option value="Roux">Roux</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Longueur" v-model="personne2.longueur" filterable>
                    <Option value="Très court">Très court</Option>
                    <Option value="Court">Court</Option>
                    <Option value="Chatain">Chatain</Option>
                    <Option value="Mi-long">Mi-long</Option>
                    <Option value="Long">Long</Option>
                </Select>
            </Col>
        </Row><br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Nature" v-model="personne2.nature" filterable>
                    <Option value="Lisse">Lisse</Option>
                    <Option value="Ondulés">Ondulés</Option>
                    <Option value="Bouclés">Bouclés</Option>
                    <Option value="Crépus">Crépus</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Couleur de peau" v-model="personne2.couleur" filterable>
                    <Option value="Blanche">Blanche</Option>
                    <Option value="Beige">Beige</Option>
                    <Option value="Matte">Matte</Option>
                    <Option value="Noir">Noir</Option>
                </Select>
            </Col>
        </Row>
        <br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Yeux" v-model="personne2.yeux" filterable>
                    <Option value="Noir">Noir</Option>
                    <Option value="Brun">Brun</Option>
                    <Option value="Vert">Vert</Option>
                    <Option value="Bleu">Bleu</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Niveau éducatif" v-model="personne2.niveux" filterable>
                    <Option value="Bac">Bac</Option>
                    <Option value="Bac+2 (DEUG)">Bac+2 (DEUG)</Option>
                    <Option value="Bac+3 (Licence)">Bac+3 (Licence)</Option>
                    <Option value="Bac+5 (Master)">Bac+5 (Master)</Option>
                    <Option value="Bac+8 (Doctorat)">Bac+8 (Doctorat)</Option>
                </Select>
            </Col>
        </Row>
        <br>
        <Row>
            <Col span="12" style="padding-right:10px">
                <Select placeholder="Specialite" v-model="personne2.specialite" filterable>
                    <Option value="Spécialité">Spécialité</Option>
                    <Option value="Journalisme">Journalisme</Option>
                    <Option value="Économie">Économie</Option>
                    <Option value="Ingénierie">Ingénierie</Option>
                    <Option value="Informatique">Informatique</Option>
                    <Option value="Médecine">Médecine</Option>
                    <Option value="Autre…">Autre…</Option>
                </Select>
            </Col>
            <Col span="12">
                <Select placeholder="Situation matrimoniale" v-model="personne2.situation" filterable>
                    <Option value="Marié">Marié</Option>
                    <Option value="Célibataire">Célibataire</Option>
                </Select>
            </Col>
        </Row>
        <br>
        <Row v-if="personne2.situation!='Célibataire'">
            <Col span="12">
                <Select placeholder="Nombre d'enfants" v-model="personne2.nombre" filterable>
                    <Option value="1 enfant">1 enfant</Option>
                    <Option value="2 enfants">2 enfants</Option>
                    <Option value="3 enfants et plus">3 enfants et plus</Option>
                </Select>
            </Col>
        </Row>
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
      updateInfInfo(e){
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
