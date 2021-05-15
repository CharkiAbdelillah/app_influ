<template>
<div>
  <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInfl">
     <Icon type="md-create" />
  </button> -->
  <div class="modal fade" id="updateInflInsta" tabindex="-1" role="dialog" aria-labelledby="updateInflInsta" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier les informations </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  v-if="(personne4.data.insta)"> 
        <form @submit="updateInstagram" enctype="multipart/form-data">
        <!-- <form action="{{ route('test.route',[this.personne4.data.insta.id]) }}" method="POST"> -->
          <div class="form-row" >
          <div class="form-group col-md-6">
            <!-- <label for="">id</label>
            <input type="number"  name="id"  v-model="insta.id" class="form-control"> -->
            <label for="">Nombre d’abonnés</label>
            <input type="number"  name="nombree"  v-model="personne4.data.insta.nombre_abonne" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Engagement</label>
            <input type="text" v-model="personne4.data.insta.engagement" class="form-control" >
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Qualité d’audience</label>
          <input type="text" v-model="personne4.data.insta.qualite" class="form-control">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Moyenne des likes</label>
            <input type="number" v-model="personne4.data.insta.like" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Moyenne des commentaires</label>
            <input type="text" v-model="personne4.data.insta.commentaire" class="form-control" id="inputPassword4">
          </div>
        </div>
        <Select v-model="personne4.data.insta.followers" placeholder="Select your city">
                  <Option value="Nano(1k-10k)">Nano(1k-10k)</Option>
                  <Option value="Micro(10k-50k)">Micro(10k-50k)</Option>
                  <Option value="Mid-tier(50k-500k)">Mid-tier(50k-500k)</Option>
                  <Option value="Macro(500k-1m)">Macro(500k-1m)</Option>
                  <Option value="Mega(1m et +)">Mega(1m et +)</Option>
              </Select>
              <Select v-model="domaineTab" filterable multiple placeholder="Select domaine">
                      <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{c.nom}}</Option>
              </Select>
<multiselect v-model="personne4.data.insta.domaine" :options="options" :multiple="true"  placeholder="Select domaine" label="nom" track-by="nom"></multiselect>
              <!-- partie feed story collapse -->
              <p>
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Story
                </button>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                  Feed
                </button>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card card-body" >
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Date 1ere publication (Story)</label>
                      <!-- <input type="text" v-model="data3.date1d" class="form-control"> -->
                      <div class="col-10">
                        <input class="form-control" type="date" value="2011-08-19" v-model="personne4.data.insta.story.date_1er">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Nombre de publication par semaine</label>
                      <input type="text" v-model="personne4.data.insta.story.nombre_publicaion" class="form-control" id="inputPassword4">
                    </div>
                  </div>
                  <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">Taux de réponse des commentaires</label>
                            <input type="text" v-model="personne4.data.insta.story.taux_reponse" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Variation nombre de j’aime sur les publications non sponsorisées</label>
                            <input type="text" v-model="personne4.data.insta.story.nombre_jaime" class="form-control" id="inputPassword4">
                          </div>
                        </div>
                </div>
              </div>
              <div class="collapse" id="collapseExample2">

                <div class="card card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Date 1ere publication (Feed)</label>
                      <!-- <input type="text" v-model="data3.date1d" class="form-control"> -->
                      <div class="col-10">
                        <input class="form-control" type="date" value="2011-08-19" v-model="personne4.data.insta.feed.date_1er">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Nombre de publication par semaine</label>
                      <input type="text" v-model="personne4.data.insta.feed.nombre_publicaion" class="form-control" id="inputPassword4">
                    </div>
                  </div>
                  <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">Taux de réponse des commentaires</label>
                            <input type="text" v-model="personne4.data.insta.feed.taux_reponse" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Variation nombre de j’aime sur les publications non sponsorisées</label>
                            <input type="text" v-model="personne4.data.insta.feed.nombre_jaime" class="form-control" id="inputPassword4">
                          </div>
                        </div>
                </div>
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit"  class="btn btn-success">Cree4</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<script>
import Multiselect from 'vue-multiselect'
import addInflInfo from "./addInflInfo";
export default{
  components: { Multiselect },
     data(){
          return {
            selected: null,
            // options: ['Laravel', 'Laravel 5', 'Vue JS', 'HDTuto.com', 'HDTuto.com'],
            name:'',
            prenom:'',
            ville:'',
            daten:'',
            test:'',
            nombre:'',
            image:null,
            domaine:{},
            personnes44:{},
            domaineTab:[],
            domaineTab2:[],
            options:[]
       };
    },
    created(){
            // this.getPersonnes()
            this.getDomaine()
        },
    props:['personne4','personneid'],
    methods:{

      getDomaine(){
        axios.get('/api/personneTypeDomaine').then(response=>{
                    console.log(response.data);
                    this.options=response.data;
                })
                .catch(error=>{console.log(error)})
      },
      updateInstagram(e){
        e.preventDefault();//pour ne pas actualiser la page
        const config={
          headers:{"content-type":"multipart/form-data"}
        }
        let formData=new FormData();//pour communiquer avec la form
        for (var i = 0; i < this.personne4.data.insta.domaine.length; i++) {
          // console.log('hjihjh ');
            formData.append('arr[]', this.personne4.data.insta.domaine[i]['id']);
        }
        formData.append("id",this.personne4.data.insta.id);
        formData.append("nombre_abonne",this.personne4.data.insta.nombre_abonne);
        formData.append("engagement",this.personne4.data.insta.engagement);
        formData.append("qualite",this.personne4.data.insta.qualite);
        formData.append("like",this.personne4.data.insta.like);
        formData.append("followers",this.personne4.data.insta.followers);
        formData.append("commentaire",this.personne4.data.insta.commentaire);
        formData.append("date_1erf",this.personne4.data.insta.feed.date_1er);
        formData.append("nombre_publicaionf",this.personne4.data.insta.feed.nombre_publicaion);
        formData.append("taux_reponsef",this.personne4.data.insta.feed.taux_reponse);
        formData.append("nombre_jaimef",this.personne4.data.insta.feed.nombre_jaime);
        formData.append("date_1ers",this.personne4.data.insta.story.date_1er);
        formData.append("nombre_publicaions",this.personne4.data.insta.story.nombre_publicaion);
        formData.append("taux_reponses",this.personne4.data.insta.story.taux_reponse);
        formData.append("nombre_jaimes",this.personne4.data.insta.story.nombre_jaime);
        formData.append("_method","put");//pour dire que on a en train de modifer
        // formData.append("image",this.image);
        axios.post("/api/personneTypeInstagram/"+this.personne4.data.insta.id,formData).then(res=>{
        this.$emit('personneInsta-updated',res)
        // $('#updateInfl').modal('hide');  
        
        // this.$refs.modalComponent.show(); 
        console.log('update pers');
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
<style src="vue-multiselect/dist/vue-multiselect.min.css">