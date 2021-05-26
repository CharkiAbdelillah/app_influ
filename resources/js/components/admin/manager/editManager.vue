<template>
    <div>
         <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Editer les informations de {{hello1.name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="" class="col-from-label">
              Nom:
            </label>
            <input type="text" name="name"  v-model="hello1.name" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
               Email: 
            </label>
            <input type="email" name="email"  v-model="hello1.email" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
              Mot de passe: 
            </label>
            <input type="password" name="pass1" v-model="newPass" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success" @click="update" data-dismiss="modal">Enregistrer</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>
    </div>    
    </div>
</template>
<script>
export default {
  data(){
            return{
                newPass:'',
            }
    },
    props:['hello1'],
    methods:{
       update(){
          if(this.hello1.name.trim()=='') return this.e('Name is required')
          if(this.hello1.email.trim()=='') return this.e('Email is required')
        axios.post('/admin/manager-update/'+this.hello1.id,{
          name:this.hello1.name,
          email:this.hello1.email,
          password:this.newPass,
        })
        .then(response=>{
          this.$emit('manager-updated',response);
            Swal.fire({
            position:"center",
            icon:"success",
            title:"Manager modifie",
            showConfirmButton:false,
            timer:1500
          });
        })
        .catch(error=>{console.log(error)});
      }
    }

}
</script>