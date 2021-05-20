<template>
<div v-if="personne6.data!=null">
  <!-- <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#updateInfl">
     <Icon type="md-create" />
  </button> -->
  <div class="modal fade" id="updateInflYtb" tabindex="-1" role="dialog" aria-labelledby="updateInflYtb" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier les informations </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  v-if="(personne6.data.ytb)"> 
        <form @submit="updateYoutube" enctype="multipart/form-data">
        <!-- <form action="{{ route('test.route',[this.personne6.data.ytb.id]) }}" method="POST"> -->
          <div class="form-row" >
          <div class="form-group col-md-6">
            <!-- <label for="">id</label>
            <input type="number"  name="id"  v-model="ytb.id" class="form-control"> -->
            <label for="">Nombre d’abonnés</label>
            <input type="number"  name="nombree"  v-model="personne6.data.ytb.nombre_abonne" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Engagement</label>
            <input type="text" v-model="personne6.data.ytb.engagement" class="form-control" >
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Qualité d’audience</label>
          <input type="text" v-model="personne6.data.ytb.qualite" class="form-control">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Moyenne des likes</label>
            <input type="number" v-model="personne6.data.ytb.like" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Moyenne des commentaires</label>
            <input type="text" v-model="personne6.data.ytb.commentaire" class="form-control" id="inputPassword4">
          </div>
        </div>
        <Select v-model="personne6.data.ytb.followers" placeholder="Select your city">
                  <Option value="Nano(1k-10k)">Nano(1k-10k)</Option>
                  <Option value="Micro(10k-50k)">Micro(10k-50k)</Option>
                  <Option value="Mid-tier(50k-500k)">Mid-tier(50k-500k)</Option>
                  <Option value="Macro(500k-1m)">Macro(500k-1m)</Option>
                  <Option value="Mega(1m et +)">Mega(1m et +)</Option>
              </Select>
<multiselect v-model="personne6.data.ytb.domaine" :options="options" :multiple="true"  placeholder="Select domaine" label="nom" track-by="nom"></multiselect>
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
export default{
  components: { Multiselect },
     data(){
          return {
            selected: null,
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
    props:['personne6'],
    methods:{
      getDomaine(){
        axios.get('/api/personneTypeDomaine').then(response=>{
                    console.log(response.data);
                    this.options=response.data;
                })
                .catch(error=>{console.log(error)})
      },
      updateYoutube(e){
        e.preventDefault();//pour ne pas actualiser la page
        const config={
          headers:{"content-type":"multipart/form-data"}
        }
        let formData=new FormData();//pour communiquer avec la form
        for (var i = 0; i < this.personne6.data.ytb.domaine.length; i++) {
          // console.log('hjihjh ');
            formData.append('arr[]', this.personne6.data.ytb.domaine[i]['id']);
        }
        formData.append("id",this.personne6.data.ytb.id);
        formData.append("nombre_abonne",this.personne6.data.ytb.nombre_abonne);
        formData.append("engagement",this.personne6.data.ytb.engagement);
        formData.append("qualite",this.personne6.data.ytb.qualite);
        formData.append("like",this.personne6.data.ytb.like);
        formData.append("followers",this.personne6.data.ytb.followers);
        formData.append("commentaire",this.personne6.data.ytb.commentaire);
        formData.append("_method","put");//pour dire que on a en train de modifer
        // formData.append("image",this.image);
        axios.post("/api/personneTypeYoutube/"+this.personne6.data.ytb.id,formData).then(res=>{
        this.$emit('personneytb-updated',res)
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