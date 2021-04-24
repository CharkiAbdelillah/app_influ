<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#exampleModal">
                    Ajouter 
  </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!-- <input type="hidden" name="_token" v-bind:value="csrf"> -->
          <div class="form-group">
            <label for="" class="col-from-label">
              Nom:
            </label>
            <input type="text" name="name" v-model="name" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
               Email: 
            </label>
            <input type="email" name="email" v-model="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
              Mot de passe: 
            </label>
            <input type="password" name="pass1" v-model="pass" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit" class="btn btn-success" @click="storeManager" >Cree</button>
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
            name:'',
            email:'',
            pass:''
       }
    },
    methods:{
        storeManager(){
            axios.post('/admin/gestion_manger',{
                name:this.name,
                email:this.email,
                password:this.pass,
                is_admin:2

            })
            .then(response=>this.$emit('manager-added',response))
            .catch(error=>console.log(error));
        }               
       }
}
</script>
