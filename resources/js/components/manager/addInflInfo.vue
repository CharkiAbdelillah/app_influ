<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal1">
     Ajouter 2
  </button>
    <div class="modal fade" id="modal1" ref="modal1" tabindex="-1" aria-labelledby="personneInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personneInfoLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addInflInfo" enctype="multipart/form-data">
          <!-- <input type="hidden" name="_token" v-bind:value="csrf"> -->
          <div class="row">
            Taille:
            <div class="col-3">
              <input type="text" v-model="cm" class="form-control" placeholder="cm">
            </div>
            <div class="col-3">
              <input type="text" v-model="kg" class="form-control" placeholder="kg">
            </div>
          </div>
          <select class="custom-select" v-model="cheveux">
            <option selected>Cheveux</option>
            <option value="Noir">Noir</option>
            <option value="Brun">Brun</option>
            <option value="Chatain">Chatain</option>
            <option value="Blond">Blond</option>
            <option value="Roux">Roux</option>            
          </select>
          <select class="custom-select" v-model="longueur">
            <option selected>Longueur</option>
            <option value="Très court">Très court</option>
            <option value="Court">Court</option>
            <option value="Mi-long">Mi-long</option>
            <option value="Long">Long</option>
          </select>
          <select class="custom-select" v-model="nature">
            <option selected>Nature</option>
            <option value="Lisse">Lisse</option>
            <option value="Ondulés">Ondulés</option>
            <option value="Bouclés">Bouclés</option>
            <option value="Crépus">Crépus</option>
          </select>
          <select class="custom-select" v-model="couleur">
            <option selected>Couleur de peau</option>
            <option value="Blanche">Blanche</option>
            <option value="Beige">Beige</option>
            <option value="Matte">Matte</option>
            <option value="Noir">Noir</option>
          </select>
          <select class="custom-select" v-model="yeux">
            <option selected>Yeux</option>
            <option value="Noir">Noir</option>
            <option value="Brun">Brun</option>
            <option value="Vert">Vert</option>
            <option value="Bleu">Bleu</option>
          </select>
          <select class="custom-select" v-model="niveau">
            <option selected>Niveau éducatif</option>
            <option value="Bac">Bac</option>
            <option value="Bac+2 (DEUG)">Bac+2 (DEUG)</option>
            <option value="Bac+3 (Licence)">Bac+3 (Licence)</option>
            <option value="Bac+5 (Master)">Bac+5 (Master)</option>
            <option value="Bac+8 (Doctorat)">Bac+8 (Doctorat)</option>
          </select>
          <select class="custom-select" v-model="specialite">
            <option selected>Spécialité</option>
            <option value="Journalisme">Journalisme</option>
            <option value="Économie">Économie</option>
            <option value="Ingénierie">Ingénierie</option>
            <option value="Informatique">Informatique</option>
            <option value="Médecine">Médecine</option>
            <option value="Autre…">Autre…</option>
          </select>
          <select class="custom-select" v-model="situation">
            <option selected>Situation matrimoniale</option>
            <option value="Marié">Marié</option>
            <option value="Célibataire">Célibataire</option>
          </select>
          <select class="custom-select" v-model="nombre">
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


export default{
     data(){
          return {
            cm:'',
            kg:'',
            cheveux:'',
            longueur:'',
            nature:'',
            couleur:'',
            yeux:'',
            niveau:'',
            specialite:'',
            situation:'',
            nombre:'',
            // image:null
            
       };
    },
    methods:{
      show(){
              this.$refs.modal1.show();
            },
      addInflInfo(e){
        e.preventDefault();//pour ne pas actualiser la page
        let formData=new FormData();//pour communiquer avec la form
        formData.append("cm",this.cm);
        formData.append("kg",this.kg);
        formData.append("cheveux",this.cheveux);
        formData.append("longueur",this.longueur);
        formData.append("nature",this.nature);
        formData.append("couleur",this.couleur);
        formData.append("yeux",this.yeux);
        formData.append("niveu1",this.niveau);
        formData.append("specialite",this.specialite);
        formData.append("situation",this.situation);
        formData.append("nombre",this.nombre);
        axios.post("/api/personneInfo",formData).then(res=>{
        // $('#personneInfo').modal('hide');
        console.log('hi')
      }).catch(err=>console.log('hahaha'));
      }
    }
}
</script>
