
<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#ytb">
     Youtube
  </button>
    <div class="modal fade" id="ytb" ref="ytb" tabindex="-1" aria-labelledby="personneInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personneInfoLabel">Youtube</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  @submit="addYoutube" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Nombre d’abonnés</label>
            <input type="number" v-model="data3.nombre" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Engagement</label>
            <input type="text" v-model="data3.engagement" class="form-control" >
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Qualité d’audience</label>
          <input type="text" v-model="data3.qualite" class="form-control">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Moyenne des likes</label>
            <input type="number" v-model="data3.like" class="form-control">
          </div>
          <div class="form-group col-md-6">
            <label for="">Moyenne des commentaires</label>
            <input type="text" v-model="data3.comm" class="form-control" id="inputPassword4">
          </div>
        </div>
        <Select v-model="data3.followers" placeholder="Select your city">
                  <Option value="Nano(1k-10k)">Nano(1k-10k)</Option>
                  <Option value="Micro(10k-50k)">Micro(10k-50k)</Option>
                  <Option value="Mid-tier(50k-500k)">Mid-tier(50k-500k)</Option>
                  <Option value="Macro(500k-1m)">Macro(500k-1m)</Option>
                  <Option value="Mega(1m et +)">Mega(1m et +)</Option>
              </Select>
                  <Select v-model="data3.domaineTab" filterable multiple placeholder="Select domaine">
                      <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{c.nom}}</Option>
                  </Select>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit"  class="btn btn-success">Cree2</button>
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
            domaine:{
            },
            data:{
              
            },
            data3:{
              domaineTab:[],
              nombre:'',
              engagement:'',
              qualite:'',
              like:'',
              comm:'',
              followers:'',
            }
            
       };
    },
    created(){
      this.getDomaine()
    //   this.getDomaineHis()
    },
    methods:{
      async addYoutube(e){
        e.preventDefault();//pour ne pas actualiser la page
        const res=await this.callApi('post','/api/personneTypeYoutube',this.data3)
        if(res.status==200){
          this.s('Success')
        }else{
          this.swr()
        }
      },
      getDomaine(){
        axios.get('/api/personneTypeDomaine').then(response=>{
                    console.log(response.data);
                    this.domaine=response.data;
                })
                .catch(error=>{console.log(error)})
      },
    //   async addInflDomHis(e){
    //     e.preventDefault();//pour ne pas actualiser la page
    //     const res=await this.callApi('post','/api/personneTypeDomaineHisDom',this.data2)
    //     if(res.status==200){
    //       this.s('Success')
    //     }else{
    //       this.swr()
    //     }
      },
    //   getDomaine(){
    //     axios.get('/api/personneTypeDomaine').then(response=>{
    //                 console.log(response.data);
    //                 this.domaine=response.data;
    //             })
    //             .catch(error=>{console.log(error)})
    //   },
    //   getDomaineHis(){
    //     axios.get('/api/personneTypeDomaineHis').then(response=>{
    //                 console.log(response.data);
    //                 this.domaineHis=response.data;
    //             })
    //             .catch(error=>{console.log(error)})
    //   }
    // }
}
</script>
