<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#addInfl">
     Ajouter 
  </button>
    <div class="modal fade" id="addInfl" tabindex="-1" role="dialog" aria-labelledby="addInfl" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addInfl" enctype="multipart/form-data">
          <!-- <input type="hidden" name="_token" v-bind:value="csrf"> -->
          <div class="form-group">
            <label for="" class="col-from-label">
              Nom:
            </label>
            <input type="text" name="name" v-model="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
               Prenom: 
            </label>
            <input type="text" name="prenom" v-model="prenom" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
               Ville: 
            </label>
            <input type="text" name="ville" v-model="ville" class="form-control">
          </div>
        <div class="form-group row">
          <label for="example-date-input" class="col-2 col-form-label">Date</label>
          <div class="col-10">
            <input class="form-control" type="date" value="2011-08-19" v-model="daten" id="example-date-input">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Photo</label>
          <input type="file" name="image" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" v-on:change="onImageChange">
          <small id="fileHelp" class="form-text text-muted"><Icon type="ios-images" /></small>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit" class="btn btn-success">Cree</button>
            <!-- <addInflInfo ref="modalComponent"/> -->
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
            // image:null
            
       };
    },
    methods:{
      onImageChange(e){
        console.log(e.target.files[0]);
        this.image=e.target.files[0];
      },
      addInfl(e){
        e.preventDefault();//pour ne pas actualiser la page
        const config={
          headers:{"content-type":"multipart/form-data"}
        }
        let formData=new FormData();//pour communiquer avec la form
        formData.append("image",this.image);
        formData.append("name",this.name);
        formData.append("prenom",this.prenom);
        formData.append("ville",this.ville);
        formData.append("daten",this.daten);
        // formData.append("image",this.image);
        axios.post("/api/personne",formData,config).then(res=>{
        // $('#addInfl').modal('hide');  
        // this.$emit('infl-added')
        // this.$refs.modalComponent.show();
        console.log('hi')
      }).catch(err=>console.log('hahaha'));
      }
    }
}
</script>
