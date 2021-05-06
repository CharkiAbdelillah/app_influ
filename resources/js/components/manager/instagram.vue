
<template>
<div>
  <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#modal3">
     Ajouter 4
  </button>
    <div class="modal fade" id="modal3" ref="modal3" tabindex="-1" aria-labelledby="personneInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="personneInfoLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  @submit="addInstagrame" enctype="multipart/form-data">
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
                <div class="card card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="">Date 1ere publication </label>
                      <div class="col-10">
                        <input class="form-control" type="date" value="2011-08-19" v-model="data3.date1s">
                      </div>
                      <!-- <input type="text" v-model="data3.date1s" class="form-control"> -->
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Nombre de publication par semaine</label>
                      <input type="text" v-model="data3.nombrebs" class="form-control" id="inputPassword4">
                    </div>
                  </div>
                  <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">Taux de réponse des commentaires</label>
                            <input type="text" v-model="data3.tauxs" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Variation nombre de j’aime sur les publications ‘non sponsorisées</label>
                            <input type="text" v-model="data3.jaimes" class="form-control" id="inputPassword4">
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
                        <input class="form-control" type="date" value="2011-08-19" v-model="data3.date1d">
                      </div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="">Nombre de publication par semaine</label>
                      <input type="text" v-model="data3.nombrebd" class="form-control" id="inputPassword4">
                    </div>
                  </div>
                  <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="">Taux de réponse des commentaires</label>
                            <input type="text" v-model="data3.tauxd" class="form-control">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="">Variation nombre de j’aime sur les publications ‘non sponsorisées</label>
                            <input type="text" v-model="data3.jaimed" class="form-control" id="inputPassword4">
                          </div>
                        </div>
                </div>
              </div>
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
              date1s:'',
              nombrebs:'',
              tauxs:'',
              jaimes:'',
              followerd:'',
              date1d:'',
              nombrebd:'',
              tauxd:'',
              jaimed:'',
            }
            
       };
    },
    created(){
      this.getDomaine()
    //   this.getDomaineHis()
    },
    methods:{
      async addInstagrame(e){
        e.preventDefault();//pour ne pas actualiser la page
        const res=await this.callApi('post','/api/personneTypeInstagram',this.data3)
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
