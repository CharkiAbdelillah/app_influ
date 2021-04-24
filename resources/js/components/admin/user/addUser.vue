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
            <input type="text" name="name" v-model="data.name" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
               Email: 
            </label>
            <input type="email" name="email" v-model="data.email" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-from-label">
              Mot de passe: 
            </label>
            <input type="password" name="pass1" v-model="data.pass" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="button" class="btn btn-success" @click="storeManager"  >Cree</button>
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
            data:{
              name:'',
              email:'',
              pass:''
            },
            test:''

            
       }
    },
    methods:{
        async storeManager(){
            if(this.data.name.trim()=='') return this.e('name is required')
            if(this.data.email.trim()=='') return this.e('Email is required')
			      if(this.data.pass.trim()=='') return this.e('Password is required')
            // const res=axios.post('/admin/gestion_user',this.data)
            const res =await this.callApi('post', '/admin/gestion_user',this.data)
            if(res.status===200){
              this.s('User has been created successfully!')
              //  document.getElementById("test").innerHTML='data-dismiss="modal"'
              // this.test='data-dismiss="modal"'
              this.$emit('user-added',res)
            //  then(response=>this.$emit('user-added',res))
            }
            else{
              // this.test=0
              if(res.status==422){
              for(let i in res.data.errors){
                              this.e(res.data.errors[i][0])
                          }
              }else{
                this.swr()
              }
              
            }
        }               
       }
}
</script>
