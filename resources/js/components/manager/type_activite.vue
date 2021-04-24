<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal2">
     Ajouter 3
  </button>
    <div class="modal fade" id="modal2" ref="modal2" tabindex="-1" aria-labelledby="personneInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personneInfoLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit="addInflType" enctype="multipart/form-data">
          <!-- <input type="hidden" name="_token" v-bind:value="csrf"> -->
          <select class="custom-select" v-model="nomType">
            <option selected>Choisi le type</option>
            <option value="instagram">instagram</option>
            <option value="Facebook">Facebook</option>
            <option value="Youtube">Youtube</option>
          </select>
          <div class="_input_field">
          <Select filterable multiple v-model="domaineTab" placeholder="Select domaine">
                <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{ c.nom }}</Option>
            </Select>
            </div>
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
            nomType:'',
            domaine:{},
            domaineTab:[]

            
       };
    },
    created(){
      this.getDomaine()
    },
    methods:{
      addInflType(e){
        e.preventDefault();//pour ne pas actualiser la page
        let formData=new FormData();//pour communiquer avec la form
        formData.append("nom",this.nomType);
        formData.append("domtab",this.domaineTab);
        axios.post("/api/personneType",formData).then(res=>{
        // $('#modal2').modal('hide');
        console.log('hi')
      }).catch(err=>console.log('hahaha'));
      },
      getDomaine(){
        axios.get('/api/personneTypeDomaine').then(response=>{
                    console.log(response.data);
                    this.domaine=response.data;
                })
                .catch(error=>{console.log(error)})
      }
    }
}
</script>
