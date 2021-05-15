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
          <select class="custom-select" v-model="data.nomType">
            <option selected>Choisi le type</option>
            <option v-for="(c,i) in type" :value="c.id" :key="i">{{c.nom}}</option>
          </select>
          <div class="_input_field">
          <Select filterable multiple v-model="data.domaineTab" placeholder="Select domaine">
                <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{ c.nom }}</Option>
            </Select>
            </div>
            <Row>
              <Col span="12" style="padding-right:10px">
                  <Select v-model="data.domaineTab2" filterable placeholder="Select domaine">
                      <Option v-for="(c,i) in domaine" :value="c.id" :key="i">{{c.nom}}</Option>
                  </Select>
              </Col>
              <Col span="12">
                  <Select v-model="data.domaineTab3" filterable multiple placeholder="Select domaine hist">
                      <Option v-for="(c,i) in domaineHis" :value="c.id" :key="i">{{ c.nom }}</Option>
                  </Select>
              </Col>
              <Button  icon="md-add" type="primary" shape="circle" @click="addInflDomHis"></Button>
          </Row>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
            <button type="submit"  class="btn btn-success">Cree</button>
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
            domaine:{},
            domaineHis:{},
            data:{
              nomType:'',
              domaineTab:[],
              domaineTab2:'',
              domaineTab3:[]
            },
            // data:{
              
            // }
            
       };
    },
    created(){
      this.getDomaine(),
      this.getType(),
      this.getDomaineHis()
    },
    methods:{
      async addInflType(e){
        e.preventDefault();//pour ne pas actualiser la page
        const res=await this.callApi('post','/api/personneType',this.data)
        if(res.status==200){
          this.s('Success'),
          setTimeout(function(){$('#addInfl').modal('hide')}, 10)
          $('#addInfl').modal('hide');  
        }else{
          this.swr()
        }
      },
      async addInflDomHis(e){
        e.preventDefault();//pour ne pas actualiser la page
        const res=await this.callApi('post','/api/personneTypeDomaineHisDom',this.data)
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
      getType(){
        axios.get('/api/personneType').then(response=>{
                    console.log(response.data);
                    this.type=response.data;
                })
                .catch(error=>{console.log(error)})
      },
      getDomaineHis(){
        axios.get('/api/personneTypeDomaineHis').then(response=>{
                    console.log(response.data);
                    this.domaineHis=response.data;
                })
                .catch(error=>{console.log(error)})
      }
    }
}
</script>
